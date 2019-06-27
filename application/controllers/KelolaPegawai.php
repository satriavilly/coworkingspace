<?php

class KelolaPegawai extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('kelolaPegawai_model', 'KelolaPegawai_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    function formValidationTambahPegawai() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('namaPegawai', 'namaPegawai', 'required');
        $this->form_validation->set_rules('kodePegawai', 'kodePegawai', 'required|is_unique[pegawai.kodePegawai]|max_length[20]');
        $this->form_validation->set_rules('emailPegawai', 'emailPegawai', 'required|valid_email');
        $this->form_validation->set_rules('noHpPegawai', 'noHpPegawai', 'required|numeric|max_length[12]');
        $this->form_validation->set_rules('alamatPegawai', 'alamatPegawai', 'required');
        $this->form_validation->set_rules('tglLahirPegawai', 'tglLahirPegawai', 'required');
        return $this->form_validation->run();
    }

    function tambahPegawai() {
        $namaPegawai = $this->input->post('namaPegawai');
        $kodePegawai = $this->input->post('kodePegawai');
        $emailPegawai = $this->input->post('emailPegawai');
        $noHpPegawai = $this->input->post('noHpPegawai');
        $alamatPegawai = $this->input->post('alamatPegawai');
        $tglLahirPegawai = $this->input->post('tglLahirPegawai');
        $jenisKelaminPegawai = $this->input->post('jenisKelaminPegawai');
        $jabatanPegawai = $this->input->post('jabatanPegawai');
        $role = $this->input->post('role');
        $image = null;
        $type = null;
        if (!empty($_FILES)) {
            $image = file_get_contents($_FILES['image']['tmp_name']);
            $type = $_FILES['image']['type'];
        }
        if ($this->formValidationTambahPegawai() == TRUE) {
            $this->load->library('../controllers/user');
            $idUser = $this->user->signup($kodePegawai, $role);
//        echo $idUser;die();

            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Pegawai");
            if ($idUser != 0) {
                $data = array(
                    'namaPegawai' => $namaPegawai,
                    'kodePegawai' => $kodePegawai,
                    'emailPegawai' => $emailPegawai,
                    'noHpPegawai' => $noHpPegawai,
                    'alamatPegawai' => $alamatPegawai,
                    'tglLahirPegawai' => $tglLahirPegawai,
                    'jenisKelaminPegawai' => $jenisKelaminPegawai,
                    'jabatanPegawai' => $jabatanPegawai,
                    'idUser' => $idUser,
                    'fotoPegawai' => $image,
                    'fileTypePegawai' => $type
                );
                $status = $this->KelolaPegawai_model->input_data_pegawai($data);
                if ($status) {
                    $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Pegawai");
                }
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

    function viewDataPegawai() {
        $list = $this->KelolaPegawai_model->view_data_pegawai();
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->namaPegawai;
            $row[] = $value->kodePegawai;
            $row[] = $value->emailPegawai;
            $row[] = $value->noHpPegawai;
            $row[] = $value->alamatPegawai;
            $jk = "Laki-Laki";
            if ($value->jenisKelaminPegawai == "P") {
                $jk = "Perempuan";
            }
            $row[] = $jk;
            $row[] = $value->tglLahirPegawai;
            $row[] = '<img src="data:' . $value->fileTypePegawai . ';base64,' . base64_encode($value->fotoPegawai) . '" style="width:100px;"/>';
            $row[] = "<button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='bukaModulRubahData(" . $value->idPegawai . ")'>Edit</button> <button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='hapusData(" . $value->idPegawai . "," . $value->idUser . ")'>Delete</button>";
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

    function formValidationEditPegawai() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('idPegawai', 'idPegawai', 'required');
        $this->form_validation->set_rules('namaPegawai', 'namaPegawai', 'required');
        $uniqKodePegawai = "";
        if ($this->input->post("kodePegawaiOriginal") != $this->input->post("kodePegawai")) {
            $uniqKodePegawai = "|is_unique[pegawai.kodePegawai]";
        }
        $uniqNoHpPegawai = "";
        if ($this->input->post("noHpPegawaiOriginal") != $this->input->post("noHpPegawai")) {
            $uniqNoHpPegawai = "|is_unique[pegawai.noHpPegawai]";
        }
        
        $this->form_validation->set_rules('kodePegawai', 'kodePegawai', 'required' . $uniqKodePegawai . '|max_length[20]');
        $this->form_validation->set_rules('emailPegawai', 'emailPegawai', 'required|valid_email');
        $this->form_validation->set_rules('noHpPegawai', 'noHpPegawai', 'required|numeric|max_length[12]' . $uniqNoHpPegawai);
        $this->form_validation->set_rules('alamatPegawai', 'alamatPegawai', 'required');
        $this->form_validation->set_rules('tglLahirPegawai', 'tglLahirPegawai', 'required');
        return $this->form_validation->run();
    }

    function editPegawai() {

        $idPegawai = $this->input->post('idPegawai');
        $namaPegawai = $this->input->post('namaPegawai');
        $kodePegawai = $this->input->post('kodePegawai');
        $emailPegawai = $this->input->post('emailPegawai');
        $noHpPegawai = $this->input->post('noHpPegawai');
        $alamatPegawai = $this->input->post('alamatPegawai');
        $tglLahirPegawai = $this->input->post('tglLahirPegawai');
        $jenisKelaminPegawai = $this->input->post('jenisKelaminPegawai');
        $jabatanPegawai = $this->input->post('jabatanPegawai');
//        $role = $this->input->post('role');
//        $image = null;
//        $type = null;
//        if (!empty($_FILES)) {
//            $image = file_get_contents($_FILES['image']['tmp_name']);
//            $type = $_FILES['image']['type'];
//        }

        if ($this->formValidationEditPegawai() == TRUE) {
            $data = array(
                'namaPegawai' => $namaPegawai,
                'kodePegawai' => $kodePegawai,
                'emailPegawai' => $emailPegawai,
                'noHpPegawai' => $noHpPegawai,
                'alamatPegawai' => $alamatPegawai,
                'tglLahirPegawai' => $tglLahirPegawai,
                'jenisKelaminPegawai' => $jenisKelaminPegawai,
                'jabatanPegawai' => $jabatanPegawai,
            );

            if ($this->input->post('image') == "" || $this->input->post('image') == null) {
                $image = file_get_contents($_FILES['image']['tmp_name']);
                $type = $_FILES['image']['type'];
                $data["fileTypePegawai"] = $type;
                $data["fotoPegawai"] = $image;
            }
            $status = $this->KelolaPegawai_model->edit_data_pegawai($data, $idPegawai);
            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Pegawai");
            if ($status) {
                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Pegawai");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }
    
    function getPegawaiById() {
        $idPegawai = $this->input->post('idPegawai');
        $detail = $this->KelolaPegawai_model->getPegawaiById($idPegawai);
        
        $data['idPegawai'] = $detail->idPegawai;
        $data['namaPegawai'] = $detail->namaPegawai;
        $data['kodePegawai'] = $detail->kodePegawai;
        $data['emailPegawai'] = $detail->emailPegawai;
        $data['noHpPegawai'] = $detail->noHpPegawai;
        $data['alamatPegawai'] = $detail->alamatPegawai;
        $data['tglLahirPegawai'] = $detail->tglLahirPegawai;
        $data['jenisKelaminPegawai'] = $detail->jenisKelaminPegawai;
        $data['jabatanPegawai'] = $detail->jabatanPegawai;
        $data['fotoPegawai'] = $detail->fotoPegawai;
        $data['fotoPegawai'] = base64_encode($detail->fotoPegawai);

        echo json_encode($data);
    }
    function deletePegawai() {
        $idPegawai = $this->input->post('idPegawai');
        $idUser = $this->input->post('idUser');
        
        $status1 = $this->KelolaPegawai_model->deletePegawai($idPegawai);
        $status2 = $this->KelolaPegawai_model->deleteUser($idUser);
        $data = array("status" => "0", "message" => "Gagal Menghapus Data Pegawai");
        if ($status1 && $status2) {
            $data = array("status" => "1", "message" => "Berhasil Menghapus Data Pegawai");
        }
        echo json_encode($data);
    }
}

?>