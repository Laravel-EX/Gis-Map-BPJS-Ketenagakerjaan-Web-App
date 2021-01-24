-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2017 at 11:53 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `gis_map`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_perusahaan`
--

CREATE TABLE IF NOT EXISTS `data_perusahaan` (
  `id_perusahaan` int(10) NOT NULL AUTO_INCREMENT,
  `id_kantor` int(10) NOT NULL,
  `id_pembina` int(10) NOT NULL,
  `x` varchar(100) NOT NULL,
  `y` varchar(100) NOT NULL,
  `npp` varchar(100) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jlh_aktif` varchar(10) NOT NULL,
  `status_peserta` varchar(100) NOT NULL,
  `potensi` varchar(10) NOT NULL,
  `foto` text NOT NULL,
  `laporan` text NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `data_perusahaan`
--

INSERT INTO `data_perusahaan` (`id_perusahaan`, `id_kantor`, `id_pembina`, `x`, `y`, `npp`, `divisi`, `nama_perusahaan`, `alamat`, `jlh_aktif`, `status_peserta`, `potensi`, `foto`, `laporan`, `keterangan`, `tgl_masuk`) VALUES
(14, 1, 1, '3.5903489433090163', '98.66541266441345', '2', '2', 'PT. PERKASA INDAH', 'Jl. Rotan Proyek, Petisah Tengah, Medan Petisah, Kota Medan, Sumatera Utara 20111, Indonesia', '3', 'peserta', '', '', '', '', '0000-00-00'),
(13, 1, 1, '3.5916767068744915', '98.66052567958832', '1', '1', 'PT.DHANI', 'Lorong Saidi, Sei Putih Tim. II, Medan Petisah, Kota Medan, Sumatera Utara 20111, Indonesia', 'jumlah', 'centralisasi', '', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kantor`
--

CREATE TABLE IF NOT EXISTS `kantor` (
  `id_kantor` int(10) NOT NULL AUTO_INCREMENT,
  `kode_kantor` varchar(100) NOT NULL,
  `nama_kantor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kantor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kantor`
--

INSERT INTO `kantor` (`id_kantor`, `kode_kantor`, `nama_kantor`) VALUES
(1, 'K001', 'kanwil 1');

-- --------------------------------------------------------

--
-- Table structure for table `kordinat_gis`
--

CREATE TABLE IF NOT EXISTS `kordinat_gis` (
  `nomor` int(5) NOT NULL AUTO_INCREMENT,
  `x` decimal(8,5) NOT NULL,
  `y` decimal(8,5) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `status_peserta` varchar(100) NOT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `kordinat_gis`
--

INSERT INTO `kordinat_gis` (`nomor`, `x`, `y`, `nama_perusahaan`, `alamat`, `status_peserta`) VALUES
(7, '3.58709', '98.67190', 'PT.ABC', 'qwdwqd', 'peserta'),
(8, '3.58572', '98.67396', 'PT.ACD', 'ghfghf', 'peserta'),
(9, '3.57082', '98.66777', 'PT.QWERTY', 'kede', 'peserta'),
(10, '3.56842', '98.65241', 'CV.ABD', 'wqdwqd', 'nonpeserta'),
(11, '3.56769', '98.64866', 'Koperasi 1', 'wqdwqd', 'peserta'),
(12, '3.59343', '98.66984', 'CV.NBVC', 'Jl. Pepaya No.2b, Silalas, Medan Bar., Kota Medan, Sumatera Utara 20236, Indonesia', 'nonpeserta'),
(13, '3.59129', '98.66341', 'PT.Media Nusantara', 'Jl. Jend Gatot Subroto No.26a, Sekip, Medan Petisah, Kota Medan, Sumatera Utara 20113, Indonesia', 'peserta'),
(14, '3.58440', '98.65843', 'PT.Unilever', 'Jl. Sei Batang Serangan No.105, Sei Sikambing D, Medan Petisah, Kota Medan, Sumatera Utara 20114, Indonesia', 'peserta'),
(15, '3.59510', '98.66448', 'HIO', 'Jl. Meranti No.12a, Sekip, Medan Petisah, Kota Medan, Sumatera Utara 20111, Indonesia', 'peserta');

-- --------------------------------------------------------

--
-- Table structure for table `pembina`
--

CREATE TABLE IF NOT EXISTS `pembina` (
  `id_pembina` int(10) NOT NULL AUTO_INCREMENT,
  `id_kantor` int(10) NOT NULL,
  `kode_pembina` varchar(100) NOT NULL,
  `nama_pembina` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pembina`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pembina`
--

INSERT INTO `pembina` (`id_pembina`, `id_kantor`, `kode_pembina`, `nama_pembina`) VALUES
(1, 1, '001', 'dhani');
