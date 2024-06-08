<?php
session_start();
if (!isset($_SESSION['id'])){
	header("location:login.html");
}
else
{
	$userid=$_SESSION['id'];
	$alusername=$_SESSION['alname'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Home </title>
<link rel="stylesheet" href="css/alumni_home.css"
<?php
include_once"connect_database.php";
include_once"student_navigation.php";
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

<table align="center">
<caption style= "font-size:30px; margin:20px"> Expert Talk </caption>
<tr>
	<th> NO </th>
	<th> Talk Name </th>
	<th> Description</th>
	<th>Date</th>
	<th> Time </th>
</tr>
<?php
$sqlshowAWA= "SELECT * FROM expertTalk WHERE status='Approve'";
$resultAWA = $conn->query($sqlshowAWA);
$no = 1;

while ($row = mysqli_fetch_assoc($resultAWA))
{
	echo "<tr>";
	echo "<td>" . $no. "</td>";
	echo "<td>" . $row['cName']. "</td>";
	echo "<td>" . $row['cDesc']. "</td>";
	echo "<td>" . $row['date']. "</td>";
	echo "<td>" . $row['time']. "</td>";
	$no++;
}
?>
</table>

</body>
</html>