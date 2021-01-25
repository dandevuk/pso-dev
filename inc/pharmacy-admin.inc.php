<?php
$addWard = $deleteWard = $deleteCDDrug = $addCDDrug = $addCDOrder = '';

	$errors = array('new-ward-name'=>'','select-ward-delete'=>'','cd-drug-delete'=>'','cd-drug-add'=>'','cd-order-delete'=>'','cd-ward-audit'=>'');
	
	//Select ward to audit
	
	if(isset($_POST['cd-ward-audit-submit'])) {
		
		if(empty($_POST['cd-ward-audit'])){
			$errors['cd-ward-audit'] = 'A ward is required';
		} else{
			$wardSelect = $_POST['cd-ward-audit'];
			$_SESSION['ward'] = $wardSelect;
			echo '<script>window.location="cd-audit.php"</script>';
		}
	}

	// Add ward

	if(isset($_POST['new-ward-submit'])){

		// check news title
		if(empty($_POST['new-ward-name'])){
			$errors['new-ward-name'] = 'A ward name is required';
		} else{
			$addWard = $_POST['new-ward-name'];
		}

		if (array_filter($errors)){
			//echo "Errors in the form";
		} else {

			$addWard = mysqli_real_escape_string($conn, $_POST['new-ward-name']);

			// create new variable

			$addWardTable = "INSERT INTO wardListTable(wardList) VALUES ('$addWard')";

			// save to db and check

			if(!mysqli_query($conn, $addWardTable)){
				echo 'query error: ' . mysqli_error($conn);
			}		
			
		}

	} // end 


// Delete ward

	if(isset($_POST['delete-ward-submit'])){

		// check news title
		if(empty($_POST['select-ward-delete'])){
			$errors['select-ward-delete'] = 'Please select a ward';
		} else{
			$deleteWard = $_POST['select-ward-delete'];
		}

		if (array_filter($errors)){
			//echo "Errors in the form";
		} else {

			$deleteWard = mysqli_real_escape_string($conn, $_POST['select-ward-delete']);

			// create new variable

			$deleteWardTable = "DELETE FROM `wardListTable` WHERE `wardList` = '$deleteWard' ";

			// save to db and check

			if(!mysqli_query($conn, $deleteWardTable)){
				echo 'query error: ' . mysqli_error($conn);
			}		
			
		}

	} // end delete ward

// Add DRUG

	if(isset($_POST['add-cd-drug-submit'])){

		// check news title
		if(empty($_POST['cd-drug-add'])){
			$errors['cd-drug-add'] = 'A drug name is required';
		} else{
			$addCDDrug = $_POST['cd-drug-add'];
		}

		if (array_filter($errors)){
			//echo "Errors in the form";
		} else {

			$addCDDrug = mysqli_real_escape_string($conn, $_POST['cd-drug-add']);

			// create new variable

			$addCDDrugTable = "INSERT INTO cdDrugsTable(drugNameCD) VALUES ('$addCDDrug')";

			// save to db and check

			if(!mysqli_query($conn, $addCDDrugTable)){
				echo 'query error: ' . mysqli_error($conn);
			}		
			
		}

	} // end 


// Delete CD Drug

	if(isset($_POST['delete-cd-drug-submit'])){

		// check news title
		if(empty($_POST['cd-drug-delete'])){
			$errors['cd-drug-delete'] = 'Please select a ward';
		} else{
			$deleteCDDrug = $_POST['cd-drug-delete'];
		}

		if (array_filter($errors)){
			//echo "Errors in the form";
		} else {

			$deleteCDDrug = mysqli_real_escape_string($conn, $_POST['cd-drug-delete']);

			// create new variable

			$deleteCDDrugTable = "DELETE FROM `cdDrugsTable` WHERE `drugNameCD` = '$deleteCDDrug' ";

			// save to db and check

			if(!mysqli_query($conn, $deleteCDDrugTable)){
				echo 'query error: ' . mysqli_error($conn);
			}		
			
		}

	} // end delete drug


// Delete CD Req Order



	if(isset($_POST['delete-cd-order-submit'])){



		// check if req order selected

		if(empty($_POST['cd-order-delete'])){

			$errors['cd-order-delete'] = 'Please select an order';

		} else{

			$deleteCDOrder = $_POST['cd-order-delete'];

		}



		if (array_filter($errors)){

			//echo "Errors in the form";

		} else {



			$deleteCDOrder = mysqli_real_escape_string($conn, $_POST['cd-order-delete']);



			// create new variable


			$insertCDOrderTable = "INSERT INTO `cdReqNumberDeleted` SELECT * FROM `cdReqNumber` WHERE `reqNumberID` = '$deleteCDOrder'";

			// save to db and check - then delete from table if inserted

			if(!mysqli_query($conn, $insertCDOrderTable)){

				echo 'insert error: ' . mysqli_error($conn);

			}	else {
				$deleteCDOrderTable = "DELETE FROM `cdReqNumber` WHERE `reqNumberID` = '$deleteCDOrder' ";
					
				if (!mysqli_query($conn, $deleteCDOrderTable)){
					echo 'delete error: ' . mysqli_error($conn);
				}	
			}

		}



	} // end delete drug

?>
<!-- Fetch wards from database -->
		<?php include 'config/fetch-ward-list.php' ?>
		
		<div class="form-wrapper">
			<div class="form-container">
				<div style="text-align: center">
					<h2>Admin area</h2>
					<div>
						<?php include 'config/fetch-ward-list.php' ?>
						<h3>Add ward</h3>
						<form method="POST" action="">
							Ward name: <input type="text" name="new-ward-name">
							<button type="submit" name="new-ward-submit">ADD</button>
						</form>
						<div class="error-message"><?php echo $errors['new-ward-name'];?></div>
					</div>
					<div>
						<h3>Delete ward</h3>
						<form method="POST" action="">
							Select ward to edit: 
							<select name="select-ward-delete">
								<option disabled selected value> -- Select an option -- </option>
								<?php foreach ($wards as $ward) { ?>
									<option><?php echo htmlspecialchars($ward['wardList']); ?></option>
								<?php }; ?>
							</select>
							<button type="submit" name="delete-ward-submit">DELETE</button>
						</form>
						<div class="error-message"><?php echo $errors['select-ward-delete'];?></div>
					</div>
					<?php include 'config/fetch-cd-drugs.php' ?>
					<div>
						<?php include 'config/fetch-ward-list.php' ?>
						<h3>Add CD Drug</h3>
						<form method="POST" action="">
							Add CD drug: <input type="text" name="cd-drug-add">
							<button type="submit" name="add-cd-drug-submit">ADD</button>
						</form>
						<div class="error-message"><?php echo $errors['cd-drug-add'];?></div>
					</div>
					<div>
						<h3>Delete CD drug</h3>
						<form method="POST" action="">
							Delete CD drug: 
							<select style="max-width: 50%" name="cd-drug-delete">
								<option disabled selected value> -- Select an option -- </option>
								<?php foreach ($CDDrugs as $CDDrug) { ?>
									<option><?php echo htmlspecialchars($CDDrug['drugNameCD']); ?></option>
								<?php }; ?>
							</select>
							<button type="submit" name="delete-cd-drug-submit">DELETE</button>
						</form>
						<div class="error-message"><?php echo $errors['cd-drug-delete'];?></div>
					</div>
					<?php include 'config/fetch-cd-orders.php' ?>
					<div>
						<h3>Delete CD drug requisition order</h3>
						<form method="POST" action="">
							Select req number: 
							<select style="max-width: 50%" name="cd-order-delete">
								<option disabled selected value> -- Select an option -- </option>
								<?php foreach ($CDOrders as $CDOrder) { ?>
									<option><?php echo htmlspecialchars($CDOrder['reqNumberID']); ?></option>
								<?php }; ?>
							</select>
							<button type="submit" name="delete-cd-order-submit">DELETE</button>
						</form>
						<div class="error-message"><?php echo $errors['cd-order-delete'];?></div>
					</div><div>

						<h3>CD Ward Audit</h3>

						<form method="POST" action="">

							Select ward: 

							<select style="max-width: 50%" name="cd-ward-audit">

								<option disabled selected value> -- Select an option -- </option>

								<?php while( $row = sqlsrv_fetch_array( $stmt) ) { ?>

									<option><?php echo $row[0] ?></option>

								<?php }; ?>

							</select>

							<button type="submit" name="cd-ward-audit-submit">SELECT</button>

						</form>

						<div class="error-message"><?php echo $errors['cd-ward-audit'];?></div>

					</div>
				</div>
			</div>
		</div>