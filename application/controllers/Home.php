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
			$this->load->view('home/login.php');
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
            $this->load->view('home/register.php');
        } else {
            $email = $this->input->post('email');
            $pengguna = $this->m_home->cek_pengguna($email);

            if ($pengguna) {
                $this->session->set_flashdata('error', 'Email sudah terdaftar!');
                redirect('home/register');
            } else {
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'alamat' => $this->input->post('alamat', true),
                    'no_hp' => $this->input->post('no_hp', true),
                    'jenis' => $this->input->post('jenis', true),
                    // 'jenis' => 'Personal',
                    'foto' => 'profile.png'
                ];
                $this->m_home->daftar_akun($data);
                $this->session->set_flashdata('success', 'Akun berhasil dibuat, silahkan masuk!');
                redirect('home');
            }
        }
	}

    public function aktivasi_email(){    
        
        $email = 'rizkista@gmail.com';


        // ini_set('SMTP', 'smtp.gmail.com'); //ketika sudah di hosting dihilangkan
        // ini_set('smtp_port', 465); //ketika sudah di hosting dihilangkan

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'localhost',
            'smtp_port'   => 25,
            'smtp_user' => 'rizkista@gmail.com',  // Email gmail
            'smtp_pass'   => 'harnantow4e',  // Password gmail
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        ];

        $this->load->library('email', $config);


        $this->email->set_newline("\r\n");
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        $this->email->from('moneybook@gmail.com', 'MoneyBook Team');
        $this->email->to($email);
        $this->email->subject('Aktivasi Akun');

        $data['header'] = 'MoneyBook';
        $data['logo'] = base_url('assets/img/icon.svg');
        $data['email'] = $email;
        $data['url'] = base_url('home/aktivasi_email');
        $data['link'] = base_url('beranda');
        $this->email->message('Hello');
        $this->email->send();
        // $this->load->view('aktivasi.php', $data)
	}

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('success', 'Berhasil keluar dari akun Anda!');
        redirect('home');
    }
	
	public function reset_password(){       
        $this->load->view('home/reset_password.php');
	}
}