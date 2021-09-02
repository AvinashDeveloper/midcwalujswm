-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2020 at 01:48 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahindra_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain_tbl`
--

CREATE TABLE `complain_tbl` (
  `complain_id` int(11) NOT NULL,
  `complainer_name` varchar(100) NOT NULL,
  `complainer_email` varchar(100) NOT NULL,
  `complainer_mobile` varchar(15) NOT NULL,
  `complain_text` text NOT NULL,
  `complain_create_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain_tbl`
--

INSERT INTO `complain_tbl` (`complain_id`, `complainer_name`, `complainer_email`, `complainer_mobile`, `complain_text`, `complain_create_dt`) VALUES
(1, 'amendil', 'amendil@gmail.com', '9999999998', 'its not working....        ', '2020-10-10 11:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contactus_id` int(11) NOT NULL,
  `contactus_name` varchar(100) NOT NULL,
  `contactus_email` varchar(50) NOT NULL,
  `contactus_mobile` varchar(15) NOT NULL,
  `contactus_message` text NOT NULL,
  `contactus_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `contactus_create_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contactus_id`, `contactus_name`, `contactus_email`, `contactus_mobile`, `contactus_message`, `contactus_status`, `contactus_create_dt`) VALUES
(1, 'qwdf', 'admin@gmail.com', '7697644835', '    sadfasdasdwcc          ', 'Active', '2020-10-09 16:51:24'),
(7, 'acac', 'hotbitinfotech@gmail.com', '919753514316', '123qwerqwe             ', 'Active', '2020-10-09 17:00:04'),
(9, 'qwe', 'nelsonshari@yahoo.com', '919753514316', '123weqwe', 'Active', '2020-10-09 17:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(200) NOT NULL,
  `image_title` varchar(100) NOT NULL,
  `image_originalname` text NOT NULL,
  `image_status` enum('Active','Inactive','Delete') NOT NULL DEFAULT 'Active',
  `image_create_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`image_id`, `image_name`, `image_title`, `image_originalname`, `image_status`, `image_create_dt`) VALUES
(1, 'down1_1602157660.jpg', 'Garbage', 'down1.jpg', 'Active', '2020-10-08 17:17:41'),
(3, 'blog-img2_1602246927.jpg', 'Gallery-images', 'blog_img2.jpg', 'Active', '2020-10-09 18:05:27'),
(4, 'blog-img3_1602246927.jpg', 'Gallery-images', 'blog_img3.jpg', 'Active', '2020-10-09 18:05:27'),
(5, 'blog-img4_1602246927.jpg', 'Gallery-images', 'blog_img4.jpg', 'Active', '2020-10-09 18:05:27'),
(6, 'blog-img5_1602246927.jpg', 'Gallery-images', 'blog_img5.jpg', 'Active', '2020-10-09 18:05:27'),
(7, 'blog-img6_1602246927.jpg', 'Gallery-images', 'blog_img6.jpg', 'Active', '2020-10-09 18:05:27'),
(8, 'blog-img7_1602246927.jpg', 'Gallery-images', 'blog_img7.jpg', 'Active', '2020-10-09 18:05:27'),
(9, 'brakes_1602246927.jpg', 'Gallery-images', 'brakes.jpg', 'Active', '2020-10-09 18:05:27'),
(10, 'history-2_1602246927.jpg', 'Gallery-images', 'history_2.jpg', 'Active', '2020-10-09 18:05:27'),
(11, 'history-3_1602246927.jpg', 'Gallery-images', 'history_3.jpg', 'Active', '2020-10-09 18:05:27'),
(12, 'oil_1602246927.jpg', 'Gallery-images', 'oil.jpg', 'Active', '2020-10-09 18:05:27'),
(13, 'pic-5_1602246927.jpg', 'Gallery-images', 'pic_5.jpg', 'Active', '2020-10-09 18:05:27'),
(14, 'pic-6_1602246927.jpg', 'Gallery-images', 'pic_6.jpg', 'Active', '2020-10-09 18:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(200) NOT NULL,
  `slider_status` enum('Active','Inactive','Delete') NOT NULL,
  `slider_create_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`slider_id`, `slider_image`, `slider_status`, `slider_create_dt`) VALUES
(1, 'background-infoTable_1602245427.jpg', 'Active', '2020-10-09 17:40:27'),
(2, 'background-1_1602245427.jpg', 'Active', '2020-10-09 17:40:27'),
(3, 'background-4_1602245427.jpg', 'Active', '2020-10-09 17:40:27'),
(4, 'background-5_1602245427.jpg', 'Active', '2020-10-09 17:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `user_profile_img` text NOT NULL,
  `user_firstname` varchar(100) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_mobile` varchar(15) NOT NULL,
  `user_password` text NOT NULL,
  `user_status` enum('Active','Inactive','Delete') NOT NULL DEFAULT 'Active',
  `user_create_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_role`, `user_profile_img`, `user_firstname`, `user_lastname`, `user_name`, `user_email`, `user_mobile`, `user_password`, `user_status`, `user_create_dt`) VALUES
(1, 'super_admin', '', 'admin', '', 'admin', 'admin@gmail.com', '', '123456', 'Active', '2020-10-08 11:40:26'),
(2, 'user', 'images12.png', 'userone', '', 'user_one', 'userone@gmail.com', '23423423234', '123456', 'Active', '2020-10-08 13:18:54'),
(3, 'user', '1602154243_download15.jpg', 'amendil', '', 'amendil', 'amendil@gmail.com', '9999999998', 'amendil', 'Active', '2020-10-08 15:46:08'),
(11, 'user', '1602315244_gregory.jpg', 'user11', '', 'user11', 'user11@gmail.com', '79898756734', 'user11', 'Active', '2020-10-10 12:54:46'),
(12, 'user', '', 'ACS', '', 'ABCD1', 'ABCD1@gmail.com', '798457938', '123456', 'Inactive', '2020-10-10 16:34:08'),
(13, 'user', '', 'Agdh', '', 'AGDH', 'AGDH@gmail.com', '467675675', '123456', 'Inactive', '2020-10-10 16:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `vehical_info`
--

CREATE TABLE `vehical_info` (
  `vehical_id` int(11) NOT NULL,
  `ticket_no` varchar(200) NOT NULL,
  `vehical_number` varchar(200) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `vehical_weight_measure` enum('Kilograms','Pounds','Ounces','Grams','Stones') NOT NULL,
  `gross_weight` double NOT NULL,
  `tare_weight` double NOT NULL,
  `vehical_weight` varchar(100) NOT NULL,
  `vehical_entry_time` time NOT NULL,
  `vehical_exist_time` time NOT NULL,
  `supervisor_name` varchar(100) NOT NULL,
  `vehical_company_name` varchar(100) NOT NULL,
  `vehical_status` enum('Active','Inactive','Delete') NOT NULL,
  `vehical_create_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehical_info`
--

INSERT INTO `vehical_info` (`vehical_id`, `ticket_no`, `vehical_number`, `item_name`, `vehical_weight_measure`, `gross_weight`, `tare_weight`, `vehical_weight`, `vehical_entry_time`, `vehical_exist_time`, `supervisor_name`, `vehical_company_name`, `vehical_status`, `vehical_create_dt`) VALUES
(1, 'ticket1', 'sdf324rwr', 'item 1', 'Pounds', 1234, 555, '2342', '17:52:00', '17:52:00', 'arvind', 'Mahindra', 'Active', '2020-10-08 00:00:00'),
(2, 'ticket2', 'abcd123', 'item2', 'Kilograms', 50000, 50000, '50000', '16:00:00', '17:00:00', 'arvind2', 'Mahindra', 'Active', '2020-10-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `waste_processing`
--

CREATE TABLE `waste_processing` (
  `processing_id` int(11) NOT NULL,
  `measurement` enum('Kilograms','Pounds','Ounces','Grams','Stones') NOT NULL,
  `total_wet_waste_collection` double NOT NULL,
  `total_dry_waste_collection` double NOT NULL,
  `total_garden_waste_collection` double NOT NULL,
  `total_wet_waste_processing` double NOT NULL,
  `total_dry_waste_processing` double NOT NULL,
  `total_garden_waste_processing` double NOT NULL,
  `non_processable_dry_waste_dispose` double NOT NULL,
  `rejects_send_landfill_sites` double NOT NULL,
  `processing_status` enum('Active','Inactive','Delete') NOT NULL,
  `processing_create_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waste_processing`
--

INSERT INTO `waste_processing` (`processing_id`, `measurement`, `total_wet_waste_collection`, `total_dry_waste_collection`, `total_garden_waste_collection`, `total_wet_waste_processing`, `total_dry_waste_processing`, `total_garden_waste_processing`, `non_processable_dry_waste_dispose`, `rejects_send_landfill_sites`, `processing_status`, `processing_create_dt`) VALUES
(1, 'Kilograms', 1233, 2342, 234, 2133, 4554, 2345, 1222, -4334, 'Active', '2020-10-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `waste_schedule`
--

CREATE TABLE `waste_schedule` (
  `schedule_id` int(11) NOT NULL,
  `vehical_number` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `driver_name` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waste_schedule`
--

INSERT INTO `waste_schedule` (`schedule_id`, `vehical_number`, `location`, `time_in`, `time_out`, `driver_name`, `company_name`, `status`, `create_date`) VALUES
(1, '1', 'indore-pune', '01:32:00', '12:32:00', 'abcd', 'Mahindra', 'Active', '2020-10-09 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain_tbl`
--
ALTER TABLE `complain_tbl`
  ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contactus_id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehical_info`
--
ALTER TABLE `vehical_info`
  ADD PRIMARY KEY (`vehical_id`);

--
-- Indexes for table `waste_processing`
--
ALTER TABLE `waste_processing`
  ADD PRIMARY KEY (`processing_id`);

--
-- Indexes for table `waste_schedule`
--
ALTER TABLE `waste_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain_tbl`
--
ALTER TABLE `complain_tbl`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contactus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vehical_info`
--
ALTER TABLE `vehical_info`
  MODIFY `vehical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `waste_processing`
--
ALTER TABLE `waste_processing`
  MODIFY `processing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `waste_schedule`
--
ALTER TABLE `waste_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
