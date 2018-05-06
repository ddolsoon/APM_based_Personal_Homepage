<?php
		require_once("login/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>취미 홈페이지</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name='google' value='notranslate'>
	<link rel="shortcut icon" href="css/images/maker_image.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
		<script src="js/png-fix.js" type="text/javascript"></script>
	<![endif]-->
	<script src="js/jquery-1.4.2.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.js" type="text/javascript"></script>
	<script src="js/js-func.js" type="text/javascript"></script>
	
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">

<style type="text/css">
    #wrapper {
        width:600px;
        margin:0 auto;
        font-family:Verdana, sans-serif;
    }
    legend {
        color:#0481b1;
        font-size:16px;
        padding:0 10px;
        background:#fff;
        -moz-border-radius:4px;
        box-shadow: 0 1px 5px rgba(4, 129, 177, 0.5);
        padding:5px 10px;
        text-transform:uppercase;
        font-family:Helvetica, sans-serif;
        font-weight:bold;
    }
    fieldset {
        border-radius:4px;
        background: #fff; 
        background: -moz-linear-gradient(#fff, #f9fdff);
        background: -o-linear-gradient(#fff, #f9fdff);
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#f9fdff)); /
        background: -webkit-linear-gradient(#fff, #f9fdff);
        padding:20px;
        border-color:rgba(4, 129, 177, 0.4);
    }
    input,
    textarea {
        color: #373737;
        background: #fff;
        border: 1px solid #CCCCCC;
        color: #aaa;
        font-size: 14px;
        line-height: 1.2em;
        margin-bottom:15px;

        -moz-border-radius:4px;
        -webkit-border-radius:4px;
        border-radius:4px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset, 0 1px 0 rgba(255, 255, 255, 0.2);
    }
    input[type="text"],
    input[type="password"]{
        padding: 8px 6px;
        height: 22px;
        width:280px;
    }
    input[type="text"]:focus,
    input[type="password"]:focus {
        background:#f5fcfe;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        -webkit-transition-duration: 400ms;
        -webkit-transition-property: width, background;
        -webkit-transition-timing-function: ease;
        -moz-transition-duration: 400ms;
        -moz-transition-property: width, background;
        -moz-transition-timing-function: ease;
        -o-transition-duration: 400ms;
        -o-transition-property: width, background;
        -o-transition-timing-function: ease;
        width: 380px;
        
        border-color:#ccc;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        opacity:0.6;
    }
    input[type="submit"]{
        background: #222;
        border: none;
        text-shadow: 0 -1px 0 rgba(0,0,0,0.3);
        text-transform:uppercase;
        color: #eee;
        cursor: pointer;
        font-size: 15px;
        margin: 5px 0;
        padding: 5px 22px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-border-radius:4px;
        -webkit-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
    }
    textarea {
        padding:3px;
        width:96%;
        height:100px;
    }
    textarea:focus {
        background:#ebf8fd;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        opacity:0.6;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        border-color:#ccc;
    }
    .small {
        line-height:14px;
        font-size:12px;
        color:#999898;
        margin-bottom:3px;
    }
</style>
<script>
	$(document).ready(function() {
	$("#calendar").datepicker();
	});
</script>
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<h1><a href="main.php">미드/영화 홈페이지</a></h1>
		<div id="navigation">
			<ul>
			    <li><a href="main.php" class="active"><span>홈</span></a></li>
			    <li><a href="drama_list.php"><span>미드 게시판</span></a></li>
			    <li><a href="#"><span>영화 게시판</span></a></li>
			</ul>
<?php
		if(!isset($_SESSION['id']))	//세션이 존재하지 않는다면(로그아웃 상태)
			echo '<a href="login/loginform.html" class="buy-now">로그인</a>';
		else //세션이 존재한다면(로그인 된 상태)
			echo '<a href="login/logout.php" class="buy-now">로그아웃</a>';
?>
		</div>
		<div class="cl">&nbsp;</div>
	</div>	
</div>
<!-- End Header -->

<!-- Main -->
<hr>
<?php
	if(!isset($_SESSION['id'])) {
		exit('<a href="main.php">로그인 상태가 아닙니다. 홈으로</a></body></html>');
	}
?>
	<div id="wrapper">
		<fieldset>
            <legend>미드 게시판 댓글 쓰기</legend>
			<form method="post" action="drama_writereply.php">
			댓글 : <br/>
			<textarea name="memo" cols="50" rows="10" maxlength="5000"></textarea>
			<input type="hidden" name="reviewid" value="<?php echo $_GET['reviewid']; ?>">
			<br/>
			<br/>
			<input type="submit" value="댓글 등록"/>
			</form>
		</fieldset>
	</div>
	
	<br>
<!-- End Main -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<p class="left">Copyright &copy; 2016 금오공과대학교. All rights reserved. Designed by 김민성(20120209)</p>
		<p class="right">
		   제작기간 : 5월 23일 ~ 6월 21일
	    </p>
	    <div class="cl">&nbsp;</div>
	</div>
</div>
<!-- Footer -->
</body>
</html>
