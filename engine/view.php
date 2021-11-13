<?
	// Подключение к базе
	require_once('core/consite.php');
	
	// Запрос количества новостей
	$mysqli->set_charset("utf8");

	$id = $_GET['new'];
	
	
	// Запрос новостей
	$sql = "SELECT * FROM `site_news` WHERE `id` = {$id}";
	$result = $mysqli->query($sql);
	$rows = $result->num_rows;
	if($rows == 0) header("Location: /news");
	else
	{		
		$result->data_seek($id-1);
		$news = $result->fetch_assoc();	
		$date = $news['date'];
		$text = $news['text'];
		$ntitle = $news['title'];
		$result->close();
	}
	// Закрываем соединение с базой
	$mysqli->close();
?>	