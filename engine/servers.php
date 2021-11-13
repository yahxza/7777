<?
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
		switch ($x)
		{
		    case 1: $nows = $ipserver1;break;
			case 2: $nows = $ipserver2;break;
			case 3: $nows = $ipserver3;break;
			case 4: $nows = $ipserver4;break;
			case 5: $nows = $ipserver5;break;
			case 6: $nows = $ipserver6;break;
			case 7: $nows = $ipserver7;break;
			case 8: $nows = $ipserver8;break;
			case 9: $nows = $ipserver9;break;
		}
		switch ($x)
	    {
	        case 1: require_once('core/config/config1.php'); break;
	    	case 2: require_once('core/config/config2.php'); break;
	    	case 3: require_once('core/config/config3.php'); break;
	    	case 4: require_once('core/config/config4.php'); break;
	    	case 5: require_once('core/config/config5.php'); break;
	    	case 6: require_once('core/config/config6.php'); break;
	    	case 7: require_once('core/config/config7.php'); break;
	    	case 8: require_once('core/config/config8.php'); break;
	    	case 9: require_once('core/config/config9.php'); break;
	    }

        $mysqli = @new mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASS, Config::DB_NAME);
        
        $mysqli->set_charset("utf8");
	    $sql = "SELECT count(*) FROM `accounts` WHERE `Online_status` != 0";
	    $result = $mysqli->query($sql);
	    $rows = $result->fetch_row();
	    $online = $rows[0] + 0;

        $allonline += $online; 


		if(!empty($now))
		{
		    $serversonline .= '
									<div>
						<div class="server-size">
							<p><strong>'.$online.'</strong></p>
							<p>/ 500</p>
						</div>
						<p>'.$servername.' RolePlay</p>
						<p><strong>'.$now.'</strong></p>
						<p class="ip" style="">'.$nows.'</p>
						<div class="s-url">
							<a href="http://servers-samp.ru/server-172536" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Голосовать за сервер"><img src="public\images\design\vote.svg" alt=""></a>
							<a href="map'.$x.'" data-toggle="tooltip" data-placement="bottom" title="Карта штата"><img src="public\images\design\map.svg" alt=""></a>
							<a href="" data-toggle="tooltip" data-placement="bottom" title="Рейтинги сервера"><img src="public\images\design\star.svg" alt=""></a>
							<a href="" data-toggle="tooltip" data-placement="bottom" title="Составы фракций"><img src="public\images\design\power.svg" alt=""></a>
						</div>
					</div>		
            ';
		}
		$mysqli->close();
	}
?>