-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2017 at 12:23 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail_pemesanan` int(11) NOT NULL,
  `id_pemesanan` varchar(50) NOT NULL,
  `id_hotel` varchar(50) NOT NULL,
  `id_kamar` varchar(50) NOT NULL,
  `type_kamar` varchar(50) NOT NULL,
  `tgl_cekin` varchar(50) NOT NULL,
  `tgl_cekout` varchar(50) NOT NULL,
  `durasi` varchar(50) NOT NULL,
  `harga_sewa` varchar(50) NOT NULL,
  `sub_total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail_pemesanan`, `id_pemesanan`, `id_hotel`, `id_kamar`, `type_kamar`, `tgl_cekin`, `tgl_cekout`, `durasi`, `harga_sewa`, `sub_total`) VALUES
(1, 'PMS001', 'HL001', 'KR001', 'Standard', '05/12/2017', '05/13/2017', '1', '200000', 200000),
(2, 'PMS001', 'HL001', 'KR002', 'Standard', '05/12/2017', '05/13/2017', '1', '90000', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` varchar(50) NOT NULL,
  `nama_hotel` varchar(50) NOT NULL,
  `alamat_hotel` varchar(50) NOT NULL,
  `bintang` varchar(100) NOT NULL,
  `foto_hotel` varchar(100) NOT NULL,
  `id_fasilitas` varchar(50) NOT NULL,
  `deskripsi_hotel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nama_hotel`, `alamat_hotel`, `bintang`, `foto_hotel`, `id_fasilitas`, `deskripsi_hotel`) VALUES
('HL001', 'Hotel Ibis Yogyakarta', 'Yogyakarta', 'ibis 5.png', 'ibishotel.jpg', 'TYF002', 'Dekat Dengan Pusat Perbelanjaan dan Pusat Kota'),
('HL002', 'Hotel D season Jepara', 'Jepara', 'bintang 3.png', 'b.jpg', 'TYF001', 'Dekat Dengan Pusat Pemerintahan Dan Tempat Pariwisata'),
('HL003', 'Hotel Pullman Jakarta', 'Jakarta', 'pullman 6.png', 'pullmanhotel.jpg', 'TYF003', 'Dekat Dengan Pusat Perkantoran Dan Bandara Sukarno Hatta');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` varchar(50) NOT NULL,
  `no_kamar` varchar(50) NOT NULL,
  `id_hotel` varchar(50) NOT NULL,
  `id_type_kamar` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `foto_kamar` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `id_hotel`, `id_type_kamar`, `harga`, `foto_kamar`, `status`) VALUES
('KR001', '301', 'HL001', 'TYK001', '200000', '1.jpg', 'Tersewa'),
('KR002', '202', 'HL001', 'TYK001', '90000', '2.jpg', 'Tersewa'),
('KR003', '405', 'HL002', 'TYK002', '2050000', '3.jpg', 'Belum Tersewa'),
('KR004', '501', 'HL002', 'TYK003', '6500000', '4.jpg', 'Belum Tersewa'),
('KR005', '102', 'HL003', 'TYK001', '780000', '5.jpg', 'Belum Tersewa'),
('KR006', '690', 'HL003', 'TYK003', '760000', '6.jpg', 'Belum Tersewa');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `id_master` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level` varchar(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id_master`, `username`, `pass`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'manajer', '69b731ea8f289cf16a192ce78a37b4f0', 'manajer');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` varchar(50) NOT NULL,
  `nama_pembayar` varchar(100) NOT NULL,
  `konfirmasi` varchar(50) NOT NULL,
  `foto_transfer` varchar(1000) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `tgl_pembayaran` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `nama_pembayar`, `konfirmasi`, `foto_transfer`, `no_rekening`, `tgl_pembayaran`) VALUES
(4, 'PMS001', 'Ahmad', 'Terbayar', '18090557_1843934152527419_1729027146_o.jpg', '138918', '05/12/2017');

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE `pemesan` (
  `id_pemesan` varchar(50) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`id_pemesan`, `nama_pemesan`, `alamat`, `no_hp`, `email`) VALUES
('PS001', 'Ahmad', 'Kelet', '102301923091', 'lucifer.dmn@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(100) NOT NULL,
  `total_pemesanan` varchar(100) NOT NULL,
  `id_pemesan` varchar(50) NOT NULL,
  `tgl_cekin` varchar(100) NOT NULL,
  `tgl_cekout` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `total_pemesanan`, `id_pemesan`, `tgl_cekin`, `tgl_cekout`, `total`) VALUES
('PMS001', '2', 'PS001', '05/12/2017', '05/13/2017', '290000');

-- --------------------------------------------------------

--
-- Table structure for table `type_fasilitas`
--

CREATE TABLE `type_fasilitas` (
  `id_fasilitas` varchar(50) NOT NULL,
  `nama_fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_fasilitas`
--

INSERT INTO `type_fasilitas` (`id_fasilitas`, `nama_fasilitas`) VALUES
('TYF001', '1. Free wifi \r\n2. Air mineral \r\n3. Peralatan mandi \r\n4. Sarapan pagi'),
('TYF002', '1. Free wifi  \r\n2. Spa pribadi \r\n3. Peralatan mandi \r\n4. Sarapan pagi'),
('TYF003', '1. Free wifi  \r\n2. Spa pribadi \r\n3. Peralatan madi \r\n4. Air mineral  \r\n5. Sarapan pagi \r\n6. Sovenir Hotel');

-- --------------------------------------------------------

--
-- Table structure for table `type_kamar`
--

CREATE TABLE `type_kamar` (
  `id_type_kamar` varchar(50) NOT NULL,
  `nama_kamar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_kamar`
--

INSERT INTO `type_kamar` (`id_type_kamar`, `nama_kamar`) VALUES
('TYK001', 'Standard'),
('TYK002', 'Ekslusif'),
('TYK003', 'VIP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail_pemesanan`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id_master`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`id_pemesan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `type_fasilitas`
--
ALTER TABLE `type_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `type_kamar`
--
ALTER TABLE `type_kamar`
  ADD PRIMARY KEY (`id_type_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detail_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
