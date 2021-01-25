<?php

	$ituWard = $ituExt = $ituPosition = $ituHospNum = $ituPatientInitials = $ituCostCentre = $otherInfo = $drugName = $drugQuantity = $directions = $drugName2 = $drugQuantity2 = $directions2 = $drugName3 = $drugQuantity3 = $directions3 = $drugName4 = $drugStrength4 = $drugForm4 = $drugQuantity4 = $directions4 = $drugName5 = $drugQuantity5 = $directions5 = $drugName6 = $drugQuantity6 = $directions6 = $drugName7 = $drugQuantity7 = $directions7 = $drugName8 = $drugQuantity8 = $directions8 = $drugName9 = $drugQuantity9 = $directions9 = $drugName10 = $drugQuantity10 = $directions10 = '';

	$errors = array('ward'=>'','ext'=>'','position'=>'','hospital-number'=>'','patient-initials'=>'','cost-centre'=>'','drug-name'=>'','drug-quantity'=>'','drugNoQty2'=>'','qtyNoDrug2'=>'','drugNoQty3'=>'','qtyNoDrug3'=>'','drugNoQty4'=>'','qtyNoDrug4'=>'','drugNoQty5'=>'','qtyNoDrug5'=>'','drugNoQty6'=>'','qtyNoDrug6'=>'','drugNoQty7'=>'','qtyNoDrug7'=>'','drugNoQty8'=>'','qtyNoDrug8'=>'','drugNoQty9'=>'','qtyNoDrug9'=>'','drugNoQty10'=>'','qtyNoDrug10'=>'','directionsNoDrug'=>'','directionsNoDrug2'=>'','directionsNoDrug3'=>'','directionsNoDrug4'=>'','directionsNoDrug5'=>'','directionsNoDrug6'=>'','directionsNoDrug7'=>'','directionsNoDrug8'=>'','directionsNoDrug9'=>'','directionsNoDrug10'=>'');	

	if (isset($_POST['submit'])) {

		$orderName = $_POST['ordered-by'];

		if (empty($_POST['ward'])) {
			$errors['ward'] = '<i class="fas fa-exclamation-circle"></i> A ward is required';
		} else {
			$ituWard = htmlspecialchars($_POST['ward']);
		}
		if (empty($_POST['ext'])) {
			$errors['ext'] = '<i class="fas fa-exclamation-circle"></i> An extension number is required';
		} else {
			$ituExt = htmlspecialchars($_POST['ext']);
		}
		if (empty($_POST['position'])) {
			$errors['position'] = '<i class="fas fa-exclamation-circle"></i> A position is required';
		} else {
			$ituPosition = htmlspecialchars($_POST['position']);
		}
		if (empty($_POST['hospital-number'])) {
			$errors['hospital-number'] = '<i class="fas fa-exclamation-circle"></i> Please input the patient hospital number';
		} else {
			$ituHospNum = htmlspecialchars($_POST['hospital-number']);
		}
		if (empty($_POST['patient-initials'])) {
			$errors['patient-initials'] = '<i class="fas fa-exclamation-circle"></i> Please input the patient initials';
		} else {
			$ituPatientInitials = htmlspecialchars($_POST['patient-initials']);
		}
		if (empty($_POST['cost-centre'])) {
			$errors['cost-centre'] = '<i class="fas fa-exclamation-circle"></i> Please select a cost-centre';
		} else {
			$ituCostCentre = htmlspecialchars($_POST['cost-centre']);
		}
		
		if (empty($_POST['drug-name'])) {
			$errors['drug-name'] = '<i class="fas fa-exclamation-circle"></i> A drug name is required';
		} else {
				$drugName = htmlspecialchars($_POST['drug-name']);
		}
		
		if (empty($_POST['drug-quantity'])) {
		    $errors['drug-quantity'] = '<i class="fas fa-exclamation-circle"></i> A drug quantity is required';
		} else {
			$drugQuantity = htmlspecialchars($_POST['drug-quantity']);
		}
		
		if (!empty($_POST['directions'])) {
			$directions = htmlspecialchars($_POST['directions']);
			if (empty($drugName)) {
				$errors['directionsNoDrug'] = 'Please enter drug';
			}
		}
		
		$otherInfo = htmlspecialchars($_POST['other-info']);
		
		// Drug 2
		if (!empty($_POST['drug-name2'])) {
			$drugName2 = htmlspecialchars($_POST['drug-name2']);
			$drugQuantity2 = htmlspecialchars($_POST['drug-quantity2']);
			if (empty($drugQuantity2)) {
				$errors['drugNoQty2'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity2'])) {
				$errors['qtyNoDrug2'] = 'Please select a drug';
				$drugQuantity2 = htmlspecialchars($_POST['drug-quantity2']);
				
			}
		}
		
		if (!empty($_POST['directions2'])) {
			$directions2 = htmlspecialchars($_POST['directions2']);
			if (empty($drugName2)) {
				$errors['directionsNoDrug2'] = 'Please enter drug';
			}
		}
		
		
		// Drug 3
		if (!empty($_POST['drug-name3'])) {
			$drugName3 = htmlspecialchars($_POST['drug-name3']);
			$drugQuantity3 = htmlspecialchars($_POST['drug-quantity3']);
			if (empty($drugQuantity3)) {
				$errors['drugNoQty3'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity3'])) {
				$errors['qtyNoDrug3'] = 'Please select a drug';
				$drugQuantity3 = htmlspecialchars($_POST['drug-quantity3']);
			}
		}
		
		if (!empty($_POST['directions3'])) {
			$directions3 = htmlspecialchars($_POST['directions3']);
			if (empty($drugName3)) {
				$errors['directionsNoDrug3'] = 'Please enter drug';
			}
		}
		
		
		// Drug 4
		if (!empty($_POST['drug-name4'])) {
			$drugName4 = htmlspecialchars($_POST['drug-name4']);
			$drugQuantity4 = htmlspecialchars($_POST['drug-quantity4']);
			if (empty($drugQuantity4)) {
				$errors['drugNoQty4'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity4'])) {
				$errors['qtyNoDrug4'] = 'Please select a drug';
				$drugQuantity4 = htmlspecialchars($_POST['drug-quantity4']);
			}
		}
		
		if (!empty($_POST['directions4'])) {
			$directions4 = htmlspecialchars($_POST['directions4']);
			if (empty($drugName4)) {
				$errors['directionsNoDrug4'] = 'Please enter drug';
			}
		}
		
		
		// Drug 5
		if (!empty($_POST['drug-name5'])) {
			$drugName5 = htmlspecialchars($_POST['drug-name5']);
			$drugQuantity5 = htmlspecialchars($_POST['drug-quantity5']);
			if (empty($drugQuantity5)) {
				$errors['drugNoQty5'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity5'])) {
				$errors['qtyNoDrug5'] = 'Please select a drug';
				$drugQuantity5 = htmlspecialchars($_POST['drug-quantity5']);
			}
		}
		
		if (!empty($_POST['directions5'])) {
			$directions5 = htmlspecialchars($_POST['directions5']);
			if (empty($drugName5)) {
				$errors['directionsNoDrug5'] = 'Please enter drug';
			}
		}
		
		
		// Drug 6
		if (!empty($_POST['drug-name6'])) {
			$drugName6 = htmlspecialchars($_POST['drug-name6']);
			$drugQuantity6 = htmlspecialchars($_POST['drug-quantity6']);
			if (empty($drugQuantity6)) {
				$errors['drugNoQty6'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity6'])) {
				$errors['qtyNoDrug6'] = 'Please select a drug';
				$drugQuantity6 = htmlspecialchars($_POST['drug-quantity6']);
			}
		}
		
		if (!empty($_POST['directions6'])) {
			$directions6 = htmlspecialchars($_POST['directions6']);
			if (empty($drugName6)) {
				$errors['directionsNoDrug6'] = 'Please enter drug';
			}
		}
		
		
		// Drug 7
		if (!empty($_POST['drug-name7'])) {
			$drugName7 = htmlspecialchars($_POST['drug-name7']);
			$drugQuantity7 = htmlspecialchars($_POST['drug-quantity7']);
			if (empty($drugQuantity7)) {
				$errors['drugNoQty7'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity7'])) {
				$errors['qtyNoDrug7'] = 'Please select a drug';
				$drugQuantity7 = htmlspecialchars($_POST['drug-quantity7']);
			}
		}
		
		if (!empty($_POST['directions7'])) {
			$directions7 = htmlspecialchars($_POST['directions7']);
			if (empty($drugName7)) {
				$errors['directionsNoDrug7'] = 'Please enter drug';
			}
		}
		
		
		// Drug 8
		if (!empty($_POST['drug-name8'])) {
			$drugName8 = htmlspecialchars($_POST['drug-name8']);
			$drugQuantity8 = htmlspecialchars($_POST['drug-quantity8']);
			if (empty($drugQuantity8)) {
				$errors['drugNoQty8'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity8'])) {
				$errors['qtyNoDrug8'] = 'Please select a drug';
				$drugQuantity8 = htmlspecialchars($_POST['drug-quantity8']);
			}
		}
		
		if (!empty($_POST['directions8'])) {
			$directions8 = htmlspecialchars($_POST['directions8']);
			if (empty($drugName8)) {
				$errors['directionsNoDrug8'] = 'Please enter drug';
			}
		}
		
		
		// Drug 9
		if (!empty($_POST['drug-name9'])) {
			$drugName9 = htmlspecialchars($_POST['drug-name9']);
			$drugQuantity9 = htmlspecialchars($_POST['drug-quantity9']);
			if (empty($drugQuantity9)) {
				$errors['drugNoQty9'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity9'])) {
				$errors['qtyNoDrug9'] = 'Please select a drug';
				$drugQuantity9 = htmlspecialchars($_POST['drug-quantity9']);
			}
		}
		
		if (!empty($_POST['directions9'])) {
			$directions9 = htmlspecialchars($_POST['directions9']);
			if (empty($drugName9)) {
				$errors['directionsNoDrug9'] = 'Please enter drug';
			}
		}
		
		
		// Drug 10
		if (!empty($_POST['drug-name10'])) {
			$drugName10 = htmlspecialchars($_POST['drug-name10']);
			$drugQuantity10 = htmlspecialchars($_POST['drug-quantity10']);
			if (empty($drugQuantity10)) {
				$errors['drugNoQty10'] = 'Please input a quantity';
			}
		} else {
			if (!empty($_POST['drug-quantity10'])) {
				$errors['qtyNoDrug10'] = 'Please select a drug';
				$drugQuantity10 = htmlspecialchars($_POST['drug-quantity10']);
			}
		}
		
		if (!empty($_POST['directions10'])) {
			$directions10 = htmlspecialchars($_POST['directions10']);
			if (empty($drugName10)) {
				$errors['directionsNoDrug10'] = 'Please enter drug';
			}
		}

	if (array_filter($errors)) {
		echo '<div class="failure-container">';
		echo '<i class="fas fa-exclamation-circle"></i> ';
		echo 'Order not placed, please rectify errors below. ';
		echo ' <i class="fas fa-exclamation-circle"></i>';
		echo '</div>';
	} else {
		// Insert form data into database
		$sql = "INSERT INTO ituorders (orderName, ward, ext, position, hospNumber, patInitials, costCentre, drugName, quantity, drugName2, quantity2, drugName3, quantity3, drugName4, quantity4, drugName5, quantity5, drugName6, quantity6, drugName7, quantity7, drugName8, quantity8, drugName9, quantity9, drugName10, quantity10) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$params1 = array($orderName, $ituWard, $ituExt, $ituPosition, $ituHospNum, $ituPatientInitials, $ituCostCentre, $drugName, $drugQuantity, $drugName2, $drugQuantity2, $drugName3, $drugQuantity3, $drugName4, $drugQuantity4, $drugName5, $drugQuantity5, $drugName6, $drugQuantity6, $drugName7, $drugQuantity7, $drugName8, $drugQuantity8, $drugName9, $drugQuantity9, $drugName10, $drugQuantity10);

		$result = sqlsrv_query($conn,$sql,$params1);
		
		if($result === false ) {
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
				}
			}
		} else {
			// show confirmation
			include 'inc/itu-success-close.inc.php';
			
			// Send email
			include 'config/itu-order-mailer.php';
		}
		
	}
}

?>
<div class="form-wrapper" style="padding-bottom:50px" id="additional-stock">
<h2>ITU patient order form</h2>
		<!--action="index.php" method="post"--> 
		<form action="" method="post" name="add-itu-order" id="add-itu-order">		
			<div class="itu-form-container">							
				<div>					
					Ordered by<br />					
					<input type="text" name="ordered-by" value="<?php echo $_SESSION['first-name'] . ' ' . $_SESSION['surname']; ?>" readonly="readonly" />				
				</div>							
				<div>	
					<!-- Fetch wards from database -->
					<?php include 'config/fetch-ward-list.php' ?>
					Ward<br />
					<select name="ward" value="<?php echo htmlspecialchars($ituWard); ?>">
						<option disabled selected value> -- Select an option -- </option>
						<?php while( $row = sqlsrv_fetch_array( $stmt) ) { ?>

							<option><?php echo $row[0] ?></option>

						<?php }; ?>
					</select>
					<div class="error-text"><?php echo $errors['ward']; ?></div>
				</div>		
				<div>
					Extension<br />
					<input style="width:60px" type="text" name="ext" value="<?php echo htmlspecialchars($ituExt); ?>" />
					<div class="error-text"><?php echo $errors['ext']; ?></div>
				</div>	
				<div>
					Position<br />
					<input style="width:255px" type="text" name="position" value="<?php echo $_SESSION['title']; ?>" />
				</div>
			</div>	
			<div class="itu-form-container">					
				<div>					
					Hospital number<br />					
					<input type="text" name="hospital-number" maxlength="7" onkeypress="return isNumberKey(event)" value="<?php echo htmlspecialchars($ituHospNum); ?>" />
					<div class="error-text"><?php echo $errors['hospital-number']; ?></div>
				</div>							
				<div>					
					Initials<br />					
					<input style="width:60px" type="text" name="patient-initials" value="<?php echo htmlspecialchars($ituPatientInitials); ?>"  />		
					<div class="error-text"><?php echo $errors['patient-initials']; ?></div>		
				</div>							
				<div>					
					Consultant<br />					
					<input type="text" name="cost-centre" value="<?php echo htmlspecialchars($ituCostCentre); ?>"  />					
					<div class="error-text"><?php echo $errors['cost-centre']; ?></div>		
				</div>		
				<div>
					Other information (optional) <input style="width: 265px" name="other-info" value="<?php echo htmlspecialchars($otherInfo); ?>" id="itu-other-info">
				</div>
			</div>						
			<div class="itu-drug-container">	
				<div class="order-info">
					<span><i class="fas fa-info-circle"></i></span> Please make sure all input fields are completed.
				</div>
				<ul id="itu-drug">									
					<ul id="itu-drug">									
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">			
							<div class="search-box">
								Drug<br />
								<input type="text" autocomplete="off" name="drug-name" style="width: 652px;margin-bottom: 5px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName); ?>" />
								<div class="result"></div>
								<div class="error-text"><?php echo $errors['drug-name']; ?></div>	
								<div class="error-text"><?php echo $errors['directionsNoDrug']; ?></div>
							</div>												
							<div>								
								Quantity<br />								
								<input style="width:60px" type=text" name="drug-quantity" value="<?php echo htmlspecialchars($drugQuantity); ?>"  />			
								<div class="error-text"><?php echo $errors['drug-quantity']; ?></div>					
							</div>
						</div>		
						<div class="itu-form-container" style="margin-bottom: 0!important;margin-top:-10px">
							<div style="min-width:100%">
								Directions (optional)<br />
								<input style="min-width:95%" type="text" name="directions" value="<?php echo htmlspecialchars($directions); ?>" />
							</div>
						</div>
					</li>			
					
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">											
							<div class="search-box">
								Drug<br />
								<input type="text" autocomplete="off" name="drug-name2" style="width: 652px;margin-bottom: 5px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName2); ?>" />
								<div class="result"></div>
								<div class="error-text"><?php echo $errors['qtyNoDrug2']; ?></div>	
								<div class="error-text"><?php echo $errors['directionsNoDrug2']; ?></div>
							</div>															
							<div>								
								Quantity<br />								
								<input style="width:60px" type=text" name="drug-quantity2" value="<?php echo htmlspecialchars($drugQuantity2); ?>"  />			
								<div class="error-text"><?php echo $errors['drugNoQty2']; ?></div>					
							</div>
						</div>		
						<div class="itu-form-container" style="margin-bottom: 0!important;margin-top:-10px">
							<div style="min-width:100%">
								Directions (optional)<br />
								<input style="min-width:95%" type="text" name="directions2" value="<?php echo htmlspecialchars($directions2); ?>" />
							</div>
						</div>
					</li>			
					
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">											
							<div class="search-box">
								Drug<br />
								<input type="text" autocomplete="off" name="drug-name3" style="width: 652px;margin-bottom: 5px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName3); ?>" />
								<div class="result"></div>
								<div class="error-text"><?php echo $errors['qtyNoDrug3']; ?></div>	
								<div class="error-text"><?php echo $errors['directionsNoDrug3']; ?></div>
							</div>															
							<div>								
								Quantity<br />								
								<input style="width:60px" type=text" name="drug-quantity3" value="<?php echo htmlspecialchars($drugQuantity3); ?>"  />				
								<div class="error-text"><?php echo $errors['drugNoQty3']; ?></div>				
							</div>
						</div>		
						<div class="itu-form-container" style="margin-bottom: 0!important;margin-top:-10px">
							<div style="min-width:100%">
								Directions (optional)<br />
								<input style="min-width:95%" type="text" name="directions3" value="<?php echo htmlspecialchars($directions3); ?>" />
							</div>
						</div>
					</li>		
					
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">											
							<div class="search-box">
								Drug<br />
								<input type="text" autocomplete="off" name="drug-name4" style="width: 652px;margin-bottom: 5px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName4); ?>" />
								<div class="result"></div>
								<div class="error-text"><?php echo $errors['qtyNoDrug4']; ?></div>		
								<div class="error-text"><?php echo $errors['directionsNoDrug4']; ?></div>
							</div>														
							<div>								
								Quantity<br />								
								<input style="width:60px" type=text" name="drug-quantity4" value="<?php echo htmlspecialchars($drugQuantity4); ?>"  />			
								<div class="error-text"><?php echo $errors['drugNoQty4']; ?></div>				
							</div>
						</div>		
						<div class="itu-form-container" style="margin-bottom: 0!important;margin-top:-10px">
							<div style="min-width:100%">
								Directions (optional)<br />
								<input style="min-width:95%" type="text" name="directions4" value="<?php echo htmlspecialchars($directions4); ?>" />
							</div>
						</div>
					</li>		
					
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">											
							<div class="search-box">
								Drug<br />
								<input type="text" autocomplete="off" name="drug-name5" style="width: 652px;margin-bottom: 5px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName5); ?>" />
								<div class="result"></div>
								<div class="error-text"><?php echo $errors['qtyNoDrug5']; ?></div>	
								<div class="error-text"><?php echo $errors['directionsNoDrug5']; ?></div>
							</div>															
							<div>								
								Quantity<br />								
								<input style="width:60px" type=text" name="drug-quantity5" value="<?php echo htmlspecialchars($drugQuantity5); ?>"  />					
								<div class="error-text"><?php echo $errors['drugNoQty5']; ?></div>		
							</div>
						</div>		
						<div class="itu-form-container" style="margin-bottom: 0!important;margin-top:-10px">
							<div style="min-width:100%">
								Directions (optional)<br />
								<input style="min-width:95%" type="text" name="directions5" value="<?php echo htmlspecialchars($directions5); ?>" />
							</div>
						</div>
					</li>		
					
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">											
							<div class="search-box">
								Drug<br />
								<input type="text" autocomplete="off" name="drug-name6" style="width: 652px;margin-bottom: 5px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName6); ?>" />
								<div class="result"></div>
								<div class="error-text"><?php echo $errors['qtyNoDrug6']; ?></div>	
								<div class="error-text"><?php echo $errors['directionsNoDrug6']; ?></div>
							</div>																
							<div>								
								Quantity<br />								
								<input style="width:60px" type=text" name="drug-quantity6" value="<?php echo htmlspecialchars($drugQuantity6); ?>"  />				
								<div class="error-text"><?php echo $errors['drugNoQty6']; ?></div>				
							</div>
						</div>		
						<div class="itu-form-container" style="margin-bottom: 0!important;margin-top:-10px">
							<div style="min-width:100%">
								Directions (optional)<br />
								<input style="min-width:95%" type="text" name="directions6" value="<?php echo htmlspecialchars($directions6); ?>" />
							</div>
						</div>
					</li>	
					
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">											
							<div class="search-box">
								Drug<br />
								<input type="text" autocomplete="off" name="drug-name7" style="width: 652px;margin-bottom: 5px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName7); ?>" />
								<div class="result"></div>
								<div class="error-text"><?php echo $errors['qtyNoDrug7']; ?></div>	
								<div class="error-text"><?php echo $errors['directionsNoDrug7']; ?></div>
							</div>															
							<div>								
								Quantity<br />								
								<input style="width:60px" type=text" name="drug-quantity7" value="<?php echo htmlspecialchars($drugQuantity7); ?>"  />			
								<div class="error-text"><?php echo $errors['drugNoQty7']; ?></div>			
							</div>
						</div>		
						<div class="itu-form-container" style="margin-bottom: 0!important;margin-top:-10px">
							<div style="min-width:100%">
								Directions (optional)<br />
								<input style="min-width:95%" type="text" name="directions7" value="<?php echo htmlspecialchars($directions7); ?>" />
							</div>
						</div>
					</li>	
					
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">											
							<div class="search-box">
								Drug<br />
								<input type="text" autocomplete="off" name="drug-name8" style="width: 652px;margin-bottom: 5px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName8); ?>" />
								<div class="result"></div>
								<div class="error-text"><?php echo $errors['qtyNoDrug8']; ?></div>	
								<div class="error-text"><?php echo $errors['directionsNoDrug8']; ?></div>
							</div>														
							<div>								
								Quantity<br />								
								<input style="width:60px" type=text" name="drug-quantity8" value="<?php echo htmlspecialchars($drugQuantity8); ?>"  />				
								<div class="error-text"><?php echo $errors['drugNoQty8']; ?></div>			
							</div>
						</div>		
						<div class="itu-form-container" style="margin-bottom: 0!important;margin-top:-10px">
							<div style="min-width:100%">
								Directions (optional)<br />
								<input style="min-width:95%" type="text" name="directions8" value="<?php echo htmlspecialchars($directions8); ?>" />
							</div>
						</div>
					</li>	
					
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">											
							<div class="search-box">
								Drug<br />
								<input type="text" autocomplete="off" name="drug-name9" style="width: 652px;margin-bottom: 5px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName9); ?>" />
								<div class="result"></div>
								<div class="error-text"><?php echo $errors['qtyNoDrug9']; ?></div>	
								<div class="error-text"><?php echo $errors['directionsNoDrug9']; ?></div>
							</div>														
							<div>								
								Quantity<br />								
								<input style="width:60px" type=text" name="drug-quantity9" value="<?php echo htmlspecialchars($drugQuantity9); ?>"  />			
								<div class="error-text"><?php echo $errors['drugNoQty9']; ?></div>				
							</div>
						</div>		
						<div class="itu-form-container" style="margin-bottom: 0!important;margin-top:-10px">
							<div style="min-width:100%">
								Directions (optional)<br />
								<input style="min-width:95%" type="text" name="directions9" value="<?php echo htmlspecialchars($directions9); ?>" />
							</div>
						</div>
					</li>		
					
					<li>
						<div class="itu-form-container" style="margin-bottom: 0!important">											
							<div class="search-box">
								Drug<br />
								<input type="text" autocomplete="off" name="drug-name10" style="width: 652px;margin-bottom: 5px" placeholder="Search drug..." value="<?php echo htmlspecialchars($drugName10); ?>" />
								<div class="result"></div>
								<div class="error-text"><?php echo $errors['qtyNoDrug10']; ?></div>	
								<div class="error-text"><?php echo $errors['directionsNoDrug10']; ?></div>
							</div>													
							<div>								
								Quantity<br />								
								<input style="width:60px" type=text" name="drug-quantity10" value="<?php echo htmlspecialchars($drugQuantity10); ?>"  />			
								<div class="error-text"><?php echo $errors['drugNoQty10']; ?></div>			
							</div>
						</div>		
						<div class="itu-form-container" style="margin-bottom: 0!important;margin-top:-10px">
							<div style="min-width:100%">
								Directions (optional)<br />
								<input style="min-width:95%" type="text" name="directions10" value="<?php echo htmlspecialchars($directions10); ?>" />
							</div>
						</div>
					</li>								
				</ul>					
			</div>	
			<div class="form-button-container-fixed" id="place-order">
				<div class="form-ward-orders">
					Has this item already been ordered? Check the latest stock orders.
					<a href="itu-order-list.php">Ward Orders</a>
				</div>
				<button class="order-btn" type="submit" name="submit" onclick="document.getElementById('loading-wrapper').style.display='flex'">PLACE ORDER</button>
			</div>

		</form>
</div>
<script>
//Place order div scroll
$.fn.followTo = function (pos) {
	var $this = this,
	$window = $(window);

$window.scroll(function (e) {
     if ($window.scrollTop() > pos) {
        $this.css({
            position: 'absolute',
			top: '96%'
            });
		} else {
			$this.css({
				position: 'fixed',
				top: '90%'
			});
		}
    });
};

$('#place-order').followTo(620);
</script>