<?php
    require(__DIR__ . "/../../partials/nav.php");
?>

<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="email">Emai</label>
        <input type="email" name="email" required />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <div>
        <label for="confirm">Confirm</label>
        <input type="password" name="confirm" required minlength="8" />
    </div>
    <input type="submit" value="Register" />
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        return true;
    }
</script>
<?php
 //TODO 2: add PHP Code
 if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se($_POST, "confirm", "", false);
    //TODO 3

    //sanitize
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    //validate
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "Invalid email address";
        $hasError = true;
    }
    $hasError = false;
    if (empty($email)) {
        echo "Email must not be empty";
        $hasError = true;
    }
    if (empty($password)) {
        echo "Password must not be empty";
        $hasError = true;
    }
    if (empty($confirm)) {
        echo "Confirm Password must not be empty";
        $hasError = true;
    }
    if (strlen($password) < 8) {
        echo "Password too short";
        $hasError = true;
    }
    if (strlen($password) > 0 && $password !== $confirm) {
        echo "Passwords must match";
        $hasError = true;
    }
    if (!$hasError){
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users(email, password) VALUES(:email, :password)");
        try{
            $r = $stmt->execute([":email"=>$email, ":password"=>$hash]);
            echo "Successfully Registered";
        }
        catch(Exception $e)
        {
            echo "There was a problem registering<br>";
            echo "<pre>" . var_export($e, true) . "</pre>";
        }
    }
}
?>