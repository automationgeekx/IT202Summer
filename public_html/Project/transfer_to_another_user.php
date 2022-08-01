<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
$accs = [];
?>

<div class="container-fluid">
<h1>Find User</h1>
<form onsubmit="return validate(this)" method="POST">

    <div class="mb-3">
      <label for="reciever_name" class="form-label">Recipients Last Name</label>
      <input type="text" id="name" name="name" class="form-control" >
    </div>

    <div class="mb-3">
      <label for="reciever_name" class="form-label">Recipient Accounts Last 4 Digits</label>
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
        $id = get_id_lname($name);
        $user_account = get_acc_digits($accdigits);
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
            }
            else{
                flash("No accounts found", "warning");
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
            flash("Cannot send to yourself. Use Internal Transfer.");
        }
        elseif(!$hasError)
        {
            flash("Profile Found. Please wait a moment while we take you to transfer", "Success");
        }
    }
?>
<div class="container-fluid">
    <h1>Account</h1>
    <table class="table">
        <thead>
            <th>Account Number</th>
            <th>Account Type</th>
        </thead>
        <tbody>
            <?php if (empty($accs) || $hasError == true) : ?>
                    <tr>
                        <td colspan="75%">Account not found</td>
                    </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>