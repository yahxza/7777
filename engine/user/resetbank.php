<?
	session_start();
	if(empty($_SESSION['account_id']) || $_SESSION['account_logged'] != 'try')
	{		
		echo "<p>Ошибка! У вас нет доступа!</p>";
	}
	else
	{
			// Подключение к базе
			require_once('../core/connect.php');
			
			$name = $_SESSION['account_name'];
			$mysqli->set_charset("utf8");
			$sql = "SELECT `OOC` FROM `accounts` WHERE `NickName` = '{$name}'";
			$result = $mysqli->query($sql);

			if($result->num_rows == 1)
			{
			    $sql = "UPDATE `accounts` SET `OOC` = '0' WHERE `NickName` = '{$name}'";
				$mysqli->query($sql);
				$_SESSION['success'] = 3;
		        header("Location: /account");
			}
			else header("Location: /login");
			
			// Закрываем соединение с базой
			$result->close();
			$mysqli->close();
	}
?>