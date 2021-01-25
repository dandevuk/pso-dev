<?php

$drugRow2 = $drugRow3 = $drugRow4 = $drugRow5 = $drugRow6 = $drugRow7 = $drugRow8 = $drugRow9 = $drugRow10 = "";

$userEmail = $_SESSION['user-email'];

$to = "daniel.hall@nnuh.nhs.uk";

$subject = "$ward stock order";

$headers = "From: $orderName - $ward" . "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "Reply-To: $userEmail";

$date = date('d/m/Y');

if (!empty($drugName2)) {
	
	$drugRow2 = "
	<tr class='drug-order'>
		<td>$drugName2</td>
		<td>$quantity2</td>
		<td> </td>
	</tr>";
}

if (!empty($drugName3)) {
	
	$drugRow3 = "
	<tr class='drug-order'>
		<td>$drugName3</td>
		<td>$quantity3</td>
		<td> </td>
	</tr>";
}

if (!empty($drugName4)) {
	
	$drugRow4 = "
	<tr class='drug-order'>
		<td>$drugName4</td>
		<td>$quantity4</td>
		<td> </td>
	</tr>";
}

if (!empty($drugName5)) {
	
	$drugRow5 = "
	<tr class='drug-order'>
		<td>$drugName5</td>
		<td>$quantity5</td>
		<td> </td>
	</tr>";
}

if (!empty($drugName6)) {
	
	$drugRow6 = "
	<tr class='drug-order'>
		<td>$drugName6</td>
		<td>$quantity6</td>
		<td> </td>
	</tr>";
}

if (!empty($drugName7)) {
	
	$drugRow7 = "
	<tr class='drug-order'>
		<td>$drugName7</td>
		<td>$quantity7</td>
		<td> </td>
	</tr>";
}

if (!empty($drugName8)) {
	
	$drugRow8 = "
	<tr class='drug-order'>
		<td>$drugName8</td>
		<td>$quantity8</td>
		<td> </td>
	</tr>";
}

if (!empty($drugName9)) {
	
	$drugRow9 = "
	<tr class='drug-order'>
		<td>$drugName9</td>
		<td>$quantity9</td>
		<td> </td>
	</tr>";
}

if (!empty($drugName10)) {
	
	$drugRow10 = "
	<tr class='drug-order'>
		<td>$drugName10</td>
		<td>$quantity10</td>
		<td> </td>
	</tr>";
}

//constructing the message

$body = "
<html>
<head>
<title>Ward Stock Order</title>
<style type='text/css'>
	body {
		font-family: arial;
		font-size: 14px
	}
	table {
		width: 100%;
		border: 2px solid #000;
		border-collapse:collapse;
	}
	th {
		text-align: center;
		border: 1px solid #000;
	}
	td {
		text-align: center;
		padding: 0 5px;
		border: 1px solid #000;
		vertical-align: middle
	}
	span {
		font-size: 8px;
		text-align: left;
		vertical-align: top
	}
	tr.drug-order td {
		border-top: 3px solid #333;
		height: 35px
	}
	.grey {
		background-color: lightgrey
	}
	.light-grey {
		background-color: #d3d3d3
	}
	.stamp-box {
		margin: 0 35%;
		border: 2px solid #000
	}
</style>
</head>
<body style= 'text-align:center'>
<h3>$ward Stock Order</h3>
<table>
	<tr class='drug-order'>
		<th class='grey'>Ward</th>
		<th class='grey'>Ordered by</th>
		<th class='grey'>Position</th>
		<th class='grey'>Extension</th>
		<th class='grey'>Date</th>
	</tr>
	<tr>
		<td>$ward</td>
		<td>$orderName<br /><span style='font-size: 9px'><a href='mailto:$userEmail'>$userEmail</a></span></td>
		<td>$position</td>
		<td>$ext</td>
		<td>$date</td>
	</tr>
	<tr class='drug-order'>
		<td colspan='5'><span>Other information:</span><br />$otherInfo</td>
	</tr>
</table>
<br /><br />
<table>
	<tr class='drug-order'>
		<th class='grey'>Drug</th>
		<th class='grey'>Quantity</th>
		<th class='grey'>Supplied</th>
	</tr>
	<tr class='drug-order'>
		<td>$drugName</td>
		<td>$quantity</td>
		<td> </td>
	</tr>
	$drugRow2
	$drugRow3
	$drugRow4
	$drugRow5
	$drugRow6
	$drugRow7
	$drugRow8
	$drugRow9
	$drugRow10
</table>
</body>
</html>
";


// ...and away we go!

mail($to, $subject, $body, $headers);
?>