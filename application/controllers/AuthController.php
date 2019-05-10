<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends GLOBAL_Controller{
    public function __construct()
    {
        parent::__construct();

            $model = array('User');
            $this->load->model($model);
    }
    public function index(){
        $this->load->view('backend/auth/login');
    }
    public function login(){
        if ($this->session->has_userdata('session_username')){
            $this->session->set_flashdata('alert', 'sudah_login');
            redirect(base_url());
        }
        if (isset($_POST['login'])){
            $username = parent::post('nipnisn');
            $password = parent::post('password');
            $user = array(
                'user_nip_nisn' => $username,
                'user_password' => md5($password)
            );
            $account = $this->User->get_user_account($user);
            if ($account != null){
                $dataSession = array(
                    'session_id' => $account['user_id'],
                    'session_nip_nisn' => $account['user_nip_nisn'],
                    'session_name' => $account['user_nama'],
                    'session_status' => 'login',
                    'session_level' => $account['user_level']
                );
                $this->session->set_userdata($dataSession);
                $this->session->set_flashdata('alert','success_login');
                redirect(base_url());
            }
            else{
                $this->session->set_flashdata('alert','failed_login');
                redirect(base_url('login'));
            }
        }
        else{
            $this->load->view('backend/auth/login');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
    public function register(){
        if (isset($_POST['register'])){
            $nama = parent::post('nama');
            $nisn = parent::post('nisn');
            $password = parent::post('password');
            $dataRegister = array(
                'user_nip_nisn' => $nisn,
                'user_nama' => $nama,
                'user_password' => md5($password),
                'user_level' => 'siswa'
            );
            $save = $this->User->save_user($dataRegister);
            if ($save > 0){
                $this->session->set_flashdata('alert','success_register');
                redirect('login');
            }else {
                redirect('register');
            }
        }
        $this->load->view('backend/auth/register');
    }
}