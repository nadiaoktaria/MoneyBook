<?php

class M_home extends CI_Model {
    
    public function daftar_akun($data){
        return $this->db->insert('pengguna', $data);
    }

    public function cek_pengguna($email){
        return $this->db->get_where('pengguna', ['email' => $email])->row_array();
    }

}