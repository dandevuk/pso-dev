<?php 
$pageTitle = 'CD Stock Order Form';
include 'inc/header.php' ?>

<main>

	<?php 
	
	include 'inc/loading-message.inc.php';

	if (!isset($_SESSION['username'])) {
        	include 'inc/login.php';
    	} else {
	if ((time() - $_SESSION['last-activity']) > 480) {
        	session_unset();     // unset $_SESSION variable for the run-time 
    		session_destroy();   // destroy session data in storage
        	include 'inc/session-expired.php';
        }
        else {
		include 'inc/new-cd-orders.inc.php';
		$_SESSION['last-activity'] = time();
	}}

    	?>

</main>

<!-- Reload page every 2 minutes -->
<script>
window.setTimeout(function () {
  window.location.reload();
}, 120000);
</script>

<?php include 'inc/footer.php' ?>