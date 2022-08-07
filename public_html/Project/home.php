<?php
require(__DIR__ . "/../../partials/nav.php");
?>

<?php
//loop to get firstname and lastname 
$firstname = "";
$lastname = "";
$db = getDB();
$stmt = $db->prepare("SELECT fname,lname from Users where id = :id");
$stmt->execute([":id" => get_user_id()]);
$output = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($output as $name):
    $firstname = se($name, "fname","", false);
    $lastname = se($name, "lname","", false);
endforeach;
$fullname = $firstname . " " . $lastname;
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<h1>Welcome <?php echo $fullname; ?></h1>
<div class="list-group">
  <a href="create_account.php" class="list-group-item list-group-item-action">Create Account</a>
  <a href="list_accounts.php" class="list-group-item list-group-item-action">My Accounts</a>
  <a href="deposit.php" class="list-group-item list-group-item-action">Deposit</a>
  <a href="withdraw.php" class="list-group-item list-group-item-action">Withdraw</a>
  <a href="transfer_dropdown.php" class="list-group-item list-group-item-action">Transfer</a>
  <a href="profile.php?id=<?php se(get_user_id()); ?>" class="list-group-item list-group-item-action">Profile</a>
  <a href="takeoutloanOptions.php" class="list-group-item list-group-item-action">Take out a Loan</a>
  <a href="closed.php" class="list-group-item list-group-item-action">Close Account</a>
</div>

<?php
if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
?>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>