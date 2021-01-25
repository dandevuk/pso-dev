<div class="confirm-container">
	<i class="fas fa-exclamation-circle"></i>
	<br /><br />
	Are you sure you want to delete the below ward?<br />
	<span><?php echo $deleteWard; ?></span>
	<br /><br />
	<form method="POST" action="">
		<input type="hidden" name="delete-ward-confirm" value="<?php echo $deleteWard; ?>">
		<button type="submit" name="delete-ward-confirm-submit"><i class="far fa-check-circle"></i> Yes</button> <a href="ward-list-management.php"><button><i class="far fa-times-circle" id="no-confirm-icon"></i> No</button></a>
	</form>
</div>