<?php

if (!defined('BASEPATH'))
    die();

class Template extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Master_model');
            //$this->load->database('pblmig', true);
            
    }

    public function index() {
        
        $data['menu'] = $this->Master_model->get_menu();

        $data['instansi'] = $this->Master_model->getInstansi();
        $data['kolom'] = $this->Master_model->get_ref_kolom();
        $data['dmp'] = $this->Master_model->get_table_dmp();

        
        $this->load->view('admin/include/header',$data);
        $this->load->view('admin/upload_template');
        $this->load->view('admin/include/footer');
    }

    
    function submit(){

        $this->load->model('MTemplate');

        $save['p_instansi_id'] = $this->input->post('p_instansi_id');
        $save['p_nama_file'] = $this->input->post('p_nama_file');
        $save['p_jns_upload'] = "DMP";
        $save['p_kolom'] = $this->input->post('p_kolom');
        $save['p_create_by'] = $this->session->userdata('user_id');
        $save['p_kegiatan'] = $this->input->post('p_kegiatan');

        $ref = $this->MTemplate->new_upload_template($save);

        $out['out_rowcount'] = $ref["out_rowcount"];
        $out['msgerror'] = $ref["msgerror"];

        echo json_encode($out);

    }

    

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
