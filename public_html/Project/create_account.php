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
            <select id="account_type" name="account_type" class="form-select">
                <option>Checking</option>
                <option>Savings</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="minimum_deposit">Minimum Deposit Required</label>
            <input class="form-control" type="text" id="deposit" name="deposit" required value="5" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="pw">Password</label>
            <input class="form-control" type="password" id="pw" name="password" required minlength="8" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="confirm">Confirm</label>
            <input class="form-control" type="password" name="confirm" required minlength="8" />
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Create" />
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
        $deposit = se($_POST, "deposit", "", false);
        $hasError = false;

        if ($deposit < 5) {
            flash("Deposit requires a minimum of $5 for account to be created", "danger");
            $hasError = true;
        }

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
                
                $account = ["id" => -1, "account_number" => false, "balance" => 0];
                $query = "SELECT id, account_number, balance from Accounts where user_id = :uid LIMIT 1";
                $db = getDB();
                $stmt = $db->prepare($query);
                try {
                    $stmt->execute([":uid" => get_user_id()]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $user_id = get_user_id(); // caching a reference
                    $account_type = se($_POST, "account_type", "", false);
                    $deposit = se($_POST, "deposit", "", false);
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
                            $account["id"] = $db->lastInsertId();
                            flash("Welcome! Your account was created successfully", "success");
                            makeInitDeposit($deposit, "Deposit", -1, $account["id"], "Initial Deposit when First Account Created");
                            if($account_type == "Savings")
                            {
                                usersavingsAPY($account["id"]);
                            }
                            die(header("Location: list_accounts.php"));
                        } catch (PDOException $e) {
                            flash("An error occurred creating your account", "danger");
                            error_log(var_export($e, true));
                        }
                    }
                    else {
                        $query = "INSERT INTO Accounts (account_number, account_type, user_id) VALUES (:an, :at, :uid)";
                        $user_id = get_user_id();
                        $account_number = generateRandomNumber(12);
                        $stmt = $db->prepare($query);
                        $stmt->execute([":an" => $account_number, ":at" => $account_type, ":uid" => $user_id]);
                        $account["id"] = $db->lastInsertId();
                        flash("Welcome! Your account was created successfully", "success");
                        makeInitDeposit($deposit, "Deposit", -1, $account["id"], "Initial Deposit when First Account Created");
                        if($account_type == "Savings")
                        {
                            usersavingsAPY($account["id"]);
                        }
                        die(header("Location: list_accounts.php"));
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