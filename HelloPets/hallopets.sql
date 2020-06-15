-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 05:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hallopets`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` char(6) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` text DEFAULT NULL,
  `pict` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `alamat`, `telp`, `pict`) VALUES
('ADM000', 'Robin batman', 'admin@admin.com', 'Jl.Admin ngademin', '082213653701', 'kindpng_3681035.png');

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id` varchar(10) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nominal` int(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_donasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id`, `id_user`, `nama`, `nominal`, `deskripsi`, `tgl_donasi`) VALUES
('DNS1365135', 'USR000', 'Theria Sabrina', 20000, 'Buat Makan', '2020-05-14'),
('DNS2621785', 'USR000', 'Theria Sabrina', 100000, 'Buat jajan', '2020-05-12'),
('DNS3707521', 'USR000', 'Theria Sabrina', 98500, 'Test', '2020-05-14'),
('DNS7838257', 'USR000', 'Theria Sabrina', 40000, 'Buat hewan', '2020-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE `login_credentials` (
  `id` char(6) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`id`, `email`, `password`, `level`) VALUES
('ADM000', 'admin@admin.com', 'admin123', 'admin'),
('USR000', 'user@user.com', 'user123', 'user'),
('USR324', 'robyyua@gmail.com', 'ishtar123', 'user'),
('USR554', 'luna@mail.com', 'luna123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `postadopt`
--

CREATE TABLE `postadopt` (
  `idAdopt` varchar(10) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `namaUser` varchar(100) NOT NULL,
  `namaHewan` varchar(35) NOT NULL,
  `jenisHewan` text NOT NULL,
  `umurHewan` text NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telp` text NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `medicalDesc` text NOT NULL,
  `pict` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `adoptedBy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `postcomment`
--

CREATE TABLE `postcomment` (
  `idComment` varchar(10) NOT NULL,
  `idPost` varchar(10) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `ket` text NOT NULL,
  `pict` text NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `postlost`
--

CREATE TABLE `postlost` (
  `idPost` varchar(10) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `namaUser` varchar(100) NOT NULL,
  `namaHewan` varchar(35) NOT NULL,
  `jenisHewan` text NOT NULL,
  `gender` text NOT NULL,
  `mail` text NOT NULL,
  `telp` text NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `pict` text NOT NULL,
  `status` text NOT NULL,
  `tglPost` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requestadopt`
--

CREATE TABLE `requestadopt` (
  `id` varchar(10) NOT NULL,
  `idAdopt` varchar(10) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `status` text NOT NULL,
  `pengetahuanHewan` text NOT NULL,
  `alasan` text NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` char(6) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` text DEFAULT NULL,
  `pict` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `alamat`, `telp`, `pict`) VALUES
('USR000', 'Theria Sabrina', 'user@user.com', 'JL.User user', '082213655501', '7238b5d8-4fb9-4db2-9f3f-cc46f7ae5d49-removebg-preview.png'),
('USR324', 'Roby Cahyadi Umar', 'robyyua@gmail.com', 'Jl.Kayubesar', '082213653701', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postadopt`
--
ALTER TABLE `postadopt`
  ADD PRIMARY KEY (`idAdopt`);

--
-- Indexes for table `postcomment`
--
ALTER TABLE `postcomment`
  ADD PRIMARY KEY (`idComment`);

--
-- Indexes for table `postlost`
--
ALTER TABLE `postlost`
  ADD PRIMARY KEY (`idPost`);

--
-- Indexes for table `requestadopt`
--
ALTER TABLE `requestadopt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
