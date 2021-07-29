-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 12:14 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(7) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_email` varchar(32) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `user_status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`, `user_profile`, `user_status`) VALUES
(14, 'Fares', 'faressoltan@gmail.com', 'fares312001', 'images/profile1.png', 'Online'),
(15, 'May', 'mema@yahoo.com', '312001mema', 'images/profile3.png', 'Online'),
(16, 'Ahmed', 'ahmed@gmail.com', '312001312001', 'images/profile2.png', ''),
(17, 'Mohamed', 'ahmed@gmail', '12345678', 'images/profile2.png', ''),
(18, 'Omar', 'omar@gmail.com', '12345678', 'images/profile1.png', 'Offline'),
(20, 'Amaar', 'amaar@gmail.com', '12345678', 'images/profile3.png', ''),
(21, 'Medo', 'medo@gmail.com', '12345678', 'images/profile2.png', 'Offline'),
(26, 'zgzg', 'zgzg@gmail.com', '12345678', 'images/profile3.png', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `users_chat`
--

CREATE TABLE `users_chat` (
  `msg_id` int(11) NOT NULL,
  `sender_username` varchar(100) NOT NULL,
  `receiver_username` varchar(100) NOT NULL,
  `msg_content` varchar(255) NOT NULL,
  `msg_stauts` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_chat`
--

INSERT INTO `users_chat` (`msg_id`, `sender_username`, `receiver_username`, `msg_content`, `msg_stauts`, `msg_date`) VALUES
(53, 'fares', 'mema', 'hi', 'unread', '2021-07-28 20:10:41'),
(54, 'mema', 'fares', 'adasdasdas', 'unread', '2021-07-28 20:11:25'),
(55, 'mema', 'fares', 'jj', 'unread', '2021-07-28 20:11:46'),
(56, 'mema', 'fares', 'kk', 'unread', '2021-07-28 20:11:52'),
(57, 'mema', 'fares', 'kk', 'unread', '2021-07-28 20:11:56'),
(58, 'fares', 'mema', 'asdasdasd', 'unread', '2021-07-28 20:12:12'),
(59, 'fares', 'mema', 'asdasdas', 'unread', '2021-07-28 20:13:48'),
(60, 'fares', 'mema', 'asdasd', 'unread', '2021-07-28 20:13:50'),
(61, 'fares', 'mema', 'asdasd', 'unread', '2021-07-28 20:13:52'),
(62, 'fares', 'mema', 'asdasdasd', 'unread', '2021-07-28 20:13:54'),
(63, 'fares', 'mema', 'asdasdasd', 'unread', '2021-07-28 20:13:56'),
(64, 'fares', 'mema', 'asdasdasdasdas', 'unread', '2021-07-28 20:13:58'),
(65, 'fares', 'mema', 'asdasfsdfsdga', 'unread', '2021-07-28 20:14:02'),
(66, 'fares', 'mema', 'asdasfsdfsdga', 'unread', '2021-07-28 20:14:04'),
(67, 'fares', 'mema', 'asdasfsdfsdga', 'unread', '2021-07-28 20:14:06'),
(68, 'fares', 'mema', 'asdasfsdfsdga', 'unread', '2021-07-28 20:14:08'),
(69, 'fares', 'mema', 'asdasfsdfsdga', 'unread', '2021-07-28 20:14:13'),
(70, 'fares', 'mema', 'asdasfsdfsdga', 'unread', '2021-07-28 20:14:15'),
(71, 'fares', 'mema', 'fares', 'unread', '2021-07-28 20:14:19'),
(72, 'fares', 'mema', 'fares', 'unread', '2021-07-28 20:56:09'),
(73, 'Fares', 'May', 'hi', 'unread', '2021-07-28 22:45:16'),
(74, 'May', 'Fares', 'hi', 'unread', '2021-07-28 22:45:52'),
(75, 'May', 'Fares', 'لول', 'unread', '2021-07-28 22:46:00'),
(76, 'May', 'Fares', 'اكسس ضييي', 'unread', '2021-07-28 22:46:11'),
(77, 'Fares', 'May', 'هالوووو', 'unread', '2021-07-28 22:46:55'),
(78, 'Fares', 'May', 'امحمد', 'unread', '2021-07-28 22:47:00'),
(79, 'May', 'Fares', 'ابو صحاب', 'unread', '2021-07-28 22:47:14'),
(80, 'May', 'Fares', 'خالصه', 'unread', '2021-07-28 22:47:18'),
(81, 'Omar', 'Fares', 'hi', 'unread', '2021-07-28 22:55:05'),
(82, 'Fares', 'Omar', 'حمراا', 'unread', '2021-07-28 22:55:38'),
(83, 'Omar', 'Fares', 'اشطا', 'unread', '2021-07-28 22:56:28'),
(85, 'Omar', 'Amaar', 'يا جمل', 'unread', '2021-07-28 22:59:03'),
(86, 'Omar', 'Amaar', 'رد يسطا', 'unread', '2021-07-28 23:02:11'),
(87, 'Fares', 'May', 'صباح الفل', 'unread', '2021-07-29 12:06:40'),
(88, 'May', 'Omar', 'asdasd', 'unread', '2021-07-29 17:30:20'),
(89, 'zgzg', 'Fares', 'hi', 'unread', '2021-07-29 19:09:07'),
(90, 'Fares', 'zgzg', 'هاي برو', 'unread', '2021-07-29 19:09:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
