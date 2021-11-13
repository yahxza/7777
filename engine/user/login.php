<?
	session_start();
	if($_POST['captcha'] == $_SESSION['rand_code'])
	{	
			$_SESSION['server'] = $_POST['server'];
			require_once('../core/connect.php');
			$password = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['password']))));
			$name = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['username']))));
			$key = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['code']))));
			
			$mysqli->set_charset("utf-8");
			$sql = "SELECT `Password`, `ID`, `Key` FROM `accounts` WHERE `NickName` = '{$name}'";
			$result = $mysqli->query($sql);

			if($result->num_rows == 1)
			{	
				$result->data_seek(0);
				$account = $result->fetch_assoc();
				$dbpassword = $account['Password'];
				$dbkey = $account['Key'];
				$id = $account['ID'];
				if($password == $dbpassword)
				{			
					if($dbkey > 0)
					{
					    if($dbkey == $key)
						{
						    $_SESSION['account_name'] = $name;
					        $_SESSION['account_id'] = $id;
					        $_SESSION['account_logged'] = 'try';
						    header("Location: /account");
						}
						else 
						{
	                        $_SESSION['error'] = 3;				
    						header("Location: /login");
					    }
					}
					else
					{
					    $_SESSION['account_name'] = $name;
					    $_SESSION['account_id'] = $id;
					    $_SESSION['account_logged'] = 'try';
						header("Location: /account");
					}
				    
				}
				else 
				{
				    $_SESSION['error'] = 2;
    				header("Location: /login");
			    }
			}
			else
			{
			    $_SESSION['error'] = 1;
   				header("Location: /login");
		    }
			$result->close();
			$mysqli->close();
	}
	else
	{
		$_SESSION['error'] = 4;
   		header("Location: /login");
	}
?>