-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2023 pada 09.14
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daebakstore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(18, 'Aksesoris'),
(19, 'Blouse'),
(20, 'Celana'),
(21, 'Dress'),
(22, 'Jaket'),
(23, 'Tunik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` float NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `ketersediaan_stok` enum('habis','tersedia') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `ketersediaan_stok`) VALUES
(13, 18, 'DaebakStore-Aksesoris', 25000, 'J2T2kxlbC7t59b8piKPN.jpg', '                                           Daebak Shop - Aksesoris \r\n<br>\r\nSize : -\r\n<br>\r\nBahan : Super Premium\r\n<br> <br>\r\nKami menyediakan berbagai pakaian wanita .\r\nSedia Melayani 24 Jam\r\n<br><br>\r\nContact Us : +62 857 2417 5825                                          ', 'tersedia'),
(14, 19, 'Daebak Store - Syakila Blouse Black', 100000, 'wOvDgHBa5RJkmVg38gPk.jpg', 'Bahan : katun <br> \r\nHarga : 60k <br> \r\nUkuran : all size <br> \r\nLingkar Dada : 106 cm <br> \r\nPanjang Lengan : 55 cm <br> \r\nPanjang Blouse : 66 cm <br> \r\nWarna : Hitam <br>', 'tersedia'),
(16, 21, 'Daebak Store - Dress Brown', 150000, 'Ix6Xt0sTCdqBodqSuU5r.jpg', 'Daebak Shop - Dress <br> \r\nSize : M, L, XL , DLL <br> \r\nBahan : Super Premium <br> <br> \r\nKami menyediakan berbagai pakaian wanita . Sedia Melayani 24 Jam <br><br> \r\nContact Us : +62 857 2417 5825', 'tersedia'),
(17, 22, 'Daebak Store - Jaket Blue Flower', 200000, 'mR71xR4mKxYgefx2DHCw.jpg', 'Daebak Shop - Jaket <br> Size : M, L, XL , DLL <br> Bahan : Super Premium <br> <br> Kami menyediakan berbagai pakaian wanita . Sedia Melayani 24 Jam <br><br> Contact Us : +62 857 2417 5825', 'tersedia'),
(18, 23, 'Daebak Store - Tunik Blue', 150000, '5go7XGBfGkmfa5v4mt2Y.jpg', 'Daebak Shop - Tunik <br> Size : M, L, XL , DLL <br> Bahan : Super Premium <br> <br> Kami menyediakan berbagai pakaian wanita . Sedia Melayani 24 Jam <br><br> Contact Us : +62 857 2417 5825', 'tersedia'),
(20, 19, 'Daebak Store - Korean Blouse Black', 100000, 'BbAaK8EtF1vEJ3U1ARg1.jpeg', 'Bahan : Crinkle <br> Harga : 85k <br> Warna : Hitam <br> Size : L <br> Lingkar dada : 84cm <br> Panjang bahun : 50 cm <br> Panjang lengan : 57 <br> Lebar bahu : 33 cm <br>', 'tersedia'),
(22, 19, 'Daebak Store - Korean Blouse Milo', 100000, 'k6qrPyI6PLcAuF8CGzRe.jpeg', 'Bahan : Crinkle <br> Harga : 85k <br> Warna : milo <br> Size : L <br> Lingkar dada : 84cm <br> Panjang bahun : 50 cm <br> Panjang lengan : 57 <br> Lebar bahu : 33 cm <br>', 'tersedia'),
(23, 19, 'Daebak Store - Syakila Blouse Puprle', 100000, 'iSHkGCoNncxCfDRZ8cBl.jpg', 'Bahan : katun <br> Harga : 60k <br> Ukuran : all size <br> Lingkar Dada : 106 cm <br> Panjang Lengan : 55 cm <br> Panjang Blouse : 66 cm <br> Warna : Ungu <br>', 'tersedia'),
(24, 19, 'Daebak Store - Syakila Blouse Pink', 100000, 'nbA1CLaCvY5HiC6wfXg3.jpg', 'Bahan : katun <br> Harga : 60k <br> Ukuran : all size <br> Lingkar Dada : 106 cm <br> Panjang Lengan : 55 cm <br> Panjang Blouse : 66 cm <br> Warna : pink <br>', 'tersedia'),
(25, 19, 'Daebak Store - Ruple Blouse Fanta', 110000, 'bv2ln6NrLdA4DcOe5U45.jpeg', 'Bahan : poplin paris <br> Ukuran : all size <br> Lingkar Dada : 106 cm <br> Panjang Lengan : 55 cm <br> Panjang Blouse : 66 cm <br> Warna : pink fanta<br>', 'tersedia'),
(26, 19, 'Daebak Store - Ruple Blouse White', 11000, 'W8XpgpwCZYIQf0H10SIv.jpeg', 'Bahan : poplin paris <br> Ukuran : all size <br> Lingkar Dada : 106 cm <br> Panjang Lengan : 55 cm <br> Panjang Blouse : 66 cm <br> Warna : mint <br>', 'tersedia'),
(27, 19, 'Daebak Store - Ruple Blouse Black', 110000, 'htbFZC1fSEQdksvP2rPQ.jpeg', 'Bahan : poplin paris <br> Ukuran : all size <br> Lingkar Dada : 106 cm <br> Panjang Lengan : 55 cm <br> Panjang Blouse : 66 cm <br> Warna : black <br>', 'tersedia'),
(28, 19, 'Daebak Store - Alaya Blouse All Color', 100000, 'L8jCZttDoypG2W0HbTnR.jpeg', 'Bahan : Crinkle Airflow <br> Ukuran : All size <br> Lingkar Dada : 106 cm <br> Panjang Lengan : 55 cm <br> Panjang Blouse : 66 cm <br> Warna : Lemon, olive , grey, hitam', 'tersedia'),
(29, 19, ' Daebak Store - Tania Blouse All Color', 100000, 'ADKRuKMekwx2qY1SYpyO.jpeg', 'Bahan : Crinkle <br> Ukuran : All size <br> Lingkar Dada : 106 cm <br> Panjang Lengan : 55 cm <br> Panjang Blouse : 66 cm <br> Warna : Bata, milo, teracota & lemon.', 'tersedia'),
(30, 19, 'Daebak Store - Syifon Blouse Blue', 100000, '1l5yip3eOdYJHDKsuoe9.jpeg', 'Bahan : sifon <br> Warna : biru <br> Size : L <br> Lingkar dada : 62cm <br> Panjang bahun : 45 cm <br> Panjang lengan : 59', 'tersedia'),
(31, 19, 'Daebak Store - Syfon Blouse Black', 100000, 'xx0YTYNw1xoYS4PLpptJ.jpeg', 'Bahan : sifon <br> Warna : hitam<br> Size : L <br> Lingkar dada : 62cm <br> Panjang bahun : 45 cm <br> Panjang lengan : 59', 'tersedia'),
(32, 19, 'Daebak Store - Syfon Blouse White', 100000, 'DQrQm1t70vyIkauRmtZe.jpeg', 'Bahan : sifon <br> Warna : putih<br> Size : L <br> Lingkar dada : 62cm <br> Panjang bahun : 45 cm <br> Panjang lengan : 59', 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2a$12$JXmLeqziwAfLUOF6WLX1JuAIWYm80b2HFFymTFaKbSS1a1C8MI5EW'),
(2, 'eri', '$2a$12$/hajA0qWhneuExBIBZUeQek6TbYZi1kfSEnGp1BAEsxCqVhyPmltO'),
(3, 'putri', '$2a$12$JhJTqgsbP2BgllQgWVDStupu4hCY6qsAsKa9Q224W9uAKrMAtrIaq'),
(4, 'siti', '$2a$12$pN5s0IdE8g9TGJ2IY0JuE..vJSYTcVy3DQjVmpg75Guhj9VrlpCz.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
