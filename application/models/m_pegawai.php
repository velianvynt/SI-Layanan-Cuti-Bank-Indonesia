<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pegawai extends CI_Model
{

	public function get_nip($nip)
	{
		return $this->db->get_where('tb_pegawai', ['pgw_nip' => $nip])->row_array();
	}

	public function setuju($data)
	{
		$this->db->where('id_cuti', $data['id_cuti']);
		$this->db->update('tb_cuti', $data);
	}

	function drop($x)
	{
		$this->db->where('pgw_nip', $x);
		return $this->db->delete('tb_pegawai');
	}

	public function edit($id, $data)
	{
		$this->db->where('pgw_nip', $id);
		return $this->db->update('tb_pegawai', $data);
	}

	public function detail_data($id)
	{
		$this->db->select('*');
		$this->db->from('tb_cuti');
		$this->db->where('id_cuti', $id);  // Also mention table name here
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result();
	}

	public function print($data)
    {
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

		$this->db->select('nip, pgw_nama, jenis_cuti, tanggal_mulai, tanggal_akhir, status')
			->where('tanggal_mulai >=', $from_date)
			->where('tanggal_akhir <=', $to_date)
            ->join('tb_pegawai', 'tb_pegawai.pgw_nip = tb_cuti.nip')
            ->order_by('tanggal_mulai');

        return $this->db->get('tb_cuti')->result_array();
    }
}
