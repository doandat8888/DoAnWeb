-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 09:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doanweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `cus_firstName` varchar(50) NOT NULL,
  `cus_lastName` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `total` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `cus_firstName`, `cus_lastName`, `email`, `phoneNumber`, `total`, `address`, `status`) VALUES
(1, 'Trần', 'Thị Hoa', 'hoatran@gmail.com', '0922355489', '2.940.000đ', '113/84/81 An Dương Vương, p.An Lạc, q.Bình Tân', 1),
(2, 'Trần', 'Thị Hoa', 'hoatran@gmail.com', '0983115869', '4.990.000đ', '113/84/81 An Dương Vương, p.An Lạc, q.Bình Tân', 1),
(3, 'Lê', 'Thị Cẩm Hà', 'halethicam@gmail.com', '0933255899', '2.360.000đ', '15 đường số 10, KDC An Khang, q.Bình Chánh, TP.HCM', 1),
(4, 'Lê', 'Thị Cẩm Hà', 'lethicamha@gmail.com', '0933255899', '1.580.000đ', '15 đường số 10, KDC An Khang, q.Bình Chánh, TP.HCM', 1),
(5, 'Lê', 'Thị Cẩm Hà', 'halethicam@gmail.com', '0933255899', '1.580.000đ', '15 đường số 10, KDC An Khang, q.Bình Chánh, TP.HCM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'Đầm dạ hội', 1),
(2, 'Áo Set', 1),
(3, 'Áo Thun', 1),
(4, 'Áo Polo', 1),
(5, 'Áo Ngắn Tay', 1),
(6, 'Quần Sooc', 1),
(7, 'Áo Sơmi', 1),
(8, 'Đầm Thun', 1),
(11, 'Đầm Sooc Ngắn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_bill`
--

CREATE TABLE `detail_bill` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_bill`
--

INSERT INTO `detail_bill` (`id`, `bill_id`, `product_name`, `product_quantity`, `product_color`, `product_size`, `product_price`, `status`) VALUES
(10, 1, 'Đầm ôm cánh tiên', 2, 'green', 'XL ', 780000, 1),
(11, 1, 'Đầm thỏ Cut-Out', 2, 'pink', 'XL ', 680000, 1),
(12, 2, 'Áo sơmi Denim', 3, 'red', 'XL ', 750000, 1),
(13, 2, 'Đầm thỏ Cut-Out', 4, 'yellow', 'XL ', 680000, 1),
(14, 3, 'Đầm ôm cánh tiên', 3, 'green', 'XL ', 780000, 1),
(15, 4, 'Đầm ôm cánh tiên', 2, 'green', 'XL ', 780000, 1),
(16, 5, 'Đầm ôm cánh tiên', 2, 'green', 'XL ', 780000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image01` varchar(255) NOT NULL,
  `image02` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `color`, `size`, `price`, `quantity`, `type`, `description`, `category_id`, `image01`, `image02`, `status`) VALUES
(1, 'Đầm lụa cố đô ', 'blue, white', 's, m, l', 800000, 100, 1, 'Thiết kế đơn giản với phần cổ đổ đầy quyến rũ của nàng. Thân váy ôm nhẹ ngực, eo tạo dáng hình cong hoàn hảo. Diện mẫu đầm này nàng sẽ trở thành quý cô sành điệu trong mọi buổi tiệc, cũng như nổi bật hơn trong mọi cuộc gặp gỡ đấy.', 1, '../../src/img/products/women/product-women-1-1.jpg', '../../src/img/products/women/product-women-1-2.jpg', 1),
(2, 'Đầm lụa cách điệu phối nơ lệch', 'pink', 's, m', 950000, 120, 1, 'Áo kiểu dáng suông, cổ 3 phân, kết hợp thiết nơ lệch phần cổ, nút cài 1 bên vai. Chất liệu lụa trơn có độ bắt sáng tạo cảm giác mềm mại, sang chảnh.', 1, '../../src/img/products/women/product-women-2-1.jpg', '../../src/img/products/women/product-women-2-2.jpg', 1),
(3, 'Đầm ôm cánh tiên', 'blue, green, orange', 's, l, xl', 780000, 83, 1, 'Thiết kế đầm giúp nàng tôn lên vóc dáng đẹp của mình, phù hợp để nàng diện đến nhiều sự kiện khác nhau.', 1, '../../src/img/products/women/product-women-3-1.jpg', '../../src/img/products/women/product-women-3-2.jpg', 1),
(4, 'Đầm thỏ Cut-Out', 'pink, yellow', 's, l, xl', 680000, 92, 1, 'Đầm sơ mi dáng ôm, vai chờm có độn, cài bằng khuy kim loại phía trước.', 1, '../../src/img/products/women/product-women-4-1.jpg', '../../src/img/products/women/product-women-4-2.jpg', 1),
(5, 'Set Áo Blazer Và Quần Suông Dài', 'blue, pink', 's, l, xl', 1350000, 140, 1, 'Set Áo Balzer dáng ôm, vai chờm có độn, cài bằng khuy kim loại phía trước.', 2, '../../src/img/products/women/product-women-5-1.jpg', '../../src/img/products/women/product-women-5-2.jpg', 1),
(6, 'Đầm Cut-Out Đính Ngọc Trai', 'pink, orange', 's, l, xl', 950000, 110, 1, 'Đầm Cut-Out dáng ôm, vai chờm có độn, cài bằng khuy kim loại phía trước.', 1, '../../src/img/products/women/product-women-6-1.jpg', '../../src/img/products/women/product-women-6-2.jpg', 1),
(8, 'Set Áo Và Chân Váy Họa Tiết Kẻ', 'blue, pink', 's, l, xl', 750000, 120, 1, 'Set Áo Và Chân Váy dáng ôm, vai chờm có độn, cài bằng khuy kim loại phía trước.', 2, '../../src/img/products/women/product-women-7-1.jpg', '../../src/img/products/women/product-women-7-2.jpg', 1),
(9, 'Đầm Thỏ Dáng Baloon', 'orange, yellow', 's, l, xl', 1450000, 130, 1, 'Đầm Thỏ Dáng Baloon dáng ôm, vai chờm có độn, cài bằng khuy kim loại phía trước.', 8, '../../src/img/products/women/product-women-8-1.jpg', '../../src/img/products/women/product-women-8-2.jpg', 1),
(10, 'Áo sơmi Denim', 'blue, black, red', 's, m, l, xl', 750000, 91, 0, 'Sơ mi nam tay ngắn. Trên nền vải denim được đánh bạc màu giả. Phía trước có túi ngực. Ống tay gập gấu khoảng 2-3cm. Khuy cài cùng màu với nền vải.', 7, '../../src/img/products/men/product-men-1-1.jpg', '../../src/img/products/men/product-men-1-2.jpg', 1),
(11, 'Áo thun nam cổ tròn', 'blue', 's, l, xl', 550000, 100, 0, 'Áo thun cổ tròn viền bằng thun gân co giãn. Tay áo ngắn. Dáng áo xuông. In hình và chữ IVY men 1 bên ngực. Từ vai xuống có 2 đường vải nổi tạo điểm nhấn', 3, '../../src/img/products/men/product-men-2-1.jpg', '../../src/img/products/men/product-men-2-2.jpg', 1),
(12, 'Áo thun nam Emotion', 'blue, red, orange', 'm, l, xl', 590000, 100, 0, 'Áo thun nam cổ tròn, tay ngắn. Dáng xuông. Thêu chữ Emotion mặt trước. ', 7, '../../src/img/products/men/product-men-3-1.jpg', '../../src/img/products/men/product-men-3-2.jpg', 1),
(13, 'Áo Polo nam kẻ ngang', 'white, blue', 's, l, xxl', 690000, 120, 0, 'Được ra đời vào những năm 60, là chiếc áo được dùng trong thể thao “hockey trên lưng ngựa” hay còn gọi là Polo. Và sau này đến năm 1920, nhà thiết kế René Lacoste biến tấu những chiếc áo polo dài tay thành những chiếc polo ngắn tay, và những chiếc áo polo đã sớm trở thành một trong những mẫu áo “kinh điển” luôn hiện diện trong tủ đồ của những quý ông hiện đại – Những chiếc áo polo mang dáng vẻ lịch sự nhưng vẫn vô cùng năng động, cuốn hút.', 4, '../../src/img/products/men/product-men-4-1.jpg', '../../src/img/products/men/product-men-4-2.jpg', 1),
(14, 'Áo Polo sọc kẻ ngang', 'black, red', 's, l, xl', 750000, 100, 0, 'Áo Polo sọc kẻ ngang viền bằng thun gân co giãn. Tay áo ngắn. Dáng áo xuông. In hình và chữ IVY men 1 bên ngực. Từ vai xuống có 2 đường vải nổi tạo điểm nhấn', 4, '../../src/img/products/men/product-men-5-1.jpg', '../../src/img/products/men/product-men-5-2.jpg', 1),
(15, 'Áo Polo nam đen kẻ ngang', 'black', 's, l, xl', 790000, 120, 0, 'Chất liệu vải pique dệt - cotton sợi dệt mặt lưới, tạo ra được độ mềm và thoáng cho những người ưa vận động hay chơi thể thao, độ thấm hút mồ hôi tốt và có khả năng co giãn 4 chiều, đem đến cảm giác vô cùng thoải mái, dễ chịu khi sử dụng.', 3, '../../src/img/products/men/product-men-6-1.jpg', '../../src/img/products/men/product-men-6-2.jpg', 1),
(16, 'Áo thun nam họa tiết', 'black, white', 's, l, xl', 340000, 90, 0, 'Áo thun họa tiết cổ tròn, tay ngắn. Viền bằng màu trơn tạo điểm nhấn. Dáng áo xuông, bên ngoài lớp in họa tiết trên nền chất thun co giãn.', 3, '../../src/img/products/men/product-men-7-1.jpg', '../../src/img/products/men/product-men-7-2.jpg', 1),
(17, 'Áo Polo phối kẻ', 'black', 's, l, xl', 790000, 120, 0, 'Chất vải thun cùng form áo tay ngắn dễ mặc sẽ mang lại cho người mặc cảm giác thoải mái, mát mẻ.', 4, '../../src/img/products/men/product-men-8-1.jpg', '../../src/img/products/men/product-men-8-2.jpg', 1),
(18, 'Áo ngắn tay họa tiết', 'orange', 's, m, xl', 420000, 80, 2, 'Áo sơ mi cổ đức có hàng khuy trước ngực. Tay ngắn. Vải họa tiết con vật và hình bắt mắt.', 5, '../../src/img/products/kid/product-kid-1-1.jpg', '../../src/img/products/kid/product-kid-1-2.jpg', 1),
(19, 'Quần Sooc phối màu', 'white, black', 's, l, xl', 290000, 90, 2, 'Quần sooc cạp chun co giãn có dây kéo rút. Dài ngang đùi, có 2 túi có nắp 2 bên. Vải thun co giãn nhẹ.', 6, '../../src/img/products/kid/product-kid-2-1.jpg', '../../src/img/products/kid/product-kid-2-2.jpg', 1),
(20, 'Áo sơ mi họa tiết lá', 'green, blue', 's, xl, xxl', 420000, 40, 2, 'Áo sơ mi kẻ thiết kế dáng cổ đức, ngắn tay, dáng suông cơ bản. Chất liệu thô nhẹ, mặt vải thấm mồ hôi nhanh và cực tốt. Giúp bé thoải mái khi đến trường. Điểm nhấn in họa tiết vô cùng ngộ nghĩnh.', 7, '../../src/img/products/kid/product-kid-3-1.jpg', '../../src/img/products/kid/product-kid-3-2.jpg', 1),
(21, 'Áo thun polo máy ảnh', 'gray, blue', 's, l, xl', 320000, 50, 2, 'Áo thun bé trai cổ đức, cộc tay. Có 2 khuy cài trước ngực. Xẻ hai bên tà. In hình 1 bên ngực.', 3, '../../src/img/products/kid/product-kid-4-1.jpg', '../../src/img/products/kid/product-kid-4-2.jpg', 1),
(22, 'Set áo 2 dây và quần phối bèo', 'yellow, gray', 's, xl, xxl', 760000, 100, 2, 'Áo 2 dây bản to, thiết kế áo viền chun tạo độ xòe nhẹ. Quần cạp chun dáng ngắn. Chất liệu linen thoáng mát cùng màu sắc đáng yêu và chi tiết bèo nhúm tạo điềm nhấn.', 2, '../../src/img/products/kid/product-kid-5-1.jpg', '../../src/img/products/kid/product-kid-5-2.jpg', 1),
(23, 'Áo thun polo Ivy Kids', 'yellow', 's, m, xl', 320000, 120, 2, 'Áo polo cổ đức có 2 khuy cài. Tay ngắn bo gấu. Bên ngực trái thêu logo IVY. Áo chất liệu thun thoáng mát, màu sắc tươi sáng.', 3, '../../src/img/products/kid/product-kid-6-1.jpg', '../../src/img/products/kid/product-kid-6-2.jpg', 1),
(24, 'Áo sơ mi tay dài Ivy Kids', 'black, white, green', 's, m, xl', 220000, 100, 2, 'Áo sơ mi tay dài cổ đức có hàng khuy trước ngực. Tay ngắn có gấu. Đáp 1 khuy vuông 1 bên ngực. Vải in hiệu ứng kẻ sọc và họa tiết.', 7, '../../src/img/products/kid/product-kid-7-1.jpg', '../../src/img/products/kid/product-kid-7-2.jpg', 1),
(25, 'Đầm Babydoll vai phối bèo', 'white, gray', 's, l, xxl', 799000, 120, 2, 'Thiết kế đầm babydoll vải thô mềm mại, họa tiết quả dâu dễ thương dành cho bé gái. Đầm sát nách, cầu vai được phối bèo xinh trên. Dáng đầm xòe tự nhiên, được xếp tầng. ', 8, '../../src/img/products/kid/product-kid-8-1.jpg', '../../src/img/products/kid/product-kid-8-2.jpg', 1),
(26, 'Set Áo Tweed phối nơ và chân váy', 'black, gray', 's, m, l', 1750000, 120, 1, 'Áo khoác tay lỡ phòng nhẹ, cổ tròn phối dây thắt nơ, cài bằng khóa ẩn bên trong', 2, '../../src/img/products/women/product-women-11-1.jpg', '../../src/img/products/women/product-women-11-2.jpg', 1),
(27, 'Đầm xếp ly 2 lớp', 'brown, black', 's, m, xl', 1250000, 120, 1, 'Chân váy xếp ly dáng ngắn, cạp cao, đắp vạt 1 bên tạo kiểu', 8, '../../src/img/products/women/product-women-12-1.jpg', '../../src/img/products/women/product-women-12-2.jpg', 1),
(28, 'Áo Polo Kẻ Ngang', 'yellow, gray', 's, l, xl', 750000, 140, 0, 'Áo Polo dáng regular fit. Phần tay áo được bo viền. Thiết kế cổ áo phối vải khác chất liệu cùng hàng 3 khuy cài. Ngực phải in logo METAGENT', 4, '../../src/img/products/men/product-men-12-1.jpg', '../../src/img/products/men/product-men-12-2.jpg', 1),
(29, 'Đầm Cut-out Sooc và quần suông dài', 'pink, black', 's, xl, xxl', 450000, 100, 0, 'Đầm Cut-Out Sooc và quần suông dài', 1, '../../src/img/products/women/product-women-9-1.jpg', '../../src/img/products/women/product-women-9-2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `status`) VALUES
(0, 'Nam', 1),
(1, 'Nữ', 1),
(2, 'Trẻ em', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `gender` varchar(3) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `role` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstName`, `lastName`, `email`, `phoneNumber`, `gender`, `image`, `role`) VALUES
(3, 'doantranbadat', 'fa29c0a3c9e73f871cd841c47654b65a', 'Đoàn Trần Bá', 'Đạt', 'badatdoan@gmail.com', '0977420748', 'Nam', '../../src/img/admin/admin1.jpg', 'R2'),
(4, 'trantienphat', '1e72671bd67e530f571e7a9438cb7710', 'Trần Tiến', 'Phát', 'phattran@gmail.com', '0933255899', 'Nam', NULL, 'R1'),
(5, 'doantranquocviet', 'eb55ee14a52a057619747546d03beacc', 'Đoàn Trần Quốc', 'Việt', 'vietdoan@gmail.com', '0963555879', 'Nam', NULL, 'R1'),
(6, 'tranthihoa', '8fb6ad556437ac90195a417927abdf5c', 'Trần Thị', 'Hoa', 'kimhoabbt@gmail.com', '0933255479', 'Nữ', NULL, 'R1'),
(7, 'nguyenthibichkieu', 'a1527fb5f9fd8288a187c7f287cbed01', 'Nguyễn Thị Bích', 'Kiều', 'kieunguyen@gmail.com', '0933555899', 'Nữ', '../../src/img/admin/admin3.jpg', 'R2'),
(8, 'quachlenhatquang', '20b47b63787af01f7b09fce7438ddb67', 'Quách Lê Nhật', 'Quang', 'quachquang@gmail.com', '0943533899', 'Nam', '../../src/img/admin/admin4.jpg', 'R2'),
(9, 'nguyenphuongduy', '49a659f5e92241a47d9e5760485fdc0d', 'Nguyễn Phương', 'Duy', 'phuongduynhatnheo@gmail.com', '0933255869', 'Nam', NULL, 'R1'),
(10, 'sangnguyen2205', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn ', 'Sáng', 'sangnguyen@gmail.com', '0922355488', 'Nam', NULL, 'R1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `detail_bill_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`type`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
