<?php

if (!defined('BASEPATH'))
    die();

class Group extends CI_Controller {

    public function index() {

        $this->load->view('admin/include/header');
        $this->load->view('admin/secman/user');
        $this->load->view('admin/include/footer');
    }

    function coba(){

        $this->load->model('MSecman');

        $ref = $this->MSecman->get_mst_group();

        echo "<pre>";
        print_r($ref);


    }

    function get_mst_group(){

        $this->load->model('MSecman');

        $ref = $this->MSecman->get_mst_group();
        
        echo json_encode($ref);

    }

    function submit($save){

        $this->load->model('MSecman');

        $mode = $save['mode'];

        $ref['save'] = $save;

        if($mode == "upd"){

            $ref = $this->MSecman->upd_user($save);
            $ref['tipe'] = "EDIT";

        }
        else{

            $ref = $this->MSecman->ins_user($save);
            $ref['tipe'] = "SIMPAN";

        }


        echo json_encode($ref);

    }

    

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
