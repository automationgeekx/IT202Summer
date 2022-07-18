<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

    $acc_num = $_GET["acc_num"];
    $query = "SELECT account_number, account_type, balance, created from Accounts WHERE account_number = $acc_num";
    $db = getDB();
    $parameters = null;
    $stmt = $db->prepare($query);
    $accs_list = [];
    try {
        $stmt->execute($parameters);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $accs_list = $results;
        } else {
            flash("No Accounts found", "warning");
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

?>

<?php
    $id = $_GET["id"];
    $trans_query = "SELECT A.account_number as account_src, B.account_number as account_dest, transaction_type, balance_change, T.created, expected_total, memo FROM Transactions as T JOIN Accounts as A ON A.id = T.account_src JOIN Accounts as B ON B.id = T.account_dest WHERE T.account_src = $id ORDER BY T.modified desc LIMIT 10";
    $db = getDB();
    $parameters = null;
    $stmt = $db->prepare($trans_query);
    $transactions_list = [];
    try {
        $stmt->execute($parameters);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $transactions_list = $results;
        } else {
            flash("No Transactions found", "warning");
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }
?>

<div class="container-fluid">
    <?php foreach ($accs_list as $accs) : ?>
    <h1><?php se($accs, "account_number"); ?></h1>
    <table class="table">
        <thead>
            <th>Account Number</th>
            <th>Account Type</th>
            <th>Balance</th>
            <th>Opened / Created</th>
        </thead>
        <tbody>
            <?php if (empty($accs_list)) : ?>
                <tr>
                    <td colspan="100%">No Accounts</td>
                </tr>
                <?php else : ?>
                <?php foreach ($accs_list as $accs) : ?>
                    <tr>
                        <td><?php se($accs, "account_number"); ?></td>
                        <td><?php se($accs, "account_type"); ?></td>
                        <td><?php se($accs, "balance"); ?></td>
                        <td><?php se($accs, "created"); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php endforeach; ?>

    <h1>Transaction History</h1>
    <table class="table">
        <thead>
            <th>Transaction Type</th>
            <th>Source</th>
            <th>Destination</th>
            <th>Balance Change</th>
            <th>Time</th>
            <th>Expected Total</th>
            <th>Memo</th>
        </thead>
        <tbody>
            <?php if (empty($transactions_list)) : ?>
                <tr>
                    <td colspan="100%">No Transactions</td>
                </tr>
            <?php else : ?>
                <?php foreach ($transactions_list as $trans) : ?>
                    <tr>
                        <td><?php se($trans, "transaction_type"); ?></td>
                        <?php if (se($trans, "transaction_type", "", false) == "Withdraw") : ?>
                            <td><?php se($trans, "account_src"); ?></td>
                            <td><?php se($trans, "account_dest"); ?></td>
                        <?php else : ?>
                            <td><?php se($trans, "account_dest"); ?></td>
                            <td><?php se($trans, "account_src"); ?></td>
                        <?php endif; ?>
                        <td><?php se($trans, "balance_change"); ?></td>
                        <td><?php se($trans, "created"); ?></td>
                        <td><?php se($trans, "expected_total"); ?></td>
                        <td><?php se($trans, "memo"); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>