<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<?php
$user_id = get_user_id();
$query = "SELECT account_number, id, balance from Accounts WHERE user_id = $user_id ORDER BY modified desc LIMIT 5";
$db = getDB();
$params = null;
$stmt = $db->prepare($query);
$accountsList = [];
$stmt->execute($params);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$accountsList = $results;
?>


<div class="container-fluid">
<h1> External Transfer</h1>
<form onsubmit="return validate(this)" method="POST">
    <div class="mb-3">
      <label for="acc_src" class="form-label">Source Account</label>
      <select id="account" name="account_src" class="form-select">
        <?php foreach ($accountsList as $accs) : ?>
            <option> <?php se($accs, "account_number"); ?> </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="acc_dest" class="form-label">Destination Account</label>
      <select id="account" name="account_dest" class="form-select">
        <?php foreach ($accountsList as $accs) : ?>
            <option> <?php se($accs, "account_number"); ?> </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="deposit_amount" class="form-label">Transfer Fund Amount</label>
      <input type="text" id="amount" name="amount" class="form-control" >
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Start Typing..." id="memo" name="memo"></textarea>
        <label for="memo">Memo</label>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Transfer</button>
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
    if (isset($_POST["amount"]) && isset($_POST["account_src"]) && isset($_POST["account_dest"])) 
    {
        $amount = se($_POST, "amount", "", false);
        $accountsource = se($_POST, "account_src", "", false);
        $accountdestination = se($_POST, "account_dest", "", false);
        $memo = se($_POST, "memo", "", false);
        $balance = get_specific_account_balance($accountsource);
        $destination = get_id($accountdestination);
        $source = get_id($accountsource);
        $hasError = false;


        if((strlen($memo) == 0)) {
            $memo = $source."Made A Withdrawal";
        }

        if($accountsource === $accountdestination)
        {
            flash("Same account, cannot make the transfer. Select a different source or destination account", "danger");
            $hasError = true;
        }

        if($amount > $balance) {
            flash("Error. Cannot transfer money. Insufficient Funds.", "danger");
            $hasError = true; 
        }

        if($amount <= 0) {
            flash("Error. Transfer has to be a minimum of $1", "danger");
            $hasError = true; 
        }
        if(!$hasError)
            {
            transfer($accountdestination, $amount, "Transfer", $source, $destination, $memo);
            flash("Successfully Transfered Funds", "Success");
            }
    }
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>