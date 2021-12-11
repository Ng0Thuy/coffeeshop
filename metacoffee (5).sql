-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2021 lúc 10:37 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

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
  `category_name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Trà sữa'),
(2, 'Cà phê'),
(3, 'Nước uống trái cây'),
(4, 'Trà kem phô mai'),
(11, 'Sữa chua dẽo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment_content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `product_id`, `comment_content`, `comment_date`) VALUES
(4, 1, 14, 'Ngon quá', '2021-12-02 13:24:06'),
(5, 4, 21, 'Ngon quá', '2021-12-02 13:35:58'),
(14, 1, 20, 'Tôi rất thích sản phẩm này', '2021-12-03 04:03:41'),
(20, 1, 8, 'Tôi rất thích sản phẩm này', '2021-12-06 01:55:46'),
(35, 1, 23, 'Tôi rất thích nó', '2021-12-10 07:05:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `note` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `method` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` varchar(25) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `address`, `phone`, `note`, `method`, `status`, `order_date`) VALUES
(71, 4, 'Hai Ba, Hai Lang, Quang Tri', '043875785201', '', 'payLater', 'Đã nhận hàng', '2021-12-09 09:04:22'),
(72, 4, 'Hải Lăng, Quảng Trị', '043875785201', '', 'banking', 'Đã hủy', '2021-12-10 06:52:07'),
(73, 2, '68.65.120.213\r\nviet nam', '54387578520', '', 'payLater', 'Đang tiến hành', '2021-12-10 08:21:01'),
(74, 4, 'Hải Ba, Hải Lăng', '0984366161', '', 'payLater', 'Đang giao', '2021-12-10 08:22:29'),
(75, 1, 'Hải Lăngaaaaa', '0984366161', '', 'payLater', 'Đã nhận hàng', '2021-12-10 08:23:25'),
(76, 1, 'Hai Ba, Hai Lang, Quang Tri', '0387578520', '', 'payLater', 'Đang tiến hành', '2021-12-10 08:38:59');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`details_id`, `order_id`, `variant_id`, `price_total`, `num`) VALUES
(54, 71, 56, 245000, 7),
(55, 72, 52, 150000, 6),
(56, 72, 54, 210000, 6),
(57, 73, 52, 25000, 1),
(58, 74, 9, 22000, 1),
(59, 75, 75, 15000, 1),
(60, 76, 51, 29000, 1),
(61, 76, 55, 29000, 1),
(62, 76, 56, 35000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price_sale` float NOT NULL,
  `active` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `import_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `thumbnail`, `description`, `price_sale`, `active`, `view`, `import_date`) VALUES
(8, 1, 'Ô long Trân châu Baby Kem Café', 'mvc/public/images/products/ezgif.com-gif-maker-6 (1).jpg', 'Menu của Marathon Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 5, '2021-11-30 15:52:33'),
(11, 1, 'Sữa Tươi Trân Châu Baby Kem Café', 'mvc/public/images/products/ezgif.com-gif-maker-6.jpg', 'Menu của Marathon Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 0, '2021-12-01 05:53:57'),
(12, 1, 'Trà xanh', 'mvc/public/images/products/ezgif.com-gif-maker-13.jpg', 'Menu của Marathon Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 10, 1, 0, '2021-12-01 08:35:15'),
(13, 1, 'Ô long thái cực', 'mvc/public/images/products/ezgif.com-gif-maker-19.jpg', 'Menu của Marathon Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 50, 1, 0, '2021-12-01 08:35:47'),
(14, 3, 'Probi Bưởi Trân Châu Sương Mai', 'mvc/public/images/products/ezgif.com-gif-maker-2.jpg', 'Menu của Marathon Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 0, '2021-12-01 08:36:38'),
(15, 3, 'Trà dâu tằm pha lê tuyết', 'mvc/public/images/products/dâu-tằm-pha-lê-tuyết.jpg', 'Menu của Marathon Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 0, '2021-12-01 08:37:06'),
(16, 3, 'Hồng Trà Bưởi Mật Ong', 'mvc/public/images/products/ezgif.com-gif-maker-7.jpg', 'Menu của Marathon Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 0, '2021-12-01 08:38:03'),
(17, 4, 'Dâu Tằm Kem Phô Mai', 'mvc/public/images/products/dau_tam_kem_pho_mai_09a4c4b857694d918a86542225fc2867_grande.jpg', 'Menu của Marathon Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 0, '2021-12-01 08:39:45'),
(18, 4, 'Hồng Trà Kem Phô Mai', 'mvc/public/images/products/hong_tra_kem_pho_mai_bea768e4679b4a2bbea0d5730fc75ffa_4dbc2f739c184bbbad3cee27aab5cfcd_grande.jpg', 'Menu của Marathon Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 0, '2021-12-01 08:40:14'),
(19, 4, 'Trà Xanh Kem Phô Mai', 'mvc/public/images/products/tra_xanh_kem_pho_mai_1ed02f821288425d87dd9fc096c62768_40b394e0280f4d55819de201a4405718_grande.jpg', 'Menu của Marathon Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 0, '2021-12-01 08:40:42'),
(20, 4, 'Matcha Kem Phô Mai', 'mvc/public/images/products/matcha-kem-pho-mai_09b3b54997614aea86d2b61bcd7f548c_73a9e7cd539949718b13b06c5db9522f_grande.png', 'Menu của Marathon Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 0, '2021-12-01 08:41:13'),
(21, 11, 'Sữa Chua Dâu Tằm Hoàng Kim', 'mvc/public/images/products/sua-chua-dau-tam-hoang-kim.png', 'Menu của Marathon Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 0, '2021-12-01 08:43:00'),
(22, 11, 'Sữa Chua Trắng', 'mvc/public/images/products/sua-chua-trang-.png', 'Menu của Marathon Coffee sẽ bắt đầu với 3 thức uống cà phê cơ bản của người Việt Nam là cà phê đen, cà phê sữa và bạc sỉu. Cà phê được chuẩn bị sẵn ở nhà vào sáng sớm, cẩn thận đóng kín bỏ vào bình giữ nhiệt để bảo đảm chất lượng cà phê không thay đổi tro', 0, 1, 0, '2021-12-01 08:43:20'),
(23, 2, 'Royal Pearl Milk Coffee', 'mvc/public/images/products/Royal-Pearl-Milk-Coffee.png', 'Royal Pearl Milk Coffee', 40, 1, 0, '2021-12-05 04:47:58'),
(32, 2, 'Grass Jelly Milk Coffee', 'mvc/public/images/products/Grass-Jelly-Milk-Coffee.png', 'Grass Jelly Milk Coffee', 15, 1, 0, '2021-12-07 13:33:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(25) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Người dùng'),
(2, 'Quản lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `verify` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `name`, `email`, `phone`, `password`, `address`, `verify`) VALUES
(1, 2, 'Đăng Thành', 'bossryo68@gmail.com', '0387578520', '1234567', 'Hai Ba, Hai Lang, Quang Tri', '26333'),
(2, 1, 'Đăng Thànhh12', 'bossryo6811@gmail.com', '843875785201', '84387578520', 'Tầng 2 tòa nhà T10, Times City Vĩnh Tuy, Hai Bà Trưng, Hà Nội.', '12564'),
(4, 1, 'Nguyễn Đăng Thành', '1@gmail.com', '15454545', '54545454', '1212121', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variant`
--

CREATE TABLE `variant` (
  `variant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(5) CHARACTER SET utf8 NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(56, 22, 'Lớn', 35000),
(75, 32, 'Nhỏ', 15000),
(76, 32, 'Vừa', 22000),
(77, 32, 'Lớn', 0);

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
