<?php
function getsavingInterest()
{
    $query = "SELECT value from `System Properties` WHERE id = 0";
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            return se($r, "value", 0, false);
        }
    } catch (PDOException $e) {
        error_log("Error fetching savings interest rate: " . var_export($e->errorInfo, true));
        flash("Error looking up savings ir", "danger");
    }
    return 0;
}

function getloanInterest()
{
    $query = "SELECT value FROM `System Properties` WHERE id = 1";
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            return se($r, "value", 0, false);
        }
    } catch (PDOException $e) {
        error_log("Error fetching loan interest rate: " . var_export($e->errorInfo, true));
        flash("Error looking up loan ir", "danger");
    }
    return 0;
}


function usersavingsAPY($account_id)
{
        $query = "UPDATE Accounts SET last_calc_apy=:apy WHERE id = :id";
        $params[":apy"] = getsavingInterest();
        $params[":id"] = $account_id;
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute($params);
            flash("Savings account interest rate set", "Success");
        } catch (PDOException $e) {
            error_log(var_export($e->errorInfo, true));
            flash("There was an error with setting interest rate", "danger");
        }
}

function userloanAPY($account_id)
{
        $query = "UPDATE Accounts SET last_calc_apy=:apy WHERE id = :id";
        $params[":apy"] = getloanInterest();
        $params[":id"] = $account_id;
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute($params);
            flash("Interest rate for loan Set", "Success");
        } catch (PDOException $e) {
            error_log(var_export($e->errorInfo, true));
            flash("There was an error setting loan interest rate", "danger");
        }
}

function insertLoan($account_number, $loan_amount)
{
    $query = "UPDATE Accounts SET balance=:balance WHERE account_number = :accnum";
    $params[":balance"] = get_specific_account_balance($account_number) + $loan_amount;
    $params[":accnum"] = $account_number;
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute($params);
        flash("Loan Successful", "Success");
    } catch (PDOException $e) {
        error_log(var_export($e->errorInfo, true));
        flash("There was an error applying loan", "danger");
    }
}