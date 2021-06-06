-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 08:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `id_cuti` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jenis_cuti` enum('Cuti Tahunan','Cuti Lahiran','Cuti Sakit','Cuti Alasan Penting','Cuti Besar','Cuti di Luar Tanggungan Negara') NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` enum('Disetujui','Ditolak','Belum Diverifikasi','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cuti`
--

INSERT INTO `tb_cuti` (`id_cuti`, `nip`, `jenis_cuti`, `tanggal_mulai`, `tanggal_akhir`, `file`, `status`) VALUES
(98, '196205271990031004', 'Cuti Sakit', '2019-08-02', '2019-08-14', '4baf7d13-f410-4379-a461-51b105544fa216.jpg', 'Disetujui'),
(99, '196205271990031004', 'Cuti Sakit', '2019-08-02', '2019-08-16', '77476b39-9555-41a1-a75a-4f6640092bc133.jpg', 'Disetujui'),
(100, '196205271990031004', 'Cuti Besar', '2019-08-02', '2019-08-15', '77476b39-9555-41a1-a75a-4f6640092bc134.jpg', 'Disetujui'),
(101, '196205271990031004', 'Cuti di Luar Tanggungan Negara', '2019-08-08', '2019-08-23', '77476b39-9555-41a1-a75a-4f6640092bc135.jpg', 'Disetujui'),
(102, '196404211990031007', 'Cuti Sakit', '2019-08-01', '2019-12-27', '33f386aa-92d6-4a25-b161-47b45665517936.jpg', 'Disetujui'),
(103, '196404211990031007', 'Cuti Sakit', '2019-08-09', '2019-08-22', '33f386aa-92d6-4a25-b161-47b45665517937.jpg', 'Disetujui'),
(104, '196404211990031007', 'Cuti Alasan Penting', '2019-08-01', '2019-08-09', '4baf7d13-f410-4379-a461-51b105544fa217.jpg', 'Disetujui'),
(105, '196404211990031007', 'Cuti Alasan Penting', '2019-08-09', '2019-08-31', '33f386aa-92d6-4a25-b161-47b45665517938.jpg', 'Ditolak'),
(106, '196404211990031007', 'Cuti Besar', '2019-08-08', '2019-08-22', '77476b39-9555-41a1-a75a-4f6640092bc138.jpg', 'Disetujui'),
(107, '196404211990031007', 'Cuti di Luar Tanggungan Negara', '2019-08-10', '2019-08-15', '33f386aa-92d6-4a25-b161-47b45665517941.jpg', 'Disetujui'),
(108, '196607151991031010', 'Cuti Sakit', '2019-08-08', '2019-08-16', '4baf7d13-f410-4379-a461-51b105544fa219.jpg', 'Disetujui'),
(109, '196804121994031007', 'Cuti Alasan Penting', '2019-08-02', '2019-08-16', '4baf7d13-f410-4379-a461-51b105544fa220.jpg', 'Disetujui'),
(110, '197103011998032003', 'Cuti Lahiran', '2019-08-01', '2019-10-30', '4baf7d13-f410-4379-a461-51b105544fa222.jpg', 'Belum Diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `pgw_nip` varchar(20) NOT NULL,
  `pgw_nama` varchar(25) NOT NULL,
  `pgw_tempatlahir` varchar(25) NOT NULL,
  `pgw_tgllahir` date NOT NULL,
  `pgw_jk` enum('L','P') NOT NULL,
  `pgw_jabatan` varchar(100) NOT NULL,
  `pgw_golongan` varchar(10) NOT NULL,
  `pgw_MasaKerja` int(2) NOT NULL,
  `pgw_PendidikanTerakhir` varchar(25) NOT NULL,
  `pgw_TahunLulus` varchar(10) NOT NULL,
  `pgw_Usia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`pgw_nip`, `pgw_nama`, `pgw_tempatlahir`, `pgw_tgllahir`, `pgw_jk`, `pgw_jabatan`, `pgw_golongan`, `pgw_MasaKerja`, `pgw_PendidikanTerakhir`, `pgw_TahunLulus`, `pgw_Usia`) VALUES
('107909172006041009', 'Wasinton Silalahi, S.kom', 'Sibuntuon', '1979-09-17', 'L', 'Analisis rencana umum pemaduan moda transportasi d', 'III/c', 11, 'STKIK Sistem Informasi', '2004', '38 tahun'),
('196006231982032004', 'Suparmi', 'Lahat', '1960-06-23', 'L', 'Pengelola data pada sub bagian kepegawaian dan umum', 'III/b', 35, 'SMA', '1980', '57 tahun'),
('196009091982032005', 'Sumra Atini', 'Bengkulu', '1960-09-09', 'P', 'UPT UPP ASDP', 'III/b', 35, 'Smea', '19981', '57 tahun'),
('196010281981031004', 'Supriono, SH', 'Malang', '1961-02-28', 'L', 'Kepala UPTD Perkeretaapian', 'IV/b', 28, 'S1 Hukum', '1986', '56 tahun'),
('196205271990031004', 'ir. Bambang Budi Djatmiko', 'Bondowoso', '1962-05-27', 'L', 'Kepala Dinas', 'IV/c', 27, 'S2 MAGISTER MANAJEMEN', '2006', '55 tahun'),
('19621115188031005', 'Rizal. sp', 'Lubuk Puding', '1962-11-15', 'L', 'Pemeriksa Keselamatan Pelayaran Pada Seksi Angkuta', 'III/d', 2009, 'S1 Ilmu Pertanian', '2004', '55 tahun'),
('196291942008011001', 'Ali Rachman', 'Purwokerto', '1962-01-04', 'L', 'pengadministrasi umum pada subbag kepegawaian dan ', 'II/c', 11, 'SMA', '1985', '55 tahun'),
('196309192006041002', 'Arsyad', 'Permu', '1963-09-19', 'L', 'Pengadministrasi pengajuan sarana dan prasarana pe', 'II/d', 11, 'Smea', '1983', '54 tahun'),
('196403131991031004', 'Dellyana', 'Talang Betutu', '1964-03-13', 'P', 'UPT UPP ASDP', 'III/b', 26, 'SMA', '1984', '53 tahun'),
('196404211990031007', 'Drs.ir.Hasoloan Sormin,M.', 'Padang Siandomang', '1964-04-21', 'L', 'Kepala Bidang Lalu Lintas', 'IV/b', 27, 'Magister perencanaan', '2008', '53 tahun'),
('196409071989121001', 'Dasmin', 'Bengkulu', '1964-09-07', 'L', 'Pengadministrasi pengajuan sarana dan prasarana pe', 'III/b', 27, 'SMA', '19985', '53 tahun'),
('196409211987031003', 'Zulkifli, SE', 'Tanjung Iman', '1964-09-21', 'L', 'Kasubbag Tata Usaha UPTD PKB', 'III/d', 30, 'S1 Ekonomi', '2007', '53 tahun'),
('196509051990021002', 'Diusman', 'Bengkulu Selatan', '1965-09-05', 'L', 'UPT UPP ASDP', 'III/b', 27, 'SMA', '1985', '52 tahun'),
('196510151994022001', 'Dra. Indrawati', 'Tanjung Agung', '1965-11-15', 'L', 'Pengadminitrasi Norma Standar Prosedur dan pelayanan perkeretaapian', 'III/d', 23, 'S1 Fak. tabiyah IAIN', '1993', '52 tahun'),
('196512211990032004', 'Ni Made Eliawati,S.Sos', 'Bali', '1965-09-21', 'P', 'Verifikator keuangan pada sub bagian perencanaan dan keuangan', 'III/d', 27, 'S1 Adm. Negara', '2001', '51 tahun'),
('196601111986031006', 'Ahmad arif Dimyati', 'Bojonegoro', '1966-01-11', 'L', 'Penata Hubungan Masyarakat Pada sub bagian kepegawaian dan Umum', 'III/c', 31, 'SMA', '1984', '51tahun'),
('196604131996031001', 'Wisnu Fibronugroho, ST', 'Oku', '1966-04-13', 'L', 'Kasubbag Tata Usaha UPTD Perkeretaapian', 'III/d', 21, 'S1 Tehnik', '1993', '51 tahun'),
('196607151991031010', 'Muhammad Yusuf,ST', 'MA kati Baru', '1966-07-15', 'L', 'Sekretaris Dinas', 'IV/a', 26, 'S1 Teknik Sipil', '2002', '51 tahun'),
('1966080719900312003', 'Azidan, SE', 'Kembang Seri', '1966-08-07', 'L', 'Kepala Seksi Angkutan Pelayaran dan ASDP', 'III/d', 27, 'S1 Ekonomi', '1993', '51 tahun'),
('19660812198803104', 'Ajrman, S.Sos', 'Manna', '1966-04-12', 'L', 'Kasi Angkutan Barang dan Penumpang UPTD Perkeretaa', 'III/d', 29, 'S1 Sosial', '2000', '51vtahun'),
('196706281986031001', 'M.yusuf', 'Manna', '1967-06-28', 'L', 'Pengadministrasi pelaporan dan penyusunan tarif angkutan transportasi pada seksi angkutan', 'III/b', 31, 'SMA', '1998', '50 tahun'),
('196708131990032002', 'Supriati', 'Curup', '1967-08-13', 'P', 'Pengelola lalu lintas ASDP pada seksi badan usaha dan jasa terkait angkutan pelayaran', 'III/b', 27, 'Smea', '1989', '50 tahun'),
('196709171991032002', 'EfDaini Kosma', 'Muara Danau', '1967-09-17', 'P', 'Pengelolah Pengawasan LLAJ Pada Seksi Lalu Lintas Jalan', 'III/d', 26, 'S1 Adm. Negara', '2005', '50 tahun'),
('196709251991032006', 'Sri Dwi Hartiningsi,S.Sos', 'Wonosobo', '1967-09-25', 'P', 'Analisis Kesehatan, Keselamatan dan Lingkungan serta Scurity kapal Pada Seksi kepelabuhan', 'III/d', 26, 'S1 Adm. Negara', '20006', '50 tahun'),
('196712181990032002', 'Hasni, SE', 'Bengkulu', '1967-12-18', 'P', 'Kepala Seksi Pemadu Moda dan Teknologi Perhubungan', 'III/d', 27, 'S1 Ekonomi', '1999', '42 tahun'),
('196802181998031005', 'Silaturahman,SH', 'Enggano', '1968-02-18', 'L', 'UPT UPP ASDP', 'III/d', 19, 'S1 Hukum', '1996', '49 tahun'),
('196803121992031012', 'Sihardi, Se', 'Genting Jerai', '1968-03-12', 'L', 'Pengelola gaji pada sub bagian perencanaan dan keuangan', 'III/d', 25, 'S1 Ekonomi', '2001', '49 tahun'),
('196804121994031007', 'Syafril, SE.MsTr', 'Lebong Selatan', '1968-04-12', 'L', 'Kepala Bidang Pengembangan dan Perkapalan', 'IV/b', 23, 'S1 Ekonomi', '1996', '49 tahun'),
('196907011992021004', 'Yurman Effendi,S.Sos', 'Talang Empat', '1969-07-01', 'L', 'Analisis Lalu lintas Pada Seksi Lingkungan Perhubungan', 'III/d', 25, 'S1 Fisipol', '2001', '48 tahun'),
('197103011998032003', 'Martina, ST,MT', 'Bengkulu', '1971-03-01', 'P', 'Kasubag Perencanaan dan Keuangan', 'IV/a', 19, 'S1 Teknik Sipil', '2006', '46 tahun'),
('197103231993032004', 'Meli Susilawati,S.Sos', 'Lahat', '1971-03-23', 'P', 'Bendehara pengeluaran pada sub bagian perencanaan ', 'III/c', 24, 'S1 Adm. Negara', '2007', '46 tahun'),
('197202261998032003', 'Dina Marliana,A.Md LLAJ,S', 'Jakarta', '1976-02-26', 'P', 'Kepala Seksi Lalu lintas', 'III/d', 19, 'd3 llaj, dan S1 sosial', '1997', '46 tahun'),
('197212051998032004', 'Sari Muliasih, SE', 'Palembang', '1972-12-05', 'P', 'Peangelola data pada seksi pemanduan moda dan teknologi perhubungan', 'III/d', 19, 'S1 Akutansi', '2003', '45 tahun'),
('197212301998012001', 'Herma Susanti,S,pd.M.si', 'Bengkulu', '1972-12-31', 'P', 'Kepala seksi Lingkungan Perhubungan', 'IV/a', 20, 'S1 Pendidikan', '2005', '45 tahun'),
('197305011998031005', 'Sugeng Darojati,ST.MT', 'Kundisari', '1973-05-01', 'L', 'Kepala Bidang Pelayaran', 'IV/a', 20, 'S1 Teknik Sipil', '1996', '44 tahun'),
('197305231994022003', 'yayanti, SH', 'Aur Gading', '1973-05-23', 'P', 'UPT PKB', 'III/c', 23, 'S1 Hukum', '1998', '38 tahun'),
('197404221998032003', 'Harlena Apriyani, SE', 'Manna', '1974-04-22', 'P', 'Arsiparis Pada Sub Bagian Kepegawaian dan Umum', 'III/d', 19, 'S1 Ekonomi', '2000', '43 tahun'),
('197410051998032004', 'Dewi Melani, SE', 'Jakarta', '1974-10-05', 'P', 'Pengelola data pada seksi angkutan', 'III/d', 19, 'S1 Ekonomi', '2004', '43 tahun'),
('197501142002122005', 'Zurni Zurdi, SE', 'Jenggalu', '1975-01-14', 'L', 'Kasi Badan Usaha dan Jasa Terkait Angkutan', 'III/d', 14, 'S1 Ekonomi', '1999', '42 tahun'),
('197507011998031006', 'Taufiq Rahman, A.Md', 'Bengkulu', '1975-07-01', 'L', 'Verifikator keuangan pada sub bagian perencanaan d', 'III/c', 19, 'DIII Akutansi', '1997', '42 tahun'),
('197602141998032001', 'Nurul Hayati, ST', 'Talang Padang', '1976-02-14', 'P', 'Kepala Seksi Kepelabuhan', 'III/d', 19, 'S1 Tehnik', '2006', '41 tahun'),
('197606142011012007', 'Erliana Astuti,S.S', 'Surabaya', '1976-06-14', 'P', 'Penerjemah pertama dan komunikasi menejamen perhubungan', 'III/b', 6, 'S1 Fisipol', '2000', '41'),
('197701251997031002', 'Indra Junaidi, SE.MM', 'Bengkulu, Sukarami', '1977-01-25', 'L', 'Kasi Keamanan, Ketertiban dan Pemeliharaan UPTD UP', 'III/d', 20, 'S1 Ekonomi, S2 Master Man', '2001,2015', '40 tahun'),
('197706142011012005', 'Rodiya Ningsih, SE', 'Rejang lebong ', '1977-06-14', 'P', 'Bendahara penerima pada sub bagian perencanaann dan keuangan', 'III/b', 6, 'S1 Ekonomi Akutansi', '2002', '40 tahun'),
('197711082009031002', 'Elso Fransisco, SE', 'Padang Ulak Tanding', '1977-11-08', 'P', 'Pengolah data pertanggung jawaban anggaran pada sub bagian perencanaan dan keuangan', 'III/b', 8, 'S1 Ekonomi', '2000', '40 tahun'),
('1977212072007011028', 'Iswandi', 'Bengkulu', '1972-12-07', 'L', 'pengelola perizinan angkutan jalan pada seksi angkutan', 'II/c', 10, 'Smkk', '1992', '45 tahun'),
('197810052009012010', 'Yetti Herawati,M.I.Kom', 'Lubuk Gadis', '1978-10-05', 'P', 'Pengadministrasi norma standar prosedur dan pelayanan perkeretaapian', 'III/b', 8, 'S1 komunikasi, S2 Magis.k', '2012, 2001', '39 tahun'),
('197901132000122001', 'Nenny Farlyanti, S,SiT,M.', 'Bengkulu', '1979-01-13', 'P', 'Kasi Angkutan', 'III/d', 16, 'D.IV transdar, S2 Magiste', '2003, 2016', '38 tahun'),
('197903052009031001', 'Karyadi, S.Sos', 'Bantul', '1979-03-05', 'L', 'Pengelola program dan kegiatan pada sub bagian perencanaan dan keuangan', 'III/c', 8, 'S1 Ilkom', '2007', '38 tahun'),
('197912272000121002', 'Denny Triyudha, S.S.iT', 'Bengkulu', '1979-12-27', 'L', 'Kasi Terminal Bidang LLAJ', 'III/d', 16, 'D.IV transdar', '2003', '38 tahun'),
('198005082008041002', 'Nistijan, SE', 'Nanjungan', '1980-05-08', 'L', 'pengelola keselamata dan keamanan pelayaran sungai danau dan penyebrangan', 'III/c', 9, 'SMA', '2003', '37 tahun'),
('198007032009032001', 'Ambar Sari wulan, A.md', 'Palembang', '1980-07-03', 'P', 'UPTD penyelenggara penyebrangan', 'III/a', 8, 'DIII', '2003', '37 tahun'),
('198207152009012013', 'Essi Yulianti, S.Kom', 'Masmambang', '1982-07-15', 'P', 'Pengawas angkutan dan terminal pada seksi terminal', 'III/c', 8, 'S1 Teknik Informatika', '2004', '51 tahun'),
('198305012010011006', 'Hermalena', 'Rejang lebong ', '1985-05-01', 'P', 'UPTD penyeenggara Penybrangan', 'II/b', 14, 'SMA', '2006', '34 tahun'),
('198308172006042031', 'Rely Puspitasari,S.Sos', 'Rejang lebong ', '1983-08-17', 'P', 'Kasubbag Kepegawaian dan Umum', 'III/c', 13, 'S1 Adm. Negara', '2008', '34 tahun'),
('198310062005021001', 'Bambang Hariyanto, S.IP', 'Bengkulu', '1983-10-06', 'L', 'Pengelola data pencairan dana pada sub bagian pere', 'III/b', 12, 'S1 Ilmu pemerintah', '2009', '34 tahun'),
('198312282009022002', 'Sri Suryanengsi,S.IP', 'Bengkulu', '1983-12-20', 'P', 'pengaapiannan perkeretadministrasian norma standar prosedur dan kriteria pelaya', 'III/c', 8, 'S1 Ilmu pemerintah', '2007', '34 tahun'),
('198506302011011007', 'Dony Apriyanto,ST', 'Bengkulu', '1985-04-16', 'L', 'Pengawas penguji kendaraan bermotor pada seksi ang', 'III/b', 6, 'S1 Elektro', '2010', '32 tahun'),
('198512282011012004', 'Ardesti,SH', 'Bengkulu', '1985-12-25', 'P', 'Pengeloa sistem informasi sarana dan prasarana jalan pada seksi lalu lintas jalan', 'III/b', 6, 'S1 Hukum', '2009', '32 tahun'),
('198602182008041001', 'Ronald, Se', 'Muara Enim', '1986-02-18', 'L', 'Pengelola menejemen transportasi ASDP pada seksi badan usaha dan jasa terkait angkutan pelayaran', 'III/b', 9, 'DII LLASDP', '2007', '31 tahun'),
('198606232011011002', 'Astri Yunita, ST', 'Palembang', '1986-06-23', 'P', 'Pengelola Terminal pada sub bagian perencanaan dan keuangan', 'III/b', 6, 'S1 Tehnik', '2003', '31 tahun'),
('1997412242009022001', 'Anti Elfi, SE', 'Karang Anyar', '1974-12-24', 'P', 'Pengelola kegiatan survey dan perencanan pada sub bagian perencanaan dan keuangan', 'III/c', 8, 'S1 Ekonomi', '2003', '43 tahun'),
('343215235245', 'eko', 'Bengkulu', '2019-08-01', 'L', 'Kabid Ruangan', 'III/a', 19, 'S1 Ekonomi', '2004', '34 tahun');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`pgw_nip`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD CONSTRAINT `tb_cuti_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`pgw_nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
