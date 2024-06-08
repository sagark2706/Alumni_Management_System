<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TMSL Alumni Member Register</title>
</head>
<link rel="stylesheet" href="css/register.css" />

<body>
<div class="register_wrapper">
	<div class="register_container">
		<h2>Register Now!</h2>
		
		<form class="register_form" action="register3.php" method="post">
			<input type="text" placeholder="Full Name" name="pi_name" required>
			<input type="email" placeholder="Email" name="pi_email" required>
			<input type="text" placeholder="Enter Alumni Register Number" name="pi_reg" required>
            <button type="submit" name="register"   >Register</button>
            <br /><br /><a href="index.php">Register Later</a>
		</form>
	</div>
</body>
<script>
	function check(){
	var phoneno=/^\d{10}$/;
	var my=document.getElementById('mobile')
	if(my.value.match(phoneno))
	{
		return true;
	}
	else
	{
		alert ("ENTER VALID MOBILE NUMBER");
		return false;
	}
	}
</script>
</html>
<?php

	if(isset($_POST['register']))
	{
		$gEmail = $_REQUEST['pi_email'];
		$aReg = $_REQUEST['pi_reg'];
		$gName = $_REQUEST['pi_name'];

		$sql = "SELECT * FROM "
	}

?>