-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2022 at 04:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduler_db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(30) NOT NULL,
  `patient_id` int(30) NOT NULL,
  `date_sched` datetime NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `date_sched`, `date_created`) VALUES
(17, 29, '2021-12-24 21:48:00', '2021-12-24 17:45:13'),
(18, 31, '2021-12-25 18:32:00', '2021-12-25 02:25:03'),
(19, 32, '2021-12-25 13:17:00', '2021-12-25 09:09:05'),
(20, 33, '2021-12-25 13:17:00', '2021-12-25 09:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `corperate`
--

CREATE TABLE `corperate` (
  `ID` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `staff` varchar(250) NOT NULL,
  `service` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `corperate`
--

INSERT INTO `corperate` (`ID`, `name`, `email`, `address`, `price`, `code`, `staff`, `service`) VALUES
(1, 'Quantum', 'qt@quantumclinic.com', 'L.A', '$1400.00', 'quantum_corp', '10', 'Float'),
(2, 'citidigit', 'citidigit@citi.com', 'L.A', '$1300.00', 'citi_corp', '10', 'Yoga'),
(3, 'Idris Oyibo Igagwu', 'eadrisoyibo@gmail.com', 'no.5b haj estate kubwa abuja', '11', '620853', '12', 'Massage');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(30) NOT NULL,
  `location` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `max_a_day` int(5) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`, `description`, `max_a_day`, `date_created`, `date_updated`) VALUES
(1, 'Vaccination Location 1, Sample City, Negros Occidental', '&lt;p&gt;&lt;span style=&quot;text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus accumsan ac justo consequat dignissim. Nam eget pretium nisl, at tempor velit. Sed vel nisl a metus porta placerat in in neque. Praesent aliquam nisi nisl, eget porta lacus iaculis ac. Fusce dignissim et nibh vel euismod. Vestibulum eget enim metus. Ut faucibus, lectus facilisis eleifend dignissim, ligula lorem porttitor elit, eu placerat odio urna quis augue. Proin rutrum, enim in auctor rhoncus, turpis ipsum rutrum sem, nec varius purus nisi at dolor. Donec porta turpis vel erat iaculis, eget consequat mauris dapibus. Nullam euismod quam sagittis nisl maximus auctor. Duis turpis nisi, condimentum eget interdum ut, ultricies non turpis. Donec auctor a mi at commodo. Vivamus ultrices venenatis orci, vel venenatis sem pharetra ac. Ut scelerisque lorem sed purus facilisis lacinia.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 500, '2021-06-28 09:52:13', '2021-06-28 09:52:39'),
(4, 'Sample location  2', '&lt;p&gt;Sample only&lt;/p&gt;', 100, '2021-06-28 16:19:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_list`
--

CREATE TABLE `patient_list` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `service_length` text NOT NULL,
  `price` text NOT NULL,
  `service` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_list`
--

INSERT INTO `patient_list` (`id`, `name`, `date_created`, `service_length`, `price`, `service`, `email`) VALUES
(29, 'Idris Oyibo Igagwu', '2021-12-24 17:45:13', '12min', '120', 'hhah', 'eadrisoyibo@gmail.com'),
(30, 'Idris Oyibo Igagwu', '2021-12-24 21:59:15', '', '', '', 'eadrisoyibo@gmail.com'),
(31, 'Idris Oyibo Igagwu', '2021-12-25 02:25:03', '12min', '120', 'masg', 'eadrisoyibo@gmail.com'),
(32, 'Idris Oyibo Igagwu', '2021-12-25 09:09:05', '12min', '150', 'room massage', 'eadrisoyibo@gmail.com'),
(33, 'Idris Oyibo Igagwu', '2021-12-25 09:09:35', '12min', '120', 'masg1', 'goodnessdaniel101@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patient_meta`
--

CREATE TABLE `patient_meta` (
  `patient_id` int(30) NOT NULL,
  `meta_field` text DEFAULT NULL,
  `meta_value` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_meta`
--

INSERT INTO `patient_meta` (`patient_id`, `meta_field`, `meta_value`, `date_created`) VALUES
(30, 'id', '', '2021-12-24 21:59:15'),
(30, 'patient_id', '', '2021-12-24 21:59:15'),
(30, 'name', 'Idris Oyibo Igagwu', '2021-12-24 21:59:15'),
(30, 'email', 'eadrisoyibo@gmail.com', '2021-12-24 21:59:15'),
(30, 'contact', '12', '2021-12-24 21:59:15'),
(29, 'id', '17', '2021-12-24 23:50:23'),
(29, 'patient_id', '29', '2021-12-24 23:50:23'),
(29, 'name', 'Idris Oyibo Igagwu', '2021-12-24 23:50:23'),
(29, 'email', 'eadrisoyibo@gmail.com', '2021-12-24 23:50:23'),
(29, 'service', '12min', '2021-12-24 23:50:23'),
(29, 'service_length', '12min', '2021-12-24 23:50:23'),
(29, 'price', '120', '2021-12-24 23:50:23'),
(29, 'organization', 'fhi360', '2021-12-24 23:50:23'),
(29, 'gender', 'Female', '2021-12-24 23:50:23'),
(29, 'dob', '2021-12-26', '2021-12-24 23:50:23'),
(29, 'address', 'no.5b haj estate kubwa abuja', '2021-12-24 23:50:23'),
(29, 'zipcode', '1999', '2021-12-24 23:50:23'),
(31, 'id', '', '2021-12-25 02:25:03'),
(31, 'patient_id', '', '2021-12-25 02:25:03'),
(31, 'name', 'Idris Oyibo Igagwu', '2021-12-25 02:25:03'),
(31, 'email', 'eadrisoyibo@gmail.com', '2021-12-25 02:25:03'),
(31, 'service', 'masg', '2021-12-25 02:25:03'),
(31, 'service_length', '12min', '2021-12-25 02:25:03'),
(31, 'price', '120', '2021-12-25 02:25:03'),
(31, 'organization', 'fhi360', '2021-12-25 02:25:03'),
(31, 'gender', 'Male', '2021-12-25 02:25:03'),
(31, 'dob', '2022-01-08', '2021-12-25 02:25:03'),
(31, 'address', 'no.5b haj estate kubwa abuja', '2021-12-25 02:25:03'),
(31, 'zipcode', '900001', '2021-12-25 02:25:03'),
(32, 'id', '', '2021-12-25 09:09:05'),
(32, 'patient_id', '', '2021-12-25 09:09:05'),
(32, 'name', 'Idris Oyibo Igagwu', '2021-12-25 09:09:05'),
(32, 'email', 'eadrisoyibo@gmail.com', '2021-12-25 09:09:05'),
(32, 'service', 'room massage', '2021-12-25 09:09:05'),
(32, 'service_length', '12min', '2021-12-25 09:09:05'),
(32, 'price', '150', '2021-12-25 09:09:05'),
(32, 'organization', 'fhi360', '2021-12-25 09:09:05'),
(32, 'gender', 'Male', '2021-12-25 09:09:05'),
(32, 'dob', '2021-12-26', '2021-12-25 09:09:05'),
(32, 'address', 'no.5b haj estate kubwa abuja', '2021-12-25 09:09:05'),
(32, 'zipcode', '900001', '2021-12-25 09:09:05'),
(33, 'id', '', '2021-12-25 09:09:35'),
(33, 'patient_id', '', '2021-12-25 09:09:35'),
(33, 'name', 'Idris Oyibo Igagwu', '2021-12-25 09:09:35'),
(33, 'email', 'goodnessdaniel101@gmail.com', '2021-12-25 09:09:35'),
(33, 'service', 'masg1', '2021-12-25 09:09:35'),
(33, 'service_length', '12min', '2021-12-25 09:09:35'),
(33, 'price', '120', '2021-12-25 09:09:35'),
(33, 'organization', 'fhi360', '2021-12-25 09:09:35'),
(33, 'gender', 'Male', '2021-12-25 09:09:35'),
(33, 'dob', '2022-01-02', '2021-12-25 09:09:35'),
(33, 'address', 'Plot B267 Penthouse 3 Estate, Lugbe, FCT Abuja.', '2021-12-25 09:09:35'),
(33, 'zipcode', '900001', '2021-12-25 09:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ID` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ID`, `name`, `description`) VALUES
(6, 'Yoga', 'gagagga'),
(7, 'Yoga', 'gagagga');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_settings`
--

CREATE TABLE `schedule_settings` (
  `ID` int(11) NOT NULL,
  `day_schedule1` text NOT NULL,
  `day_schedule2` text NOT NULL,
  `day_schedule3` text NOT NULL,
  `day_schedule4` text NOT NULL,
  `day_schedule5` text NOT NULL,
  `day_schedule6` text NOT NULL,
  `day_schedule7` text NOT NULL,
  `room_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `start_time` text NOT NULL,
  `room_conditions` text NOT NULL,
  `end_time` text NOT NULL,
  `schedule_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_settings`
--

INSERT INTO `schedule_settings` (`ID`, `day_schedule1`, `day_schedule2`, `day_schedule3`, `day_schedule4`, `day_schedule5`, `day_schedule6`, `day_schedule7`, `room_id`, `service_id`, `start_time`, `room_conditions`, `end_time`, `schedule_time`) VALUES
(1, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 6, 8, '14:07', 'Not Clean', '14:07', '14:08'),
(2, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Thursday', 'Saturday', 6, 9, '14:07', 'Not Clean', '14:07', '14:10'),
(3, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Thursday', 'Saturday', 7, 7, '14:18', 'Clean', '15:17', '16:19'),
(4, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Thursday', 'Saturday', 7, 7, '14:18', 'Clean', '15:17', '16:19'),
(5, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Thursday', 'Saturday', 6, 8, '14:28', 'Not Clean', '14:28', '16:29'),
(9, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Thursday', 'Saturday', 6, 9, '14:41', 'Clean', '14:41', '14:42'),
(10, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Thursday', 'Saturday', 6, 9, '14:41', 'Clean', '14:41', '14:42'),
(11, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Thursday', 'Saturday', 6, 9, '14:41', 'Clean', '14:41', '14:42'),
(12, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 6, 9, '14:41', 'Clean', '14:41', '14:42');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ID` int(11) NOT NULL,
  `type` text NOT NULL,
  `service_name` text NOT NULL,
  `service_length` text NOT NULL,
  `amount` text NOT NULL,
  `room_id` text NOT NULL,
  `schedule` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ID`, `type`, `service_name`, `service_length`, `amount`, `room_id`, `schedule`) VALUES
(7, 'Massage 3', 'masg', '12min', '150', '7', '0'),
(8, 'Massage 3', 'room massage', '12min', '150', '6', '2021-12-25T13:17'),
(9, 'Massage 2 ', 'masg1', '12min', '120', '6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Quantum Clinice'),
(6, 'short_name', 'Quantum Clinic'),
(11, 'logo', 'uploads/1630631400_clinic-logo.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1630631400_clinic-cover.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(6, 'George', 'Wilson', 'gwilson', 'd40242fb23c45206fadee4e2418f274f', 'uploads/1630598640_male.png', NULL, 0, '2021-09-03 00:04:40', '2021-09-03 00:07:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corperate`
--
ALTER TABLE `corperate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_list`
--
ALTER TABLE `patient_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_meta`
--
ALTER TABLE `patient_meta`
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `description` (`ID`);

--
-- Indexes for table `schedule_settings`
--
ALTER TABLE `schedule_settings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `corperate`
--
ALTER TABLE `corperate`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_list`
--
ALTER TABLE `patient_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedule_settings`
--
ALTER TABLE `schedule_settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient_meta`
--
ALTER TABLE `patient_meta`
  ADD CONSTRAINT `patient_meta_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
