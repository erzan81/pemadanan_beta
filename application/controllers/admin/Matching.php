<?php

if (!defined('BASEPATH'))
    die();

class Matching extends CI_Controller {

    public function index() {

        $this->load->view('admin/include/header');
        $this->load->view('admin/matching');
        $this->load->view('admin/include/footer');
    }


    function get_kolom_pemadanan_upd(){

        $p_id_upload = $this->input->post('p_id_upload');
        $p_step_ke = $this->input->post('p_step_ke');

        $this->load->model('MMatching');
        $main = $this->MMatching->get_metode_pemadanan_upd($p_id_upload, $p_step_ke);

         echo json_encode($main);
        
    }


    function get_data_final(){

    	$p_created_by = $this->session->userdata('user_id');;

        $this->load->model('Master_model');
        $main = $this->Master_model->get_data_final($p_created_by);

        echo json_encode($main);

    }


    function get_kolom_pemadanan(){

    	$p_id_upload = $this->input->post("p_id_upload");

    	//$p_id_upload = "UPLOAD-20170904-000007";
        $this->load->model('MMatching');
        $main = $this->MMatching->get_kolom_pemadanan($p_id_upload);

        echo json_encode($main);

    }

    function submit_metode_pemadanan(){

        $this->load->model('MMatching');

        $data = json_decode(stripslashes($_POST['data']));

        $id_upload = $data[0]->p_id_upload;
        $step_ke = $this->MMatching->get_step_ke($id_upload);

        foreach ($data as $key) {

            $save['p_instansi_id'] = $key->p_instansi_id;
            $save['p_id_upload'] = $key->p_id_upload;
            $save['p_id_kolom'] = $key->p_id_kolom;
            $save['p_is_proses'] = $key->p_is_proses;
            $save['p_is_digit'] = $key->p_is_digit;

            $save['p_metode'] = $key->p_metode;
            $save['p_nilai'] = $key->p_nilai;
            $save['p_atribut'] = $key->p_atribut;
            $save['p_digit'] = $key->p_digit;
            $save['p_create_by'] = $this->session->userdata('user_id');;
            $save['p_step_ke'] = $step_ke[0]->STEP_KE;
            
            $hit = $this->MMatching->metode_pemadanan($save);
            //print_r($save);

            $out['out_rowcount'] = $hit["out_rowcount"];
            $out['msgerror'] = $hit["msgerror"];
        }

        echo json_encode($out);

    }

    function submit_metode_pemadanan_edit(){

        $this->load->model('MMatching');

        $data = json_decode(stripslashes($_POST['data']));

        $id_upload = $data[0]->p_id_upload;
        //$step_ke = $this->MMatching->get_step_ke($id_upload);

        foreach ($data as $key) {

            $save['p_instansi_id'] = $key->p_instansi_id;
            $save['p_id_upload'] = $key->p_id_upload;
            $save['p_id_kolom'] = $key->p_id_kolom;
            $save['p_is_proses'] = $key->p_is_proses;
            $save['p_is_digit'] = $key->p_is_digit;

            $save['p_metode'] = $key->p_metode;
            $save['p_nilai'] = $key->p_nilai;
            $save['p_atribut'] = $key->p_atribut;
            $save['p_digit'] = $key->p_digit;
            $save['p_create_by'] = $this->session->userdata('user_id');;
            $save['p_step_ke'] = $key->p_step_ke;
            
            $hit = $this->MMatching->metode_pemadanan_upd($save);
            //print_r($save);

            $out['out_rowcount'] = $hit["out_rowcount"];
            $out['msgerror'] = $hit["msgerror"];
        }

        echo json_encode($out);

    }

    function submit_init_pemadanan(){

        $this->load->model('MMatching');

        $save['p_instansi_id'] = $this->input->post('p_instansi_id');
        $save['p_id_upload'] = $this->input->post('p_id_upload');
        $save['p_step_ke'] = $this->input->post('p_step_ke');
        $save['p_step_acuan'] = $this->input->post('p_step_acuan');
        $save['p_is_paralel'] = $this->input->post('p_is_paralel');
        $save['p_create_by'] = $this->session->userdata('user_id');;
        
        $hit = $this->MMatching->init_pemadanan($save);
        //print_r($save);

        $out['out_rowcount'] = $hit["out_rowcount"];
        $out['msgerror'] = $hit["msgerror"];
        

        echo json_encode($out);

    }


    function get_metode_pemadanan(){

        $this->load->model('MMatching');

        $p_id_upload = $this->input->post('p_id_upload');

        $main = $this->MMatching->get_metode_pemadanan($p_id_upload);
        $detil = $this->MMatching->get_metode_pemadanan_detil($p_id_upload);

        $detil_fix = array();
        $main_fix = array();
        $main_temp = [];

        foreach ($main as $key) {
            
            foreach ($detil as $det ) {
                if($det->ID_UPLOAD == $key->ID_UPLOAD && $det->INSTANSI_ID == $key->INSTANSI_ID && $det->STEP_KE == $key->STEP_KE){

                    array_push($detil_fix,$det);

                }

            }

            $output = array(
                "ID_UPLOAD" => $key->ID_UPLOAD,
                "INSTANSI_ID" => $key->INSTANSI_ID,
                "STEP_KE" => $key->STEP_KE,
                "NAMA_INSTANSI" => $key->NAMA_INSTANSI,
                "STATUS" => $key->STATUS,
                "FLAG_TOMBOL" => $key->FLAG_TOMBOL,
                "DETIL" => $detil_fix
                );

            
            array_push($main_temp,$output);            
  
            $detil_fix = array();
        }

        $main_fix = array(
            "MAIN" => $main_temp,
            );
        

        echo json_encode($main_fix);  

    }

    function get_acuan_step(){

        $this->load->model('MMatching');

        $p_id_upload = $this->input->post('p_id_upload');
        $p_is_paralel = $this->input->post('p_is_paralel');
        $p_step_ke = $this->input->post('p_step_ke');


        $get_acuan = $this->MMatching->get_acuan_step($p_id_upload, $p_is_paralel, $p_step_ke);


        echo json_encode($get_acuan);

    }

    function get_pemadanan_final(){

        $this->load->model('MMatching');

        $p_id_upload = $this->input->post('p_id_upload');

        $get = $this->MMatching->get_pemadanan($p_id_upload);


        echo json_encode($get);


    }

    function get_pemadanan_final_detil(){

        $this->load->model('MMatching');

        $p_id_upload = $this->input->post('p_id_upload');
        $p_step_ke = $this->input->post('p_step_ke');

        $get = $this->MMatching->get_pemadanan_detil($p_id_upload, $p_step_ke);


        echo json_encode($get);


    }

    function submit_pemadanan_job(){

        $this->load->model('MMatching');

        $p_id_upload = $this->input->post('p_id_upload');
        $p_step_ke = $this->input->post('p_step_ke');

        $hit = $this->MMatching->main_pemadanan_job($p_id_upload, $p_step_ke);

        $out['out_rowcount'] = $hit["out_rowcount"];
        $out['msgerror'] = $hit["msgerror"];

        echo json_encode($out);


    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
