<?php

class user_model extends CI_Model {

    var $tabel = 'user';

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('role !=', 'member');
        $query = $this->db->get($this->tabel);
        if ($query->num_rows() > 0) {
            $data = $query->row();

            $newdata = array(
                'idUser' => $data->idUser,
                'role' => $data->role,
                'username' => $data->username,
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            return true;
        } else {
            return false;
        }
    }
    function loginMember($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('role ', 'member');
        $query = $this->db->get($this->tabel);
        if ($query->num_rows() > 0) {
            $data = $query->row();

            $newdata = array(
                'idUser' => $data->idUser,
                'role' => $data->role,
                'username' => $data->username,
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            return true;
        } else {
            return false;
        }
    }

    function signup($nis, $role) {
        $data = array(
            'username' => $nis,
            'password' => $nis,
            'role' => $role);
        $this->db->insert($this->tabel, $data);
        return $this->db->insert_id();
    }
    function signupmember($username,$password, $role) {
        $data = array(
            'username' => $username,
            'password' => $password,
            'role' => $role);
        $this->db->insert($this->tabel, $data);
        return $this->db->insert_id();
    }

}

?>