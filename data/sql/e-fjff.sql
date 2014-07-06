-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 06, 2014 at 10:09 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-fjff`
--

-- --------------------------------------------------------

--
-- Table structure for table `eglises`
--

CREATE TABLE IF NOT EXISTS `eglises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fokotany_id` int(11) DEFAULT NULL,
  `nom` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CCCEC876564D0DDB` (`fokotany_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enfants`
--

CREATE TABLE IF NOT EXISTS `enfants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datenaissance` datetime DEFAULT NULL,
  `classe` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `relativePath` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `dimension` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C53D045F93CB796C` (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parents_enfants`
--

CREATE TABLE IF NOT EXISTS `parents_enfants` (
  `parent_id` int(11) NOT NULL,
  `enfant_id` int(11) NOT NULL,
  PRIMARY KEY (`parent_id`,`enfant_id`),
  KEY `IDX_ACA286D8727ACA70` (`parent_id`),
  KEY `IDX_ACA286D8450D2529` (`enfant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conjoint_id` int(11) DEFAULT NULL,
  `nom` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datenaissance` datetime DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `occupation` int(11) NOT NULL,
  `sexe` int(11) NOT NULL,
  `datesab` datetime DEFAULT NULL,
  `dateosotra` datetime DEFAULT NULL,
  `telephone` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2BB4FE2B5E8D7836` (`conjoint_id`),
  UNIQUE KEY `UNIQ_2BB4FE2B93CB796C` (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postes`
--

CREATE TABLE IF NOT EXISTS `postes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `debut` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `current` int(11) DEFAULT NULL,
  `eglise_id` int(11) DEFAULT NULL,
  `pasteur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A763C6462B480E8` (`eglise_id`),
  KEY `IDX_5A763C64551E9F21` (`pasteur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `libelle` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_57698A6A3D8E604F` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `reset_code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_time` int(11) DEFAULT NULL,
  `remember_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_2DE8C6A3A76ED395` (`user_id`),
  KEY `IDX_2DE8C6A3D60322AC` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eglises`
--
ALTER TABLE `eglises`
  ADD CONSTRAINT `FK_CCCEC876564D0DDB` FOREIGN KEY (`fokotany_id`) REFERENCES `fokotany` (`id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045F93CB796C` FOREIGN KEY (`file_id`) REFERENCES `file` (`id`);

--
-- Constraints for table `parents_enfants`
--
ALTER TABLE `parents_enfants`
  ADD CONSTRAINT `FK_ACA286D8450D2529` FOREIGN KEY (`enfant_id`) REFERENCES `enfants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ACA286D8727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `personnes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `personnes`
--
ALTER TABLE `personnes`
  ADD CONSTRAINT `FK_2BB4FE2B5E8D7836` FOREIGN KEY (`conjoint_id`) REFERENCES `personnes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2BB4FE2B93CB796C` FOREIGN KEY (`file_id`) REFERENCES `file` (`id`);

--
-- Constraints for table `postes`
--
ALTER TABLE `postes`
  ADD CONSTRAINT `FK_5A763C64551E9F21` FOREIGN KEY (`pasteur_id`) REFERENCES `personnes` (`id`),
  ADD CONSTRAINT `FK_5A763C6462B480E8` FOREIGN KEY (`eglise_id`) REFERENCES `eglises` (`id`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `FK_57698A6A3D8E604F` FOREIGN KEY (`parent`) REFERENCES `role` (`id`);

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `FK_2DE8C6A3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_2DE8C6A3D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
