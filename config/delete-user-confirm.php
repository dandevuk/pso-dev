<div class="confirm-container">
	<i class="fas fa-exclamation-circle"></i>
	<br /><br />
	Are you sure you want to delete the below user?<br />
	<span><?php echo $deleteUser; ?></span>
	<br /><br />
	<form method="POST" action="">
		<input type="hidden" name="delete-user-confirm" value="<?php echo $deleteUser; ?>">
		<button type="submit" name="delete-user-confirm-submit"><i class="far fa-check-circle"></i> Yes</button> <a href="user-management.php"><button><i class="far fa-times-circle" id="no-confirm-icon"></i> No</button></a>
	</form>
</div>