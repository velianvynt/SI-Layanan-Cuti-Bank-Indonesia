<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index()
	{
		$data['content'] 	= 'pegawai/beranda';
		$data['judul']   	= 'Halaman';
		$data['sub_judul'] 	= "Beranda";

		$this->load->view('layout/header');
		$this->load->view('tampilan_beranda_pegawai',$data);
		$this->load->view('layout/footer');
	}

}	