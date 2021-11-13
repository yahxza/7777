<?
	session_start();
	if(empty($_SESSION['account_id']) || $_SESSION['account_logged'] != 'try')
	{		
		echo "<p>Ошибка! У вас нет доступа!</p>";
	}
	else
	{
		if($_POST['captcha'] == $_SESSION['rand_code'])
	    {
			// Подключение к базе
			require_once('../core/connect.php');
			
			// Запрос аккаунта
			$oldpass = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['oldpass']))));
			$newpass = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['newpass']))));
			$confirmpass = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['confirmpass']))));
			$name = $_SESSION['account_name'];
			$mysqli->set_charset("utf8");
			$sql = "SELECT `Password` FROM `accounts` WHERE `NickName` = '{$name}'";
			$result = $mysqli->query($sql);

			if($result->num_rows == 1)
			{
				$result->data_seek(0);
				$account = $result->fetch_assoc();
				$dbpassword = $account['Password'];
				$holdpass = $oldpass;
				if($holdpass == $dbpassword)
				{
				    if($newpass == $confirmpass)
					{
					    $sql = "UPDATE `accounts` SET `Password` = '{$newpass}' WHERE `NickName` = '{$name}'";
					    $mysqli->query($sql);
						$_SESSION['success'] = 1;
		                header("Location: /account");
					}
					else 
					{
						$_SESSION['error'] = 2;
						header("Location: /changepass");
					}
				}
				else 
				{
				    $_SESSION['error'] = 1;
     				header("Location: /changepass");
			    }
			}
			else header("Location: /login");
			
			// Закрываем соединение с базой
			$result->close();
			$mysqli->close();
		}
		else
        {
			$_SESSION['error'] = 3;
		    header("Location: /changepass"); 
		}
	}
?>