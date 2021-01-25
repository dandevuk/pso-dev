<?php

$senderName = $_SESSION['first-name'] . ' ' . $_SESSION['surname'];
$userEmail = $_SESSION['user-email'];
$to = "$deleteEmail";

$subject = "CD Order $deleteReq has been cancelled";

$headers = "From: $senderName" . "\r\n";
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
	hr {
		border: none;
		border-top: 2px dashed #000
	}
</style>
</head>
<body style= 'text-align:center'>
Hello $firstNameConfirm<br><br>
Your order for $drugNameConfirm requsition number $deleteReq has been cancelled and deleted.<br><br>

Reason: $deleteReason<br><br>
Kind regards<br><br>
$senderName
</body>
</html>
";


// ...and away we go!

mail($to, $subject, $body, $headers);
?>