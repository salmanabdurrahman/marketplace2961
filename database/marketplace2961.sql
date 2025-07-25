-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 25, 2025 at 03:24 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace2961`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'salman@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'Salman Abdurrahman, S.Kom');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int NOT NULL,
  `judul_artikel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `isi_artikel` text COLLATE utf8mb4_general_ci NOT NULL,
  `foto_artikel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `foto_artikel`) VALUES
(1, 'Kerajinan Tenun: Pengertian, Sejarah, dan Jenisnya', '<p>Negara-negara yang termasuk penenun kuno, antara lain Asia timur, India, dan Asia barat yang kemudian berkembang ke seluruh dunia.</p>\r\n\r\n<p>Di Indonesia sendiri, kepandaian bertenun sudah dikenal sejak beberapa abad sebelum masehi.</p>\r\n\r\n<p>Sebelum ada kebudayaan bertenun, masyarakat telah mengenal terlebih dahulu proses pembuatan anyaman dari daun atau serat kayu.</p>\r\n\r\n<p>Keterampilan ini menuntun mereka untuk mempelajari kerajinan tenun. Seiring berjalannya waktu, pengetahuan bertenun diterima dan berkembang di Indonesia.</p>\r\n\r\n<p>Perkembangan ini mengarah pada peningkatan mutu, keindahan tata warna, serta motif hiasan. Penyebaran keterampilan bertenun pun merata ke seluruh wilayah Indonesia.</p>\r\n\r\n<p>Motif yang terinspirasi berasal dari latar belakang budaya dan lingkungan daerah masing-masing. Ini memperlihatkan variasi yang sangat kaya dan indah.</p>\r\n', 'sejarah_kain_tenun.jpg'),
(2, 'Memahami Tentang Sejarah Batik Indonesia dan Ragam-ragamnya', '<p><strong>Sejarah batik</strong>&nbsp;di Indonesia, erat kaitannya dengan perkembangan dari Kerajaan Majapahit pada era penyebaran ajaran Islam di Pulau Jawa. Menurut beberapa catatan, pengembangan dari batik banyak dilakukan pada zaman Kesultanan Mataram, kemudian berlanjut pada zaman Kasunan Surakarta serta Kesultanan Yogyakarta.</p>\r\n\r\n<p>Keberadaan dari kegiatan batik tertua di Indonesia diketahui berasal dari Ponorogo dan bernama Wengker, sebelum akhirnya pada abad ketujuh, Kerajaan di Jawa Tengah belajari batik dari Ponorogo.</p>\r\n\r\n<p>Batik merupakan kain yang dilukis dengan menggunakan cairan lilin malam dengan menggunakan sebuah alat bernama canting, dengan lilin dan canting tersebut, para pengrajin menggambar dan melukis di sebuah kain hingga membuat kain tersebut bernilai tinggi. Batik telah ada sejak zaman kerajaan dan terus berkembang hingga sekarang. Bagaimana sejarah batik di Indonesia? Simak penjelasannya di sini ya!</p>\r\n', 'sejarah_kain_batik.jpg'),
(3, '7 Tips Membeli Bahan Kain yang Bagus untuk Bisnis Pakaian', '<p>Salah satu langkah penting dalam membuat usaha konveksi adalah memilih bahan kain yang tepat. Bahan kain tak hanya memengaruhi harga jual produk, tetapi juga menciptakan rasa nyaman atau tidak saat digunakan.&nbsp;</p>\r\n\r\n<p>Dengan banyaknya jenis bahan kain di pasaran, penting untuk memastikan kain yang digunakan memenuhi standard kualitas Anda. Berikut ini beberapa tips membeli bahan kain yang bagus sebelum memulai usaha pakaian.&nbsp;</p>\r\n\r\n<h2>Pahami Jenis Bahan Kain&nbsp;</h2>\r\n\r\n<p>Kalau nggak tau jenis dan fungsinya, Anda akan sulit mengetahui jenis bahan apa yang paling cocok untuk usaha Anda. pasalnya, setiap jenis kain memiliki karakteristik yang unik, contohnya:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Polyester punya bahan yang kuat, tahan lama, dan tidak mudah kusut sehingga cocok digunakan sebagai bahan pakaian olahraga.&nbsp;</li>\r\n	<li>Katun terbuat dari serat alami sehingga karakteristiknya lembut, nyaman, dan mudah disetrika sehingga bisa digunakan untuk pakaian bayi.&nbsp;</li>\r\n	<li>Denim memiliki bahan yang kuat dan tahan lama, kerap digunakan untuk celana atau jaket.</li>\r\n	<li>Jersey memiliki karakteristik kain yang elastis dan lembut. Biasa digunakan untuk pakaian olahraga hingga jilbab instan.&nbsp;</li>\r\n</ul>\r\n\r\n<p>Jadi, pastikan kenali dengan baik jenis-jenis kain dan fungsinya. Contoh, ingin memulai bisnis pakaian anak, sebaiknya pilih jenis kain yang menyerap keringat.&nbsp;</p>\r\n\r\n<p>Baca juga: &#39;<a href=\"https://www.lalamove.com/id/blog/jenis-kain-untuk-usaha-konveksi/\" target=\"_blank\">Kenali Jenis-Jenis Kain Sebelum Membuka Usaha Konveksi&#39;</a></p>\r\n\r\n<h2>Cek Tekstur dan Kualitas Serat&nbsp;</h2>\r\n\r\n<p>Saat memilih kain untuk bisnis pakaian, jangan lupa untuk merasakan tekstur dan kualitasnya. Salah satu ciri kain berkualitas adalah bahannya yang lembut, halus, dan nyaman di kulit. Jika ingin pakaian nyaman, hindari tekstur kain kasar, kaku, atau licin. Pastikan serat kain memiliki tenunan yang rapat sehingga lebih kuat dan tak mudah robek.</p>\r\n\r\n<h2>Beli Sample Kain&nbsp;</h2>\r\n\r\n<p>Jika belum yakin dengan jenis kain yang akan dibeli, cobalah untuk membeli sampelnya terlebih dahulu. Banyak toko kain&nbsp;<em>online&nbsp;</em>dan&nbsp;<em>offline&nbsp;</em>yang menjual potongan kain kecil dari berbagai jenis bahan untuk membantu Anda menilai tekstur, kualitas, dan ketebalan kain sebelum beli dalam jumlah besar.&nbsp;</p>\r\n\r\n<h2>Uji Ketahanan Kain&nbsp;</h2>\r\n\r\n<p>Tips selanjutnya, uji elastisitas dan kekuatan jenis bahan kain yang akan Anda pilih. Caranya dengan menarik sedikit bagian kain untuk mengetahui apakah kain yang digunakan tahan lama dalam penggunaan sehari-hari atau tidak.&nbsp;</p>\r\n\r\n<p>Baca juga: &#39;<a href=\"https://www.lalamove.com/id/blog/peluang-usaha-kain-kiloan/\" target=\"_blank\">Simak Peluang Usaha Kain Kiloan di Bandung, Cocok untuk Pemula</a></p>\r\n\r\n<h2>Bikin Sample Pakaian dari Berbagai Jenis Bahan&nbsp;</h2>\r\n\r\n<p>Sebelum memproduksi pakaian dalam jumlah besar, dan mengecek kualitas kain yang akan digunakan, lakukan uji coba terlebih dahulu. Anda bisa membuat&nbsp;<em>sample&nbsp;</em>pakaian dari beberapa jenis bahan pilihan. Lalu, gunakan pakaian tersebut dalam beberapa minggu untuk mengetahui kualitasnya.&nbsp;</p>\r\n\r\n<h2>Hitung Anggaran yang Disiapkan&nbsp;</h2>\r\n\r\n<p>Sebelum membeli kain, hitung kebutuhan Anda berdasarkan jenis dan jumlah pakaian yang akan diproduksi. Hati-hati dalam menyetok kain dalam jumlah banyak, apalagi jika bisnis baru mulai.&nbsp;</p>\r\n\r\n<p>Ketahui cara menghitung kebutuhan kain. Salah satu metode yang paling umum digunakan untuk pelaku bisnis konveksi pemula adalah menggunakan&nbsp;<em>chart&nbsp;</em>perkiraan kebutuhan bahan. Dilansir dari&nbsp;<a href=\"https://blog.knitto.co.id/cara-praktis-hitung-kebutuhan-kain-kaos/\" target=\"_blank\">knitto.co.id</a>, Anda bisa memakai perkiraan kebutuhan bahan pada umumnya. Seperti kain Combed 30s dengan berat 1 KG dapat diolah menjadi 5 kaos ukuran L&nbsp;<em>size&nbsp;</em>lokal.&nbsp;</p>\r\n\r\n<h2>Beli Kain di Tempat Terpercaya&nbsp;</h2>\r\n\r\n<p>Tips selanjutnya adalah beli kain di tempat terpercaya. Pilih toko kain yang lengkap, dari pilihan warna, motif, dan jenis bahannya. Pastikan toko tersebut memiliki layanan&nbsp;<em>customer service&nbsp;</em>yang baik, dan menyediakan layanan&nbsp;<em>online&nbsp;</em>untuk memudahkan proses pembelian. Terlebih lagi jika Anda tinggal beda kota dari toko kain langganan.&nbsp;</p>\r\n\r\n<p>Contohnya, Kota Bandung terkenal sebagai kawasan yang diburu oleh pelaku bisnis pakaian karena menjadi salah satu pusat tekstil di Indonesia. Anda bisa menemukan banyak toko kain berkualitas di kota ini, dengan beragam pilihan harga sehingga dapat disesuaikan dengan&nbsp;<em>budget.&nbsp;</em></p>\r\n', 'ciri_kain_yg_bagus1.jpeg'),
(5, '5 Tips Cerdas Memilih Baju Online Agar Pas di Badan', '<p>Teknologi yang semakin maju dan berkembang memudahkan khalayak berbelanja tanpa perlu pergi keluar rumah atau datang ke toko fisik untuk membeli barang yang diinginkan.</p>\r\n\r\n<p>Apalagi kalau toko daring atau online shop langganan sedang gencar menggelar diskon hingga flash sale dengan harga super miring. Kalau sudah begini, pertempuran mendapatkan barang-barang edisi terbatas atau &quot;limited edition&quot; menjadi sukar dielak.</p>\r\n\r\n<p>Namun, ada sisi negatifnya di balik belanja secara daring, apalagi jika belanja baju. Ada kalanya, baju tidak sesuai ukuran, warnanya tidak seperti di gambar atau pengirimannya yang lambat dan lain sebagainya.</p>\r\n\r\n<p>Terkadang, pakaian baru yang sudah dibeli tampak kurang cocok saat dicoba setelah pesanan sampai di rumah.</p>\r\n\r\n<p>Salah satu pedagang busana di salah satu e-commerce dengan akun kafka.project, Friska ketika dihubungi di Jakarta, Selasa memberikan tips agar berbelanja busana benar-benar disukai dan cocok saat dicoba di rumah.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pertama, pastikan ukuran baju mencakup ukuran, lingkar dada, pinggang, dan panjang baju. Dengan begitu bisa diketahui apakah baju dimaksud sesuai dengan tubuh atau tidak.</p>\r\n\r\n<p>&quot;Ukuran S, M, L, dan XL setiap brand bisa berbeda-beda. Jangan langsung menyimpulkan suatu ukuran tertentu sesuai dengan tubuh kamu,&quot; katanya.</p>\r\n\r\n<p>Selain itu, perhatikan ulasan pembeli sebelumnya. Meski sudah terpikat dengan salah satu busana atau barang yang dituju di website e-commerce, perhatikan komentar-komentarnya. Apakah para pembeli sebelumnya itu mengeluhkan barang di toko daring atau sebaliknya menunjukkan kepuasan.</p>\r\n\r\n<p>&quot;Memperhatikan komentar dapat membatu kamu menilai tentang barang yang dijual oleh online shop tersebut,&quot; kata Friska.</p>\r\n\r\n<p>Ketiga, memilih bahan baju yang dituju. Jangan tergoda oleh gambar yang disajikan pemilik toko daring. Cari tahu, apakah bahannya sesuai dengan yang diinginkan atau tidak.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Keempat, memperhatikan persyaratan-persyaratannya. Jika barang tidak sesuai, apakah boleh dikembalikan atau menukar dengan barang yang lain, atau pengembalian uang jika barang tak tersedia.</p>\r\n\r\n<p>&quot;Jangka waktu pengiriman hingga sampai ke tangan pembeli juga harus diperhatikan,&quot; katanya.</p>\r\n\r\n<p>Kelima, bersiap menerima kenyataan bahwa busana yang dipesan memang terkadang berbeda dengan warna baju di layar gadget atau komputer.</p>\r\n\r\n<p>&quot;Intinya cermat sebelum membeli sehingga barang yang dipesan sesuai harapan,&quot; katanya.</p>\r\n\r\n<p>Saran senada disampaikan Febi Mega, perempuan yang sehari-hari melayani jasa titip (jastip) pakaian bermerek mengatakan, pembeli harus memperhatikan detail pakaian sebelum dibeli.</p>\r\n\r\n<p>&quot;Detail itu baik ukurannya, bahannya, detail lipatan baju juga kalau perlu tahu,&quot; ujarnya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Setelah yakin, pembeli bisa langsung memesan di website toko online dimaksud. Jika tidak sempat, pembeli bisa memesan pakaian melalui jasa titip yang kini juga tengah ramai di kalangan jual-beli online.</p>\r\n\r\n<p>&quot;Pilih jastip yang terpercaya supaya tidak &#39;zonk&#39;,&quot; ujar pemilik akun online @fbway tersebut.</p>\r\n\r\n<p>Sumber: PORTALMADURA.COM | Berita Madura Terkini.<br />\r\n<a href=\"https://portalmadura.com/5-trik-cerdas-belanja-baju-secara-online-agar-tak-kecewa-133717/\">https://portalmadura.com/5-trik-cerdas-belanja-baju-secara-online-agar-tak-kecewa-133717/</a></p>\r\n', 'download_(2)1.jpeg'),
(6, 'Tips Merawat Gadget Agar Awet dan Tidak Mudah Rusak', '<p>Sudah berapa kali kamu mengganti gadget selama 2 tahun terakhir ini? Ingin mengganti gadget baru, namun harga gadget lama anjlok karena rusak? Tak sayangkah kamu dengan gadget yang dibeli dengan harga jutaan rupiah tersebut hanya berfungsi sebentar saja?</p>\r\n\r\n<p>Gadget merupakan hal yang sangat penting karena senantiasa digunakan untuk berbagai kegiatan sehari-hari. Berbagai informasi dan data seperti foto, catatan,&nbsp;<em>voice note</em>, nomor telepon penting, hingga dokumen tak jarang disimpan pada gadget. Namun, apa jadinya jika gadget tersebut rusak?</p>\r\n\r\n<p>Memiliki gadget yang awet tentunya keinginan setiap orang, apalagi jika itu dibeli dengan harga yang cukup mahal. Lalu bagaimanakah cara merawat gadget agar awet, tetap mulus, dan tidak mudah rusak? Berikut merupakan tipsnya yang bisa kamu coba.</p>\r\n', 'download_(3).jpeg'),
(7, 'Sering Beraktivitas di Rumah, Coba 5 Ide Dekorasi Ini Untuk Ganti Suasana', '<p>&nbsp;<a href=\"https://www.tempo.co/tag/dekorasi\">Dekorasi</a>&nbsp;ruangan menjadi salah satu kegiatan yang banyak dilakukan masyarakat selama pandemi, termasuk bagi pasangan muda yang baru menikah. &ldquo;Selama pandemi, transaksi subkategori Furniture di&nbsp;<a href=\"https://www.tempo.co/tag/tokopedia\">Tokopedia</a>&nbsp;meningkat hampir 2 kali lipat, jika dibandingkan periode sebelum pandemi,&rdquo; kata Category Development Lead Tokopedia, Fifa Italia dalam keterangan pers yang diterima Tempo pada 16 Oktober 2020.</p>\r\n\r\n<p>&ldquo;Rak tanaman, kursi, kasur lipat, meja tamu dan lemari pakaian menjadi produk furnitur paling dicari di Tokopedia selama pandemi,&rdquo; tambahnya.</p>\r\n\r\n<p>Berikut beberapa inspirasi dekorasi dari Tokopedia.</p>\r\n\r\n<ol>\r\n	<li><strong>Etnik Indonesia</strong><br />\r\n	Nuansa tradisional pada hunian dapat diciptakan dengan menambahkan dekorasi etnik khas Indonesia. Ukiran kayu, ornamen sejarah, motif budaya tradisional, seperti hiasan wayang atau kerajinan tangan khas daerah tertentu dapat menjadi pilihan penghias&nbsp;<a href=\"https://www.tempo.co/tag/rumah\">rumah</a>&nbsp;berkonsep etnik Indonesia.<br />\r\n	<br />\r\n	Produk wewangian seperti aromaterapi atau essential oil juga bisa memperkuat nuansa hunian bergaya etnik, contohnya produk dari Kemayu and Co yang beraroma khas Indonesia. Pegiat usaha lokal ini mengalami kenaikan transaksi di Tokopedia sebesar lebih dari 8 kali lipat selama pandemi.<br />\r\n	&nbsp;</li>\r\n	<li><strong>Japanese Minimalist</strong><br />\r\n	Konsep rumah minimalis ala Jepang mengusung fungsionalitas dan gaya hidup modern, serta didominasi elemen kayu dan bambu. Dekornata adalah UMKM penghasil produk perabotan rumah dari kayu. Selama pandemi, transaksinya di Tokopedia meningkat lebih dari 2 kali lipat.<br />\r\n	&nbsp;</li>\r\n	<li><strong>Bohemian Home</strong><br />\r\n	Perpaduan furnitur lama dan baru menjadi salah satu kekhasan Bohemian. Bantal sofa, tirai hingga karpet yang memiliki motif unik dapat dimanfaatkan untuk menciptakan tampilan gaya ini.<br />\r\n	<br />\r\n	Mendekor bisa menjadi pilihan untuk menemukan berbagai furnitur yang dapat menunjang gaya Bohemian. UMKM lokal ini mencatat lonjakan transaksi sebesar hampir 3 kali lipat di Tokopedia.<br />\r\n	&nbsp;</li>\r\n	<li><strong>Victorian Home</strong><br />\r\n	Gaya Victorian menggabungkan desain kontemporer-modern dan tradisional, cocok dengan konsep desain rumah segala tipe. Konsep elegan dan mewah khas Victorian bisa diterapkan lewat produk kreator lokal, misal ZEN Porcelain Tableware. Penghasil piring porselen ini mengalami kenaikan transaksi di Tokopedia hampir 13 kali lipat selama pandemi.<br />\r\n	&nbsp;</li>\r\n	<li><strong>Scandinavian Home</strong><br />\r\n	Dekorasi interior rumah ala Scandinavian, yang mengusung konsep bersih dan putih, bisa menjadi pilihan untuk menampilkan kesan minimalis. Penggunaan cat putih yang memberikan kesan luas bisa dilengkapi dengan pemakaian furnitur berwarna cokelat untuk memberikan kesan hangat dan elegan bergaya Scandinavian.<br />\r\n	<br />\r\n	Masyarakat bisa mendapatkan berbagai perabotan rumah tangga ala Japanese Scandinavian lewat Dekoruma Official Store. Pegiat usaha lokal ini mencatat kenaikan transaksi menjadi hampir 9 kali lipat di Tokopedia selama pandemi jika dibandingkan periode sebelum pandemi. Demi siapkan kebutuhan akan produk rumah tangga, Tokopedia berkolaborasi dengan Bridestory menghadirkan Home Living SALEbrations selama 15-25 Oktober 2020.</li>\r\n</ol>\r\n', 'Ubah_Suasana_Rumah_dengan_3_Ide_Dekorasi_Simpel.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `foto_kategori`) VALUES
(1, 'Fashion Wanita', 'fashion-wanita.jpeg'),
(2, 'Sparepart Motor', 'sparepart-motor.jpeg'),
(6, 'Fashion Pria', 'fashion-pria.jpeg'),
(7, 'Komputer', 'komputer.jpeg'),
(8, 'Makanan', 'Makanan.jpeg'),
(9, 'Minuman', 'Minuman.jpeg'),
(14, 'Kesehatan & Kecantikan', 'Kesehatan_Kecantikan.jpeg'),
(15, 'Elektronik', 'Elektronik.jpeg'),
(16, 'Rumah & Dapur', 'Rumah_Dapur.jpeg'),
(17, 'Olahraga & Outdoor', 'Olahraga_Outdoor.jpeg'),
(18, 'Bayi & Anak', 'Bayi_Anak.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int NOT NULL,
  `id_member_jual` int NOT NULL,
  `id_member_beli` int NOT NULL,
  `id_produk` int NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_member_jual`, `id_member_beli`, `id_produk`, `jumlah`) VALUES
(40, 6, 3, 11, 1),
(45, 2, 1, 3, 2),
(46, 5, 1, 18, 1),
(49, 5, 11, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int NOT NULL,
  `email_member` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_member` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_member` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_member` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `wa_member` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_distrik_member` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_distrik_member` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `email_member`, `password_member`, `nama_member`, `alamat_member`, `wa_member`, `kode_distrik_member`, `nama_distrik_member`) VALUES
(1, 'arif@amikom.ac.id', 'bb6113797d13f9451665a7591e5943986f546dfa', 'Arif Nur Rohman, M.kom', 'Purwomartani Kalasan Sleman', '081234567890', '31538', 'PURWO MARTANI, KALASAN, SLEMAN, DI YOGYAKARTA'),
(2, 'lanesra@amikom.ac.id', 'a5375c7f48244c8f4876ee6f97bbda4d91fe1665', 'Lanesra', 'Jl. Anggajaya 2 No.300, Tegal Rejo', '081328921993', '31400', 'TEGALREJO, TEGALREJO, YOGYAKARTA, DI YOGYAKARTA'),
(3, 'ujangronda@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Ujang Ronda', 'Bandung', '0812132412414', '22', 'Kabupaten Bandung (Jawa Barat)'),
(4, 'asepbensin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Asep Bensin', 'Tangerang', '0812137436353', '455', 'Kabupaten Tangerang (Banten)'),
(5, 'nina@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Nina Bobo', 'Bantul', '0812196452463', '39', 'Kabupaten Bantul (DI Yogyakarta)'),
(6, 'cecep@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Cecep Surecep', 'Jl. Diponegoro, Keprabon, Kec. Banjarsari', '081234567890', '445', 'Kota Surakarta (Solo) (Jawa Tengah)'),
(7, 'nanang@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Nanang Boneng', 'Lombok', '081328921993', '241', 'Kabupaten Lombok Utara (Nusa Tenggara Barat (NTB))'),
(11, 'susi@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Susi', 'Jln. Abimanyu No. 123', '081234567890', '31538', 'PURWO MARTANI, KALASAN, SLEMAN, DI YOGYAKARTA');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `id_member` int NOT NULL,
  `id_kategori` int NOT NULL,
  `nama_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga_produk` int NOT NULL,
  `foto_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi_produk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `berat_produk` int NOT NULL,
  `diskon` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_member`, `id_kategori`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `berat_produk`, `diskon`) VALUES
(2, 1, 1, 'Mukena Travel Dewasa Silky', 200000, 'mukena_travel.jpeg', 'Mukena Dewasa SIlky Premium Traveling 2 in 1 Lasercut Free Sejadah Mukenah Daily\r\n\r\nBahan : Silky Impor Premium \r\n   Karakteristik Bahan : Tidak Mudah Kusut , Lembut , Tidak Menerawang ,Warna Mengkilap, Sedikit Tebal \r\n⚫Paket : Mukena (Atasan+Bawahan) + Tas\r\n⚫Wajah Tidak Menggunakan Karet\r\n⚫Ikat Kepala Menggunakan Tali Ikat\r\n⚫Atasan Dan Bawahan Di Lasercut Mewah\r\n\r\n\r\n Size :\r\n\r\n -Panjang depan mukena -+135cm\r\n\r\n -Panjang belakang mukena -+130cm\r\n\r\n -Panjang rok mukena -+117cm\r\n\r\n -Lingkar rok mukena -+150cm \r\nTerima kasih! ', 176, 0),
(3, 2, 1, 'Rok Plisket Bludru', 50000, 'rok_beludru.jpeg', 'ROK PLISKET BLUDRU PENDEK (7/8) \r\n\r\nNEW NEW NEW!!! ???\r\nBahan Bludru premium, bahan tebal, halus, lembut,mayung juga dan bukan abal-abal ya kak?\r\n\r\nRok ini Best Seller banget looh ?karena bahannya mewah dan nyaman banget buat dipakai sehari-hari, maupun buat hangout ?Ayo lengkapi koleksi kamu?GERCEP YA KAK??\r\n\r\nDETAIL PRODUK :\r\n-Nama bahan Bludru Premium\r\n-Tekstur bahan halus, lembut glowing & glossy. \r\n-Pinggang karet sangat elastis kuat & kokoh. \r\n-Rok di plisket full depan belakang. \r\n\r\nDETAIL SIZE/UKURAN : -/+\r\n-All Size L fit to XXL\r\n-Pj Rok                    : 75 cm\r\n-Lingkar pinggang : 60 cm setelah melar di tarik full bisa 115 cm. \r\n-Lingkar bawah     : 150 cm Mayung seperti di foto sampul produk. \r\n\r\n\r\n1Kg muat 3-4pcs\r\nJANGAN SAMPAI KEHABISAN YA KAK?KARENA BEST SELLER BANGET ', 200, 10),
(4, 2, 1, 'Outer Brokat Ollaa long', 80000, 'outer_brokat.jpeg', 'Outer Brukat Olla Sangat Cantik, Simpel, dan Elegan Untuk Di Bawa Ke Acara Kondangan Dan Di bawa Untuk Jalan Jalan Juga Sangat Rekomen. Motif disesuaikan dengan stok kami yaa\r\n\r\n\r\nSize : ALL SIZE\r\nLingkar Dada : 110CM\r\nPanjang Baju : 120CM\r\n\r\nDi bagian pinggir ada tali yang bisa diatur untuk besar kecilnya sehingga bisa menyesuaikan dengan bentuk badan.', 150, 0),
(5, 1, 6, 'Kemeja Hijau', 130000, 'kemeja_hijau.jpeg', 'Kemeja Dover Olive lengan panjang adalah pilihan wajib untuk pria yang ingin tampil rapi dan stylish di berbagai acara. Dengan warna olive yang elegan, kemeja ini memberikan kesan maskulin, modern, dan classy.\r\n\r\n\r\n\r\n✅ Acara Non-Formal – Tampilan kasual yang tetap rapi dan berkarakter.\r\n\r\n✅ Acara Semi-Formal – Memberikan kesan stylish tanpa berlebihan.\r\n\r\n✅ Acara Formal – Membuatmu terlihat lebih elegan dan profesional.\r\n\r\n\r\n\r\nDidesain dengan fitting yang pas untuk postur pria Indonesia, memastikan kenyamanan dan tampilan terbaik di setiap kesempatan.\r\n\r\n\r\n\r\nFitur Utama:\r\n\r\n✔ 100% High Quality Soft Cotton Rami – Kain premium yang lembut, adem, dan nyaman dipakai seharian.\r\n\r\n✔ Kantong Dada Multifungsi – Praktis untuk menyimpan barang kecil dengan mudah.\r\n\r\n\r\n\r\nKombinasi sempurna antara kenyamanan, gaya, dan kepercayaan diri! \r\n\r\n\r\n\r\nSizechart: Lokal Size (Setara ukuran kemeja pada umumnya)\r\n\r\n\r\n\r\n[ A: Panjang Badan, B: Lebar Badan, C: Panjang Lengan]\r\n\r\n\r\n\r\nS= A : 70cm,  B:48cm, C : 58cm\r\n\r\nM= A : 73cm, B : 51cm, C : 60cm\r\n\r\nL= A : 76cm, B : 54cm, C : 62cm\r\n\r\nXL= A : 79cm, B : 57cm, C : 64cm\r\n\r\nXXL =A : 82CM, B:60cm, C: 66cm\r\n\r\n\r\n\r\nNote: Toleransi -/+ 2cm\r\n\r\n\r\n\r\nPerkiraan Size Berdasarkan Tinggi & Berat Badan :\r\n\r\nTinggi Badan 145-155cm, Berat Badan atau 40-55kg pakai size S/28 \r\n\r\nTinggi Badan 156-165cm, Berat Badan atau 56-65kg pakai size M/30\r\n\r\nTinggi Badan 166-175cm, Berat Badan atau 66-75kg pakai size L/32\r\n\r\nTinggi Badan 176-185cm, Berat Badan atau 76-85kg pakai size XL/34\r\n\r\n\r\n\r\nCatatan:\r\n\r\nJika ada perbedaan size antara berat badan dan tinggi badan, silahkan pilih ukuran yang terbesar.\r\n\r\n\r\n\r\nKenapa harus belanja di Guten Inc?\r\n\r\n1) Bangga Lokal, Gaya Internasional: 100% brand lokal dengan desain produk yang kece dan bakalan bikin kamu tampil lebih percaya diri.\r\n\r\n2) Kualitas Premium, Harga Bersahabat : Penjualan produk udah ratusan ribu pcs sebagai bukti kalo produk Guten Inc itu awet dan berkualitas dengan harga yang ramah di kantong.\r\n\r\n3) Diskon Terus? Ada Dong! Kamu gak perlu nunda buat beli produk Guten Inc, Guten Inc selalu ngadain promo menarik buat kamu yang pengen tampil stylish tanpa bikin kantong bolong.\r\n\r\n4) Belanja Happy, Dapat Hadiah : Guten Inc selalu memberikan loyalitas kepada pembeli dengan minimal belanja di nominal tertentu, kamu bakalan bisa dapetin hadiah yang menarik!\r\n\r\n5) Garansi Puas : Belanja di Guten Inc, tenang aja. Kalau ada masalah produk seperti produk salah kirim, produk cacat, dan produk yang dikirim kurang tinggal komplain aja!*. (S&K berlaku)\r\n\r\n\r\n\r\n*Syarat dan Ketentuan :\r\n\r\n1. Ajukan proses refund dengan sopan disertai dengan video unboxing yang lengkap supaya customer service bisa membantu kamu dengan senang hati dan percaya jika memang ada buktinya.\r\n\r\n2. Berikan bintang dan review yang bagus di ulasan produk sebagai bukti kalau kamu selalu memberikan dukungan yang terbaik kepada Guten Inc.\r\n\r\n\r\n\r\n#kemejapanjang #kemejapria #kemejakantor #kemejakasual #kemejalenganpanjang #kemejakuning #guten #Guten Inc', 220, 10),
(8, 1, 6, 'Rompi Anti Peluru', 900000, 'rompi_peluru.jpeg', 'Rompi anti peluru level 3A\r\n\r\nspesifikasi Nij Standart 0101.06\r\n\r\nMampu menahan peluru kaliber 9mm atau .44 Magnum\r\n\r\nmerk armoguard lite\r\n\r\n\r\n\r\nkelengkapan \r\n\r\n- Rompi \r\n\r\n- kevlar depan dan belakang level 3A\r\n\r\n- Tas', 800, 0),
(9, 1, 1, 'Jedda Knit Abaya', 300000, 'Jedda_Knit_Abaya.jpeg', 'Loose abaya dari material knit dengan karakteristik flowy, dan dengan ketebalan bahan yang pas. Busui friendly dengan zipper di bagian depan dress dan tentunya wudlu friendly. Abaya yang nyaman sehingga bisa digunakan untuk daily.\r\n\r\n\r\n\r\nMaterial : Knit\r\n\r\n\r\n\r\nPanjang baju 135 cm\r\n\r\nLingkar dada 158 cm\r\n\r\nLingkar dress 200 cm\r\n\r\n\r\n\r\nPetunjuk Perawatan\r\n\r\nCuci dengan tangan\r\n\r\nHindari menjemur di bawah sinar matahari langsung\r\n\r\nSetrika dengan tempratur rendah\r\n\r\n\r\n\r\nNote\r\n\r\nWarna produk pada model memiliki tone warna yang lebih terang karena faktor pencahayaan saat pemotretan\r\n\r\nWarna real produk dapat dilihat pada foto detail produk\r\n\r\nMohon sertakan video dan foto invoice atau label pengiriman sebagai bukti unboxing apabila mengajukan komplain', 182, 0),
(10, 5, 6, 'Gamis Pakistan', 140000, 'gamis_pakistan.jpeg', 'READY SETELAN KOKO DEWASA model pakistan (Sudah termasuk BAJU + CELANA)\r\nKode : SETELAN PAKISTAN DEWASA\r\n\r\n\r\nBAHAN BESHWAY, PREMIUM HIGH QUALITY\r\n\r\nSize\r\nM: bahu 46, dada 56, pjg 90, pjg lengan 55 cm, pjg celana 96 cm\r\nL: bahu 50, dada 58, pjg 92, pjg lengan 58 cm, pjg celana 99 cm\r\nXL: bahu 52, dada 60, pjg 96, pjg lengan 60 cm, pjg celana 101 cm\r\nToleransi jahitan 1-2cm\r\n\r\nSebelum membeli harap perhatikan size dan ukuran dalam centimeter\r\n\r\n\r\n\r\n#bajukokomurah #bajukoko #bajumuslim #bajumuslimpremium #bajumuslimpria #bajukokolebaran #bajukokopria #setelankoko #setelankokodewasa #setelanpakistan #bajupakistan #setelanpakistandewasa #setelanpakistanpria #bajugamispria #kurtapria #bajulebaran #bajuumroh #bajuumrohpria\r\n\r\nTerima kasih!', 189, 0),
(11, 6, 7, 'Lenovo Ideapad Slim 5', 13000000, 'lenovo_ideapad_slim_5.jpeg', 'LENOVO IDEAPAD SLIM 5 14 OLED RYZEN AI 7 350 24GB 512GB W11+OHS+M365B 14.0WUXGA 2Y PREM+2ADP GRY -4EID\r\nLENOVO IDEAPAD SLIM 5 14 OLED RYZEN AI 7 350 24GB 512GB W11+OHS+M365B 14.0WUXGA 2Y PREM+2ADP BLU -4FID\r\n\r\n\r\nNo. MTM : 83HX004EID (Luna Grey), 83HX004FID (Cosmic Blue)\r\n*silahkan tambah catatan pesanan jika ingin request warna\r\n\r\n\r\nSpesifikasi unit :\r\nProcessor : AMD Ryzen AI 7 350 (8C / 16T, 2.0 / 5.0GHz, 8MB L2 / 16MB L3)\r\nRAM : 24GB, 2x 12GB SO-DIMM DDR5-4800, dual-channel\r\nStorage : 512GB SSD M.2 2242 PCIe 4.0x4 NVMe\r\nVGA : Integrated AMD Radeon 860M Graphics + AMD Ryzen AI, up to 50 TOPS\r\nDisplay : 14\" WUXGA (1920x1200) OLED 400nits Glossy, 100% DCI-P3, DisplayHDR True Black 500\r\nSistem Operasi : Windows 11 Home Single Language, English + Microsoft 365 Basic + Office Home 2024\r\nWarna : Luna Grey & Cosmic Blue\r\nKamera : FHD 1080p + IR with Privacy Shutter, ToF Sensor\r\nAudio : Stereo speakers, 2W x2, optimized with Dolby Audio\r\nFingerprint : None\r\n\r\n\r\nAntarmuka :\r\n1x USB-A (USB 5Gbps / USB 3.2 Gen 1)\r\n1x USB-A (USB 5Gbps / USB 3.2 Gen 1), Always On\r\n2x USB-C (USB 10Gbps / USB 3.2 Gen 2), with USB PD 3.0 and DisplayPort 1.4\r\n1x HDMI 2.1, up to 4K/60Hz\r\n1x Headphone / microphone combo jack (3.5mm)\r\n1x microSD card reader\r\nKeyboard : Backlit, English\r\nBluetooth BT5.4\r\nWLAN: Wi-Fi 7, 802.11be 2x2\r\nBattery : 60Wh\r\nAdapter : 65W USB-C Slim (Wall-mount)\r\nDimensi : 313.4 x 222 x 16.9 mm\r\nBerat : 1.39 kg\r\n\r\n\r\nKelengkapan Unit :\r\nUnit Laptop\r\nPower Adapter\r\nKartu Garansi\r\nBox / Dus Laptop\r\nTas Lenovo\r\n\r\n\r\nJenis Garansi : GARANSI RESMI 2 TAHUN PREMIUM CARE + ACCIDENTAL DAMAGE PROTECTION LENOVO INDONESIA', 1200, 0),
(12, 4, 7, 'Samsung A56', 6000000, 'xiomi.png', 'Ini adalah deskripsi', 1000000, 0),
(13, 3, 15, 'SAMSUNG MESIN CUCI 1TABUNG WA 80H4200', 3000000, '293ef44e-d382-4ce9-9ed0-18109c490c58.jpg', 'Spesifikasi\r\nWashing Capacity (kg)\r\n8.0kg\r\nDrum type\r\nDiamond Drum\r\nPulsator\r\nWobble\r\nNet Dimension (WxHxD)\r\n540x850x560mm\r\n\r\nSpesifikasi Samsung WA80H4200SW\r\nBasic Info\r\nKonsumsi Daya 330 Watt\r\nKecepatan Putar 700 rpm\r\nFungsi Mencuci\r\nJumlah Tabung 1 Tabung', 1500, 0),
(14, 3, 15, 'BLENDER PHILIPS HR2221 2LTR 2X', 766000, '15327180_227c361a-8261-4603-9810-b6785f1beca3_700_700.jpeg', 'Spesifikasi :\r\n• 350 Watt\r\n• Kapsitas Tabung 2L & Efektif 1.5L\r\n• 2 Tahun Garansi Resmi\r\n• Pisau Baja Anti Karat\r\n• 5 Kecepatan + 2\r\n.Warna lavender + hijau\r\n¤ 5 pengaturan prasetel untuk hasil yang mudah dan andal ¤\r\n\r\nDengan 5 setelan kecepatan, dirancang untuk memberikan tekstur yang sempurna, mulai dari smoothie hingga sup dan saus\r\n\r\n¤ Es hancur sempurna, 2x lebih cepat ¤\r\n\r\nFungsi penghancur es yang kuat, didukung teknologi ProBlend Crush menghasilkan es yang sempurna dan lembut untuk smoothie dingin dan makanan penutup yang segar, 2x lebih cepat\r\n\r\n¤ Dengan tombol Bersih cepat agar cepat & mudah dibersihkan ¤\r\n\r\nDengan tombol Bersih cepat untuk membersihkan blender dengan cepat dan mudah.\r\n\r\nTOLONG DIBACA DULU YA\r\n\r\n1. Pengiriman barang pakai KURIR TOKO (demi menjaga kualitas barang sampai ke tangan pembeli)\r\n\r\n2. Pengiriman Tokopedia seperti GOJEK.GRAB.JNE hanya mengirimkan nota/kwitansi pembelian\r\n\r\n3. Pengiriman dan estimasi biaya (mohon d tanyakan/chat/diskusi terlebih dahulu)\r\n\r\n4. Ongkir toko bayar cash/transfer k kurir toko\r\n\r\n5. Mohon barang di cek/periksa saat barang sudah sampai dan segera lakukan konfirmasi penerimaan\r\n\r\nSelamat berbelanja. tq', 1000, 0),
(15, 3, 15, 'Miyako wd190ph', 200000, '0d2e2759c57c4a02be51a8208df14ca0~.jpeg', 'Fitur Utama :\r\n- Fungsi : Hot Normal\r\n- Tangki anti karat\r\n- Mesin tidak berisik\r\n- Kapasitas Air Panas / Normal : 3.5 L\r\n- Kapasitas Air Dingin : -\r\n- Daya : 350 W\r\n- Tegangan : 220 VAC\r\n- Suhu Panas : 91 C\r\n- Suhu Dingin : -\r\n- Ukuran Box : 354 x 338 x 545\r\n- Isi Container 20 / 40 / 40 HC : 384 / 816 / 816\r\n \r\nIsi Produk;\r\n- 1 unit WD-190H Dispenser Miyako Hot\r\n- Kartu Garansi resmi Miyako', 1000, 0),
(16, 3, 15, 'LED TV Xiaomi Mi TV A2 32 Inch Digital Smart', 2200000, '9d4cb0d2-2aff-4fdf-87ed-08d9f595ff86.jpg', 'Display\r\n\r\nDisplay Type: HD\r\nResolution: 1,366 × 768\r\nColor depth: 16.7M\r\nRefresh rate: 60Hz\r\nViewing angle: 178°(H)/178°(V)\r\n\r\nSpeaker\r\n\r\nSpeaker (Sound Output): 2 × 10W\r\nSupports Dolby Audio , DTS-X and DTS Virtual:X Sound\r\n\r\nOperating System\r\n\r\nAndroid TV\r\n\r\nProcessor\r\n\r\nCPU: CA55 × 4\r\nGPU: Mali G31 MP2\r\n\r\nContent\r\n\r\nNetflix, Prime Video and Youtube pre-installed\r\nThousands of apps available in Google Play\r\n\r\nSmart Home\r\n\r\nGoogle Assistant built-in\r\nSmart home control hub\r\nChromecast built-in\r\nSupports Miracast\r\n\r\nDesign\r\n\r\nSize: 32\"\r\nLimitless display with no-bezel\r\nColor: Black\r\nStand: Double\r\nPower button', 1200, 0),
(17, 5, 16, 'Rak Dapur Tertutup Higienis Super Kuat Lemari', 400000, '2ea39e96-399e-4557-b324-10e8db673ac7.jpg', 'Keunggulan Produk\r\n* Rak Piring Tertutup di design dengan anti debu dan Anti Jamur aman untuk meletakan makanan dalam jangka panjang.\r\n* Menggunakan Lapisan bahan Baja Canai Dingin, Anti Gores, Anti Karat , Lapisan Fosfat dan Lapisan\r\nEpoksi sudah power coating\r\n* Tahan Lembab dan Rayap\r\n* Menggunakan Pintu Flip-UP dengan soft close Magnet\r\n* Mudah dirakit Ulang\r\n* mampu Menahan Beban dengan Kuat\r\n* Include Roda 4 pcs\r\n\r\nDetail Ukuran Produk :\r\n\r\nTinggi x Lebar x Lebar Dalam\r\n\r\n* 3 layer 60 x 35 x 80\r\n* 3 layer 100 x 35x 80\r\n* 4 layer 60 x 35 x 112\r\n* 4 layer 80 x 35 x 112\r\n* 4 layer 90x35x112\r\n* 4 layer 100x35x112\r\n* 5 layer 60x35x144\r\n* 5 layer 80x35x144\r\n* 5 layer 90x35x144\r\n* 5 layer 1000x35x144\r\n* 6 layer 80x35x175\r\n* 6 layer 90x35x175\r\n* 6 layer 1000x35x175\r\n\r\n*barcode video tutorial Pemasangan sudah kita sediakan di kemasan*\r\n\r\nKelengkapan Paket\r\n*1 Buah Rak Piring Knock Down\r\n*1 Buah Obeng Installasi\r\n*Baut Installasi', 1000, 0),
(18, 5, 16, 'QME - Panci set marble Antilengket Peralatan Masak 3PCS', 400000, 'a568016a966f45c9adaa24f33f6a2e6e~.jpeg', 'Ini adalah deskripsi', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int NOT NULL,
  `caption_slider` text COLLATE utf8mb4_general_ci NOT NULL,
  `foto_slider` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `caption_slider`, `foto_slider`) VALUES
(1, 'Flash Sale at Our Marketplace 70%', 'banner_flash_sale1.jpeg'),
(2, 'Introducing Our New Season', 'banner_pengenalan_olshop.png'),
(4, '<p>Koleksi Baru, Gaya Baru</p>\r\n', 'pexels-cottonbro-6068971.jpg'),
(6, '<p>Gratis Ongkir ke Seluruh Negeri</p>\r\n', 'pexels-ketut-subiyanto-4246217.jpg'),
(7, '<p>Diskon Spesial Bulan Ini!</p>\r\n', 'pexels-kampus-7843972.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `kode_transaksi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_member_beli` int NOT NULL,
  `id_member_jual` int NOT NULL,
  `tanggal_transaksi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `belanja_transaksi` int NOT NULL,
  `status_transaksi` enum('pesan','lunas','batal','dikirim','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pesan',
  `ongkir_transaksi` int NOT NULL,
  `total_transaksi` int NOT NULL,
  `bayar_transaksi` int NOT NULL,
  `distrik_pengirim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pengirim` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `wa_pengirim` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_pengirim` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `distrik_penerima` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_penerima` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `wa_penerima` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_penerima` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_ekspedisi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `layanan_ekspedisi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estimasi_ekspedisi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `berat_ekspedisi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `resi_ekspedisi` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `snap_token` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_member_beli`, `id_member_jual`, `tanggal_transaksi`, `belanja_transaksi`, `status_transaksi`, `ongkir_transaksi`, `total_transaksi`, `bayar_transaksi`, `distrik_pengirim`, `nama_pengirim`, `wa_pengirim`, `alamat_pengirim`, `distrik_penerima`, `nama_penerima`, `wa_penerima`, `alamat_penerima`, `nama_ekspedisi`, `layanan_ekspedisi`, `estimasi_ekspedisi`, `berat_ekspedisi`, `resi_ekspedisi`, `snap_token`) VALUES
(1, '', 1, 2, '2025-03-11 08:19:15', 100000, 'pesan', 20000, 120000, 120000, 'Bantul', 'Lanesra', '08990423789', 'Bambanglipuro No 12 Bantul', 'Sleman', 'Arif Nur Rohman', '089530168889', 'Purwomartani Rt 4 Kalasan Sleman', 'JNE', 'Kilat', '1 Hari', '1000', NULL, ''),
(6, '202506240133244481', 2, 5, '2025-06-24 01:33:24', 420000, 'batal', 7000, 427000, 427000, '39', 'Nina Bobo', '0812196452463', 'Bantul', '419', 'Lanesra', '081328921993', 'Jl. Anggajaya 2 No.300, Sanggrahan, Condongcatur, Kec. Depok', 'Jalur Nugraha Ekakurir (JNE)', 'JNE City Courier', '7000', '567', NULL, ''),
(7, '202506240136338265', 2, 1, '2025-06-24 01:36:33', 2700000, 'lunas', 40000, 2740000, 2740000, '419', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', '419', 'Lanesra', '081328921993', 'Jl. Anggajaya 2 No.300, Sanggrahan, Condongcatur, Kec. Depok', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '40000', '2400', 'JNE-12345', ''),
(8, '202506240138069824', 2, 1, '2025-06-24 01:38:06', 300000, 'lunas', 11000, 311000, 311000, '419', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', '419', 'Lanesra', '081328921993', 'Jl. Anggajaya 2 No.300, Sanggrahan, Condongcatur, Kec. Depok', 'Jalur Nugraha Ekakurir (JNE)', 'JNE City Courier', '11000', '182', 'JNE-123', '794bf8e9-a377-45c4-a368-70ec043473b1'),
(9, '202506271352128040', 4, 1, '2025-06-27 13:52:12', 430000, 'lunas', 41000, 471000, 471000, '419', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', '455', 'Asep Bensin', '0812137436353', 'Tangerang', 'Jalur Nugraha Ekakurir (JNE)', 'Yakin Esok Sampai', '41000', '402', NULL, ''),
(10, '202506271516388226', 2, 5, '2025-06-27 15:16:38', 420000, 'lunas', 40000, 460000, 460000, '39', 'Nina Bobo', '0812196452463', 'Bantul', '419', 'Lanesra', '081328921993', 'Jl. Anggajaya 2 No.300, Sanggrahan, Condongcatur, Kec. Depok', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '40000', '567', NULL, ''),
(11, '202506271535085470', 2, 1, '2025-06-27 15:35:08', 3900000, 'lunas', 44000, 3944000, 3944000, '419', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', '419', 'Lanesra', '081328921993', 'Jl. Anggajaya 2 No.300, Sanggrahan, Condongcatur, Kec. Depok', 'Jalur Nugraha Ekakurir (JNE)', 'JNE City Courier', '44000', '3382', NULL, ''),
(12, '202506291638255561', 6, 1, '2025-06-29 16:38:25', 790000, 'lunas', 12000, 802000, 802000, '419', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', '445', 'Cecep Surecep', '081234567890', 'Jl. Diponegoro, Keprabon, Kec. Banjarsari', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '12000', '714', NULL, ''),
(13, '202506291642342162', 6, 2, '2025-06-29 16:42:34', 50000, 'batal', 12000, 62000, 62000, '419', 'Lanesra', '081328921993', 'Jl. Anggajaya 2 No.300, Sanggrahan, Condongcatur, Kec. Depok', '445', 'Cecep Surecep', '081234567890', 'Jl. Diponegoro, Keprabon, Kec. Banjarsari', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '12000', '200', NULL, ''),
(14, '202506291646395008', 6, 1, '2025-06-29 16:46:39', 200000, 'lunas', 15000, 215000, 215000, '419', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', '445', 'Cecep Surecep', '081234567890', 'Jl. Diponegoro, Keprabon, Kec. Banjarsari', 'Jalur Nugraha Ekakurir (JNE)', 'Yakin Esok Sampai', '15000', '176', NULL, ''),
(15, '202506291656323274', 6, 2, '2025-06-29 16:56:32', 160000, 'lunas', 15000, 175000, 175000, '419', 'Lanesra', '081328921993', 'Jl. Anggajaya 2 No.300, Sanggrahan, Condongcatur, Kec. Depok', '445', 'Cecep Surecep', '081234567890', 'Jl. Diponegoro, Keprabon, Kec. Banjarsari', 'Jalur Nugraha Ekakurir (JNE)', 'Yakin Esok Sampai', '15000', '300', 'JNE-122', ''),
(16, '202506291708558500', 6, 1, '2025-06-29 17:08:55', 300000, 'pesan', 45000, 345000, 345000, '419', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', '445', 'Cecep Surecep', '081234567890', 'Jl. Diponegoro, Keprabon, Kec. Banjarsari', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '45000', '182', NULL, ''),
(17, '202506291719419787', 6, 5, '2025-06-29 17:19:41', 140000, 'lunas', 12000, 152000, 152000, '39', 'Nina Bobo', '0812196452463', 'Bantul', '445', 'Cecep Surecep', '081234567890', 'Jl. Diponegoro, Keprabon, Kec. Banjarsari', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '12000', '189', NULL, ''),
(18, '202506291726446100', 1, 1, '2025-06-29 17:26:44', 300000, 'pesan', 40000, 340000, 340000, '419', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', '419', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '40000', '182', NULL, ''),
(19, '202506291730546968', 1, 2, '2025-06-29 17:30:54', 50000, 'lunas', 7000, 57000, 57000, '419', 'Lanesra', '081328921993', 'Jl. Anggajaya 2 No.300, Sanggrahan, Condongcatur, Kec. Depok', '419', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', 'Jalur Nugraha Ekakurir (JNE)', 'JNE City Courier', '7000', '200', 'TRX-123', ''),
(20, '202506291733355661', 4, 6, '2025-06-29 17:33:35', 13000000, 'lunas', 55000, 13055000, 13055000, '445', 'Cecep Surecep', '081234567890', 'Jl. Diponegoro, Keprabon, Kec. Banjarsari', '455', 'Asep Bensin', '0812137436353', 'Tangerang', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '55000', '1200', NULL, ''),
(21, '202506291740038527', 4, 1, '2025-06-29 17:40:03', 130000, 'batal', 18000, 148000, 148000, '419', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', '455', 'Asep Bensin', '0812137436353', 'Tangerang', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '18000', '220', NULL, ''),
(22, '202506301601047678', 3, 1, '2025-06-30 16:01:04', 2700000, 'lunas', 50000, 2750000, 2750000, '419', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', '22', 'Ujang Ronda', '0812132412414', 'Bandung', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '50000', '2400', NULL, ''),
(23, '202506301643184818', 3, 1, '2025-06-30 16:43:18', 180000, 'lunas', 50000, 230000, 230000, '419', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', '22', 'Ujang Ronda', '0812132412414', 'Bandung', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '50000', '360', NULL, ''),
(24, '202506301742059065', 3, 2, '2025-06-30 17:42:05', 50000, 'lunas', 18000, 68000, 68000, '419', 'Lanesra', '081328921993', 'Jl. Anggajaya 2 No.300, Sanggrahan, Condongcatur, Kec. Depok', '22', 'Ujang Ronda', '0812132412414', 'Bandung', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '18000', '200', NULL, ''),
(25, '202507010404525703', 2, 3, '2025-07-01 04:04:52', 766000, 'lunas', 18000, 784000, 784000, '22', 'Ujang Ronda', '0812132412414', 'Bandung', '419', 'Lanesra', '081328921993', 'Jl. Anggajaya 2 No.300, Sanggrahan, Condongcatur, Kec. Depok', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '18000', '1000', NULL, ''),
(26, '202507041530272461', 7, 5, '2025-07-04 15:30:27', 400000, 'lunas', 60000, 460000, 460000, '39', 'Nina Bobo', '0812196452463', 'Bantul', '241', 'Nanang Boneng', '081328921993', 'Lombok', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '60000', '1000', NULL, ''),
(27, '202507080406184569', 2, 3, '2025-07-08 04:06:18', 766000, 'lunas', 18000, 784000, 784000, '22', 'Ujang Ronda', '0812132412414', 'Bandung', '419', 'Lanesra', '081328921993', 'Jl. Anggajaya 2 No.300, Sanggrahan, Condongcatur, Kec. Depok', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '18000', '1000', 'JNE-456', ''),
(28, '202507251512051286', 2, 1, '2025-07-25 15:12:05', 1200000, 'lunas', 35000, 1235000, 1235000, 'PURWO MARTANI, KALASAN, SLEMAN, DI YOGYAKARTA', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', 'TEGALREJO, TEGALREJO, YOGYAKARTA, DI YOGYAKARTA', 'Lanesra', '081328921993', 'Jl. Anggajaya 2 No.300, Tegal Rejo', 'Lion Parcel', 'Big Package Service', '3-4 day', '982', NULL, ''),
(29, '202507251522349842', 11, 1, '2025-07-25 15:22:34', 351000, 'lunas', 9000, 360000, 360000, 'PURWO MARTANI, KALASAN, SLEMAN, DI YOGYAKARTA', 'Arif Nur Rohman, M.kom', '081234567890', 'Purwomartani Kalasan Sleman', 'PURWO MARTANI, KALASAN, SLEMAN, DI YOGYAKARTA', 'Susi', '081234567890', 'Jln. Abimanyu No. 123', 'Ninja Xpress', 'Standard Service', '', '660', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_produk` int NOT NULL,
  `nama_beli` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `jumlah_beli` int NOT NULL,
  `jumlah_rating` int DEFAULT NULL,
  `ulasan_rating` text COLLATE utf8mb4_general_ci,
  `waktu_rating` datetime DEFAULT NULL,
  `diskon_beli` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `id_produk`, `nama_beli`, `harga_beli`, `jumlah_beli`, `jumlah_rating`, `ulasan_rating`, `waktu_rating`, `diskon_beli`) VALUES
(1, 1, 1, 'Hijab segi empat', 50000, 1, NULL, NULL, NULL, 0),
(2, 1, 2, 'Mukena Travel Dewasa Silky', 50000, 1, NULL, NULL, NULL, 0),
(3, 5, 8, 'Rompi Anti Peluru', 900000, 10, NULL, NULL, NULL, 0),
(4, 5, 5, 'Kemeja Hijau', 130000, 1, NULL, NULL, NULL, 0),
(5, 5, 9, 'Jedda Knit Abaya', 300000, 1, NULL, NULL, NULL, 0),
(6, 6, 10, 'Gamis Pakistan', 140000, 3, NULL, NULL, NULL, 0),
(7, 7, 8, 'Rompi Anti Peluru', 900000, 3, 4, 'Recommended dibeli, jaga-jaga takut ada peluru nyasar', '2025-07-01 02:15:56', 0),
(8, 8, 9, 'Jedda Knit Abaya', 300000, 1, 3, 'Mantap banget kata ilham', '2025-06-30 17:38:15', 0),
(9, 9, 9, 'Jedda Knit Abaya', 300000, 1, NULL, NULL, NULL, 0),
(10, 9, 5, 'Kemeja Hijau', 130000, 1, NULL, NULL, NULL, 0),
(11, 10, 10, 'Gamis Pakistan', 140000, 3, NULL, NULL, NULL, 0),
(12, 11, 9, 'Jedda Knit Abaya', 300000, 1, 5, 'Bagus banget', '2025-06-30 17:31:02', 0),
(13, 11, 8, 'Rompi Anti Peluru', 900000, 4, 4, 'Next beli lagi', '2025-06-30 17:31:02', 0),
(14, 12, 9, 'Jedda Knit Abaya', 300000, 1, NULL, NULL, NULL, 0),
(15, 12, 1, 'Hijab segi empatt', 90000, 1, NULL, NULL, NULL, 0),
(16, 12, 2, 'Mukena Travel Dewasa Silky', 200000, 2, NULL, NULL, NULL, 0),
(17, 13, 3, 'Rok Plisket Bludru', 50000, 1, NULL, NULL, NULL, 0),
(18, 14, 2, 'Mukena Travel Dewasa Silky', 200000, 1, NULL, NULL, NULL, 0),
(19, 15, 4, 'Outer Brokat Ollaa long', 80000, 2, NULL, NULL, NULL, 0),
(20, 16, 9, 'Jedda Knit Abaya', 300000, 1, NULL, NULL, NULL, 0),
(21, 17, 10, 'Gamis Pakistan', 140000, 1, NULL, NULL, NULL, 0),
(22, 18, 9, 'Jedda Knit Abaya', 300000, 1, NULL, NULL, NULL, 0),
(23, 19, 3, 'Rok Plisket Bludru', 50000, 1, NULL, NULL, NULL, 0),
(24, 20, 11, 'Lenovo Ideapad Slim 5', 13000000, 1, NULL, NULL, NULL, 0),
(25, 21, 5, 'Kemeja Hijau', 130000, 1, NULL, NULL, NULL, 0),
(26, 22, 8, 'Rompi Anti Peluru', 900000, 3, NULL, NULL, NULL, 0),
(27, 23, 1, 'Hijab segi empatt', 90000, 2, NULL, NULL, NULL, 0),
(28, 24, 3, 'Rok Plisket Bludru', 50000, 1, 5, 'Bagus banget, mamaku sukaaa', '2025-06-30 17:42:58', 0),
(29, 25, 14, 'BLENDER PHILIPS HR2221 2LTR 2X', 766000, 1, NULL, NULL, NULL, 0),
(30, 26, 17, 'Rak Dapur Tertutup Higienis Super Kuat Lemari', 400000, 1, NULL, NULL, NULL, 0),
(31, 27, 14, 'BLENDER PHILIPS HR2221 2LTR 2X', 766000, 1, 5, 'Keren kata bapakku', '2025-07-08 04:07:59', 0),
(32, 28, 8, 'Rompi Anti Peluru', 900000, 1, NULL, NULL, NULL, 0),
(33, 28, 9, 'Jedda Knit Abaya', 300000, 1, NULL, NULL, NULL, 0),
(34, 29, 5, 'Kemeja Hijau', 117000, 3, NULL, NULL, NULL, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
