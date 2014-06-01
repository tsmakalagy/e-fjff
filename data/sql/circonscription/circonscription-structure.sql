-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2014 at 05:05 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Table structure for table `commune`
--

CREATE TABLE IF NOT EXISTS `commune` (
  `id` int(11) NOT NULL,
  `id_district` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `slogan` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_district` (`id_district`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `slogan` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_region` (`id_region`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fokotany`
--

CREATE TABLE IF NOT EXISTS `fokotany` (
  `id` int(11) NOT NULL,
  `id_commune` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `slogan` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_commune` (`id_commune`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slogan` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `commune_ibfk_1` FOREIGN KEY (`id_district`) REFERENCES `district` (`id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id`);

--
-- Constraints for table `fokotany`
--
ALTER TABLE `fokotany`
  ADD CONSTRAINT `fokotany_ibfk_1` FOREIGN KEY (`id_commune`) REFERENCES `commune` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
