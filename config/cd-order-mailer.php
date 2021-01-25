<?php

$userEmail = $_SESSION['user-email'];

$to = "daniel.hall@nnuh.nhs.uk";

$subject = "$wardFieldCD stock order";

$headers = "From: $wardFieldCD - $firstNameFieldCD $lastNameFieldCD" . "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "Reply-To: $userEmail";

$date = date('d/m/Y');

//constructing the message

$body = "
<html>
<head>
<title>CD Stock Order</title>
<style type='text/css'>
	body {
		font-family: arial;
		font-size: 12px
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
		padding: 0 5px;
		border: 1px solid #000;
		vertical-align: middle
	}
	table tr td span {
		font-size: 9px;
		text-align: left!important;
		vertical-align: top!important
	}
	tr.drug-order td {
		height: 45px
	}
	.grey {
		background-color: lightgrey
	}
	.light-grey {
		background-color: #d3d3d3
	}
	.text-center {
		text-align: center;
	}
	hr {
		border: none;
		border-top: 2px dashed #000
	}
</style>
</head>
<body style= 'text-align:center'>
<h3>$wardFieldCD Controlled Drug Stock Order - Requisition number: $orderReqNumber</h3>
<table>
	<tr class='drug-order'>
		<th class='grey'>Drug</th>
		<th class='grey'>Quantity</th>
	</tr>
	<tr class='drug-order'>
		<td class='text-center'>$drugFieldCD</td>
		<td class='text-center'>$quantityFieldCD</td>
	</tr>
	<tr class='drug-order'>
		<td colspan='2'><span>Other information:</span><br />$otherInfoFieldCD</td>
	</tr>
</table>
<br /><br />
<table>
	<tr class='drug-order'>
		<th class='grey'>Ward</th>
		<th class='grey'>Ordered by</th>
		<th class='grey'>Position</th>
		<th class='grey'>Extension</th>
		<th class='grey'>Date ordered</th>
	</tr>
	<tr class='drug-order'>
		<td class='text-center'>$wardFieldCD</td>
		<td class='text-center'>$firstNameFieldCD $lastNameFieldCD</td>
		<td class='text-center'>$positionFieldCD</td>
		<td class='text-center'>$extFieldCD</td>
		<td class='text-center'>$date</td>
	</tr>
</table>
<br /><br />
<h5>All boxes must be completed</h5>
<table>
	<tr class='drug-order'>
		<th class='grey' colspan='3'>Dispensed by</th>
	</tr>
	<tr class='drug-order'>
		<td><span>Signature:</span></td>
		<td><span>Print name:</span></td>
		<td><span>Date:</span></td>
	</tr>
</table>
<br /><br />
<table>
	<tr class='drug-order'>
		<th class='grey' colspan='3'>Checked by</th>
	</tr>
	<tr class='drug-order'>
		<td><span>Signature:</span></td>
		<td><span>Print name:</span></td>
		<td><span>Date:</span></td>
	</tr>
</table>
<br /><br />
<table>
	<tr class='drug-order'>
		<th class='grey' colspan='4'>Delivered/Collected by:</th>
	</tr>
	<tr class='drug-order'>
		<td><span>Signature:</span></td>
		<td><span>Print name:</span></td>
		<td><span>Date:</span></td>
		<td style='width:100px'><span>Position:</span>HCA/NHCA/Porter</td>
	</tr>
</table>
<br />
<hr>
<h5>Ward copy only - Please retain for 2 years</h5>
<table>
	<tr class='drug-order'>
		<th class='grey' colspan='3'>Received by:</th>
	</tr>
	<tr class='drug-order'>
		<td><span>Signature:</span></td>
		<td><span>Print name:</span></td>
		<td><span>Date:</span></td>
	</tr>
</table>
<br /><br />
If found please return to Pharmacy, Centre Block, Level 1. Thank you.
</body>
</html>
";


// ...and away we go!

mail($to, $subject, $body, $headers);
?>