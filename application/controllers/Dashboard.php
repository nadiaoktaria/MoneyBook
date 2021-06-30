<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){       
		$data_title['title'] = 'Dashboard'; 
		
		$this->load->view('header.php', $data_title);
        $this->load->view('dashboard/dashboard.php');
        $this->load->view('footer.php');
	}

	public function kategori(){    
		$data_title['title'] = 'Kategori'; 
		
		$this->load->view('header.php', $data_title);
        $this->load->view('dashboard/kategori.php');
        $this->load->view('footer.php');
	}

	public function pemasukan(){        
		$data_title['title'] = 'Pemasukan'; 
		
		$this->load->view('header.php', $data_title);
        $this->load->view('dashboard/pemasukan.php');
        $this->load->view('footer.php');
	}

	public function pengeluaran(){ 
		$data_title['title'] = 'Pengeluaran'; 
		
		$this->load->view('header.php', $data_title);
        $this->load->view('dashboard/pengeluaran.php');
        $this->load->view('footer.php');
	}

	public function gaji_karyawan(){  
		$data_title['title'] = 'Gaji Karyawan'; 
		
		$this->load->view('header.php', $data_title);
        $this->load->view('dashboard/gaji_karyawan.php');
        $this->load->view('footer.php');
	}

	public function data_karyawan(){ 
		$data_title['title'] = 'Data Karyawan'; 
		
		$this->load->view('header.php', $data_title);
        $this->load->view('dashboard/data_karyawan.php');
        $this->load->view('footer.php');
	}
}
