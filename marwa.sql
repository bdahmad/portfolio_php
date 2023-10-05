-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 12:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(50) NOT NULL,
  `skill_parcentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `skill_parcentage`) VALUES
(7, 'Rae Mejia', 85),
(8, 'Maggie Anderson', 82);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `tml_id` int(11) NOT NULL,
  `tml_name` varchar(30) NOT NULL,
  `tml_text` varchar(100) NOT NULL,
  `tml_img` varchar(40) NOT NULL,
  `tml_designation` varchar(50) NOT NULL,
  `tml_ref_link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`tml_id`, `tml_name`, `tml_text`, `tml_img`, `tml_designation`, `tml_ref_link`) VALUES
(17, 'marwa', 'Keaton Key  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ips', 'tml_1696497034_8162805.jpg', 'sdsdsad', 'Cyrus Dalton'),
(18, 'Amity Wilkerson', 'Mona Oliver  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ip', 'tml_1696497165_4942473.jpg', 'Laboris alias culpa', 'Aiko Chan'),
(21, 'Thane Robbins', 'Jamal Turner  It was popularised in the 1960s with the release of Letraset sheets containing Lorem I', 'tml_1696499073_4165718.jpg', 'Harum qui eaque anim', 'TaShya Vazquez'),
(22, 'Germane Small', 'Bevis Bullock Bevis BullockBevis BullockBevis BullockBevis BullockBevis BullockBevis BullockBevis Bu', '', 'Quisquam eiusmod rei', 'Britanni Livingston'),
(23, 'Amaya Maddox', 'Kyla Hale', '', 'Nesciunt voluptatem', 'Igor Kim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`tml_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `tml_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
