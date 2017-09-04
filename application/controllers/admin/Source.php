<?php

//include('CSV.php');

if (!defined('BASEPATH'))
	die();

require_once APPPATH.'/third_party/spout/src/Spout/Autoloader/autoload.php';
require_once APPPATH.'/libraries/CSV.php';

//lets Use the Spout Namespaces
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
use Box\Spout\Common\Helper\EncodingHelper;
use Box\Spout\TestUsingResource;

class Source extends CI_Controller {

	public function index() {

        $this->load->model('Master_model');

        $data['instansi'] = $this->Master_model->getInstansi();
        $data['kolom'] = $this->Master_model->get_ref_kolom();
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/upload_source',$data);
        $this->load->view('admin/include/footer');
    }


    function upload_file() {

        //upload file
      $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
      $config['allowed_types'] = 'csv|xlsx';
      $config['max_filename'] = '255';
      $config['encrypt_name'] = FALSE;
        $config['max_size'] = '1024000'; //1 GB
        $config['overwrite'] = TRUE;

        if (isset($_FILES['files']['name'])) {
        	if (0 < $_FILES['files']['error']) {
        		echo 'Error during file upload' . $_FILES['files']['error'];
        	} else {
        		// if (file_exists('uploads/' . $_FILES['files']['name'])) {
        		// 	echo 'File already exists : uploads/' . $_FILES['files']['name'];
        		// 	echo "<br>";
        		// } else {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('files')) {
                echo $this->upload->display_errors();
            } else {
                        //echo "<pre>";
                        //var_dump($this->upload);
                        //echo $this->upload->upload_path;
                //echo 'File successfully uploaded : uploads/' . $_FILES['files']['name'];
                //echo "<br>";
            }

        }

        $path = $_FILES['files']['name'];

        $file = str_replace(' ', '_', $path);
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $piles = $this->upload->upload_path."".$file;

            //echo dirname($_SERVER["SCRIPT_FILENAME"])."/files/";
        
        $coba = $this->readExcelFile($piles, $ext);
  			//print_r($coba);

        if($ext == 'csv'){
            $ext_fix = 'CSV';
        }
        else{
            $ext_fix = 'XLS';
        }


        $save['p_instansi_id'] = $this->input->post('p_instansi_id');
        $save['p_nama_file'] = $_FILES['files']['name'];
        $save['p_jns_upload'] = $ext_fix;
        $save['p_kolom'] = $this->input->post('p_kolom');
        $save['p_create_by'] = "ERZAN";
        $save['p_kegiatan'] = $this->input->post('p_kegiatan');

        $this->submit_all($coba,$save);


    } else {
     echo 'Please choose a file';
 }
}

function upload_file_lanjutan() {

        //upload file


    $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
    $config['allowed_types'] = 'csv|xlsx';
    $config['max_filename'] = '255';
    $config['encrypt_name'] = FALSE;
        $config['max_size'] = '1024000'; //1 GB
        $config['overwrite'] = TRUE;

        if (isset($_FILES['files']['name'])) {
            if (0 < $_FILES['files']['error']) {
                echo 'Error during file upload' . $_FILES['files']['error'];
            } else {
                // if (file_exists('uploads/' . $_FILES['files']['name'])) {
                //  echo 'File already exists : uploads/' . $_FILES['files']['name'];
                //  echo "<br>";
                // } else {
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('files')) {
                    echo $this->upload->display_errors();
                } else {

                    //echo 'File successfully uploaded : uploads/' . $_FILES['files']['name'];
                    //echo "<br>";
                }
                
            }

            $path = $_FILES['files']['name'];

            $file = str_replace(' ', '_', $path);
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $piles = $this->upload->upload_path."".$file;

            $coba = $this->readExcelFile($piles, $ext);
            //print_r($coba);

            if($ext == 'csv'){
                $ext_fix = 'CSV';
            }
            else{
                $ext_fix = 'XLS';
            }

            $save['p_id_upload'] = $this->input->post('p_id_upload');
            $save['p_instansi_id'] = $this->input->post('p_instansi_id');
            $save['p_nama_file'] = $_FILES['files']['name'];
            $save['p_jns_upload'] = $ext_fix;
            //$save['p_kolom'] = $this->input->post('p_kolom');
            $save['p_create_by'] = "ERZAN";

            $this->submit_all_lanjutan($coba,$save);


        } else {
            echo 'Please choose a file';
        }
    }


    public function getAllRowsForFile($fileName)
    {
    	
    	$comma = new CSV($fileName);

    	$fieldDelimiter = $comma->getDelimiter();
    	$fieldEnclosure = '"';
    	$encoding = EncodingHelper::ENCODING_UTF8;
    	$allRows = array();
    	//$resourcePath = $this->getResourcePath($fileName);

    	/** @var \Box\Spout\Reader\CSV\Reader $reader */
    	$reader = ReaderFactory::create(Type::CSV);
    	$reader
    	->setFieldDelimiter($fieldDelimiter)
    	->setFieldEnclosure($fieldEnclosure)
    	->setEncoding($encoding)
        ->setShouldFormatDates(true)
    	->open($fileName);
    	//echo "<pre>";	
    	foreach ($reader->getSheetIterator() as $sheetIndex => $sheet) {
    		foreach ($sheet->getRowIterator() as $rowIndex => $row) {
    			array_push($allRows,$row);
    		}
    	}

    	$reader->close();


    	//$object = json_decode(json_encode($allRows), FALSE);

    	return $allRows;
    }


    function readExcel($piles){
    	$temp=array();  
        $string_kolom;
        try {
         $file_path = $piles;              	      
               $reader = ReaderFactory::create(Type::XLSX); //set Type file xlsx
               $reader->setShouldFormatDates(true); // will return formatted dates
	           $reader->open($file_path); //open the file	  	      

	           //echo "<pre>";	          
	           $i = 0; 

                /**                  
                * Sheets Iterator. Kali aja multiple sheets                  
                **/	          
                foreach ($reader->getSheetIterator() as $sheet) {

                    //Rows iterator	               
                	foreach ($sheet->getRowIterator() as $row) {

                    	   //print_r($row); 
                		array_push($temp,$row);
                        //$string_kolom .= $row[$i].";";
	                 	//$temp += $row;
                		++$i;
                	}
                }

                //echo "<br> Total Rows : ".$i." <br>";	  	          
                $reader->close();


                //echo "Peak memory:", (memory_get_peak_usage(true) / 1024 / 1024), " MB" ,"<br>";

            } catch (Exception $e) {

            	echo $e->getMessage();
            	exit;	  
            }

            return $temp;
        }

        public function readExcelFile($piles, $type) {

         if($type == "csv"){
          $temp = $this->getAllRowsForFile($piles);

      }
      else{
          $temp = $this->readExcel($piles);
      }

      return $temp;
  }

  function submit_all($data, $save){
   $this->load->model('MUpload');
   $hit = $this->MUpload->new_upload($save);


   $instansi = $save['p_instansi_id'];
   $id_upload = $hit["out_id_upload"];
   $p_isi_data = "";
   $save_ins = array();
   $out = [];
   $temp=array();  


   if($hit["out_rowcount"] != 1){

    $out['out_rowcount'] = $hit["out_rowcount"];
    $out['msgerror'] = $hit["msgerror"];

    //array_push($temp,$out);
}
else{
    foreach ($data as $value) {

        foreach ($value as $key ) {

            $p_isi_data .= $key.";";

        }

        $save_ins['p_id_upload'] = $id_upload;
        $save_ins['p_isi_data'] = $p_isi_data;

        $ins_file = $this->MUpload->ins_file($save_ins);

        $p_isi_data = "";
        $save_ins = array();

        $out['out_rowcount'] = $ins_file["out_rowcount"];
        $out['msgerror'] = $ins_file["msgerror"];

        //array_push($temp,$out);
    }

    $save_rekap['p_id_upload'] = $id_upload;
    $save_rekap['p_instansi_id'] = $instansi;

    $rekap_upload = $this->MUpload->rekap_upload($save_rekap);

    $out['out_rowcount'] = $rekap_upload["out_rowcount"];
    $out['msgerror'] = $rekap_upload["msgerror"];
}



//print_r($temp);

echo json_encode($out);

}

function submit_all_lanjutan($data, $save){
    $this->load->model('MUpload');
    $hit = $this->MUpload->next_upload($save);

    $instansi = $save['p_instansi_id'];
    $id_upload = $save["p_id_upload"];
    $p_isi_data = "";
    $save_ins = array();
    $out = [];

    if($hit["out_rowcount"] != 1){

        $out['out_rowcount'] = $hit["out_rowcount"];
        $out['msgerror'] = $hit["msgerror"];

    }
    else{
        foreach ($data as $value) {

            foreach ($value as $key ) {

                $p_isi_data .= $key.";";

            }

            $save_ins['p_id_upload'] = $id_upload;
            $save_ins['p_isi_data'] = $p_isi_data;

            

            $ins_file = $this->MUpload->ins_file($save_ins);

            

            $p_isi_data = "";
            $save_ins = array();
        }

        $save_rekap['p_id_upload'] = $id_upload;
        $save_rekap['p_instansi_id'] = $instansi;

        $rekap_upload = $this->MUpload->rekap_upload($save_rekap);

        $out['out_rowcount'] = $rekap_upload["out_rowcount"];
        $out['msgerror'] = $rekap_upload["msgerror"];
    }

    echo json_encode($out);

}

function get_detil_temp_upload(){
    $this->load->model('Master_model');
    $hit = $this->Master_model->getDetilTempUpload();

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

    function get_temp_upload(){

        $p_created_by = "ERZAN";
        $this->load->model('Master_model');
        $main = $this->Master_model->get_upload_temp($p_created_by);
        $detil = $this->Master_model->get_upload_temp_detil($p_created_by);
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
                "KEGIATAN" => $key->KEGIATAN,
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


    //upload ulang / perubahan data

    function get_upload_ulang(){
        $this->load->model('MUploadUlang');
        $tada = $this->MUploadUlang->get_upload_ulang();

        echo json_encode($tada);
    }

    function get_upload_bad(){
        $this->load->model('MUploadUlang');
        $tada = $this->MUploadUlang->get_upload_bad();

        echo json_encode($tada);
        
    }


    function upload_file_ulang() {

        //upload file
      $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
      $config['allowed_types'] = 'csv|xlsx';
      $config['max_filename'] = '255';
      $config['encrypt_name'] = FALSE;
      $config['max_size'] = '1024000'; //1 GB
      $config['overwrite'] = TRUE;

        if (isset($_FILES['files']['name'])) {
            if (0 < $_FILES['files']['error']) {
                echo 'Error during file upload' . $_FILES['files']['error'];
            } else {
                // if (file_exists('uploads/' . $_FILES['files']['name'])) {
                //  echo 'File already exists : uploads/' . $_FILES['files']['name'];
                //  echo "<br>";
                // } else {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('files')) {
                echo $this->upload->display_errors();
            } else {
                        //echo "<pre>";
                        //var_dump($this->upload);
                        //echo $this->upload->upload_path;
                // echo 'File successfully uploaded : uploads/' . $_FILES['files']['name'];
                // echo "<br>";
            }

        }


        $path = $_FILES['files']['name'];

        $file = str_replace(' ', '_', $path);
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $piles = $this->upload->upload_path."".$file;

        $coba = $this->readExcelFile($piles, $ext);
        //print_r($coba);

        if($ext == 'csv'){
            $ext_fix = 'CSV';
        }
        else{
            $ext_fix = 'XLS';
        }

        $param = $this->input->post('param');

        $field = explode(',', $param);

        $instansi = $field[0];
        $id_upload = $field[1];
        $upload_ke = $field[2];

        //print_r($field[0]);

        //jenis
        // 1 = upload ulang
        // 2 = upload bad

        $save['p_id_upload'] = $id_upload;
        $save['p_instansi_id'] = $instansi;
        $save['p_nama_file'] = $_FILES['files']['name'];
        $save['p_jns_upload'] = $ext_fix;
        $save['p_upload_ke'] = $upload_ke;
        $save['p_create_by'] = "ERZAN";
        $save['jenis'] = $this->input->post('jenis');

        $this->submit_ulang($coba,$save);


    } else {
     echo 'Please choose a file';
 }
}

function submit_ulang($data, $save){
    $this->load->model('MUploadUlang');

    if($save["jenis"] == 1){
        $hit = $this->MUploadUlang->upload_ulang($save);
    }
    else{
        $hit = $this->MUploadUlang->upload_bad($save);
    }

    
    $instansi = $save['p_instansi_id'];
    $id_upload = $save["p_id_upload"];
    $upload_ke = $save["p_upload_ke"];
    $p_isi_data = "";
    $save_ins = array();
    $out = [];


    if($hit["out_rowcount"] != 1){

        $out['out_rowcount'] = $hit["out_rowcount"];
        $out['msgerror'] = $hit["msgerror"];

    }
    else{
        foreach ($data as $value) {

            foreach ($value as $key ) {

                $p_isi_data .= $key.";";

            }

            $save_ins['p_id_upload'] = $id_upload;
            $save_ins['p_isi_data'] = $p_isi_data;
            $save_ins['p_upload_ke'] = $upload_ke;

            

            $ins_file = $this->MUploadUlang->ins_file_ulang($save_ins);

            

            $p_isi_data = "";
            $save_ins = array();
        }

        $save_rekap['p_id_upload'] = $id_upload;
        $save_rekap['p_instansi_id'] = $instansi;
        $save_rekap['p_upload_ke'] = $upload_ke;

        $rekap_upload = $this->MUploadUlang->rekap_upload_ulang($save_rekap);

        $out['out_rowcount'] = $rekap_upload["out_rowcount"];
        $out['msgerror'] = $rekap_upload["msgerror"];
    }

    echo json_encode($out);

}


}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
