-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Mar 2020 pada 12.55
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
(1, 10, '1', 'tes', 'tes'),
(2, 10, '1', 'tes1', 'tes1');

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
(11, '1', 'maulana', 'Taubat', 'Taubat yang diperintahkan Allah Subhaanahu Wa Taâ€™ala  kepada manusia adalah Taubat Nasuha, sebagaimana firman-Nya  : Hai orang-orang yang beriman, bertaubatlah kepada Allah dengan taubat yang semurni-murninya, mudah-mudahan Tuhan kamu akan menghapus kesalahan-kesalahanmu dan memasukkan kamu ke dalam surga yang mengalir di bawahnya sungai-sungai. ( At-Tahrim : 8 )\r\n\r\nTaubat Nasuha itu memiliki lima syarat utama yaitu  :\r\n\r\nPertama : Ikhlas semata-mata karena Allah Subhanahu Wa Taâ€™ala  yaitu hendaknya yang menjadi pendorong taubatnya adalah cinta kepada Allah Subhanahu Wa Taâ€™ala , pengagungan, pengharapan dan  takut dari azabNya. Dia tidak menginginkan sesuatu yang bersifat duniawi seperti harta, kedudukan,  jabatan atau  kemuliaan dihadapan manusia.\r\n\r\nKedua : Hendaknya seseorang menyesal dan bersedih atas kemaksiatannya yang telah lalu disertai cita-cita  semestinya dia tidak pernah terjatuh dalam  pelanggaran tersebut.\r\n\r\nKetiga : Hendaknya dia langsung berhenti dari kemaksiatannya itu secara total. Yaitu apabila kemaksiatan itu dalam bentuk meninggalkan ketaatan atau kewajiban maka hendaklah dia segera melaksanakannya dan jika kewajiban itu masih dapat di qadha seperti Zakat, Puasa dan Haji maka segera dia meng-qadha nya. Akan tetapi jika kemaksiatan itu dalam bentuk mengerjakan perkara yang diharamkan Allah subhaanahu wa taâ€™ala maka hendaklah segera ditinggalkan, karena tidak sah taubat seseorang jika dia masih bergelimang dengan dosa-dosanya. Sebagai contoh : Jika seseorang menyatakan dirinya bertaubat dari riba lalu dia masih melakukan aktivitas riba tersebut, maka tidak sah taubatnya, bahkan taubatnya itu digolongkan sebagai bentuk istihzaâ€™ ( mengolok-olok ) Allah Subhanahu Wa Taâ€™ala  dan ayat-ayat-Nya.\r\n\r\nApabila kemaksiatan itu berhubungan dengan hak-hak manusia, maka tidak sah taubatnya hingga dia mengembalikan hak-hak tersebut kepada pemiliknya. Jika dia pernah mengambil harta orang lain maka taubatnya itu dengan mengembalikan harta tersebut kepada pemiliknya apabila masih hidup, akan tetapi jika telah meninggal dunia maka diserahkan kepada ahli warisnya. Dan jika ahli warisnya pun tidak kita temukan maka harta tersebut diserahkan ke Baitul Mal atau diinfakkan dengan niat pahalanya buat pemilik harta tersebut karena Allah Subhaanahu Wa Taâ€™ala Maha Tahu akan hal itu. Demikian pula jika maksiat tersebut dalam bentuk meng-ghibah seorang muslim maka wajib atasnya meminta penghalalan atas dosa tersebut jika orang yang di-ghibah tersebut telah mengetahui bahwa dia pernah di-ghibah. Akan tetapi jika orang yang di-ghibah tersebut belum mengetahuinya dan dia takut jika hal tersebut diketahui maka cukuplah dia ber-istighfar sambil memujinya dalam majelis di mana dia pernah meng-ghibah orang tersebut karena kebaikan itu menghapus keburukan.\r\n\r\nKeempat : Hendaknya dia ber-azam ( memiliki tekad yang kuat) untuk tidak kembali lagi kepada kemaksiatan itu pada hari-hari mendatang, karena ini merupakan buah dari taubat serta bukti akan benarnya niat orang yang bertaubat tersebut.\r\n\r\nKelima : Hendaklah taubat dilaksanakan sebelum pintu taubat tertutup dan ini ada dua bagian yaitu :\r\na. Sebelum terbitnya matahari dari barat, sebagaimana firman Allah subhaana wa taâ€™ala :Pada hari datangnya sebagian tanda-tanda kebesaran Tuhanmu tidaklah bermanfaat lagi Iman seseorang bagi dirinya sendiri yang belum beriman sebelum itu atau dia ( belum ) mengusahakan kebaikan pada Imannya ( Al-anâ€™am : 158 ).\r\nJuga sabda Rasulullah shallallahu â€˜alaihi wasallam : Tiga hal yang apabila telah keluar maka tidak bermanfaat lagi iman seseorang bagi dirinya yang belum beriman sebelum itu atau belum mengusahakan kebaikan pada imannya,  pertama : terbitnya matahari dari barat, kedua : keluarnya dajjal, ketiga : keluarnya hewan dari bumi yang dapat bercakap-cakap (H.R. Muslim).\r\n\r\nb. Sebelum  sakaratul maut,  sebagaimana firman Allah Subhaanahu Wa Taâ€™ala: Dan tidaklah taubat itu diterima oleh Allah dari orang-orang yang melakukan kejahatan ( yang ) apabila datang ajal bagi seseorang diantara mereka barulah mengatakan â€œSesungguhnya saya bertaubat sekarangâ€ ( An-Nisa : 18 )\r\nRasulullah T bersabda :  Sesungguhnya Allah menerima taubat hamba-Nya sebelum nafasnya tiba di kerongkongan ( sakaratul maut ) ( H.R. Ahmad dan dishahihkan oleh Al-Albaniy ).\r\nBahkan Allah swt akan mengganti segala keburukan orang-orang yang bertaubat dengan pahala di sisi-Nya, seperti firman-Nya : Kecuali bagi mereka yang bertaubat dan beriman serta beramal shaleh, maka bagi mereka Allah akan mengganti dosa-dosa mereka dengan kebaikan dan adalah Allah Maha Pengampun lagi Maha Penyayang. ( Q.S : Al-Furqan : 70 ).\r\nMaka dari itu bersegeralah wahai orang-orang yang mengharap ampunan Allah Subhaanahu Wa Taâ€™ala melakukan taubat nasuha sebelum bencana kematian datang menghalangi engkau darinya.\r\n', '778fa909ddcda6e120334a91665449e93ccdc00b', 'jpg', 'image/jpeg', 56817),
(12, '1', 'maulana', 'Kematian, Kepastian Bagi Tiap yang Bernyawa', 'Di alam ini, tak ada yang pasti kecuali kematian. Kematian, kata Ghazali, pasti, sedangkan yang lain tak ada yang pasti. Meskipun begitu, manusia cenderung abai dan tak hirau dengan kematian. Biasanya, manusia mengingat kematian jika kebetulan ada kereta jenazah lewat di depannya. Ia pun buru-buru ber-istirja`, inna lillah wa inna ilaihi raji`un.\r\n\r\nKematian (al-maut) menyerang siapa saja dan sering kali tiba-tiba (jaâ€™at fujâ€™atan). Maut merenggut nyawa orang  tua, anak-anak, orang biasa, orang hebat, dan siapa saja. Bahkan, menyerang pengantin baru pada malam pertama dan orang yang sedang pesta dan bergembira ria bersama keluarga dan orang-orang yang dicinta.\r\n\r\nâ€œKatakanlah, â€˜Sesungguhnya kematian yang kamu lari daripadanya, maka sesungguhnya kematian itu akan menemui kamu.â€™â€ (QS Al-Jum`ah [62]: 8). Karena wataknya yang seperti tak mengenal belas kasihan, kematian itu disebut oleh Nabi dengan istilah hadzim al-ladzdzaat, yakni penghancur kenikmatan dan kelezatan duniawi (HR Tirmidzi, Nasaâ€™i, dan Ahmad dari Abu Hurairah).\r\n\r\nSebagian ulama menyebutnya dengan istilah, mufarriq al-ahbab (yang menceraikan manusia dari orang-orang yang dicinta) dan musyattit al-jam`iyyah (yang memutuskan mansia dari kelompok sosialnya). Meskipun merupakan fenomena sehari-hari, manusia belum sepenuhnya mengetahui hakikat kematian itu. Menurut al-Ghazali, kematian itu bukan tak adanya hidup, melainkan berubahnya keadaan.\r\n\r\nIni berarti, dengan mati (kematian), bukanlah kehidupan itu tak ada. Kehidupan tetap ada, tetapi berubah dalam wujud (kehidupan) yang lain. Dalam al-â€˜Adl al-Ilahi, Murtadza Muthahhari menerangkan perbedaan kehidupan itu, yakni kehidupan dunia dan kehidupan akhirat.\r\n\r\nDikatakan, kehidupan dunia tak sejati karena masih bisa bercampur antara hak dan batil, kejujuran dan kepalsuan, serta antara pejuang dan pengkhianat. Ini berbeda dengan kehidupan akhirat yang disebutnya murni dan sejati. Firman Allah menyebutkan, â€œDan sesungguhnya akhirat itulah yang sebenarnya kehidupan kalau mereka mengetahui.â€ (QS al-Ankabut [29]: 64).\r\n\r\nDalam Alquran, kematian disebut dengan beberapa terma, antara lain, al-maut, al-wafah, al-ajal, dan al-ruju` yang secara harfiah berarti \'kembali.\'\r\n\r\nBila menunjuk kata yang terakhir, al-ruju`, kematian bisa dipahami sebagai proses perjalanan pulang menuju negeri akhirat, kampung halaman kita yang sebenarnya.\r\n\r\nSecara kejiwaan, pulang atau perjalanan pulang merupakan kegiatan paling menyenangkan karena setiap orang, menurut fitrahnya, ingin cepat-cepat pulang (kembali). Tradisi pulang kampung (mudik) sangat menyenangkan meski berdesak-desak dan macet sepanjang jalan. Jadi, kematian itu seperti â€œmudikâ€ ke tanah leluhur; mestinya menyenangkan, dengan satu syarat, tentu saja memiliki dan membawa bekal yang cukup, yaitu kebaikan (amal saleh).\r\n\r\nSebagai Muslim, kita mesti mampu memetik pelajaran dari setiap peristiwa kematian. Pertama, karena kematian pasti, kita mesti selalu mengingatnya dan menjadikannya sebagai nasihat. Kedua, karena kematian sejatinya merupakan perjalanan pulang, kita mesti meperbanyak bekal, ibadah, dan amal shaleh.\r\n\r\nKetiga, tidak boleh lupa, kita berdoa kepada Allah agar tidak kembali kehadirat-Nya kecuali dalam keadaan Islam. â€œDan, janganlah sekali-kali kamu mati melainkan dalam keadaan beragama Islam.â€ (QS Ali Imran [3]: 102). Wallahu a`lam!', 'b2f35a02230c201b2c64959c9997b8408161d544', 'jpg', 'image/jpeg', 81835),
(13, '1', 'maulana', 'Luangkan Waktumu untuk Membaca Al-Qurâ€™an!', 'Saudarikuâ€¦\r\nJangan karena kesibukan dan banyaknya kegiatan menjadikan kita lupa untuk membaca dan mentadaburi al-Qurâ€™an. Sesungguhnya ketenangan dan ketentraman dapat diperoleh dari Al-Qurâ€™an.\r\n\r\nHal ini berdasarkan firman Alloh, â€œIngatlah hanya dengan mengingat Alloh-lah hati menjadi tentram.â€ (Qs. ar-Raâ€™d: 28)\r\n\r\nDari Abdullah bin Masâ€™ud radiallohu â€˜anhu Rasululloh shallallahu â€˜alaihi wa sallam bersabda,\r\n\r\nâ€œBarang siapa yang membaca satu huruf dari Al-Qurâ€™an maka baginya kebaikan sepuluh kali lipat, aku tidak mengatakan Alif Lam Mim satu huruf akan tetapi Alif satu huruf, Lam satu huruf, Mim satu huruf.â€ (Shahih HR.Tirmidzi)\r\n\r\nDan bahkan, iri terhadap mereka yang telah mengamalkan Al-Qurâ€™an, dibolehkan. Dari Ibnu Umar radiallohu â€˜anhu yang meriwayatkan dari Nabi shallallahu â€˜alaihi wassallam bahwasannya beliau bersabda,\r\n\r\nâ€œTidak berlaku iri kecuali terhadap dua orang, seseorang yang dianugrahi Alloh Al-Qurâ€™an lantas dia mengamalkannya sepanjang malam dan sepanjang siang dan seseorang yang dianugerahi Alloh harta lantas dia menginfakkannya sepanjang malam dan sepanjang siang.â€ (HR. Bukhari dan Muslim)\r\n\r\nSelain itu terdapat permisalan yang baik bagi yang membaca Al-Qurâ€™an, karena Rasululloh pernah bersabda, â€œPermisalan seorang muslim yang membaca Al-Qurâ€™an bagaikan buah jeruk, baunya wangi dan rasanya lezat, sedangkan orang mukmin yang tidak membaca al-Qurâ€™an bagaikan buah kurma yang tidak ada baunya dan rasanya manis. Permisalan orang munafik yang membaca Al-Qurâ€™an bagaikan kemangi yang baunya wangi rasanya pahit, sedangkan orang munafik yang tidak membaca al-Qurâ€™an bagaikan labu yang tidak ad wanginya dan rasanya pahit.â€ (HR. Bukhari Muslim)\r\n\r\nTerdapat hikmah yang indah dari perkataan al-Ajuri rahimahullah,\r\n\r\nâ€œBarang siapa yang merenungi firman-Nya maka ia akan mengenal Rabbnya, akan mengetahui keutamaannya dibandingkan orang orang mukmin yang lain, dia akan menyadari kewajibannya dalam beribadah hingga senantiasa berusaha untuk menjaga kewajiban tersebut. Ia akan berhati-hati terhadap apa yang dilarang Rabb-Nya, mencintai apa yang dicintai-Nya. Barang siapa yang memiliki sifat yang demikian, ketika membaca al-Qurâ€™an dan ketika mendengarkanya, maka Al-Qurâ€™an akan menjadi penawar hatinya, ia akan merasa cukup tanpa harta, mulia tanpa kesulitan, lembut dalam menyikapi orang yang kasar padanya.\r\n\r\nOrang yang memiliki sifat demikian, ketika ia memulai membaca sebuah surat yang tergambar dibenaknya adalah sejauh mana  dia  dapat mengambil pelajaran terhadap yang dia baca. Tujuannya membaca Al-Qurâ€™an tidak semata-mata untuk mengkhatamkannya akan tetapi seberapa besar ia dapat memahami perintah Alloh dan mengambil pelajaran darinya. Membaca Al-Qurâ€™an adalah ibadah maka tidaklah pantas membacanya dengan hati yang kosong lagi lalai, dan Allah Taâ€™ala maha memberi taufik terhadap yang demikian.â€\r\n\r\nWahai saudariku, jangan sampai waktu kita tidak ada sedikitpun untuk membaca atau membaca Al-Qurâ€™an. Berusahalah, walaupun sedikit waktu tersisa.\r\n', '2674240039a2553033479f1898161346ad582e07', 'jpg', 'image/jpeg', 84619);

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `idtoken` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `iduser` int(11) NOT NULL,
  `dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`idtoken`, `token`, `iduser`, `dibuat`) VALUES
(1, 'XW7EHZlrPIBNBnNprsxCrSuYIyQtRQUDBMBBGRIPHSSYRQUSZWXVYVXVYZZZ', 1, '2020-03-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `email`, `password`, `status`) VALUES
(1, 'maulana', 'maulana.alirridlo@gmail.com', '$2y$10$yefMxAImfPWpkkf0oJXn1u5z8hsKPGK5bEegt8eNOjY1hvAw7ymRu', 'admin'),
(2, 'tes', 'newbie.0123456789101112@gmail.com', '$2y$10$nJCGHo6DOx/Di2stIQ3xy.Qy2zFddy872uyj25VKlXkHQLDARtrla', 'user');

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
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`idtoken`);

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
  MODIFY `idkomen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `idtoken` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
