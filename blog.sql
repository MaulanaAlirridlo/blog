-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 Feb 2020 pada 12.36
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `nama_gambar` varchar(255) NOT NULL,
  `format_gambar` varchar(255) NOT NULL,
  `tipe_gambar` varchar(255) NOT NULL,
  `ukuran_gambar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`idpost`, `iduser`, `nama`, `judul`, `isi`, `nama_gambar`, `format_gambar`, `tipe_gambar`, `ukuran_gambar`) VALUES
(10, '1', 'maulana', '3 Nasihat Sunan Kalijaga yang Disampaikan Lewat Lakon Pewayangan Semar', 'Seperti yang sudah kita ketahui jika misi Sunan Kalijaga tidak hanya menyampaikan ajaran Islam, tetapi juga mendidik manusia agar lebih beradab. Oleh karenanya, melalui tokoh Semar, Sunan Kalijaga menyampaikan tiga nasihat, yaitu.\r\n1.	Ojo ngaku pinter yen durung biso nggoleki lupute awake dewe\r\nArti dari kalimat di atas adalah â€˜Jangan mengaku pintar jika belum bisa mencari kesalahan diri sendiriâ€™. Ya, kebanyakan manusia memang suka menghakimi, merendahkan, menghina manusia lain tanpa berkaca terlebih dahulu, apakah dirinya sudah sempurna atau belum? Karena sesungguhnya, jika kita berkaca, introspeksi diri, pasti ada banyak kesalahan dan kekeliruan yang kita temukan dalam diri kita sendiri.\r\n2.	Ojo ngaku unggul yen ijeh seneng ngasorake wong liyo\r\nNasihat kedua adalah â€˜Jangan mengaku unggul jika masih senang merendahkan orang lainâ€™. Kita bisa lihat sendiri, berapa banyak orang yang menghina sesama. Enggak usah jauh-jauh deh, dalam berbagai media sosial kerap kali didapati orang yang menghujat dengan mengeluarkan kata-kata yang kurang pantas seolah menganggap bahwa dirinya yang paling unggul dan hebat. Nah, melalui lakon Semar, Sunan Kalijaga ingin menyampaikan bahwa setiap manusia itu punya kedudukan sama, tak ada yang lebih unggul dari yang lain. Di mata Tuhan pun, semua sama, kecuali amal perbuatan mereka.\r\n\r\n3.	Ojo ngaku suci yen durung biso manunggal ing Gusti\r\nNasihat ketiga, masih berkaitan dengan poin satu dan dua, â€˜Jangan mengaku suci jika masih belum bisa menyatu dalam Gustiâ€™. Sejatinya tak ada memang yang namanya manusia suci. Semua pasti punya kesalahan dan dosa, bahkan para Nabi sekalipun juga pernah melalukan kesalahan. Hanya saja, saat khilaf kita bisa kembali kepada sang pencipta dan meminta ampun atas kesalahan yang sudah kita perbuat.\r\n\r\nPenyampaian melalui lakon Semar ini sangatlah bijak dan tidak memaksa. Sehingga hal tersebut menjadi daya tarik tersendiri bagi orang-orang zaman dahulu untuk mengikuti ajaran beliau. Karena kepiawaiannya menggabungkan seni dan ajaran Islam, Sunan Kalijaga masuk dalam salah satu filsuf yang berpengaruh di Indonesia.\r\n', '79f9b90a512c9189e12e8d89e869467c8a3e006e', 'jpg', 'image/jpeg', 167251),
(11, '1', 'maulana', 'Taubat', 'Taubat yang diperintahkan Allah Subhaanahu Wa Taâ€™ala  kepada manusia adalah Taubat Nasuha, sebagaimana firman-Nya  : Hai orang-orang yang beriman, bertaubatlah kepada Allah dengan taubat yang semurni-murninya, mudah-mudahan Tuhan kamu akan menghapus kesalahan-kesalahanmu dan memasukkan kamu ke dalam surga yang mengalir di bawahnya sungai-sungai. ( At-Tahrim : 8 )\r\n\r\nTaubat Nasuha itu memiliki lima syarat utama yaitu  :\r\n\r\nPertama : Ikhlas semata-mata karena Allah Subhanahu Wa Taâ€™ala  yaitu hendaknya yang menjadi pendorong taubatnya adalah cinta kepada Allah Subhanahu Wa Taâ€™ala , pengagungan, pengharapan dan  takut dari azabNya. Dia tidak menginginkan sesuatu yang bersifat duniawi seperti harta, kedudukan,  jabatan atau  kemuliaan dihadapan manusia.\r\n\r\nKedua : Hendaknya seseorang menyesal dan bersedih atas kemaksiatannya yang telah lalu disertai cita-cita  semestinya dia tidak pernah terjatuh dalam  pelanggaran tersebut.\r\n\r\nKetiga : Hendaknya dia langsung berhenti dari kemaksiatannya itu secara total. Yaitu apabila kemaksiatan itu dalam bentuk meninggalkan ketaatan atau kewajiban maka hendaklah dia segera melaksanakannya dan jika kewajiban itu masih dapat di qadha seperti Zakat, Puasa dan Haji maka segera dia meng-qadha nya. Akan tetapi jika kemaksiatan itu dalam bentuk mengerjakan perkara yang diharamkan Allah subhaanahu wa taâ€™ala maka hendaklah segera ditinggalkan, karena tidak sah taubat seseorang jika dia masih bergelimang dengan dosa-dosanya. Sebagai contoh : Jika seseorang menyatakan dirinya bertaubat dari riba lalu dia masih melakukan aktivitas riba tersebut, maka tidak sah taubatnya, bahkan taubatnya itu digolongkan sebagai bentuk istihzaâ€™ ( mengolok-olok ) Allah Subhanahu Wa Taâ€™ala  dan ayat-ayat-Nya.\r\n\r\nApabila kemaksiatan itu berhubungan dengan hak-hak manusia, maka tidak sah taubatnya hingga dia mengembalikan hak-hak tersebut kepada pemiliknya. Jika dia pernah mengambil harta orang lain maka taubatnya itu dengan mengembalikan harta tersebut kepada pemiliknya apabila masih hidup, akan tetapi jika telah meninggal dunia maka diserahkan kepada ahli warisnya. Dan jika ahli warisnya pun tidak kita temukan maka harta tersebut diserahkan ke Baitul Mal atau diinfakkan dengan niat pahalanya buat pemilik harta tersebut karena Allah Subhaanahu Wa Taâ€™ala Maha Tahu akan hal itu. Demikian pula jika maksiat tersebut dalam bentuk meng-ghibah seorang muslim maka wajib atasnya meminta penghalalan atas dosa tersebut jika orang yang di-ghibah tersebut telah mengetahui bahwa dia pernah di-ghibah. Akan tetapi jika orang yang di-ghibah tersebut belum mengetahuinya dan dia takut jika hal tersebut diketahui maka cukuplah dia ber-istighfar sambil memujinya dalam majelis di mana dia pernah meng-ghibah orang tersebut karena kebaikan itu menghapus keburukan.\r\n\r\nKeempat : Hendaknya dia ber-azam ( memiliki tekad yang kuat) untuk tidak kembali lagi kepada kemaksiatan itu pada hari-hari mendatang, karena ini merupakan buah dari taubat serta bukti akan benarnya niat orang yang bertaubat tersebut.\r\n\r\nKelima : Hendaklah taubat dilaksanakan sebelum pintu taubat tertutup dan ini ada dua bagian yaitu :\r\na. Sebelum terbitnya matahari dari barat, sebagaimana firman Allah subhaana wa taâ€™ala :Pada hari datangnya sebagian tanda-tanda kebesaran Tuhanmu tidaklah bermanfaat lagi Iman seseorang bagi dirinya sendiri yang belum beriman sebelum itu atau dia ( belum ) mengusahakan kebaikan pada Imannya ( Al-anâ€™am : 158 ).\r\nJuga sabda Rasulullah shallallahu â€˜alaihi wasallam : Tiga hal yang apabila telah keluar maka tidak bermanfaat lagi iman seseorang bagi dirinya yang belum beriman sebelum itu atau belum mengusahakan kebaikan pada imannya,  pertama : terbitnya matahari dari barat, kedua : keluarnya dajjal, ketiga : keluarnya hewan dari bumi yang dapat bercakap-cakap (H.R. Muslim).\r\n\r\nb. Sebelum  sakaratul maut,  sebagaimana firman Allah Subhaanahu Wa Taâ€™ala: Dan tidaklah taubat itu diterima oleh Allah dari orang-orang yang melakukan kejahatan ( yang ) apabila datang ajal bagi seseorang diantara mereka barulah mengatakan â€œSesungguhnya saya bertaubat sekarangâ€ ( An-Nisa : 18 )\r\nRasulullah T bersabda :  Sesungguhnya Allah menerima taubat hamba-Nya sebelum nafasnya tiba di kerongkongan ( sakaratul maut ) ( H.R. Ahmad dan dishahihkan oleh Al-Albaniy ).\r\nBahkan Allah swt akan mengganti segala keburukan orang-orang yang bertaubat dengan pahala di sisi-Nya, seperti firman-Nya : Kecuali bagi mereka yang bertaubat dan beriman serta beramal shaleh, maka bagi mereka Allah akan mengganti dosa-dosa mereka dengan kebaikan dan adalah Allah Maha Pengampun lagi Maha Penyayang. ( Q.S : Al-Furqan : 70 ).\r\nMaka dari itu bersegeralah wahai orang-orang yang mengharap ampunan Allah Subhaanahu Wa Taâ€™ala melakukan taubat nasuha sebelum bencana kematian datang menghalangi engkau darinya.\r\n', '778fa909ddcda6e120334a91665449e93ccdc00b', 'jpg', 'image/jpeg', 56817);

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
  MODIFY `idkomen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
