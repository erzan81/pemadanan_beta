<?php

if (!defined('BASEPATH'))
    die();

class Verifikasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Master_model');
            //$this->load->database('pblmig', true);
            
    }

    public function index() {
        $data['menu'] = $this->Master_model->get_menu();

        $this->load->view('admin/include/header',$data);
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
        $save['p_create_by'] = $this->session->userdata('user_id');
        $save['p_id_upload'] = $id_upload;
        $save['p_ignore'] = $ignore;

	    $merge = $this->MVerifikasi->merge_temp($save);
	  
	    if($merge["out_rowcount"] != 1){

	        $out['out_rowcount'] = $merge["out_rowcount"];
	        $out['msgerror'] = $merge["msgerror"];

            //echo "merge gagal<br><br><br><br>";
            //print_r($out);

	    }
	    else{

	    	$rekap = $this->MVerifikasi->rekap_merge($save);


	    	$out['out_rowcount'] = $rekap["out_rowcount"];
	        $out['msgerror'] = $rekap["msgerror"];

            //echo "<br><br>rekap<br><br>";
            //print_r($out);

	    }

	    echo json_encode($out);
    }


    function get_temp_main(){

    	$p_created_by = $this->session->userdata('user_id');
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
            $save['p_create_by'] = $this->session->userdata('user_id');
            
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
        $save['p_create_by'] = $this->session->userdata('user_id');
        
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

        $p_created_by = $this->session->userdata('user_id');

        $this->load->model('Master_model');
        $main = $this->Master_model->get_data_final($p_created_by);

        echo json_encode($main);

    }

    function get_siap_final(){

        $this->load->model('Master_model');
        $main = $this->Master_model->get_siap_final();

        echo json_encode($main);

    }

    function get_ref_element(){

        $this->load->model('Master_model');
        $id_upload = $this->input->post('p_id_upload');
        $main = $this->Master_model->get_dim_element($id_upload);

        echo json_encode($main);

    }

    function tambah_element(){

        $this->load->model('MVerifikasi');

        $data = $this->input->post('data');

        foreach ($data as $key) {
            
            $save['p_id_upload'] = $key['p_id_upload'];
            $save['p_id_element'] = $key['p_id_element'];
            $save['p_no_urut'] = $key['p_no_urut'];
            $save['p_create_by'] = $this->session->userdata('user_id');
            
            $hit = $this->MVerifikasi->ins_element($save);

            $out['out_rowcount'] = $hit["out_rowcount"];
            $out['msgerror'] = $hit["msgerror"];
        }

        echo json_encode($out);

    }

    function del_element(){

        $this->load->model('MVerifikasi');

        $param = $this->input->post('p_id_upload');

        $field = explode(',', $param);

        $id_upload = $this->input->post('p_id_upload');;
        $id_element = $this->input->post('p_id_element');;

        
        $save['p_id_upload'] = $id_upload;
        $save['p_id_element'] = $id_element;
        
        $hit = $this->MVerifikasi->del_element($save);

        $out['out_rowcount'] = $hit["out_rowcount"];
        $out['msgerror'] = $hit["msgerror"];
      
        echo json_encode($out);

    }

    function get_conf_element(){
        $this->load->model('MVerifikasi');

        $id_upload = $this->input->post('p_id_upload');
        $conf = $this->MVerifikasi->get_conf_element($id_upload);
        
        echo json_encode($conf);

    }

    function init_final(){

        $this->load->model('MVerifikasi');

        $id_upload = $this->input->post("p_id_upload");
        $instansi = $this->input->post("p_instansi_id");
        $is_keluarga = $this->input->post("p_is_keluarga");

        $keluarga = "";

        if($is_keluarga == 'YA'){
            $keluarga = 1;
        }
        else{
            $keluarga = 0;
        }

        $save['p_id_upload'] = $id_upload;
        $save['p_instansi_id'] = $instansi;
        $save['p_is_keluarga'] = $keluarga;
        $save['p_create_by'] = $this->session->userdata('user_id');

        $init = $this->MVerifikasi->init_final($save);

        $out['out_rowcount'] = $init["out_rowcount"];
        $out['msgerror'] = $init["msgerror"];
      
        echo json_encode($out);

    }



}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
