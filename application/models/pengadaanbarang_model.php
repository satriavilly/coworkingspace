<?php

class pengadaanbarang_model extends CI_Model {

    var $tablePengadaan = "pengadaanpropertie";
    var $tablePropertie = "propertie";
    var $tableMitra = "mitra";
    var $tableFeedback = "feedbackpengadaan";

    function input_data_pengadaan($data) {
        return $this->db->insert($this->tablePengadaan, $data);
    }

    function input_data_propertie($data) {
        $this->db->insert($this->tablePropertie, $data);
        return $this->db->insert_id();
    }

    function input_data_feedback($data) {
        return $this->db->insert($this->tableFeedback, $data);
//        return $this->db->insert_id();
    }

    function update_stock_gudang($idPengadaan) {
        $data = $this->getPengadaanById($idPengadaan);
        $jumlahPengadaan = $data->jumlahPengadaan;
        $idPropertie = $data->idPropertie;

        $data2 = $this->getPropertieById($idPropertie);
        $stockGudang = $data2->stockGudang;

        $stockSekarang = $stockGudang + $jumlahPengadaan;

        $data = array(
            "stockGudang" => $stockSekarang
        );

        $this->db->where('idPropertie', $idPropertie);
        return $this->db->update($this->tablePropertie, $data);
    }

    function view_data_propertie() {
        $query = $this->db->query("select * from " . $this->tablePropertie . " join " . $this->tableMitra . " using (idMitra)");
        return $query->result();
    }

    function view_data_pengadaan() {
        $query = $this->db->query("SELECT * FROM pengadaanpropertie JOIN propertie USING(idPropertie) JOIN mitra USING (idMitra)");
        return $query->result();
    }

    function loadDataTableLaporanPengadaan($where = "") {
//        WHERE tglPengadaan BETWEEN '2018-01-16' AND '2018-01-16'
        $query = $this->db->query("SELECT idPengadaanPropertie, namaPropertie,stockGudang, namaMitra, namaPegawai, tglPengadaan, statusPengadaan, jumlahPengadaan, satuan FROM `pengadaanpropertie` JOIN propertie USING(idPropertie) JOIN mitra USING(idMitra) JOIN pegawai USING (idUser) " . $where);
        return $query->result();
    }

    function edit_data_Pengadaan($data, $idPengadaan) {
        $this->db->where('idPengadaanPropertie', $idPengadaan);
        return $this->db->update($this->tablePengadaan, $data);
    }

    function getPengadaanById($idPengadaan) {
        $this->db->where('idPengadaanPropertie', $idPengadaan);
        $query = $this->db->get($this->tablePengadaan);
        return $query->row();
    }

    function getPropertieById($idPropertie) {
        $this->db->where('idPropertie', $idPropertie);
        $query = $this->db->get($this->tablePropertie);
        return $query->row();
    }

    function getDataMitra() {
        $this->db->where('statusMitra', "aktif");
        $query = $this->db->get($this->tableMitra);
        return $query->result();
    }

    function getDataPropertie() {
        $this->db->where('statusPropertie', "aktif");
        $query = $this->db->get($this->tablePropertie);
        return $query->result();
    }

    function getDataChartLinePengadaan() {
//        $this->db->where('statusMitra', "aktif");
        $query = $this->db->query("SELECT Distinct tglPengadaan, 
                    (select count(B.idPengadaanPropertie) from pengadaanpropertie B where statusPengadaan='onprogress'and A.idPengadaanPropertie=B.idPengadaanPropertie) AS onprogress,
                    (select count(B.idPengadaanPropertie) from pengadaanpropertie B   where statusPengadaan='close' and A.idPengadaanPropertie=B.idPengadaanPropertie) AS close
                    FROM pengadaanpropertie A");
        return $query->result();
    }

    function deleteMitra($idMitra) {
        $this->db->where('idMitra', $idMitra);
        return $this->db->delete($this->tableMitra);
    }

}

?>