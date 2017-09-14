<?php

if (!defined('BASEPATH'))
    die();

class Kolom extends CI_Controller {

    public function index() {

        $this->load->view('admin/include/header');
        $this->load->view('admin/master/kolom');
        $this->load->view('admin/include/footer');
    }

    function get_main_kolom(){

    	$this->load->model('master_data/MKolom');

    	$ref = $this->MKolom->get_ref_kolom();
    	
    	echo json_encode($ref);


    }


    function submit(){

        $this->load->model('master_data/MKolom');

        $mode = $this->input->post('mode');

        $save['p_id_kolom'] = $this->input->post('p_id_kolom');
        $save['p_tipe_kolom'] = $this->input->post('p_tipe_kolom');
        $save['p_size_kolom'] = $this->input->post('p_size_kolom');
        $save['p_keterangan'] = $this->input->post('p_keterangan');
        $save['p_create_by'] = "ERZAN";

        if($mode == "upd"){

            $ref = $this->MKolom->upd_kolom($save);
            $ref['tipe'] = "EDIT";

        }
        else if($mode == "del"){

            $ref = $this->MKolom->del_kolom($save);
            $ref['tipe'] = "HAPUS";
            $ref['p_id_kolom'] = $this->input->post('p_id_kolom');

        }
        else{

            $ref = $this->MKolom->ins_kolom($save);
            $ref['tipe'] = "SIMPAN";

        }

        echo json_encode($ref);

    }

    

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
