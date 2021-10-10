-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 08:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_editor`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `copy_video`
--

CREATE TABLE `copy_video` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `copy_video`
--

INSERT INTO `copy_video` (`id`, `url`) VALUES
(18, '1629698288-16289388061new.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `effects`
--

CREATE TABLE `effects` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(300) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `merge_videos`
--

CREATE TABLE `merge_videos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rendered_videos`
--

CREATE TABLE `rendered_videos` (
  `id` int(11) NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rendered_videos`
--

INSERT INTO `rendered_videos` (`id`, `video_id`, `user_id`, `url`, `path`, `isDeleted`) VALUES
(9, '[\"18\"]', 1, '16297006381_render.mp4', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `saved_video`
--

CREATE TABLE `saved_video` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `arrangementPattern` varchar(255) NOT NULL,
  `trimStart` varchar(255) NOT NULL,
  `trimEnd` varchar(255) NOT NULL,
  `extras` varchar(255) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved_video`
--

INSERT INTO `saved_video` (`id`, `user_id`, `video_id`, `arrangementPattern`, `trimStart`, `trimEnd`, `extras`, `isDeleted`) VALUES
(11, 1, 11, '', '00:00:00', '00:00:20', '', 0),
(12, 1, 10, '', '00:00:00', '00:00:10', '', 0),
(13, 1, 14, '', '1', '3', '', 0),
(14, 1, 14, '', '0', '2', '', 0),
(15, 1, 14, '', '0', '1', '', 0),
(16, 1, 14, '', '0', '1', '', 0),
(17, 1, 16, '', '2', '8', '', 0),
(18, 1, 16, '', '1', '5', '', 0),
(19, 1, 16, '', '1', '4', '', 0),
(20, 1, 17, '', '1', '5', '', 0),
(21, 1, 18, '', '1', '6', '', 0),
(22, 1, 18, '', '1', '4', '', 0),
(23, 1, 18, '', '1', '5', '', 0),
(24, 1, 18, '', '1', '5', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `select_video`
--

CREATE TABLE `select_video` (
  `id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sorting_num` int(11) NOT NULL DEFAULT 0,
  `is_saved` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `profile` varchar(255) NOT NULL,
  `emailId` varchar(200) DEFAULT NULL,
  `mobileNumber` bigint(10) DEFAULT NULL,
  `userPassword` text DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `isActive` int(1) DEFAULT NULL,
  `lastUpdationDate` datetime DEFAULT NULL,
  `last_login` varchar(200) DEFAULT NULL,
  `YoutubeAPIKey` varchar(255) NOT NULL,
  `YoutubeAPISecret` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `username`, `Name`, `profile`, `emailId`, `mobileNumber`, `userPassword`, `regDate`, `isActive`, `lastUpdationDate`, `last_login`, `YoutubeAPIKey`, `YoutubeAPISecret`) VALUES
(1, '', 'Mohd Anas', '1628423525-ead665c21c1351c3351744a938dade9f.jpg', 'mohdanas.codecounter@gmail.com', 9654503182, 'be77f8e570caa9818d15eef603afb116', '2021-08-07 18:30:00', 1, '2021-08-09 00:00:00', '1629688174', 'AIzaSyAE_5rV5TqwS1gihiuffUZZ9i-y8iWhFos', 'dBxl6ZvF-W0B-vKzFAjI31V-');

-- --------------------------------------------------------

--
-- Table structure for table `upload_video`
--

CREATE TABLE `upload_video` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(300) NOT NULL,
  `thumbnail` varchar(300) NOT NULL,
  `is_delete` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_video`
--

INSERT INTO `upload_video` (`id`, `user_id`, `url`, `thumbnail`, `is_delete`) VALUES
(10, 1, '16289388061new.mp4', '1628938220-ead665c21c1351c3351744a938dade9f.jpg', 1),
(11, 1, '16289387721new.mp4', '1628938594-1234.jpg', 1),
(12, 1, '1629644311-16289388061new.mp4', '61226619024a5-Thumbnail.jpg', 1),
(13, 1, '1629644353-16289388061new.mp4', '6122664207734-Thumbnail.jpg', 1),
(14, 1, '16296913561new.mp4', '61226698f19e4-Thumbnail.jpg', 1),
(15, 1, '1629690807-16289388061new.mp4', '61231bb822569-Thumbnail.jpg', 1),
(16, 1, '16296925721new.mp4', '61231dbe10b94-Thumbnail.jpg', 1),
(17, 1, '16296927931new.mp4', '6123235f84954-Thumbnail.jpg', 1),
(18, 1, '16297006171new.mp4', '612338fbebd1d-Thumbnail.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `extras` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `effects`
--
ALTER TABLE `effects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merge_videos`
--
ALTER TABLE `merge_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rendered_videos`
--
ALTER TABLE `rendered_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_video`
--
ALTER TABLE `saved_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `select_video`
--
ALTER TABLE `select_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobileNumber` (`mobileNumber`),
  ADD UNIQUE KEY `emailId` (`emailId`);

--
-- Indexes for table `upload_video`
--
ALTER TABLE `upload_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `effects`
--
ALTER TABLE `effects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merge_videos`
--
ALTER TABLE `merge_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rendered_videos`
--
ALTER TABLE `rendered_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `saved_video`
--
ALTER TABLE `saved_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `select_video`
--
ALTER TABLE `select_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `upload_video`
--
ALTER TABLE `upload_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
