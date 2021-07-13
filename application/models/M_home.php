<?php

class M_home extends CI_Model {
    
    public function daftar_akun($data){
        $query = $this->db->insert('pengguna', $data);
        return $query ? true : false;
    }
    
    public function update_akun($email,$data){
        $query = $this->db->where('email', $email)->update('pengguna', $data); 
        return $query ? true : false;
    }

    public function cek_pengguna($email){
        return $this->db->get_where('pengguna', ['email' => $email])->row_array();
    }

}