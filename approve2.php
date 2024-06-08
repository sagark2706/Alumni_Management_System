<?php
session_start();
if (!isset($_SESSION['id'])){
	header("location:login.html");
}
else
{
	$userid=$_SESSION['id'];
	$username1=$_SESSION['adname'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Alumni - Approve </title>

<link rel="stylesheet" href="css/header_navigationbar.css" />
<link rel="stylesheet" href="css/add_forum_post.css"/>
<?php
include_once "setting/adminpage_navigation.php";
include_once "connect_database.php";
?>

</head>
<style>
table, th, td {
    border: 2px solid #050119;
    border-collapse: collapse;
	font-size: 20px;
	width : 900px;
	text-align: center;
}
</style>
<body>
<?php
if(isset($_POST['approve']))
{
	$alid=$_REQUEST['aluid'];
	
	if ($alid=='')
	{
		echo "<br /><p class=p1>*****Please insert student department for membership approval.*****</p>";
	}
	else
	{
		// $sql ="UPDATE alumnimember INNER JOIN alumniinfo ON alumniinfo.pi_register =  alumnimember.pi_register SET alumnimember.al_status = 'Approve' WHERE alumniinfo.pi_branch='$alid' ";

				$sql = "UPDATE studentmember INNER JOIN studentinfo ON studentmember.pi_register = studentinfo.pi_register SET al_status= 'Approve' WHERE studentinfo.pi_branch = '$alid'";
				if ($conn->query($sql) === TRUE) 
				{
	    			echo "<br><p class=p1>*****Approval successfull.*****</p>";
					echo "<p class=p2><a href=manage_student.php>View Alumni Membership</a></p><br>";
				} 
				else 
				{
    				echo "Error: " . $sql . "<br>" . $conn->error;
				}
	}	
}
?>
<br><br><br>
<form action="approve2.php" method="post">
<table align="center" style="border:2px hidden;" cellspacing="20">
<caption style= "font-size:30px"> Insert  Batch for approval: </caption>
<tr>
<th align="left" width="250" style="border:hidden;font-size:20px">Student Batch: </th>
<td width="150" style="border:hidden"><input size="45" type="text" value="" name="aluid"/></td>
</tr>
</tr>
<td colspan=3 align="right" style="border:hidden"><button type="submit" name="approve" >Approve</button></td>
</tr>
</table>
</form>
<br></br><br></br>
<table align="center">
<caption> Student without Approval </caption>
<tr>
	<th> NO </th>
	<th> Student Registration Number </th>
	<th> Student Name</th>
	<th>Batch</th>
	<th> Approval Status </th>
</tr>
<?php
$sqlshowAWA= "SELECT studentmember.pi_register,studentinfo.pi_branch, studentinfo.pi_name, studentmember.al_status FROM studentmember, studentinfo WHERE studentmember.pi_register = studentinfo.pi_register AND studentmember.al_status = 'Not Approve'";
$resultAWA = $conn->query($sqlshowAWA);
$no = 1;

while ($row = mysqli_fetch_assoc($resultAWA))
{
	echo "<tr>";
	echo "<td>" . $no. "</td>";
	echo "<td>" . $row['pi_register']. "</td>";
	echo "<td>" . $row['pi_name']. "</td>";
	echo"<td>". $row['pi_branch']. "</td>";
	echo "<td>" . $row['al_status']. "</td>";
	$no++;
}
?>
</table>
<br><br><br><br><br><br>

</body>
</html>