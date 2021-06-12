<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
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
        $data['content']     = 'admin/report';
        $data['judul']       = 'Halaman';
        $data['sub_judul']     = "Beranda";

        $this->load->view('layout/header');
        $this->load->view('tampilan_beranda', $data);
        $this->load->view('layout/footer');
    }
}
