<div class="success-container" id="succ-modal">
	<div class="success-cancel" onclick="document.getElementById('succ-modal').style.display='none'">&#10006;</div>
	<div class="success-tick">
		<i class="fas fa-check-circle"></i>
	</div>
	<div>
		Thank you <?php echo $_SESSION['first-name']; ?>.<br>Your order for <?php echo $ituHospNum; ?> on <?php echo $ituWard; ?> has been placed.
	</div>
</div>
