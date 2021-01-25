<?php 
// Process CD orders
session_start();
include 'db-connect.php';
include 'ad-connect.php';
require('../lib/fpdf182/fpdf.php');

// Delete CD req on confirmation
	if(isset($_POST['process-cd-orders-submit'])){
		
		// Database query
		$sql = "SELECT * FROM cdreqnumber ORDER BY orderedOn";
		$result = sqlsrv_query($conn, $sql);

		$resultRows = sqlsrv_has_rows($result);
		
		if ($resultRows === false) {
			
		} else {
			
			include 'pdf-cd-multiple.php';
			
			$processedBy = $_SESSION['first-name'] . ' ' . $_SESSION{'surname'};
			
			while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
			
				$reqNumber = $row['reqNumberID'];
				$firstName = $row['firstName'];
				$lastName = $row['lastName'];
				$ext = $row['ext'];
				$position = $row['position'];
				$ward = $row['ward'];
				$drugName = $row['drugName'];
				$quantity = $row['quantity'];
				$orderedOn = $row['orderedOn']->format('d-M-Y');
				$email = $row['email'];
				$info = $row['info'];
					
				$reqNumber = $row['reqNumberID'];
				$insert = '$insert' . $row['reqNumberID'];
				$delete = '$delete' . $row['reqNumberID'];
				$params = 'params' . $row['reqNumberID'];
				$stmt = '$stmt' . $row['reqNumberID'];
				$errors= '$errors' . $row['reqNumberID'];
				
				$insert= "INSERT INTO cdreqnumberprocessed(reqNumberID, firstName, lastName, ext, position, ward, drugName, quantity, orderedOn, processedBy, email, info) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

				$params = array($reqNumber, $firstName, $lastName, $ext, $position, $ward, $drugName, $quantity, $orderedOn, $processedBy, $email, $info);

				$stmt = sqlsrv_query($conn,$insert,$params);
		
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
				
				$delete = "DELETE FROM cdReqNumber WHERE reqNumberID = '$reqNumber'";
				
				//include('cd-order-delete-mailer'); 
					
					if (!sqlsrv_query($conn, $delete)){
					echo 'delete error: ' . sqlsrv_errors($conn);
					}
				}
		
			}
			
		}
		
	}
?>