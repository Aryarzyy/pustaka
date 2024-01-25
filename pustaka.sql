-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2023 at 10:42 PM
-- Server version: 5.6.40
-- PHP Version: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pustaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `author` varchar(128) NOT NULL,
  `publisher` varchar(128) NOT NULL,
  `publication_year` year(4) NOT NULL,
  `isbn` varchar(64) NOT NULL,
  `stock` int(11) NOT NULL,
  `borrowed` int(11) NOT NULL,
  `booked` int(11) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `title`, `author`, `publisher`, `publication_year`, `isbn`, `stock`, `borrowed`, `booked`, `image`) VALUES
(1, 1, 'Statistika dengan Program Komputer', 'Ahmad Kholiqul Amin', 'Deep Publish', 2014, '1234567890123', 1, 1, 1, 'img1.jpg'),
(2, 1, 'Mudah Belajar Komputer untuk Anak', 'Bambang Agus Setiawan', 'Huta Media', 2014, '1234567890048', 5, 3, 1, 'img2.jpg'),
(3, 1, 'PHP Komplet', 'Jubilee', 'Elex Media Komputindo', 2017, '1234567890867', 5, 1, 1, 'img3.jpg'),
(4, 9, 'Detektif Conan Ep.200', 'Okigawa sasuke', 'Cultura', 2016, '12345678906545', 5, 0, 0, 'img4.jpg'),
(5, 2, 'Bahasa Indonesia', 'Umri Nur\'aini dan Indriyani', 'Pusat Perbukuan', 2015, '1234567890645', 3, 0, 0, 'img5.jpg'),
(6, 5, 'Komunikasi Lintas Budaya', 'Dr. Dedy Kurnia', 'Published', 2015, '1234567890999', 5, 0, 0, 'img6.jpg'),
(7, 1, 'Kolaborasi Codeigniter dan Ajax dalam Perancangan', 'Anton Subagia', 'Elex Media Komputindo', 2017, '1234567890466', 5, 0, 0, 'img7.jpg'),
(8, 4, 'From Hobby to Money', 'Deasylawati', 'Elex Media Komputindo', 2015, '1234543212543', 5, 0, 0, 'img8.jpg'),
(10, 3, 'Rahasia Keajaiban Bumi', 'Nurul Ihsan', 'Luxima', 2014, '1234568593857', 5, 0, 0, 'img10.jpg'),
(11, 1, 'jeakje', 'jekaje', 'kjrakj', 2022, '1898398938', 2, 0, 0, 'img1701792299.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Komputer'),
(2, 'Bahasa'),
(3, 'Sains'),
(4, 'Hobby'),
(5, 'Komunikasi'),
(6, 'Hukum'),
(7, 'Agama'),
(8, 'Populer'),
(9, 'Komik');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Agis Sukmayadi', 'agis@gmail.com', 'pro1701801193.PNG', '$2y$10$ccqVNO.qheD6Iok.19eoROTWmTusbh/MUBKVMkS2BeWTzcFxULYxC', 2, 1, 1698895929),
(2, 'agissukmayadi', 'agissukmayadi@gmail.com', 'default.jpg', '$2y$10$0j5PrIOIUA2aVTIG4ejxkO.HggBbfJIEJU9mNf5PknJLH3MCHmmnC', 2, 0, 1698895958),
(3, 'admin', 'admin@gmail.com', 'default.jpg', '$2y$10$BRScP65ioLaOY9dw6RunzuQvrSZQIbQ1amvCksVgP2p.V9YBzvtlS', 1, 1, 1698895958),
(4, 'Agis Sukmayadi', 'agis1@gmail.com', 'default.jpg', '$2y$10$8uZJsGU/oVZfzkb/DKKVeuCVywx..Ez63XXO9mno29yehBgnxp9sC', 2, 1, 1700704271),
(5, 'Agis Sukmayadi 123', 'eaea@gmail.com', 'default.jpg', '$2y$10$rHNvx3R6VqzXXB.1fl5mhOikIVnzbGoSpOtiJ8FQaBClU4CpNKg/W', 2, 0, 1700826395);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_book_category` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_roles_users` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_book_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_roles_users` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
