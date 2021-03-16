-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2021 pada 10.21
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_marketing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_company`
--

CREATE TABLE `tb_company` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(128) NOT NULL,
  `alias_name_c` varchar(128) NOT NULL,
  `address_c` text NOT NULL,
  `npwp_company` varchar(128) NOT NULL,
  `norek_company` varchar(128) NOT NULL,
  `an_rek_c` varchar(128) NOT NULL,
  `bank_name_c` varchar(50) NOT NULL,
  `ttd_c` varchar(128) NOT NULL,
  `is_active_c` int(1) NOT NULL,
  `date_created_c` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_company`
--

INSERT INTO `tb_company` (`id_company`, `company_name`, `alias_name_c`, `address_c`, `npwp_company`, `norek_company`, `an_rek_c`, `bank_name_c`, `ttd_c`, `is_active_c`, `date_created_c`) VALUES
(6, 'PT MULIA SAWIT AGRO LESTARI', 'MSAL', 'JL. RADIO DALAM RAYA NO.87A RT.005 RW.014, GANDARIA UTARA, KEBAYORAN BARU, JAKARTA SELATAN, DKI JAKARTA - 12140', '02.380.716-7.019.000', '0430.01.000402.30.6', 'PT MULIA SAWIT AGRO LESTARI', 'BRI', 'Kevin Wusman', 1, '2021-01-16'),
(7, 'PT PERSADA SEJAHTERA ARGO MAKMUR', 'PSAM', 'JL. RADIO DALAM RAYA NO.87A RT.005 RW.014, GANDARIA UTARA, KEBAYORAN BARU, JAKARTA SELATAN, DKI JAKARTA - 12140', '03.048.741-7.019.000', '0430.01.000232.30.3', 'PT PERSADA SEJAHTERA ARGO MAKMUR', 'BRI', 'Kevin Wusman', 1, '2021-01-16'),
(11, 'TEST', '', '', '', '', '', '', '', 0, '2021-02-03'),
(12, 'TEST n', 'TEST', '', '', '', '', '', '', 0, '2021-02-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(11) NOT NULL,
  `invoice_number` varchar(38) NOT NULL,
  `contract_number` varchar(38) NOT NULL,
  `contract_type` varchar(5) NOT NULL,
  `id_contract_type` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `sp_stc` int(1) NOT NULL,
  `invoice_date` date NOT NULL,
  `dp_persen` int(3) NOT NULL,
  `due_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(8) NOT NULL,
  `price` int(11) NOT NULL,
  `net_sales` int(16) NOT NULL,
  `message` text NOT NULL,
  `uang_muka` int(16) NOT NULL,
  `dpp` int(16) NOT NULL,
  `ppn` int(16) NOT NULL,
  `total` int(16) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ltc`
--

CREATE TABLE `tb_ltc` (
  `id_ltc` int(11) NOT NULL,
  `ltc_number` varchar(38) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `ltc_date` date NOT NULL,
  `initial_quantity` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `unit` varchar(8) NOT NULL,
  `ppn` varchar(3) DEFAULT NULL,
  `leki_date` date NOT NULL,
  `lekf_date` date NOT NULL,
  `sp_notes` text NOT NULL,
  `cp_dp` int(4) NOT NULL,
  `cp_dp_date` date NOT NULL,
  `cp_notes` text NOT NULL,
  `k_dirt_level` int(4) NOT NULL,
  `k_water_level` int(4) NOT NULL,
  `k_rendemen` int(4) NOT NULL,
  `k_ffa_max` int(4) NOT NULL,
  `k_mi_max` int(4) NOT NULL,
  `k_dobi_min` varchar(8) NOT NULL,
  `k_notes` text NOT NULL,
  `pfp_ffa1` int(4) NOT NULL,
  `pfp_min1` int(4) NOT NULL,
  `pfp_rp1` int(11) NOT NULL,
  `pfp_ppn1` varchar(3) DEFAULT NULL,
  `pfp_ffa2` int(4) NOT NULL,
  `pfp_min2` int(4) NOT NULL,
  `pfp_rp2` int(11) NOT NULL,
  `pfp_ppn2` varchar(3) DEFAULT NULL,
  `pfp_ffa3` int(4) NOT NULL,
  `pdb_md1` int(4) NOT NULL,
  `pdb_min1` int(4) NOT NULL,
  `pdb_rp1` int(11) NOT NULL,
  `pdb_ppn1` varchar(3) DEFAULT NULL,
  `pdb_md2` int(4) NOT NULL,
  `pdb_min2` int(4) NOT NULL,
  `pdb_rp2` int(11) NOT NULL,
  `pdb_ppn2` varchar(3) DEFAULT NULL,
  `pdb_md3` int(4) NOT NULL,
  `pdb_min3` int(4) NOT NULL,
  `pdb_rp3` int(11) NOT NULL,
  `pdb_ppn3` varchar(3) DEFAULT NULL,
  `mip_notes` text NOT NULL,
  `mip_lainya` text NOT NULL,
  `ltc_status` int(1) NOT NULL,
  `is_active_ltc` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mitra`
--

CREATE TABLE `tb_mitra` (
  `id_mitra` int(11) NOT NULL,
  `mitra_name` varchar(128) NOT NULL,
  `alias_name_m` varchar(128) NOT NULL,
  `address_m` text NOT NULL,
  `npwp_mitra` varchar(128) NOT NULL,
  `norek_mitra` varchar(128) NOT NULL,
  `an_rek_m` varchar(128) NOT NULL,
  `bank_name_m` varchar(50) NOT NULL,
  `ttd_m` varchar(128) NOT NULL,
  `is_active_m` int(1) NOT NULL,
  `date_created_m` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mitra`
--

INSERT INTO `tb_mitra` (`id_mitra`, `mitra_name`, `alias_name_m`, `address_m`, `npwp_mitra`, `norek_mitra`, `an_rek_m`, `bank_name_m`, `ttd_m`, `is_active_m`, `date_created_m`) VALUES
(1, 'PT PRIMA SUKSES SEJAHTERA ABADI', 'PSSA', 'GEDUNG EKONOMI LANTAI 2, JL. EMBONG MALANG NO.61-65 RT.001, RW.008, KEDUNGDORO, TEGALSARI, KOTA SURABAYA, JAWA TIMUR', '21.112.200.7-607.000', '164000221876227', 'Prima Sukses', 'Mandiri', 'Gensza', 1, '2021-01-16'),
(2, 'PT MAJU KENA MUNDUR KENA', 'MKMK', 'JALAN KENANGAN NO 21B KECAMATAN TALANG, KABUPATEN TEGAL, JAWA TENGAH', '21.112.250.7-687.241', '164000221879678', 'Gresiya', 'BCA', 'Gresiya', 1, '2021-01-16'),
(5, 'Zaverna n', 'TEST', 'TEST', '', '', '', '', '', 0, '2021-02-03'),
(6, 'Zaverna n', '', '', '', '', '', '', '', 0, '2021-02-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `product_name`, `date_created`) VALUES
(1, 'CPO', '2021-01-16'),
(2, 'CGK', '2021-01-16'),
(3, 'PK', '2021-01-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spot`
--

CREATE TABLE `tb_spot` (
  `id_spot` int(11) NOT NULL,
  `spot_number` varchar(38) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `spot_date` date NOT NULL,
  `initial_quantity` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `unit` varchar(8) NOT NULL,
  `ppn` varchar(3) DEFAULT NULL,
  `leki_date` date NOT NULL,
  `lekf_date` date NOT NULL,
  `sp_notes` text NOT NULL,
  `cp_dp` int(4) NOT NULL,
  `cp_dp_date` date NOT NULL,
  `cp_notes` text NOT NULL,
  `k_dirt_level` int(4) NOT NULL,
  `k_water_level` int(4) NOT NULL,
  `k_rendemen` int(4) NOT NULL,
  `k_ffa_max` int(4) NOT NULL,
  `k_mi_max` int(4) NOT NULL,
  `k_dobi_min` varchar(8) NOT NULL,
  `k_notes` text NOT NULL,
  `pfp_ffa1` int(4) NOT NULL,
  `pfp_min1` int(4) NOT NULL,
  `pfp_rp1` int(11) NOT NULL,
  `pfp_ppn1` varchar(3) DEFAULT NULL,
  `pfp_ffa2` int(4) NOT NULL,
  `pfp_min2` int(4) NOT NULL,
  `pfp_rp2` int(11) NOT NULL,
  `pfp_ppn2` varchar(3) DEFAULT NULL,
  `pfp_ffa3` int(4) NOT NULL,
  `pdb_md1` int(4) NOT NULL,
  `pdb_min1` int(4) NOT NULL,
  `pdb_rp1` int(11) NOT NULL,
  `pdb_ppn1` varchar(3) DEFAULT NULL,
  `pdb_md2` int(4) NOT NULL,
  `pdb_min2` int(4) NOT NULL,
  `pdb_rp2` int(11) NOT NULL,
  `pdb_ppn2` varchar(3) DEFAULT NULL,
  `pdb_md3` int(4) NOT NULL,
  `pdb_min3` int(4) NOT NULL,
  `pdb_rp3` int(11) NOT NULL,
  `pdb_ppn3` varchar(3) DEFAULT NULL,
  `mip_notes` text NOT NULL,
  `mip_lainya` text NOT NULL,
  `spot_status` int(1) NOT NULL,
  `invoice_spot` int(1) NOT NULL,
  `is_active_spot` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stc`
--

CREATE TABLE `tb_stc` (
  `id_stc` int(11) NOT NULL,
  `stc_number` varchar(38) NOT NULL,
  `id_ltc` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `stc_date` date NOT NULL,
  `quantity_ltc` int(11) NOT NULL,
  `quantity_stc` int(11) NOT NULL,
  `wp_1` date NOT NULL,
  `wp_2` date NOT NULL,
  `sp` text NOT NULL,
  `sp_stc` int(1) NOT NULL,
  `p_dp` int(4) NOT NULL,
  `p_t_dp` date NOT NULL,
  `p_notes` text NOT NULL,
  `s_ffa_max` int(4) NOT NULL,
  `s_mi_max` int(4) NOT NULL,
  `s_dobi_min` varchar(8) NOT NULL,
  `s_dirt_level` int(4) NOT NULL,
  `s_water_level` int(4) NOT NULL,
  `s_rendemen` int(4) NOT NULL,
  `s_notes` text NOT NULL,
  `pfp_ffa1` int(4) NOT NULL,
  `pfp_min1` int(4) NOT NULL,
  `pfp_rp1` int(4) NOT NULL,
  `pfp_ppn1` varchar(3) DEFAULT NULL,
  `pfp_ffa2` int(4) NOT NULL,
  `pfp_min2` int(4) NOT NULL,
  `pfp_rp2` int(4) NOT NULL,
  `pfp_ppn2` varchar(3) DEFAULT NULL,
  `pfp_ffa3` int(4) NOT NULL,
  `pdb_md1` int(4) NOT NULL,
  `pdb_min1` int(4) NOT NULL,
  `pdb_rp1` int(4) NOT NULL,
  `pdb_ppn1` varchar(3) DEFAULT NULL,
  `pdb_md2` int(4) NOT NULL,
  `pdb_min2` int(4) NOT NULL,
  `pdb_rp2` int(4) NOT NULL,
  `pdb_ppn2` varchar(3) DEFAULT NULL,
  `pdb_md3` int(4) NOT NULL,
  `pdb_min3` int(4) NOT NULL,
  `pdb_rp3` int(4) NOT NULL,
  `pdb_ppn3` varchar(3) DEFAULT NULL,
  `mip_notes` text NOT NULL,
  `mip_lainya` text NOT NULL,
  `stc_status` int(1) NOT NULL,
  `invoice_stc` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Gensza Nando', 'Example@gmail.com', 'default.jpg', '$2y$10$mxwi3iG6r3wyfLdWGnodduvzVZ3laxCq0ayc3umR5Zqi.U6MwSDEu', 2, 1, 1609488815),
(9, 'pendriyani siti', 'pendriyani@gmail.com', '68873154_106055217429849_6565215596244369408_n.jpg', '$2y$10$ncR/cN1wLjUNKmuH2FGf5O9TXBZqxdx.2zox/X1EF3HQoRTKjMBwu', 1, 1, 1609637135),
(11, 'Admin Msal', 'adminmsal@gmail.com', 'default.jpg', '$2y$10$J/PKtinvtUpwmM5dZb4K4.Yl.m5e1SyEZwbXU/Bc/WNnFzi5Qtmei', 2, 1, 1610378543);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_company`
--
ALTER TABLE `tb_company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `tb_ltc`
--
ALTER TABLE `tb_ltc`
  ADD PRIMARY KEY (`id_ltc`);

--
-- Indeks untuk tabel `tb_mitra`
--
ALTER TABLE `tb_mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `tb_spot`
--
ALTER TABLE `tb_spot`
  ADD PRIMARY KEY (`id_spot`);

--
-- Indeks untuk tabel `tb_stc`
--
ALTER TABLE `tb_stc`
  ADD PRIMARY KEY (`id_stc`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_company`
--
ALTER TABLE `tb_company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_ltc`
--
ALTER TABLE `tb_ltc`
  MODIFY `id_ltc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_mitra`
--
ALTER TABLE `tb_mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_spot`
--
ALTER TABLE `tb_spot`
  MODIFY `id_spot` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_stc`
--
ALTER TABLE `tb_stc`
  MODIFY `id_stc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
