<?php
$serverName = "NNVMMCDB01T";   
$uid = "pharmso";     
$pwd = "glt-fHG-3dj";    
$databaseName = "psodb"; 

$connectionInfo = array( "UID"=>$uid,"PWD"=>$pwd,"Database"=>$databaseName);   

//Connect using SQL Server Authentication. 
$conn = sqlsrv_connect( $serverName, $connectionInfo); 

if ($conn) {
	echo 'Connected';
} else {
	echo 'Connection error';
	die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT * FROM users ORDER BY username";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt) ) {
      echo "<br />".$row['1']. ' ' .$row['2']. "<br />";
}
?>