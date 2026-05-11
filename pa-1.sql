-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2026 at 04:33 AM
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
-- Database: `pa-1`
--

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `konten`, `foto`, `tanggal`, `views`, `created_at`, `updated_at`) VALUES
(1, 'Perpustakaan IT Del Terima Hibah dari Perpustakaan Nasional Republik Indonesia', 'Pada tanggal 10 Juli 2023 Perpustakaan IT Del terpilih menjadi salah satu penerima hibah bahan pustaka sebanyak 425 judul/850 eksemplar dan 2 unit komputer dari Perpustakaan Nasional Republik Indonesia. Hibah yang dimaksud diterima secara simbolis oleh Bapak Dr. Arnaldo Marulitua Sinaga, ST., M.InfoTech. (Rektor IT Del) pada acara Bimtek Pengembangan Perpustakaan Perguruan Tinggi yang diselenggarakan oleh Perpusnas RI di Hotel Radison Medan. Pada kegiatan ini, Rektor IT Del juga menjadi narasumber dalam diskusi panel yang merupakan bagian dari acara Bimtek tersebut. Kegiatan Bimtek ini membahas tentang kemas ulang informasi, pendaftaran NPP, aplikasi bintang pusnas edu, e-resources, serta tentang akreditasi perpustakaan perguruan tinggi. Kegiatan Bimtek diikuti juga oleh Ibu Jesicha Ulina Hutabarat, S.Sos (Kepala Perpustakaan IT Del).', 'uploads/berita/1776603147_berita_13.jpg', '2025-04-12', 47, '2026-04-19 05:52:27', '2026-04-19 05:52:27'),
(2, 'IT Del, PT Len Industri berinisiatif bekerja sama dengan IBM melakukan transfer teknologi untuk pengembangan dan produksi teknologi baru pemantauan kegempaan dan gunung api.', 'Dalam kesempatan ini, IT Del, PT Len Industri berinisiatif bekerja sama dengan IBM melakukan transfer teknologi untuk pengembangan dan produksi teknologi baru pemantauan kegempaan dan gunung api. Ilmuwan Indonesia, Dr. Oki Gunawan yang mewakili IBM mengunjungi IT Del pada tanggal 7-8 Agustus 2023 untuk memberikan workshop transfer teknologi : Parallel Dipole Line (PDL) Magnetic Trap Sensor Technology. Teknologi ini merupakan hasil karya Dr. Oki dan timnya di IBM T. J. Watson Research Center, markas riset IBM di Amerika Serikat. Beliau menemukan fenomena fisika baru yang disebut “efek punuk unta” (camelback effect) yang terjadi pada sistem dua magnet silinder diametrik dan sebatang grafit yang bisa terjebak dan mengambang di tengahnya. Dr. Oki menyatakan bahwa, riset PDL ini dimotivasi oleh perkembangan teknologi IoT dalam dekade terakhir yang bisa menghubungkan banyak jenis sensor untuk memperoleh data yang banyak dan memperoleh informasi baru. Sistem PDL ini juga dapat dipakai untuk berbagai aplikasi sensor seperti seismometer, tiltmeter, viscometer gas, sensor tekanan vakum, dll. Dalam kegiatan workshop ini, Dr. Oki memberikan paparan dari prinsip-prinsip dasar hingga keberbagai aplikasi. Sebagai contoh, prototipe PDL seismometer sudah dikembangkan dan ditest di Italia dan Indonesia hingga protipenya telah dikembangkan mencapai tiga generasi sehingga makin canggih dan lebih murah. Diharapkan dengan hadirnya teknologi baru jebakan magnetik PDL ini di Indonesia akan membawa banyak manfaat seperti meningkatkan kapabilitas mitigasi bencana gempa, tsunami dan gunung api, menciptakan industri baru yang membuka lapangan kerja di Indonesia, dan menghadirkan aktivitas riset kelas dunia (world-class research) untuk IT Del dan Indonesia pada umumnya.', 'uploads/berita/1776605423_berita_12.jpg', '2025-03-03', 48, '2026-04-19 06:30:23', '2026-04-19 06:30:23'),
(3, 'IT Del Berhasil Meraih Akreditasi Institusi Peringkat B untuk periode 2023-2028 melalui PEPA', 'Pada tanggal 10 Mei 2023, IT Del mendapatkan kabar baik tentang hasil Penghitungan Pemantauan dan Evaluasi Peringkat Akreditasi (PEPA) Institusi. Melalui keputusan BAN-PT Nomor 1855/BAN-PT/PMT2/2023 yang ditujukan kepada Dr. Arnaldo Marulitua Sinaga, ST., M.InfoTech. (Rektor IT Del), IT Del dinyatakan LOLOS PEPA. Dengan demikian, peringkat akreditasi IT Del (B) diperpanjang selama 5 tahun ke depan ( 2023 s.d. 2028). Sejak Desember tahun 2022, peringkat akreditasi IT Del telah dipantau oleh BAN PT (Badan Akreditasi Nasional Perguruan Tinggi) karena akan berakhir pada tanggal 18 Desember 2023. Pemantauan dimaksud disebut dengan istilah Pemantauan dan Evaluasi Peringkat Akreditasi (PEPA). Untuk dapat lolos PEPA, IT Del harus memenuhi 9 dari 10 indikator syarat Perlu PEPA (indikator-indikator terkait dengan Kemahasiswaan, SDM-Dosen, dan Akreditasi Prodi). Pada tanggal 9 September tahun 2022, Tim Akreditasi Institusi IT Del (AIPT-IT Del) yang diketuai oleh Tiurma Lumban Gaol, S.P., M.P. (Dosen/Ketua SPI IT Del) dibentuk untuk menyiapkan keperluan administrasi, menghitung capaian IT Del terhadap 10 indikator yang ditetapkan oleh BAN-PT, memastikan data PDDikti sudah ter-update, berkomunikasi dengan BAN-PT serta hal-hal lainnya yang dibutuhkan agar 10 indikator syarat lolos PEPA IT Del terpenuhi. Tim AIPT ini juga berkolaborasi dengan Satuan Penjaminan Mutu (SPM) IT Del yang diketuai oleh Parmonangan Rotua Togatorop, S.Kom., M.T.I (Dosen/Ketua SPM IT Del). Berdasarkan hasil perhitungan oleh BAN-PT terhadap 10 indikator PEPA pada bulan Mei 2023, IT Del jauh melampaui semua indikator yang ditetapkan oleh BAN-PT. Dengan demikian IT Del dinyatakan lolos PEPA sehingga peringkat akreditasi institusi IT Del (B) dapat dipertahankan untuk periode tahun 2023-2028 tanpa harus melalui jalur IAPT 3.0 (pengisian borang akreditasi institusi). Selamat kepada Institut Teknologi Del dan Yayasan Del atas pencapaian yang membanggakan ini', 'uploads/berita/1776605497_berita_14.jpg', '2025-05-10', 33, '2026-04-19 06:31:37', '2026-04-19 06:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cooperations`
--

CREATE TABLE `cooperations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `type` enum('Industri','Pendidikan','Pemerintah') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cooperations`
--

INSERT INTO `cooperations` (`id`, `partner_name`, `logo`, `type`, `start_date`, `end_date`, `description`, `document_file`, `created_at`, `updated_at`) VALUES
(1, 'PT. Bio Farma', 'uploads/cooperation/logo/1776865625_logo_download.png', 'Industri', '2025-03-21', NULL, 'fefefergegegergergeggegf', NULL, '2026-04-22 06:24:12', '2026-04-22 06:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `detail_alats`
--

CREATE TABLE `detail_alats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peminjaman_lab_id` bigint(20) UNSIGNED NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `ket_sebelum` varchar(255) DEFAULT NULL,
  `ket_sesudah` varchar(255) DEFAULT NULL,
  `penggantian` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_alats`
--

INSERT INTO `detail_alats` (`id`, `peminjaman_lab_id`, `nama_alat`, `jumlah`, `ukuran`, `ket_sebelum`, `ket_sesudah`, `penggantian`, `created_at`, `updated_at`) VALUES
(1, 1, 'botol', 1, '45ml', 'sebelum', NULL, NULL, '2026-04-13 21:10:03', '2026-04-13 21:10:03'),
(2, 4, 'botol', 9, '45ml', 'sebelum', NULL, NULL, '2026-04-14 01:17:03', '2026-04-14 01:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bahans`
--

CREATE TABLE `detail_bahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peminjaman_lab_id` bigint(20) UNSIGNED NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_bahans`
--

INSERT INTO `detail_bahans` (`id`, `peminjaman_lab_id`, `nama_bahan`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
(1, 2, 'etanol', 2, '2000', '2026-04-13 21:33:13', '2026-04-13 21:33:13'),
(2, 3, 'etanol', 2, '2000', '2026-04-13 21:33:14', '2026-04-13 21:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `dokumens`
--

CREATE TABLE `dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dokumen` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `lulusan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `pengampu_matkul` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telpon` varchar(255) DEFAULT NULL,
  `ruangan` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `nama`, `nidn`, `lulusan`, `jabatan`, `pengampu_matkul`, `email`, `no_telpon`, `ruangan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Alfriana Margareta, S.Si., M.Si.', '0326039303', 'S2 Institut Teknologi Bandung', 'Dosen Pengajar', '-', 'alfriana@del.ac.id', '081354678945', 'GD09 Lt1.06', 'uploads/foto_pendidik/1776323566_foto.jpg', '2026-04-16 00:12:46', '2026-04-16 00:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pelaksana` varchar(255) NOT NULL,
  `waktu_pelaksanaan` varchar(255) NOT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `kategori`, `judul`, `pelaksana`, `waktu_pelaksanaan`, `tempat`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'Kaderisasi', 'glona', 'rg', '12 maret 2022', 'desa', 'jan', 'uploads/kegiatan/1776393013_images.jpg', '2026-04-16 19:30:13', '2026-04-16 19:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `kurikulums`
--

CREATE TABLE `kurikulums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester` int(11) NOT NULL,
  `kode_mk` varchar(255) NOT NULL,
  `mata_kuliah` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL,
  `kategori` enum('Wajib','Pilihan') NOT NULL DEFAULT 'Wajib',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kurikulums`
--

INSERT INTO `kurikulums` (`id`, `semester`, `kode_mk`, `mata_kuliah`, `sks`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 1, '2342423', 'Kimia Organik', 3, 'Wajib', '2026-04-16 00:04:15', '2026-04-16 00:04:15'),
(2, 1, '2342424', 'Kimia Analitik', 3, 'Wajib', '2026-04-16 00:04:38', '2026-04-16 00:04:38'),
(3, 1, '2342425', 'Biokimia', 3, 'Wajib', '2026-04-16 00:04:59', '2026-04-16 00:04:59'),
(4, 1, '44422', 'Matematika Dasar', 3, 'Wajib', '2026-04-16 00:05:20', '2026-04-16 00:05:20'),
(5, 1, '2342426', 'Mikrobiologi', 3, 'Wajib', '2026-04-16 00:05:42', '2026-04-16 00:05:42'),
(6, 1, '2342427', 'Genetika', 3, 'Wajib', '2026-04-16 00:06:12', '2026-04-16 00:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `laboratoria`
--

CREATE TABLE `laboratoria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laboratoriums`
--

CREATE TABLE `laboratoriums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lab` varchar(255) NOT NULL,
  `kepala_lab` varchar(255) DEFAULT NULL,
  `fasilitas` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_2` varchar(255) DEFAULT NULL,
  `foto_3` varchar(255) DEFAULT NULL,
  `foto_4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_26_022921_create_dosens_table', 1),
(5, '2026_03_26_022939_create_prestasis_table', 1),
(7, '2026_04_06_141415_add_no_telpon_to_dosens_table', 1),
(8, '2026_04_12_124402_create_profils_table', 1),
(9, '2026_04_12_124403_create_dokumens_table', 1),
(10, '2026_04_12_125315_create_testimonis_table', 1),
(11, '2026_04_12_132134_create_laboratoria_table', 1),
(15, '2026_04_13_013019_create_struktur_organisasis_table', 2),
(16, '2026_04_13_023437_create_kurikulums_table', 2),
(19, '2026_04_13_035456_create_publikasis_table', 3),
(21, '2027_01_01_000000_create_peminjamans_table', 5),
(22, '2026_03_26_023031_create_kegiatans_table', 6),
(23, '2026_04_13_130101_create_kegiatans_table', 7),
(25, '2026_04_14_022108_add_detail_columns_to_ruang_kelas_table', 9),
(26, '2026_04_14_023205_add_detail_to_ruang_kelas_table', 10),
(27, '2026_04_14_011155_create_ruang_kelas_table', 11),
(28, '2026_04_14_030414_create_peminjaman_labs_table', 12),
(29, '2026_04_14_030427_create_detail_alats_table', 12),
(30, '2026_04_14_030434_create_detail_bahans_table', 12),
(31, '2026_04_14_062627_create_laboratoria_table', 13),
(32, '2026_04_19_124028_create_beritas_table', 14),
(33, '2026_04_21_090822_create_cooperations_table', 15),
(34, '2026_04_22_133702_add_logo_to_cooperations_table', 16),
(35, '2026_04_24_081047_create_testimonials_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjamans`
--

CREATE TABLE `peminjamans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim_mahasiswa` varchar(255) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `laboratorium_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_peminjaman` enum('Pending','Disetujui','Ditolak','Dikembalikan') NOT NULL DEFAULT 'Pending',
  `catatan_admin` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_labs`
--

CREATE TABLE `peminjaman_labs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_form` enum('Alat','Bahan') NOT NULL,
  `judul_penelitian` varchar(255) NOT NULL,
  `laboratorium` varchar(255) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) NOT NULL,
  `status` enum('Pending','Disetujui','Ditolak','Selesai') NOT NULL DEFAULT 'Pending',
  `catatan_admin` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman_labs`
--

INSERT INTO `peminjaman_labs` (`id`, `jenis_form`, `judul_penelitian`, `laboratorium`, `nama_peminjam`, `nim`, `prodi`, `status`, `catatan_admin`, `created_at`, `updated_at`) VALUES
(1, 'Alat', 'penelitian anggur merah', 'Lab Biologi Dasar', 'polado', '42325035', 'Teknik Bioteknologi', 'Disetujui', NULL, '2026-04-13 21:10:03', '2026-04-13 21:10:17'),
(2, 'Bahan', 'dda', 'Lab Kimia Dasar', 'sad', '42325035', 'Teknik Bioteknologi', 'Ditolak', 'bahan habis', '2026-04-13 21:33:13', '2026-04-13 21:33:56'),
(3, 'Bahan', 'dda', 'Lab Kimia Dasar', 'sad', '42325035', 'Teknik Bioteknologi', 'Disetujui', NULL, '2026-04-13 21:33:14', '2026-04-13 21:33:58'),
(4, 'Alat', 'penelitian anggur merah', 'Lab Mikrobiologi', 'polado', '42325035', 'Teknik Bioteknologi', 'Disetujui', NULL, '2026-04-14 01:17:03', '2026-04-14 01:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `prestasis`
--

CREATE TABLE `prestasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` enum('Dosen','Mahasiswa') NOT NULL,
  `nama_peraih` varchar(255) NOT NULL,
  `judul_prestasi` varchar(255) NOT NULL,
  `tingkat` varchar(255) DEFAULT NULL,
  `tahun` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prestasis`
--

INSERT INTO `prestasis` (`id`, `kategori`, `nama_peraih`, `judul_prestasi`, `tingkat`, `tahun`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'Mahasiswa', 'Deo Feibert Sidabalok', 'Juara 1 Olimpiade Biologi', 'Nasional', 2025, 'erhasil meraih peringkat pertama dari 200 peserta berskala nasional dengan mendemonstrasikan pemahaman mendalam dalam bidang rekayasa genetika, mikrobiologi industri, dan teknologi DNA rekombinan.', 'uploads/prestasi/1776324136_gwoo.jpg', '2026-04-16 00:22:16', '2026-04-16 00:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `profils`
--

CREATE TABLE `profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sejarah` text DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `prospek_karir` text DEFAULT NULL,
  `struktur_organisasi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profils`
--

INSERT INTO `profils` (`id`, `sejarah`, `visi`, `misi`, `tujuan`, `prospek_karir`, `struktur_organisasi`, `created_at`, `updated_at`) VALUES
(1, 'Pengembangan bioteknologi dipandang sebagai cara untuk memenuhi kebutuhan penduduk dan mencapai kemandirian nasional, terutama di bidang pertanian dan kesehatan.\r\n\r\nIT Del berkeinginan untuk ikut serta mendukung bidang pertanian, antara lain melalui pengembangan bibit-bibit tanaman unggul tahan hama dan dapat menghasilkan panen tinggi, pengembangan pupuk probiotik yang dapat mendukung budidaya tumbuhan dan meningkatkan kualitas tanah, dan lain-lain.\r\n\r\nDengan perkembangan bioteknologi yang sangat pesat, membuka wawasan baru mengenai perpaduan bioteknologi dan manajemen bisnis, serta kemampuan bioinformatika, yang juga akan diwadahi di Program Studi S1 Bioteknologi IT Del.', '“Menjadi fakultas yang unggul dalam pembelajaran, penelitian dan pengabdian kepada masyarakat dalam bidang ilmu dan teknologi yang berbasis bioteknologi”', '1. Menyelenggarakan dan mengembangkan proses pendidikan yang unggul di bidang ilmu dan teknologi berbasis bioteknologi secara berkesinambungan dan bermanfaat bagi masyarakat.\r\n\r\n2. Mengembangkan dan menciptakan ilmu pengetahuan dan teknologi berbasis bioteknologi melalui penelitian yang berkelanjutan, serta menyebarkannya dalam lingkup ilmiah.\r\n\r\n3. Meningkatkan peran nyata fakultas dalam alih keahlian dan keterampilan kepada masyarakat, serta mampu menjadi pembaharu kemampuan, keterampilan pilihan rujukan, dan pengembangan rekayasa karya masyarakat, dalam bidang ilmu dan teknologi berbasis bioteknologi.', '-', '1. Mempunyai kemampuan untuk mendesain dan mengembangkan pemanfaatan keanekaragaman hayati mikroorganisme melalui rekayasa genetika untuk memperoleh mikroorganisme unggul.\r\n\r\n2. Mempunyai kemampuan untuk mendesain dan mengembangkan pemanfaatan keanekaragaman hayati tanaman melalui teknik rekayasa genetika dan kultur jaringan untuk menghasilkan tanaman unggul.\r\n\r\n3. Memiliki kinerja yang tinggi, mampu berkolaborasi, mampu berpikir kritis dan analitik untuk memecahkan masalah, mampu memanfaatkan teknologi bioinformatika, serta mampu memanfaatkan sumber daya alam hayati untuk pengembangan produk bioteknologi dalam kehidupan sehari-hari yang didasari jiwa biotechpreneurship yang tinggi.', NULL, '2026-04-16 00:01:57', '2026-04-16 00:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `publikasis`
--

CREATE TABLE `publikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` enum('Dosen','Mahasiswa') NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tanggal_publikasi` varchar(255) NOT NULL,
  `tipe_publikasi` varchar(255) DEFAULT NULL,
  `link_download` varchar(255) DEFAULT NULL,
  `link_view` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruang_kelas`
--

CREATE TABLE `ruang_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `fasilitas_pendukung` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `hari_akademik` varchar(255) DEFAULT NULL,
  `jam_akademik` varchar(255) DEFAULT NULL,
  `jam_kolaboratif` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_2` varchar(255) DEFAULT NULL,
  `foto_3` varchar(255) DEFAULT NULL,
  `foto_4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruang_kelas`
--

INSERT INTO `ruang_kelas` (`id`, `nama_ruangan`, `kapasitas`, `fasilitas_pendukung`, `deskripsi`, `hari_akademik`, `jam_akademik`, `jam_kolaboratif`, `foto`, `foto_2`, `foto_3`, `foto_4`, `created_at`, `updated_at`) VALUES
(3, 'GD9.01', 60, 'AC', 'nyaman', 'senin-jumat', '07.00-17.00', '19..00-21.30', 'uploads/ruang_kelas/1776393130_foto_3cc8f991-12a1-4ed3-be76-989e59a3c098.jpg', 'uploads/ruang_kelas/1776393130_foto_2_952dde9b-9c46-4ed4-8570-556f43fac762.jpg', 'uploads/ruang_kelas/1776393130_foto_3_didin.jpeg', 'uploads/ruang_kelas/1776393130_foto_4_DSC_2037-1024x681.jpg', '2026-04-16 19:32:10', '2026-04-16 19:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DKGWcJVzQk5G3cqLjsObmzZ9OXGYnR8KvIZeKtVQ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWUZuQjhEMksyM2dLdTk2dmNEWU1Vb1dBNXBCSGN6VUQwQzNxSzhieSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1777023323),
('n94pJMXoYMFvamAykxhAW21NPah8oaxv5NcKqTbf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXlacVJLeVpSNWM3Z25Pd2xsNFozTzVmTVMxVVczbXhHM0pEYjFYTyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1777021481),
('QTX14lZ5Pp84PfsW4hkU6mdtYf1kJid4iLzGCb8J', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHdmaVpUMldhQlcyMmNNckpQWnhxSERNeHBIYTROY2Y2S1MxOUF5MCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEtbGVuZ2thcCI7czo1OiJyb3V0ZSI7czoxNDoiYmVyaXRhLmxlbmdrYXAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1777358857),
('Tle8V35HwhYgi1MxqEFMbLbYlZBp2lpniLs33hLb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ0Z3N3dra09Gdm1OSm9VRmE0YTg5M1JZeWdYbFMxamRJaFFiekRkZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sYWJvcmF0b3JpdW0iO3M6NToicm91dGUiO3M6OToibGFiLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1777386635),
('WVtXAHEuWd5FYfsb6aRmth7hyYGxOzp6jAS2ZpXS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVo0TG9hakdWQ3pTOUNyUWQ2RDJKdkM2ZEhqMDR0SVdSckxHZjBZbiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1777039940),
('ZOtcQfCXNV6Z1C8qWuGdI6XCcjreVZE2l0FCUZpD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQUFDRXB0Um9EeW1Gc1lRc0dYOU5uMjYydHBJd205VWhHSUV5N2hCQiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZW5hZ2EtcGVuZGlkaWsiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fX0=', 1777260148);

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasis`
--

CREATE TABLE `struktur_organisasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 3,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `struktur_organisasis`
--

INSERT INTO `struktur_organisasis` (`id`, `jabatan`, `nama`, `foto`, `level`, `created_at`, `updated_at`) VALUES
(1, 'REKTOR INSTITUT TEKNOLOGI DEL', 'Dr. Arnaldo Marulitua Sinaga, S.T., M.InfoTech', NULL, 1, '2026-04-14 02:13:28', '2026-04-14 02:13:28'),
(2, 'DEKAN FAKULTAS TEKNOLOGI INDUSTRI', 'Ferdy roberto hutahaean', NULL, 2, '2026-04-14 02:13:55', '2026-04-14 02:13:55'),
(3, 'SENAT FAKULTAS TEKNOLOGI INDUSTRI', 'Dr. Arnaldo Marulitua Sinaga, S.T., M.InfoTech', NULL, 3, '2026-04-14 02:14:08', '2026-04-14 02:14:08'),
(4, 'SENAT FAKULTAS TEKNOLOGI INDUSTRI', 'Dr. Parlinggoman M.Sihombing M.Eng', NULL, 2, '2026-04-14 02:14:47', '2026-04-14 02:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `graduation_year` varchar(255) NOT NULL,
  `workplace` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `testimony` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `graduation_year`, `workplace`, `position`, `testimony`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Nuno Mendes', '2022', 'PT.BIOKIMIA', 'senior researcher', 'Di prodi ini saya belajar dengan pelajaran yang dapat saya pahami dengan baik sehingga saya bisa di posisi sekarang', 'uploads/testimoni/1777020689_alumni_557670305_18615625219057978_4379093797540820579_n.jpg', '2026-04-24 01:51:29', '2026-04-24 01:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `testimonis`
--

CREATE TABLE `testimonis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `peran` varchar(255) NOT NULL,
  `isi_testimoni` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Bioteknologi', 'admin@del.ac.id', NULL, '$2y$12$2Abv.Rft.zlWLoyc280nYOkctPR7.uYydS2mptqxqRrfGvTbjGXga', NULL, '2026-04-24 01:59:07', '2026-04-24 01:59:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cooperations`
--
ALTER TABLE `cooperations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_alats`
--
ALTER TABLE `detail_alats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_alats_peminjaman_lab_id_foreign` (`peminjaman_lab_id`);

--
-- Indexes for table `detail_bahans`
--
ALTER TABLE `detail_bahans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_bahans_peminjaman_lab_id_foreign` (`peminjaman_lab_id`);

--
-- Indexes for table `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosens_nidn_unique` (`nidn`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurikulums`
--
ALTER TABLE `kurikulums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratoria`
--
ALTER TABLE `laboratoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratoriums`
--
ALTER TABLE `laboratoriums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjamans_laboratorium_id_foreign` (`laboratorium_id`);

--
-- Indexes for table `peminjaman_labs`
--
ALTER TABLE `peminjaman_labs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasis`
--
ALTER TABLE `prestasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publikasis`
--
ALTER TABLE `publikasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `struktur_organisasis`
--
ALTER TABLE `struktur_organisasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cooperations`
--
ALTER TABLE `cooperations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_alats`
--
ALTER TABLE `detail_alats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_bahans`
--
ALTER TABLE `detail_bahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kurikulums`
--
ALTER TABLE `kurikulums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laboratoria`
--
ALTER TABLE `laboratoria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laboratoriums`
--
ALTER TABLE `laboratoriums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `peminjamans`
--
ALTER TABLE `peminjamans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman_labs`
--
ALTER TABLE `peminjaman_labs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prestasis`
--
ALTER TABLE `prestasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publikasis`
--
ALTER TABLE `publikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `struktur_organisasis`
--
ALTER TABLE `struktur_organisasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_alats`
--
ALTER TABLE `detail_alats`
  ADD CONSTRAINT `detail_alats_peminjaman_lab_id_foreign` FOREIGN KEY (`peminjaman_lab_id`) REFERENCES `peminjaman_labs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_bahans`
--
ALTER TABLE `detail_bahans`
  ADD CONSTRAINT `detail_bahans_peminjaman_lab_id_foreign` FOREIGN KEY (`peminjaman_lab_id`) REFERENCES `peminjaman_labs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD CONSTRAINT `peminjamans_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `laboratoria` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
