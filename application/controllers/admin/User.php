<?php

if (!defined('BASEPATH'))
    die();

class User extends CI_Controller {

    public function index() {

        $this->load->model('MSecman');

        $data['group'] = $this->MSecman->get_mst_group();

        $this->load->view('admin/include/header');
        $this->load->view('admin/secman/user', $data);
        $this->load->view('admin/include/footer');
    }

    

    function get_mst_user(){

        $this->load->model('MSecman');

        $ref = $this->MSecman->get_mst_user();
        
        echo json_encode($ref);

    }


    function get_user_by_id(){

        $this->load->model('MSecman');

        $p_user_id = $this->input->post('p_user_id');

        //$p_user_id = "ERZAN";
        $ref = $this->MSecman->get_user_by_id($p_user_id);
        
        echo json_encode($ref);

    }


    function submit($save){

        $this->load->model('MSecman');

        $mode = $save['mode'];

        $ref['save'] = $save;

        if($mode == "upd"){

            $ref = $this->MSecman->upd_user($save);
            $ref['tipe'] = "EDIT";

        }
        else{

            $ref = $this->MSecman->ins_user($save);
            $ref['tipe'] = "SIMPAN";

        }


        echo json_encode($ref);

    }

    function upload_user() {


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

                    $save['p_user_id'] = $this->input->post('p_user_id');
                    $save['p_nama_user'] = $this->input->post('p_nama_user');
                    $save['p_no_telp'] = $this->input->post('p_no_telp');
                    $save['p_email'] = $this->input->post('p_email');
                    $save['p_passwd'] = $this->input->post('p_passwd');
                    $save['p_path_file'] = $file;
                    $save['p_id_group'] = $this->input->post('p_id_group');
                    $save['p_create_by'] = "ERZAN";
                    $save['p_disable_user'] = $this->input->post('p_disable_user');
                    $save['mode'] = $this->input->post('mode');

                    $this->submit($save);


                }
                
            }

            
        } else {

            $save['p_user_id'] = $this->input->post('p_user_id');
            $save['p_nama_user'] = $this->input->post('p_nama_user');
            $save['p_no_telp'] = $this->input->post('p_no_telp');
            $save['p_email'] = $this->input->post('p_email');
            $save['p_passwd'] = $this->input->post('p_passwd');
            $save['p_path_file'] = $this->input->post('p_path_file');
            $save['p_id_group'] = $this->input->post('p_id_group');
            $save['p_create_by'] = "ERZAN";
            $save['p_disable_user'] = $this->input->post('p_disable_user');
            $save['mode'] = $this->input->post('mode');

            $this->submit($save);
        }
    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
