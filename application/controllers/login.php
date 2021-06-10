<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('tampilan_login');
	}
	public function ambillogin()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->m_login->ambillogin($username, $password);
		$cek2 = $this->m_login->ambillogin2($username, $password);

		if ($cek) {
			$id = $cek->id;

			$this->session->set_userdata('id', $id);
			$this->session->set_userdata('username', $username);
			redirect('beranda', 'refresh');
		} elseif ($cek2) {
			$tempatlahir = $cek2->pgw_tempatlahir;
			$tgl_lahir = $cek2->pgw_tgllahir;
			$jk = $cek2->pgw_jk;
			$jabatan = $cek2->pgw_jabatan;
			$golongan = $cek2->pgw_golongan;
			$email = $cek2->email;

			$this->session->set_userdata('pgw_nama', $username);
			$this->session->set_userdata('email', $email);
			$this->session->set_userdata('pgw_tempatlahir', $tempatlahir);
			$this->session->set_userdata('pgw_tgllahir', $tgl_lahir);
			$this->session->set_userdata('pgw_jk', $jk);
			$this->session->set_userdata('pgw_jabatan', $jabatan);
			$this->session->set_userdata('pgw_golongan', $golongan);
			$this->session->set_userdata('pgw_nip', $password);
			redirect('pegawai/beranda', 'refresh');
		} else {
			$this->session->set_flashdata('info', '<div class="alert alert-danger">Maaf, Username atau Password Salah ! </div>');
			$this->load->view('tampilan_login');
		}
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
