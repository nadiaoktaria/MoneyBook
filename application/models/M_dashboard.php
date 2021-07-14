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

    public function kategori_pemasukan_get($id){
        return $this->db->get_where('kategori_pemasukan', ['id_pengguna' => $id])->result();
    }

    public function kategori_pemasukan_delete($id){
        return $this->db->delete('kategori_pemasukan', array('id_kategori_pemasukan' => $id)); 
    }
    
    public function kategori_pemasukan_edit($id,$data){
        $this->db->where('id_kategori_pemasukan', $id)->update('kategori_pemasukan', $data); 
    }

    public function kategori_pengeluaran_post($data){
		$this->db->insert('kategori_pengeluaran', $data);
	}
    public function get_kategori_pengeluaran_byId($id){
        return $this->db->get_where('kategori_pengeluaran', ['id_kategori_pengeluaran' => $id])->row_array();
    }

    public function kategori_pengeluaran_get($id){
        return $this->db->get_where('kategori_pengeluaran', ['id_pengguna' => $id])->result();
    }

    public function kategori_pengeluaran_delete($id){
        return $this->db->delete('kategori_pengeluaran', array('id_kategori_pengeluaran' => $id)); 
    }
    
    public function kategori_pengeluaran_edit($id,$data){
        $this->db->where('id_kategori_pengeluaran', $id)->update('kategori_pengeluaran', $data); 
    } 

    public function transaksi_pemasukan_get($id){
        $query = $this->db->select('*')
        ->from('pemasukan')
        ->where('pemasukan.id_pengguna',$id)
        ->join('kategori_pemasukan','kategori_pemasukan.id_kategori_pemasukan = pemasukan.id_kategori_pemasukan')
        ->get()->result();
        return $query;
    }

    public function transaksi_pemasukan_post($data){
		$this->db->insert('pemasukan', $data);
	}

    public function transaksi_pemasukan_delete($id){
        return $this->db->delete('pemasukan', array('id_pemasukan' => $id)); 
    }
    
    public function transaksi_pemasukan_edit($id,$data){
        $this->db->where('id_pemasukan', $id)->update('pemasukan', $data); 
    } 

    public function transaksi_pengeluaran_get($id){
        $query = $this->db->select('*')
        ->from('pengeluaran')
        ->where('pengeluaran.id_pengguna',$id)
        ->join('kategori_pengeluaran','kategori_pengeluaran.id_kategori_pengeluaran = pengeluaran.id_kategori_pengeluaran')
        ->get()->result();
        return $query;
    }

    public function transaksi_pengeluaran_post($data){
		$this->db->insert('pengeluaran', $data);
	}

    public function transaksi_pengeluaran_delete($id){
        return $this->db->delete('pengeluaran', array('id_pengeluaran' => $id)); 
    }
    
    public function transaksi_pengeluaran_edit($id,$data){
        $this->db->where('id_pengeluaran', $id)->update('pengeluaran', $data); 
    }

    public function debitur_get($id){
        return $this->db->get_where('debitur', ['id_pengguna' => $id])->result();
    }

    public function debitur_post($data){
		$this->db->insert('debitur', $data);
	}
    
    public function debitur_edit($id,$data){
        $this->db->where('id_debitur', $id)->update('debitur', $data); 
    } 

    public function debitur_delete($id){
        return $this->db->delete('debitur', array('id_debitur' => $id)); 
    }

    public function piutang_get($id){
        $query = $this->db->select('*')
        ->from('piutang')
        ->where('piutang.id_pengguna',$id)
        ->join('debitur','debitur.id_debitur = piutang.id_debitur')
        ->get()->result();
        return $query;
    }

    public function piutang_post($data){
		$this->db->insert('piutang', $data);
	}
    
    public function total_pemasukan($id,$firstDate,$lastDate){
        $query = $this->db->select('sum(nominal) as total_pemasukan')
            ->from('pemasukan')
            ->where('id_pengguna',$id)
            ->where('tanggal >=',$firstDate)
            ->where('tanggal <=',$lastDate)
            ->get()->row_array();
        return $query;
    }
    
    public function total_pengeluaran($id,$firstDate,$lastDate){
        $query = $this->db->select('sum(nominal) as total_pengeluaran')
            ->from('pengeluaran')
            ->where('id_pengguna',$id)
            ->where('tanggal >=',$firstDate)
            ->where('tanggal <=',$lastDate)
            ->get()->row_array();
        return $query;
    }
    
    public function get_pemasukan_harian($id,$date){
        $query = $this->db->select('sum(nominal) as total_pemasukan')
            ->from('pemasukan')
            ->where('id_pengguna',$id)
            ->where('tanggal',$date)
            ->get()->row_array();
        return $query;
    }
    
    public function get_jumlah_kategori_pemasukan($id,$firstDate,$lastDate){
        $query = $this->db->select('*')
        ->from('pemasukan')
        ->where('pemasukan.id_pengguna',$id)
        ->where('pemasukan.tanggal >=',$firstDate)
        ->where('pemasukan.tanggal <=',$lastDate)
        ->join('kategori_pemasukan','kategori_pemasukan.id_kategori_pemasukan = pemasukan.id_kategori_pemasukan')
        ->get()->result();
        return $query;
    }
    
    
    public function get_pengeluaran_harian($id,$date){
        $query = $this->db->select('sum(nominal) as total_pengeluaran')
            ->from('pengeluaran')
            ->where('id_pengguna',$id)
            ->where('tanggal',$date)
            ->get()->row_array();
        return $query;
    }
    
    public function get_jumlah_kategori_pengeluaran($id,$firstDate,$lastDate){
        $query = $this->db->select('*')
        ->from('pengeluaran')
        ->where('pengeluaran.id_pengguna',$id)
        ->where('pengeluaran.tanggal >=',$firstDate)
        ->where('pengeluaran.tanggal <=',$lastDate)
        ->join('kategori_pengeluaran','kategori_pengeluaran.id_kategori_pengeluaran = pengeluaran.id_kategori_pengeluaran')
        ->get()->result();
        return $query;
    }

    public function data_karyawan_get($id){
        return $this->db->get_where('karyawan', ['id_pengguna' => $id])->result();
    }

    public function data_karyawan_post($data){
		$this->db->insert('karyawan', $data);
	}
    
    public function data_karyawan_edit($id,$data){
        $this->db->where('id_karyawan', $id)->update('karyawan', $data); 
    }

    public function data_karyawan_delete($id){
        return $this->db->delete('karyawan', array('id_karyawan' => $id)); 
    }

    public function reset_transaksi_pemasukan($id){
        return $this->db->delete('pemasukan', array('id_pengguna' => $id)); 
    }

    public function reset_transaksi_pengeluaran($id){
        return $this->db->delete('pengeluaran', array('id_pengguna' => $id)); 
    }

}