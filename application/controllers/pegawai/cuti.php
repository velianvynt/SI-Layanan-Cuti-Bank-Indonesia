<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_pegawai');
	}

	public function index()
	{
		$data['content'] 	= 'pegawai/tampilan_cuti';
		$data['judul']  	= 'Pengajuan Cuti';
		$data['sub_judul'] 	= 'Pegawai';
		$data['pegawai']	= $this->db->query("select * from tb_cuti join tb_pegawai on tb_cuti.nip = tb_pegawai.pgw_nip where tb_pegawai.pgw_nip = '" . $this->session->userdata('pgw_nip') . "'")->result_array();
		$data['cek_file'] = $this->db->query("select * from tb_pegawai where pgw_nip=" . $this->session->userdata('pgw_nip'))->row();

		$this->load->view('layout/header');
		$this->load->view('tampilan_beranda_pegawai', $data);
		$this->load->view('layout/footer');
	}

	public function tambah()
	{
		$nip 			= $this->session->userdata('pgw_nip');

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
			'name' 	=> 'testing notif'
		];

		$to = '';
		$datailemail = $this->m_pegawai->detail_data($nip);
		foreach ($datailemail as $row) {
			$to .=  $row->email;
		}

		$subject = 'Kerjasama Diterima';
		$pesan = 'Kami telah melihat program kerjasama yang anda tawarkan. Kami berharap dapat melakukan kerjasama yang dapat meningkatkan hubungan kita bersama. <br><br> Balas email ini untuk pembahasan lebih lanjut.<br><br>Terimakasih,<br>Salam Hangat, <br> UPT KSLI Universitas Bengkulu';
		$this->load->library('email', $emailConfig);
		$this->email->set_newline("\r\n");

		// Set email preferences
		$this->email->from($from['email'], $from['name']);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($pesan);

		// if (!$this->email->send()) {
		// 	$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>Gagal mengirim email</div>');
		// 	redirect(base_url('pegawai/cuti'));
		// } else {
		// 	$data = array(
		// 		'id_cuti' => $id_cuti,
		// 		'status'  => 'Disetujui'
		// 	);
		// 	$this->m_pegawai->setuju($data);
		// 	// $this->Model_mitra->update_data($where, $data, 'tb_mitra');
		// 	$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>Mitra diterima dan email akan dikirimkan kepada mitra terkait</div>');
		// 	redirect(base_url('admin/verif_cuti'));

		$nip 			    = $this->session->userdata('pgw_nip');
		$email			    = $this->session->userdata('email');
		$jenis_cuti			= $this->input->post('jenis', true);
		$tanggal_mulai 		= $this->input->post('tanggal_mulai', true);
		$tanggal_akhir 		= $this->input->post('tanggal_akhir', true);
		$status				= 'Belum Diverifikasi';
		$imgName = "";
		$imgName2 = "";
		if ($gambar = '' && $gambar2 = '') {
		} else {

			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'jpg|png|jpeg|pdf|doc|docx';
			$config['max_size']             = 1000000;
			$config['max_width']            = 102400;
			$config['max_height']           = 76800;
			$cek_file = $this->db->query('select * from tb_pegawai where pgw_nip=' . $nip)->row();
			if (empty($cek_file->pgw_file)) {
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('file')) {
					$data = $this->upload->data();
					$imgName =  $data['file_name'];
				}
			} else {
				$imgName = $cek_file->pgw_file;
			}

			if ($imgName != null) {
				$que = $this->db->query("SELECT * from tb_cuti where status = 'Belum Diverifikasi' AND nip =" . $nip)->num_rows();
				if ($que >= 1) {
					$this->session->set_flashdata('no', 'Pengajuan Cuti Gagal, Karena anda telah memilikki data pengajuan yang belum diverifikasi');
					redirect('pegawai/cuti', 'refresh');
				} elseif ($jenis_cuti == "1") {
					$query = $this->db->query("SELECT id_cuti, datediff(tanggal_akhir, tanggal_mulai) as selisih , SUM(datediff(tanggal_akhir, tanggal_mulai)) as jumlah from tb_cuti WHERE jenis_cuti =Cuti Bersalin' AND nip = " . $nip)->row();

					$awal  = date_create($tanggal_mulai);
					$akhir = date_create($tanggal_akhir);
					$diff  = date_diff($awal, $akhir);
					if ($query->jumlah + 1 + $diff->days + 1 > 12) {
						$this->session->set_flashdata('gagal', 'Pengajuan Cuti Gagal Karena Telah Melebihi batas maksimum');
						redirect('pegawai/cuti', 'refresh');
					} else {
						$data = array();
						if (empty($cek_file->pgw_file)) {
							$this->db->query("update tb_pegawai set pgw_file='" . $imgName . "' where pgw_nip=" . $nip);
							$data = array(

								'nip'		    	=> $nip,
								'jenis_cuti' 		=> 'Cuti Bersalin',
								'tanggal_mulai' 	=> $tanggal_mulai,
								'tanggal_akhir' 	=> $tanggal_akhir,
								'status'			=> $status,
								'file'				=> $imgName,
								'email'				=> $email

							);
						} else {
							$data = array(
								'nip'		    	=> $nip,
								'jenis_cuti' 		=> 'Cuti Bersalin',
								'tanggal_mulai' 	=> $tanggal_mulai,
								'tanggal_akhir' 	=> $tanggal_akhir,
								'status'			=> $status,
								'file'				=> $cek_file->pgw_file,
								'email'				=> $email
							);
						}
						$this->db->insert('tb_cuti', $data);
						$this->session->set_flashdata('sukses', 'Pengajuan Cuti telah berhasil');
						redirect('pegawai/cuti', 'refresh');
					}
				} elseif ($jenis_cuti == "2") {
					$query = $this->db->query("SELECT * from tb_cuti WHERE jenis_cuti ='Cuti Bersalin Anak Ke-4/Lebih' AND nip = " . $nip)->num_rows();
					$quer = $this->db->query("SELECT * from tb_cuti where status = 'Disetujui' AND jenis_cuti = '  	Cuti Bersalin Anak Ke-4/Lebih' AND nip = " . $nip)->num_rows();
					if ($query >= 1) {
						$this->session->set_flashdata('gagal', 'Pengajuan Cuti Gagal Karena Anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} elseif ($quer >= 1) {
						$this->session->set_flashdata('gag', 'Pengajuan Cuti Gagal Karena anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} else {
						$data = array(
							'nip'		    	=> $nip,
							'jenis_cuti' 		=> 'Cuti Bersalin Anak Ke-4/Lebih',
							'tanggal_mulai' 	=> $tanggal_mulai,
							'tanggal_akhir' 	=> $tanggal_akhir,
							'status'			=> $status,
							'file'				=> $imgName,
							'email'				=> $email
						);

						$this->db->insert('tb_cuti', $data);
						$this->session->set_flashdata('sukses', 'Pengajuan Cuti telah berhasil');
						redirect('pegawai/cuti', 'refresh');
					}
				} elseif ($jenis_cuti == "3") {
					$query = $this->db->query("SELECT * from tb_cuti WHERE jenis_cuti ='Cuti Besar' AND nip = " . $nip)->num_rows();
					$quer = $this->db->query("SELECT * from tb_cuti where status = 'Disetujui' AND jenis_cuti = '  	Cuti Besar' AND nip = " . $nip)->num_rows();
					if ($query >= 1) {
						$this->session->set_flashdata('gagal', 'Pengajuan Cuti Gagal Karena Anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} elseif ($quer >= 1) {
						$this->session->set_flashdata('gag', 'Pengajuan Cuti Gagal Karena anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} else {
						$data = array(
							'nip'		    	=> $nip,
							'jenis_cuti' 		=> 'Cuti Besar',
							'tanggal_mulai' 	=> $tanggal_mulai,
							'tanggal_akhir' 	=> $tanggal_akhir,
							'status'			=> $status,
							'file'				=> $imgName,
							'email'				=> $email
						);

						$this->db->insert('tb_cuti', $data);
						$this->session->set_flashdata('sukses', 'Pengajuan Cuti telah berhasil');
						redirect('pegawai/cuti', 'refresh');
					}
				} elseif ($jenis_cuti == "4") {
					$query = $this->db->query("SELECT * from tb_cuti WHERE jenis_cuti ='Cuti Dalam Rangka Remise' AND nip = " . $nip)->num_rows();
					$quer = $this->db->query("SELECT * from tb_cuti where status = 'Disetujui' AND jenis_cuti = '  	Cuti Dalam Rangka Remise' AND nip = " . $nip)->num_rows();
					if ($query >= 1) {
						$this->session->set_flashdata('gagal', 'Pengajuan Cuti Gagal Karena Anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} elseif ($quer >= 1) {
						$this->session->set_flashdata('gag', 'Pengajuan Cuti Gagal Karena anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} else {
						$data = array(
							'nip'		    	=> $nip,
							'jenis_cuti' 		=> 'Cuti Dalam Rangka Remise',
							'tanggal_mulai' 	=> $tanggal_mulai,
							'tanggal_akhir' 	=> $tanggal_akhir,
							'status'			=> $status,
							'file'				=> $imgName,
							'email'				=> $email
						);

						$this->db->insert('tb_cuti', $data);
						$this->session->set_flashdata('sukses', 'Pengajuan Cuti telah berhasil');
						redirect('pegawai/cuti', 'refresh');
					}
				} elseif ($jenis_cuti == "5") {
					$query = $this->db->query("SELECT * from tb_cuti WHERE jenis_cuti ='Cuti Ibadah Keagamaan' AND nip = " . $nip)->num_rows();
					$quer = $this->db->query("SELECT * from tb_cuti where status = 'Disetujui' AND jenis_cuti = '  	Cuti Ibadah Keagamaan' AND nip = " . $nip)->num_rows();
					if ($query >= 1) {
						$this->session->set_flashdata('gagal', 'Pengajuan Cuti Gagal Karena Anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} elseif ($quer >= 1) {
						$this->session->set_flashdata('gag', 'Pengajuan Cuti Gagal Karena anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} else {
						$data = array(
							'nip'		    	=> $nip,
							'jenis_cuti' 		=> 'Cuti Ibadah Keagamaan',
							'tanggal_mulai' 	=> $tanggal_mulai,
							'tanggal_akhir' 	=> $tanggal_akhir,
							'status'			=> $status,
							'file'				=> $imgName,
							'email'				=> $email
						);

						$this->db->insert('tb_cuti', $data);
						$this->session->set_flashdata('sukses', 'Pengajuan Cuti telah berhasil');
						redirect('pegawai/cuti', 'refresh');
					}
				} elseif ($jenis_cuti == "6") {
					$query = $this->db->query("SELECT * from tb_cuti WHERE jenis_cuti ='Cuti Istri Pegawai Melahirkan' AND nip = " . $nip)->num_rows();
					$quer = $this->db->query("SELECT * from tb_cuti where status = 'Disetujui' AND jenis_cuti = '  	Cuti Istri Pegawai Melahirkan' AND nip = " . $nip)->num_rows();
					if ($query >= 1) {
						$this->session->set_flashdata('gagal', 'Pengajuan Cuti Gagal Karena Anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} elseif ($quer >= 1) {
						$this->session->set_flashdata('gag', 'Pengajuan Cuti Gagal Karena anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} else {
						$data = array(
							'nip'		    	=> $nip,
							'jenis_cuti' 		=> 'Cuti Istri Pegawai Melahirkan',
							'tanggal_mulai' 	=> $tanggal_mulai,
							'tanggal_akhir' 	=> $tanggal_akhir,
							'status'			=> $status,
							'file'				=> $imgName,
							'email'				=> $email
						);

						$this->db->insert('tb_cuti', $data);
						$this->session->set_flashdata('sukses', 'Pengajuan Cuti telah berhasil');
						redirect('pegawai/cuti', 'refresh');
					}
				} elseif ($jenis_cuti == "8") {
					$query = $this->db->query("SELECT * from tb_cuti WHERE jenis_cuti ='Cuti Kematian Menantu' AND nip = " . $nip)->num_rows();
					$quer = $this->db->query("SELECT * from tb_cuti where status = 'Disetujui' AND jenis_cuti = '  	Cuti Kematian Menantu' AND nip = " . $nip)->num_rows();
					if ($query >= 1) {
						$this->session->set_flashdata('gagal', 'Pengajuan Cuti Gagal Karena Anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} elseif ($quer >= 1) {
						$this->session->set_flashdata('gag', 'Pengajuan Cuti Gagal Karena anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} else {
						$data = array(
							'nip'		    	=> $nip,
							'jenis_cuti' 		=> 'Cuti Kematian Menantu',
							'tanggal_mulai' 	=> $tanggal_mulai,
							'tanggal_akhir' 	=> $tanggal_akhir,
							'status'			=> $status,
							'file'				=> $imgName,
							'email'				=> $email
						);

						$this->db->insert('tb_cuti', $data);
						$this->session->set_flashdata('sukses', 'Pengajuan Cuti telah berhasil');
						redirect('pegawai/cuti', 'refresh');
					}
				} elseif ($jenis_cuti == "9") {
					$query = $this->db->query("SELECT * from tb_cuti WHERE jenis_cuti ='Cuti Kematian Orang Tua/Mertua' AND nip = " . $nip)->num_rows();
					$quer = $this->db->query("SELECT * from tb_cuti where status = 'Disetujui' AND jenis_cuti = '  	Cuti Kematian Orang Tua/Mertua' AND nip = " . $nip)->num_rows();
					if ($query >= 1) {
						$this->session->set_flashdata('gagal', 'Pengajuan Cuti Gagal Karena Anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} elseif ($quer >= 1) {
						$this->session->set_flashdata('gag', 'Pengajuan Cuti Gagal Karena anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} else {
						$data = array(
							'nip'		    	=> $nip,
							'jenis_cuti' 		=> 'Cuti Kematian Orang Tua/Mertua',
							'tanggal_mulai' 	=> $tanggal_mulai,
							'tanggal_akhir' 	=> $tanggal_akhir,
							'status'			=> $status,
							'file'				=> $imgName,
							'email'				=> $email
						);

						$this->db->insert('tb_cuti', $data);
						$this->session->set_flashdata('sukses', 'Pengajuan Cuti telah berhasil');
						redirect('pegawai/cuti', 'refresh');
					}
				} elseif ($jenis_cuti == "10") {
					$query = $this->db->query("SELECT * from tb_cuti WHERE year(tanggal_mulai) = date('Y') and jenis_cuti ='Cuti Kematian Sdr/Istri/Suami' AND nip = " . $nip)->num_rows();
					$quer = $this->db->query("SELECT * from tb_cuti where status = 'Disetujui' AND jenis_cuti ='Cuti Kematian Sdr/Istri/Suami' AND nip = " . $nip)->num_rows();
					if ($query >= 1) {
						$this->session->set_flashdata('gagal', 'Pengajuan Cuti Gagal Karena Telah Melebihi batas maksimum');
						redirect('pegawai/cuti', 'refresh');
					} elseif ($quer >= 1) {
						$this->session->set_flashdata('gag', 'Pengajuan Cuti Gagal Karena anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} else {
						$data = array(

							'nip'		    	=> $nip,
							'jenis_cuti' 		=> 'Cuti Kematian Sdr/Istri/Suami',
							'tanggal_mulai' 	=> $tanggal_mulai,
							'tanggal_akhir' 	=> $tanggal_akhir,
							'status'			=> $status,
							'file'				=> $imgName,
							'email'				=> $email
						);
						$this->db->insert('tb_cuti', $data);
						$this->session->set_flashdata('sukses', 'Pengajuan Cuti telah berhasil');
						redirect('pegawai/cuti', 'refresh');
					}
				} elseif ($jenis_cuti == "11") {
					$query = $this->db->query("SELECT * from tb_cuti WHERE jenis_cuti ='Cuti Khitanan Anak' AND nip = " . $nip)->num_rows();
					$quer = $this->db->query("SELECT * from tb_cuti where status = 'Disetujui' AND jenis_cuti = '  	Cuti Khitanan Anak' AND nip = " . $nip)->num_rows();
					if ($query >= 1) {
						$this->session->set_flashdata('gagal', 'Pengajuan Cuti Gagal Karena Anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} elseif ($quer >= 1) {
						$this->session->set_flashdata('gag', 'Pengajuan Cuti Gagal Karena anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} else {
						$data = array(
							'nip'		    	=> $nip,
							'jenis_cuti' 		=> 'Cuti Khitanan Anak',
							'tanggal_mulai' 	=> $tanggal_mulai,
							'tanggal_akhir' 	=> $tanggal_akhir,
							'status'			=> $status,
							'file'				=> $imgName,
							'email'				=> $email
						);

						$this->db->insert('tb_cuti', $data);
						$this->session->set_flashdata('sukses', 'Pengajuan Cuti telah berhasil');
						redirect('pegawai/cuti', 'refresh');
					}
				} elseif ($jenis_cuti == "12") {
					$query = $this->db->query("SELECT * from tb_cuti WHERE jenis_cuti ='Cuti PMP' AND nip = " . $nip)->num_rows();
					$quer = $this->db->query("SELECT * from tb_cuti where status = 'Disetujui' AND jenis_cuti = '  	Cuti PMP' AND nip = " . $nip)->num_rows();
					if ($query >= 1) {
						$this->session->set_flashdata('gagal', 'Pengajuan Cuti Gagal Karena Anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} elseif ($quer >= 1) {
						$this->session->set_flashdata('gag', 'Pengajuan Cuti Gagal Karena anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} else {
						$data = array(
							'nip'		    	=> $nip,
							'jenis_cuti' 		=> 'Cuti PMP',
							'tanggal_mulai' 	=> $tanggal_mulai,
							'tanggal_akhir' 	=> $tanggal_akhir,
							'status'			=> $status,
							'file'				=> $imgName,
							'email'				=> $email
						);

						$this->db->insert('tb_cuti', $data);
						$this->session->set_flashdata('sukses', 'Pengajuan Cuti telah berhasil');
						redirect('pegawai/cuti', 'refresh');
					}
				} elseif ($jenis_cuti == "13") {
					$query = $this->db->query("SELECT * from tb_cuti WHERE jenis_cuti ='Cuti Pernikahan Anak Pegawai' AND nip = " . $nip)->num_rows();
					$quer = $this->db->query("SELECT * from tb_cuti where status = 'Disetujui' AND jenis_cuti = '  	Cuti Pernikahan Anak Pegawai' AND nip = " . $nip)->num_rows();
					if ($query >= 1) {
						$this->session->set_flashdata('gagal', 'Pengajuan Cuti Gagal Karena Anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} elseif ($quer >= 1) {
						$this->session->set_flashdata('gag', 'Pengajuan Cuti Gagal Karena anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} else {
						$data = array(
							'nip'		    	=> $nip,
							'jenis_cuti' 		=> 'Cuti Pernikahan Anak Pegawai',
							'tanggal_mulai' 	=> $tanggal_mulai,
							'tanggal_akhir' 	=> $tanggal_akhir,
							'status'			=> $status,
							'file'				=> $imgName,
							'email'				=> $email
						);

						$this->db->insert('tb_cuti', $data);
						$this->session->set_flashdata('sukses', 'Pengajuan Cuti telah berhasil');
						redirect('pegawai/cuti', 'refresh');
					}
				} elseif ($jenis_cuti == "14") {
					$query = $this->db->query("SELECT * from tb_cuti WHERE jenis_cuti ='Cuti Tahunan' AND nip = " . $nip)->num_rows();
					$quer = $this->db->query("SELECT * from tb_cuti where status = 'Disetujui' AND jenis_cuti = '  	Cuti Tahunan' AND nip = " . $nip)->num_rows();
					if ($query >= 1) {
						$this->session->set_flashdata('gagal', 'Pengajuan Cuti Gagal Karena Anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} elseif ($quer >= 1) {
						$this->session->set_flashdata('gag', 'Pengajuan Cuti Gagal Karena anda sudah pernah cuti pada tahun ini');
						redirect('pegawai/cuti', 'refresh');
					} else {
						$data = array(
							'nip'		    	=> $nip,
							'jenis_cuti' 		=> 'Cuti Tahunan',
							'tanggal_mulai' 	=> $tanggal_mulai,
							'tanggal_akhir' 	=> $tanggal_akhir,
							'status'			=> $status,
							'file'				=> $imgName,
							'email'				=> $email
						);

						$this->db->insert('tb_cuti', $data);
						$this->session->set_flashdata('sukses', 'Pengajuan Cuti telah berhasil');
						redirect('pegawai/cuti', 'refresh');
					}
				} else {
					echo "Upload gagal";
				}

				// if ( ! $this->upload->do_upload('file') || ! $this->upload->do_upload('filee'))
				// {
				//         echo "gagal";
				// }else {		
				// 	echo $gambar." ".$gambar2;
				//      	$data = array(

				// 	'nip'		    	=> $nip,
				// 	'jenis_cuti' 		=> $jenis_cuti,
				// 	'tanggal_mulai' 	=> $tanggal_mulai,
				// 	'tanggal_akhir' 	=> $tanggal_akhir,
				// 	'status'			=> $status,
				// 	'file'				=> $gambar,
				// 	'file_surat'		=> $gambar2
				// );
				// $this->db->insert('tb_cuti', $data);         	
				// redirect('pegawai/beranda');
				// } 
			}
		}
	}

	// public function edit($id)
	// {
	// 	echo $id;
	// 	$nip 			    = $this->session->userdata('pgw_nip');
	// 	$jenis_cuti			= $this->input->post('jenis', true);
	// 	$tanggal_mulai 		= $this->input->post('tanggal_mulai', true);
	// 	$tanggal_akhir 		= $this->input->post('tanggal_akhir', true);

	// 	$config['upload_path']          = './uploads/';
	//       	$config['allowed_types']        = 'jpg|png|jpeg';
	//     $this->load->library('upload', $config);
	//     if ($this->upload->do_upload('file')) {
	//       	$data = $this->upload->data();
	//        	$imgName =  $data['file_name'];
	//     }else{
	//        	$imgName = null;
	//     }

	//     if ($imgName!=null) {
	//        	$data = array(
	//        		'nip'				=> $nip,
	// 			'jenis_cuti' 		=> $jenis_cuti,
	// 			'tanggal_mulai' 	=> $tanggal_mulai,
	// 			'tanggal_akhir' 	=> $tanggal_akhir,
	// 			'status'			=> $status,
	// 			'file'				=> $imgName,

	// 		);
	// 		$this->db->update('tb_cuti', $data);  
	// 		$this->db->where('id_cuti',$id);       	
	// 		redirect('pegawai/beranda');
	//     }else{
	//         echo "Upload gagal";

	//        }
	// }

	public function laporan($id)
	{
		$iid = $id;

		$data['hasil'] = $this->db->query("SELECT * from tb_cuti join tb_pegawai on tb_cuti.nip = tb_pegawai.pgw_nip where id_cuti='" . $iid . "' AND tb_pegawai.pgw_nip =" . $this->session->userdata('pgw_nip'))->row();

		$data['kepala'] = $this->db->query("SELECT pgw_nama,pgw_nip from tb_pegawai where pgw_jabatan='Kepala Dinas'")->row();

		$this->load->view('pegawai/laporan', $data, FALSE);
	}
}
