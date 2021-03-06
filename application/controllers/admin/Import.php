<?php

if (!defined('BASEPATH'))
	die();



class Import extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model('Master_model');
      //$this->load->database('pblmig', true);
      
  }

	public function index() {

    $this->load->model('MImport');

    $data['dmp'] = $this->MImport->get_table_dmp_file();
    $data['menu'] = $this->Master_model->get_menu();
		$this->load->view('admin/include/header', $data);
		$this->load->view('admin/import_dmp');
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



  function check_delete($file){
            $this->load->helper('file');
    
            $nama_file = basename($file, ".DMP").PHP_EOL;

            $path_dmp=FCPATH.'uploads/'.$file;
            $path_log=FCPATH.'uploads/'.$nama_file.'.log';

            $is_delete = 0;
           if (file_exists($path_dmp)) //file_exists of a url returns false.It should be real file path
               {    
                    
                    if(unlink($path_dmp)) {
                         unlink($path_log);
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

  function upload_ulang_dmp(){

    $this->load->model('MImport');

    $file = $this->input->post('p_nama_file');

    echo $_FILES['files']['name'];
    $cek = $this->check_delete($file);

    if($cek == 1){

        $nama_file = basename($file, ".DMP").PHP_EOL;
        $del = $this->MImport->drop_file_dmp($nama_file);

        if($del['out_rowcount'] != 0){

          $this->upload_file();

        }
        else{

          $out['out_rowcount'] = $del['out_rowcount'];
          $out['msgerror'] = $del['msgerror'];
          echo json_encode($out);

        }

    }
    else{
      $out['out_rowcount'] = 0;
      $out['msgerror'] = "Gagal Hapus File";
      echo json_encode($out);

    }

    


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
