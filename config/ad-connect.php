<?php  
$ldap_dn = '';

$errors = array('username'=>'', 'password'=>'', 'bind'=>'');

if (isset($_POST['submit-login'])) {
	
	if(empty($_POST['username'])) {
		$errors['username'] = 'A username is required';
	} else {
		$ldap_dn = $_POST['username'];
	}

	if (empty($_POST['password'])) {
		$errors['password'] = 'A password is required';
	} else {
		$ldap_password = $_POST['password'];
	}

	if (array_filter($errors)){
		echo 'Submit username and password error. Contact epma@nnuh.nhs.uk for assistance';
	} else {
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$adServer = "ldap://nnmain.nnuhi.nhs.uk";
			$ldap = ldap_connect($adServer) or die("That LDAP-URI was not parseable");
			$username = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['password']);
			$ldaprdn = 'nnmain' . "\\" . $username;

			ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

			$bind = ldap_bind($ldap, $ldaprdn, $password);
		}

		// verify binding
		if (ldap_bind($ldap, $ldaprdn, $password)) {
			// get user active directory info
			$filter = ("samaccountname=".$username);
			$result = ldap_search($ldap, "dc=nnmain,dc=nnuhi,dc=nhs,dc=uk", $filter) or die("Unable to search");
			$entries = ldap_get_entries($ldap, $result);

			// filter name	
			$surname = $entries[0]['sn'][0];
			$firstname = $entries[0]['givenname'][0];
			$title = $entries[0]['title'][0];
			$userEmail = $entries[0]['userprincipalname'][0];
			$_SESSION['username']=$username;
			$_SESSION['last-activity'] = time();
			$_SESSION['first-name'] = $firstname;
			$_SESSION['surname'] = $surname;
			$_SESSION['title'] = $title;
			$_SESSION['user-email'] = $userEmail;
			
			$sqlUserRole = "SELECT * FROM users WHERE username='$username'";
			$stmtUserRole = sqlsrv_query($conn, $sqlUserRole);
			
			if (!empty($stmtUserRole)) {
				while ($row = sqlsrv_fetch_array($stmtUserRole)) {
					$_SESSION['user-role'] = $row['2'];
				}
			}
			
			ldap_unbind($ldap); // Clean up after ourselves.
		} else {
	  		$errors['bind'] = "Login failed - please check username and password. Contact epma@nnuh.nhs.uk for assistance - " . ldap_error($ldap);
		} 
	} 
			
}

 ?>