<?Php
	defined('ROOT_PATH') OR exit('Kontrolsüz erişim yapılamaz.');
	
	class Routes{

		private $NUM;
		private $STR;
		public $routeTable;

		public function __construct(){
			$this->NUM = '([0-9]+)';
			$this->STR = '([A-Za-z_\-]+)';

			$this->routeTable = array(
				'default' => array(
					'url' => '/{controller}/{action}',
					'controller' => 'Home',
					'action' => 'Index',
					'rule' => null
				),
				'home' => array(
					'url' => '/anasayfa',
					'controller' => 'Home',
					'action' => 'Index',
					'rule' => null
				),
				'uyeler' => array(
					'url' => '/uyeler',
					'controller' => 'Uyeler',
					'action' => 'Index',
					'rule' => null
				),
				'uyeEkle' => array(
					'url' => '/uyeler/uye-ekle/{id}',
					'controller' => 'Uyeler',
					'action' => 'Insert',
					'rule' => array(
						'{id}' => $this->NUM
					)
				),
				'test' => array(
					'url' => '/test/{id}/{isim}',
					'controller' => 'Test',
					'action' => 'Test',
					'rule' => array(
						'{id}' => $this->NUM,
						'{isim}' => $this->STR
					)
				)
			);
		}
	}
?>