<?php include("auth.php"); //include auth.php file on all secure pages 
$hostname = "localhost";
$username = "root";
$password = "hanniganlab";

$dbhandle = mysql_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");

$selectdatabase = mysql_select_db("ypod",$dbhandle)
    or die("Could not select ypod database");

$myquery = "SELECT `RTC time`, `CO2 (ADC VAL)` FROM `aqiq_raw`";
$query = mysql_query($myquery);
if ( ! $query ) {
	echo mysql_error();
	die;
}
$data = array();
for ($x = 0; $x < mysql_num_rows($query); $x++) {
	$data[] = mysql_fetch_assoc($query);
}
echo json_encode($data);
mysql_close($dbhandle);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Data Download and Visualization</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php if (!empty($_GET[success])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?> 
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  <input type="submit" name="Submit" value="Submit" /> 
</form>

<div class="form">
<p>Pod data download to be added here.</p>
<p><a href="CSVimport.php">Upload Raw Pod Data</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>
