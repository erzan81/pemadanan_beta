<?php

class MStatistik extends CI_Model {

   public function __construct()
   {
      parent::__construct();
   }

   function get_stat_data_keluarga(){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_STATISTIK.STAT_DATA_KELUARGA(:p_kode_prop, :p_kode_kab, :p_kode_kec, :p_kode_kel, :p_start, :p_lenght, :p_sort_by, :p_sort_dir, :p_search); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        //$header = $_POST['header'];

        $p_kode_prop = $_POST['p_kode_prop'];
        $p_kode_kab = $_POST['p_kode_kab'];
        $p_kode_kec = $_POST['p_kode_kec'];
        $p_kode_kel = $_POST['p_kode_kel'];
        $p_start = (($_POST['start'] / $_POST['length']) + 1);
        $p_lenght = $_POST['length'];
        $p_sort_by = "";
        $p_sort_dir = "";
        $p_search = $_POST['search']['value'];

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':p_kode_prop', $p_kode_prop, 100) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_kode_kab', $p_kode_kab, 100, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_kode_kec', $p_kode_kec, 100, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_kode_kel', $p_kode_kel, 100, SQLT_CHR) or die('Error binding string2');
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

    function get_stat_jenis_kelamin(){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_STATISTIK.STAT_JENIS_KELAMIN(:p_kode_prop, :p_kode_kab, :p_kode_kec, :p_kode_kel, :p_start, :p_lenght, :p_sort_by, :p_sort_dir, :p_search); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        //$header = $_POST['header'];

        $p_kode_prop = $_POST['p_kode_prop'];
        $p_kode_kab = $_POST['p_kode_kab'];
        $p_kode_kec = $_POST['p_kode_kec'];
        $p_kode_kel = $_POST['p_kode_kel'];
        $p_start = (($_POST['start'] / $_POST['length']) + 1);
        $p_lenght = $_POST['length'];
        // $p_sort_by = $header[$_POST['order'][0]['column']];
        // $p_sort_dir = $_POST['order'][0]['dir'];
        $p_sort_by = "";
        $p_sort_dir = "";
        $p_search = $_POST['search']['value'];

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':p_kode_prop', $p_kode_prop, 100) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_kode_kab', $p_kode_kab, 100, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_kode_kec', $p_kode_kec, 100, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_kode_kel', $p_kode_kel, 100, SQLT_CHR) or die('Error binding string2');
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

    function get_stat_umur(){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_STATISTIK.STAT_UMUR(:p_umur, :p_start, :p_lenght, :p_sort_by, :p_sort_dir, :p_search); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        //$header = $_POST['header'];

        $p_umur = $_POST['p_umur'];
        $p_start = (($_POST['start'] / $_POST['length']) + 1);
        $p_lenght = $_POST['length'];
        // $p_sort_by = $header[$_POST['order'][0]['column']];
        // $p_sort_dir = $_POST['order'][0]['dir'];
        $p_sort_by = "";
        $p_sort_dir = "";
        $p_search = $_POST['search']['value'];

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':p_umur', $p_umur, 100) or die('Error binding string1');
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

    
   

    function get_stat_pendidikan(){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_STATISTIK.STAT_PENDIDIKAN(:p_pendidikan, :p_start, :p_lenght, :p_sort_by, :p_sort_dir, :p_search); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        //$header = $_POST['header'];

        $p_pendidikan = $_POST['p_pendidikan'];
        $p_start = (($_POST['start'] / $_POST['length']) + 1);
        $p_lenght = $_POST['length'];
        // $p_sort_by = $header[$_POST['order'][0]['column']];
        // $p_sort_dir = $_POST['order'][0]['dir'];
        $p_sort_by = "";
        $p_sort_dir = "";
        $p_search = $_POST['search']['value'];

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':p_pendidikan', $p_pendidikan, 100) or die('Error binding string1');
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


