<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<title>Laporan</title>

	<link rel="stylesheet" type="text/css" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.line-title {
			border: 0;
			border-style: inset;
			border-top: 1px solid #000;
		}
	</style>
</head>


<body onload="javascript:window.print()">
	<img src="<?= base_url('assets/images/bankindonesia.png'); ?>" style="position: absolute; width: 60px; height: auto;">
	<table style="width: 100%;">
		<tr>
			<td align="center">
				<span style="line-height: 1.6; font-weight: bold;">
					PEMERINTAH PROVINSI BENGKULU
					<br>BANK INDONESIA PROVINSI BENGKULU (ESDM)
				</span>
			</td>
		</tr>
	</table>
	<hr class="line-title">
	<p align="center">
		<b><u>SURAT PEMBERIAN CUTI</u></b>
	</p>
	<br>
	PEMBERIAN CUTI <br>
	NOMOR : 857/&nbsp;&nbsp;&nbsp;/ESDM 19 <br><br><br>
	I. DATA PEGAWAI <br>
	Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $hasil->pgw_nama ?><br>
	Jabatan &nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $hasil->pgw_jabatan ?><br>
	Nip &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; : <?php echo $hasil->pgw_nip ?><br><br>
	II. JENIS CUTI YANG DI AMBIL <br>
	1. <?php echo $hasil->jenis_cuti ?> <br><br>

	III. LAMANYA CUTI <br>
	Selama <br>
	Mulai tanggal : <?php echo $hasil->tanggal_mulai ?> <br>
	s/d &nbsp;&nbsp; : <?php echo $hasil->tanggal_akhir ?> <br> <br>
	
	IV. PERTIMBANGAN ATASAN LANGSUNG <br><br>
	<p style="float: left;">DISETUJUI</p>

	<div style="margin-right: 20%; float: right;">
		<p>Mengetahui</p>
		<p>KEPALA DINAS</p><br><br>
		<p><u><?= $hasil->pgw_nama ?></u></p>
		<p><?= $hasil->pgw_nip ?></p>
	</div>

</body>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo base_url(); ?>assets/vendors/skycons/skycons.js"></script>

</html>