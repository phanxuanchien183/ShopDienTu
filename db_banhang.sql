-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 04, 2021 lúc 12:42 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `bills_ibfk_1` (`id_customer`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(14, 14, '2017-03-23', 160000, 'COD', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 13, '2017-03-21', 400000, 'ATM', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 12, '2017-03-21', 520000, 'COD', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 11, '2017-03-21', 420000, 'COD', 'không chú', '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(15, 15, '2017-03-24', 220000, 'COD', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(18, 19, '2020-12-27', 3500000, 'COD', 'avv', '2020-12-27 06:14:00', '2020-12-27 06:14:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE IF NOT EXISTS `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `bill_detail_ibfk_2` (`id_product`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(18, 15, 62, 5, 220000, '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(17, 14, 2, 1, 160000, '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(16, 13, 60, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(15, 13, 59, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(14, 12, 60, 2, 200000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(13, 12, 61, 1, 120000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(12, 11, 61, 1, 120000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(11, 11, 57, 2, 150000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(20, 18, 15, 1, 3500000, '2020-12-27 06:14:00', '2020-12-27 06:14:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(15, 'ê', 'Nữ', 'huongnguyen@gmail.com', 'e', 'e', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(14, 'hhh', 'nam', 'huongnguyen@gmail.com', 'Lê thị riêng', '99999999999999999', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '23456789', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 'Khoa phạm', 'Nam', 'khoapham@gmail.com', 'Lê thị riêng', '1234567890', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '234567890-', 'không chú', '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(18, 'Phan Xuân Chiến', 'Nam', 'ngoisaoxau98@gmail.com', '159/48/40 Trần Văn Đang phường 11', '0374463636', 'avvv', '2020-12-27 06:12:09', '2020-12-27 06:12:09'),
(19, 'Phan Xuân Chiến', 'Nam', 'ngoisaoxau98@gmail.com', '559 Trường Chinh', '0374463636', 'avv', '2020-12-27 06:14:00', '2020-12-27 06:14:00'),
(26, 'Phan Xuân Chiến', 'nam', 'ngoisaoxau98@gmail.com', '559 Trường Chinh', '0374463636', 'sdfdf', '2021-01-04 11:57:32', '2021-01-04 11:57:32'),
(29, 'Phan Xuan Chien', 'Nam', 'ngoisaoxau98@gmail.com', '61/20/1 TCH35, p.Tan Chanh Hiep Quan 12', '1674463636', 'sdfdf', '2021-01-04 12:10:59', '2021-01-04 12:10:59'),
(30, 'Phan Xuân Chiến', 'Nam', 'huongnguyen@gmail.com', '559 Trường Chinh', '0374463636', 'sdfd', '2021-01-04 12:14:38', '2021-01-04 12:14:38'),
(34, 'ádasdasd', 'ádasd', 'ngoisaoxau98@gmail.com', '559 Trường Chinh', '0374463636', 'sdfd', '2021-01-04 12:29:32', '2021-01-04 12:29:32'),
(35, 'ádfsadf', 'Nam', 'phanxuanchien183@gmail.com', 'sdf', '0374463636', 'sdfdf', '2021-01-04 12:33:13', '2021-01-04 12:33:13'),
(32, 'Phan Xuân Chiến', 'Nữ', 'huongnguyen@gmail.com', '559 Trường Chinh', '0374463636', 'sdfdf', '2021-01-04 12:18:11', '2021-01-04 12:18:11'),
(33, 'Phan Xuân Chiến', 'Nam', 'ngoisaoxau98@gmail.com', '559 Trường Chinh', '0374463636', 'avvv', '2021-01-04 12:19:26', '2021-01-04 12:19:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_id_type_foreign` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Smart Tivi QLED Samsung 4K 43 inch QA43Q60T', 1, 'Smart Tivi QLED Samsung 4K 43 inch QA43Q60T là sản phẩm độc quyền của Điện máy Xanh có thiết kế thanh mảnh với khung viền siêu mỏng 0.5 cm cho bạn cảm giác như không có viền 3 cạnh, phù hợp với mọi không gian nội thất.\r\n\r\nKích thước tivi 43 inch thích hợp cho những phòng ngủ, phòng khách có diện tích vừa phải. Chân đế hình chữ V ngược giúp bạn có thể đặt tivi trên mọi bề mặt phẳng đều vững chắc.', 129, 119, 'QA43Q60T.png', 'cái', 1, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(2, 'Smart Tivi Samsung 4K 50 inch UA50TU8100', 1, 'Thiết kế không viền 3 cạnh, sang trọng và hiện đại\r\nSmart Tivi Samsung 4K 50 inch UA50TU8100 sở hữu thiết kế không viền 3 cạnh mang đến cho bạn những trải nghiệm xem mỗi khung hình đều trọn vẹn, chân thực.\r\n\r\nKích thước tivi Samsung 50 inch cùng vẻ ngoài thanh mảnh làm tăng nét hiện đại và sự sang trọng cho không gian nội thất nhà bạn như phòng khách, phòng ngủ,…', 129, 115, 'UA50TU8100.jpg', 'cái', 1, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(3, 'Tủ lạnh Samsung Inverter 380 lít RT38K5982BS/SV', 2, 'Thiết kế sang trọng, hiện đại với màu sắc mới\r\nTủ lạnh Samsung Inverter 380 lít RT38K5982BS/SV được thiết kế hiện đại cộng với tông màu đen inox sang trọng, tinh tế hứa hẹn sẽ làm nổi bật lên không gian nội thất, tô điểm thêm vẻ đẹp cho căn nhà của bạn.\r\nVới dung sử dụng 380 lít chiếc tủ lạnh Samsung này phù hợp với gia đình có 3 - 4 người hoặc ít hơn nếu bạn có nhu cầu trữ thực phẩm nhiều.', 179, 154, 'RT38K5982BS.jpg', 'cái', 0, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(4, 'Tủ lạnh Panasonic Inverter 322 lít NR-BC360QKVN', 2, 'Tủ lạnh Panasonic ngăn cấp đông mềm thế hệ mới Prime Fresh+ bảo quản thực phẩm không cần rã đông\r\nTủ lạnh Panasonic Inverter 322 lít NR-BC360QKVN trang bị ngăn đông mềm thế hệ mới Prime Fresh+ với mức nhiệt độ ở -3 độ C giúp thực phẩm tươi sống được làm đông nhanh mà không bị đông đá và tươi mới lên đến 7 ngày. Do đó, thực phẩm giữ được các chất dinh dưỡng, độ thơm ngon và bạn không phải tốn thêm nhiều thời gian để rã đông trước khi chế biến.\r\n\r\nĐặc biệt, ngăn cấp đông mềm thế hệ mới này có sức chứa lớn hơn 78% so với thế hệ trước và được trang thêm ngăn kéo, khay nhôm truyền lạnh nhanh giúp bạn có thể phân chia thực phẩm tiện lợi.', 160, 0, 'BC360QKVN.jpg', 'cái', 2, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(5, 'Máy giặt Panasonic Inverter 9.5 Kg', 3, 'Diệt khuẩn 99.99%, giặt sạch vết bẩn cứng đầu nhờ công nghệ nước nóng StainMaster+\r\nMáy giặt Panasonic Inverter 9.5 Kg NA-FD95V1BRV được tích hợp công nghệ nước nóng StainMaster+ có khả năng xử lý các vết bẩn hiệu quả với nhiệt độ nước thích hợp, loại bỏ các vi khuẩn gây hại giúp bảo vệ làn da tốt hơn, đồng thời còn giúp đánh bật các vết bẩn cứng đầu dễ dàng nhờ các chương trình giặt chuyên biệt.', 16000000, 12900000, 'FD95V1BRV.png', 'cái', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(6, 'Máy giặt Toshiba 8.2 kg AW-F920LV WB', 3, 'Thiết kế máy giặt mới mẻ\r\nMáy giặt Toshiba AW-F920LV WB được thiết kế với vẻ ngoài độc đáo cùng màu sắc cũng khá là tươi mới, mang lại sự sinh động hiện đại hơn cho căn nhà của bạn. Khối lượng giặt 8.2 kg của chiếc máy giặt Toshiba này giúp cho nó trở nên khá phù hợp cho các gia đình có từ 3 - 5 thành viên.', 2000000, 1800000, 'F920LV.jpg', 'cái', 2, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(7, 'Máy lạnh Panasonic Inverter 1 HP', 4, 'Bầu không khí trong lành, sạch bụi bẩn, bụi mịn PM2.5 cùng công nghệ Nanoe-G\r\nNanoe-G giải phóng các ion âm xung quanh máy lạnh. Các ion này sẽ gắn kết với các hạt bụi theo dòng không khí vào trong ống nạp khí của máy lạnh. Sau đó, các hạt bụi tích điện âm này bị màng lọc tích điện dương giữ lại và vô hiệu hóa tại màng lọc, giúp không khí sạch bụi bẩn, bụi mịn PM2.5, đảm bảo an toàn sức khoẻ cho gia đình bạn.\r\n\r\nNgoài ra, bạn có thể sử dụng chức năng này độc lập với hệ thống làm lạnh, cho phép sử dụng chiếc máy lạnh Panasonic Inverter này như một chiếc máy lọc khí thực thụ.', 16000000, 0, 'PU9WKH.jpg', 'cái', 2, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(8, 'Máy lạnh Sharp Inverter 1 HP ', 4, 'Thiết kế tinh tế cùng với công suất 1 HP\r\nMáy lạnh Sharp Inverter 1 HP AH-X9XEW sở hữu những đường nét thiết kế mạnh mẽ và tông màu trắng sang trọng phù hợp với nhiều phong cách nội thất khác nhau, đi kèm với đó là công suất 1 HP phù hợp với những căn phòng nhỏ có diện tích dưới 15 m2.\r\nCông nghệ J-Tech Inverter hiện đại giúp tiết kiệm điện năng\r\nMáy lạnh Sharp được trang bị công nghệ J-Tech Inverter được cải tiến từ công nghệ Inverter thông thường. Nhờ mạch điện đổi chiều, máy lạnh inverter này duy trì và điều chỉnh nhiệt độ bằng cách thay đổi các cấp độ làm lạnh khác nhau. Nguyên lý này giúp gia đình bạn tiết kiệm đáng kể lượng điện tiêu thụ khi sử dụng máy lạnh 1 chiều này so với máy lạnh thường.', 16000000, 15000000, 'X9XEW.png', 'cái', 1, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(9, 'Quạt điều hòa Sunhouse SHD7727', 5, 'Làm mát với 2 hộp đá khô tặng kèm giúp quạt giải nhiệt hiệu quả hơn cho không gian sống gia đình những ngày nắng nóng.\r\nCông suất 150 W làm mát nhanh trên diện tích phòng 20 – 35 m2, thích hợp cho không gian phòng khách, phòng ăn, quán ăn...', 16000000, 15000000, 'SHD7727.png', 'cái', 2, '2020-10-26 03:00:16', '2020-10-24 22:11:00'),
(11, 'Quạt điều hòa không khí Rapido 3000D', 5, 'Đi kèm 2 cục đá khô tăng hiệu quả làm mát trong ngày nắng nóng cao độ\r\nDạng đá hóa học này có thể tái sử dụng, chỉ cần cho vào ngăn đá tủ lạnh để làm lạnh trước khi cho vào bình chứa nước của quạt. Chúng sẽ giúp hơi nước thoát ra mát mẻ hơn, tăng hiệu quả giải nhiệt.', 2500000, 22000000, '3000D.jpg', 'cái', 0, '2020-10-12 02:00:00', '2020-10-27 02:24:00'),
(12, 'Điện thoại OPPO Reno4', 6, 'Tiếp nối thành công từ OPPO Reno3 cũng như OPPO Reno3 Pro thì nay OPPO Reno4 đã chính thức được ra mắt tại thị trường Trung Quốc. Có thể thấy máy hỗ trợ 5G, chế độ sạc nhanh cùng với hệ thống camera vô cùng ấn tượng.\r\nThiết kế hiện đại bắt kịp xu hướng\r\nSo với Reno3 thì Reno4 mặt trước được làm bằng kính công nghệ Gorilla Glass 3, giúp máy hạn chế bị trầy xước và vỏ nhựa bóng hiệu ứng tráng gương tạo vẻ đồng nhất đẹp mắt, tuy nhiên thì hơi bám dấu vân tay nên bạn có thể gắn thêm ốp lưng bảo vệ.', 2000000, 1800000, 'Reno4.jpg', 'cái', 0, '2020-10-12 02:00:00', '2020-10-27 02:24:00'),
(13, 'Điện thoại iPhone 12 Pro Max 512GB\r\n', 6, 'Không thể phủ nhận, sự ra đời của iPhone 12 Pro Max 512 GB chính là đòn tấn công nghiêm túc của Apple dành cho các đối thủ. Sự chỉnh chu tổng thể từ ngoại hình cho đến sức mạnh tiềm tàng bên trong, chính là nguồn cảm hứng để các ông lớn trong ngành phấn đấu vượt qua.\r\nThiết kế cao cấp, khẳng định đẳng cấp bản thân\r\nĐược lấy cảm hứng từ “huyền thoại” iPhone 4 và iPhone 5, nhưng thay vì theo đuổi những đường cong mềm mại, uyển chuyển thì nay iPhone 12 Pro Max được thay thế bằng các góc cạnh được vát thẳng, vuông vức, phần viền được gọt mỏng và bao phủ bởi khung thép không gỉ xử lý bởi công nghệ mạ PVD sáng bóng, bắt mắt.', 30000000, 28000000, 'ip12.jpg', 'cái', 1, '2020-10-12 02:00:00', '2020-10-27 02:24:00'),
(14, 'Laptop HP 15s du1103TU i5 10210U/8GB/512GB/Win10 (2W7J7PA)', 7, 'Laptop HP 15s du1103TU i5 (2W7J7PA) sở hữu thiết kế đẹp mắt, cấu hình máy ổn định cùng tốc độ khởi động máy nhanh chóng. Đây sẽ là chiếc máy tính hỗ trợ học tập và làm việc hiệu quả dành cho học sinh sinh viên, nhân viên văn phòng.\r\nCấu hình ổn định, phù hợp cho văn phòng\r\nLaptop HP được trang bị chip Intel Core i5 Comet Lake gen 10 có 4 nhân 8 luồng cùng card đồ họa tích hợp Intel UHD Graphics mang lại khả năng xử lý ổn các tác vụ và ít tiêu hao năng lượng. Tốc độ xử lý CPU 1.60 GHz và tốc độ xử lý tối đa 4.2 GHz nhờ công nghệ Turbo Boost.\r\n\r\nBên cạnh đó, RAM 8 GB cho phép bạn mở đồng thời hơn tab Chrome, có thể đa nhiệm nhiều ứng dụng như trình duyệt, Zalo, Line, Photoshop cùng một thời điểm mà không sợ giật lag. Sự có mặt của chip i5 cùng 8 GB RAM sẽ giúp các thao tác chỉnh sửa ảnh trên Photoshop hoặc Ai, cắt ghép video nhẹ nhàng trên Premier đều khá mượt mà.\r\n\r\nNgoài ra, máy hỗ trợ bus RAM tối đa lên đến 32 GB cho mức độ xử lý dữ liệu nhiều và nhanh chóng.', 30000000, 28000000, 'du1103TU.jpg', 'cái', 0, '2020-10-12 02:00:00', '2020-10-27 02:24:00'),
(15, 'Laptop Asus VivoBook X409JA i3 1005G1/4GB/512GB/Win10 (EK015T)', 7, 'Laptop Asus VivoBook X409JA i3 (EK015T) nhỏ gọn phù hợp với đối tượng học sinh, sinh viên hay nhân viên văn phòng. Với CPU thế hệ 10 mạnh mẽ, cấu hình laptop đủ để bạn thoải mái sử dụng các ứng dụng văn phòng, lướt web, giải trí hằng ngày.\r\nGọn nhẹ, cơ động\r\nASUS VivoBook sở hữu thiết kế nhỏ gọn, thanh lịch với những đường nét tinh tế. Máy có cân nặng 1.5 kg cho bạn đem theo laptop đi học, đi làm dễ dàng.', 3500000, 3200000, 'X409JA.jpg', 'cái', 1, '2020-10-12 02:00:00', '2020-10-27 02:24:00'),
(16, 'Android Tivi Sony 4K 55 inch KD-55X7500H', 1, 'Thiết kế đơn giản, chân đế hình chữ V vững chắc\r\nAndroid Tivi Sony 4K 55 inch KD-55X7500H sở hữu thiết kế đơn giản có khung viền màu đen sang trọng kết hợp cùng chân đế giống hình chữ V úp ngược giúp tivi đứng vững trên các bề phẳng, cho bạn tùy ý bố trí ở bất cứ đâu bạn thích. Đây không chỉ là tivi mà còn là một món nội thất tương thích với những không gian sống hiện đại của tất cả mọi người.\r\n\r\nMàn hình tivi Sony 55 inch cùng viền mỏng mang đến trải nghiệm xem chìm đắm vào từng khung hình, phù hợp đặt ở phòng khách, phòng họp,...', 15000000, 12000000, '55X7500H.jpg', 'cái', 0, '2020-10-12 02:00:00', '2020-10-27 02:24:00'),
(17, 'Smart Tivi Samsung 4K 43 inch UA43TU7000', 1, 'Thiết kế không viền 3 cạnh tinh tế, sang trọng\r\nSmart Tivi Samsung 4K 43 inch UA43TU7000 sở hữu chân đế giống hình chữ V úp ngược thanh mảnh nhưng chắc chắn, thiết kế không viền 3 cạnh sang trọng sẽ mang đến cho không gian nội thất nhà bạn thêm tinh tế và đẳng cấp.\r\n\r\nKích thước tivi Samsung 43 inch thích hợp cho bày trí ở các nơi như: phòng khách, phòng họp, phòng làm việc,...', 2500000, 24000000, 'UA43TU7000.jpg', 'cai', 0, '2020-10-12 02:00:00', '2020-10-27 02:24:00'),
(18, 'Tủ lạnh Samsung Inverter 360 lít RT35K5982BS', 2, 'Kiểu dáng sang trọng, đường nét tinh tế\r\nTủ lạnh Samsung Inverter 360 lít RT35K5982BS/SV là sản phẩm được ra mắt trong năm 2018 với thiết kế ngăn đá trên và ngăn lạnh bên dưới khá quen thuộc với thị trường Việt Nam, sản phẩm phủ lên mình tông màu đen, kết hợp với các đường nét trên thân tủ lạnh tạo nên sự cứng cáp, dễ dàng hòa nhập với không gian nội thất của ngôi nhà bạn.', 18000000, 17000000, 'RT35K5982BS.png', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(19, 'Tủ lạnh Panasonic Inverter 255 lít NR-BV280QSVN', 2, 'Ngăn cấp đông mềm thế hệ mới Prime Fresh+ bảo quản thực phẩm không cần rã đông\r\nTủ lạnh Panasonic Inverter 255 lít NR-BV280QSVN trang bị ngăn đông mềm thế hệ mới Prime Fresh+ với mức nhiệt độ ở -3 độ C giúp thực phẩm tươi sống được làm đông nhanh hơn và tươi mới lên đến 7 ngày mà không bị đông đá. Nhờ vậy, thực phẩm giữ được các chất dinh dưỡng, độ thơm ngon, đồng thời bạn không phải tốn thêm nhiều thời gian để rã đông trước khi chế biến.', 15000000, 13900000, 'BV280QSVN.jpg', 'cái', 1, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(20, 'Máy giặt Samsung Inverter 9.5 kg', 3, 'Thiết kế sang trọng, hiện đại với màu xám thời thượng\r\nMáy giặt Samsung Inverter 9.5kg WW95J42G0BX/SV có thiết kế cửa trước hiện đại với màu xám thời thượng tạo điểm nhấn cho không gian nội thất của bạn. Cửa kính chịu lực trong suốt và tay cầm thiết kế ở vị trí 45 độ giúp người dùng thao tác đóng mở dễ dàng.\r\nTiết kiệm điện năng, vận hành êm ái với công nghệ Digital Inverter\r\nMáy được trang bị công nghệ biến tần Digital Inverter có khả năng điều chỉnh vòng quay của động cơ phù hợp với mỗi chương trình giặt. Công nghệ này giúp tiết kiệm điện năng hoạt động nhưng vẫn đảm bảo chất lượng giặt hiệu quả.\r\n\r\nĐộng cơ Digital Inverter giúp giảm thiểu tiếng ồn và chống rung hiệu quả đảm bảo sự yên tĩnh khi máy hoạt động. Ngoài ra, bộ phận máy nén của máy được Samsung bảo hành lên đến 11 năm.', 15000000, 13900000, 'WW95J42G0BX.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(21, 'Máy giặt Electrolux Inverter 9 Kg EWF9025BQSA', 3, 'Máy giặt cửa trước màu bạc sang trọng, hiện đại\r\nMáy giặt Electrolux Inverter 9 Kg EWF9025BQSA với kiểu dáng cửa trước cùng sắc bạc sang trọng, hiện đại và viền cửa chrome bóng bẩy sẽ là điểm nhấn cho không gian nội thất của gia đình.\r\n\r\nBên cạnh đó, cửa máy giặt được thiết kế khá rộng, giúp bạn thuận tiện trong việc bỏ vào và lấy quần áo ra.', 16000000, 15000000, 'EWF9025BQSA.png', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(22, 'Máy giặt LG Inverter 9 kg FV1409S2W', 3, 'Vận hành êm ái, bảo vệ quần áo tối ưu với động cơ truyền động trực tiếp Intello DD kết hợp trí thông minh nhân tạo AI\r\nĐộng cơ truyền động trực tiếp có tích hợp trí tuệ nhân tạo được máy giặt sử dụng giúp máy trong quá trình hoạt động giảm rung lắc, giảm tiếng ồn. Máy sẽ vận hành êm ái và bền bỉ hơn.\r\n\r\nTrí tuệ nhân tạo AI cùng các cảm biến sẽ cho phép máy giặt tự lựa chọn các chuyển động giặt phù hợp cho quần áo, bảo vệ quần áo của bạn tốt hơn.', 16000000, 15000000, 'FV1409S2W.jpg', 'cái', 1, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(23, 'Máy lạnh Sharp Inverter 1.5 HP AH-X12XEW', 4, 'Thiết kế mạnh mẽ, tinh tế cùng công suất lớn 1.5 HP\r\nMáy lạnh Sharp Inverter 1.5 HP AH-X12XEW sở hữu những nét thiết kế cứng cáp mạnh mẽ, cùng với tông màu trắng thanh lịch tinh tế, đi cùng với công suất lớn 1.5 HP phù hợp với các không gian có diện tích từ 15 - 20 m2 như: phòng khách, phòng ngủ, phòng họp nhỏ,...', 18000000, 0, 'X12XEW.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(24, 'Máy lạnh TCL Inverter 1 HP TAC-10CSI/KE88N', 4, 'Thiết kế đơn giản nhưng không kém phần thanh lịch\r\nMáy lạnh TCL Inverter 1 HP TAC-10CSI/KE88N mang sắc trắng đơn giản kết hợp với đường viền màu vàng thanh lịch, bắt mắt, sẽ là điểm nhấn tuyệt hảo cho không gian nội thất của gia đình bạn.\r\n\r\nNếu bạn có nhu cầu chọn mua máy lạnh cho phòng dưới 15 m2 như phòng ngủ nhỏ, phòng làm việc cá nhân,... thì chiếc máy lạnh TCL 1 HP chính là một sự lựa chọn vô cùng lý tưởng.', 18000000, 0, 'KE88N.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(25, 'Điện thoại Samsung Galaxy Z Flip\r\n', 6, 'Samsung Galaxy Z Flip chiếc điện thoại đến từ tương lai với thiết kế màn hình gập thời thượng, hiệu năng khủng, camera chụp ban đêm ấn tượng, nhỏ gọn, sang trọng, dễ dàng cầm nắm và mang theo bên mình.\r\nThiết kế màn hình gập với phần bản lề hiện đại\r\nCấu trúc bản lề mới khả năng chống bụi bẩn gập dễ dàng với độ bền cao lên tới 200.000 lần gập mở cho bạn trải nghiệm màn hình giải trí kích thước lớn để tận hưởng trọn vẹn nội dung, nhưng vẫn thoải mái khi đút trong túi quần.', 8000000, 7000000, 'ZFlip.jpg', 'cái', 2, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(26, 'Laptop HP Pavilion x360 14 dw0060TU', 7, 'HP Pavilion x360 14 dw0060TU i3 (195M8PA) hướng đến người dùng trẻ hiện đại, năng động, đặc biệt là học sinh sinh viên, nhân viên văn phòng. Nổi bật với thiết kế 2 trong 1 cùng bảo mật vân tay hiện đại, đây được đánh giá là chiếc máy tính xách tay đáng để trải nghiệm.\r\nThiết kế năng động, hiện đại\r\nĐược thiết kế sang trọng và mỏng nhẹ, HP Pavilion X360 cân nặng chỉ khoảng 1.65 kg - mỏng 19 mm. Bạn có thể mang theo chiếc máy tính này theo để giải quyết công việc ở bất cứ đâu một cách thoải mái nhất mà không phải sợ nặng hay cồng kềnh.', 15000000, 0, 'dw0060TU.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(27, 'Smart Tivi NanoCell LG 4K 49 inch 49NANO81TNA ', 1, 'Thiết kế thanh lịch, chân đế hình bán nguyệt lạ mắt\r\nSmart Tivi LG 4K 49 inch 49NANO81TNA sở hữu thiết kế đơn giản, thanh mảnh cùng chân đế hình bán nguyệt làm nổi bật nét độc đáo riêng của tivi. Sự kết hợp hài hòa của tổng thể tạo nên nét thanh lịch cho cả không gian của bạn.\r\n\r\nKích thước màn hình tivi LG 49 inch phù hợp với phòng khách, phòng ngủ,... vừa giải trí cũng vừa là vật trang trí ấn tượng.', 16000000, 8000000, '49NANO81TNA.jpg', 'cái', 1, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(28, 'Tivi Mobell 32 inch 32T610A1', 1, 'Màu đen quý phái, chân đế vững chắc\r\nTivi Mobell 32 inch 32T610A1 góp phần làm tăng nét sang trọng cho không gian nội thất nhờ thiết kế hiện đại, đường nét thanh mảnh, tinh tế. Chân đế chữ V úp ngược giữ cho tivi vững vàng, không bị nghiêng, đổ khi đặt trên mọi mặt phẳng.\r\n\r\nTivi Mobell 32 inch với kích cỡ nhỏ gọn, là sự lựa chọn lý tưởng cho những gian phòng khách, phòng ngủ, văn phòng làm việc,... có diện tích vừa và nhỏ.', 12000000, 11000000, '32T610A1.jpg', 'cái', 1, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(29, 'Android Tivi TCL 32 inch L32S66A', 1, 'Thiết kế thanh mảnh, tinh tế\r\nAndroid Tivi TCL 32 inch L32S66A sở hữu thiết kế thanh mảnh với viền mỏng 0,3 cm đi kèm với chân đế hình chữ V úp ngược không chỉ mang lại vẻ đẹp về thẩm mỹ mà còn giúp tivi đứng vững trên nhiều dạng bề mặt khác nhau.\r\n\r\nKích thước màn hình tivi TCL 32 inch thích hợp để ở các không gian như phòng khách, phòng họp, phòng ngủ,...', 4590000, 0, 'L32S66A.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(30, 'Smart Tivi NanoCell LG 4K 65 inch 65NANO79TND', 1, 'Thiết kế tối giản hiện đại, viền mỏng mang đến trải nghiệm xem vượt trội\r\nSmart Tivi NanoCell LG 4K 65 inch 65NANO79TND được thiết kế theo kiểu dáng tối giản hiện đại, khung viền đen làm tổng thể tivi dễ hòa hợp với mọi không gian. Chân đế theo hình chữ V ngược để người dùng dễ dàng bố trí đặt tivi trên mọi bề mặt phẳng, hoặc cũng có thể tháo rời để gắn tường.\r\n\r\nKích thước màn hình lớn 65 inch cùng viền Nano Bezel tinh gọn mang đến trải nghiệm xem vượt trội hơn trước, nhanh chóng biến không gian của bạn thành rạp chiếu phim riêng.', 3800000, 3500000, '65NANO79TND.jpg', 'cái', 1, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(31, 'Android Tivi Sony 4K 55 inch KD-55X9000H', 1, 'Thiết kế gọn gàng, sang trọng  Android Tivi Sony 4K 55 inch KD-55X9000H được thiết kế với tông màu đen mạnh mẽ cùng với viền nhôm mỏng, mang đến cho bạn một chiếc tivi với vẻ ngoài vô cùng tinh tế và độc đáo. Với kích thước tivi Sony 55 inch sẽ góp phần làm hài hòa không gian nội thất trong nhà bạn và mang lại trải nghiệm thực sự đắm chìm như trong rạp chiếu phim, phù hợp trưng bày ở phòng khách, văn phòng,...', 22900000, 21900000, '55X9000H.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(32, 'Tủ lạnh Samsung Inverter 647 lít RS62R5001M9/SV', 2, 'Tủ lạnh Side by Side sang trọng, đẳng cấp\r\nTủ lạnh Samsung Inverter 647 lít RS62R5001M9/SV có thiết kế kiểu tủ lạnh side by side đẳng cấp, đi cùng gam màu bạc sang trọng, thời thượng, tủ lạnh sẽ là điểm nhấn nổi bật, mang lại cho không gian nội thất của gia đình một vẻ đẹp hiện đại.', 3800000, 3500000, 'RS62R5001M9.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(33, 'Tủ lạnh Aqua Inverter 456 lít AQR-IG525AM GB', 2, 'Thiết kế mặt gương đen sang trọng, huyền bí\r\nTủ lạnh Aqua Inverter 456 lít AQR-IG525AM GB sở hữu thiết kế sang trọng tinh tế với bề mặt phẳng tráng gương cùng lớp cường lực chắc chắn, tạo nên sự lịch lãm cho không gian bếp nhà bạn.\r\n\r\nVới thiết kế tủ lạnh kiểu tủ 4 cửa có 1 ngăn lạnh trên, 2 ngăn đông dưới cùng dung tích sử dụng rộng rãi 456 lít phù hợp với gia đình có 4 - 5 thành viên, cho bạn sử dụng thuận tiện, dễ dàng.', 28000000, 25000000, 'IG525AM.png', 'cái', 1, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(34, 'Tủ lạnh Samsung Inverter 307 lít RB30N4170BY/SV', 2, 'Tiết kiệm điện và kiểm soát nhiệt độ tối ưu nhờ công nghệ Digital Inverter \r\nTủ lạnh Samsung Inverter 307 lít RB30N4170BY/SV được hãng trang bị công nghệ Digital Inverter, có khả năng điều chỉnh hoạt động của máy nén, giúp duy trì nhiệt độ lý tưởng bên trong tủ mà vẫn mang lại hiệu quả tiết kiệm điện.\r\nLoại bỏ mùi hôi hiệu quả, mang lại luồng khí tươi mát cùng bộ lọc than hoạt tính\r\nChiếc tủ lạnh Samsung RB30N4170BY/SV còn sở hữu thêm bộ lọc than hoạt tính có chức năng loại bỏ mùi hôi một cách hiệu quả, nhằm mang lại luồng khí tươi mát và hạn chế tối đa tình trạng lẫn mùi khó chịu, cũng như kéo dài thời gian bảo quản thực phẩm.', 28000000, 0, 'RB30N4170BY.jpg', 'cái', 1, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(35, 'Tủ lạnh Toshiba Inverter 513 lít GR-RS682WE-PMV(06)-MG', 2, 'Thiết kế sang trọng, bảng điều khiển cảm ứng hiện đại bên ngoài\r\nToshiba Inverter 513 lít GR-RS682WE-PMV(06)-MG thuộc mẫu tủ lạnh side by side, gam màu đen tinh tế, cùng với bảng điều khiển cảm ứng hiện đại được thiết kế bên ngoài, ắt hẳn sẽ trở thành nội thất sang trọng cho không gian nhà bạn.\r\nTiết kiệm điện hiệu quả với công nghệ Origin Inverter\r\nNhờ có công nghệ Origin Inverter, tủ lạnh Toshiba này mang lại hiệu quả tiết kiệm điện tối ưu khi có khả năng sử dụng đồng thời máy nén Inverter lẫn quạt Inverter, nhằm duy trì được hơi lạnh lý tưởng, phù hợp với khối lượng thực phẩm bên trong tủ lạnh.', 32000000, 30000000, 'RS682WE.jpg', 'cái', 1, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(36, 'Tủ lạnh Samsung Inverter 236 lít RT22M4032BU/SV', 2, 'Bảo quản thịt cá tươi ngon, ăn trong ngày không cần rã đông ngăn đông mềm Optimal Fresh Zone -1 độ C\r\nTủ lạnh Samsung Inverter 236 lít RT22M4032BU/SV được hãng trang bị ngăn đông mềm Optimal Fresh Zone -1 độ C, có khả năng bảo quản thịt cá trong ngày mà vẫn giữ được độ tươi ngon và hương vị, đồng thời không cần phải rã đông thực phẩm trước khi chế biến so với ngăn đông thông thường.\r\n\r\nTuy nhiên, bạn vẫn nên sử dụng ngăn đông để bảo quản thịt cá khi có nhu cầu muốn bảo quản lâu hơn.', 32000000, 30000000, 'RT22M4032BU.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(37, 'Máy giặt Panasonic Inverter 10.5 Kg NA-FD10AR1BV', 3, 'Giặt sạch các vết bẩn cứng đầu dễ dàng với công nghệ giặt Stainmaster\r\nMáy giặt Panasonic Inverter 10.5 Kg NA-FD10AR1BV sở hữu công nghệ giặt Stainmaster, giúp giặt sạch các vér bẩn cứng đầu và tăng cường hiệu quả giặt sạch quần áo tốt hơn.\r\n\r\nNâng cao hiệu quả giặt sạch cùng xoáy nước Water Bazooka với TD inverter\r\nNhờ công nghệ TD Inverter cải tiến của hãng Panasonic, máy giặt này có thể tạo ra luồng xoáy nước mạnh mẽ Water Bazooka làm đánh bay vết bẩn cứng đầu một cách dễ dàng, bên cạnh yếu tố vận hành êm ái và khả năng tiết kiệm điện đến 30%.', 32000000, 30000000, 'FD10AR1BV.jpg', 'cái', 1, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(38, 'Máy giặt LG Inverter 11 kg TH2111DSAB', 3, 'Tiết kiệm điện, vận hành êm và bền bỉ nhờ động cơ Inverter dẫn động trực tiếp\r\nMáy giặt LG truyền động trực tiếp được trang bị động cơ ngay dưới lồng giặt nên sẽ giúp máy tiêu tốn ít điện năng hơn, hạn chế rung lắc và vận hành êm hơn so với các máy giặt truyền động gián tiếp. Ngoài ra, máy cũng trang bị công nghệ Inverter, gia tăng khả năng tiết kiệm điện và vận hành bền bỉ.', 350, 330, 'TH2111DSAB.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(39, 'Máy giặt Samsung Addwash Inverter 9 kg WW90K54E0UX/SV', 3, 'Thiết kế sang trọng hiện đại với cửa trước tiện lợi\r\nMáy giặt Samsung Addwash Inverter 9 kg WW90K54E0UX/SV được khoát lên tông màu đen xám mạnh mẽ, sang trọng. Thiết kế hiện đại với cửa trước trong suốt trang nhã, lồng ngang khiến bạn tiện lợi và dễ dàng hơn trong quá trình sử dụng.', 350, 330, 'WW90K54E0UX.jpg', 'cái', 2, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(40, 'Máy giặt Toshiba 10 kg AW-G1100GV WB', 3, 'Mời bạn tham khảo sản phẩm AW-G1000GV WB cùng dòng, cùng tính năng với AW-G1100GV WB để hiểu rõ hơn về sản phẩm:\r\nMáy giặt cửa trên quen thuộc với người tiêu dùng Việt Nam\r\nMáy giặt Toshiba 10 kg AW-G1100GV WB đến từ thương hiệu Toshiba có thiết kế cửa trên đơn giản, quen thuộc, đi cùng bảng điều khiển hỗ trợ tiếng Việt, máy giặt giúp bạn dễ dàng thao tác và sử dụng.\r\n\r\nSở hữu khối lượng giặt 10kg, máy giặt Toshiba AW-G1100GV WB sẽ đáp ứng hoàn hảo cho nhu cầu giặt giũ của gia đình đông thành viên (5 - 7 người).', 350, 330, 'G1100GV.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(41, 'Máy lạnh Sharp Inverter 2 HP AH-X18XEW', 4, 'Thiết kế tinh tế cùng với công suất lớn 2 HP\r\nMáy lạnh Sharp Inverter 2 HP AH-X18XEW sở hữu những đường nét thiết kế mạnh mẽ và tông màu trắng sang trọng phù hợp với nhiều phong cách nội thất khác nhau, đi kèm với đó là công suất lớn 2 HP phù hợp với những căn phòng có diện tích từ 20 - 30 m2 như: phòng khách, phòng họp, phòng ngủ lớn.', 350, 330, 'X18XEW.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(42, 'Máy lạnh Panasonic Inverter 2 HP CU/CS-PU18WKH-8M', 4, 'Thông số kỹ thuật Máy lạnh Panasonic Inverter 2 HP CU/CS-PU18WKH-8M\r\nBầu không khí trong lành, sạch bụi bẩn, bụi mịn PM2.5 cùng công nghệ Nanoe-G\r\nNanoe-G giải phóng các ion âm xung quanh máy lạnh. Các ion này sẽ gắn kết với các hạt bụi theo dòng không khí vào trong ống nạp khí của máy lạnh. Sau đó, các hạt bụi tích điện âm này bị màng lọc tích điện dương giữ lại và vô hiệu hóa tại màng lọc, giúp không khí sạch bụi bẩn, bụi mịn PM2.5, đảm bảo an toàn sức khoẻ cho gia đình bạn.\r\n\r\nNgoài ra, bạn có thể sử dụng chức năng này độc lập với hệ thống làm lạnh, cho phép sử dụng chiếc máy lạnh Panasonic Inverter này như một chiếc máy lọc khí thực thụ.', 150, 130, 'PU18WKH.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(43, 'Quạt điều hòa Delites BR-A12', 5, 'Quạt điều hòa Delites tặng kèm 2 viên đá khô, giảm nhiệt độ hiệu quả làm mát tăng cao\r\n\r\nĐá khô được sử dụng trong quạt điều hòa, để làm mát không khí, giúp quạt tạo ra làn không khí mát lạnh hơn nhiều so với bình thường. Tuy nhiên, chỉ sử dụng đá khô cho các dòng quạt có tính năng dùng đá khô và không được lạm dụng nó vì quạt mang hơi nước, ẩm sẽ không tốt cho sức khỏe.\r\n\r\nXem thêm: Đá khô là gì? Công dụng của đá khô trong cuộc sống hằng ngày\r\n\r\nCông suất lớn 125 W sử dụng hiệu quả cho diện tích phòng\r\n20 - 35 m2\r\nVới lưu lượng gió 5000 m3/h tạo hơi nước làm mát không gian lớn ở nơi công cộng như nhà ăn, căn tin.. làm mát nhanh và liên tục trong suốt ngày oi bức. Tuy nhiên thì công suất lớn nên sẽ tiêu tốn điện năng nhiều hơn.', 120, 0, 'DelitesBR-A12.jpg', 'cái', 1, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(44, 'Quạt điều hòa Honeywell ES800', 5, 'Quạt điều hòa Honeywell ES800 (hay còn gọi là máy làm mát không khí) thiết kế đẹp, kết cấu chắc chắn, có bánh xe ở bên dưới thân máy.\r\n\r\nGiúp người dùng di chuyển quạt điều hòa (hay còn gọi là máy làm mát không khí) an toàn, nhanh chóng.', 120, 0, 'ES800.jpg', 'cái', 2, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(45, 'Quạt điều hòa Honeywell CL20AE', 5, 'Quạt điều hòa Honeywell (hay còn gọi là quạt hơi nước) với công suất 230 W, làm mát không gian rộng lớn diện tích đến 25 đến 30 m2.\r\nĐộ ồn 40 - 60 dB tương ứng với tiếng thì thầm, văn phòng làm việc, sảnh yên tỉnh khách sạn. Không gây quá ồn ào khi vận hành quạt', 120, 0, 'CL20AE.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(46, 'Điện thoại Xiaomi Redmi 9 (4GB/64GB)', 6, 'Xiaomi tiếp tục ra mắt Redmi 9, phiên bản kế nhiệm Redmi 8 “lột xác” với diện mạo tươi mới trẻ trung, cấu hình mạnh hơn cùng một viên pin siêu “trâu”, mẫu smartphone này hứa hẹn sẽ là lựa chọn hấp dẫn phân khúc giá rẻ.\r\nNâng cấp gấp đôi với 4 camera sau\r\nNếu như “người anh” Redmi 8 chỉ trang bị cụm camera kép, thì đến Redmi 9 số lượng camera đã tăng lên gấp đôi, để bạn tha hồ chụp những kiểu ảnh ưa thích với 4 camera sau bao gồm: camera chính 13 MP, camera góc siêu rộng 8 MP, camera macro 5 MP và cảm biến đo độ sâu 2 MP.', 120, 0, 'redmi9.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(47, 'Galxy A51', 6, 'Samsung Galaxy A51 8GB/128GB là phiên bản cao cấp vừa mới được Samsung giới thiệu tại thị trường Việt Nam. Chiếc điện thoại gây ấn tượng với thiết kế màn hình tràn viền thế hệ mới, hiệu năng tốt cùng cụm camera chất lượng cao, và theo Strategy Analytics, máy là Smartphone Android Bán Chạy Nhất Thế Giới Quý 1/2020.\r\nMàn hình vô cực kích thước lớn\r\nSamsung A51 được trang bị màn hình Super AMOLED được thiết kế \"đục lỗ\" tràn viền đặc trưng trên các dòng sản phẩm cao cấp của Samsung giúp tối ưu diện tích màn hình nhưng vẫn giữ nguyên kích thước tổng thể của máy.', 140000, 0, 'A51.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(48, 'Surface Studio 2018', 7, 'Dive in with Intel® Core™ i7-7820HQ processors, SSD storage for faster file handling, and more graphics memory to handle your workflow and support better gaming, mixed reality, and VR.', 940, 824, 'st2018.jpg', 'cái', 2, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(49, 'DJI Phantom 4 PRO Professional Drone', 7, 'An uprated camera is equipped with a 1-inch 20-megapixel sensor capable of shooting 4K/60fps video and Burst Mode stills at 14 fps.\r\n\r\nThe adoption of titanium alloy and magnesium alloy construction increases the rigidity of the airframe and reduces weight, making the Phantom 4 Pro similar in weight to the Phantom 4. The FlightAutonomy system adds dual rear vision sensors and infrared sensing systems for a total of 5-direction of obstacle sensing and 4-direction of obstacle avoidance.', 1849, 1849, 'phantom4pro.jpg', 'cái', 0, '2020-10-13 02:20:00', '2020-10-19 03:20:00'),
(50, 'Galaxy S9', 7, 'Siêu phẩm Samsung Galaxy S9 chính thức ra mắt mang theo hàng loạt cải tiến, tính năng cao cấp như camera thay đổi khẩu độ, quay phim siêu chậm 960 fps, AR Emoji... nhanh chóng gây sốt làng công nghệ.\r\nThiết kế cao cấp, sang trọng\r\nChiếc điện thoại Samsung mới này vẫn đi theo triết lí thiết kế tương tự như Galaxy S8 với khung viền kim loại cứng cáp cùng mặt lưng kính bóng bẩy bo cong mềm mại. Đặc biệt, phần khung viền của Galaxy S9 được hoàn thiện bằng kim loại nhám giúp cầm nắm chắc tay tốt hơn hẳn, chứ không bóng loáng như thời S8.', 1209, 1209, 's9.png', 'cái', 2, '2020-10-13 02:20:00', '2020-10-19 03:20:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', '1_1.jpg'),
(2, '', '1_2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

DROP TABLE IF EXISTS `type_products`;
CREATE TABLE IF NOT EXISTS `type_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Tivi', 'Với sứ mệnh duy trì danh tiếng trong việc mang lại nhiều giá trị gia tăng cho cuộc sống khách hàng, những dòng tivi đã liên tục cho ra đời những dòng sản phẩm tiên tiến đáp ứng mọi nhu cầu của người dùng.', 'tivi.jpg', '2020-12-01 09:29:54', '2020-12-03 09:29:54'),
(2, 'Tủ lạnh', 'Thị trường tủ lạnh ở Việt nam hiện nay rất sôi động. Những thương hiệu tủ lạnh lớn đều đã có mặt tại Việt Nam như Mitsubishi, Hitachi, Samsung, Sanyo, LG, Panasonic…với các sản phẩm đa dạng cả về mẫu mã và giá cả. Bài viết sau đây sẽ giúp cho bạn có cái nhìn tổng quan nhất về các thương hiệu tủ lạnh tại Việt Nam.', 'tulanh.jpg', '2020-10-12 02:16:15', '2020-10-13 01:38:35'),
(3, 'Máy giặt', 'Hiện nay tại Việt Nam có khoảng 20 hãng điện tử cạnh tranh nhau về sản phẩm máy giặt, DienmayXANH.com giới thiệu đến người dùng những thương hiệu máy giặt nổi tiếng tại Việt Nam sau đây', 'maygiat.jpg', '2020-10-18 00:33:33', '2020-10-15 07:25:27'),
(4, 'Máy lạnh', 'Trên thị trường Việt Nam, tồn tại nhiều loại điều hòa không khí khác nhau và mỗi hãng đều quảng cáo thế mạnh riêng của mình, vậy hãy đọc bài viết để là người dùng thông thái khi chọn mua điều hòa cho gia đình bạn.', 'maylanh.jpg', '2020-10-26 03:29:19', '2020-10-26 02:22:22'),
(5, 'Quạt điều hòa', 'Quạt điều hòa là thiết bị làm mát bằng hơi nước, có thể tỏa hơi nước làm giảm nhiệt độ phòng, lọc sạch không khí bằng ion âm mang đến nguồn gió mát tự nhiên, sạch khuẩn, an toàn cho sức khỏe người sử dụng.', 'quatdieuhoa.jpg', '2020-10-28 04:00:00', '2020-10-27 04:00:23'),
(6, 'Điện thoại', 'Điện thoại thông minh hay smartphone (tiếng Anh: smartphone) là khái niệm để chỉ loại điện thoại di động tích hợp một nền tảng hệ điều hành di động với nhiều tính năng hỗ trợ tiên tiến về điện toán và có khả năng kết nối với nhiều thiết bị điện tử hiện đại như TV thông minh, máy tính, robot, nhà thông minh hoặc trí thông minh nhân tạo, dựa trên nền tảng cơ bản của điện thoại di động thông thường (điện thoại phổ thông) (tiếng Anh: feature phone).[1][2][3]\r\n\r\nKhái niệm smartphone ra mắt từ những năm 2003–2005. Ban đầu điện thoại thông minh bao gồm các tính năng của điện thoại di động thông thường kết hợp với các thiết bị phổ biến khác như PDA, thiết bị điện tử cầm tay, máy ảnh kỹ thuật số, hệ thống định vị toàn cầu. Điện thoại thông minh hiện đại ngày nay bao gồm hầu như tất cả chức năng của laptop, máy tính như trình duyệt web, Wi-Fi, đồ họa, văn phòng, video game, chụp ảnh, quay phim, video call, định vị toàn cầu, trợ lý ảo, các ứng dụng bên thứ ba trên Kho ứng dụng di động và các phụ kiện đi kèm cho máy. Thậm chí một số smartphone cao cấp còn đóng vai trò như một món đồ trang sức đắt tiền, tô điểm cho người chủ.', 'dienthoai.jpg', '2020-10-25 17:19:00', '2020-12-03 09:30:11'),
(7, 'Laptop', 'Phân phối nhiều dòng máy laptop , máy tính để bàn, các linh kiện, phụ kiện, kỹ thuật số, camera, … của nhiều hãng nổi tiếng trên thế giới như Acer, HP, Samsung, Asus, LG, CorlorFul, TEAM, Motospeed…', 'laptop.jpg', '2020-10-25 17:19:00', '2020-12-02 09:32:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(6, 'Hương Hương', 'huonghuong08.php@gmail.com', '$2y$10$rGY4KT6ZSMmLnxIbmTXrsu2xdgRxm8x0UTwCyYCAzrJ320kYheSRq', '23456789', 'Hoàng Diệu 2', NULL, '2017-03-23 07:17:33', '2017-03-23 07:17:33', NULL),
(8, 'Phan Xuân Chiến', 'ngoisaoxau98@gmail.com', '$2y$10$d5s2gxhhUCQqiGrRqxrwH.XV2rvZXubNHCn4tfS.y9UPiMURwfKn2', '0374463636', '559 Trường Chinh', NULL, '2020-12-29 05:15:52', '2020-12-29 05:15:52', NULL),
(9, 'Admin', 'admin@gmail.com', '$2y$10$CBXxi4KKqfNYTXw7YI.Uuu4IuFb.jxw5b.qPEZbmysPRvMCGjxVBe', '0374464646', '559 Trường Chinh', NULL, '2021-01-03 05:56:17', '2021-01-03 05:56:17', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_admin`
--

DROP TABLE IF EXISTS `user_admin`;
CREATE TABLE IF NOT EXISTS `user_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` bit(1) NOT NULL,
  `created_ad` timestamp NOT NULL,
  `updated_ad` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_admin`
--

INSERT INTO `user_admin` (`id`, `user_admin`, `password`, `active`, `created_ad`, `updated_ad`) VALUES
(1, 'ngoisaoxau98@gmail.com', '$2y$10$d5s2gxhhUCQqiGrRqxrwH.XV2rvZXubNHCn4tfS.y9UPiMURwfKn2', b'1', '2020-12-11 17:00:00', '2020-12-11 17:00:00');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
