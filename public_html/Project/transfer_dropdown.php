<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<h1>Transfer Options: Select One</h1>
<div class="list-group">
  <a href="transfer.php" class="list-group-item list-group-item-action">Transfer to one of your existing accounts</a>
  <a href="transfer_to_another_user.php" class="list-group-item list-group-item-action">Transfer to an external known users account</a>
</div>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>