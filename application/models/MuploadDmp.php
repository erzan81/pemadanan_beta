<?php

class MUploadDmp extends CI_Model {

   public function __construct()
   {
      parent::__construct();
   }

   public function ins_file_dmp($p_nama_file){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_UPLOAD.INS_FILE_DMP(:p_nama_file, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_nama_file', $p_nama_file, 100) or die('Error binding string1');
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

     
     public function ins_from_dmp($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_UPLOAD.INS_FROM_DMP(:p_id_upload, :p_tabel_dmp, :p_create_by, :p_kegiatan, :out_rowcount, :msgerror, :out_id_upload); END;');
        
        $p_id_upload = $save['p_id_upload'];
        $p_tabel_dmp = $save['p_tabel_dmp'];
        $p_create_by = $save['p_create_by'];
        $p_kegiatan = $save['p_kegiatan'];

        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 100) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_tabel_dmp', $p_tabel_dmp, 100) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 100) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_kegiatan', $p_kegiatan, 100) or die('Error binding string1');
        oci_bind_by_name($stid, ':out_id_upload', $out_id_upload, 100) or die('Error binding string1');
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

   public function new_upload_dmp($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_instansi_id = $save['p_instansi_id'];
        $p_nama_file = $save['p_nama_file'];
        $p_jns_upload = $save['p_jns_upload'];
        $p_kolom = $save['p_kolom'];
        $p_create_by = $save['p_create_by'];
        $p_kegiatan = $save['p_kegiatan'];


        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_UPLOAD.NEW_UPLOAD_DMP(:p_instansi_id, :p_nama_file, :p_jns_upload, :p_kolom, :p_create_by, :p_kegiatan, :out_rowcount, :msgerror, :out_id_upload); END;');

        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 20) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_nama_file', $p_nama_file, 100, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_jns_upload', $p_jns_upload, 20, SQLT_CHR) or die('Error binding string3');
        oci_bind_by_name($stid, ':p_kolom', $p_kolom, 100, SQLT_CHR) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 20, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_kegiatan', $p_kegiatan, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':out_id_upload', $out_id_upload,100, SQLT_CHR) or die('Error binding string4');
        oci_bind_by_name($stid, ':msgerror', $msgerror,1000, SQLT_CHR) or die('Error binding string5');
        oci_bind_by_name($stid, ':out_rowcount', $out_rowcount,100) or die('Error binding string5');

        if(oci_execute($stid)){
            $results['out_rowcount'] = $out_rowcount;
            $results['msgerror'] = $msgerror;
            $results['out_id_upload'] = $out_id_upload;

        }else{
            $e = oci_error($stid);
            $results =  $e['message'];
        }

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return $results;
    }

    public function next_upload_dmp($save){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_instansi_id = $save['p_instansi_id'];
        $p_id_upload = $save['p_id_upload'];
        $p_nama_file = $save['p_nama_file'];
        $p_jns_upload = $save['p_jns_upload'];
        $p_create_by = $save['p_create_by'];


        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_UPLOAD.NEXT_UPLOAD_DMP(:p_instansi_id, :p_id_upload, :p_nama_file, :p_jns_upload, :p_create_by, :out_rowcount, :msgerror, :out_id_upload); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        oci_bind_by_name($stid, ':p_instansi_id', $p_instansi_id, 20) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_nama_file', $p_nama_file, 100) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_jns_upload', $p_jns_upload, 20) or die('Error binding string3');
        oci_bind_by_name($stid, ':p_id_upload', $p_id_upload, 100) or die('Error binding string4');
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 20) or die('Error binding string5');
        oci_bind_by_name($stid, ':out_id_upload', $out_id_upload,100, SQLT_CHR) or die('Error binding string6');
        oci_bind_by_name($stid, ':msgerror', $msgerror,1000, SQLT_CHR) or die('Error binding string7');
        oci_bind_by_name($stid, ':out_rowcount', $out_rowcount,100) or die('Error binding string8');
        

        if(oci_execute($stid)){
            $results['out_rowcount'] = $out_rowcount;
            $results['msgerror'] = $msgerror;
            $results['out_id_upload'] = $out_id_upload;
        }else{
            $e = oci_error($stid);
            $results =  $e['message'];
        }

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return $results;
    }


}


