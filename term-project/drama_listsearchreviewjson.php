<?php
	header('Content-Type: application/json;charset=UTF-8');
	require_once('homepage_dbcon.php');
	
	$dbc = mysqli_connect($host,$user,$pass,$dbname)
		or die("Error Connecting to MySQL Server.");
	
	$content = $_COOKIE['content'];

	mysqli_query($dbc,'set names utf8');
	$query = "select reviewid, userid , email, memo , time from review,user
			where userid=user.id and memo like '%$content%' order by time desc limit 0,30";		

	//댓글을 한번에 다가져올수없으므로, 최근값 30개만 가져옴.
	$result = mysqli_query($dbc,$query) or die ("Error Querying Review2.");
	$json = array();
	while($row = mysqli_fetch_assoc($result)){
		$replyquery = "select replyid, userid, email, memo, time from reply, user
				where reviewid = $row[reviewid] and user.id=reply.userid
				order by time desc limit 0,30";
		
		$replyresult = mysqli_query($dbc,$replyquery) or die ("Error Querying Reply2.");
		$replyjson = array();
		
		while($replyrow = mysqli_fetch_assoc($replyresult)){
			$replyjson['reply'][] = $replyrow;
		}
		$json['review'][] = $row + $replyjson;
		
		
		mysqli_free_result($replyresult);
	}
	
	mysqli_free_result($result);
	mysqli_close($dbc);
	
	echo json_encode($json);
	
?>