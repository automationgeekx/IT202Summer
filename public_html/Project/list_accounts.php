<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
$user_id = get_user_id();
$query = "SELECT id, account_number, account_type, isopenedorclosed, modified, balance, last_calc_apy from Accounts WHERE user_id = $user_id ORDER BY modified desc LIMIT 8";
$db = getDB();
$parameters = null;
$stmt = $db->prepare($query);
$accs_list = [];
try {
    $stmt->execute($parameters);
    $x = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($x) {
        $accs_list = $x;
        

    } else {
        flash("No Accounts found", "warning");
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}
$isLoans = [];
$isNotLoans = [];
foreach($accs_list as $acc):
{
    if($acc["isopenedorclosed"] == 1)
    {
        if($acc["account_type"] == "Loan")
        {
            array_push($isLoans, $acc);
        }
        else{
            array_push($isNotLoans, $acc);
        }
    }
}
endforeach;

?>
<div class="container-fluid">
    <h1>Accounts</h1>
    <table class="table">
        <thead>
            <th>Account Number</th>
            <th>Account Type</th>
            <th>Modified</th>
            <th>Balance</th>
            <th>APY</th>
        </thead>
        <tbody>
            <?php if (empty($isNotLoans)) : ?>
                <tr>
                    <td colspan="100%">No Accounts</td>
                </tr>
            <?php else : ?>
                <?php foreach ($isNotLoans as $acc) : ?>
                    <tr>
                        <td><a href="transaction_history.php?id=<?php echo se($acc, "id");?>&acc_num=<?php echo se($acc, "account_number");?>"> <?php se($acc, "account_number"); ?></a></td>
                        <td><?php se($acc, "account_type"); ?></td>
                        <td><?php se($acc, "modified"); ?></td>
                        <td><?php se($acc, "balance"); ?></td>
                        <td><?php se($acc, "last_calc_apy"); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <table class="table">
        <thead>
            <th>Account Number</th>
            <th>Account Type</th>
            <th>Modified</th>
            <th>Balance</th>
            <th>APY</th>
        </thead>
        <tbody>
            <?php if (empty($isLoans)) : ?>
                <tr>
                    <td colspan="100%">No Loans Open</td>
                </tr>
            <?php else : ?>
                <?php foreach ($isLoans as $loansAcc) : ?>
                    <tr>
                        <td><a href="transaction_history.php?id=<?php echo se($acc, "id");?>&acc_num=<?php echo se($acc, "account_number");?>"> <?php se($acc, "account_number"); ?></a></td>
                        <td><?php se($loansAcc, "account_type"); ?></td>
                        <td><?php se($loansAcc, "modified"); ?></td>
                        <td><?php se($loansAcc, "balance"); ?></td>
                        <td><?php se($loansAcc, "last_calc_apy"); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>