<?php

class kelolajasa_model extends CI_Model {

    var $tableJasa = "jasaruangan";
    var $tableJenisJasa = "jenisjasa";
    var $tablePembuatanJasa = "pegawaimembuatjasaruangan";
    var $tableTask = "task";
    var $tablePropertieJasa = "jasaruanganmemilikiproperties";
    var $tablePropertie = "propertie";

    function input_data_propertie_jasa($data) {
        return $this->db->insert($this->tablePropertieJasa, $data);
    }

    function input_data_jenis_jasa($data) {
        return $this->db->insert($this->tableJenisJasa, $data);
    }

    function input_data_develop($data) {
        $this->db->insert($this->tablePembuatanJasa, $data);
        return $this->db->insert_id();
    }

    function input_data_task($data) {
        $this->db->insert($this->tableTask, $data);
        return $this->db->insert_id();
    }

    function input_data_jasa($data) {
        return $this->db->insert($this->tableJasa, $data);
    }

//
    function view_data_jenis_jasa() {
        $query = $this->db->get($this->tableJenisJasa);
        return $query->result();
    }

    function view_data_jasa_develop() {
        $this->db->where('statusJasa', 'develop');
        $this->db->or_where('statusJasa', 'onprogres');
        $query = $this->db->get($this->tableJasa);
        return $query->result();
    }

    function view_data_jasa() {
        $query = $this->db->get($this->tableJasa);
        return $query->result();
    }

    function edit_data_jenis_jasa($data, $idJenisJasa) {
        $this->db->where('idJenisJasa', $idJenisJasa);
        return $this->db->update($this->tableJenisJasa, $data);
    }

    function edit_data_jasa($data, $idJasa) {
        $this->db->where('idJasaRuangan', $idJasa);
        return $this->db->update($this->tableJasa, $data);
    }

    function edit_data_task($data, $idTask) {
        $this->db->where('idTask', $idTask);
        return $this->db->update($this->tableTask, $data);
    }

    function edit_data_progres($data, $idPembuatanJasaProgres) {
        $this->db->where('idPegawaiMembuatJasaRuangan', $idPembuatanJasaProgres);
        return $this->db->update($this->tablePembuatanJasa, $data);
    }

//    function edit_data_mitra($data, $idMitra) {
//        $this->db->where('idMitra', $idMitra);
//        return $this->db->update($this->tableMitra, $data);
//    }
//
//    function getMitraById($idMitra) {
//        $this->db->where('idMitra', $idMitra);
//        $query = $this->db->get($this->tableMitra);
//        return $query->row();
//    }
    function getJenisJasaById($idJenisJasa) {
        $this->db->where('idJenisJasa', $idJenisJasa);
        $query = $this->db->get($this->tableJenisJasa);
        return $query->row();
    }

    function getJasaById($idJasa) {
        $this->db->where('idJasaRuangan', $idJasa);
        $query = $this->db->get($this->tableJasa);
        return $query->row();
    }

    function getPembuatanJasaByIdJasaRuangan($idJasa) {
        $this->db->where('idJasaRuangan', $idJasa);
        $query = $this->db->get($this->tablePembuatanJasa);
        return $query->row();
    }

    function getTaskById($idJasaRuangan) {
        $query = $this->db->query("SELECT A.* FROM task A JOIN pegawaimembuatjasaruangan B 
            ON(A.idPembuatanJasa=B.idPegawaiMembuatJasaRuangan)
            WHERE B.idJasaRuangan = $idJasaRuangan");
        return $query->result();
    }

    function getDataJasaJoinJenisJasa() {
        $query = $this->db->query("SELECT * FROM jasaruangan JOIN jenisjasa USING(idJenisJasa) Where statusJasa='aktif'");
        return $query->result();
    }

    function getDataJasaJoinJenisJasaById($idJasa) {
        $query = $this->db->query("SELECT * FROM jasaruangan JOIN jenisjasa USING(idJenisJasa) Where statusJasa='aktif' and idJasaRuangan='$idJasa'");
        return $query->row();
    }

    function loadDataTableLaporanPembuatanJasa($where = "") {
        $query = $this->db->query("SELECT A.idjasaruangan,A.idPegawaiMembuatJasaRuangan, C.namaJasaRuangan, D.namaJenisJasa, B.namaPegawai,A.tglPembuatan,A.dueDatePembuatan,A.persentasePembuatan,A.banyakPekerja "
                . "FROM pegawaimembuatjasaruangan A JOIN pegawai B On (A.idUser=B.idUser) JOIN jasaruangan C ON(A.idjasaruangan=C.idJasaRuangan) JOIN jenisjasa D ON (D.idJenisJasa=C.idJenisJasa) $where");
        return $query->result();
    }

    function getDataJenisJasa() {
        $this->db->where('statusJenisJasa', "aktif");
        $query = $this->db->get($this->tableJenisJasa);
        return $query->result();
    }

    function getDataPropertie() {
        $this->db->where('statusPropertie', "aktif");
        $query = $this->db->get($this->tablePropertie);
        return $query->result();
    }

    function getPropertieJasa($idJasa) {
//        echo "SELECT namaPropertie, jumlahPropertieJasa FROM jasaruanganmemilikiproperties JOIN jasaruangan USING (idJasaRuangan) JOIN propertie USING(idPropertie) WHERE idJasaRuangan='$idJasa' ";
        $query = $this->db->query("SELECT namaPropertie, jumlahPropertieJasa FROM jasaruanganmemilikiproperties JOIN jasaruangan USING (idJasaRuangan) JOIN propertie USING(idPropertie) WHERE idJasaRuangan='$idJasa' ");
        return $query->result();
    }

    function update_stock_propertie($idPropertie, $jumlahPropertie) {
//        echo "SELECT namaPropertie, jumlahPropertieJasa FROM jasaruanganmemilikiproperties JOIN jasaruangan USING (idJasaRuangan) JOIN propertie USING(idPropertie) WHERE idJasaRuangan='$idJasa' ";
        $query = $this->db->query("UPDATE propertie SET stockGudang=stockGudang-$jumlahPropertie WHERE idPropertie='$idPropertie'");
        return $query;
    }

//
    function deleteJenisJasa($idJenisJasa) {
        $this->db->where('idJenisJasa', $idJenisJasa);
        return $this->db->delete($this->tableJenisJasa);
    }

    function deleteJasa($idJasa) {
        $this->db->where('idJasaRuangan', $idJasa);
        return $this->db->delete($this->tableJasa);
    }

//    function deleteMitra($idMitra) {
//        $this->db->where('idMitra', $idMitra);
//        return $this->db->delete($this->tableMitra);
//    }
}

?>