-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Agu 2016 pada 16.00
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `kd_barang` varchar(7) NOT NULL,
  `kd_kategori` varchar(7) NOT NULL,
  `nm_barang` varchar(40) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `kd_kategori`, `nm_barang`, `satuan`, `harga_modal`, `harga_jual`, `stok`) VALUES
('0416001', '0316001', 'smartfren andromaxxxxx', 'batang', 23000, 27600, 1),
('0416002', '0316001', 'case xiaomi', 'pcs', 25000, 30000, -4),
('0416003', '0316001', 'baseus case iphone 5 ', 'pcs', 50000, 60000, 49),
('0416004', '0316001', 'baseus case note 5', 'pcs', 52000, 62400, 3),
('0416005', '0316001', 'baseus kabel android', 'pcs', 45000, 54000, 3),
('0416006', '0316001', 'baseus kabel iphone 5/5s', 'pcs', 12000, 14400, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kasir`
--

CREATE TABLE IF NOT EXISTS `tbl_kasir` (
  `kd_kasir` varchar(7) NOT NULL,
  `nm_kasir` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `status` enum('admin','user') NOT NULL,
  PRIMARY KEY (`kd_kasir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kasir`
--

INSERT INTO `tbl_kasir` (`kd_kasir`, `nm_kasir`, `username`, `password`, `status`) VALUES
('0116001', 'esterr', 'ester', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
('0116002', 'ester desindo nababan', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `kd_kategori` varchar(7) NOT NULL,
  `nm_kategori` varchar(40) NOT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kd_kategori`, `nm_kategori`) VALUES
('0316001', 'accecories');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
--

CREATE TABLE IF NOT EXISTS `tbl_pembelian` (
  `kd_transaksi` varchar(7) NOT NULL,
  `kd_supplier` varchar(7) NOT NULL,
  `kd_barang` varchar(7) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `ket` text NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `kd_kasir` int(11) NOT NULL,
  PRIMARY KEY (`kd_transaksi`),
  KEY `FK_aj_supp_transaction_aj_suppliers` (`kd_supplier`),
  KEY `FK_aj_supp_transaction_aj_products` (`kd_barang`),
  KEY `FK_aj_supp_transaction_aj_users` (`kd_kasir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`kd_transaksi`, `kd_supplier`, `kd_barang`, `harga_beli`, `qty`, `subtotal`, `ket`, `tgl_transaksi`, `kd_kasir`) VALUES
('1608001', '0216001', '0416001', 60000, 1, 60000, '-', '2016-08-11', 116002),
('1608002', '0216001', '0', 23000, 10, 230000, '-', '2016-08-12', 116002),
('1608003', '0216002', '0416001', 23000, 10, 230000, '-', '2016-08-04', 116002),
('1608004', '0216001', '0416003', 50000, 45, 2250000, '', '2016-08-02', 116002);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE IF NOT EXISTS `tbl_penjualan` (
  `kd_transaksi` varchar(7) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `kd_kasir` varchar(7) NOT NULL,
  `nm_konsumen` varchar(40) NOT NULL,
  PRIMARY KEY (`kd_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`kd_transaksi`, `tgl_transaksi`, `kd_kasir`, `nm_konsumen`) VALUES
('1608001', '2016-08-12', '0116002', 'suparman'),
('1608002', '2016-08-12', '0116002', 'sss'),
('1608003', '2016-08-12', '0116002', 'sdsdsd'),
('1608004', '2016-08-15', '0116002', 'ester'),
('1608005', '2016-08-15', '0116002', 'lina'),
('1608006', '2016-08-15', '0116002', 'esterr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_penjualan_detail` (
  `kd_transaksi_detail` int(4) NOT NULL AUTO_INCREMENT,
  `kd_barang` varchar(7) NOT NULL,
  `qty` int(11) NOT NULL,
  `kd_transaksi` varchar(7) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '1= sudah diproses , 0 belum diproses',
  PRIMARY KEY (`kd_transaksi_detail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `tbl_penjualan_detail`
--

INSERT INTO `tbl_penjualan_detail` (`kd_transaksi_detail`, `kd_barang`, `qty`, `kd_transaksi`, `harga`, `status`) VALUES
(6, '0416001', 2, '1608003', 27600, '1'),
(5, '0416001', 2, '1608002', 72000, '1'),
(7, '0416001', 7, '1608003', 27600, '1'),
(8, '0416004', 3, '1608004', 62400, '1'),
(9, '0416002', 6, '1608005', 30000, '1'),
(10, '0416005', 2, '1608006', 54000, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `kd_supplier` varchar(7) NOT NULL,
  `nm_supplier` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` int(11) NOT NULL,
  PRIMARY KEY (`kd_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`kd_supplier`, `nm_supplier`, `alamat`, `no_telepon`) VALUES
('0216001', 'cv.unicorner', 'akakak', 876667),
('0216002', 'PO.putro halal', 'KLDDJDJ', 93487);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
