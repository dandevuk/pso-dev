<!-- This is the container asks to confirm the addition of a cd drug to the cddrugstable. It has an hidden input form that auto fills from the drug the user has selected. Then will send this back to the page to be input into table -->
<div class="confirm-container">
	<i class="fas fa-exclamation-circle"></i>
	<br /><br />
	Are you sure you want to add the below controlled drug?<br />
	<span><?php echo $addCD; ?></span>
	<br /><br />
	<form method="POST" action="">
		<input type="hidden" name="add-CD-confirm" value="<?php echo $addCD; ?>">
		<button type="submit" name="add-CD-confirm-submit"><i class="far fa-check-circle"></i> Yes</button><a href="cd-drug-management.php"><button><i class="far fa-times-circle" id="no-confirm-icon"></i> No</button></a>
	</form>
</div>