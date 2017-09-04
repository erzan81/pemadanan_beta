<?php

if (!defined('BASEPATH'))
    die();

class Verifikasi extends CI_Controller {

    public function index() {

        $this->load->view('admin/include/header');
        $this->load->view('admin/verifikasi');
        $this->load->view('admin/include/footer');
    }


    function submit_penggabungan(){

    	$this->load->model('MVerifikasi');

    	$param = $this->input->post('param');
    	$ignore = $this->input->post('ignore_bad');

        $field = explode(',', $param);

        $instansi = $field[1];
        $id_upload = $field[0];


    	$save['p_instansi_id'] = $instansi;
        $save['p_create_by'] = "ERZAN";
        $save['p_id_upload'] = $id_upload;
        $save['p_ignore'] = $ignore;

	    $merge = $this->MVerifikasi->merge_temp($save);
	  
	    if($merge["out_rowcount"] != 1){

	        $out['out_rowcount'] = $merge["out_rowcount"];
	        $out['msgerror'] = $merge["msgerror"];

	    }
	    else{

	    	$rekap = $this->MVerifikasi->rekap_merge($save);


	    	$out['out_rowcount'] = $rekap["out_rowcount"];
	        $out['msgerror'] = $rekap["msgerror"];

	    }

	    echo json_encode($out);
    }


    function get_temp_main(){

    	$p_created_by = "ERZAN";
        $this->load->model('Master_model');
        $main = $this->Master_model->get_upload_temp($p_created_by);

        echo json_encode($main);

    }

    function get_ref_cleansing(){
    	$this->load->model('Master_model');

    	$ref = $this->Master_model->get_ref_cleansing();
    	
    	echo json_encode($ref);

    }

    function get_conf_cleansing(){
        $this->load->model('Master_model');

        $id_upload = $this->input->post('p_id_upload');
        $conf = $this->Master_model->get_conf_cleansing($id_upload);
        
        echo json_encode($conf);

    }

    function tambah_conf(){

        $this->load->model('MVerifikasi');

        $data = $this->input->post('data');

        foreach ($data as $key) {
            $save['p_instansi_id'] = $key['p_instansi_id'];
            $save['p_id_upload'] = $key['p_id_upload'];
            $save['p_id_cleansing'] = $key['p_id_cleansing'];
            $save['p_id_kolom'] = $key['p_id_kolom'];
            $save['p_no_urut'] = $key['p_no_urut'];
            $save['p_create_by'] = "ERZAN";
            
            $hit = $this->MVerifikasi->conf_cleansing($save);

            $out['out_rowcount'] = $hit["out_rowcount"];
            $out['msgerror'] = $hit["msgerror"];
        }

        echo json_encode($out);

    }

    function submit_conf(){

        $this->load->model('MVerifikasi');

        $save['p_instansi_id'] = $this->input->post('p_instansi_id');
        $save['p_id_upload'] = $this->input->post('p_id_upload');
        $save['p_create_by'] = "ERZAN";
        
        $hit = $this->MVerifikasi->init_cleansing($save);

        if($hit["out_rowcount"] != 1){

            $out['out_rowcount'] = $hit["out_rowcount"];
            $out['msgerror'] = $hit["msgerror"];

        }
        else{

            $rekap = $this->MVerifikasi->rekap_clean($save);

            $out['out_rowcount'] = $rekap["out_rowcount"];
            $out['msgerror'] = $rekap["msgerror"];

        }

        echo json_encode($out);     

    }

    function get_data_final(){

        $p_created_by = "ERZAN";

        $this->load->model('Master_model');
        $main = $this->Master_model->get_data_final($p_created_by);

        echo json_encode($main);

    }

    function get_ref_element(){

        $this->load->model('master_data/MElements');
        $main = $this->MElements->get_ref_element();

        echo json_encode($main);

    }



}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
