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

    function submit_metode_pemadana(){

        $this->load->model('MMatching');

        $data = $this->input->post('data');

        foreach ($data as $key) {

            $save['p_instansi_id'] = $key['p_instansi_id'];
            $save['p_id_upload'] = $key['p_id_upload'];
            $save['p_id_kolom'] = $key['p_id_kolom'];
            $save['p_is_proses'] = $key['p_is_proses'];
            $save['p_is_digit'] = $key['p_is_digit'];

            $save['p_metode'] = $key['p_metode'];
            $save['p_nilai'] = $key['p_nilai'];
            $save['p_atribut'] = $key['p_atribut'];
            $save['p_digit'] = $key['p_digit'];
            $save['p_create_by'] = "ERZAN";
            
            $hit = $this->MMatching->metode_pemadanan($save);

            $out['out_rowcount'] = $hit["out_rowcount"];
            $out['msgerror'] = $hit["msgerror"];
        }

        echo json_encode($out);

    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
