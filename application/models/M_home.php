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

    public function getAllUtang(){
        $query = $this->db
        ->select('nama, email, kreditur, jumlah_utang, jumlah_bayar, tanggal_utang, tanggal_tempo, keterangan, status_utang')
        ->from('utang')
        ->where('utang.status_utang', 'Belum Lunas')
        ->where('utang.pengingat', 'Aktif')
        ->join('pengguna','pengguna.id_pengguna = utang.id_pengguna')
        ->get()->result();
        return $query;
    }

}