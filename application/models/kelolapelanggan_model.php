<?php

class kelolapelanggan_model extends CI_Model {

   var $tablePelanggan = "pelanggan";
    var $tableJasaRuangan = "jasaruangan";
    var $tablePemesanan = "pemesanan";
    var $tableFeedbackPelanggan= "feedbackpelanggan";

    function input_data_pelanggan($data) {
        return $this->db->insert($this->tablePelanggan, $data);
    }
    function input_data_feedback($data) {
        return $this->db->insert($this->tableFeedbackPelanggan, $data);
    }

    function input_data_pemesanan($data) {
        return $this->db->insert($this->tablePemesanan, $data);
    }

    function view_data_pemesanan() {
        $query = $this->db->query("SELECT idPemesanan, idUser, idJasaRuangan, tglBooking, tglSelesaiBooking, namaJasaRuangan FROM pemesanan JOIN jasaruangan USING(idJasaRuangan) ORDER BY tglBooking DESC");
        return $query->result();
    }
    function loadDataTablePelanggan($where) {
        $query = $this->db->query("SELECT A.*,IFNULL((SELECT AVG(ratingPemesanan) FROM feedbackpelanggan B JOIN pemesanan C ON(B.idPemesanan=C.idPemesanan) WHERE C.idUser=A.idUser),'0') AS avgRatingPemesanan, (SELECT COUNT(idPemesanan) FROM pemesanan D WHERE D.idUser=A.idUser) banyakPemasanan FROM pelanggan A $where");
        return $query->result();
    }
    function view_data_laporan_pemesanan($where) {
        $query = $this->db->query("SELECT idPemesanan, namaPelanggan, idJasaRuangan, tglBooking, tglSelesaiBooking, namaJasaRuangan,hargaDibayar,statusPemesanan FROM pemesanan JOIN jasaruangan USING(idJasaRuangan) JOIN pelanggan USING(idUser) $where ORDER BY tglBooking DESC");
        return $query->result();
    }
    function view_data_pemesanan_by_user() {
        $query = $this->db->query("SELECT idPemesanan, idUser, idJasaRuangan, tglBooking, tglSelesaiBooking, namaJasaRuangan, idFeedBack, ratingPemesanan,deskripsiPemesanan FROM pemesanan JOIN jasaruangan USING(idJasaRuangan) LEFT JOIN feedbackpelanggan USING(idPemesanan) WHERE idUser='".$this->session->userdata('idUser')."' ORDER BY tglBooking DESC");
        return $query->result();
    }
      function getDataChartLinePendapatan() {
        $query = $this->db->query("SELECT distinct STR_TO_DATE(tglBooking,'%Y-%m') periode, (SELECT SUM(hargaDibayar) FROM pemesanan B WHERE STR_TO_DATE(A.tglBooking,'%Y-%m') = STR_TO_DATE(B.tglBooking,'%Y-%m')) pendapatan FROM pemesanan A");
        return $query->result();
    }
    

//    function view_data_pegawai() {
//        $query = $this->db->get($this->tablePegawai);
//        return $query->result();
//    }
//
//    function edit_data_pegawai($data, $idPegawai) {
//        $this->db->where('idPegawai', $idPegawai);
//        return $this->db->update($this->tablePegawai, $data);
//    }
//
    function getDataJasa($idJasaRuangan) {
        $this->db->where('idJasaRuangan', $idJasaRuangan);
        $query = $this->db->get($this->tableJasaRuangan);
        return $query->row();
    }

    function checkTglBookingBentrok($startDate, $endDate, $idJasaRuangan) {
        $query = $this->db->query("SELECT idPemesanan FROM pemesanan WHERE ('$startDate' BETWEEN tglBooking AND tglSelesaiBooking OR '$endDate' BETWEEN tglBooking AND tglSelesaiBooking) AND idJasaruangan='$idJasaRuangan'");
        return $query->num_rows();
        ;
    }

//
//    function deletePegawai($idPegawai) {
//        $this->db->where('idPegawai', $idPegawai);
//        return $this->db->delete($this->tablePegawai);
//    }
//
//    function deleteUser($idUser) {
//        $this->db->where('idUser', $idUser);
//        return $this->db->delete($this->tableUser);
//    }
}

?>