<?php

class MImport extends CI_Model {

   public function __construct()
   {
      parent::__construct();
   }


   function get_table_dmp_file(){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_UPLOAD.GET_TABLE_DMP_FILE; END;');

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


    function ins_file_dmp($p_nama_file){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_UPLOAD.INS_FILE_DMP(:p_nama_file, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_nama_file', $p_nama_file, 100) or die('Error binding string1');           
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

    function drop_file_dmp($p_nama_file){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_UPLOAD.DROP_FILE_DMP(:p_nama_file, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_nama_file', $p_nama_file, 100) or die('Error binding string1');           
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


