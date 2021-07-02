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
	
	// CRUD Kategori Pemasukan

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
		if(!empty($_POST['kode']) && !empty($_POST['nama'])){
			$pengguna =  $this->m_dashboard->get_data_pengguna();

			$data = [
				'id_pengguna' => $pengguna['id_pengguna'],
				'kode' => $_POST['kode'],
				'nama_kategori' => $_POST['nama'],
			];

			$this->m_dashboard->kategori_pemasukan_post($data);
			echo "success";
			exit();
		}
	}

	public function hapus_kategori_pemasukan(){
		if(!empty($_POST['id'])){
			$this->m_dashboard->kategori_pemasukan_delete($_POST['id']);
			echo "success";
			exit();
		}
	}

	public function edit_kategori_pemasukan(){    
		if(!empty($_POST['id']) && !empty($_POST['kode']) && !empty($_POST['nama'])){
			$data = [
				'kode' => $_POST['kode'],
				'nama_kategori' => $_POST['nama'],
			];
			$this->m_dashboard->kategori_pemasukan_edit($_POST['id'],$data);
			echo "success";
			exit();
		}
	}

	// CRUD Kategori Pengeluaran

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
		if(!empty($_POST['kode']) && !empty($_POST['nama'])){
			$pengguna =  $this->m_dashboard->get_data_pengguna();

			$data = [
				'id_pengguna' => $pengguna['id_pengguna'],
				'kode' => $_POST['kode'],
				'nama_kategori' => $_POST['nama'],
			];

			$this->m_dashboard->kategori_pengeluaran_post($data);
			echo "success";
			exit();
		}
	}

	public function hapus_kategori_pengeluaran(){
		if(!empty($_POST['id'])){
			$this->m_dashboard->kategori_pengeluaran_delete($_POST['id']);
			echo "success";
			exit();
		}
	}

	public function edit_kategori_pengeluaran(){    
		if(!empty($_POST['id']) && !empty($_POST['kode']) && !empty($_POST['nama'])){
			$data = [
				'kode' => $_POST['kode'],
				'nama_kategori' => $_POST['nama'],
			];
			$this->m_dashboard->kategori_pengeluaran_edit($_POST['id'],$data);
			echo "success";
			exit();
		}
	}

	// Transaksi Pemasukan
	public function pemasukan(){        
		$data_title['title'] = 'Pemasukan'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();
		$kategori['kategori'] = $this->m_dashboard->kategori_pemasukan_get($profile['pengguna']['id_pengguna']);

		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/pemasukan.php',$kategori);
        $this->load->view('footer.php');
	}

	public function get_transaksi_pemasukan(){
		$pengguna =  $this->m_dashboard->get_data_pengguna();
		$kategori = $this->m_dashboard->transaksi_pemasukan_get($pengguna['id_pengguna']);

		$data = [];
		$no = 0;
		foreach ($kategori as $list) {
			$no++;
			$row = [];
			$row['No'] = $no;
			$row['Tanggal'] = $list->tanggal;
			$row['Kategori'] = $list->nama_kategori;
			$row['Nominal'] = $list->nominal;
			$row['Keterangan'] = $list->keterangan;
			$row['Aksi'] = $list->id_pemasukan;
			$row['id_kategori'] = $list->id_kategori_pemasukan;
			$data[] = $row;
			
		}

		$output = [ "data" => $data ];
		echo json_encode($output);
	}

	public function tambah_tansaksi_pemasukan(){
		if(!empty($_POST['id_kategori']) && !empty($_POST['nominal']) && !empty($_POST['catatan'])){
			$pengguna =  $this->m_dashboard->get_data_pengguna();

			$data = [
				'id_pengguna' => $pengguna['id_pengguna'],
				'id_kategori_pemasukan' => $_POST['id_kategori'],
				'nominal' => $_POST['nominal'],
				'keterangan' => $_POST['catatan'],
			];

			$this->m_dashboard->transaksi_pemasukan_post($data);
			echo "success";
			exit();
		}
	}

	public function hapus_transaksi_pemasukan(){
		if(!empty($_POST['id'])){
			$this->m_dashboard->transaksi_pemasukan_delete($_POST['id']);
			echo "success";
			exit();
		}
	}

	public function edit_transaksi_pemasukan(){    
		if(!empty($_POST['id_pemasukan']) && !empty($_POST['id_kategori']) && !empty($_POST['nominal']) && !empty($_POST['catatan'])){
			$data = [
				'id_kategori_pemasukan' => $_POST['id_kategori'],
				'nominal' => $_POST['nominal'],
				'keterangan' => $_POST['catatan'],
			];
			$this->m_dashboard->transaksi_pemasukan_edit($_POST['id_pemasukan'],$data);
			echo "success";
			exit();
		}
	}

	//---------------

	// Transaksi Pengeluaran
	public function pengeluaran(){        
		$data_title['title'] = 'pengeluaran'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();
		$kategori['kategori'] = $this->m_dashboard->kategori_pengeluaran_get($profile['pengguna']['id_pengguna']);

		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/pengeluaran.php',$kategori);
        $this->load->view('footer.php');
	}

	public function get_transaksi_pengeluaran(){
		$pengguna =  $this->m_dashboard->get_data_pengguna();
		$kategori = $this->m_dashboard->transaksi_pengeluaran_get($pengguna['id_pengguna']);

		$data = [];
		$no = 0;
		foreach ($kategori as $list) {
			$no++;
			$row = [];
			$row['No'] = $no;
			$row['Tanggal'] = $list->tanggal;
			$row['Kategori'] = $list->nama_kategori;
			$row['Nominal'] = $list->nominal;
			$row['Keterangan'] = $list->keterangan;
			$row['Aksi'] = $list->id_pengeluaran;
			$row['id_kategori'] = $list->id_kategori_pengeluaran;
			$data[] = $row;
			
		}

		$output = [ "data" => $data ];
		echo json_encode($output);
	}

	public function tambah_tansaksi_pengeluaran(){
		if(!empty($_POST['id_kategori']) && !empty($_POST['nominal']) && !empty($_POST['catatan'])){
			$pengguna =  $this->m_dashboard->get_data_pengguna();

			$data = [
				'id_pengguna' => $pengguna['id_pengguna'],
				'id_kategori_pengeluaran' => $_POST['id_kategori'],
				'nominal' => $_POST['nominal'],
				'keterangan' => $_POST['catatan'],
			];

			$this->m_dashboard->transaksi_pengeluaran_post($data);
			echo "success";
			exit();
		}
	}

	public function hapus_transaksi_pengeluaran(){
		if(!empty($_POST['id'])){
			$this->m_dashboard->transaksi_pengeluaran_delete($_POST['id']);
			echo "success";
			exit();
		}
	}

	public function edit_transaksi_pengeluaran(){    
		if(!empty($_POST['id_pengeluaran']) && !empty($_POST['id_kategori']) && !empty($_POST['nominal']) && !empty($_POST['catatan'])){
			$data = [
				'id_kategori_pengeluaran' => $_POST['id_kategori'],
				'nominal' => $_POST['nominal'],
				'keterangan' => $_POST['catatan'],
			];
			$this->m_dashboard->transaksi_pengeluaran_edit($_POST['id_pengeluaran'],$data);
			echo "success";
			exit();
		}
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
