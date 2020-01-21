<?Php
	defined('ROOT_PATH') OR exit('Kontrolsüz erişim yapılamaz.');
	
	class DB_Ulkeler extends IModal{

		public function tumUlkeler(){
			return $this->getAll('ulkeler');
		}

	}

?>