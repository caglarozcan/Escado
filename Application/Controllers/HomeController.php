<?Php
    defined('ROOT_PATH') OR exit('Kontrolsüz erişim yapılamaz.');

    class HomeController extends IController{

        public function __construct(){
            parent::__construct();
        }

        public function Index(){
            $this->load->library('Kutuphane')->hello();
            
            $data['title'] = 'Anasayfa';
            $data['veri'] = $this->load->modal('DB_Ulkeler')->tumUlkeler();

            $this->view($data);
        }
    }
?>