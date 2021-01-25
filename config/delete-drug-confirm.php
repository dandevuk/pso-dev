<!-- This is the container asks to confirm the deletion of a drug to the drugstable. It has an hidden input form that auto fills from the drug the user has selected. Then will send this back to the page to be input into table -->
<div class="confirm-container">
	<i class="fas fa-exclamation-circle"></i>
	<br /><br />
	Are you sure you want to delete the below drug?<br />
	<span><?php echo $deleteDrug; ?></span>
	<br /><br />
	<form method="POST" action="">
		<input type="hidden" name="delete-drug-confirm" value="<?php echo $deleteDrug; ?>">
		<button type="submit" name="delete-drug-confirm-submit"><i class="far fa-check-circle"></i> Yes</button><a href="drug-management.php"><button><i class="far fa-times-circle" id="no-confirm-icon"></i> No</button></a>
	</form>
</div>