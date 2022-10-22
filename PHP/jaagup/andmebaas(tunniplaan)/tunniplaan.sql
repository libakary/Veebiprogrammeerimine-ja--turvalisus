-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 08:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tunniplaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kassid`
--

CREATE TABLE `kassid` (
  `id` int(11) NOT NULL,
  `kassinimi` text DEFAULT NULL,
  `toon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kassid`
--

INSERT INTO `kassid` (`id`, `kassinimi`, `toon`) VALUES
(2, 'Kirru', 'Grey'),
(3, 'Artur', 'GoldenRod'),
(4, 'Lotte', 'Grey'),
(5, 'Koichi', 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `koerad`
--

CREATE TABLE `koerad` (
  `id` int(11) NOT NULL,
  `koeranimi` varchar(50) DEFAULT NULL,
  `kirjeldus` text DEFAULT NULL,
  `pildiaadress` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `koerad`
--

INSERT INTO `koerad` (`id`, `koeranimi`, `kirjeldus`, `pildiaadress`) VALUES
(1, 'Poisu', 'Krants, armas, vana', 'https://cdn.discordapp.com/attachments/594981402752057362/1031884256563171400/IMG_20221007_144923.png'),
(2, 'Rex', 'Saksa lambakoer, komissaar, detektiiv', 'https://i.ytimg.com/vi/HMKu1LdR9js/maxresdefault.jpg'),
(3, 'Chloe', 'Chihuahua, rikas, kartlik', 'https://cdn.discordapp.com/attachments/594981402752057362/1031884520909189180/MV5BMTM0MTc2ODQ2MF5BMl5BanBnXkFtZTcwNzczOTA4MQ._V1_CR045480270_AL_UX477_CR00477268_AL_.png'),
(4, 'Lassie', 'Kolli, ustav, vastupidav', 'https://upload.wikimedia.org/wikipedia/commons/4/4e/Lassie.jpg'),
(5, 'Buddy', 'Kuldne retriiver, sportlik, naljakas', 'http://cineplex.media.baselineresearch.com/images/260058/260058_full.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lehed`
--

CREATE TABLE `lehed` (
  `id` int(11) NOT NULL,
  `pealkiri` varchar(50) DEFAULT NULL,
  `sisu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lehed`
--

INSERT INTO `lehed` (`id`, `pealkiri`, `sisu`) VALUES
(1, 'Ilmateade', 'Kuiv ilm'),
(2, 'Korvpall', 'Treening reedel kell 18'),
(6, 'Matemaatika', 'Homme tunnikontroll'),
(7, 'XSS', '<script>alert(\'hacked\');</script>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kassid`
--
ALTER TABLE `kassid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koerad`
--
ALTER TABLE `koerad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lehed`
--
ALTER TABLE `lehed`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kassid`
--
ALTER TABLE `kassid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `koerad`
--
ALTER TABLE `koerad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lehed`
--
ALTER TABLE `lehed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
