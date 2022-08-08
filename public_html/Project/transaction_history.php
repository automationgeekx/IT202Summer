<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

    $acc_num = $_GET["acc_num"];
    $query = "SELECT account_number, account_type, balance, last_calc_apy, created from Accounts WHERE account_number = $acc_num";
    $db = getDB();
    $params = null;
    $stmt = $db->prepare($query);
    $accs_list = [];
    try {
        $stmt->execute($params);
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
    $totalQ = "SELECT count(1) as total FROM Transactions B WHERE 1";
    $databaseQ = "SELECT B.id, B.account_src, B.account_dest, B.expected_total, B.created, B.balance_change, B.transaction_type, B.memo AS A1 FROM Transactions B JOIN Accounts A1 on A1.id = B.account_src JOIN Accounts A2 on A2.id = B.account_dest WHERE 1";
    $startDate = se($_GET, "start", date("Y-m-d", strtotime("-1 month")), false);
    $endDate = se($_GET, "end", date("Y-m-d"), false);
    $dataType = se($_GET, "type", false, false);
    $params = [];    

    if ($startDate) {
        $totalQ .= " AND B.created >= :startDate";
        $databaseQ .= " AND B.created >= :startDate";
        $params[":startDate"] = $startDate;
    }

    if ($endDate) {
        $totalQ .= " AND B.created <= :endDate";
        $databaseQ .= " AND B.created <= :endDate";
        $params[":endDate"] = date("Y-m-d 23:59:59", strtotime($endDate));
    }

    if ($dataType && $dataType !== "") {
        $totalQ .= " AND transaction_type = :type";
        $databaseQ .= " AND transaction_type = :type";
        $params[":type"] = $dataType;
    }

    $totalQ .= " AND account_src = :source";
    $databaseQ .= " AND account_src = :source";
    $params[":source"] = $id;

    switch ($dataType) {
        case "+date":
            $totalQ .= " ORDER BY created asc";
            $databaseQ .= " ORDER BY created asc";
            break;
        case "-date":
            $totalQ .= " ORDER BY created desc";
            $databaseQ .= " ORDER BY created desc";
            break;
        default:
            $totalQ .= " ORDER BY created desc";
            $databaseQ .= " ORDER BY created desc";
            break;
    }

    $resultpp = 5; 
    $trpp = 0; 
    $db = getDB();
    $stmt = $db->prepare($totalQ);
    try {
        $stmt->execute($params);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($results) 
        {
            $trpp = $results["total"];
        } 
    } catch (PDOException $e) {
        error_log("Error getting total records: " . var_export($e->errorInfo, true));
    }

    $page = se($_GET, "page", 1, false);
    if ($page < 1) 
    {
        $page = 1;
    }
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $offset = ($page - 1) * $resultpp;
    $databaseQ .= " LIMIT :offset, :limit";
    $transactions = [];
    $stmt = $db->prepare($databaseQ);
    try 
    {
        $params[":offset"] = $offset;
        $params[":limit"] = $resultpp;
        $stmt->execute($params);
        $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    catch (PDOException $e) 
    {
        error_log("Error " . var_export($e->errorInfo, true));
        flash("There was a problem try again", "warning");
    }
    $total_pages = ceil($trpp/$resultpp);
    


?>

<div class="container-fluid">
    <?php foreach ($accs_list as $acc) : ?>
    <h1><?php se($acc, "account_number"); ?></h1>
    <table class="table">
        <thead>
            <th>Account Number</th>
            <th>Account Type</th>
            <th>Balance</th>
            <th>APY</th>
            <th>Opened / Created</th>
        </thead>
        <tbody>
            <?php if (empty($accs_list)) : ?>
                <tr>
                    <td colspan="100%">No Accounts</td>
                </tr>
                <?php else : ?>
                <?php foreach ($accs_list as $acc) : ?>
                    <tr>
                        <td><?php se($acc, "account_number"); ?></td>
                        <td><?php se($acc, "account_type"); ?></td>
                        <td><?php se($acc, "balance"); ?></td>
                        <td><?php se($acc, "last_calc_apy"); ?></td>
                        <td><?php se($acc, "created"); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php endforeach; ?>

    <h1>Transaction History</h1>
    <form>
            <div class="input-group mb-3">
                <span class="input-group-text" id="start-date">Start Date</span>
                <input name="start" type="date" class="form-control" placeholder="mm/dd/yyyy" aria-label="start date" aria-describedby="start-date" value="<?php se($startDate); ?>">
                <span class="input-group-text" id="end-date">End Date</span>
                <input name="end" type="date" class="form-control" placeholder="mm/dd/yyyy" aria-label="end date" aria-describedby="end-date" value="<?php se($endDate); ?>">
                <span class="input-group-text" id="filter">Transaction Type</span>
                <select class="form-control" name="type" aria-label="filter" aria-describedby="filter">
                    <option value="" readonly></option>
                    <option value="ext-transfer">Ext-Transfer</option>
                    <option value="deposit">Deposit</option>
                    <option value="withdraw">Withdraw</option>
                    <option value="transfer">Transfer</option>
                    <option value="loan transfer">Loan Transfer</option>
                    <option value="loan payment">Loan Payment</option>
                </select>

            </div>
            <input type="submit" class="btn btn-primary" value="Filter" />
            <input type="hidden" id="acc_num" name="acc_num" value="<?php echo $acc_num;?>">
            <input type="hidden" id="id" name="id" value="<?php echo $id;?>">

        </form>

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
            <?php if (empty($transactions)) : ?>
                <tr>
                    <td colspan="100%">No Transactions</td>
                </tr>
            <?php else : ?>
                <?php foreach ($transactions as $transaction) : ?>
                    <tr>
                        <td><?php se($transaction, "transaction_type"); ?></td>
                        <?php if (se($transaction, "transaction_type", "", false) == "Withdraw") : ?>
                            <td><?php echo (get_accnum(se($transaction, "account_src","",false))); ?></td>
                            <td><?php echo (get_accnum(se($transaction, "account_dest","",false))); ?></td>
                        <?php elseif (se($transaction, "transaction_type", "", false) == "Loan Payment") : ?>
                            <td><?php echo (get_accnum(se($transaction, "account_src","",false))); ?></td>
                            <td><?php echo (get_accnum(se($transaction, "account_dest","",false))); ?></td>
                        <?php else : ?>
                            <td><?php echo (get_accnum(se($transaction, "account_dest","",false))); ?></td>
                            <td><?php echo (get_accnum(se($transaction, "account_src","",false))); ?></td>
                        <?php endif; ?>
                        <td><?php se($transaction, "balance_change"); ?></td>
                        <td><?php se($transaction, "created"); ?></td>
                        <td><?php se($transaction, "expected_total"); ?></td>
                        <td><?php se($transaction, "A1"); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <div>
        <?php include(__DIR__ . "/../../partials/paginate.php"); ?>
    </div>
</div>

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>