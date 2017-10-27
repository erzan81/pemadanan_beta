<?php

if (!defined('BASEPATH'))
    die();

class Monitoring extends CI_Controller {

    public function index() {

        $this->load->view('admin/include/header');
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

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
