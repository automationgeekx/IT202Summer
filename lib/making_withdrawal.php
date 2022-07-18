<?php

/**
 * Points should be passed as a positive value.
 * $deduct should be where the points are coming from
 * $increase should be where the points are going
 */
function makeWithdraw($acc_num, $bal, $cause, $deduct = -1, $increase = -1, $details = "")
{
    //I'm choosing to ignore the record of 0 point transactions
    if ($bal > 0) 
    {
        $increase_id = "000000000000";
        $query = "INSERT INTO Transactions (account_src, account_dest, balance_change, transaction_type, memo, expected_total) 
            VALUES (:accsrc1, :accdest1, :balchan, :r,:m, :exptol1), 
            (:accsrc2, :accdest2, :balchan2, :r, :m, :exptol2)";
        //I'll insert both records at once, note the placeholders that are kept the same and the ones changed.
        $params[":accsrc1"] = $deduct;
        $params[":accdest1"] = $increase;
        $params[":r"] = $cause;
        $params[":m"] = $details;
        $params[":balchan"] = ($bal * -1);
        $params[":exptol1"] = get_specific_account_balance($acc_num) + ($bal * -1);

        $params[":accsrc2"] = $increase;
        $params[":accdest2"] = $deduct;
        $params[":balchan2"] = $bal;
        $params[":exptol2"] = get_specific_account_balance($increase_id) + $bal;
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute($params);
            refresh_account_balance($deduct);
            refresh_account_balance($increase);
            flash("Withdrawal Made", "Success");
        } catch (PDOException $e) {
            error_log(var_export($e->errorInfo, true));
            flash("There was an error withdrawing money", "danger");
        }
    }
}