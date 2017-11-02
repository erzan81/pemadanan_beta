<?php

if (!defined('BASEPATH'))
    die();

class Element extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Master_model');
        //$this->load->database('pblmig', true);
            
    }

    public function index() {
        $data['menu'] = $this->Master_model->get_menu();

        $this->load->view('admin/include/header',$data);
        $this->load->view('admin/master/element');
        $this->load->view('admin/include/footer');
    }

    function get_main_element(){

    	$this->load->model('master_data/MElements');

    	$ref = $this->MElements->get_ref_element();
    	
    	echo json_encode($ref);


    }

    function submit(){

        $this->load->model('master_data/MElements');

        $mode = $this->input->post('mode');

        $save['p_id_element'] = $this->input->post('p_id_element');
        $save['p_tipe_kolom'] = $this->input->post('p_tipe_kolom');
        $save['p_size_kolom'] = $this->input->post('p_size_kolom');
        $save['p_keterangan'] = $this->input->post('p_keterangan');
        $save['p_create_by'] = "ERZAN";

        if($mode == "upd"){

            $ref = $this->MElements->upd_element($save);
            $ref['tipe'] = "EDIT";

        }
        else if($mode == "del"){

            $ref = $this->MElements->del_element($save);
            $ref['tipe'] = "HAPUS";
            $ref['p_id_kolom'] = $this->input->post('p_id_element');

        }
        else{

            $ref = $this->MElements->ins_element($save);
            $ref['tipe'] = "SIMPAN";

        }

        echo json_encode($ref);

    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
