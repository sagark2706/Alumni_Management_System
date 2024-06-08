<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Database Connection</title>
</head>

<body>
    <script>console.log("connect");</script>
<?php
$servername = "localhost";
$username = "root";
$password = 'sagar@670702';
$dbname = "we_miniproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo " <script>console.log('error');</script>";
    die("Connection failed: " . $conn->connect_error);
}
else{
echo " <script>console.log('Connected successfully');</script>";
}
?>
</body>
</html>