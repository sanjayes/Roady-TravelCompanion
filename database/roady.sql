-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 08:28 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roady`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dt`
--

CREATE TABLE `tbl_dt` (
  `dt_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `dt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dt`
--

INSERT INTO `tbl_dt` (`dt_id`, `st_id`, `dt`) VALUES
(1, 13, 'Kasaragod '),
(2, 13, 'Wayanad '),
(3, 13, 'Kannur '),
(4, 13, 'Kozhikode '),
(5, 13, 'Malappuram '),
(6, 13, 'Palakkad '),
(7, 13, 'Thrissur '),
(8, 13, 'Ernakulam '),
(9, 13, 'Alappuzha '),
(10, 13, 'Kottayam '),
(11, 13, 'Pathanamthitta '),
(12, 13, 'Kollam '),
(13, 13, 'Idukki '),
(14, 13, 'Thiruvananthapuram ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(30) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `phno` varchar(15) NOT NULL,
  `u_type` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `approval_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`u_id`, `u_name`, `u_email`, `passwd`, `phno`, `u_type`, `status`, `approval_status`) VALUES
(0, 'Admin', 'admin@roady.com', '21232f297a57a5a743894a0e4a801fc3', '', 'admin', 0, 0),
(1, 'KVR Bajaj', 'kvr@mail.com', '00e1749bcdb8c6ab5d9656dd61939daa', '9812315649', 'service', 0, 1),
(2, 'Sneha', 'sneha@mail.com', 'e26bfda67f49ca1fc48f9b51003a5910', '8289917665', 'user', 0, 0),
(3, 'Nandhu', 'nandhu@mail.com', 'b51ac5a5f95c578fd75deb0535c044d9', '9658745896', 'user', 0, 0),
(4, 'Sanjay', 'sanjay@mca.ajce.in', '5f1c5342818bf8c161d8ff4e18ff1720', '9562214665', 'user', 0, 0),
(5, 'Mithun Mathew', 'mithun@mail.com', 'db413d6fbb1d9d0ced3e178e8adbcd97', '8525852365', 'user', 0, 0),
(6, 'Signature', 'signature@mail.com', '04b29480233f4def5c875875b6bdc3b1', '7845124578', 'service', 0, 1),
(7, 'Sham Car', 'sham@mail.com', '37244e6b9600999782d80637b433aad7', '8547856589', 'service', 0, 1),
(8, 'Shibu Workshop', 'shibu@mail.com', '4f4b3d5a704d603ca88b2aaac3a3d73f', '9865214589', 'service', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `oid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_otp`
--

INSERT INTO `tbl_otp` (`oid`, `email`, `otp`) VALUES
(53, 'ajilsunny007@gmail.com', 592985),
(54, 'sanjay@mca.ajce.in', 255592),
(55, 'email', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_srvc_data`
--

CREATE TABLE `tbl_srvc_data` (
  `id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `loc` varchar(40) NOT NULL,
  `file` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_srvc_data`
--

INSERT INTO `tbl_srvc_data` (`id`, `l_id`, `loc`, `file`) VALUES
(1, 1, 'Kannur', 'angeles.jpg'),
(2, 6, 'Kannur', 'image1.jpg'),
(3, 7, 'Palakad', 'image12.jpg'),
(4, 8, 'Erumely', 'image44.jpg'),
(5, 9, 'Koxhi', 'image6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_srvc_details`
--

CREATE TABLE `tbl_srvc_details` (
  `profile_status` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `owner_name` varchar(30) DEFAULT NULL,
  `reg_id` int(11) DEFAULT NULL,
  `lic_no` int(11) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `pin` int(11) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `doc` varchar(5000) DEFAULT NULL,
  `img` varchar(5000) DEFAULT NULL,
  `infrastructure` varchar(10) DEFAULT NULL,
  `w_count` int(11) DEFAULT NULL,
  `s_count` int(11) DEFAULT NULL,
  `h_svc` int(11) DEFAULT NULL,
  `van` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_srvc_details`
--

INSERT INTO `tbl_srvc_details` (`profile_status`, `id`, `u_id`, `owner_name`, `reg_id`, `lic_no`, `street`, `city`, `district`, `state`, `pin`, `description`, `doc`, `img`, `infrastructure`, `w_count`, `s_count`, `h_svc`, `van`) VALUES
(0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(0, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(0, 3, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(0, 4, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `st_id` int(11) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`st_id`, `state`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chhattisgarh'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh '),
(10, 'Jammu and Kashmir '),
(11, 'Jharkhand '),
(12, 'Karnataka '),
(13, 'Kerala'),
(14, 'Madhya Pradesh '),
(15, 'Maharashtra '),
(16, 'Manipur'),
(17, 'Meghalaya'),
(18, 'Mizoram'),
(19, 'Nagaland'),
(20, 'Odisha'),
(21, 'Punjab '),
(22, 'Rajasthan'),
(23, 'Sikkim'),
(24, 'Tamil Nadu '),
(25, 'Telangana'),
(26, 'Tripura'),
(27, 'Uttar Pradesh '),
(28, 'Uttarakhand '),
(29, 'West Bengal ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userloc`
--

CREATE TABLE `tbl_userloc` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `lat` int(11) NOT NULL,
  `long` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uservehicle`
--

CREATE TABLE `tbl_uservehicle` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `v_manufacturer` varchar(30) NOT NULL,
  `v_model` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_details`
--

CREATE TABLE `tbl_user_details` (
  `id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `house_name` varchar(30) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `pin` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`id`, `u_id`, `house_name`, `street`, `district`, `state`, `pin`, `dob`, `gender`) VALUES
(1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `tbl_dt`
--
ALTER TABLE `tbl_dt`
  ADD PRIMARY KEY (`dt_id`),
  ADD KEY `st_id` (`st_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tbl_srvc_data`
--
ALTER TABLE `tbl_srvc_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_srvc_data_ibfk_1` (`l_id`);

--
-- Indexes for table `tbl_srvc_details`
--
ALTER TABLE `tbl_srvc_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_userloc`
--
ALTER TABLE `tbl_userloc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_uservehicle`
--
ALTER TABLE `tbl_uservehicle`
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
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
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dt`
--
ALTER TABLE `tbl_dt`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_srvc_data`
--
ALTER TABLE `tbl_srvc_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_srvc_details`
--
ALTER TABLE `tbl_srvc_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_userloc`
--
ALTER TABLE `tbl_userloc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `tbl_booking_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `tbl_login` (`u_id`);

--
-- Constraints for table `tbl_dt`
--
ALTER TABLE `tbl_dt`
  ADD CONSTRAINT `tbl_dt_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `tbl_state` (`st_id`);

--
-- Constraints for table `tbl_uservehicle`
--
ALTER TABLE `tbl_uservehicle`
  ADD CONSTRAINT `tbl_uservehicle_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `tbl_login` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
