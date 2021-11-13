<?  
    session_start();
    
    define('Airzona', true);

    // Подключаем движок
    require_once 'engine/core/main.php';
	
	// Подключаем основу страницы
    require_once 'public/pages/index.php';
?>