<?php
		require_once("login/session.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>좋아요 누르기</title>
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
		
	$reviewid = $_GET['reviewid'];
	
	mysqli_query($dbc,'set names utf8');
	
	$query = "update review2 set favorite=favorite+1 where reviewid=$reviewid";
	$result = mysqli_query($dbc,$query)
		or die("Error Querying to MySQL Server.");
		
	mysqli_close($dbc);
	echo "<script type='text/javascript'>alert('해당 게시글을 추천하였습니다.');</script>";
	echo "<script type='text/javascript'>document.location.href='/term-project/movie_list.php';</script>";
?>
</body>
</html>