<?php

class notifikasi_model extends CI_Model {

    var $table = "notification";

    function input_data($data) {
        return $this->db->insert($this->table, $data);
    }

    function edit_data($data, $id_notifikasi) {
        $this->db->where('id_notifikasi', $id_notifikasi);
        return $this->db->update($this->table, $data);
    }

    function delete_data($id_notifikasi) {
        $this->db->where('id_notifikasi', $id_notifikasi);
        return $this->db->delete($this->table);
    }

    function view_data() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    function viewNotifikasi($idUser) {
        $query = $this->db->query("SELECT * FROM notification WHERE fk_user='$idUser'");
        return $query->result();
    }

    
}

?>