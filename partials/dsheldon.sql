-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2019 at 07:13 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsheldon`
--
CREATE DATABASE IF NOT EXISTS `dsheldon` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dsheldon`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(32) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `img` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `bio`, `img`, `email`, `password`) VALUES
(13, 'first', 'last33', 'bio test', 'images/uploads/profile/ggc.jpg', 'email@email.com', '601f1889667efaebb33b8c12572835da3f027f78');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `youtube_id` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(2550) NOT NULL,
  `img` varchar(255) NOT NULL,
  `total_rating_count` int(11) NOT NULL,
  `total_rating` int(11) NOT NULL,
  `average_rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `youtube_id`, `title`, `description`, `img`, `total_rating_count`, `total_rating`, `average_rating`) VALUES
(1, 'pxSkbBXpMjo', '15 Strangest Holes On Earth', 'From terrifying home-swallowing sinkholes to picturesque natural caverns, we count fifteen awe-inspiring planetary cavities Facebook: ...', 'https://i.ytimg.com/vi/pxSkbBXpMjo/default.jpg', 0, 0, 0),
(2, '2G_Jqz2ctlA', 'What Happens If 1 mm Black Hole Appears On Earth?', 'I have a NEW channel ▻ \"Meet, Arnold!\" - https://www.youtube.com/watch?v=NsoJa2pm6Mo If you like this video - put Thumb Up button (please) and Subscribe ...', 'https://i.ytimg.com/vi/2G_Jqz2ctlA/default.jpg', 0, 0, 0),
(3, 'fiW4gnaqCv4', 'The World&#39;s BIGGEST HOLES -- BOAT #5', 'Watch my newest video, \"The Game You Win By Losing (Parrondo\'s Paradox)\": https://youtu.be/PpvboBJEozM http://www.facebook.com/VsauceGaming ...', 'https://i.ytimg.com/vi/fiW4gnaqCv4/default.jpg', 0, 0, 0),
(4, '1QDAshRupD4', 'From &quot;Big Back Blackheads&quot;: Closing The Black Hole', 'A blackhead is also called an open comedo (single for comedone), and it is a clogged pore in the skin that is open to the air. Keratin (skin protein) and sebum ...', 'https://i.ytimg.com/vi/1QDAshRupD4/default.jpg', 0, 0, 0),
(5, '__ffxYqUdt8', 'BIGGEST Holes Ever Made By Humans!', 'Check out the biggest holes ever made by humans! This top 10 list of largest and deepest man made holes has some of the craziest holes you\'ll ever see!', 'https://i.ytimg.com/vi/__ffxYqUdt8/default.jpg', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
