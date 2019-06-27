<?php

class Notifikasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('notifikasi_model', 'notifikasi');
        $this->load->helper('url');
    }

//CRUD SISWA
    function tambahNotif($message, $page, $status, $fk_user) {
//        $message = $this->input->post('message');
//        $page = $this->input->post('page');
//        $status = $this->input->post('status');
//        $fk_user = $this->input->post('fk_user');

        $data = array(
            'message' => $message,
            'page' => $page,
            'status' => $status,
            'fk_user' => $fk_user,
        );
        return $status = $this->notifikasi->input_data($data);
    }

    function viewNotifikasi() {
        $idUser = $this->session->userdata('idUser');
        $data = $this->notifikasi->viewNotifikasi($idUser);
        echo json_encode($data);
    }

    function hapusSiswa() {
        $idSiswa = $this->input->post('idSiswa');
        $status = $this->datamaster->delete_data_siswa($idSiswa);
        echo $status;
    }

}

?>