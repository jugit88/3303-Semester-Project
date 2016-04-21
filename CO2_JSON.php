<?php include("auth.php"); //include auth.php file on all secure pages 
$hostname = "localhost";
$username = "root";
$password = "hanniganlab";

$dbhandle = mysql_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");

$selectdatabase = mysql_select_db("ypod",$dbhandle)
    or die("Could not select ypod database");

$myquery = "SELECT `CO2 (ppm)` FROM `aqiq_processed`";
$query = mysql_query($myquery);
if ( ! $query ) {
	echo mysql_error();
	die;
}
$rows = array();
$rows['name'] = 'CO2 (ppm)';
while($r = mysql_fetch_array($query)) {
     $rows['data'][] = $r['CO2 (ppm)'];
}

$result = array();
array_push($result,$rows);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($dbhandle);



?>