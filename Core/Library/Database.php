<?Php
	class Database{

		private $db;
		private $query;

		public function __construct(){
			global $settings;
			$setting = $settings['DATABASE'];

			try{
				$this->db = new PDO('mysql:hostname='.$setting['hostname'].'; dbname='.$setting['database'].'; charset='.$setting['char_set'].';', $setting['username'], $setting['password']);
			}catch(PDOException $e){
				die($e->getMessage());
			}

			
		}

		public function getAll($tableName, $where = null){
			$this->query = $this->db->prepare('SELECT * FROM '.$tableName);
			$this->query->execute();
			return $this->query->fetchAll();
		}

		public function __deconstruct(){
			unset($this->db);
		}
	}
?>