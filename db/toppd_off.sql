-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2019 at 09:16 AM
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
-- Database: `toppd_off`
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
(4, 'Changepassword', 'Changepassword'),
(5, 'Order', 'Order');

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
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Jone Doi', '::1', '2019-08-01 09:11:06', 1, '1', 'MAMy8X9xHNINcM1kuY.png', ''),
(2, 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 'Admin ', '::1', '2019-07-23 15:18:44', 2, '1', 'assets/profile_img/20190723150730.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_available_time`
--

CREATE TABLE `tbl_available_time` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `is_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `brand_name`, `is_delete`) VALUES
(1, 'suzuki', 0);

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
-- Table structure for table `tbl_model`
--

CREATE TABLE `tbl_model` (
  `id` int(11) NOT NULL,
  `model_name` varchar(200) NOT NULL,
  `is_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_model`
--

INSERT INTO `tbl_model` (`id`, `model_name`, `is_delete`) VALUES
(1, 'Shwift', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `uid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` float NOT NULL,
  `fees` float NOT NULL,
  `total_amount` float NOT NULL,
  `order_id` text NOT NULL,
  `location_address` varchar(200) NOT NULL,
  `location_lat` varchar(200) NOT NULL,
  `location_lng` varchar(200) NOT NULL,
  `location_place_id` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `color` varchar(200) NOT NULL,
  `plate_number` varchar(200) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `order_date_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `order_date`, `order_time`, `uid`, `qty`, `amount`, `fees`, `total_amount`, `order_id`, `location_address`, `location_lat`, `location_lng`, `location_place_id`, `brand_id`, `model_id`, `color`, `plate_number`, `ip`, `order_date_time`, `status`) VALUES
(1, '2019-07-24', '17:32:00', 1, 1, 1400, 500, 1900, 'ORD24072019UID1AMUNT199', 'rajkot', '7485664.14', '7854112.14', 'jnbsvfaadcsahcGGHghtytuyvjhvxcsd', 1, 1, 'Silver', 'GJ10BF7896', '103.78.120', '2019-07-25 00:07:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `txn_id` int(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_response` text NOT NULL,
  `amount` float NOT NULL,
  `fees` float NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Super_Admin', '{\"Users\":1,\"Setting\":1,\"Email_template\":0,\"Changepassword\":1,\"Order\":1}', '2019-03-01 00:00:00', '2019-03-09 08:42:45'),
(2, 'admin', '{\"Users\":1,\"Setting\":0,\"Email_template\":0,\"Changepassword\":1,\"Order\":1}', '2019-03-01 00:00:00', '2019-07-26 11:49:53');

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
(4, 'app_logo', '1564462820682420990.png'),
(5, 'footer_text', 'Copyright © 2019. All Rights Reserved by Topp’d Off'),
(6, 'theam_color', 'default'),
(7, 'favicon', '15638682521245203377.png'),
(8, 'success_color', 'blue'),
(9, 'danger_color', 'red-thunderbird'),
(10, 'warning_button_color', 'yellow-crusta'),
(11, 'layout', 'layout/default');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `location_address` varchar(200) NOT NULL,
  `location_lat` varchar(200) NOT NULL,
  `location_lng` varchar(200) NOT NULL,
  `location_place_id` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `color` varchar(200) NOT NULL,
  `plate_number` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0= inactive , 1 = Active ',
  `regi_date` datetime NOT NULL,
  `regi_ip` varchar(200) NOT NULL,
  `login_date` datetime NOT NULL,
  `login_ip` varchar(200) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  `is_developer` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `phone`, `email`, `location_address`, `location_lat`, `location_lng`, `location_place_id`, `brand_id`, `model_id`, `color`, `plate_number`, `status`, `regi_date`, `regi_ip`, `login_date`, `login_ip`, `is_delete`, `is_developer`) VALUES
(1, 'Jone Doy', '70961111', 'jone@smart-webtech.com', 'San Nicolás de los Garza, N.L., México', '25.7493469', '-100.2868973', 'ChIJAw16yguTYoYRpyEPQQtm8ho', 14, 1, 'silver', 'GJ-10-4812', 1, '2019-07-26 07:15:15', '134.78.414.78\r\n', '2019-07-26 07:21:18', '142.78.96.14', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_doc`
--

CREATE TABLE `tbl_user_doc` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `doc_type` int(11) NOT NULL COMMENT '1 =  img , 2 = PDF ',
  `image_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_order`
-- (See below for the actual view)
--
CREATE TABLE `view_order` (
`id` int(11)
,`order_date` date
,`order_time` time
,`uid` int(11)
,`qty` int(11)
,`amount` float
,`fees` float
,`total_amount` float
,`order_id` text
,`location_address` varchar(200)
,`location_lat` varchar(200)
,`location_lng` varchar(200)
,`location_place_id` text
,`brand_id` int(11)
,`model_id` int(11)
,`color` varchar(200)
,`plate_number` varchar(200)
,`ip` varchar(200)
,`order_date_time` datetime
,`status` int(11)
,`name` varchar(200)
,`model_name` varchar(200)
,`brand_name` varchar(200)
);

-- --------------------------------------------------------

--
-- Structure for view `view_order`
--
DROP TABLE IF EXISTS `view_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_order`  AS  select `ord`.`id` AS `id`,`ord`.`order_date` AS `order_date`,`ord`.`order_time` AS `order_time`,`ord`.`uid` AS `uid`,`ord`.`qty` AS `qty`,`ord`.`amount` AS `amount`,`ord`.`fees` AS `fees`,`ord`.`total_amount` AS `total_amount`,`ord`.`order_id` AS `order_id`,`ord`.`location_address` AS `location_address`,`ord`.`location_lat` AS `location_lat`,`ord`.`location_lng` AS `location_lng`,`ord`.`location_place_id` AS `location_place_id`,`ord`.`brand_id` AS `brand_id`,`ord`.`model_id` AS `model_id`,`ord`.`color` AS `color`,`ord`.`plate_number` AS `plate_number`,`ord`.`ip` AS `ip`,`ord`.`order_date_time` AS `order_date_time`,`ord`.`status` AS `status`,`usr`.`name` AS `name`,`m`.`model_name` AS `model_name`,`b`.`brand_name` AS `brand_name` from (((`tbl_order` `ord` join `tbl_users` `usr` on((`ord`.`uid` = `usr`.`id`))) join `tbl_model` `m` on((`ord`.`model_id` = `m`.`id`))) join `tbl_brand` `b` on((`ord`.`brand_id` = `b`.`id`))) ;

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
-- Indexes for table `tbl_available_time`
--
ALTER TABLE `tbl_available_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email`
--
ALTER TABLE `tbl_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_model`
--
ALTER TABLE `tbl_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
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
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_access_permission`
--
ALTER TABLE `tbl_access_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_available_time`
--
ALTER TABLE `tbl_available_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_email`
--
ALTER TABLE `tbl_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_model`
--
ALTER TABLE `tbl_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
