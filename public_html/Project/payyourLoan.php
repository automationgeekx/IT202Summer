<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<?php
$user_id = get_user_id();
$query = "SELECT * from Accounts WHERE user_id = $user_id ORDER BY modified desc";
$db = getDB();
$params = null;
$stmt = $db->prepare($query);
$accs_list = [];
$stmt->execute($params);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$accs_list = $results;
$isLoansAccount = [];
$isNotLoansAccount = [];
foreach($accs_list as $acc):
{
    if($acc["frozen"] == 0)  
    { 
        if($acc["isopenedorclosed"] == 1)
            if($acc["account_type"] == "Loan")
            {
                array_push($isLoansAccount, $acc);
            }
            else
            {
                array_push($isNotLoansAccount, $acc);
            }
    }
}
endforeach;
?>


<div class="container-fluid">
<h1>Make A Loan Payment</h1>
<form onsubmit="return validate(this)" method="POST">
    <div class="mb-3">
      <label for="account_type_label" class="form-label">Loan</label>
      <select id="loanacc" name="loanacc" class="form-select">
        <?php foreach ($isLoansAccount as $acc) : ?>
            <option> <?php se($acc, "account_number"); ?> </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="account_type_label" class="form-label">Account</label>
      <select id="account" name="account" class="form-select">
        <?php foreach ($isNotLoansAccount as $acc) : ?>
            <option> <?php se($acc, "account_number"); ?> </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="deposit_amount" class="form-label">Payment Amount</label>
      <input type="text" id="amount" name="amount" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Pay</button>
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
        $payment = se($_POST, "amount", "", false);
        $account_source = se($_POST, "account", "", false);
        $account_destination = se($_POST, "loanacc", "", false);
        $balance = get_specific_account_balance($account_source);
        $loan_balance = get_specific_account_balance($account_destination);
        $destination_id = get_id($account_destination);
        $source_id = get_id($account_source);
        $hasError = false;

        if($payment <= 0) {
            flash("Payment must be more than $0", "danger");
            $hasError = true; 
        }

        if($payment > $loan_balance)
        {
            flash("Payment is greater than Loan Balance", "danger");
            $hasError = true; 
        }


        if($payment > $balance) {
            flash("Can't Withdraw More Than what is Owed", "danger");
            $hasError = true; 
        }

        if(strlen($account_destination) == 0) {
            flash("No Loan To Pay Off", "danger");
            $hasError = true; 
        }

        if(!$hasError)
            {
                payLoan($account_destination, $payment, "Loan Payoff", $source_id, $destination_id, "Loan Payment");
                flash("Payment Made", "Success");
            }
    }
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>