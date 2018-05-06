<?php
		require_once("login/session.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>리뷰 댓글 등록 결과</title>
<meta charset="utf-8"/>
</head>
<body>
<?php
	require_once('homepage_dbcon.php');
	
	if(!isset($_SESSION['id'])) {
		exit("<script type='text/javascript'>alert('로그인 상태가 아닙니다.'); javascript:history.go(-1);</script>");
	}
	
	if(empty($_POST['memo'])) {
		exit("<script type='text/javascript'>alert('입력 폼을 채워주세요.'); javascript:history.go(-1);</script>");
	}
	
	$dbc = mysqli_connect($host,$user,$pass,$dbname)
		or die("Error Connecting to MySQL Server.");
		
	$reviewid = mysqli_real_escape_string($dbc,trim($_POST['reviewid']));
	$id = $_SESSION['id'];
	$memo = mysqli_real_escape_string($dbc,trim($_POST['memo']));
	
	mysqli_query($dbc,'set names utf8');
	
	$query = "insert into reply values(null,$reviewid, $id ,NOW(), '$memo')";
	$result = mysqli_query($dbc,$query)
		or die("Error Querying to MySQL Server.");
		
	mysqli_close($dbc);
	echo "<script type='text/javascript'>alert('댓글이 등록 되었습니다.');</script>";
	echo  "<script type='text/javascript'>document.location.href='/term-project/drama_list.php';</script>";