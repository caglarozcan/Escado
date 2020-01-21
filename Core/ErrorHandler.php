<?Php
	defined('ROOT_PATH') OR exit('Kontrolsüz erişim yapılamaz.');
	
	class ErrorHandler {

		private $message;

		public function __construct($errorKey = null, $extMsg = null){

			$this->message = '<div style="width:95%; margin:20px auto; border:1px solid #f5c6cb; padding:18px; background:#f8d7da; color:#721c24; font-family:consolas; font-size:13px; border-radius:5px;"><b>Escado Hata!!</b> -> ';

			if(is_null($errorKey) || empty($errorKey) || !array_key_exists($errorKey, ERROR_MESSAGES)){
				$this->message .= 'Bilinmeyen bir hata oluştu.';
			}else{
				$this->message .= $extMsg.' '.ERROR_MESSAGES[$errorKey];
			}

			$this->message .= '</div>';
		}

		public function __toString() {
			return $this->message;
		}
	}
?>