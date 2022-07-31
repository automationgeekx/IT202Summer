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
function get_id($account_number)
{
    $query = "SELECT id from Accounts WHERE account_number = :accnumber";
    $db = getDB();
    $stmt = $db->prepare($query);
    try
    {
        $stmt->execute([":accnum" => $account_number]);
        $returnStatement = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($returnStatement)
        {
            return (int)se($returnStatement, "id", 0, false);
        }
    }
    catch (PDOException $e)
    {
        error_log("Error getting id for user: " . var_export($e->errorInfo, true));
        flash("Error getting id", "danger");
    }
    return 0;
}
# create a function to get the account number
function get_accnum($id_num)
{
    $query = "SELECT account_number from Accounts WHERE id = :id";
    $db = getDB();
    $stmt = $db->prepare($query);
    try
    {
        $stmt->execute([":id" => $id_num]);
        $returnStatement = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($returnStatement)
        {
            return (int)se($returnStatement, "account number", 0, false);
        }
    }
    catch (PDOException $e)
    {
        error_log("Error getting account number for user: " . var_export($e->errorInfo, true));
        flash("Error getting acc num", "danger");
    }
    return 0;
}