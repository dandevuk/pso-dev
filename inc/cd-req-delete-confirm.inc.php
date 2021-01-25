Are you sure you want to delete the below controlled drug requisition number?<br />
	<span><?php echo $deleteReq . ' - ' . $deleteReason ?></span>
	<br /><br />
	<table>
		<tr>
			<th>Req No.</th>
			<th>Name</th>
			<th>Position</th>
			<th>Ward</th>
			<th>Drug</th>
			<th>Quantity</th>
			<th>Date</th>
		</tr>
		<tr>
			<?php 
				
				$sql = "SELECT * FROM cdreqnumber WHERE reqNumberID = '$deleteReq'";
				$stmt = sqlsrv_query($conn, $sql);
			
			while ($row = sqlsrv_fetch_array($stmt)) { ?>
			
				<td><?php echo $row['reqNumberID'] ?></td>
				
				<td><?php echo $row['firstName'] . ' ' . $row['lastName'] ?></td>
				<td><?php echo $row['position'] ?></td>
				<td><?php echo $row['ward'] ?></td>
				<td><?php echo $row['drugName'] ?></td>
				<td><?php echo $row['quantity'] ?></td>
				<td><?php echo $row['orderedOn']->format('d-M-Y'); ?></td>
				
			<?php } ?>
		</tr>
	</table>
	<form method="POST" action="">
		<?php 
				$sql2 = "SELECT * FROM cdreqnumber WHERE reqNumberID = '$deleteReq'";
				$stmt2 = sqlsrv_query($conn, $sql2);
			while ($row = sqlsrv_fetch_array($stmt2)) { ?>
				<input type="hidden" name="first-name-confirm" value="<?php echo $row['firstName'] ?>">
				<input type="hidden" name="last-name-confirm" value="<?php echo $row['lastName'] ?>">
				<input type="hidden" name="ext-confirm" value="<?php echo $row['ext'] ?>">
				<input type="hidden" name="position-confirm" value="<?php echo $row['position'] ?>">
				<input type="hidden" name="ward-confirm" value="<?php echo $row['ward'] ?>">
				<input type="hidden" name="drug-name-confirm" value="<?php echo $row['drugName'] ?>">
				<input type="hidden" name="quantity-confirm" value="<?php echo $row['quantity'] ?>">
				<input type="hidden" name="ordered-on-confirm" value="<?php echo $row['orderedOn']->format('d-M-Y'); ?>">
		<?php } ?>
		<input type="hidden" name="delete-req-confirm" value="<?php echo $deleteReq; ?>">
		<input type="hidden" name="reason-confirm" value="<?php echo $deleteReason; ?>">
		<button type="submit" name="delete-req-confirm-submit"><i class="far fa-check-circle"></i> Yes</button> <a href="delete-cd-requisition.php"><button><i class="far fa-times-circle" id="no-confirm-icon"></i> No</button></a>
	</form>