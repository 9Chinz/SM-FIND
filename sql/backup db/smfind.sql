-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 08:32 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smfind`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_system`
--

CREATE TABLE `log_system` (
  `LogID` int(10) NOT NULL,
  `IP` varchar(100) NOT NULL,
  `Event` text NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MemberID` int(10) NOT NULL,
  `MemberCode` int(10) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Dept` varchar(100) NOT NULL,
  `Section` varchar(100) NOT NULL,
  `Class` int(10) NOT NULL,
  `Room` int(10) NOT NULL,
  `Tel` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Userlevel` varchar(100) NOT NULL,
  `SpecialStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemberID`, `MemberCode`, `Firstname`, `Lastname`, `Dept`, `Section`, `Class`, `Room`, `Tel`, `Email`, `Password`, `Userlevel`, `SpecialStatus`) VALUES
(1, 41728, 'chinnapat', 'limprathan', 'IT', 'upper', 2, 8, '0823655897', 'Chinnapat.lim@sbac.ac.th', '2ea0f266abede61790a64a63c1ce3074', 'student', ''),
(2, 31729, 'yannawut', 'tiblab', 'IT', 'upper', 2, 8, '0946578662', 'yannawut.tib@sbac.ac.th', 'df08d0e92004fdd5256cf98fba67593e', 'teacher', ''),
(3, 37908, 'siriwat', 'gunha', 'IT', 'upper', 2, 8, '0876765135', 'siriwat.gun@sbac.ac.th', 'a7c6e1f8363e4ebaa6a832ce39f86fd8', 'student', 'treasurer'),
(4, 40319, 'nattapon', 'akaratadarath', 'IT', 'upper', 2, 8, '0846573847', 'nattapon.aka@sbac.ac.th', '569026f15ebbf6f0f32ff9b3bc2bf1d7', 'student', 'sub-headroom'),
(5, 37963, 'theratat', 'taweetong', 'IT', 'upper', 2, 8, '0957463829', 'theratat.taw@sbac.ac.th', '9d723cc660f8568f349a646cd7a7c97f', 'student', 'headroom'),
(7, 1, 'bank', 'teller', 'none', 'none', 0, 0, '01234567890', 'teller@sbac.ac.th', '40f5888b67c748df7efba008e7c2f9d2', 'teller', ''),
(8, 2, 'bank', 'account', 'none', 'none', 0, 0, '01234567890', 'bank.account@sbac.ac.th', '4a9bd19b3b8676199592a346051f950c', 'bank-account', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_account`
--

CREATE TABLE `member_account` (
  `AccountID` int(10) NOT NULL,
  `Account_number` varchar(50) DEFAULT NULL,
  `Bankbook` varchar(50) DEFAULT NULL,
  `Account_balance` float DEFAULT NULL,
  `MemberID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_account`
--

INSERT INTO `member_account` (`AccountID`, `Account_number`, `Bankbook`, `Account_balance`, `MemberID`) VALUES
(3, '0113302953464', '00023245', 100.3, 1),
(4, '21321321321321', '000232454', 100, 3);

-- --------------------------------------------------------

--
-- Table structure for table `member_log`
--

CREATE TABLE `member_log` (
  `LogID` int(10) NOT NULL,
  `IP` varchar(100) NOT NULL,
  `Event` text NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `MemberID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_log`
--

INSERT INTO `member_log` (`LogID`, `IP`, `Event`, `Date`, `Time`, `MemberID`) VALUES
(1, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-27', '08:25:50', 1),
(2, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '01:26:07', 1),
(3, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '01:26:28', 1),
(4, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '01:27:42', 1),
(5, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '01:30:29', 1),
(6, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '01:30:35', 1),
(7, '::1', 'รหัส 31729 yannawut has login successful !', '2020-07-29', '01:32:53', 2),
(8, '::1', 'รหัส 31729 yannawut tiblab has logout successful !', '2020-07-29', '01:52:07', 2),
(9, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '01:52:15', 1),
(10, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '02:00:48', 1),
(11, '::1', 'รหัส 31729 yannawut has login successful !', '2020-07-29', '02:01:05', 2),
(12, '::1', 'รหัส 31729 yannawut tiblab has logout successful !', '2020-07-29', '02:02:00', 2),
(13, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '02:02:11', 1),
(14, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '02:02:16', 1),
(15, '::1', 'รหัส 31729 yannawut has login successful !', '2020-07-29', '02:02:34', 2),
(16, '::1', 'รหัส 31729 yannawut tiblab has logout successful !', '2020-07-29', '02:26:01', 2),
(17, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '02:26:52', 1),
(18, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '02:30:53', 1),
(19, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '02:31:56', 1),
(20, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '02:33:54', 1),
(21, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '02:34:04', 1),
(22, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '02:35:44', 1),
(23, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '02:35:52', 1),
(24, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '02:36:54', 1),
(25, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '02:37:01', 1),
(26, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '02:37:41', 1),
(27, '::1', 'รหัส 31729 yannawut has login successful !', '2020-07-29', '02:37:51', 2),
(28, '::1', 'รหัส 31729 yannawut tiblab has logout successful !', '2020-07-29', '02:38:11', 2),
(29, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '02:57:29', 1),
(30, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '03:16:43', 1),
(31, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '04:50:41', 1),
(32, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '05:36:22', 1),
(33, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '05:36:30', 1),
(34, '::1', 'รหัส 41728 chinnapat has required for created account ! ', '2020-07-29', '05:36:42', 1),
(35, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '05:37:44', 1),
(36, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '21:54:43', 1),
(37, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '21:58:54', 1),
(38, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '22:06:40', 1),
(39, '::1', 'รหัส 41728 chinnapat has required for created account ! ', '2020-07-29', '22:10:10', 1),
(40, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '22:41:28', 1),
(41, '::1', 'รหัส 1 bank has login successful !', '2020-07-29', '22:46:23', 7),
(42, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-29', '22:49:18', 7),
(43, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '22:49:24', 1),
(44, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '22:49:30', 1),
(45, '::1', 'รหัส 1 bank has login successful !', '2020-07-29', '22:50:09', 7),
(46, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-29', '22:51:34', 7),
(47, '::1', 'รหัส 2 bank has login successful !', '2020-07-29', '22:51:42', 8),
(48, '::1', 'รหัส 2 bank account has logout successful !', '2020-07-29', '22:51:48', 8),
(49, '::1', 'รหัส 1 bank has login successful !', '2020-07-29', '22:51:57', 7),
(50, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-29', '22:52:00', 7),
(51, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '22:52:07', 1),
(52, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '22:52:14', 1),
(53, '::1', 'รหัส 37908 siriwat has login successful !', '2020-07-29', '22:52:30', 3),
(54, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-07-29', '22:52:56', 3),
(55, '::1', 'รหัส 40319 nattapon has login successful !', '2020-07-29', '22:54:10', 4),
(56, '::1', 'รหัส 40319 nattapon akaratadarath has logout successful !', '2020-07-29', '22:54:17', 4),
(57, '::1', 'รหัส 37963 theratat has login successful !', '2020-07-29', '22:54:27', 5),
(58, '::1', 'รหัส 37963 theratat taweetong has logout successful !', '2020-07-29', '22:54:33', 5),
(59, '::1', 'รหัส 40319 nattapon has login successful !', '2020-07-29', '22:54:42', 4),
(60, '::1', 'รหัส 40319 nattapon akaratadarath has logout successful !', '2020-07-29', '22:54:45', 4),
(61, '::1', 'รหัส 31729 yannawut has login successful !', '2020-07-29', '22:55:02', 2),
(62, '::1', 'รหัส 31729 yannawut tiblab has logout successful !', '2020-07-29', '22:55:05', 2),
(63, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-29', '22:55:12', 1),
(64, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-29', '22:55:15', 1),
(65, '::1', 'รหัส 1 bank has login successful !', '2020-07-29', '23:30:48', 7),
(66, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-30', '00:52:45', 7),
(67, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-30', '00:52:53', 1),
(68, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-30', '00:53:22', 1),
(69, '::1', 'รหัส 1 bank has login successful !', '2020-07-30', '00:54:25', 7),
(70, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-30', '01:01:45', 7),
(71, '::1', 'รหัส 1 bank has login successful !', '2020-07-30', '01:01:52', 7),
(72, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-30', '01:03:12', 7),
(73, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-30', '01:03:19', 1),
(74, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-30', '01:03:29', 1),
(75, '::1', 'รหัส 2 bank has login successful !', '2020-07-30', '01:03:38', 8),
(76, '::1', 'รหัส 2 bank account has logout successful !', '2020-07-30', '01:29:44', 8),
(77, '::1', 'รหัส 1 bank has login successful !', '2020-07-30', '01:29:58', 7),
(78, '::1', 'รหัส 1 bank has required for created account ! ', '2020-07-30', '01:34:34', 7),
(79, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-30', '01:46:53', 7),
(80, '::1', 'รหัส 1 bank has login successful !', '2020-07-30', '01:55:09', 7),
(81, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-30', '03:50:16', 7),
(82, '::1', 'รหัส 1 bank has login successful !', '2020-07-30', '03:50:24', 7),
(83, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-30', '04:02:29', 7),
(84, '::1', 'รหัส 37908 siriwat has login successful !', '2020-07-30', '04:02:58', 3),
(85, '::1', 'รหัส 37908 siriwat has required for created account ! ', '2020-07-30', '04:04:00', 3),
(86, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-07-30', '04:04:04', 3),
(87, '::1', 'รหัส 1 bank has login successful !', '2020-07-30', '04:04:15', 7),
(88, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-30', '04:56:52', 7),
(89, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-30', '04:57:00', 1),
(90, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-30', '04:57:58', 1),
(91, '::1', 'รหัส 37908 siriwat has login successful !', '2020-07-30', '04:59:15', 3),
(92, '::1', 'รหัส 37908 siriwat has required for created account ! ', '2020-07-30', '04:59:37', 3),
(93, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-07-30', '04:59:42', 3),
(94, '::1', 'รหัส 1 bank has login successful !', '2020-07-30', '04:59:50', 7),
(95, '::1', 'Email teller@sbac.ac.th bank teller has created account for  newza152@gmail.com  successful !', '2020-07-30', '05:00:37', 7),
(96, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-30', '05:00:45', 7),
(97, '::1', 'รหัส 37908 siriwat has login successful !', '2020-07-30', '05:07:33', 3),
(98, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-07-30', '05:12:51', 3),
(99, '::1', 'รหัส 40319 nattapon has login successful !', '2020-07-30', '05:13:18', 4),
(100, '::1', 'รหัส 40319 nattapon akaratadarath has logout successful !', '2020-07-30', '05:13:23', 4),
(101, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-30', '05:13:30', 1),
(102, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-30', '05:16:36', 1),
(103, '::1', 'รหัส 37908 siriwat has login successful !', '2020-07-30', '05:16:52', 3),
(104, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-07-30', '05:22:43', 3),
(105, '::1', 'รหัส 37908 siriwat has login successful !', '2020-07-30', '05:22:59', 3),
(106, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-07-30', '05:35:04', 3),
(107, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-30', '05:35:10', 1),
(108, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-30', '05:41:56', 1),
(109, '::1', 'รหัส 37908 siriwat has login successful !', '2020-07-30', '05:42:05', 3),
(110, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-07-30', '05:44:55', 3),
(111, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-30', '05:45:03', 1),
(112, '::1', 'รหัส 41728 chinnapat has required for created account ! ', '2020-07-30', '05:45:26', 1),
(113, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-30', '05:45:31', 1),
(114, '::1', 'รหัส 1 bank has login successful !', '2020-07-30', '05:45:39', 7),
(115, '::1', 'Email teller@sbac.ac.th bank teller has created account for  Chinnapat.lim@sbac.ac.th  successful !', '2020-07-30', '05:46:15', 7),
(116, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-30', '05:46:19', 7),
(117, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-30', '05:46:35', 1),
(118, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-30', '06:33:17', 1),
(119, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-30', '06:33:23', 1),
(120, '::1', 'รหัส 41728 chinnapat has create transaction !', '2020-07-30', '06:37:20', 1),
(121, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-30', '06:38:10', 1),
(122, '::1', 'รหัส 37908 siriwat has login successful !', '2020-07-30', '06:38:31', 3),
(123, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-07-30', '06:44:21', 3),
(124, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-30', '06:44:27', 1),
(125, '::1', 'รหัส 41728 chinnapat has create transaction !', '2020-07-30', '06:44:33', 1),
(126, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-30', '06:44:38', 1),
(127, '::1', 'รหัส 37908 siriwat has login successful !', '2020-07-30', '06:51:37', 3),
(128, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-07-30', '07:10:15', 3),
(129, '::1', 'รหัส 37963 theratat has login successful !', '2020-07-30', '07:10:34', 5),
(130, '::1', 'รหัส 37963 theratat taweetong has logout successful !', '2020-07-30', '07:15:42', 5),
(131, '::1', 'รหัส 37908 siriwat has login successful !', '2020-07-30', '07:16:00', 3),
(132, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-07-30', '15:47:34', 1),
(133, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-07-30', '15:47:51', 1),
(134, '::1', 'รหัส 1 bank has login successful !', '2020-07-30', '15:48:03', 7),
(135, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-30', '15:48:19', 7),
(136, '::1', 'รหัส 37908 siriwat has login successful !', '2020-07-30', '16:28:38', 3),
(137, '::1', 'รหัส 37908 siriwat has required for created account ! ', '2020-07-30', '16:32:37', 3),
(138, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-07-30', '16:33:03', 3),
(139, '::1', 'รหัส 1 bank has login successful !', '2020-07-30', '16:33:41', 7),
(140, '::1', 'รหัส 1 bank teller has logout successful !', '2020-07-30', '16:52:21', 7),
(141, '::1', 'รหัส 37908 siriwat has login successful !', '2020-08-08', '23:23:50', 3),
(142, '::1', 'รหัส 37908 siriwat has required for created account ! ', '2020-08-08', '23:25:45', 3),
(143, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-08-08', '23:31:30', 3),
(144, '::1', 'รหัส 1 bank has login successful !', '2020-08-08', '23:31:56', 7),
(145, '::1', 'Email teller@sbac.ac.th bank teller has created account for  newza152@gmail.com  successful !', '2020-08-08', '23:33:38', 7),
(146, '::1', 'รหัส 1 bank teller has logout successful !', '2020-08-08', '23:34:03', 7),
(147, '::1', 'รหัส 37908 siriwat has login successful !', '2020-08-08', '23:34:17', 3),
(148, '::1', 'รหัส 37908 siriwat has create transaction !', '2020-08-08', '23:34:51', 3),
(149, '::1', 'รหัส 37908 siriwat has login successful !', '2020-08-11', '09:47:35', 3),
(150, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-08-11', '10:41:52', 3),
(151, '::1', 'รหัส 1 bank has login successful !', '2020-08-11', '10:48:20', 7),
(152, '::1', 'รหัส 1 bank teller has logout successful !', '2020-08-11', '12:03:00', 7),
(153, '::1', 'รหัส 2 bank has login successful !', '2020-08-11', '12:03:25', 8),
(154, '::1', 'รหัส 2 bank account has logout successful !', '2020-08-11', '12:12:41', 8),
(155, '::1', 'รหัส 41728 chinnapat has login successful !', '2020-08-11', '12:13:29', 1),
(156, '::1', 'รหัส 41728 chinnapat limprathan has logout successful !', '2020-08-11', '12:13:44', 1),
(157, '::1', 'รหัส 37908 siriwat has login successful !', '2020-08-11', '12:13:57', 3),
(158, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-08-11', '12:25:29', 3),
(159, '::1', 'รหัส 1 bank has login successful !', '2020-08-11', '12:25:39', 7),
(160, '::1', 'รหัส 1 bank teller has logout successful !', '2020-08-11', '12:49:16', 7),
(161, '::1', 'รหัส 2 bank has login successful !', '2020-08-11', '12:49:25', 8),
(162, '::1', 'รหัส 2 bank account has logout successful !', '2020-08-11', '12:49:35', 8),
(163, '::1', 'รหัส 37908 siriwat has login successful !', '2020-08-11', '12:51:17', 3),
(164, '::1', 'รหัส 37908 siriwat gunha has logout successful !', '2020-08-11', '12:51:26', 3),
(165, '::1', 'รหัส 40319 nattapon has login successful !', '2020-08-11', '12:51:47', 4),
(166, '::1', 'รหัส 40319 nattapon akaratadarath has logout successful !', '2020-08-11', '13:24:31', 4),
(167, '::1', 'รหัส 37908 siriwat has login successful !', '2020-08-11', '13:26:24', 3);

-- --------------------------------------------------------

--
-- Table structure for table `member_trans`
--

CREATE TABLE `member_trans` (
  `TransID` int(10) NOT NULL,
  `Amount` float NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `AccountID` int(10) NOT NULL,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_trans`
--

INSERT INTO `member_trans` (`TransID`, `Amount`, `Date`, `Time`, `AccountID`, `Status`) VALUES
(3, 100, '2020-07-30', '06:33:44', 3, 0),
(4, 0, '2020-08-08', '23:51:34', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_account`
--

CREATE TABLE `request_account` (
  `FormID` int(10) NOT NULL,
  `Code` int(10) DEFAULT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Begin_cash` float DEFAULT NULL,
  `MemberID` int(10) DEFAULT NULL,
  `Status` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_system`
--
ALTER TABLE `log_system`
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MemberID`);

--
-- Indexes for table `member_account`
--
ALTER TABLE `member_account`
  ADD PRIMARY KEY (`AccountID`),
  ADD KEY `MemberID` (`MemberID`);

--
-- Indexes for table `member_log`
--
ALTER TABLE `member_log`
  ADD PRIMARY KEY (`LogID`),
  ADD KEY `MemberID` (`MemberID`);

--
-- Indexes for table `member_trans`
--
ALTER TABLE `member_trans`
  ADD PRIMARY KEY (`TransID`),
  ADD KEY `AccountID` (`AccountID`);

--
-- Indexes for table `request_account`
--
ALTER TABLE `request_account`
  ADD PRIMARY KEY (`FormID`),
  ADD KEY `MemberID` (`MemberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_system`
--
ALTER TABLE `log_system`
  MODIFY `LogID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MemberID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member_account`
--
ALTER TABLE `member_account`
  MODIFY `AccountID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member_log`
--
ALTER TABLE `member_log`
  MODIFY `LogID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `member_trans`
--
ALTER TABLE `member_trans`
  MODIFY `TransID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request_account`
--
ALTER TABLE `request_account`
  MODIFY `FormID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member_account`
--
ALTER TABLE `member_account`
  ADD CONSTRAINT `member_account_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `member` (`MemberID`);

--
-- Constraints for table `member_log`
--
ALTER TABLE `member_log`
  ADD CONSTRAINT `member_log_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `member` (`MemberID`);

--
-- Constraints for table `member_trans`
--
ALTER TABLE `member_trans`
  ADD CONSTRAINT `member_trans_ibfk_1` FOREIGN KEY (`AccountID`) REFERENCES `member_account` (`AccountID`);

--
-- Constraints for table `request_account`
--
ALTER TABLE `request_account`
  ADD CONSTRAINT `request_account_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `member` (`MemberID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
