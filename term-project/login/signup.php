<!DOCTYPE html>
<html>
<Head>
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
<title>회원가입 결과</title>
<meta charset="utf-8" />
</head>
<body>
<?php
	require_once('homepage_dbcon.php');	//#include와 유사함.

	//email과 password를 입력했는지 확인
	if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_confrim'])
		|| empty($_POST['name']) || empty($_POST['phonenumber']) || empty($_POST['homepage']) 
		|| empty($_POST['introduction']) || empty($_FILES['userimg']['tmp_name']))
		{
			exit('<h1 class="headding08">회원가입 에러 메세지</h1><a href="javascript:history.go(-1)">입력 폼을 채워주세요</a>');
		}
		
	//image 입력 확인
	if(!isset($_FILES['userimg'])) {
		exit('<h1 class="headding08">회원가입 에러 메세지</h1><a href="javascript:history.go(-1)">이미지 업로드 에러가 발생했습니다.</a>');
	}
	
	$dbc = mysqli_connect($host,$user,$pass,$dbname)
						or die("Error Connecting to MySQL Server");
						
	//Query에 사용할수있는 문자열만 허용(signup.html로 부터 전달된 데이터를 변수에 저장)			
	$email = mysqli_real_escape_string($dbc,trim($_POST['email']));	
	$password = mysqli_real_escape_string($dbc,trim($_POST['password']));	
	$password_confrim = mysqli_real_escape_string($dbc,trim($_POST['password_confrim']));
	$name = mysqli_real_escape_string($dbc,trim($_POST['name']));
	$phonenumber = mysqli_real_escape_string($dbc,trim($_POST['phonenumber']));
	$homepage = mysqli_real_escape_string($dbc,trim($_POST['homepage']));
	$introduction = mysqli_real_escape_string($dbc,trim($_POST['introduction']));
	$image = addslashes(file_get_contents($_FILES['userimg']['tmp_name']));
	
	//입력한 비밀번호가 확인한 비밀번호와 일치하는지 확인
	if($password != $password_confrim) {
		exit('<h1 class="headding08">회원가입 에러 메세지</h1><a href="javascript:history.go(-1)">비밀번호가 서로 일치하지 않습니다.</a>');
		
	}
	
	//현재 가입 되어있는 email과 중복체크
	$query = "select id from user where email='$email'";
	$result = mysqli_query($dbc,$query)
					or die("Error Querying database and email check failed.");
	if(mysqli_num_rows($result) != 0) {
		exit('<h1 class="headding08">회원가입 에러 메세지</h1><a href="javascript:history.go(-1)">이미 등록된 이메일입니다.</a>');
		
	}
						
	mysqli_free_result($result);
	
	mysqli_query($dbc,'set names utf8');

	$query = "insert into user values (null,'$email',SHA('$password'),'$name','$phonenumber','$homepage','$introduction','$image')";

	$result = mysqli_query($dbc,$query)
					or die("Error Querying database.");
					
	mysqli_close($dbc);

	echo "<h1 class='headding08'>$email" . "님의 회원 가입을 축하드립니다.</h1>";
	echo "<img src='userimage.php?email=$email' alt='User Image'
		style='width:200px;height:200px;'/><br/>";
	echo '<a href="/term-project/main.php">홈으로</a>';	
?>
</body>
</html>