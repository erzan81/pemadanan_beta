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


    function save(){

        $this->load->model('master_data/MKolom');

        $save['p_id_kolom'] = $this->input->post('p_id_kolom');
        $save['p_tipe_kolom'] = $this->input->post('p_tipe_kolom');
        $save['p_size_kolom'] = $this->input->post('p_size_kolom');
        $save['p_keterangan'] = $this->input->post('p_keterangan');
        $save['p_create_by'] = "ERZAN";

        $ref = $this->MKolom->ins_kolom($save);
        
        echo json_encode($ref);

    }

    function edit(){

        $this->load->model('master_data/MKolom');

        $save['p_id_kolom'] = $this->input->post('p_id_kolom');
        $save['p_tipe_kolom'] = $this->input->post('p_tipe_kolom');
        $save['p_size_kolom'] = $this->input->post('p_size_kolom');
        $save['p_keterangan'] = $this->input->post('p_keterangan');
        $save['p_create_by'] = "ERZAN";

        $ref = $this->MKolom->upd_kolom($save);
        
        echo json_encode($ref);

    }

    function delete(){

        $this->load->model('master_data/MKolom');

        $save['p_id_kolom'] = $this->input->post('p_id_kolom');
        $save['p_create_by'] = "ERZAN";

        $ref = $this->MKolom->del_kolom($save);
        
        echo json_encode($ref);

    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
