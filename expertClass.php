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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Homepage</title>
<link rel="stylesheet" href="css/index.css" />

<link rel="stylesheet" href="css/header_navigationbar.css" />
<link rel="stylesheet" href="css/add_forum_post.css"/>
</head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 90%;
	background-color: #F9E79F;
}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 5px;
}

</style>
<?php
include_once"connect_database.php";
include'setting/adminpage_navigation.php';
?>

<body><center>
    <h1>Expert Talk</h1>
    <form action="expertClass.php" method="post">

    <table width="710" align="center" style="border:2px hidden;" cellspacing="20">
    <tr>
    <th align="left" width="450" style="border:hidden;font-size:18px"> Class Id </th>
        <td width="450" style="border:hidden"><input size="45" type="text" value="" name="expClassId"/></td>
    </tr>
    <tr>
    <th align="left" width="450" style="border:hidden;font-size:18px"> Class Name </th>
        <td width="450" style="border:hidden"><input size="45" type="text" value="" name="expClassName"/></td>
    </tr>
    <tr>
    <th align="left" width="450" style="border:hidden;font-size:18px"> Class description </th>
        <td width="450" style="border:hidden"><input size="45" type="text" value="" name="expCDesc"/></td>
    </tr>
    <tr>
    <th align="left" width="450" style="border:hidden;font-size:18px"> Class Date </th>
        <td width="450" style="border:hidden"><input size="45" type="date" value="" name="expDate"/></td>
    </tr>
    <tr>
    <th align="left" width="450" style="border:hidden;font-size:18px"> Class Time </th>
        <td width="450" style="border:hidden"><input size="45" type="time" value="" name="expTime"/></td>
    </tr>
        
    <tr>
        <th align="left" width="450" style="border:hidden;font-size:18px">Registration Number </th>
        <td width="450" style="border:hidden"><input size="45" type="text" value="" name="aid"/></td>
        
    </tr>
    <tr>
        <th align="left" width="450" style="border:hidden;font-size:18px">  </th>
        <td><input type="submit" value="submit" name="reg"/>
    </tr>
</table>
</form>
</body>
</html>
<?php 
    if(isset($_POST['reg']))
    {
        $regNo = $_REQUEST['aid'];
        $expClassName = $_REQUEST['expClassName'];
        $expCDesc = $_REQUEST['expCDesc'];
        $expDate = $_REQUEST['expDate'];
        $expTime = $_REQUEST['expTime'];
        $expClassId = $_REQUEST['expClassId'];
        $status="pending";
        // echo "<scirpt>console.log('helloooooo',$regNo)</script>";
        $sqlshowAWA= "SELECT alumnimember.pi_register, alumniinfo.pi_name,alumniinfo.pi_branch, 
        alumniinfo.pi_session,alumniinfo.pi_email, alumniinfo.pi_gender, alumniinfo.pi_company, alumniinfo.pi_mobile FROM alumnimember, alumniinfo 
        WHERE alumnimember.pi_register = alumniinfo.pi_register AND alumniinfo.pi_register = '$regNo'";


        $resultAWA = $conn->query($sqlshowAWA);
        $no = 1;
        while ($row = mysqli_fetch_assoc($resultAWA))
        {
            $no++;
            if($expCDesc==''||$expClassName==''||$expDate==''||$expTime==''|| $expClassId=='')
            {
                echo "<br /><p class=p1>*****Incomplete information.Expert class not Created.*****</p>";
            }
            else
            {
                $qry = "INSERT INTO expertTalk (cName,cDesc,date,time,regNo,status,classID)VALUES ('$expClassName','$expCDesc','$expDate','$expTime','$regNo','$status','$expClassId')";
                if ($conn->query($qry) === TRUE) 
				{
	    			echo "<br /><p class=p1>*****Expert class successfully requested.*****</p>";
					// echo "<br /><p class=p2><a href=expertClass.php>Go to Event</a></p>";
				} 
				else 
				{
    				echo "$expClassName,$expCDesc,$expDate,$expTime,$status";
				}
            }
            
        }
        if ($no==1)
        {
            echo"<h2>***Enter Valid Alumni***</h2>";
        }
        else{

        }

    }
    ?>