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
        $this->load->view('login_new');
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
            $this->load->view('login_new');
        }
        else{
            // $a = $this->musers->check_users($username,md5($password));
            // if(count($a)>0){
            //     foreach($a as $key){
            //             $nama = $key->nama;
            //             $username = $key->username;
            //             $level = $key->level;
            //             $user_id = $key->id_user;
            //             $time = $key->created_time;
            //     }
                
            $usersession = array(
                            'username'=>"ERZAN",
                            'userid'=>"ERZAN",
                            'nama'=>"Erzan Rosbrianto",
                            'loginstate'=>1,
                            'level'=>"ADMINISTRATOR",
                            'time'=> date('d-m-Y h:i:s'),
                        );
            $this->session->set_userdata($usersession);
            //var_dump($this->session->userdata('loginstate'));exit;
            redirect('admin/home');
            // }
            // else{
            //     $this->form_validation->set_message('Maaf Username atau Password Anda Salah');
            //     $this->load->view('access/login');
            // }
        }
    }

    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'login');
    }
    
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
