<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<h1>Home</h1>
<div class="list-group">
  <a href="create_account.php" class="list-group-item list-group-item-action">Create Account</a>
  <a href="#" class="list-group-item list-group-item-action">My Accounts</a>
  <a href="#" class="list-group-item list-group-item-action">Deposit</a>
  <a href="#" class="list-group-item list-group-item-action">Withdraw</a>
  <a href="#" class="list-group-item list-group-item-action">Transfer</a>
  <a href="profile.php" class="list-group-item list-group-item-action">Profile</a>
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