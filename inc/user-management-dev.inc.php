<?php
	// Add user
	$addUser = $deleteUser = $addUserConfirm = $UserAdded = $addRole = '';
	
	$errors = array('new-user-name'=>'','new-user-role'=>'','select-user-delete'=>'');

	if (isset($_POST['new-user-submit'])) {
		
		if (empty($_POST['new-user-name'])) {
			$errors['new-user-name'] = '<br />Please input a user to add';
		} else {
			$userCheck = htmlspecialchars($_POST['new-user-name']);
			$sqlCheck = "SELECT username FROM users WHERE username = '$userCheck'";
			$stmtCheck = sqlsrv_query($conn, $sqlCheck);
			if (sqlsrv_has_rows($stmtCheck)) {
				$errors['user-exists'] = 'User already exists';
				$userExists = $errors['user-exists'];
			} else {
			$addUser = htmlspecialchars($_POST['new-user-name']);
			}
		}
		
		if (empty($_POST['new-user-role'])) {
			$errors['new-user-role'] = '<br />Please select a role';
		} else {
			$addRole = htmlspecialchars($_POST['new-user-role']);
		}
	
		if (!array_filter($errors)) {
			$addUserConfirm = include 'config/add-user-confirm.php';
		}
		
	}
	
	// Add user on confirmation
	if(isset($_POST['add-user-confirm-submit'])){
		
		$addUser = $_POST['add-user-confirm'];
		
		$addRole = $_POST['add-role-confirm'];

		$sql = "INSERT INTO users (username, role) VALUES ('$addUser', '$addRole')";
	
		$result = sqlsrv_query($conn,$sql);
		
		$userAdded = '<b>' . $addUser . '</b>&nbsp;has been added to the user list.';

		if($result === false ) {
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
				}
			}
		};
		
	} // Add user end 
	
	// Delete user

	if (isset($_POST['delete-user-submit'])) {
		
		if (empty($_POST['select-user-delete'])) {
			$errors['select-user-delete'] = '<br />Please select a user to delete';
		} else {
			$deleteUser = htmlspecialchars($_POST['select-user-delete']);
			$deleteUserConfirm = include 'config/delete-user-confirm.php';
		}
		
	}
	
	// Delete user on confirmation
	if(isset($_POST['delete-user-confirm-submit'])){
		
		$deleteUser = $_POST['delete-user-confirm'];

		$sql = "DELETE FROM users WHERE username='$deleteUser'";
	
		$result = sqlsrv_query($conn,$sql);
		
		$userDeleted = '<b>' . $deleteUser . '</b>&nbsp;has been deleted from the user list.';

		if($result === false ) {
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
				}
			}
		};
		
	} // Delete user end 
?>
<?php

	if (isset($_POST['add-user-confirm-submit'])) {
		echo '<div class="success-ward-wrapper">';
		echo '<div class="success-ward-container">';
		echo '<i class="fas fa-check-circle"></i>';
		echo '</div>';
		echo '<div class="success-ward-container">';
		echo $userAdded; 
		echo '</div>';
		echo '</div>';
	}

	if (isset($_POST['delete-user-confirm-submit'])) {
		echo '<div class="success-ward-wrapper">';
		echo '<div class="success-ward-container">';
		echo '<i class="fas fa-check-circle"></i>';
		echo '</div>';
		echo '<div class="success-ward-container">';
		echo $userDeleted; 
		echo '</div>';
		echo '</div>';
	}

	if (isset($userExists)) {
		echo '<div class="success-ward-wrapper">';
		echo '<div class="success-ward-container">';
		echo '<i class="fas fa-question-circle" style="color: lightgrey"></i>';
		echo '</div>';
		echo '<div class="success-ward-container">';
		echo $userExists; 
		echo '</div>';
		echo '</div>';
	}

?>

<div class="admin-section-wrapper">

<h1>User Management</h1>

<div class="ward-management-wrapper">

			<div class="ward-management-container user-add">

					<h3>Add user</h3>

					<form method="POST" action="">
						Trust username<br />
						<input style="width:30%" type="text" name="new-user-name">
						
						<br /><br />
						Select role<br />
						<select style="width:60%" name="new-user-role" value="<?php echo $addRole ?>">
						
							<option disabled selected value> -- Select an option -- </option>
							<option>Admin</option>
							<option>Ward/dept manager</option>
							<option>Pharmacy manager</option>
							<option>Dispensary user</option>
							<option>Stores manager</option>
						
						</select>
						
						<br /><br />

						<button type="submit" name="new-user-submit"><i class="fas fa-plus-circle"></i> ADD</button>

					</form>

					<div class="error-message"><?php echo $errors['new-user-name'];?></div>
					<div class="error-message"><?php echo $errors['new-user-role'];?></div>

			</div>

			<div class="ward-management-container user-add">

				<?php include 'config/fetch-user-list.php' ?>

				<h3>Delete user</h3>

				<form method="POST" action="">

					<select name="select-user-delete">

						<option disabled selected value> -- Select an option -- </option>

						<?php while( $row = sqlsrv_fetch_array($stmt) ) { ?>

							<option><?php echo $row['username'] ?></option>

						<?php }; ?>

					</select>
					
					<br /><br />

					<button type="submit" name="delete-user-submit"><i class="fas fa-minus-circle"></i> DELETE</button>

				</form>

				<div class="error-message"><?php echo $errors['select-user-delete'];?></div>

			</div>

			<div class="ward-management-container" id="user-table">

				<?php include 'config/fetch-user-list.php' ?>

				<h3>User list</h3>

				<table>
					
					<tr>
						
						<th>User</th>
						<th>Name</th>
						<th>Role</th>
						<th>Added by</th>
						
					</tr>

					<?php while( $row = sqlsrv_fetch_array($stmt) ) { ?>
						<tr>
						
							<td><?php echo $row['username'] ?></td>
							<td>Default name</td>
							<td><?php echo $row['role'] ?></td>
							<td>Default name</td>
						
						</tr>
					<?php }; ?>
					
				</table>

			</div>

	</div>
	
</div>