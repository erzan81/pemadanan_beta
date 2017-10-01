<?php

class MInstansi extends CI_Model {

   public function __construct()
   {
      parent::__construct();
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

    public function ins_instansi($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_instansi_nama = $save['p_instansi_nama'];
        $p_instansi_ket = $save['p_instansi_ket'];
        $p_instansi_alamat = $save['p_instansi_alamat'];
        $p_instansi_telp = $save['p_instansi_telp'];
        $p_create_by = $save['p_create_by'];
        $p_path_file = $save['p_path_file'];
           
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_MASTER.INS_INSTANSI(:p_instansi_nama, :p_instansi_ket, :p_instansi_alamat, :p_instansi_telp, :p_create_by, :p_path_file, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_instansi_nama', $p_instansi_nama, 1000, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_instansi_ket', $p_instansi_ket, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_instansi_alamat', $p_instansi_alamat, 1000, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_instansi_telp', $p_instansi_telp, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 1000, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_path_file', $p_path_file, 1000, SQLT_CHR) or die('Error binding string1');     
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

    public function upd_instansi($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }


        $p_instansi_id = $save['p_instansi_id'];
        $p_instansi_nama = $save['p_instansi_nama'];
        $p_instansi_ket = $save['p_instansi_ket'];
        $p_instansi_alamat = $save['p_instansi_alamat'];
        $p_instansi_telp = $save['p_instansi_telp'];
        $p_instansi_status = $save['p_instansi_status'];
        $p_create_by = $save['p_create_by'];
        $p_path_file = $save['p_path_file'];

           
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_MASTER.UPD_INSTANSI(:p_instansi_id, :p_instansi_nama, :p_instansi_ket, :p_instansi_alamat, :p_instansi_telp, :p_instansi_status, :p_create_by, :p_path_file, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 1000, SQLT_CHR) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_instansi_nama', $p_instansi_nama, 1000, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_instansi_ket', $p_instansi_ket, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_instansi_alamat', $p_instansi_alamat, 1000, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_instansi_telp', $p_instansi_telp, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_instansi_status', $p_instansi_status, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 1000, SQLT_CHR) or die('Error binding string1');  
        oci_bind_by_name($stid, ':p_path_file', $p_path_file, 1000, SQLT_CHR) or die('Error binding string1');     
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


    public function del_instansi($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_instansi_id = $save['p_instansi_id'];
        $p_create_by = $save['p_create_by'];
           
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_MASTER.DEL_INSTANSI(:p_instansi_id, :p_create_by, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 1000, SQLT_CHR) or die('Error binding string1');     
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


