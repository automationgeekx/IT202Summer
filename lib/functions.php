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
        $deduction_identifier = get_specific_account_balance($deductMultiplier);
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
?>
