$(document).ready(function(){
	drama_refreshreview(); //로딩시에 리뷰를 새로고침
	movie_refreshreview(); //로딩시에 리뷰를 새로고침
	function drama_refreshreview() {
		$.getJSON("drama_listsearchreviewjson.php",function(json) {
			//alert(json.review.length);
			$('.chat-box').remove();
			$.each(json.review,function(){	//각각의 review에 대해서 실행
				var review = '<ol class="chat-box">';
				review += '<li class="another">';
				review += '<time>' + this["time"] + '</time>';
				review += '</li>';
				review += '<li class="another">';
				review += '<time>' + this["email"] + '</time>';
				review += '</li>';
				review += '<li class="another">';
				review += '<div class="avatar-icon">';
				review += '<img src="userimage.php?email=' +
						this["email"] + '" alt="User Image"/> </div>';
				review += '<div class="messages">' + this["memo"];
				review += '<img class="user_image" src="getpicture.php?reviewid=' +
						this["reviewid"] + '" alt="Gundam Picture" />';
				review += '</div>';
				review += '</li>';
				review += '<div id="write_review"><a href="drama_updatereviewform.php?reviewid=' + this["reviewid"] + '&memo=' + this["memo"] + '">리뷰 수정하기</a></div>';
				review += '<div id="write_review"><a href="drama_deletereview.php?reviewid=' + this["reviewid"] + '">리뷰 삭제하기</a></div>';
					
				if(this.reply) {	//댓글이 있다면,
					$.each(this.reply, function() {	//각각의 reply에 대해서 실행
						var reply = '<li class="me">';
						reply += '<time>' + this["time"] + '</time>';
						reply += '</li>';
						reply += '<li class="me">';
						reply += '<time>' + this["email"] + '</time>';
						reply += '</li>';
						reply += '<li class="me">';
						reply += '<div class="avatar-icon">';
						reply += '<img src="userimage.php?email=' +
								this["email"] + '" alt="User Image"/> </div>';
						reply += '<div class="messages"><p>' + this["memo"] + '</p></div>';
						reply += '</div>';
						
						reply += '</li>';
						
						review += reply;
					});
				}
				
				review += '<div id="write_reply"><a href="drama_writereplyform.php?reviewid=' +
					this["reviewid"] + '">댓글등록</a></div>';
				
				review += '</ol>';
				
				$('.chat-container').append(review);
				$('.chat-container').append("<hr>");

			});
		});
	}
	
		function movie_refreshreview() {
		$.getJSON("movie_listsearchreviewjson.php",function(json) {
			//alert(json.review.length);
			$('.panel-body').append('<ul class="media-list">');
			$('.media-list').remove();
			$.each(json.review,function(){	//각각의 review에 대해서 실행
				var review = '<li class="media">';
				review += '<div class="media-body">';
				review += '<div class="media">';
				review += '<a class="pull-left" href="#">';
				review += '<img class="media-object img-circle" src="userimage.php?email=' +
						this["email"] + '" alt="User Image"/>';
				review += '<a href="favorite.php?reviewid=' + this["reviewid"] + '" class="share-btn">';
				review += '<span class="share-btn-action share-btn-like">Like</span>';
				review += '<span class="share-btn-count">' + this["favorite"] + '</span>';
				review += '</a>';
				review += '</a>';
				
				review += '<div class="media-body" >'+ this["memo"];
				review += '<img class="user_image" src="movie_getpicture.php?reviewid=' +
						this["reviewid"] + '" alt="Gundam Picture" />';
				review += '<br />';
				review += '</div>';
                review += '<small class="text-muted">' + this["email"] + ' | ' + this["time"] + '</small>';
				review += '<hr />';
				
				review += '</div>';
				review += '</div>';
				review += '</li>';
				review += ' <button class="btn btn-info" type="button"><a href="movie_updatereviewform.php?reviewid=' + this["reviewid"] + '&memo=' + this["memo"] + '">리뷰 수정</a></button>';
				review += ' <button class="btn btn-info" type="button"><a href="movie_deletereview.php?reviewid=' + this["reviewid"] + '">리뷰 삭제</a></button>';
				review += '<br />';
				
				if(this.reply) {	//댓글이 있다면,
					$.each(this.reply, function() {	//각각의 reply에 대해서 실행
						var reply = '<li class="media">';
						reply += '<div class="media-body">';
						reply += '<div class="media">';
						reply += '<a class="pull-left" href="#">';
						reply += '<img class="reply-media-object img-circle" src="userimage.php?email=' +
								this["email"] + '" alt="User Image"/>';
						reply += '</a>';
						
						reply += '<div class="media-body" >'+ this["memo"];
						reply += '<br />';
						reply += '</div>';
						reply += '<small class="text-muted">' + this["email"] + ' | ' + this["time"] + '</small>';
						reply += '<hr />';
						
						reply += '</div>';
						reply += '</div>';
						reply += '</li>';
						
						review += reply;
					});
				}
				
				review += '<br />';
				review += '<div id="write_reply"><a href="movie_writereplyform.php?reviewid=' +
					this["reviewid"] + '">댓글등록</a></div>';
				
				$('.panel-body').append(review);

			});
			$('.panel-body').append('</ul>');
		});
	}	
	
	
		
	
});