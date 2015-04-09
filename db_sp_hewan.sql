-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2015 at 06:08 
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sp_hewan`
--
CREATE DATABASE IF NOT EXISTS `db_sp_hewan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_sp_hewan`;

-- --------------------------------------------------------

--
-- Table structure for table `ciri_morfologi`
--

CREATE TABLE IF NOT EXISTS `ciri_morfologi` (
  `kd_ciri_morfologi` int(5) NOT NULL AUTO_INCREMENT,
  `nm_ciri_morfologi` varchar(35) NOT NULL,
  `type` enum('vertebrata','avertebrata') NOT NULL,
  `hubungan_klasifikasi` varchar(500) NOT NULL,
  `desk_morf` varchar(1000) NOT NULL,
  PRIMARY KEY (`kd_ciri_morfologi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `ciri_morfologi`
--

INSERT INTO `ciri_morfologi` (`kd_ciri_morfologi`, `nm_ciri_morfologi`, `type`, `hubungan_klasifikasi`, `desk_morf`) VALUES
(1, 'menyusui', 'vertebrata', '', 'Binatang menyusui atau mamalia adalah kelas hewan vertebrata yang terutama dicirikan oleh adanya kelenjar susu, yang pada betina menghasilkan susu sebagai sumber makanan anaknya'),
(2, 'Tidak menyusui', 'vertebrata', '', ''),
(3, ' Berkaki', 'vertebrata', '2', ''),
(4, 'Tidak berkaki', 'vertebrata', '2', ''),
(5, 'berkulit lembab', 'vertebrata', '3', 'Kulit lembab sangat \ntipis, mengandung kapiler \ndarah dan dilengkapi dengan \nkelenjar-kelenjar penghasil \nlendir di bagian dermis dan di \nbawah kulit.'),
(6, 'Bersisik', 'vertebrata', '3', 'Sisik secara umumnya berarti semacam lapisan kulit yang keras dan berhelai-helai, seperti pada ikan, ular atau kaki ayam.'),
(7, 'Berbulu', 'vertebrata', '3', 'Bulu mempunyai banyak fungsi pada burung tapi yang paling penting adalah bulu berperan penting dalam memungkinkan membantu burung untuk terbang.Selain membantu untuk memungkinkan penerbangan, bulu juga memberikan perlindungan dari elemen. Bulu burung dengan memberikan Waterproofing dan insulasi dan bahkan memblokir sinar UV yang berbahaya untuk mencapai kulit burung.'),
(8, 'Bertelur', 'vertebrata', '1', 'Salah satu cara berkembang biakkan hewan dengan cara bertelur adalah Ovipar, yang pada umumnya mempunyai ciri-ciri telurnya dierami sampai menetas. Ovipar adalah jenis reproduksi yg mengakibatkan telur yg dikeluarkan berkembang dan menetas di luar badan induknya.'),
(9, 'Tidak  bertelur', 'vertebrata', '1', ''),
(10, 'Berkantung', 'vertebrata', '9', 'Kantung (marsupium) ini umumnya dijumpai pada hewan betina di bagian ventral tubuh'),
(11, 'Tak  berkantung', 'vertebrata', '9', ''),
(12, 'omnivora ', 'vertebrata', '11', 'Omnivora adalah hewan pemakan segala.mnivora adalah spesies yang memiliki pola makan yang terdiri dari tumbuhan dan bahan hewani.'),
(13, 'herbivora', 'vertebrata', '100', 'herbivora adalah suatu golongan hewan pemakan tumbuhan saja. '),
(14, 'karnivora', 'vertebrata', '100', 'karnivora adalah suatu golongan hewan pemakan daging yang merupakan suatu  ordo atau bangsa Mamalia dan bagian dari komponen konsumen ekosistem.'),
(15, 'Tidak  terbang', 'vertebrata', '100', ''),
(16, 'Terbang', 'vertebrata', '100', ''),
(17, 'Hidup di air', 'vertebrata', '100', ''),
(18, 'hidup di darat', 'vertebrata', '100', ''),
(19, 'bergigi ', 'vertebrata', '100', ''),
(20, 'Tidak bergigi', 'vertebrata', '100', ''),
(21, 'Tidak ada gigi acip', 'vertebrata', '100', ' gigi acip dan insisor) merupakan jenis gigi pertama yang tumbuh dalam mamalia heterodon. Gigi acip terletak pada pramaksila di rahang atas, dan mandibel di rahang bawah.'),
(22, 'Begigi acip dua', 'vertebrata', '100', ''),
(23, 'bergigi acip empat', 'vertebrata', '100', ''),
(24, 'Berkaki empat', 'vertebrata', '100', ''),
(25, 'Berkaki lebih dari empat', 'vertebrata', '100', ''),
(26, 'berbelalai', 'vertebrata', '100', 'fungsi utama belalai pada hewan adalah untuk bernafas dan mencium bau. tapi terkadang, belalai juga berfungsi sebagai pipa penyedor air untuk mendinginkan badannya.'),
(27, 'Tidak berbelalai', 'vertebrata', '100', ''),
(28, 'Jari genap', 'vertebrata', '100', ''),
(29, 'Jari ganjil', 'vertebrata', '100', ''),
(30, 'Tulang sejati', 'vertebrata', '100', ''),
(31, 'Tulang rawan', 'vertebrata', '100', ' Sebuah tulang rawan terdiri dari matriks ekstraseluler terdiri dari serat kolagen, zat dasar yang kaya proteoglikan, dan serat elastin.'),
(32, 'Sirip kipas', 'vertebrata', '100', ''),
(33, 'Sirip cuping', 'vertebrata', '100', ''),
(34, 'Sirip archipterygeal', 'vertebrata', '100', ''),
(35, 'Sirip bukan archipterygeal', 'vertebrata', '100', ''),
(36, 'Ganoid tulang rawan', 'vertebrata', '100', ''),
(37, 'Ganoid tulang keras', 'vertebrata', '100', ''),
(38, 'Ganoid tulang keras tingkat tinggi', 'vertebrata', '100', ''),
(39, 'Sirip Archipterygeal', 'vertebrata', '100', ''),
(40, 'Sirip bukan Archipterygeal', 'vertebrata', '100', ''),
(41, 'ekor heterocercal', 'vertebrata', '100', 'Type Homocercal yaitu bila columna vertebralis berakhir tidak persis di ujung ekor, tapi agak membelok sedikit, tapi ujung membagi diri menjadi dua bagian yang sama'),
(42, 'ekor bukan heterocercal', 'vertebrata', '100', ''),
(43, 'berkaki', 'vertebrata', '100', ''),
(44, 'tidak berkaki', 'vertebrata', '100', ''),
(45, 'berekor', 'vertebrata', '100', ''),
(46, 'tidak berekor', 'vertebrata', '100', ''),
(47, 'tidak bisa terbang', 'vertebrata', '100', ''),
(48, 'bisa terbang', 'vertebrata', '100', ''),
(49, 'badan tinggi', 'vertebrata', '100', ''),
(50, 'badn tidak tinggi', 'vertebrata', '100', ''),
(51, 'paruh pendek', 'vertebrata', '100', ''),
(52, 'paruh besar', 'vertebrata', '100', ''),
(53, 'leher panjang', 'vertebrata', '100', ''),
(54, 'leher pendek', 'vertebrata', '100', ''),
(55, 'kaki bermembran', 'vertebrata', '100', ''),
(56, 'kaki tidak bermembran', 'vertebrata', '100', ''),
(57, 'warna mencolok', 'vertebrata', '100', ''),
(58, 'warna tidak mencolok', 'vertebrata', '100', ''),
(59, 'mata kedepan', 'vertebrata', '100', ''),
(60, 'mata kesamping', 'vertebrata', '100', ''),
(61, 'kaki pendek', 'vertebrata', '100', ''),
(62, 'kaki panjang', 'vertebrata', '100', ''),
(63, 'paruh berkantung', 'vertebrata', '100', ''),
(64, 'paruh tidak berkantung', 'vertebrata', '100', ''),
(65, 'kaki vestigeal', 'vertebrata', '100', ''),
(66, 'kaki kuat', 'vertebrata', '100', ''),
(67, 'bercangkang', 'vertebrata', '100', ''),
(68, 'tidak bercangkang', 'vertebrata', '100', ''),
(69, 'bersisik kering', 'vertebrata', '100', ''),
(70, 'bersisik keras', 'vertebrata', '100', ''),
(71, 'tubuh dua lapisan', 'avertebrata', '', ''),
(72, 'tubuh tidak ada lapisan', 'avertebrata', '', ''),
(73, 'berpori', 'avertebrata', '71', ''),
(74, 'tidak berpori', 'avertebrata', '71', ''),
(75, 'tidak berongga', 'avertebrata', '72', ''),
(76, 'berongga semu', 'avertebrata', '72', ''),
(77, 'berongga sejati', 'avertebrata', '72', ''),
(78, 'bersegmen', 'avertebrata', '77', ''),
(79, 'tidak bersegmen', 'avertebrata', '77', ''),
(80, 'berkaki', 'avertebrata', '78', ''),
(81, 'tidak berkaki', 'avertebrata', '78', ''),
(82, 'berduri', 'avertebrata', '79', ''),
(83, 'tidak berduri', 'avertebrata', '79', ''),
(84, 'kerangka kapur', 'avertebrata', '73', ''),
(85, 'kerangka bukan kapur', 'avertebrata', '73', ''),
(86, 'kerangka salkeosik', 'avertebrata', '85', ''),
(87, 'kerangka spons', 'avertebrata', '85', ''),
(88, 'bersiklus', 'avertebrata', '74', ''),
(89, 'tidak bersiklus', 'avertebrata', '74', ''),
(90, 'medusa dominan', 'avertebrata', '88', ''),
(91, 'medusa tidak dominan', 'avertebrata', '88', ''),
(92, 'tidak parasit', 'avertebrata', '75', ''),
(93, 'parasit pada hewan', 'avertebrata', '75', ''),
(94, 'parasit pada manusia', 'avertebrata', '75', ''),
(95, 'panjang tubuh > 10 cm', 'avertebrata', '76', ''),
(96, 'panjang tubuh 1 cm', 'avertebrata', '76', ''),
(97, 'lima lengan cambuk', 'avertebrata', '82', ''),
(98, 'lima lengan bukan cambuk', 'avertebrata', '82', ''),
(99, 'tidak punya lima lengan cambuk', 'avertebrata', '82', ''),
(100, 'berduri', 'avertebrata', '99', ''),
(101, 'tidak berduri', 'avertebrata', '99', ''),
(102, 'tidak bercangkang', 'avertebrata', '83', ''),
(103, 'bercangkang satu', 'avertebrata', '83', ''),
(104, 'bercangkang dua', 'avertebrata', '83', ''),
(105, 'kaki lebih dr 5 pasang', 'avertebrata', '80', ''),
(106, 'kaki kurang dr 5 pasang', 'avertebrata', '80', ''),
(107, 'bersayap', 'avertebrata', '106', ''),
(108, 'tidak bersayap', 'avertebrata', '106', ''),
(109, 'berantena', 'avertebrata', '108', ''),
(110, 'tidak berantena', 'avertebrata', '108', ''),
(111, 'tidak berabut', 'avertebrata', '81', ''),
(112, 'berambut banyak', 'avertebrata', '81', ''),
(113, 'berambut sedikit', 'avertebrata', '81', '');

-- --------------------------------------------------------

--
-- Table structure for table `hewan`
--

CREATE TABLE IF NOT EXISTS `hewan` (
  `kd_hewan` varchar(5) NOT NULL,
  `nm_hewan` varchar(30) NOT NULL,
  `definisi` text,
  `gambar_hewan` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_hewan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hewan`
--

INSERT INTO `hewan` (`kd_hewan`, `nm_hewan`, `definisi`, `gambar_hewan`) VALUES
('001', 'porifera', 'Porifera (Latin: porus = pori,fer = membawa) atau spons atau hewan berpori adalah sebuah filum untuk hewan multiseluler yang paling sederhana.', ''),
('002', 'Coelenterata', 'Cnidaria atau Coelenterata adalah sebuah filum yang terdiri atas sekitar 9.000 spesies hewan sederhana yang hanya ditemukan di perairan, kebanyakan lingkungan laut. Dari sudut etimologi, kata Cnidaria berasal dari bahasa Yunani "cnidos" yang berarti "jarum penyengat". Kemampuan menyengat cnidaria-lah yang merupakan asal nama mereka. ', ''),
('003', 'Platihelminthes', 'Platyhelminthes adalah filum dalam Kerajaan Animalia (hewan). Filum ini mencakup semua cacing pipih kecuali Nemertea, yang dulu merupakan salah satu kelas pada Platyhelminthes, yang telah dipisahkan.', ''),
('004', 'Nemathelmintes', 'Nemathelmintes merupakan filum kerajaan hewan. Anggotanya merupakan berbagai cacing yang dikenal dengan cacing gilig. Tubuhnya silinder memanjang.', ''),
('005', 'Anelida', 'Anelida merupakan filum luas yang terdiri dari cacing berdegmen. Filum ini dapat ditemukan dilingkungan basah. ', ''),
('006', 'Artropodha ', 'Artropodha merupakan filum yang paling besar di dalam kerajaan hewan. Hewan ini dapat ditemukan dilaut dan didarat termasuk berbagai bentuk simbiosis dan parasit. Kata Artropoda berasal dari bahasa yunani arthron, “ ruas, buku, atau segmen” dan puos, “kaki” jika disatukan menjadi kaki yang berbuku-buku.', ''),
('007', 'Echinodhermata', 'Echinodhermata merupakan filum hewan laut yang mencakup bintang laut, teripang dan beberapa kekerabatannya. Echinodhermata berasal dari bahasa yunani yang berari kulit berduri. Kelompk filum ini ditemukan hamper semua dalam kedalaman laut.', ''),
('008', 'Mollusca', 'Mollusca merupakan hewan tripoblastik selomata yang bertubuh lunak. Kata molluscta berasal dari bahasa latin molluscus yang berarti lunak. Semua hewannya lunak dengan maupun tanpa cangkang.', ''),
('009', 'Hexatinelida', 'Hexatinelida termasuk dalam filum porifera. Hexatinelida spekulasinya terdiri dari zat kersik dan hisup dilaut yang dalam. ', ''),
('010', 'Demospongia', 'Demospongia merupakan kelas dari anggota hewan takbertulang belakang (avertebrata) dan merupakan filum dari porifera. Golongan ini bertulang lunak karena tidak memiliki rangka.', ''),
('011', 'Calcarea', 'Calcarea merupakan anggota filum porifera. Kerangka tubuhnya tersusun dari kalsium karbonat.', ''),
('012', 'Anthozoa', 'Anthozoa merupakan filum dari Cnidaria. Anthozoa berasal dari bahasa yunani, anthos berarti bunga, dan zoon berarti hewan. Hewan ini berbentuk seperti bunga', ''),
('013', 'Scypozoa', 'Scypozoa merupakan filum dari Cnidaria. Scypozoa berasal dari bahasa yunani, scypo = mangkuk dan zoa=hewan. Hewan ini ini mempunyai fase dominan berbentuk medusa', ''),
('014', 'Hydrozoa', 'Hydrozoa merupakan filum dari Cnidaria. Hydrozoa sebagian besar hidup berkoloni di laut.', ''),
('015', 'Turbellaria', 'Turbellaria termasuk dalam filum platihelmintes. Turbellaria sering juga disebut cacing rambut getar. ', ''),
('016', 'Cestoda', 'Cestoda termasuk dalam filum platihelminthes. Cestoda sering juga dosebut cacing pita. Dalam siklus hidupnya, cacing ini memerlukan air untuk bertelur dan menetaskan telurnya.', ''),
('017', 'Trematoda', 'Trematoda merupakan filum Platihelmintes. Trematoda hidup berparasit pada hwan dan manusia.', ''),
('018', 'Accarislumbriciodes', 'Accarislumbriciodes merupakan filum dari Nemathelminthes. Hewan ini akan membentuk inang pada manusia. Larva Accaris akan berkembang menjadi dewasa dan kopulasi serta akhirnya bertelur.', ''),
('019', 'Ancylotomauduodenale', NULL, ''),
('020', 'Ophiuroidea', 'Ophiuroidea merupakan kelas  dari filum echinodermata. Kelas ini memiliki kekerabatan dengan bintang laut. Hewan ini memiliki lima lengan cambuk yang panjangnya dapat mencapai 60 cm.', ''),
('021', 'Asterioidea', 'Asterioidea merupakan kelas hewan dari filum echinodermata. Asterioideaberbentuk simetri radial dengan lima lengan.', ''),
('022', 'Echinoidea', 'Echinoidea merupakan hewna jenis bulu babi dari filum Echinodermata. Hewan ini sering disebut landak laut. Hewan ini tidak mempunyai lengan, namun berduri.', ''),
('023', 'Holoturoidea', 'Holoturoidea merupakan hewan avertebrata dari filum Echinodermata. Holoturoideatersebar luas di lingkungan laut, mulai dari zona pasang surut sampai zona dalam. ', ''),
('024', 'Chepalopoda', NULL, ''),
('025', 'Bivalvia', 'Bivalvia merupakan kelas dari filum mollusca. Bivalvia mencakup kerang-kerangan. Bivalvia berari sepasang cangkang. ', ''),
('026', 'Gastropoda', 'Gastropoda merupakan kelas dari filum Mollusca. Dalam arti sempit, Gastropoda merupakan cangkang yang bergelung pada tahap dewasa. Gastropoda dapat ditemukan diberbagai lingkungan.', ''),
('027', 'Miriapoda', 'Miriapoda merupakan kelas dari filum Arthropoda. Tubuhnya teridir dari kepala dan badan, tanpa bagian dada. Pada kepala terdapat sepasang mata tunggaldan dua pasang alat peraba.', ''),
('028', 'Insecta', 'Insecta merupakan kelas dari Artropoda yang memiliki tubuh terbagi atas kepala, dada, dan perut. Insecta memiliki tiga pasang kaki dan 1-2 pasang sayap.', ''),
('029', 'Crustacea', 'Crustacea merupakan sekelompok besar dari Artropoda. Kebanyakan hewan  hidup di dalam ai, namun ada beberapa beradaptasi di darat. Tubuhnya terdiri dari dua bagian, kepala dan dada yang menyatu serta perut (abdomen)', ''),
('030', 'Arachnidea ', 'Arachnidea merupakan kelas dari artropoda. Arachnida berasal dari bahasa yunani yang berarti laba-laba. Tubuhnya terdiri atas efalotaraks dan perut (abdomen).', ''),
('031', 'Hirudinea', 'Hirudinea merupakan kelas dari Anelida. Hirudinea merupakan cacing yang tak berambut. Tempat hidup Hirudinea ada diair dan di darat. ', ''),
('032', 'Polychaeta ', 'Polychaeta merupaka kelas cacing dari filum Anelida. Polychaeta umumnya hidup dilaut dan sebagian ada di darat. Seluruh tubuh Polychaeta disertai rambut kaku yang dilapisi kultikula. Tubuhnya berwarna menarik.', ''),
('033', 'Oligochaeta', 'Oligochaeta  merupakan kelas dari filum Anelida. Namanya berasal dari oligo ynag artinya sedikit, dan chaeta yang artinya rambut kaku. ', ''),
('034', 'Mamalia ', 'H34	Mamalia 	Mamalia atau binatang menyusui merupakan hewan kelas verebrata dimana cirri-ciri utamanya adalah memiliki kelenjar susu. Pada hewan betina menghasilkan susu sebagai sumber makanan.', ''),
('035', 'Pisces', 'H35	Pisces	Pisces atau ikan merupakan kelas avertebrata yang hidup di air dan bernapas dengan ingsang. ', ''),
('036', 'Amphibi', 'H36	Amphibi	Amphibi umunya didefinisikan sebagai hewan vertebrata yang hidup di dua alam, yakni air dan darat. Tubuhnya diselimuti kulit yang berlendir, dan memiliki darah dingin. ', ''),
('037', 'Aves', 'H37	Aves	Aves atau unggas merupakan hewan vertebrata yang memiliki bulu dan sayap. Diperkirakan ada 8800-10.200 species burung di seluruh dunia', ''),
('038', 'Reptil', 'H38	Reptil	Reptil atau binatang melata merupakan sebuah kelompok hewan yang berdarah dingin memiliki sisik menutupi tubuhnya. ', ''),
('039', 'Monotremata', 'Monotremata merupakan mamalia yang bertelur. Monos berarti tunggal, dan Trema berarti lubang (kloaka). ', ''),
('040', 'Marsupilaria', 'Marsupilaria	Marsupilaria merupakan mamalia yang betinanya memiliki kantong perut (marsupium)', ''),
('041', 'Primata', 'Primata	Primata adalah hewan yang menjadi ordo biologi Primates. Kata Primates berasal dari bahasa latin yang berarti “yang pertama, yang mulia”', ''),
('042', 'Chiroptera', 'Chiroptera	Chirpotera merupaka hewan berordo dengan cirri utama memiliki kaki depan yang dapat berkembang menjadi sayap.', ''),
('043', 'Sirenia ', 'Sirenia merupakan mamalia laut. Sirenia bukanlah ikan karena memreka menyusui anaknya dan masih memiliki kekerabatan dengan gajah. ', ''),
('044', 'Artiodactyla', 'Artiodactyla merupakan hewan mamalia pemamah biak. Hewan ini mencerna makann=annya dua kali. ', ''),
('045', 'Perissodactyla', 'Perrisodactila merupakan hewan mamalia lapisan ordo. Perrisodactyla memiliki kuku berjumlah ganjil.', ''),
('046', 'Proboscidae ', 'Proboscidae merupakan ordo taksonomi yang terdiri dari satu family mamalia. Proboscidae juga disebut mamalia bergading', ''),
('047', 'Rodentia ', 'Rodentia atau hewan pengerat merupakan salah satu ordo dari mamalia. Hewan ini memiliki gigi depan yang selalu tumbuh dan akan diasah dengan menggerigiti sesuatu.', ''),
('048', 'Lagomorpha', 'Lagomorpha merupakan salah ordo dari mammalian yang sering dikira sama dengan ordo rodentia. Lagomorpha memiliki empat gigi depan di rahang atas.', ''),
('049', 'Carnivora', 'Carnivora hewan mamalia yang memakan daging atau bangkai hewan yang sudah mati. Kata Carnivora berasal dari bahasa latin, Carne berate daging dan vorare berarti memakan.', ''),
('050', 'Pinnipedia ', 'Pinnipedia adalah mamalia laut yang memiliki empat sirip dan lapisan lemak dibawahnya. Pinnipedia bernapas menggunakan paru-paru.', ''),
('051', 'Insectivore', 'Insectivore merupakan sebutan untuk hewan yang makanannya serangga.', ''),
('052', 'Polidota', 'Polidota merupakan ordo dari mamalia yang memakan serangga.', ''),
('053', 'Acipenceriformes', 'Acipenceriformes', ''),
('054', 'Lapisosteiformes', 'Lapisosteiformes', ''),
('055', 'Amiiformes ', 'Amiiformes ', ''),
('056', 'Cluferiformes ', 'Cluferiformes ', ''),
('057', 'Crossopterygii', 'Crossopterygii', ''),
('058', 'Cladoselachiformes', 'Cladoselachiformes', ''),
('059', 'Chondrecheliformes', 'Chondrecheliformes', ''),
('060', 'Xenachaniformes', 'Xenachaniformes', ''),
('061', 'Chimaeriformes', 'Chimaeriformes', ''),
('062', 'Selachiformes', 'Selachiformes', ''),
('063', 'Caecilian', 'Caecilian', ''),
('064', 'Urodela', 'Urodela', ''),
('065', 'Anura', 'Anura', ''),
('066', 'Struthioniformes', 'Struthioniformes merupakan ordo dari kelas Aves. Struthioniformes merupakan burung pemakan tumbuhan dan hewan. Tubuhnya dapat tumbuh mencapai 2,5 m.', ''),
('067', 'Casuariformes', 'Casuariformes merupakan burung yang tidak bisa terbang. Hewan ini memiliki sayap yang kecil, dan tingginya mencapai 1,7m.', ''),
('068', 'Apterygiformes', 'Apterygiformes', ''),
('069', 'Anseriformes', 'Anseriformes memiliki paruh yang lebar dan berkaki pendek. Bulu ekornya akan berbentuk seperti kipas. ', ''),
('070', 'Psittachiformes', 'Psittachiformes merupakan ordo dari kelas aves. Psittachiformes memiliki paruh pendek dank at di bagian ujungnya. Umumnya, Psittachiformes adalah pemakan buah-buahan', ''),
('071', 'Strigiformes', 'Strigiformes merupaka ordo dari kelas Aves. Strigiformes merupakan burung nocturnal dangna kepala dan  mata yang besar.', ''),
('072', 'Columbiformes', 'Columbiformes merupakan ordo dari kelas Aves. Columbiformes memiliki paruh pendek dan kulit lunak pada pangkal paruhnya. ', ''),
('073', 'Galliformes', 'Galliformes', ''),
('074', 'Pelacaniformes', 'Pelacaniformes merupaka ordo dari filum Aves yang memiliki paruh besar, lubang hidung vestigial dan hidupnya di lautan. ', ''),
('075', 'Procellariformes', 'Procellariformes', ''),
('076', 'Ciconiformes', 'Ciconiformes merupakan ordo dari filum Aves. Ciconiformesmemiliki leher dan kaki yang panjang. Hidupnya berada di perswahan secara berkelompok. Makanan Ciconiformes adalah ikan maupun hewan yang hidup di air.', ''),
('077', 'Falconiformes', 'Falconiformes merupakan ordo dari Kelas Aves. Falconiformes merupaka hewan pemakan hewan (karnivor). Paruhnya sangan kuat dielngkapi dengan kuku yang tajam.', ''),
('078', 'Chelonian', 'Chelonian merupakan ordo dari kelas reptile. Chelonian memiliki sepadang tungkai depan yang serupa kaki pendayung. Hewan ini bernafas menggunakan paru-paru.', ''),
('079', 'Squamata ', 'Squamata merupakan ordo dari kelas Reptil. Squamata memiliki species terbanyak di kelas Reptil. Tubuhnya ditutupi sisik yang terbuat dari bahan tanduk. Sisiknya mengalami perubahan secara periodic.', ''),
('080', 'Crocodilian', 'Crocodilian merupaka ordo dari kelas reptilian. Hewan ini umumnya bertubuh besar. Crocodilian merupakan hewan pemakan ikan, reptile lainnya dan terkadang mollusca.', '');

-- --------------------------------------------------------

--
-- Table structure for table `relasi_hewan_morfologi`
--

CREATE TABLE IF NOT EXISTS `relasi_hewan_morfologi` (
  `kd_ciri_morfologi` int(11) NOT NULL AUTO_INCREMENT,
  `Kd_hewan` varchar(5) NOT NULL,
  PRIMARY KEY (`kd_ciri_morfologi`),
  KEY `Kd_hewan` (`Kd_hewan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `relasi_hewan_morfologi`
--

INSERT INTO `relasi_hewan_morfologi` (`kd_ciri_morfologi`, `Kd_hewan`) VALUES
(1, '001'),
(2, '002'),
(3, '003'),
(4, '004'),
(5, '005'),
(6, '006'),
(7, '007'),
(8, '008'),
(9, '009'),
(10, '010'),
(11, '011'),
(12, '012'),
(13, '013'),
(14, '014'),
(15, '015'),
(16, '016'),
(17, '017'),
(18, '018'),
(19, '019'),
(20, '020'),
(21, '021'),
(22, '022'),
(23, '023'),
(24, '023'),
(25, '024'),
(26, '025'),
(27, '026'),
(28, '027'),
(29, '028'),
(30, '029'),
(31, '030'),
(32, '031'),
(33, '032'),
(34, '032'),
(35, '033'),
(36, '034'),
(37, '035'),
(38, '036'),
(39, '037'),
(40, '038'),
(41, '039'),
(42, '040'),
(43, '041'),
(44, '042'),
(45, '043'),
(46, '044'),
(47, '045'),
(48, '046'),
(49, '047'),
(50, '048'),
(51, '049'),
(52, '050'),
(53, '051'),
(54, '052'),
(55, '053'),
(56, '054'),
(57, '055'),
(58, '056'),
(59, '057'),
(60, '058'),
(61, '059'),
(62, '060'),
(63, '061'),
(64, '062'),
(65, '063'),
(66, '064'),
(67, '065'),
(68, '066'),
(69, '067'),
(70, '068'),
(71, '069'),
(72, '070'),
(73, '071'),
(74, '072'),
(75, '073'),
(76, '074'),
(77, '075'),
(78, '076'),
(79, '077'),
(80, '078'),
(81, '079'),
(82, '080');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `relasi_hewan_morfologi`
--
ALTER TABLE `relasi_hewan_morfologi`
  ADD CONSTRAINT `relasi_hewan_morfologi_ibfk_1` FOREIGN KEY (`Kd_hewan`) REFERENCES `hewan` (`kd_hewan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
