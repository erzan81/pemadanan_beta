<?php

if (!defined('BASEPATH'))
    die();

class Matching extends CI_Controller {

    public function index() {

        $this->load->view('admin/include/header');
        $this->load->view('admin/matching');
        $this->load->view('admin/include/footer');
    }

    function get_data_final(){

    	$p_created_by = "ERZAN";

        $this->load->model('Master_model');
        $main = $this->Master_model->get_data_final($p_created_by);

        echo json_encode($main);

    }


    function get_kolom_pemadanan(){

    	$p_id_upload = $this->input->post("p_id_upload");

    	//$p_id_upload = "UPLOAD-20170904-000007";
        $this->load->model('MMatching');
        $main = $this->MMatching->get_kolom_pemadanan($p_id_upload);

        echo json_encode($main);

    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
