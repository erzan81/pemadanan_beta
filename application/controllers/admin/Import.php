<?php

if (!defined('BASEPATH'))
	die();



class Import extends CI_Controller {

	

	public function index() {

    $this->load->model('MImport');

    $data['dmp'] = $this->MImport->get_table_dmp_file();

    


		$this->load->view('admin/include/header');
		$this->load->view('admin/import_dmp', $data);
		$this->load->view('admin/include/footer');
	}

  function get_table_dmp(){

    $this->load->model('Master_model');

    $data['dmp'] = $this->Master_model->get_table_dmp();


    echo "<pre>";
    print_r($data);
  }


  public function load_file()
  {
    // you need to load the url helper to call base_url()
    $this->load->helper("url");
    $file = 'installActions2017-02-18_05-32-54PM.log';
    $test = basename($file, ".log").PHP_EOL;
    // you can change the location of your file wherever you want
    //$MyFile = file_get_contents($file);
    echo $file. "<br>";
    echo $test;
    //etc...
  }

  function upload_file() {

        //upload file
      $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
      $config['allowed_types'] = 'dmp';
      $config['max_filename'] = '255';
      $config['encrypt_name'] = FALSE;
      $config['overwrite'] = FALSE;

        if (isset($_FILES['files']['name'])) {
          if (0 < $_FILES['files']['error']) {
            
            $out['out_rowcount'] = 0;
            $out['msgerror'] = 'Error during file upload' . $_FILES['files']['error'];
          } 
          else {
            if (file_exists('uploads/' . $_FILES['files']['name'])) 
            {

               $out['out_rowcount'] = 0;
               $out['msgerror'] = 'File already exists : ' . $_FILES['files']['name'];
               
            } 
            else {
               $this->load->library('upload', $config);
                  if (!$this->upload->do_upload('files')) 
                  {

                      $out['out_rowcount'] = 0;
                      $out['msgerror'] = $this->upload->display_errors();
                      
                  } 
                  else 
                  {

                      $this->load->model('MImport');

                      $path = $_FILES['files']['name'];

                      $save = $this->MImport->ins_file_dmp($path);

                      //if($save['out_rowcount'] != 0){

                        $path = $_FILES['files']['name'];

                        $file = str_replace(' ', '_', $path);
                        $piles = $this->upload->upload_path."".$file;
                        
                        $log = basename($path, ".DMP").PHP_EOL;
                        $fix_log = $this->upload->upload_path."".$log.".LOG";
                        $log_dmp = preg_replace( "/\r|\n/", "", $fix_log );



                        $perintah = "imp userid=PEMADANAN_DATA/12345678@KONOHA FILE=".$piles." LOG=".$log_dmp." ignore=Y full=Y 2>&1";

                        //imp userid=PEMADANAN_DATA/12345678@konoha FILE=D:\dmp123\tes2.DMP LOG=D:\dmp123\tes2.log ignore=Y full=Y
                        exec($perintah, $v, $o);

                        $out['out_rowcount'] = 1;
                        $out['msgerror'] = 'File successfully uploaded : ' . $_FILES['files']['name'];
                        $out['perintah_o'] = $o;
                        $out['perintah_v'] = $v[0];
                        //$out['perintah_cmd'] = $perintah;

                        //echo $perintah;

                      //}

                      
                        
                 

            }

        } 
      }

      
     }
     else 
          {
            $out['out_rowcount'] = 0;
            $out['msgerror'] = 'Please choose a file';
            
          }

          echo json_encode($out);



  }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
