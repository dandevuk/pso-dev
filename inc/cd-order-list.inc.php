<?php 
		<div class="select-ward-container">

			<form action="cd-order-list.php" method="POST">

				<!-- Fetch wards from database -->
				<?php include 'config/fetch-ward-list.php' ?>

				Select ward 
				<select name="wardSelect">
					<option disabled selected value> -- Select ward -- </option>
					<?php while( $row = sqlsrv_fetch_array( $stmt) ) { ?>
				</select>

				<button type="submit" name="submit">Go</button>
				<a href="cd-order-list.php"></a><button>Clear</button>

			</form>

		</div>
    		<?php 
					echo 'No orders';
    			<?php if ($resultRowsProcess == true) {
				echo "<table><tr>
			    	<th>Req No.</th>
			    	<th>Name</th>
			    	<th>Ward</th>
			    	<th>Drug</th>
			    	<th>Quantity</th>
			    	<th>Ordered</th>
	    		</tr>";
    			while ($row = sqlsrv_fetch_array($resultProcess, SQLSRV_FETCH_ASSOC)) { ?>
    			<tr>
    				<td><?php echo $row['reqNumberID'] ?></td>
    				<td><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></td>
    				<td><?php echo $row['ward'] ?></td>
    				<td><?php echo $row['drugName'] ?></td>
    				<td><?php echo $row['quantity'] ?></td>
    				<td><?php echo $row['orderedOn']; ?></td>
    			</tr>
    		<?php } } else {
	</div>