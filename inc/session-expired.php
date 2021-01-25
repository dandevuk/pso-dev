 <div class="form-wrapper">
	<div class="form-container">
		<div style="text-align: center;">
			<h3>Your session has expired, please login again.</h3>
			<form action="" method="POST">

				Username<br />
				<input type="text" name="username"><br />
				<div style="color:red;"><?php echo $errors['username']; ?></div>
				Password<br />
				<input type="password" name="password"><br>
				<div style="color:red;"><?php echo $errors['password']; ?></div>

				<button type="submit" name="submit-login" onclick="document.getElementById('loading-wrapper').style.display='flex'">Login</button>

			</form>
		</div>
	</div>
</div>