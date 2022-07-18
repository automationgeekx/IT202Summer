<?php
function get_specific_account_balance($account_number)
{
    $query = "SELECT balance from Accounts WHERE account_number = :an";
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute([":an" => $account_number]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            return (int)se($r, "balance", 0, false);
        }
    } catch (PDOException $e) {
        error_log("Error getting balance for user: " . var_export($e->errorInfo, true));
        flash("Error getting balance", "danger");
    }
    return 0;
}