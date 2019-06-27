<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model('user_model', 'user_model');
        $this->load->helper('url');
    }

    public function index() {
        if (isset($_SESSION['logged_in'])) {
            redirect('/dashboard/home');
        } else {
            //$this->load->library('form_validation');
            $this->load->view('index.php');
        }
    }

    public function changePassword() {
        $this->load->view('header');
        $this->load->view('content-ubah-password');
        $this->load->view('footer');
    }

    public function login() {
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_message('required', 'Field {field} wajib diisi.');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('index.php');
        } else {
            if ($this->user_model->login($_POST['username'], $_POST['password'])) {
                redirect('/Dashboard/home');
            } else {
                $this->session->set_flashdata('gagal', '<div class="alert alert-danger">
                                            <center>username atau password salah!</center>
                                         </div> ');
                redirect('/Dashboard/loginAdmin');
            }
        }
    }
    public function loginMember() {
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_message('required', 'Field {field} wajib diisi.');
        if ($this->form_validation->run() == FALSE) {
//            $this->load->view('index.php');
             $data = array("status" => "0", "message" => validation_errors());
        } else {
            if ($this->user_model->loginMember($_POST['username'], $_POST['password'])) {
//                redirect('/index');
                $data = array("status" => "1", "message" => "Berhasil Login");
            } else {
//                $this->session->set_flashdata('gagal', '<div class="alert alert-danger">
//                                            <center>username atau password salah!</center>
//                                         </div> ');
//                redirect('/Dashboard/loginPelanggan');
                 $data = array("status" => "0", "message" => "Gagal Login, Username atau password salah");
            }
        }
        echo json_encode($data);
    }

    public function signup($nis, $role) {
        return $this->user_model->signup($nis, $role);
    }
    public function signupmember($username,$password, $role) {
        return $this->user_model->signupmember($username,$password, $role);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Dashboard/');
    }

    public function notLoggedIn() {
        $this->load->view('lockscreen');
    }

}
