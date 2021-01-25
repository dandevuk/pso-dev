<?php 

	// Select all CD drugs from CD drugs table for drop down in form
	$sqlCDOrders = "SELECT reqNumberID FROM cdReqNumberProcessed ORDER BY reqNumberID";

	// make a query and get result
	$resultCDOrders = sqlsrv_query($conn, $sqlCDOrders);
	

	

?>