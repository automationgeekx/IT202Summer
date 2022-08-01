<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
$accs = [];
?>

<div class="container-fluid">
<h1>Search For Recipient</h1>
<form onsubmit="return validate(this)" method="POST">

    <div class="mb-3">
      <label for="recipient_name" class="form-label">Recipients Last Name</label>
      <input type="text" id="name" name="name" class="form-control" >
    </div>

    <div class="mb-3">
      <label for="recipientdigits" class="form-label">Recipient Accounts Last 4 Digits</label>
      <input type="text" id="digits" name="digits" class="form-control" >
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Find</button>
</form>
</div>

<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success

        return true;
    }
</script>
<?php
    if (isset($_POST["name"]) && isset($_POST["digits"])) 
    {
        $lastName = get_lname(get_user_id());
        $name = se($_POST, "name", "", false);
        $accdigits = se($_POST, "digits", "", false);
        $realaccDig = (int)$accdigits;
        $id = get_id_lname($name);
        $user_account = get_acc_digits($id, $realaccDig);
        $query = "SELECT account_number, account_type FROM Accounts WHERE user_id = $id AND account_number = $user_account";
        $db = getDB();
        $params = null;
        $stmt = $db->prepare($query);
        try
        {
            $stmt->execute($params);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($results)
            {
                $accs = $results;
                flash("Account " . $user_account . " Found", "Success");
            }
            else{
                flash("Account for recipient " . $name . " with account ending in " . $accdigits . " does not exist", "danger");
                die(header("Location: $BASE_PATH/home.php"));
            }
        }
        catch (PDOException $e)
        {
            flash(var_export($e->errorInfo, true), "danger");
        }

        $hasError = false;
        if(strcasecmp($lastName,$name) == 0)
        {
            $hasError = true;
            flash("Cannot send to yourself. Use Internal Transfer.","danger");
        }
        if(!$hasError)
        {
            flash("Profile Found. Please wait a moment while we take you to transfer", "Success");
        }
    }
?>
<div class="container-fluid">
    <h1>Account</h1>
    <table class="table">
        <thead>
            <th>Account Number (Click For Transfer)</th>
            <th>Account Type</th>
        </thead>
        <tbody>
            <?php if (empty($accs) || $hasError == true) : ?>
                    <tr>
                        <td colspan="75%">Account not found. Re-enter details</td>
                    </tr>
                    <?php else : ?>
                <?php foreach ($accs as $acc) : ?>
                    <tr>
                        <td>
                        <a href="external_transfer.php?account_id=<?php echo se($acc, "id");?>&account_number=<?php echo se($acc, "account_number");?>&account_name=<?php echo $name;?> ">
                        <?php se($acc, "account_number"); ?></a>
                    </td>
                        <td>
                            <?php se($acc, "account_type"); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>