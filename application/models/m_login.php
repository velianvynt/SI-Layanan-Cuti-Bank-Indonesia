<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function ambillogin($username,$password)
	{	
		$this ->db ->select('*');
		$this ->db ->from('tb_user');

		$this ->db ->where(array('username' => $username,
								'password' => $password));

	    $query = $this ->db ->get();
	    return $query->row();
	}

	public function ambillogin2($username , $password)
	{

		$this ->db ->select('*');
		$this ->db ->from('tb_pegawai');
		$this ->db ->where(array('pgw_nama' =>$username,
								 'pgw_nip' =>$password));

		$query = $this ->db ->get();
		return $query ->row();

	}


} 