<?php

if (!defined('BASEPATH'))
    die();

class Monitoring extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Master_model');
            //$this->load->database('pblmig', true);
            
    }

    public function index() {
        $data['menu'] = $this->Master_model->get_menu();

        $this->load->view('admin/include/header',$data);
        $this->load->view('admin/monitoring');
        $this->load->view('admin/include/footer');
    }

    function coba(){

    	$this->load->model('MMonitoring');

    	$id = $this->session->userdata('user_id');
    	$id_upload = 'UPLOAD-20171025-000001';

    	$data['main'] = $this->MMonitoring->get_pemadanan_now($id);

    	$data['detil'] = $this->MMonitoring->get_pemadanan_now_detil($id_upload);

    	$data['main_finish'] = $this->MMonitoring->get_pemadanan_finish($id);

    	$data['finish_detil'] = $this->MMonitoring->get_pemadanan_finish_detil($id_upload);

    	echo "<pre>";
    	print_r($data);

    }

    function get_monitoring_finish(){

    	$this->load->model('MMonitoring');

    	$id = $this->session->userdata('user_id');

    	$data = $this->MMonitoring->get_pemadanan_finish($id);

    	echo json_encode($data);


    }

    function get_monitoring_finish_detil(){

        $this->load->model('MMonitoring');

        $id = $this->input->post('p_id_upload');

        $data = $this->MMonitoring->get_pemadanan_finish_detil($id);

        echo json_encode($data);


    }

    function get_pemadanan_now_detil(){

        $this->load->model('MMonitoring');

        $id = $this->input->post('p_id_upload');

        $data = $this->MMonitoring->get_pemadanan_now_detil($id);

        echo json_encode($data);


    }

    function get_monitoring_now(){

    	$this->load->model('MMonitoring');

    	$id = $this->session->userdata('user_id');

    	$data = $this->MMonitoring->get_pemadanan_now($id);

    	echo json_encode($data);


    }


    function get_pemadanan_now_detil_pss(){
        $this->load->model('MMonitoring');
        $hit = $this->MMonitoring->get_pemadanan_now_detil_pss();

        $recordsTotal = "";
        $recordsFiltered = "";

        //print_r($hit);

        if(count($hit) > 0){
            //print_r($hit[0]['TOTAL_COUNT']);
            $recordsTotal = $hit[0]['TOTAL_COUNT'];
            $recordsFiltered = $hit[0]['TOTAL_COUNT'];
        }
        else{
            //echo "masuk sini";
            $recordsTotal = 0;
            $recordsFiltered = 0;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $hit,
            );


        echo json_encode($output);
    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
