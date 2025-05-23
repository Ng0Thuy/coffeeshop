-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 17, 2025 lúc 07:53 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `metacoffee`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Trà sữa'),
(2, 'Món ăn nhẹ'),
(3, 'Bánh mì'),
(4, 'Cà phê');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `product_id`, `comment_content`, `comment_date`) VALUES
(4, 1, 14, 'Ngon quá', '2021-12-02 13:24:06'),
(5, 4, 21, 'Ngon quá', '2021-12-02 13:35:58'),
(14, 1, 20, 'Tôi rất thích sản phẩm này', '2021-12-03 04:03:41'),
(20, 1, 8, 'Tôi rất thích sản phẩm này', '2021-12-06 01:55:46'),
(35, 1, 23, 'Tôi rất thích nó', '2021-12-10 07:05:45'),
(37, 4, 17, 'xinchao', '2025-05-14 20:24:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `note` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `method` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `payment_status` enum('Chưa thanh toán','Đã thanh toán') DEFAULT 'Chưa thanh toán',
  `status` varchar(25) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_code`, `user_id`, `address`, `phone`, `note`, `method`, `payment_status`, `status`, `order_date`) VALUES
(1, 'EAPCWQ63901747503306', 1, 'Quan 1, Ho Chi Minh City', '0987666666', '', 'banking', 'Đã thanh toán', 'Đang tiếp nhận', '2025-05-17 19:35:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `price_total` float NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`details_id`, `order_id`, `variant_id`, `price_total`, `num`) VALUES
(1, 1, 37, 29000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `price_sale` float NOT NULL,
  `active` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `import_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `thumbnail`, `description`, `price_sale`, `active`, `view`, `import_date`) VALUES
(8, 2, 'BÁNH SÔ-CÔ-LA', 'mvc/public/images/products/SOCOLAHL.png', 'Thức uống chinh phục những thực khách khó tính! Sự kết hợp độc đáo giữa trà Ô long, hạt sen thơm bùi và củ năng giòn tan. Thêm vào chút sữa sẽ để vị thêm ngọt ngào.', 20, 1, 0, '2021-07-07 17:41:08'),
(11, 1, 'Trà Sen Vàng', 'mvc/public/images/products/TRASENVANG.png', 'Thức uống chinh phục những thực khách khó tính! Sự kết hợp độc đáo giữa trà Ô long, hạt sen thơm bùi và củ năng giòn tan. Thêm vào chút sữa sẽ để vị thêm ngọt ngào.', 50, 1, 0, '2021-07-07 17:41:08'),
(12, 3, 'Bánh Mì Thịt Nướng', 'mvc/public/images/products/BMTHITNUONG.png', 'Đặc sản của Việt Nam! Bánh mì giòn với nhân thịt nướng, rau thơm và gia vị đậm đà, hòa quyện trong lớp nước sốt tuyệt hảo.', 30, 1, 0, '2021-07-07 17:25:47'),
(13, 2, 'BÁNH MOUSSE ĐÀO', 'mvc/public/images/products/MOUSSEDAO.png', 'Một sự kết hợp khéo léo giữa kem và lớp bánh mềm, được phủ lên trên vài lát đào ngon tuyệt.', 10, 1, 0, '2021-07-07 18:36:37'),
(14, 1, 'Trà sữa trân trâu đen', 'mvc/public/images/products/Trà-sữa-Trân-châu-đen-1.png', 'Trà sữa trân trâu đường đen', 10, 1, 0, '2021-07-11 16:07:58'),
(15, 1, 'Trà sữa Matcha', 'mvc/public/images/products/TRATHANHDAO.png', 'Trà sữa Matcha', 46, 1, 0, '2021-07-11 16:38:58'),
(16, 4, 'Cafe Phin Đen Nóng', 'mvc/public/images/products/AMERICANO.png', 'Dành cho những tín đồ cà phê đích thực! Hương vị cà phê truyền thống được phối trộn độc đáo tại Highlands. Cà phê đậm đà pha từ Phin, cho thêm 1 thìa đường, mang đến vị cà phê đậm đà chất Phin.', 44, 1, 0, '2021-07-11 16:12:59'),
(17, 4, 'Bạc Xỉu Đá', 'mvc/public/images/products/Trà-sữa-Trân-châu-đen-1.png', 'Nếu Phin Sữa Đá dành cho các bạn đam mê vị đậm đà, thì Bạc Xỉu Đá là một sự lựa chọn nhẹ “đô\" cà phê nhưng vẫn thơm ngon, chất lừ không kém!', 15, 1, 0, '2021-07-13 10:20:53'),
(18, 2, 'BÁNH CHUỐI', 'mvc/public/images/products/BANHCHUOI.jpg', 'Bánh chuối truyền thống, sự kết hợp của 100% chuối tươi và nước cốt dừa Việt Nam.', 20, 1, 0, '2021-07-07 17:41:08'),
(19, 2, 'Bánh Mousse Cacao', 'mvc/public/images/products/MOUSSECACAO.png', 'Bánh Mousse Ca Cao, là sự kết hợp giữa ca-cao Việt Nam đậm đà cùng kem tươi.', 5, 1, 0, '2021-07-07 17:41:08'),
(20, 3, 'Bánh Mì Xíu Mại', 'mvc/public/images/products/BMXIUMAI.png', 'Bánh mì Việt Nam giòn thơm, với nhân thịt viên hấp dẫn, phủ thêm một lớp nước sốt cà chua ngọt, cùng với rau tươi và gia vị đậm đà.', 30, 1, 0, '2021-07-07 17:25:47'),
(21, 2, 'Bánh Caramel Phô Mai', 'mvc/public/images/products/CARAMELPHOMAI.jpg', 'Ngon khó cưỡng! Bánh phô mai thơm béo được phủ bằng lớp caramel ngọt ngào.', 10, 1, 0, '2021-07-07 18:36:37'),
(22, 1, 'Trà Thạch Đào', 'mvc/public/images/products/TRATHANHDAO.png', 'Vị trà đậm đà kết hợp cùng những miếng đào thơm ngon mọng nước cùng thạch đào giòn dai. Thêm vào ít sữa để gia tăng vị béo', 10, 1, 0, '2021-07-11 16:07:58'),
(23, 1, 'Trà Thạch Vải', 'mvc/public/images/products/TRATHACHVAI_1.png', 'Một sự kết hợp thú vị giữa trà đen, những quả vải thơm ngon và thạch giòn khó cưỡng, mang đến thức uống tuyệt hảo!', 46, 1, 0, '2021-07-11 16:38:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Người dùng'),
(2, 'Quản lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `size`, `quantity`) VALUES
(4, 11, 'Nhỏ', 40),
(5, 11, 'Vừa', 35),
(6, 11, 'Lớn', 25),
(7, 12, 'Nhỏ', 45),
(8, 12, 'Vừa', 30),
(9, 12, 'Lớn', 15),
(10, 13, 'Nhỏ', 50),
(11, 13, 'Vừa', 40),
(12, 13, 'Lớn', 22),
(13, 14, 'Nhỏ', 0),
(14, 14, 'Vừa', 41),
(15, 14, 'Lớn', 35),
(16, 15, 'Nhỏ', 18),
(17, 15, 'Vừa', 20),
(18, 15, 'Lớn', 20),
(19, 16, 'Nhỏ', 20),
(20, 16, 'Vừa', 20),
(21, 16, 'Lớn', 20),
(22, 17, 'Nhỏ', 77),
(23, 17, 'Vừa', 19),
(24, 17, 'Lớn', 22),
(25, 18, 'Nhỏ', 20),
(26, 18, 'Vừa', 20),
(27, 18, 'Lớn', 0),
(28, 19, 'Nhỏ', 19),
(29, 19, 'Vừa', 20),
(30, 19, 'Lớn', 20),
(31, 20, 'Nhỏ', 20),
(32, 20, 'Vừa', 20),
(33, 20, 'Lớn', 20),
(34, 21, 'Nhỏ', 18),
(35, 21, 'Vừa', 20),
(36, 21, 'Lớn', 20),
(37, 22, 'Vừa', 20),
(38, 23, 'Nhỏ', 20),
(39, 23, 'Vừa', 20),
(40, 23, 'Lớn', 17),
(41, 22, 'Nhỏ', 20),
(42, 22, 'Lớn', 20),
(46, 8, 'Nhỏ', 40),
(47, 8, 'Vừa', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(255) NOT NULL,
  `setting_value` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `system_settings`
--

INSERT INTO `system_settings` (`id`, `setting_key`, `setting_value`, `description`, `updated_at`) VALUES
(1, 'max_cart_quantity', '2', 'Số lượng tối đa sản phẩm mỗi lần thêm vào giỏ hàng', '2025-05-17 16:02:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `product_id`, `size`, `quantity`, `type`, `date`, `status`) VALUES
(1, 14, 'Nhỏ', 1, 'Bán hàng', '2025-05-13 16:44:13', 'Thành công'),
(2, 14, 'Vừa', 1, 'Bán hàng', '2025-05-13 16:44:40', 'Thành công'),
(3, 14, 'Vừa', 1, 'Bán hàng', '2025-05-13 16:48:46', 'Thành công'),
(4, 14, 'Vừa', 2, 'Bán hàng', '2025-05-13 17:16:56', 'Thành công'),
(5, 19, 'Nhỏ', 1, 'Bán hàng', '2025-05-13 17:26:20', 'Thành công'),
(6, 13, 'Lớn', 8, 'Bán hàng', '2025-05-16 18:56:52', 'Thành công'),
(7, 23, 'Lớn', 3, 'Bán hàng', '2025-05-16 18:56:52', 'Thành công'),
(8, 17, 'Nhỏ', 10, 'Bán hàng', '2025-05-16 18:58:29', 'Thành công'),
(9, 17, 'Lớn', 1, 'Bán hàng', '2025-05-16 19:10:39', 'Thành công'),
(10, 15, 'Lớn', 1, 'Bán hàng', '2025-05-17 07:27:56', 'Thành công'),
(11, 15, 'Lớn', 1, 'Hoàn kho từ đơn hủy', '2025-05-17 07:28:27', 'Thành công'),
(12, 15, 'Nhỏ', 1, 'Bán hàng', '2025-05-17 07:33:51', 'Thành công'),
(13, 17, 'Lớn', 3, 'Nhập kho', '2025-05-17 08:32:07', 'Thành công'),
(14, 17, 'Nhỏ', 77, 'Cập nhật kho', '2025-05-17 08:33:17', 'Thành công'),
(15, 17, 'Lớn', 2, 'Bán hàng', '2025-05-17 09:38:06', 'Thành công'),
(16, 17, 'Lớn', 2, 'Hoàn kho từ đơn hủy', '2025-05-17 09:40:46', 'Thành công'),
(17, 8, 'Nhỏ', 40, 'Nhập kho mới', '2025-05-17 15:53:59', 'Thành công'),
(18, 8, 'Nhỏ', 40, 'Cập nhật kho', '2025-05-17 17:50:39', 'Thành công'),
(19, 8, 'Nhỏ', 40, 'Cập nhật kho', '2025-05-17 17:51:05', 'Thành công'),
(20, 8, 'Vừa', 2, 'Nhập kho mới', '2025-05-17 17:51:05', 'Thành công'),
(21, 23, 'Nhỏ', 1, 'Bán hàng', '2025-05-17 18:37:58', 'Thành công'),
(22, 14, 'Vừa', 1, 'Bán hàng', '2025-05-17 18:39:31', 'Thành công'),
(23, 21, 'Nhỏ', 2, 'Bán hàng', '2025-05-17 18:47:50', 'Thành công'),
(24, 23, 'Nhỏ', 1, 'Hoàn kho từ đơn hủy', '2025-05-17 18:48:00', 'Thành công'),
(25, 14, 'Vừa', 1, 'Hoàn kho từ đơn hủy', '2025-05-17 18:48:39', 'Thành công'),
(26, 15, 'Nhỏ', 1, 'Bán hàng', '2025-05-17 19:31:52', 'Thành công'),
(27, 17, 'Vừa', 1, 'Bán hàng', '2025-05-17 19:35:06', 'Thành công');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `verify` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `name`, `email`, `phone`, `password`, `address`, `verify`) VALUES
(1, 2, 'Jason', 'jaosn68@gmail.com', '09998887777', '1234567', 'Quan 1, Ho Chi Minh City', '26333'),
(2, 1, 'Kain', 'kain1@gmail.com', '90808908', '90808908', 'Tầng 2 tòa nhà T10, Times City Vĩnh Tuy, Hai Bà Trưng, Hà Nội.', '12564'),
(4, 1, 'Devki', 'devki1@gmail.com', '15454545', '54545454', '1212121', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variant`
--

CREATE TABLE `variant` (
  `variant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `variant`
--

INSERT INTO `variant` (`variant_id`, `product_id`, `size`, `price`) VALUES
(9, 8, 'Nhỏ', 22000),
(10, 8, 'Vừa', 28000),
(11, 8, 'Lớn', 35000),
(18, 11, 'Nhỏ', 22000),
(19, 11, 'Vừa', 29000),
(20, 11, 'Lớn', 36000),
(21, 12, 'Nhỏ', 22000),
(22, 12, 'Vừa', 29000),
(23, 12, 'Lớn', 35000),
(24, 13, 'Nhỏ', 22000),
(25, 13, 'Vừa', 29000),
(26, 13, 'Lớn', 35000),
(27, 14, 'Nhỏ', 22000),
(28, 14, 'Vừa', 29000),
(29, 14, 'Lớn', 39000),
(30, 15, 'Nhỏ', 22000),
(31, 15, 'Vừa', 29000),
(32, 15, 'Lớn', 35000),
(33, 16, 'Nhỏ', 22000),
(34, 16, 'Vừa', 29000),
(35, 16, 'Lớn', 35000),
(36, 17, 'Nhỏ', 22000),
(37, 17, 'Vừa', 29000),
(38, 17, 'Lớn', 35000),
(39, 18, 'Nhỏ', 22000),
(40, 18, 'Vừa', 29000),
(41, 18, 'Lớn', 0),
(42, 19, 'Nhỏ', 22000),
(43, 19, 'Vừa', 29000),
(44, 19, 'Lớn', 35000),
(45, 20, 'Nhỏ', 22000),
(46, 20, 'Vừa', 29000),
(47, 20, 'Lớn', 35000),
(48, 21, 'Nhỏ', 22000),
(49, 21, 'Vừa', 29000),
(50, 21, 'Lớn', 35000),
(51, 22, 'Vừa', 29000),
(52, 23, 'Nhỏ', 25000),
(53, 23, 'Vừa', 29000),
(54, 23, 'Lớn', 35000),
(55, 22, 'Nhỏ', 29000),
(56, 22, 'Lớn', 35000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`details_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_size_unique` (`product_id`,`size`);

--
-- Chỉ mục cho bảng `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Chỉ mục cho bảng `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `variant`
--
ALTER TABLE `variant`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`variant_id`) REFERENCES `variant` (`variant_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Các ràng buộc cho bảng `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Các ràng buộc cho bảng `variant`
--
ALTER TABLE `variant`
  ADD CONSTRAINT `variant_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
