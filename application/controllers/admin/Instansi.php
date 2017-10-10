<?php

if (!defined('BASEPATH'))
    die();

class Instansi extends CI_Controller {

    public function index() {

        $this->load->view('admin/include/header');
        $this->load->view('admin/master/instansi');
        $this->load->view('admin/include/footer');
    }

    function get_main_instansi(){

    	$this->load->model('master_data/MInstansi');

    	$ref = $this->MInstansi->getInstansi();
    	
    	echo json_encode($ref);


    }

    function submit($save){

        $this->load->model('master_data/MInstansi');

        $mode = $save['mode'];

        $ref['save'] = $save;

        if($mode == "upd"){

            $ref = $this->MInstansi->upd_instansi($save);
            $ref['tipe'] = "EDIT";

        }
        else{

            $ref = $this->MInstansi->ins_instansi($save);
            $ref['tipe'] = "SIMPAN";
            $ref['p_instansi_id'] = "SIMPAN";

        }


        echo json_encode($ref);

    }

    function submit_delete(){

        $this->load->model('master_data/MInstansi');

        $save['p_instansi_id'] = $this->input->post('p_instansi_id');
        $save['p_instansi_nama'] = $this->input->post('p_instansi_nama');
        $save['p_instansi_ket'] = $this->input->post('p_instansi_ket');
        $save['p_instansi_alamat'] = $this->input->post('p_instansi_alamat');
        $save['p_instansi_telp'] = $this->input->post('p_instansi_telp');
        $save['p_instansi_status'] = $this->input->post('p_instansi_status');
        $save['p_create_by'] = $this->session->userdata('user_id');

        $ref = $this->MInstansi->del_instansi($save);
        $ref['tipe'] = "HAPUS";
        $ref['instansi_id'] = $this->input->post('p_instansi_id');

        echo json_encode($ref);

    }


    function upload_instansi() {

       //upload file
        $this->load->helper('thumb');

        $mode = $this->input->post('mode');


        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
        $config['allowed_types'] = 'gif|jpg|png';;
        $config['max_filename'] = '255';
        $config['encrypt_name'] = FALSE;
        $config['max_size'] = '1024000'; //1 GB
        $config['overwrite'] = TRUE;

        if (isset($_FILES['files']['name'])) {
            if (0 < $_FILES['files']['error']) {
                echo 'Error during file upload' . $_FILES['files']['error'];
            } else {
        
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('files')) {
                    echo $this->upload->display_errors();
                } 

                else{

                    $image_data = $this->upload->data();
            
                    $path = $_FILES['files']['name'];

                    $file = str_replace(' ', '_', $path);
                    $piles = $this->upload->upload_path."".$file;


                    $path_thumbs = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/thumbs";

                    create_thumb($image_data, '25', '25', $path_thumbs."/25x25", TRUE);
                    create_thumb($image_data, '50', '50', $path_thumbs."/50x50", TRUE);
                    create_thumb($image_data, '120', '120', $path_thumbs."/120x120", TRUE);
                    

                    $save['p_instansi_id'] = $this->input->post('p_instansi_id');
                    $save['p_instansi_nama'] = $this->input->post('p_instansi_nama');
                    $save['p_instansi_ket'] = $this->input->post('p_instansi_ket');
                    $save['p_instansi_alamat'] = $this->input->post('p_instansi_alamat');
                    $save['p_instansi_telp'] = $this->input->post('p_instansi_telp');
                    $save['p_instansi_status'] = $this->input->post('p_instansi_status');
                    $save['p_path_file'] = $file;
                    $save['p_create_by'] = $this->session->userdata('user_id');
                    $save['mode'] = $this->input->post('mode');

                    $this->submit($save);


                }
                
            }

            


        } else {

            $save['p_instansi_id'] = $this->input->post('p_instansi_id');
            $save['p_instansi_nama'] = $this->input->post('p_instansi_nama');
            $save['p_instansi_ket'] = $this->input->post('p_instansi_ket');
            $save['p_instansi_alamat'] = $this->input->post('p_instansi_alamat');
            $save['p_instansi_telp'] = $this->input->post('p_instansi_telp');
            $save['p_instansi_status'] = $this->input->post('p_instansi_status');
            $save['p_path_file'] = $this->input->post('p_path_file');
            $save['p_create_by'] = $this->session->userdata('user_id');
            $save['mode'] = $this->input->post('mode');

            $this->submit($save);
        }
    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
