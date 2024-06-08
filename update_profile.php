<?php
session_start();
if (!isset($_SESSION['id'])){
	header("location:login.html");
}
else
{
	$userid=$_SESSION['id'];
	$username1=$_SESSION['adname'];
$alusername=$_SESSION['alname'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" conten="text/html; charset=utf-8" />
<title>Update Profile</title>
<link rel="stylesheet" href="css/update_profile.css" />
</head>

<body>
<?php 
include_once"connect_database.php";
include_once"setting/alumnihome_navigation.php";
?>
<div>
<br /><br />
<h2>Update Profile</h2>
<br />
<form method="post" name="profile" enctype="multipart/form-data">
<table class="updatetable1" cellspacing="20px" align="center">

 


  <tr>
    <th>House Name: </th>
    <td class="updatetd1"><input type="text" name="hName" size="38" /></td>
  </tr>


  <tr>
    <th> Street: </th>
    <td class="updatetd1"><input type="text" name="street" size="38" /></td>
  </tr>

  <tr>
    <th>District: </th>
    <td class="updatetd1"><input type="text" name="district" size="38" /></td>
  </tr>

  <tr>
    <th>State: </th>
    <td class="updatetd1"><input type="text" name="state" size="38" /></td>
  </tr>

  <tr>
    <th>Pin : </th>
    <td class="updatetd1"><input type="text" name="pin" size="38" /></td>
  </tr>



  <tr>
    <th>Profile Picture:</th>
    <td class="updatetd1"><input type="file" name="pp" size="38" /></td>
  </tr>
  <tr>
    <td class="updatetd1" colspan="2" >
	<button class="updatebt" type="submit" name="update">Update</button></td>
  </tr>
</table>
</form>
</div>
<br /><br /><br /><br /><br /><br />
<?php
if(isset($_POST['update']))
{
	
	// $address=$_REQUEST['address'];
	$street=$_REQUEST['street'];
	$district = $_REQUEST['district'];
	$pin = $_REQUEST['pin'];
	$state = $_REQUEST['state'];
	$hname = $_REQUEST['hName'];
	$pp=addslashes(file_get_contents($_FILES['pp']['tmp_name']));
	// $pp = 'dhgjfhd';
	
	
	if( $pin==""  )
	{
		echo "<script>alert('Empty field. No update made.')</script>";		
	}
	else
	{
		
		// if($gender!="")
		// {
			// $sql1 = "insert into alumniinfo  pi_gender='".$gender."' , pi_address='".$address."' WHERE pi_register='$userid'";
			$sql1 = "update alumniinfo set street='$street',pin='$pin',hName='$hname',pi_district = '$district',pi_picture='$pp', pi_state='$state'where pi_register = '$userid' ";
			
			$result = $conn->query($sql1); 
			
			if($result)
			{
				// echo"<script>alert('-$pp')</script>";
				echo"<script>console.log('he-----')</script>";

			echo "<script>alert('Update Success.')</script>";
		}
		else
		{
			echo "<script>console.log('errorrrr');</script>";
			echo "Fail";	
			echo "<script>alert('Update ERROR-$hPos-$street-$pin-$hname-$district-$state--$userid.')</script>";
		}
	}
}
?>
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