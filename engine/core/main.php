<?
    if(!defined("Airzona")) return require_once '../../public/pages/404norule.php';
?>
<?
    $servername = 'Airzona';
	// Кол-во серверов
	$servermon = 1;

	$nameserver1 = 'BonusLand';
	$ipserver1 = '176.32.39.176:7777';
	$nameserver2 = 'Gold';
	$ipserver2 = '217.106.106.116:7092';
	$nameserver3 = 'Scottdale';
	$ipserver3 = '185.169.134.43:7777';
	$nameserver4 = 'Chandler';
	$ipserver4 = '185.169.134.44:7777';
	$nameserver5 = 'Brainburg';
	$ipserver5 = '185.169.134.45:7777';
	$nameserver6 = 'Saint Rose';
	$ipserver6 = '185.169.134.5:7777';
	$nameserver7 = 'Mesa';
	$ipserver7 = '185.169.134.59:7777';
	$nameserver8 = 'Red-Rock';
	$ipserver8 = '185.169.134.61:7777';
	$nameserver9 = '';
	$ipserver9 = '';

	$action = stripslashes(htmlspecialchars(trim($_GET['action'])));

	$url = explode('/', $action);

	for($x = 1; $x-1 < $servermon; $x++)
    {
       if($url[0] == 'map'.$x.'')
       {

            $background = 'headershort';
            $title = 'Карта штата | '.$servername.' Role Play';
            $_SESSION['server'] = $x;
            require_once('connect.php');
            require_once('engine/map.php');
            $page = 'public/pages/map.php';
            $script = '
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="public\js\map.js"></script>';
            $css = '<link href="\public\css\style.min.css" rel="stylesheet">';
            return false;
        }
    }
	if(empty($url[0]))
	{
		$title = 'Главная | '.$servername.' Role Play';
		$page = 'public/pages/main.php';
		$background = 'header';
		$script = "<script>if(location.hash == '#mon') {jQuery('html').animate({scrollTop:jQuery('#monitoring-title').offset().top},3);}</script>";
		require_once('engine/hnews.php');
	}
	else if($url[0] == "account" || $url[0] == "login")
	{
		if(empty($_SESSION['account_id']) || $_SESSION['account_logged'] != 'try')
		{
			$title = 'Логин | '.$servername.' Role Play';
			$page = 'public/pages/user/login.php';
			$background = 'header';
		    $background1 = 'login';
			$script = '
<script src="assets/d996e368/yii.js"></script>
<script src="assets/d996e368/yii.validation.js"></script>
<script src="assets/d996e368/yii.captcha.js"></script>
<script src="assets/d996e368/yii.activeForm.js"></script>
<script src="public\js\login.js"></script>';
		}
		else
		{
            require_once('engine/user/account.php');
			$title = 'Профиль | '.$name.'';
			$page = 'public/pages/user/account.php';
			$background = 'headershort';
		}
	}
	else
	{
		switch ($url[0])
		{
		    case 'search':
			{
				if(!empty($_SESSION['account_id']) && $_SESSION['account_logged'] == 'try')
		        {
				    $title = 'Поиск игроков | '.$servername.' Role Play';
				    $page = 'public/pages/search.php';
				    $background = 'headershort';
				    $script = '
<script src="assets/d996e368/yii.js"></script>
<script src="assets/d996e368/yii.validation.js"></script>
<script src="assets/d996e368/yii.captcha.js"></script>
<script src="assets/d996e368/yii.activeForm.js"></script>
<script src="public\js\search.js"></script>';
				}
				else header("Location: /login");
				break;
			}
            case 'addnew':
			{
				if(!empty($_SESSION['account_id']) && $_SESSION['account_logged'] == 'try' && $_SESSION['admin'] == 'true')
		        {
					$title = 'Создание новости | '.$servername.' Role Play';
				    $page = 'public/pages/addnew.php';
				    $background = 'headershort';
				}
				else header("Location: /");
				break;
			}
            case 'logs':
			{
				if(!empty($_SESSION['account_id']) && $_SESSION['account_logged'] == 'try' && $_SESSION['admin'] == 'true')
		        {
					$title = 'Логи сервера | '.$servername.' Role Play';
				    $page = 'public/pages/logs.php';
				    $background = 'headershort';
				}
				else header("Location: /");
				break;
			}
			case 'donatelog':
			{
				if(!empty($_SESSION['account_id']) && $_SESSION['account_logged'] == 'try' && $_SESSION['admin'] == 'true')
		        {
		        	require_once('engine/donatelog.php');
					$title = 'Лог доната | '.$servername.' Role Play';
				    $page = 'public/pages/donatelog.php';
				    $background = 'headershort';
				}
				else header("Location: /");
				break;
			}
			case 'restore':
			{
				$title = 'Восстановление доступа | '.$servername.' Role Play';
				$page = 'public/pages/user/restore.php';
				$background = 'headershort';
				$script = '
<script src="assets/d996e368/yii.js"></script>
<script src="assets/d996e368/yii.validation.js"></script>
<script src="assets/d996e368/yii.activeForm.js"></script>
<script src="public\js\restore.js"></script>';
				break;
			}
			case 'howtostart':
			{
				$title = 'Как начать игру | '.$servername.' Role Play';
				$page = 'public/pages/howtostart.php';
				$background = 'header';
				break;
			}
			case 'news':
		    {
			    $title = 'Новости | '.$servername.' Role Play';
				require_once('engine/news.php');
				$background = 'headershort';
				$page = 'public/pages/news.php';
				break;
			}
			case 'view':
		    {
				require_once('engine/view.php');
				$title = ''.$ntitle.' | '.$servername.' Role Play';
				$background = 'headershort';
				$page = 'public/pages/view.php';
				break;
			}
			case 'maps':
			{
				$title = 'Карты штатов | '.$servername.' Role Play';
				$page = 'public/pages/maps.php';
				$background = 'headershort';
				break;
			}
			case 'changepass':
			{
				if(!empty($_SESSION['account_id']) && $_SESSION['account_logged'] == 'try')
		        {
			        $title = 'Смена пароля | '.$servername.' Role Play';
				    $page = 'public/pages/user/changepass.php';
				    $background = 'header';
		            $background1 = 'login';
					$script = '
<script src="assets/d996e368/yii.js"></script>
<script src="assets/d996e368/yii.validation.js"></script>
<script src="assets/d996e368/yii.captcha.js"></script>
<script src="assets/d996e368/yii.activeForm.js"></script>
<script src="public\js\pass.js"></script>';
			    }
				else header("Location: /login");
				break;
			}
			case 'changecode':
			{
				if(!empty($_SESSION['account_id']) && $_SESSION['account_logged'] == 'try')
		        {
			        $title = 'Смена секретного кода | '.$servername.' Role Play';
				    $page = 'public/pages/user/changecode.php';
				    $background = 'header';
		            $background1 = 'login';
					$script = '
<script src="assets/d996e368/yii.js"></script>
<script src="assets/d996e368/yii.validation.js"></script>
<script src="assets/d996e368/yii.captcha.js"></script>
<script src="assets/d996e368/yii.activeForm.js"></script>
<script src="public\js\code.js"></script>';
			    }
				else header("Location: /login");
				break;
			}
			case 'auction':
			{
				$title = 'Аукционы | '.$servername.' Role Play';
				$page = 'public/pages/auction.php';
				$background = 'headershort';
				$background1 = 'shop';
				break;
			}
            case 'donate':
            {
			    $title = 'Магазин | '.$servername.' Role Play';
				$page = 'public/pages/donate.php';
				$background = 'headershort';
				$background1 = 'shop';
				$script = '
<script src="assets/d996e368/yii.js"></script>
<script src="assets/d996e368/yii.validation.js"></script>
<script src="assets/d996e368/yii.captcha.js"></script>
<script src="assets/d996e368/yii.activeForm.js"></script>';
				break;
			}
            case 'error':
			{
				$title = 'Unknown Property';
				$page = 'public/pages/error.php';
				$background = 'headershort';
				$background1 = 'shop';
				break;
			}
			default:
			{
                $title = 'Ошибка #404';
				$background = 'headershort';
				$background1 = 'shop';
				$page = 'public/pages/404.php';
			}
		}
	}
?>
