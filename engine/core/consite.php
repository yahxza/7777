<?
	// Подключаем настройки
	require_once('config/configsite.php');
	
	$mysqli = @new mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASS, Config::DB_NAME);
	if (mysqli_connect_errno())
	{
		echo "Подключение к базе невозможно!";
		$mysqli->close();
	}
?>