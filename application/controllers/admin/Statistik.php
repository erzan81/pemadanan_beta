<?php

if (!defined('BASEPATH'))
    die();

class Statistik extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('MCombo');
            //$this->load->database('pblmig', true);
            
    }

    public function data_keluarga() {

        $data['propinsi'] = $this->MCombo->get_propinsi();
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/statistik/data_keluarga');
        $this->load->view('admin/include/footer');
    }

    public function jenis_kelamin() {

        $data['propinsi'] = $this->MCombo->get_propinsi();
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/statistik/jenis_kelamin');
        $this->load->view('admin/include/footer');
    }

    public function umur() {

        $data['umur'] = $this->MCombo->get_umur();
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/statistik/umur');
        $this->load->view('admin/include/footer');
    }

    public function pendidikan() {

        $data['pendidikan'] = $this->MCombo->get_pendidikan();
        
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/statistik/pendidikan');
        $this->load->view('admin/include/footer');
    }

    function get_kabupaten(){

        $id = $this->input->post("p_kode_prop");

        $kabupaten = $this->MCombo->get_propinsi($id);

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
    

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
