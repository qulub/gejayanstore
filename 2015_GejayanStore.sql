-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2015 at 08:15 PM
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
-- Table structure for table `balasanTiket`
--

CREATE TABLE IF NOT EXISTS `balasanTiket` (
`idbalasanTiket` int(11) NOT NULL,
  `idTiket` int(11) DEFAULT NULL,
  `isiBalasanTiket` text,
  `dibacaBalasan` enum('0','1') DEFAULT NULL,
  `tglBalasanTiketPost` datetime DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  `idPemilik` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balasanTiket`
--

INSERT INTO `balasanTiket` (`idbalasanTiket`, `idTiket`, `isiBalasanTiket`, `dibacaBalasan`, `tglBalasanTiketPost`, `idAdmin`, `idPemilik`) VALUES
(1, 1, 'saat ini fasilitas hapus belum tersedia, tapi kami bisa banned akun anda agar tidak dibaca oleh pengguna lain.', '0', '2015-05-09 11:03:22', 1, NULL),
(2, 2, 'belum bisa mas karena akan jadi member untuk selama-lamnya.', '0', '2015-06-09 11:03:22', 1, NULL),
(3, 1, 'ya sudah lah', '0', '2015-06-09 14:00:00', NULL, 1),
(8, 1, 'its working\r\n', '', '2015-06-12 23:13:09', 1, NULL),
(9, 1, 'wajahmu ayu', '', '2015-06-12 23:31:50', NULL, NULL),
(10, 1, 'wajahmu ayu', '', '2015-06-12 23:32:09', NULL, NULL);

--
-- Triggers `balasanTiket`
--
DELIMITER //
CREATE TRIGGER `balasanTiket_AFTER_INSERT` AFTER INSERT ON `balasanTiket`
 FOR EACH ROW UPDATE tiket SET tiket.tglUpdateTiket = NOW() WHERE idtiket = NEW.idTiket
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
`idBerita` int(11) NOT NULL,
  `tglPostBerita` datetime DEFAULT NULL,
  `tglUpdateBerita` datetime DEFAULT NULL,
  `judulBerita` varchar(300) DEFAULT NULL,
  `berita` text,
  `idAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`idBerita`, `tglPostBerita`, `tglUpdateBerita`, `judulBerita`, `berita`, `idAdmin`) VALUES
(1, '2015-06-13 12:26:27', '2015-06-13 12:26:27', 'Tersedia Kategori Baru', 'Lorem ipsum semi dollor amit, hoya-hoya. Ma ma sudah tidak tahan pa, siap belanja ada diskon besar-besaran. Gairah belanja.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
`idGambar` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`idGambar`, `idItem`, `gambar`) VALUES
(41, 33, '984b7f4afae7ca5df2c7673d36dd1b06.jpg'),
(42, 33, 'c1d5b9891611c144ea8b73cc35feae71.jpg'),
(44, 34, '4a3df32e5bf18c94cabe7dcf6f2b01fa.jpg'),
(45, 34, 'd3168ef5e2cd6f1eeea2e4faef7f96c4.jpg'),
(46, 35, 'cae8fc618cf8ec42ae2503204587cdd6.jpg'),
(47, 35, '3f54c6d1742461fb9ec2c53f014d9034.jpg'),
(48, 35, '16e36bccd6c7a3acbef30e2498fcc25f.jpg'),
(49, 36, '09c87a5f0c309c566e57f5d7606ccde7.jpg'),
(50, 36, 'e34602cc96ac2e6ea67b6d624fddebf2.jpg'),
(51, 37, '56573983d2a1bac6cf0702b35f4fdcf8.jpg'),
(52, 37, '944bf3d7c9400085119aa6e4832ed35f.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`idItem`, `tglPost`, `tglEdit`, `habisPromo`, `Judul`, `Deskripsi`, `idToko`, `idSubKategori`, `harga`, `diskon`, `views`, `status`) VALUES
(33, '2015-05-24 09:02:20', '2015-05-24 17:21:34', '2015-05-28 00:00:00', 'Jilbab warna murah di elzata', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec accumsan augue massa, et tristique lorem venenatis non. Proin ultrices tellus quam, id suscipit odio sodales id. Curabitur vitae diam a tellus fringilla ultricies vel sed nisl. Aenean commodo, turpis eget porttitor vulputate, lacus massa rhoncus dolor, id suscipit nisi odio vel enim. \r\nFusce egestas interdum justo, vitae euismod lacus rutrum nec. Mauris semper maximus lectus, nec tempor risus semper in. Pellentesque sed dui quam. Ves', 1, 3, 340000, 20, 11, 'aktif'),
(34, '2015-05-24 12:09:43', '2015-06-09 10:35:46', '2015-06-30 00:00:00', 'Piyama Imut Ala Gigi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec accumsan augue massa, et tristique lorem venenatis non. Proin ultrices tellus quam, id suscipit odio sodales id. Curabitur vitae diam a tellus fringilla ultricies vel sed nisl. Aenean commodo, turpis eget porttitor vulputate, lacus massa rhoncus dolor, id suscipit nisi odio vel enim. \r\nFusce egestas interdum justo, vitae euismod lacus rutrum nec. Mauris semper maximus lectus, nec tempor risus semper in. Pellentesque sed dui quam. Ves', 1, 3, 145000, 4, 28, 'aktif'),
(35, '2015-06-05 21:15:50', '2015-06-05 17:03:42', '2015-06-09 00:00:00', 'qwerty`', 'loerem psumloerem psumloerem psumloerem psumloerem psumloerem psumloerem psumloerem psumloerem psumloerem psumloerem psumloerem psumloerem psumloerem psumloerem psumloerem psumloerem psum', 6, 2, 127000, 40, 1, 'aktif'),
(36, '2015-06-06 16:11:35', '2015-06-12 03:44:47', '2015-08-29 00:00:00', 'Potongan Harga Seragam Ala Cosplay Imut', 'mau bergaya ke Jepangan kaya para cosplayer, kini bisa kamu dapatkan dengan setengah harga saja', 1, 3, 278000, 50, 25, 'aktif'),
(37, '2015-06-06 17:37:19', '2015-06-07 16:32:54', '2015-06-30 00:00:00', 'Diskon Spesial Ramadhan Mac Book Air Segala Type', 'Berkah ramdhan memang selalu berlimpah, kini tidak perlu lagi kamu merogoh kocek cukup dalam untuk membeli Mac Book Air.\r\nDapatkan penawaran spesial ini hanya ditoko kami, dan miliki Mac Book Air segera,', 1, 8, 13000000, 20, 14, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE IF NOT EXISTS `katalog` (
`idkatalog` int(11) NOT NULL,
  `tglTambahKatalog` datetime DEFAULT NULL,
  `idToko` int(11) DEFAULT NULL,
  `katalog` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`idkatalog`, `tglTambahKatalog`, `idToko`, `katalog`) VALUES
(1, '2015-06-03 00:00:00', 1, 'berlian1.jpg'),
(2, '2015-06-03 21:22:41', 1, 'permata1.jpg'),
(7, '2015-06-12 10:21:00', 1, 'e36e18b95bb53e7d8ee6346b0ec31a55.jpg'),
(8, '2015-06-12 10:21:34', 1, '4619baa17a4798a0b49906c57f6a80b5.jpg'),
(10, '2015-06-12 10:25:59', 1, '0e5221b7a50a83f2be5383f4c5036eb7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriItem`
--

CREATE TABLE IF NOT EXISTS `kategoriItem` (
`idKategoriItem` int(11) NOT NULL,
  `namaKategori` varchar(100) NOT NULL,
  `deskripsiKategori` varchar(400) NOT NULL,
  `jenis` enum('barang','jasa') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoriItem`
--

INSERT INTO `kategoriItem` (`idKategoriItem`, `namaKategori`, `deskripsiKategori`, `jenis`) VALUES
(1, 'fashions', 'new desc of fashion', 'barang'),
(2, 'rumah tangga', 'berbagai macam barang kebutuhan rumah tanggal bisa ditemukan dikategori ini', 'barang'),
(5, 'elektronik dan gadget', 'elektronik dan gadget', 'barang'),
(6, 'makanan dan minumal', 'hem makanan dan minuman pasti lezat', 'barang'),
(7, 'Furniture', 'meja unik,lorem ipsum dolor si amet', 'barang');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoriUsaha`
--

INSERT INTO `kategoriUsaha` (`idkategoriUsaha`, `namaKategoriUsaha`) VALUES
(1, 'toko'),
(2, 'tempat makan minum'),
(3, 'kafe'),
(4, 'salon kecantikan'),
(5, 'bengkel kendaraan'),
(7, 'oleh-oleh');

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
  `jumlahTransfer` int(11) DEFAULT NULL,
  `balasan` varchar(300) DEFAULT NULL,
  `dilihatAdmin` enum('0','1') DEFAULT NULL,
  `dilihatUser` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasiPembayaran`
--

INSERT INTO `konfirmasiPembayaran` (`idkonfirmasiPembayaran`, `idTransaksi`, `tglKonfirmasi`, `tujuanBank`, `dariBank`, `nama`, `noRekening`, `jumlahTransfer`, `balasan`, `dilihatAdmin`, `dilihatUser`) VALUES
(1, '150531171607-11', '2015-06-01 05:49:34', 'Mandiri', 'Mandiri', 'Yusuf Akhsan Hidayat', '1234', 160000, NULL, NULL, NULL),
(2, '150601213023-11', '2015-06-01 21:38:04', 'Mandiri', 'mandiri', 'mudawil', '1111-08974398-9182', 200000, NULL, NULL, NULL),
(3, '150601224208-15', '2015-06-01 22:47:27', 'BCA', 'BCA', 'qulub', '111-9873-0998', 300000, NULL, NULL, NULL),
(4, '150605233225-11', '2015-06-06 01:33:48', 'BRI', 'BRI', 'seno', '12345677', 100000, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilikToko`
--

INSERT INTO `pemilikToko` (`idPemilik`, `tglRegister`, `lastLogin`, `namaPemilik`, `telp`, `email`, `alamat`, `userName`, `password`, `idcard`, `status`) VALUES
(1, '2015-05-01 05:22:35', '15-06-12 23:16:42', 'Yusuf Akhsan Hidayati', '085645777298', 'yusuf@kompetisiindonesia.com', 'Jl Lele 1 Sleman Yogyakarta', 'yussan', 'ac43724f16e9241d990427ab7c8f4228', NULL, 'active'),
(11, '2015-05-29 21:24:33', '15-06-10 08:36:52', 'Yusuf Akhsan Hidayat', '0812345678', 'yusuftwenty@gmail.com', 'Jalan Lele 1 Maguwoharjo, Depok, Sleman', 'yusuf', 'ac43724f16e9241d990427ab7c8f4228', 'a649a15faf59713a7992af3a45cd6895.png', 'active'),
(12, '2015-05-30 23:31:24', '2015-05-30 23:31:24', 'Alvin Indra Cahya', '0812345', 'alvin.i@students.amikom.ac.id', 'Yogyakarta', 'alvin', '4f89858774e2187568d02e0541dee1b5', '4c52f98dd792fc2912bd81b171e7dcc1.png', 'active'),
(15, '2015-06-01 22:27:00', '15-06-01 22:41:13', 'qulub', '081997946977', 'mudaw.qulub@gmail.com', 'jakarta', 'qulub', '1f1b49c0a9e8e356faa2e476edef5f7f', '4d5e556ac02e59a112b03126d2a59c3e.jpg', 'active'),
(16, '2015-06-05 21:46:02', '2015-06-05 21:46:02', 'Ahmad Sena', '09978747', 'mudaw.qulub@gmail.com', 'yogya', 'ahmad', 'dee426ff22255d6e0a34700dcd9c0874', 'df5e99b7e2ad125a5d9887484dd89f31.jpg', 'active'),
(19, '2015-06-10 20:39:02', '15-06-10 21:18:56', 'Siti arni', '081997946977', 'mudawil.q@students.amikom.ac.id', 'yogyarkarta', 'siti', 'e71a6f7da8871cf7736bf5468af33a8d', 'f833099a98fe25f73ed3cab8c9ac2e4f.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `SubKategoriItem`
--

CREATE TABLE IF NOT EXISTS `SubKategoriItem` (
`idSubKategori` int(11) NOT NULL,
  `idKategoriItem` int(11) NOT NULL,
  `namaSubKategori` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SubKategoriItem`
--

INSERT INTO `SubKategoriItem` (`idSubKategori`, `idKategoriItem`, `namaSubKategori`) VALUES
(1, 1, 'semua fashion'),
(2, 1, 'kosmetik'),
(3, 1, 'pakaian'),
(4, 2, 'semua perlengkapan rumah tangga'),
(5, 1, 'perhiasan'),
(8, 5, 'semua gadgets'),
(9, 6, 'semua hem makanan dan minuman pasti lezat'),
(10, 7, 'semua Furniture'),
(11, 7, 'meja'),
(12, 7, 'kursi'),
(13, 7, 'lemari');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
`idtiket` int(11) NOT NULL,
  `judulTiket` varchar(200) DEFAULT NULL,
  `isiTiket` text,
  `idPemilik` int(11) DEFAULT NULL,
  `dibaca` enum('0','1') DEFAULT NULL,
  `tglPostTiket` datetime DEFAULT NULL,
  `tglUpdateTiket` datetime DEFAULT NULL,
  `tipeTiket` enum('cs','biling','teknis') DEFAULT NULL,
  `statusTiket` enum('open','clossed') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`idtiket`, `judulTiket`, `isiTiket`, `idPemilik`, `dibaca`, `tglPostTiket`, `tglUpdateTiket`, `tipeTiket`, `statusTiket`) VALUES
(1, 'Apakah saya bisa memiliki 2 buah toko untuk satu akun', 'em ipsum semi dolor amet, oma ti samape balakula hajar kuit kutilmu bauk sekali. Tapi aku lega kentutmu lebih bau, untuk semua disini suka bau kentut.', 1, '0', '2015-06-09 08:54:05', '2015-06-12 23:32:09', 'cs', 'open'),
(2, 'Menghapus Akun', 'Saya ingin menghapus akun saya di GejayanStore, bagaimana caranya ?', 1, '0', '2015-06-09 10:58:01', '2015-06-09 17:08:23', 'cs', 'clossed');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`idToko`, `idPemilik`, `habisMasa`, `namaToko`, `alamatToko`, `koordinat`, `avatar`, `jamBuka`, `jamTutup`, `telp`, `emailToko`, `tentangToko`, `updateData`, `libur`, `maxPromo`, `kategoriUsaha`, `tdp`, `siup`, `sig`) VALUES
(1, 1, '2015-08-01 00:00:00', 'Yussan Luxury', 'Jl Gejayan 23A', '', '64433e93ec47e294077a3caf594e0615.jpg', '08:00:00', '22:00:00', '085645777298', 'ma@max.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of\r\n\r\nletters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. \r\n\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2015-04-12 00:00:00', 'minggu', '5', 1, NULL, NULL, NULL),
(6, 11, '2015-03-06 00:00:00', 'Usaha Yussan', 'Jl. Gejayan No 20 , Kabuaten Sleman, Daerah Istimewa Yogyakarta', '', '0b9561f711c444bc7428f3be9cb08385.png', '09:00:00', '22:00:00', '08123456', 'usaha@yussan.me', 'Deskripsi singkat toko yussan.', '2015-05-29 21:24:33', 'minggu', '12', 1, 'e5166320154850cd9fe6d838f8de4934.jpg', 'd0131909ccedcb0a98ca8f3085b5c9d0.jpg', 'af56dd6e22147ad220097cf800ec960f.jpg'),
(7, 12, '0000-00-00 00:00:00', 'Usaha Alvin', 'Jl. Gejayan No 3 , Kabuaten Sleman, Daerah Istimewa Yogyakarta', '', 'bba2fc2a883dc05d4e9055bba5bfdf67.png', '08:00:00', '09:00:00', '081234', 'alvin@gmail.com', 'biar makin cantik', '2015-05-30 23:31:24', 'Minggu', '0', 4, '4aba10658769a04f84193a4e0044081d.png', '832fba05a5a01f8e524b42c3f2ec1ffe.png', '94d3ed4802fda1bb67065420a810a795.png<br/>'),
(10, 15, '2015-08-01 00:00:00', 'grafika art', 'Jl. Gejayan No 3 , Kabuaten Sleman, Daerah Istimewa Yogyakarta', '', '7148ec5edb88b1fb43a5f5ac70af5d7d.jpg', '08:00:00', '21:00:00', '081997946977', 'mudaw.qulub@gmail.com', 'lorem ipsum dolor si amet lorem ipsum dolor si amet  lorem ipsum dolor si amet  lorem ipsum dolor si amet  lorem ipsum dolor si amet lorem ipsum dolor si amet lorem ipsum dolor si amet lorem ipsum dolor si amet lorem ipsum dolor si amet lorem ipsum dolor si amet lorem ipsum dolor si amet lorem ipsum dolor si amet lorem ipsum dolor si amet lorem ipsum dolor si amet lorem ipsum dolor si amet lorem ipsum dolor si amet lorem ipsum dolor si amet lorem ipsum dolor si amet ', '2015-06-01 22:27:00', 'senin', '5', 1, '317e1103f353ba6dc591ecbd59764ec1.jpg', '486c3f502cb0b0100800ab3a94538693.jpg', '84cef43e542142c1389cb62f0845c4c7.jpg'),
(11, 16, '0000-00-00 00:00:00', 'garuda nation', 'Jl. Gejayan No 2 , Kabuaten Sleman, Daerah Istimewa Yogyakarta', '', '9405e12ca87eb9b26b1e9ba64729fbb5.jpg', '09:00:00', '20:00:00', '081997946977', 'mudaw.qulub@gmail.com', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', '2015-06-05 21:46:02', 'senin', '0', 1, '2b1b8ae0fe78cdfcbe3b678b291725af.jpg', 'b188613e2327c5c14a216b34b4ee0a6b.jpg', '454215f4f9635d3b9ec37be7e7617d8e.jpg'),
(14, 19, '0000-00-00 00:00:00', 'cosplay art', 'Jl. Gejayan No 43 , Kabuaten Sleman, Daerah Istimewa Yogyakarta', '', '946cdd3429863694cbd3de1b14a1548f.jpg', '08:00:00', '21:00:00', '08123456', 'mudawil.q@students.amikom.ac.id', 'lorem cosplay', '2015-06-10 20:39:02', 'senin', '0', 4, '592f16c0ffb77b4a934acc24503cf452.jpg', '14da81c1812b9a447b3155b5792be476.jpg', '17502df31ca4a3e528d14bcd6b31b382.jpg');

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
('150531171607-11', 11, '2015-05-31 17:16:07', 160000, 3, 1, 'lunas'),
('150601212627-11', 11, '2015-06-01 21:26:27', 100000, 0, 1, 'lunas'),
('150601213003-11', 11, '2015-06-01 21:30:03', 160000, 3, 1, 'lunas'),
('150601213023-11', 11, '2015-06-01 21:30:23', 220000, 6, 1, 'lunas'),
('150601224208-15', 15, '2015-06-01 22:42:08', 300000, 5, 2, 'lunas'),
('150605212422-11', 11, '2015-06-05 21:24:22', 160000, 3, 1, 'menunggu'),
('150605233225-11', 11, '2015-06-05 23:32:25', 300000, 5, 2, 'menunggu'),
('150606003020-11', 11, '2015-06-06 00:30:20', 360000, 3, 3, 'diproses'),
('150607235016-1', 1, '2015-06-07 23:50:16', 100000, 0, 1, 'menunggu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`idAdmin`), ADD UNIQUE KEY `email` (`email`,`userName`);

--
-- Indexes for table `balasanTiket`
--
ALTER TABLE `balasanTiket`
 ADD PRIMARY KEY (`idbalasanTiket`), ADD KEY `fk_balasanTiket_1_idx` (`idTiket`), ADD KEY `fk_balasanTiket_2_idx` (`idAdmin`), ADD KEY `fk_balasanTiket_3_idx` (`idPemilik`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
 ADD PRIMARY KEY (`idBerita`), ADD KEY `fk_berita_1_idx` (`idAdmin`);

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
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
 ADD PRIMARY KEY (`idkatalog`), ADD KEY `fk_katalog_toko_idx` (`idToko`);

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
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
 ADD PRIMARY KEY (`idtiket`), ADD KEY `fk_tiket_1_idx` (`idPemilik`);

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
-- AUTO_INCREMENT for table `balasanTiket`
--
ALTER TABLE `balasanTiket`
MODIFY `idbalasanTiket` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
MODIFY `idBerita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
MODIFY `idGambar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `idItem` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
MODIFY `idkatalog` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kategoriItem`
--
ALTER TABLE `kategoriItem`
MODIFY `idKategoriItem` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kategoriUsaha`
--
ALTER TABLE `kategoriUsaha`
MODIFY `idkategoriUsaha` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `konfirmasiPembayaran`
--
ALTER TABLE `konfirmasiPembayaran`
MODIFY `idkonfirmasiPembayaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `idPelanggan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pemilikToko`
--
ALTER TABLE `pemilikToko`
MODIFY `idPemilik` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `SubKategoriItem`
--
ALTER TABLE `SubKategoriItem`
MODIFY `idSubKategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
MODIFY `idtiket` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
MODIFY `idToko` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `balasanTiket`
--
ALTER TABLE `balasanTiket`
ADD CONSTRAINT `fk_balasanTiket_1` FOREIGN KEY (`idTiket`) REFERENCES `tiket` (`idtiket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_balasanTiket_2` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_balasanTiket_3` FOREIGN KEY (`idPemilik`) REFERENCES `pemilikToko` (`idPemilik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
ADD CONSTRAINT `fk_berita_1` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `katalog`
--
ALTER TABLE `katalog`
ADD CONSTRAINT `fk_katalog_toko` FOREIGN KEY (`idToko`) REFERENCES `toko` (`idToko`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
ADD CONSTRAINT `fk_tiket_1` FOREIGN KEY (`idPemilik`) REFERENCES `pemilikToko` (`idPemilik`) ON DELETE CASCADE ON UPDATE CASCADE;

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
