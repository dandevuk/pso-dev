<!-- This is the container asks to confirm the addition of a cd drug to the users table. It has an hidden input form that auto fills from the user the user has input. Then will send this back to the page to be input into table -->
<div class="confirm-container">
	<i class="fas fa-exclamation-circle"></i>
	<br /><br />
	Are you sure you want to add the below user?<br />
	<span><?php echo $addUser . ' as ' . $addRole ?></span>
	<br /><br />
	<form method="POST" action="">
		<input type="hidden" name="add-user-confirm" value="<?php echo $addUser; ?>">
		<input type="hidden" name="add-role-confirm" value="<?php echo $addRole; ?>">
		<button type="submit" name="add-user-confirm-submit"><i class="far fa-check-circle"></i> Yes</button><a href="user-management.php"><button><i class="far fa-times-circle" id="no-confirm-icon"></i> No</button></a>
	</form>
</div>