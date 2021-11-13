<?
    if(!defined("Airzona")) return require_once '../../../public/pages/404norule.php';
?>
        </div>
	</div>
</div>
<div id="content">
	<div class="container">
		<div class="profile-head">
			<div class="skin-wrap">
				<div class="stat-user">
					<div class="health u-stat">
                        						<p>Здоровье</p>
						<div><span><?php echo $account['HP']; ?></span><i style="width: <?php echo $account['HP']; ?>%"></i></div>
					</div>
					<div class="golod u-stat">

						<p>Голод</p>
						<div><span><?php echo $account['Fullness']; ?></span><i style="width: <?php echo $account['Fullness']; ?>%"></i></div>
					</div>
				</div>
				<div class="skin-user">
					<div style="width:230px;height:490px;margin:0 auto;background:url('/public/images/skin/<?php echo $account['Skin']; ?>.png') center top;background-size: 250px 481px;"></div>
				</div>
			</div>
			<div class="skin-info">
				<p class="b-title username"><?php echo $name; ?></p>

<?php
if($_SESSION['success'] == 1)
{
echo            '<div id="w0-success" class="alert-success alert fade show">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

Пароль был успешно изменен.

</div>';
$_SESSION['success'] = 0;
}
?>
<?php
if($_SESSION['success'] == 2)
{
echo            '<div id="w0-success" class="alert-success alert fade show">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

Секретный код был успешно изменен.

</div>';
$_SESSION['success'] = 0;
}
?>
<?php
if($_SESSION['success'] == 3)
{
echo            '<div id="w0-success" class="alert-success alert fade show">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

Ваш банковский код сброшен.

</div>';
$_SESSION['success'] = 0;
}
?>
				<div class="stat-table">
					<div>
						<p><small>Играет на</small></p>
						<p><? echo $playingserver; ?></p>
					</div>
					<div>
						<p><small>ID</small></p>
						<p><?php echo $account['ID']; ?></p>
					</div>
					<div>
						<p><small>E-mail</small></p>
						<p><?php echo $account['Mail']; ?></p>
					</div>
					<div>
						<p><small>Уровень VIP</small></p>
						<p><?php echo $VIP; ?></p>
					</div>
					<div>
						<p><small>Уровень в игре</small></p>
						<p><?php echo $account['Level']; ?></p>
					</div>
					<!--<div>
						<p><small>Двухфакторная авторизация</small></p>
						<p><span style="color:#ce4b4b">Отключена</span> (<a href="https://www.youtube.com/watch?v=Kx7uqzOWqOI" target="_blank">как включить?</a>)</p>
					</div>-->
					<div>
						<p><small>Наличные</small></p>
						<p><?php echo $account['Money']; ?>$</p>
					</div>
					<div>
						<p><small>Накопления</small></p>
						<p><?php echo $account['Bank']; ?>$</p>
					</div>
					<div>
						<p><small>AZ монеты</small></p>
						<p><?php echo $account['VirMoney']; ?></p>
					</div>
					<!--<div>
						<p><small>Состояние депозита</small></p>
						<p><?php //echo $account['Deposit']; ?></p>
					</div>-->
					<div>
						<p><small>Статус аккаунта</small></p>
						<p><?php echo $status; ?></p>
					</div>
					<div>
						<p><small>Работа</small></p>
						<p><?php echo $job; ?></p>
					</div>
					<div>
						<p><small>Организация</small></p>
						<p><?php echo $member; ?></p>
					</div>
					<div>
						<p><small>Ранг</small></p>
						<p><?php echo $account['Rank']; ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="profile-content">
			<div class="p-main">
				<p class="b-title small">Улучшения</p>
				<div class="faster-grid">
					<div>
						<div class="icon"><?php echo $out; ?></div>
						<div>
							<p><strong>Решительность</strong></p>
							<p>Возможность увольняться<br>из фракции самому, даже когда<br>лидер не в сети.</p>
						</div>
					</div>
					<div>
						<div class="icon"><?php echo $shumaxer; ?></div>
						<div>
							<p><strong>Шумахер</strong></p>
							<p>С этим умением ваша<br>машина не будет глохнуть<br>при столкновении</p>
						</div>
					</div>
					<div>
						<div class="icon"><?php echo $xalyav; ?></div>
						<div>
							<p><strong>Халявщик</strong></p>
							<p>Ваш персонаж становится<br>везунчиком и платит в 2 раза<br>меньше налогов</p>
						</div>
					</div>
					<div>
						<div class="icon"><?php echo $businesman; ?></div>
						<div>
							<p><strong>Бизнесмен</strong></p>
							<p>Улучшение<br>позволяет вам владеть<br>пятью бизнесами</p>
						</div>
					</div>
					<!--<div>
						<div class="icon"><?php echo $planshet; ?></div>
						<div>
							<p><strong>Планшет</strong></p>
							<p>Вы сможете отправлять<br>объявления на редакцию,<br>с любой точки карты</p>
						</div>
					</div>
					<div>
						<div class="icon"><img src="public/images/design/minus.svg" alt=""></div>
						<div>
							<p><strong>Вечный Car Skill</strong></p>
							<p>Ваш навык вождения,<br>не будет уменьшаться</p>
						</div>
					</div>
					<div>
						<div class="icon"><img src="public/images/design/minus.svg" alt=""></div>
						<div>
							<p><strong>Больше недвижимости</strong></p>
							<p>Вы сможете владеть<br>4 домами</p>
						</div>
					</div>-->
				</div>
				<p class="b-title small">Навыки владения оружием</p>
				<div class="exp-grid">

												<div>
							<div class="icon"><img src="public/images/gun/m4.png" alt=""></div>
							<div class="progress-gun"><i style="width: <?php echo $account['M4_Skill']/100; ?>%"></i></div>
							<div class="size-gun"><?php echo $account['M4_Skill']/100; ?>%</div>
						</div>


												<div>
							<div class="icon"><img src="public/images/gun/ak47.png" alt=""></div>
							<div class="progress-gun"><i style="width: <?php echo $account['AK47_Skill']/100; ?>%"></i></div>
							<div class="size-gun"><?php echo $account['AK47_Skill']/100; ?>%</div>
						</div>


												<div>
							<div class="icon"><img src="public/images/gun/pistol.png" alt=""></div>
							<div class="progress-gun"><i style="width: <?php echo $account['Pistol_Skill']/100; ?>%"></i></div>
							<div class="size-gun"><?php echo $account['Pistol_Skill']/100; ?>%</div>
						</div>


												<div>
							<div class="icon"><img src="public/images/gun/sdpistol.png" alt=""></div>
							<div class="progress-gun"><i style="width: <?php echo $account['SDPistol_Skill']/100; ?>%"></i></div>
							<div class="size-gun"><?php echo $account['SDPistol_Skill']/100; ?>%</div>
						</div>


												<div>
							<div class="icon"><img src="public/images/gun/deagle.png" alt=""></div>
							<div class="progress-gun"><i style="width: <?php echo $account['Eagle_Skill']/100; ?>%"></i></div>
							<div class="size-gun"><?php echo $account['Eagle_Skill']/100; ?>%</div>
						</div>


												<div>
							<div class="icon"><img src="public/images/gun/shotgun.png" alt=""></div>
							<div class="progress-gun"><i style="width: <?php echo $account['ShotGun_Skill']/100; ?>%"></i></div>
							<div class="size-gun"><?php echo $account['ShotGun_Skill']/100; ?>%</div>
						</div>


												<div>
							<div class="icon"><img src="public/images/gun/mp5.png" alt=""></div>
							<div class="progress-gun"><i style="width: <?php echo $account['MP5_Skill']/100; ?>%"></i></div>
							<div class="size-gun"><?php echo $account['MP5_Skill']/100; ?>%</div>
						</div>


												<div>
							<div class="icon"><img src="public/images/gun/sniper.png" alt=""></div>
							<div class="progress-gun"><i style="width: <?php echo $account['Sniper_Skill']/100; ?>%"></i></div>
							<div class="size-gun"><?php echo $account['Sniper_Skill']/100; ?>%</div>
						</div>

	                				</div>

				<!--<p class="b-title small">Силовые характеристики</p>
				<div class="power-grid">
					<div>
						<div class="icon"><img src="public/images/design/power.svg" alt=""></div>
						<p><strong>Сила</strong></p>
						<div class="progress-pow"><i style="width:0%"></i></div>
						<div class="pow-size">0%</div>
					</div>
					<div>
						<div class="icon"><img src="public/images/design/muscle.svg" alt=""></div>
						<p><strong>Мускулатура</strong></p>
						<div class="progress-pow"><i style="width:0%"></i></div>
						<div class="pow-size">0%</div>
					</div>
					<div>
						<div class="icon"><img src="public/images/design/ankle.svg" alt=""></div>
						<p><strong>Выносливость</strong></p>
						<div class="progress-pow"><i style="width:0%"></i></div>
						<div class="pow-size">0%</div>
					</div>
				</div>-->


				<p class="b-title small">Навык фермерства</p>
								<div class="fermer-grid">
					<p><strong>У вас <span><?php echo $account['ContractTime']; ?></span> очков</strong></p>
					<div class="fermer-line">
						<div class="progress-f">
							<i style="width: 23%"></i><span class="lvl-1 active"></span><span class="lvl-2 active"></span><span class="lvl-3 active"></span><span class="lvl-4 active"></span>
						</div>
						<div class="f-text">
							<p>Начинающий<br>фермер<br><small>0 очков</small></p>
							<p>Водитель<br>трактора<br><small>500 очков</small></p>
							<p>Водитель<br>комбайна<br><small>3200 очков</small></p>
							<p>Пилот<br>кукурузника<br><small>7000 очков</small></p>
						</div>
					</div>
				</div>
				<p class="b-title small">Стили боя</p>
				<div class="style-grid">
                    							<div>
								<p><strong>Boxing</strong></p>
								<p>Боксерский стиль</p>
								<p><?php echo $boxing; ?></p>
							</div>
                    							<div>
								<p><strong>Kungfu</strong></p>
								<p>Стиль кунг-фу</p>
								<p><?php echo $kungfu; ?></p>
							</div>
                    							<div>
								<p><strong>Kneehead</strong></p>
								<p>Кикбоксерский стиль</p>
								<p><?php echo $kneehead; ?></p>
							</div>
                    							<div>
								<p><strong>GrabKick</strong></p>
								<p>Удар ногой</p>
								<p><span class="study">Изучен</span></p>
							</div>
                    							<div>
								<p><strong>Elbow</strong></p>
								<p>Захваты и удары</p>
								<p><?php echo $elbow; ?></p>
							</div>
                    				</div>
			<!--<p class="b-title small">Другое</p>
				<div class="fermer-grid">
					<div class="fermer-line">
						<style>.f-text img{height:40px;margin-bottom:20px}</style>
						<div class="f-text">
							<p><img src="public/images/design/carskill.png" alt=""><br>Навык<br>вождения<br><small>0 очков</small></p>
							<p><img src="public/images/design/gryzskill.png" alt=""><br>Навык<br>дальнобойщика<br><small>0 очков</small></p>
							<p><img src="public/images/design/taxiskill.png" alt=""><br>Навык<br>таксиста<br><small>0 очков</small></p>
							<p><img src="public/images/design/prodskill.png" alt=""><br>Развозчик<br>продуктов<br><small>0 очков</small></p>
						</div>
					</div>
				</div>	-->
			</div>
			<div class="p-sidebar">
				<ul class="p-menu">
					<?
					if($account['Admin'] > 7)
					{
						$_SESSION['admin'] = 'true';
					    echo '
						<li class="sep"></li>
						<li><a href="/addnew">Добавить новость</a></li>
                        <li><a href="/logs">Логи сервера</a></li>';
					}
					else
					{
					    $_SESSION['admin'] = 'false';
					}
					?>

					<li class="sep"></li>

					<li><a href="/search">Найти игрока</a></li>
					<li><a href="/donate">Пополнить счёт</a></li>


					<li class="sep"></li>


					<li><a href="/engine/user/resetbank.php">Сбросить код банк. карты</a></li>
					<li><a href="/changecode">Изменить секретный код</a></li>
					<li><a href="/changepass">Изменить пароль</a></li>
					<li><a href="/engine/user/exit.php">Выйти</a></li>
					<li class="sep"></li>
				</ul>
			</div>
		</div>
	</div>
</div>
