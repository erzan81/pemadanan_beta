<?php

if (!defined('BASEPATH'))
	die();

class Home extends CI_Controller {

	public function index() {

		function __construct() {
			parent::__construct();
			//$this->load->database('pblmig', true);
			
		}



		$this->load->view('admin/include/header');
		$this->load->view('admin/home');
		$this->load->view('admin/include/footer');
	}

	function coba_get_login(){
		$this->load->model('MSecman');

		$id = "TEST";
		$pass = "12345";


		//$test = $this->MSecman->get_login($id, $pass);
		$login = $this->MSecman->get_login($id, $pass);


		$a = $this->MSecman->get_user_by_id($id);

                $session_id = round(uniqid(rand(), TRUE))."".date("dmyhis");

                if(count($a)>0){
                    foreach($a as $key){
                            $user_id = $key->USER_ID;
                            $nama_user = $key->NAMA_USER;
                            $group = $key->ID_GROUP;
                            $photo_path = $key->PATH_FILE;
                    }

                    $usersession = array(
                                    'user_id'=> $user_id,
                                    'nama_user'=> $nama_user,
                                    'group'=> $group,
                                    'loginstate'=>1,
                                    'photo'=>$photo_path,
                                    'time'=> date('d-m-Y h:i:s'),
                                    'session_id' => $session_id
                                );
                    $this->session->set_userdata($usersession);
                    
                    //log login
                    $this->load->library('user_agent');
                    
                    $save['p_id_session'] = $session_id;
                    $save['p_user_id'] = $user_id;
                    $save['p_ipaddress'] = $this->input->ip_address();
                    $save['p_time_login'] = date('d-m-Y h:i:s');
                    $save['p_time_logout'] = null;
                }
                    //$this->MSecman->log_login($save);
                    echo "<pre>";
                    print_r($login->out_rowcount);
	}

	function get_user_agent(){

		$this->load->library('user_agent');

		if ($this->agent->is_browser()){
			$agent = $this->agent->browser().' '.$this->agent->version();
		}elseif ($this->agent->is_mobile()){
			$agent = $this->agent->mobile();
		}else{
			$agent = 'Data user gagal di dapatkan';
		}
 		$session_id = round(uniqid(rand(), TRUE));

		echo "Di akses dari :<br/>";
		echo "Browser = ". $agent . "<br/>";
		echo "Sistem Operasi = " . $this->agent->platform() ."<br/>"; // Platform info (Windows, Linux, Mac, etc.)
		//ip hanya muncul pada hosting
		echo "IP = " . $this->input->ip_address() . "<br/>";

		echo "Session ID : " . $session_id ."". date("dmyhis");

	}

	function log(){

		$this->load->model('MSecman');

		$session_id = round(uniqid(rand(), TRUE));

		$save['p_id_session'] = $session_id;
        $save['p_user_id'] = "ERZAN";
        $save['p_ipaddress'] = $this->input->ip_address();
        $save['p_time_login'] = date('m/d/Y');
        $save['p_time_logout'] = date('m/d/Y h:i:s');

        print_r($save);

        $this->MSecman->log_login($save);

	}

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
