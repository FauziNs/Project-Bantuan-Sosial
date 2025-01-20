-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 12:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bansos`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayarzakat`
--

CREATE TABLE `bayarzakat` (
  `idzakat` int(11) NOT NULL,
  `idmuzakki` int(11) NOT NULL,
  `tglbayar` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis_bayar` varchar(20) NOT NULL,
  `jml_tanggungandibayar` int(11) NOT NULL,
  `bayarberas` int(11) NOT NULL,
  `bayaruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayarzakat`
--

INSERT INTO `bayarzakat` (`idzakat`, `idmuzakki`, `tglbayar`, `jenis_bayar`, `jml_tanggungandibayar`, `bayarberas`, `bayaruang`) VALUES
(33, 2022028, '2022-05-26 08:11:41', 'Uang', 2, 0, 2000),
(34, 2022029, '2022-05-26 08:13:36', 'Beras', 2, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_mustahik`
--

CREATE TABLE `kategori_mustahik` (
  `idkategori` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL,
  `jumlah_hak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_mustahik`
--

INSERT INTO `kategori_mustahik` (`idkategori`, `nama_kategori`, `jumlah_hak`) VALUES
(10007, 'Mualaf', 3),
(10008, 'Fisabilillah', 3),
(10009, 'algharin', 3),
(10010, 'Dzur riqab', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_warga`
--

CREATE TABLE `kategori_warga` (
  `idktwarga` int(11) NOT NULL,
  `namaktmst` varchar(11) NOT NULL,
  `jmlhak_ktmst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_warga`
--

INSERT INTO `kategori_warga` (`idktwarga`, `namaktmst`, `jmlhak_ktmst`) VALUES
(4, 'miskin', 3),
(5, 'fakir', 2),
(6, 'mampu', 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`idlogin`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'user', '123');

-- --------------------------------------------------------

--
-- Table structure for table `mustahik_lainnya`
--

CREATE TABLE `mustahik_lainnya` (
  `idmustahiklainnya` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `tglah` timestamp NOT NULL DEFAULT current_timestamp(),
  `namamt` varchar(20) NOT NULL,
  `kategorimt` varchar(20) NOT NULL,
  `hakmt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mustahik_lainnya`
--

INSERT INTO `mustahik_lainnya` (`idmustahiklainnya`, `idkategori`, `tglah`, `namamt`, `kategorimt`, `hakmt`) VALUES
(5, 10007, '2022-05-26 10:25:54', 'althaf', 'Mualaf', 3),
(6, 10008, '2022-05-26 10:26:05', 'iki', 'Fisabilillah', 3),
(7, 10010, '2022-05-26 10:26:13', 'ici', 'Dzur riqab', 3),
(8, 10009, '2022-05-26 10:26:22', 'fikri', 'algharin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mustahik_warga`
--

CREATE TABLE `mustahik_warga` (
  `idmustahikwarga` int(11) NOT NULL,
  `idktwarga` int(11) NOT NULL,
  `idmuzakki` int(11) NOT NULL,
  `tgl_dstwarga` timestamp NOT NULL DEFAULT current_timestamp(),
  `namawarga` varchar(20) NOT NULL,
  `kategoriwarga` varchar(20) NOT NULL,
  `hakwarga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mustahik_warga`
--

INSERT INTO `mustahik_warga` (`idmustahikwarga`, `idktwarga`, `idmuzakki`, `tgl_dstwarga`, `namawarga`, `kategoriwarga`, `hakwarga`) VALUES
(4, 4, 2022030, '2022-05-26 09:43:50', 'fikri', 'miskin', 3),
(5, 5, 2022031, '2022-05-26 09:44:00', 'bisri', 'fakir', 2),
(6, 6, 2022030, '2022-05-26 09:44:26', 'fikri', 'mampu', 4);

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `idmuzakki` int(11) NOT NULL,
  `namamuzakki` varchar(35) NOT NULL,
  `jmltanggungan` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`idmuzakki`, `namamuzakki`, `jmltanggungan`, `keterangan`) VALUES
(2022028, 'althaf', 2, 'warga tetap'),
(2022029, 'asep', 2, 'WNA'),
(2022030, 'fikri', 6, 'warga'),
(2022031, 'bisri', 1, 'warga');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayarzakat`
--
ALTER TABLE `bayarzakat`
  ADD PRIMARY KEY (`idzakat`);

--
-- Indexes for table `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `kategori_warga`
--
ALTER TABLE `kategori_warga`
  ADD PRIMARY KEY (`idktwarga`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idlogin`);

--
-- Indexes for table `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  ADD PRIMARY KEY (`idmustahiklainnya`);

--
-- Indexes for table `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  ADD PRIMARY KEY (`idmustahikwarga`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`idmuzakki`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayarzakat`
--
ALTER TABLE `bayarzakat`
  MODIFY `idzakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;

--
-- AUTO_INCREMENT for table `kategori_warga`
--
ALTER TABLE `kategori_warga`
  MODIFY `idktwarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  MODIFY `idmustahiklainnya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  MODIFY `idmustahikwarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `muzakki`
--
ALTER TABLE `muzakki`
  MODIFY `idmuzakki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022032;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
