<?php

class KelolaJasa extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('kelolajasa_model', 'KelolaJasa_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    function viewDataJenisJasa() {
        $list = $this->KelolaJasa_model->view_data_jenis_jasa();
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->namaJenisJasa;
            $row[] = $value->statusJenisJasa;
            $row[] = "<button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='bukaModulRubahDataJenisJasa(" . $value->idJenisJasa . ")'>Edit</button> <button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='hapusDataJenisJasa(" . $value->idJenisJasa . ")'>Delete</button>";
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

    function viewDataJasa() {
        $list = $this->KelolaJasa_model->view_data_jasa();
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->namaJasaRuangan;
            $row[] = $value->hargaJasaRuangan;
            $row[] = $value->statusJasa;
            $row[] = $value->deskripsiJasa;
            $row[] = '<img src="data:' . $value->fileTypeJasa1 . ';base64,' . base64_encode($value->gambarJasa1) . '" style="width:100px;"/>';
            $row[] = '<img src="data:' . $value->fileTypeJasa2 . ';base64,' . base64_encode($value->gambarJasa2) . '" style="width:100px;"/>';
            $row[] = "<button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='bukaModulRubahDataJasa(" . $value->idJasaRuangan . ")'>Edit</button> <br/><br/> <button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='hapusDataJasa(" . $value->idJasaRuangan . ")'>Delete</button> <br/><br/><button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='editPropertie(" . $value->idJasaRuangan . ")'>Propertie</button>";
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

    function formValidationTambahJenisJasa() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('namaJenisJasa', 'namaJenisJasa', 'required');
        $this->form_validation->set_rules('statusJenisJasa', 'statusJenisJasa', 'required');
        return $this->form_validation->run();
    }

    function tambahJenisJasa() {
        $namaJenisJasa = $this->input->post('namaJenisJasa');
        $statusJenisJasa = $this->input->post('statusJenisJasa');

        if ($this->formValidationTambahJenisJasa() == TRUE) {
            $data = array(
                'namaJenisJasa' => $namaJenisJasa,
                'statusJenisJasa' => $statusJenisJasa,
            );
            $status = $this->KelolaJasa_model->input_data_jenis_jasa($data);

            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Jenis Jasa");
            if ($status) {
                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Jenis Jasa");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

    function formValidationTambahDataPropertie() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('idJasaRuangan', 'idJasaRuangan', 'required');
        $this->form_validation->set_rules('jumlahPropertie', 'jumlahPropertie', 'required');
        $this->form_validation->set_rules('idPropertie', 'idPropertie', 'required');
        return $this->form_validation->run();
    }

    function tambahDataPropertieJasa() {
        $idJasaRuangan = $this->input->post('idJasaRuangan');
        $jumlahPropertie = $this->input->post('jumlahPropertie');
        $idPropertie = $this->input->post('idPropertie');

        if ($this->formValidationTambahDataPropertie() == TRUE) {
            $data = array(
                'idJasaRuangan' => $idJasaRuangan,
                'jumlahPropertieJasa' => $jumlahPropertie,
                'idPropertie' => $idPropertie,
            );
            $status1 = $this->KelolaJasa_model->input_data_propertie_jasa($data);
            $status2 = $this->KelolaJasa_model->update_stock_propertie($idPropertie, $jumlahPropertie);


            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Propertie Jasa");
            if ($status1 && $status2) {
                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Propertie Jasa");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

    function getPropertieJasa() {
        $idJasa = $this->input->post('idJasa');
        $detail["data"] = $this->KelolaJasa_model->getPropertieJasa($idJasa);
        echo json_encode($detail);
    }

    function getDataPropertie() {
        $detail["data"] = $this->KelolaJasa_model->getDataPropertie();
        echo json_encode($detail);
    }

    function getJenisJasaById() {
        $idJenisJasa = $this->input->post('idJenisJasa');
        $detail = $this->KelolaJasa_model->getJenisJasaById($idJenisJasa);

//        $data['idMitra'] = $detail->idMitra;
//        $data['namaMitra'] = $detail->namaMitra;
//        $data['jenisMitra'] = $detail->jenisMitra;
//        $data['noTelpMitra'] = $detail->noTelpMitra;
//        $data['emailMitra'] = $detail->emailMitra;
//        $data['alamatMitra'] = $detail->alamatMitra;
//        $data['statusMitra'] = $detail->statusMitra;

        echo json_encode($detail);
    }

    function getJasaById() {
        $idJasa = $this->input->post('idJasa');

        $detail = $this->KelolaJasa_model->getJasaById($idJasa);
        $data['idJasaRuangan'] = $detail->idJasaRuangan;
        $data['idJenisJasa'] = $detail->idJenisJasa;
        $data['namaJasaRuangan'] = $detail->namaJasaRuangan;
        $data['hargaJasaRuangan'] = $detail->hargaJasaRuangan;
        $data['deskripsiJasa'] = $detail->deskripsiJasa;
        $data['statusJasa'] = $detail->statusJasa;
        $data['fileTypeJasa1'] = $detail->fileTypeJasa1;
        $data['fileTypeJasa2'] = $detail->fileTypeJasa2;
        $data['gambarJasa1'] = base64_encode($detail->gambarJasa1);
        $data['gambarJasa2'] = base64_encode($detail->gambarJasa2);
        echo json_encode($data);
    }

    function formValidationEditJenisJasa() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('idJenisJasa', 'idJenisJasa', 'required');
        $this->form_validation->set_rules('namaJenisJasa', 'namaJenisJasa', 'required');
        $this->form_validation->set_rules('statusJenisJasa', 'statusJenisJasa', 'required');
        return $this->form_validation->run();
    }

    function editJenisJasa() {
        $idJenisJasa = $this->input->post('idJenisJasa');
        $namaJenisJasa = $this->input->post('namaJenisJasa');
        $statusJenisJasa = $this->input->post('statusJenisJasa');

        if ($this->formValidationEditJenisJasa() == TRUE) {
            $data = array(
                'namaJenisJasa' => $namaJenisJasa,
                'statusJenisJasa' => $statusJenisJasa,
            );
            $status = $this->KelolaJasa_model->edit_data_jenis_jasa($data, $idJenisJasa);

            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Jenis Jasa");
            if ($status) {
                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Jenis Jasa");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

    function deleteJenisJasa() {
        $idJenisJasa = $this->input->post('idJenisJasa');

        $status1 = $this->KelolaJasa_model->deleteJenisJasa($idJenisJasa);
        $data = array("status" => "0", "message" => "Gagal Menghapus Data Jenis Jasa");
        if ($status1) {
            $data = array("status" => "1", "message" => "Berhasil Menghapus Data Jenis Jasa");
        }
        echo json_encode($data);
    }

    function deleteJasa() {
        $idJasaRuangan = $this->input->post('idJasaRuangan');

        $status1 = $this->KelolaJasa_model->deleteJasa($idJasaRuangan);
        $data = array("status" => "0", "message" => "Gagal Menghapus Data Jasa");
        if ($status1) {
            $data = array("status" => "1", "message" => "Berhasil Menghapus Data Jasa");
        }
        echo json_encode($data);
    }

    function formValidationTambahDataJasa() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('idJenisJasaRuangan', 'idJenisJasaRuangan', 'required');
        $this->form_validation->set_rules('namaJasa', 'namaJasa', 'required');
        $this->form_validation->set_rules('hargaJasa', 'hargaJasa', 'required');
        $this->form_validation->set_rules('statusJasa', 'statusJasa', 'required');
        $this->form_validation->set_rules('deskripsiJasa', 'deskripsiJasa', 'required');
        return $this->form_validation->run();
    }

    function tambahJasa() {
        $idJenisJasaRuangan = $this->input->post('idJenisJasaRuangan');
        $namaJasa = $this->input->post('namaJasa');
        $hargaJasa = $this->input->post('hargaJasa');
        $statusJasa = $this->input->post('statusJasa');
        $deskripsiJasa = $this->input->post('deskripsiJasa');
        $image1 = null;
        $type1 = null;
        $image2 = null;
        $type2 = null;
        if (!empty($_FILES)) {
            $image1 = file_get_contents($_FILES['image1']['tmp_name']);
            $type1 = $_FILES['image1']['type'];
            $image2 = file_get_contents($_FILES['image2']['tmp_name']);
            $type2 = $_FILES['image2']['type'];
        }
        if ($this->formValidationTambahDataJasa() == TRUE) {

            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Jasa");
            $data = array(
                'idJenisJasa' => $idJenisJasaRuangan,
                'namaJasaRuangan' => $namaJasa,
                'hargaJasaRuangan' => $hargaJasa,
                'statusJasa' => $statusJasa,
                'deskripsiJasa' => $deskripsiJasa,
                'fileTypeJasa1' => $type1,
                'fileTypeJasa2' => $type1,
                'gambarJasa1' => $image1,
                'gambarJasa2' => $image2
            );
            $status = $this->KelolaJasa_model->input_data_jasa($data);
            if ($status) {
                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Jasa");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

    function getDataJenisJasa() {
        $detail["data"] = $this->KelolaJasa_model->getDataJenisJasa();
        echo json_encode($detail);
    }

    function viewDataJasaDevelop() {
        $list = $this->KelolaJasa_model->view_data_jasa_develop();
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->namaJasaRuangan;
            $row[] = $value->hargaJasaRuangan;
            $row[] = $value->deskripsiJasa;
            $row[] = $value->statusJasa;
            $row[] = '<img src="data:' . $value->fileTypeJasa1 . ';base64,' . base64_encode($value->gambarJasa1) . '" style="width:100px;"/>';
            $row[] = '<img src="data:' . $value->fileTypeJasa2 . ';base64,' . base64_encode($value->gambarJasa2) . '" style="width:100px;"/>';
            if ($value->statusJasa == "onprogres") {
                $row[] = "<button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='progresJasaRuanganTask(" . $value->idJasaRuangan . ")'>Onprogres</button> ";
            } else if ($value->statusJasa == "develop") {
                $row[] = " <button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='pembuatanJasaRuanganTask(" . $value->idJasaRuangan . ")'>Develop</button> ";
            }
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

    function getPembuatanJasaByIdJasaRuangan() {
        $idJasa = $this->input->post('idJasaRuangan');
        $detail = $this->KelolaJasa_model->getPembuatanJasaByIdJasaRuangan($idJasa);
        echo json_encode($detail);
    }

    function getTaskByIdJasaRuangan() {
        $idJasa = $this->input->post('idJasaRuangan');
        $detail = $this->KelolaJasa_model->getTaskById($idJasa);
        echo json_encode($detail);
    }

    function formValidationTambahDevelop() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('idJasaRuangan', 'idJasaRuangan', 'required');
        $this->form_validation->set_rules('tglPembuatan', 'tglPembuatan', 'required');
        $this->form_validation->set_rules('dueDatePembuatan', 'dueDatePembuatan', 'required');
        $this->form_validation->set_rules('banyakPekerja', 'banyakPekerja', 'required');
        return $this->form_validation->run();
    }

    function tambahDevelop() {
        $idJasaRuangan = $this->input->post('idJasaRuangan');
        $tglPembuatan = $this->input->post('tglPembuatan');
        $dueDatePembuatan = $this->input->post('dueDatePembuatan');
        $banyakPekerja = $this->input->post('banyakPekerja');


        $namaTask = $this->input->post('namaTask');
        $tglTaskMulai = $this->input->post('tglTaskMulai');
        $tglTaskSelesai = $this->input->post('tglTaskSelesai');

        if ($this->formValidationTambahDevelop() == TRUE) {
            $data = array(
                'idUser' => $this->session->userdata("idUser"),
                'idjasaruangan' => $idJasaRuangan,
                'tglPembuatan' => $tglPembuatan,
                'dueDatePembuatan' => $dueDatePembuatan,
                'persentasePembuatan' => "0",
                'banyakPekerja' => $banyakPekerja,
            );

            $idPegawaiMembuatJasaRuangan = $this->KelolaJasa_model->input_data_develop($data);
            if ($idPegawaiMembuatJasaRuangan > 0) {
                for ($x = 0; $x < count($namaTask); $x++) {
                    $data = array(
                        'idPembuatanJasa' => $idPegawaiMembuatJasaRuangan,
                        'statusTask' => "onprogres",
                        'namaTask' => $namaTask[$x],
                        'tglTaskMulai' => $tglTaskMulai[$x],
                        'tglTaskSelesai' => $tglTaskSelesai[$x],
                    );

                    $this->KelolaJasa_model->input_data_task($data);
                }
                $data = array(
                    'statusJasa' => "onprogres",
                );
                $status = $this->KelolaJasa_model->edit_data_jasa($data, $idJasaRuangan);
                $data = array("status" => "0", "message" => "Gagal Menyimpan Data Jasa");
                if ($status) {
                    $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Pembuatan Jasa");
                }
            } else {
                $data = array("status" => "0", "message" => "Gagal Menyimpan Data Pembuatan Jasa");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

    function formValidationEditProgres() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('idPembuatanJasaProgres', 'idPembuatanJasaProgres', 'required');
        $this->form_validation->set_rules('idJasaRuangan', 'idJasaRuangan', 'required');
        $this->form_validation->set_rules('tglPembuatan', 'tglPembuatan', 'required');
        $this->form_validation->set_rules('dueDatePembuatan', 'dueDatePembuatan', 'required');
        $this->form_validation->set_rules('banyakPekerja', 'banyakPekerja', 'required');
        return $this->form_validation->run();
    }

    function editProgres() {
        $idPembuatanJasaProgres = $this->input->post('idPembuatanJasaProgres');
        $idJasaRuangan = $this->input->post('idJasaRuangan');
        $tglPembuatan = $this->input->post('tglPembuatan');
        $dueDatePembuatan = $this->input->post('dueDatePembuatan');
        $banyakPekerja = $this->input->post('banyakPekerja');


        $idTask = $this->input->post('idTask');
        $statusTask = $this->input->post('statusTaskProgres');
        $namaTask = $this->input->post('namaTask');
        $tglTaskMulai = $this->input->post('tglTaskMulai');
        $tglTaskSelesai = $this->input->post('tglTaskSelesai');

        if ($this->formValidationEditProgres() == TRUE) {
            $taskClose = 0;
            for ($x = 0; $x < count($idTask); $x++) {
                $data = array(
                    'statusTask' => $statusTask[$x],
                    'namaTask' => $namaTask[$x],
                    'tglTaskMulai' => $tglTaskMulai[$x],
                    'tglTaskSelesai' => $tglTaskSelesai[$x],
                );

                $this->KelolaJasa_model->edit_data_task($data, $idTask[$x]);
                if ($statusTask[$x] == "close") {
                    $taskClose++;
                }
            }

            $jumlahTask = count($idTask);
            $persentase = ($taskClose / $jumlahTask) * 100;

            $data = array(
                'idUser' => $this->session->userdata("idUser"),
                'tglPembuatan' => $tglPembuatan,
                'dueDatePembuatan' => $dueDatePembuatan,
                'persentasePembuatan' => $persentase,
                'banyakPekerja' => $banyakPekerja,
            );

            $status = $this->KelolaJasa_model->edit_data_progres($data, $idPembuatanJasaProgres);
            if ($persentase == 100) {
                $data = array(
                    'statusJasa' => "aktif",
                );
                $status2 = $this->KelolaJasa_model->edit_data_jasa($data, $idJasaRuangan);
            }
            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Jasa");
            if ($status) {
                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Pembuatan Jasa");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

    function formValidationEditJasa() {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('idJenisJasaRuangan', 'idJenisJasaRuangan', 'required');
        $this->form_validation->set_rules('namaJasa', 'namaJasa', 'required');
        $this->form_validation->set_rules('hargaJasa', 'hargaJasa', 'required');
        $this->form_validation->set_rules('statusJasa', 'statusJasa', 'required');
        $this->form_validation->set_rules('deskripsiJasa', 'deskripsiJasa', 'required');
        return $this->form_validation->run();
    }

    function editJasa() {

        $idJasaRuangan = $this->input->post('idJasaRuangan');
        $idJenisJasaRuangan = $this->input->post('idJenisJasaRuangan');
        $namaJasa = $this->input->post('namaJasa');
        $hargaJasa = $this->input->post('hargaJasa');
        $statusJasa = $this->input->post('statusJasa');
        $deskripsiJasa = $this->input->post('deskripsiJasa');

        if ($this->formValidationEditJasa() == TRUE) {
            $data = array(
                'idJenisJasa' => $idJenisJasaRuangan,
                'namaJasaRuangan' => $namaJasa,
                'hargaJasaRuangan' => $hargaJasa,
                'statusJasa' => $statusJasa,
                'deskripsiJasa' => $deskripsiJasa,
            );

            if ($this->input->post('image1') == "" || $this->input->post('image1') == null) {
                $image1 = file_get_contents($_FILES['image1']['tmp_name']);
                $type1 = $_FILES['image1']['type'];
                $data["fileTypeJasa1"] = $type1;
                $data["gambarJasa1"] = $image1;
            }

            if ($this->input->post('image2') == "" || $this->input->post('image2') == null) {
                $image2 = file_get_contents($_FILES['image2']['tmp_name']);
                $type2 = $_FILES['image2']['type'];
                $data["fileTypeJasa2"] = $type1;
                $data["gambarJasa2"] = $image1;
            }

            $status = $this->KelolaJasa_model->edit_data_jasa($data, $idJasaRuangan);
            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Jasa");
            if ($status) {
                $data = array("status" => "1", "message" => "Berhasil Menyimpan Data Jasa");
            }
            echo json_encode($data);
        } else {
            $data = array("status" => "0", "message" => validation_errors());
            echo json_encode($data);
        }
    }

    function loadDataTableLaporanPembuatanJasa() {
        $where = "";
        if ($this->input->post('firstDate') != "-" && $this->input->post('lastDate') != "-" && $this->input->post('firstDate') != "" && $this->input->post('lastDate') != "") {
            $where = "WHERE A.tglPembuatan BETWEEN STR_TO_DATE('" . $this->input->post('firstDate') . "','%Y-%m-%d') AND STR_TO_DATE('" . $this->input->post('lastDate') . "','%Y-%m-%d')";
        }
//        echo $where;
        $list = $this->KelolaJasa_model->loadDataTableLaporanPembuatanJasa($where);
        $data = array();
        $x = 0;

        foreach ($list as $value) {
            $row = array();
            $x++;
            $row[] = $x;
            $row[] = $value->namaJasaRuangan;
            $row[] = $value->namaJenisJasa;
            $row[] = $value->namaPegawai;
            $row[] = $value->tglPembuatan;
            $row[] = $value->dueDatePembuatan;
            $row[] = $value->persentasePembuatan . " %";
            $row[] = $value->banyakPekerja;

            $listTask = "";
            $list2 = $this->KelolaJasa_model->getTaskById($value->idjasaruangan);
            foreach ($list2 as $value2) {
                $listTask .= " <h4>" . $value2->namaTask . "</h4>
                                <ul>
                                <li>Status : " . $value2->statusTask . "</li>
                                <li>Date : " . $value2->tglTaskMulai . " s/d " . $value2->tglTaskSelesai . "</li>
                              </ul> 
                              <hr/>";
            }

            $row[] = $listTask;

//            <button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='hapusData(" . $value->idPropertie . ")'>Delete</button>
            $data[] = $row;
        }

        $output = array(
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

    function getDataJasaJoinJenisJasa() {
        $list = $this->KelolaJasa_model->getDataJasaJoinJenisJasa();
        foreach ($list as $detail) {
            $data['idJasaRuangan'][] = $detail->idJasaRuangan;
            $data['idJenisJasa'][] = $detail->idJenisJasa;
            $data['namaJasaRuangan'][] = $detail->namaJasaRuangan;
            $data['hargaJasaRuangan'][] = $detail->hargaJasaRuangan;
            $data['deskripsiJasa'][] = $detail->deskripsiJasa;
            $data['statusJasa'][] = $detail->statusJasa;
            $data['fileTypeJasa1'][] = $detail->fileTypeJasa1;
            $data['fileTypeJasa2'][] = $detail->fileTypeJasa2;
            $data['gambarJasa1'][] = base64_encode($detail->gambarJasa1);
            $data['gambarJasa2'][] = base64_encode($detail->gambarJasa2);
        }
        echo json_encode($data);
    }

    function getDataJasaJoinJenisJasaById() {
        $idJasa = $this->input->post('idJasa');

        $detail = $this->KelolaJasa_model->getDataJasaJoinJenisJasaById($idJasa);
        $data['idJasaRuangan'] = $detail->idJasaRuangan;
        $data['idJenisJasa'] = $detail->idJenisJasa;
        $data['namaJenisJasa'] = $detail->namaJenisJasa;
        $data['namaJasaRuangan'] = $detail->namaJasaRuangan;
        $data['hargaJasaRuangan'] = $detail->hargaJasaRuangan;
        $data['deskripsiJasa'] = $detail->deskripsiJasa;
        $data['statusJasa'] = $detail->statusJasa;
        $data['fileTypeJasa1'] = $detail->fileTypeJasa1;
        $data['fileTypeJasa2'] = $detail->fileTypeJasa2;
        $data['gambarJasa1'] = base64_encode($detail->gambarJasa1);
        $data['gambarJasa2'] = base64_encode($detail->gambarJasa2);

        $data['dataPropertie'] = $this->KelolaJasa_model->getPropertieJasa($idJasa);
//        foreach ($list as $value) {
//            $data['dataPropertie']["namaPropertie"] = $value->namaPropertie;
//            $data['dataPropertie'][] = $value->jumlahPropertieJasa;
//        }
        echo json_encode($data);
    }

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
//    function viewDataMitra() {
//        $list = $this->KelolaMitra_model->view_data_mitra();
//        $data = array();
//        $x = 0;
//
//        foreach ($list as $value) {
//            $row = array();
//            $x++;
//            $row[] = $x;
//            $row[] = $value->namaMitra;
//            $row[] = $value->jenisMitra;
//            $row[] = $value->noTelpMitra;
//            $row[] = $value->emailMitra;
//            $row[] = $value->alamatMitra;
//            $row[] = $value->statusMitra;
//            $row[] = "<button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='bukaModulRubahData(" . $value->idMitra . ")'>Edit</button> <button class='btn btn-success waves-effect waves-light m-l-10 btn-md' onclick='hapusData(" . $value->idMitra . ")'>Delete</button>";
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
//    function formValidationEditMitra() {
//        $this->form_validation->set_error_delimiters('<li>', '</li>');
//        $this->form_validation->set_rules('idMitra', 'idMitra', 'required');
//        $this->form_validation->set_rules('namaMitra', 'namaMitra', 'required');
//        $this->form_validation->set_rules('emailMitra', 'emailMitra', 'required|valid_email');
//        $this->form_validation->set_rules('noTelpMitra', 'noTelpMitra', 'required|numeric|max_length[12]');
//        $this->form_validation->set_rules('alamatMitra', 'alamatMitra', 'required');
//        return $this->form_validation->run();
//    }
//
//    function editMitra() {
//
//        $idMitra = $this->input->post('idMitra');
//        $namaMitra = $this->input->post('namaMitra');
//        $jenisMitra = $this->input->post('jenisMitra');
//        $noTelpMitra = $this->input->post('noTelpMitra');
//        $emailMitra = $this->input->post('emailMitra');
//        $alamatMitra = $this->input->post('alamatMitra');
//        $statusMitra = $this->input->post('statusMitra');
//
//        if ($this->formValidationEditMitra() == TRUE) {
//            $data = array(
//                'namaMitra' => $namaMitra,
//                'jenisMitra' => $jenisMitra,
//                'noTelpMitra' => $noTelpMitra,
//                'emailMitra' => $emailMitra,
//                'alamatMitra' => $alamatMitra,
//                'statusMitra' => $statusMitra,
//            );
//          
//            $status = $this->KelolaMitra_model->edit_data_mitra($data, $idMitra);
//            $data = array("status" => "0", "message" => "Gagal Menyimpan Data Mitra");
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
//    function getMitraById() {
//
//        $idMitra = $this->input->post('idMitra');
//        $detail = $this->KelolaMitra_model->getMitraById($idMitra);
//
//        $data['idMitra'] = $detail->idMitra;
//        $data['namaMitra'] = $detail->namaMitra;
//        $data['jenisMitra'] = $detail->jenisMitra;
//        $data['noTelpMitra'] = $detail->noTelpMitra;
//        $data['emailMitra'] = $detail->emailMitra;
//        $data['alamatMitra'] = $detail->alamatMitra;
//        $data['statusMitra'] = $detail->statusMitra;
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