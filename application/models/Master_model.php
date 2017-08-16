<?php

class Master_model extends CI_Model {

   public function __construct()
   {
      parent::__construct();
   }

   function get_ref_kolom(){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN.PKG_MASTER.GET_REF_KOLOM; END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        //Send parameters variable  value  lenght
        // oci_bind_by_name($stid, ':msg_error', $OUT_MESSAGE,100, SQLT_CHR) or die('Error binding string5');
        oci_bind_by_name($stid, ':RetVal', $OUT_DATA,-1, OCI_B_CURSOR) or die('Error binding string1');
        
       // oci_bind_by_name($stid, ':RetVal', $RetVal) or die('Error binding string2');
        //Bind Cursor     put -1

        if(oci_execute($stid)){
          oci_execute($OUT_DATA, OCI_DEFAULT);
          oci_fetch_all($OUT_DATA, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);          

          $results = $cursor;
          //print_r($cursor);  
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        //print_r($results);

        return json_decode(json_encode($results), FALSE);
    }

    function getInstansi(){
        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN.PKG_MASTER.GET_REF_INSTANSI; END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        //Send parameters variable  value  lenght
        // oci_bind_by_name($stid, ':msg_error', $OUT_MESSAGE,100, SQLT_CHR) or die('Error binding string5');
        oci_bind_by_name($stid, ':RetVal', $OUT_DATA,-1, OCI_B_CURSOR) or die('Error binding string1');
        
       // oci_bind_by_name($stid, ':RetVal', $RetVal) or die('Error binding string2');
        //Bind Cursor     put -1

        if(oci_execute($stid)){
          oci_execute($OUT_DATA, OCI_DEFAULT);
          oci_fetch_all($OUT_DATA, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);          

          $results = $cursor;
          //print_r($cursor);  
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        //print_r($results);

        return json_decode(json_encode($results), FALSE);
    }


    

}


