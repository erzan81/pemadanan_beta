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
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'csv|xlsx';
		$config['max_filename'] = '255';
		$config['encrypt_name'] = FALSE;
        $config['max_size'] = '1024000'; //1 GB
        $config['overwrite'] = TRUE;

        if (isset($_FILES['files']['name'])) {
        	if (0 < $_FILES['files']['error']) {
        		echo 'Error during file upload' . $_FILES['files']['error'];
        	} else {
        		if (file_exists('uploads/' . $_FILES['files']['name'])) {
        			echo 'File already exists : uploads/' . $_FILES['files']['name'];
        			echo "<br>";
        		} else {
        			$this->load->library('upload', $config);
        			if (!$this->upload->do_upload('files')) {
        				echo $this->upload->display_errors();
        			} else {
        				echo 'File successfully uploaded : uploads/' . $_FILES['files']['name'];
        				echo "<br>";
        			}
        		}
        	}

        	$path = $_FILES['files']['name'];
        	$ext = pathinfo($path, PATHINFO_EXTENSION);
        	$piles = './uploads/' . $_FILES['files']['name'];


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

        	$this->submit_all($coba,$save);


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
    	$allRows = [];
    	//$resourcePath = $this->getResourcePath($fileName);

    	/** @var \Box\Spout\Reader\CSV\Reader $reader */
    	$reader = ReaderFactory::create(Type::CSV);
    	$reader
    	->setFieldDelimiter($fieldDelimiter)
    	->setFieldEnclosure($fieldEnclosure)
    	->setEncoding($encoding)
    	->open($fileName);
    	echo "<pre>";	
    	foreach ($reader->getSheetIterator() as $sheetIndex => $sheet) {
    		foreach ($sheet->getRowIterator() as $rowIndex => $row) {

    			array_push($allRows,$row);
    			//$allRows[] = $row;
    		}
    	}

    	$reader->close();

    	//$object = json_decode(json_encode($allRows), FALSE);

    	return $allRows;
    }


    function readExcel($piles){
    	$temp=[];  
        $string_kolom;
    	try {
    			$file_path = $piles;              	      
               $reader = ReaderFactory::create(Type::XLSX); //set Type file xlsx
	           $reader->open($file_path); //open the file	  	      

	           echo "<pre>";	          
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

                echo "<br> Total Rows : ".$i." <br>";	  	          
                $reader->close();


                echo "Peak memory:", (memory_get_peak_usage(true) / 1024 / 1024), " MB" ,"<br>";

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

    //var_dump($hit["out_id_upload"]);
    $instansi = $save['p_instansi_id'];
    $id_upload = $hit["out_id_upload"];
    $p_isi_data = "";
    $save_ins = [];
    //print_r($save);


    //$str = implode(" ",$data[0]);
    foreach ($data as $value) {
        # code...
        foreach ($value as $key ) {
            //echo $key.";";
            //$cuy;
            $p_isi_data .= $key.";";

            # code...
        }
        
        $save_ins['p_id_upload'] = $id_upload;
        $save_ins['p_isi_data'] = $p_isi_data;

        print_r($save_ins);

        $ins_file = $this->MUpload->ins_file($save_ins);

        var_dump($ins_file);

        $p_isi_data = "";
        $save_ins = [];
    }

    $save_rekap['p_id_upload'] = $id_upload;
    $save_rekap['p_instansi_id'] = $instansi;

    $rekap_upload = $this->MUpload->rekap_upload($save_rekap);

    echo "<br><br>";
    echo "rekap <br> <br>";

    var_dump($rekap_upload);
    //print_r($data);

  }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
