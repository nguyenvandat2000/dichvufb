-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2020 at 07:38 PM
-- Server version: 10.2.32-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eduvninf_tdl`
--

-- --------------------------------------------------------

--
-- Table structure for table `accchay`
--

CREATE TABLE `accchay` (
  `id` int(11) NOT NULL,
  `idfb` varchar(32) NOT NULL,
  `hoten` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acccheo`
--

CREATE TABLE `acccheo` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL,
  `session` text NOT NULL,
  `cookie` text NOT NULL,
  `idfb` varchar(32) NOT NULL,
  `picture` text NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `sub` varchar(32) NOT NULL,
  `datr` varchar(255) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(300) NOT NULL,
  `VND` varchar(32) NOT NULL,
  `toida` varchar(255) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `gmail` varchar(50) DEFAULT NULL,
  `sdt` varchar(32) DEFAULT NULL,
  `level` varchar(255) NOT NULL,
  `kichhoat` varchar(255) NOT NULL,
  `url` varchar(256) NOT NULL,
  `google_id` varchar(60) NOT NULL,
  `facebook_id` varchar(32) NOT NULL,
  `access_token` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `VND`, `toida`, `fullname`, `gmail`, `sdt`, `level`, `kichhoat`, `url`, `google_id`, `facebook_id`, `access_token`) VALUES
(32, 'thanhlongtran', '7c2b8212780266c6eee32275d48c0127', '0', '1', 'thanhlongtran', 'thuykieuhotboy123@gmail.com', '0397477281', 'member', 'Chưa kích hoạt', 'data/avata%20trong.jpeg', 'none', 'none', 'none'),
(31, 'Toolslike', '331f7ea21d4f01230eecb54468cfc44f', '0', '1', 'Ma', 'toolslike@gmail.com', '01696662736', 'member', 'Chưa kích hoạt', 'data/avata%20trong.jpeg', 'none', 'none', 'none'),
(30, 'xuantruong23', '7965d8c4c1b566b230040ddaf7c68803', '0', '1', 'Trần Xuân Trường', 'tranxuantruong420@gmail.com', '0967549478', 'member', 'Đã kích hoạt', 'data/avata%20trong.jpeg', 'none', 'none', 'none'),
(29, 'tonghoainam', '80258e9c7f91a7ecb304faf39c302ca8', '0', '1', 'tonghoainam', 'tongnamk3@gmail.com', '0399961213', 'member', 'Đã kích hoạt', 'data/9836d1e81ce3e0bdb9f2.jpg', 'none', 'none', 'none'),
(1, 'azvnit', '7df288c005d6bfffbd2fdf74a755b022', '999999', '1', 'Đoàn Tuấn Anh', 'vnxz123@gmail.com', '0334502222', 'admin', 'Đã kích hoạt', 'data/avata%20trong.jpeg', 'none', 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `danh_sach_den`
--

CREATE TABLE `danh_sach_den` (
  `id` int(11) NOT NULL,
  `idpost` varchar(100) NOT NULL,
  `loai` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `account` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_cheo_camxuc`
--

CREATE TABLE `log_cheo_camxuc` (
  `id` int(11) NOT NULL,
  `idpost` varchar(55) NOT NULL,
  `username` varchar(32) NOT NULL,
  `account` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_cheo_camxuc`
--

INSERT INTO `log_cheo_camxuc` (`id`, `idpost`, `username`, `account`) VALUES
(30, '149767380108570', 'tungdz84', ''),
(29, '163284485252183', 'tungdz84', ''),
(28, '278424583582516', 'tungdz84', ''),
(27, '164944625247656', 'tungdz84', ''),
(26, '314780009846428', 'tungdz84', ''),
(25, '147634933606057', 'tungdz84', ''),
(24, '3152282051476114', 'tungdz84', ''),
(23, '280103843247270', 'tungdz84', ''),
(22, '319061129227819', 'tungdz84', ''),
(21, '147634933606057', 'kunloc', '100007077545377'),
(31, '126215732483853', 'tungdz84', ''),
(32, '208567190868813', 'tungdz84', ''),
(33, '324914881978923', 'tungdz84', ''),
(34, '158586425754868', 'tungdz84', ''),
(35, '165223671777382', 'tungdz84', ''),
(36, '2742688996016901', 'tungdz84', ''),
(37, '284186349316878', 'tungdz84', ''),
(38, '158582149088629', 'tungdz84', ''),
(39, '172366117687567', 'tungdz84', ''),
(40, '160698318886888', 'tungdz84', ''),
(41, '278424583582516', 'nguyenhongkong113', '100028180384379');

-- --------------------------------------------------------

--
-- Table structure for table `log_cheo_cmt`
--

CREATE TABLE `log_cheo_cmt` (
  `id` int(11) NOT NULL,
  `idpost` varchar(32) NOT NULL,
  `username` varchar(55) NOT NULL,
  `account` varchar(32) NOT NULL,
  `noidung` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_cheo_like`
--

CREATE TABLE `log_cheo_like` (
  `id` int(11) NOT NULL,
  `idpost` varchar(55) NOT NULL,
  `username` varchar(32) NOT NULL,
  `account` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_cheo_like`
--

INSERT INTO `log_cheo_like` (`id`, `idpost`, `username`, `account`) VALUES
(1, '149767380108570', 'kunloc', '100007077545377'),
(2, '703870783510450', 'kunloc', '100007077545377'),
(3, '345269356640691', 'tungdz84', '100035155366750'),
(4, '757972804939700', 'tungdz84', '100035155366750'),
(5, '280103843247270', 'tungdz84', '100035155366750'),
(6, '158582149088629', 'tungdz84', '100035155366750'),
(7, '164944625247656', 'tungdz84', '100035155366750'),
(8, '295791011496138', 'tungdz84', '100035155366750'),
(9, '919473198529624', 'tungdz84', '100035155366750'),
(10, '172366117687567', 'tungdz84', '100035155366750'),
(11, '158586425754868', 'tungdz84', '100035155366750'),
(12, '286689432657290', 'tungdz84', '100035155366750'),
(13, '642650369670185', 'tungdz84', '100035155366750'),
(14, '704545386776323', 'tungdz84', '100035155366750'),
(15, '1377234185814721', 'tungdz84', '100035155366750'),
(16, '149767380108570', 'tungdz84', '100035155366750'),
(17, '164509698482524', 'tungdz84', '100035155366750'),
(18, '2742688996016901', 'tungdz84', '100035155366750'),
(19, '288748109015602', 'tungdz84', '100035155366750'),
(20, '703870783510450', 'tungdz84', '100035155366750'),
(21, '160698318886888', 'tungdz84', '100035155366750'),
(22, '140914677647951', 'tungdz84', '100035155366750'),
(23, '165223671777382', 'tungdz84', '100035155366750'),
(24, '164918235143952', 'tungdz84', '100035155366750'),
(25, '124911699284522', 'tungdz84', '100035155366750'),
(26, '164918235143952', 'nguyenhongkong113', '100028180384379');

-- --------------------------------------------------------

--
-- Table structure for table `log_cheo_share`
--

CREATE TABLE `log_cheo_share` (
  `id` int(11) NOT NULL,
  `idpost` varchar(32) NOT NULL,
  `username` varchar(55) NOT NULL,
  `account` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_cheo_share`
--

INSERT INTO `log_cheo_share` (`id`, `idpost`, `username`, `account`) VALUES
(1, '568381010522340', 'tungdz84', '100035155366750'),
(2, '284186349316878', 'tungdz84', '100035155366750'),
(3, '160698318886888', 'tungdz84', '100035155366750'),
(4, '314780009846428', 'tungdz84', '100035155366750');

-- --------------------------------------------------------

--
-- Table structure for table `log_cheo_sub`
--

CREATE TABLE `log_cheo_sub` (
  `id` int(11) NOT NULL,
  `idfb` varchar(32) NOT NULL,
  `username` varchar(55) NOT NULL,
  `account` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_cheo_sub`
--

INSERT INTO `log_cheo_sub` (`id`, `idfb`, `username`, `account`) VALUES
(1, '100017756825592', 'tungdz84', '100035155366750'),
(2, '100048105347853', 'tungdz84', '100035155366750'),
(3, '100029871242253', 'tungdz84', '100035155366750'),
(4, '100026291672907', 'tungdz84', '100035155366750'),
(5, '100039044766116', 'tungdz84', '100035155366750'),
(6, '100039487051433', 'tungdz84', '100035155366750'),
(7, '100051466009843', 'tungdz84', '100035155366750'),
(8, '100046211762972', 'tungdz84', '100035155366750'),
(9, '100045378369987', 'tungdz84', '100035155366750'),
(10, '100000830517296', 'tungdz84', '100035155366750'),
(11, '100013339661837', 'tungdz84', '100035155366750'),
(12, '100047425400121', 'tungdz84', '100035155366750'),
(13, '100047118983762', 'tungdz84', '100035155366750'),
(14, '100033718023761', 'tungdz84', '100035155366750'),
(15, '100046211762972', 'nguyenhongkong113', '100028180384379');

-- --------------------------------------------------------

--
-- Table structure for table `muacamxuc`
--

CREATE TABLE `muacamxuc` (
  `id` int(11) NOT NULL,
  `idpost` varchar(55) NOT NULL,
  `soluong` varchar(32) NOT NULL,
  `done` varchar(32) NOT NULL,
  `trangthai` varchar(32) NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  `loai` varchar(11) NOT NULL,
  `username` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `muacamxuc`
--

INSERT INTO `muacamxuc` (`id`, `idpost`, `soluong`, `done`, `trangthai`, `ghichu`, `loai`, `username`) VALUES
(26, '172366117687567', '10', '1', 'fail', 'Thư Thư', 'LOVE', 'kunloc'),
(27, '2744143995871401', '10', '0', 'fail', 'Phương Nguyễn', 'LOVE', 'kunloc'),
(28, '3152282051476114', '10', '1', 'fail', 'Đan Le', 'LOVE', 'kunloc'),
(29, '160698318886888', '10', '1', 'fail', 'Nguyễn Thuỳ Vân', 'LOVE', 'kunloc'),
(30, '286689432657290', '10', '0', 'fail', 'Ng Ngọcc', 'LOVE', 'kunloc'),
(31, '278875390204102', '10', '0', 'fail', 'Bé Xuân', 'LOVE', 'kunloc'),
(32, '146648237046088', '10', '0', 'fail', 'Nguyễn Thư', 'LOVE', 'kunloc'),
(33, '284186349316878', '10', '1', 'fail', 'Ngọc Ánh', 'LOVE', 'kunloc'),
(34, '324914881978923', '10', '1', 'fail', 'Mai An', 'LOVE', 'kunloc'),
(35, '158582149088629', '10', '1', 'fail', 'Trần Cát Vy', 'LOVE', 'kunloc'),
(36, '158586425754868', '10', '1', 'fail', 'Trần Cát Vy', 'LOVE', 'kunloc'),
(37, '345819346423771', '10', '0', 'fail', 'Trần Tiến Thành', 'LOVE', 'kunloc'),
(38, '208567190868813', '10', '1', 'fail', 'Giang Tâm Như', 'LOVE', 'kunloc'),
(39, '642286423039913', '10', '0', 'fail', 'Phạm Thị Kim Oanh', 'LOVE', 'kunloc'),
(40, '278424583582516', '10', '2', 'fail', 'Bé Xuân', 'LOVE', 'kunloc'),
(41, '181082526747692', '10', '0', 'fail', 'Ngọc Trâmm', 'LOVE', 'kunloc'),
(42, '126215732483853', '10', '1', 'fail', 'Huyenn Thanhh', 'LOVE', 'kunloc'),
(43, '162873492067143', '10', '0', 'fail', 'ゆきち ゃん', 'LOVE', 'kunloc'),
(44, '163284485252183', '10', '1', 'fail', 'Bii Linhh', 'LOVE', 'kunloc'),
(45, '176919877191737', '10', '0', 'fail', 'Ta Tu Nhi', 'LOVE', 'kunloc'),
(46, '128714208906836', '10', '0', 'fail', 'Phạm Thị Gia Trang', 'LOVE', 'kunloc'),
(47, '2743979522554515', '10', '0', 'fail', 'Phương Nguyễn', 'LOVE', 'kunloc'),
(48, '162788425343746', '10', '0', 'fail', 'Thị Nguyên', 'LOVE', 'kunloc'),
(49, '282672156369423', '10', '0', 'fail', 'Nguyễn Hương Giang', 'LOVE', 'kunloc'),
(50, '125326505909708', '10', '0', 'fail', 'Ngoc Chau', 'LOVE', 'kunloc'),
(51, '347391829599856', '10', '0', 'fail', 'Trần Tiến Thành', 'WOW', 'kunloc'),
(52, '347090719629967', '10', '0', 'fail', 'Trần Tiến Thành', 'WOW', 'kunloc'),
(53, '293711945208500', '10', '0', 'fail', 'Bao Cham', 'WOW', 'kunloc'),
(54, '280807053184403', '10', '0', 'fail', 'Nguyễn Văn Dũng', 'WOW', 'kunloc'),
(55, '321411615576399', '10', '0', 'fail', 'Nguyễn Thuý', 'WOW', 'kunloc'),
(56, '162990828639521', '10', '0', 'fail', 'KateKim Trần', 'WOW', 'kunloc'),
(57, '2744380639181070', '10', '0', 'fail', 'Phương Nguyễn', 'WOW', 'kunloc'),
(58, '168321778243004', '10', '0', 'fail', 'Thúy', 'WOW', 'kunloc'),
(59, '166540728421379', '10', '0', 'fail', 'Baor Tieen', 'WOW', 'kunloc'),
(60, '289031932320553', '10', '0', 'fail', 'Diện Nè', 'WOW', 'kunloc'),
(61, '169349194806929', '10', '0', 'fail', 'Thúy', 'WOW', 'kunloc'),
(62, '991367491317897', '10', '0', 'fail', 'Kim Ngânn', 'WOW', 'kunloc'),
(63, '289715312252215', '10', '0', 'fail', 'Diện Nè', 'WOW', 'kunloc'),
(64, '160899855603944', '10', '0', 'fail', 'Hà Hà', 'WOW', 'kunloc'),
(65, '163399148617906', '10', '0', 'fail', 'Nguyễn Thị Phương Trinh', 'WOW', 'kunloc'),
(66, '259972778770895', '10', '0', 'fail', 'Linh San', 'WOW', 'kunloc'),
(67, '154380602893925', '10', '0', 'fail', 'My Hang', 'WOW', 'kunloc'),
(68, '329276844921605', '10', '0', 'fail', 'Nguyễn Ngọc', 'WOW', 'kunloc'),
(69, '181466273366894', '10', '0', 'fail', 'Nguyễn Huyền Trang', 'WOW', 'kunloc'),
(70, '193923498743611', '10', '0', 'fail', 'Lý Huỳnh', 'WOW', 'kunloc'),
(71, '595175851394089', '10', '0', 'fail', 'Như Lam', 'WOW', 'kunloc'),
(72, '718427852224106', '10', '0', 'fail', 'Thanh Is', 'WOW', 'kunloc'),
(73, '2677353725821172', '10', '0', 'fail', 'Bii', 'WOW', 'kunloc');

-- --------------------------------------------------------

--
-- Table structure for table `muacmt`
--

CREATE TABLE `muacmt` (
  `id` int(11) NOT NULL,
  `idpost` varchar(55) NOT NULL,
  `soluong` varchar(32) NOT NULL,
  `done` varchar(32) NOT NULL,
  `trangthai` varchar(32) NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  `noidung` text NOT NULL,
  `username` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mualike`
--

CREATE TABLE `mualike` (
  `id` int(11) NOT NULL,
  `idpost` varchar(55) NOT NULL,
  `soluong` varchar(32) NOT NULL,
  `done` varchar(32) NOT NULL,
  `trangthai` varchar(32) NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  `loai` varchar(11) NOT NULL,
  `username` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mualike`
--

INSERT INTO `mualike` (`id`, `idpost`, `soluong`, `done`, `trangthai`, `ghichu`, `loai`, `username`) VALUES
(28, '3152282051476114', '10', '0', 'fail', 'Đan Le', 'LIKE', 'kunloc'),
(29, '160698318886888', '10', '1', 'fail', 'Nguyễn Thuỳ Vân', 'LIKE', 'kunloc'),
(30, '286689432657290', '10', '1', 'fail', 'Ng Ngọcc', 'LIKE', 'kunloc'),
(31, '278875390204102', '10', '0', 'fail', 'Bé Xuân', 'LIKE', 'kunloc'),
(32, '146648237046088', '10', '0', 'fail', 'Nguyễn Thư', 'LIKE', 'kunloc'),
(33, '284186349316878', '10', '0', 'fail', 'Ngọc Ánh', 'LIKE', 'kunloc'),
(34, '324914881978923', '10', '0', 'fail', 'Mai An', 'LIKE', 'kunloc'),
(35, '158582149088629', '10', '1', 'fail', 'Trần Cát Vy', 'LIKE', 'kunloc'),
(36, '158586425754868', '10', '1', 'fail', 'Trần Cát Vy', 'LIKE', 'kunloc'),
(37, '288748109015602', '10', '1', 'fail', 'Diện Nè', 'LIKE', 'kunloc'),
(38, '754381478731704', '10', '0', 'fail', 'Nguyễn Ngọc Hải Yến', 'LIKE', 'kunloc'),
(39, '283605662924453', '10', '0', 'fail', 'Thy Trần', 'LIKE', 'kunloc'),
(40, '2694466680765362', '10', '0', 'fail', 'Băng Hoa Phạm', 'LIKE', 'kunloc'),
(41, '164509698482524', '10', '1', 'fail', 'Nguyễn My', 'LIKE', 'kunloc'),
(42, '1377234185814721', '10', '1', 'fail', 'Phạm Oanh', 'LIKE', 'kunloc'),
(43, '642650369670185', '10', '1', 'fail', 'Phạm Thị Kim Oanh', 'LIKE', 'kunloc'),
(44, '1424673027720402', '10', '0', 'fail', 'Bình Minh Nguyễn', 'LIKE', 'kunloc'),
(45, '648142462575910', '10', '0', 'fail', 'Hạnh Goodgirl', 'LIKE', 'kunloc'),
(46, '164918235143952', '10', '2', 'fail', 'Phạm Phương Đông', 'LIKE', 'kunloc'),
(47, '1377290692475737', '10', '0', 'fail', 'Phạm Oanh', 'LIKE', 'kunloc'),
(48, '919473198529624', '10', '1', 'fail', 'Trần Bảo Ngân', 'LIKE', 'kunloc'),
(49, '688185248696513', '10', '0', 'fail', 'Vi Huỳnh', 'LIKE', 'kunloc'),
(50, '347391829599856', '10', '0', 'fail', 'Trần Tiến Thành', 'LIKE', 'kunloc'),
(51, '347090719629967', '10', '0', 'fail', 'Trần Tiến Thành', 'LIKE', 'kunloc'),
(52, '293711945208500', '10', '0', 'fail', 'Bao Cham', 'LIKE', 'kunloc'),
(53, '280807053184403', '10', '0', 'fail', 'Nguyễn Văn Dũng', 'LIKE', 'kunloc'),
(54, '321411615576399', '10', '0', 'fail', 'Nguyễn Thuý', 'LIKE', 'kunloc'),
(55, '162990828639521', '10', '0', 'fail', 'KateKim Trần', 'LIKE', 'kunloc'),
(56, '2744380639181070', '10', '0', 'fail', 'Phương Nguyễn', 'LIKE', 'kunloc'),
(57, '168321778243004', '10', '0', 'fail', 'Thúy', 'LIKE', 'kunloc'),
(58, '166540728421379', '10', '0', 'fail', 'Baor Tieen', 'LIKE', 'kunloc'),
(59, '289031932320553', '10', '0', 'fail', 'Diện Nè', 'LIKE', 'kunloc'),
(60, '169349194806929', '10', '0', 'fail', 'Thúy', 'LIKE', 'kunloc'),
(61, '991367491317897', '10', '0', 'fail', 'Kim Ngânn', 'LIKE', 'kunloc'),
(62, '289715312252215', '10', '0', 'fail', 'Diện Nè', 'LIKE', 'kunloc'),
(63, '160899855603944', '10', '0', 'fail', 'Hà Hà', 'LIKE', 'kunloc'),
(64, '163399148617906', '10', '0', 'fail', 'Nguyễn Thị Phương Trinh', 'LIKE', 'kunloc'),
(65, '259972778770895', '10', '0', 'fail', 'Linh San', 'LIKE', 'kunloc'),
(66, '154380602893925', '10', '0', 'fail', 'My Hang', 'LIKE', 'kunloc'),
(67, '329276844921605', '10', '0', 'fail', 'Nguyễn Ngọc', 'LIKE', 'kunloc'),
(68, '181466273366894', '10', '0', 'fail', 'Nguyễn Huyền Trang', 'LIKE', 'kunloc'),
(69, '193923498743611', '10', '0', 'fail', 'Lý Huỳnh', 'LIKE', 'kunloc'),
(70, '595175851394089', '10', '0', 'fail', 'Như Lam', 'LIKE', 'kunloc'),
(71, '718427852224106', '10', '0', 'fail', 'Thanh Is', 'LIKE', 'kunloc'),
(72, '2677353725821172', '10', '0', 'fail', 'Bii', 'LIKE', 'kunloc');

-- --------------------------------------------------------

--
-- Table structure for table `muashare`
--

CREATE TABLE `muashare` (
  `id` int(11) NOT NULL,
  `idpost` varchar(55) NOT NULL,
  `soluong` varchar(32) NOT NULL,
  `done` varchar(32) NOT NULL,
  `trangthai` varchar(32) NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `muashare`
--

INSERT INTO `muashare` (`id`, `idpost`, `soluong`, `done`, `trangthai`, `ghichu`, `username`) VALUES
(1, '152719509744880', '10', '0', 'fail', 'Nhật My', 'kunloc'),
(2, '147634933606057', '10', '0', 'fail', 'Phương Trinh', 'kunloc'),
(3, '2742688996016901', '10', '0', 'fail', 'Phương Nguyễn', 'kunloc'),
(4, '140914677647951', '10', '0', 'fail', 'Tiên Trần', 'kunloc'),
(5, '568381010522340', '10', '1', 'fail', 'Hương Vũ', 'kunloc'),
(6, '190182505867712', '10', '0', 'fail', 'Hà Linh', 'kunloc'),
(7, '165223671777382', '10', '0', 'fail', 'Nguyễn Duyên', 'kunloc'),
(8, '149767380108570', '10', '0', 'fail', 'Đặng Thư', 'kunloc'),
(9, '757972804939700', '10', '0', 'fail', 'Nhật Linh', 'kunloc'),
(10, '295791011496138', '10', '0', 'fail', 'Trần Thanh Nhi', 'kunloc'),
(11, '704545386776323', '10', '0', 'fail', 'Boomi Vo', 'kunloc'),
(12, '164944625247656', '10', '0', 'fail', 'Baor Tieen', 'kunloc'),
(13, '703870783510450', '10', '0', 'fail', 'Boomi Vo', 'kunloc'),
(14, '989860724801907', '10', '0', 'fail', 'Kim Ngânn', 'kunloc'),
(15, '314780009846428', '10', '1', 'fail', 'Tuyet Tram', 'kunloc'),
(16, '280103843247270', '10', '0', 'fail', 'Nguyễn Bảo Khanh', 'kunloc'),
(17, '319061129227819', '10', '0', 'fail', 'Đức UwU', 'kunloc'),
(18, '124911699284522', '10', '0', 'fail', 'Ngoc Chau', 'kunloc'),
(19, '165510308425395', '10', '0', 'fail', 'Lê Ngọc Trinh', 'kunloc'),
(20, '583179955901722', '10', '0', 'fail', 'Phương Uyên', 'kunloc'),
(21, '345269356640691', '10', '0', 'fail', 'Tăng Thị Bích Trâm', 'kunloc'),
(22, '286973945713821', '10', '0', 'fail', 'Phan Thị Xuân Trúc', 'kunloc'),
(23, '153175909712434', '10', '0', 'fail', 'Bánh Mì Bơ Tỏi', 'kunloc'),
(24, '289881038990053', '10', '0', 'fail', 'Trịnh Minh Khoa', 'kunloc'),
(25, '313124719879474', '10', '0', 'fail', 'Cat Đáng Yeww', 'kunloc'),
(26, '172366117687567', '10', '0', 'fail', 'Thư Thư', 'kunloc'),
(27, '2744143995871401', '10', '0', 'fail', 'Phương Nguyễn', 'kunloc'),
(28, '3152282051476114', '10', '0', 'fail', 'Đan Le', 'kunloc'),
(29, '160698318886888', '10', '1', 'fail', 'Nguyễn Thuỳ Vân', 'kunloc'),
(30, '286689432657290', '10', '0', 'fail', 'Ng Ngọcc', 'kunloc'),
(31, '278875390204102', '10', '0', 'fail', 'Bé Xuân', 'kunloc'),
(32, '146648237046088', '10', '0', 'fail', 'Nguyễn Thư', 'kunloc'),
(33, '284186349316878', '10', '1', 'fail', 'Ngọc Ánh', 'kunloc'),
(34, '324914881978923', '10', '0', 'fail', 'Mai An', 'kunloc'),
(35, '158582149088629', '10', '0', 'fail', 'Trần Cát Vy', 'kunloc'),
(36, '158586425754868', '10', '0', 'fail', 'Trần Cát Vy', 'kunloc'),
(37, '345819346423771', '10', '0', 'fail', 'Trần Tiến Thành', 'kunloc'),
(38, '208567190868813', '10', '0', 'fail', 'Giang Tâm Như', 'kunloc'),
(39, '642286423039913', '10', '0', 'fail', 'Phạm Thị Kim Oanh', 'kunloc'),
(40, '278424583582516', '10', '0', 'fail', 'Bé Xuân', 'kunloc'),
(41, '181082526747692', '10', '0', 'fail', 'Ngọc Trâmm', 'kunloc'),
(42, '126215732483853', '10', '0', 'fail', 'Huyenn Thanhh', 'kunloc'),
(43, '162873492067143', '10', '0', 'fail', 'ゆきち ゃん', 'kunloc'),
(44, '163284485252183', '10', '0', 'fail', 'Bii Linhh', 'kunloc'),
(45, '176919877191737', '10', '0', 'fail', 'Ta Tu Nhi', 'kunloc'),
(46, '128714208906836', '10', '0', 'fail', 'Phạm Thị Gia Trang', 'kunloc'),
(47, '2743979522554515', '10', '0', 'fail', 'Phương Nguyễn', 'kunloc'),
(48, '162788425343746', '10', '0', 'fail', 'Thị Nguyên', 'kunloc'),
(49, '282672156369423', '10', '0', 'fail', 'Nguyễn Hương Giang', 'kunloc'),
(50, '125326505909708', '10', '0', 'fail', 'Ngoc Chau', 'kunloc'),
(51, '347391829599856', '10', '0', 'fail', 'Trần Tiến Thành', 'kunloc'),
(52, '347090719629967', '10', '0', 'fail', 'Trần Tiến Thành', 'kunloc'),
(53, '293711945208500', '10', '0', 'fail', 'Bao Cham', 'kunloc'),
(54, '280807053184403', '10', '0', 'fail', 'Nguyễn Văn Dũng', 'kunloc'),
(55, '321411615576399', '10', '0', 'fail', 'Nguyễn Thuý', 'kunloc'),
(56, '162990828639521', '10', '0', 'fail', 'KateKim Trần', 'kunloc'),
(57, '2744380639181070', '10', '0', 'fail', 'Phương Nguyễn', 'kunloc'),
(58, '168321778243004', '10', '0', 'fail', 'Thúy', 'kunloc'),
(59, '166540728421379', '10', '0', 'fail', 'Baor Tieen', 'kunloc'),
(60, '289031932320553', '10', '0', 'fail', 'Diện Nè', 'kunloc'),
(61, '169349194806929', '10', '0', 'fail', 'Thúy', 'kunloc'),
(62, '991367491317897', '10', '0', 'fail', 'Kim Ngânn', 'kunloc'),
(63, '289715312252215', '10', '0', 'fail', 'Diện Nè', 'kunloc'),
(64, '160899855603944', '10', '0', 'fail', 'Hà Hà', 'kunloc'),
(65, '163399148617906', '10', '0', 'fail', 'Nguyễn Thị Phương Trinh', 'kunloc'),
(66, '259972778770895', '10', '0', 'fail', 'Linh San', 'kunloc'),
(67, '154380602893925', '10', '0', 'fail', 'My Hang', 'kunloc'),
(68, '329276844921605', '10', '0', 'fail', 'Nguyễn Ngọc', 'kunloc'),
(69, '181466273366894', '10', '0', 'fail', 'Nguyễn Huyền Trang', 'kunloc'),
(70, '193923498743611', '10', '0', 'fail', 'Lý Huỳnh', 'kunloc'),
(71, '595175851394089', '10', '0', 'fail', 'Như Lam', 'kunloc'),
(72, '718427852224106', '10', '0', 'fail', 'Thanh Is', 'kunloc'),
(73, '2677353725821172', '10', '0', 'fail', 'Bii', 'kunloc');

-- --------------------------------------------------------

--
-- Table structure for table `muasub`
--

CREATE TABLE `muasub` (
  `id` int(11) NOT NULL,
  `idfb` varchar(55) NOT NULL,
  `soluong` varchar(32) NOT NULL,
  `done` varchar(32) NOT NULL,
  `trangthai` varchar(32) NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `muasub`
--

INSERT INTO `muasub` (`id`, `idfb`, `soluong`, `done`, `trangthai`, `ghichu`, `username`) VALUES
(1, '100050204946523', '10', '0', 'fail', 'Nhật My', 'kunloc'),
(2, '100048692513138', '10', '0', 'fail', 'Nguyễn Duyên', 'kunloc'),
(3, '100052259262285', '10', '0', 'fail', 'Đặng Thư', 'kunloc'),
(4, '100021809616765', '10', '0', 'fail', 'Nhật Linh', 'kunloc'),
(5, '100031957233671', '10', '0', 'fail', 'Trần Thanh Nhi', 'kunloc'),
(6, '100016626047963', '10', '0', 'fail', 'Boomi Vo', 'kunloc'),
(7, '100051963584662', '10', '0', 'fail', 'Baor Tieen', 'kunloc'),
(8, '100013339661837', '10', '1', 'fail', 'Kim Ngânn', 'kunloc'),
(9, '100039432952920', '10', '0', 'fail', 'Tuyet Tram', 'kunloc'),
(10, '100037429689664', '10', '0', 'fail', 'Nguyễn Bảo Khanh', 'kunloc'),
(11, '100033718023761', '10', '1', 'fail', 'Đức UwU', 'kunloc'),
(12, '100052970776691', '10', '0', 'fail', 'Ngoc Chau', 'kunloc'),
(13, '100048992802267', '10', '0', 'fail', 'Lê Ngọc Trinh', 'kunloc'),
(14, '100026291672907', '10', '1', 'fail', 'Phương Uyên', 'kunloc'),
(15, '100034728887919', '10', '0', 'fail', 'Tăng Thị Bích Trâm', 'kunloc'),
(16, '100032036524213', '10', '0', 'fail', 'Phan Thị Xuân Trúc', 'kunloc'),
(17, '100050600771704', '10', '0', 'fail', 'Bánh Mì Bơ Tỏi', 'kunloc'),
(18, '100039044766116', '10', '1', 'fail', 'Trịnh Minh Khoa', 'kunloc'),
(19, '100035458459080', '10', '0', 'fail', 'Cat Đáng Yeww', 'kunloc'),
(20, '100047425400121', '10', '1', 'fail', 'Thư Thư', 'kunloc'),
(21, '100000830517296', '10', '1', 'fail', 'Đan Le', 'kunloc'),
(22, '100048401615145', '10', '0', 'fail', 'Nguyễn Thuỳ Vân', 'kunloc'),
(23, '100039487051433', '10', '1', 'fail', 'Ng Ngọcc', 'kunloc'),
(24, '100042449284602', '10', '0', 'fail', 'Bé Xuân', 'kunloc'),
(25, '100051027373277', '10', '0', 'fail', 'Nguyễn Thư', 'kunloc'),
(26, '100033812407782', '10', '0', 'fail', 'Mai An', 'kunloc'),
(27, '100048105347853', '10', '1', 'fail', 'Trần Cát Vy', 'kunloc'),
(28, '100029871242253', '10', '1', 'fail', 'Trần Tiến Thành', 'kunloc'),
(29, '100051466009843', '10', '1', 'fail', 'Giang Tâm Như', 'kunloc'),
(30, '100017756825592', '10', '1', 'fail', 'Phạm Thị Kim Oanh', 'kunloc'),
(31, '100045378369987', '10', '1', 'fail', 'Ngọc Trâmm', 'kunloc'),
(32, '100052862797799', '10', '0', 'fail', 'Huyenn Thanhh', 'kunloc'),
(33, '100050334794349', '10', '0', 'fail', 'ゆきち ゃん', 'kunloc'),
(34, '100047118983762', '10', '1', 'fail', 'Bii Linhh', 'kunloc'),
(35, '100046211762972', '10', '2', 'fail', 'Ta Tu Nhi', 'kunloc'),
(36, '100037090897149', '10', '0', 'fail', 'Bao Cham', 'kunloc'),
(37, '100037653314960', '10', '0', 'fail', 'Nguyễn Văn Dũng', 'kunloc'),
(38, '100031226880278', '10', '0', 'fail', 'Nguyễn Thuý', 'kunloc'),
(39, '100047858130403', '10', '0', 'fail', 'KateKim Trần', 'kunloc'),
(40, '100051955473161', '10', '0', 'fail', 'Thúy', 'kunloc'),
(41, '100036412443433', '10', '0', 'fail', 'Diện Nè', 'kunloc'),
(42, '100048434647335', '10', '0', 'fail', 'Nguyễn Thị Phương Trinh', 'kunloc'),
(43, '100042745246257', '10', '0', 'fail', 'Linh San', 'kunloc'),
(44, '100035178769997', '10', '0', 'fail', 'Nguyễn Ngọc', 'kunloc'),
(45, '100045105667898', '10', '0', 'fail', 'Nguyễn Huyền Trang', 'kunloc'),
(46, '100043778855119', '10', '0', 'fail', 'Lý Huỳnh', 'kunloc'),
(47, '100027050387928', '10', '0', 'fail', 'Như Lam', 'kunloc'),
(48, '100021706930976', '10', '0', 'fail', 'Thanh Is', 'kunloc');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `ly_do` text NOT NULL,
  `username` varchar(32) NOT NULL,
  `trangthai` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `link`, `ly_do`, `username`, `trangthai`) VALUES
(2, 'https://www.facebook.com/4', 'Cmt dạo, chửi', 'kunloc', 'Đã Duyệt'),
(3, 'https://www.facebook.com/profile.php?id=100007077545377', 'Ních Trắng ( Không Avatar', 'kunloc', 'Đã Duyệt'),
(4, 'https://www.facebook.com/5', 'Tên Người Nước Ngoài', '234234234', 'Đã Duyệt');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `idfb` varchar(32) NOT NULL,
  `token` text NOT NULL,
  `loai` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `img_name` varchar(150) NOT NULL,
  `size` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `username`, `img_url`, `img_name`, `size`, `type`) VALUES
(3, 'tonghoainam', 'data/71ea55e3a6e85ab603f9.jpg', '71ea55e3a6e85ab603f9.jpg', '79205', 'jpg'),
(4, 'tonghoainam', 'data/9836d1e81ce3e0bdb9f2.jpg', '9836d1e81ce3e0bdb9f2.jpg', '98146', 'jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accchay`
--
ALTER TABLE `accchay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acccheo`
--
ALTER TABLE `acccheo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_sach_den`
--
ALTER TABLE `danh_sach_den`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_cheo_camxuc`
--
ALTER TABLE `log_cheo_camxuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_cheo_cmt`
--
ALTER TABLE `log_cheo_cmt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_cheo_like`
--
ALTER TABLE `log_cheo_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_cheo_share`
--
ALTER TABLE `log_cheo_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_cheo_sub`
--
ALTER TABLE `log_cheo_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muacamxuc`
--
ALTER TABLE `muacamxuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muacmt`
--
ALTER TABLE `muacmt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mualike`
--
ALTER TABLE `mualike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muashare`
--
ALTER TABLE `muashare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muasub`
--
ALTER TABLE `muasub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accchay`
--
ALTER TABLE `accchay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `acccheo`
--
ALTER TABLE `acccheo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `danh_sach_den`
--
ALTER TABLE `danh_sach_den`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log_cheo_camxuc`
--
ALTER TABLE `log_cheo_camxuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `log_cheo_cmt`
--
ALTER TABLE `log_cheo_cmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log_cheo_like`
--
ALTER TABLE `log_cheo_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `log_cheo_share`
--
ALTER TABLE `log_cheo_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_cheo_sub`
--
ALTER TABLE `log_cheo_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `muacamxuc`
--
ALTER TABLE `muacamxuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `muacmt`
--
ALTER TABLE `muacmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mualike`
--
ALTER TABLE `mualike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `muashare`
--
ALTER TABLE `muashare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `muasub`
--
ALTER TABLE `muasub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
