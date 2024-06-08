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
$kk=0;
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Financial </title>

<link rel="stylesheet" href="css/header_navigationbar.css" />
<link rel="stylesheet" href="css/alumni_home.css"/>


<?php
include_once "setting/adminpage_navigation.php";
include_once "connect_database.php";
?>

<style>
table {
	align: center;
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
	background-color: white;
}
td, th {
    border: 2px solid #050119;
    text-align: center;
    padding: 8px;
}

</style>
<?php

  if(isset($_POST['submit']))
  {
    $date = $_POST['sDate'];
    if($date=='')
    {
      $kk=0;
    }
    else{

   $kk=1;
  }




  }

?>
<body>

<h3><center> Alumni Financial Record </center></h3>
<form action="PaymentDetails.php" method="POST">
  <h4> Search by date</h4>
  <input type="date" name="sDate"/>
  <input type="submit" name="submit" value="submit"/>

</form>
<table align="center" id="Payment">

<tr>
	<th> No. </th>
	<th> Payment ID</th>
	<th onclick="sortTable(0)"> Alumni Name</th>
	<th> Bank Name</th>
	<th> Payment Date </th>
	<th> Total Payment </th>
  <th>Status</th>
</tr>
<?php
if($kk==0)
{
$sqlshow2= "SELECT financialdata.payment_id, alumniinfo.pi_name,financialdata.status, financialdata.payment_purpose, financialdata.payment_date, financialdata.total_payment, financialdata.reciept FROM alumniinfo, financialdata
			WHERE alumniinfo.pi_register = financialdata.pi_register and financialdata.status='Approve'";
$resultfin = $conn->query($sqlshow2);
$no = 1;

while ($row = mysqli_fetch_assoc($resultfin))
{
	echo "<tr>";
	echo "<td>" . $no. "</td>";
	echo "<td>" . $row['payment_id']. "</td>";
	echo "<td>" . $row['pi_name']. "</td>";
	echo "<td>" . $row['payment_purpose']. "</td>";
	echo "<td>" . $row['payment_date']. "</td>";
	echo "<td>" . $row['total_payment']. "</td>";
  echo "<td>" . $row['status']. "</td>";
  // echo "<td style='width: 200px;height: 200px;'><img class=profile src=data:image/jpeg;base64,".base64_encode($row["reciept"])." align=center /></td>";
	// echo "<td> <button >Approve</button></td>";
  echo "</tr>";
	$no++;
}
}
else{
  $sql = "SELECT financialdata.payment_id, alumniinfo.pi_name,financialdata.status, financialdata.payment_purpose, financialdata.payment_date, financialdata.total_payment, financialdata.reciept FROM alumniinfo, financialdata
  WHERE alumniinfo.pi_register = financialdata.pi_register and financialdata.status='Approve' and financialdata.payment_date='$date'";
  $sRslt = $conn->query($sql);

  $no = 1;
  $kk=1;

  while ($row = mysqli_fetch_assoc($sRslt))
  {
    echo "<tr>";
    echo "<td>" . $no. "</td>";
    echo "<td>" . $row['payment_id']. "</td>";
    echo "<td>" . $row['pi_name']. "</td>";
    echo "<td>" . $row['payment_purpose']. "</td>";
    echo "<td>" . $row['payment_date']. "</td>";
    echo "<td>" . $row['total_payment']. "</td>";
    echo "<td>" . $row['status']. "</td>";
    // echo "<td style='width: 200px;height: 200px;'><img class=profile src=data:image/jpeg;base64,".base64_encode($row["reciept"])." align=center /></td>";
    // echo "<td> <button >Approve</button></td>";
    echo "</tr>";
    $no++;
  }
}

?>

</body>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("Payment");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}	

</script>
</head>
</html>