-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 22, 2026 lúc 04:22 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(56, 'Touch Screen Laptops'),
(55, 'Non-Touch Screen'),
(54, 'Macbooks'),
(52, 'Traditional Laptops'),
(51, 'Gaming Laptops'),
(57, 'Laptop'),
(58, 'Accessories'),
(59, 'Cameras');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `locationw`
--

CREATE TABLE `locationw` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(250) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `locationw`
--

INSERT INTO `locationw` (`id`, `name`, `street`, `city`, `phone`, `email`, `description`) VALUES
(2, 'umaar', 'Ullamco corporis at ', 'Ut voluptas natus ex', 21, 'kowamoca@mailinator.com', 'Quis recusandae Cul');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(11) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `user_id` bigint(11) DEFAULT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `total_price` int(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`, `shipping_address`, `total_price`, `status`) VALUES
(40, '57-10', 10, 'pewshwe', 450000, 1),
(42, '60-7', 16, 'Mardan Moqam CHock street no 12 House no 109', 343000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `p_name` varchar(500) NOT NULL,
  `p_description` varchar(5000) NOT NULL,
  `p_discount` int(200) NOT NULL,
  `p_price` int(100) NOT NULL,
  `quantity` int(199) NOT NULL,
  `p_colour` varchar(30) NOT NULL,
  `images` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_stamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `p_name`, `p_description`, `p_discount`, `p_price`, `quantity`, `p_colour`, `images`, `status`, `time_stamp`) VALUES
(59, 55, 32, 'HP 15-DW3024NIA Laptop - 11th Gen Intel Core i3, 4GB, 256GB SSD, Jet black', '&lt;ul&gt;\r\n	&lt;li&gt;11.6&amp;quot; HD LED Display (1366x768)&lt;/li&gt;\r\n	&lt;li&gt;Intel&amp;reg; Celeron&amp;reg; Processor N3050 - 6th generation&lt;/li&gt;\r\n	&lt;li&gt;Turbo Boost upto 3.3 GHz&lt;/li&gt;\r\n	&lt;li&gt;2GB DDR3 RAM&lt;/li&gt;\r\n	&lt;li&gt;32GB SSD&lt;/li&gt;\r\n	&lt;li&gt;Windows&amp;reg; 8 &amp;amp; 10 (Activated)&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;For such an inexpensive laptop, the HP Stream 11 sure does pack a punch in terms of its outstanding appearance, enhanced battery life and amazing storage. This low cost laptop has been advertised as a Chromebook-like device that offers low-power online use that is paired with the outstanding performance of Windows 8.&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;strong&gt;Basic features of HP Stream 11&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;Extremely cost-efficient, the laptops are cloud-friendly and come with a Microsoft Office 365 subscription and about 1TB of online storage for a year. The laptop features a low-resolution 11.6-inch display and has plenty of other features to boast of as well. For instance, it runs on an Intel Celeron processor, which, when paired with 2GB of RAM and 32GB of solid state drive, guarantees to deliver the best possible performance. If you think that you are running out of space on the laptop, you can go ahead and add another 16 or 32GB of space to your laptop through the included SD card slot.&lt;/p&gt;', 45000, 21999, 77, 'Black', '12img_68bec44d41fa9.png,img_68bec3fe50edd.png,img_68bec4385a169.png', 1, '2021-09-09 16:06:39'),
(58, 55, 32, 'HP Stream 11 11.6 Display - IntelÂ® CeleronÂ® Processor N3050 - 6th generation - 2GB RAM - 32GB SSD - WindowsÂ® 8 &amp; 10', '&lt;ul&gt;\r\n	&lt;li&gt;11.6&amp;quot; HD LED Display (1366x768)&lt;/li&gt;\r\n	&lt;li&gt;Intel&amp;reg; Celeron&amp;reg; Processor N3050 - 6th generation&lt;/li&gt;\r\n	&lt;li&gt;Turbo Boost upto 3.3 GHz&lt;/li&gt;\r\n	&lt;li&gt;2GB DDR3 RAM&lt;/li&gt;\r\n	&lt;li&gt;32GB SSD&lt;/li&gt;\r\n	&lt;li&gt;Windows&amp;reg; 8 &amp;amp; 10 (Activated)&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;For such an inexpensive laptop, the HP Stream 11 sure does pack a punch in terms of its outstanding appearance, enhanced battery life and amazing storage. This low cost laptop has been advertised as a Chromebook-like device that offers low-power online use that is paired with the outstanding performance of Windows 8.&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;strong&gt;Basic features of HP Stream 11&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;Extremely cost-efficient, the laptops are cloud-friendly and come with a Microsoft Office 365 subscription and about 1TB of online storage for a year. The laptop features a low-resolution 11.6-inch display and has plenty of other features to boast of as well. For instance, it runs on an Intel Celeron processor, which, when paired with 2GB of RAM and 32GB of solid state drive, guarantees to deliver the best possible performance. If you think that you are running out of space on the laptop, you can go ahead and add another 16 or 32GB of space to your laptop through the included SD card slot.&lt;/p&gt;', 70000, 59999, 100, 'Multicolor', 'img_68bec442595d2.png,img_68bec47567040.png,img_68bec4056194c.png', 1, '2021-09-09 16:04:36'),
(62, 57, 44, 'MacBook Air M1', 'Apple M1 chip, 8GB RAM, 256GB SSD.', 25000000, 24000000, 5, 'Space Gray', 'macbook-air-m1.png', 1, '2026-09-22 18:53:03'),
(60, 52, 37, 'HP Envy X360 13M-BD0033DX 11th Gen Core i7, 8GB, 512GB NVMe M.2 SSD, 13.3â€³ FHD Touch, W10', '&lt;ul&gt;\r\n	&lt;li&gt;11th Generation Intel Core i7-1165G7&lt;/li&gt;\r\n	&lt;li&gt;8GB DDR4, 512GB NVMe M.2 SSD&lt;/li&gt;\r\n	&lt;li&gt;13.3&amp;Prime; FHD IPS Touch Screen, FPR&lt;/li&gt;\r\n	&lt;li&gt;13.3&amp;Prime; diagonal, FHD (1920 x 1080), multitouch-enabled, IPS.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Experience peace of mind, no matter where your day takes you. Light, powerful, and with smart security features &amp;ndash; the HP ENVY 13&amp;Prime; Laptop is built to empower life on-the-go.&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;11th Generation Intel Core i7-1165G7&lt;/li&gt;\r\n	&lt;li&gt;8GB DDR4, 512GB NVMe M.2 SSD&lt;/li&gt;\r\n	&lt;li&gt;13.3&amp;Prime; FHD IPS Touch Screen, FPR&lt;/li&gt;\r\n	&lt;li&gt;13.3&amp;Prime; diagonal, FHD (1920 x 1080), multitouch-enabled, IPS.&lt;/li&gt;\r\n&lt;/ul&gt;', 59999, 49000, 200, 'Blue', 'img_68bebc4fd95dc.png,img_68bebc6093fc1.png,img_68bebc55b82d6.png', 1, '2021-09-09 16:08:02'),
(61, 57, 44, 'HP Pavilion 15', 'Great laptop for everyday use. Intel i5, 8GB RAM, 512GB SSD.', 16000000, 15000000, 10, 'Silver', 'hp-pavilion-15.jpg', 1, '2026-09-22 18:53:03'),
(63, 57, 44, 'Dell XPS 13', 'Premium ultra-portable laptop. Intel i7, 16GB RAM, 512GB SSD.', 35000000, 32000000, 3, 'Silver', 'dell-xps-13.jpg', 1, '2026-09-22 18:53:03'),
(64, 58, 45, 'Logitech MX Master 3S', 'Advanced wireless mouse for productivity.', 3000000, 2500000, 20, 'Black', 'logitech-mx-master-3s.jpg', 1, '2026-09-22 18:53:03'),
(65, 58, 45, 'Keychron K2 V2', 'Mechanical wireless keyboard with RGB.', 2500000, 2200000, 15, 'Black', 'keychron-k2-v2.jpg', 1, '2026-09-22 18:53:03'),
(66, 58, 45, 'Anker USB-C Hub 7-in-1', 'Multiport adapter for modern laptops.', 1200000, 1000000, 30, 'Gray', 'anker-hub.jpg', 1, '2026-09-22 18:53:03'),
(67, 59, 46, 'Sony Alpha a7 IV', 'Full-frame mirrorless interchangeable lens camera.', 60000000, 58000000, 4, 'Black', 'sony-a7-iv.jpg', 1, '2026-09-22 18:53:03'),
(68, 59, 46, 'Canon EOS R6', 'Versatile mirrorless camera with great autofocus.', 58000000, 56000000, 5, 'Black', 'canon-eos-r6.jpg', 1, '2026-09-22 18:53:03'),
(69, 59, 46, 'GoPro HERO 11 Black', 'Action camera with 5.3K video.', 12000000, 11000000, 10, 'Black', 'gopro-hero-11.jpg', 1, '2026-09-22 18:53:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comments` varchar(200) NOT NULL,
  `review_stars` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `comments`, `review_stars`, `created_at`) VALUES
(19, 16, 60, 'comment', 5, '2021-09-09 11:44:47'),
(18, 16, 60, 'thid id reviewe', 4, '2021-09-09 11:40:07'),
(17, 10, 58, 'this isfmsdf', 2, '2021-09-09 11:38:55'),
(16, 10, 57, 'this is', 3, '2021-09-09 11:09:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_cat_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `sub_cat_name`) VALUES
(36, 52, 'Dell'),
(35, 54, 'Apple latest version'),
(29, 56, 'Hp'),
(30, 56, 'Haier'),
(31, 55, 'Dell'),
(32, 55, 'Hp'),
(33, 55, 'Haier'),
(34, 54, 'Apple'),
(28, 56, 'Dell'),
(37, 52, 'Hp'),
(38, 52, 'Haier'),
(39, 51, 'Dell'),
(41, 51, 'Hp'),
(42, 51, 'Haier'),
(43, 55, 'Dell'),
(44, 57, 'Laptop Brands'),
(45, 58, 'Computer Accessories'),
(46, 59, 'Digital Cameras');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `address`, `city`, `country`, `phone`, `password`, `role`) VALUES
(15, 'farooq', 'farooq', 'farooq@gmail.com', 'Charsadda', 'peshwar', 'pakistan', '02940343', '1234', 1),
(10, 'Umar FarooQ', 'umar123', 'umar@gmail.com', 'hayatabad', 'pesahwar', 'pakistan', '11122333', 'admin123', 1),
(16, 'Nimra Noor', 'nimra123', 'nimra@gmail.com', 'Mardan Moqam CHock street no 12 House no 109', '', '', '0234784984', '12345', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `locationw`
--
ALTER TABLE `locationw`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `locationw`
--
ALTER TABLE `locationw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
