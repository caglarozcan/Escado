<?Php
	defined('ROOT_PATH') OR exit('Kontrolsüz erişim yapılamaz.');
	
	class Core{

		private $controllerName = '';
		private $actionName = '';
		private $params = array();
		private $parsedUrl = array();
		private $routeHandler;

		public function __construct(){
			$this->routeHandler = new Route();
			
		}

		public function run($url, $callback, $method='get'){
			$requestUri = Route::parseURL();
			
			if(preg_match('#^'.$url.'$#', $requestUri, $parameters)){
				unset($parameters[0]);
				
				if(is_callable($callback)){
					call_user_func_array($callback, $parameters);
				}else{
					$proc = explode('/', $callback);
					$controllerFile = CONTROLLER_DIR.'/'.ucfirst(strtolower($proc[0])).'Controller.php';
					
					if(file_exists($controllerFile)){
						require $controllerFile;
						$proc[0] .= 'Controller';
						call_user_func_array([new $proc[0], $proc[1]], $parameters);
					}else{
						throw new Exception($controller.' | '.ERROR_MESSAGES['ControllerNotFound']);
					}
				}
			}
		}

		public function handleRequest(){
			$requestUri = $this->routeHandler->requestUri;
			
			$route = $this->routeHandler->getRoute();

			if(!is_null($route)){
				$controller = ucfirst(strtolower($route['controller'])).'Controller';
				$action =  ucfirst(strtolower($route['action']));
				$parameters = $route['params'];

				$controllerFile = CONTROLLER_DIR.'/'.$controller.'.php';

				if(file_exists($controllerFile)){
					require $controllerFile;
					call_user_func_array([new $controller, $action], $parameters);
				}else{
					die(new ErrorHandler('ControllerNotFound', $route['controller']));
					//throw new Exception($controller.' | '.ERROR_MESSAGES['ControllerNotFound']);
				}
			}else{
				die(new ErrorHandler('RouteNotFound', $route['controller']));
			}
		}
	}
?>