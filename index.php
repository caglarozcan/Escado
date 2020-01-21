<?Php
	define('ROOT_PATH', __DIR__);

	require __DIR__.'/Core/AutoLoad.php';
	
	$core = new Core();
	$core->handleRequest();

?>