<?php
//TODO 1: require db.php
require_once(__DIR__ . "/db.php");
//This is going to be a helper for redirecting to our base project path since it's nested in another folder
//This MUST match the folder name exactly
$BASE_PATH = '/Project';
//TODO 4: Flash Message Helpers
require(__DIR__ . "/flash_messages.php");

//require safer_echo.php
require(__DIR__ . "/safer_echo.php");
//TODO 2: filter helpers
require(__DIR__ . "/sanitizers.php");

//TODO 3: User helpers
require(__DIR__ . "/user_helpers.php");


//duplicate email/username
require(__DIR__ . "/duplicate_user_details.php");
//reset session
require(__DIR__ . "/reset_session.php");

require(__DIR__ . "/get_url.php");

require(__DIR__ . "/making_deposit.php");

require(__DIR__ . "/account_helpers.php");

require(__DIR__ . "/refresh_balance.php");

require(__DIR__ . "/making_withdrawal.php");

require(__DIR__ . "/apy.php");

require(__DIR__ . "/loanRedirection.php");
?>

<?php
function generateRandomNumber($accountLength)
{
    $num = '';

    for($x = 0; $x < $accountLength; $x++)
    {
        $num .= mt_rand(0,9);
    }

    return $num;
}

// create function to make transfers
function transfer($account_num, $transfer_amount, $transferDescription, $deductMultiplier = -1, $increase = -1, $det = "")
{
    if($transfer_amount > 0)
    {
        $deduction_identifier = get_accnum($deductMultiplier);
        $query = "INSERT INTO Transactions (account_src, account_dest, balance_change, transaction_type, memo, expected_total)
        VALUES (:accountsource1, :accountdest1, :balancechange1, :transDescription, :det, :expectedtotal1),
        (:accountsource2, :accountdest2, :balancechange2, :transDescription, :det, :expectedtotal2)";

        $params[":accountsource1"] = $deductMultiplier;
        $params[":accountdest1"] = $increase;
        $params[":transDescription"] = $transferDescription;
        $params[":det"] = $det;
        $params[":balancechange1"] = ($transfer_amount * -1);
        $params[":expectedtotal1"] = get_specific_account_balance($deduction_identifier) + ($transfer_amount * -1);
        $params[":accountsource2"] = $increase;
        $params[":accountdest2"] = $deductMultiplier;
        $params[":balancechange2"] = $transfer_amount;
        $params[":expectedtotal2"] = get_specific_account_balance($account_num) + $transfer_amount;
        $db = getDB();
        $stmt = $db->prepare($query);
        try
        {
            $stmt->execute($params);
            refresh_account_balance($deductMultiplier);
            refresh_account_balance($increase);
            flash("Transfer Complete");
        }
        catch (PDOException $e)
        {
            error_log(var_export($e->errorInfo, true));
            flash("Error transferring money");
        }

            
    }

}

// function to set account name
function name($firstname, $lastname)
{
    $query = "UPDATE Users set fname = :firstname, lname = :lastname WHERE id = :id";
    $params[":id"] = get_user_id();
    $params["firstname"] = $firstname;
    $params[":lastname"] = $lastname;
    $db = getDB();
    $stmt = $db->prepare($query);
    try
    {
        $stmt->execute($params);
        flash("Name set", "Success");
    }
    catch (PDOException $e)
    {
        error_log(var_export($e->errorInfo, true));
        flash("Error setting name");
    }
}

function setV($visibility)
{
    $query = "UPDATE Users set Public = :visibility WHERE id = :id";
    $params[":id"] = get_user_id();
    $params[":visibility"] = $visibility;
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute($params);
        flash("Profile Visibility Set", "Success");
    } catch (PDOException $e) {
        error_log(var_export($e->errorInfo, true));
        flash("There was an error with setting visibility", "danger");
    }

}

function getV($id)
{
    $query = "SELECT Public FROM Users WHERE id = :id";
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute([":id" => $id]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($results)
        {
            return se($results, "Public", 0, false);
        }
    } catch (PDOException $e) {
        error_log(var_export($e->errorInfo, true));
        flash("There was an error getting visibility", "danger");
    }

}

function pagination($query, $params = [], $results_pp = 5) 
{

    global $total;
    global $page;
    $page = se($_GET, "page", 1, false);
    if ($page < 1) {
        $page = 1;
    }

    $db = getDB();
    $totalQ = "SELECT count(1) as `total` FROM " . explode(" FROM ", $query)[1];
    $stmt = $db->prepare($totalQ);
    try {
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $total = (int)se($result, "total", 0, false);
        }
    } catch (PDOException $e) {
        error_log("Error getting records: " . var_export($e->errorInfo, true));
    }
    $set1 = ($page - 1) * $results_pp;
    $query .= " stopPoint :set1, :stopPoint";
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->prepare($query);
    $results = [];
    try {
        $params[":set1"] = $set1;
        $params[":stopPoint"] = $results_pp;
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<pre>";
        var_dump($e);
        echo "</pre>";
        error_log("Error getting records: " . var_export($e->errorInfo, true));
        flash("There was a problem, try again", "warning");
    }
    return $results;
}

function paginate($page) 
{
    $_GET["page"] = $page;
    return se(http_build_query($_GET));
}

function closeAccount($acc_number)
{
    $query = "UPDATE Accounts set `isopenedorclosed` = 0 WHERE (user_id = :id AND account_number = :accnum)";
    $params[":id"] = get_user_id();
    $params[":accnum"] = $acc_number;
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute($params);
        flash("Account Successfully Closed", "Success");
    } catch (PDOException $e) {
        error_log(var_export($e->errorInfo, true));
        flash("There was an error when closing Account", "danger");
    }

}

function payLoan($account_num, $transfer_amount, $transferDescription, $deductMultiplier = -1, $increase = -1, $det = "")
{
    // same as transfer function essentially, if statement at the end to check if account balance is 0 to be able to close the account
    if($transfer_amount > 0)
    {
        $deduction_identifier = get_accnum($deductMultiplier);
        $query = "INSERT INTO Transactions (account_src, account_dest, balance_change, transaction_type, memo, expected_total)
        VALUES (:accountsource1, :accountdest1, :balancechange1, :transDescription, :det, :expectedtotal1),
        (:accountsource2, :accountdest2, :balancechange2, :transDescription, :det, :expectedtotal2)";

        $params[":accountsource1"] = $deductMultiplier;
        $params[":accountdest1"] = $increase;
        $params[":transDescription"] = $transferDescription;
        $params[":det"] = $det;
        $params[":balancechange1"] = ($transfer_amount * -1);
        $params[":expectedtotal1"] = get_specific_account_balance($deduction_identifier) + ($transfer_amount * -1);
        $params[":accountsource2"] = $increase;
        $params[":accountdest2"] = $deductMultiplier;
        $params[":balancechange2"] = $transfer_amount;
        $params[":expectedtotal2"] = get_specific_account_balance($account_num) + $transfer_amount;
        $db = getDB();
        $stmt = $db->prepare($query);
        try
        {
            $stmt->execute($params);
            refresh_account_balance($deductMultiplier);
            refresh_account_balance($increase);
            flash("Loan Payment Complete");
        }
        catch (PDOException $e)
        {
            error_log(var_export($e->errorInfo, true));
            flash("Error making loan payment");
        }

        if(get_specific_account_balance($account_num) == 0)
        {
            closeAccount($account_num);
        }

            
    }

}


?>
