<?php
	header('Content-Type: image/jpg');
?>
<?php
	require_once('homepage_dbcon.php');
	
	$dbc = mysqli_connect($host,$user,$pass,$dbname)
		or die("Error Connecting to MySQL Server.");
		
	$reviewid = $_GET['reviewid'];
	
	$query = "select picture from review where reviewid='$reviewid'";
	$result = mysqli_query($dbc, $query)
		or die("Error Querying database.");
		
	$row = mysqli_fetch_row($result);
	
	echo $row[0];
	
	mysqli_free_result($result);
	mysqli_close($dbc);

?>