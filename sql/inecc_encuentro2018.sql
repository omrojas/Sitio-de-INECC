-- phpMyAdmin SQL Dump
-- version 4.8.3-dev
-- https://www.phpmyadmin.net/
--
-- Host: tesse001.mysql.guardedhost.com:3306
-- Generation Time: Sep 03, 2018 at 08:30 PM
-- Server version: 10.3.9-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `tesse001_encuentro2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `registro_general`
--

DROP TABLE IF EXISTS `registro_general`;
CREATE TABLE `registro_general` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `dependencia` varchar(75) NOT NULL,
  `espersonal` varchar(3) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `edad` varchar(12) NOT NULL,
  `asistenciaPrevia` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registro_general`
--
ALTER TABLE `registro_general`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registro_general`
--
ALTER TABLE `registro_general`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;
