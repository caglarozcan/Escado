<?Php
	defined('ROOT_PATH') OR exit('Kontrolsüz erişim yapılamaz.');
	
	class TestController extends IController{
		public function Test($id=null){
			$data['id'] = $id;
			$this->view($data);
		}
	}
?>