<?php

class MMonitoring extends CI_Model {

   public function __construct()
   {
      parent::__construct();
   }

   function get_pemadanan_now($p_user_id){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_MONITORING.GET_PEMADANAN_NOW(:p_user_id); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        oci_bind_by_name($stid, ':p_user_id', $p_user_id,100, SQLT_CHR) or die('Error binding string5');
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

    function get_pemadanan_now_detil($p_id_upload){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_MONITORING.GET_PEMADANAN_NOW_DETIL(:p_id_upload); END;');

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

    function get_pemadanan_finish($p_user_id){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_MONITORING.GET_PEMADANAN_FINISH(:p_user_id); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        oci_bind_by_name($stid, ':p_user_id', $p_user_id,100, SQLT_CHR) or die('Error binding string5');
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
    

    function get_pemadanan_finish_detil($p_id_upload){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_MONITORING.GET_PEMADANAN_FINISH_DETIL(:p_id_upload); END;');

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

    function get_pemadanan_now_detil_pss(){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_MONITORING.GET_PEMADANAN_NOW_DETIL_PSS(:p_nama_table, :p_start, :p_lenght, :p_sort_by, :p_sort_dir, :p_search); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        $header = $_POST['header'];

        //$p_nama_table = $_POST['p_nama_table'];
        $p_nama_table = "T_PMD_137_14112017_0501";
        $p_start = (($_POST['start'] / $_POST['length']) + 1);
        $p_lenght = $_POST['length'];
        $p_sort_by = $header[$_POST['order'][0]['column']];
        $p_sort_dir = $_POST['order'][0]['dir'];
        $p_search = $_POST['search']['value'];

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':p_nama_table', $p_nama_table, 100, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_start', $p_start, 20) or die('Error binding string3');
        oci_bind_by_name($stid, ':p_lenght', $p_lenght, 100, SQLT_CHR) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_sort_by', $p_sort_by, 20, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_sort_dir', $p_sort_dir,100, SQLT_CHR) or die('Error binding string4');
        oci_bind_by_name($stid, ':p_search', $p_search,100, SQLT_CHR) or die('Error binding string5');
        
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

        return $results;
    }
        

}


