<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<?php
if (isset($_POST["save"])) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);
    $hasError = false;
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    }
    if (!is_valid_username($username)) {
        flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        $params = [":email" => $email, ":username" => $username, ":id" => get_user_id()];
        $db = getDB();
        $stmt = $db->prepare("UPDATE Users set email = :email, username = :username where id = :id");
        try {
            $stmt->execute($params);
            flash("Profile saved", "success");
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
        //select fresh data from table
        $stmt = $db->prepare("SELECT id, email, username from Users where id = :id LIMIT 1");
        try {
            $stmt->execute([":id" => get_user_id()]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                //$_SESSION["user"] = $user;
                $_SESSION["user"]["email"] = $user["email"];
                $_SESSION["user"]["username"] = $user["username"];
            } else {
                flash("User doesn't exist", "danger");
            }
        } catch (Exception $e) {
            flash("An unexpected error occurred, please try again", "danger");
            //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
        }
    }


    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        $hasError = false;
        if (!is_valid_password($new_password)) {
            flash("Password too short", "danger");
            $hasError = true;
        }
        if (!$hasError) {
            if ($new_password === $confirm_password) {
                //TODO validate current
                $stmt = $db->prepare("SELECT password from Users where id = :id");
                try {
                    $stmt->execute([":id" => get_user_id()]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if (isset($result["password"])) {
                        if (password_verify($current_password, $result["password"])) {
                            $query = "UPDATE Users set password = :password where id = :id";
                            $stmt = $db->prepare($query);
                            $stmt->execute([
                                ":id" => get_user_id(),
                                ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                            ]);

                            flash("Password reset", "success");
                        } else {
                            flash("Current password is invalid", "warning");
                        }
                    }
                } catch (Exception $e) {
                    echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
                }
            } else {
                flash("New passwords don't match", "warning");
            }
        }
    }
}

?>
<?php
$email = get_user_email();
$username = get_username();
$id = se($_GET, "id", -1, false);
$userList = [];
$bool = true;
$checkVisibility = getV(get_user_id());
if($id > -1)
{
    $bool = false;
    $db = getDB();
    $query = "SELECT email, username, created, fname, lname, Public from Users WHERE id = :id";
    $stmt = $db->prepare($query);
    try 
    {
        $stmt->execute([":id" => $id]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        if($results) 
        {
            $userList = $results;
            $username = se($userList, "username", "", false);
        }
    } 
    catch (PDOException $e) 
    {
        error_log("Error looking up user recipients profile: " . var_export($e->errorInfo, true));
    }
}
//loop to get firstname and lastname 
$firstname = "";
$lastname = "";
$db = getDB();
$stmt = $db->prepare("SELECT fname,lname from Users where id = :id");
$stmt->execute([":id" => get_user_id()]);
$output = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($output as $name):
    $firstname = se($name, "fname","", false);
    $lastname = se($name, "lname","", false);
endforeach;
?>

<div class="container-fluid">
    <?php if ($bool) : ?>
    <h1>Profile</h1>
    <form method="POST" onsubmit="return validate(this);">
    <?php if($checkVisibility == 1): ?>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="checked" id="private" value="0">
            <label class="form-check-label" for="private_label">
                Private
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="checked" id="public" value="1" checked>
            <label class="form-check-label" for="public_label">
                Public
            </label>
            </div>
    <?php endif; ?>
    <?php if($checkVisibility == 0): ?>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="checked" id="private" value="0" checked>
            <label class="form-check-label" for="private_label">
                Private
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="checked" id="public" value="1">
            <label class="form-check-label" for="public_label">
                Public
            </label>
            </div>
    <?php endif; ?>

        <div class="mb-3">
            <label class="form-label" for="fname">First Name</label>
            <input class="form-control" type="text" name="fname" id="fname" value="<?php se($firstname); ?>" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="lname">Last Name</label>
            <input class="form-control" type="text" name="lname" id="lname" value="<?php se($lastname); ?>" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="<?php se($email); ?>" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" value="<?php se($username); ?>" />
        </div>
        <!-- DO NOT PRELOAD PASSWORD -->
        <div class="mb-3">Password Reset</div>
        <div class="mb-3">
            <label class="form-label" for="cp">Current Password</label>
            <input class="form-control" type="password" name="currentPassword" id="cp" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="np">New Password</label>
            <input class="form-control" type="password" name="newPassword" id="np" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="conp">Confirm Password</label>
            <input class="form-control" type="password" name="confirmPassword" id="conp" />
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Update Profile" name="save" />
    </form>


    <?php else: ?>
        <h1><?php echo ("Recipients Profile"); ?> </h1>
        <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Username
            </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body"><?php se($userList, "username") ?></div>
            </div>
        </div>
        <?php if(getV($_GET["id"]) == 1): ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Email
            </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body"><?php se($userList, "email") ?></div>
            </div>
        </div>
    <?php endif; ?>

        <?php if(getV($_GET["id"]) == 0): ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Email
            </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Unable to View. This User is Private.</div>
            </div>
        </div>
        <?php endif; ?>


        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                First and Last Name
            </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body"> <?php se($userList, "fname") ?> <?php se($userList, "lname") ?> </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                Date <?php se($userList, "fname") ?> Joined
            </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body"> <?php se($userList, "created") ?> </div>
            </div>
        </div>
        </div>
    <?php endif; ?>
</div>

<?php
    if (isset($_POST["fname"]) && isset($_POST["lname"]))
    {
        $finalFname = se($_POST, "fname", "", false);
        $finalLname = se($_POST, "lname", "", false);
        name($finalFname, $finalLname);
        $isChecked = se($_POST, "checked", "", false);
        setV($isChecked);
    }
?>
<script>
    function validate(form) {
        let pw = form.newPassword.value;
        let con = form.confirmPassword.value;
        let isValid = true;
        //TODO add other client side validation....

        //example of using flash via javascript
        //find the flash container, create a new element, appendChild
        if (pw !== con) {
            flash("Password and Confrim password must match", "warning");
            isValid = false;
        }
        return isValid;
    }
</script>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>