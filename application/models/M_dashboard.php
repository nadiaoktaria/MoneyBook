<?php

class M_dashboard extends CI_Model {
    
    public function get_data_pengguna(){
        return $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function update_profil($id,$data){
        $this->db->where('id_pengguna', $id)->update('pengguna', $data); 
    } 
}