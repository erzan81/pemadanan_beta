<?php

class MKolom extends CI_Model {

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

    public function ins_kolom($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_id_kolom = $save['p_id_kolom'];
        $p_tipe_kolom = $save['p_tipe_kolom'];
        $p_size_kolom = $save['p_size_kolom'];
        $p_keterangan = $save['p_keterangan'];
        $p_create_by = $save['p_create_by'];
           
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_MASTER.INS_KOLOM(:p_id_kolom, :p_tipe_kolom, :p_size_kolom, :p_keterangan, :p_create_by, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_id_kolom', $p_id_kolom, 1000, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_tipe_kolom', $p_tipe_kolom, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_size_kolom', $p_size_kolom, 1000, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_keterangan', $p_keterangan, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 1000, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':out_rowcount', $OUT_ROWCOUNT,100) or die('Error binding string3');
        oci_bind_by_name($stid, ':msgerror', $OUT_MESSAGE,1000, SQLT_CHR) or die('Error binding string4');      

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

    public function upd_kolom($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_id_kolom = $save['p_id_kolom'];
        $p_tipe_kolom = $save['p_tipe_kolom'];
        $p_size_kolom = $save['p_size_kolom'];
        $p_keterangan = $save['p_keterangan'];
        $p_create_by = $save['p_create_by'];
           
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_MASTER.UPD_KOLOM(:p_id_kolom, :p_tipe_kolom, :p_size_kolom, :p_keterangan, :p_create_by, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_id_kolom', $p_id_kolom, 1000, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_tipe_kolom', $p_tipe_kolom, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_size_kolom', $p_size_kolom, 1000, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_keterangan', $p_keterangan, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 1000, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':out_rowcount', $OUT_ROWCOUNT,100) or die('Error binding string3');
        oci_bind_by_name($stid, ':msgerror', $OUT_MESSAGE,1000, SQLT_CHR) or die('Error binding string4');      

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

    public function del_kolom($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_id_kolom = $save['p_id_kolom'];
        $p_create_by = $save['p_create_by'];
           
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_MASTER.DEL_KOLOM(:p_id_kolom, :p_create_by, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_id_kolom', $p_id_kolom, 1000, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 1000, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':out_rowcount', $OUT_ROWCOUNT,100) or die('Error binding string3');
        oci_bind_by_name($stid, ':msgerror', $OUT_MESSAGE,1000, SQLT_CHR) or die('Error binding string4');      

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


