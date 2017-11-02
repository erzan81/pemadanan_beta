<?php

if (!defined('BASEPATH'))
	die();

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
    $this->load->model('Master_model');
			//$this->load->database('pblmig', true);
			
	}

	public function index() {
    $data['menu'] = $this->Master_model->get_menu();

		$this->load->view('admin/include/header',$data);
		$this->load->view('admin/home');
		$this->load->view('admin/include/footer');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
