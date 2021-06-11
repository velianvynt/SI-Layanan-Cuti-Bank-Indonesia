<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verif_cuti extends CI_Controller
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
		$data['content'] 	= 'admin/verif_cuti';
		$data['judul']  	= 'Tabel Data';
		$data['sub_judul'] 	= 'Permohonan Cuti';
		$data['pegawai']	= $this->db->query("select * from tb_cuti join tb_pegawai on tb_cuti.nip = tb_pegawai.pgw_nip")->result_array();

		$this->load->view('layout/header');
		$this->load->view('tampilan_beranda', $data);
		$this->load->view('layout/footer');
	}

	public function setuju($id_cuti)
	{
		$emailConfig = [
			'protocol'	=> 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'notiftesting7@gmail.com',
			'smtp_pass' => 'testnotif123',
			'mailtype' 	=> 'html',
			'charset' 	=> 'iso-8859-1'
		];

		// Set your email information
		$from = [
			'email'	=> 'notiftesting7@gmail.com',
			'name' 	=> 'Testing notif'
		];

		$to = '';
		$datailemail = $this->m_pegawai->detail_data($id_cuti);
		foreach ($datailemail as $row) {
			$to .= $row->email;
		}

		$subject = 'Pengajuan Cuti Disetujui';
		$pesan = 'Kami telah melihat pengajuan cuti Anda dan cuti Anda telah kami setujui. <br><br><br>
		Bidang Kehumasan, <br>
		Bank Indonesia Provinsi Bengkulu';
		$this->load->library('email', $emailConfig);
		$this->email->set_newline("\r\n");

		// Set email preferences
		$this->email->from($from['email'], $from['name']);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($pesan);

		if (!$this->email->send()) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>Gagal mengirim email</div>');
			redirect(base_url('admin/verif_cuti'));
		} else {
			$data = array(
				'id_cuti' => $id_cuti,
				'status'  => 'Disetujui'
			);
			$this->m_pegawai->setuju($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>Mitra diterima dan email akan dikirimkan kepada mitra terkait</div>');
			redirect(base_url('admin/verif_cuti'));
		}

		// $data = array(
		// 	'id_cuti' => $id_cuti,
		// 	'status'  => 'Disetujui'
		// );

		// $this->m_pegawai->setuju($data);
		// redirect('admin/verif_cuti', 'refresh');
	}

	public function tolak($id_cuti)
	{
		$data = array(
			'id_cuti' => $id_cuti,
			'status'  => 'Ditolak'
		);
		$this->m_pegawai->setuju($data);
		redirect('beranda', 'refresh');
	}
}

/* End of file verif_cuti.php */
/* Location: ./application/controllers/admin/verif_cuti.php */
