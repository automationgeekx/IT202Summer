<?php
function refresh_account_balance($acc_id)
{
    if (is_logged_in()) {
        $query = "UPDATE Accounts set balance = (SELECT IFNULL(SUM(balance_change), 0) from Transactions WHERE account_src = :src) where id = :src";
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([":src" => $acc_id]);
            flash("Balance Updated", "success");
        } catch (PDOException $e) {
            error_log(var_export($e->errorInfo, true));
            flash("Error refreshing Balance", "danger");
        }
    }
}