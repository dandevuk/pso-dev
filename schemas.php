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

//$sql = "Use [pharmacyordering] select table_name from information_schema.tables where table_schema != 'information_schema'";
//$sql = "Use [pharmacyordering] SELECT TABLE_CATALOG, TABLE_SCHEMA, TABLE_NAME, TABLE_TYPE FROM INFORMATION_SCHEMA.TABLES";
//$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES
//WHERE TABLE_TYPE = 'VIEW'";

// LIST SCHEMAS
$sql = "SELECT TABLE_CATALOG ,
        TABLE_SCHEMA ,
        TABLE_NAME ,
        TABLE_TYPE
FROM INFORMATION_SCHEMA.TABLES";

$stmt = sqlsrv_query( $conn, $sql );

while( $row = sqlsrv_fetch_array( $stmt) ) {
      echo "<br />".$row['0']." ".$row['1']." ".$row['2']."<br />";
}

if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}

?>