<?
	// Подключаем настройки
    if($_SESSION['server'] > $servermon) header("Location: /error");
	switch($_SESSION['server'])
	{
	    case 1: require_once('config/config1.php'); break;
		case 2: require_once('config/config2.php'); break;
		case 3: require_once('config/config3.php'); break;
		case 4: require_once('config/config4.php'); break;
		case 5: require_once('config/config5.php'); break;
		case 6: require_once('config/config6.php'); break;
		case 7: require_once('config/config7.php'); break;
		case 8: require_once('config/config8.php'); break;
		case 9: require_once('config/config9.php'); break;
		default:  header("Location: /error");
	}
	$mysqli = @new mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASS, Config::DB_NAME);
	if (mysqli_connect_errno())
	{
		header("Location: /error");
		$mysqli->close();
	}
?>