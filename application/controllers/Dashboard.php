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
			$row['Nominal'] = 'Rp ' . number_format($list->nominal, 0, "", ".");
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
			$row['Nominal'] = 'Rp ' . number_format($list->nominal, 0, "", ".");
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

	public function ajax_dashboard(){
		if(!empty($_POST['month'])){
			$pengguna =  $this->m_dashboard->get_data_pengguna();
			$month = $_POST['month'];
			$jumtanggal = cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
			$first_date = date('Y-m-d', mktime(0,0,0,$month,01,date('Y')));
			$last_date = date('Y-m-d', mktime(0,0,0,$month,$jumtanggal,date('Y')));

			//--------------------Total Pemasukan & Pengeluaran & Diagram Donut--------------------//
			$pemasukan = $this->m_dashboard->total_pemasukan($pengguna['id_pengguna'],$first_date,$last_date);
			$pengeluaran = $this->m_dashboard->total_pengeluaran($pengguna['id_pengguna'],$first_date,$last_date);
			$total_pemasukan = "Rp " . number_format($pemasukan['total_pemasukan'],0,',','.');
			$total_pengeluaran = "Rp " . number_format($pengeluaran['total_pengeluaran'],0,',','.');
			$data_donut = array($pemasukan['total_pemasukan'],$pengeluaran['total_pengeluaran']);

			//--------------------Diagram Morris--------------------//
			$data_morris = array();
			for($i=1; $i <= $jumtanggal; $i++){
				$tanggal= date('Y-m-d', mktime(0,0,0,$month,$i,date('Y')));
				$rows = [];
				$rows['tanggal'] = $tanggal;
				$pemasukan_harian = $this->m_dashboard->get_pemasukan_harian($pengguna['id_pengguna'],$tanggal);
				if($pemasukan_harian['total_pemasukan'] > 0){
					$rows['value'] = intval($pemasukan_harian['total_pemasukan']);
				}else{
					$rows['value'] = 0;
				}
				$data_morris[] =  $rows;
			}
			
			//--------------------Jumlah Kategori Pemasukan & Pengeluaran--------------------//
			$jumkatPemasukan = $this->m_dashboard->get_jumlah_kategori_pemasukan($pengguna['id_pengguna'],$first_date,$last_date);
			$jumkatPengeluaran = $this->m_dashboard->get_jumlah_kategori_pengeluaran($pengguna['id_pengguna'],$first_date,$last_date);
			$datakatPemasukan = array();
			$datakatPengeluaran = array();
			if(count($jumkatPemasukan)>0){
				foreach ($jumkatPemasukan as $list) {
					$row1 = $list->nama_kategori;
					$pemasukanKat[] = $row1;
				}
				$datakatPemasukan = array_count_values($pemasukanKat);
			}
			if(count($jumkatPengeluaran)>0){
				foreach ($jumkatPengeluaran as $list) {
					$row2 = $list->nama_kategori;
					$pengeluaranKat[] = $row2;
				}
				$datakatPengeluaran = array_count_values($pengeluaranKat);
			}

			$output = array(
				"massage" => "success",
				"totalPemasukan" => $total_pemasukan,
				"totalPengeluaran" => $total_pengeluaran,
				"dataMorris" => $data_morris,
				"dataDonut" => $data_donut,
				"datakatPemasukan" => $datakatPemasukan,
				"datakatPengeluaran" => $datakatPengeluaran
			);
			echo json_encode($output);
			exit();
		}
	}
}
