<?php 
session_start();
include 'config/db-connect.php';
include 'config/ad-connect.php';

$userRole = '';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="author" content="Daniel Hall - daniel.hall@nnuh.nhs.uk">
	<title><?php if (!empty($pageTitle)) { echo $pageTitle . ' | '; } ?>Pharmacy Stock Ordering | NNUH Pharmacy</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
	<script src="https://kit.fontawesome.com/a407035b38.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" href="img/pso-icon.ico">
</head>
<body>
<header>
	<div class="header-container">
		<div class="header-logo"><a href="index.php"><img src="img/pso-logo.png" /></a></div>
		<div class="header-text">
			<?php 
			
				//Include menu and admin if sessions are set in ad-connect.php when user logs in
				if (isset($_SESSION['username'])) {
						echo $_SESSION['first-name'];
						echo ' ';
						echo $_SESSION['surname'];
					if (isset($_SESSION['user-role'])) {
						echo '<a href="admin.php"><button class="admin-button">';
						echo $_SESSION['user-role'];
						echo ' <i class="fas fa-cog"></i></button></a>';
					}
					$cdDispensary = array('Admin','Pharmacy manager','Dispensary user');
					if (isset($_SESSION['user-role'])) {
						if (($_SESSION['user-role'] == 'Admin') || ($_SESSION['user-role'] == 'Pharmacy manager') || ($_SESSION['user-role'] == 'Dispensary user')){
							echo '<a href="pharmacy.php"><button>Pharmacy</button></a>';
						}
					}
					echo '<form action="config/logout.php" method="post"><button type="submit" name="logout-submit">Log Out</button></form>';
					
					include 'menu-burger.inc.php';
				}

			?>
	</div>
	
</header>