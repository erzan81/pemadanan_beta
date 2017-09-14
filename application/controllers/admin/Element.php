<?php

if (!defined('BASEPATH'))
    die();

class Element extends CI_Controller {

    public function index() {

        $this->load->view('admin/include/header');
        $this->load->view('admin/master/element');
        $this->load->view('admin/include/footer');
    }

    function get_main_kolom(){

    	$this->load->model('master_data/MKolom');

    	$ref = $this->MKolom->get_ref_kolom();
    	
    	echo json_encode($ref);


    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
