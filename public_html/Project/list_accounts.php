<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
$user_id = get_user_id();
$query = "SELECT id, account_number, account_type, modified, balance from Accounts WHERE user_id = $user_id ORDER BY modified desc LIMIT 5";
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

?>
<div class="container-fluid">
    <h1>Accounts</h1>
    <table class="table">
        <thead>
            <th>Account Number</th>
            <th>Account Type</th>
            <th>Modified</th>
            <th>Balance</th>
        </thead>
        <tbody>
            <?php if (empty($accs_list)) : ?>
                <tr>
                    <td colspan="100%">No Accounts</td>
                </tr>
            <?php else : ?>
                <?php foreach ($accs_list as $acc) : ?>
                    <tr>
                        <td><a href="transaction_history.php?id=<?php echo se($acc, "id");?>&acc_num=<?php echo se($acc, "account_number");?>"> <?php se($acc, "account_number"); ?></a></td>
                        <td><?php se($acc, "account_type"); ?></td>
                        <td><?php se($acc, "modified"); ?></td>
                        <td><?php se($acc, "balance"); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>