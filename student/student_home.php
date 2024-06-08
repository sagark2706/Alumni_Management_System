<?php
</html>
</head>

<body>
<br />
<h2>Profile</h2>
<br />
<table class="alumnihometable1" align="center" cellspacing="15px">
<?php
$sql="SELECT pi_register, pi_name, pi_gender, pi_address, pi_email, pi_session, pi_branch, pi_mobile, pi_picture 
FROM studentinfo WHERE pi_register='$userid'";
$result=$conn->query($sql);
while($row = $result->fetch_assoc()) 
	{
		echo "<tr>";
		echo "<td colspan=2 align=center><img class=profile src=data:image/jpeg;base64,".base64_encode($row["pi_picture"])." align=center /></td>";
		echo "</tr>";
        echo "<tr>";
		echo "<th>Name:</th>";
		echo "<td class=alumnihometd1>".$row["pi_name"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Phone:</th>";
		echo "<td class=alumnihometd1>".$row["pi_register"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Gender:</th>";
		echo "<td class=alumnihometd1>".$row["pi_gender"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Address:</th>";
		echo "<td class=alumnihometd1>".$row["pi_address"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Mobile Number:</th>";
		echo "<td class=alumnihometd1>".$row["pi_mobile"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>p:</th>";
		echo "<td class=alumnihometd1>".$row["pi_email"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Age:</th>";
		echo "<td class=alumnihometd1>".$row["pi_session"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Branch:</th>";
		echo "<td class=alumnihometd1>".$row["pi_branch"]."</td>";
		echo "</tr>";
		echo "<tr>";
    }

?>
</table>
<br /><br /><br /><br />
</body>
</html>