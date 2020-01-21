<?Php
	class DBQueryBuilder{
		
		private $sql = '';
		private $select = '';
		private $colums = [];
		private $table = '';
		private $lm = 0;
		private $ofs = 0;
		private $is_select = FALSE;
		

		public function get($table){
			if($this->isNullOrEmpty($table))
				throw new Exception('tablo ismi gerekli');

			$this->table = $table;

			return $this;
		}

		public function limit($lm){
			$this->lm = $lm;
			
			return $this;
		}

		public function offset($ofs){
			$this->ofs = $ofs;

			return $this;
		}

		public function buildSelect(){
			$this->sql = 'SELECT ';
			
			if(count($this->colums) == 0)
				$this->sql .= '* ';

			$this->sql .= 'FROM '.$this->table;

			if($this->lm > 0)
				$this->sql .= ' LIMIT('.$this->lm;

			if($this->ofs > 0)
				$this->sql .= ', '.$this->ofs.')';
			else
				$this->sql .= ')';

			return $this->sql;
		}

		public function getSql(){
			return $this->sql;
		}

		private function isNullOrEmpty($text){
			return is_null($text) || empty($text);
		}
	}
?>