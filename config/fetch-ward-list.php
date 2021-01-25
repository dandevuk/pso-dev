<?php 	$sql = "SELECT wardlist FROM wardListTable ORDER BY wardlist";	$stmt = sqlsrv_query( $conn, $sql );	if( $stmt === false) {		die( print_r( sqlsrv_errors(), true) );	}
?>