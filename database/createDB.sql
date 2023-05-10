-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 10:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `email` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`email`, `product_id`, `amount`) VALUES
('', 2, 1),
('giaphong132@gmail.com', 1, 1),
('giaphong132@gmail.com', 2, 22),
('giaphong132@gmail.com', 4, 1),
('giaphong132@gmail.com', 52, 1),
('phong.bui132@hcmut.edu.vn', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `corder`
--

CREATE TABLE `corder` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `corder`
--

INSERT INTO `corder` (`id`, `email`, `product_id`, `amount`, `state`, `time`) VALUES
(1, 'giaphong132@gmail.com', 52, 1, 'Đang vận chuyển', '2023-04-14 05:13:53'),
(2, 'giaphong132@gmail.com', 1, 1, 'Đang vận chuyển', '2023-04-14 05:28:52'),
(3, 'giaphong132@gmail.com', 8, 1, 'Đang vận chuyển', '2023-04-14 05:49:42'),
(4, 'giaphong132@gmail.com', 4, 1, 'Đang vận chuyển', '2023-04-14 05:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `oldPrice` int(11) NOT NULL,
  `newPrice` int(11) NOT NULL,
  `sold` varchar(10) NOT NULL,
  `origin` varchar(32) NOT NULL,
  `saleOff` int(11) NOT NULL,
  `rating` double DEFAULT NULL,
  `reviews` int(11) DEFAULT NULL,
  `inStock` int(11) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `dateAdd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `oldPrice`, `newPrice`, `sold`, `origin`, `saleOff`, `rating`, `reviews`, `inStock`, `type`, `shop_id`, `dateAdd`) VALUES
(1, 'USB OTG 3.1 512GB Type C Sandisk SDDDC3 Xanh', 688000, 701000, '2', 'Svalbard & Jan Mayen', 26, 4, 359, 728, 'USB', 1, '2022-10-02 15:53:00'),
(2, 'USB OTG 3.1 128GB Dual Lighting Type C Sandisk SDIX70N Đen', 854000, 384000, '2', 'Algeria', 22, 1, 554, 529, 'USB', 1, '2022-10-07 19:01:00'),
(3, 'USB OTG 3.1 128GB Type C Sandisk SDDDC3 Đen', 255000, 165000, '3', 'Lao', 14, 5, 329, 970, 'USB', 1, '2022-11-26 07:45:00'),
(4, 'USB 2.0 8GB Sandisk SDCZ33 Đen', 622000, 317000, '3', 'Sudan', 46, 4, 305, 913, 'USB', 1, '2022-01-26 17:28:00'),
(5, 'USB OTG 3.1 64GB Type C Sandisk SDDDC3 Đen', 701000, 428000, '3', 'Moldova', 1, 1, 410, 238, 'USB', 1, '2022-12-08 10:00:00'),
(6, 'USB OTG 3.1 32GB Type C Sandisk SDDDC3 Đen', 981000, 251000, '2', 'Liechtenstein', 19, 4, 530, 406, 'USB', 1, '2022-05-02 01:35:00'),
(7, 'USB Sandisk 3.1 16GB SDCZ430 Đen', 347000, 416000, '1', 'Sri Lanka', 58, 5, 351, 257, 'USB', 1, '2022-09-15 14:26:00'),
(8, 'USB 3.1 32 GB Transcend JetFlash 760 Đen Tím', 849000, 865000, '3', 'Cyprus', 56, 4, 504, 236, 'USB', 1, '2022-06-24 02:47:00'),
(9, 'USB 3.1 16 GB Apacer AH356', 368000, 746000, '3', 'Argentina', 90, 4, 297, 508, 'USB', 1, '2022-08-22 14:49:00'),
(10, 'USB 3.0 16 GB Sandisk CZ600', 474000, 319000, '3', 'Saudi Arabia', 15, 2, 553, 834, 'USB', 1, '2022-06-27 16:55:00'),
(11, 'USB 3.2 32 GB Apacer AH357', 150000, 673000, '1', 'Gabon', 93, 4, 440, 504, 'USB', 1, '2022-11-05 08:26:00'),
(12, 'USB 3.0 32 GB Sandisk CZ73', 398000, 882000, '1', 'Norfolk Island', 65, 1, 261, 703, 'USB', 1, '2022-02-06 08:02:00'),
(13, 'USB 3.0 - 3.1 16 GB Transcend JetFlash 790', 114000, 945000, '1', 'Estonia', 3, 5, 241, 385, 'USB', 1, '2022-06-06 11:11:00'),
(14, 'Bàn Phím Cơ Có Dây Gaming Corsair K63 Compact Mechanical Đen', 941000, 351000, '2', 'Italy', 93, 4, 441, 673, 'keyboard', 2, '2022-03-09 20:25:00'),
(15, 'Bàn phím Magic Keyboard Apple MK2A3 Trắng', 955000, 703000, '2', 'Burundi', 98, 5, 401, 782, 'keyboard', 2, '2022-10-10 14:03:00'),
(16, 'Bàn Phím Cơ Có Dây Gaming Silent Razer BlackWidow Lite Đen', 726000, 905000, '3', 'Kiribati', 9, 4, 505, 563, 'keyboard', 2, '2022-07-25 03:43:00'),
(17, 'Bộ Bàn Phím Chuột Không Dây Bluetooth Rapoo 8000M Đen', 487000, 920000, '1', 'Tonga', 92, 3, 467, 847, 'keyboard', 2, '2022-07-02 17:12:00'),
(18, 'Bộ Bàn Phím Chuột Không Dây Zadez ZMK-530G Xám', 659000, 257000, '1', 'Suriname', 61, 4, 369, 308, 'keyboard', 2, '2022-03-09 02:03:00'),
(19, 'Bàn Phím Cơ Có Dây Gaming Razer BlackWidow V3 Đen', 794000, 470000, '1', 'Christmas Island', 38, 4, 166, 375, 'keyboard', 2, '2022-09-20 03:29:00'),
(20, 'Bàn Phím Cơ Có Dây Gaming Razer Huntsman Tournament Edition Đen', 380000, 506000, '3', 'New Caledonia', 90, 5, 142, 339, 'keyboard', 2, '2022-09-08 05:31:00'),
(21, 'Bàn Phím Cơ Có Dây Gaming Razer BlackWidow Đen', 993000, 579000, '3', 'Saudi Arabia', 7, 4, 355, 366, 'keyboard', 2, '2022-04-29 04:57:00'),
(22, 'Bàn phím Có dây Gaming MSI Vigor GK20 US Đen', 913000, 983000, '2', 'Tanzania', 20, 4, 146, 703, 'keyboard', 2, '2022-10-14 07:43:00'),
(23, 'Bàn phím Có dây Gaming MSI Vigor GK30 US Đen', 241000, 140000, '1', 'Luxembourg', 29, 4, 235, 817, 'keyboard', 2, '2022-12-29 19:12:00'),
(24, 'Bàn Phím Cơ Có Dây Gaming Corsair K68 RGB Mechanical Đen', 868000, 735000, '3', 'Reunion', 56, 4, 107, 889, 'keyboard', 2, '2022-12-11 10:11:00'),
(25, 'Bàn phím có dây Gaming Asus TUF K1', 965000, 164000, '3', 'Moldova', 92, 3, 541, 887, 'keyboard', 2, '2022-11-30 07:05:00'),
(26, 'Bàn phím Microsoft Surface Pro Type Đen', 519000, 704000, '3', 'Micronesia', 63, 2, 167, 351, 'keyboard', 2, '2022-04-09 16:19:00'),
(27, 'Bàn Phím Cơ Có Dây Gaming Rapoo V500Pro Vàng Xanh', 509000, 937000, '1', 'Tajikistan', 37, 4, 335, 875, 'keyboard', 2, '2022-08-01 12:18:00'),
(28, 'Bàn phím không dây Microsoft All-in-one Media N9Z-00028 Đen', 603000, 248000, '2', 'Bosnia and Herzegovina', 95, 5, 144, 599, 'keyboard', 2, '2022-09-12 23:53:00'),
(29, 'Bộ bàn phím chuột không dây Microsoft 850 Đen', 690000, 204000, '3', 'Greece', 66, 4, 426, 634, 'keyboard', 2, '2022-05-06 03:29:00'),
(30, 'Chuột Không dây Silent A4Tech G3-280NS', 996000, 388000, '2', 'Bhutan', 6, 4, 198, 757, 'mouse', 3, '2022-09-27 03:57:00'),
(31, 'Chuột Không dây Bluetooth Silent Rapoo M650 Hà Lan', 470000, 206000, '2', 'Tokelau', 13, 4, 226, 950, 'mouse', 3, '2022-06-17 05:19:00'),
(32, 'Chuột Không dây Bluetooth Silent Rapoo M650 Pháp', 842000, 928000, '2', 'Saint Lucia', 73, 5, 226, 765, 'mouse', 3, '2022-05-19 09:18:00'),
(33, 'Chuột Không dây Bluetooth Silent Rapoo M650 Đức', 870000, 603000, '2', 'Haiti', 47, 5, 386, 667, 'mouse', 3, '2022-05-26 17:34:00'),
(34, 'Chuột Không dây Bluetooth Silent Rapoo M650 Brazil', 775000, 700000, '3', 'Albania', 28, 3, 371, 522, 'mouse', 3, '2022-09-30 15:22:00'),
(35, 'Chuột Không dây Bluetooth Silent Rapoo M650 Argentina', 747000, 898000, '3', 'Tajikistan', 14, 1, 228, 721, 'mouse', 3, '2022-05-24 11:31:00'),
(36, 'Chuột Không dây Bluetooth Silent Rapoo M650 Anh', 382000, 582000, '3', 'Cote d\'Ivoire', 44, 1, 229, 571, 'mouse', 3, '2022-09-24 15:02:00'),
(37, 'Chuột Có dây Gaming MSI Clutch GM08', 714000, 842000, '2', 'Sao Tome and Principe', 75, 3, 258, 880, 'mouse', 3, '2022-10-03 06:17:00'),
(38, 'Chuột Có dây Gaming MSI Clutch GM11', 934000, 257000, '1', 'Mauritania', 87, 3, 440, 498, 'mouse', 3, '2022-02-04 16:29:00'),
(39, 'Chuột Không dây Silent Genius NX-8006S', 180000, 840000, '2', 'Ireland', 98, 2, 302, 369, 'mouse', 3, '2022-09-10 01:23:00'),
(40, 'Chuột Không dây Bluetooth Gaming Asus TUF M4 WL', 487000, 177000, '1', 'Tajikistan', 57, 4, 163, 920, 'mouse', 3, '2022-12-09 08:18:00'),
(41, 'Chuột Có dây Gaming Asus Keris', 744000, 891000, '3', 'Togo', 75, 4, 544, 239, 'mouse', 3, '2022-02-26 18:19:00'),
(42, 'Chuột Có dây DareU EM908', 551000, 264000, '2', 'China', 72, 1, 557, 972, 'mouse', 3, '2022-06-29 12:26:00'),
(43, 'Chuột Có dây DareU A960', 323000, 653000, '3', 'Hong Kong', 80, 5, 293, 214, 'mouse', 3, '2022-05-03 23:25:00'),
(44, 'Chuột Có dây DareU EM908', 431000, 184000, '2', 'Guinea', 96, 2, 500, 311, 'mouse', 3, '2022-01-07 08:58:00'),
(45, 'Loa Bluetooth Marshall Emberton   Yêu thích', 763000, 958000, '1', 'Armenia', 91, 4, 177, 236, 'speaker', 4, '2022-09-07 04:48:00'),
(46, 'Loa thanh Soundbar Samsung HW T420', 499000, 506000, '1', 'Niue', 73, 4, 530, 216, 'speaker', 4, '2022-10-20 03:56:00'),
(47, 'Loa JBL Partybox Encore 2 mic', 251000, 578000, '3', 'Monaco', 71, 4, 428, 953, 'speaker', 4, '2022-03-17 08:10:00'),
(48, 'Loa Bluetooth Marshall Acton 2', 956000, 983000, '3', 'Guinea', 58, 4, 237, 882, 'speaker', 4, '2022-08-04 17:23:00'),
(49, 'Loa Bluetooth Marshall Acton 4', 454000, 988000, '3', 'Guinea', 93, 5, 242, 652, 'speaker', 4, '2022-10-31 22:59:00'),
(50, 'Loa bluetooth JBL Charge 5', 723000, 540000, '1', 'Lao', 38, 2, 328, 924, 'speaker', 4, '2022-01-31 14:21:00'),
(51, 'Loa Bluetooth JBL Flip 5', 929000, 849000, '2', 'Slovakia', 50, 1, 470, 410, 'speaker', 4, '2022-10-03 11:49:00'),
(52, 'Loa Bluetooth JBL Go 3', 145000, 240000, '1', 'Papua New Guinea', 9, 4, 442, 713, 'speaker', 4, '2022-08-11 10:33:00'),
(53, 'Loa Bluetooth JBL Pulse 5', 945000, 926000, '1', 'Italy', 92, 5, 170, 238, 'speaker', 4, '2022-06-13 20:38:00'),
(54, 'Loa Bluetooth LG XBoom Go PL7', 157000, 625000, '2', 'Greenland', 68, 4, 573, 914, 'speaker', 4, '2022-09-05 10:00:00'),
(55, 'Loa bluetooth Marshall Stanmore 2', 950000, 853000, '3', 'USA', 35, 2, 447, 390, 'speaker', 4, '2022-10-20 01:18:00'),
(56, 'Loa Edifier MR4', 872000, 226000, '2', 'Macao', 64, 2, 153, 741, 'speaker', 4, '2022-09-23 11:13:00'),
(57, 'Loa Bluetooth JBL Flip 6', 536000, 692000, '1', 'Norfolk Island', 51, 2, 298, 234, 'speaker', 4, '2022-06-19 07:39:00'),
(58, 'Loa Bluetooth JBL Charge 4', 785000, 454000, '3', 'Mozambique', 22, 2, 201, 900, 'speaker', 4, '2022-04-04 06:52:00'),
(59, 'Loa Bluetooth Harman Kardon Onyx Studio 5', 867000, 921000, '1', 'Germany', 15, 5, 427, 307, 'speaker', 4, '2022-02-13 05:14:00'),
(60, 'Loa Bluetooth LG Xboom Go PN1', 404000, 272000, '1', 'Mali', 69, 5, 556, 202, 'speaker', 4, '2022-04-24 12:35:00'),
(61, 'Loa tháp Samsung MX-T70', 902000, 897000, '3', 'Benin', 36, 2, 212, 450, 'speaker', 4, '2022-12-30 20:08:00'),
(62, 'Loa Bluetooth LG Xboom Go PL5', 736000, 465000, '2', 'Austria', 98, 2, 272, 239, 'speaker', 4, '2022-03-10 15:44:00'),
(63, 'Loa Harman Kardon Onyx Studio 5', 264000, 377000, '2', 'Uruguay', 45, 2, 257, 252, 'speaker', 4, '2022-04-26 00:49:00'),
(64, 'Loa Harman Kardon Onyx Studio 7', 531000, 246000, '3', 'Republic of Korea', 29, 4, 246, 402, 'speaker', 4, '2022-07-10 07:28:00'),
(65, 'Chuột Không dây Silent A4Tech G3-280NS', 996000, 388000, '1', 'Bhutan', 6, 2, 173, 379, 'mouse', 3, '2022-11-24 01:24:00'),
(66, 'Chuột Không dây Bluetooth Silent Rapoo M650 Hà Lan', 470000, 206000, '2', 'Tokelau', 13, 4, 567, 204, 'mouse', 3, '2022-04-17 16:23:00'),
(67, 'Chuột Không dây Bluetooth Silent Rapoo M650 Pháp', 842000, 928000, '2', 'Saint Lucia', 73, 2, 598, 905, 'mouse', 3, '2022-02-25 06:00:00'),
(68, 'Chuột Không dây Bluetooth Silent Rapoo M650 Đức', 870000, 603000, '2', 'Haiti', 47, 1, 137, 770, 'mouse', 3, '2022-08-21 18:25:00'),
(69, 'Chuột Không dây Bluetooth Silent Rapoo M650 Brazil', 775000, 700000, '3', 'Albania', 28, 3, 283, 911, 'mouse', 3, '2022-08-06 00:08:00'),
(70, 'Chuột Không dây Bluetooth Silent Rapoo M650 Argentina', 747000, 898000, '3', 'Tajikistan', 14, 4, 446, 805, 'mouse', 3, '2022-08-18 12:59:00'),
(71, 'Chuột Không dây Bluetooth Silent Rapoo M650 Anh', 382000, 582000, '2', 'Cote d\'Ivoire', 44, 5, 335, 573, 'mouse', 3, '2022-06-24 18:48:00'),
(72, 'Chuột Có dây Gaming MSI Clutch GM08', 714000, 842000, '3', 'Sao Tome and Principe', 75, 5, 277, 680, 'mouse', 3, '2022-09-09 06:27:00'),
(73, 'Chuột Có dây Gaming MSI Clutch GM11', 934000, 257000, '1', 'Mauritania', 87, 4, 151, 299, 'mouse', 3, '2022-10-12 12:12:00'),
(74, 'Chuột Không dây Silent Genius NX-8006S', 180000, 840000, '2', 'Ireland', 98, 4, 481, 365, 'mouse', 3, '2022-09-30 10:29:00'),
(75, 'Chuột Không dây Bluetooth Gaming Asus TUF M4 WL', 487000, 177000, '2', 'Tajikistan', 57, 2, 390, 579, 'mouse', 3, '2022-11-03 09:21:00'),
(76, 'Chuột Có dây Gaming Asus Keris', 744000, 891000, '3', 'Togo', 75, 3, 492, 376, 'mouse', 3, '2022-04-08 04:54:00'),
(77, 'Chuột Có dây DareU EM908', 551000, 264000, '3', 'China', 72, 4, 353, 377, 'mouse', 3, '2022-11-26 10:41:00'),
(78, 'Chuột Có dây DareU A960', 323000, 653000, '2', 'Hong Kong', 80, 4, 156, 669, 'mouse', 3, '2022-06-15 11:46:00'),
(79, 'Chuột Có dây DareU EM908', 431000, 184000, '2', 'Guinea', 96, 2, 418, 832, 'mouse', 3, '2022-08-04 03:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `code` int(11) DEFAULT NULL,
  `name` varchar(8) DEFAULT NULL,
  `response_rating` int(11) DEFAULT NULL,
  `followers` int(11) DEFAULT NULL,
  `found` date DEFAULT NULL,
  `reviews` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`code`, `name`, `response_rating`, `followers`, `found`, `reviews`) VALUES
(1, 'Kingston', 94, 6954, '2020-09-24', 2503),
(2, 'Keychorn', 84, 9630, '2020-03-01', 1654),
(3, 'Dareu', 95, 5986, '2021-08-16', 4324),
(4, 'Sony', 87, 8061, '2019-10-24', 1756);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `profile_photo`, `fname`, `lname`, `gender`, `age`, `phone`, `createAt`, `updateAt`, `password`, `address`, `birthday`) VALUES
('admin@gmail.com', 'public/images/user/default.png', 'admin', 'admin', 1, 20, '0497144026', '2022-06-16 21:46:51', '2022-06-16 21:46:51', '$2y$10$GTSVSDI2TFhxJnNFrS8tj.2GKKkbAfiZtvYbRxUvIP/Mp6dtcwC8u', 'Novaland The Sun Avenue, Tầng 1, Tháp 1, Tòa nhà Số 28, Đường Mai Chí Thọ, Thủ Đức, Thành phố Hồ Chí Minh', '2002-02-13'),
('giaphong132@gmail.com', 'public/images/user/default.png', 'Bùi Đoàn', 'Phong', 1, 20, '0339344028', '2022-06-16 20:48:56', '2023-04-14 22:49:51', '$2y$10$NtrSaLnNsR29ouPqCuQF5ukGtuttVs70TYntJrdkyqWEC0YM417H.', 'Ký túc xá khu A, Phường Linh Trung, Thành Phố Thủ Đức, TP. Hồ Chí Minhasd', '2002-02-13'),
('phong.bui132@hcmut.edu.vn', 'public/img/user/default.png', 'Phong', 'Phong', 1, 20, '0704701412', '2022-06-16 20:49:12', '2022-06-16 20:49:12', '$2y$10$CMNaGhePLvkl.U4DuIMRfesAGCn3uJohnSaBMyi1EK1pVSGk7OcQi', '268 Lý Thường Kiệt, Phường 14, Quận 10, Thành phố Hồ Chí Minh', '2002-02-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`email`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `corder`
--
ALTER TABLE `corder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `corder`
--
ALTER TABLE `corder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `corder`
--
ALTER TABLE `corder`
  ADD CONSTRAINT `corder_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
