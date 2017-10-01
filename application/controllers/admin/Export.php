<?php

if (!defined('BASEPATH'))
    die();

class Export extends CI_Controller {

    public function index() {

        $this->load->view('admin/include/header');
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

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
