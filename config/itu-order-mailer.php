<?php

$drugRow2 = $drugRow3 = $drugRow4 = $drugRow5 = $drugRow6 = $drugRow7 = $drugRow8 = $drugRow9 = $drugRow10 = "";

$userEmail = $_SESSION['user-email'];

$to = "daniel.hall@nnuh.nhs.uk";

$subject = "$ituWard - ITU stock order";

$headers = "From: $orderName - $ituWard" . "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "Reply-To: $userEmail";

$date = date('d/m/Y');

if (!empty($drugName2)) {
	
	$drugRow2 = "<tr class='drug-order'>
	<td colspan='3'><span>Drug:</span><br />$drugName2</td>
	<td rowspan='2'><span>Quantity</span><br />$drugQuantity2</td>
	<td rowspan='2'><span>Dispensed by:</span><br /></td>
	<td rowspan='2'><span>Checked by:</span><br /></td>
	</tr>
	<tr>
		<td colspan='3'><span>Directions (optional)</span><br />$directions2</td>
	</tr>";
}

if (!empty($drugName3)) {
	
	$drugRow3 = "<tr class='drug-order'>
	<td colspan='3'><span>Drug:</span><br />$drugName3</td>
	<td rowspan='2'><span>Quantity</span><br />$drugQuantity3</td>
	<td rowspan='2'><span>Dispensed by:</span><br /></td>
	<td rowspan='2'><span>Checked by:</span><br /></td>
	</tr>
	<tr>
		<td colspan='3'><span>Directions (optional)</span><br />$directions3</td>
	</tr>";
}

if (!empty($drugName4)) {
	
	$drugRow4 = "<tr class='drug-order'>
	<td colspan='3'><span>Drug:</span><br />$drugName4</td>
	<td rowspan='2'><span>Quantity</span><br />$drugQuantity4</td>
	<td rowspan='2'><span>Dispensed by:</span><br /></td>
	<td rowspan='2'><span>Checked by:</span><br /></td>
	</tr>
	<tr>
		<td colspan='3'><span>Directions (optional)</span><br />$directions4</td>
	</tr>";
}

if (!empty($drugName5)) {
	
	$drugRow5 = "<tr class='drug-order'>
	<td colspan='3'><span>Drug:</span><br />$drugName5</td>
	<td rowspan='2'><span>Quantity</span><br />$drugQuantity5</td>
	<td rowspan='2'><span>Dispensed by:</span><br /></td>
	<td rowspan='2'><span>Checked by:</span><br /></td>
	</tr>
	<tr>
		<td colspan='3'><span>Directions (optional)</span><br />$directions5</td>
	</tr>";
}

if (!empty($drugName6)) {
	
	$drugRow6 = "<tr class='drug-order'>
	<td colspan='3'><span>Drug:</span><br />$drugName6</td>
	<td rowspan='2'><span>Quantity</span><br />$drugQuantity6</td>
	<td rowspan='2'><span>Dispensed by:</span><br /></td>
	<td rowspan='2'><span>Checked by:</span><br /></td>
	</tr>
	<tr>
		<td colspan='3'><span>Directions (optional)</span><br />$directions6</td>
	</tr>";
}

if (!empty($drugName7)) {
	
	$drugRow7 = "<tr class='drug-order'>
	<td colspan='3'><span>Drug:</span><br />$drugName7</td>
	<td rowspan='2'><span>Quantity</span><br />$drugQuantity7</td>
	<td rowspan='2'><span>Dispensed by:</span><br /></td>
	<td rowspan='2'><span>Checked by:</span><br /></td>
	</tr>
	<tr>
		<td colspan='3'><span>Directions (optional)</span><br />$directions7</td>
	</tr>";
}

if (!empty($drugName8)) {
	
	$drugRow8 = "<tr class='drug-order'>
	<td colspan='3'><span>Drug:</span><br />$drugName8</td>
	<td rowspan='2'><span>Quantity</span><br />$drugQuantity8</td>
	<td rowspan='2'><span>Dispensed by:</span><br /></td>
	<td rowspan='2'><span>Checked by:</span><br /></td>
	</tr>
	<tr>
		<td colspan='3'><span>Directions (optional)</span><br />$directions8</td>
	</tr>";
}

if (!empty($drugName9)) {
	
	$drugRow9 = "<tr class='drug-order'>
	<td colspan='3'><span>Drug:</span><br />$drugName9</td>
	<td rowspan='2'><span>Quantity</span><br />$drugQuantity9</td>
	<td rowspan='2'><span>Dispensed by:</span><br /></td>
	<td rowspan='2'><span>Checked by:</span><br /></td>
	</tr>
	<tr>
		<td colspan='3'><span>Directions (optional)</span><br />$directions9</td>
	</tr>";
}

if (!empty($drugName10)) {
	
	$drugRow10 = "<tr class='drug-order'>
	<td colspan='3'><span>Drug:</span><br />$drugName10</td>
	<td rowspan='2'><span>Quantity</span><br />$drugQuantity10</td>
	<td rowspan='2'><span>Dispensed by:</span><br /></td>
	<td rowspan='2'><span>Checked by:</span><br /></td>
	</tr>
	<tr>
		<td colspan='3'><span>Directions (optional)</span><br />$directions10</td>
	</tr>";
}


//constructing the message

//$body = "From: $orderName - $position\n\nWard: $wardField\n\nExtension number: $ext\n\nOther information: $otherInfo\n\nDrug:\n\n$drugName $drugStrength $drugForm $drugQuantity\n\n$drugName2 $drugStrength2 $drugForm2 $drugQuantity2\n\n$drugName3 $drugStrength3 $drugForm3 $drugQuantity3\n\n$drugName4 $drugStrength4 $drugForm4 $drugQuantity4\n\n$drugName5 $drugStrength5 $drugForm5 $drugQuantity5\n\n$drugName6 $drugStrength6 $drugForm6 $drugQuantity6\n\n$drugName7 $drugStrength7 $drugForm7 $drugQuantity7\n\n$drugName8 $drugStrength8 $drugForm8 $drugQuantity8\n\n$drugName9 $drugStrength9 $drugForm9 $drugQuantity9\n\n$drugName10 $drugStrength10 $drugForm10 $drugQuantity10";

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
		text-align: left;
		border: 1px solid #000;
	}
	td {
		text-align: left;
		padding: 0 5px;
		border: 1px solid #000;
		vertical-align: top;
	}
	span {
		font-size: 8px
	}
	tr.drug-order td {
		border-top: 3px solid #333;
		height: 65px
	}
	.grey {
		background-color: lightgrey
	}
	.light-grey {
		background-color: #d3d3d3
	}
</style>
</head>
<body>
<h3>$ituWard Stock Order</h3>
<table>
	<tr>
		<th class='grey'><span>Ward:</span><br />$ituWard</th>
		<th class='light-grey'><span>Date:</span><br />$date</th>
		<th class='light-grey'><span>Ordered by:</span><br />$orderName &#128241;$ituExt</th>
		<th class='light-grey' colspan='3'>Transcription<br />checked by:</th>
	</tr>
	<tr>
		<td class='grey'><span>Patient initials:</span><br />$ituPatientInitials</td>
		<td class='grey'><span>Hospital number:</span><br />$ituHospNum</td>
		<td class='light-grey'><span>Cost centre:</span><br />$ituCostCentre</td>
		<td colspan='3'><span>Info:</span><br />$otherInfo</td>
	</tr>
	<tr class='drug-order'>
		<td colspan='3'><span>Drug:</span><br />$drugName</td>
		<td rowspan='2'><span>Quantity</span><br />$drugQuantity</td>
		<td rowspan='2'><span>Dispensed by:</span><br /></td>
		<td rowspan='2'><span>Checked by:</span><br /></td>
	</tr>
	<tr>
		<td colspan='3'><span>Directions (optional)</span><br />$directions</td>
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