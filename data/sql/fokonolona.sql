-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2014 at 01:27 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fokonolona`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fk_ad_adidy`
--


-- --------------------------------------------------------

--
-- Table structure for table `fk_dist_district`
--

CREATE TABLE IF NOT EXISTS `fk_dist_district` (
  `fk_dist_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_dist_reg_id` int(11) DEFAULT NULL,
  `fk_dist_anarana` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fk_dist_slogan` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`fk_dist_id`),
  KEY `IDX_71E5C148D3EEA993` (`fk_dist_reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fk_dist_district`
--


-- --------------------------------------------------------

--
-- Table structure for table `fk_fir_firaisana`
--

CREATE TABLE IF NOT EXISTS `fk_fir_firaisana` (
  `fk_fir_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_fir_fiv_id` int(11) DEFAULT NULL,
  `fk_fir_anarana` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fk_fir_slogan` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`fk_fir_id`),
  KEY `IDX_A376A45099EEF487` (`fk_fir_fiv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fk_fir_firaisana`
--


-- --------------------------------------------------------

--
-- Table structure for table `fk_fiv_fivondronana`
--

CREATE TABLE IF NOT EXISTS `fk_fiv_fivondronana` (
  `fk_fiv_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_fiv_dist_id` int(11) DEFAULT NULL,
  `fk_fiv_anarana` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fk_fiv_slogan` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`fk_fiv_id`),
  KEY `IDX_F856FA6CB70B2BE` (`fk_fiv_dist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fk_fiv_fivondronana`
--


-- --------------------------------------------------------

--
-- Table structure for table `fk_fkt_fokotany`
--

CREATE TABLE IF NOT EXISTS `fk_fkt_fokotany` (
  `fk_fkt_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_fkt_fir_id` int(11) DEFAULT NULL,
  `fk_fkt_anarana` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fk_fkt_slogan` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`fk_fkt_id`),
  KEY `IDX_D11F24FFFE1542D1` (`fk_fkt_fir_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fk_fkt_fokotany`
--


-- --------------------------------------------------------

--
-- Table structure for table `fk_fkt_user`
--

CREATE TABLE IF NOT EXISTS `fk_fkt_user` (
  `fk_us_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_us_username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fk_us_password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fk_us_last_login` datetime DEFAULT NULL,
  `fk_us_last_logout` datetime DEFAULT NULL,
  PRIMARY KEY (`fk_us_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fk_fkt_user`
--


-- --------------------------------------------------------

--
-- Table structure for table `fk_kara_pokotany`
--

CREATE TABLE IF NOT EXISTS `fk_kara_pokotany` (
  `fk_kp_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_kp_lohampianakaviana` int(11) DEFAULT NULL,
  `fk_kp_fkt_id` int(11) DEFAULT NULL,
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
  KEY `IDX_D363D7F56DB9557B` (`fk_kp_fkt_id`),
  KEY `IDX_D363D7F51079EA49` (`fk_kp_fkt_niaviana`),
  KEY `IDX_D363D7F5A196879D` (`fk_kp_fkt_andehanana`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fk_kara_pokotany`
--


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
  `fk_ol_date_cin` datetime DEFAULT NULL,
  `fk_ol_asa` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`fk_ol_id`),
  KEY `IDX_EF1DE7B5F3D248F1` (`fk_ol_kp_id`),
  KEY `IDX_EF1DE7B52EE2E201` (`fk_ol_andr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fk_olona`
--


-- --------------------------------------------------------

--
-- Table structure for table `fk_ol_andraikitra`
--

CREATE TABLE IF NOT EXISTS `fk_ol_andraikitra` (
  `fk_andr_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_andr_anarana` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`fk_andr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fk_ol_andraikitra`
--


-- --------------------------------------------------------

--
-- Table structure for table `fk_photo`
--

CREATE TABLE IF NOT EXISTS `fk_photo` (
  `fk_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_photo_fkt_id` int(11) DEFAULT NULL,
  `fk_photo_nom` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fk_photo_chemin` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`fk_photo_id`),
  KEY `IDX_D55AA76D88B25560` (`fk_photo_fkt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fk_photo`
--


-- --------------------------------------------------------

--
-- Table structure for table `fk_reg_region`
--

CREATE TABLE IF NOT EXISTS `fk_reg_region` (
  `fk_reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_reg_anarana` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fk_reg_slogan` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`fk_reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fk_reg_region`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fk_ro_role`
--


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

--
-- Dumping data for table `fk_user_role`
--


-- --------------------------------------------------------

--
-- Table structure for table `gdn_attribute`
--

CREATE TABLE IF NOT EXISTS `gdn_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gdn_attribute`
--

INSERT INTO `gdn_attribute` (`id`, `name`) VALUES
(1, 'ORM'),
(2, 'DBAL');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fk_ad_adidy`
--
ALTER TABLE `fk_ad_adidy`
  ADD CONSTRAINT `FK_B632477B58E031F3` FOREIGN KEY (`fk_ad_id_kp`) REFERENCES `fk_kara_pokotany` (`fk_kp_id`);

--
-- Constraints for table `fk_dist_district`
--
ALTER TABLE `fk_dist_district`
  ADD CONSTRAINT `FK_71E5C148D3EEA993` FOREIGN KEY (`fk_dist_reg_id`) REFERENCES `fk_reg_region` (`fk_reg_id`);

--
-- Constraints for table `fk_fir_firaisana`
--
ALTER TABLE `fk_fir_firaisana`
  ADD CONSTRAINT `FK_A376A45099EEF487` FOREIGN KEY (`fk_fir_fiv_id`) REFERENCES `fk_fiv_fivondronana` (`fk_fiv_id`);

--
-- Constraints for table `fk_fiv_fivondronana`
--
ALTER TABLE `fk_fiv_fivondronana`
  ADD CONSTRAINT `FK_F856FA6CB70B2BE` FOREIGN KEY (`fk_fiv_dist_id`) REFERENCES `fk_dist_district` (`fk_dist_id`);

--
-- Constraints for table `fk_fkt_fokotany`
--
ALTER TABLE `fk_fkt_fokotany`
  ADD CONSTRAINT `FK_D11F24FFFE1542D1` FOREIGN KEY (`fk_fkt_fir_id`) REFERENCES `fk_fir_firaisana` (`fk_fir_id`);

--
-- Constraints for table `fk_kara_pokotany`
--
ALTER TABLE `fk_kara_pokotany`
  ADD CONSTRAINT `FK_D363D7F51079EA49` FOREIGN KEY (`fk_kp_fkt_niaviana`) REFERENCES `fk_fkt_fokotany` (`fk_fkt_id`),
  ADD CONSTRAINT `FK_D363D7F561D700B9` FOREIGN KEY (`fk_kp_lohampianakaviana`) REFERENCES `fk_olona` (`fk_ol_id`),
  ADD CONSTRAINT `FK_D363D7F56DB9557B` FOREIGN KEY (`fk_kp_fkt_id`) REFERENCES `fk_fkt_fokotany` (`fk_fkt_id`),
  ADD CONSTRAINT `FK_D363D7F5A196879D` FOREIGN KEY (`fk_kp_fkt_andehanana`) REFERENCES `fk_fkt_fokotany` (`fk_fkt_id`);

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
  ADD CONSTRAINT `FK_D55AA76D88B25560` FOREIGN KEY (`fk_photo_fkt_id`) REFERENCES `fk_fkt_fokotany` (`fk_fkt_id`);

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
