-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2019 at 08:34 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almu`
--

-- --------------------------------------------------------

--
-- Table structure for table `adress`
--

CREATE TABLE `adress` (
  `userID` int(99) DEFAULT NULL,
  `adress` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` int(5) DEFAULT NULL,
  `country` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adress`
--

INSERT INTO `adress` (`userID`, `adress`, `city`, `postcode`, `country`) VALUES
(1, 'kronhusgatan 9', 'gÃ¶teborg', 44234, 'sverige');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(99) NOT NULL,
  `identifier` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bundle`
--

CREATE TABLE `bundle` (
  `id` int(99) NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` varchar(290) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precentage` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bundleProducts`
--

CREATE TABLE `bundleProducts` (
  `bundle` int(99) DEFAULT NULL,
  `product` int(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bundleSale`
--

CREATE TABLE `bundleSale` (
  `bundle` int(99) DEFAULT NULL,
  `discount` int(2) DEFAULT NULL,
  `sale` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commentReply`
--

CREATE TABLE `commentReply` (
  `comment` int(255) DEFAULT NULL,
  `userID` int(99) DEFAULT NULL,
  `content` varchar(290) COLLATE utf8_unicode_ci DEFAULT NULL,
  `likes` int(10) DEFAULT '0',
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `userID` int(99) DEFAULT NULL,
  `content` varchar(290) COLLATE utf8_unicode_ci DEFAULT NULL,
  `likes` int(10) DEFAULT '0',
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `highlights`
--

CREATE TABLE `highlights` (
  `id` int(99) NOT NULL,
  `title` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(290) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identifier` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `target` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picAdjustment` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('product','blog','link') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `highlights`
--

INSERT INTO `highlights` (`id`, `title`, `description`, `identifier`, `target`, `picAdjustment`, `type`) VALUES
(1, 'Smash 3.0 är ute! Joker tar plats!', 'Den senaste uppdateringen för Smash Ultimate är ute och ger oss en ny karaktär, en \"stagebuilder\" och mer!', 'smashUlt3', 'https://nintendoeverything.com/super-smash-bros-ultimate-update-out-now-version-3-0-0/', 'bottom', 'link'),
(2, 'Återvänd till Hyrule, nu med Champions Ballad', 'Champions Ballad har nu kommit till The Legend of Zelda: Breath of The Wild. Lär känna de fyra olika champions och kämpa genom nya utmaningar!', 'botw_champBall', 'tloz_botw', 'center', 'product'),
(3, 'E3 närmar sig!', 'Nu är det sommar och strax är det dags för E3. Evenemanget utspelar sig i Juni där många stora spelföretag som Nintendo, Microsoft och Sony visar nya spel och teknologi. Läs vår artikeln om vad man kan förvänta sig ', 'e3_2019', ' ', 'center', 'blog'),
(4, 'Dags att gå tillbaka till Kamurocho och leva Yakuza livet', 'Nu när Yakuza Kiwami har kommit ut på pc och yakuza Kiwami 2 är på väg så varför inte se var allt startade? Spela som Kazuma Kiryu och se hur han hanterar sina problem som en nybliven yakuza. Skaffa Yakuza 0 idag!', 'yak0', 'yakuza0', 'center', 'product');

-- --------------------------------------------------------

--
-- Table structure for table `orderBundle`
--

CREATE TABLE `orderBundle` (
  `orderNR` int(99) DEFAULT NULL,
  `bundle` int(99) DEFAULT NULL,
  `quanity` int(2) DEFAULT '1',
  `type` enum('physical','digital') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderProduct`
--

CREATE TABLE `orderProduct` (
  `orderNR` int(99) DEFAULT NULL,
  `product` int(99) DEFAULT NULL,
  `quanity` int(2) DEFAULT '1',
  `type` enum('physical','digital') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNR` int(99) NOT NULL,
  `userID` int(99) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `platforms`
--

CREATE TABLE `platforms` (
  `product` int(99) DEFAULT NULL,
  `platform` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `platforms`
--

INSERT INTO `platforms` (`product`, `platform`) VALUES
(1, 'ps3'),
(1, 'ps4'),
(1, 'windows'),
(1, 'steam'),
(2, 'wiiu'),
(2, 'switch'),
(3, 'mac'),
(3, 'ps4'),
(3, 'windows'),
(3, 'steam'),
(3, 'xone'),
(3, 'linux');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(99) NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identifier` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `developer` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `digitalPrice` int(4) DEFAULT NULL,
  `physicalPrice` int(4) DEFAULT NULL,
  `releaseDate` date DEFAULT NULL,
  `ageRating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `identifier`, `publisher`, `developer`, `digitalPrice`, `physicalPrice`, `releaseDate`, `ageRating`) VALUES
(1, 'Yakuza 0', 'yakuza0', 'SEGA', 'SEGA', 209, 299, '2015-03-15', 5),
(2, 'The Legend of Zelda: Breath of the Wild', 'tloz_botw', 'Nintendo', 'Nintendo', 559, 649, '2017-03-03', 3),
(3, 'Slime Rancher', 'slime_rancher', 'Monomi Park', 'Monomi Park', 209, 299, '2017-07-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(255) NOT NULL,
  `product` int(99) DEFAULT NULL,
  `userID` int(99) DEFAULT NULL,
  `title` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(290) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(1) DEFAULT '0',
  `likes` int(10) DEFAULT '0',
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviewReply`
--

CREATE TABLE `reviewReply` (
  `review` int(255) DEFAULT NULL,
  `userID` int(99) DEFAULT NULL,
  `content` varchar(290) COLLATE utf8_unicode_ci DEFAULT NULL,
  `likes` int(10) DEFAULT '0',
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `product` int(99) DEFAULT NULL,
  `discount` int(2) DEFAULT NULL,
  `sale` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`product`, `discount`, `sale`) VALUES
(1, 15, 'Opening sale');

-- --------------------------------------------------------

--
-- Table structure for table `tagArticle`
--

CREATE TABLE `tagArticle` (
  `article` int(99) DEFAULT NULL,
  `tag` int(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagProduct`
--

CREATE TABLE `tagProduct` (
  `product` int(99) DEFAULT NULL,
  `tag` int(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tagProduct`
--

INSERT INTO `tagProduct` (`product`, `tag`) VALUES
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(2, 3),
(1, 5),
(1, 8),
(1, 6),
(1, 7),
(2, 7),
(2, 9),
(2, 10),
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(99) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Söt'),
(2, 'FPS'),
(3, 'Äventyr'),
(4, 'Färg glatt'),
(5, 'Beat\'em Up'),
(6, 'Action'),
(7, 'Öppen Värld'),
(8, 'Humor'),
(9, 'pussel'),
(10, 'RPG (Rollspel)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(99) NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8_unicode_ci NOT NULL DEFAULT '5F24A9',
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logins` int(255) DEFAULT '0',
  `spent` int(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `birthdate`, `email`, `password`, `color`, `creation`, `logins`, `spent`) VALUES
(1, 'Dood!1!', '1996-11-05', 'dood3@outlook.com', 'bec341ed1505df4197f2b66fcff3946a', '#d73920', '2019-05-24 20:04:53', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `userID` int(99) DEFAULT NULL,
  `product` int(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ytEmbed`
--

CREATE TABLE `ytEmbed` (
  `product` int(99) DEFAULT NULL,
  `embedCode` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ytEmbed`
--

INSERT INTO `ytEmbed` (`product`, `embedCode`) VALUES
(3, 'jDZUhN8pU9c'),
(1, 'JCzACWVB9gQ'),
(1, 'ogdFbAux39o'),
(2, 'zw47_q9wbBE'),
(2, 'e93CP5QWNaA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adress`
--
ALTER TABLE `adress`
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bundle`
--
ALTER TABLE `bundle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bundleProducts`
--
ALTER TABLE `bundleProducts`
  ADD KEY `bundle` (`bundle`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `bundleSale`
--
ALTER TABLE `bundleSale`
  ADD KEY `bundle` (`bundle`);

--
-- Indexes for table `commentReply`
--
ALTER TABLE `commentReply`
  ADD KEY `comment` (`comment`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `highlights`
--
ALTER TABLE `highlights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderBundle`
--
ALTER TABLE `orderBundle`
  ADD KEY `orderNR` (`orderNR`),
  ADD KEY `bundle` (`bundle`);

--
-- Indexes for table `orderProduct`
--
ALTER TABLE `orderProduct`
  ADD KEY `orderNR` (`orderNR`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNR`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identifier` (`identifier`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `reviewReply`
--
ALTER TABLE `reviewReply`
  ADD KEY `review` (`review`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD KEY `product` (`product`);

--
-- Indexes for table `tagArticle`
--
ALTER TABLE `tagArticle`
  ADD KEY `article` (`article`),
  ADD KEY `tag` (`tag`);

--
-- Indexes for table `tagProduct`
--
ALTER TABLE `tagProduct`
  ADD KEY `product` (`product`),
  ADD KEY `tag` (`tag`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD KEY `userID` (`userID`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `ytEmbed`
--
ALTER TABLE `ytEmbed`
  ADD KEY `product` (`product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bundle`
--
ALTER TABLE `bundle`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `highlights`
--
ALTER TABLE `highlights`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNR` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adress`
--
ALTER TABLE `adress`
  ADD CONSTRAINT `adress_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `bundleProducts`
--
ALTER TABLE `bundleProducts`
  ADD CONSTRAINT `bundleProducts_ibfk_1` FOREIGN KEY (`bundle`) REFERENCES `bundle` (`id`),
  ADD CONSTRAINT `bundleProducts_ibfk_2` FOREIGN KEY (`product`) REFERENCES `product` (`id`);

--
-- Constraints for table `bundleSale`
--
ALTER TABLE `bundleSale`
  ADD CONSTRAINT `bundleSale_ibfk_1` FOREIGN KEY (`bundle`) REFERENCES `bundle` (`id`);

--
-- Constraints for table `commentReply`
--
ALTER TABLE `commentReply`
  ADD CONSTRAINT `commentReply_ibfk_1` FOREIGN KEY (`comment`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `commentReply_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `orderBundle`
--
ALTER TABLE `orderBundle`
  ADD CONSTRAINT `orderBundle_ibfk_1` FOREIGN KEY (`orderNR`) REFERENCES `orders` (`orderNR`),
  ADD CONSTRAINT `orderBundle_ibfk_2` FOREIGN KEY (`bundle`) REFERENCES `bundle` (`id`);

--
-- Constraints for table `orderProduct`
--
ALTER TABLE `orderProduct`
  ADD CONSTRAINT `orderProduct_ibfk_1` FOREIGN KEY (`orderNR`) REFERENCES `orders` (`orderNR`),
  ADD CONSTRAINT `orderProduct_ibfk_2` FOREIGN KEY (`product`) REFERENCES `product` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviewReply`
--
ALTER TABLE `reviewReply`
  ADD CONSTRAINT `reviewReply_ibfk_1` FOREIGN KEY (`review`) REFERENCES `review` (`id`),
  ADD CONSTRAINT `reviewReply_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`);

--
-- Constraints for table `tagArticle`
--
ALTER TABLE `tagArticle`
  ADD CONSTRAINT `tagArticle_ibfk_1` FOREIGN KEY (`article`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `tagArticle_ibfk_2` FOREIGN KEY (`tag`) REFERENCES `tags` (`id`);

--
-- Constraints for table `tagProduct`
--
ALTER TABLE `tagProduct`
  ADD CONSTRAINT `tagProduct_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `tagProduct_ibfk_2` FOREIGN KEY (`tag`) REFERENCES `tags` (`id`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`product`) REFERENCES `product` (`id`);

--
-- Constraints for table `ytEmbed`
--
ALTER TABLE `ytEmbed`
  ADD CONSTRAINT `ytEmbed_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
