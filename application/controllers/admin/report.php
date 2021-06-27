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
        $data['content']    = 'admin/report';
        $data['judul']      = 'Halaman';
        $data['sub_judul']  = "Beranda";

        $this->load->view('layout/header');
        $this->load->view('tampilan_beranda', $data);
        $this->load->view('layout/footer');
    }

    public function print()
    {
        $from_date  = $this->input->post('from_date');
        $to_date    = $this->input->post('to_date');

        $data = array(
            'from_date' => $from_date,
            'to_date' => $to_date
        );

        $data['list'] = $this->m_pegawai->print($data);

        // $this->load->library('pdf');
        // $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = "Laporan Cuti.php";
        $this->load->view('admin/print_laporan', $data);
    }
}
