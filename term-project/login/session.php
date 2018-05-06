<?php
	session_start();
	ob_start();
	//서버측에서 세션이 존재하지않는다면,
	if(!isset($_SESSION['id'])) 
	{
		//클라이언트측에서 쿠키가 존재한다면,
		if(isset($_COOKIE['id']) && isset($_COOKIE['email'])) 
		{
			//쿠키로 부터 세션을 다시 setting
			$userid = $_COKKIE['id'];
			$_SESSION['id'] = $userid;
		}
	}
?>