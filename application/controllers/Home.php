<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
        
    function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('M_home', 'm_home');
    }

	public function index(){       
		if ($this->session->userdata('email')) {
            redirect('dashboard');
		}

		$this->form_validation->set_rules('email', 'E-Mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
			$this->load->view('home/login');
        } else {
            $this->login();
        }
	}

	public function login(){       
		$email = $this->input->post('email', true);
        $password = $this->input->post('password');

        $pengguna = $this->m_home->cek_pengguna($email);

		if($pengguna){
			if ($pengguna['status_aktif'] == 1){
                if (password_verify($password, $pengguna['password'])){
                    $data = [
						'email' => $pengguna['email'],
						'id_pengguna' => $pengguna['id_pengguna'],
                    ];
                    $this->session->set_userdata($data);
					redirect('dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Password salah!');
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('error', 'Email belum diaktivasi!');
                redirect('home');
            }
		} else {
            if($email){
                $this->session->set_flashdata('error', 'Akun tidak terdaftar!');
            }
            redirect('home');
        }

	}

	public function register(){       
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'E-Mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('home/register');
        } else {
            $email = $this->input->post('email');
            $pengguna = $this->m_home->cek_pengguna($email);

            if ($pengguna) {
                $this->session->set_flashdata('error', 'Email sudah terdaftar!');
                redirect('register');
            } else {
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'alamat' => $this->input->post('alamat', true),
                    'no_hp' => $this->input->post('no_hp', true),
                    'jenis' => $this->input->post('jenis', true),
                    'foto' => 'profile.png'
                ];
                $simpanData = $this->m_home->daftar_akun($data);
                if($simpanData){
                    $data = [
                        "email" => $email,
                        "url" => base_url('home/aktivasiakun?email='.$email)
                    ];
                    
                    $config = [
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://moneybook.my.id',
                        'smtp_port' => 465,
                        'smtp_user' => 'cs@moneybook.my.id',
                        'smtp_pass' => 'moneybook123',
                        'mailtype' => 'html', 
                        'charset'   => 'iso-8859-1'
                    ];
            
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->set_mailtype("html");
                    $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
                    $this->email->from('cs@moneybook.my.id', 'MoneyBook Team');
                    $this->email->to($email);
                    $this->email->subject('Aktivasi Akun');
                    $this->email->message($this->load->view('aktivasi', $data, true));
                    $this->email->send();
                    $this->session->set_flashdata('success', 'Link Aktivasi Akun berhasil dikirim ke ' .$email.'');
                    redirect('home');
                }else{
                    $this->session->set_flashdata('error', 'Gagal menyimpan data ke database!');
                    redirect('register');
                }
            }
        }
	}

    public function aktivasiakun(){    
	    $email  = $this->input->get('email'); 
        $data['status_aktif '] = '1';
        $updateAkun = $this->m_home->update_akun($email,$data);
        if($updateAkun){
            $this->session->set_flashdata('success', 'Akun Anda berhasil di aktivasi!');
            redirect('home');
        }else{
            $this->session->set_flashdata('error', 'Akun anda gagal di aktifasi!');
            redirect('home');
        }
        
	}

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('success', 'Berhasil keluar dari akun Anda!');
        redirect('home');
    }
	
	public function reset_password(){       
        $this->load->view('home/reset_password.php');
	}

    public function test(){
        $token = [
            'id' => '1',
            'time' => time(),
            'email' => 'demo@gmail.com'
        ];
        // $output = AUTHORIZATION::generateToken($token);

        
		echo json_encode($token);
    }
}