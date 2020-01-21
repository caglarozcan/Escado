<?Php
	defined('ROOT_PATH') OR exit('Kontrolsüz erişim yapılamaz.');

	class Loader{

		public function modal($modal){
			$modalPath = APP_DIR.'/Modals/'.$modal.'.php';

			if(file_exists($modalPath)){
				require $modalPath;
				return new $modal;
			}else{
				die(new ErrorHandler('ModalNotFound', $modal));
			}

			return null;
		}

		public function library($lib){
			$libPath = APP_DIR.'/Library/'.$lib.'.php';

			if(file_exists($libPath)){
				require $libPath;
				return new $lib;
			}else{
				die(new ErrorHandler('LibraryNotFound', $modal));
			}

			return null;
		}

	}
?>