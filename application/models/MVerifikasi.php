<?php

class MVerifikasi extends CI_Model {

   public function __construct()
   {
      parent::__construct();
   }

   public function merge_temp($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_id_upload = $save['p_id_upload'];
        $p_instansi_id = $save['p_instansi_id'];
        $p_create_by = $save['p_create_by'];  
        $p_ignore = $save['p_ignore'];

        //1 = ignore
        //0 = not ignore

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_VERIFIKASI.MERGE_TEMP(:p_instansi_id, :p_id_upload, :p_create_by, :p_ignore, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 100) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 100) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 100) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_ignore', $p_ignore, 100) or die('Error binding string2');
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

   public function insert_merge($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_id_upload = $save['p_id_upload'];
        $p_instansi_id = $save['p_instansi_id'];
        $p_nama_tab_ins = $save['p_nama_tab_ins'];
        $p_nama_tab_fail = $save['p_nama_tab_fail'];


        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_VERIFIKASI.INSERT_MERGE(:p_instansi_id, :p_id_upload, :p_create_by, :p_nama_tab_ins, :p_nama_tab_fail, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 100) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 100) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 100) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_nama_tab_ins', $p_nama_tab_ins, 100) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_nama_tab_fail', $p_nama_tab_fail, 100) or die('Error binding string2');
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

   public function rekap_merge($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_id_upload = $save['p_id_upload'];
        $p_instansi_id = $save['p_instansi_id'];

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_VERIFIKASI.REKAP_MERGE(:p_instansi_id, :p_id_upload, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 100) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 100) or die('Error binding string2');
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

   public function conf_cleansing($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_instansi_id = $save['p_instansi_id'];
        $p_id_upload = $save['p_id_upload'];
        $p_id_cleansing = $save['p_id_cleansing'];
        $p_id_kolom = $save['p_id_kolom'];
        $p_no_urut = $save['p_no_urut'];
        $p_create_by = $save['p_create_by'];

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_VERIFIKASI.CONF_CLEANSING(:p_instansi_id, :p_id_upload, :p_id_cleansing, :p_id_kolom, :p_no_urut, :p_create_by, :out_rowcount, :msgerror); END;');
        
        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 100) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 100) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_id_cleansing', $p_id_cleansing, 100) or die('Error binding string3');
        oci_bind_by_name($stid, ':p_id_kolom', $p_id_kolom, 100) or die('Error binding string4');
        oci_bind_by_name($stid, ':p_no_urut', $p_no_urut, 100) or die('Error binding string5');       
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 100) or die('Error binding string6');
        oci_bind_by_name($stid, ':out_rowcount', $OUT_ROWCOUNT,100, SQLT_CHR) or die('Error binding string7');
        oci_bind_by_name($stid, ':msgerror', $OUT_MESSAGE,4000, SQLT_CHR) or die('Error binding string8');      

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


   public function init_cleansing($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_id_upload = $save['p_id_upload'];
        $p_instansi_id = $save['p_instansi_id'];
        $p_create_by = $save['p_create_by'];  

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_VERIFIKASI.INIT_CLEANSING(:p_instansi_id, :p_id_upload, :p_create_by, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 100) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 100) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 100) or die('Error binding string2');
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
    
    public function rekap_clean($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_id_upload = $save['p_id_upload'];
        $p_instansi_id = $save['p_instansi_id'];

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN.PKG_VERIFIKASI.REKAP_CLEAN(:p_instansi_id, :p_id_upload, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 100) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 100) or die('Error binding string2');
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


}


