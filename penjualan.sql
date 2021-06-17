--
-- Database: `penjualan`
--

CREATE DATABASE `penjualan`;
USE `penjualan`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kd_barang` varchar(20) NOT NULL PRIMARY KEY,
  `nm_barang` varchar(30) NOT NULL,
  `kd_jenis` varchar(5) NOT NULL
);

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kd_barang`, `nm_barang`, `kd_jenis`) VALUES
('MKN0001', 'Ayam Geprek', 'MKN'),
('MNM0001', 'Ale-ale', 'MNM'),
('MNM0002', 'Orson', 'MNM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `kd_jenis` varchar(5) NOT NULL PRIMARY KEY,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`kd_jenis`, `jenis`) VALUES
('MKN', 'Makanan'),
('MNM', 'Minuman');

-- --------------------------------------------------------
