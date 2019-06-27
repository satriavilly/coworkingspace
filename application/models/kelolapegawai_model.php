<?php

class kelolapegawai_model extends CI_Model {

    var $tablePegawai = "pegawai";
    var $tableUser = "user";

    function input_data_pegawai($data) {
        return $this->db->insert($this->tablePegawai, $data);
    }

    function view_data_pegawai() {
        $query = $this->db->get($this->tablePegawai);
        return $query->result();
    }

    function edit_data_pegawai($data, $idPegawai) {
        $this->db->where('idPegawai', $idPegawai);
        return $this->db->update($this->tablePegawai, $data);
    }

    function getPegawaiById($idPegawai) {
        $this->db->where('idPegawai', $idPegawai);
        $query = $this->db->get($this->tablePegawai);
        return $query->row();
    }

    function deletePegawai($idPegawai) {
        $this->db->where('idPegawai', $idPegawai);
        return $this->db->delete($this->tablePegawai);
    }

    function deleteUser($idUser) {
        $this->db->where('idUser', $idUser);
        return $this->db->delete($this->tableUser);
    }

}

?>