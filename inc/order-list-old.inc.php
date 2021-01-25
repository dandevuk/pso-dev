<?php 	$queryResults = $emptyWard = '';	if (isset($_POST['submit'])) {				if (empty($_POST['wardSelect'])) {			$emptyWard = "Please select a ward";		} else {		$search= mysqli_real_escape_string($conn, $_POST['wardSelect']);		$sql = "SELECT * FROM stockOrderTable WHERE ward='$search' ORDER BY orderedOn DESC LIMIT 20";		$result = mysqli_query($conn, $sql);		$queryResults = mysqli_num_rows($result);				}	}?><div class="tab-container">		<button class="btn-select">Ward Stock</button>		<a href="cd-order-list.php"><button>Controlled Drugs</button></a>				<span class="error-text"><?php echo $emptyWard; ?></span>			</div>	<div class="list-table-wrapper">		<div class="select-ward-container">			<form action="order-list.php" method="POST">				<!-- Fetch wards from database -->				<?php include 'config/fetch-ward-list.php' ?>				Select ward 				<select name="wardSelect">					<option disabled selected value> -- Select ward -- </option>					<?php foreach ($wards as $ward) { ?>						<option><?php echo htmlspecialchars($ward['wardList']); ?></option>					<?php }; ?>				</select>				<button type="submit" name="submit">Go</button>				<a href="order-list.php"></a><button>Clear</button>			</form>		</div>		<table>    		<?php     			if ($queryResults > 0) {    							echo "<tr>			    	<th>Name</th>			    	<th>Ward</th>			    	<th>Drug</th>			    	<th>Quantity</th>			    	<th>Ordered</th>	    		</tr>";    				while ($row = mysqli_fetch_assoc($result)) { ?>    			<tr>    				<td>						<?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?>					</td>    				<td>						<?php echo $row['ward'] ?>					</td>					    				<td>						<?php echo $row['drugName'] ?> <?php echo $row['drugStrength'] ?> <?php echo $row['drugForm'] ?><br>						<?php echo $row['drugName2'] ?> <?php echo $row['drugStrength2'] ?> <?php echo $row['drugForm2'] ?><br>						<?php echo $row['drugName3'] ?> <?php echo $row['drugStrength3'] ?> <?php echo $row['drugForm3'] ?><br>						<?php echo $row['drugName4'] ?> <?php echo $row['drugStrength4'] ?> <?php echo $row['drugForm4'] ?><br>						<?php echo $row['drugName5'] ?> <?php echo $row['drugStrength5'] ?> <?php echo $row['drugForm5'] ?><br>						<?php echo $row['drugName6'] ?> <?php echo $row['drugStrength6'] ?> <?php echo $row['drugForm6'] ?><br>						<?php echo $row['drugName7'] ?> <?php echo $row['drugStrength7'] ?> <?php echo $row['drugForm7'] ?><br>						<?php echo $row['drugName8'] ?> <?php echo $row['drugStrength8'] ?> <?php echo $row['drugForm8'] ?><br>						<?php echo $row['drugName9'] ?> <?php echo $row['drugStrength9'] ?> <?php echo $row['drugForm9'] ?><br>						<?php echo $row['drugName10'] ?> <?php echo $row['drugStrength10'] ?> <?php echo $row['drugForm10'] ?>					</td>    				<td>						<?php echo $row['drugQuantity'] ?>					</td>    				<td>						<?php echo htmlspecialchars(date('d-m-Y',strtotime($row['orderedOn']))); ?>					</td>    			</tr>    		<?php } } else {										if (!isset($_POST['submit'])) {							echo "<div class='select-ward'>";							echo "Please select a ward to view latest orders";							echo "</div>";						} else {							echo "<div class='no-orders'>";							echo "There are no orders for this ward";							echo "</div>";						}    		 }; ?>		</table>	</div>