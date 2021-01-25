<?php 	$sql = "SELECT drugName FROM drugstable ORDER BY drugName";	$stmt = sqlsrv_query( $conn, $sql );	if( $stmt === false) {		die( print_r( sqlsrv_errors(), true) );	}	
?>