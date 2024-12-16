-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2024 pada 19.52
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_penduduk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_desa`
--

CREATE TABLE `tb_desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kecamatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_desa`
--

INSERT INTO `tb_desa` (`id`, `nama`, `kecamatan_id`) VALUES
(1, 'Kopelma Darussalam', 1),
(2, 'Lampineung', 1),
(3, 'Batoh', 1),
(4, 'Lambaro', 1),
(5, 'Meuraxa', 2),
(6, 'Punge Blang Cut', 2),
(7, 'Banda Raya', 2),
(8, 'Lampriet', 2),
(9, 'Baiturrahman', 3),
(10, 'Kampung Baru', 3),
(11, 'Peunayong', 3),
(12, 'Seutui', 3),
(13, 'Geuceu Meuneng', 4),
(14, 'Kuta Alam', 4),
(15, 'Lhokseumawe', 4),
(16, 'Mekarsari', 4),
(17, 'Kampung Rakyat', 5),
(18, 'Blang Bintang', 5),
(19, 'Gampong Baro', 5),
(20, 'Sukaramai', 5),
(21, 'Ulee Kareng', 6),
(22, 'Rukoh', 6),
(23, 'Gampong Pulo', 6),
(24, 'Meunasah Dayah', 6),
(25, 'Lueng Bata', 7),
(26, 'Peuniti', 7),
(27, 'Jeulingke', 7),
(28, 'Blang Oi', 7),
(29, 'Darussalam', 8),
(30, 'Lama Tani', 8),
(31, 'Bener Meriah', 8),
(32, 'Alue Naga', 8),
(33, 'Kuta Raja', 9),
(34, 'Pulo Aceh', 9),
(35, 'Kampung Alue Naga', 9),
(36, 'Tanjung Anom', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id`, `nama`) VALUES
(1, 'Syiah Kuala'),
(2, 'Kuta Alam'),
(3, 'Baiturrahman'),
(4, 'Meuraxa'),
(5, 'Jaya Baru'),
(6, 'Ulee Kareng'),
(7, 'Lueng Bata'),
(8, 'Darussalam'),
(9, 'Kuta Raja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `desa` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`id`, `nik`, `nama`, `tgl_lahir`, `tempat_lahir`, `alamat`, `desa`, `status`, `jk`, `pekerjaan`, `pendidikan`, `agama`) VALUES
(1, '1111111111111111', 'Ahmad Sulaiman', '1990-03-01', 'Banda Aceh', 'Kampung Rakyat, Jaya Baru, Banda Aceh', 1, 'Sudah Nikah', 'LK', 'Petani', 'SMA', 'Islam'),
(2, '1111111111111112', 'Fatimah Ali', '1992-07-15', 'Banda Aceh', 'Blang Bintang, Jaya Baru, Banda Aceh', 2, 'Belum Nikah', 'PR', 'Guru', 'S1', 'Islam'),
(3, '1111111111111113', 'Budi Santoso', '1988-12-20', 'Banda Aceh', 'Gampong Baro, Jaya Baru, Banda Aceh', 3, 'Sudah Nikah', 'LK', 'Dokter', 'S2', 'Kristen'),
(4, '1111111111111114', 'Siti Aminah', '1995-09-12', 'Banda Aceh', 'Sukaramai, Jaya Baru, Banda Aceh', 4, 'Belum Nikah', 'PR', 'Mahasiswa', 'S1', 'Islam'),
(5, '1111111111111115', 'Hassan Basri', '1980-06-05', 'Banda Aceh', 'Ulee Kareng, Banda Aceh', 5, 'Cerai Hidup', 'LK', 'Pedagang', 'SMP', 'Islam'),
(6, '1111111111111116', 'Zahra Nur', '1994-04-10', 'Banda Aceh', 'Rukoh, Ulee Kareng, Banda Aceh', 6, 'Belum Nikah', 'PR', 'PNS', 'S1', 'Islam'),
(7, '1111111111111117', 'Junaidi Syamsuddin', '1985-08-15', 'Banda Aceh', 'Gampong Pulo, Ulee Kareng, Banda Aceh', 7, 'Sudah Nikah', 'LK', 'Arsitek', 'S2', 'Islam'),
(8, '1111111111111118', 'Nina Fadila', '1997-01-30', 'Banda Aceh', 'Meunasah Dayah, Ulee Kareng, Banda Aceh', 8, 'Belum Nikah', 'PR', 'Barista', 'SMA', 'Hindu'),
(9, '1111111111111119', 'Muhammad Iqbal', '1993-02-25', 'Banda Aceh', 'Peuniti, Lueng Bata, Banda Aceh', 9, 'Sudah Nikah', 'LK', 'Karyawan Swasta', 'SMA', 'Islam'),
(10, '1111111111111120', 'Rina Haryani', '1991-05-18', 'Banda Aceh', 'Jeulingke, Lueng Bata, Banda Aceh', 10, 'Sudah Nikah', 'PR', 'Penjual Online', 'S1', 'Katolik'),
(11, '1111111111111121', 'Lina Mardiana', '1986-10-22', 'Banda Aceh', 'Kampung Rakyat, Jaya Baru, Banda Aceh', 1, 'Sudah Nikah', 'PR', 'Pengusaha', 'S1', 'Islam'),
(12, '1111111111111122', 'Edi Prasetyo', '1990-04-19', 'Banda Aceh', 'Blang Bintang, Jaya Baru, Banda Aceh', 2, 'Cerai Hidup', 'LK', 'Pekerja Kantoran', 'SMA', 'Islam'),
(13, '1111111111111123', 'Rudi Setiawan', '1987-11-11', 'Banda Aceh', 'Gampong Baro, Jaya Baru, Banda Aceh', 3, 'Belum Nikah', 'LK', 'Tukang Kayu', 'SMP', 'Kristen'),
(14, '1111111111111124', 'Zulfa Kharisma', '1994-05-06', 'Banda Aceh', 'Sukaramai, Jaya Baru, Banda Aceh', 4, 'Sudah Nikah', 'PR', 'Dokter', 'S1', 'Islam'),
(15, '1111111111111125', 'Muliadi Ibrahim', '1985-08-13', 'Banda Aceh', 'Ulee Kareng, Banda Aceh', 5, 'Sudah Nikah', 'LK', 'Petani', 'SMA', 'Islam'),
(16, '1111111111111126', 'Anita Dewi', '1992-06-17', 'Banda Aceh', 'Rukoh, Ulee Kareng, Banda Aceh', 6, 'Belum Nikah', 'PR', 'Guru', 'S1', 'Islam'),
(17, '1111111111111127', 'Slamet Rahardjo', '1991-01-25', 'Banda Aceh', 'Gampong Pulo, Ulee Kareng, Banda Aceh', 7, 'Cerai Hidup', 'LK', 'Karyawan Swasta', 'SMA', 'Islam'),
(18, '1111111111111128', 'Ira Puspita', '1996-03-21', 'Banda Aceh', 'Meunasah Dayah, Ulee Kareng, Banda Aceh', 8, 'Belum Nikah', 'PR', 'Perawat', 'D3', 'Budha'),
(19, '1111111111111129', 'Mochammad Ali', '1989-12-15', 'Banda Aceh', 'Peuniti, Lueng Bata, Banda Aceh', 9, 'Sudah Nikah', 'LK', 'Karyawan Swasta', 'S1', 'Islam'),
(20, '1111111111111130', 'Fani Wijaya', '1993-08-18', 'Banda Aceh', 'Jeulingke, Lueng Bata, Banda Aceh', 10, 'Sudah Nikah', 'PR', 'Pengusaha', 'S2', 'Katolik'),
(21, '1111111111111131', 'Rahmadana Yusuf', '1990-03-12', 'Banda Aceh', 'Gampong Pulo, Syiah Kuala, Banda Aceh', 1, 'Belum Nikah', 'LK', 'PNS', 'S1', 'Islam'),
(22, '1111111111111132', 'Aisyah Nur', '1992-08-25', 'Banda Aceh', 'Meunasah Dayah, Syiah Kuala, Banda Aceh', 1, 'Sudah Nikah', 'PR', 'Wiraswasta', 'SMA', 'Islam'),
(23, '1111111111111133', 'Fadil Amri', '1988-11-19', 'Banda Aceh', 'Gampong Blang, Syiah Kuala, Banda Aceh', 1, 'Cerai Hidup', 'LK', 'Petani', 'SMP', 'Kristen'),
(24, '1111111111111134', 'Siti Khadijah', '1995-02-08', 'Banda Aceh', 'Jeulingke, Syiah Kuala, Banda Aceh', 1, 'Belum Nikah', 'PR', 'Mahasiswa', 'S1', 'Islam'),
(25, '1111111111111135', 'Nurdin Iqbal', '1987-06-30', 'Banda Aceh', 'Gampong Baro, Kuta Alam, Banda Aceh', 3, 'Sudah Nikah', 'LK', 'Tukang Bangunan', 'SMP', 'Islam'),
(26, '1111111111111136', 'Wulan Sari', '1994-07-15', 'Banda Aceh', 'Blang Bintang, Kuta Alam, Banda Aceh', 3, 'Cerai Hidup', 'PR', 'Dokter', 'S1', 'Islam'),
(27, '1111111111111137', 'Alfian Rahman', '1990-04-09', 'Banda Aceh', 'Kampung Rakyat, Kuta Alam, Banda Aceh', 3, 'Belum Nikah', 'LK', 'Pegawai Negeri', 'S1', 'Kristen'),
(28, '1111111111111138', 'Imelda Putri', '1993-12-22', 'Banda Aceh', 'Gampong Blang, Kuta Alam, Banda Aceh', 3, 'Sudah Nikah', 'PR', 'Pedagang', 'D3', 'Islam'),
(29, '1111111111111139', 'Harun Al-Rashid', '1989-11-05', 'Banda Aceh', 'Sukaramai, Kuta Alam, Banda Aceh', 3, 'Belum Nikah', 'LK', 'Driver', 'SMA', 'Islam'),
(30, '1111111111111140', 'Budi Santoso', '1983-05-21', 'Banda Aceh', 'Sukaramai, Meuraxa, Banda Aceh', 4, 'Sudah Nikah', 'LK', 'Pekerja Swasta', 'S1', 'Hindu'),
(31, '1111111111111141', 'Linda Rahayu', '1990-09-10', 'Banda Aceh', 'Meunasah Dayah, Meuraxa, Banda Aceh', 4, 'Cerai Hidup', 'PR', 'Guru', 'SMA', 'Budha'),
(32, '1111111111111142', 'Rudi Hartono', '1985-02-12', 'Banda Aceh', 'Gampong Laksana, Baiturrahman, Banda Aceh', 15, 'Sudah Nikah', 'LK', 'Petani', 'SMA', 'Islam'),
(33, '1111111111111143', 'Maya Dwi', '1990-07-20', 'Banda Aceh', 'Gampong Babah, Meuraxa, Banda Aceh', 4, 'Belum Nikah', 'PR', 'Mahasiswa', 'S1', 'Kristen'),
(34, '1111111111111144', 'Zulkarnain Azmi', '1992-10-02', 'Banda Aceh', 'Gampong Cot, Ulee Kareng, Banda Aceh', 8, 'Cerai Hidup', 'LK', 'Pedagang', 'D3', 'Islam'),
(35, '1111111111111145', 'Wahyu Hidayat', '1988-04-28', 'Banda Aceh', 'Gampong Alue, Kuta Alam, Banda Aceh', 21, 'Belum Nikah', 'LK', 'Pekerja Swasta', 'S1', 'Islam'),
(36, '1111111111111146', 'Nina Suryani', '1995-05-15', 'Banda Aceh', 'Gampong Jaya, Banda Aceh', 12, 'Sudah Nikah', 'PR', 'Wiraswasta', 'SMP', 'Islam'),
(37, '1111111111111147', 'Dian Prasetyo', '1990-01-03', 'Banda Aceh', 'Gampong Beurawe, Banda Aceh', 18, 'Cerai Mati', 'LK', 'Tukang Kayu', 'S1', 'Hindu'),
(38, '1111111111111148', 'Lilis Indah', '1994-11-07', 'Banda Aceh', 'Gampong Lhok, Banda Aceh', 10, 'Belum Nikah', 'PR', 'Mahasiswa', 'S1', 'Islam'),
(39, '1111111111111149', 'Eko Prasetyo', '1989-08-20', 'Banda Aceh', 'Gampong Alue, Banda Aceh', 2, 'Sudah Nikah', 'LK', 'Tukang Ledeng', 'SMA', 'Kristen'),
(40, '1111111111111150', 'Susi Widiyanti', '1993-12-05', 'Banda Aceh', 'Gampong Lambada, Banda Aceh', 7, 'Sudah Nikah', 'PR', 'Pedagang', 'SMA', 'Islam'),
(41, '1111111111111151', 'Andri Setiawan', '1987-03-16', 'Banda Aceh', 'Gampong Tanjong, Banda Aceh', 13, 'Belum Nikah', 'LK', 'Pekerja Swasta', 'S2', 'Islam'),
(42, '1111111111111152', 'Aminah Junaedi', '1983-06-09', 'Banda Aceh', 'Gampong Laksana, Baiturrahman, Banda Aceh', 23, 'Sudah Nikah', 'PR', 'Ibu Rumah Tangga', 'SMA', 'Islam'),
(43, '1111111111111153', 'Fajar Aulia', '1991-09-17', 'Banda Aceh', 'Gampong Cot, Ulee Kareng, Banda Aceh', 11, 'Belum Nikah', 'LK', 'Mahasiswa', 'S1', 'Islam'),
(44, '1111111111111154', 'Hendra Prasetyo', '1986-01-15', 'Banda Aceh', 'Gampong Lambada, Banda Aceh', 6, 'Cerai Hidup', 'LK', 'Pekerja Swasta', 'S1', 'Islam'),
(45, '1111111111111155', 'Rina Amalia', '1994-04-21', 'Banda Aceh', 'Gampong Beurawe, Banda Aceh', 19, 'Sudah Nikah', 'PR', 'Guru', 'S2', 'Katolik'),
(46, '1111111111111156', 'Alif Fadillah', '1992-03-05', 'Banda Aceh', 'Gampong Tanjong, Banda Aceh', 17, 'Belum Nikah', 'LK', 'Mahasiswa', 'S1', 'Islam'),
(47, '1111111111111157', 'Ira Dewi', '1990-08-29', 'Banda Aceh', 'Gampong Jaya, Banda Aceh', 13, 'Cerai Hidup', 'PR', 'Pengusaha', 'SMA', 'Kristen'),
(48, '1111111111111158', 'Taufik Hidayat', '1987-11-19', 'Banda Aceh', 'Gampong Cot, Ulee Kareng, Banda Aceh', 2, 'Belum Nikah', 'LK', 'Tukang Bangunan', 'SMP', 'Islam'),
(49, '1111111111111159', 'Nadya Sari', '1995-12-30', 'Banda Aceh', 'Gampong Alue, Banda Aceh', 5, 'Sudah Nikah', 'PR', 'Wiraswasta', 'S1', 'Islam'),
(50, '1111111111111160', 'Yusuf Aditya', '1988-06-25', 'Banda Aceh', 'Gampong Babah, Meuraxa, Banda Aceh', 24, 'Belum Nikah', 'LK', 'Pekerja Swasta', 'S1', 'Islam'),
(51, '1111111111111161', 'Erika Sari', '1996-02-11', 'Banda Aceh', 'Gampong Lhok, Banda Aceh', 31, 'Sudah Nikah', 'PR', 'Pegawai Negeri', 'SMA', 'Islam'),
(52, '1111111111111162', 'Siti Hawa', '1992-07-14', 'Banda Aceh', 'Gampong Seutui, Banda Aceh', 9, 'Belum Nikah', 'PR', 'Pegawai Swasta', 'S1', 'Islam'),
(53, '1111111111111163', 'Andi Rachman', '1989-11-03', 'Banda Aceh', 'Gampong Ulee Kareng, Banda Aceh', 3, 'Sudah Nikah', 'LK', 'Tukang Ojek', 'SMP', 'Islam'),
(54, '1111111111111164', 'Dewi Oktaviani', '1994-02-22', 'Banda Aceh', 'Gampong Laksana, Baiturrahman, Banda Aceh', 18, 'Belum Nikah', 'PR', 'Mahasiswa', 'S1', 'Islam'),
(55, '1111111111111165', 'Ardiansyah', '1987-08-30', 'Banda Aceh', 'Gampong Blang, Banda Aceh', 7, 'Sudah Nikah', 'LK', 'Pengusaha', 'S2', 'Islam'),
(56, '1111111111111166', 'Sabrina Rina', '1995-05-11', 'Banda Aceh', 'Gampong Babah, Meuraxa, Banda Aceh', 20, 'Sudah Nikah', 'PR', 'Ibu Rumah Tangga', 'SMA', 'Islam'),
(57, '1111111111111167', 'Hafidz Zain', '1993-10-05', 'Banda Aceh', 'Gampong Cot, Ulee Kareng, Banda Aceh', 5, 'Belum Nikah', 'LK', 'Freelancer', 'S1', 'Islam'),
(58, '1111111111111168', 'Lina Fadila', '1996-04-08', 'Banda Aceh', 'Gampong Lhok, Banda Aceh', 14, 'Belum Nikah', 'PR', 'Wiraswasta', 'SMA', 'Hindu'),
(59, '1111111111111169', 'Rudi Wijaya', '1985-09-27', 'Banda Aceh', 'Gampong Ulee, Banda Aceh', 4, 'Sudah Nikah', 'LK', 'Dosen', 'S3', 'Kristen'),
(60, '1111111111111170', 'Nuraida', '1990-03-12', 'Banda Aceh', 'Gampong Tanjong, Banda Aceh', 12, 'Cerai Hidup', 'PR', 'Guru', 'S2', 'Budha'),
(61, '1111111111111171', 'Mochamad Iqbal', '1992-12-18', 'Banda Aceh', 'Gampong Lambada, Banda Aceh', 10, 'Sudah Nikah', 'LK', 'Pekerja Swasta', 'S1', 'Islam'),
(62, '1111111111111172', 'Junaidi', '1988-05-13', 'Banda Aceh', 'Gampong Ulee Kareng, Banda Aceh', 3, 'Belum Nikah', 'LK', 'Driver', 'SMA', 'Islam'),
(63, '1111111111111173', 'Tika Maheswari', '1990-09-29', 'Banda Aceh', 'Gampong Blang, Banda Aceh', 7, 'Sudah Nikah', 'PR', 'Pegawai Negeri', 'S1', 'Islam'),
(64, '1111111111111174', 'Irwan Hidayat', '1995-07-16', 'Banda Aceh', 'Gampong Pulo, Banda Aceh', 15, 'Belum Nikah', 'LK', 'Karyawan Swasta', 'SMA', 'Islam'),
(65, '1111111111111175', 'Dina Sulastri', '1992-11-21', 'Banda Aceh', 'Gampong Meuraxa, Banda Aceh', 20, 'Sudah Nikah', 'PR', 'Ibu Rumah Tangga', 'SMA', 'Islam'),
(66, '1111111111111176', 'Budi Prasetyo', '1991-02-25', 'Banda Aceh', 'Gampong Laksamana, Banda Aceh', 13, 'Belum Nikah', 'LK', 'Freelancer', 'S1', 'Islam'),
(67, '1111111111111177', 'Susi Pujiastuti', '1993-12-04', 'Banda Aceh', 'Gampong Kuta, Banda Aceh', 8, 'Sudah Nikah', 'PR', 'Pedagang', 'SMA', 'Islam'),
(68, '1111111111111178', 'Rizky Arifin', '1994-01-28', 'Banda Aceh', 'Gampong Lambada, Banda Aceh', 17, 'Belum Nikah', 'LK', 'Mahasiswa', 'S1', 'Islam'),
(69, '1111111111111179', 'Tariq Muhammad', '1990-07-06', 'Banda Aceh', 'Gampong Keudah, Banda Aceh', 2, 'Sudah Nikah', 'LK', 'Tukang Bangunan', 'SMP', 'Islam'),
(70, '1111111111111180', 'Nurul Aini', '1992-11-14', 'Banda Aceh', 'Gampong Tanjong, Banda Aceh', 11, 'Belum Nikah', 'PR', 'Wirausaha', 'S1', 'Islam'),
(71, '1111111111111181', 'Fahmi Ali', '1993-09-11', 'Banda Aceh', 'Gampong Ulee Kareng, Banda Aceh', 5, 'Sudah Nikah', 'LK', 'Tukang Kayu', 'SMA', 'Islam'),
(72, '1111111111111182', 'Siti Nurhaliza', '1995-03-10', 'Banda Aceh', 'Gampong Ceurih, Banda Aceh', 19, 'Belum Nikah', 'PR', 'Sekretaris', 'SMA', 'Islam'),
(73, '1111111111111183', 'Arif Budi', '1987-12-03', 'Banda Aceh', 'Gampong Syiah Kuala, Banda Aceh', 23, 'Sudah Nikah', 'LK', 'Guru', 'S1', 'Islam'),
(74, '1111111111111184', 'Rahmawati', '1992-05-21', 'Banda Aceh', 'Gampong Meunasah, Banda Aceh', 12, 'Belum Nikah', 'PR', 'Dokter', 'S1', 'Islam'),
(75, '1111111111111185', 'Muhammad Fikri', '1994-06-14', 'Banda Aceh', 'Gampong Lhokseumawe, Banda Aceh', 16, 'Belum Nikah', 'LK', 'Mahasiswa', 'S1', 'Islam'),
(76, '1111111111111186', 'Lestari', '1989-01-10', 'Banda Aceh', 'Gampong Cot, Banda Aceh', 28, 'Sudah Nikah', 'PR', 'Ibu Rumah Tangga', 'SMA', 'Islam'),
(77, '1111111111111187', 'Miftahul Jannah', '1990-09-02', 'Banda Aceh', 'Gampong Alue Naga, Banda Aceh', 31, 'Belum Nikah', 'PR', 'Pengusaha', 'S1', 'Islam'),
(78, '1111111111111188', 'Hasan Basri', '1991-03-11', 'Banda Aceh', 'Gampong Laksamana, Banda Aceh', 22, 'Sudah Nikah', 'LK', 'Arsitek', 'S2', 'Islam'),
(79, '1111111111111189', 'Zahra', '1993-11-30', 'Banda Aceh', 'Gampong Ulee Kareng, Banda Aceh', 25, 'Belum Nikah', 'PR', 'Barista', 'SMA', 'Islam'),
(80, '1111111111111190', 'Bambang Setiawan', '1990-04-20', 'Banda Aceh', 'Gampong Cot Seurani, Banda Aceh', 6, 'Sudah Nikah', 'LK', 'Pengacara', 'S1', 'Islam'),
(81, '1111111111111191', 'Indah Purnama', '1996-02-09', 'Banda Aceh', 'Gampong Simpang Rengat, Banda Aceh', 9, 'Belum Nikah', 'PR', 'Asisten Rumah Tangga', 'SMA', 'Islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Kaur Pemerintah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Fadhil', 'admin', 'admin', 'Administrator'),
(3, 'Kang Emon', 'admin2', 'admin2', 'Kaur Pemerintah'),
(5, 'fajry', 'fajry', 'fajry', 'Administrator'),
(6, 'fadhil', 'fadhil', 'fadhil', 'Kaur Pemerintah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_desa`
--
ALTER TABLE `tb_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_desa`
--
ALTER TABLE `tb_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
