<?php	//세션 처리
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
	<link rel="stylesheet" href="board.css" type="text/css" media="all" />
	<link rel="stylesheet" href="Like/css/style.css" type="text/css" media="all" />
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
		<script src="js/png-fix.js" type="text/javascript"></script>
	<![endif]-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="board.js"  type="text/javascript"></script>
	
	<script src="js/jquery-1.4.2.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.js" type="text/javascript"></script>
	<script src="js/js-func.js" type="text/javascript"></script>
	
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
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
			    <li><a href="movie_list.php"><span>영화 게시판</span></a></li>
			</ul>
<?php
		if(!isset($_SESSION['id']))	//세션이 존재하지 않는다면(로그아웃 상태)
			echo '<a href="login/loginform.html" class="buy-now">로그인</a>';
		else //세션이 존재한다면(로그인 된 상태)
			echo '<a href="login/logout.php" class="buy-now">로그아웃</a>';
?>
		</div>
		<div class="cl">&nbsp;</div>
		<div class="search">
			<form action="movie_listsearch.php" method="get">
				<span class="field">
					<input type="text" name="content" class="blink" value="Search" title="Search" />
				</span>
				<input type="submit" class="search-btn notext" value="Submit" />
			</form>
		</div>
	</div>	
</div>
<!-- End Header -->

<!-- Main -->
<hr>

<div class="container">
<div class="row " style="padding-top:40px;">
    <h2 class="text-center" >영화 게시판</h3>
    <br /><br />
    <div class="col-md-8">
        <div class="panel panel-info">
		 <span class="input-group-btn">
                                        <button class="btn btn-info" type="button"><a href="movie_writereviewform.php">글쓰기</a></button>
                                    </span>
            <div class="panel-heading">
                영화와 관련된 글을 작성해주세요.
            </div>
            <div class="panel-body">
			
								
            </div>
        </div>
    </div>
    
            </div>
        
    </div>
</div>
  </div>

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