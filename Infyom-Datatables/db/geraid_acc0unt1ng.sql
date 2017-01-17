-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2017 at 07:58 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geraid_acc0unt1ng`
--

-- --------------------------------------------------------

--
-- Table structure for table `as_company`
--

CREATE TABLE `as_company` (
  `companyID` int(11) NOT NULL,
  `companyCode` varchar(20) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `contactPerson` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `village` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `province` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `phonecp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `print_address` text NOT NULL,
  `faktur_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel Perusahaan';

--
-- Dumping data for table `as_company`
--

INSERT INTO `as_company` (`companyID`, `companyCode`, `companyName`, `contactPerson`, `address`, `village`, `district`, `city`, `zipcode`, `province`, `phone`, `fax`, `phonecp`, `email`, `print_address`, `faktur_address`) VALUES
(1, '', 'MARIA BABY GARMEN', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `companyCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `companyName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contactPerson` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonecp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `print_address` text COLLATE utf8_unicode_ci NOT NULL,
  `faktur_address` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `companyCode`, `companyName`, `contactPerson`, `address`, `village`, `district`, `city`, `zipcode`, `province`, `phone`, `fax`, `phonecp`, `email`, `print_address`, `faktur_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', 'MARIA BABY GARMEN', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contactPerson` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` text COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipCode` int(11) NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonecp1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonecp2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pkpName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` date NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` date NOT NULL,
  `modifiedUserID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customerCode`, `customerName`, `contactPerson`, `address`, `address2`, `village`, `district`, `city`, `zipCode`, `province`, `phone`, `fax`, `phonecp1`, `phonecp2`, `email`, `note`, `npwp`, `pkpName`, `category`, `status`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '0002', 'GROSIR', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'retail', 'active', '2016-08-10', 1, '2016-08-10', 1, NULL, NULL, NULL),
(2, '0001', 'CASH', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'retail', 'active', '2016-08-10', 1, '0000-00-00', 0, NULL, NULL, NULL),
(3, '0003', 'KIDDY', 'GINA', 'KARAWACI', '', '', '', 'TANGERANG', 0, 'BANTEN', '', '', '', '', '', '', '125.235.12.95-889', 'GINA', 'distributor', 'active', '2016-08-10', 1, '2016-12-28', 2, NULL, NULL, NULL),
(4, '0005', 'HANADORA', 'Novilia', '', '', '', '', 'Jakarta Barat', 0, 'DKI Jakarta', '', '', '', '', 'novilia@hanadora.com', '', '', '', 'distributor', 'active', '2016-08-13', 1, '2016-12-28', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `factories`
--

CREATE TABLE `factories` (
  `id` int(10) UNSIGNED NOT NULL,
  `factoryCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `factoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `factoryType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` date NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` date NOT NULL,
  `modifiedUserID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `factories`
--

INSERT INTO `factories` (`id`, `factoryCode`, `factoryName`, `factoryType`, `status`, `note`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fds', 'df', 'temporary', '0', 'dfs', '2017-01-18', 21, '2017-01-26', 2, '2017-01-16 20:33:34', '2017-01-16 20:33:34', NULL),
(2, '22', '21', 'permanent', '1', 'dsf df sf sdf ds', '2017-01-18', 1, '2017-01-31', 2, '2017-01-16 20:34:00', '2017-01-16 20:34:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_01_16_072838_create_customers_table', 2),
(4, '2017_01_16_075315_create_products_table', 3),
(5, '2017_01_16_083605_create_sales_prices_table', 4),
(6, '2017_01_16_100214_create_stock_products_table', 5),
(7, '2017_01_16_103040_create_receives_table', 6),
(8, '2017_01_16_111545_create_companies_table', 7),
(9, '2017_01_16_121847_create_cobatries_table', 8),
(10, '2017_01_16_122505_create_cobatries_table', 9),
(11, '2017_01_16_125649_create_purchase_prices_table', 10),
(12, '2017_01_16_125957_create_sales_prices_table', 11),
(13, '2017_01_17_024244_create_salesorderitems_table', 12),
(14, '2017_01_17_025610_create_salespayments_table', 13),
(15, '2017_01_17_031435_create_customers_table', 14),
(16, '2017_01_17_032050_create_ops_table', 15),
(17, '2017_01_17_033238_create_factories_table', 16),
(18, '2017_01_17_035144_create_products_table', 17),
(19, '2017_01_17_041408_create_products_table', 18),
(20, '2017_01_17_051016_create_salesorders_table', 19),
(21, '2017_01_17_064540_create_suppliers_table', 20),
(22, '2017_01_17_065504_create_salesinvoices_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `ms_admin`
--

CREATE TABLE `ms_admin` (
  `adminID` int(11) NOT NULL,
  `adminCode` varchar(25) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `level` char(1) NOT NULL COMMENT '1 = Administrator, 2 = SPV, 3 = Sales, 4 = Kasir',
  `photo` text NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lastLogin` datetime NOT NULL,
  `token` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel Admin system';

-- --------------------------------------------------------

--
-- Table structure for table `ms_customers`
--

CREATE TABLE `ms_customers` (
  `customerID` int(11) NOT NULL,
  `customerCode` char(5) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `contactPerson` varchar(100) NOT NULL,
  `address` varchar(160) NOT NULL,
  `address2` text NOT NULL,
  `village` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zipCode` int(5) NOT NULL,
  `province` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `phonecp1` varchar(20) NOT NULL,
  `phonecp2` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `pkpName` varchar(100) NOT NULL,
  `category` enum('retail','reseler','distributor') NOT NULL DEFAULT 'retail',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `createdDate` datetime NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_customers`
--

INSERT INTO `ms_customers` (`customerID`, `customerCode`, `customerName`, `contactPerson`, `address`, `address2`, `village`, `district`, `city`, `zipCode`, `province`, `phone`, `fax`, `phonecp1`, `phonecp2`, `email`, `note`, `npwp`, `pkpName`, `category`, `status`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`) VALUES
(1, '0002', 'GROSIR', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'retail', 'active', '2016-08-10 17:45:41', 1, '2016-08-10 17:57:11', 1),
(2, '0001', 'CASH', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'retail', 'active', '2016-08-10 17:47:27', 1, '0000-00-00 00:00:00', 0),
(3, '0003', 'KIDDY', 'GINA', 'KARAWACI', '', '', '', 'TANGERANG', 0, 'BANTEN', '', '', '', '', '', '', '125.235.12.95-889', 'GINA', 'distributor', 'active', '2016-08-10 18:01:11', 1, '2016-12-28 05:04:26', 2),
(4, '0005', 'HANADORA', 'Novilia', '', '', '', '', 'Jakarta Barat', 0, 'DKI Jakarta', '', '', '', '', 'novilia@hanadora.com', '', '', '', 'distributor', 'active', '2016-08-13 16:08:05', 1, '2016-12-28 05:04:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ms_factories`
--

CREATE TABLE `ms_factories` (
  `factoryID` int(11) NOT NULL,
  `factoryCode` varchar(10) NOT NULL,
  `factoryName` varchar(100) NOT NULL,
  `factoryType` enum('temporary','permanent') NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1' COMMENT '0 = Inactive, 1 = Active',
  `note` text NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel Gudang penyimpanan';

-- --------------------------------------------------------

--
-- Table structure for table `ms_products`
--

CREATE TABLE `ms_products` (
  `productID` int(11) NOT NULL,
  `productCode` varchar(10) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `unit` int(11) NOT NULL,
  `note` text NOT NULL,
  `stock` int(11) NOT NULL,
  `image` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `createdDate` datetime NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_products`
--

INSERT INTO `ms_products` (`productID`, `productCode`, `productName`, `unit`, `note`, `stock`, `image`, `status`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`) VALUES
(1, '11148', 'Baby set baju, celana, topi, sepatu', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(2, '35109', 'Bedong Rotary 40S (isi 3 pcs)', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(3, '3539', 'Gurita Ibu Twill 4 Perekat', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '2016-12-09 19:32:58', 2),
(4, '3539B', 'Gurita Ibu Twill 4 Perekat Mika', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(5, '3565', 'Popok Kaos Sablon isi 6 pcs', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(6, '3590', 'Gurita Anak Polos isi 6 pcs', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(7, '3592', 'Popok Warna isi 6 pcs', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(8, '3703', 'Bib Kaos 40S Aplikasi Bordir isi 2', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(9, '3704', 'Washlap Handuk Bentuk Bordir', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(10, '3705', 'Washlap Handuk 2 pcs Bordir dan Sablon', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(11, '3766', 'Tatakan Iler Handuk Perekat', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(12, '3770', 'Washlap Handuk Jari+Kotak WR', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(13, '3771', 'Tatakan Iler Velcrow', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(14, '3773', 'Tatakan Iler Kancing 2 pcs', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(15, '3777', 'Washlap Handuk Bentuk Tangan', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(16, '3785', 'Bib Plastik Sablon Kecil', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(17, '3795', 'Bib Perekat Plastik 2 pcs', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(18, '3796', 'Bib Handuk Sablon n Bordir Aplikasi', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(19, '3836', 'STK Kaos Rib Sablon', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(20, '3836B', 'STK Kaos Rib', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(21, '3844', 'STK Kaos Karet Sablon', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(22, '3844B', 'STK Rotary 40S', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(23, '3855', 'Sarung Tangan /Sepatu WR 40S', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(24, '3860', 'STK Boneka', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(25, '3861', 'STK Sablon WR 30S', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(26, '3861B', 'STK Warna Sablon', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(27, '6011', 'Perlak Kecil', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(28, '6012', 'Perlak Besar', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(29, '9436', 'Bando Renda Pita Besar', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(30, '9437', 'Bando Renda Pita Bunga', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(31, '9438', 'Bando Renda PomPom', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(32, '9439', 'Bando Renda Bulu Pita Besar', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(33, '9440', 'Bando Renda Pita n 2 Jepitan', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(34, 'CS001', 'Washlap Handuk Feeding Set', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(35, 'CS11106', 'Baby Set Kaos Celana Bib STK', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(36, 'CS11141', 'Baby Set Kimono Gurita Bedong', 0, '', 999999999, '', 1, '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', 0),
(37, 'UCMB001', 'Miabelle Bodysuit', 2, '', 0, '', 0, '2016-12-28 05:08:59', 2, '0000-00-00 00:00:00', 0),
(38, 'UCMB002', 'Miabelle Baby Tee Kerah Pundak', 2, '', 0, '', 0, '2016-12-28 05:14:11', 2, '2016-12-28 05:14:24', 2),
(39, 'UCMB003', 'Miabelle Baby Tee Kerah Bulat', 2, '', 0, '', 0, '2016-12-28 05:23:46', 2, '0000-00-00 00:00:00', 0),
(40, 'UCMB005', 'Miabelle Celana Cropped', 2, '', 0, '', 0, '2016-12-28 05:24:17', 2, '0000-00-00 00:00:00', 0),
(41, 'SBMB001/2', 'Miabelle Bedong isi 4pcs', 1, '', 0, '', 0, '2016-12-28 05:25:34', 2, '2016-12-28 05:32:22', 2),
(42, 'NBML001/2', 'Mamalia Gurita Bayi isi 6pcs', 2, '', 0, '', 0, '2016-12-28 05:27:24', 2, '0000-00-00 00:00:00', 0),
(43, 'NBMB001', 'Miabelle Set Topi Kupluk + Sepatu', 1, '', 0, '', 0, '2016-12-28 05:29:05', 2, '2016-12-28 05:33:33', 2),
(44, 'MCMM001', 'Mamalia Gurita Ibu Korset', 2, '', 0, '', 0, '2016-12-28 05:30:17', 2, '0000-00-00 00:00:00', 0),
(45, 'BBMB001/2', 'Miabelle Bandana Bib isi 4pcs', 1, '', 0, '', 0, '2016-12-28 05:31:46', 2, '0000-00-00 00:00:00', 0),
(48, '3502', 'Baju Rotary + Bando Renda', 1, '', 0, '', 0, '2016-12-28 07:59:31', 2, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ms_purchase_price`
--

CREATE TABLE `ms_purchase_price` (
  `priceID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productCode` varchar(20) NOT NULL,
  `price` decimal(12,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_sales_price`
--

CREATE TABLE `ms_sales_price` (
  `priceID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productCode` varchar(20) NOT NULL,
  `price` decimal(12,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_sales_price`
--

INSERT INTO `ms_sales_price` (`priceID`, `customerID`, `productID`, `productCode`, `price`) VALUES
(1, 3, 1, '11148', '26500.0000'),
(2, 3, 2, '35109', '55800.0000'),
(3, 3, 3, '3539', '37000.0000'),
(4, 3, 4, '3539B', '39500.0000'),
(5, 3, 5, '3565', '22000.0000'),
(6, 3, 6, '3590', '22000.0000'),
(7, 3, 7, '3592', '23000.0000'),
(8, 3, 8, '3703', '17000.0000'),
(9, 3, 9, '3704', '6000.0000'),
(10, 3, 10, '3705', '9500.0000'),
(11, 3, 11, '3766', '4750.0000'),
(12, 3, 12, '3770', '7800.0000'),
(13, 3, 13, '3771', '5200.0000'),
(14, 3, 14, '3773', '7800.0000'),
(15, 3, 15, '3777', '4500.0000'),
(16, 3, 16, '3785', '3250.0000'),
(17, 3, 17, '3795', '8000.0000'),
(18, 3, 18, '3796', '8500.0000'),
(19, 3, 19, '3836', '4700.0000'),
(20, 3, 20, '3836B', '5000.0000'),
(21, 3, 21, '3844', '4700.0000'),
(22, 3, 22, '3844B', '5000.0000'),
(23, 3, 23, '3855', '5800.0000'),
(24, 3, 24, '3860', '5600.0000'),
(25, 3, 25, '3861', '4650.0000'),
(26, 3, 26, '3861B', '5100.0000'),
(27, 3, 27, '6011', '5000.0000'),
(28, 3, 28, '6012', '14500.0000'),
(29, 3, 29, '9436', '7000.0000'),
(30, 3, 30, '9437', '8100.0000'),
(31, 3, 31, '9438', '15000.0000'),
(32, 3, 32, '9439', '18000.0000'),
(33, 3, 33, '9440', '13500.0000'),
(34, 3, 34, 'CS001', '2200.0000'),
(35, 3, 35, 'CS11106', '21500.0000'),
(36, 3, 36, 'CS11141', '26500.0000'),
(40, 2, 0, 'UCMB001', '0.0000'),
(41, 1, 0, 'UCMB001', '0.0000'),
(42, 4, 0, 'UCMB001', '7000.0000'),
(43, 3, 0, 'UCMB001', '0.0000'),
(44, 2, 38, 'UCMB002', '0.0000'),
(45, 1, 38, 'UCMB002', '0.0000'),
(46, 4, 38, 'UCMB002', '5600.0000'),
(47, 3, 38, 'UCMB002', '0.0000'),
(48, 2, 0, 'UCMB003', '0.0000'),
(49, 1, 0, 'UCMB003', '0.0000'),
(50, 4, 0, 'UCMB003', '5600.0000'),
(51, 3, 0, 'UCMB003', '0.0000'),
(52, 2, 0, 'UCMB005', '0.0000'),
(53, 1, 0, 'UCMB005', '0.0000'),
(54, 4, 0, 'UCMB005', '5925.0000'),
(55, 3, 0, 'UCMB005', '0.0000'),
(56, 2, 0, 'SBMB001/2', '0.0000'),
(57, 1, 0, 'SBMB001/2', '0.0000'),
(58, 4, 0, 'SBMB001/2', '62500.0000'),
(59, 3, 0, 'SBMB001/2', '0.0000'),
(60, 2, 0, 'NBML001/2', '0.0000'),
(61, 1, 0, 'NBML001/2', '0.0000'),
(62, 4, 0, 'NBML001/2', '17500.0000'),
(63, 3, 0, 'NBML001/2', '0.0000'),
(64, 2, 0, 'NBMB001', '0.0000'),
(65, 1, 0, 'NBMB001', '0.0000'),
(66, 4, 0, 'NBMB001', '5500.0000'),
(67, 3, 0, 'NBMB001', '0.0000'),
(68, 2, 0, 'MCMM001', '0.0000'),
(69, 1, 0, 'MCMM001', '0.0000'),
(70, 4, 0, 'MCMM001', '32000.0000'),
(71, 3, 0, 'MCMM001', '0.0000'),
(72, 2, 0, 'BBMB001/2', '0.0000'),
(73, 1, 0, 'BBMB001/2', '0.0000'),
(74, 4, 0, 'BBMB001/2', '11000.0000'),
(75, 3, 0, 'BBMB001/2', '0.0000'),
(76, 2, 41, 'SBMB001/2', '0.0000'),
(77, 1, 41, 'SBMB001/2', '0.0000'),
(78, 4, 41, 'SBMB001/2', '0.0000'),
(79, 3, 41, 'SBMB001/2', '0.0000'),
(80, 2, 43, 'NBMB001', '0.0000'),
(81, 1, 43, 'NBMB001', '0.0000'),
(82, 4, 43, 'NBMB001', '5500.0000'),
(83, 3, 43, 'NBMB001', '0.0000'),
(92, 2, 48, '3502', '0.0000'),
(93, 1, 48, '3502', '0.0000'),
(94, 4, 48, '3502', '0.0000'),
(95, 3, 48, '3502', '25000.0000');

-- --------------------------------------------------------

--
-- Table structure for table `ms_suppliers`
--

CREATE TABLE `ms_suppliers` (
  `supplierID` int(11) NOT NULL,
  `supplierCode` varchar(10) NOT NULL,
  `supplierName` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `contactPerson` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` date NOT NULL,
  `modifiedUserID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productCode`, `productName`, `unit`, `note`, `stock`, `image`, `status`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '11148', 'Baby set baju, celana, topi, sepatu', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(2, '35109', 'Bedong Rotary 40S (isi 3 pcs)', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(3, '3539', 'Gurita Ibu Twill 4 Perekat', 0, '', 999999999, '', 1, '0000-00-00', 5, '2016-12-09', 2, NULL, NULL, NULL),
(4, '3539B', 'Gurita Ibu Twill 4 Perekat Mika', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(5, '3565', 'Popok Kaos Sablon isi 6 pcs', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(6, '3590', 'Gurita Anak Polos isi 6 pcs', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(7, '3592', 'Popok Warna isi 6 pcs', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(8, '3703', 'Bib Kaos 40S Aplikasi Bordir isi 2', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(9, '3704', 'Washlap Handuk Bentuk Bordir', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(10, '3705', 'Washlap Handuk 2 pcs Bordir dan Sablon', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(11, '3766', 'Tatakan Iler Handuk Perekat', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(12, '3770', 'Washlap Handuk Jari+Kotak WR', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(13, '3771', 'Tatakan Iler Velcrow', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(14, '3773', 'Tatakan Iler Kancing 2 pcs', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(15, '3777', 'Washlap Handuk Bentuk Tangan', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(16, '3785', 'Bib Plastik Sablon Kecil', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(17, '3795', 'Bib Perekat Plastik 2 pcs', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(18, '3796', 'Bib Handuk Sablon n Bordir Aplikasi', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(19, '3836', 'STK Kaos Rib Sablon', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(20, '3836B', 'STK Kaos Rib', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(21, '3844', 'STK Kaos Karet Sablon', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(22, '3844B', 'STK Rotary 40S', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(23, '3855', 'Sarung Tangan /Sepatu WR 40S', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(24, '3860', 'STK Boneka', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(25, '3861', 'STK Sablon WR 30S', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(26, '3861B', 'STK Warna Sablon', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(27, '6011', 'Perlak Kecil', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(28, '6012', 'Perlak Besar', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(29, '9436', 'Bando Renda Pita Besar', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(30, '9437', 'Bando Renda Pita Bunga', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(31, '9438', 'Bando Renda PomPom', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(32, '9439', 'Bando Renda Bulu Pita Besar', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(33, '9440', 'Bando Renda Pita n 2 Jepitan', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(34, 'CS001', 'Washlap Handuk Feeding Set', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(35, 'CS11106', 'Baby Set Kaos Celana Bib STK', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(36, 'CS11141', 'Baby Set Kimono Gurita Bedong', 0, '', 999999999, '', 1, '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(37, 'UCMB001', 'Miabelle Bodysuit', 2, '', 0, '', 0, '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(38, 'UCMB002', 'Miabelle Baby Tee Kerah Pundak', 2, '', 0, '', 0, '2016-12-28', 2, '2016-12-28', 2, NULL, NULL, NULL),
(39, 'UCMB003', 'Miabelle Baby Tee Kerah Bulat', 2, '', 0, '', 0, '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(40, 'UCMB005', 'Miabelle Celana Cropped', 2, '', 0, '', 0, '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(41, 'SBMB001/2', 'Miabelle Bedong isi 4pcs', 1, '', 0, '', 0, '2016-12-28', 2, '2016-12-28', 2, NULL, NULL, NULL),
(42, 'NBML001/2', 'Mamalia Gurita Bayi isi 6pcs', 2, '', 0, '', 0, '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(43, 'NBMB001', 'Miabelle Set Topi Kupluk + Sepatu', 1, '', 0, '', 0, '2016-12-28', 2, '2016-12-28', 2, NULL, NULL, NULL),
(44, 'MCMM001', 'Mamalia Gurita Ibu Korset', 2, '', 0, '', 0, '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(45, 'BBMB001/2', 'Miabelle Bandana Bib isi 4pcs', 1, '', 0, '', 0, '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(48, '3502', 'Baju Rotary + Bando Renda', 1, '', 0, '', 0, '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_prices`
--

CREATE TABLE `purchase_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplierID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchase_prices`
--

INSERT INTO `purchase_prices` (`id`, `supplierID`, `productID`, `productCode`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 33, 432, '43g34e', '4334.00', '2017-01-16 05:57:33', '2017-01-16 05:57:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receives`
--

CREATE TABLE `receives` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `invoiceTotal` int(11) NOT NULL,
  `receiveTotal` int(11) NOT NULL,
  `refundTotal` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` date NOT NULL,
  `modifiedUserID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `receives`
--

INSERT INTO `receives` (`id`, `invoiceID`, `customerID`, `invoiceTotal`, `receiveTotal`, `refundTotal`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 434, 654, 56, 5656, 765, '2017-01-18', 675, '2017-01-31', 7657, '2017-01-16 03:34:27', '2017-01-16 03:34:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salesinvoices`
--

CREATE TABLE `salesinvoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoiceNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invoiceDate` date NOT NULL,
  `soID` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `paymentType` int(11) NOT NULL,
  `expiredPayment` date NOT NULL,
  `ppn` int(11) NOT NULL,
  `total` double NOT NULL,
  `discount` double NOT NULL,
  `grandtotal` double NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `staffID` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` date NOT NULL,
  `modifiedUserID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesorderitems`
--

CREATE TABLE `salesorderitems` (
  `id` int(10) UNSIGNED NOT NULL,
  `soID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` date NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` date NOT NULL,
  `modifiedUserID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesorders`
--

CREATE TABLE `salesorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `soNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `staffID` int(11) NOT NULL,
  `staffName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderDate` date NOT NULL,
  `needDate` date NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` date NOT NULL,
  `modifiedUserID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salespayments`
--

CREATE TABLE `salespayments` (
  `id` int(10) UNSIGNED NOT NULL,
  `paymentNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `paymentDate` date NOT NULL,
  `payType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bankNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bankName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bankAC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `effectiveDate` date NOT NULL,
  `total` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `ref` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `staffID` int(11) NOT NULL,
  `staffName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` date NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` date NOT NULL,
  `modifiedUserID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_prices`
--

CREATE TABLE `sales_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales_prices`
--

INSERT INTO `sales_prices` (`id`, `customerID`, `productID`, `productCode`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, '11148', '26500.00', NULL, NULL, NULL),
(2, 3, 2, '35109', '55800.00', NULL, NULL, NULL),
(3, 3, 3, '3539', '37000.00', NULL, NULL, NULL),
(4, 3, 4, '3539B', '39500.00', NULL, NULL, NULL),
(5, 3, 5, '3565', '22000.00', NULL, NULL, NULL),
(6, 3, 6, '3590', '22000.00', NULL, NULL, NULL),
(7, 3, 7, '3592', '23000.00', NULL, NULL, NULL),
(8, 3, 8, '3703', '17000.00', NULL, NULL, NULL),
(9, 3, 9, '3704', '6000.00', NULL, NULL, NULL),
(10, 3, 10, '3705', '9500.00', NULL, NULL, NULL),
(11, 3, 11, '3766', '4750.00', NULL, NULL, NULL),
(12, 3, 12, '3770', '7800.00', NULL, NULL, NULL),
(13, 3, 13, '3771', '5200.00', NULL, NULL, NULL),
(14, 3, 14, '3773', '7800.00', NULL, NULL, NULL),
(15, 3, 15, '3777', '4500.00', NULL, NULL, NULL),
(16, 3, 16, '3785', '3250.00', NULL, NULL, NULL),
(17, 3, 17, '3795', '8000.00', NULL, NULL, NULL),
(18, 3, 18, '3796', '8500.00', NULL, NULL, NULL),
(19, 3, 19, '3836', '4700.00', NULL, NULL, NULL),
(20, 3, 20, '3836B', '5000.00', NULL, NULL, NULL),
(21, 3, 21, '3844', '4700.00', NULL, NULL, NULL),
(22, 3, 22, '3844B', '5000.00', NULL, NULL, NULL),
(23, 3, 23, '3855', '5800.00', NULL, NULL, NULL),
(24, 3, 24, '3860', '5600.00', NULL, NULL, NULL),
(25, 3, 25, '3861', '4650.00', NULL, NULL, NULL),
(26, 3, 26, '3861B', '5100.00', NULL, NULL, NULL),
(27, 3, 27, '6011', '5000.00', NULL, NULL, NULL),
(28, 3, 28, '6012', '14500.00', NULL, NULL, NULL),
(29, 3, 29, '9436', '7000.00', NULL, NULL, NULL),
(30, 3, 30, '9437', '8100.00', NULL, NULL, NULL),
(31, 3, 31, '9438', '15000.00', NULL, NULL, NULL),
(32, 3, 32, '9439', '18000.00', NULL, NULL, NULL),
(33, 3, 33, '9440', '13500.00', NULL, NULL, NULL),
(34, 3, 34, 'CS001', '2200.00', NULL, NULL, NULL),
(35, 3, 35, 'CS11106', '21500.00', NULL, NULL, NULL),
(36, 3, 36, 'CS11141', '26500.00', NULL, NULL, NULL),
(40, 2, 0, 'UCMB001', '0.00', NULL, NULL, NULL),
(41, 1, 0, 'UCMB001', '0.00', NULL, NULL, NULL),
(42, 4, 0, 'UCMB001', '7000.00', NULL, NULL, NULL),
(43, 3, 0, 'UCMB001', '0.00', NULL, NULL, NULL),
(44, 2, 38, 'UCMB002', '0.00', NULL, NULL, NULL),
(45, 1, 38, 'UCMB002', '0.00', NULL, NULL, NULL),
(46, 4, 38, 'UCMB002', '5600.00', NULL, NULL, NULL),
(47, 3, 38, 'UCMB002', '0.00', NULL, NULL, NULL),
(48, 2, 0, 'UCMB003', '0.00', NULL, NULL, NULL),
(49, 1, 0, 'UCMB003', '0.00', NULL, NULL, NULL),
(50, 4, 0, 'UCMB003', '5600.00', NULL, NULL, NULL),
(51, 3, 0, 'UCMB003', '0.00', NULL, NULL, NULL),
(52, 2, 0, 'UCMB005', '0.00', NULL, NULL, NULL),
(53, 1, 0, 'UCMB005', '0.00', NULL, NULL, NULL),
(54, 4, 0, 'UCMB005', '5925.00', NULL, NULL, NULL),
(55, 3, 0, 'UCMB005', '0.00', NULL, NULL, NULL),
(56, 2, 0, 'SBMB001/2', '0.00', NULL, NULL, NULL),
(57, 1, 0, 'SBMB001/2', '0.00', NULL, NULL, NULL),
(58, 4, 0, 'SBMB001/2', '62500.00', NULL, NULL, NULL),
(59, 3, 0, 'SBMB001/2', '0.00', NULL, NULL, NULL),
(60, 2, 0, 'NBML001/2', '0.00', NULL, NULL, NULL),
(61, 1, 0, 'NBML001/2', '0.00', NULL, NULL, NULL),
(62, 4, 0, 'NBML001/2', '17500.00', NULL, NULL, NULL),
(63, 3, 0, 'NBML001/2', '0.00', NULL, NULL, NULL),
(64, 2, 0, 'NBMB001', '0.00', NULL, NULL, NULL),
(65, 1, 0, 'NBMB001', '0.00', NULL, NULL, NULL),
(66, 4, 0, 'NBMB001', '5500.00', NULL, NULL, NULL),
(67, 3, 0, 'NBMB001', '0.00', NULL, NULL, NULL),
(68, 2, 0, 'MCMM001', '0.00', NULL, NULL, NULL),
(69, 1, 0, 'MCMM001', '0.00', NULL, NULL, NULL),
(70, 4, 0, 'MCMM001', '32000.00', NULL, NULL, NULL),
(71, 3, 0, 'MCMM001', '0.00', NULL, NULL, NULL),
(72, 2, 0, 'BBMB001/2', '0.00', NULL, NULL, NULL),
(73, 1, 0, 'BBMB001/2', '0.00', NULL, NULL, NULL),
(74, 4, 0, 'BBMB001/2', '11000.00', NULL, NULL, NULL),
(75, 3, 0, 'BBMB001/2', '0.00', NULL, NULL, NULL),
(76, 2, 41, 'SBMB001/2', '0.00', NULL, NULL, NULL),
(77, 1, 41, 'SBMB001/2', '0.00', NULL, NULL, NULL),
(78, 4, 41, 'SBMB001/2', '0.00', NULL, NULL, NULL),
(79, 3, 41, 'SBMB001/2', '0.00', NULL, NULL, NULL),
(80, 2, 43, 'NBMB001', '0.00', NULL, NULL, NULL),
(81, 1, 43, 'NBMB001', '0.00', NULL, NULL, NULL),
(82, 4, 43, 'NBMB001', '5500.00', NULL, NULL, NULL),
(83, 3, 43, 'NBMB001', '0.00', NULL, NULL, NULL),
(92, 2, 48, '3502', '0.00', NULL, NULL, NULL),
(93, 1, 48, '3502', '0.00', NULL, NULL, NULL),
(94, 4, 48, '3502', '0.00', NULL, NULL, NULL),
(95, 3, 48, '3502', '25000.00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `set_modules`
--

CREATE TABLE `set_modules` (
  `modulID` int(11) NOT NULL,
  `modulName` varchar(100) NOT NULL,
  `authorize` varchar(50) NOT NULL COMMENT 'Administrator, SPV, Sales, Kasir',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `sort_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_modules`
--

INSERT INTO `set_modules` (`modulID`, `modulName`, `authorize`, `status`, `sort_id`) VALUES
(1, 'Admin/ User', '1,0,0,0', 'active', 0),
(2, 'Set Company Profile', '1,0,0,0', 'active', 0),
(3, 'Customer', '1,0,0,0', 'active', 0),
(4, 'Gudang / Faktori', '1,0,0,0', 'active', 0),
(5, 'Produk', '1,0,0,0', 'active', 0),
(6, 'Harga Produk', '1,0,0,0', 'active', 0),
(7, 'Inventory', '1,0,0,0', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_products`
--

CREATE TABLE `stock_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productID` int(11) NOT NULL,
  `factoryID` int(11) NOT NULL,
  `stockIN` int(11) NOT NULL,
  `stockOut` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_products`
--

INSERT INTO `stock_products` (`id`, `productID`, `factoryID`, `stockIN`, `stockOut`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 54, 34, 21, 65, 'update postman', '2017-01-16 03:03:53', '2017-01-16 05:30:23', NULL),
(2, 54, 34, 21, 65, 'update postman ds', '2017-01-16 03:11:17', '2017-01-16 19:38:40', '2017-01-16 19:38:40'),
(3, 54, 34, 21, 65, 'update postman ds', '2017-01-16 19:38:02', '2017-01-16 19:38:02', NULL),
(4, 543, 342, 212, 651, 'update postman dsf', '2017-01-16 19:38:19', '2017-01-16 19:38:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplierCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplierName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contactPerson` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` date NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` date NOT NULL,
  `modifiedUserID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tr_receives`
--

CREATE TABLE `tr_receives` (
  `receiveID` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `invoiceTotal` double NOT NULL,
  `receiveTotal` double NOT NULL,
  `refundTotal` double NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel Mencatat berapa total uang yg diterima invoiceTotal = receiveTotal + refundTotal ';

-- --------------------------------------------------------

--
-- Table structure for table `tr_sales_invoice`
--

CREATE TABLE `tr_sales_invoice` (
  `invoiceID` int(11) NOT NULL,
  `invoiceNo` varchar(20) NOT NULL,
  `invoiceDate` date NOT NULL,
  `soID` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 = New Invoice, 1 = Dibayar Sebagian, 2 = Lunas',
  `paymentType` enum('tunai','tempo') NOT NULL,
  `expiredPayment` date NOT NULL,
  `ppn` double NOT NULL,
  `total` double NOT NULL,
  `discount` double NOT NULL,
  `grandtotal` double NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `customerAddress` text NOT NULL,
  `staffID` int(11) NOT NULL,
  `createdDate` int(11) NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk buat faktur penjualan';

-- --------------------------------------------------------

--
-- Table structure for table `tr_sales_order`
--

CREATE TABLE `tr_sales_order` (
  `soID` int(11) NOT NULL,
  `soNo` varchar(10) NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `customerAddress` text NOT NULL,
  `staffID` int(11) NOT NULL,
  `staffName` varchar(100) NOT NULL,
  `orderDate` date NOT NULL,
  `needDate` date NOT NULL,
  `note` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 = New SO, 1 =  Has Invoice, 2 = Has Payment',
  `createdDate` datetime NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk buat Surat Jalan';

-- --------------------------------------------------------

--
-- Table structure for table `tr_sales_order_items`
--

CREATE TABLE `tr_sales_order_items` (
  `ID` int(11) NOT NULL,
  `soID` varchar(20) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `sku` varchar(25) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `note` text NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Detail Sales Order';

-- --------------------------------------------------------

--
-- Table structure for table `tr_sales_payments`
--

CREATE TABLE `tr_sales_payments` (
  `paymentID` int(11) NOT NULL,
  `paymentNo` varchar(20) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `paymentDate` date NOT NULL,
  `payType` enum('cash','transfer','giro','cek') NOT NULL,
  `bankNo` varchar(100) NOT NULL,
  `bankName` varchar(100) NOT NULL,
  `bankAC` varchar(100) NOT NULL,
  `effectiveDate` date NOT NULL,
  `total` double NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `customerAddress` text NOT NULL,
  `ref` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `staffID` int(11) NOT NULL,
  `staffName` varchar(100) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdUserID` int(11) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_stock_products`
--

CREATE TABLE `tr_stock_products` (
  `stockID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `factoryID` int(11) NOT NULL,
  `stockIN` int(11) NOT NULL,
  `stockOut` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ady suryadi', 'adysuryadi', 'ady.limmo@gmail.com', '$2y$10$qNvzv9Co2Rz/xTuDJsFdtOBGserobyIhBw54/NYG6nMY3A.jBsvci', '1', 'sc7YzNUiY2yVF2uZKf4kX5a1fAuC6VoNMMssRcLwNHFuqgFaSASP7BH39dcD', '2017-01-16 02:37:17', '2017-01-16 21:28:47'),
(2, 'ady suryadi1', 'adysuryadi1', 'ady.limmo2@gmail.com', '$2y$10$l.9/ChIdE1EntGvAlI3YYOjEuTeW3yhmyCQs.Irq6d.HQ/3AtqbPa', '2', 'eOq71R2bz72pATTC3W8DsrHWU3RqsDK2jM4JWjWnK6dntwREC5hV921oHzHL', '2017-01-16 02:37:52', '2017-01-16 04:32:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `as_company`
--
ALTER TABLE `as_company`
  ADD PRIMARY KEY (`companyID`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factories`
--
ALTER TABLE `factories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_admin`
--
ALTER TABLE `ms_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `ms_customers`
--
ALTER TABLE `ms_customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `ms_factories`
--
ALTER TABLE `ms_factories`
  ADD PRIMARY KEY (`factoryID`);

--
-- Indexes for table `ms_products`
--
ALTER TABLE `ms_products`
  ADD PRIMARY KEY (`productID`),
  ADD UNIQUE KEY `UNIQUE` (`productCode`);

--
-- Indexes for table `ms_purchase_price`
--
ALTER TABLE `ms_purchase_price`
  ADD PRIMARY KEY (`priceID`);

--
-- Indexes for table `ms_sales_price`
--
ALTER TABLE `ms_sales_price`
  ADD PRIMARY KEY (`priceID`);

--
-- Indexes for table `ms_suppliers`
--
ALTER TABLE `ms_suppliers`
  ADD PRIMARY KEY (`supplierID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_prices`
--
ALTER TABLE `purchase_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receives`
--
ALTER TABLE `receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesinvoices`
--
ALTER TABLE `salesinvoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesorderitems`
--
ALTER TABLE `salesorderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesorders`
--
ALTER TABLE `salesorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salespayments`
--
ALTER TABLE `salespayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_prices`
--
ALTER TABLE `sales_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_modules`
--
ALTER TABLE `set_modules`
  ADD PRIMARY KEY (`modulID`);

--
-- Indexes for table `stock_products`
--
ALTER TABLE `stock_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_receives`
--
ALTER TABLE `tr_receives`
  ADD PRIMARY KEY (`receiveID`);

--
-- Indexes for table `tr_sales_invoice`
--
ALTER TABLE `tr_sales_invoice`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `soID` (`soID`);

--
-- Indexes for table `tr_sales_order`
--
ALTER TABLE `tr_sales_order`
  ADD PRIMARY KEY (`soID`);

--
-- Indexes for table `tr_sales_order_items`
--
ALTER TABLE `tr_sales_order_items`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tr_sales_payments`
--
ALTER TABLE `tr_sales_payments`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `tr_stock_products`
--
ALTER TABLE `tr_stock_products`
  ADD PRIMARY KEY (`stockID`);

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
-- AUTO_INCREMENT for table `as_company`
--
ALTER TABLE `as_company`
  MODIFY `companyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `factories`
--
ALTER TABLE `factories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ms_admin`
--
ALTER TABLE `ms_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_customers`
--
ALTER TABLE `ms_customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ms_factories`
--
ALTER TABLE `ms_factories`
  MODIFY `factoryID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_products`
--
ALTER TABLE `ms_products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `ms_purchase_price`
--
ALTER TABLE `ms_purchase_price`
  MODIFY `priceID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_sales_price`
--
ALTER TABLE `ms_sales_price`
  MODIFY `priceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `ms_suppliers`
--
ALTER TABLE `ms_suppliers`
  MODIFY `supplierID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `purchase_prices`
--
ALTER TABLE `purchase_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `receives`
--
ALTER TABLE `receives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `salesinvoices`
--
ALTER TABLE `salesinvoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salesorderitems`
--
ALTER TABLE `salesorderitems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salesorders`
--
ALTER TABLE `salesorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salespayments`
--
ALTER TABLE `salespayments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_prices`
--
ALTER TABLE `sales_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `set_modules`
--
ALTER TABLE `set_modules`
  MODIFY `modulID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `stock_products`
--
ALTER TABLE `stock_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_receives`
--
ALTER TABLE `tr_receives`
  MODIFY `receiveID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_sales_invoice`
--
ALTER TABLE `tr_sales_invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_sales_order`
--
ALTER TABLE `tr_sales_order`
  MODIFY `soID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_sales_order_items`
--
ALTER TABLE `tr_sales_order_items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_sales_payments`
--
ALTER TABLE `tr_sales_payments`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_stock_products`
--
ALTER TABLE `tr_stock_products`
  MODIFY `stockID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tr_sales_invoice`
--
ALTER TABLE `tr_sales_invoice`
  ADD CONSTRAINT `tr_sales_invoice_ibfk_1` FOREIGN KEY (`soID`) REFERENCES `tr_sales_order` (`soID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
