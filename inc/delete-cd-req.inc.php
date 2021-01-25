<?php

	$deleteReq = '';
	
	$errors = array('cd-order-delete'=>'','reason'=>'');
	
	// Delete cd req

	if (isset($_POST['delete-cd-order-submit'])) {
		
		if (empty($_POST['cd-order-delete'])) {
			$errors['cd-order-delete'] = '<br />Please input the requisition number you want to delete';
		} else {
			$deleteReq = htmlspecialchars($_POST['cd-order-delete']);
		}
		
		if (empty($_POST['reason'])) {
			$errors['reason'] = '<br />Please select a reason for deletion';
		} else {
			$deleteReason = htmlspecialchars($_POST['reason']);
		}
	
		if (!array_filter($errors)) {
			include 'config/delete-req-confirm.php';
		}
		
	}
	
	// Delete CD req on confirmation
	if(isset($_POST['delete-req-confirm-submit'])){
		
		$deleteReq = $_POST['delete-req-confirm'];
		$firstNameConfirm = $_POST['first-name-confirm'];
		$lastNameConfirm = $_POST['last-name-confirm'];
		$extConfirm = $_POST['ext-confirm'];
		$positionConfirm = $_POST['position-confirm'];
		$wardConfirm = $_POST['ward-confirm'];
		$drugNameConfirm = $_POST['drug-name-confirm'];
		$quantityConfirm = $_POST['quantity-confirm'];
		$orderedOnConfirm = $_POST['ordered-on-confirm'];
		$deletedBy = $_SESSION['first-name'] . ' ' . $_SESSION{'surname'};
		$deleteReason = $_POST['reason-confirm'];
		
		$sql = "INSERT INTO cdReqNumberDeleted(reqNumberID, firstName, lastName, ext, position, ward, drugName, quantity, orderedOn, deletedBy, deletedReason) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$params = array($deleteReq, $firstNameConfirm, $lastNameConfirm, $extConfirm, $positionConfirm, $wardConfirm, $drugNameConfirm, $quantityConfirm, $orderedOnConfirm, $deletedBy, $deleteReason);

		$stmt = sqlsrv_query($conn,$sql,$params);
		
		// CHECK TO SEE IF ROW HAS BEEN SUCCESSFULLY ENTER INTO cdreqnumberdeleted, IF SO THEN DELETE FROM cdReqNumber
		
		if(!$stmt){

				echo 'insert error: ' . sqlsrv_errors($conn);
				if($stmt === false ) {
					if( ($errors = sqlsrv_errors() ) != null) {
						foreach( $errors as $error ) {
							echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
							echo "code: ".$error[ 'code']."<br />";
							echo "message: ".$error[ 'message']."<br />";
						}
					}
				}

			}	else {
				
				$deleteCDOrderTable = "DELETE FROM cdReqNumber WHERE reqNumberID = '$deleteReq'";
				$reqDeleted = '<b>' . $deleteReq . '</b>&nbsp;has been deleted.';
					
				if (!sqlsrv_query($conn, $deleteCDOrderTable)){
					echo 'delete error: ' . sqlsrv_errors($conn);
				}	
			}
		
	}
?>
<?php

	if (isset($deleteCDOrderTable)) {
		echo '<div class="success-ward-wrapper">';
		echo '<div class="success-ward-container">';
		echo '<i class="fas fa-check-circle"></i>';
		echo '</div>';
		echo '<div class="success-ward-container">';
		echo $reqDeleted; 
		echo '</div>';
		echo '</div>';
	}

?>
<?php if ($_SESSION['user-role'] == 'Admin' || $_SESSION['user-role'] == 'Pharmacy manager' || $_SESSION['user-role'] == 'Dispensary user') { ?>
<div class="admin-section-wrapper">

<h1>Delete Controlled Drug Requisition Order</h1>

<div class="ward-management-wrapper">

			<div class="ward-management-container" style="width:100%">

				<form method="POST" action="">
					<br /><br />
					Requisition number<br />
					<input type="text" name="cd-order-delete" value="<?php echo $deleteReq ?>">
					<div class="error-message"><?php echo $errors['cd-order-delete'] ?></div>
					<br /><br />
					Reason for deletion<br />
					<select name="reason">
						<option disabled selected value> -- Select an option -- </option>
						<option>Duplicated</option>
						<option>Restricted use</option>
						<option>Unavailable</option>
					</select>
					<div class="error-message"><?php echo $errors['reason'] ?></div>
					<br /><br />

					<button type="submit" name="delete-cd-order-submit"><i class="fas fa-minus-circle"></i> DELETE</button>

				</form>

			</div>

	</div>
	
</div>
<?php } else {
	echo '<script>window.location.href = "index.php";</script>';
} ?>