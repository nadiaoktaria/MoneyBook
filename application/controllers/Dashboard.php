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

	public function kategori_pemasukan(){    
		$data_title['title'] = 'Kategori Pemasukan'; 
		$profile['pengguna'] = $this->m_dashboard->get_data_pengguna();

		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/kategori_pemasukan.php');
        $this->load->view('footer.php');
	}

	public function kategori_pengeluaran(){    
		$data_title['title'] = 'Kategori Pengeluaran'; 
		$profile['pengguna'] = $this->m_dashboard->get_data_pengguna();
		
		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/kategori_pengeluaran.php');
        $this->load->view('footer.php');
	}

	public function pemasukan(){        
		$data_title['title'] = 'Pemasukan'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();
		$kategori['kategori'] = $this->m_dashboard->kategori_pemasukan_get($profile['pengguna']['id_pengguna']);

		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/pemasukan.php',$kategori);
        $this->load->view('footer.php');
	}

	public function pengeluaran(){        
		$data_title['title'] = 'Pengeluaran'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();
		$kategori['kategori'] = $this->m_dashboard->kategori_pengeluaran_get($profile['pengguna']['id_pengguna']);

		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/pengeluaran.php',$kategori);
        $this->load->view('footer.php');
	}

	public function utang(){        
		$data_title['title'] = 'Utang'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();

		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/utang.php');
        $this->load->view('footer.php');
	}

	public function piutang(){        
		$data_title['title'] = 'Piutang'; 
		$profile['pengguna'] =  $this->m_dashboard->get_data_pengguna();
		$debitur['debitur'] = $this->m_dashboard->debitur_get($profile['pengguna']['id_pengguna']);

		$this->load->view('header.php', $data_title + $profile);
        $this->load->view('dashboard/piutang.php',$debitur);
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

	public function ubah_profile(){ 
		if(!empty($_POST['nama']) && !empty($_POST['no_hp']) && !empty($_POST['alamat'])){
			$pengguna = $this->m_dashboard->get_data_pengguna();
			$data = [
				'nama' => $_POST['nama'],
				'no_hp' => $_POST['no_hp'],
				'alamat' => $_POST['alamat'],
			];
			$this->m_dashboard->update_profil($pengguna['id_pengguna'],$data);
			echo "success";
			exit();
		}
	}

	public function upload_foto_profil(){
		$config['upload_path']          = './assets/img/profile/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

		$this->load->library('upload', $config);
		if (!empty($_FILES['profile_image']['name'])) {
			if ($this->upload->do_upload('profile_image')) {

				$uploadData = $this->upload->data();

				//Compres Foto
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/profile/' . $uploadData['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '100%';
				$config['new_image'] = './assets/img/profile/' . $uploadData['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$pengguna = $this->m_dashboard->get_data_pengguna();
				
				//replace foto lama 
				if ($pengguna['foto'] != "profile.png") {
					$target_file = './assets/img/profile/' . $pengguna['foto'];
					unlink($target_file);
				}

				$data['foto'] = $uploadData['file_name'];
				$this->m_dashboard->update_profil($pengguna['id_pengguna'],$data);
				redirect('profile');
			}
		}
	}

	public function ajax_dashboard(){
		if(!empty($_POST['month']) && !empty($_POST['years']) ){
			$pengguna =  $this->m_dashboard->get_data_pengguna();
			$month = $_POST['month'];
			$years = $_POST['years'];
			$jumtanggal = cal_days_in_month(CAL_GREGORIAN,$month,$years);
			$first_date = date('Y-m-d', mktime(0,0,0,$month,01,$years));
			$last_date = date('Y-m-d', mktime(0,0,0,$month,$jumtanggal,$years));

			//--------------------Total Pemasukan & Pengeluaran & Diagram Donut--------------------//
			$pemasukan = $this->m_dashboard->total_pemasukan($pengguna['id_pengguna'],$first_date,$last_date);
			$pengeluaran = $this->m_dashboard->total_pengeluaran($pengguna['id_pengguna'],$first_date,$last_date);
			$total_pemasukan = "Rp " . number_format($pemasukan['total_pemasukan'],0,',','.');
			$total_pengeluaran = "Rp " . number_format($pengeluaran['total_pengeluaran'],0,',','.');
			$data_donut = array($pemasukan['total_pemasukan'],$pengeluaran['total_pengeluaran']);

			//--------------------Diagram Morris--------------------//
			$data_morris = array();
			for($i=1; $i <= $jumtanggal; $i++){
				$tanggal= date('Y-m-d', mktime(0,0,0,$month,$i,$years));
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
				'tanggal' => $_POST['tanggal'],
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
				'tanggal' => $_POST['tanggal'],
			];
			$this->m_dashboard->transaksi_pemasukan_edit($_POST['id_pemasukan'],$data);
			echo "success";
			exit();
		}
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
				'tanggal' => $_POST['tanggal'],
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

	public function get_debitur(){
		$pengguna =  $this->m_dashboard->get_data_pengguna();
		$debitur = $this->m_dashboard->debitur_get($pengguna['id_pengguna']);

		$data = [];
		$no = 0;
		foreach ($debitur as $list) {
			$no++;
			$row = [];
			$row['No'] = $no;
			$row['Nama'] = $list->nama_debitur;
			$row['NoHp'] = $list->no_hp_debitur;
			$row['Alamat'] = $list->alamat_debitur;
			$row['Aksi'] = $list->id_debitur;
			$data[] = $row;
			
		}

		$output = [ "data" => $data ];
		echo json_encode($output);
	}

	public function tambah_debitur(){
		if(!empty($_POST['nama']) && !empty($_POST['no_hp']) && !empty($_POST['alamat'])){
			$pengguna =  $this->m_dashboard->get_data_pengguna();

			$data = [
				'id_pengguna' => $pengguna['id_pengguna'],
				'nama_debitur' => $_POST['nama'],
				'no_hp_debitur' => $_POST['no_hp'],
				'alamat_debitur' => $_POST['alamat'],
			];

			$this->m_dashboard->debitur_post($data);
			echo "success";
			exit();
		}
	}

	public function hapus_debitur(){
		if(!empty($_POST['id'])){
			$this->m_dashboard->debitur_delete($_POST['id']);
			echo "success";
			exit();
		}
	}

	public function edit_debitur(){    
		if(!empty($_POST['id_debitur']) && !empty($_POST['nama']) && !empty($_POST['no_hp']) && !empty($_POST['alamat'])){
			$data = [
				'nama_debitur' => $_POST['nama'],
				'no_hp_debitur' => $_POST['no_hp'],
				'alamat_debitur' => $_POST['alamat'],
			];
			$this->m_dashboard->debitur_edit($_POST['id_debitur'],$data);
			echo "success";
			exit();
		}
	}

	public function get_piutang(){
		$pengguna =  $this->m_dashboard->get_data_pengguna();
		$piutang = $this->m_dashboard->piutang_get($pengguna['id_pengguna']);

		$data = [];
		$no = 0;
		foreach ($piutang as $list) {
			$no++;
			$row = [];
			$row['No'] = $no;
			$row['Debitur'] = $list->nama_debitur;
			$row['Piutang_Awal'] = 'Rp' . number_format($list->piutang_awal, 0, "", ".");
			$row['Jumlah_Bayar'] = 'Rp' . number_format($list->total_piutang, 0, "", ".");
			$row['Sisa_Piutang'] = 'Rp' . number_format($list->sisa_piutang, 0, "", ".");
			$row['Keterangan'] = $list->keterangan;
			$row['Tanggal_Piutang'] = $list->tanggal_piutang;
			$row['Tanggal_Tempo'] = $list->tanggal_tempo;
			$row['Aksi'] = $list->id_piutang;
			$data[] = $row;
			
		}

		$output = [ "data" => $data ];
		echo json_encode($output);
	}

	public function tambah_piutang(){
		if(!empty($_POST['id_debitur']) && !empty($_POST['piutang_awal']) && !empty($_POST['jumlah_bayar']) 
		&& !empty($_POST['keterangan']) && !empty($_POST['tanggal_piutang']) && !empty($_POST['tanggal_tempo'])){
			$pengguna =  $this->m_dashboard->get_data_pengguna();

			$data = [
				'id_pengguna' => $pengguna['id_pengguna'],
				'id_debitur' => $_POST['id_debitur'],
				'piutang_awal' => $_POST['piutang_awal'],
				'total_piutang' => $_POST['jumlah_bayar'],
				'sisa_piutang' => $_POST['jumlah_bayar'],
				'keterangan' => $_POST['keterangan'],
				'tanggal_piutang' => $_POST['tanggal_piutang'],
				'tanggal_tempo' => $_POST['tanggal_tempo'],
			];

			$this->m_dashboard->piutang_post($data);
			echo "success";
			exit();
		}
	}

	public function get_data_karyawan(){
		$pengguna = $this->m_dashboard->get_data_pengguna();
		$karyawan = $this->m_dashboard->data_karyawan_get($pengguna['id_pengguna']);

		$data = [];
		$no = 0;
		foreach ($karyawan as $list) {
			$no++;
			$row = [];
			$row['No'] = $no;
			$row['Nama'] = $list->nama_karyawan;
			$row['NIK'] = $list->nik;
			$row['Jabatan'] = $list->jabatan;
			$row['NoHp'] = $list->no_hp_karyawan;
			$row['Alamat'] = $list->alamat_karyawan;
			$row['Aksi'] = $list->id_karyawan;
			$data[] = $row;
		}

		$output = [ "data" => $data ];
		echo json_encode($output);
	}

	public function tambah_data_karyawan(){
		if(!empty($_POST['nama']) && !empty($_POST['nik']) && !empty($_POST['jabatan']) && !empty($_POST['no_hp']) && !empty($_POST['alamat'])){
			$pengguna =  $this->m_dashboard->get_data_pengguna();
			$data = [
				'id_pengguna' => $pengguna['id_pengguna'],
				'nama_karyawan' => $_POST['nama'],
				'nik' => $_POST['nik'],
				'jabatan' => $_POST['jabatan'],
				'no_hp_karyawan' => $_POST['no_hp'],
				'alamat_karyawan' => $_POST['alamat'],
			];
			$this->m_dashboard->data_karyawan_post($data);
			echo "success";
			exit();
		}
	}

	public function edit_data_karyawan(){    
		if(!empty($_POST['nama']) && !empty($_POST['nik']) && !empty($_POST['jabatan']) && !empty($_POST['no_hp']) && !empty($_POST['alamat'])){
			$data = [
				'nama_karyawan' => $_POST['nama'],
				'nik' => $_POST['nik'],
				'jabatan' => $_POST['jabatan'],
				'no_hp_karyawan' => $_POST['no_hp'],
				'alamat_karyawan' => $_POST['alamat'],
			];
			$this->m_dashboard->data_karyawan_edit($_POST['id_karyawan'],$data);
			echo "success";
			exit();
		}
	}

	public function hapus_data_karyawan(){
		if(!empty($_POST['id'])){
			$this->m_dashboard->data_karyawan_delete($_POST['id']);
			echo "success";
			exit();
		}
	}

	public function reset_trans_pemasukan(){
		if(!empty($_POST['id'])){
			$this->m_dashboard->reset_transaksi_pemasukan($_POST['id']);
			echo "success";
			exit();
		}
	}

	public function reset_trans_pengeluaran(){
		if(!empty($_POST['id'])){
			$this->m_dashboard->reset_transaksi_pengeluaran($_POST['id']);
			echo "success";
			exit();
		}
	}

}
