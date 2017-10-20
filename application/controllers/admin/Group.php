<?php

if (!defined('BASEPATH'))
    die();

class Group extends CI_Controller {

    public function index() {

        $this->load->view('admin/include/header');
        $this->load->view('admin/secman/group');
        $this->load->view('admin/include/footer');
    }

    function coba(){

        $this->load->model('MSecman');

        //$id_group = "ERZ001";
        $id_group = $this->input->post('id_group');

        $ref = $this->MSecman->get_mst_group_detil($id_group);
        $arr = [];
        foreach ($ref as $key ) {
            array_push($arr, $key->ID_MENU);
        }

       
        $os = $arr;
        
        $menu = $this->MSecman->get_menutab();
        $root = array();
        $detail = array();
        $main_temp = [];

        

        foreach ($menu as $key_root) {
            
            if($key_root->SEC_ID_MENU != null || $key_root->SEC_ID_MENU != ""){


                if (in_array($key_root->ID_MENU, $os)) {

                    if($key_root->EXPANDED == 1){

                        $output = array(
                            "id" => $key_root->ID_MENU,
                            "parent" => $key_root->SEC_ID_MENU,
                            "text" => $key_root->DESKRIPSI_MENU,
                            "state" => array(
                                            "opened" => true,
                                            "selected" => false
                                            )
                        );
                    }
                    else{

                        $output = array(
                            "id" => $key_root->ID_MENU,
                            "parent" => $key_root->SEC_ID_MENU,
                            "text" => $key_root->DESKRIPSI_MENU,
                            "state" => array(
                                            "opened" => true,
                                            "selected" => true
                                            )
                        );

                    }

                    
                }
                else{

                    $output = array(
                        "id" => $key_root->ID_MENU,
                        "parent" => $key_root->SEC_ID_MENU,
                        "text" => $key_root->DESKRIPSI_MENU,
                        "state" => array(
                                        "opened" => true,
                                        "selected" => false
                                        )
                    );
                }
                

                array_push($main_temp,$output); 

            }

        }

        $state = array(
            "opened" => true,
            "selected" => false
            );

        $output = array(
                "id" => "mnuRoot",
                "parent" => "#",
                "text" => "PEMADANAN",
                "state" => $state
                );

        array_push($main_temp,$output); 

        echo json_encode($main_temp);
        
    }


    function get_menu_tab(){

        $this->load->model('MSecman');
        $menu = $this->MSecman->get_menutab();
        $root = array();
        $detail = array();
        $main_temp = [];

        $state = array(
            "opened" => true,
            "selected" => false
            );

        $output = array(
                "id" => "mnuRoot",
                "parent" => "#",
                "text" => "PEMADANAN",
                "state" => $state
                );

        array_push($main_temp,$output); 

        foreach ($menu as $key_root) {
            
            if($key_root->SEC_ID_MENU != null || $key_root->SEC_ID_MENU != ""){



                $output = array(
                "id" => $key_root->ID_MENU,
                "parent" => $key_root->SEC_ID_MENU,
                "text" => $key_root->DESKRIPSI_MENU,
                "state" => $state
                );

                array_push($main_temp,$output); 

            }

        }

        echo json_encode($main_temp);


    }

    function get_mst_group(){

        $this->load->model('MSecman');

        $ref = $this->MSecman->get_mst_group();
        
        echo json_encode($ref);

    }

    function get_mst_group_detil(){

        $this->load->model('MSecman');

        $id_group = "ERZ001";

        $ref = $this->MSecman->get_mst_group_detil($id_group);
        
        echo json_encode($ref);

    }

    function submit(){

        $this->load->model('MSecman');
        $menu = $this->input->post('menu');
        $mode = $this->input->post('mode');
        //$id_group = $this->input->post('id_group');

        $save['p_id_group'] = $this->input->post('id_group');
        $save['p_nama_group'] = $this->input->post('nama_group');
        $save['p_create_by'] = $this->session->userdata('user_id');

        if($mode == "upd"){

            $ref = $this->MSecman->upd_user($save);
            $ref['tipe'] = "EDIT";

        }
        else{

            $ref = $this->MSecman->ins_group($save);
            $ref['tipe'] = "SIMPAN";

            if($ref['out_rowcount'] == 1){

                for ($i=0; $i < count($menu) ; $i++) { 
            
                    $save_detil['p_id_group'] = $this->input->post('id_group');
                    $save_detil['p_id_menu'] = $menu[$i];
                    $save_detil['p_create_by'] = $this->session->userdata('user_id');

                    $ref = $this->MSecman->ins_group_detil($save_detil);
                    $ref['tipe'] = "DETIL";

                }

            }

            
            

        }


        echo json_encode($ref);

    }

    function get_post_data(){

        //$id_group = $this->input->post('id_group');
        $menu = $this->input->post('menu');

        for ($i=0; $i < count($menu) ; $i++) { 
            
            echo $menu[$i]."<br>";

        }

    }

    

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
