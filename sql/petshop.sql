-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 11:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id`, `naziv`) VALUES
(1, 'hrana za pse'),
(2, 'kucice za pse'),
(3, 'garderoba za pse'),
(4, 'povodci za pse'),
(5, 'igracke za macke'),
(6, 'hrana za macke');

-- --------------------------------------------------------

--
-- Table structure for table `porudzbina`
--

CREATE TABLE `porudzbina` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `porudzbina`
--

INSERT INTO `porudzbina` (`id`, `ime`, `prezime`, `adresa`) VALUES
(9, 'nevena', 'marjanovic', 'adresa');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slika` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` decimal(10,0) NOT NULL,
  `kategorija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`id`, `naziv`, `opis`, `slika`, `cena`, `kategorija`) VALUES
(1, 'Hills', 'Hrana namenjena odraslim psima malih rasaNamenjena ishrani 1 do 8 godine starostiPomaze u odrzavanju idealne tezine', 'https://assets.petco.com/petco/image/upload/f_auto,q_auto/735450-center-1', '750', 1),
(2, 'Drvena kucica', 'Drvena kucica za pse, sa kosim krovom. \r\nUnutra oblozena vunom, koja podize temperaturu zimi.', 'https://www.creativecedardesigns.com/images/product/large/50.jpg', '14900', 2),
(3, 'Duks za pse', 'Pamucni duks za pse.', 'https://img.joomcdn.net/bacc7a7836b46f555b8c2709fdb2d66925fb84ef_original.jpeg', '6100', 3),
(4, 'Povodac za pse', 'Crveni povodac za pse.\r\nVeoma jak, zbog dvostrukog kaisa\r\nPodesiv u tri nivoa', 'https://5.imimg.com/data5/YT/NV/YH/SELLER-10076004/rope-500x500.jpeg', '5500', 4),
(5, 'Platneni povodac', 'Mekan, zahvaljujući posebnoj postavi\r\nVodootporna postava\r\nSa utisnutim šarama', 'https://img.chewy.com/is/image/catalog/221216_MAIN._AC_SL1500_V1596502258_.jpg', '5800', 4),
(6, 'Igračka za macke', 'Plisani mis.\r\nIgracka za macke.', 'https://img.chewy.com/is/image/catalog/245899_MAIN._AC_SL1500_V1607371641_.jpg', '2000', 5),
(7, 'Lopta za macke', 'Igracka za macke.\r\nGumena loptica.', 'https://ae01.alicdn.com/kf/HTB1YqHSSCzqK1RjSZFLq6An2XXaF/1pc-Cat-Toy-Stick-Feather-Wand-With-Bell-Mouse-Cage-Toys-Plastic-Artificial-Colorful-Cat-Teaser.jpg', '2500', 5),
(13, 'Whiskas', 'Whiskas hrana za odrasle macke.', 'https://cenoteka.rs/assets/images/articles/whiskas-briketi-govedina-300g-1007171-large.jpg', '140', 6);

-- --------------------------------------------------------

--
-- Table structure for table `stavka`
--

CREATE TABLE `stavka` (
  `porudzbina_id` int(11) NOT NULL,
  `proizvod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stavka`
--

INSERT INTO `stavka` (`porudzbina_id`, `proizvod_id`) VALUES
(9, 2),
(9, 3),
(9, 6),
(9, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `porudzbina`
--
ALTER TABLE `porudzbina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategorija_id` (`kategorija`);

--
-- Indexes for table `stavka`
--
ALTER TABLE `stavka`
  ADD KEY `fk_porudzbina` (`porudzbina_id`),
  ADD KEY `fk_proizvod` (`proizvod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `porudzbina`
--
ALTER TABLE `porudzbina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `kategorija_id` FOREIGN KEY (`kategorija`) REFERENCES `kategorija` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stavka`
--
ALTER TABLE `stavka`
  ADD CONSTRAINT `fk_porudzbina` FOREIGN KEY (`porudzbina_id`) REFERENCES `porudzbina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_proizvod` FOREIGN KEY (`proizvod_id`) REFERENCES `proizvod` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
