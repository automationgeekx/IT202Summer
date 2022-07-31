<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<?php
$user_id = get_user_id();
$query = "SELECT account_number, id, balance from Accounts WHERE user_id = $user_id ORDER BY modified desc LIMIT 5";
$db = getDB();
$params = null;
$stmt = $db->prepare($query);
$accounts = [];
$stmt->execute($params);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$accounts = $results;
?>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success

        return true;
    }
</script>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>