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
<title>Manage Financial </title>

<link rel="stylesheet" href="css/header_navigationbar.css" />
<link rel="stylesheet" href="css/alumni_home.css"/>


<?php
include_once "setting/alumnihome_navigation.php";
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
<body>
<?php
  if(isset($_POST['financialdata']))
  {
    $pID = $_REQUEST['aluid'];
    if($pID=='')
    {
      echo"<script>alert('Please enter payment id')</script>";
    }
    else
    {
      $sql = "update expertTalk set status='Approve' where classID='$pID'";
       if($conn->query($sql) === TRUE) 
				{
	    			echo "<br><p class=p1>*****Approval successfull.*****</p>";
					// echo "<p class=p2><a href=manage_alumni.php>View Alumni Membership</a></p><br>";
				} 
				else 
				{
    				echo "Error: " . $sql . "<br>" . $conn->error;
				}
    }
  }
?>
 <h3><center> Alumni Expert Talk </center></h3> 
<form action="expertClassApprove.php" method="post">
  <table align="center" style="border:2px hidden;" cellspacing="20">
  <caption style= "font-size:30px"> Approve Expert Talk </caption>
  <tr>
  <th align="left" width="250" style="border:hidden;font-size:20px">Talk id: </th>
  <td width="150" style="border:hidden"><input size="45" type="text" value="" name="aluid"/></td>
  </tr>
  </tr>
  <td colspan=3 align="right" style="border:hidden"><button type="submit" name="financialdata" >Approve</button></td>
  </tr>
  </table>
</form>
<table align="center" id="Payment">

<tr>
	<th> No. </th>
	<th> Talk ID</th>
	<th onclick="sortTable(0)"> Talk Name</th>
	<th> Description</th>
	<th>  Date </th>
	<th> Time </th>
  <th>Status</th>
</tr>
<?php
$sqlshow2= "SELECT * FROM expertTalk WHERE regNo='$userid'";
$resultfin = $conn->query($sqlshow2);
$no = 1;

while ($row = mysqli_fetch_assoc($resultfin))
{
	echo "<tr>";
	echo "<td>" . $no. "</td>";
	echo "<td>" . $row['classID']. "</td>";
	echo "<td>" . $row['cName']. "</td>";
	echo "<td>" . $row['cDesc']. "</td>";
	echo "<td>" . $row['date']. "</td>";
	echo "<td>" . $row['time']. "</td>";
  echo "<td>" . $row['status']. "</td>";
  // echo "<td style='width: 200px;height: 200px;'><img class=profile src=data:image/jpeg;base64,".base64_encode($row["reciept"])." align=center /></td>";
	// echo "<td> <button >Approve</button></td>";
  echo "</tr>";
	$no++;
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