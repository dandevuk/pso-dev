<?php

$serverName = "nnvmpharmweb01";
$uid = "pso-dev";
$pwd = "";
$databaseName = "pso-dev";

$connectionInfo = array( "UID"=>$uid,
                         "PWD"=>$pwd,
                         "Database"=>$databaseName);

/* Connect using SQL Server Authentication. */

//try {
//    $conn = sqlsrv_connect( $serverName, $connectionInfo);
//} catch (Exception $e) {
//    echo 'Caught exception: ',  $e->getMessage(), "\n";
//}


//$serverName = "NNVMPHARMPGATE01:1443"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
//$connectionInfo = array( "Database"=>"dbName");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if(!$conn) {
  echo "Connection could not be established.<br />";
  die( print_r( sqlsrv_errors(), true));
}
?>