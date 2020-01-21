<?Php
	defined('ROOT_PATH') OR exit('Kontrolsüz erişim yapılamaz.');
	
	class IController{

		private $controllerName = '';
		private $viewName = '';
		public $load;

		public function __construct(){
			$this->load = new Loader();
		}

		/**
		 *		İsteğin yapıldığı action'a ait view'ın yüklenmesi.
		 *		View yükleme işlemi dinamik olarak yapılır. İsteğin geldiği fonksiyonun ismi alınarak, controller ismindeki view klasörü içinde aranır.
		 *		$data parametresi ile view içerisine controller'dan veri taşıması yapılabilir.
		 */
		public function view($data = null){
			$this->controllerName = str_replace('Controller', '', debug_backtrace()[1]['class']);
			$this->viewName = debug_backtrace()[1]['function'];
			
			if(is_array($data))
				extract($data);

			$viewPath = VIEW_DIR.'/'.$this->controllerName.'/'.$this->viewName.'.php';

			if(file_exists($viewPath))
				require $viewPath;
			else
				die(new ErrorHandler('ViewNotFound', $this->viewName));
		}

		/**
		 *	Herhangi bir url'e yönlendirme yapmak için, url bilgisi parametre gönderilir.
		 */
		public function redirect($url){
			if(is_null($url) || empty($url))
				die(new ErrorHandler('RequiredRedirectAddress'));
			
			$url = ltrim($url, '/');

			header('location:/'.$url);
		}

		/**
		 *		Herhangi bir controller ve action'a yönlendirme yapılabilir.
		 *		Sadece action bilgisi gelirse, aktif controller içerisinde yönlendirme yapılır.
		 *		Controller bilgisi gelirse, Controller altındaki action tetiklenir.
		 */
		public function redirectToAction($action, $controller = null){
			if(is_null($action) || empty($action))
				throw new Exception(ERROR_MESSAGES['RequiredRedirectAction']);

			if(is_empty($controller) || empty($controller))
				$this->controllerName = str_replace('Controller', '', debug_backtrace()[1]['class']);
			
			header('location:/'.$this->controllerName.'/'.$action);
		}

		/**
		 *  	Controller içerisinden herhangi bir sonucu Json formatında RestAPI olarak çalışması için kullanılır.
		 */
		public function retJson($param = null){
			if(!is_array($param) || is_null($param) || empty($param))
				die(new ErrorHandler('JsonArrayRequired'));
			else
				return json_encode($param);
		}

		/**
		 * 		Controller içerisinden string veri döndürmeyi sağlar.
		 */
		public function retString($param = null){
			if(is_null($param) || empty($param) || is_array($param))
				return '';
			else
				return $param;
		}
	}
?>