-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Út 05.Dec 2023, 15:30
-- Verzia serveru: 10.4.25-MariaDB
-- Verzia PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `project`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nazov` varchar(45) COLLATE utf8mb4_slovak_ci NOT NULL,
  `url` varchar(90) COLLATE utf8mb4_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `menu`
--

INSERT INTO `menu` (`id`, `nazov`, `url`) VALUES
(1, 'Home', '/templatemo_591_villa_agency/index.php'),
(2, 'Properties', '/templatemo_591_villa_agency/properties.php'),
(3, 'Property details', '/templatemo_591_villa_agency/property-details.php'),
(4, 'Contact us', '/templatemo_591_villa_agency/contact.php');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `realestate`
--

CREATE TABLE `realestate` (
  `id` int(11) NOT NULL,
  `category` varchar(45) COLLATE utf8mb4_slovak_ci NOT NULL,
  `filtercat` varchar(45) COLLATE utf8mb4_slovak_ci NOT NULL,
  `price` int(11) NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_slovak_ci NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `parking` int(11) NOT NULL,
  `img` varchar(455) COLLATE utf8mb4_slovak_ci NOT NULL,
  `url` varchar(455) COLLATE utf8mb4_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `realestate`
--

INSERT INTO `realestate` (`id`, `category`, `filtercat`, `price`, `address`, `bedrooms`, `bathrooms`, `area`, `floor`, `parking`, `img`, `url`) VALUES
(1, 'Apartment', 'adv', 100000, 'Mostná 5, 94105 Nitra', 4, 2, 130, 4, 1, 'assets/images/property-01.jpg', '#'),
(2, 'Luxury Villa', 'str', 1000000, 'Zámocká 1B, Martin 94587', 5, 2, 133, 1000, 2, 'assets/images/property-02.jpg', '#'),
(3, 'Penthouse', 'rac', 185000, 'Lomnická 145, Nitra 94158', 5, 3, 120, 2, 3, 'assets/images/property-05.jpg', '#'),
(5, 'Apartment', 'adv', 154000, 'Mlynská 5, Prešov 94585', 4, 1, 75, 8, 2, 'assets/images/property-06.jpg', '#'),
(8, 'Luxury Villa', 'str', 450000, 'Považská 4, 97840 Košice', 6, 5, 186, 1, 4, 'assets/images/property-04.jpg', '#');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `realestate`
--
ALTER TABLE `realestate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `realestate`
--
ALTER TABLE `realestate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
