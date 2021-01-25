<?php 
$pageTitle = 'Ward Stock Orders';
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
		include 'inc/order-list.inc.php';
		$_SESSION['last-activity'] = time();
	}}

    	?>

</main>

<?php include 'inc/footer.php' ?>