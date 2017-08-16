<?php

if (!defined('BASEPATH'))
	die();


require_once APPPATH.'/third_party/spout/src/Spout/Autoloader/autoload.php';

//lets Use the Spout Namespaces
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;


class Import extends CI_Controller {

	

	public function index() {

		$this->load->view('admin/include/header');
		$this->load->view('admin/export');
		$this->load->view('admin/include/footer');
	}

	public function readExcelFile() {

          try {
	          
               //Lokasi file excel	      
               $file_path = "./temp/2.xls";              	      
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

                    	   print_r($row); 
	                 
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

  }//end of function 

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
