<?php

//include('CSV.php');

if (!defined('BASEPATH'))
	die();

require_once APPPATH.'/third_party/spout/src/Spout/Autoloader/autoload.php';
require_once APPPATH.'/libraries/CSV.php';

require_once APPPATH.'/libraries/Logging.php';
require_once APPPATH.'/third_party/Cocur/src/BackgroundProcess.php';

//lets Use the Spout Namespaces
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
use Box\Spout\Common\Helper\EncodingHelper;
use Box\Spout\TestUsingResource;

use Cocur\BackgroundProcess\BackgroundProcess;

class Source extends CI_Controller {

    function coba_aja(){

        $temp1=array();  
        $temp2=array();
        $temp_all = array();
        $string_kolom;
        try {
            $piles = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/1.xlsx";
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

                    //Rows iterato
                    //$jml_data = count($sheet->getRowIterator());               
                    foreach ($sheet->getRowIterator() as $row) {

                        if($i % 2 == 0){

                            array_push($temp1,$row);
                        }
                        else{
                            array_push($temp2,$row);

                        }
                        
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
            array_push($temp_all,$temp1);
            array_push($temp_all,$temp2);

            echo "<pre>";
            print_r($temp_all[0]);

    }

    function coba_bp(){

        $process = new BackgroundProcess('sleep 100');
        $process->run();

        $log = new Logging();
 
        $path = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/mylog_123.txt";
        $path_excel = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/1.xlsx";
        $data_excel = $this->readExcel($path_excel);
        $j = 1;
        $log->lwrite('total data : '. $path_excel);
            

            for ($i=0; $i < 100; $i++) { 
                if ($process->isRunning()) {
                    //echo '.';
                    $data = array(
                        'test_aja' => "test - ".$j,
                        'masuk_ngaa' => "masuk - ".$j
                    );
                    $this->db->insert('erzan', $data);


                    // set path and name of log file (optional)
                    $log->lfile($path);
                     
                    // write message to the log file
                    $log->lwrite('data ke - '. $j);
                    
                     
                    //close log file
                    $log->lclose();

                    //sleep(1);
                    $j++;

                }
            }
                //echo sprintf('Crunching numbers in process %d', $process->getPid());
                
                
                //$process->stop();
                //echo "<br>";
                
            
             
             //echo "total data : ".count($data_excel);
        $log->lwrite('total data : '. count($data_excel));
        $log->lwrite('Done');
        $log->lclose();
        echo "\nDone.\n";
        $process->stop();
    }

	public function index() {

        $this->load->model('Master_model');
        $data['menu'] = $this->Master_model->get_menu();

        $data['instansi'] = $this->Master_model->getInstansi();
        $data['kolom'] = $this->Master_model->get_ref_kolom();
        $data['dmp'] = $this->Master_model->get_table_dmp();

        
        $this->load->view('admin/include/header',$data);
        $this->load->view('admin/upload_source');
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
        $save['p_create_by'] = $this->session->userdata('user_id');
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

                $out['out_rowcount'] = 0;
                $out['msgerror'] = 'Error during file upload' . $_FILES['files']['error'];

                echo json_encode($out);
                //echo 'Error during file upload' . $_FILES['files']['error'];
            } else {
                // if (file_exists('uploads/' . $_FILES['files']['name'])) {
                //  echo 'File already exists : uploads/' . $_FILES['files']['name'];
                //  echo "<br>";
                // } else {
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('files')) {

                    $out['out_rowcount'] = 0;
                    $out['msgerror'] = $this->upload->display_errors();

                    echo json_encode($out);
                    //echo $this->upload->display_errors();
                } else {


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
                    $save['p_create_by'] = $this->session->userdata('user_id');

                    $this->submit_all_lanjutan($coba,$save);

                    //echo 'File successfully uploaded : uploads/' . $_FILES['files']['name'];
                    //echo "<br>";
                }
                
            }

            


        } else {
            $out['out_rowcount'] = 0;
            $out['msgerror'] = 'Please choose a file';

            echo json_encode($out);
        }

        
    }


    public function getAllRowsForFile($fileName)
    {
    	
        ini_set('max_execution_time', 0);
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

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

    	$temp=array();  
        $temp2=array();
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

                    //Rows iterato
                    //$jml_data = count($sheet->getRowIterator());               
                	foreach ($sheet->getRowIterator() as $row) {

                        array_push($temp,$row);
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

   ini_set('max_execution_time', 0); // to get unlimited php script execution time
   ini_set('memory_limit', '-1');
   $this->load->model('MUpload');
   $hit = $this->MUpload->new_upload($save);

   $j=0;
   $instansi = $save['p_instansi_id'];
   $id_upload = $hit["out_id_upload"];
   $p_isi_data = "";
   $save_ins = array();
   $out = [];
   $temp=array();  

   $path_log = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/mylog_".$id_upload.".txt";
   $process = new BackgroundProcess('sleep '.count($data));
   $process->run();

   $log = new Logging();

   if($hit["out_rowcount"] != 1){

    $out['out_rowcount'] = $hit["out_rowcount"];
    $out['msgerror'] = $hit["msgerror"];
    $out['function'] = "new_upload";

    //array_push($temp,$out);
    }
    else{
        foreach ($data as $value) {

            foreach ($value as $key ) {

                $p_isi_data .= $key.";";

            }


           if ($process->isRunning()) {
                    //echo '.';
                    
                    $log->lfile($path_log);
                    
                    $save_ins['p_id_upload'] = $id_upload;
                    $save_ins['p_isi_data'] = $p_isi_data;

                    $ins_file = $this->MUpload->ins_file($save_ins);

                    if($ins_file['out_rowcount'] != 1){

                            $out['out_rowcount'] = $ins_file["out_rowcount"];
                            $out['msgerror'] = $ins_file["msgerror"];
                            $out['function'] = "break ins_file";

                            $log->lwrite('ERROR : '. $out['msgerror']);
                            break;
                            

                        }

                    $p_isi_data = "";
                    $save_ins = array();

                    $out['out_rowcount'] = $ins_file["out_rowcount"];
                    $out['msgerror'] = $ins_file["msgerror"];
                    $out['function'] = "ins_file";


                    // write message to the log file
                    $log->lwrite('data ke - '. $j++);
                    

                     
                    //close log file
                    $log->lclose();

                    //usleep(100);
                    

            }

            
            //array_push($temp,$out);
        }

        if($ins_file['out_rowcount'] != 1){

            $out;

            $log->lwrite('ERROR : '. $out['msgerror']);
            $log->lclose();

        }
        else{

            $save_rekap['p_id_upload'] = $id_upload;
            $save_rekap['p_instansi_id'] = $instansi;

            $rekap_upload = $this->MUpload->rekap_upload($save_rekap);

            $out['out_rowcount'] = $rekap_upload["out_rowcount"];
            $out['msgerror'] = $rekap_upload["msgerror"];
            $out['function'] = "rekap_upload";

            $log->lwrite('REKAP - BERHASIL');

        }


        
    }

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
        $out['function'] = "next_upload";

    }
    else{
        foreach ($data as $value) {

            foreach ($value as $key ) {

                $p_isi_data .= $key.";";

            }

            

            $save_ins['p_id_upload'] = $id_upload;
            $save_ins['p_isi_data'] = $p_isi_data;

            $ins_file = $this->MUpload->ins_file($save_ins);

            if($ins_file['out_rowcount'] != 1){

                $out['out_rowcount'] = $ins_file["out_rowcount"];
                $out['msgerror'] = $ins_file["msgerror"];
                $out['function'] = "ins_file";

                break;
                

            }
        
            $p_isi_data = "";
            $save_ins = array();
        }

        if($ins_file['out_rowcount'] != 1){

            $out;
        }
        else{
            $save_rekap['p_id_upload'] = $id_upload;
            $save_rekap['p_instansi_id'] = $instansi;

            $rekap_upload = $this->MUpload->rekap_upload($save_rekap);

            $out['out_rowcount'] = $rekap_upload["out_rowcount"];
            $out['msgerror'] = $rekap_upload["msgerror"];
            $out['function'] = "rekap_upload";

            $out;
        }
        
    }


    $log->lwrite('total data : '. count($data));
    $log->lwrite('Done');
    $log->lclose();
    
    $process->stop();
    
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

        $p_created_by = $this->session->userdata('user_id');
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
        $save['p_create_by'] = $this->session->userdata('user_id');
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

function submit_upload_dmp(){
        $this->load->model('MUploadDmp');

        $file = $this->input->post('p_nama_file');

        $save['p_instansi_id'] = $this->input->post('p_instansi_id');
        $save['p_nama_file'] = $file;
        $save['p_jns_upload'] = "DMP";
        $save['p_kolom'] = $this->input->post('p_kolom');
        $save['p_create_by'] = $this->session->userdata('user_id');
        $save['p_kegiatan'] = $this->input->post('p_kegiatan');

        $dmp = $this->MUploadDmp->new_upload_dmp($save);

        if($dmp["out_rowcount"] == 0){
            $out['out_rowcount'] = $dmp["out_rowcount"];
            $out['msgerror'] = $dmp["msgerror"];
            $out['function'] = "new_upload_dmp";
        }
        else{

            $save_ins['p_id_upload'] = $dmp["out_id_upload"];
            $save_ins['p_tabel_dmp'] = $file;
            $save_ins['p_create_by'] = $this->session->userdata('user_id');
            $save_ins['p_kegiatan'] = $this->input->post('p_kegiatan');


            $ins = $this->MUploadDmp->ins_from_dmp($save_ins);

                $out['out_rowcount'] = $dmp["out_rowcount"];
                $out['msgerror'] = $dmp["msgerror"];
                $out['function'] = "ins_upload_dmp";

        }

        echo json_encode($out);

}


function submit_upload_dmp_lanjutan(){
     

     $this->load->model('MUploadDmp');

        $file = $this->input->post('p_nama_file');

        $save['p_instansi_id'] = $this->input->post('p_instansi_id');
        $save['p_nama_file'] = $file;
        $save['p_jns_upload'] = "DMP";
        $save['p_create_by'] = $this->session->userdata('user_id');
        $save['p_id_upload'] = $this->input->post('p_id_upload');

        $dmp = $this->MUploadDmp->next_upload_dmp($save);

        if($dmp["out_rowcount"] == 0){
            $out['out_rowcount'] = $dmp["out_rowcount"];
            $out['msgerror'] = $dmp["msgerror"];
            $out['function'] = "next_upload_dmp";
        }
        else{

            $save_ins['p_id_upload'] = $this->input->post('p_id_upload');
            $save_ins['p_tabel_dmp'] = $file;
            $save_ins['p_create_by'] = $this->session->userdata('user_id');
            $save_ins['p_kegiatan'] = $this->input->post('p_kegiatan');


            $ins = $this->MUploadDmp->ins_from_dmp($save_ins);

                $out['out_rowcount'] = $dmp["out_rowcount"];
                $out['msgerror'] = $dmp["msgerror"];
                $out['function'] = "ins_upload_dmp";

        }

        echo json_encode($out);   

}



}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
