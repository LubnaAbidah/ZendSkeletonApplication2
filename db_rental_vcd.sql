-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Mar 2017 pada 05.20
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental_vcd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelanggan`
--

CREATE TABLE IF NOT EXISTS `data_pelanggan` (
  `idPelanggan` varchar(6) NOT NULL,
  `namaPelanggan` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `favorite` varchar(10) DEFAULT NULL,
  `namaPhoto` varchar(25) DEFAULT NULL,
  `tglDaftar` date DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`idPelanggan`, `namaPelanggan`, `password`, `email`, `favorite`, `namaPhoto`, `tglDaftar`) VALUES
('PEL001', 'Edison', 'edisonsiregar', 'edison@contoh.com', 'Drama', 'edison.jpg', '2014-07-14'),
('PEL002', 'Aurora', 'Passw@rd', 'aurora@contoh.com', 'Keluarga', 'edison.jpg', '2014-07-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_peminjaman`
--

CREATE TABLE IF NOT EXISTS `data_peminjaman` (
  `id` int(11) NOT NULL,
  `idPelanggan` varchar(6) DEFAULT NULL,
  `idVcd` varchar(6) DEFAULT NULL,
  `tglPeminjaman` date DEFAULT '0000-00-00',
  `tglPengembalian` date DEFAULT '0000-00-00',
  `totalKeterlambatan` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_peminjaman`
--

INSERT INTO `data_peminjaman` (`id`, `idPelanggan`, `idVcd`, `tglPeminjaman`, `tglPengembalian`, `totalKeterlambatan`) VALUES
(1, 'PEL001', 'VCD001', '2014-07-14', '2014-07-17', 0),
(2, 'PEL001', 'VCD002', '2014-07-14', '2014-07-17', 0),
(3, 'PEL002', 'VCD001', '2014-07-14', '2014-07-17', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_vcd`
--

CREATE TABLE IF NOT EXISTS `data_vcd` (
  `idVcd` varchar(6) NOT NULL,
  `judulVcd` varchar(200) NOT NULL,
  `kategori` varchar(10) DEFAULT 'Action',
  `deskripsi` text,
  `bykCD` int(2) DEFAULT NULL,
  `hargaVcd` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_vcd`
--

INSERT INTO `data_vcd` (`idVcd`, `judulVcd`, `kategori`, `deskripsi`, `bykCD`, `hargaVcd`) VALUES
('dsd123', 'dsw', 'Drama', 'dsa', 40, '2.00'),
('jsj234', 'weqwe', 'Drama', 'wqew', 34, '3.00'),
('VCD001', 'ini vcd 009', 'Drama', 'ini keterangan', 10, '10.00'),
('VCD002', 'Judul vcd 002', 'Action', 'Ini aksion', 20, '999.99'),
('VCD003', 'Judul VCD 003 ', 'Action', 'Ini keterangan vcd 003', 30, '999.99'),
('VCD004', 'Test004', 'Drama', 'VCD004', 50, '200.00'),
('VCD005', 'Ini judul VCD 005', 'Spionase', 'Spionase', 50, '999.99'),
('VCD006', 'Mentari Pagi', 'Action', 'Keterangan VCD 006', 60, '999.99'),
('VCD007', 'Meencari judul', 'Drama', 'Judulnya belum ada', 70, '999.99'),
('VCD454', 'Mentari', 'Drama', 'BAgus', 8, '999.99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`idPelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `data_peminjaman`
--
ALTER TABLE `data_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_vcd`
--
ALTER TABLE `data_vcd`
  ADD PRIMARY KEY (`idVcd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_peminjaman`
--
ALTER TABLE `data_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
