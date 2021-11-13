<?

	// Подключение к базе
	require_once('engine/core/connect.php');
	
	// Запрос
	$id = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_SESSION['account_id']))));

	if(empty($_SESSION['account_id']) || $_SESSION['account_logged'] != 'try')
	{		
		echo "<p>Ошибка! У вас нет доступа!</p>";
	}
	else
	{		
		// Запрос аккаунта
		$mysqli->set_charset("utf8");
		$sql = "SELECT * FROM `accounts` WHERE `ID` = {$id}";
		$result = $mysqli->query($sql);
		if($result->num_rows == '0')
		{
			unset($_SESSION['account_name']);
		    unset($_SESSION['account_id']);
		    unset($_SESSION['account_logged']);
		    unset($_SESSION['admin']);
		    session_destroy();
    		header("Location: /");
        }
		else
		{	
			$result->data_seek(0);
			$account = $result->fetch_assoc();
			$result->close();
			
			// Обработка данных аккаунта
			if($account['Online_status'] != 0) $status = 'В игре';
			else $status = 'Отключен';
			$name = preg_replace('/_/i', ' ', $account['NickName']);
			
		    switch($account['VIP'])
			{
			    case 0: 
				{
					$VIP = "Нет";
					break;
				}
				case 1: 
				{
					$VIP = "Bronze";
					break;
				}
				case 2:
				{
					$VIP = "Gold";
					break;
				}
				case 3: 
				{
					$VIP = "Platinum";
					break;
				}
				case 4: 
				{
					$VIP = "Diamond";
					break;
				}
				case 5: 
				{
					$VIP = "Titan";
					break;
				}
			}
			switch($account['Job'])
	        {
	            case 1: $job = "Водитель автобуса"; break;
	            case 2: $job = "Детектив"; break;
	            case 3: $job = "Развозчик продуктов"; break;
	            case 4: $job = "Механик"; break;
	            case 5: $job = "Таксист"; break;
        	    case 6: $job = "Адвокат"; break;
	            case 7: $job = "Фермер"; break;
	            case 8: $job = "Крупье"; break;
	            case 9: $job = "Инкассатор"; break;
	            case 10: $job = "Наркодиллер"; break;
	            case 11: $job = "Дальнобойщик"; break;
	            case 12: $job = "Развозчик пиццы"; break;
	            case 13: $job = "Развозчик металлолома"; break;
	            case 14: $job = "Мусорщик"; break;
	            case 15: $job = "Грузчик"; break;
	            case 16: $job = "Работник Налоговой"; break;
	            case 17: $job = "Начинающий фермер"; break;
	            case 18: $job = "Тракторист"; break;
	            case 19: $job = "Комбайнер"; break;
	            case 20: $job = "Водитель кукурузника"; break;
	            case 21: $job = "Строитель"; break;
	            default: $job = "Безработный"; break;
	        }
			switch($account['Member'])
			{
	            case 1: $member = "Полиция ЛС"; break;
	            case 2: $member = "RCPD"; break;
	            case 3: $member = "FBI"; break;
	            case 4: $member = "Полиция СФ"; break;
	            case 5: $member = "Больница LS"; break;
        	    case 6: $member = "Правительство"; break;
	            case 7: $member = "Армия LV"; break;
	            case 8: $member = "Больница SF"; break;
	            case 9: $member = "Лицензеры"; break;
	            case 10: $member = "Radio LS"; break;
	            case 11: $member = "Grove"; break;
	            case 12: $member = "Vagos"; break;
	            case 13: $member = "Ballas"; break;
	            case 14: $member = "Aztecas"; break;
	            case 15: $member = "Rifa"; break;
	            case 16: $member = "Russian Mafia"; break;
	            case 17: $member = "Yakuza"; break;
	            case 18: $member = "La Cosa Nostra"; break;
	            case 19: $member = "Warlock MC"; break;
	            case 20: $member = "Армия LS"; break;
	            case 21: $member = "Центральный Банк"; break;
				case 22: $member = "Больница LV"; break;
				case 23: $member = "Полиция LV"; break;
				case 24: $member = "Radio LV"; break;
				case 25: $member = "Night Wolfs"; break;
				case 26: $member = "Radio SF"; break;
				case 27: $member = "Армия SF"; break;
	            default: $member = "Не имеется"; break;
	        }
			///////////////////////
			if($account['Lotto'] == 1) $out = '<img src="public/images/design/plus.svg" alt="">';
			else $out = '<img src="public/images/design/minus.svg" alt="">';
			
			if($account['FeFinder'] == 1) $shumaxer = '<img src="public/images/design/plus.svg" alt="">';
			else $shumaxer = '<img src="public/images/design/minus.svg" alt="">';
			
			if($account['Pack'] == 1) $xalyav = '<img src="public/images/design/plus.svg" alt="">';
			else $xalyav = '<img src="public/images/design/minus.svg" alt="">';
			
			if($account['More'] == 1) $businesman = '<img src="public/images/design/plus.svg" alt="">';
			else $businesman = '<img src="public/images/design/minus.svg" alt="">';
			
			//////////////////////
			if($account['BoxingStyle'] == 1) $boxing = '<span class="study">Изучен</span>';
			else $boxing = '<span class="study no">Не изучен</span>';
			
			if($account['KungfuStyle'] == 1) $kungfu = '<span class="study">Изучен</span>';
			else $kungfu = '<span class="study no">Не изучен</span>';
			
			if($account['KneeheadStyle'] == 1) $kneehead = '<span class="study">Изучен</span>';
			else $kneehead = '<span class="study no">Не изучен</span>';
			
			if($account['ElbowStyle'] == 1) $elbow = '<span class="study">Изучен</span>';
			else $elbow = '<span class="study no">Не изучен</span>';
			///////////////////////
			switch($_SESSION['server'])
			{
				case 1: $playingserver = $nameserver1; break;
				case 2: $playingserver = $nameserver2; break;
				case 3: $playingserver = $nameserver3; break;
				case 4: $playingserver = $nameserver4; break;
				case 5: $playingserver = $nameserver5; break;
				case 6: $playingserver = $nameserver6; break;
				case 7: $playingserver = $nameserver7; break;
				case 8: $playingserver = $nameserver8; break;
				case 9: $playingserver = $nameserver9; break;
				default: $playingserver = 'Ошибка!'; break;
			}
		}
    }
	// Закрываем соединение с базой
	$mysqli->close();
		
?>