<?php

class kelolamitra_model extends CI_Model {

    var $tableMitra = "mitra";
    var $tableUser = "user";

    function input_data_mitra($data) {
        return $this->db->insert($this->tableMitra, $data);
    }

    function view_data_mitra() {
        $query = $this->db->get($this->tableMitra);
        return $query->result();
    }

    function edit_data_mitra($data, $idMitra) {
        $this->db->where('idMitra', $idMitra);
        return $this->db->update($this->tableMitra, $data);
    }

    function getMitraById($idMitra) {
        $this->db->where('idMitra', $idMitra);
        $query = $this->db->get($this->tableMitra);
        return $query->row();
    }

    function deleteMitra($idMitra) {
        $this->db->where('idMitra', $idMitra);
        return $this->db->delete($this->tableMitra);
    }
}

?>