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

    function submit(){

        $this->load->model('master_data/MInstansi');

        $mode = $this->input->post('mode');

        $save['p_instansi_id'] = $this->input->post('p_instansi_id');
        $save['p_instansi_nama'] = $this->input->post('p_instansi_nama');
        $save['p_instansi_ket'] = $this->input->post('p_instansi_ket');
        $save['p_instansi_alamat'] = $this->input->post('p_instansi_alamat');
        $save['p_instansi_telp'] = $this->input->post('p_instansi_telp');
        $save['p_instansi_status'] = $this->input->post('p_instansi_status');
        $save['p_create_by'] = "ERZAN";

        if($mode == "upd"){

            $ref = $this->MInstansi->upd_instansi($save);
            $ref['tipe'] = "EDIT";

        }
        else if($mode == "del"){

            $ref = $this->MInstansi->del_instansi($save);
            $ref['tipe'] = "HAPUS";
            $ref['instansi_id'] = $this->input->post('p_instansi_id');

        }
        else{

            $ref = $this->MInstansi->ins_instansi($save);
            $ref['tipe'] = "SIMPAN";
            $ref['p_instansi_id'] = "SIMPAN";

        }

        echo json_encode($ref);

    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
