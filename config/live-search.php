<?php

require 'db-connect.php';

if(isset($_REQUEST["term"])){
	
	$search = $_REQUEST["term"];
	$search = "$search%";
	$sql = "SELECT drugName FROM drugstable WHERE drugName LIKE ? ORDER BY drugName";
	$stmt = sqlsrv_prepare($conn, $sql, array($search));
	if( !$stmt ) {
		die( print_r( sqlsrv_errors(), true));
	}
	sqlsrv_execute($stmt);
	
	if(sqlsrv_execute($stmt)){
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
			echo "<p>" . $row["drugName"] . "</p>";
		} 
	} else {
		die( print_r( sqlsrv_errors(), true));
	} 
	
	sqlsrv_free_stmt($stmt);
}
?>