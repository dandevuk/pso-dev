<?php
	// Add Drug
	$addDrug = $deleteDrug = $addDrugConfirm = $drugAdded = '';
	
	$errors = array('new-drug-name'=>'','select-drug-delete'=>'');

	if (isset($_POST['new-drug-submit'])) {
		
		if (empty($_POST['new-drug-name'])) {
			$errors['new-drug-name'] = 'Please input a drug to add';
		} else {
			$addDrug = htmlspecialchars($_POST['new-drug-name']);
			$addDrugConfirm = include 'config/add-drug-confirm.php';
		}
		
	}
	
	// Add drug on confirmation
	if(isset($_POST['add-drug-confirm-submit'])){
		
		$addDrug = $_POST['add-drug-confirm'];

		$sql = "INSERT INTO drugstable (drugName) VALUES ('$addDrug')";
	
		$result = sqlsrv_query($conn,$sql);
		
		$drugAdded = '<b>' . $addDrug . '</b>&nbsp; has been added to the drug list.';

		if($result === false ) {
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
				}
			}
		};
		
	} // Add drug end 
	
	// Delete drug

	if (isset($_POST['delete-drug-submit'])) {
		
		if (empty($_POST['select-drug-delete'])) {
			$errors['select-drug-delete'] = 'Please input a drug to add';
		} else {
			//$deleteDrug = htmlspecialchars($_POST['select-drug-delete']);
			$deleteDrug = $_POST['select-drug-delete'];
			$deleteDrugConfirm = include 'config/delete-drug-confirm.php';
		}
		
	}
	
	// Delete drug on confirmation
	if(isset($_POST['delete-drug-confirm-submit'])){
		
		$deleteDrug = $_POST['delete-drug-confirm'];

		$sql = "DELETE FROM drugstable WHERE drugName = '$deleteDrug'";
	
		$result = sqlsrv_query($conn,$sql);
		
		$drugDeleted = '<b>' . $deleteDrug . '</b>&nbsp;has been deleted from the drug list.';

		if($result === false ) {
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
				}
			}
		};
		
	} // Delete drug end 
?>
<?php

	if (isset($_POST['add-drug-confirm-submit'])) {
		echo '<div class="success-ward-wrapper">';
		echo '<div class="success-ward-container">';
		echo '<i class="fas fa-check-circle"></i>';
		echo '</div>';
		echo '<div class="success-ward-container">';
		echo $drugAdded; 
		echo '</div>';
		echo '</div>';
	}

	if (isset($_POST['delete-drug-confirm-submit'])) {
		echo '<div class="success-ward-wrapper">';
		echo '<div class="success-ward-container">';
		echo '<i class="fas fa-check-circle"></i>';
		echo '</div>';
		echo '<div class="success-ward-container">';
		echo $drugDeleted; 
		echo '</div>';
		echo '</div>';
	}

?>
<?php if ($_SESSION['user-role'] === 'Admin') { ?>
<div class="admin-section-wrapper">

<h1>Drug Management</h1>

<div class="ward-management-wrapper">

			<div class="ward-management-container">

					<?php include 'config/fetch-drugs.php' ?>

					<h3>Add drug</h3>

					<form method="POST" action="">

						<input style="width:60%" type="text" name="new-drug-name">
						
						<br /><br />

						<button type="submit" name="new-drug-submit"><i class="fas fa-plus-circle"></i> ADD</button>

					</form>

					<div class="error-message"><?php echo $errors['new-drug-name'];?></div>

			</div>

			<div class="ward-management-container">

				<h3>Delete drug</h3>

				<form method="POST" action="">

					<select name="select-drug-delete" id="delete-drug-select">

						<option disabled selected value> -- Select an option -- </option>

						<?php while( $row = sqlsrv_fetch_array( $stmt) ) { ?>

							<option><?php echo $row[0] ?></option>

						<?php }; ?>

					</select>
					
					<br /><br />

					<button type="submit" name="delete-drug-submit"><i class="fas fa-minus-circle"></i> DELETE</button>

				</form>

				<div class="error-message"><?php echo $errors['select-drug-delete'];?></div>

			</div>

</div>
</div>
<?php } else {
	echo '<script>window.location.href = "index.php";</script>';
} ?>