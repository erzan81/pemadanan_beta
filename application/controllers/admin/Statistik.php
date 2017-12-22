<?php

if (!defined('BASEPATH'))
    die();

class Statistik extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('MCombo');
        $this->load->model('MStatistik');
        $this->load->model('Master_model');
            //$this->load->database('pblmig', true);
            
    }

    public function data_keluarga() {

        $data['propinsi'] = $this->MCombo->get_propinsi();
        $data['menu'] = $this->Master_model->get_menu();
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/statistik/data_keluarga');
        $this->load->view('admin/include/footer');
    }

    public function jenis_kelamin() {

        $data['propinsi'] = $this->MCombo->get_propinsi();
        $data['menu'] = $this->Master_model->get_menu();
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/statistik/jenis_kelamin');
        $this->load->view('admin/include/footer');
    }

    public function umur() {

        $data['umur'] = $this->MCombo->get_umur();
        $data['menu'] = $this->Master_model->get_menu();
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/statistik/umur');
        $this->load->view('admin/include/footer');
    }

    public function pendidikan() {

        $data['pendidikan'] = $this->MCombo->get_pendidikan();
        $data['menu'] = $this->Master_model->get_menu();
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/statistik/pendidikan');
        $this->load->view('admin/include/footer');
    }

    function get_kabupaten(){

        $id = $this->input->post("p_kode_prop");

        $kabupaten = $this->MCombo->get_kabupaten($id);

        echo json_encode($kabupaten);
    }

    function get_kecamatan(){

        $p_kode_prop = $this->input->post("p_kode_prop");
        $p_kode_kab = $this->input->post("p_kode_kab");

        $kecamatan = $this->MCombo->get_kecamatan($p_kode_prop, $p_kode_kab);

        echo json_encode($kecamatan);
    }

    function get_kelurahan(){

        $p_kode_prop = $this->input->post("p_kode_prop");
        $p_kode_kab = $this->input->post("p_kode_kab");
        $p_kode_kec = $this->input->post("p_kode_kec");

        $kelurahan = $this->MCombo->get_kelurahan($p_kode_prop, $p_kode_kab, $p_kode_kec);

        echo json_encode($kelurahan);
    }

    function get_stat_data_keluarga(){
        
        $hit = $this->MStatistik->get_stat_data_keluarga();

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

    function get_stat_jenis_kelamin(){
        
        $hit = $this->MStatistik->get_stat_jenis_kelamin();

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

    function get_stat_umur(){
        
        $hit = $this->MStatistik->get_stat_umur();

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

    function get_stat_pendidikan(){
        
        $hit = $this->MStatistik->get_stat_pendidikan();

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
