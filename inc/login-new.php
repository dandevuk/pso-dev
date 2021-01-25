<div class="form-wrapper">
	<div class="form-container">
		<div style="text-align: center;">
			<h3>Please login with your Trust credentials</h3>						<div style="color:red;"><?php echo $errors['bind']; ?></div>
			<form action="" method="POST">

				Username<br />
				<input type="text" name="username" value="<?php echo $ldap_dn ?>"><br />
				<div style="color:red;"><?php echo $errors['username']; ?></div>
				Password<br />
				<input type="password" name="password"><br>
				<div style="color:red;"><?php echo $errors['password']; ?></div>

				<button class="hvr-rectangle-out" type="submit" name="submit-login" onclick="document.getElementById('loading-wrapper').style.display='flex'">Login</button>

			</form>
		</div>
	</div>
</div><div class="form-wrapper" style="margin-top: 50px">	<div class="form-container">		<div style="text-align: center;">			<h3>Current long-term drug shortages</h3>		</div>	</div></div>