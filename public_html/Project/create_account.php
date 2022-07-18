<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<?php
if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
?>

<div class="container-fluid">
    <h1>Create Account</h1>
    <form onsubmit="return validate(this)" method="POST">
        <div class="mb-3">
            <label class="form-label" for="account_type">Account Type</label>
            <input class="form-control" type="text" id="acc_type" name="acc_type" required value="Checking" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="pw">Password</label>
            <input class="form-control" type="password" id="pw" name="password" required minlength="8" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="confirm">Confirm</label>
            <input class="form-control" type="password" name="confirm" required minlength="8" />
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Submit" />
    </form>
</div>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success

        return true;
    }
</script>
<?php
    if (isset($_POST["password"]) && isset($_POST["confirm"])) 
    {
        $password = se($_POST, "password", "", false);
        $confirm = se($_POST, "confirm", "", false);
        $hasError = false;
        if (empty($password)) {
            flash("password must not be empty", "danger");
            $hasError = true;
        }
        if (empty($confirm)) {
            flash("Confirm password must not be empty", "danger");
            $hasError = true;
        }
        if (!is_valid_password($password)) {
            flash("Password too short", "danger");
            $hasError = true;
        }
        if (
            strlen($password) > 0 && $password !== $confirm
        ) {
            flash("Passwords must match", "danger");
            $hasError = true;
        }
        if(!$hasError)
            {
                //let's define our data structure first
                //id is for internal references, account_number is user facing info, and balance will be a cached value of activity
                $account = ["id" => -1, "account_number" => false, "balance" => 0];
                //this should always be 0 or 1, but being safe
                $query = "SELECT id, account_number, balance from Accounts where user_id = :uid LIMIT 1";
                $db = getDB();
                $stmt = $db->prepare($query);
                try {
                    $stmt->execute([":uid" => get_user_id()]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $user_id = get_user_id(); // caching a reference
                    $account_type = se($_POST, "acc_type", "", false);
                    $query = "INSERT INTO Accounts (account_type, user_id) VALUES (:at, :uid)";
                    $stmt = $db->prepare($query);
                    if (!$result) {
                        // If the account doesn't exist, create it
                        try {
                            $query = "INSERT INTO Accounts (account_number, account_type, user_id) VALUES (:an, :at, :uid)";
                            $user_id = get_user_id();
                            $account_number = generateRandomNumber(12);
                            $stmt = $db->prepare($query);
                            $stmt->execute([":an" => $account_number, ":at" => $account_type, ":uid" => $user_id]);
                            flash("Welcome! Your account was created successfully", "success");
                        } catch (PDOException $e) {
                            flash("An error occurred creating your account", "danger");
                            error_log(var_export($e, true));
                        }
                    } 
                } catch (PDOException $e) {
                    flash("Technical error: " . var_export($e->errorInfo, true), "danger");
                }
                $_SESSION["user"]["account"] = $account;
            }
        }
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>