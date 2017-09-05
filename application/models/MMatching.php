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


}


