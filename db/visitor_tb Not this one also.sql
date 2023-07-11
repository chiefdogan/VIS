-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 08:28 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitor_tb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs_tb`
--

CREATE TABLE `activity_logs_tb` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `url` varchar(255) NOT NULL,
  `referrer` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `staff_tb_id` int(10) DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_logs_tb`
--

INSERT INTO `activity_logs_tb` (`id`, `date`, `url`, `referrer`, `action`, `ip`, `staff_tb_id`, `description`) VALUES
(9, '2023-03-18 04:04:05', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(10, '2023-03-18 04:10:33', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 36, 'User logged in (ID 36).'),
(11, '2023-03-18 04:33:08', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 36, 'User logged in (ID 36).'),
(12, '2023-03-18 19:58:16', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(13, '2023-03-18 22:21:15', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 38, 'User logged in (ID 38).'),
(14, '2023-03-18 22:22:07', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(15, '2023-03-19 01:11:25', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(16, '2023-03-19 01:11:47', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(17, '2023-03-19 01:13:22', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(18, '2023-03-19 02:08:05', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(19, '2023-03-19 23:25:21', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(20, '2023-03-19 23:44:48', '/work/e-visitor/admin/blocked-users.php?restoreid=37', 'http://localhost/work/e-visitor/admin/users.php', 'delete', '::1', 1, 'User deleted record (ID: 37).'),
(21, '2023-03-20 00:50:11', '/work/e-visitor/admin/blocked-users.php?restoreid=37', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 37).'),
(22, '2023-03-20 11:56:14', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(23, '2023-03-20 12:27:39', '/work/e-visitor/admin/blocked-users.php?restoreid=37', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 37).'),
(24, '2023-03-20 17:36:14', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(25, '2023-03-20 17:36:34', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 36, 'User logged in (ID 36).'),
(26, '2023-03-20 17:36:52', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 38, 'User logged in (ID 38).'),
(27, '2023-03-20 17:37:39', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(28, '2023-03-20 20:22:11', '/work/e-visitor/admin/blocked-users.php?restoreid=37', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 37).'),
(29, '2023-03-21 16:26:19', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(30, '2023-03-21 20:09:46', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(31, '2023-03-22 15:17:38', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(32, '2023-03-22 17:28:01', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(33, '2023-03-22 22:54:14', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(34, '2023-03-23 00:59:35', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(35, '2023-03-23 01:16:11', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 38, 'User logged in (ID 38).'),
(36, '2023-03-23 01:21:23', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 36, 'User logged in (ID 36).'),
(37, '2023-03-23 01:48:53', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(38, '2023-03-23 01:50:32', '/work/e-visitor/admin/visitors-list.php?checkOutID=2', 'http://localhost/work/e-visitor/admin/visitors-list.php', 'update', '::1', 1, 'User updated record (ID: 2).'),
(39, '2023-03-23 01:53:56', '/work/e-visitor/admin/visitors-list.php?checkOutID=1', 'http://localhost/work/e-visitor/admin/visitors-list.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(40, '2023-03-23 13:30:17', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(41, '2023-03-23 22:50:24', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(42, '2023-03-24 06:37:43', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(43, '2023-03-24 07:35:26', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(44, '2023-03-24 07:42:13', '/work/e-visitor/admin/visitors-list.php?checkOutID=2', 'http://localhost/work/e-visitor/admin/visitors-list.php', 'update', '::1', 1, 'User updated record (ID: 2).'),
(45, '2023-03-24 07:42:19', '/work/e-visitor/admin/visitors-list.php?checkOutID=3', 'http://localhost/work/e-visitor/admin/visitors-list.php', 'update', '::1', 1, 'User updated record (ID: 3).'),
(46, '2023-03-24 12:28:18', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(47, '2023-03-27 09:35:10', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(48, '2023-03-27 09:42:28', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 38, 'User logged in (ID 38).'),
(49, '2023-03-27 09:50:31', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 36, 'User logged in (ID 36).'),
(50, '2023-03-27 09:57:00', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 36, 'User logged in (ID 36).'),
(51, '2023-03-27 10:00:05', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(52, '2023-03-27 10:14:41', '/work/e-visitor/admin/blocked-users.php?restoreid=37', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 37).'),
(53, '2023-03-27 16:03:41', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(54, '2023-03-27 17:48:43', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(55, '2023-03-28 02:07:47', '/work/e-visitor/admin/blocked-users.php?restoreid=37', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 37).'),
(56, '2023-03-29 01:04:50', '/work/e-visitor/', 'http://localhost/work/e-visitor/', 'login', '::1', 1, 'User logged in (ID 1).'),
(57, '2023-03-29 01:08:59', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(58, '2023-03-29 01:12:23', '/work/e-visitor/admin/blocked-users.php?restoreid=38', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 38).'),
(59, '2023-03-29 03:06:55', '/work/e-visitor/admin/visitors-list.php?checkOutID=1', 'http://localhost/work/e-visitor/admin/visitors-list.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(60, '2023-03-29 16:09:22', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 36, 'User logged in (ID 36).'),
(61, '2023-03-30 05:35:52', '/work/e-visitor/', 'http://localhost/work/e-visitor/', 'login', '::1', 1, 'User logged in (ID 1).'),
(62, '2023-03-30 07:20:47', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(63, '2023-03-30 07:49:31', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 38, 'User logged in (ID 38).'),
(64, '2023-03-30 08:23:12', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(65, '2023-03-30 09:05:07', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(66, '2023-03-30 20:35:02', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(67, '2023-03-30 23:00:44', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(68, '2023-03-30 23:02:16', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 36, 'User logged in (ID 36).'),
(69, '2023-03-30 23:04:55', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(70, '2023-03-31 10:44:15', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(71, '2023-03-31 10:46:51', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(72, '2023-04-01 02:39:31', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(73, '2023-04-01 11:34:17', '/work/e-visitor/admin/blocked-users.php?restoreid=1', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(74, '2023-04-01 11:34:31', '/work/e-visitor/admin/blocked-users.php?restoreid=36', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 36).'),
(75, '2023-04-01 11:34:50', '/work/e-visitor/admin/blocked-users.php?restoreid=37', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 37).'),
(76, '2023-04-01 11:56:53', '/work/e-visitor/admin/blocked-users.php?restoreid=37', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 37).'),
(77, '2023-04-01 13:01:32', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(78, '2023-04-01 14:22:30', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(79, '2023-04-01 17:31:15', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(80, '2023-04-01 17:45:24', '/work/e-visitor/admin/blocked-users.php?restoreid=39', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 39).'),
(81, '2023-04-01 17:48:24', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 39, 'User logged in (ID 39).'),
(82, '2023-04-01 17:49:53', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 39, 'User logged in (ID 39).'),
(83, '2023-04-01 17:53:06', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(84, '2023-04-01 23:15:40', '/work/e-visitor/admin/deactivate_office.php?deactivate_office=1', 'http://localhost/work/e-visitor/admin/office.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(85, '2023-04-01 23:18:40', '/work/e-visitor/admin/activate_office.php?activate_office=1', 'http://localhost/work/e-visitor/admin/office.php', 'update', '::1', NULL, 'User updated record (ID: 1).'),
(86, '2023-04-01 23:20:45', '/work/e-visitor/admin/deactivate_office.php?deactivate_office=7', 'http://localhost/work/e-visitor/admin/office.php', 'update', '::1', 1, 'User updated record (ID: 7).'),
(87, '2023-04-01 23:22:14', '/work/e-visitor/admin/activate_office.php?activate_office=7', 'http://localhost/work/e-visitor/admin/office.php', 'update', '::1', 1, 'User updated record (ID: 7).'),
(88, '2023-04-02 15:24:27', '/work/e-visitor/admin/visitors-list.php?checkOutID=1', 'http://localhost/work/e-visitor/admin/visitors-list.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(89, '2023-04-03 01:08:13', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(90, '2023-04-03 03:50:28', '/work/e-visitor/admin/deactivate_office.php?deactivate_office=1', 'http://localhost/work/e-visitor/admin/office.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(91, '2023-04-03 03:50:39', '/work/e-visitor/admin/activate_office.php?activate_office=1', 'http://localhost/work/e-visitor/admin/office.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(92, '2023-04-03 04:27:58', '/work/e-visitor/admin/deactivate_ids.php?deactivate_ids=1', 'http://localhost/work/e-visitor/admin/idcategory.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(93, '2023-04-03 04:28:56', '/work/e-visitor/admin/activate_ids.php?activate_ids=1', 'http://localhost/work/e-visitor/admin/idcategory.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(94, '2023-04-03 04:29:19', '/work/e-visitor/admin/deactivate_ids.php?deactivate_ids=1', 'http://localhost/work/e-visitor/admin/idcategory.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(95, '2023-04-03 04:29:50', '/work/e-visitor/admin/activate_ids.php?activate_ids=1', 'http://localhost/work/e-visitor/admin/idcategory.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(96, '2023-04-03 04:35:23', '/work/e-visitor/admin/edit_IDS.php', 'http://localhost/work/e-visitor/admin/idcategory.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(97, '2023-04-03 04:35:32', '/work/e-visitor/admin/deactivate_ids.php?deactivate_ids=1', 'http://localhost/work/e-visitor/admin/idcategory.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(98, '2023-04-03 04:40:19', '/work/e-visitor/admin/edit_user.php', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 39).'),
(99, '2023-04-03 10:58:02', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(100, '2023-04-03 12:03:10', '/work/e-visitor/admin/process-form.php', 'http://localhost/work/e-visitor/admin/visitors.php', 'insert', '::1', 1, 'User inserted a new record (ID: 15).'),
(101, '2023-04-03 12:06:44', '/work/e-visitor/admin/process-form.php', 'http://localhost/work/e-visitor/admin/visitors.php', 'insert', '::1', 1, 'User inserted a new record (ID: 16).'),
(102, '2023-04-03 12:09:01', '/work/e-visitor/admin/process-form.php', 'http://localhost/work/e-visitor/admin/visitors.php', 'insert', '::1', 1, 'User inserted a new record (ID: 17).'),
(103, '2023-04-03 12:14:11', '/work/e-visitor/admin/delete_user.php?delete_user=38', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 38).'),
(104, '2023-04-03 13:46:42', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 36, 'User logged in (ID 36).'),
(105, '2023-04-03 14:16:21', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(106, '2023-04-03 14:24:08', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(107, '2023-04-03 14:24:40', '/work/e-visitor/admin/blocked-users.php?restoreid=38', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 38).'),
(108, '2023-04-03 14:25:00', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 38, 'User logged in (ID 38).'),
(109, '2023-04-03 14:40:40', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(110, '2023-04-03 14:40:58', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 38, 'User logged in (ID 38).'),
(111, '2023-04-03 15:01:28', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 38, 'User logged in (ID 38).'),
(112, '2023-04-03 15:05:34', '/work/e-visitor/admin/visitors-list.php?checkOutID=15', 'http://localhost/work/e-visitor/admin/visitors-list.php', 'update', '::1', 38, 'User updated record (ID: 15).'),
(113, '2023-04-03 15:05:47', '/work/e-visitor/admin/visitors-list.php?checkOutID=16', 'http://localhost/work/e-visitor/admin/visitors-list.php', 'update', '::1', 38, 'User updated record (ID: 16).'),
(114, '2023-04-03 17:35:57', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(115, '2023-04-03 21:09:50', '/work/e-visitor/admin/process-form.php', 'http://localhost/work/e-visitor/admin/Visitors.php', 'insert', '::1', 1, 'User inserted a new record (ID: 18).'),
(116, '2023-04-03 21:33:15', '/work/e-visitor/admin/process-form.php', 'http://localhost/work/e-visitor/admin/Visitors.php', 'insert', '::1', 1, 'User inserted a new record (ID: 19).'),
(117, '2023-04-03 21:45:42', '/work/e-visitor/admin/visitors-list.php?checkOutID=17', 'http://localhost/work/e-visitor/admin/visitors-list.php', 'update', '::1', 1, 'User updated record (ID: 17).'),
(118, '2023-04-03 21:46:46', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 38, 'User logged in (ID 38).'),
(119, '2023-04-03 21:50:09', '/work/e-visitor/admin/visitors-list.php?checkOutID=18', 'http://localhost/work/e-visitor/admin/visitors-list.php', 'update', '::1', 38, 'User updated record (ID: 18).'),
(120, '2023-04-03 22:04:07', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 36, 'User logged in (ID 36).'),
(121, '2023-04-03 22:05:45', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(122, '2023-04-03 22:08:27', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 39, 'User logged in (ID 39).'),
(123, '2023-04-04 01:26:43', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(124, '2023-04-04 14:00:16', '/work/e-visitor/admin/delete_user.php?delete_user=38', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 38).'),
(125, '2023-04-04 14:00:32', '/work/e-visitor/admin/blocked-users.php?restoreid=38', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 38).'),
(126, '2023-04-04 17:49:18', '/work/e-visitor/admin/deactivate_office.php?deactivate_office=8', 'http://localhost/work/e-visitor/admin/office.php', 'update', '::1', 1, 'User updated record (ID: 8).'),
(127, '2023-04-04 19:42:32', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(128, '2023-04-04 20:59:33', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(129, '2023-04-04 21:02:50', '/work/e-visitor/', 'http://localhost/work/e-visitor/', 'login', '::1', 1, 'User logged in (ID 1).'),
(130, '2023-04-04 21:35:37', '/work/e-visitor/admin/activate_ids.php?activate_ids=1', 'http://localhost/work/e-visitor/admin/idcategory.php', 'update', '::1', 1, 'User updated record (ID: 1).'),
(131, '2023-04-04 21:36:23', '/work/e-visitor/admin/edit_IDS.php', 'http://localhost/work/e-visitor/admin/idcategory.php', 'update', '::1', 1, 'User updated record (ID: 2).'),
(132, '2023-04-04 21:58:08', '/work/e-visitor/admin/addDistricts.php', 'http://localhost/work/e-visitor/admin/districts.php', 'insert', '::1', 1, 'User inserted a new record (ID: ).'),
(133, '2023-04-04 21:58:30', '/work/e-visitor/admin/addDistricts.php', 'http://localhost/work/e-visitor/admin/districts.php', 'insert', '::1', 1, 'User inserted a new record (ID: ).'),
(134, '2023-04-04 21:59:21', '/work/e-visitor/admin/addDistricts.php', 'http://localhost/work/e-visitor/admin/districts.php', 'insert', '::1', 1, 'User inserted a new record (ID: ).'),
(135, '2023-04-04 22:05:35', '/work/e-visitor/admin/addIDS.php', 'http://localhost/work/e-visitor/admin/idcategory.php', 'insert', '::1', 1, 'User inserted a new record (ID: ).'),
(136, '2023-04-04 23:45:45', '/work/e-visitor/admin/reset_passwords.php?reset_user_id=39', 'http://localhost/work/e-visitor/admin/users.php', 'update', '::1', 1, 'User updated record (ID: 39).'),
(137, '2023-04-04 23:46:19', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 39, 'User logged in (ID 39).'),
(138, '2023-04-05 00:02:21', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 39, 'User logged in (ID 39).'),
(139, '2023-04-05 01:50:03', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).'),
(140, '2023-04-05 02:41:30', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 38, 'User logged in (ID 38).'),
(141, '2023-04-05 02:47:55', '/work/e-visitor/index.php', 'http://localhost/work/e-visitor/index.php', 'login', '::1', 1, 'User logged in (ID 1).');

-- --------------------------------------------------------

--
-- Table structure for table `designation_tb`
--

CREATE TABLE `designation_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation_tb`
--

INSERT INTO `designation_tb` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Reporting User'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `districts_tb`
--

CREATE TABLE `districts_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `regions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts_tb`
--

INSERT INTO `districts_tb` (`id`, `name`, `status`, `regions_id`) VALUES
(1, 'Bariadi', 1, 1),
(2, 'kishapu', 1, 2),
(3, 'maswa', 1, 1),
(4, 'lamadi', 1, 1),
(5, 'maganzo', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `idcategory_tb`
--

CREATE TABLE `idcategory_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `idcategory_tb`
--

INSERT INTO `idcategory_tb` (`id`, `name`, `status`) VALUES
(1, 'NIDA', 1),
(2, 'VOTERS-ID', 1),
(3, 'DRIVING LICENCE', 1),
(4, 'STUDENT-IDENTITY', 1),
(5, 'WORKERS-ID', 1),
(6, 'POLICE-ID', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `action` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `ip` varchar(45) NOT NULL,
  `staff_tb_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `office_branch_tb`
--

CREATE TABLE `office_branch_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `office_branch_tb`
--

INSERT INTO `office_branch_tb` (`id`, `name`) VALUES
(1, 'HQ-Dar es salaam'),
(2, 'Zonal - Dodoma');

-- --------------------------------------------------------

--
-- Table structure for table `office_tb`
--

CREATE TABLE `office_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `office_branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `office_tb`
--

INSERT INTO `office_tb` (`id`, `name`, `status`, `office_branch_id`) VALUES
(1, 'ICT', 1, 1),
(6, 'HR', 1, 1),
(7, 'LAB', 1, 1),
(8, 'MASIJARA', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `createuser` tinyint(1) NOT NULL DEFAULT 0,
  `deleteuser` tinyint(1) NOT NULL DEFAULT 0,
  `createbid` tinyint(1) NOT NULL DEFAULT 0,
  `updatebid` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `createuser`, `deleteuser`, `createbid`, `updatebid`) VALUES
(1, 'Admin', 1, 1, 1, 1),
(2, 'Reporting User', 0, 0, 1, 1),
(3, 'User', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `regions_tb`
--

CREATE TABLE `regions_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `postal_code` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regions_tb`
--

INSERT INTO `regions_tb` (`id`, `name`, `postal_code`, `status`) VALUES
(1, 'Simiyu', '2565', 1),
(2, 'Shinyanga', '25656', 1),
(3, 'MBEYA', '5678', 1),
(4, 'DODOMA', '5677', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_tb`
--

CREATE TABLE `staff_tb` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `pf_no` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT 'avatar15.jpg',
  `Regdate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `designation_id` int(11) DEFAULT NULL,
  `office_branch_id` int(11) DEFAULT NULL,
  `reset` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_tb`
--

INSERT INTO `staff_tb` (`id`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `pf_no`, `password`, `photo`, `Regdate`, `status`, `designation_id`, `office_branch_id`, `reset`) VALUES
(1, 'DOGAN', 'ROBERT', 'STEPHANO', '0742354153', 'chiefdogan19@gmail.com', '5997', '077fd57e57aab32087b0466fe6ebcca8', '1.jpg', '2023-02-28 08:55:39', 1, 1, 1, 1),
(36, 'NAJIM', 'ZUBERI', 'AHMADI', '0699201165', 'najimrugete@gmail.com', '5945', 'eeafbf4d9b3957b139da7b7f2e7f2d4a', '36.jpg', '2023-03-01 02:04:05', 1, 2, 2, 1),
(37, 'ABDULRATIF', 'ABDULRATIF', 'HUSSEIN', '621728108', 'abdulratif@gmail.com', '2011', 'facac3fd7afef092a4369536ebad3d95', '37.png', '2023-03-01 13:18:44', 1, 1, 1, 1),
(38, 'GRACE', 'PAUL', 'NYINGI', '0625831411', 'paulnyingigrace@gmail.com', '2803', '15e5c87b18c1289d45bb4a72961b58e8', '38.jpg', '2023-03-04 03:42:17', 1, 3, 1, 1),
(39, 'tino', 'james', 'mlangwa', '0783041516', 'jvalentino088@gmail.com', '888', '81dc9bdb52d04dc20036dbd8313ed055', '39.jpg', '2023-04-01 15:43:37', 1, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_tb`
--

CREATE TABLE `visitor_tb` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `middle_name` text DEFAULT NULL,
  `last_name` text NOT NULL,
  `mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitor_tb`
--

INSERT INTO `visitor_tb` (`id`, `first_name`, `middle_name`, `last_name`, `mobile`) VALUES
(15, 'DOGAN', 'ROBERT', 'collin', 621728109),
(16, 'shadrack', 'bahame', 'collin', 621728100),
(17, 'mwaikombe', 'james', 'isack', 621728108),
(18, 'nasrat', 'robert', 'manyore', 627880990),
(19, 'shadrack', 'willson', 'collin', 621728156);

-- --------------------------------------------------------

--
-- Table structure for table `visit_tb`
--

CREATE TABLE `visit_tb` (
  `id` int(11) NOT NULL,
  `card_no` varchar(250) NOT NULL,
  `time_in` datetime NOT NULL DEFAULT current_timestamp(),
  `time_out` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `to_whom` text DEFAULT NULL,
  `address` text NOT NULL,
  `id_number` text NOT NULL,
  `visit_purpose` text NOT NULL,
  `idcategory` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `districts_id` int(11) NOT NULL,
  `logs_id` int(11) DEFAULT NULL,
  `office_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visit_tb`
--

INSERT INTO `visit_tb` (`id`, `card_no`, `time_in`, `time_out`, `to_whom`, `address`, `id_number`, `visit_purpose`, `idcategory`, `staff_id`, `visitor_id`, `districts_id`, `logs_id`, `office_id`) VALUES
(1, '6161', '2023-02-03 13:03:10', '2023-04-04 18:17:38', 'mamboleo', 'kigoma', '123456797879867', 'trial', 2, 1, 15, 1, NULL, 1),
(2, '54321', '2023-04-03 13:06:44', '2023-04-03 15:05:47', 'tino', 'kigoma', '12345679787987', 'trial', 4, 1, 16, 2, NULL, 6),
(3, '54321', '2023-04-03 13:09:01', '2023-04-03 21:45:42', 'tino', 'kigoma', '1213', 'trial66', 4, 1, 17, 2, NULL, 7),
(4, '54321', '2023-04-03 13:09:49', '2023-04-03 15:05:34', 'tiff', 'kidinda', '6161100043671', 'triall', 4, 1, 15, 2, NULL, 7),
(5, '54321', '2023-04-03 15:28:13', '2023-04-03 15:05:34', 'kajigiri', 'Sima', '61611000436718', 'trial900', 4, 38, 15, 2, NULL, 8),
(6, '55997', '2023-04-03 22:09:50', '2023-04-03 21:50:09', 'rebecca', 'dar', '100100', 'product informations', 4, 1, 18, 2, NULL, 7),
(7, '0577', '2023-04-03 22:11:08', '2023-04-03 21:50:09', 'mamboleo', 'kigoma', '1234567978798778', 'trrt', 4, 1, 18, 2, NULL, 8),
(8, '6161', '2023-04-03 22:33:15', NULL, 'tino', 'kigoma', '990', 'checking', 4, 1, 19, 2, NULL, 6),
(9, '0000', '2023-04-03 22:39:31', '2023-04-03 21:50:09', 'dockta', 'kokote', '09999', 'going', 3, 1, 18, 1, NULL, 7),
(10, '6161', '2023-04-03 22:54:41', NULL, 'tiff', 'majengo', '61611000436718', 'enter', 4, 38, 15, 2, NULL, 7),
(11, '6161', '2023-04-04 22:48:00', NULL, 'kajigiri', 'majengo', '12346798868578909', 'trial day deadline date', 2, 1, 15, 2, NULL, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs_tb`
--
ALTER TABLE `activity_logs_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_tb_id` (`staff_tb_id`);

--
-- Indexes for table `designation_tb`
--
ALTER TABLE `designation_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts_tb`
--
ALTER TABLE `districts_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_districts_tb_regions_tb1_idx` (`regions_id`);

--
-- Indexes for table `idcategory_tb`
--
ALTER TABLE `idcategory_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_logs_staff_tb1_idx` (`staff_tb_id`);

--
-- Indexes for table `office_branch_tb`
--
ALTER TABLE `office_branch_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_tb`
--
ALTER TABLE `office_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_office_tb_office_branch1_idx` (`office_branch_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions_tb`
--
ALTER TABLE `regions_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_tb`
--
ALTER TABLE `staff_tb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pf_no_UNIQUE` (`pf_no`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `mobile_UNIQUE` (`mobile`),
  ADD KEY `fk_staff_tb_office_branch_tb1_idx` (`office_branch_id`),
  ADD KEY `staff_tb_ibfk_1` (`designation_id`);

--
-- Indexes for table `visitor_tb`
--
ALTER TABLE `visitor_tb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile_UNIQUE` (`mobile`);

--
-- Indexes for table `visit_tb`
--
ALTER TABLE `visit_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_visit_tb_idcategory_tb_idx` (`idcategory`),
  ADD KEY `fk_visit_tb_staff_tb1_idx` (`staff_id`),
  ADD KEY `fk_visit_tb_visitor_tb1_idx` (`visitor_id`),
  ADD KEY `fk_visit_tb_districts_tb1_idx` (`districts_id`),
  ADD KEY `fk_visit_tb_logs1_idx` (`logs_id`),
  ADD KEY `fk_visit_tb_office_tb1_idx` (`office_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs_tb`
--
ALTER TABLE `activity_logs_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `designation_tb`
--
ALTER TABLE `designation_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `districts_tb`
--
ALTER TABLE `districts_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `idcategory_tb`
--
ALTER TABLE `idcategory_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `office_branch_tb`
--
ALTER TABLE `office_branch_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `office_tb`
--
ALTER TABLE `office_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `regions_tb`
--
ALTER TABLE `regions_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_tb`
--
ALTER TABLE `staff_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `visitor_tb`
--
ALTER TABLE `visitor_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `visit_tb`
--
ALTER TABLE `visit_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs_tb`
--
ALTER TABLE `activity_logs_tb`
  ADD CONSTRAINT `activity_logs_tb_ibfk_2` FOREIGN KEY (`staff_tb_id`) REFERENCES `staff_tb` (`id`);

--
-- Constraints for table `districts_tb`
--
ALTER TABLE `districts_tb`
  ADD CONSTRAINT `fk_districts_tb_regions_tb1` FOREIGN KEY (`regions_id`) REFERENCES `regions_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `office_tb`
--
ALTER TABLE `office_tb`
  ADD CONSTRAINT `fk_office_tb_office_branch1` FOREIGN KEY (`office_branch_id`) REFERENCES `office_branch_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `staff_tb`
--
ALTER TABLE `staff_tb`
  ADD CONSTRAINT `staff_tb_ibfk_1` FOREIGN KEY (`designation_id`) REFERENCES `designation_tb` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `staff_tb_ibfk_2` FOREIGN KEY (`office_branch_id`) REFERENCES `office_branch_tb` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visit_tb`
--
ALTER TABLE `visit_tb`
  ADD CONSTRAINT `visit_tb_ibfk_1` FOREIGN KEY (`districts_id`) REFERENCES `districts_tb` (`id`),
  ADD CONSTRAINT `visit_tb_ibfk_2` FOREIGN KEY (`visitor_id`) REFERENCES `visitor_tb` (`id`),
  ADD CONSTRAINT `visit_tb_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `staff_tb` (`id`),
  ADD CONSTRAINT `visit_tb_ibfk_4` FOREIGN KEY (`idcategory`) REFERENCES `idcategory_tb` (`id`),
  ADD CONSTRAINT `visit_tb_ibfk_5` FOREIGN KEY (`office_id`) REFERENCES `office_tb` (`id`),
  ADD CONSTRAINT `visit_tb_ibfk_6` FOREIGN KEY (`logs_id`) REFERENCES `logs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
