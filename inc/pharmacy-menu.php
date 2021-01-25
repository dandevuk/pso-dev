<?php$sql = "SELECT * FROM stockorders";$result = sqlsrv_query($conn, $sql);$resultRows = sqlsrv_has_rows($result);if ($resultRows === true) {	$menuNotification = 'block';}$sqlCD = "SELECT * FROM cdreqnumber";$resultCD = sqlsrv_query($conn, $sqlCD);$resultRowsCD = sqlsrv_has_rows($resultCD);if ($resultRowsCD === true) {	$menuNotificationCD = 'block';}$sqlITU = "SELECT * FROM ituorders";$resultITU = sqlsrv_query($conn, $sqlITU);$resultRowsITU = sqlsrv_has_rows($resultITU);if ($resultRowsITU === true) {	$menuNotificationITU = 'block';}if (isset($_SESSION['user-role'])) {	if ($_SESSION['user-role'] === 'Admin' || $_SESSION['user-role'] === 'Pharmacy manager' || $_SESSION['user-role'] === 'Dispensary user' || $_SESSION['user-role'] === 'Stores manager' || $_SESSION['user-role'] === 'Stores user') { ?>	<div class="front-menu-wrapper">
		<button class="front-menu-container" onclick="location.href='new-stock-orders.php';">					<div class="menu-notification" style="display:<?php echo $menuNotification ?>"></div>					<div class="front-icon">				<i class="fas fa-pills"></i>			</div>
			Stock<br>Orders
			<div class="order-info-container">
				For stock that is kept on the ward stock list. If the drug is not on the stock list please order via EPMA or contact your ward pharmacist.
			</div>
		</button>

		<button class="front-menu-container"onclick="location.href='new-cd-orders.php';">					<div class="menu-notification" style="display:<?php echo $menuNotificationCD ?>"></div>					<div class="front-icon">				<i class="fas fa-exclamation-triangle"></i>			</div>
			CD<br>Orders
			<div class="order-info-container">
				Controlled drugs must be ordered by an authorised Registered Nurse, Midwife or Operating Department Practitioner (ODP) for wards, theatres and recovery.
			</div>
		</button>		<button class="front-menu-container" onclick="location.href='new-itu-orders.php';">					<div class="menu-notification" style="display:<?php echo $menuNotificationITU ?>"></div>					<div class="front-icon">				<i class="fas fa-procedures"></i>			</div>			ITU<br>Orders			<div class="order-info-container">				<br />Please print orders and put in hotseat tray.<br /><br />			</div>		</button>

	</div><?php } else {	echo '<script>window.location.href = "index.php";</script>';} } else {	echo '<script>window.location.href = "index.php";</script>';}?>