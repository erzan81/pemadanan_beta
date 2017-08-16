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

	function coba_get(){
		$this->load->model('Master_model');
		$test = $this->Master_model->get_ref_kolom();

		print_r($test);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
