<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
		$this->load->model('m_pegawai');
	}


	public function index()
	{
		$data['content'] 	= 'admin/tampilan_pegawai';
		$data['judul']  	= 'Tabel Data';
		$data['sub_judul'] 	= 'Pegawai';
		$data['pegawai']	= $this->db->query('select * from tb_pegawai order by pgw_golongan desc')->result_array();

		$this->load->view('layout/header');
		$this->load->view('tampilan_beranda', $data);
		$this->load->view('layout/footer');
	}

	public function riwayat($id)
	{
		$query = $this->db->query("SELECT * FROM tb_pegawai JOIN tb_cuti ON tb_pegawai.pgw_nip = tb_cuti.nip WHERE tb_cuti.status = 'Disetujui' AND tb_pegawai.pgw_nip =" . $id)->result();
		$data['content'] 	= 'admin/riwayat';
		$data['judul']  	= 'Riwayat Cuti';
		$data['sub_judul'] 	= '';
		$data['pegawai']	= $query;

		$this->load->view('layout/header');
		$this->load->view('tampilan_beranda', $data);
		$this->load->view('layout/footer');
	}

	public function detail($nip)
	{
		$data['content'] 	= 'admin/detail_pegawai';
		$data['judul']  	= 'Detail Pegawai';
		$data['sub_judul'] 	= '';
		$data['pegawai']	= $this->m_pegawai->get_nip($nip);

		$this->load->view('layout/header');
		$this->load->view('tampilan_beranda', $data);
		$this->load->view('layout/footer');
	}

	public function tambah()
	{
		// cek nip pegawai
		$nip_pgw 	= $this->input->post('nip', true);
		$data_pgw 	= $this->m_pegawai->get_nip($nip_pgw);

		if ($data_pgw > 0) {
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade in"><i class="fa fa-cancel"></i> Maaf NIP Sudah Digunakan, Silahkan Cek Kembali. </div>');
			redirect('admin/pegawai');
		}

		$data = [
			"pgw_nip" 					=> $this->input->post('nip', true),
			"pgw_nama" 					=> $this->input->post('nama', true),
			"pgw_tempatlahir" 			=> $this->input->post('tempatlahir', true),
			"pgw_tgllahir" 				=> $this->input->post('tgllahir', true),
			"pgw_jk" 					=> $this->input->post('jk', true),
			"pgw_jabatan" 				=> $this->input->post('jabatan', true),
			"pgw_golongan" 				=> $this->input->post('golongan', true),
			"email"						=> $this->input->post('email', true),
			"pgw_PendidikanTerakhir" 	=> $this->input->post('pendidikanterakhir', true)
		];

		$this->db->insert('tb_pegawai', $data);
		$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade in"><i class="fa fa-check-circle"></i> Data Berhasil di Tambahkan. </div>');
		redirect('admin/pegawai');
	}

	public function edit($id)
	{
		$data = [
			"pgw_nip" 					=> $this->input->post('nip', true),
			"pgw_nama" 					=> $this->input->post('nama', true),
			"pgw_tempatlahir" 			=> $this->input->post('tempatlahir', true),
			"pgw_tgllahir" 				=> $this->input->post('tgllahir', true),
			"pgw_jk" 					=> $this->input->post('jk', true),
			"pgw_jabatan" 				=> $this->input->post('jabatan', true),
			"pgw_golongan" 				=> $this->input->post('golongan', true),
			"email" 					=> $this->input->post('email', true),
			"pgw_PendidikanTerakhir" 	=> $this->input->post('pendidikanterakhir', true)
		];

		$this->m_pegawai->edit($id, $data);
		$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade in"><i class="fa fa-check-circle"></i> Data Berhasil di Ubah. </div>');
		redirect('admin/pegawai');
	}

	function hapus($id)
	{
		$this->m_pegawai->drop($id);
		$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade in"><i class="fa fa-check-circle"></i> Data Berhasil di Hapus. </div>');
		redirect('admin/pegawai');
	}
}
