<?
	session_start();
	
	if($_SESSION['account_logged'] == 'try')
	{		
		unset($_SESSION['account_name']);
		unset($_SESSION['account_id']);
		unset($_SESSION['account_logged']);
		unset($_SESSION['admin']);
		session_destroy();
		header("Location: /");
	}
	else header("Location: /login");
?>