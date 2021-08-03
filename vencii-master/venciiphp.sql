-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2019 lúc 01:05 AM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `venciiphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin Manager', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_href` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Link liên kêt tới bài viets quản cáo',
  `link_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 là hiển thị, 0 là ẩn',
  `ordering` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `name`, `link_href`, `link_image`, `status`, `ordering`) VALUES
(11, '...', '', 'banner2.jpg', 1, 0),
(12, '...', '', 'banner3.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 là hiển thị, 0 là ẩn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(4, 'Jackets', 1),
(5, 'Bomber', 1),
(6, 'Snapback', 1),
(7, 'Hoodies', 1),
(8, 'Pants', 1),
(9, 'Sweater', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(4) DEFAULT 0 COMMENT '0 la trung bình, 1 quen, 2 VIP',
  `status` tinyint(1) DEFAULT 1 COMMENT '1 là hiển thị, 0 là ẩn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `address`, `password`, `type`, `status`) VALUES
(1, 'Hà Anh Tuấn', 'tuanha@gmail.com', '0137431', 'Không biết', '123456', 0, 1),
(2, 'Hà Em tuấn', 'tuanhe@gmail.com', '655465465161', '65', '', 0, 1),
(3, 'An Quoc', 'xaquocan@gmail.com', '0842212000', 'Nguyen khang cau giay', 'xaquocan2000', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `promotion` float NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '0 mới đặt, 1 đã giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `email`, `phone`, `address`, `created_date`, `promotion`, `status`) VALUES
(1, '2', 'Hà Anh', 'haanh@gmail.com', '0986421128', 'kfjsdof fhsdbfbds', '2019-12-04 13:49:32', 0, 1),
(2, '2', '', '', '', '', '2019-12-04 14:05:49', 0, 1),
(3, '1', '', '', '', '', '2019-12-15 22:19:45', 0, 1),
(4, '3', '', '', '', '', '2019-12-18 23:28:13', 0, 1),
(5, '3', '', '', '', '', '2019-12-18 23:28:23', 0, 1),
(6, '3', '', '', '', '', '2019-12-18 23:29:01', 0, 1),
(7, '3', '', '', '', '', '2019-12-18 23:29:48', 0, 1),
(8, '3', '', '', '', '', '2019-12-18 23:29:52', 0, 1),
(9, '3', '', '', '', '', '2019-12-18 23:31:14', 0, 1),
(10, '3', '', '', '', '', '2019-12-18 23:31:36', 0, 1),
(11, '3', '', '', '', '', '2019-12-18 23:32:16', 0, 1),
(12, '3', '', '', '', '', '2019-12-18 23:32:21', 0, 1),
(13, '3', '', '', '', '', '2019-12-18 23:34:19', 0, 1),
(14, '3', '', '', '', '', '2019-12-18 23:34:58', 0, 1),
(15, '3', '', '', '', '', '2019-12-18 23:55:46', 0, 1),
(16, '3', '', '', '', '', '2019-12-19 00:01:35', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `pro_id`, `quantity`, `price`) VALUES
(1, 2, 1, 100),
(2, 2, 4, 100),
(1, 3, 1, 100),
(2, 3, 4, 100),
(1, 4, 3, 200),
(3, 4, 1, 200),
(1, 5, 1, 5000000),
(2, 5, 3, 5000000),
(3, 5, 1, 5000000),
(3, 27, 1, 200000),
(3, 74, 1, 150000),
(16, 78, 1, 180000),
(15, 79, 1, 180000),
(4, 89, 1, 250000),
(4, 100, 1, 230000),
(6, 100, 1, 230000),
(7, 100, 1, 230000),
(8, 100, 1, 230000),
(9, 100, 1, 230000),
(10, 100, 1, 230000),
(11, 100, 1, 230000),
(12, 100, 1, 230000),
(13, 100, 1, 230000),
(14, 100, 1, 230000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image_list` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `sale_price` float NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 là hiển thị, 0 là ẩn',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `image_list`, `price`, `sale_price`, `category_id`, `content`, `status`, `created_date`) VALUES
(75, 'Hoodie #1', '48365236_266746917351904_8616771072378798080_n_266746914018571.png', '[\"\"]', 150000, 0, 7, '', 1, '2019-12-18 22:22:29'),
(76, 'Hoodie #2', '48366115_266746804018582_308148059353645056_n_266746800685249.png', '[\"\"]', 160000, 0, 7, '', 1, '2019-12-18 22:22:51'),
(77, 'Hoodie #3', '48366437_266746940685235_3512028327403585536_n_266746937351902.png', '[\"\"]', 150000, 0, 7, '', 1, '2019-12-18 22:23:12'),
(78, 'Hoodie #4', '48371123_266746847351911_713416745292922880_n_266746844018578.png', '[\"\"]', 180000, 0, 7, '', 1, '2019-12-18 22:23:34'),
(79, 'Hoodie #5', '48372745_266746697351926_4520349999824896000_n_266746694018593.png', '[\"\"]', 180000, 0, 7, '', 1, '2019-12-18 22:23:54'),
(80, 'Snapback #1', '48413644_270509683642294_4598846497163837440_n_270509680308961.png', '[\"\"]', 200000, 0, 6, '', 1, '2019-12-18 22:24:21'),
(81, 'Snapback #2', '48428304_270509610308968_771202897445650432_n_270509606975635.png', '[\"\"]', 200000, 0, 6, '', 1, '2019-12-18 22:24:38'),
(82, 'Snapback #3', '48917569_270509590308970_7069155563761827840_n_270509583642304.png', '[\"\"]', 200000, 0, 6, '', 1, '2019-12-18 22:24:55'),
(83, 'Snapback #4', '49049245_270509673642295_1381086179008446464_n_270509670308962.png', '[\"\"]', 200000, 0, 6, '', 1, '2019-12-18 22:25:15'),
(84, 'Snapback #5', '49147972_270509720308957_4440181974228795392_n_270509716975624.png', '[\"\"]', 200000, 0, 6, '', 1, '2019-12-18 22:25:32'),
(85, 'Bomber #1', '1.png', '[\"\"]', 250000, 0, 5, '', 1, '2019-12-18 22:26:03'),
(86, 'Bomber #2', '2.png', '[\"\"]', 250000, 0, 5, '', 1, '2019-12-18 22:26:33'),
(87, 'Bomber #3', '3.png', '[\"\"]', 250000, 0, 5, '', 1, '2019-12-18 22:26:50'),
(88, 'Bomber #4', '4.png', '[\"\"]', 250000, 0, 5, '', 1, '2019-12-18 22:27:08'),
(89, 'Bomber #5', '5.png', '[\"\"]', 250000, 0, 5, '', 1, '2019-12-18 22:27:24'),
(90, 'Track Pant #1', '12552252.png', '[\"\"]', 280000, 0, 8, '', 1, '2019-12-18 22:28:03'),
(91, 'Track Pant #2', '48385588_267851543908108_3117983215642476544_n_267851540574775.png', '[\"\"]', 280000, 0, 8, '', 1, '2019-12-18 22:28:20'),
(92, 'Track Pant #3', '48392216_267851517241444_3257350961617698816_n_267851513908111.png', '[\"\"]', 280000, 0, 8, '', 1, '2019-12-18 22:28:37'),
(93, 'Track Pant #4', '49081674_267851530574776_2018061963950555136_n_267851527241443.png', '[\"\"]', 280000, 0, 8, '', 1, '2019-12-18 22:28:59'),
(94, 'Track Pant #5', '48407109_267851437241452_3095995903664717824_n_267851433908119.png', '[\"\"]', 280000, 0, 8, '', 1, '2019-12-18 22:29:28'),
(95, 'Jacket #1', '48388583_268591743834088_4461719684735041536_n_268591740500755.png', '[\"\"]', 300000, 0, 4, '', 1, '2019-12-18 22:30:03'),
(96, 'Sweater #1', '48405033_268204290539500_5201812179845644288_n_268204287206167.png', '[\"\"]', 230000, 0, 9, '', 1, '2019-12-18 22:30:34'),
(97, 'Sweater #2', '48390176_268204317206164_2033846917951127552_n_268204313872831.png', '[\"\"]', 230000, 0, 9, '', 1, '2019-12-18 22:30:52'),
(98, 'Sweater #3', '48377541_268204327206163_1829650110976360448_n_268204323872830.png', '[\"\"]', 230000, 0, 9, '', 1, '2019-12-18 22:31:13'),
(99, 'Sweater #4', '48386980_268204227206173_8307456061820895232_n_268204223872840.png', '[\"\"]', 230000, 0, 9, '', 1, '2019-12-18 22:31:33'),
(100, 'Sweater #5', '48395113_268204377206158_4927567638843883520_n_268204373872825.png', '[\"\"]', 230000, 0, 9, '', 1, '2019-12-18 22:31:52');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`pro_id`,`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
