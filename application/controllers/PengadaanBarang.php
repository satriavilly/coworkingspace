<?php

class PengadaanBarang extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('pengadaanBarang_model', 'PengadaanBarang_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    function viewDataPengadaan() {
        $list = $this->PengadaanBarang_model->view_data_pengadaan();
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->namaPropertie;
            $row[] = $value->namaMitra;
            $row[] = $value->tglPengadaan;
            $row[] = $value->statusPengadaan;
            $row[] = $value->jumlahPengadaan;
            $row[] = $value->satuan;

//            <button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='hapusData(" . $value->idPropertie . ")'>Delete</button>
            if ($value->statusPengadaan == "onprogress") {
                $row[] = "<button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='bukaModulRubahData(" . $value->idPengadaanPropertie . ")'>Edit Status Pengadaan</button> ";
            } else {
                $row[] = "-";
            }
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

    function loadDataTableLaporanPengadaan() {
        $where = "";
        if ($this->input->post('firstDate') != "-" && $this->input->post('lastDate') != "-" && $this->input->post('firstDate') != "" &&$this->input->post('lastDate') != "") {
            $where = "WHERE tglPengadaan BETWEEN STR_TO_DATE('".$this->input->post('firstDate')."','%Y-%m-%d') AND STR_TO_DATE('".$this->input->post('lastDate')."','%Y-%m-%d')";
        }
//        echo $where;
        $list = $this->PengadaanBarang_model->loadDataTableLaporanPengadaan($where);
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->tglPengadaan;
            $row[] = $value->statusPengadaan;
            $row[] = $value->jumlahPengadaan;
            $row[] = $value->satuan;
            $row[] = $value->namaPropertie;
            $row[] = $value->stockGudang;
            $row[] = $value->namaMitra;
            $row[] = $value->namaPegawai;

//            <button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='hapusData(" . $value->idPropertie . ")'>Delete</button>
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

//    
    function formValidationTambahPengadaan() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        if ($this->input->post('metodePropertie') == "newPropertie") {
            $this->form_validation->set_rules('namaPropertie', 'namaPropertie', 'required');
            $this->form_validation->set_rules('idMitra', 'idMitra', 'required');
            $this->form_validation->set_rules('statusPropertie', 'statusPropertie', 'required');
            $this->form_validation->set_rules('stockGudang', 'stockGudang', 'required');
        } else {
            $this->form_validation->set_rules('idPropertie', 'idPropertie', 'required');
        }
        $this->form_validation->set_rules('statusPengadaan', 'statusPengadaan', 'required');
        $this->form_validation->set_rules('tglPengadaan', 'tglPengadaan', 'required');
        $this->form_validation->set_rules('jumlahPengadaan', 'jumlahPengadaan', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
        return $this->form_validation->run();
    }

    function tambahPengadaan() {

        $metodePropertie = $this->input->post('metodePropertie');
        $idPropertie = $this->input->post('idPropertie');
        $namaPropertie = $this->input->post('namaPropertie');
        $idMitra = $this->input->post('idMitra');
        $statusPropertie = $this->input->post('statusPropertie');
        $statusPengadaan = $this->input->post('statusPengadaan');
        $stockGudang = $this->input->post('stockGudang');
        $tglPengadaan = $this->input->post('tglPengadaan');
        $jumlahPengadaan = $this->input->post('jumlahPengadaan');
        $satuan = $this->input->post('satuan');
        if ($this->formValidationTambahPengadaan() == TRUE) {
            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Pengadaan");
            if ($metodePropertie == "newPropertie") {
                $data = array(
                    'namaPropertie' => $namaPropertie,
                    'idMitra' => $idMitra,
                    'statusPropertie' => $statusPropertie,
                    'stockGudang' => $stockGudang,
                );
                $idPropertie = $this->PengadaanBarang_model->input_data_propertie($data);
            }

            $data = array(
                'statusPengadaan' => $statusPengadaan,
                'tglPengadaan' => $tglPengadaan,
                'jumlahPengadaan' => $jumlahPengadaan,
                'satuan' => $satuan,
                'idPropertie' => $idPropertie,
                'idUser' => $this->session->userdata("idUser"),
            );
            $status = $this->PengadaanBarang_model->input_data_pengadaan($data);
            if ($status) {
                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Pengadaan");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

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
    function formValidationEditPengadaan() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('idPengadaan', 'idPengadaan', 'required');
        if ($this->input->post('statusPengadaan') == "close") {
            $this->form_validation->set_rules('statusPengadaan', 'statusPengadaan', 'required');
            $this->form_validation->set_rules('ratingPengadaan', 'ratingPengadaan', 'required');
            $this->form_validation->set_rules('deskripsiPengadaan', 'deskripsiPengadaan', 'required');
        }
        return $this->form_validation->run();
    }

//
    function editPengadaan() {
        $idPengadaan = $this->input->post('idPengadaan');
        $statusPengadaan = $this->input->post('statusPengadaan');
        $ratingPengadaan = $this->input->post('ratingPengadaan');
        $deskripsiPengadaan = $this->input->post('deskripsiPengadaan');
//echo $statusPengadaan; die();
        if ($this->formValidationEditPengadaan() == TRUE) {
            $data = array(
                'statusPengadaan' => $statusPengadaan,
            );
            $status1 = $this->PengadaanBarang_model->edit_data_Pengadaan($data, $idPengadaan);
            $status3 = false;
            if ($status1) {
                $status2 = $this->PengadaanBarang_model->update_stock_gudang($idPengadaan);
                if ($status2) {
                    $data = array(
                        'idPengadaanPropertie' => $idPengadaan,
                        'ratingPengadaan' => $ratingPengadaan,
                        'deskripsiPengadaan' => $deskripsiPengadaan,
                    );
                    $status3 = $this->PengadaanBarang_model->input_data_feedback($data);
                }
            }

            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Pengadaan");
            if ($status3) {
                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Pengadaan");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

////
    function getPengadaanById() {

        $idPengadaan = $this->input->post('idPengadaan');
        $detail = $this->PengadaanBarang_model->getPengadaanById($idPengadaan);

        $data['idPengadaanPropertie'] = $detail->idPengadaanPropertie;
        $data['statusPengadaan'] = $detail->statusPengadaan;

        echo json_encode($data);
    }

    function getDataMitra() {

        $data["data"] = $this->PengadaanBarang_model->getDataMitra();

        echo json_encode($data);
    }

    function getDataPropertie() {

        $data["data"] = $this->PengadaanBarang_model->getDataPropertie();

        echo json_encode($data);
    }

//    function getDataChartLinePengadaan() {
//
//        $data["data"] = $this->MonitoringDataPropertie_model->getDataChartLinePengadaan();
//
//        echo json_encode($data);
//    }
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