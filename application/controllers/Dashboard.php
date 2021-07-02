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
		$this->session->set_flashdata('success', 'Profile Berhasil Disimpan!');
		redirect('profile');
	}
	
	// CRUD Pemasukan

	public function kategori_pemasukan(){    
		$data_title['title'] = 'Kategori Pemasukan'; 
		$profile['pengguna'] = $this->m_dashboard->get_data_pengguna();

		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/kategori_pemasukan.php');
        $this->load->view('footer.php');
	}

	public function get_kategori_pemasukan(){
		$pengguna =  $this->m_dashboard->get_data_pengguna();
		$data = $this->m_dashboard->kategori_pemasukan_get($pengguna['id_pengguna']);
		echo json_encode($data);
	}

	public function tambah_kategori_pemasukan(){
		$pengguna =  $this->m_dashboard->get_data_pengguna();
		$data = [
			'id_pengguna' => $pengguna['id_pengguna'],
			'kode' => $this->input->post('kode'),
			'nama_kategori' => $this->input->post('nama_kategori'),
		];

		$this->m_dashboard->kategori_pemasukan_post($data);
		$this->session->set_flashdata('success', 'Kategori Pemasukan Berhasil di Tambahkan!');
		redirect('kategori_pemasukan');
	}

	public function hapus_kategori_pemasukan(){
		if(isset($_POST['id']) && !empty($_POST['id'])){
			$this->m_dashboard->kategori_pemasukan_delete($_POST['id']);
			echo "success";
			exit();
		}
	}

	public function edit_kategori_pemasukan(){    
		if(isset($_POST['id']) && !empty($_POST['id'])){
			$data = [
				'kode' => $_POST['kode'],
				'nama_kategori' => $_POST['nama'],
			];
			$this->m_dashboard->kategori_pemasukan_edit($_POST['id'],$data);
			echo "success";
			exit();
		}
	}

	// CRUD Pengeluaran

	public function kategori_pengeluaran(){    
		$data_title['title'] = 'Kategori Pengeluaran'; 
		$profile['pengguna'] = $this->m_dashboard->get_data_pengguna();
		
		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/kategori_pengeluaran.php');
        $this->load->view('footer.php');
	}

	public function get_kategori_pengeluaran(){
		$pengguna =  $this->m_dashboard->get_data_pengguna();
		$data = $this->m_dashboard->kategori_pengeluaran_get($pengguna['id_pengguna']);
		echo json_encode($data);
	}

	public function tambah_kategori_pengeluaran(){
		$pengguna =  $this->m_dashboard->get_data_pengguna();
		$data = [
			'id_pengguna' => $pengguna['id_pengguna'],
			'kode' => $this->input->post('kode'),
			'nama_kategori' => $this->input->post('nama_kategori'),
		];

		$this->m_dashboard->kategori_pengeluaran_post($data);
		$this->session->set_flashdata('success', 'Kategori Pengeluaran Berhasil di Tambahkan!');
		redirect('kategori_pengeluaran');
	}

	public function hapus_kategori_pengeluaran($id_kategori_pengeluaran){
		$this->m_dashboard->kategori_pengeluaran_delete($id_kategori_pengeluaran);
		$this->session->set_flashdata('success', 'Kategori Pengeluaran Berhasil di Hapus!');
		redirect('kategori_pengeluaran');
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
