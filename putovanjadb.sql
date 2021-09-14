-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2020 at 01:38 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putovanjadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `putovanje`
--

CREATE TABLE `putovanje` (
  `id` int(11) NOT NULL,
  `naslov` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `vrsta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `putovanje`
--

INSERT INTO `putovanje` (`id`, `naslov`, `sadrzaj`, `vrsta_id`) VALUES
(13, 'Zlatibor danas', 'Dnevna temperatura na Zlatiboru je -5 stepeni.', 1),
(14, 'Tasos utusci', 'Najpoznatije ostrvo na koje turisti rado idu.', 2),
(15, 'Beograd - vazduh', 'Danas je bolje stanje vazduha.', 3),
(16, 'Putuj', 'Organizuj svoje putovanje uz jeftinije avio karte...', 4),
(18, 'Moje letovanje', 'Ove godine planiram putovanje na Maldive.', 2),
(19, 'Barselona opis', 'Barselona je drugi po naseljenosti grad u Å paniji i prestonica autonomne pokrajine Katalonija. Sama Barselona broji oko 1,6 miliona stanovnika, a sa okolnim oblastima ima ukupno 3 miliona stanovnika.\r\n\r\nBarselona je najveÄ‡a metropola na Sredozemnom moru, nalazi se na obali izmeÄ‘u reka Ljobrega i Besos, a na zapadu je ograniÄena planinskim vencem Sera de Kolserola. Ona je danas vodeÄ‡e svetsko turistiÄko, ekonomsko, kulturno i modno odrediÅ¡te.\r\n\r\nBarselona se nalazi na severoistoÄnoj obali Pirinejskog poluostrva na Sredozemnom moru. U gradu vlada mediteranska klima, Å¡to znaÄi da su zime blage i vlaÅ¾ne, a leta topla i suva.\r\n\r\nIme Barselona najverovatnije potiÄe od drevne iberske reÄi â€žBarkenoâ€œ, koja je pronaÄ‘ena urezana na jednom drevnom iberskom novÄiÄ‡u. Prema nekim izvorima, grad je dobio ime po kartaginjanskom generalu Halmikaru Barsi za kog se veruje da je osnovao grad u 3. veku pre nove ere.\r\n', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('nevena', '123'),
('nn', 'nn');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta`
--

CREATE TABLE `vrsta` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vrsta`
--

INSERT INTO `vrsta` (`id`, `naziv`) VALUES
(1, 'Planina'),
(2, 'Letovanje'),
(3, 'Grad'),
(4, 'Akcija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `putovanje`
--
ALTER TABLE `putovanje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vrsta`
--
ALTER TABLE `vrsta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `putovanje`
--
ALTER TABLE `putovanje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vrsta`
--
ALTER TABLE `vrsta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
