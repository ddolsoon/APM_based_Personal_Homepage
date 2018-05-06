<?php //세션 처리
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html>
<Head>
<title>로그아웃 결과</title>
<meta charset="utf-8" />
</head>
<body>
<?php
	require_once('homepage_dbcon.php');	//#include와 유사함.
	
	//세션이 존재하지 않는다면,
	if(!isset($_SESSION['id'])) {
		exit('<a href="/term-project/main.php">로그인 상태가 아닙니다. 홈으로</a>');
	}
	$_SESSION = array();	//기존 세션 제거
	
	//쿠키가 세션id를 가지고있다면,
	if(isset($_COOKIE[session_name()])) {
		//해당 쿠기 제거
		setcookie(session_name(),'',time() - (60*60));
		
	}
	session_destroy();	//세션 삭제
	
	//남아있는 쿠키 제거
	setcookie('id','',time() - (60*60));
	setcookie('email','',time() - (60*60));
	echo "<script type='text/javascript'> javascript:history.go(-1)</script>";

?>
</body>
</html>