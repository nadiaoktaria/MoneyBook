<?php

class M_dashboard extends CI_Model {
    
    public function get_data_pengguna(){
        return $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function update_profil($id,$data){
        $this->db->where('id_pengguna', $id)->update('pengguna', $data); 
    } 

    public function kategori_pemasukan_post($data){
		$this->db->insert('kategori_pemasukan', $data);
	}

    public function kategori_pemasukan_get($id_pengguna){
        return $this->db->get_where('kategori_pemasukan', ['id_pengguna' => $id_pengguna])->result();
    }

    public function kategori_pemasukan_delete($id_kategori_pemasukan){
        return $this->db->delete('kategori_pemasukan', array('id_kategori_pemasukan' => $id_kategori_pemasukan)); 
    }
    
    public function kategori_pengeluaran_post($data){
		$this->db->insert('kategori_pengeluaran', $data);
	}

    public function kategori_pengeluaran_get($id_pengguna){
        return $this->db->get_where('kategori_pengeluaran', ['id_pengguna' => $id_pengguna])->result();
    }

    public function kategori_pengeluaran_delete($id_kategori_pengeluaran){
        return $this->db->delete('kategori_pengeluaran', array('id_kategori_pengeluaran' => $id_kategori_pengeluaran)); 
    }
}