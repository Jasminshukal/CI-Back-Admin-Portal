-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 01:21 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freshtemplate`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access_permission`
--

CREATE TABLE `tbl_access_permission` (
  `id` int(11) NOT NULL,
  `access_name` varchar(200) NOT NULL,
  `access_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_access_permission`
--

INSERT INTO `tbl_access_permission` (`id`, `access_name`, `access_code`) VALUES
(1, 'Users', 'Users'),
(2, 'Setting', 'Setting'),
(3, 'Email_template', 'Email_template'),
(4, 'Changepassword', 'Changepassword');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `last_login_ip` varchar(200) NOT NULL,
  `last_login_date` datetime NOT NULL,
  `role` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1' COMMENT '1="active" 2="inactive" ',
  `profile_image` varchar(191) NOT NULL,
  `psw_key` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `password`, `name`, `last_login_ip`, `last_login_date`, `role`, `status`, `profile_image`, `psw_key`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Jone Doi', '::1', '2019-07-29 13:20:52', 1, '1', 'lxAPYxqNmeauJywDol.png', ''),
(2, 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 'Admin ', '::1', '2019-06-19 07:52:37', 2, '1', 'assets/profile_img/20190618094040.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email`
--

CREATE TABLE `tbl_email` (
  `id` int(11) NOT NULL,
  `email_contact` text NOT NULL,
  `email_name` text NOT NULL,
  `email_subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_email`
--

INSERT INTO `tbl_email` (`id`, `email_contact`, `email_name`, `email_subject`) VALUES
(1, 'hello {[NAME]}\r\n', 'Welcome', 'welcome Subject');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(12) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `role_access` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role_name`, `role_access`, `date_added`, `date_updated`) VALUES
(1, 'Super_Admin', '{\"Users\":1,\"Setting\":1,\"Email_template\":1,\"Changepassword\":1}', '2019-03-01 00:00:00', '2019-03-09 08:42:45'),
(2, 'admin', '{\"Users\":1,\"Setting\":1,\"Email_template\":1,\"Changepassword\":1}', '2019-03-01 00:00:00', '2019-07-12 10:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `field_name`, `field_value`) VALUES
(1, 'name', 'Topp’d Off'),
(2, 'site_url', 'http://app.wessexinvestment.com/'),
(3, 'app_token', '142536987458965847589625487'),
(4, 'app_logo', '15643990241518112811.jpg'),
(5, 'footer_text', 'Copyright © 2019. All Rights Reserved by Topp’d Off'),
(6, 'theam_color', 'default'),
(7, 'favicon', '15643990321694301241.ico'),
(8, 'success_color', 'green-haze'),
(9, 'danger_color', 'red-thunderbird'),
(10, 'warning_button_color', 'grey-salt'),
(11, 'layout', 'layout/default');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_access_permission`
--
ALTER TABLE `tbl_access_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email`
--
ALTER TABLE `tbl_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_access_permission`
--
ALTER TABLE `tbl_access_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_email`
--
ALTER TABLE `tbl_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
