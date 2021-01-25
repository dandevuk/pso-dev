<?php
	// Add ward
	$addWard = $deleteWard = $addWardConfirm = $wardAdded = '';
	
	$errors = array('new-ward-name'=>'','select-ward-delete'=>'');

	if (isset($_POST['new-ward-submit'])) {
		
		if (empty($_POST['new-ward-name'])) {
			$errors['new-ward-name'] = '<br />Please input a ward to add';
		} else {
			$addWard = htmlspecialchars($_POST['new-ward-name']);
			$addWardConfirm = include 'config/add-ward-confirm.php';
		}
		
	}
	
	// Add ward on confirmation
	if(isset($_POST['add-ward-confirm-submit'])){
		
		$addWard = $_POST['add-ward-confirm'];

		$sql = "INSERT INTO wardListTable (wardList) VALUES ('$addWard')";
	
		$result = sqlsrv_query($conn,$sql);
		
		$wardAdded = '<b>' . $addWard . '</b>&nbsp;has been added to the ward list.';

		if($result === false ) {
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
				}
			}
		};
		
	} // Add ward end 
	
	// Delete ward

	if (isset($_POST['delete-ward-submit'])) {
		
		if (empty($_POST['select-ward-delete'])) {
			$errors['select-ward-delete'] = '<br />Please select a ward to delete';
		} else {
			$deleteWard = htmlspecialchars($_POST['select-ward-delete']);
			$deleteWardConfirm = include 'config/delete-ward-confirm.php';
		}
		
	}
	
	// Delete ward on confirmation
	if(isset($_POST['delete-ward-confirm-submit'])){
		
		$deleteWard = $_POST['delete-ward-confirm'];

		$sql = "DELETE FROM wardListTable WHERE wardList='$deleteWard'";
	
		$result = sqlsrv_query($conn,$sql);
		
		$wardDeleted = '<b>' . $deleteWard . '</b>&nbsp;has been deleted from the ward list.';

		if($result === false ) {
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
				}
			}
		};
		
	} // Delete ward end 
?>
<?php

	if (isset($_POST['add-ward-confirm-submit'])) {
		echo '<div class="success-ward-wrapper">';
		echo '<div class="success-ward-container">';
		echo '<i class="fas fa-check-circle"></i>';
		echo '</div>';
		echo '<div class="success-ward-container">';
		echo $wardAdded; 
		echo '</div>';
		echo '</div>';
	}

	if (isset($_POST['delete-ward-confirm-submit'])) {
		echo '<div class="success-ward-wrapper">';
		echo '<div class="success-ward-container">';
		echo '<i class="fas fa-check-circle"></i>';
		echo '</div>';
		echo '<div class="success-ward-container">';
		echo $wardDeleted; 
		echo '</div>';
		echo '</div>';
	}

?>
<?php if ($_SESSION['user-role'] == 'Admin' || $_SESSION['user-role'] == 'Pharmacy manager' || $_SESSION['user-role'] == 'Stores manager') { ?>
<div class="admin-section-wrapper">

<h1>Ward List Management</h1>

<div class="ward-management-wrapper">

			<div class="ward-management-container">

					<?php include 'config/fetch-ward-list.php' ?>

					<h3>Add ward</h3>

					<form method="POST" action="">

						<input style="width:60%" type="text" name="new-ward-name">
						
						<br /><br />

						<button type="submit" name="new-ward-submit"><i class="fas fa-plus-circle"></i> ADD</button>

					</form>

					<div class="error-message"><?php echo $errors['new-ward-name'];?></div>

			</div>

			<div class="ward-management-container">

				<h3>Delete ward</h3>

				<form method="POST" action="">

					<select name="select-ward-delete">

						<option disabled selected value> -- Select an option -- </option>

						<?php while( $row = sqlsrv_fetch_array( $stmt) ) { ?>

							<option><?php echo $row[0] ?></option>

						<?php }; ?>

					</select>
					
					<br /><br />

					<button type="submit" name="delete-ward-submit"><i class="fas fa-minus-circle"></i> DELETE</button>

				</form>

				<div class="error-message"><?php echo $errors['select-ward-delete'];?></div>

			</div>

	</div>
	
</div>
<?php } else {
	echo '<script>window.location.href = "index.php";</script>';
} ?>