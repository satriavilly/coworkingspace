<?php

class monitoringdatapropertie_model extends CI_Model {

    var $tableMitra = "mitra";
    var $tablePropertie = "propertie";

    function input_data_mitra($data) {
        return $this->db->insert($this->tableMitra, $data);
    }

    function view_data_propertie() {
        $query = $this->db->query("select * from " . $this->tablePropertie . " join " . $this->tableMitra . " using (idMitra)");
        return $query->result();
    }
    function view_data_pengadaan() {
        $query = $this->db->query("SELECT * FROM pengadaanpropertie JOIN propertie USING(idPropertie)");
        return $query->result();
    }

    function edit_data_propertie($data, $idPropertie) {
        $this->db->where('idPropertie', $idPropertie);
        return $this->db->update($this->tablePropertie, $data);
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

    function getDataChartLinePengadaan() {
//        $this->db->where('statusMitra', "aktif");
        $query = $this->db->query("SELECT Distinct tglPengadaan, 
                    (select sum(B.jumlahPengadaan) from pengadaanpropertie B where statusPengadaan='onprogress'and A.idPengadaanPropertie=B.idPengadaanPropertie) AS onprogress,
                    (select sum(B.jumlahPengadaan) from pengadaanpropertie B   where statusPengadaan='close' and A.idPengadaanPropertie=B.idPengadaanPropertie) AS close
                    FROM pengadaanpropertie A ORDER BY tglPengadaan DESC");
        return $query->result();
    }

    function deleteMitra($idMitra) {
        $this->db->where('idMitra', $idMitra);
        return $this->db->delete($this->tableMitra);
    }

}

?>