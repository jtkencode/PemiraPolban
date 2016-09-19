-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Sep 2016 pada 16.54
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemira`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `username_admin` varchar(9) NOT NULL,
  `password_admin` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon`
--

CREATE TABLE `calon` (
  `id_calon` int(11) NOT NULL,
  `id_keterangan` int(11) DEFAULT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_nomor` int(11) NOT NULL,
  `nama_calon` varchar(20) NOT NULL,
  `nim_calon` int(11) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `agama` varchar(7) NOT NULL,
  `alamat_sekarang` varchar(50) NOT NULL,
  `alamat_rumah` varchar(50) NOT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `calon`
--

INSERT INTO `calon` (`id_calon`, `id_keterangan`, `id_prodi`, `id_nomor`, `nama_calon`, `nim_calon`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat_sekarang`, `alamat_rumah`, `no_hp`, `no_telp`, `email`, `foto`) VALUES
(1, 1, 16, 1, 'Fadhlan Ridhwanallah', 141524005, 'Bandung', '1995-08-04', 'L', 'Islam', 'Jalan Cibiru Hilir No. 73', 'Jalan Cibiru Hilir No. 73', '085749216686', NULL, 'fridhwanallah@gmail.com', 'calon1.JPG'),
(2, 2, 16, 1, 'M Imam Fauzan P.P.N', 141524012, 'Cimahi', '1994-06-30', 'L', 'Islam', 'Jalan Cimahi', 'Jalan Cimahi', NULL, NULL, 'imamfzn@gmail.com', 'calon1.JPG'),
(3, 1, 1, 2, 'ALDI RAMDHANI F D', 145254003, 'Ciamis', '1996-01-22', 'L', 'Islam', 'Jalan Ciwaruga', 'Jalan Ciwaruga', NULL, NULL, NULL, 'calon1.JPG'),
(4, 2, 2, 2, 'ADE MAULANA', 141611034, 'Bandung', '1995-09-18', 'L', 'Islam', 'Jalan Ciwaruga', 'Jalan Ciwaruga', NULL, NULL, NULL, 'calon1.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hobi`
--

CREATE TABLE `hobi` (
  `id_hobi` int(11) NOT NULL,
  `id_calon` int(11) NOT NULL,
  `nama_hobi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hobi`
--

INSERT INTO `hobi` (`id_hobi`, `id_calon`, `nama_hobi`) VALUES
(1, 1, 'Futsal'),
(2, 1, 'Nonton Film'),
(3, 2, 'Taekwondo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Administrasi Niaga'),
(2, 'Teknik Sipil'),
(3, 'Teknik Mesin'),
(4, 'Teknik Refrigasi dan Tata Udara'),
(5, 'Teknik Komputer dan Informatika'),
(6, 'Teknik Konversi Energi'),
(7, 'Teknik Elektro'),
(8, 'Teknik Kimia'),
(9, 'Akuntansi'),
(10, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keahlian`
--

CREATE TABLE `keahlian` (
  `id_keahlian` int(11) NOT NULL,
  `id_calon` int(11) NOT NULL,
  `nama_keahlian` varchar(20) NOT NULL,
  `jenis_keahlian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keahlian`
--

INSERT INTO `keahlian` (`id_keahlian`, `id_calon`, `nama_keahlian`, `jenis_keahlian`) VALUES
(1, 1, 'Hipnoterapi', 'Non-Akademik'),
(2, 2, 'Taekwondo', 'Bela Diri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `nama_kelas` varchar(1) NOT NULL,
  `status_pemilihan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_prodi`, `nama_kelas`, `status_pemilihan`) VALUES
(1, 4, 'A', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan_calon`
--

CREATE TABLE `keterangan_calon` (
  `id_keterangan` int(11) NOT NULL,
  `nama_keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keterangan_calon`
--

INSERT INTO `keterangan_calon` (`id_keterangan`, `nama_keterangan`) VALUES
(1, 'Cakabem'),
(2, 'Cawakabem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `no_pasangan`
--

CREATE TABLE `no_pasangan` (
  `id_nomor` int(11) NOT NULL,
  `visi` varchar(100) NOT NULL,
  `misi` varchar(300) NOT NULL,
  `paper` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `no_pasangan`
--

INSERT INTO `no_pasangan` (`id_nomor`, `visi`, `misi`, `paper`) VALUES
(1, 'Menjadikan bla bla bla', '1. Menjadikan terbaik.\r\n2. Menjadikan lebih baik.\r\n3. Menjadikan mangprang.', 'paper1.pdf'),
(2, '', '0', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilih`
--

CREATE TABLE `pemilih` (
  `nama_pemilih` varchar(30) NOT NULL,
  `tanggal_lahir_pemilih` date NOT NULL,
  `nim` int(11) NOT NULL,
  `id_nomor` int(11) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `waktu_pemilihan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilih`
--

INSERT INTO `pemilih` (`nama_pemilih`, `tanggal_lahir_pemilih`, `nim`, `id_nomor`, `id_kelas`, `password`, `waktu_pemilihan`) VALUES
('Fadhlan Ridhwanallah', '1995-09-04', 141524005, NULL, 1, 'gantengpisan', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_jurusan`, `nama_prodi`) VALUES
(1, 1, 'D3-Administrasi Bisnis'),
(2, 1, 'D3-Manajemen Pemasaran'),
(3, 1, 'D3-Usaha Perjalanan Wisata'),
(4, 1, 'D4-Manajemen Pemasaran'),
(5, 1, 'D4-Manajemen Aset'),
(6, 1, 'D4-Administrisi Bisnis'),
(7, 1, 'D3-Teknik Konstruksi Sipil'),
(8, 1, 'D3-Teknik Konstruksi Gedung'),
(9, 1, 'D4-Teknik Perancangan Jalan dan Jembatan'),
(10, 1, 'D4-Teknik Perawatan dan Perbaikan Gedung'),
(11, 1, 'D3-Teknik Mesin'),
(12, 1, 'D3-Aeronautika'),
(13, 1, 'D4-TPKM'),
(14, 1, 'D4-Proses Manufaktur'),
(15, 5, 'D3-Teknik Informatika'),
(16, 5, 'D4-Teknik Informatika'),
(17, 7, 'D3-Teknik Elektronika'),
(18, 7, 'D3-Teknik Listrik'),
(19, 7, 'D3-Teknik Telekomunikasi'),
(20, 7, 'D4-Teknik Elektronika'),
(21, 7, 'D4-Teknik Telekomunikasi'),
(22, 7, 'D4-Teknik Otomasi Industri'),
(23, 8, 'D3-Teknik Kimia'),
(24, 8, 'D3-Analis Kimia'),
(25, 8, 'D4-Teknik Kimia Produksi Bersih'),
(26, 9, 'D3-Akutansi'),
(27, 9, 'D3-Keuangan Perbankan'),
(28, 9, 'D4-Akutansi Manajemen Pemerintahan'),
(29, 9, 'D4-Keuangan Syariah'),
(30, 9, 'D4-Akutansi'),
(31, 10, 'D3-Bahasa Inggris'),
(32, 4, 'D3-Teknik Pendingin dan Tata Udara'),
(33, 4, 'D4-Teknik Pendingin dan Tata Udara'),
(34, 6, 'D3-Teknik Konversi Energi'),
(35, 6, 'D4-TPTL'),
(36, 6, 'D4-Teknik Konservasi Energi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_organisasi`
--

CREATE TABLE `riwayat_organisasi` (
  `id_riwayat_organisasi` int(11) NOT NULL,
  `id_calon` int(11) NOT NULL,
  `nama_tingkatan` varchar(15) NOT NULL,
  `nama_organisasi` varchar(20) NOT NULL,
  `mulai_menjabat` int(11) NOT NULL,
  `selesai_menjabat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_organisasi`
--

INSERT INTO `riwayat_organisasi` (`id_riwayat_organisasi`, `id_calon`, `nama_tingkatan`, `nama_organisasi`, `mulai_menjabat`, `selesai_menjabat`) VALUES
(1, 1, 'Lokal', 'Osis MTs Zakaria', 2011, 2012);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `id_riwayat_pendidikan` int(11) NOT NULL,
  `id_calon` int(11) NOT NULL,
  `jenjang_pendidikan` varchar(3) NOT NULL,
  `nama_sekolah` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `tahun_lulus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_pendidikan`
--

INSERT INTO `riwayat_pendidikan` (`id_riwayat_pendidikan`, `id_calon`, `jenjang_pendidikan`, `nama_sekolah`, `kota`, `tahun_lulus`) VALUES
(1, 1, 'SD', 'MI Zakaria', 'Bandung', 2007),
(2, 1, 'SMP', 'Mts Zakaria', 'Bandung', 2010),
(3, 1, 'SMA', 'SMAN 24 Bandung', 'Bandung', 2013),
(4, 2, 'SD', 'Cimahi Pagi', 'Cimahi', 2008),
(5, 2, 'SMP', 'SMPN 5 Bandung', 'Bandung', 2011),
(6, 2, 'SMA', 'SMAN 13 Bandung', 'Bandung', 2014);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_prestasi`
--

CREATE TABLE `riwayat_prestasi` (
  `id_riwayat_prestasi` int(11) NOT NULL,
  `nama_kegiatan` varchar(40) NOT NULL,
  `nama_tingkatan` varchar(15) NOT NULL,
  `id_calon` int(11) NOT NULL,
  `prestasi` varchar(30) NOT NULL,
  `waktu_prestasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_prestasi`
--

INSERT INTO `riwayat_prestasi` (`id_riwayat_prestasi`, `nama_kegiatan`, `nama_tingkatan`, `id_calon`, `prestasi`, `waktu_prestasi`) VALUES
(1, 'Ungkara Award', 'Nasional', 1, 'Aktor Terbaik', 2013);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat`
--

CREATE TABLE `tingkat` (
  `nama_tingkatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tingkat`
--

INSERT INTO `tingkat` (`nama_tingkatan`) VALUES
('Internasional'),
('Lokal'),
('Nasional');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `fk_memiliki_mahasiswa2` (`id_prodi`);

--
-- Indexes for table `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`id_calon`),
  ADD KEY `fk_cakabem_cawakabem` (`id_nomor`),
  ADD KEY `fk_memiliki_keterangan` (`id_keterangan`),
  ADD KEY `fk_memiliki_mahasiswa_2` (`id_prodi`);

--
-- Indexes for table `hobi`
--
ALTER TABLE `hobi`
  ADD PRIMARY KEY (`id_hobi`),
  ADD KEY `fk_memiliki_hobi` (`id_calon`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id_keahlian`),
  ADD KEY `fk_memiliki_keahlian` (`id_calon`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `fk_memiliki_kelas` (`id_prodi`);

--
-- Indexes for table `keterangan_calon`
--
ALTER TABLE `keterangan_calon`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indexes for table `no_pasangan`
--
ALTER TABLE `no_pasangan`
  ADD PRIMARY KEY (`id_nomor`),
  ADD KEY `id_misi` (`misi`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `fk_memiliki_mahasiswa` (`id_kelas`),
  ADD KEY `fk_dipilih` (`id_nomor`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `fk_memiliki_prodi` (`id_jurusan`);

--
-- Indexes for table `riwayat_organisasi`
--
ALTER TABLE `riwayat_organisasi`
  ADD PRIMARY KEY (`id_riwayat_organisasi`),
  ADD KEY `fk_mengikuti_organisasi` (`id_calon`),
  ADD KEY `fk_organisasi_setingkat` (`nama_tingkatan`);

--
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`id_riwayat_pendidikan`),
  ADD KEY `fk_pernah_belajar_di` (`id_calon`);

--
-- Indexes for table `riwayat_prestasi`
--
ALTER TABLE `riwayat_prestasi`
  ADD PRIMARY KEY (`id_riwayat_prestasi`),
  ADD KEY `fk_pernah_berprestasi` (`id_calon`),
  ADD KEY `fk_prestasi_setingkat` (`nama_tingkatan`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`nama_tingkatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon`
--
ALTER TABLE `calon`
  MODIFY `id_calon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hobi`
--
ALTER TABLE `hobi`
  MODIFY `id_hobi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id_keahlian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `keterangan_calon`
--
ALTER TABLE `keterangan_calon`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `no_pasangan`
--
ALTER TABLE `no_pasangan`
  MODIFY `id_nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `riwayat_organisasi`
--
ALTER TABLE `riwayat_organisasi`
  MODIFY `id_riwayat_organisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `id_riwayat_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `riwayat_prestasi`
--
ALTER TABLE `riwayat_prestasi`
  MODIFY `id_riwayat_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_memiliki_mahasiswa2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `calon`
--
ALTER TABLE `calon`
  ADD CONSTRAINT `fk_cakabem_cawakabem` FOREIGN KEY (`id_nomor`) REFERENCES `no_pasangan` (`id_nomor`),
  ADD CONSTRAINT `fk_memiliki_keterangan` FOREIGN KEY (`id_keterangan`) REFERENCES `keterangan_calon` (`id_keterangan`),
  ADD CONSTRAINT `fk_memiliki_mahasiswa_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `hobi`
--
ALTER TABLE `hobi`
  ADD CONSTRAINT `fk_memiliki_hobi` FOREIGN KEY (`id_calon`) REFERENCES `calon` (`id_calon`);

--
-- Ketidakleluasaan untuk tabel `keahlian`
--
ALTER TABLE `keahlian`
  ADD CONSTRAINT `fk_memiliki_keahlian` FOREIGN KEY (`id_calon`) REFERENCES `calon` (`id_calon`);

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_memiliki_kelas` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  ADD CONSTRAINT `fk_dipilih` FOREIGN KEY (`id_nomor`) REFERENCES `no_pasangan` (`id_nomor`),
  ADD CONSTRAINT `fk_memiliki_mahasiswa` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `fk_memiliki_prodi` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `riwayat_organisasi`
--
ALTER TABLE `riwayat_organisasi`
  ADD CONSTRAINT `fk_mengikuti_organisasi` FOREIGN KEY (`id_calon`) REFERENCES `calon` (`id_calon`),
  ADD CONSTRAINT `fk_organisasi_setingkat` FOREIGN KEY (`nama_tingkatan`) REFERENCES `tingkat` (`nama_tingkatan`);

--
-- Ketidakleluasaan untuk tabel `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD CONSTRAINT `fk_pernah_belajar_di` FOREIGN KEY (`id_calon`) REFERENCES `calon` (`id_calon`);

--
-- Ketidakleluasaan untuk tabel `riwayat_prestasi`
--
ALTER TABLE `riwayat_prestasi`
  ADD CONSTRAINT `fk_pernah_berprestasi` FOREIGN KEY (`id_calon`) REFERENCES `calon` (`id_calon`),
  ADD CONSTRAINT `fk_prestasi_setingkat` FOREIGN KEY (`nama_tingkatan`) REFERENCES `tingkat` (`nama_tingkatan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
