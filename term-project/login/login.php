<?php
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">

.headding08 {
	background: #1d8ade; 
	margin:0 0 20px 0;
	padding:12px 10px;
	color:#FFF;
	text-shadow:1px 1px 2px #333;
	position:relative;
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	border-left:1px solid #036;
	border-top:1px solid #036;
	box-shadow:inset 1px 1px 4px #036;
	}
 
.headding08:before {
	content: ' ';
	position: absolute;
	z-index: 2;
	width: 0;
	height: 0;
	left: 14px;
	bottom: -27px;
	background: transparent;
	border-color: #1d8ade transparent transparent transparent ;
	border-style:solid;
	border-width:15px;
	}

a{
	font-size:30px;
	margin-left:20px;
	padding:0 10px 0 12px;
	background:#0089e0;
	color:#fff;
	text-decoration:none;
	-moz-border-radius-bottomright:4px;
	-webkit-border-bottom-right-radius:4px;	
	border-bottom-right-radius:4px;
	-moz-border-radius-topright:4px;
	-webkit-border-top-right-radius:4px;	
	border-top-right-radius:4px;	
	} 
	
a:before{
	content:"";
	float:left;
	position:absolute;
	top:0;
	left:-12px;
	width:0;
	height:0;
	border-color:transparent #0089e0 transparent transparent;
	border-style:solid;
	border-width:12px 12px 12px 0;		
	}

a:hover{background:#555;}	

a:hover:before{border-color:transparent #555 transparent transparent;}	
</style>
<title>로그인 결과</title>
<meta charset="utf-8" />
</head>
<body>
<?php
	require_once('homepage_dbcon.php');	//#include와 유사함.
	
	//세션이 이미 생성되어있는지 확인
	if(isset($_SESSION['id'])) {
		
		exit('<h1 class="headding08">로그인 결과</h1><a href="/term-project/main.php">세션을 통해서 로그인 정보를 확인했습니다.</a>');
	}
	
	//email과 password를 입력했는지 확인
	if(empty($_POST['email']) || empty($_POST['password']) )
	{
		exit('<h1 class="headding08">로그인 결과</h1><a href="javascript:history.go(-1)">로그인 폼을 채워주세요</a>');
	}
	
	
	$dbc = mysqli_connect($host,$user,$pass,$dbname)
						or die("Error Connecting to MySQL Server");
						
	//Query에 사용할수있는 문자열만 허용					
	$email = mysqli_real_escape_string($dbc,trim($_POST['email']));	
	$password = mysqli_real_escape_string($dbc,trim($_POST['password']));	

	
	//현재 가입 되어있는 email과 비교(이메일과 비밀번호가 일치하는지 확인)
	$query = "select id,email from user where email='$email' and password=SHA('$password')";
	$result = mysqli_query($dbc,$query)
					or die("Error Querying database.");
	//입력된 이메일과 비밀번호가 일치한다면,
	if(mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
		//세션에 로그인 정보 저장(서버)
		$userid = $row['id'];
		$_SESSION['id'] = $userid;
		//쿠키에 로그인 정보 저장(클라이언트)
		setcookie('id',$row['id'], time() + (60*60*24));
		setcookie('email',$row['email'], time() + (60*60*24));

		echo "<h1 class='headding08'>$email" . "님의 로그인에 성공했습니다.</h1>";
		echo "<img src='userimage.php?email=$email' alt='User Image'
		style='width:200px;height:200px;'/><br/>";	
		echo "<a href='/term-project/main.php'>홈으로</a>";
	}
	else { //로그인에 실패한 경우라면,
		echo "<h1 class='headding08'>로그인 결과 : 이메일 또는 비밀번호 불일치</h1><br/><br/><a href='/term-project/main.php'>홈으로</a>";
	}
						
	mysqli_free_result($result);
					
	mysqli_close($dbc);
?>
</body>
</html>