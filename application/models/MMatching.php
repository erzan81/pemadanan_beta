<?php

class MMatching extends CI_Model {

   public function __construct()
   {
      parent::__construct();
   }

   function get_kolom_pemadanan($id_upload){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
      
        $p_id_upload = $id_upload;

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN.PKG_PEMADANAN.GET_KOLOM_PEMADANAN(:p_id_upload); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 100) or die('Error binding string1');
        oci_bind_by_name($stid, ':RetVal', $OUT_DATA,-1, OCI_B_CURSOR) or die('Error binding string1');


        if(oci_execute($stid)){
          oci_execute($OUT_DATA, OCI_DEFAULT);
          oci_fetch_all($OUT_DATA, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);          

          $results = $cursor;
 
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return json_decode(json_encode($results), FALSE);
    }

    
    public function metode_pemadanan($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_instansi_id = $save['p_instansi_id'];
        $p_id_upload = $save['p_id_upload'];
        $p_id_kolom = $save['p_id_kolom'];
        $p_is_proses = $save['p_is_proses'];
        $p_is_digit = $save['p_is_digit'];

        $p_metode = $save['p_metode'];
        $p_nilai = $save['p_nilai'];
        $p_atribut = $save['p_atribut'];
        $p_digit = $save['p_digit'];
        $p_create_by = $save['p_create_by'];
        $p_step_ke = $save['p_step_ke'];
           

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_PEMADANAN.METODE_PEMADANAN(:p_instansi_id, :p_id_upload, :p_id_kolom, :p_is_proses, :p_is_digit, :p_metode, :p_nilai, :p_atribut, :p_digit, :p_create_by, :p_step_ke, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 100) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_id_kolom', $p_id_kolom, 100) or die('Error binding string3');     
        oci_bind_by_name($stid, ':p_is_proses', $p_is_proses, 1000, SQLT_CHR) or die('Error binding string4');
        oci_bind_by_name($stid, ':p_is_digit', $p_is_digit, 100) or die('Error binding string5');     
        oci_bind_by_name($stid, ':p_metode', $p_metode, 100) or die('Error binding string6');     
        oci_bind_by_name($stid, ':p_nilai', $p_nilai, 1000, SQLT_CHR) or die('Error binding string7');
        oci_bind_by_name($stid, ':p_atribut', $p_atribut, 100) or die('Error binding string8');     
        oci_bind_by_name($stid, ':p_digit', $p_digit, 1000, SQLT_CHR) or die('Error binding string9');
        oci_bind_by_name($stid, ':p_step_ke', $p_step_ke, 1000, SQLT_CHR) or die('Error binding string9');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 100) or die('Error binding string10');     
        oci_bind_by_name($stid, ':out_rowcount', $OUT_ROWCOUNT,100) or die('Error binding string11');
        oci_bind_by_name($stid, ':msgerror', $OUT_MESSAGE,1000, SQLT_CHR) or die('Error binding string12');      

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

    function get_metode_pemadanan_detil($p_id_upload){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN.PKG_PEMADANAN.GET_METODE_PEMADANAN_DETIL(:p_id_upload); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload,100, SQLT_CHR) or die('Error binding string5');
        oci_bind_by_name($stid, ':RetVal', $OUT_DATA,-1, OCI_B_CURSOR) or die('Error binding string1');

        if(oci_execute($stid)){
          oci_execute($OUT_DATA, OCI_DEFAULT);
          oci_fetch_all($OUT_DATA, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);          

          $results = $cursor;
 
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return json_decode(json_encode($results), FALSE);
    }

    function get_metode_pemadanan($p_id_upload){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN.PKG_PEMADANAN.GET_METODE_PEMADANAN(:p_id_upload); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload,100, SQLT_CHR) or die('Error binding string5');
        oci_bind_by_name($stid, ':RetVal', $OUT_DATA,-1, OCI_B_CURSOR) or die('Error binding string1');

        if(oci_execute($stid)){
          oci_execute($OUT_DATA, OCI_DEFAULT);
          oci_fetch_all($OUT_DATA, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);          

          $results = $cursor;
 
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return json_decode(json_encode($results), FALSE);
    }


    function get_acuan_step($p_id_upload,$p_is_paralel, $p_step_ke){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN.PKG_PEMADANAN.GET_ACUAN_STEP(:p_id_upload, :p_is_paralel, :p_step_ke); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload,100, SQLT_CHR) or die('Error binding string5');
        oci_bind_by_name($stid, ':p_step_ke', $p_step_ke,100) or die('Error binding string5');
        oci_bind_by_name($stid, ':p_is_paralel', $p_is_paralel,100, SQLT_CHR) or die('Error binding string5');
        oci_bind_by_name($stid, ':RetVal', $OUT_DATA,-1, OCI_B_CURSOR) or die('Error binding string1');

        if(oci_execute($stid)){
          oci_execute($OUT_DATA, OCI_DEFAULT);
          oci_fetch_all($OUT_DATA, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);          

          $results = $cursor;
 
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return json_decode(json_encode($results), FALSE);
    }

    

    function get_step_ke($p_id_upload){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN.PKG_PEMADANAN.GET_STEP_KE(:p_id_upload); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload,100, SQLT_CHR) or die('Error binding string5');
        oci_bind_by_name($stid, ':RetVal', $OUT_DATA,-1, OCI_B_CURSOR) or die('Error binding string1');

        if(oci_execute($stid)){
          oci_execute($OUT_DATA, OCI_DEFAULT);
          oci_fetch_all($OUT_DATA, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);          

          $results = $cursor;
 
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return json_decode(json_encode($results), FALSE);
    }


   public function init_pemadanan($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_instansi_id = $save['p_instansi_id'];
        $p_id_upload = $save['p_id_upload'];
        $p_step_ke = $save['p_step_ke'];
        $p_step_acuan = $save['p_step_acuan'];
        $p_is_paralel = $save['p_is_paralel'];
        $p_create_by = $save['p_create_by'];
           

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_PEMADANAN.INIT_PEMADANAN(:p_instansi_id, :p_id_upload, :p_step_ke, :p_step_acuan, :p_is_paralel, :p_create_by, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 100) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_step_ke', $p_step_ke, 100) or die('Error binding string3');     
        oci_bind_by_name($stid, ':p_step_acuan', $p_step_acuan, 100) or die('Error binding string4');
        oci_bind_by_name($stid, ':p_is_paralel', $p_is_paralel, 100, SQLT_CHR) or die('Error binding string5');     
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 100 , SQLT_CHR) or die('Error binding string10');     
        oci_bind_by_name($stid, ':out_rowcount', $OUT_ROWCOUNT,100) or die('Error binding string11');
        oci_bind_by_name($stid, ':msgerror', $OUT_MESSAGE,1000, SQLT_CHR) or die('Error binding string12');      

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

}


