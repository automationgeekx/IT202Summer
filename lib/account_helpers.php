<?php
function get_specific_account_balance($account_number)
{
    # changed parameter names for conciseness
    $query = "SELECT balance from Accounts WHERE account_number = :accnum";
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute([":accnum" => $account_number]);
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

# create a function to get the account id
# create a function to get the account number