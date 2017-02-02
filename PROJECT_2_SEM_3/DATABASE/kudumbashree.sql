-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2017 at 06:07 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kudumbashree`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliation_number`
--

CREATE TABLE IF NOT EXISTS `affiliation_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `affiliation_number` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`affiliation_number`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `affiliation_number_2` (`affiliation_number`),
  UNIQUE KEY `affiliation_number_3` (`affiliation_number`),
  KEY `affiliation_number` (`affiliation_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `affiliation_number`
--

INSERT INTO `affiliation_number` (`id`, `affiliation_number`, `status`, `date`) VALUES
(86, '1', 0, '2016-10-06 12:17:36'),
(83, '101', 0, '2016-04-07 10:29:43'),
(85, '11', 0, '2016-04-07 11:17:54'),
(87, '111', 0, '2017-01-20 11:10:34'),
(90, '1111', 0, '2017-01-20 11:29:16'),
(84, '121', 0, '2016-04-07 10:57:45'),
(80, '123456789', 0, '2016-04-06 23:09:35'),
(81, '500', 0, '2016-04-07 09:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `loan_repay`
--

CREATE TABLE IF NOT EXISTS `loan_repay` (
  `l_id` int(200) NOT NULL AUTO_INCREMENT,
  `m_id` int(200) DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `k_id` int(200) DEFAULT NULL,
  `m_name` varchar(200) DEFAULT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`l_id`),
  UNIQUE KEY `l_id` (`l_id`,`m_id`,`k_id`),
  KEY `m_id` (`m_id`),
  KEY `k_id` (`k_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `loan_repay`
--

INSERT INTO `loan_repay` (`l_id`, `m_id`, `amount`, `k_id`, `m_name`, `date`) VALUES
(22, 84, '10', 86, 'fathima', '2016-04-06 23:24:13'),
(23, 88, '10', 87, 'sreeja', '2016-04-07 10:13:24'),
(24, 91, '50', 92, 'afs', '2017-01-20 11:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `member_add`
--

CREATE TABLE IF NOT EXISTS `member_add` (
  `m_id` int(200) NOT NULL AUTO_INCREMENT,
  `k_id` int(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `parent_name` varchar(200) DEFAULT NULL,
  `dob_day` varchar(200) DEFAULT NULL,
  `dob_month` varchar(200) DEFAULT NULL,
  `dob_year` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `blood_group` varchar(200) DEFAULT NULL,
  `card_type` varchar(200) DEFAULT NULL,
  `caste` varchar(200) DEFAULT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`m_id`),
  UNIQUE KEY `m_id_2` (`m_id`,`k_id`),
  KEY `k_id` (`k_id`),
  KEY `m_id` (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `member_add`
--

INSERT INTO `member_add` (`m_id`, `k_id`, `name`, `parent_name`, `dob_day`, `dob_month`, `dob_year`, `phone`, `blood_group`, `card_type`, `caste`, `date`) VALUES
(84, 86, 'fathima', 'pfathima', '1', 'January', '1978', '977700000', 'A+', 'APL', 'muslim', '2016-04-06 23:13:56'),
(85, 86, 'rajani', 'prajani', '1', 'January', '1984', '978500000', 'O+', 'APL', 'hindu', '2016-04-06 23:14:46'),
(86, 86, 'anu', 'panu', '1', 'January', '1994', '97450000', 'B+', 'BPL', 'hindu', '2016-04-06 23:18:49'),
(87, 87, 'ramya', 'pramya', '5', 'April', '1993', '978846545', 'A+', 'BPL', 'hindu', '2016-04-07 09:58:48'),
(88, 87, 'sreeja', 'sreeja.k', '2', 'July', '1988', '9876543210', 'A+', 'APL', 'hindu', '2016-04-07 10:02:28'),
(89, 88, 'shamna', 'sajitha', '4', 'Febuary', '1986', '36598742', 'A+', 'APL', 'muslim', '2016-04-07 10:36:42'),
(90, 91, 'a', 'a', '1', 'January', '2003', '8897', 'A+', 'APL', 'hindu', '2017-01-20 11:17:37'),
(91, 92, 'afs', 'pjj', '1', 'January', '2003', '876', 'A+', 'APL', 'hindu', '2017-01-20 11:31:45'),
(92, 92, 'sfss', 'lkjkl', '1', 'January', '2003', '7687', 'A+', 'APL', 'hindu', '2017-01-20 11:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `member_deposit`
--

CREATE TABLE IF NOT EXISTS `member_deposit` (
  `d_id` int(200) NOT NULL AUTO_INCREMENT,
  `m_id` int(200) DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `k_id` int(200) DEFAULT NULL,
  `m_name` varchar(200) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`d_id`),
  UNIQUE KEY `d_id` (`d_id`,`m_id`,`k_id`),
  KEY `m_id` (`m_id`),
  KEY `k_id` (`k_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `member_deposit`
--

INSERT INTO `member_deposit` (`d_id`, `m_id`, `amount`, `k_id`, `m_name`, `date`) VALUES
(39, 84, '100', 86, 'fathima', '2016-04-06 23:16:56'),
(40, 85, '150', 86, 'rajani', '2016-04-06 23:17:56'),
(41, 84, '10', 86, 'fathima', '2016-04-06 23:27:47'),
(42, 84, '15', 86, 'fathima', '2016-04-06 23:28:37'),
(43, 87, '100', 87, 'ramya', '2016-04-07 10:07:08'),
(44, 88, '100', 87, 'sreeja', '2016-04-07 10:08:03'),
(45, 88, '10', 87, 'sreeja', '2016-04-07 10:11:26'),
(46, 88, '10', 87, 'sreeja', '2016-04-07 10:13:24'),
(47, 90, '100', 91, 'a', '2017-01-20 11:20:40'),
(48, 91, '500', 92, 'afs', '2017-01-20 11:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `member_loan`
--

CREATE TABLE IF NOT EXISTS `member_loan` (
  `l_id` int(200) NOT NULL AUTO_INCREMENT,
  `m_id` int(200) DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `k_id` int(200) DEFAULT NULL,
  `m_name` varchar(200) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`l_id`),
  UNIQUE KEY `l_id` (`l_id`,`m_id`,`k_id`),
  KEY `m_id` (`m_id`),
  KEY `k_id` (`k_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `member_loan`
--

INSERT INTO `member_loan` (`l_id`, `m_id`, `amount`, `k_id`, `m_name`, `date`) VALUES
(32, 84, '200', 86, 'fathima', '2016-04-06 23:20:24'),
(33, 88, '50', 87, 'sreeja', '2016-04-07 10:10:38'),
(34, 90, '50', 91, 'a', '2017-01-20 11:21:14'),
(35, 91, '100', 92, 'afs', '2017-01-20 11:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `punchayath_login`
--

CREATE TABLE IF NOT EXISTS `punchayath_login` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `varchar` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `punchayath_login`
--

INSERT INTO `punchayath_login` (`id`, `username`, `password`, `varchar`) VALUES
(1, 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up_kudumbashree`
--

CREATE TABLE IF NOT EXISTS `sign_up_kudumbashree` (
  `k_id` int(200) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `affiliation_number` varchar(200) DEFAULT NULL,
  `place` varchar(200) DEFAULT NULL,
  `presi_secre_name` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`k_id`),
  UNIQUE KEY `k_id_3` (`k_id`,`affiliation_number`),
  UNIQUE KEY `k_id_4` (`k_id`,`affiliation_number`),
  KEY `affiliation_number` (`affiliation_number`),
  KEY `k_id` (`k_id`),
  KEY `k_id_2` (`k_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `sign_up_kudumbashree`
--

INSERT INTO `sign_up_kudumbashree` (`k_id`, `name`, `affiliation_number`, `place`, `presi_secre_name`, `phone`, `date`) VALUES
(86, 'sevena', '123456789', 'areacode', 'ratha', '9745000000', '2016-04-06 23:11:05'),
(87, 'sneha', '500', 'thiruvananthapuram', 'rema', '98740000', '2016-04-07 09:55:06'),
(88, ' bismi', '101', 'maprm', 'kadeeja', '8281144298', '2016-04-07 10:33:01'),
(89, 'kerala', '11', 'kkl', 'a', '54646', '2016-04-07 11:19:24'),
(90, 'test', '1', 'testplace', 'testname', '45235', '2016-10-06 12:17:55'),
(91, 'abc', '111', 'kkl', 'hedd', '98098', '2017-01-20 11:11:12'),
(92, 'abcd', '1111', 'kkl', 'asd', '98798', '2017-01-20 11:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_password`
--

CREATE TABLE IF NOT EXISTS `user_password` (
  `username` varchar(200) DEFAULT NULL,
  `u_p_id` int(200) NOT NULL AUTO_INCREMENT,
  `password` varchar(200) DEFAULT NULL,
  `designate` varchar(200) DEFAULT NULL,
  `k_id` int(200) DEFAULT NULL,
  `m_id` int(200) DEFAULT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`u_p_id`),
  UNIQUE KEY `u_p_id` (`u_p_id`,`k_id`,`m_id`),
  UNIQUE KEY `u_p_id_2` (`u_p_id`,`k_id`,`m_id`),
  KEY `k_id` (`k_id`),
  KEY `m_id` (`m_id`),
  KEY `m_id_2` (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `user_password`
--

INSERT INTO `user_password` (`username`, `u_p_id`, `password`, `designate`, `k_id`, `m_id`, `date`) VALUES
('123456789', 58, '123', 'secre_presi', 86, NULL, '2016-04-06 23:11:05'),
('a19', 59, '123', 'member', 86, 84, '2016-04-06 23:13:56'),
('b19', 60, '123', 'member', 86, 85, '2016-04-06 23:14:46'),
('c19', 61, '123', 'member', 86, 86, '2016-04-06 23:18:49'),
('500', 62, '1234', 'secre_presi', 87, NULL, '2016-04-07 09:55:06'),
('ramya', 63, '1234', 'member', 87, 87, '2016-04-07 09:58:48'),
('sreeja', 64, '1234', 'member', 87, 88, '2016-04-07 10:02:29'),
('101', 65, '123', 'secre_presi', 88, NULL, '2016-04-07 10:33:01'),
('shamna', 66, '555', 'member', 88, 89, '2016-04-07 10:36:42'),
('11', 67, '123', 'secre_presi', 89, NULL, '2016-04-07 11:19:24'),
('1', 68, '123', 'secre_presi', 90, NULL, '2016-10-06 12:17:55'),
('111', 69, '123', 'secre_presi', 91, NULL, '2017-01-20 11:11:12'),
('a', 70, '1234', 'member', 91, 90, '2017-01-20 11:17:37'),
('1111', 71, '1234', 'secre_presi', 92, NULL, '2017-01-20 11:30:32'),
('afs', 72, '123', 'member', 92, 91, '2017-01-20 11:31:45'),
('afss', 73, '123', 'member', 92, 92, '2017-01-20 11:42:02');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loan_repay`
--
ALTER TABLE `loan_repay`
  ADD CONSTRAINT `loan_repay_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `member_add` (`m_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `loan_repay_ibfk_2` FOREIGN KEY (`k_id`) REFERENCES `sign_up_kudumbashree` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member_add`
--
ALTER TABLE `member_add`
  ADD CONSTRAINT `member_add_ibfk_1` FOREIGN KEY (`k_id`) REFERENCES `sign_up_kudumbashree` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member_deposit`
--
ALTER TABLE `member_deposit`
  ADD CONSTRAINT `member_deposit_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `member_add` (`m_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `member_deposit_ibfk_2` FOREIGN KEY (`k_id`) REFERENCES `sign_up_kudumbashree` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member_loan`
--
ALTER TABLE `member_loan`
  ADD CONSTRAINT `member_loan_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `member_add` (`m_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `member_loan_ibfk_2` FOREIGN KEY (`k_id`) REFERENCES `sign_up_kudumbashree` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sign_up_kudumbashree`
--
ALTER TABLE `sign_up_kudumbashree`
  ADD CONSTRAINT `sign_up_kudumbashree_ibfk_1` FOREIGN KEY (`affiliation_number`) REFERENCES `affiliation_number` (`affiliation_number`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_password`
--
ALTER TABLE `user_password`
  ADD CONSTRAINT `user_password_ibfk_2` FOREIGN KEY (`m_id`) REFERENCES `member_add` (`m_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_password_ibfk_3` FOREIGN KEY (`k_id`) REFERENCES `sign_up_kudumbashree` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
