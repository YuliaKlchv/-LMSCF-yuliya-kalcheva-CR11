-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2020 at 10:45 AM
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
-- Database: `cr11_yuliyakalcheva_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_yuliyakalcheva_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_yuliyakalcheva_petadoption`;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `animal_name` varchar(55) DEFAULT NULL,
  `animal_age` int(2) DEFAULT NULL,
  `animal_type` enum('Birds','Reptiles','Cuties') DEFAULT NULL,
  `animal_size` enum('Small','Large') DEFAULT NULL,
  `description` varchar(55) DEFAULT NULL,
  `animal_img` varchar(55) DEFAULT NULL,
  `hobbies` varchar(55) DEFAULT NULL,
  `fk_location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `animal_name`, `animal_age`, `animal_type`, `animal_size`, `description`, `animal_img`, `hobbies`, `fk_location_id`) VALUES
(1, 'Archie', 7, 'Cuties', 'Small', 'He is the least selfish Cat in earth!', 'images/catt.jpg', 'stalking,pounching', 0),
(2, 'Apricot', 2, 'Birds', 'Small', 'He is a cheerfull and a colorful bird.', 'images/bird.jpg', 'chatting---non stop', 8),
(3, 'Bear', 4, 'Cuties', 'Small', 'a typical innocent golden Fish', 'images/fish.jpg', 'eating,sleeping,swimming just like fish :)', 4),
(4, 'Beau ', 2, 'Cuties', 'Small', 'She is a beautiful white mouse', 'images/Small1.jpg', 'she likes to be alone and run all the time', 7),
(5, 'Cuba', 1, 'Reptiles', 'Small', 'absolutely shining', 'images/reptiles.jpg', 'helps you cleaning the insects and covers you with his ', 6),
(6, 'Bee', 10, 'Cuties', 'Small', 'calm and peacefull', 'images/senior1.jpg', 'nowadays only sleeping ans sunbathing', 1),
(7, 'Bailey', 9, 'Cuties', 'Small', 'He is a really curious cat.If he was a human,he would b', 'images/senior2.jpg', 'same as a human-being. just kidding but almost..', 5),
(9, 'Coconut', 10, 'Cuties', 'Large', 'old but gold', 'images/senior4.jpg', 'eating the grass', 6),
(10, 'Cesar', 10, 'Cuties', 'Small', 'he is going to be your bff', 'images/senior3.jpg', 'sunbathing and sleeping', 6),
(11, 'Angel', 5, 'Cuties', 'Large', 'she is purely amazing horse.', 'images/large3.jpg', 'reaffirm bonds with her herd buddies, scratching, groom', 8),
(12, 'Daisy', 3, 'Cuties', 'Large', 'the huge body with a huge heart', 'images/large4.jpg', 'mud baths and socialising', 6),
(29, 'serce', 5, 'Cuties', 'Large', 'Cutest one ever', 'images/rabbit.jpg', 'running ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `zip_code` int(5) DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `address` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `zip_code`, `city`, `address`) VALUES
(1, 1110, 'Vienna', 'Geiselbergstr'),
(2, 1020, 'Vienna', 'Vorgartenstr'),
(3, 1200, 'Vienna', 'Dresdnerstrs'),
(4, 3800, 'Anatolia', 'Capadocia'),
(5, 2524, 'LA', 'MariaStrs'),
(6, 35477, 'Paris', 'Singerstr 4'),
(7, 3456, 'Berlin', 'Karlsplatz'),
(8, 1130, 'Hietzing', 'SchönbrunnerStr 16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `status` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `status`) VALUES
(1, 'hulya', 'hulyakurt89@hotmail.com', '1459cffa149ca2a5e466e70a7709b018e2068e75efebe29876b9b3be52c9a213', 'admin'),
(2, 'hulya', 'cf@hotmail.com', '1459cffa149ca2a5e466e70a7709b018e2068e75efebe29876b9b3be52c9a213', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `fk_location_id` (`fk_location_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
