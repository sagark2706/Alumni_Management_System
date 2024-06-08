<?php
session_start();
if (!isset($_SESSION['id'])){
	header("location:login.html");
}
else
{
	$userid=$_SESSION['id'];
	$alusername=$_SESSION['alname'];
	echo"<script>console.log('---------$userid--------')</script>";
}
?>

<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Financial Record - New Payment</title>
<meta http-equiv="Content-Type" conten="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/header_navigationbar.css" />
<link rel="stylesheet" href="css/add_forum_post.css"/>

<?php
	// echo"<script>console.log('-------------',$userid)</script>";

include_once "setting/alumnihome_navigation.php";
include_once "connect_database.php";
?>

</head>
<style>
.dropbtn {
    background-color: cornsilk;
    color: #050119;
    padding: 5px 116px;
    font-size: 15px;
	border: 2px solid #050119;
    cursor: pointer;
}

input.i1{
padding: 3px 119px;
    font-size: 15px;
}
	
</style>
<body>
<form action="NewPayment.php" method="post">
<table width="710" align="center" style="border:2px hidden;" cellspacing="20">
<tr>
<th align="left" width="450" style="border:hidden;font-size:25px"> Details of Payment: </th>
<td> </td>
</tr>
<tr>
<th align="left" width="450" style="border:hidden;font-size:18px">Payment ID: </th>
<td width="450" style="border:hidden"><input size="45" type="text" value="" name="pid"/></td>
</tr>
<tr>

<tr>
<th align="left" width="450" style="border:hidden;font-size:18px">Bank Name: </th>
<td width="450" style="border:hidden">
		<!-- <select class="dropbtn" name="pp" >
            <option value="Yearly Membership">Yearly Membership</option>
            <option value="Life-time Membership"> Life-time Membership</option>
			<option value="Cash Donation">Cash Donation</option>
			<option value="Registration Fee"> Registration Fee </option>
			</td> -->
			<input class="i1" type="text" name="ppp" required /></td>

</tr>
<tr>
<th align="left" width="450" style="border:hidden;font-size:18px">Payment Date: </th>
<td width="450" style="border:hidden">
<input class="i1" type="date" name="pd" max="2024-06-08"required /></td>

</tr>
<!-- <tr>
    <th align="left" width="450" style="border:hidden;font-size:18px">Transaction Reciept:</th>
    <td class="updatetd1">
		<input type="file" name="paymentReciept" size="38" /></td>
  </tr>
<tr> -->
<!-- 
<tr>
    <th>Transaction Reciept:</th>
    <td class="updatetd1"><input type="file" name="pp" size="38" /></td>
  </tr> -->
	
<th align="left" width="450" style="border:hidden;font-size:18px">Payment Amount: </th>
<td width="450" style="border:hidden"><input size="45" type="text" value="" name="pa"></td>
</tr>
<td colspan=2 align="right" style="border:hidden"><button type="submit" name="addpayment" >Add Payment</button></td>
</tr>

</table>
</form>
<?php
if(isset($_POST['addpayment']))
{
	$paymentid=$_REQUEST['pid'];
	$paymentpurpose=$_REQUEST['ppp'];
	$paymentdate=$_REQUEST['pd'];
	$paymentpaid=$_REQUEST['pa'];
	// $paymentRec=addslashes(file_get_contents($_FILES['paymentReciept']['name']));
	$pp="pic";


	
         



	echo"<script>console.log('he------$paymentid--$paymentpurpose--$paymentdate--$paymentpaid--$pp')</script>";
	if ($paymentid=='' || $paymentpurpose=='' || $paymentdate==''|| $paymentpaid=='')
	{
		echo "<br /><p class=p1>*****Incomplete information. No payment inserted.*****</p>";
	}
	else
	{
		$apstatus = "Not Approve";
		$AddPayment = "insert into financialdata(payment_id,total_payment,payment_purpose,pi_register,payment_date,status,reciept)values('$paymentid','$paymentpaid','$paymentpurpose','$userid','$paymentdate','$apstatus','$pp')";
		$result = $conn->query($AddPayment);
		if($result)
		{
			echo "<script>alert('Update Success.')</script>";

		}
		else
		{
			echo "<script>alert('Error.')</script>";

		}

	}	
}
// Display status message 
echo $statusMsg; 
?>
</body>

</html>