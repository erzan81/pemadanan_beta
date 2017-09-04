<?php

if (!defined('BASEPATH'))
    die();

class Instansi extends CI_Controller {

    public function index() {

        $this->load->view('admin/include/header');
        $this->load->view('admin/master/instansi');
        $this->load->view('admin/include/footer');
    }

    function get_main_instansi(){

    	$this->load->model('master_data/MInstansi');

    	$ref = $this->MInstansi->getInstansi();
    	
    	echo json_encode($ref);


    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
