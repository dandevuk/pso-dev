<?php 	$queryResults = $emptyWard = '';	if (isset($_POST['submit'])) {				if (empty($_POST['wardSelect'])) {			$emptyWard = "Please select a ward";		} else {			$search= $_POST['wardSelect'];			$sql = "SELECT TOP 20 * FROM ituorders WHERE ward = '$search' ORDER BY orderedOn DESC";			$result = sqlsrv_query($conn, $sql);			$queryResults = sqlsrv_has_rows($result);						if( $result === false) {								die( print_r( sqlsrv_errors(), true) );							}				}	}?>


<div class="list-table-wrapper">

	<h1>ITU Orders</h1>						<span class="error-text"><?php echo $emptyWard; ?></span>

		<div class="select-ward-container">

			<form action="" method="POST">

				<!-- Fetch wards from database -->
				<?php include 'config/fetch-ward-list.php' ?>

				Select ward 
				<select name="wardSelect">
					<option disabled selected value> -- Select ward -- </option>
					<?php while ($row = sqlsrv_fetch_array($stmt)) { ?>
						<option><?php echo $row[0] ?></option>
					<?php }; ?>
				</select>

				<button type="submit" name="submit">Go</button>
				<a href="order-list.php"></a><button>Clear</button>

			</form>

		</div>

		<div class="itu-order-wrapper">

			<ul>
				<?php 

					if ($queryResults === true) {
    			
    				while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
							<li>

								<div class="itu-order-container">
									
									<div class="order-details">
										<div class="patient">
											<h2>Patient</h2>
											<?php echo $row['hospNumber'] ?> <?php echo $row['patInitials'] ?>
										</div>
										<div class="ward">
											<div class="float-left">
												<h2>Ward</h2>
												<?php echo $row['ward'] ?>
											</div>
											<div class="float-left">
												<h2>Cost centre</h2>
												<?php echo $row['costCentre'] ?>
											</div>
										</div>
										<div class="float-clear ordered-by">
											<div class="float-left">
												<h2>Ordered by</h2>
												<?php echo $row['orderName'] ?>
											</div>
											<div class="float-left">
												<h2>Extension</h2>
												<?php echo $row['ext'] ?>
											</div>											<div class="float-left">												<h2>Date</h2>												<?php echo $row['orderedOn']->format('d-M-Y'); ?>											</div>
										</div>
									</div>
									
									<div class="itu-drug-order">

										<table>

											<th>Drug</th>
											<th>Qty</th>
											
											<tr>
												<td><?php echo $row['drugName'] ?></td>
												<td><?php echo $row['quantity'] ?></td>	
											</tr>

											<?php if(!empty($row['drugName2'])) { ?>
												<tr>
													<td><?php echo $row['drugName2'] ?></td>
													<td><?php echo $row['quantity2'] ?></td>
												</tr>
										    <?php } ?>

											<?php if(!empty($row['drugName3'])) { ?>
												<tr>
													<td><?php echo $row['drugName3'] ?></td>
													<td><?php echo $row['quantity3'] ?></td>	
												</tr>
										    <?php } ?>

											<?php if(!empty($row['drugName4'])) { ?>
												<tr>
													<td><?php echo $row['drugName4'] ?></td>
													<td><?php echo $row['quantity4'] ?></td>	
												</tr>
										    <?php } ?>

											<?php if(!empty($row['drugName5'])) { ?>
												<tr>
													<td><?php echo $row['drugName5'] ?></td>
													<td><?php echo $row['quantity5'] ?></td>		
												</tr>
										    <?php } ?>

											<?php if(!empty($row['drugName6'])) { ?>
												<tr>
													<td><?php echo $row['drugName6'] ?></td>
													<td><?php echo $row['quantity6'] ?></td>	
												</tr>
										    <?php } ?>

											<?php if(!empty($row['drugName7'])) { ?>
												<tr>
													<td><?php echo $row['drugName7'] ?></td>
													<td><?php echo $row['quantity7'] ?></td>		
												</tr>
										    <?php } ?>

											<?php if(!empty($row['drugName8'])) { ?>
												<tr>
													<td><?php echo $row['drugName8'] ?></td>
													<td><?php echo $row['quantity8'] ?></td>
												</tr>
										    <?php } ?>

											<?php if(!empty($row['drugName9'])) { ?>
												<tr>
													<td><?php echo $row['drugName9'] ?></td>
													<td><?php echo $row['quantity9'] ?></td>	
												</tr>
										    <?php } ?>

											<?php if(!empty($row['drugName10'])) { ?>
												<tr>
													<td><?php echo $row['drugName10'] ?></td>
													<td><?php echo $row['quantity10'] ?></td>		
												</tr>
										    <?php } ?>

										</table>
										
									</div>

								</div>		
								
							</li>
				<?php } } else {										if (!isset($_POST['submit'])) {							echo "<div class='select-ward'>";							echo "Please select a ward to view latest orders";							echo "</div>";						} else {							echo "<div class='no-orders'>";							echo "There are no orders for this ward";							echo "</div>";						}    		 }; ?>

			</ul>

		</div>

	</div>