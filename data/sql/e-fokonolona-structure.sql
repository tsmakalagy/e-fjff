-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2014 at 05:10 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-fokonolona`
--

-- --------------------------------------------------------

--
-- Table structure for table `birao`
--

CREATE TABLE IF NOT EXISTS `birao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fokotany_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9560F1A8564D0DDB` (`fokotany_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `birao_contact`
--

CREATE TABLE IF NOT EXISTS `birao_contact` (
  `birao_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  PRIMARY KEY (`birao_id`,`contact_id`),
  UNIQUE KEY `UNIQ_92996D2BE7A1254A` (`contact_id`),
  KEY `IDX_92996D2BF13F78D9` (`birao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `birao_member`
--

CREATE TABLE IF NOT EXISTS `birao_member` (
  `birao_id` int(11) NOT NULL,
  `olona_id` int(11) NOT NULL,
  PRIMARY KEY (`birao_id`,`olona_id`),
  UNIQUE KEY `UNIQ_30F12C95E5C5B308` (`olona_id`),
  KEY `IDX_30F12C95F13F78D9` (`birao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commune`
--

CREATE TABLE IF NOT EXISTS `commune` (
  `id` int(11) NOT NULL,
  `id_district` int(11) DEFAULT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `slogan` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E2E2D1EE611AB812` (`id_district`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `value` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL,
  `id_region` int(11) DEFAULT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `slogan` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_31C154872955449B` (`id_region`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fk_ad_adidy`
--

CREATE TABLE IF NOT EXISTS `fk_ad_adidy` (
  `fk_ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_ad_id_kp` int(11) DEFAULT NULL,
  `fk_ad_daty` datetime NOT NULL,
  `fk_ad_vita` int(11) NOT NULL,
  `fk_ad_desc` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`fk_ad_id`),
  KEY `IDX_B632477B58E031F3` (`fk_ad_id_kp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fk_fkt_user`
--

CREATE TABLE IF NOT EXISTS `fk_fkt_user` (
  `fk_us_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_us_name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_us_username` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_us_email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fk_us_password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fk_us_reset_code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_us_reset_time` int(11) DEFAULT NULL,
  `fk_us_remember_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_us_last_login` datetime DEFAULT NULL,
  `fk_us_last_logout` datetime DEFAULT NULL,
  PRIMARY KEY (`fk_us_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fk_kara_pokotany`
--

CREATE TABLE IF NOT EXISTS `fk_kara_pokotany` (
  `fk_kp_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_kp_lohampianakaviana` int(11) DEFAULT NULL,
  `birao_id` int(11) DEFAULT NULL,
  `fk_kp_fkt_niaviana` int(11) DEFAULT NULL,
  `fk_kp_fkt_andehanana` int(11) DEFAULT NULL,
  `fk_kp_laharana` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fk_kp_date_inscription` datetime NOT NULL,
  `fk_kp_faritra` int(11) DEFAULT NULL,
  `fk_kp_date_nahatongavana` datetime DEFAULT NULL,
  `fk_kp_date_nialana` datetime DEFAULT NULL,
  `fk_kp_adiresy` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`fk_kp_id`),
  UNIQUE KEY `UNIQ_D363D7F561D700B9` (`fk_kp_lohampianakaviana`),
  KEY `IDX_D363D7F51079EA49` (`fk_kp_fkt_niaviana`),
  KEY `IDX_D363D7F5A196879D` (`fk_kp_fkt_andehanana`),
  KEY `IDX_D363D7F5F13F78D9` (`birao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fk_olona`
--

CREATE TABLE IF NOT EXISTS `fk_olona` (
  `fk_ol_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_ol_kp_id` int(11) DEFAULT NULL,
  `fk_ol_andr_id` int(11) DEFAULT NULL,
  `fk_ol_anarana` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fk_ol_fanampiny` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_ol_date_naiss` datetime DEFAULT NULL,
  `fk_ol_velona` int(11) NOT NULL,
  `fk_ol_cin` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_ol_sex` int(11) NOT NULL,
  `fk_ol_date_cin` datetime DEFAULT NULL,
  `fk_ol_asa` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`fk_ol_id`),
  KEY `IDX_EF1DE7B5F3D248F1` (`fk_ol_kp_id`),
  KEY `IDX_EF1DE7B52EE2E201` (`fk_ol_andr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fk_ol_andraikitra`
--

CREATE TABLE IF NOT EXISTS `fk_ol_andraikitra` (
  `fk_andr_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_andr_anarana` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`fk_andr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fk_photo`
--

CREATE TABLE IF NOT EXISTS `fk_photo` (
  `fk_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `birao_id` int(11) DEFAULT NULL,
  `fk_photo_nom` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fk_photo_chemin` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`fk_photo_id`),
  KEY `IDX_D55AA76DF13F78D9` (`birao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fk_ro_role`
--

CREATE TABLE IF NOT EXISTS `fk_ro_role` (
  `fk_ro_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_ro_parent` int(11) DEFAULT NULL,
  `fk_ro_libelle` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`fk_ro_id`),
  KEY `IDX_237893B391FC2C8` (`fk_ro_parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fk_user_role`
--

CREATE TABLE IF NOT EXISTS `fk_user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_4CB11133A76ED395` (`user_id`),
  KEY `IDX_4CB11133D60322AC` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fokotany`
--

CREATE TABLE IF NOT EXISTS `fokotany` (
  `id` int(11) NOT NULL,
  `id_commune` int(11) DEFAULT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `slogan` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8E64C313C7F789E` (`id_commune`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `slogan` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `birao`
--
ALTER TABLE `birao`
  ADD CONSTRAINT `FK_9560F1A8564D0DDB` FOREIGN KEY (`fokotany_id`) REFERENCES `fokotany` (`id`);

--
-- Constraints for table `birao_contact`
--
ALTER TABLE `birao_contact`
  ADD CONSTRAINT `FK_92996D2BE7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`),
  ADD CONSTRAINT `FK_92996D2BF13F78D9` FOREIGN KEY (`birao_id`) REFERENCES `birao` (`id`);

--
-- Constraints for table `birao_member`
--
ALTER TABLE `birao_member`
  ADD CONSTRAINT `FK_30F12C95E5C5B308` FOREIGN KEY (`olona_id`) REFERENCES `fk_olona` (`fk_ol_id`),
  ADD CONSTRAINT `FK_30F12C95F13F78D9` FOREIGN KEY (`birao_id`) REFERENCES `birao` (`id`);

--
-- Constraints for table `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `FK_E2E2D1EE611AB812` FOREIGN KEY (`id_district`) REFERENCES `district` (`id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `FK_31C154872955449B` FOREIGN KEY (`id_region`) REFERENCES `region` (`id`);

--
-- Constraints for table `fk_ad_adidy`
--
ALTER TABLE `fk_ad_adidy`
  ADD CONSTRAINT `FK_B632477B58E031F3` FOREIGN KEY (`fk_ad_id_kp`) REFERENCES `fk_kara_pokotany` (`fk_kp_id`);

--
-- Constraints for table `fk_kara_pokotany`
--
ALTER TABLE `fk_kara_pokotany`
  ADD CONSTRAINT `FK_D363D7F51079EA49` FOREIGN KEY (`fk_kp_fkt_niaviana`) REFERENCES `fokotany` (`id`),
  ADD CONSTRAINT `FK_D363D7F561D700B9` FOREIGN KEY (`fk_kp_lohampianakaviana`) REFERENCES `fk_olona` (`fk_ol_id`),
  ADD CONSTRAINT `FK_D363D7F5A196879D` FOREIGN KEY (`fk_kp_fkt_andehanana`) REFERENCES `fokotany` (`id`),
  ADD CONSTRAINT `FK_D363D7F5F13F78D9` FOREIGN KEY (`birao_id`) REFERENCES `birao` (`id`);

--
-- Constraints for table `fk_olona`
--
ALTER TABLE `fk_olona`
  ADD CONSTRAINT `FK_EF1DE7B52EE2E201` FOREIGN KEY (`fk_ol_andr_id`) REFERENCES `fk_ol_andraikitra` (`fk_andr_id`),
  ADD CONSTRAINT `FK_EF1DE7B5F3D248F1` FOREIGN KEY (`fk_ol_kp_id`) REFERENCES `fk_kara_pokotany` (`fk_kp_id`);

--
-- Constraints for table `fk_photo`
--
ALTER TABLE `fk_photo`
  ADD CONSTRAINT `FK_D55AA76DF13F78D9` FOREIGN KEY (`birao_id`) REFERENCES `birao` (`id`);

--
-- Constraints for table `fk_ro_role`
--
ALTER TABLE `fk_ro_role`
  ADD CONSTRAINT `FK_237893B391FC2C8` FOREIGN KEY (`fk_ro_parent`) REFERENCES `fk_ro_role` (`fk_ro_id`);

--
-- Constraints for table `fk_user_role`
--
ALTER TABLE `fk_user_role`
  ADD CONSTRAINT `FK_4CB11133A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fk_fkt_user` (`fk_us_id`),
  ADD CONSTRAINT `FK_4CB11133D60322AC` FOREIGN KEY (`role_id`) REFERENCES `fk_ro_role` (`fk_ro_id`);

--
-- Constraints for table `fokotany`
--
ALTER TABLE `fokotany`
  ADD CONSTRAINT `FK_8E64C313C7F789E` FOREIGN KEY (`id_commune`) REFERENCES `commune` (`id`);
