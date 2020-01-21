<?Php
	defined('ROOT_PATH') OR exit('Kontrolsüz erişim yapılamaz.');
	/*
		Framework çekirdek kod dosyalarının include edilmesi.
	*/
	require __DIR__.'/Settings.php';
	require APP_DIR.'/Settings/AppSetting.php';
	require __DIR__.'/ErrorHandler.php';
	require __DIR__.'/Route.php';
	require __DIR__.'/Library/Database.php';
	require __DIR__.'/IController.php';
	require __DIR__.'/IModal.php';
	require __DIR__.'/Loader.php';
	require __DIR__.'/Core.php';
	
	
?>