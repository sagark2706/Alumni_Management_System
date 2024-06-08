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


<!DOCTYPE html>
<html>
<head>
	<title>Alumni Job Details Form</title>
    <link rel="stylesheet" href="css/alumni_home.css"
<?php
include_once"connect_database.php";
include_once"setting/alumnihome_navigation.php";
?>
</head>
<body>
	<form action="alumniJobDetails.php" method="post">
		<label for="job_title">Position:</label>
		<input type="text" name="job_title" id="job_title"><br><br>
		
		<label for="company_name">Company Name:</label>
		<input type="text" name="company_name" id="company_name"><br><br>
		
		<label for="start_date">Start Date:</label>
		<input type="date" name="start_date" id="start_date"><br><br>
		
		<label for="end_date">End Date:</label>
		<input type="date" name="end_date" id="end_date"><br><br>
		

		<label for="location">Location:</label>
		<input type="text" name="location" id="location"><br><br>
		
		<input type="submit" value="Submit" name="submit">
	</form>
</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
	// Get form data
        $job_title = $_POST['job_title'];
        $company_name = $_POST['company_name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $location = $_POST['location'];	
        $position = $_POST['position'];

        if($end_date=='')
        {
            $end_date="present";
        }
        
        // Connect to database
        // $servername = "localhost";
        // $username = "username";
        // $password = "password";
        // $dbname = "job_details";
        
        // $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Insert data into database
        $upSql = "UPDATE job_details SET end_date='$start_date' where alumniID='$userid' and end_date='present'";
        $kk = $conn->query($upSql);
        $sql = "INSERT INTO job_details (alumniID,job_title, company_name, start_date, end_date ,location) VALUES ('$userid','$job_title', '$company_name', '$start_date', '$end_date', '$location')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Job details submitted successfully";
        }
}
?>
