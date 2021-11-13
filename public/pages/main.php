<?
    if(!defined("Airzona")) return require_once '../../public/pages/404norule.php';
?>
            <div class="container" style="margin-top:15px">
							</div>

			<div class="head-middle">
				<i class="manhead"><img src="public\images\design\head-man.png" alt=""></i>
				<div class="hello">
					<div class="w-60">
						<div class="owl-carousel">
							<div>
								<p class="h-title">Путешествуй свободно</p>
								<p>Для тебя открыт безграничный открытый мир,<br>по которому спокойно можно путешествовать</p>
							</div>
							<div>
								<p class="h-title">Начни играть<br>на <? echo $servername; ?> Role Play</p>
								<p>Играй в GTA San-Andreas по сети бесплатно.<br>Тебя ждут тысяча игроков и интересный игровой<br>мир американских штатов!</p>
							</div>
							<div>
								<p class="h-title">Стань<br> бесстрашным бандитом</p>
								<p>Вступай в любую опасную группировку штата.<br>Грабь,продавай наркотики, веди войну за территории<br>и стань королём гетто</p>
							</div>
						</div>
					</div>
					<div class="line-but">
						<a href="howtostart" class="big-but">Начать игру</a>
					</div>
				</div>
			</div>
		</div>
		<? require_once('engine/servers.php'); ?>
		<div class="monitoring">
			<p class="b-title" id="monitoring-title">Мониторинг</p>
						<p class="now-online">Сейчас онлайн: <strong><? echo $allonline; ?></strong></p>
			<div class="servers">				
			    <? echo $serversonline; ?>
			    </div>
		</div>
	</div>
</div>
<div id="youtube">
	<div class="container">
		<a target="_blank" href="https://www.youtube.com/watch?v=cJSXfoz1YfM" class="youtube-white-border">
			<p><strong>Познакомтесь<br>с нашим проектом<br>за 5 минут</strong></p>
			<div class="youtube-icon"><img src="public\images\design\youtube.svg" alt=""></div>
			<div class="youtube-man"><img src="public\images\design\youtube-man.png" alt=""></div>
		</a>
		<div class="youtube-how">
			<p class="redlarge">или</p>
			<p>узнайте<br>как начать играть</p>
			<a href="https://www.youtube.com/watch?v=-AxTSTF709k" data-fancybox="" class="large-red-but"><img src="public\images\design\youtube.svg" alt=""></a>
		</div>
	</div>
</div>
<div id="question">
	<div class="container">
		
		<p class="b-title small">Как Вы относитесь к последнему обновлению?</p>
		<div class="asks">
        <?
            $summa = 120;
            $rating1 = 50;
            $rating2 = 40;
            $rating3 = 30;
            $x = round(100*$rating1/$summa);
            $y = round(100*$rating2/$summa);
            $z = round(100*$rating3/$summa);

			echo'				
							<div>
										<p><strong>'.$x.'%</strong></p>
					<p>Отлично, мне понравилось</p>
					<div class="progress-bar-bar">
					<div class="value" style="width:'.$x.'%"></div>
					</div>
					<a href="" class="primary-but opacity-hover">Голосовать</a>
				</div>
							<div>
										<p><strong>'.$y.'%</strong></p>
					<p>Неплохо, но есть баги</p>
					<div class="progress-bar-bar">
					<div class="value" style="width:'.$y.'%"></div>
					</div>
					<a href="" class="primary-but opacity-hover">Голосовать</a>
				</div>
							<div>
										<p><strong>'.$z.'%</strong></p>
					<p>Плохое обновление</p>
					<div class="progress-bar-bar">
					<div class="value" style="width:'.$z.'%"></div>
					</div>
					<a href="" class="primary-but opacity-hover">Голосовать</a>
				</div>
		
               ';
        ?>
		</div>
	</div>
</div>
<div id="news">
	<div class="container">
		<div class="b-title">Новости</div>
		<i class="news-man"><img src="public\images\design\news-man.png" alt=""></i>
		<div class="row">
			<div class="col-lg-6">
				<div class="news-list">
							<?php echo $content; ?>
									</div>
				<div class="text-right">
					<a href="news" class="more-but">Еще больше новостей</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="bottom">
	<div class="container">
		<p class="b-title small">Начните знакомство c GTA San Andreas Online<br>на SAMP серверах <? echo $servername; ?> RP!</p>
		<div class="info-text">
			<div>
				<p>САМП <? echo $servername; ?> RP - это место где ты можешь стать кем угодно и делать всё что пожелаешь! Хочешь стать злодеем и реализовывать наркотические вещества, подвернуть под себя районный наркопритон в трущобах и поставлять разную наркоту бандитам и бродягам? Или может быть хочешь воровать у военнослужащих материалы? В GTA SAMP возможно всё: даже если ты предпочитаешь мирное существование, то можешь работать в государственных органах - на серверах <? echo $servername; ?> РП перед тобой открыты все двери!</p>
			</div>
			<div>
				<p>Устанавливайте правила, правьте целым штатом, не останавливайтесь ни перед чем! Большое количество заданий, работ и возможностей доступно для каждого игрока на <? echo $servername; ?> Role Play! Наслаждайтесь игрой в САМП, а разработчики <? echo $servername; ?> позаботятся о добавлении новых функций, фишек, дополнений и обновлений для комфортного пребывания на сервер <? echo $servername; ?> RP.</p>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="view-5min" tabindex="-1" role="dialog" aria-labelledby="view-5min-label" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<iframe width="800" height="450" src="https://www.youtube.com/embed/-AxTSTF709k?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
		</div>
	</div>
</div>