<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends Main_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('recaptcha');
    }  

    public function index() {
        $data['pesan'] = "";
        $this->load->view('login_new', $data);
    }    
    
    function do_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_message('required', '%s kosong');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', '%s kosong');
        
        if($this->form_validation->run() == FALSE)
        {
            $data['pesan'] = "";
            $this->load->view('login_new', $data);
        }
        else{
            $this->load->model('MSecman');


            $login = $this->MSecman->get_login($username, $password);

            if($login->out_rowcount == 1){
                $a = $this->MSecman->get_user_by_id($username);

                $session_id = round(uniqid(rand(), TRUE))."".date("dmyhis");

                if(count($a)>0){
                    foreach($a as $key){
                            $user_id = $key->USER_ID;
                            $nama_user = $key->NAMA_USER;
                            $group = $key->ID_GROUP;
                            $photo_path = $key->PATH_FILE;
                    }

                    $usersession = array(
                                    'user_id'=> $user_id,
                                    'nama_user'=> $nama_user,
                                    'group'=> $group,
                                    'loginstate'=>1,
                                    'photo'=>$photo_path,
                                    'time'=> date('d-m-Y h:i:s'),
                                    'session_id' => $session_id
                                );
                    $this->session->set_userdata($usersession);
                    
                    //log login
                    $this->load->library('user_agent');
                    
                    $save['p_id_session'] = $session_id;
                    $save['p_user_id'] = $user_id;
                    $save['p_ipaddress'] = $this->input->ip_address();

                    $this->MSecman->log_login($save);

                    //end log login

                    redirect('admin/home');

                }
                else{
                    $data['pesan'] = "Kena Error cuy.. jangan maksa";
                    
                    $this->form_validation->set_message( $login->out_message);
                    $this->load->view('login_new', $data);

                }
        

            
            }
            else{

                //echo $login->out_message." - ".$username." - ".$password;

                $data['pesan'] = $login->out_message;

                $this->form_validation->set_message( $login->out_message);
                $this->load->view('login_new', $data);
            }
        }
    }

    
    function logout(){

        $this->load->model('MSecman');
                    
        $save['p_id_session'] = $this->session->userdata('session_id');
        $save['p_user_id'] = $this->session->userdata('user_id');

        $this->MSecman->upd_log_login($save);

        $this->session->sess_destroy();
        redirect(base_url().'login');
    }


    
    
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
