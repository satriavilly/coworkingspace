<?php

class KelolaPelanggan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('kelolapelanggan_model', 'KelolaPelanggan_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    function formValidationTambahMember() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');

        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('nohp', 'nohp', 'required|numeric|max_length[12]');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        return $this->form_validation->run();
    }

    function tambahMember() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nohp = $this->input->post('nohp');
        $alamat = $this->input->post('alamat');
        $jk = $this->input->post('jk');
        $organisasi = $this->input->post('organisasi');
        $role = "member";

        if ($this->formValidationTambahMember() == TRUE) {
            $this->load->library('../controllers/user');
            $idUser = $this->user->signupmember($username, $password, $role);
//        echo $idUser;die();

            $data = array("status" => "0", "message" => "Gagal Daftar Member");
            if ($idUser != 0) {
                $data = array(
                    'namaPelanggan' => $nama,
                    'emailPelanggan' => $email,
                    'noHpPelanggan' => $nohp,
                    'alamatPelanggan' => $alamat,
                    'jenisKelaminPelanggan' => $jk,
                    'organisasi' => $organisasi,
                    'idUser' => $idUser,
                );
                $status = $this->KelolaPelanggan_model->input_data_pelanggan($data);
                if ($status) {
                    $data = array("status" => "1", "message" => "Berhasil Daftar Member JKT48");
                }
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

    function formValidationTambahPemesanan() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('idJasaRuangan', 'idJasaRuangan', 'required');
        $this->form_validation->set_rules('tglBooking', 'tglBooking', 'required');
        $this->form_validation->set_rules('tglSelesaiBooking', 'tglSelesaiBooking', 'required');
        return $this->form_validation->run();
    }

    function tambahPemesanan() {
        $idJasaRuangan = $this->input->post('idJasaRuangan');
        $tglBooking = $this->input->post('tglBooking');
        $tglSelesaiBooking = $this->input->post('tglSelesaiBooking');
        $awal = date_create($tglBooking);
        $akhir = date_create($tglSelesaiBooking); // waktu sekarang
        $diff = date_diff($awal, $akhir);

        if ($this->formValidationTambahPemesanan() == TRUE) {
            $data = array("status" => "0", "message" => "Gagal Melakukan Pemesanan");
            $hargaJasa = $this->KelolaPelanggan_model->getDataJasa($idJasaRuangan);
            $jumlahPembayaran = ($hargaJasa->hargaJasaRuangan * ($diff->d + 1));
            $sameDay = $this->KelolaPelanggan_model->checkTglBookingBentrok($tglBooking, $tglSelesaiBooking, $idJasaRuangan);
//            echo $sameDay; die();
            if ($sameDay < 1) {
                $data = array(
                    'idUser' => $this->session->userdata("idUser"),
                    'idJasaRuangan' => $idJasaRuangan,
                    'tglBooking' => $tglBooking,
                    'tglSelesaiBooking' => $tglSelesaiBooking,
                    'statusPemesanan' => "lunas",
                    'hargaDibayar' => $jumlahPembayaran,
                );
//                print_r($data); die();
                $status = $this->KelolaPelanggan_model->input_data_pemesanan($data);
                if ($status) {
                    $data = array("status" => "1", "message" => "Berhasil Melakukan Pemesanan");
                }
            } else {
                $data = array("status" => "0", "message" => "Jadwal booking Bentrok");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

    function formValidationTambahFeedBack() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('idPemesanan', 'idPemesanan', 'required');
        $this->form_validation->set_rules('ratingPemesanan', 'ratingPemesanan', 'required');
        $this->form_validation->set_rules('deskripsiPemesanan', 'deskripsiPemesanan', 'required');
        return $this->form_validation->run();
    }

    function tambahFeedBack() {
        $idPemesanan = $this->input->post('idPemesanan');
        $ratingPemesanan = $this->input->post('ratingPemesanan');
        $deskripsiPemesanan = $this->input->post('deskripsiPemesanan');

        if ($this->formValidationTambahFeedBack() == TRUE) {
            $data = array("status" => "0", "message" => "Gagal Melakukan Input Feedback");

            $data = array(
                'idPemesanan' => $idPemesanan,
                'ratingPemesanan' => $ratingPemesanan,
                'deskripsiPemesanan' => $deskripsiPemesanan,
            );
//                print_r($data); die();
            $status = $this->KelolaPelanggan_model->input_data_feedback($data);
            if ($status) {
                $data = array("status" => "1", "message" => "Berhasil Melakukan Input FeedBack");
            }

            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

    function viewDataPemesanan() {
        $list = $this->KelolaPelanggan_model->view_data_pemesanan();
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $yourBooked = "";
            if ($this->session->userdata("idUser") == $value->idUser) {
                $yourBooked = " (Your Booked)";
            }
            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->namaJasaRuangan . $yourBooked;
            $row[] = $value->tglBooking;
            $row[] = $value->tglSelesaiBooking;
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

    function viewDataPemesananByUser() {
        $list = $this->KelolaPelanggan_model->view_data_pemesanan_by_user();
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $yourBooked = "";

            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->namaJasaRuangan;
            $row[] = $value->tglBooking;
            $row[] = $value->tglSelesaiBooking;

            if ($value->idFeedBack != null) {
                $row[] = "Rating : " . $value->ratingPemesanan . ".</br>Deskripsi : " . $value->deskripsiPemesanan . ".";
            } else {
                $row[] = "<button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='feedBack(" . $value->idPemesanan . ")'>FeedBack</button>";
            }
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

    function loadDataTableLaporanPemesanan() {

        $where = "";
        if ($this->input->post('firstDate') != "-" && $this->input->post('lastDate') != "-" && $this->input->post('firstDate') != "" && $this->input->post('lastDate') != "") {
            $where = "WHERE tglBooking BETWEEN STR_TO_DATE('" . $this->input->post('firstDate') . "','%Y-%m-%d') AND STR_TO_DATE('" . $this->input->post('lastDate') . "','%Y-%m-%d')";
        }
        $list = $this->KelolaPelanggan_model->view_data_laporan_pemesanan($where);
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->namaJasaRuangan;
            $row[] = $value->namaPelanggan;
            $row[] = $value->tglBooking . " s/d " . $value->tglSelesaiBooking;
            $row[] = $value->statusPemesanan;
            $row[] = "Rp. " . number_format($value->hargaDibayar);
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

    function loadDataTablePelanggan() {

        $where = " WHERE 1 ";
//        if ($this->input->post('firstDate') != "-" && $this->input->post('lastDate') != "-" && $this->input->post('firstDate') != "" && $this->input->post('lastDate') != "") {
//            $where = "WHERE tglBooking BETWEEN STR_TO_DATE('" . $this->input->post('firstDate') . "','%Y-%m-%d') AND STR_TO_DATE('" . $this->input->post('lastDate') . "','%Y-%m-%d')";
//        }

        if ($this->input->post('jk') != "-") {
            $where .= " AND jenisKelaminPelanggan ='" . $this->input->post('jk') . "'";
        }
        if ($this->input->post('banyakPenyewaan') != "-") {
            $where .= " AND (SELECT COUNT(idPemesanan) FROM pemesanan D WHERE D.idUser=A.idUser) >=" . $this->input->post('banyakPenyewaan');
        }
        if ($this->input->post('avgRating') != "-") {
            $where .= " AND IFNULL((SELECT AVG(ratingPemesanan) FROM feedbackpelanggan B JOIN pemesanan C ON(B.idPemesanan=C.idPemesanan) WHERE C.idUser=A.idUser),0) >=" . $this->input->post('avgRating');
        }

        $list = $this->KelolaPelanggan_model->loadDataTablePelanggan($where);
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->namaPelanggan;
            $row[] = $value->emailPelanggan;
            $row[] = $value->noHpPelanggan;
            $row[] = $value->alamatPelanggan;
            $row[] = $value->jenisKelaminPelanggan;
            $row[] = $value->organisasi;
            $row[] = number_format($value->avgRatingPemesanan, 1, '.', '') . " Bintang";
            $row[] = $value->banyakPemasanan;
            $row[] = "<input type='checkbox' value='" . $value->emailPelanggan . "' name='email[]' id='email'/>";
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

    function sendMail() {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'adityamns@gmail.com', // change it to yours
            'smtp_pass' => '@d1ty@MNS', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $subjectEmail = $this->input->post('subjectEmail');
        $messageEmail = $this->input->post('messageEmail');
        $email = $this->input->post('email');

        $message = '';
        $this->load->library('email', $config);

        for ($x = 0; $x < count($email); $x++) {
            if ($email[$x] != "on") {
                $this->email->set_newline("\r\n");
                $this->email->from('adityamns@gmail.com'); // change it to yours
                $this->email->to($email[$x]); // change it to yours
                $this->email->subject($subjectEmail);
                $this->email->message($messageEmail);
                if ($this->email->send()) {
//                    echo 'Email sent.';
                } else {
                    show_error($this->email->print_debugger());
                }
            }
        }
        $data = array("status" => "1", "message" => "Berhasil Mengirim Email");
        echo json_encode($data);
    }
	
	 function getDataChartLinePendapatan() {
        $detail["data"] = $this->KelolaPelanggan_model->getDataChartLinePendapatan();
        echo json_encode($detail);
    }

//
//    function viewDataPegawai() {
//        $list = $this->KelolaPegawai_model->view_data_pegawai();
//        $data = array();
//        $x = 0;
//
//        foreach ($list as $value) {
//            $row = array();
//            $x++;
//            $row[] = $x;
//            $row[] = $value->namaPegawai;
//            $row[] = $value->kodePegawai;
//            $row[] = $value->emailPegawai;
//            $row[] = $value->noHpPegawai;
//            $row[] = $value->alamatPegawai;
//            $jk = "Laki-Laki";
//            if ($value->jenisKelaminPegawai == "P") {
//                $jk = "Perempuan";
//            }
//            $row[] = $jk;
//            $row[] = $value->tglLahirPegawai;
//            $row[] = '<img src="data:' . $value->fileTypePegawai . ';base64,' . base64_encode($value->fotoPegawai) . '" style="width:100px;"/>';
//            $row[] = "<button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='bukaModulRubahData(" . $value->idPegawai . ")'>Edit</button> <button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='hapusData(" . $value->idPegawai . "," . $value->idUser . ")'>Delete</button>";
//            $data[] = $row;
//        }
//
//        $output = array(
//            "data" => $data
//        );
//        //output to json format
//        echo json_encode($output);
//    }
//
//    function formValidationEditPegawai() {
//        $this->form_validation->set_error_delimiters('<li>', '</li>');
//        $this->form_validation->set_rules('idPegawai', 'idPegawai', 'required');
//        $this->form_validation->set_rules('namaPegawai', 'namaPegawai', 'required');
//        $uniqKodePegawai = "";
//        if ($this->input->post("kodePegawaiOriginal") != $this->input->post("kodePegawai")) {
//            $uniqKodePegawai = "|is_unique[pegawai.kodePegawai]";
//        }
//        $uniqNoHpPegawai = "";
//        if ($this->input->post("noHpPegawaiOriginal") != $this->input->post("noHpPegawai")) {
//            $uniqNoHpPegawai = "|is_unique[pegawai.noHpPegawai]";
//        }
//        
//        $this->form_validation->set_rules('kodePegawai', 'kodePegawai', 'required' . $uniqKodePegawai . '|max_length[20]');
//        $this->form_validation->set_rules('emailPegawai', 'emailPegawai', 'required|valid_email');
//        $this->form_validation->set_rules('noHpPegawai', 'noHpPegawai', 'required|numeric|max_length[12]' . $uniqNoHpPegawai);
//        $this->form_validation->set_rules('alamatPegawai', 'alamatPegawai', 'required');
//        $this->form_validation->set_rules('tglLahirPegawai', 'tglLahirPegawai', 'required');
//        return $this->form_validation->run();
//    }
//
//    function editPegawai() {
//
//        $idPegawai = $this->input->post('idPegawai');
//        $namaPegawai = $this->input->post('namaPegawai');
//        $kodePegawai = $this->input->post('kodePegawai');
//        $emailPegawai = $this->input->post('emailPegawai');
//        $noHpPegawai = $this->input->post('noHpPegawai');
//        $alamatPegawai = $this->input->post('alamatPegawai');
//        $tglLahirPegawai = $this->input->post('tglLahirPegawai');
//        $jenisKelaminPegawai = $this->input->post('jenisKelaminPegawai');
//        $jabatanPegawai = $this->input->post('jabatanPegawai');
////        $role = $this->input->post('role');
////        $image = null;
////        $type = null;
////        if (!empty($_FILES)) {
////            $image = file_get_contents($_FILES['image']['tmp_name']);
////            $type = $_FILES['image']['type'];
////        }
//
//        if ($this->formValidationEditPegawai() == TRUE) {
//            $data = array(
//                'namaPegawai' => $namaPegawai,
//                'kodePegawai' => $kodePegawai,
//                'emailPegawai' => $emailPegawai,
//                'noHpPegawai' => $noHpPegawai,
//                'alamatPegawai' => $alamatPegawai,
//                'tglLahirPegawai' => $tglLahirPegawai,
//                'jenisKelaminPegawai' => $jenisKelaminPegawai,
//                'jabatanPegawai' => $jabatanPegawai,
//            );
//
//            if ($this->input->post('image') == "" || $this->input->post('image') == null) {
//                $image = file_get_contents($_FILES['image']['tmp_name']);
//                $type = $_FILES['image']['type'];
//                $data["fileTypePegawai"] = $type;
//                $data["fotoPegawai"] = $image;
//            }
//            $status = $this->KelolaPegawai_model->edit_data_pegawai($data, $idPegawai);
//            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Pegawai");
//            if ($status) {
//                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Pegawai");
//            }
//            echo json_encode($data);
//        } else {
//            $data = array("status" => "0", "message" => validation_errors());
//            echo json_encode($data);
//        }
//    }
//    
//    function getPegawaiById() {
//        $idPegawai = $this->input->post('idPegawai');
//        $detail = $this->KelolaPegawai_model->getPegawaiById($idPegawai);
//        
//        $data['idPegawai'] = $detail->idPegawai;
//        $data['namaPegawai'] = $detail->namaPegawai;
//        $data['kodePegawai'] = $detail->kodePegawai;
//        $data['emailPegawai'] = $detail->emailPegawai;
//        $data['noHpPegawai'] = $detail->noHpPegawai;
//        $data['alamatPegawai'] = $detail->alamatPegawai;
//        $data['tglLahirPegawai'] = $detail->tglLahirPegawai;
//        $data['jenisKelaminPegawai'] = $detail->jenisKelaminPegawai;
//        $data['jabatanPegawai'] = $detail->jabatanPegawai;
//        $data['fotoPegawai'] = $detail->fotoPegawai;
//        $data['fotoPegawai'] = base64_encode($detail->fotoPegawai);
//
//        echo json_encode($data);
//    }
//    function deletePegawai() {
//        $idPegawai = $this->input->post('idPegawai');
//        $idUser = $this->input->post('idUser');
//        
//        $status1 = $this->KelolaPegawai_model->deletePegawai($idPegawai);
//        $status2 = $this->KelolaPegawai_model->deleteUser($idUser);
//        $data = array("status" => "0", "message" => "Gagal Menghapus Data Pegawai");
//        if ($status1 && $status2) {
//            $data = array("status" => "1", "message" => "Berhasil Menghapus Data Pegawai");
//        }
//        echo json_encode($data);
//    }
}

?>