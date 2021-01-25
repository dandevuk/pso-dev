<?php
	// Add CD
	$addCD = $deleteCD = $addCDConfirm = $CDAdded = $addCDH = $deleteCDH = $addCDHConfirm = $CDHAdded = '';
	
	$errors = array('new-CD-name'=>'','select-CD-delete'=>'','new-CDH-name'=>'','select-CDH-delete'=>'');

	if (isset($_POST['new-CD-submit'])) {
		
		if (empty($_POST['new-CD-name'])) {
			$errors['new-CD-name'] = 'Please input a CD to add';
		} else {
			$addCD = htmlspecialchars($_POST['new-CD-name']);
			$addCDConfirm = include 'config/add-cd-confirm.php';
		}
		
	}
	
	// Add CD on confirmation
	if(isset($_POST['add-CD-confirm-submit'])){
		
		$addCD = $_POST['add-CD-confirm'];

		$sql = "INSERT INTO cddrugstable (drugNameCD) VALUES ('$addCD')";
	
		$result = sqlsrv_query($conn,$sql);
		
		$CDAdded = '<b>' . $addCD . '</b>&nbsp; has been added to the Controlled Drug list.';

		if($result === false ) {
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
				}
			}
		};
		
	} // Add CD end 
	
	// Delete CD

	if (isset($_POST['delete-CD-submit'])) {
		
		if (empty($_POST['select-CD-delete'])) {
			$errors['select-CD-delete'] = 'Please input a CD to add';
		} else {
			$deleteCD = htmlspecialchars($_POST['select-CD-delete']);
			$deleteCDConfirm = include 'config/delete-cd-confirm.php';
		}
		
	}
	
	// Delete CD on confirmation
	if(isset($_POST['delete-CD-confirm-submit'])){
		
		$deleteCD = $_POST['delete-CD-confirm'];

		$sql = "DELETE FROM cddrugstable WHERE drugNameCD='$deleteCD'";
	
		$result = sqlsrv_query($conn,$sql);
		
		$CDDeleted = '<b>' . $deleteCD . '</b>&nbsp; has been deleted from the Controlled Drug list.';

		if($result === false ) {
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
				}
			}
		};
		
	} // Delete CD end 
	
	// Add CDH

	if (isset($_POST['new-CDH-submit'])) {
		
		if (empty($_POST['new-CDH-name'])) {
			$errors['new-CDH-name'] = 'Please input a CDH to add';
		} else {
			$addCDH = htmlspecialchars($_POST['new-CDH-name']);
			$addCDHConfirm = include 'config/add-cdh-confirm.php';
		}
		
	}
	
	// Add CDH on confirmation
	if(isset($_POST['add-CDH-confirm-submit'])){
		
		$addCDH = $_POST['add-CDH-confirm'];

		$sql = "INSERT INTO cdhighstrength (cdHighName) VALUES ('$addCDH')";
	
		$result = sqlsrv_query($conn,$sql);
		
		$CDHAdded = '<b>' . $addCDH . '</b>&nbsphas been added to the Controlled Drug High Strength list.';

		if($result === false ) {
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
				}
			}
		};
		
	} // Add CDH end 
	
	// Delete CDH

	if (isset($_POST['delete-CDH-submit'])) {
		
		if (empty($_POST['select-CDH-delete'])) {
			$errors['select-CDH-delete'] = 'Please input a CDH to add';
		} else {
			$deleteCDH = htmlspecialchars($_POST['select-CDH-delete']);
			$deleteCDHConfirm = include 'config/delete-cdh-confirm.php';
		}
		
	}
	
	// Delete CDH on confirmation
	if(isset($_POST['delete-CDH-confirm-submit'])){
		
		$deleteCDH = $_POST['delete-CDH-confirm'];

		$sql = "DELETE FROM cdhighstrength WHERE cdHighName='$deleteCDH'";
	
		$result = sqlsrv_query($conn,$sql);
		
		$CDHDeleted = '<b>' . $deleteCDH . '</b>&nbsphas been deleted from the Controlled Drug High Strength list.';

		if($result === false ) {
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
				}
			}
		};
		
	} // Delete CDH end 
?>
<?php

	if (isset($_POST['add-CD-confirm-submit'])) {
		echo '<div class="success-ward-wrapper">';
		echo '<div class="success-ward-container">';
		echo '<i class="fas fa-check-circle"></i>';
		echo '</div>';
		echo '<div class="success-ward-container">';
		echo $CDAdded; 
		echo '</div>';
		echo '</div>';
	}

	if (isset($_POST['delete-CD-confirm-submit'])) {
		echo '<div class="success-ward-wrapper">';
		echo '<div class="success-ward-container">';
		echo '<i class="fas fa-check-circle"></i>';
		echo '</div>';
		echo '<div class="success-ward-container">';
		echo $CDDeleted; 
		echo '</div>';
		echo '</div>';
	}

	if (isset($_POST['add-CDH-confirm-submit'])) {
		echo '<div class="success-ward-wrapper">';
		echo '<div class="success-ward-container">';
		echo '<i class="fas fa-check-circle"></i>';
		echo '</div>';
		echo '<div class="success-ward-container">';
		echo $CDHAdded; 
		echo '</div>';
		echo '</div>';
	}

	if (isset($_POST['delete-CDH-confirm-submit'])) {
		echo '<div class="success-ward-wrapper">';
		echo '<div class="success-ward-container">';
		echo '<i class="fas fa-check-circle"></i>';
		echo '</div>';
		echo '<div class="success-ward-container">';
		echo $CDHDeleted; 
		echo '</div>';
		echo '</div>';
	}

?>
<?php if ($_SESSION['user-role'] === 'Admin') { ?>
<div class="admin-section-wrapper">

<h1>Controlled Drug Management</h1>

<h2>Controlled Drugs Stock List</h2>

<div class="ward-management-wrapper">

			<div class="ward-management-container">

					<?php include 'config/fetch-cd-drugs.php' ?>

					<h3>Add Controlled Drug</h3>

					<form method="POST" action="">

						<input style="width:60%" type="text" name="new-CD-name">
						
						<br /><br />

						<button type="submit" name="new-CD-submit"><i class="fas fa-plus-circle"></i> ADD</button>

					</form>

					<div class="error-message"><?php echo $errors['new-CD-name'];?></div>

			</div>

			<div class="ward-management-container">

				<h3>Delete Controlled Drug</h3>

				<form method="POST" action="">

					<select name="select-CD-delete" style="font-size: 11px">

						<option disabled selected value> -- Select an option -- </option>

						<?php while( $row = sqlsrv_fetch_array( $stmt) ) { ?>

							<option><?php echo $row[0] ?></option>

						<?php }; ?>

					</select>
					
					<br /><br />

					<button type="submit" name="delete-CD-submit"><i class="fas fa-minus-circle"></i> DELETE</button>

				</form>

				<div class="error-message"><?php echo $errors['select-CD-delete'];?></div>

			</div>

</div>

<h2>High Strength Controlled Drugs Stock List</h2>

<div class="ward-management-wrapper">

			<div class="ward-management-container">

					<?php include 'config/fetch-cd-high-strength.php' ?>

					<h3>Add High Strength Controlled Drug</h3>

					<form method="POST" action="">

						<input style="width:60%" type="text" name="new-CDH-name">
						
						<br /><br />

						<button type="submit" name="new-CDH-submit"><i class="fas fa-plus-circle"></i> ADD</button>

					</form>

					<div class="error-message"><?php echo $errors['new-CDH-name'];?></div>

			</div>

			<div class="ward-management-container">

				<h3>Delete High Strength Controlled Drug</h3>

				<form method="POST" action="">

					<select name="select-CDH-delete" style="font-size: 11px">

						<option disabled selected value> -- Select an option -- </option>

						<?php while( $row = sqlsrv_fetch_array( $stmtHigh) ) { ?>

							<option><?php echo $row[0] ?></option>

						<?php }; ?>

					</select>
					
					<br /><br />

					<button type="submit" name="delete-CDH-submit"><i class="fas fa-minus-circle"></i> DELETE</button>

				</form>

				<div class="error-message"><?php echo $errors['select-CDH-delete'];?></div>

			</div>

	</div>
</div>
<?php } else {
	echo '<script>window.location.href = "index.php";</script>';
} ?>