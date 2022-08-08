<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<?php
if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
?>
<?php
$user_id = get_user_id();
$query = "SELECT account_type, `isopenedorclosed`, account_number, id, balance from Accounts WHERE user_id = $user_id ORDER BY modified desc";
$db = getDB();
$params = null;
$stmt = $db->prepare($query);
$accsList = [];
$stmt->execute($params);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$accsList = $results;
$loanList = [];
$tempList = [];
foreach($accsList as $accs):
{
    if($accs["isopenedorclosed"] == 1)
        if($accs["account_type"] == "Loan")
        {
            array_push($loanList, $accs);
        }
        else
        {
            array_push($tempList, $accs);
        }
}
endforeach;
?>
<div class="container-fluid">
    <h1>Close Your Account</h1>
    <form onsubmit="return validate(this)" method="POST"> 
        <div class="mb-3">
            <label for="acc_src" class="form-label">You are attempting to close your account. You will no longer have access</label>
            <select id="account" name="account" class="form-select">
                <?php foreach ($tempList as $accs) : ?>
                    <option> <?php se($accs, "account_number"); ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="pw">Password</label>
            <input class="form-control" type="password" id="pw" name="password" required minlength="8" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="confirm">Confirm</label>
            <input class="form-control" type="password" name="confirm" required minlength="8" />
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Close" />
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
        $accs = se($_POST, "account", "", false);
        $balance = get_specific_account_balance($accs);
        $source_id = get_id($accs);
        $password = se($_POST, "password", "", false);
        $confirm = se($_POST, "confirm", "", false);
        $hasError = false;

        if($balance != 0)
        {
            flash("Account Balance has to be 0 to be able to Close Account", "danger");
            $hasError = true;
        }

        if (empty($password)) {
            flash("password cannot be empty", "danger");
            $hasError = true;
        }

        if (empty($confirm)) {
            flash("Confirm cannot be empty", "danger");
            $hasError = true;
        }
        if (!is_valid_password($password)) {
            flash("Password is too short", "danger");
            $hasError = true;
        }
        if (
            strlen($password) > 0 && $password !== $confirm
        ) {
            flash("Passwords do not match", "danger");
            $hasError = true;
        }
        if(!$hasError)
        {
            flash("Success", "success");
            closeAccount($accs);

        }
    }
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>