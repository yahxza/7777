<?	
    switch($_SESSION['server'])
    {
    	case 1: $servname = $nameserver1; break;
    	case 2: $servname = $nameserver2; break;
    	case 3: $servname = $nameserver3; break;
    	case 4: $servname = $nameserver4; break;
    	case 5: $servname = $nameserver5; break;
    	case 6: $servname = $nameserver6; break;
    	case 7: $servname = $nameserver7; break;
    	case 8: $servname = $nameserver8; break;
    	case 9: $servname = $nameserver9; break;
    }

	$sql = "SELECT * FROM casinos";
	$result = $mysqli->query($sql);
	$rows = $result->num_rows;
	
	if($rows != 0)
	{
		for ($i = 0;$i < $rows;$i ++)
		{
			$result->data_seek($i);
			$map = $result->fetch_assoc();
			
			$name = $map['Name'];
			$x = $map['Pos_X'];
			$y = $map['Pos_Y'];
		    $owner = $map['Owner'];
			$balance = $map['Balance'];
			$deal = $map['Deal'];
			
			if($x > 0) $left = (3000 + abs($x))/5.3;
			else $left = (3000 - abs($x))/5.3;
			if($y > 0) $top = (3000 - abs($y))/5.3;
			else $top = (3000 + abs($y))/5.3;
			$content .= '
		     	<div class="map-icon" style="top:'.$top.'px; left:'.$left.'px;background:url(public/images/design/casino.gif)" data-original-title="'.$name.'&lt;p class=&#39;text-left&#39;&gt;<br>Владелец: '.$owner.'<br>Баланс: '.$balance.'$<br>Работа крупье: '.$deal.'$<br>&lt;/p&gt;" data-toggle="tooltip" data-html="true"></div>
	    	';
		};
	}
	//$result->close();
    
	$mysqli->set_charset("utf8");
 
	$sql = "SELECT * FROM businesses";
	$result = $mysqli->query($sql);
	$rows = $result->num_rows;	
	
	if($rows != 0)
	{
		for ($i = 0;$i < $rows;$i ++)
		{
			$result->data_seek($i);
			$map = $result->fetch_assoc();
			
			$name = $map['Name'];
			$x = $map['Enter_X'];
			$y = $map['Enter_Y'];
		    $owner = $map['Owner'];
			$cost = $map['Cost'];
			$state = $map['State'];
			
			if($x > 0) $left = (3000 + abs($x))/5.3;
			else $left = (3000 - abs($x))/5.3;
			if($y > 0) $top = (3000 - abs($y))/5.3;
			else $top = (3000 + abs($y))/5.3;
			if($owner == 'The State')
			{
			    $content .= '
		     		<div class="map-icon business-state-'.$state.' business-for-sale" style="top:'.$top.'px; left:'.$left.'px;background:url(public/images/design/business_1.gif)" data-original-title="'.$name.'<br><br>Стоимость: '.$cost.'$" data-toggle="tooltip" data-html="true"></div>
	    		';
			}
			else
			{
				$content .= '
		     		<div class="map-icon business-state-'.$state.' business-not-sale" style="top:'.$top.'px; left:'.$left.'px;background:url(public/images/design/business_0.gif)" data-original-title="'.$name.'<br><br>Владелец: '.$owner.'" data-toggle="tooltip" data-html="true"></div>
	    		';
			}
		};
	}
	$result->close();
    
	$sql = "SELECT * FROM houses";
	$result = $mysqli->query($sql);
	$rows = $result->num_rows;

	if($rows != 0)
	{	
		for ($i = 0;$i < $rows;$i ++)
		{
			$fix = $i;
			
			$result->data_seek($i);
			$map = $result->fetch_assoc();
			
			$id = $fix;
			$x = $map['Enter_X'];
			$y = $map['Enter_Y'];
		    $owner = $map['Owner'];
			$cost = $map['Cost'];
			
			if($x > 0) $left = (3000 + abs($x))/5.3;
			else $left = (3000 - abs($x))/5.3;
			if($y > 0) $top = (3000 - abs($y))/5.3;
			else $top = (3000 + abs($y))/5.3;
			if($owner == 'The State')
			{
			    $content .= '
		     		<div class="map-icon house-for-sale" style="top:'.$top.'px; left:'.$left.'px;background:url(public/images/design/house_1.gif)" data-original-title="№ '.$id.'<br><br>Стоимость: '.$cost.'$" data-toggle="tooltip" data-html="true"></div>
	    		';
			}
			else
			{
				$content .= '
		     		<div class="map-icon house-not-sale" style="top:'.$top.'px; left:'.$left.'px;background:url(public/images/design/house_0.gif)" data-original-title="№ '.$id.'<br><br>Владелец: '.$owner.'" data-toggle="tooltip" data-html="true"></div>
	    		';
			}
		};
	}
	
	// Закрываем соединение с базой
	$result->close();
	$mysqli->close();
?>
