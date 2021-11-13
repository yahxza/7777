<?
    if(!defined("Airzona")) return require_once '../../public/pages/404norule.php';
?>
<style>
	.mobile-map-help{display:none;font-size:13px;color:#a4a4a4;margin:10px 0;text-align:center}
	@media(max-width:1200px) {
		.map-overflow{overflow:scroll}
		.mobile-map-help{display:block}
	}
</style>
        </div>
	</div>
</div>
<div id="content">
	<div class="container">
		<p class="b-title">Карта штата <? echo $servername; ?> Role Play <? echo $servname; ?></p>
		<div class="mobile-map-help">Используйте свайп влево для просмотра всей карты.</div>
		<div class="map-setting">
			<div class="list"><span>Настройка<i class="fa fa-gear"></i></span>
				<ul>
					<li>Свободные дома
						<input type="checkbox" name="display-0" class="display-icon" data-display="house-for-sale" checked="">
					</li>
					<li>Занятые дома
						<input type="checkbox" name="display-1" class="display-icon" data-display="house-not-sale" checked="">
					</li>
					<li>Амуниция<input type="checkbox" name="display-2" class="display-icon" data-display="business-state-0" checked=""></li>
					<li>Бар<input type="checkbox" name="display-3" class="display-icon" data-display="business-state-1" checked=""></li>
					<li>Магазин 24/7<input type="checkbox" name="display-4" class="display-icon" data-display="business-state-2" checked=""></li>
					<li>Магазин одежды<input type="checkbox" name="display-5" class="display-icon" data-display="business-state-3" checked=""></li>
					<li>Предприятие<input type="checkbox" name="display-6" class="display-icon" data-display="business-state-4" checked=""></li>
					<li>Тюнинг салон<input type="checkbox" name="display-7" class="display-icon" data-display="business-state-5" checked=""></li>
					<li>АЗС/Магазин механики<input type="checkbox" name="display-8" class="display-icon" data-display="business-state-6" checked=""></li>
					<li>Закусочная<input type="checkbox" name="display-9" class="display-icon" data-display="business-state-7" checked=""></li>
					<!--<li>Аренда транспорта<input type="checkbox" name="display-10" class="display-icon" data-display="business-state-8" checked=""></li>-->
					<li>Магазин аксесуаров<input type="checkbox" name="display-11" class="display-icon" data-display="business-state-9" checked=""></li>				
				</ul>
			</div>
		</div>
		<div class="map-container" style="width:1140px;height:1140px"><?php echo $content; ?></div>
	</div>