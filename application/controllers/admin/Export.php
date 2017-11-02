<?php

if (!defined('BASEPATH'))
    die();

class Export extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Master_model');
            //$this->load->database('pblmig', true);
            
    }

    public function index() {
        $data['menu'] = $this->Master_model->get_menu();

        $this->load->view('admin/include/header',$data);
        $this->load->view('admin/export');
        $this->load->view('admin/include/footer');
    }

    function coba(){

  //   	exec("ping 8.8.8.8", $o, $v);
		// var_dump($o);
		// var_dump($v);
    	

		$file_dmp = FCPATH."uploads/tes1.DMP";


		

		$perintah = "imp PEMADANAN_DATA/12345678@KONOHA TABLES=TEST file=".$file_dmp." FULL=N LOG=imptable.log ignore=y";
		echo $perintah;


		echo "<pre>";
		exec($perintah, $v, $o);
		var_dump($o);
		var_dump($v);
    }


      function get(){

        $this->load->model('MExport');

        $main = $this->MExport->get_list_export();
        $detil = $this->MExport->get_list_detil();
        $detil_fix = array();
        $main_fix = array();
        $main_temp = [];

        foreach ($main as $key) {
            
            foreach ($detil as $det ) {
                if($det->ID_UPLOAD == $key->ID_UPLOAD && $det->INSTANSI_ID == $key->INSTANSI_ID){

                    array_push($detil_fix,$det);

                }

            }

            $output = array(
                "NAMA_INSTANSI" => $key->NAMA_INSTANSI,
                "ID_UPLOAD" => $key->ID_UPLOAD,
                "INSTANSI_ID" => $key->INSTANSI_ID,
                "NAMA_TABEL" => $key->NAMA_TABEL,
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

      function export_all(){

        $this->load->model('MExport');

        $save['p_instansi_id'] = $this->input->post('p_instansi_id');
        $save['p_id_upload'] = $this->input->post('p_id_upload');
        $save['p_jenis_file'] = $this->input->post('p_jenis_file');
        $save['p_nama_tabel'] = $this->input->post('p_nama_tabel');
        $save['p_create_by'] = "ERZAN";

        $cek = $this->check_delete($save['p_nama_tabel'], $save['p_jenis_file']);

        if($cek == 1){

            $ref = $this->MExport->exp_all($save);
            $ref['pesan'] = "Export Berhasil";

        }   
        else{

            $ref['pesan'] = "Export Gagal";

        }    

        echo json_encode($ref);


      }

      function export_single(){

        $this->load->model('MExport');

        $save['p_instansi_id'] = $this->input->post('p_instansi_id');
        $save['p_id_upload'] = $this->input->post('p_id_upload');
        $save['p_jenis_file'] = $this->input->post('p_jenis_file');
        $save['p_step_ke'] = $this->input->post('p_step_ke');       
        $save['p_nama_tabel'] = $this->input->post('p_nama_tabel');


        $cek = $this->check_delete($save['p_nama_tabel'], $save['p_jenis_file']);

        if($cek == 1){

            
            $this->MExport->exp_single($save);
            $ref['pesan'] = "Export Berhasil";

        }
        else{
            $ref['pesan'] = "Export Gagal";

        }


        echo json_encode($ref);


      }

      function check_delete($tabel, $jenis){
            $this->load->helper('file');

            $ext = "";

            if($jenis == "XLS"){
                $ext = ".xlsx";
            }
            else if($jenis == "CSV"){
                $ext = ".csv";
            }
            else if($jenis == "DMP"){
                $ext = ".dmp";
            }

            $image_file_path=FCPATH.'uploads/'.$tabel.''.$ext;

            $is_delete = 0;
           if (file_exists($image_file_path)) //file_exists of a url returns false.It should be real file path
               {    
                    
                    if(unlink($image_file_path)) {
                         $is_delete = 1;
                    }
                    else {
                         $is_delete = 0;
                    }

               } 
           else 
               {
                   $is_delete = 1;
               }

            return $is_delete;
      }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
