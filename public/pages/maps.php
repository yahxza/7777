<?
    if(!defined("Airzona")) return require_once '../../public/pages/404norule.php';
?>
  		</div>
	</div>
</div>
<div id="content">
	<div class="container">
		<p class="b-title">Карты штатов</p>
		<div class="map-list">
            <?php
            for($x = 1; $x-1 < $servermon; $x++)
	        {
                switch ($x)
		        {
		            case 1: $now = $nameserver1;break;
			        case 2: $now = $nameserver2;break;
			        case 3: $now = $nameserver3;break;
			        case 4: $now = $nameserver4;break;
			        case 5: $now = $nameserver5;break;
			        case 6: $now = $nameserver6;break;
			        case 7: $now = $nameserver7;break;
			        case 8: $now = $nameserver8;break;
			        case 9: $now = $nameserver9;break;
		        }
                echo '<a href="map'.$x.'">'.$now.'</a>';
		    }
            ?>
        </div>
	</div>
</div>