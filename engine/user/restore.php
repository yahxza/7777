<?		
    session_start();
	if($_POST['captcha'] == $_SESSION['rand_code'])
	{
		$_SESSION['server'] = $_POST['server'];
	    // Подключение к базе
    	require_once('../core/connect.php');
    	$email = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['email']))));
    	// Запрос аккаунта
    	$mysqli->set_charset("utf8");
	    $sql = "SELECT * FROM `accounts` WHERE `Mail` = '{$email}'";
	    $result = $mysqli->query($sql);

	    if($result->num_rows == 1)
	    {
	    	$result->data_seek(0);
	    	$account = $result->fetch_assoc();
	    	$_SESSION['email'] = $email;
		
	    	$chars = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
	    	$lenght = 20;
	    	$acode = null;
	    	while($lenght--)
	    	{
	    		$acode.=$chars[rand(0,strlen($chars)-1)];
	    	}
	    	
	    	if($_POST['type'] == 0)
	    	{	
	    		$newpassword = mt_rand(1000000, mt_getrandmax());
	    		$_SESSION['pass'] = $newpassword;
	    	    $_SESSION['restore'] = 'pass';
	    	    $_SESSION['acode'] = $acode;
	    		$_SESSION['passformail'] = $newpassword;
		    	$_SESSION['success'] = 1;
			
	    		$from = "admin@airzona-rp.ru";
	    		$topic = "Восстановление доступа к игровому аккаунту";
	    		$message .= "<html><body>";
	    		$message .= "Ссылка: ";
	    		$message .= '<a href="//airzona-rp.ru/restore?token='.$acode.'">Подтвердить</a>';
	    		$message .= "</body></html>";
	    		$headers = "From: ".$from."\r\nReply-To: ".$from."\r\n";
	    		$headers .= "MIME-Version: 1.0\r\n";
	    		$headers .= "Content-Type: text/html; charset=utf-8;";
	    		$mbody .= $message."\r\n\r\n";
	    		mail($email, $topic, $mbody, $headers);
	    		
			
	    		header("Location: /restore");
    		}
    		else if($_POST['type'] == 1)
	    	{
	    	    $newcode = mt_rand(10000, 9999999);
	    		$_SESSION['code'] = $newcode;
	    	    $_SESSION['restore'] = 'code';
	    		$_SESSION['acode'] = $acode;
	    		$_SESSION['success'] = 1;
			
	    		$from = "admin@airzona-rp.ru";
	    		$topic = "Восстановление доступа к игровому аккаунту";
	    		$message .= "<html><body>";
	    		$message = "Ссылка: ";
	    		$message .= '<a href="//airzona-rp.ru/restore?token='.$acode.'">Подтвердить</a>';
	    		$message .= "</body></html>";
    			$headers = "From: ".$from."\r\nReply-To: ".$from."\r\n";
	    		$headers .= "MIME-Version: 1.0\r\n";
	    		$headers .= "Content-Type: text/html; charset=utf-8;";
	    		$mbody .= $message."\r\n\r\n";
	    		mail($email, $topic, $mbody, $headers);
			
	    		header("Location: /restore");
	    	}
    		$result->close();
	    }
    	else 
    	{
    		header("Location: /restore");
	    	$_SESSION['error'] = 1;
    	}
    	$mysqli->close();
	}
	else
	{
		header("Location: /restore");
		$_SESSION['error'] = 2;
	}
?>