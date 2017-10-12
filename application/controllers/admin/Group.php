<?php

if (!defined('BASEPATH'))
    die();

class Group extends CI_Controller {

    public function index() {

        $this->load->view('admin/include/header');
        $this->load->view('admin/secman/user');
        $this->load->view('admin/include/footer');
    }

    function coba(){

        $this->load->model('MSecman');

        $ref = $this->MSecman->get_mst_group();

        echo "<pre>";

        $data = $ref[0];
        //echo $data->ID_GROUP;


        $detil = $this->MSecman->get_mst_group_detil($data->ID_GROUP);
        print_r($ref);

        $menu = $this->MSecman->get_menutab();
        print_r($menu);
        echo "<br><br>";

        print_r($menu);


        // $obj_state = new stdObject();
        // $obj->id = "Nick";
        // $obj->parent = "Doe";
        // $obj->state = 20;
        // $obj->text = null;

        $obj_state = (object) [
            'opened' => 'true',
            'selected' => 'false'
          ];

        $object = (object) [
            'id' => 'foo',
            'parent' => 'asdasd',
            'state' => $obj_state,
            'text' => 'text'
          ];

        // $obj_state = {
        //     opened : true,
        //     selected : false
        // };

        // $obj_menu = {

        //     id: 123,
        //     parent: "parent",
        //     state : $obj_state,
        //     text : 'text'
        // };

        $arr = [];

        array_push($arr,$object);

        print_r($arr);


    }

    function get_mst_group(){

        $this->load->model('MSecman');

        $ref = $this->MSecman->get_mst_group();
        
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

    

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
