<?Php
	defined('ROOT_PATH') OR exit('Kontrolsüz erişim yapılamaz.');
	
	class Route{

		public $requestUri;
		private $routeTable;
		private $userRoute;

		public function __construct(){
			require APP_DIR.'/Settings/Routes.php';
			$this->userRoute = new Routes();
			$this->routeTable = $this->userRoute->routeTable;
			$this->parseURL();
		}

		public function parseURL(){
			$dirname = dirname($_SERVER['SCRIPT_NAME']);
			$basename = basename($_SERVER['SCRIPT_NAME']);
			$uri = str_replace([$dirname, $basename], null, $_SERVER['REQUEST_URI']);
			$this->requestUri = $uri;
			return $uri;
		}

		public function getRoute(){
			$urle = '';
			if($this->requestUri == '/'){
				return array(
					'controller' => $this->routeTable['default']['controller'],
					'action' => $this->routeTable['default']['action'],
					'params' => array()
				);
			}else{
				foreach ($this->routeTable as $key => $value) {
					if(!is_null($value['rule'])){
						$rule = '#'.strtr($value['url'], $value['rule']).'#mis';
					}else{
						$rule = '#'.$value['url'].'#mis';
					}
	
					if(preg_match($rule, $this->requestUri, $params)){
						if(count($params) > 0)
							unset($params[0]);

						return array(
							'controller' => $value['controller'],
							'action' => $value['action'],
							'params' => (count($params) > 0) ? array_combine(str_replace(['{', '}'], '', array_keys($value['rule'])), $params) : array()
						);
					}
				}
			}

			if(preg_match('#/([A-Za-z0-9-_]+)/([A-Za-z0-9-_]+)/([0-9]+)#', $this->requestUri, $result)){ // -> /Makale/Edit/5 => /{controller}/{action}/{id}
				return array(
					'controller' => $result[1],
					'action' => $result[2],
					'params' => array('id' => $result[3])
				);
			}elseif(preg_match('#/([A-Za-z0-9-_]+)/([A-Za-z0-9-_]+)#', $this->requestUri, $result)){ // -> /Makale/Edit => /{controller}/{action}
				return array(
					'controller' => $result[1],
					'action' => $result[2],
					'params' => array()
				);
			}elseif(preg_match('#/([A-Za-z0-9-_]+)#', $this->requestUri, $result)){ // -> /Makale => /{controller}/Index
				return array(
					'controller' => $result[1],
					'action' => 'Index',
					'params' => array()
				);
			}
			
			return null;
		}
	}
?>