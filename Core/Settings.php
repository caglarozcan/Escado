<?Php
	defined('ROOT_PATH') OR exit('Kontrolsüz erişim yapılamaz.');
	
	/*
		Projenin server üzerinde barındırıldığı kök klasör.
	*/
	define('BASE_DIR', ROOT_PATH);

	/*
		Kullanıcının proje geliştirildiği uygulama klasörü.
	*/
	define('APP_DIR', BASE_DIR.'/Application');

	/*
		Escado framework çekirdeğinin bulunduğu sistem klasörü.
	*/
	define('SYS_DIR', BASE_DIR.'/Core');

	/*
		Controller dizini.
	*/
	define('CONTROLLER_DIR', APP_DIR.'/Controllers');

	/*
		View dizini.
	*/
	define('VIEW_DIR', APP_DIR.'/Views');


	/**
	 * 	Uygulama için ön tanımlı sistem hataları.
	 */
	define('ERROR_MESSAGES', array(
		'ControllerNotFound' => 'Controller bulunamadı!',
		'ViewNotFound' => 'View bulunamadı.',
		'RequiredRedirectAddress' => 'Yönlendirme adresi gerekli.',
		'RequiredRedirectAction' => 'Yönlendirme için aksiyon gerekli.',
		'RouteNotFound' => 'Geçersiz yönlendirme.',
		'JsonArrayRequired' => 'Json türünde dönüş yapmak için array/dizi gönderilmeli.',
		'ModalNotFound' => 'Model dosyası bulunamadı.',
		'LibraryNotFound' => 'Yüklenmek istenen kütüphane dosyası bulunamadı.'
	));

?>