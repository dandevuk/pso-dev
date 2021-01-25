<?php

	$ward = $ext = $drugName = $otherInfo = $drugName = $quantity = $drugName2 = $quantity2 = $drugName3 = $quantity3 = $drugName4 = $quantity4 = $drugName5 = $quantity5 = $drugName6 = $quantity6 = $drugName7 = $quantity7 = $drugName8 = $quantity8 = $drugName9 = $quantity9 = $drugName10 = $quantity10 = '';

	$errors = array('ward'=>'','ext'=>'','position'=>'','drugName'=>'','quantity'=>'','drugNoQty2'=>'','qtyNoDrug2'=>'','drugNoQty3'=>'','qtyNoDrug3'=>'','drugNoQty4'=>'','qtyNoDrug4'=>'','drugNoQty5'=>'','qtyNoDrug5'=>'','drugNoQty6'=>'','qtyNoDrug6'=>'','drugNoQty7'=>'','qtyNoDrug7'=>'','drugNoQty8'=>'','qtyNoDrug8'=>'','drugNoQty9'=>'','qtyNoDrug9'=>'','drugNoQty10'=>'','qtyNoDrug10'=>'');

	if (isset($_POST['submit'])) {

		$orderName = $_POST['ordered-by'];

		if (empty($_POST['ward'])) {
			$errors['ward'] = '<i class="fas fa-exclamation-circle"></i> A ward is required';
		} else {
			$ward = htmlspecialchars($_POST['ward']);
		}
		if (empty($_POST['ext'])) {
			$errors['ext'] = '<i class="fas fa-exclamation-circle"></i> An extension is required';
		} else {
			$ext = htmlspecialchars($_POST['ext']);
		}
		if (empty($_POST['position'])) {
			$errors['position'] = '<i class="fas fa-exclamation-circle"></i> A position is required';
		} else {
			$position = htmlspecialchars($_POST['position']);
		}
		
		$otherInfo = htmlspecialchars($_POST['other-info']);

		if (empty($_POST['drug-name'])) {
			$errors['drugName'] = '<i class="fas fa-exclamation-circle"></i> A drug name is required';
		} else {
			$drugName = htmlspecialchars($_POST['drug-name']);
		}
		
		if (empty($_POST['drug-quantity'])) {
		    $errors['quantity'] = '<i class="fas fa-exclamation-circle"></i> A drug quantity is required';
		} else {
			$quantity = htmlspecialchars($_POST['drug-quantity']);
		}

		if (!empty($_POST['drug-name2'])) {
			$drugName2 = htmlspecialchars($_POST['drug-name2']);
			$quantity2 = htmlspecialchars($_POST['drug-quantity2']);
			if (empty($quantity2)) {
				$errors['drugNoQty2'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity2'])) {
				$errors['qtyNoDrug2'] = 'Please select a drug';
			}
		}

		if (!empty($_POST['drug-name3'])) {
			$drugName3 = htmlspecialchars($_POST['drug-name3']);
			$quantity3 = htmlspecialchars($_POST['drug-quantity3']);
			if (empty($quantity3)) {
				$errors['drugNoQty3'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity3'])) {
				$errors['qtyNoDrug3'] = 'Please select a drug';
			}
		}
		
		if (!empty($_POST['drug-name4'])) {
			$drugName4 = htmlspecialchars($_POST['drug-name4']);
			$quantity4 = htmlspecialchars($_POST['drug-quantity4']);
			if (empty($quantity4)) {
				$errors['drugNoQty4'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity4'])) {
				$errors['qtyNoDrug4'] = 'Please select a drug';
			}
		}
		
		if (!empty($_POST['drug-name5'])) {
			$drugName5 = htmlspecialchars($_POST['drug-name5']);
			$quantity5 = htmlspecialchars($_POST['drug-quantity5']);
			if (empty($quantity5)) {
				$errors['drugNoQty5'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity5'])) {
				$errors['qtyNoDrug5'] = 'Please select a drug';
			}
		}
		
		if (!empty($_POST['drug-name6'])) {
			$drugName6 = htmlspecialchars($_POST['drug-name6']);
			$quantity6 = htmlspecialchars($_POST['drug-quantity6']);
			if (empty($quantity6)) {
				$errors['drugNoQty6'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity6'])) {
				$errors['qtyNoDrug6'] = 'Please select a drug';
			}
		}

		if (!empty($_POST['drug-name7'])) {
			$drugName7 = htmlspecialchars($_POST['drug-name7']);
			$quantity7 = htmlspecialchars($_POST['drug-quantity7']);
			if (empty($quantity7)) {
				$errors['drugNoQty7'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity7'])) {
				$errors['qtyNoDrug7'] = 'Please select a drug';
			}
		}

		if (!empty($_POST['drug-name8'])) {
			$drugName8 = htmlspecialchars($_POST['drug-name8']);
			$quantity8 = htmlspecialchars($_POST['drug-quantity8']);
			if (empty($quantity8)) {
				$errors['drugNoQty8'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity8'])) {
				$errors['qtyNoDrug8'] = 'Please select a drug';
			}
		}

		if (!empty($_POST['drug-name9'])) {
			$drugName9 = htmlspecialchars($_POST['drug-name9']);
			$quantity9 = htmlspecialchars($_POST['drug-quantity9']);
			if (empty($quantity9)) {
				$errors['drugNoQty9'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity9'])) {
				$errors['qtyNoDrug9'] = 'Please select a drug';
			}
		}

		if (!empty($_POST['drug-name10'])) {
			$drugName10 = htmlspecialchars($_POST['drug-name10']);
			$quantity10 = htmlspecialchars($_POST['drug-quantity10']);
			if (empty($quantity10)) {
				$errors['drugNoQty10'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity10'])) {
				$errors['qtyNoDrug10'] = 'Please select a drug';
			}
		}

	if (array_filter($errors)) {
		echo '<div class="failure-container">';
		echo '<i class="fas fa-exclamation-circle"></i> ';
		echo 'Order not placed, please rectify errors below. ';
		echo ' <i class="fas fa-exclamation-circle"></i>';
		echo '</div>';
	} else {
		
		$firstName = $_SESSION['first-name'] ;
		$lastName = $_SESSION['surname'];
		$name = $firstName . ' ' . $lastName;
		$date = date('d-m-Y');
		
		// Insert form data into database
		$sql = "INSERT INTO stockorders (name, ward, ext, position, drugName, quantity, drugName2, quantity2, drugName3, quantity3, drugName4, quantity4, drugName5, quantity5, drugName6, quantity6, drugName7, quantity7, drugName8, quantity8, drugName9, quantity9, drugName10, quantity10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$params1 = array($orderName, $ward, $ext, $position, $drugName, $quantity, $drugName2, $quantity2, $drugName3, $quantity3, $drugName4, $quantity4, $drugName5, $quantity5, $drugName6, $quantity6, $drugName7, $quantity7, $drugName8, $quantity8, $drugName9, $quantity9, $drugName10, $quantity10);

		$result = sqlsrv_query($conn,$sql,$params1);
		
		if($result === false ) {
			if( ($errors = sqlsrv_errors() ) != null) {
				echo 'Order not placed, please contact empa@nnuh.nhs.uk';
				foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
				}
			}
		} else {
			// show confirmation
			
			include 'inc/success-close.inc.php';
			
			// Send email
			
			include 'config/order-mailer.php';
		}

	}
}

?>
<div class="form-wrapper" style="padding-bottom:50px" id="additional-stock">
<h2>Ward stock order form</h2>
		<!--action="index.php" method="post"--> 
		<form action="" method="post" name="add-itu-order" id="add-itu-order">		
			<div class="itu-form-container">							
				<div>					
					Ordered by<br />					
					<input type="text" name="ordered-by" value="<?php echo $_SESSION['first-name'] . ' ' . $_SESSION['surname']; ?>" readonly="readonly" />				
				</div>							
				<div>	
					<!-- Fetch wards from database -->
					<?php include 'config/fetch-ward-list.php'; ?>
					Ward<br />
					<select name="ward" value="<?php echo htmlspecialchars($ward); ?>">
						<option disabled selected value> -- Select an option -- </option>
						<?php while( $row = sqlsrv_fetch_array( $stmt) ) { ?>
						
							<option <?php if (isset($ward) && $ward==$row[0]) {echo "selected";} ?>><?php echo $row[0] ?></option>

						<?php }; ?>
					</select>
					<div class="error-text"><?php echo $errors['ward']; ?></div>
				</div>		
				<div>
					Extension<br />
					<input style="width:60px" type="text" name="ext"  value="<?php echo htmlspecialchars($ext); ?>"/>
					<div class="error-text"><?php echo $errors['ext']; ?></div>
				</div>	
				<div>
					Position<br />
					<input style="width:256px" type="text" name="position" value="<?php echo $_SESSION['title']; ?>" />
					<div class="error-text"><?php echo $errors['position']; ?></div>
				</div>
			</div>
			<div class="itu-drug-container">	
				<div class="order-info">
					<span><i class="fas fa-info-circle"></i></span> Please make sure all above input fields are completed.
				</div>
				<ul id="itu-drug">									
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">
							<div class="search-box">
								Drug<br />
								<input type="text" autocomplete="off" name="drug-name" style="width: 600px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName); ?>" />
								<div class="result"></div>
								<div class="error-text"><?php echo $errors['drugName']; ?></div>	
							</div>
							<div>						
								Quantity<br />
								<input style="width:80px" type="text" name="drug-quantity" value="<?php echo htmlspecialchars($quantity); ?>"  />		
								<div class="error-text"><?php echo $errors['quantity']; ?></div>					
							</div>
						</div>									
					</li>
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">
							<div class="search-box">
								<input type="text" autocomplete="off" name="drug-name2" style="width: 600px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName2); ?>" />
								<div class="error-text"><?php echo $errors['qtyNoDrug2']; ?></div>
								<div class="result"></div>	
							</div>
							<div>	
								<input style="width:80px" type="text" name="drug-quantity2" value="<?php echo htmlspecialchars($quantity2); ?>" />		
								<div class="error-text"><?php echo $errors['drugNoQty2']; ?></div>
							</div>
						</div>									
					</li>	
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">
							<div class="search-box">
								<input type="text" autocomplete="off" name="drug-name3" style="width: 600px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName3); ?>" />
								<div class="error-text"><?php echo $errors['qtyNoDrug3']; ?></div>
								<div class="result"></div>	
							</div>
							<div>			
								<input style="width:80px" type="text" name="drug-quantity3" value="<?php echo htmlspecialchars($quantity3); ?>" />				
								<div class="error-text"><?php echo $errors['drugNoQty3']; ?></div>			
							</div>
						</div>									
					</li>	
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">
							<div class="search-box">
								<input type="text" autocomplete="off" name="drug-name4" style="width: 600px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName4); ?>" />
								<div class="error-text"><?php echo $errors['qtyNoDrug4']; ?></div>
								<div class="result"></div>	
							</div>
							<div>				
								<input style="width:80px" type="text" name="drug-quantity4" value="<?php echo htmlspecialchars($quantity4); ?>" />					
								<div class="error-text"><?php echo $errors['drugNoQty4']; ?></div>		
							</div>
						</div>									
					</li>	
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">
							<div class="search-box">
								<input type="text" autocomplete="off" name="drug-name5" style="width: 600px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName5); ?>" />
								<div class="error-text"><?php echo $errors['qtyNoDrug5']; ?></div>
								<div class="result"></div>	
							</div>
							<div>				
								<input style="width:80px" type="text" name="drug-quantity5" value="<?php echo htmlspecialchars($quantity5); ?>" />				
								<div class="error-text"><?php echo $errors['drugNoQty5']; ?></div>			
							</div>
						</div>									
					</li>	
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">
							<div class="search-box">
								<input type="text" autocomplete="off" name="drug-name6" style="width: 600px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName6); ?>" />
								<div class="error-text"><?php echo $errors['qtyNoDrug6']; ?></div>
								<div class="result"></div>	
							</div>
							<div>			
								<input style="width:80px" type="text" name="drug-quantity6" value="<?php echo htmlspecialchars($quantity6); ?>" />				
								<div class="error-text"><?php echo $errors['drugNoQty6']; ?></div>			
							</div>
						</div>									
					</li>	
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">
							<div class="search-box">
								<input type="text" autocomplete="off" name="drug-name7" style="width: 600px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName7); ?>" />
								<div class="error-text"><?php echo $errors['qtyNoDrug7']; ?></div>
								<div class="result"></div>	
							</div>
							<div>		
								<input style="width:80px" type="text" name="drug-quantity7" value="<?php echo htmlspecialchars($quantity7); ?>" />			
								<div class="error-text"><?php echo $errors['drugNoQty7']; ?></div>				
							</div>
						</div>									
					</li>	
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">
							<div class="search-box">
								<input type="text" autocomplete="off" name="drug-name8" style="width: 600px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName8); ?>" />
								<div class="error-text"><?php echo $errors['qtyNoDrug8']; ?></div>
								<div class="result"></div>	
							</div>
							<div>			
								<input style="width:80px" type="text" name="drug-quantity8" value="<?php echo htmlspecialchars($quantity8); ?>" />				
								<div class="error-text"><?php echo $errors['drugNoQty8']; ?></div>			
							</div>
						</div>									
					</li>	
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">
							<div class="search-box">
								<input type="text" autocomplete="off" name="drug-name9" style="width: 600px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName9); ?>" />
								<div class="error-text"><?php echo $errors['qtyNoDrug9']; ?></div>
								<div class="result"></div>	
							</div>
							<div>				
								<input style="width:80px" type="text" name="drug-quantity9" value="<?php echo htmlspecialchars($quantity9); ?>" />				
								<div class="error-text"><?php echo $errors['drugNoQty9']; ?></div>			
							</div>
						</div>									
					</li>	
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">
							<div class="search-box">
								<input type="text" autocomplete="off" name="drug-name10" style="width: 600px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName10); ?>" />
								<div class="error-text"><?php echo $errors['qtyNoDrug10']; ?></div>
								<div class="result"></div>	
							</div>
							<div>
								<input style="width:80px" type="text" name="drug-quantity10" value="<?php echo htmlspecialchars($quantity10); ?>" />			
								<div class="error-text"><?php echo $errors['drugNoQty10']; ?></div>				
							</div>
						</div>									
					</li>								
				</ul>						
			</div>											
			<div class="itu-form-container" style="margin-bottom: 20px">	
				<div class="other-info-container">
					Other information (optional) <input style="width: 715px;margin-left:10px" name="other-info" value="<?php echo htmlspecialchars($otherInfo); ?>">	
				</div>
			</div>
			<div class="form-button-container-fixed" id="place-order">
				<div class="form-ward-orders">
					Have any of these been ordered already? Check the latest stock orders.
					<a href="order-list.php">Recent stock orders</a>
				</div>
				<button class="order-btn" type="submit" name="submit" onclick="document.getElementById('loading-wrapper').style.display='flex'">PLACE ORDER <i class="fas fa-paper-plane"></i></button>
			</div>

		</form>
</div>
<script>
//Place order scroll - stock and itu order pages
$.fn.followTo = function (pos) {
	var $this = this,
	$window = $(window);

$window.scroll(function (e) {
     if ($window.scrollTop() > pos) {
        $this.css({
            position: 'absolute',
			top: '93.5%'
            });
		} else {
			$this.css({
				position: 'fixed',
				top: '90%'
			});
		}
    });
};

$('#place-order').followTo(100);
</script>