<?
	session_start();
	


	$merchant_id = '154540';
    $merchant_secret = '';

    $sign = md5($merchant_id.':'.$_REQUEST['AMOUNT'].':'.$merchant_secret.':'.$_REQUEST['MERCHANT_ORDER_ID']);

    if($sign != $_REQUEST['SIGN']) {
		die('wrong sign');
    }

	$sum = $_REQUEST["AMOUNT"];
	$name = $_REQUEST["us_name"];
	$server = $_REQUEST["us_server"];




	switch($server)
	{
	    case 1: require_once('engine/core/config/config1.php'); break;
		case 2: require_once('engine/core/config/config2.php'); break;
		case 3: require_once('engine/core/config/config3.php'); break;
		case 4: require_once('engine/core/config/config4.php'); break;
		case 5: require_once('engine/core/config/config5.php'); break;
		case 6: require_once('engine/core/config/config6.php'); break;
		case 7: require_once('engine/core/config/config7.php'); break;
		case 8: require_once('engine/core/config/config8.php'); break;
		case 9: require_once('engine/core/config/config9.php'); break;
		default:  return false;
	}
	$mysqli = @new mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASS, Config::DB_NAME);


	$sql = "UPDATE `accounts` SET `VirRouble` = VirRouble + '{$sum}' + '{$sum}' WHERE `NickName` = '{$name}'";
	$mysqli->query($sql);


    die('YES');
?>