<?php 	$sql = "SELECT drugNameCD FROM cddrugstable ORDER BY drugNameCD";	$stmt = sqlsrv_query( $conn, $sql );	if( $stmt === false) {		die( print_r( sqlsrv_errors(), true) );	}	
?>