<?php
		require_once("login/session.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>리뷰 등록</title>
<meta charset="utf-8"/>
</head>
<body>
<?php
	require_once('homepage_dbcon.php');

	if(!isset($_SESSION['id'])) {
		exit("<script type='text/javascript'>alert('로그인 상태가 아닙니다.'); javascript:history.go(-1);</script>");
	}
	
	if(empty($_POST['memo']) || empty($_FILES['picture']['tmp_name'])) {
		exit("<script type='text/javascript'>alert('입력 폼을 채워주세요.'); javascript:history.go(-1);</script>");
	}
	
	if(!isset($_FILES['picture'])){
		exit("<script type='text/javascript'>alert('이미지 업로드 중 에러가발생하였습니다.'); javascript:history.go(-1);</script>");
	}
	
	$dbc = mysqli_connect($host,$user,$pass,$dbname)
		or die("Error Connecting to MySQL Server.");
	
	$id = $_SESSION['id'];
	$memo = mysqli_real_escape_string($dbc,trim($_POST['memo']));
	$image = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
	
	mysqli_query($dbc,'set names utf8');

	$query = "insert into review2 values(null,$id,NOW(),'$image','$memo',0)";
	
	$result = mysqli_query($dbc,$query)
		or die("Error Querying database.");
		
	mysqli_close($dbc);
	
	echo "<script type='text/javascript'>alert('리뷰가 등록 되었습니다.');</script>";
	echo  "<script type='text/javascript'>document.location.href='/term-project/movie_list.php';</script>";
	
?>
</body>
</html>