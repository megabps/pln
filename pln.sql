-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jan 2018 pada 07.16
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pln`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'pompa'),
(5, 'komputer'),
(6, 'kabel'),
(7, 'elektronik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE `material` (
  `no_sap` varchar(20) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `satuan` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `material`
--

INSERT INTO `material` (`no_sap`, `nama_barang`, `satuan`, `stock`, `lokasi`, `gambar`, `id_kategori`) VALUES
('0909', 'kabel tie', 'meter', 123, 'pekanbaru', 'Logo - DBC.png', 6),
('111', 'Hue Hue Hue', 'aaa', 12, 'aaa', 'Chrysanthemum.jpg', 7),
('112', 'assaw', 'unit', 12, 'pekanbaru', '96d625cb639f8f770ca39ed0b5b47931.jpg', 4),
('1123311', 'kabel 1', 'unit', 12, 'riau', 'doodle.jpg', 6),
('12321', 'qwert', 'unit', 21, 'pekanbaru', 'background ppt.png.jpg', 5),
('2222', 'aasws', 'aasdsad', 121, 'dsdcscjnkj', 'Koala.jpg', 7),
('33', 'hhh', 'hhhh', 45, 'hhhhh', 'Koala.jpg', 7),
('3333', 'adsdaj', 'njnkn;', 12, 'sjdfnsk', 'Desert.jpg', 4),
('342342', 'wewerew', 'eee', 44, 'eee', 'Lighthouse.jpg', 6),
('444', 'ikdnjdf', 'dkjkjb', 23, 'sdfnsk;fa', 'Hydrangeas.jpg', 4),
('45435', 'DIUBAH', 'bbb', 12, 'bbb', 'Chrysanthemum.jpg', 6),
('534', 'dfdfb', 'dddd', 32, 'ddd', 'Jellyfish.jpg', 5),
('555', 'jhkjshlkj', 'kjhjhakjhfakldh', 23, 'jdsfkdf', 'Tulips.jpg', 7),
('565', 'DIUBAH', 'ccc', 34, 'ccc', 'Lighthouse.jpg', 5),
('666', 'sdfdsf', 'gggg', 66, 'gggg', 'Tulips.jpg', 5),
('6666', 'sdfsfafvuv', 'hbhiabfjkslf', 32, 'abdfasu', 'Penguins.jpg', 4),
('666665', 'fdsfdsfsd', 'ssds', 12, 'fjjjghjgj', 'Penguins.jpg', 5),
('988798', 'jgh', 'hudhfsildfhlui', 12, 'ushfuslhf', 'Koala.jpg', 5),
('9999', 'UBAH', 'aaa', 32, 'aaaa', 'Tulips.jpg', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modal`
--

CREATE TABLE `modal` (
  `modal_id` int(11) NOT NULL,
  `modal_name` varchar(255) DEFAULT NULL,
  `description` text,
  `date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `modal`
--

INSERT INTO `modal` (`modal_id`, `modal_name`, `description`, `date`, `foto`) VALUES
(118, 'photoshop', 'app', NULL, ''),
(119, 'http://twitter.com', 'web', NULL, ''),
(120, 'http://www.google.com', 'appppp', NULL, ''),
(121, 'http://www.facebook.com', 'web', NULL, ''),
(122, 'test', 'asdasdkjanjk', '2017-03-09 02:12:19', '2.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `nama`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'ari', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`no_sap`);

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`modal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `modal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
