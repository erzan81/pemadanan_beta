<?php

class MExport extends CI_Model {

   public function __construct()
   {
      parent::__construct();
   }


   function get_list_export(){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_EXPORT.GET_LIST_EXPORT; END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

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

    function get_list_detil(){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_EXPORT.GET_LIST_DETIL; END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

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

    function exp_single($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_instansi_id = $save['p_instansi_id'];
        $p_id_upload = $save['p_id_upload'];
        $p_step_ke = $save['p_step_ke'];
        $p_nama_tabel = $save['p_nama_tabel'];
        $p_jenis_file = $save['p_jenis_file'];

        
           

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_EXPORT.EXP_SINGLE(:p_instansi_id, :p_id_upload, :p_step_ke, :p_nama_tabel, :p_jenis_file, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 100) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_step_ke', $p_step_ke, 100) or die('Error binding string3');     
        oci_bind_by_name($stid, ':p_nama_tabel', $p_nama_tabel, 1000, SQLT_CHR) or die('Error binding string4');
        oci_bind_by_name($stid, ':p_jenis_file', $p_jenis_file, 100) or die('Error binding string5');         
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


    function exp_all($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_instansi_id = $save['p_instansi_id'];
        $p_id_upload = $save['p_id_upload'];
        $p_jenis_file = $save['p_jenis_file'];
        //$p_is_ulang = $save['p_is_ulang'];
        $p_create_by = $save['p_create_by'];


        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_EXPORT.EXP_ALL(:p_instansi_id, :p_id_upload, :p_jenis_file, :p_create_by, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 100) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_jenis_file', $p_jenis_file, 100) or die('Error binding string3');     
        //oci_bind_by_name($stid, ':p_is_ulang', $p_is_ulang, 1000, SQLT_CHR) or die('Error binding string4');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 100) or die('Error binding string5');         
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


