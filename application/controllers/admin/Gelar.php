<?php

if (!defined('BASEPATH'))
    die();

class Gelar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Master_model');
            //$this->load->database('pblmig', true);
            
    }

    public function index() {
        $data['menu'] = $this->Master_model->get_menu();

        $this->load->view('admin/include/header',$data);
        $this->load->view('admin/master/gelar');
        $this->load->view('admin/include/footer');
    }

    function get_main_gelar(){

    	$this->load->model('master_data/MGelar');

    	$ref = $this->MGelar->get_ref_gelar();
    	
    	echo json_encode($ref);


    }


    function submit(){

        $this->load->model('master_data/MGelar');

        $mode = $this->input->post('mode');
        $p_gelar = $this->input->post('p_gelar');
       

        if($mode == "upd"){

            $ref = $this->MGelar->upd_gelar($p_gelar);
            $ref['tipe'] = "EDIT";

        }
        else if($mode == "del"){

            $ref = $this->MGelar->del_gelar($p_gelar);
            $ref['tipe'] = "HAPUS";

        }
        else{

            $ref = $this->MGelar->ins_gelar($p_gelar);
            $ref['tipe'] = "SIMPAN";

        }

        echo json_encode($ref);

    }

    

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
