-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 20, 2018 lúc 07:44 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlkh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quyen` int(1) NOT NULL,
  `ten` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`, `quyen`, `ten`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 'Le Viet'),
(2, 'ktdung', '687d4417e4d26abec1902037e94cdc4b', 1, 'KT Dũng'),
(3, 'a123', 'e10adc3949ba59abbe56e057f20f883e', 1, 'abc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `MaGV` int(11) UNSIGNED NOT NULL,
  `TenGV` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`MaGV`, `TenGV`, `NgaySinh`, `DiaChi`, `image`) VALUES
(1, 'kieu tuan dung', '1986-11-21', 'bac ninh', 'wallup-54956.jpg'),
(2, 'tran manh tuan', '1983-12-12', 'ha noi', 'thaytuan_1.jpg'),
(5, 'Đặng Thu Hiền', '2018-08-01', 'HN', '1_2.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocviênxs`
--

CREATE TABLE `hocviênxs` (
  `MãHV` varchar(30) NOT NULL,
  `TênHV` varchar(30) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hocviênxs`
--

INSERT INTO `hocviênxs` (`MãHV`, `TênHV`, `NgaySinh`, `DiaChi`) VALUES
('hv1', 'le quoc viet', '1996-07-09', 'thai thinh '),
('hv2', 'nguyen van nguyen', '1996-10-22', 'bac ninh'),
('hv3', 'le nam hung', '1996-10-10', 'ha noi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `MaKH` int(20) UNSIGNED NOT NULL,
  `NgayKT` date NOT NULL,
  `idMH` int(20) UNSIGNED NOT NULL,
  `NgayBD` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`MaKH`, `NgayKT`, `idMH`, `NgayBD`) VALUES
(12, '2018-08-24', 1, '2018-08-01'),
(13, '2018-08-31', 2, '2018-08-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `MaLH` varchar(30) NOT NULL,
  `TenLH` varchar(30) NOT NULL,
  `MaKH` varchar(30) NOT NULL,
  `MaGV` varchar(30) NOT NULL,
  `SiSo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`MaLH`, `TenLH`, `MaKH`, `MaGV`, `SiSo`) VALUES
('lh1', 'LUYEN THI IELTS', 'kh1', 'gv1', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `id` int(20) UNSIGNED NOT NULL,
  `tenMH` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`id`, `tenMH`) VALUES
(1, 'cong nghe web'),
(2, 'tri tue nhan tao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id` int(20) UNSIGNED NOT NULL,
  `tenSV` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`id`, `tenSV`, `diachi`, `sdt`) VALUES
(4, 'Viet', 'HN', '0966293792'),
(5, 'Nga', 'BN', '096879323');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) UNSIGNED NOT NULL,
  `tieude` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL,
  `status` int(1) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `tieude`, `noidung`, `image`, `ngaydang`, `status`, `iduser`) VALUES
(1, 'học1', '<p>abc</p>\r\n', 'art_ruin_yndi_girl_white_background_camera_95682_1920x1080.jpg', '2018-08-18', 1, 0),
(2, 'học123', '<p>abc</p>\r\n', '1.png', '2018-08-18', 1, 0),
(3, 'học123', '<p>abc</p>\r\n', '1.png', '2018-08-18', 0, 0),
(4, 'học123', '<p>abc</p>\r\n', '1.png', '2018-08-18', 0, 0),
(5, 'học123', '<p>abc</p>\r\n', '1.png', '2018-08-18', 0, 1),
(6, 'ahihi', '<p>ahihi ahehe</p>\r\n', '21_1.jpg', '2018-08-19', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`MaGV`);

--
-- Chỉ mục cho bảng `hocviênxs`
--
ALTER TABLE `hocviênxs`
  ADD PRIMARY KEY (`MãHV`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `idMH` (`idMH`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`MaLH`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `MaGV` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `MaKH` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD CONSTRAINT `khoahoc_ibfk_1` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
