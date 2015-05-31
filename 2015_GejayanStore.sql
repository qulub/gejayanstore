-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2015 at 07:13 PM
-- Server version: 5.6.24-0ubuntu2
-- PHP Version: 5.6.4-4ubuntu6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2015_GejayanStore`
--
CREATE DATABASE IF NOT EXISTS `2015_GejayanStore` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `2015_GejayanStore`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`idAdmin` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `telp` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `email`, `userName`, `password`, `telp`, `alamat`) VALUES
(1, 'iam@yussan.me', 'yussan', 'ac43724f16e9241d990427ab7c8f4228', '085645777298', 'Jimbe, Jenangan, Ponorogo, Jawa Timur\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `Diskusi`
--

CREATE TABLE IF NOT EXISTS `Diskusi` (
`idDiskusi` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `JudulDiskusi` varchar(300) NOT NULL,
  `idPelanggan` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diskusiKonten`
--

CREATE TABLE IF NOT EXISTS `diskusiKonten` (
  `idDiskusi` int(11) NOT NULL,
  `konten` varchar(500) NOT NULL,
  `waktu` datetime NOT NULL,
  `type` enum('tanya','jawab') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
`idGambar` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`idGambar`, `idItem`, `gambar`) VALUES
(1, 1, 'jewerly1.jpg'),
(2, 1, 'jewerly2.jpg'),
(3, 1, 'jewerly3.jpg'),
(38, 32, 'a2da17f1035c76e304a68fe92a5594d6.jpg'),
(39, 32, '29384055489658a7b99a90a7307cd00f.jpg'),
(40, 32, '88de42918aa529bc135429e5bfab1f3d.jpg'),
(41, 33, '984b7f4afae7ca5df2c7673d36dd1b06.jpg'),
(42, 33, 'c1d5b9891611c144ea8b73cc35feae71.jpg'),
(44, 34, '4a3df32e5bf18c94cabe7dcf6f2b01fa.jpg'),
(45, 34, 'd3168ef5e2cd6f1eeea2e4faef7f96c4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`idItem` int(11) NOT NULL,
  `tglPost` datetime NOT NULL,
  `tglEdit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `habisPromo` datetime NOT NULL,
  `Judul` varchar(200) NOT NULL,
  `Deskripsi` varchar(500) NOT NULL,
  `idToko` int(11) NOT NULL,
  `idSubKategori` int(11) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `diskon` float NOT NULL,
  `views` int(11) NOT NULL,
  `status` enum('aktif','banned') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`idItem`, `tglPost`, `tglEdit`, `habisPromo`, `Judul`, `Deskripsi`, `idToko`, `idSubKategori`, `harga`, `diskon`, `views`, `status`) VALUES
(1, '2015-04-14 03:29:00', '2015-05-17 16:26:05', '2015-05-20 00:00:00', 'Berlian Safir Merak Perak', 'Berlian Safir Merak Perak yang pernah digunakan oleh artis Hollywood Bellian Morgan', 1, 5, 24000000, 0.5, 276, 'aktif'),
(32, '2015-05-23 19:42:45', '2015-05-24 16:57:06', '2015-05-24 00:00:00', 'Jilbab Elzata Beli 3 warna gratis 3 warna', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu eros a felis sollicitudin porttitor. Sed aliquam arcu dui, placerat pellentesque leo malesuada in. Aenean aliquam velit erat, at rutrum felis varius a. Vivamus at molestie mauris. Integer ac hendrerit velit. \r\nPraesent sit amet justo varius lectus venenatis scelerisque ac vitae diam. Suspendisse quam tellus, consequat sollicitudin felis in, laoreet accumsan dolor. In laoreet augue in erat sodales lacinia. ', 1, 3, 230000, 13, 35, 'aktif'),
(33, '2015-05-24 09:02:20', '2015-05-24 17:21:34', '2015-05-28 00:00:00', 'Jilbab warna murah di elzata', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec accumsan augue massa, et tristique lorem venenatis non. Proin ultrices tellus quam, id suscipit odio sodales id. Curabitur vitae diam a tellus fringilla ultricies vel sed nisl. Aenean commodo, turpis eget porttitor vulputate, lacus massa rhoncus dolor, id suscipit nisi odio vel enim. \r\nFusce egestas interdum justo, vitae euismod lacus rutrum nec. Mauris semper maximus lectus, nec tempor risus semper in. Pellentesque sed dui quam. Ves', 1, 3, 340000, 20, 11, 'aktif'),
(34, '2015-05-24 12:09:43', '2015-05-24 15:39:32', '2015-06-30 00:00:00', 'Piyama Imut Ala Gigi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec accumsan augue massa, et tristique lorem venenatis non. Proin ultrices tellus quam, id suscipit odio sodales id. Curabitur vitae diam a tellus fringilla ultricies vel sed nisl. Aenean commodo, turpis eget porttitor vulputate, lacus massa rhoncus dolor, id suscipit nisi odio vel enim. \r\nFusce egestas interdum justo, vitae euismod lacus rutrum nec. Mauris semper maximus lectus, nec tempor risus semper in. Pellentesque sed dui quam. Ves', 1, 3, 145000, 4, 14, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriItem`
--

CREATE TABLE IF NOT EXISTS `kategoriItem` (
`idKategoriItem` int(11) NOT NULL,
  `namaKategori` varchar(100) NOT NULL,
  `deskripsiKategori` varchar(400) NOT NULL,
  `jenis` enum('barang','jasa') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoriItem`
--

INSERT INTO `kategoriItem` (`idKategoriItem`, `namaKategori`, `deskripsiKategori`, `jenis`) VALUES
(1, 'fashion', 'berbagai macam barang fashion untuk wanita maupun pria', 'barang'),
(2, 'rumah tangga', 'berbagai macam barang kebutuhan rumah tanggal bisa ditemukan dikategori ini', 'barang'),
(5, 'elektronik dan gadget', 'elektronik dan gadget', 'barang'),
(6, 'makanan dan minumal', 'hem makanan dan minuman pasti lezat', 'barang');

--
-- Triggers `kategoriItem`
--
DELIMITER //
CREATE TRIGGER `insert_sub_after_insert` AFTER INSERT ON `kategoriItem`
 FOR EACH ROW INSERT INTO SubKategoriItem(idKategoriItem,namaSubKategori) VALUES(NEW.idKategoriItem,CONCAT('semua ',NEW.namaKategori))
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategoriUsaha`
--

CREATE TABLE IF NOT EXISTS `kategoriUsaha` (
`idkategoriUsaha` int(11) NOT NULL,
  `namaKategoriUsaha` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoriUsaha`
--

INSERT INTO `kategoriUsaha` (`idkategoriUsaha`, `namaKategoriUsaha`) VALUES
(1, 'toko'),
(2, 'tempat makan minum'),
(3, 'kafe'),
(4, 'salon kecantikan'),
(5, 'bengkel kendaraan');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasiPembayaran`
--

CREATE TABLE IF NOT EXISTS `konfirmasiPembayaran` (
  `idkonfirmasiPembayaran` int(11) NOT NULL,
  `idTransaksi` varchar(20) DEFAULT NULL,
  `tglKonfirmasi` datetime DEFAULT NULL,
  `tujuanBank` varchar(45) DEFAULT NULL,
  `dariBank` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `noRekening` varchar(45) DEFAULT NULL,
  `jumlahTransfer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`idPelanggan` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemilikToko`
--

CREATE TABLE IF NOT EXISTS `pemilikToko` (
`idPemilik` int(11) NOT NULL,
  `tglRegister` datetime NOT NULL,
  `lastLogin` varchar(45) DEFAULT NULL,
  `namaPemilik` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `password` text,
  `idcard` varchar(45) DEFAULT NULL,
  `status` enum('active','banned','menunggu') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilikToko`
--

INSERT INTO `pemilikToko` (`idPemilik`, `tglRegister`, `lastLogin`, `namaPemilik`, `telp`, `email`, `alamat`, `userName`, `password`, `idcard`, `status`) VALUES
(1, '2015-05-01 05:22:35', '15-05-28 22:43:37', 'Yusuf Akhsan Hidayati', '085645777298', 'yusuf@kompetisiindonesia.com', 'Jl Lele 1 Sleman Yogyakarta', 'yussan', 'ac43724f16e9241d990427ab7c8f4228', NULL, 'active'),
(11, '2015-05-29 21:24:33', '15-05-31 16:42:39', 'Yusuf Akhsan Hidayat', '0812345678', 'yusuftwenty@gmail.com', 'Jalan Lele 1 Maguwoharjo, Depok, Sleman', 'yusuf', 'ac43724f16e9241d990427ab7c8f4228', 'a649a15faf59713a7992af3a45cd6895.png', 'active'),
(12, '2015-05-30 23:31:24', '2015-05-30 23:31:24', 'Alvin Indra Cahya', '0812345', 'alvin.i@students.amikom.ac.id', 'Yogyakarta', 'alvin', '4f89858774e2187568d02e0541dee1b5', '4c52f98dd792fc2912bd81b171e7dcc1.png', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `SubKategoriItem`
--

CREATE TABLE IF NOT EXISTS `SubKategoriItem` (
`idSubKategori` int(11) NOT NULL,
  `idKategoriItem` int(11) NOT NULL,
  `namaSubKategori` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SubKategoriItem`
--

INSERT INTO `SubKategoriItem` (`idSubKategori`, `idKategoriItem`, `namaSubKategori`) VALUES
(1, 1, 'semua fashion'),
(2, 1, 'kosmetik'),
(3, 1, 'pakaian'),
(4, 2, 'semua perlengkapan rumah tangga'),
(5, 1, 'perhiasan'),
(8, 5, 'semua elektronik dan gadget'),
(9, 6, 'semua hem makanan dan minuman pasti lezat');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE IF NOT EXISTS `toko` (
`idToko` int(11) NOT NULL,
  `idPemilik` int(11) NOT NULL,
  `habisMasa` datetime NOT NULL,
  `namaToko` varchar(100) NOT NULL,
  `alamatToko` varchar(500) NOT NULL,
  `koordinat` varchar(500) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `jamBuka` time NOT NULL,
  `jamTutup` time NOT NULL,
  `telp` varchar(15) NOT NULL,
  `emailToko` varchar(100) NOT NULL,
  `tentangToko` text NOT NULL,
  `updateData` datetime NOT NULL,
  `libur` varchar(45) DEFAULT NULL,
  `maxPromo` varchar(45) NOT NULL DEFAULT '',
  `kategoriUsaha` int(11) DEFAULT NULL,
  `tdp` varchar(45) DEFAULT NULL,
  `siup` varchar(45) DEFAULT NULL,
  `sig` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`idToko`, `idPemilik`, `habisMasa`, `namaToko`, `alamatToko`, `koordinat`, `avatar`, `jamBuka`, `jamTutup`, `telp`, `emailToko`, `tentangToko`, `updateData`, `libur`, `maxPromo`, `kategoriUsaha`, `tdp`, `siup`, `sig`) VALUES
(1, 1, '2015-05-25 00:00:00', 'Yussan Luxury', 'Jl Gejayan 23A', '', 'e2303f01e58736c6c54a1f34727a93d1.jpg', '08:00:00', '22:00:00', '085645777298', 'ma@max.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of\r\n\r\nletters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. \r\n\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2015-04-12 00:00:00', 'minggu', '5', 1, NULL, NULL, NULL),
(6, 11, '0000-00-00 00:00:00', 'Usaha Yussan', 'Jl. Gejayan No 20 , Kabuaten Sleman, Daerah Istimewa Yogyakarta', '', '0b9561f711c444bc7428f3be9cb08385.png', '09:00:00', '22:00:00', '08123456', 'usaha@yussan.me', 'Deskripsi singkat toko yussan.', '2015-05-29 21:24:33', 'minggu', '0', 1, 'e5166320154850cd9fe6d838f8de4934.jpg', 'd0131909ccedcb0a98ca8f3085b5c9d0.jpg', 'af56dd6e22147ad220097cf800ec960f.jpg'),
(7, 12, '0000-00-00 00:00:00', 'Usaha Alvin', 'Jl. Gejayan No 3 , Kabuaten Sleman, Daerah Istimewa Yogyakarta', '', 'bba2fc2a883dc05d4e9055bba5bfdf67.png', '08:00:00', '09:00:00', '081234', 'alvin@gmail.com', 'biar makin cantik', '2015-05-30 23:31:24', 'Minggu', '0', 4, '4aba10658769a04f84193a4e0044081d.png', '832fba05a5a01f8e524b42c3f2ec1ffe.png', '94d3ed4802fda1bb67065420a810a795.png<br/>');

-- --------------------------------------------------------

--
-- Table structure for table `tokoFavorite`
--

CREATE TABLE IF NOT EXISTS `tokoFavorite` (
  `idPelanggan` int(11) NOT NULL,
  `idToko` int(11) NOT NULL,
  `rating` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `idTransaksi` varchar(20) NOT NULL COMMENT 'id konfirmaasi = \nyymmddhhiiss-id',
  `idPemilik` int(11) NOT NULL,
  `tglTransaksi` varchar(45) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `tambahSlot` int(11) DEFAULT NULL,
  `tambahMasa` int(11) DEFAULT NULL,
  `status` enum('menunggu','diproses','lunas','tidak ditemukan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `idPemilik`, `tglTransaksi`, `biaya`, `tambahSlot`, `tambahMasa`, `status`) VALUES
('150519131527-1', 1, '2015-05-19 13:16:32', 50000, NULL, NULL, 'menunggu'),
('150531171607-11', 11, '2015-05-31 17:16:07', 160000, 3, 1, 'menunggu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`idAdmin`), ADD UNIQUE KEY `email` (`email`,`userName`);

--
-- Indexes for table `Diskusi`
--
ALTER TABLE `Diskusi`
 ADD PRIMARY KEY (`idDiskusi`), ADD KEY `idBarang` (`idItem`,`idPelanggan`), ADD KEY `idPelanggan` (`idPelanggan`);

--
-- Indexes for table `diskusiKonten`
--
ALTER TABLE `diskusiKonten`
 ADD KEY `idDiskusi` (`idDiskusi`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
 ADD PRIMARY KEY (`idGambar`), ADD KEY `idBarang` (`idItem`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`idItem`), ADD KEY `idToko` (`idToko`,`idSubKategori`), ADD KEY `idSubKategori` (`idSubKategori`);

--
-- Indexes for table `kategoriItem`
--
ALTER TABLE `kategoriItem`
 ADD PRIMARY KEY (`idKategoriItem`);

--
-- Indexes for table `kategoriUsaha`
--
ALTER TABLE `kategoriUsaha`
 ADD PRIMARY KEY (`idkategoriUsaha`);

--
-- Indexes for table `konfirmasiPembayaran`
--
ALTER TABLE `konfirmasiPembayaran`
 ADD PRIMARY KEY (`idkonfirmasiPembayaran`), ADD KEY `fk_konfirmasiPembayaran_transaksi_idx` (`idTransaksi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`idPelanggan`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pemilikToko`
--
ALTER TABLE `pemilikToko`
 ADD PRIMARY KEY (`idPemilik`), ADD UNIQUE KEY `email` (`email`,`userName`);

--
-- Indexes for table `SubKategoriItem`
--
ALTER TABLE `SubKategoriItem`
 ADD PRIMARY KEY (`idSubKategori`), ADD KEY `idKategori` (`idKategoriItem`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
 ADD PRIMARY KEY (`idToko`), ADD UNIQUE KEY `namaToko` (`namaToko`), ADD KEY `idPemilik` (`idPemilik`), ADD KEY `fk_toko_1_idx` (`kategoriUsaha`);

--
-- Indexes for table `tokoFavorite`
--
ALTER TABLE `tokoFavorite`
 ADD KEY `idToko` (`idToko`), ADD KEY `idPelanggan` (`idPelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`idTransaksi`), ADD KEY `fk_KonfirmasiPembayaran_1_idx` (`idPemilik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Diskusi`
--
ALTER TABLE `Diskusi`
MODIFY `idDiskusi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
MODIFY `idGambar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `idItem` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `kategoriItem`
--
ALTER TABLE `kategoriItem`
MODIFY `idKategoriItem` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kategoriUsaha`
--
ALTER TABLE `kategoriUsaha`
MODIFY `idkategoriUsaha` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `idPelanggan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pemilikToko`
--
ALTER TABLE `pemilikToko`
MODIFY `idPemilik` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `SubKategoriItem`
--
ALTER TABLE `SubKategoriItem`
MODIFY `idSubKategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
MODIFY `idToko` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Diskusi`
--
ALTER TABLE `Diskusi`
ADD CONSTRAINT `Diskusi_ibfk_1` FOREIGN KEY (`idItem`) REFERENCES `item` (`idItem`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `Diskusi_ibfk_2` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diskusiKonten`
--
ALTER TABLE `diskusiKonten`
ADD CONSTRAINT `diskusiKonten_ibfk_1` FOREIGN KEY (`idDiskusi`) REFERENCES `Diskusi` (`idDiskusi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`idItem`) REFERENCES `item` (`idItem`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`idToko`) REFERENCES `toko` (`idToko`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`idSubKategori`) REFERENCES `SubKategoriItem` (`idSubKategori`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `konfirmasiPembayaran`
--
ALTER TABLE `konfirmasiPembayaran`
ADD CONSTRAINT `fk_konfirmasiPembayaran_transaksi` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`idTransaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SubKategoriItem`
--
ALTER TABLE `SubKategoriItem`
ADD CONSTRAINT `SubKategoriItem_ibfk_1` FOREIGN KEY (`idKategoriItem`) REFERENCES `kategoriItem` (`idKategoriItem`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `toko`
--
ALTER TABLE `toko`
ADD CONSTRAINT `fk_kategoriUsaha` FOREIGN KEY (`kategoriUsaha`) REFERENCES `kategoriUsaha` (`idkategoriUsaha`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `toko_ibfk_2` FOREIGN KEY (`idPemilik`) REFERENCES `pemilikToko` (`idPemilik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tokoFavorite`
--
ALTER TABLE `tokoFavorite`
ADD CONSTRAINT `tokoFavorite_ibfk_1` FOREIGN KEY (`idToko`) REFERENCES `toko` (`idToko`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tokoFavorite_ibfk_2` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
ADD CONSTRAINT `fk_KonfirmasiPembayaran_pemilik` FOREIGN KEY (`idPemilik`) REFERENCES `pemilikToko` (`idPemilik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
