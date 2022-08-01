<?php

/**
 * Passing $redirect as true will auto redirect a logged out user to the $destination.
 * The destination defaults to login.php
 */
function is_logged_in($redirect = false, $destination = "login.php")
{
    $isLoggedIn = isset($_SESSION["user"]);
    if ($redirect && !$isLoggedIn) {
        //if this triggers, the calling script won't receive a reply since die()/exit() terminates it
        flash("You must be logged in to view this page", "warning");
        die(header("Location: $destination"));
    }
    return $isLoggedIn;
}
function has_role($role)
{
    if (is_logged_in() && isset($_SESSION["user"]["roles"])) {
        foreach ($_SESSION["user"]["roles"] as $r) {
            if ($r["name"] === $role) {
                return true;
            }
        }
    }
    return false;
}
function get_username()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "username", "", false);
    }
    return "";
}
function get_user_email()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "email", "", false);
    }
    return "";
}
function get_user_id()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "id", false, false);
    }
    return false;
}

function get_id_lname($lname)
{
    $query = "SELECT id from Users WHERE lname = :lname";
    $db = getDB();
    $stmt = $db->prepare($query);
    try
    {
        $stmt->execute([":lname" => $lname]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($results)
        {
            return se($results, "id", 0, false);
        }
    }
    catch (PDOException $e)
    {
        error_log("Error getting id: " . var_export($e->errorInfo, true));
        flash("Error getting ID", "danger");
    }
    return 0;
}

function get_lname($id)
{
    $query = "SELECT lname from Users WHERE id = :id";
    $db = getDB();
    $stmt = $db->prepare($query);
    try
    {
        $stmt->execute([":id" => $id]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($results)
        {
            return se($results, "lname", 0, false);
        }
    }
    catch (PDOException $e)
    {
        error_log("Error getting last name: " . var_export($e->errorInfo, true));
        flash("Error getting last name", "danger");
    }
    return 0;
}

function get_fname($lname)
{
    $query = "SELECT fname from Users WHERE lname = :l";
    $db = getDB();
    $stmt = $db->prepare($query);
    try
    {
        $stmt->execute([":l" => $lname]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($results)
        {
            return se($results, "fname", 0, false);
        }
    }
    catch (PDOException $e)
    {
        error_log("Error getting last name: " . var_export($e->errorInfo, true));
        flash("Error getting last name", "danger");
    }
    return 0;
}

function get_acc_digits($id_num, $digits)
{
    $query = "SELECT account_number from Accounts WHERE user_id = :id AND account_number LIKE '%$digits'";
    $db = getDB();
    $stmt = $db->prepare($query);
    try
    {
        $stmt->execute([":id" => $id_num]);
        # $stmt->execute([":digits" => $digits]);
        $returnStatement = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($returnStatement)
        {
            return (int)se($returnStatement, "account_number", 0, false);
        }
    }
    catch (PDOException $e)
    {
        error_log("Error getting account number for user: " . var_export($e->errorInfo, true));
        flash("Error getting acc num", "danger");
    }
    return 0;
}


