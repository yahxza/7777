<?
    if(!defined("Airzona")) return require_once '../../public/pages/404norule.php';
?>
<style>
	img{max-width:100%}
	.article-body{line-height:1.4;font-size:15px;}

	.yt-video {
		background-size:cover;
		background-position:center center;
		position:relative;
		display:flex;
		align-items:center;
		justify-content:center;
	}
	.yt-video > .overlay {
		position:absolute;
		top:0;
		right:0;
		left:0;
		bottom:0;
		background:rgba(0,0,0,.7);
		z-index:1;
	}
	.yt-video > a {
		z-index:2;
		position:relative;
	}

</style>
		</div>
	</div>
</div>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<h1 class="b-title" style="text-align:center;font-size:40px;margin:0 0 20px 0"><? echo $ntitle; ?></h1>
				<div class="article-body">
				    <? echo $text; ?> </div>
				<div style="text-align:right;margin-bottom:20px">
					<? echo $date;?>								</div>	
			</div>
		</div>
	</div>
</div>
<script>
	var yt = document.querySelector('.article-body iframe');
	if(yt !== null) {
		var ytSrc = yt.src;
		var reg = /(youtu\.be\/|youtube\.com\/(watch\?(.*&)?v=|(embed|v)\/))([^\?&"'>]+)/
		var ytId = reg.exec(ytSrc)[5];
		var article = document.getElementsByClassName('article-body')[0];

		var ytVideo = document.createElement('div');
		ytVideo.classList.add('yt-video');
		ytVideo.style.backgroundImage = 'url(http://img.youtube.com/vi/' + ytId + '/0.jpg)';
		ytVideo.style.height = article.clientWidth*0.5625 + 'px';
		yt.remove();
		article.appendChild(ytVideo);

		var ytVideoOverlay = document.createElement('div');
		ytVideoOverlay.classList.add('overlay');
		ytVideo.appendChild(ytVideoOverlay);

		var ytVideoButton = document.createElement('a');
		ytVideoButton.setAttribute('href',ytSrc);
		ytVideoButton.setAttribute('data-fancybox',true);
		ytVideo.appendChild(ytVideoButton);

		var ytVideoButtonImg = document.createElement('img');
		ytVideoButtonImg.src = 'public/images/design/youtube_social_icon_red.png';
		ytVideoButton.appendChild(ytVideoButtonImg);
	}

</script>