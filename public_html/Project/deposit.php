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
$accounts = [];
$stmt->execute($params);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$accounts = $results;
?>


<div class="container-fluid">
<h1>Make Deposit</h1>
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
      <label for="deposit_amount" class="form-label">Deposit Amount</label>
      <input type="text" id="amount" name="amount" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Deposit</button>
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
        $query = "SELECT id, balance From Accounts WHERE account_number = $account";
        $db = getDB();
        $params = null;
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id = "";
        $balance = 0;
        foreach ($results as $id) :
          $id = se($id, "id","",false); 
          $balance = se($id, "balance","",false); 
        endforeach;
        $hasError = false;

        if($amount <= 0) {
            flash("Desposit Has to be more than $0", "danger");
            $hasError = true; 
        }
        if(!$hasError)
            {
            makeDeposit($account, $amount, "Deposit", -1, $id, "Account Holder Made Deposit");
            flash("Deposit Made", "Success");
            }
    }
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>