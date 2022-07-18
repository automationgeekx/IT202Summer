<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<?php
$user_id = get_user_id();
$query = "SELECT account_number, id, balance from Accounts WHERE user_id = $user_id ORDER BY modified desc";
$db = getDB();
$params = null;
$stmt = $db->prepare($query);
$accounts = [];
$stmt->execute($params);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$accounts = $results;
?>

<div class="container-fluid">
<h1>Withdraw</h1>
<form onsubmit="return validate(this)" method="POST">
    <div class="mb-3">
      <label for="which_account" class="form-label">Account</label>
      <select id="account" name="account" class="form-select">
        <?php foreach ($accounts as $account) : ?>
            <option> <?php se($account, "account_number"); ?> </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="deposit_amount" class="form-label">Wthdraw Amount</label>
      <input type="text" id="amount" name="amount" class="form-control" >
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a memo here" id="memoTextarea" name="memoTextArea"></textarea>
        <label for="memoTextarea">Memo (Optional)</label>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Withdraw</button>
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
    if (isset($_POST["amount"]) && isset($_POST["account"]))  
    {
        $amount = se($_POST, "amount", "", false);
        $account = se($_POST, "account", "", false);
        $memo = se($_POST, "memoTextArea", "", false);
        $query = "SELECT id, balance From Accounts WHERE account_number = $account";
        $db = getDB();
        $params = null;
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id = "";
        $balance = 0;
        foreach ($results as $id) :
                $balance = se($id, "balance","",false); 
                $id = se($id, "id","",false); 
        endforeach;
        $hasError = false;

        if((strlen($memo) == 0)) {
            $memo = "User Made Withdrawal";
        }

        if($amount <= 0) {
            flash("Requirement: Withdrawal amount has to be more than $0", "danger");
            $hasError = true; 
        }
        if($amount > $balance) {
            flash("Error: Cannot Withdraw, Unneccessary Funds", "danger");
            $hasError = true; 
        }

        if(!$hasError)
            {
                makeWithdraw($account, $amount, "Withdraw", $id, -1, $memo);
                flash("Withdrawal was Successful", "Success");
            }
    }
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>