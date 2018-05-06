<?php	//세션 처리
	require_once("login/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>취미 홈페이지</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
		<h1><a href>미드/영화 홈페이지</a></h1>
		<div id="navigation">
			<ul>
			    <li><a href="#" class="active"><span>홈</span></a></li>
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
	</div>	
</div>
<!-- End Header -->
<!-- Slider -->
<div id="slider">
	<div class="shell">
		<div class="slider-holder">
			<div class="slider-left">
				<ul>
				    <li>
				    	<h2>홈페이지 소개</h2>
				    	<p>
							<h3>
								이 홈페이지는 데이터베이스 Term 프로젝트를 위해서 만들어진 홈페이지입니다.
								<br>
								제작자 : 김민성
								<br>
								학번 : 20120209
								<br>
								취미를 위한 홈페이지로써, 취미가 영화,미드 보기 인데, 이 2가지를 합쳐서 취미활동도
								하면서 영어공부도 하는 일석이조의 효과를 보기위해서 영어공부 홈페이지를 제작하게되었습니다.
							</h3>
						</p>
				    </li>
				    <li>
				    	<h2>추천하는 미드1</h2>
						<h2>왕좌의 게임</h2>
				    	<p>
							<h3>
							허구의 세계인 웨스테로스 대륙의 7개의 국가와 하위 몇 개의 국가들로 구성된 
							연맹 국가인 칠 왕국의 통치권, 철 왕좌를 차지하기 위한 싸움을 그려낸 드라마 로써, 현재 시즌6까지 나온
							상태이고, 시즌6는 현재 방영중이다.
							
							</h3>
						</p>
				    </li>
				    <li>
				    	<h2>추천하는 미드2</h2>
						<h2>워킹 데드</h2>
				    	<p>
							<h3>
							좀비로 가득한 세상에서 살아남은 생존자들의 사투를 그린 드라마.현재 시즌6까지 나온 상태이며, 시즌7은 2016년 10월에 
							방영 예정이다.
						</p>
				    </li>
				      <li>
				    	<h2>추천하는 영화1</h2>
						<h2>우리는 동물원을 샀다.</h2>
				    	<p>
						모험심 강하고 열정적인 칼럼니스트이자 두 아이들의 아버지 벤자민 미(맷 데이먼)! 최근, 사랑하는 아내를 잃은 그는 엄마의 빈자리를 슬퍼하는 아이들과 새롭게 시작하기 위해 이사를 결정하고, 마침내 마음에 쏙 드는 집을 찾게 된다. 
						하지만, 완벽하게만 보이는 그 집의 딱 한가지 문제는 바로 무려 200여 마리의 리얼 야생 동물들이 사는 폐장 직전의 동물원이 딸려 있는 것! 동물원의 '동'자도 모르는 벤자민은 모험심이 발동, 전 재산을 통틀어 동물원을 사기로 결심하는데...
						</p>
				    </li>
				      <li>
				    	<h2>추천하는 영화2</h2>
						<h2>킹스맨</h2>
				    	<p>
							전설적 베테랑 요원 해리하트는 경찰서에 구치된 에그시를 구제한다. 탁월한 잠재력을 알아본
							그는 에그시를 전설적 국제 비밀 정보기구 킹스맨 면접에 참여시킨다.아버지 또한 촉망바는
							요원이었으나 해리하트를 살리기 위해 죽었다는 사실을 알게된 에그시.목숨을 앗아갈 만큼 위험천만한
							훈련을 통과해야하는 후보들 최종 멤버 발탁을 눈앞에 둔 에그시는 최고의 악당 발렌타인을 마주하게 되는데...
						</p>
				    </li>
				    
				</ul>
			</div>
			<div class="slider-right">
				<ul>
				    <li><img src="css/images/slider_image/slider-image.jpg" alt="" /></li>
				    <li><img src="css/images/slider_image/slider-image2.jpg" alt="" /></li>
				    <li><img src="css/images/slider_image/slider-image3.jpg" alt="" /></li>
				    <li><img src="css/images/slider_image/slider-image4.jpg" alt="" /></li>
				    <li><img src="css/images/slider_image/slider-image5.jpg" alt="" /></li>
				</ul>
			</div>
			<div class="cl">&nbsp;</div>
			<div class="slider-nav">
				<a href="#">1</a>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#">4</a>
				<a href="#">5</a>
				<div class="cl">&nbsp;</div>
			</div>
		</div>
	</div>
</div>
<!-- End Slider -->
<!-- Main -->
<div id="main">
	<div class="shell">
		<div class="col">
			<h2>Calendar</h2>
			<p><div id="calendar"></div></p>
			<div class="cl">&nbsp;</div>
		</div>
		<div class="col">
			<h2>올해의 다짐</h2>
			<img src="css/images/post-image1.gif" alt="" class="right" />
			<p>
				올해에는 방학동안 영어공부에 매진하여 좋은 토익점수를 획득하고, 운동을 열심히해서 15kg 감량하는것이
				목표입니다. 또한, 준비하는 시험도 열심히 해서, 좋은 성적으로 합격하는것이 올해의 목표입니다.
			</p>
			<div class="cl">&nbsp;</div>
		</div>
		<div class="col last">
			<h2>영어공부에 도움되는 사이트</h2>
				<a href="http://cafe.naver.com/okquasimodo/174"><h3>손쉽게 떠먹는 영어</h3></a>
				<a href="http://eng.dangi.co.kr/"><h3>영어 단기 학교</h3></a>
				<a href="http://www.hackers.co.kr/"><h3>해커스 어학원</h3></a>
				<a href="http://www.springfieldspringfield.co.uk/"><h3>외국영화 대본 사이트</h3></a>
			<div class="cl">&nbsp;</div>
		</div>
		<div class="cl">&nbsp;</div>
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