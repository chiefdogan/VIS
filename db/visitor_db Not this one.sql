-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 01:22 PM
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
-- Database: `visitor_db`
--

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
  `status` tinyint(1) NOT NULL,
  `regions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `idcategory_tb`
--

CREATE TABLE `idcategory_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'DAR ES SALAAM'),
(2, 'DODOMA');

-- --------------------------------------------------------

--
-- Table structure for table `office_tb`
--

CREATE TABLE `office_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `office_branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `office_tb`
--

INSERT INTO `office_tb` (`id`, `name`, `status`, `office_branch_id`) VALUES
(1, 'TBS', 1, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `regions_tb`
--

CREATE TABLE `regions_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `postal_code` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `office_branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_tb`
--

INSERT INTO `staff_tb` (`id`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `pf_no`, `password`, `photo`, `Regdate`, `status`, `designation_id`, `office_branch_id`) VALUES
(1, 'DOGAN', 'ROBERT', 'STEPHANO', '0742354153', 'chiefdogan19@gmail.com', '5997', '077fd57e57aab32087b0466fe6ebcca8', 'avatar15.jpg', '2023-02-28 08:55:39', 1, 1, 1),
(36, 'NAJIM', 'ZUBERI', 'AHMADI', '0699201165', 'najimrugete@gmail.com', '5945', '9c8d8702c2e154057a4b0bd590a4cbd3', 'avatar15.jpg', '2023-03-01 02:04:05', 1, 2, 2),
(37, 'ABDULRATIF', 'HUSSEIN', 'MOHAMED', '0756401798', 'abdulratif@gmail.com', '2011', 'facac3fd7afef092a4369536ebad3d95', 'avatar15.jpg', '2023-03-01 13:18:44', 1, 1, 1),
(38, 'GRACE', 'PAUL', 'NYINGI', '0625831411', 'paulnyingigrace@gmail.com', '2803', '15e5c87b18c1289d45bb4a72961b58e8', 'avatar15.jpg', '2023-03-04 03:42:17', 1, 3, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `visit_tb`
--

CREATE TABLE `visit_tb` (
  `id` int(11) NOT NULL,
  `card_no` varchar(250) NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `to_whom` text DEFAULT NULL,
  `address` text NOT NULL,
  `id_number` text NOT NULL,
  `visit_purpose` text NOT NULL,
  `idcategory` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `districts_id` int(11) NOT NULL,
  `logs_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `designation_tb`
--
ALTER TABLE `designation_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `districts_tb`
--
ALTER TABLE `districts_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `idcategory_tb`
--
ALTER TABLE `idcategory_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions_tb`
--
ALTER TABLE `regions_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_tb`
--
ALTER TABLE `staff_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `visitor_tb`
--
ALTER TABLE `visitor_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts_tb`
--
ALTER TABLE `districts_tb`
  ADD CONSTRAINT `fk_districts_tb_regions_tb1` FOREIGN KEY (`regions_id`) REFERENCES `regions_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_staff_tb1` FOREIGN KEY (`staff_tb_id`) REFERENCES `staff_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_visit_tb_districts_tb1` FOREIGN KEY (`districts_id`) REFERENCES `districts_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_visit_tb_idcategory_tb` FOREIGN KEY (`idcategory`) REFERENCES `idcategory_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_visit_tb_logs1` FOREIGN KEY (`logs_id`) REFERENCES `logs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_visit_tb_office_tb1` FOREIGN KEY (`office_id`) REFERENCES `office_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_visit_tb_staff_tb1` FOREIGN KEY (`staff_id`) REFERENCES `staff_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_visit_tb_visitor_tb1` FOREIGN KEY (`visitor_id`) REFERENCES `visitor_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
