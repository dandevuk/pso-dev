<div class="confirm-container">
	<i class="fas fa-exclamation-circle"></i>
	<br /><br />
	<?php 
		$sqlCheck = "SELECT * FROM cdreqnumber WHERE reqNumberID = '$deleteReq'";
		$stmtCheck = sqlsrv_query($conn, $sqlCheck);
		if (sqlsrv_has_rows($stmtCheck) === true) { 
			include 'inc/cd-req-delete-confirm.inc.php';
		} else {
			echo 'Requisition number does not exist';
			echo '<br /><br /><a href=""><button>Close</button></a>';
		}
	?>
		
</div>