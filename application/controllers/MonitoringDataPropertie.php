<?php

class MonitoringDataPropertie extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('monitoringDataPropertie_model', 'MonitoringDataPropertie_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }
    
    function viewDataPropertie() {
        $list = $this->MonitoringDataPropertie_model->view_data_propertie();
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->namaPropertie;
            $row[] = $value->namaMitra;
            $row[] = $value->statusPropertie;
            $row[] = $value->stockGudang;
            
//            <button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='hapusData(" . $value->idPropertie . ")'>Delete</button>
            $row[] = "<button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='bukaModulRubahData(" . $value->idPropertie . ")'>Edit</button> ";
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }
    
    function viewDataPengadaan() {
        $list = $this->MonitoringDataPropertie_model->view_data_pengadaan();
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->namaPropertie;
            $row[] = $value->statusPengadaan;
            $row[] = $value->jumlahPengadaan;
            $row[] = $value->satuan;
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }
    
    

    
    
    
//    
//    
//    function formValidationTambahMitra() {
//        $this->form_validation->set_error_delimiters('<li>', '</li>');
//        $this->form_validation->set_rules('namaMitra', 'namaMitra', 'required');
//        $this->form_validation->set_rules('emailMitra', 'emailMitra', 'required|valid_email');
//        $this->form_validation->set_rules('noTelpMitra', 'noTelpMitra', 'required|numeric|max_length[12]');
//        $this->form_validation->set_rules('alamatMitra', 'alamatMitra', 'required');
//        return $this->form_validation->run();
//    }
//
//    function tambahMitra() {
//        $namaMitra = $this->input->post('namaMitra');
//        $jenisMitra = $this->input->post('jenisMitra');
//        $noTelpMitra = $this->input->post('noTelpMitra');
//        $emailMitra = $this->input->post('emailMitra');
//        $alamatMitra = $this->input->post('alamatMitra');
//        $statusMitra = $this->input->post('statusMitra');
//
//        if ($this->formValidationTambahMitra() == TRUE) {
//
//            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Mitra");
//
//            $data = array(
//                'namaMitra' => $namaMitra,
//                'jenisMitra' => $jenisMitra,
//                'noTelpMitra' => $noTelpMitra,
//                'emailMitra' => $emailMitra,
//                'alamatMitra' => $alamatMitra,
//                'statusMitra' => $statusMitra,
//            );
//            $status = $this->KelolaMitra_model->input_data_mitra($data);
//            if ($status) {
//                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Mitra");
//            }
//            echo json_encode($data);
//        } else {
//            $data = array("status" => "0", "message" => validation_errors());
//            echo json_encode($data);
//        }
//    }
//
//    
//
//    function deleteMitra() {
//        $idMitra = $this->input->post('idMitra');
//
//        $status1 = $this->KelolaMitra_model->deleteMitra($idMitra);
//        $data = array("status" => "0", "message" => "Gagal Menghapus Data Mitra");
//        if ($status1) {
//            $data = array("status" => "1", "message" => "Berhasil Menghapus Data Mitra");
//        }
//        echo json_encode($data);
//    }
//
    function formValidationEditPropertie() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('idPropertie', 'idPropertie', 'required');
        $this->form_validation->set_rules('namaPropertie', 'namaPropertie', 'required');
        $this->form_validation->set_rules('idMitra', 'idMitra', 'required');
        $this->form_validation->set_rules('statusPropertie', 'statusPropertie', 'required');
        $this->form_validation->set_rules('stockGudang', 'stockGudang', 'required|numeric');
        return $this->form_validation->run();
    }

    function editPropertie() {

        $idPropertie = $this->input->post('idPropertie');
        $namaPropertie = $this->input->post('namaPropertie');
        $idMitra = $this->input->post('idMitra');
        $statusPropertie = $this->input->post('statusPropertie');
        $stockGudang = $this->input->post('stockGudang');

        if ($this->formValidationEditPropertie() == TRUE) {
            $data = array(
                'namaPropertie' => $namaPropertie,
                'idMitra' => $idMitra,
                'statusPropertie' => $statusPropertie,
                'stockGudang' => $stockGudang,
            );
          
            $status = $this->MonitoringDataPropertie_model->edit_data_propertie($data, $idPropertie);
            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Propertir");
            if ($status) {
                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Propertir");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }
//
    function getPropertieById() {

        $idPropertie = $this->input->post('idPropertie');
        $detail = $this->MonitoringDataPropertie_model->getPropertieById($idPropertie);

        $data['idPropertie'] = $detail->idPropertie;
        $data['idMitra'] = $detail->idMitra;
        $data['namaPropertie'] = $detail->namaPropertie;
        $data['statusPropertie'] = $detail->statusPropertie;
        $data['stockGudang'] = $detail->stockGudang;

        echo json_encode($data);
    }
    function getDataMitra() {

        $data["data"] = $this->MonitoringDataPropertie_model->getDataMitra();

        echo json_encode($data);
    }
    function getDataChartLinePengadaan() {

        $data["data"] = $this->MonitoringDataPropertie_model->getDataChartLinePengadaan();

        echo json_encode($data);
    }
//
//    function deletePegawai() {
//        $idPegawai = $this->input->post('idPegawai');
//        $idUser = $this->input->post('idUser');
//
//        $status1 = $this->KelolaPegawai_model->deletePegawai($idPegawai);
//        $status2 = $this->KelolaPegawai_model->deleteUser($idUser);
//        $data = array("status" => "0", "message" => "Gagal Menghapus Data Siswa");
//        if ($status1 && $status2) {
//            $data = array("status" => "1", "message" => "Berhasil Menghapus Data Siswa");
//        }
//        echo json_encode($data);
//    }

}

?>