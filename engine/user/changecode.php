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
			$oldcode = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['oldcode']))));
			$newcode = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['newcode']))));
			$confirmcode = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['confirmcode']))));
			$name = $_SESSION['account_name'];
			$mysqli->set_charset("utf8");
			$sql = "SELECT `Key` FROM `accounts` WHERE `NickName` = '{$name}'";
			$result = $mysqli->query($sql);

			if($result->num_rows == 1)
			{
				$result->data_seek(0);
				$account = $result->fetch_assoc();
				$dbcode = $account['Key'];
				if($oldcode == $dbcode)
				{
				    if($newcode == $confirmcode)
					{
					    $sql = "UPDATE `accounts` SET `Key` = '{$newcode}' WHERE `NickName` = '{$name}'";
					    $mysqli->query($sql);
						$_SESSION['success'] = 2;
		                header("Location: /account");
					}
					else 
					{
						$_SESSION['error'] = 2;
						header("Location: /changecode"); 
					}
				}
				else
				{
					$_SESSION['error'] = 1;
					header("Location: /changecode"); 
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
		    header("Location: /changecode"); 
		}			
	}
?>