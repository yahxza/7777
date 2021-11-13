<?
    if(!defined("Airzona")) return require_once '../../public/pages/404norule.php';
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
	<!-- Meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Title -->
    <title><? echo $title; ?></title>
    
    <!-- Other -->
    <meta name="description" content="Скачать самп чтобы играть на серверах лучшего проекта GTA San Andreas Online - <? echo $servername; ?> РП. Для того что бы начать в самп играть следуйте инструкциям на этой странице. Samp Role Play <? echo $servername; ?> является самым популярным проектом. У нас можно скачивать самп для игры на сервер <? echo $servername; ?> РП.">
<?
if(!empty($css)) 
 echo $css;
?>

<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,700&amp;amp;subset=cyrillic" rel="stylesheet">
<link href="/public\css\animate.css" rel="stylesheet">
<link href="/public\css\reset.css" rel="stylesheet">
<link href="/public\css\bootstrap.min.css" rel="stylesheet">
<link href="/public\css\owl.carousel.min.css" rel="stylesheet">
<link href="/public\css\style-less.css" rel="stylesheet">
<link href="/public\css\responsive.css" rel="stylesheet">
<link href="/public\css\jquery.fancybox.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//vk.com/js/api/openapi.js?159"></script>
    <style>
		.help-block-error{display:none;color:red;font-size:14px;padding-top:10px}
		.has-error > .help-block{display:block}
		.map-container{position:relative;margin: 0 auto;background-image:url(public/images/design/samap_1280.jpg);background-size:contain}
		.map-icon{position:absolute;width:16px;height:16px}
		.map-setting {color: #a4a4a4;font-size: 15px}
		.map-setting:after,.map-setting:before{content: " ";display: table}
		.map-setting .list{width: 100px;text-align: right;position: relative;float: right}
		.map-setting span {display: inline-block;margin-bottom: 15px;cursor: pointer}
		.map-setting ul {display:none;list-style:none;position:absolute;width:250px;text-align:left;top:30px;right:0;background:#272727;padding:15px;z-index:100}
		.map-setting li {padding:7px 10px;cursor:default}
		.map-setting li input {float:right;cursor:pointer}
		.alert > .close,.members-list > .close{font-size:20px}

		.alert{border-radius:0;font-size:15px}
		.alert-success{color:#46e66a;background-color:transparent;border-color:#46e66a}
		.alert-danger{color:#e64646;background-color:transparent;border-color:#e64646}
		.alert-info{color:#45e4ff;background-color:transparent;border-color:#45e4ff}

		.pagination{display:flex;justify-content:center}
		.pagination > li{background:rgba(26,26,31,0.34);display:inline-block;border-radius:5px;line-height:40px;width:40px;margin:0 4px}
		.pagination > li > a {color:#51547f}	
		.pagination > li.active > a {color:#979bdc}
		.pagination > li.disabled > span {color:#30324c}
		.news-list-in-news > div .n-preview img{opacity:0.7}
		.money-items-grid > div .m-img > img{max-height:95%}

		#up-btn{position:fixed;cursor:pointer;right:30px;bottom:30px;background:#51547f;border:0;padding:10px 15px;border-radius:5px;font-size:15px;display:none;z-index:1001}
	</style>
</head>
<body>
	
	<i class="mobile-menu" data-toggle="modal" data-target="#mainmenumodal"><img src="\public\images\design\list-menu.svg" alt=""></i>

<div id="<? echo $background; ?>" class="<? echo $background1; ?>">
    <div class="container">
        <div class="header">
            
			<div class="topline">
	<a href="/" class="logo"><img src="/public\images\design\logo.svg" alt=""></a>
	<ul class="main-menu">
		<li><a href="/">Главная</a></li>
<li><a href="/news">Новости</a></li>
<li><a href="/howtostart">Как начать игру?</a></li>
<li><a href="//forum.airzona-rp.ru">Форум</a></li>
<li><a href="/donate">Магазин</a></li>
<!--<li><a href="/auction">Аукционы</a></li>-->
	</ul>
	<a href="login" class="primary-but">Кабинет</a>
</div>

<?php require_once $page; ?>
	
	<div id="footer">
		<div class="container">
			<div class="footer-cube">
				<div>
					<p class="copyright"><strong><? echo $servername; ?> © 2019</strong></p>
					<p style="font-size:14px">Все права принадлежат Arizona-rp.ru.<br>Данный сайт является копией arizona-rp.ru!</p>
					<a href="//www.free-kassa.ru/"><img src="//www.free-kassa.ru/img/fk_btn/22.png"></a>
					<div class="uSocial-Share" data-pid="101b1b5b5c3c3a532e8f65bc3c9faadd" data-type="share" data-options="round-rect,style1,default,absolute,horizontal,size24,eachCounter0,counter0" data-social="vk,gPlus,fb" data-mobile="vi,wa,sms"></div>
				</div>
				<div>
					<a href="/maps" class="map-go">
						<p>Карты<br>штатов</p>
					</a>
				</div>
				<div>
					<div id="vk_official"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="mainmenumodal" tabindex="-1" role="dialog" aria-labelledby="mainmenumodallabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<ul class="main-menu modalk">
					<li><a href="/">Главная</a></li>
<li><a href="/news">Новости</a></li>
<li><a href="/howtostart">Как начать игру?</a></li>
<li><a href="//forum.airzona-rp.ru">Форум</a></li>
<li><a href="/donate">Магазин</a></li>
<li><a href="/auction">Аукционы</a></li>
				</ul>
			</div>
		</div>
	</div>

	<button id="up-btn">Наверх</button>

	<script>
		var btnUp = document.getElementById('up-btn');
		window.onscroll = function() {
			var offset = window.pageYOffset;
			if(offset > window.innerHeight) {
				btnUp.style.display = 'inline';
			}
			else {
				btnUp.style.display = 'none';
			}
		}
		btnUp.onclick = function() {
			jQuery('html').animate({scrollTop:0},100);
		}
	</script>
    <script async src="https://usocial.pro/usocial/usocial.js?v=6.1.4" data-script="usocial" charset="utf-8"></script>
	<script type="text/javascript">VK.Widgets.Group("vk_official", {mode: 1, width: "250", color1: '303038', color2: 'FFFFFF'}, 72680788);</script>
	
	
<script src="/public\js\bootstrap.bundle.min.js"></script>
<script src="/public\js\owl.carousel.min.js"></script>
<script src="/public\js\jquery.fancybox.min.js"></script>
<script src="/public\js\script.js"></script>
<?php
if(!empty($script))
 echo $script;
?>
</body>
</html>