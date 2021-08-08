-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 08 Agu 2021 pada 12.55
-- Versi Server: 10.1.48-MariaDB-1~bionic
-- PHP Version: 5.6.40-38+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(6, 'PT MULIA SAWIT AGRO LESTARI', 'MSAL', 'JL RADIO DALAM RAYA NO.87A RT.005 RW.014 GANDARIA UTARA, KEBAYORAN BARU, JAKARTA SELATAN, DKI JAKARTA RAYA - 12140', '02.380.716-7.019.000', '0430.01.000402.30.6 ', 'PT MULIA SAWIT AGRO LESTARI', 'BRI', 'KEVIN WUSMAN', 1, '2021-01-16'),
(7, 'PT PERSADA SEJAHTERA AGRO MAKMUR', 'PSAM', 'JL. RADIO DALAM RAYA NO.87A RT.005 RW.014, GANDARIA UTARA, KEBAYORAN BARU, JAKARTA SELATAN, DKI JAKARTA - 12140', '03.048.741.7-019.000', '0430.01.000232.30.3', 'PT. PERSADA SEJAHTERA AGRO MAKMUR', 'BANK BRI', 'KEVIN WUSMAN', 1, '2021-01-16'),
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
  `k_dirt_level` varchar(8) NOT NULL,
  `k_water_level` varchar(8) NOT NULL,
  `k_rendemen` varchar(8) NOT NULL,
  `k_ffa_max` varchar(8) NOT NULL,
  `k_mi_max` varchar(8) NOT NULL,
  `k_dobi_min` varchar(8) NOT NULL,
  `k_notes` text NOT NULL,
  `pfp_ffa1` varchar(8) NOT NULL,
  `pfp_min1` varchar(8) NOT NULL,
  `pfp_rp1` varchar(11) NOT NULL,
  `pfp_ppn1` varchar(3) DEFAULT NULL,
  `pfp_ffa2` varchar(8) NOT NULL,
  `pfp_min2` varchar(8) NOT NULL,
  `pfp_rp2` varchar(11) NOT NULL,
  `pfp_ppn2` varchar(3) DEFAULT NULL,
  `pfp_ffa3` varchar(8) NOT NULL,
  `pdb_md1` varchar(8) NOT NULL,
  `pdb_min1` varchar(8) NOT NULL,
  `pdb_rp1` varchar(11) NOT NULL,
  `pdb_ppn1` varchar(3) DEFAULT NULL,
  `pdb_md2` varchar(8) NOT NULL,
  `pdb_min2` varchar(8) NOT NULL,
  `pdb_rp2` varchar(11) NOT NULL,
  `pdb_ppn2` varchar(3) DEFAULT NULL,
  `pdb_md3` varchar(8) NOT NULL,
  `pdb_min3` varchar(8) NOT NULL,
  `pdb_rp3` varchar(11) NOT NULL,
  `pdb_ppn3` varchar(3) DEFAULT NULL,
  `mip_notes` text NOT NULL,
  `mip_lainya` text NOT NULL,
  `ltc_status` int(1) NOT NULL,
  `is_active_ltc` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ltc`
--

INSERT INTO `tb_ltc` (`id_ltc`, `ltc_number`, `id_company`, `id_mitra`, `id_product`, `ltc_date`, `initial_quantity`, `quantity`, `unit_price`, `unit`, `ppn`, `leki_date`, `lekf_date`, `sp_notes`, `cp_dp`, `cp_dp_date`, `cp_notes`, `k_dirt_level`, `k_water_level`, `k_rendemen`, `k_ffa_max`, `k_mi_max`, `k_dobi_min`, `k_notes`, `pfp_ffa1`, `pfp_min1`, `pfp_rp1`, `pfp_ppn1`, `pfp_ffa2`, `pfp_min2`, `pfp_rp2`, `pfp_ppn2`, `pfp_ffa3`, `pdb_md1`, `pdb_min1`, `pdb_rp1`, `pdb_ppn1`, `pdb_md2`, `pdb_min2`, `pdb_rp2`, `pdb_ppn2`, `pdb_md3`, `pdb_min3`, `pdb_rp3`, `pdb_ppn3`, `mip_notes`, `mip_lainya`, `ltc_status`, `is_active_ltc`, `date_created`) VALUES
(2, '002/LTC/CPO/MSAL-PSSA/III/2021', 6, 1, 1, '2021-03-07', 34000, 24000, 1200, 'KG', NULL, '2021-03-04', '2021-03-03', 'qq', 12, '2021-03-24', 'qwqw', '0', '0', '0', '2,5', '2,2', '2,2', '', '2,3', '2,1', '2,5', 'on', '5,4', '2,3', '2', 'on', '2,1', '3,2', '2,2', '11', 'on', '3,2', '1,2', '2,2', 'on', '1', '1,2', '2,2', 'on', '1', '1', 1, 1, '2021-03-16'),
(3, '003/LTC/CPO/MSAL-TBL/II/2021', 6, 8, 1, '2021-02-23', 48000000, 48000000, 0, 'KG', NULL, '2021-05-01', '2022-04-30', 'FREE ON BOARD (FOB) DI PELABUHAN BERINGIN, PALANGKARAYA', 90, '0000-00-00', 'DIBAYARKAN 1 MINGGU SEBELUM LOADING\r\n', '0', '0', '0', '5.00', '0.50', '2.00', '', '5.01', '5.50', '100', NULL, '5.51', '6.00', '200', NULL, '6.01', '2.01', '2.10', '100', NULL, '', '', '', NULL, '', '', '', NULL, '(M&I diterima - 0.50)/100 x kuantiti x harga', '', 0, 1, '2021-06-02');

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
(1, 'PT PRIMA SUKSES SEJAHTERA ABADI', 'PSSA', 'GEDUNG EKONOMI LANTAI 2, JL. EMBONG MALANG NO.61-65 RT.001 RW.008 KEDUNGDORO, TEGALSARI KOTA SURABAYA, JAWA TIMUR', '21.112.200.7-607.000', '', '', '', 'STEVANUS NATHANAEL', 1, '2021-01-16'),
(2, 'PT MAJU KENA MUNDUR KENA', 'MKMK', 'JALAN KENANGAN NO 21B KECAMATAN TALANG, KABUPATEN TEGAL, JAWA TENGAH', '21.112.250.7-687.241', '164000221879678', 'Gresiya', 'BCA', 'Gresiya', 0, '2021-01-16'),
(5, 'Zaverna n', 'TEST', 'TEST', '', '', '', '', '', 0, '2021-02-03'),
(6, 'Zaverna n', '', '', '', '', '', '', '', 0, '2021-02-03'),
(7, 'PT SINAR JAYA INTI MULYA', 'SJIM', 'DESA TANAH MAS RT.003 RW.01 BAAMANG HULU –BAAMANG KOTAWARINGIN TIMUR - 74313 NPWP NO: 01.660.733.5-712.001', '01.660.733.5-712.001', '', '', '', 'ROSDIANA', 1, '2021-02-04'),
(8, 'PT. TUNAS BARU LAMPUNG TBK', 'TBL', 'WISMA BUDI LT.8,9   JL. HR RASUNA SAID KAV. C-6, KARET, SETIABUDI, JAKARTA SELATAN, DKI JAKARTA RAYA - 12920', '01.139.219.8-054.000', '', '', '', 'ALFRED OEY', 1, '2021-02-04'),
(9, 'PT. MULIA SAWIT AGRO LESTARI', 'MSAL', 'JL. RADIO DALAM RAYA NO.87A RT.005 RW.014, GANDARIA UTARA, KEBAYORAN BARU, JAKARTA SELATAN, DKI JAKARTA RAYA', '023807167019000', '', '', '', 'KEVIN WUSMAN', 1, '2021-02-16');

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
  `k_dirt_level` varchar(8) NOT NULL,
  `k_water_level` varchar(8) NOT NULL,
  `k_rendemen` varchar(8) NOT NULL,
  `k_ffa_max` varchar(8) NOT NULL,
  `k_mi_max` varchar(8) NOT NULL,
  `k_dobi_min` varchar(8) NOT NULL,
  `k_notes` text NOT NULL,
  `pfp_ffa1` varchar(8) NOT NULL,
  `pfp_min1` varchar(8) NOT NULL,
  `pfp_rp1` varchar(11) NOT NULL,
  `pfp_ppn1` varchar(3) DEFAULT NULL,
  `pfp_ffa2` varchar(8) NOT NULL,
  `pfp_min2` varchar(8) NOT NULL,
  `pfp_rp2` varchar(11) NOT NULL,
  `pfp_ppn2` varchar(3) DEFAULT NULL,
  `pfp_ffa3` varchar(8) NOT NULL,
  `pdb_md1` varchar(8) NOT NULL,
  `pdb_min1` varchar(8) NOT NULL,
  `pdb_rp1` varchar(11) NOT NULL,
  `pdb_ppn1` varchar(3) DEFAULT NULL,
  `pdb_md2` varchar(8) NOT NULL,
  `pdb_min2` varchar(8) NOT NULL,
  `pdb_rp2` varchar(11) NOT NULL,
  `pdb_ppn2` varchar(3) DEFAULT NULL,
  `pdb_md3` varchar(8) NOT NULL,
  `pdb_min3` varchar(8) NOT NULL,
  `pdb_rp3` varchar(11) NOT NULL,
  `pdb_ppn3` varchar(3) DEFAULT NULL,
  `mip_notes` text NOT NULL,
  `mip_lainya` text NOT NULL,
  `spot_status` int(1) NOT NULL,
  `invoice_spot` int(1) NOT NULL,
  `is_active_spot` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_spot`
--

INSERT INTO `tb_spot` (`id_spot`, `spot_number`, `id_company`, `id_mitra`, `id_product`, `spot_date`, `initial_quantity`, `quantity`, `unit_price`, `unit`, `ppn`, `leki_date`, `lekf_date`, `sp_notes`, `cp_dp`, `cp_dp_date`, `cp_notes`, `k_dirt_level`, `k_water_level`, `k_rendemen`, `k_ffa_max`, `k_mi_max`, `k_dobi_min`, `k_notes`, `pfp_ffa1`, `pfp_min1`, `pfp_rp1`, `pfp_ppn1`, `pfp_ffa2`, `pfp_min2`, `pfp_rp2`, `pfp_ppn2`, `pfp_ffa3`, `pdb_md1`, `pdb_min1`, `pdb_rp1`, `pdb_ppn1`, `pdb_md2`, `pdb_min2`, `pdb_rp2`, `pdb_ppn2`, `pdb_md3`, `pdb_min3`, `pdb_rp3`, `pdb_ppn3`, `mip_notes`, `mip_lainya`, `spot_status`, `invoice_spot`, `is_active_spot`, `date_created`) VALUES
(1, '001/SPOT/CPO/PSAM-MSAL/I/2021', 7, 9, 1, '2021-01-07', 680000, 680000, 10100, 'KG', 'on', '2021-01-12', '2021-01-20', '- LOCO PKS PENJUAL', 90, '0000-00-00', '-	DP ADALAH SEBESAR 90%, DIBAYAR SEBELUM PENYERAHAN TERAKHIR\r\n-	PELUNASAN SETELAH TERBIT BERITA ACARA PENYERAHAN CPO, PEMBELI MENERIMA DOKUMEN TAGIHAN DAN TIDAK TERJADI MASALAH\r\n-	KUANTITAS BERDASARKAN HASIL PENIMBANGAN DI PABRIK PENJUAL YANG TELAH LULUS UJI TERA OLEH BADAN METROLOGI\r\n-	PEMBAYARAN DP DAN PELUNASAN ADALAH TERMASUK PPN, UNTUK DP TANPA MENUNGGU FAKTUR PAJAK\r\n', '0', '0', '0', '5', '1', '2.10', '', '5.1', '6.1', '100', 'on', '6.1', '7.1', '200', 'on', '7', '0', '2', '100', 'on', '2', '3', '200', 'on', '3', '4', '250', 'on', 'M & I PENALTY = (M & I DITERIMA – M & I KONTRAK) % X HARGA (INC) X KUANTITAS', '', 2, 0, 1, '2021-02-16'),
(2, '002/SPOT/PK/MSAL-PSSA/III/2021', 6, 1, 3, '2021-03-07', 1, 1, 1, 'KG', '', '0000-00-00', '0000-00-00', '', 0, '0000-00-00', '', 'as', 'as', '0', 'as', '0', '0', '', '0', '0', '0', NULL, '0', '0', '0', NULL, '0', '0', '0', '0', NULL, '0', '0', '0', NULL, '0', '0', '0', NULL, '0', '0', 2, 0, 0, '2021-03-16'),
(3, '003/SPOT/CPO/MSAL-PSSA/III/2021', 6, 1, 1, '2021-03-05', 1, 1, 1, 'GR', '', '0000-00-00', '0000-00-00', '', 0, '0000-00-00', '', '0', '0', '0', '', '', '', '', '0', '0', '0', NULL, '0', '0', '0', NULL, '0', '0', '0', '0', NULL, '0', '0', '0', NULL, '0', '0', '0', NULL, '', '', 2, 0, 0, '2021-03-16');

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
  `s_ffa_max` varchar(8) NOT NULL,
  `s_mi_max` varchar(8) NOT NULL,
  `s_dobi_min` varchar(8) NOT NULL,
  `s_dirt_level` varchar(8) NOT NULL,
  `s_water_level` varchar(8) NOT NULL,
  `s_rendemen` varchar(8) NOT NULL,
  `s_notes` text NOT NULL,
  `pfp_ffa1` varchar(8) NOT NULL,
  `pfp_min1` varchar(8) NOT NULL,
  `pfp_rp1` varchar(8) NOT NULL,
  `pfp_ppn1` varchar(3) DEFAULT NULL,
  `pfp_ffa2` varchar(8) NOT NULL,
  `pfp_min2` varchar(8) NOT NULL,
  `pfp_rp2` varchar(8) NOT NULL,
  `pfp_ppn2` varchar(3) DEFAULT NULL,
  `pfp_ffa3` varchar(8) NOT NULL,
  `pdb_md1` varchar(8) NOT NULL,
  `pdb_min1` varchar(8) NOT NULL,
  `pdb_rp1` varchar(8) NOT NULL,
  `pdb_ppn1` varchar(3) DEFAULT NULL,
  `pdb_md2` varchar(8) NOT NULL,
  `pdb_min2` varchar(8) NOT NULL,
  `pdb_rp2` varchar(8) NOT NULL,
  `pdb_ppn2` varchar(3) DEFAULT NULL,
  `pdb_md3` varchar(8) NOT NULL,
  `pdb_min3` varchar(8) NOT NULL,
  `pdb_rp3` varchar(8) NOT NULL,
  `pdb_ppn3` varchar(3) DEFAULT NULL,
  `mip_notes` text NOT NULL,
  `mip_lainya` text NOT NULL,
  `stc_status` int(1) NOT NULL,
  `invoice_stc` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_stc`
--

INSERT INTO `tb_stc` (`id_stc`, `stc_number`, `id_ltc`, `id_product`, `id_company`, `id_mitra`, `stc_date`, `quantity_ltc`, `quantity_stc`, `wp_1`, `wp_2`, `sp`, `sp_stc`, `p_dp`, `p_t_dp`, `p_notes`, `s_ffa_max`, `s_mi_max`, `s_dobi_min`, `s_dirt_level`, `s_water_level`, `s_rendemen`, `s_notes`, `pfp_ffa1`, `pfp_min1`, `pfp_rp1`, `pfp_ppn1`, `pfp_ffa2`, `pfp_min2`, `pfp_rp2`, `pfp_ppn2`, `pfp_ffa3`, `pdb_md1`, `pdb_min1`, `pdb_rp1`, `pdb_ppn1`, `pdb_md2`, `pdb_min2`, `pdb_rp2`, `pdb_ppn2`, `pdb_md3`, `pdb_min3`, `pdb_rp3`, `pdb_ppn3`, `mip_notes`, `mip_lainya`, `stc_status`, `invoice_stc`, `date_created`) VALUES
(2, '002/CPO/MSAL-PSSA/III/2021', 2, 1, 6, 1, '2021-03-12', 34000, 10000, '0000-00-00', '0000-00-00', 'qq', 1, 0, '0000-00-00', 'qwqw', '2,5', '2,2', '2,2', '0', '0', '0', '', '2,3', '2,1', '2,5', 'on', '5,4', '2,3', '2', 'on', '2,1', '3,2', '2,2', '11', 'on', '3,2', '1,2', '2,2', 'on', '1', '1,2', '2,2', 'on', '1', '1', 1, 0, '2021-03-16');

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
-- Indexes for table `tb_company`
--
ALTER TABLE `tb_company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tb_ltc`
--
ALTER TABLE `tb_ltc`
  ADD PRIMARY KEY (`id_ltc`);

--
-- Indexes for table `tb_mitra`
--
ALTER TABLE `tb_mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tb_spot`
--
ALTER TABLE `tb_spot`
  ADD PRIMARY KEY (`id_spot`);

--
-- Indexes for table `tb_stc`
--
ALTER TABLE `tb_stc`
  ADD PRIMARY KEY (`id_stc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_company`
--
ALTER TABLE `tb_company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_ltc`
--
ALTER TABLE `tb_ltc`
  MODIFY `id_ltc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_mitra`
--
ALTER TABLE `tb_mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_spot`
--
ALTER TABLE `tb_spot`
  MODIFY `id_spot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_stc`
--
ALTER TABLE `tb_stc`
  MODIFY `id_stc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
