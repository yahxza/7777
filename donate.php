<?
	$server = stripslashes(htmlspecialchars(trim($_POST['server'])));

	if($server < 1)
	{
		echo json_encode(array('status' => 'error', 'type' => 'invalidserver'));
		return false;
	}

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
		default:  header("Location: /error");
	}
	$mysqli = @new mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASS, Config::DB_NAME);

	$name = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['name']))));
	$sum = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['sum']))));

	if($sum < 1)
	{
		echo json_encode(array('status' => 'error', 'type' => 'invalidsum'));
		return false;
	}

	$sql = "SELECT * FROM `accounts` WHERE `NickName` = '{$name}'";
	$result = $mysqli->query($sql);

	$rows = $result->num_rows;

	if($rows == 1)
	{
		$result->data_seek(0);
		$account = $result->fetch_assoc();


		if($account['Online_status'] != 0)
		{
			echo json_encode(array('status' => 'error', 'type' => 'online'));
			return false;
		}



		$merchant_id = '154540';
        $secret_word = '';
        $order_id = rand(1000, 9999999);
        $sign = md5($merchant_id.':'.$sum.':'.$secret_word.':'.$order_id);

        $url = 'http://www.free-kassa.ru/merchant/cash.php?m='.$merchant_id.'&oa='.$sum.'&o='.$order_id.'&s='.$sign.'&us_name='.$name.'&us_server='.$server.'';

        echo json_encode(array('status' => 'success', 'url' => $url));
	}
	else
	{
		echo json_encode(array('status' => 'error', 'type' => 'noaccount'));
	}

?>