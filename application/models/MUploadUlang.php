<?php

class MUploadUlang extends CI_Model {

   public function __construct()
   {
      parent::__construct();
   }


   public function upload_ulang($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_instansi_id = $save['p_instansi_id'];
        $p_id_upload = $save['p_id_upload'];
        $p_nama_file = $save['p_nama_file'];
        $p_upload_ke = $save['p_upload_ke'];
        $p_jns_upload = $save['p_jns_upload'];
        $p_create_by = $save['p_create_by'];


        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PKG_UPLOAD.UPLOAD_ULANG(:p_instansi_id, :p_id_upload, :p_nama_file, :p_upload_ke, :p_jns_upload, :p_create_by, :out_rowcount, :msgerror, :out_id_upload); END;');


        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 20) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 100, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_nama_file', $p_nama_file, 1000, SQLT_CHR) or die('Error binding string3');
        oci_bind_by_name($stid, ':p_upload_ke', $p_upload_ke, 100, SQLT_CHR) or die('Error binding string4');
        oci_bind_by_name($stid, ':p_jns_upload', $p_jns_upload, 20, SQLT_CHR) or die('Error binding string5');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 1000, SQLT_CHR) or die('Error binding string6');
        oci_bind_by_name($stid, ':out_id_upload', $out_id_upload,100, SQLT_CHR) or die('Error binding string7');
        oci_bind_by_name($stid, ':msgerror', $msgerror,4000, SQLT_CHR) or die('Error binding string8');
        oci_bind_by_name($stid, ':out_rowcount', $out_rowcount,100, SQLT_CHR) or die('Error binding string9');

        if(oci_execute($stid)){
            $results['out_rowcount'] = $out_rowcount;
            $results['msgerror'] = $msgerror;
            $results['out_id_upload'] = $out_id_upload;

        }else{
            $e = oci_error($stid);
            $results =  $e['message'];
        }

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return $results;
    }

    public function upload_bad($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_instansi_id = $save['p_instansi_id'];
        $p_id_upload = $save['p_id_upload'];
        $p_upload_ke = $save['p_upload_ke'];
        $p_create_by = $save['p_create_by'];


        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PKG_UPLOAD.UPLOAD_BAD(:p_instansi_id, :p_id_upload, :p_upload_ke,  :p_create_by, :out_rowcount, :msgerror, :out_id_upload); END;');


        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 20) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 100, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_upload_ke', $p_upload_ke, 100, SQLT_CHR) or die('Error binding string4');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 1000, SQLT_CHR) or die('Error binding string6');
        oci_bind_by_name($stid, ':out_id_upload', $out_id_upload,100, SQLT_CHR) or die('Error binding string7');
        oci_bind_by_name($stid, ':msgerror', $msgerror,4000, SQLT_CHR) or die('Error binding string8');
        oci_bind_by_name($stid, ':out_rowcount', $out_rowcount,100) or die('Error binding string9');

        if(oci_execute($stid)){
            $results['out_rowcount'] = $out_rowcount;
            $results['msgerror'] = $msgerror;
            $results['out_id_upload'] = $out_id_upload;

        }else{
            $e = oci_error($stid);
            $results =  $e['message'];
        }

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return $results;
    }


   public function ins_file_ulang($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_id_upload = $save['p_id_upload'];
        $p_isi_data = $save['p_isi_data'];
        $p_upload_ke = $save['p_upload_ke'];
           
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_UPLOAD.INS_FILE_ULANG(:p_id_upload, :p_isi_data, :p_upload_ke, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 100) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_isi_data', $p_isi_data, 1000) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_upload_ke', $p_upload_ke, 100) or die('Error binding string2');
        oci_bind_by_name($stid, ':out_rowcount', $OUT_ROWCOUNT,100, SQLT_CHR) or die('Error binding string3');
        oci_bind_by_name($stid, ':msgerror', $OUT_MESSAGE,4000, SQLT_CHR) or die('Error binding string4');      

        if(oci_execute($stid)){
            $results['out_rowcount'] = $OUT_ROWCOUNT;
            $results['msgerror'] = $OUT_MESSAGE;
        }else{
             $e = oci_error($stid);
             $results =  $e['message'];
        }

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return $results;
    }


    public function rekap_upload_ulang($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_instansi_id = $save['p_instansi_id'];
        $p_id_upload = $save['p_id_upload'];
        $p_upload_ke = $save['p_upload_ke'];
           

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_UPLOAD.REKAP_UPLOAD_ULANG(:p_instansi_id, :p_id_upload, :p_upload_ke, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 100) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 1000) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_upload_ke', $p_upload_ke, 100) or die('Error binding string2');
        oci_bind_by_name($stid, ':out_rowcount', $OUT_ROWCOUNT,100, SQLT_CHR) or die('Error binding string3');
        oci_bind_by_name($stid, ':msgerror', $OUT_MESSAGE,4000, SQLT_CHR) or die('Error binding string4');      

        if(oci_execute($stid)){
            $results['out_rowcount'] = $OUT_ROWCOUNT;
            $results['msgerror'] = $OUT_MESSAGE;
        }else{
             $e = oci_error($stid);
             $results =  $e['message'];
        }

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return $results;
    }


    //GET UPLOAD ULANG


    function get_upload_ulang(){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
        
        // $p_instansi_id = $_POST['p_instansi_id'];
        // $p_id_upload = $_POST['p_id_upload'];

        $p_create_by = "ERZAN";

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN.PKG_UPLOAD.GET_UPLOAD_ULANG(:p_create_by); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        oci_bind_by_name($stid, ':p_create_by', $p_create_by,100, SQLT_CHR) or die('Error binding string1');
        oci_bind_by_name($stid, ':RetVal', $OUT_DATA,-1, OCI_B_CURSOR) or die('Error binding string3');


        if(oci_execute($stid)){

          oci_execute($OUT_DATA, OCI_DEFAULT);
          oci_fetch_all($OUT_DATA, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);  
          
         $results= $cursor;
          
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return json_decode(json_encode($results), FALSE);
    }

    function get_upload_bad(){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
        
        $p_create_by = "ERZAN";

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN.PKG_UPLOAD.GET_UPLOAD_BAD(:p_create_by); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        oci_bind_by_name($stid, ':p_create_by', $p_create_by,100, SQLT_CHR) or die('Error binding string1');
        oci_bind_by_name($stid, ':RetVal', $OUT_DATA,-1, OCI_B_CURSOR) or die('Error binding string3');


        if(oci_execute($stid)){

          oci_execute($OUT_DATA, OCI_DEFAULT);
          oci_fetch_all($OUT_DATA, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);  
          
         $results= $cursor;
          
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return json_decode(json_encode($results), FALSE);
    }
    

}


