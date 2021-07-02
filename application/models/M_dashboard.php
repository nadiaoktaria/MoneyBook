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
    
    public function get_kategori_pemasukan_byId($id){
        return $this->db->get_where('kategori_pemasukan', ['id_kategori_pemasukan' => $id])->row_array();
    }

    public function kategori_pemasukan_get($id_pengguna){
        return $this->db->get_where('kategori_pemasukan', ['id_pengguna' => $id_pengguna])->result();
    }

    public function kategori_pemasukan_delete($id_kategori_pemasukan){
        return $this->db->delete('kategori_pemasukan', array('id_kategori_pemasukan' => $id_kategori_pemasukan)); 
    }
    
    public function kategori_pemasukan_edit($id,$data){
        $this->db->where('id_kategori_pemasukan', $id)->update('kategori_pemasukan', $data); 
    } 
    
    // pengeluaran

    public function kategori_pengeluaran_post($data){
		$this->db->insert('kategori_pengeluaran', $data);
	}
    public function get_kategori_pengeluaran_byId($id){
        return $this->db->get_where('kategori_pengeluaran', ['id_kategori_pengeluaran' => $id])->row_array();
    }

    public function kategori_pengeluaran_get($id_pengguna){
        return $this->db->get_where('kategori_pengeluaran', ['id_pengguna' => $id_pengguna])->result();
    }

    public function kategori_pengeluaran_delete($id_kategori_pengeluaran){
        return $this->db->delete('kategori_pengeluaran', array('id_kategori_pengeluaran' => $id_kategori_pengeluaran)); 
    }
    
    public function kategori_pengeluaran_edit($id,$data){
        $this->db->where('id_kategori_pengeluaran', $id)->update('kategori_pengeluaran', $data); 
    } 

    public function transaksi_pemasukan_get($id_pengguna){
        $query = $this->db->select('*')
        ->from('pemasukan')
        ->where('pemasukan.id_pengguna',$id_pengguna)
        ->join('kategori_pemasukan','kategori_pemasukan.id_kategori_pemasukan = pemasukan.id_kategori_pemasukan')
        ->get()->result();

        return $query;
    }

    public function transaksi_pemasukan_post($data){
		$this->db->insert('pemasukan', $data);
	}

    public function transaksi_pemasukan_delete($id_transaksi_pemasukan){
        return $this->db->delete('pemasukan', array('id_pemasukan' => $id_transaksi_pemasukan)); 
    }
    
    public function transaksi_pemasukan_edit($id,$data){
        $this->db->where('id_pemasukan', $id)->update('pemasukan', $data); 
    } 
    public function transaksi_pengeluaran_get($id_pengguna){
        $query = $this->db->select('*')
        ->from('pengeluaran')
        ->where('pengeluaran.id_pengguna',$id_pengguna)
        ->join('kategori_pengeluaran','kategori_pengeluaran.id_kategori_pengeluaran = pengeluaran.id_kategori_pengeluaran')
        ->get()->result();

        return $query;
    }

    public function transaksi_pengeluaran_post($data){
		$this->db->insert('pengeluaran', $data);
	}

    public function transaksi_pengeluaran_delete($id_transaksi_pengeluaran){
        return $this->db->delete('pengeluaran', array('id_pengeluaran' => $id_transaksi_pengeluaran)); 
    }
    
    public function transaksi_pengeluaran_edit($id,$data){
        $this->db->where('id_pengeluaran', $id)->update('pengeluaran', $data); 
    } 
    
}