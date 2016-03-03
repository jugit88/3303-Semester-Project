<html>
<body>
<table width="600" border="1" cellpadding="1" cellspacing="1">
<tr>
<th>Time</th>
<th>CO2 (ADC Value)</th>
<tr>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ypod";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql2= "SELECT * FROM education_ypod";

$records=mysqli_query($conn, $sql2);
while($Temperature=mysqli_fetch_assoc($records)){
	echo "<tr>";
	echo "<td>".$Temperature["Rtc Time"]."</td>";
	echo "<td>".$Temperature["CO2(ADC VAL)"]."</td>";
	echo "</tr>";
}
?>
</table>
</body>
</html>
