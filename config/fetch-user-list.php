<?php 	$sql = "SELECT * FROM dbo.users ORDER BY username";	$stmt = sqlsrv_query( $conn, $sql );	if( $stmt === false) {		die( print_r( sqlsrv_errors(), true) );	}
?>