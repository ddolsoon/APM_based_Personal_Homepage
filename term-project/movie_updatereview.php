<?php
		require_once("login/session.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>리뷰 수정</title>
<meta charset="utf-8"/>
</head>
<body>
<?php
	require_once('homepage_dbcon.php');

	if(!isset($_SESSION['id'])) {
		exit("<script type='text/javascript'>alert('로그인 상태가 아닙니다.'); javascript:history.go(-1);</script>");
	}
	
	$dbc = mysqli_connect($host,$user,$pass,$dbname)
		or die("Error Connecting to MySQL Server.");
	
	$id = $_SESSION['id'];
	$memo = mysqli_real_escape_string($dbc,trim($_POST['memo']));
	$reviewid = mysqli_real_escape_string($dbc,trim($_POST['reviewid']));
	
	
	mysqli_query($dbc,'set names utf8');

	$query = "update review2 set memo='$memo' where reviewid='$reviewid'";
	
	$result = mysqli_query($dbc,$query)
		or die("Error Querying database.");
		
		
	mysqli_close($dbc);
	
	echo "<script type='text/javascript'>alert('리뷰가 수정 되었습니다.');</script>";
	echo  "<script type='text/javascript'>document.location.href='/term-project/movie_list.php';</script>";
	
?>
</body>
</html>