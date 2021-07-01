<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('email')) {
		    redirect('home');
		}
		$this->load->model('M_dashboard', 'm_dashboard');
	}

	public function index(){       
		$data_title['title'] = 'Dashboard'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();
		
		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/dashboard.php',$profile);
        $this->load->view('footer.php');
	}

	public function profile(){       
		$data_title['title'] = 'Profile'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();
		
		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/profile.php', $profile);
        $this->load->view('footer.php');
	}

	public function ubah_profile(){ 
		$pengguna = $this->m_dashboard->get_data_pengguna();
		
		$data = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
		];

		$this->m_dashboard->update_profil($pengguna['id_pengguna'],$data);
		$this->session->set_flashdata('success', 'disimpan');
		redirect('profile');
	}

	public function kategori_pemasukan(){    
		$data_title['title'] = 'Kategori Pemasukan'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();
		
		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/kategori_pemasukan.php');
        $this->load->view('footer.php');
	}

	public function kategori_pengeluaran(){    
		$data_title['title'] = 'Kategori Pengeluaran'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();
		
		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/kategori_pengeluaran.php');
        $this->load->view('footer.php');
	}

	public function pemasukan(){        
		$data_title['title'] = 'Pemasukan'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();
		
		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/pemasukan.php');
        $this->load->view('footer.php');
	}

	public function pengeluaran(){ 
		$data_title['title'] = 'Pengeluaran'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();
		
		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/pengeluaran.php');
        $this->load->view('footer.php');
	}

	public function gaji_karyawan(){  
		$data_title['title'] = 'Gaji Karyawan'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();
		
		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/gaji_karyawan.php');
        $this->load->view('footer.php');
	}

	public function data_karyawan(){ 
		$data_title['title'] = 'Data Karyawan'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();
		
		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/data_karyawan.php');
        $this->load->view('footer.php');
	}
}
