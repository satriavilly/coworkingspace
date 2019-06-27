<?php

class KelolaMitra extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('kelolaMitra_model', 'KelolaMitra_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    function formValidationTambahMitra() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('namaMitra', 'namaMitra', 'required');
        $this->form_validation->set_rules('emailMitra', 'emailMitra', 'required|valid_email');
        $this->form_validation->set_rules('noTelpMitra', 'noTelpMitra', 'required|numeric|max_length[12]');
        $this->form_validation->set_rules('alamatMitra', 'alamatMitra', 'required');
        return $this->form_validation->run();
    }

    function tambahMitra() {
        $namaMitra = $this->input->post('namaMitra');
        $jenisMitra = $this->input->post('jenisMitra');
        $noTelpMitra = $this->input->post('noTelpMitra');
        $emailMitra = $this->input->post('emailMitra');
        $alamatMitra = $this->input->post('alamatMitra');
        $statusMitra = $this->input->post('statusMitra');

        if ($this->formValidationTambahMitra() == TRUE) {

            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Mitra");

            $data = array(
                'namaMitra' => $namaMitra,
                'jenisMitra' => $jenisMitra,
                'noTelpMitra' => $noTelpMitra,
                'emailMitra' => $emailMitra,
                'alamatMitra' => $alamatMitra,
                'statusMitra' => $statusMitra,
            );
            $status = $this->KelolaMitra_model->input_data_mitra($data);
            if ($status) {
                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Mitra");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

    function viewDataMitra() {
        $list = $this->KelolaMitra_model->view_data_mitra();
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->namaMitra;
            $row[] = $value->jenisMitra;
            $row[] = $value->noTelpMitra;
            $row[] = $value->emailMitra;
            $row[] = $value->alamatMitra;
            $row[] = $value->statusMitra;
            $row[] = "<button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='bukaModulRubahData(" . $value->idMitra . ")'>Edit</button> <button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='hapusData(" . $value->idMitra . ")'>Delete</button>";
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

    function deleteMitra() {
        $idMitra = $this->input->post('idMitra');

        $status1 = $this->KelolaMitra_model->deleteMitra($idMitra);
        $data = array("status" => "0", "message" => "Gagal Menghapus Data Mitra");
        if ($status1) {
            $data = array("status" => "1", "message" => "Berhasil Menghapus Data Mitra");
        }
        echo json_encode($data);
    }

    function formValidationEditMitra() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('idMitra', 'idMitra', 'required');
        $this->form_validation->set_rules('namaMitra', 'namaMitra', 'required');
        $this->form_validation->set_rules('emailMitra', 'emailMitra', 'required|valid_email');
        $this->form_validation->set_rules('noTelpMitra', 'noTelpMitra', 'required|numeric|max_length[12]');
        $this->form_validation->set_rules('alamatMitra', 'alamatMitra', 'required');
        return $this->form_validation->run();
    }

    function editMitra() {

        $idMitra = $this->input->post('idMitra');
        $namaMitra = $this->input->post('namaMitra');
        $jenisMitra = $this->input->post('jenisMitra');
        $noTelpMitra = $this->input->post('noTelpMitra');
        $emailMitra = $this->input->post('emailMitra');
        $alamatMitra = $this->input->post('alamatMitra');
        $statusMitra = $this->input->post('statusMitra');

        if ($this->formValidationEditMitra() == TRUE) {
            $data = array(
                'namaMitra' => $namaMitra,
                'jenisMitra' => $jenisMitra,
                'noTelpMitra' => $noTelpMitra,
                'emailMitra' => $emailMitra,
                'alamatMitra' => $alamatMitra,
                'statusMitra' => $statusMitra,
            );
          
            $status = $this->KelolaMitra_model->edit_data_mitra($data, $idMitra);
            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Mitra");
            if ($status) {
                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Mitra");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

    function getMitraById() {

        $idMitra = $this->input->post('idMitra');
        $detail = $this->KelolaMitra_model->getMitraById($idMitra);

        $data['idMitra'] = $detail->idMitra;
        $data['namaMitra'] = $detail->namaMitra;
        $data['jenisMitra'] = $detail->jenisMitra;
        $data['noTelpMitra'] = $detail->noTelpMitra;
        $data['emailMitra'] = $detail->emailMitra;
        $data['alamatMitra'] = $detail->alamatMitra;
        $data['statusMitra'] = $detail->statusMitra;

        echo json_encode($data);
    }

    function deletePegawai() {
        $idPegawai = $this->input->post('idPegawai');
        $idUser = $this->input->post('idUser');

        $status1 = $this->KelolaPegawai_model->deletePegawai($idPegawai);
        $status2 = $this->KelolaPegawai_model->deleteUser($idUser);
        $data = array("status" => "0", "message" => "Gagal Menghapus Data Siswa");
        if ($status1 && $status2) {
            $data = array("status" => "1", "message" => "Berhasil Menghapus Data Siswa");
        }
        echo json_encode($data);
    }

}

?>