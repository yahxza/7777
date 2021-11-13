<?
    if(!defined("Airzona")) return require_once '../../public/pages/404norule.php';
?>
<?
if($_POST['search'] == 'true' && !empty($_POST['name']))
{
	if($_POST['captcha'] == $_SESSION['rand_code'])
	{
		$_SESSION['server'] = $_POST['server'];
		require_once('engine/core/connect.php');
		$name = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['name']))));
		$mysqli->set_charset("utf8");
		$sql = "SELECT * FROM `accounts` WHERE `NickName` = '{$name}'";
		$result = $mysqli->query($sql);
		if($result->num_rows == 0) $error = 1;
		else
		{
			$result->data_seek(0);
			$account = $result->fetch_assoc();
			$result->close();
			$nickname = preg_replace('/_/i', ' ', $account['NickName']);
			if($account['Online_status'] != 0) $status = 'В игре';
			else $status = 'Отключен';
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
       		$content .='
    <div class="profile-head">
        <div class="skin-wrap">
            <div class="stat-user">
                <div class="health u-stat">
                                        <p>Здоровье</p>
                    <div><span>'.$account['HP'].'</span><i style="width: '.$account['HP'].'%"></i></div>
                </div>
                <div class="golod u-stat">
                                          
                    <p>Голод</p>
                    <div><span>'.$account['Fullness'].'</span><i style="width: '.$account['Fullness'].'%"></i></div>
                </div>
            </div>
            <div class="skin-user"><img src="public/images/person.png" alt=""></div>
        </div>
        <div class="skin-info">
            <p class="b-title username">'.$nickname.'</p>

            <div class="stat-table">
                <div>
                    <p><small>ID</small></p>
                    <p>'.$account['ID'].'</p>
                </div>
                <div>
                    <p><small>E-mail</small></p>
                    <p>
                        ***                    </p>
                </div>
                <div>
                    <p><small>Уровень VIP</small></p>
                    <p>'.$VIP.'</p>
                </div>
                <div>
                    <p><small>Уровень в игре</small></p>
                    <p>'.$account['Level'].'</p>
                </div>
                <div>
                    <p><small>Наличные</small></p>
                    <p>'.$account['Money'].'$</p>
                </div>
                <div>
                    <p><small>Накопления</small></p>
                    <p>'.$account['Bank'].'$</p>
                </div>
                <div>
                    <p><small>AZ монеты</small></p>
                    <p>'.$account['VirMoney'].'</p>
                </div>
                <div>
                    <p><small>Состояние депозита</small></p>
                    <p>0$</p>
                </div>
                <div>
                    <p><small>Статус аккаунта</small></p>
                    <p>'.$status.'</p>
                </div>
                <div>
                    <p><small>Работа</small></p>
                    <p>'.$job.'</p>
                </div>
                <div>
                    <p><small>Организация</small></p>
                    <p>'.$member.'</p>
                </div>
                <div>
                    <p><small>Ранг</small></p>
                    <p>'.$account['Rank'].'</p>
                </div>
            </div>
        </div>
    </div>';
		}
		$mysqli->close();
	}
	else $error = 2;
}
?>
	    </div>
    </div>
</div>
<div id="content">
    <div class="container">
        <p class="b-title">Поиск игроков</p>

        
        <div style="width:400px;margin:0 auto;margin-bottom:20px">

            <form id="find-form" action="search" method="post" role="form">
<input type="hidden" name="_csrf" value="em5POThpV3Q.BiZTSDsnHwsrdkl.AhQbEz8iVUkgGw0jO3lXTSdgQA==">

                <div class="form-group field-formsearch-name required"> 
				<? if($error == 1) echo '<div class="form-group field-formsearch-name required has-error">';?>
<label class="control-label" for="formsearch-name">Ник</label>
<input type="text" id="formsearch-name" class="main-inp w-100" name="name">
<p class="help-block help-block-error"><? if($error == 1) echo 'Данный игрок не найден';?></p>
</div>                <div class="form-group field-formsearch-server required">
<label class="control-label" for="formsearch-server">Сервер</label>
<select id="formsearch-server" class="main-inp main-select w-100" name="server">
<option value="0">Выберите сервер..</option>
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
	    echo '<option value='.$x.'>'.$servername.' RolePlay '.$now.'</option>';
	}
?>
</select>
<p class="help-block help-block-error"></p>
</div>           
       

	   <div class="form-group field-formsearch-captcha required">
	   <? if($error == 2) echo '<div class="form-group field-formsearch-name required has-error">';?>
<label class="control-label" for="formsearch-captcha">Проверочный код</label>
<div class="row"><div class="col-md-5"><img id="formsearch-captcha-image" src="public/captcha/captcha.php" alt=""></div><div class="col-md-7"><input type="text" id="" class="main-inp w-100" name="captcha" placeholder="Проверочный код"></div></div>
<p class="help-block help-block-error"><? if($error == 2) echo 'Неправильный проверочный код';?></p>
        </div>     
    
             

			 <button type="submit" class="big-but w-100" name="search" value="true">Найти</button>

            </form>              </div>
    </div>
</div>
<?
    if(!empty($content))
		echo $content;
?>