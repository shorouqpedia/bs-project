-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2019 at 03:27 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(32) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `img` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `bio`, `img`, `email`, `password`) VALUES
(13, 'first', 'last33', 'bio test22', 'images/uploads/profile/ggc.jpg', 'email@email.com', '601f1889667efaebb33b8c12572835da3f027f78'),
(14, 'first', 'last', '', 'images/Anon.png', 'email2@email.com', '601f1889667efaebb33b8c12572835da3f027f78');

-- --------------------------------------------------------

--
-- Table structure for table `user_blocked_videos`
--

CREATE TABLE `user_blocked_videos` (
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_rating_videos`
--

CREATE TABLE `user_rating_videos` (
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(5, '__ffxYqUdt8', 'BIGGEST Holes Ever Made By Humans!', 'Check out the biggest holes ever made by humans! This top 10 list of largest and deepest man made holes has some of the craziest holes you\'ll ever see!', 'https://i.ytimg.com/vi/__ffxYqUdt8/default.jpg', 0, 0, 0),
(6, 'fDOz72WHQGY', 'I Poked Holes Into My Boyfriend&#39;s Condom', 'I\'m Lisa and I wanna tell you how I got revenge on my ex-boyfriend, Marc, after he cheated on me with the one girl I hated more than anyone else: Clarissa.', 'https://i.ytimg.com/vi/fDOz72WHQGY/default.jpg', 0, 0, 0),
(7, 'KMGUmcveQeg', 'This Is 200 Calories', 'From Broccoli to Big Macs - All of your favourite foods, shown as 200 calories! More examples at WiseGEEK: http://bit.ly/16uAiWg SUBSCRIBE - it\'s free!', 'https://i.ytimg.com/vi/KMGUmcveQeg/default.jpg', 0, 0, 0),
(8, 'bvim4rsNHkQ', 'How Not to Land an Orbital Rocket Booster', '', 'https://i.ytimg.com/vi/bvim4rsNHkQ/default.jpg', 0, 0, 0),
(9, 'xoxhDk-hwuo', 'Package Thief vs. Glitter Bomb Trap', 'This might be my Magnum Opus. Please see my comments below with regards to reports the video was partially faked. Go to https://NordVPN.com/MarkRober ...', 'https://i.ytimg.com/vi/xoxhDk-hwuo/default.jpg', 0, 0, 0),
(10, 'bNpx7gpSqbY', 'The single biggest reason why start-ups succeed | Bill Gross', 'Bill Gross has founded a lot of start-ups, and incubated many others — and he got curious about why some succeeded and others failed. So he gathered data ...', 'https://i.ytimg.com/vi/bNpx7gpSqbY/default.jpg', 0, 0, 0),
(11, 'pAoEHR4aW8I', 'Why this black hole photo is such a big deal', 'What it took to collect these 54-million-year-old photons from a supermassive black hole. Become a Video Lab member! http://bit.ly/video-lab This is an updated ...', 'https://i.ytimg.com/vi/pAoEHR4aW8I/default.jpg', 0, 0, 0),
(12, 'gS3jdXQMwlk', 'What If There Was An Interstellar Black Hole In Our Solar System? - Space Discovery Documentary', 'How likely is it that a black hole could enter the Solar System? Well, you\'d have to define likely; it is more likely that the Earth will get swallowed by a black hole ...', 'https://i.ytimg.com/vi/gS3jdXQMwlk/default_live.jpg', 0, 0, 0),
(13, 'kE8MVphD_rE', 'New NASA Image of Our Black Hole Discovers Why It&#39;s So Quiet', 'You can buy Universe Sandbox 2 game here: http://amzn.to/2yJqwU6 Hello and welcome! My name is Anton and in this video, we will talk about new research ...', 'https://i.ytimg.com/vi/kE8MVphD_rE/default.jpg', 0, 0, 0),
(14, 'RhJrNRGoUrc', 'HELL Found At Bottom Of Deepest Hole On Earth?!', 'The Kola Borehole is the deepest point on Earth that is also man-made. Recently scientists have discovered a few breakthroughs that lie within it. ▻Subscribe ...', 'https://i.ytimg.com/vi/RhJrNRGoUrc/default.jpg', 0, 0, 0),
(15, 'W84DQi6a0Dw', 'Explore The Strongest Forces In The Universe - Space Science Documentary', 'A supermassive black hole is the largest type of black hole, containing a mass of the order of hundreds of thousands, to billions times, the mass of the Sun.', 'https://i.ytimg.com/vi/W84DQi6a0Dw/default_live.jpg', 0, 0, 0),
(16, 'wshZ5n4gHYo', 'Is a black hole shaped like a finite worm-hole (funnel) or a finite jujube tree (twisted funnel)?', 'In a few verses, the Qur\'an describes what modern science has learned about black holes so far: they are finite, funnel-shaped, and cannot be observed directly.', 'https://i.ytimg.com/vi/wshZ5n4gHYo/default.jpg', 0, 0, 0),
(17, 'b6RshBlK7Hs', 'The Mystery Of The Hole In Lake Berryessa Is Finally Solved', 'The world is full of wonders. Among them is the mysterious hole in Lake Berryessa. No one knows how, but the mysterious hole opened up out of nowhere last ...', 'https://i.ytimg.com/vi/b6RshBlK7Hs/default.jpg', 0, 0, 0),
(18, 'OK_JCtrrv-c', 'PHP Programming Language Tutorial - Full Course', 'Learn the PHP programming language in this full course / tutorial. The course is designed for new programmers, and will introduce common programming topics ...', 'https://i.ytimg.com/vi/OK_JCtrrv-c/default.jpg', 0, 0, 0),
(19, 'fJQpaJWx-Iw', 'PHP Quraner Alo | EP-14 (2019) | পিএইচপি কোরআনের আলো', 'এই পর্বে সম্মানিত বিচারক পবিত্র কোরআনের যে আয়াতটি তিলাওয়াত করবেন, সে আয়াত...', 'https://i.ytimg.com/vi/fJQpaJWx-Iw/default.jpg', 0, 0, 0),
(20, 'iAfau2F7HxQ', 'PHP Quraner Alo | EP-21 (2019) | পিএইচপি কোরআনের আলো', 'এই পর্বে বিচারক পবিত্র কোরআনের একটি আয়াত তিলাওয়াত করবেন। সেই আয়াতটির পূর্...', 'https://i.ytimg.com/vi/iAfau2F7HxQ/default.jpg', 0, 0, 0),
(21, 'EQndMLuDDCs', 'Why do big Companies use Java, and NOT PHP?', 'Java vs PHP. More specifically, why is Java (and .NET) used by larger companies and PHP tends to be used by small medium sized business? Are there ...', 'https://i.ytimg.com/vi/EQndMLuDDCs/default.jpg', 0, 0, 0),
(22, 'veVZRLwfe6o', 'create a Quiz Website using PHP and MySQL [ Online Quiz System in PHP Project with Source Code ]', 'Welcome Developers, We will see How to create an online quiz website using PHP and MySQL [Online quiz system project in PHP with Source Code] in Hindi.', 'https://i.ytimg.com/vi/veVZRLwfe6o/default.jpg', 0, 0, 0),
(23, 'gWjofpeBUU4', 'PHP in 2019 - Let&#39;s talk about it', 'PHP is one of the most used programming languages over the internet. but when comes to 2019 and impression of NodeJS and Django (modern framework and ...', 'https://i.ytimg.com/vi/gWjofpeBUU4/default.jpg', 0, 0, 0),
(24, 'OfK_HXsNnRk', 'PHP - Why Coders Hate...', 'PHP is great for being able to easily create web apps that work. The problem is that it also easy to create code with major vulnerabilities that is a mess to read ...', 'https://i.ytimg.com/vi/OfK_HXsNnRk/default.jpg', 0, 0, 0),
(25, 'WYVBTz9QT6Y', 'Как выучить PHP? Самый аху#### способ!', 'Годный способ как выучить PHP с нуля любому! Просто, быстро, красиво. Крутой видеокурс по созданию сайта...', 'https://i.ytimg.com/vi/WYVBTz9QT6Y/default.jpg', 0, 0, 0),
(26, 'Nhj2vgBP7d4', 'أساسيات لغة php :الدرس1:مقدمة فى لغة php', 'كورس شامل لتعلم أساسيات لغة البرمجة php الأشهر استخداما على الويب والتى تستخدمها كبرى المواقع العالمية.', 'https://i.ytimg.com/vi/Nhj2vgBP7d4/default.jpg', 0, 0, 0),
(27, 'rKXFgWP-2xQ', 'PHP in 2018 by the Creator of PHP', 'For many in the PHP community 2016 and 2017 was all about getting onto PHP 7. The drastic performance improvements and overall efficiency has resulted in ...', 'https://i.ytimg.com/vi/rKXFgWP-2xQ/default.jpg', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_blocked_videos`
--
ALTER TABLE `user_blocked_videos`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `user_rating_videos`
--
ALTER TABLE `user_rating_videos`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_blocked_videos`
--
ALTER TABLE `user_blocked_videos`
  ADD CONSTRAINT `user_blocked_videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_blocked_videos_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`);

--
-- Constraints for table `user_rating_videos`
--
ALTER TABLE `user_rating_videos`
  ADD CONSTRAINT `user_rating_videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_rating_videos_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
