<?php
	header('Content-Type: image/jpg');
?>
<?php
	require_once('homepage_dbcon.php');	//#include와 유사함.
	
	$dbc = mysqli_connect($host,$user,$pass,$dbname)
						or die("Error Connecting to MySQL Server");
						
	$email = $_GET['email'];
	
	$query = "select image from user where email='$email'";
	$result = mysqli_query($dbc,$query)
				or die("Error Querying database.");
	
	$row = mysqli_fetch_row($result);
	
	echo $row[0];
	
	mysqli_free_result($result);
	
	mysqli_query($dbc,'set names utf8');
	
	
?>