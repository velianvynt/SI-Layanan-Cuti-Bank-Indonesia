-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 06:16 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `id_cuti` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenis_cuti` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` enum('Disetujui','Ditolak','Belum Diverifikasi','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cuti`
--

INSERT INTO `tb_cuti` (`id_cuti`, `nip`, `email`, `jenis_cuti`, `tanggal_mulai`, `tanggal_akhir`, `file`, `status`) VALUES
(127, '10859', 'velia.noviyanti88@gmail.com', 'Cuti Besar', '2021-06-03', '2021-06-05', 'pernyataan_yanti.jpg', 'Disetujui'),
(128, '10859', '', 'Cuti Khitanan Anak', '2021-06-02', '2021-06-05', 'transkip.jpeg', 'Ditolak'),
(129, '12131', '', 'Cuti Khitanan Anak', '2021-06-04', '2021-06-07', 'sk.jpeg', 'Disetujui'),
(130, '13166', '', 'Cuti Kematian Sdr/Istri/Suami', '2021-06-07', '2021-06-11', 'g3b.jpg', 'Disetujui'),
(131, '15668', '', 'Cuti Ibadah Keagamaan', '2021-06-15', '2021-06-17', 'ktp.jpg', 'Disetujui'),
(132, '11343', 'velia.noviyanti88@gmail.com', 'Cuti Bersalin Anak Ke-4/Lebih', '2021-06-10', '2021-06-11', 'image11.jpg', 'Belum Diverifikasi');

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
  `email` varchar(255) NOT NULL,
  `pgw_PendidikanTerakhir` varchar(25) NOT NULL,
  `pgw_TahunLulus` varchar(10) NOT NULL,
  `pgw_Usia` varchar(10) NOT NULL,
  `pgw_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`pgw_nip`, `pgw_nama`, `pgw_tempatlahir`, `pgw_tgllahir`, `pgw_jk`, `pgw_jabatan`, `pgw_golongan`, `pgw_MasaKerja`, `email`, `pgw_PendidikanTerakhir`, `pgw_TahunLulus`, `pgw_Usia`, `pgw_file`) VALUES
('10859', 'Agus Taufik', 'Talang Empat', '1969-07-01', 'L', 'KEPALA SEKSI PUR-BN.TISM.UNIT IMPLEMENTASI PUR', 'III', 25, 'velia.noviyanti88@gmail.com', 'S1 Fisipol', '2001', '48 tahun', ''),
('11343', 'Kuswinarso', 'Genting Jerai', '1968-03-12', 'L', 'KEPALA UNIT.-BN.SPUR.UNIT MANAJEMEN INTERN', 'II', 25, 'velia.noviyanti88@gmail.com', 'S1 Ekonomi', '2001', '49 tahun', ''),
('12087', 'Abdul Karim B.Djumadi', 'Kundisari', '1973-05-01', 'L', 'KEPALA SEKSI PUR-BN.TISMSEKSI LAYANAN & PENGOLAHAN UANG', 'II', 20, '', 'S1 Teknik Sipil', '1996', '44 tahun', ''),
('12131', 'Damar Surya', 'Bengkulu', '1972-12-31', 'L', 'ASISTEN ADMINISTRATOR PERKASAN-BN.TISM.SEKSI LAYANAN & PNGOLAHAN UANG', 'II', 20, '', 'S1 Pendidikan', '2005', '45 tahun', ''),
('12312', 'Joni Marsius', 'Bondowoso', '1962-05-27', 'L', 'KEPALA PERWAKILAN-BN.KANTOR PERWAKILAN BI PROVINSI BENGKULU', 'IV', 27, '', 'S2 ', '2006', '55 tahun', ''),
('12331', 'Evi Yanti', 'Bali', '1965-09-21', 'P', 'KEPALA SEKSI.-BN.SPUR.SEKSI KEUANGAN', 'II', 27, '', 'S1 Adm. Negara', '2001', '51 tahun', 'Tubes2.docx'),
('12500', 'Kusnadi', 'Sibuntuon', '1979-09-17', 'L', 'DEPUTI KEPALA PERWAKILAN-BN.TIM IMPLEMENTASI SP PUR & MI', 'III', 11, '', 'STKIK Sistem Informasi', '2004', '38 tahun', ''),
('13166', 'Rif''at Pasha', 'Lahat', '1960-06-23', 'L', 'DEPUTI KEPALA PERWAKILAN-BN.TIM PERUMUSAN & IMPLEMENTASI KEKDA', 'III', 35, '', 'S1', '1980', '57 tahun', ''),
('13313', 'Anton Sujarwo', 'Bengkulu Selatan', '1965-09-05', 'L', 'ASISTEN PENGAWAS PAM-BN.SPUR.FUNGSI LOGISTIK SDM SEKRETARIAT PENGAMANAN & PROTOKOL', 'II', 27, '', 'S1', '1985', '52 tahun', ''),
('13343', 'Hamiron', 'Purwokerto', '1962-01-04', 'L', 'ASISTEN ADMINISTRATOR-BN.SPUR.FUN LOGISTIK SDM SEKRETARIAT PENGAMANAN & PROTOKOL', 'II', 11, '', 'SMA', '1985', '55 tahun', ''),
('13833', 'Heti Febrianti', 'Jakarta', '1974-10-05', 'P', 'ADMINISTRATOR-BN.TISM.UNIT IMPLEMENTASI KEBIJAKAN SP & PENGAWASAN SP PUR', 'II', 19, '', 'S1 Ekonomi', '2004', '43 tahun', 'IMG_20180516_195531.jpg'),
('13835', 'Santy Wardhani', 'Muara Danau', '1967-09-17', 'P', 'EKONOM YUNIOR-BN.FUNGSI PERUMUSAN KEKDA PROVINSI BENGKULU', 'II', 26, '', 'S1 Adm. Negara', '2005', '50 tahun', 'received_2075367736077891.jpeg'),
('13889', 'Rainci Maliati', 'Bengkulu', '1971-03-01', 'P', 'KEPALA UNIT-BN.TSIM.UNIT IMPLEMENTASI KEBIJAKAN SP & PENGAWASAN SP PUR', 'III', 19, '', 'S1 Teknik Sipil', '2006', '46 tahun', ''),
('14435', 'Afri Jonson', 'Malang', '1961-02-28', 'L', 'ADMINISTRATOR-BN.SPUR.FU LOGISTIK SDM SEKRETARIAT PENGAMANAN & PROTOKOL', 'III', 28, '', 'S1 Hukum', '1986', '56 tahun', ''),
('15022', 'Gilang Tegar Putra', 'Talang Betutu', '1964-03-13', 'L', 'ASISTEN PENGAWAS PAM-BN.SPUR.FUNGSI LOGISTIK SDM SEKRETARIAT PENGAMANAN & PROTOKOL', 'II', 26, '', 'SMA', '1984', '53 tahun', ''),
('15023', 'Hendry John Saputra', 'Padang Siandomang', '1964-04-21', 'L', 'ASISTEN PENGAWAS PAM-BN.SPUR.FUNGSI LOGISTIK SDM SEKRETARIAT PENGAMANAN & PROTOKOL', 'II', 27, '', 'Magister perencanaan', '2008', '53 tahun', ''),
('15212', 'Dyah Utami Puji Lestari ', 'Lubuk Puding', '1962-11-15', 'P', 'ADMINISTRATOR-BN.SPUR.FU.LOGISTIK SDM SEKRETARIAT PENGAMANAN & PROTOKOL', 'II', 2009, '', 'S1 Ilmu Pertanian', '2004', '55 tahun', ''),
('15302', 'Maria Ulva', 'Wonosobo', '1967-09-25', 'P', 'ADMINISTRATOR.-BN.SPUR SEKRETARIAT KEUANGAN', 'I', 26, '', 'S1 Adm. Negara', '20006', '50 tahun', ''),
('15668', 'Oktama Aflianto', 'Nanjungan', '1980-05-08', 'L', 'ASISTEN ADMINISTRATOR PERKASAN-BN.TISM.SEKSI LAYANAN & PNGOLAHAN UANG', 'II', 9, '', 'S1', '2003', '37 tahun', ''),
('15669', 'Yoggy Elsa Pradwa', 'Jenggalu', '1975-01-14', 'L', 'ASISTEN ADMINISTRATOR PERKASAN-BN.TISM.SEKSI LAYANAN & PNGOLAHAN UANG', 'II', 14, '', 'S1 Ekonomi', '1999', '42 tahun', ''),
('15793', 'Apriansyah Zaelani ', 'Permu', '1963-09-19', 'L', 'ASISTEN PENGAWAS PAM-BN.SPUR.FUNGSI LOGISTIK SDM SEKRETARIAT PENGAMANAN & PROTOKOL', 'II', 11, '', 'S1', '1983', '54 tahun', ''),
('15816', 'Heru Syahputra', 'Bengkulu', '1964-09-07', 'L', 'ASISTEN PENGAWAS PAM-BN.SPUR.FUNGSI LOGISTIK SDM SEKRETARIAT PENGAMANAN & PROTOKOL', 'III', 27, '', 'S1', '19985', '53 tahun', ''),
('15978', 'Hari Novy Sucipto', 'Bojonegoro', '1966-01-11', 'L', 'ANALIS-BN.FUNGSI DATA & STATISTIK EKONOMI & KEUANGAN', 'II', 31, '', 'S1', '1984', '51tahun', ''),
('16049', 'Ilham Winoto', 'Oku', '1966-04-13', 'L', 'ANALIS-BN.FUNGSI PELAKSANAAN PENGEMBANGAN UMKM KI & SYARIAH', 'II', 21, '', 'S1 Tehnik', '1993', '51 tahun', ''),
('16187', 'Deky Putra Finaldo', 'Bengkulu, Sukarami', '1977-01-25', 'L', 'ADMINISTRATOR PERKASAN-BN.TISM.SEKSI LAYANAN & PNGOLAHAN UANG', 'II', 20, '', 'S1 Ekonomi', '2001,2015', '40 tahun', ''),
('16196', 'Fajar Juniardi Saputra', 'Bengkulu', '1985-04-16', 'L', 'ADMINISTRATOR PERKASAN-BN.TISM.SEKSI LAYANAN & PNGOLAHAN UANG', 'II', 6, '', 'S1 Elektro', '2010', '32 tahun', ''),
('16213', 'Mubha Fahriza', 'Bengkulu', '1975-07-01', 'L', 'ASISTEN ADMINISTRATOR PERKASAN-BN.TISM.SEKSI LAYANAN & PNGOLAHAN UANG', 'II', 19, '', 'DIII Akutansi', '1997', '42 tahun', ''),
('16255', 'Agung Setiawan', 'Jakarta', '1976-02-26', 'L', 'ASISTEN ADMINISTRATOR PERKASAN-BN.TISM.SEKSI LAYANAN & PNGOLAHAN UANG', 'II', 19, '', 'S1 sosial', '1997', '46 tahun', ''),
('16258', 'Ahmad Budiyanto', 'Bengkulu', '1972-12-07', 'L', 'ADMINISTRATOR PERKASAN-BN.TISM.SEKSI LAYANAN & PNGOLAHAN UANG', 'II', 10, '', 'S1', '1992', '45 tahun', ''),
('16272', 'Angga', 'Palembang', '1972-12-05', 'L', 'ASISTEN ADMINISTRATOR PERKASAN-BN.TISM.SEKSI LAYANAN & PNGOLAHAN UANG', 'II', 19, '', 'S1 Akutansi', '2003', '45 tahun', ''),
('16329', 'Firdaus DS', 'Bantul', '1979-03-05', 'L', 'ADMINISTRATOR PERKASAN-BN.TISM.SEKSI LAYANAN & PNGOLAHAN UANG', 'II', 8, '', 'S1 Ilkom', '2007', '38 tahun', ''),
('16367', 'Libranto', 'Bengkulu', '1979-12-27', 'L', 'ADMINISTRATOR PERKASAN-BN.TISM.SEKSI LAYANAN & PNGOLAHAN UANG', 'II', 16, '', 'S1', '2003', '38 tahun', ''),
('16451', 'Teguh Fasty Syahputra', 'Bengkulu', '2019-08-01', 'L', 'ADMINISTRATOR PERKASAN-BN.TISM.SEKSI LAYANAN & PNGOLAHAN UANG', 'II', 19, '', 'S1 Ekonomi', '2004', '34 tahun', ''),
('16739', 'Hendri Wahyudi', 'Kembang Seri', '1966-08-07', 'L', 'ADMINISTRATOR-BN.TPIK.SEKSI KEHUMASAN', 'I', 27, '', 'S1 Ekonomi', '1993', '51 tahun', ''),
('16741', 'Herlyn', 'Lahat', '1971-03-23', 'P', 'ADMINISTRATOR-BN.TISM.UNIT IMPLEMENTASI KEBIJAKAN SP & PENGAWASAN SP PUR', 'II', 24, '', 'S1 Adm. Negara', '2007', '46 tahun', ''),
('17085', 'Aang Parade', 'Tanjung Iman', '1964-09-21', 'L', 'ASISTEN PENGAWAS PAM-BN.SPUR.FUNGSI LOGISTIK SDM SEKRETARIAT PENGAMANAN & PROTOKOL', 'II', 30, '', 'S1 Ekonomi', '2007', '53 tahun', ''),
('17221', 'Leni Dwi Oktaviani', 'Curup', '1967-08-13', 'P', 'ADMINISTRATOR.-BN.SPUR SEKRETARIAT KEUANGAN', 'I', 27, '', 'S1', '1989', '50 tahun', ''),
('17232', 'M. Yusuf Noprianto', 'Manna', '1966-04-12', 'L', 'ADMINISTRATOR-BN.TPIK.SEKSI KEHUMASAN', 'I', 29, '', 'S1 Sosial', '2000', '51 tahun', ''),
('17361', 'Yofie Williansyah', 'Tanjung Agung', '1965-11-15', 'L', 'ADMINISTRATOR.-BN.SPUR.SEKRETARIAT KEUANGAN', 'I', 23, '', 'S1 Fak. tabiyah IAIN', '1993', '52 tahun', ''),
('17367', 'Yudhya Pratidiana Rosady', 'Bengkulu', '1967-12-18', 'P', 'ADMINISTRATOR-BN.TPIK.SEKSI KEHUMASAN', 'I', 27, '', 'S1 Ekonomi', '1999', '42 tahun', ''),
('17555', 'Rama Fitro Pamuka', 'Bengkulu', '1983-10-06', 'L', 'ADMINISTRATOR PERKASAN-BN.TISM.SEKSI LAYANAN & PNGOLAHAN UANG', 'II', 12, '', 'S1 Ilmu pemerintah', '2009', '34 tahun', ''),
('17613', 'Alhamdi Alfi Fajri', 'Bengkulu', '1960-09-09', 'L', 'PERFORMANCE MANAGER-BN.KANTOR PERWAKILAN BI PROVINSI BENGKULU', 'III', 35, '', 'Smea', '19981', '57 tahun', ''),
('17802', 'Faishal Ahmad Farrosi', 'Enggano', '1968-02-18', 'L', 'PENGAWAS YUNIOR-BN.TISM.FUNGSI IMPLEMENTASI PENGAWASAN SP PUR', 'II', 19, '', 'S1 Hukum', '1996', '49 tahun', ''),
('17805', 'Fathan Sabartian', 'MA kati Baru', '1966-07-15', 'L', 'ANALIS-BN.FUNGSI PERUMUSAN KEKDA PROVINSI', 'II', 26, '', 'S1 Teknik Sipil', '2002', '51 tahun', ''),
('17892', 'Riganislamareda Sukma', 'Manna', '1974-04-22', 'P', 'ANALIS YUNIOR-BN.TPIK.FUNGSI PELAKSANAAN PENGEMBANGAN UMKM KI & SYARIAH', 'III', 19, '', 'S1 Ekonomi', '2000', '43 tahun', ''),
('17899', 'Syekhan Adesia Ramadhan', 'Lebong Selatan', '1968-04-12', 'L', 'ANALIS YUNIOR-BN.TPIK.FUNGSI DATA & STATISTIK EKONOMI & KEUANGAN', 'III', 23, '', 'S1 Ekonomi', '1996', '49 tahun', '');

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
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
