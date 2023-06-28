-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 29, 2023 lúc 12:47 AM
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
-- Cơ sở dữ liệu: `quanlycayxang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cayxang`
--

CREATE TABLE `cayxang` (
  `Pk_CayxangID` int(11) NOT NULL,
  `sDiachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cayxang`
--

INSERT INTO `cayxang` (`Pk_CayxangID`, `sDiachi`) VALUES
(1, 'diachi1'),
(2, 'diachi2'),
(3, 'diachi3\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cayxang_nhienlieu`
--

CREATE TABLE `cayxang_nhienlieu` (
  `Pk_CayxangNhienlieuID` int(11) NOT NULL,
  `iNhienlieuID` int(11) DEFAULT NULL,
  `iCayxangID` int(11) DEFAULT NULL,
  `iSoluong` int(11) DEFAULT NULL,
  `isActive` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cayxang_nhienlieu`
--

INSERT INTO `cayxang_nhienlieu` (`Pk_CayxangNhienlieuID`, `iNhienlieuID`, `iCayxangID`, `iSoluong`, `isActive`) VALUES
(1, 1, 1, 11, b'1'),
(2, 1, 2, 11, b'0'),
(3, 1, 3, 12, b'1'),
(4, 2, 1, NULL, b'1'),
(5, 3, 1, 2, b'1'),
(6, 4, 2, 2, b'0'),
(7, 5, 3, 3, b'0'),
(8, 4, 3, 4, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `Pk_GiohangID` int(11) NOT NULL,
  `iTaikhoanID` varchar(255) DEFAULT NULL,
  `iDonhangID` int(11) DEFAULT NULL,
  `iCayxangNhienlieuID` int(11) DEFAULT NULL,
  `iSoluong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`Pk_GiohangID`, `iTaikhoanID`, `iDonhangID`, `iCayxangNhienlieuID`, `iSoluong`) VALUES
(8, 'khachhang', NULL, 7, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `Pk_HoadonID` int(11) NOT NULL,
  `sStatus` varchar(255) DEFAULT NULL,
  `sNote` varchar(255) DEFAULT NULL,
  `sPayment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhienlieu`
--

CREATE TABLE `nhienlieu` (
  `Pk_NhienlieuID` int(11) NOT NULL,
  `sLoai` varchar(255) DEFAULT NULL,
  `sTenNhienlieu` varchar(255) NOT NULL,
  `sDonvi` varchar(255) DEFAULT NULL,
  `fGia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhienlieu`
--

INSERT INTO `nhienlieu` (`Pk_NhienlieuID`, `sLoai`, `sTenNhienlieu`, `sDonvi`, `fGia`) VALUES
(1, 'xang', 'E92', 'lít', 10000),
(2, 'dau', 'DO 0,05S-II', 'lít', 20000),
(3, 'xang', 'E95', 'lít', 30000),
(4, 'nhot', 'nhớt 1', 'chai', 22),
(5, 'nhot', 'nhớt 2', 'chai', 33),
(6, 'xang', 'abc', 'lit', 22222);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Pk_TaikhoanID` varchar(255) NOT NULL,
  `sMatkhau` varchar(255) NOT NULL,
  `sQuyen` varchar(255) NOT NULL,
  `sHoten` varchar(255) NOT NULL,
  `sEmail` varchar(255) DEFAULT NULL,
  `sSDT` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`Pk_TaikhoanID`, `sMatkhau`, `sQuyen`, `sHoten`, `sEmail`, `sSDT`) VALUES
('admin', '123', 'admin', 'admin', NULL, NULL),
('khachhang', '123', 'khachhang', 'khachhang', 'khachhang@gmail.com', '0123'),
('khachhang1', '123', 'khachhang', 'khachhang1', 'khachhang1@gmail.com', '0123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cayxang`
--
ALTER TABLE `cayxang`
  ADD PRIMARY KEY (`Pk_CayxangID`);

--
-- Chỉ mục cho bảng `cayxang_nhienlieu`
--
ALTER TABLE `cayxang_nhienlieu`
  ADD PRIMARY KEY (`Pk_CayxangNhienlieuID`),
  ADD KEY `iNhienlieuID` (`iNhienlieuID`),
  ADD KEY `iCayxangID` (`iCayxangID`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`Pk_GiohangID`),
  ADD KEY `iTaikhoanID` (`iTaikhoanID`),
  ADD KEY `iDonhangID` (`iDonhangID`),
  ADD KEY `iCayxangNhienlieuID` (`iCayxangNhienlieuID`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`Pk_HoadonID`);

--
-- Chỉ mục cho bảng `nhienlieu`
--
ALTER TABLE `nhienlieu`
  ADD PRIMARY KEY (`Pk_NhienlieuID`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Pk_TaikhoanID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cayxang`
--
ALTER TABLE `cayxang`
  MODIFY `Pk_CayxangID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cayxang_nhienlieu`
--
ALTER TABLE `cayxang_nhienlieu`
  MODIFY `Pk_CayxangNhienlieuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `Pk_GiohangID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `Pk_HoadonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhienlieu`
--
ALTER TABLE `nhienlieu`
  MODIFY `Pk_NhienlieuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cayxang_nhienlieu`
--
ALTER TABLE `cayxang_nhienlieu`
  ADD CONSTRAINT `cayxang_nhienlieu_ibfk_1` FOREIGN KEY (`iNhienlieuID`) REFERENCES `nhienlieu` (`Pk_NhienlieuID`),
  ADD CONSTRAINT `cayxang_nhienlieu_ibfk_2` FOREIGN KEY (`iCayxangID`) REFERENCES `cayxang` (`Pk_CayxangID`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`iTaikhoanID`) REFERENCES `taikhoan` (`Pk_TaikhoanID`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`iDonhangID`) REFERENCES `hoadon` (`Pk_HoadonID`),
  ADD CONSTRAINT `giohang_ibfk_3` FOREIGN KEY (`iCayxangNhienlieuID`) REFERENCES `cayxang_nhienlieu` (`Pk_CayxangNhienlieuID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
