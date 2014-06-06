-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2014 at 07:21 AM
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

--
-- Dumping data for table `fk_ro_role`
--

INSERT INTO `fk_ro_role` (`fk_ro_id`, `fk_ro_parent`, `fk_ro_libelle`) VALUES
(1, NULL, 'guest'),
(2, 1, 'user'),
(3, 2, 'admin');
