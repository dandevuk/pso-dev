<?php 	$result = $emptyWard = $resultRows = $resultRowsProcess = '';	if (isset($_POST['submit'])) {				if (empty($_POST['wardSelect'])) {			$emptyWard = "Please select a ward";		} else {						// Selected ward			$search = $_POST['wardSelect'];							// Database query			$sql = "SELECT * FROM cdreqnumber WHERE ward='$search' ORDER BY orderedOn DESC";						//Get query			$result = sqlsrv_query($conn, $sql);			$resultRows = sqlsrv_has_rows($result);						if( $result === false) {								die( print_r( sqlsrv_errors(), true) );							}						// Selected ward			$searchProcess = $_POST['wardSelect'];							// Database query			$sqlProcess = "SELECT TOP 20 * FROM cdreqnumberprocessed WHERE ward='$search' ORDER BY orderedOn DESC";						//Get query			$resultProcess = sqlsrv_query($conn, $sqlProcess);			$resultRowsProcess = sqlsrv_has_rows($resultProcess);						if( $resultProcess === false) {								die( print_r( sqlsrv_errors(), true) );							}				}	}?><div class="list-table-wrapper">			<h1>Controlled Drug Stock Orders</h1>		<span class="error-text"><?php echo $emptyWard; ?></span>
		<div class="select-ward-container">

			<form action="cd-order-list.php" method="POST">

				<!-- Fetch wards from database -->
				<?php include 'config/fetch-ward-list.php' ?>

				Select ward 
				<select name="wardSelect">
					<option disabled selected value> -- Select ward -- </option>
					<?php while( $row = sqlsrv_fetch_array( $stmt) ) { ?>						<option><?php echo $row[0] ?></option>					<?php }; ?>
				</select>

				<button type="submit" name="submit">Go</button>
				<a href="cd-order-list.php"></a><button>Clear</button>

			</form>

		</div>
    		<?php 							if ($resultRowsProcess === false && $resultRows === false) {
					echo 'No orders';				} else {    			if ($resultRows == true) {    			echo "<div class='order-header'>";				echo "Placed Orders ";				echo "</div>";				echo "<table><tr>			    	<th>Req No.</th>			    	<th>Name</th>			    	<th>Ward</th>			    	<th>Drug</th>			    	<th>Quantity</th>			    	<th>Ordered</th>	    		</tr>";    			while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>    			<tr>    				<td><?php echo $row['reqNumberID'] ?></td>    				<td><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></td>    				<td><?php echo $row['ward'] ?></td>    				<td><?php echo $row['drugName'] ?></td>    				<td><?php echo $row['quantity'] ?></td>    				<td><?php echo $row['orderedOn']->format('d-M-Y'); ?></td>    			</tr>				<?php } } else {							echo "<div class='no-orders'>";							echo "There are no current orders for this ward/department";							echo "</div>";				}?>				</table>
    			<?php if ($resultRowsProcess == true) {				echo "<div class='order-header' id='dispensed'>";				echo "Dispensed Orders";				echo "</div>";
				echo "<table><tr>
			    	<th>Req No.</th>
			    	<th>Name</th>
			    	<th>Ward</th>
			    	<th>Drug</th>
			    	<th>Quantity</th>
			    	<th>Ordered</th>			    	<th>Dispensed</th>
	    		</tr>";
    			while ($row = sqlsrv_fetch_array($resultProcess, SQLSRV_FETCH_ASSOC)) { ?>
    			<tr>
    				<td><?php echo $row['reqNumberID'] ?></td>
    				<td><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></td>
    				<td><?php echo $row['ward'] ?></td>
    				<td><?php echo $row['drugName'] ?></td>
    				<td><?php echo $row['quantity'] ?></td>
    				<td><?php echo $row['orderedOn']; ?></td>    				<td><?php echo $row['processedOn']->format('d-M-Y'); ?></td>
    			</tr>
    		<?php } } else {							echo "<div class='no-orders'>";							echo "No orders have been dispensed for this ward/department";							echo "</div>";		}				}?>		</table>
	</div>