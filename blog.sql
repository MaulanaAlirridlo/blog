-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Feb 2020 pada 05.45
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komen`
--

CREATE TABLE `komen` (
  `idkomen` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isikomen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komen`
--

INSERT INTO `komen` (`idkomen`, `idpost`, `iduser`, `nama`, `isikomen`) VALUES
(1, 1, '1', 'a', 'a'),
(2, 1, '', 'a', 'a'),
(3, 1, '', 'a', 'a'),
(4, 1, '', 'a', 'a'),
(5, 1, '', 'b', 'b'),
(6, 2, '', 't', 't'),
(7, 5, '1', 'netijen', 'waaah miris yaa jaman sekarang'),
(8, 5, '1', 'netijen', 'waaah miris yaa jaman sekarang'),
(9, 5, '1', 'add', 'aad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`idpost`, `iduser`, `nama`, `judul`, `isi`) VALUES
(3, '1', 'maulana', 'Fenomena Pelakor atau Perebut Suami Orang', 'Pada zaman dahulu, memang dari sebagian besar para pria mempunyai lebih dari seorang istri bahkan dapat menikah berkali-kali. Namun, seiring berjalannya waktu kesetiaan mulai tumbuh hingga hal itu berubah menjadi suatu yang biasa. Seperti halnya yang telah dicontohkan mantan Presiden kita, yaitu Bapak Habibie yang setia sehidup semati dengan Almarhumah Ibu Ainun.\r\n\r\nKemudian belakangan ini muncul lagi suatu hal yang pernah ada di masa lalu yaitu adanya istri yang lebih dari satu. Perempuan yang menjadi istri kedua dikenal dengan sebutan pelakor atau perebut laki orang (perebut suami orang). Para pelakor yang â€œtercidukâ€ para istri sah atau istri pertama pasti akan viral di dunia maya karena istri sah mengungkapkan hal itu melalui curhatan.\r\n\r\nCurhatan itu lalu dibaca banyak orang hingga akhirnya booming, setelah itu sang pelakor akan mendapat ribuan hujatan dari para netizen. Hujatan itu bukan tak beralasan, sesama kaum wanita tentunya akan mampu merasakan hal yang sama dengan para istri sah. Wanita memang lebih mementingkan perasaan ketimbang logikanya, sehingga kejadian itu bukan suatu yang mengherankan.'),
(5, '1', 'maulana', 'Berita Telur Palsu yang Telah Beredar di Masyarakat', 'Beberapa bulan yang lalu, masyarakat Indonesia dikejutkan dengan berita sensasional yaitu munculnya telur palsu di pasaran berbagai wilayah. Penyebar berita ini memberikan ciri-ciri telur palsu yaitu tidak memberi bau amis, putih telurnya encer dan warna merahnya pudar. Tak lama setelah beredarnya berita itu, seluruh warga langsung heboh hingga penjualan telur pedagang menurun.\r\n\r\nBeredarnya berita itu tak hanya merugikan pedagang, namun juga merugikan seluruh kalangan karena telur merupakan hasil hewani protein terbaik. Sejak dahulu, telur memang dipercaya memiliki kandungan protein yang baik bagi tubuh selain ikan-ikan dari laut. Tak heran bila telur diolah ke berbagai macam jenis makanan mulai dari telur goreng, telur balado hingga semur telur.\r\n\r\nNamun, perlu diketahui bagi seluruh pembaca bahwa berita tentang telur palsu itu adalah hoax atau berita yang tak memiliki kebenaran. Oknum-oknum tak bertanggung jawab sengaja mempublikasikan berita palsu demi tujuan dan maksud pribadi yang menguntungkan bagi mereka. Sehingga, kini semua orang yang perlu khawatir untuk kembali membeli telur dan mengkonsumsinya setiap hari.\r\n\r\nNah itulah contoh artikel yang menarik. Mulai dari contoh artikel di koran, contoh artikel pendidikan, contoh artikel ilmiah, contoh artikel kesehatan, contoh artikel singkat, contoh artikel panjang, contoh artikel adiwiyata, contoh artikel ekonomi, contoh artikel lingkungan hidup, contoh artikel pemanasan global, contoh artikel tentang narkoba, contoh artikel sekolah, dll.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `status`) VALUES
(1, 'maulana', '$2y$10$junRNA/IJWxYkM0lZNxmdOt4GeQNGDv84mN4/BsRjudzyynreSOK.', 'user'),
(2, 'tes', '$2y$10$rx5szPzfIGOtG7t4cI8Q0.TJBUQFcUmX4iA6yAdY5675fsZBXZzAq', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`idkomen`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komen`
--
ALTER TABLE `komen`
  MODIFY `idkomen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
