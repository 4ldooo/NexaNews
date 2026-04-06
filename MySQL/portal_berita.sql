-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2026 at 10:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','editor') DEFAULT 'editor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `role`) VALUES
(1, 'aldo', '$2y$10$cS89av6YnibIJlqAiPwDgeCGePwMAqznNYgm1MNLT46HGASNIjb.S', 'admin'),
(6, 'zara', '$2y$10$OF6mLg/1rzqYW.PUjdG8WOtvPJMZRpLcRAaLWPxjjlPgk0Sw.8dlu', 'editor');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `gambar`, `tanggal`, `id_kategori`, `views`) VALUES
(1, 'Perkembangan AI Semakin Pesat di 2026, Ubah Cara Kerja dan Kehidupan Manusia', 'Perkembangan teknologi kecerdasan buatan atau Artificial Intelligence terus menunjukkan kemajuan pesat pada tahun 2026. Teknologi ini kini tidak hanya digunakan dalam bidang teknologi informasi, tetapi juga telah merambah berbagai sektor seperti kesehatan, pendidikan, hingga industri kreatif.\r\n\r\nDalam beberapa tahun terakhir, AI generatif menjadi sorotan utama. Teknologi ini mampu menghasilkan teks, gambar, hingga video secara otomatis dengan kualitas yang semakin menyerupai karya manusia. Hal ini mendorong perubahan besar dalam cara manusia bekerja dan berinteraksi dengan teknologi.\r\n\r\nSelain itu, perkembangan AI juga ditandai dengan meningkatnya kemampuan sistem dalam memahami bahasa manusia melalui teknologi Natural Language Processing (NLP). AI kini mampu memberikan respons yang lebih kontekstual, cepat, dan akurat dalam berbagai aplikasi digital.\r\n\r\nDi sektor industri, banyak perusahaan mulai mengadopsi AI untuk meningkatkan efisiensi kerja. Otomatisasi berbasis AI memungkinkan pekerjaan rutin dilakukan lebih cepat, sehingga manusia dapat fokus pada tugas yang lebih kompleks dan strategis. Hal ini menjadikan AI sebagai salah satu pendorong utama pertumbuhan ekonomi global saat ini.\r\n\r\nTak hanya itu, perkembangan AI juga menjadi perhatian dunia internasional. Dalam ajang AI Impact Summit 2026, para pemimpin dunia dan pelaku industri teknologi membahas pemanfaatan AI untuk kemajuan ekonomi sekaligus menyoroti pentingnya regulasi dan etika dalam penggunaannya.\r\n\r\nMeski membawa banyak manfaat, perkembangan AI juga menimbulkan tantangan baru, seperti potensi penyalahgunaan teknologi dan ancaman terhadap lapangan pekerjaan. Oleh karena itu, para ahli menekankan pentingnya kesiapan sumber daya manusia serta kebijakan yang tepat agar teknologi ini dapat dimanfaatkan secara optimal dan bertanggung jawab.\r\n\r\nDengan perkembangan yang semakin cepat, AI diprediksi akan terus menjadi teknologi kunci yang membentuk masa depan dunia di berbagai aspek kehidupan.', 'PERKEMBANGAN-AI.png', '2026-04-06 09:02:18', 1, 134),
(2, 'Tips Menjaga Kesehatan di Tengah Aktivitas Padat', 'Menjaga kesehatan menjadi hal yang sangat penting, terutama di tengah kesibukan aktivitas sehari-hari. Gaya hidup yang tidak seimbang dapat meningkatkan risiko berbagai penyakit, seperti Diabetes dan Hipertensi.\r\n\r\nSalah satu langkah utama dalam menjaga kesehatan adalah dengan menerapkan pola makan bergizi seimbang. Mengonsumsi makanan yang kaya akan serat, vitamin, dan mineral dapat membantu menjaga daya tahan tubuh. Selain itu, penting untuk membatasi konsumsi gula, garam, dan lemak berlebih.\r\n\r\nAktivitas fisik juga berperan penting dalam menjaga kebugaran tubuh. Olahraga ringan seperti Jogging atau Yoga secara rutin dapat membantu meningkatkan kesehatan jantung dan mengurangi stres.\r\n\r\nSelain itu, menjaga kualitas tidur yang cukup, sekitar 7–8 jam per hari, sangat penting untuk proses pemulihan tubuh. Kurang tidur dapat berdampak pada penurunan konsentrasi dan sistem imun.\r\n\r\nTidak kalah penting, menjaga kesehatan mental juga perlu diperhatikan. Mengelola stres dengan baik, meluangkan waktu untuk istirahat, serta melakukan aktivitas yang disukai dapat membantu menjaga keseimbangan emosional.\r\n\r\nPara ahli kesehatan menyarankan agar masyarakat mulai menerapkan gaya hidup sehat sejak dini. Dengan kebiasaan yang baik, risiko penyakit dapat diminimalkan dan kualitas hidup pun akan meningkat.', 'jaminan-kesehatan-nasional-adalah.jpg', '2026-04-06 09:02:18', 2, 93),
(3, 'Pendidikan di Era Digital: Transformasi Pembelajaran di Tengah Kemajuan Teknologi', 'Perkembangan teknologi digital telah membawa perubahan besar dalam dunia pendidikan. Di era modern ini, proses belajar tidak lagi terbatas pada ruang kelas, melainkan dapat dilakukan kapan saja dan di mana saja melalui berbagai platform digital.\r\n\r\nKemunculan berbagai aplikasi pembelajaran seperti Google Classroom dan Zoom memungkinkan interaksi antara guru dan siswa tetap berlangsung secara efektif meskipun tanpa tatap muka langsung. Hal ini menjadi salah satu bukti bahwa teknologi mampu memperluas akses pendidikan bagi masyarakat.\r\n\r\nSelain itu, konsep e-learning semakin berkembang dengan dukungan teknologi kecerdasan buatan atau Artificial Intelligence. AI membantu dalam memberikan rekomendasi materi belajar yang sesuai dengan kemampuan siswa, sehingga proses pembelajaran menjadi lebih personal dan efisien.\r\n\r\nNamun, di balik berbagai kemudahan tersebut, terdapat tantangan yang perlu dihadapi. Kesenjangan akses internet dan keterbatasan perangkat digital masih menjadi hambatan bagi sebagian masyarakat, terutama di daerah terpencil. Selain itu, penggunaan teknologi yang berlebihan juga dapat berdampak pada menurunnya interaksi sosial secara langsung.\r\n\r\nPara ahli pendidikan menekankan pentingnya keseimbangan antara pemanfaatan teknologi dan metode pembelajaran konvensional. Pendidikan di era digital diharapkan tidak hanya berfokus pada kecanggihan teknologi, tetapi juga tetap menanamkan nilai-nilai karakter, kreativitas, dan kemampuan berpikir kritis.\r\n\r\nDengan pemanfaatan yang tepat, teknologi digital dapat menjadi alat yang sangat efektif dalam meningkatkan kualitas pendidikan dan mempersiapkan generasi muda menghadapi tantangan masa depan.', 'pendidikan-eradigital.jpg', '2026-04-06 09:02:18', 3, 75),
(4, 'Real Madrid Tumbang Dramatis 1-2 dari Mallorca di La Liga', 'Klub raksasa Spanyol, Real Madrid, harus menelan kekalahan pahit saat menghadapi RCD Mallorca dalam lanjutan La Liga musim 2025/2026. Dalam pertandingan yang berlangsung di kandang Mallorca pada 4 April 2026, Los Blancos kalah dengan skor 1-2.\r\n\r\nSejak awal laga, Real Madrid tampil dominan dan menciptakan sejumlah peluang. Namun, justru Mallorca yang berhasil membuka keunggulan lebih dulu melalui gol Manu Morlanes pada menit ke-42. Gol tersebut membuat tim tuan rumah unggul 1-0 hingga babak pertama berakhir.\r\n\r\nMemasuki babak kedua, Real Madrid terus menekan pertahanan lawan. Upaya mereka akhirnya membuahkan hasil saat Éder Militão mencetak gol penyama kedudukan melalui sundulan pada menit ke-88.\r\n\r\nNamun, harapan Madrid untuk membawa pulang poin sirna di menit-menit akhir. Penyerang Mallorca, Vedat Muriqi, mencetak gol kemenangan pada masa injury time, memastikan skor akhir 2-1 untuk tuan rumah.\r\n\r\nKekalahan ini menjadi pukulan bagi Real Madrid dalam perburuan gelar juara, karena mereka gagal memperkecil jarak dengan pemuncak klasemen. Sementara itu, kemenangan penting ini membantu Mallorca menjauh dari zona degradasi.', 'rmvsmallo.jpg', '2026-04-06 09:02:18', 4, 666),
(5, 'Fenomena AI Mengubah Dunia Kerja di 2026', 'Perkembangan kecerdasan buatan atau AI semakin pesat di tahun 2026. Banyak perusahaan mulai mengadopsi teknologi ini untuk meningkatkan efisiensi kerja. Namun, di sisi lain, muncul kekhawatiran akan hilangnya lapangan pekerjaan bagi manusia. Para ahli menyarankan agar masyarakat mulai meningkatkan keterampilan digital agar tetap relevan di era teknologi ini.', 'OIP (1).webp', '2026-04-06 13:41:45', 1, 125),
(8, 'Startup Lokal Sukses Tembus Pasar Internasional', 'Sebuah startup asal Indonesia berhasil menembus pasar internasional dengan inovasi teknologi yang mereka kembangkan. Produk mereka mendapat respon positif dari berbagai negara dan menjadi bukti bahwa karya anak bangsa mampu bersaing di tingkat global.', 'download.webp', '2026-04-06 13:41:45', 1, 186),
(10, 'Pentingnya Menjaga Pola Tidur untuk Kesehatan', 'Kurang tidur dapat berdampak buruk bagi kesehatan tubuh dan mental. Para ahli menyarankan untuk tidur minimal 7-8 jam setiap malam agar tubuh dapat berfungsi dengan optimal. Selain itu, menghindari penggunaan gadget sebelum tidur juga dapat meningkatkan kualitas tidur.', 'Kenali-Pola-Tidur-yang-Baik-untuk-Kesehatan.jpg.webp', '2026-04-06 13:41:45', 2, 75),
(22, 'Persib Bungkam Semen Padang 2-0 di Laga Tandang', '<p>Padang &ndash; Persib Bandung sukses meraih kemenangan penting saat menghadapi Semen Padang FC dalam lanjutan kompetisi Super League 2025/2026. Bermain di Stadion Haji Agus Salim, Persib menang meyakinkan dengan skor 2-0.</p>\r\n\r\n<p>Pertandingan yang berlangsung pada Minggu (5/4/2026) ini memperlihatkan duel sengit sejak awal. Semen Padang sempat tampil agresif dan beberapa kali mengancam gawang Persib, namun lini pertahanan tim tamu tampil disiplin.</p>\r\n\r\n<p>Gol pertama Persib lahir pada menit ke-32 melalui striker andalan Ramon Tanque yang memanfaatkan umpan matang dari rekannya. Gol tersebut membuat Persib unggul 1-0 hingga babak pertama berakhir.</p>\r\n\r\n<p>Memasuki babak kedua, Persib semakin mendominasi permainan. Tekanan demi tekanan akhirnya kembali membuahkan hasil pada menit ke-70. Ramon Tanque kembali mencatatkan namanya di papan skor melalui sundulan, sekaligus memastikan kemenangan 2-0 bagi Maung Bandung.</p>\r\n\r\n<p>Semen Padang sendiri kesulitan menciptakan peluang berbahaya sepanjang pertandingan, sementara kiper Persib tampil solid menjaga gawang tetap clean sheet.</p>\r\n\r\n<p>Kemenangan ini membuat Persib semakin kokoh di puncak klasemen dengan raihan 61 poin, sekaligus menjaga peluang besar untuk meraih gelar juara musim ini.</p>\r\n', 'Hasil-akhir-BRI-Super-League-Semen-Padang-vs-Persib-Bandung-skor-0-2-dan-Klasemen.webp', '2026-04-07 02:36:27', 4, 0),
(23, 'Pemerataan Pendidikan dan Digitalisasi Jadi Fokus Nasional', '<p>Jakarta &ndash; Pemerintah Indonesia terus memperkuat kebijakan pendidikan, dengan upaya memperluas akses serta meningkatkan kualitas pembelajaran di seluruh wilayah tanah air.</p>\r\n\r\n<p>Pada awal April 2026, Wakil Presiden RI secara resmi melepas para <strong>Pejuang Digital</strong> yang akan mempercepat digitalisasi pendidikan di wilayah <em>3T</em> (tertinggal, terdepan, terluar). Program ini diharapkan menjadi bagian dari strategi nasional untuk menjamin pemerataan layanan pendidikan yang berkualitas bagi seluruh anak bangsa.</p>\r\n\r\n<p>Sebelumnya, gagasan program <strong>Sekolah Rakyat</strong> juga mendapat perhatian sebagai model pendidikan inklusif yang menekankan kesempatan belajar tanpa diskriminasi. Program ini dipandang sebagai salah satu langkah strategis pemerintah untuk mendorong pemerataan pendidikan di luar kawasan urban.</p>\r\n\r\n<p>Selain itu, komunitas anak muda di Yogyakarta melalui gerakan literasi juga aktif mengajak generasi muda untuk ikut serta mengawal pendidikan Indonesia agar lebih adil dan berdaya saing.</p>\r\n\r\n<h2>Regulasi Teknologi Pendidikan dan Kerja Sama Internasional</h2>\r\n\r\n<p>Pemerintah Indonesia baru‑baru ini menetapkan aturan bersama untuk penggunaan <strong>kecerdasan buatan (AI) dan teknologi digital di dunia pendidikan</strong>, dengan tujuan memastikan inovasi teknologi digunakan secara aman, etis, dan efektif dalam proses pembelajaran.</p>\r\n\r\n<p>Tak hanya itu, upaya diplomasi pendidikan juga terus diperkuat. Pemerintah menjalin kerja sama dengan negara lain dalam pengembangan pendidikan, termasuk kolaborasi dengan negara sahabat di bidang pendidikan dan ekonomi budaya guna meningkatkan mutu pendidikan di daerah.</p>\r\n\r\n<h2>Fokus Pemerintah pada Evaluasi Kebijakan Pendidikan</h2>\r\n\r\n<p>Presiden Republik Indonesia turut melakukan sejumlah pertemuan internal terkait isu pendidikan nasional, menegaskan bahwa sektor pendidikan tetap menjadi prioritas strategis dalam pembangunan sumber daya manusia Indonesia.</p>\r\n', 'istockphoto-1410480039-170667a.jpg', '2026-04-07 02:42:33', 3, 0),
(24, 'Persaingan Sengit Warnai Musim MotoGP 2026', '<p>Ajang balap motor paling bergengsi di dunia, MotoGP, kembali menyajikan persaingan yang semakin ketat pada musim 2026. Para pembalap top dunia menunjukkan performa terbaik mereka demi meraih gelar juara dunia di tengah persaingan pabrikan yang semakin kompetitif.</p>\r\n\r\n<p>Sejumlah tim unggulan seperti Ducati, Yamaha, dan Honda terus melakukan pengembangan pada motor mereka untuk meningkatkan performa di setiap seri. Teknologi aerodinamika, elektronik, serta strategi balapan menjadi faktor penting yang menentukan hasil di lintasan.</p>\r\n\r\n<p>Dalam beberapa seri terakhir, persaingan di papan atas klasemen berlangsung sangat ketat. Beberapa pembalap tampil konsisten dengan catatan podium yang stabil, sementara pembalap muda juga mulai menunjukkan taringnya dan memberikan kejutan di beberapa seri.</p>\r\n\r\n<p>Sirkuit-sirkuit ikonik seperti Mugello, Sachsenring, dan Mandalika menjadi saksi pertarungan sengit antar pembalap dengan karakter lintasan yang berbeda-beda. Setiap sirkuit memberikan tantangan tersendiri, mulai dari tikungan cepat hingga trek lurus panjang yang menguji kecepatan maksimal motor.</p>\r\n\r\n<p>Selain itu, faktor cuaca juga sering menjadi penentu dalam balapan MotoGP. Hujan yang tiba-tiba turun dapat mengubah strategi tim secara drastis, termasuk pemilihan ban dan pengaturan motor, yang berdampak besar pada hasil akhir lomba.</p>\r\n\r\n<p>Para penggemar MotoGP di seluruh dunia terus menantikan aksi-aksi menegangkan di setiap seri. Dengan persaingan yang semakin terbuka, musim ini diprediksi akan menghadirkan banyak kejutan hingga balapan terakhir.</p>\r\n\r\n<p>Dengan kombinasi antara skill pembalap, teknologi motor, dan strategi tim, MotoGP 2026 dipastikan akan menjadi salah satu musim paling menarik dalam sejarah balap motor dunia.</p>\r\n', 'simak_daftar_lengkap_pembalap_motogp_2026_hingga_september_2025-m9co_large.jpg', '2026-04-07 02:43:46', 4, 0),
(25, 'Ketegangan di Selat Hormuz Kembali Jadi Sorotan Dunia', '<p>Timur Tengah &ndash; Kawasan Selat Hormuz kembali menjadi pusat perhatian internasional di tengah meningkatnya ketegangan geopolitik. Jalur laut sempit yang menghubungkan Teluk Persia dengan Laut Arab ini merupakan salah satu rute perdagangan minyak paling vital di dunia.</p>\r\n\r\n<p>Dalam beberapa waktu terakhir, sejumlah insiden keamanan dilaporkan terjadi di wilayah tersebut, termasuk peningkatan aktivitas militer dari Iran dan patroli intensif oleh armada Amerika Serikat beserta sekutunya. Situasi ini memicu kekhawatiran akan potensi gangguan terhadap distribusi energi global.</p>\r\n\r\n<p>Selat Hormuz dilalui oleh sekitar sepertiga pasokan minyak dunia yang dikirim melalui jalur laut. Oleh karena itu, setiap ketegangan di kawasan ini berpotensi langsung memengaruhi harga minyak internasional dan stabilitas ekonomi global.</p>\r\n\r\n<p>Pemerintah Iran sebelumnya menyatakan bahwa mereka akan mengambil langkah tegas terhadap setiap ancaman di wilayah perairannya. Sementara itu, pihak Amerika Serikat menegaskan komitmennya untuk menjaga kebebasan navigasi dan keamanan jalur perdagangan internasional.</p>\r\n\r\n<p>Pengamat hubungan internasional menilai bahwa eskalasi di Selat Hormuz tidak hanya berkaitan dengan isu keamanan regional, tetapi juga mencerminkan persaingan geopolitik yang lebih luas antara kekuatan besar dunia.</p>\r\n\r\n<p>Hingga saat ini, komunitas internasional terus menyerukan deeskalasi dan dialog diplomatik guna mencegah konflik terbuka yang dapat berdampak luas, tidak hanya bagi kawasan Timur Tengah, tetapi juga bagi perekonomian global.</p>\r\n', 'Peta-Selat-Hormuz-di-wilayah-Iran-OK.webp', '2026-04-07 02:44:42', 5, 0),
(26, 'Pentingnya Menjaga Kesehatan di Era Modern dan Digital', '<p>Di tengah perkembangan teknologi dan gaya hidup modern, kesadaran masyarakat terhadap kesehatan semakin menjadi perhatian utama. Para ahli kesehatan mengingatkan bahwa perubahan pola hidup, seperti kurangnya aktivitas fisik dan meningkatnya konsumsi makanan instan, dapat berdampak serius pada kesehatan tubuh.</p>\r\n\r\n<p>Berbagai penyakit tidak menular seperti Diabetes Melitus, hipertensi, dan obesitas kini semakin banyak ditemukan, bahkan pada usia muda. Hal ini disebabkan oleh gaya hidup yang tidak seimbang, seperti kurang olahraga, stres berlebih, dan pola makan yang tidak teratur.</p>\r\n\r\n<p>Menurut para ahli, salah satu langkah pencegahan yang paling efektif adalah dengan menerapkan pola hidup sehat, seperti mengonsumsi makanan bergizi seimbang, rutin berolahraga, serta menjaga kualitas tidur. Aktivitas sederhana seperti berjalan kaki 30 menit setiap hari sudah dapat membantu menjaga kebugaran tubuh.</p>\r\n\r\n<p>Selain itu, kesehatan mental juga menjadi perhatian penting. Tekanan dari pekerjaan, pendidikan, maupun media sosial dapat memicu stres dan kecemasan. Oleh karena itu, penting untuk menjaga keseimbangan antara aktivitas fisik dan kesehatan mental, termasuk dengan istirahat yang cukup dan melakukan kegiatan yang menyenangkan.</p>\r\n\r\n<p>Di era digital, masyarakat juga semakin dimudahkan untuk mengakses informasi kesehatan melalui berbagai platform. Namun, para ahli mengimbau agar masyarakat tetap bijak dalam menyaring informasi dan hanya mengacu pada sumber yang terpercaya, seperti tenaga medis atau lembaga kesehatan resmi.</p>\r\n\r\n<p>Dengan menerapkan gaya hidup sehat secara konsisten, diharapkan masyarakat dapat terhindar dari berbagai penyakit dan meningkatkan kualitas hidup di masa depan.</p>\r\n', 'OIP (3).webp', '2026-04-07 02:46:10', 2, 0),
(27, 'Duel Raksasa Eropa: Real Madrid vs Bayern München di Perempat Final UCL 2026', '<p>Pertandingan panas akan tersaji di ajang <strong>UEFA Champions League 2025/2026</strong> saat Real Madrid berhadapan dengan Bayern M&uuml;nchen dalam laga perempat final yang sangat dinanti oleh pecinta sepak bola dunia.</p>\r\n\r\n<p>Laga leg pertama dijadwalkan berlangsung pada <strong>Rabu, 8 April 2026 pukul 02.00 WIB</strong> di <strong>Santiago Bernab&eacute;u</strong>, markas Real Madrid. Sementara itu, leg kedua akan digelar di kandang Bayern M&uuml;nchen, yaitu <strong>Allianz Arena</strong>, yang akan menjadi penentu siapa yang berhak melaju ke babak semifinal.</p>\r\n\r\n<p>Pertemuan dua klub raksasa ini bukanlah hal baru di Liga Champions. Keduanya memiliki sejarah panjang dengan banyak pertemuan sengit di fase gugur. Real Madrid, yang dikenal sebagai &ldquo;raja Eropa&rdquo;, tentu ingin mempertahankan dominasinya di kompetisi ini. Di sisi lain, Bayern M&uuml;nchen datang dengan ambisi besar untuk kembali mengangkat trofi setelah terakhir kali berjaya di beberapa musim sebelumnya.</p>\r\n\r\n<p>Dari sisi permainan, Real Madrid diperkirakan akan mengandalkan kombinasi pemain muda dan berpengalaman, dengan gaya bermain cepat serta serangan balik mematikan. Dukungan publik Bernab&eacute;u juga menjadi faktor penting yang bisa memberi tekanan tambahan kepada tim tamu.</p>\r\n\r\n<p>Sementara itu, Bayern M&uuml;nchen dikenal dengan permainan pressing tinggi dan disiplin taktik yang kuat. Tim asal Jerman ini memiliki lini serang tajam yang mampu mengancam pertahanan lawan kapan saja, terutama melalui skema serangan cepat dan bola-bola direct.</p>\r\n\r\n<p>Laga ini juga diprediksi akan berjalan dengan intensitas tinggi sejak menit awal. Kedua tim sama-sama memiliki kualitas individu pemain yang sangat baik, sehingga detail kecil seperti kesalahan lini belakang atau efektivitas penyelesaian akhir bisa menjadi penentu hasil akhir pertandingan.</p>\r\n\r\n<p>Dengan gengsi besar dan tiket semifinal sebagai taruhan, pertandingan antara Real Madrid dan Bayern M&uuml;nchen dipastikan akan menjadi salah satu laga paling menarik di Liga Champions musim ini. Para penggemar sepak bola tentu tidak ingin melewatkan duel klasik yang selalu menghadirkan drama dan kualitas permainan kelas dunia ini.</p>\r\n', 'Bayern-Munich-VS-Real-Madrid.webp', '2026-04-07 02:47:45', 4, 0),
(28, 'Krisis Politik di AS Memanas Jelang Pemilu 2026', '<p>Washington, D.C. &ndash; Dinamika politik di Amerika Serikat kembali memanas seiring mendekatnya pemilu nasional. Persaingan antara Partai Demokrat dan Partai Republik semakin tajam, terutama dalam isu ekonomi, imigrasi, dan kebijakan luar negeri.</p>\r\n\r\n<p>Presiden Joe Biden menghadapi tekanan besar dari oposisi terkait kondisi ekonomi domestik, khususnya inflasi dan biaya hidup yang masih tinggi. Di sisi lain, kubu Republik yang kembali menguat di parlemen terus mengkritik kebijakan fiskal pemerintah yang dianggap membebani anggaran negara.</p>\r\n\r\n<p>Salah satu isu paling kontroversial adalah kebijakan imigrasi di perbatasan selatan. Beberapa negara bagian menuntut kebijakan yang lebih ketat, sementara pemerintah federal berusaha menyeimbangkan antara keamanan dan aspek kemanusiaan.</p>\r\n\r\n<p>Selain itu, situasi semakin kompleks dengan keterlibatan Amerika Serikat dalam berbagai konflik global, termasuk dukungan terhadap Ukraina dalam menghadapi Rusia. Kebijakan luar negeri ini memicu perdebatan sengit di dalam negeri, terutama terkait anggaran bantuan militer.</p>\r\n\r\n<p>Nama Donald Trump juga kembali menjadi sorotan setelah secara aktif terlibat dalam kampanye politik. Kehadirannya memperkuat basis Partai Republik, namun sekaligus meningkatkan polarisasi di masyarakat.</p>\r\n\r\n<p>Pengamat menilai bahwa kondisi politik saat ini mencerminkan tingkat perpecahan yang tinggi di Amerika Serikat. Tidak hanya di kalangan elite politik, tetapi juga di masyarakat luas yang semakin terbelah dalam berbagai isu ideologis.</p>\r\n\r\n<p>Dengan berbagai tekanan domestik dan global, pemilu mendatang diprediksi akan menjadi salah satu yang paling menentukan dalam sejarah modern Amerika Serikat, sekaligus menguji kekuatan demokrasi di negara tersebut.</p>\r\n', 'OIP (2).webp', '2026-04-07 02:48:38', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Teknologi'),
(2, 'Kesehatan'),
(3, 'Pendidikan'),
(4, 'Olahraga'),
(5, 'Politik');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `views_log`
--

CREATE TABLE `views_log` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `views_log`
--

INSERT INTO `views_log` (`id`, `id_artikel`, `tanggal`) VALUES
(1, 4, '2026-04-06'),
(2, 8, '2026-04-06'),
(3, 1, '2026-04-06'),
(4, 4, '2026-04-06'),
(5, 1, '2026-04-06'),
(6, 4, '2026-04-07'),
(7, 4, '2026-04-07'),
(8, 4, '2026-04-07'),
(9, 8, '2026-04-07'),
(10, 5, '2026-04-07'),
(11, 1, '2026-04-07'),
(12, 11, '2026-04-07'),
(13, 12, '2026-04-07'),
(14, 5, '2026-04-07'),
(15, 11, '2026-04-07'),
(16, 11, '2026-04-07'),
(17, 11, '2026-04-07'),
(18, 14, '2026-04-07'),
(19, 14, '2026-04-07'),
(20, 16, '2026-04-07'),
(21, 16, '2026-04-07');

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
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views_log`
--
ALTER TABLE `views_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `views_log`
--
ALTER TABLE `views_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
