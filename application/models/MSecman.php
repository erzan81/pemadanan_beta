<?php

class MSecman extends CI_Model {

   public function __construct()
   {
      parent::__construct();
   }


      function get_login($in_id_user, $in_password){

        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_SECMAN.GET_LOGIN(:in_id_user, :in_password, :out_message); END;');

        // $in_id_user = $this->input->post('in_id_user');
        // $in_password = $this->input->post('in_password');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        oci_bind_by_name($stid, ':in_id_user', $in_id_user,100, SQLT_CHR) or die('Error binding string5');
        oci_bind_by_name($stid, ':in_password', $in_password,1000, SQLT_CHR) or die('Error binding string5');
        oci_bind_by_name($stid, ':out_message', $out_message,1000, SQLT_CHR) or die('Error binding string5');
        oci_bind_by_name($stid, ':RetVal', $retVal,100) or die('Error binding string1');

        if(oci_execute($stid)){
          // oci_execute($OUT_DATA, OCI_DEFAULT);
          // oci_fetch_all($OUT_DATA, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);          

          $results['out_rowcount'] = $retVal;
          $results['out_message'] = $out_message;

 
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return json_decode(json_encode($results), FALSE);

      }


      function log_login($save){

        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_id_session = $save['p_id_session'];
        $p_user_id = $save['p_user_id'];
        $p_ipaddress = $save['p_ipaddress'];
           

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_SECMAN.LOG_LOGIN(:p_id_session, :p_user_id, :p_ipaddress, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_id_session', $p_id_session, 100) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_user_id', $p_user_id, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_ipaddress', $p_ipaddress, 100) or die('Error binding string3');          
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

  
      function upd_log_login($save){

        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_id_session = $save['p_id_session'];
        $p_user_id = $save['p_user_id'];           

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_SECMAN.UPD_LOG_LOGIN(:p_id_session, :p_user_id, :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_id_session', $p_id_session, 100) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_user_id', $p_user_id, 1000, SQLT_CHR) or die('Error binding string2');          
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

      function get_mst_user(){

        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_SECMAN.GET_MST_USER; END;');

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

      function ins_user($save){

        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_user_id = $save['p_user_id'];
        $p_nama_user = $save['p_nama_user'];
        $p_no_telp = $save['p_no_telp'];
        $p_email = $save['p_email'];
        $p_passwd = $save['p_passwd'];
        $p_path_file = $save['p_path_file'];
        $p_id_group = $save['p_id_group'];
        $p_create_by = $save['p_create_by'];


        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_SECMAN.INS_USER(:p_user_id, :p_nama_user, :p_no_telp, :p_email, :p_passwd, :p_path_file, :p_id_group, :p_create_by,  :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_user_id', $p_user_id, 100, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_nama_user', $p_nama_user, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_no_telp', $p_no_telp, 100, SQLT_CHR) or die('Error binding string3');     
        oci_bind_by_name($stid, ':p_email', $p_email, 100, SQLT_CHR) or die('Error binding string4');
        oci_bind_by_name($stid, ':p_passwd', $p_passwd, 100, SQLT_CHR) or die('Error binding string5');  
        oci_bind_by_name($stid, ':p_path_file', $p_path_file, 1000, SQLT_CHR) or die('Error binding string4');
        oci_bind_by_name($stid, ':p_id_group', $p_id_group, 100, SQLT_CHR) or die('Error binding string5');     
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 100, SQLT_CHR) or die('Error binding string5');       
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

    
       function upd_user($save){

        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_user_id = $save['p_user_id'];
        $p_nama_user = $save['p_nama_user'];
        $p_no_telp = $save['p_no_telp'];
        $p_email = $save['p_email'];
        $p_passwd = $save['p_passwd'];
        $p_path_file = $save['p_path_file'];
        $p_id_group = $save['p_id_group'];
        $p_create_by = $save['p_create_by'];
        $p_disable_user = $save['p_disable_user'];


        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_SECMAN.UPD_USER(:p_user_id, :p_nama_user, :p_no_telp, :p_email, :p_passwd, :p_path_file, :p_disable_user, :p_id_group, :p_create_by,  :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_user_id', $p_user_id, 100, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_nama_user', $p_nama_user, 1000, SQLT_CHR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_no_telp', $p_no_telp, 100, SQLT_CHR) or die('Error binding string3');     
        oci_bind_by_name($stid, ':p_email', $p_email, 100, SQLT_CHR) or die('Error binding string4');
        oci_bind_by_name($stid, ':p_passwd', $p_passwd, 100, SQLT_CHR) or die('Error binding string5');  
        oci_bind_by_name($stid, ':p_path_file', $p_path_file, 1000, SQLT_CHR) or die('Error binding string4');
        oci_bind_by_name($stid, ':p_disable_user', $p_disable_user, 100, SQLT_CHR) or die('Error binding string5');
        oci_bind_by_name($stid, ':p_id_group', $p_id_group, 100, SQLT_CHR) or die('Error binding string5');     
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 100, SQLT_CHR) or die('Error binding string5');       
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


      function get_mst_group(){

        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_SECMAN.GET_MST_GROUP; END;');

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

      function get_user_by_id($p_user_id){

        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_SECMAN.GET_USER(:p_user_id); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        oci_bind_by_name($stid, ':p_user_id', $p_user_id, 100, SQLT_CHR) or die('Error binding string1');  
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


      function get_mst_group_detil($p_id_group){

        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_SECMAN.GET_MST_GROUP_DETIL(:p_id_group); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        oci_bind_by_name($stid, ':p_id_group', $p_id_group, 100, SQLT_CHR) or die('Error binding string1');  
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

     
      function ins_group($save){

        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_id_group = $save['p_id_group'];
        $p_nama_group = $save['p_nama_group'];
        $p_create_by = $save['p_create_by'];


        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_SECMAN.INS_GROUP(:p_id_group, :p_nama_group, :p_create_by,  :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_id_group', $p_id_group, 100, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_nama_group', $p_nama_group, 1000, SQLT_CHR) or die('Error binding string2');    
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 100, SQLT_CHR) or die('Error binding string5');       
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

      function ins_group_detil($save){

        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p_id_group = $save['p_id_group'];
        $p_id_menu = $save['p_id_menu'];
        $p_create_by = $save['p_create_by'];


        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN PEMADANAN_APP.PKG_SECMAN.INS_GROUP_DETIL(:p_id_group, :p_id_menu, :p_create_by,  :out_rowcount, :msgerror); END;');
      
        oci_bind_by_name($stid, ':p_id_group', $p_id_group, 100, SQLT_CHR) or die('Error binding string1');     
        oci_bind_by_name($stid, ':p_id_menu', $p_id_menu, 1000, SQLT_CHR) or die('Error binding string2');    
        oci_bind_by_name($stid, ':p_create_by', $p_create_by, 100, SQLT_CHR) or die('Error binding string5');       
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

      function get_menutab(){

        $results = '';

        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }
     
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :RetVal := PEMADANAN_APP.PKG_SECMAN.GET_MENUTAB; END;');

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



}


