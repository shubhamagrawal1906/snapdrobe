-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2016 at 06:05 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `snapdrobe`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow6`
--

CREATE TABLE IF NOT EXISTS `follow6` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sent` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `follow6`
--

INSERT INTO `follow6` (`follow_id`, `user_id`, `sent`, `confirm`) VALUES
(7, 12, 1, 0),
(9, 8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `follow8`
--

CREATE TABLE IF NOT EXISTS `follow8` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sent` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `follow9`
--

CREATE TABLE IF NOT EXISTS `follow9` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sent` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `follow9`
--

INSERT INTO `follow9` (`follow_id`, `user_id`, `sent`, `confirm`) VALUES
(1, 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `follow10`
--

CREATE TABLE IF NOT EXISTS `follow10` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sent` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `follow10`
--

INSERT INTO `follow10` (`follow_id`, `user_id`, `sent`, `confirm`) VALUES
(6, 9, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `follow12`
--

CREATE TABLE IF NOT EXISTS `follow12` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sent` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `follow12`
--

INSERT INTO `follow12` (`follow_id`, `user_id`, `sent`, `confirm`) VALUES
(3, 8, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `follow13`
--

CREATE TABLE IF NOT EXISTS `follow13` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sent` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `follow14`
--

CREATE TABLE IF NOT EXISTS `follow14` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sent` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `follow14`
--

INSERT INTO `follow14` (`follow_id`, `user_id`, `sent`, `confirm`) VALUES
(9, 12, 1, 1),
(11, 8, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `follow15`
--

CREATE TABLE IF NOT EXISTS `follow15` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sent` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `follow16`
--

CREATE TABLE IF NOT EXISTS `follow16` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sent` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `following6`
--

CREATE TABLE IF NOT EXISTS `following6` (
  `following_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `received` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`following_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `following8`
--

CREATE TABLE IF NOT EXISTS `following8` (
  `following_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `received` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`following_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `following8`
--

INSERT INTO `following8` (`following_id`, `user_id`, `received`, `confirm`) VALUES
(4, 12, 1, 0),
(5, 14, 1, 0),
(6, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `following9`
--

CREATE TABLE IF NOT EXISTS `following9` (
  `following_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `received` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`following_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `following9`
--

INSERT INTO `following9` (`following_id`, `user_id`, `received`, `confirm`) VALUES
(4, 10, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `following10`
--

CREATE TABLE IF NOT EXISTS `following10` (
  `following_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `received` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`following_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `following10`
--

INSERT INTO `following10` (`following_id`, `user_id`, `received`, `confirm`) VALUES
(1, 9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `following12`
--

CREATE TABLE IF NOT EXISTS `following12` (
  `following_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `received` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`following_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `following12`
--

INSERT INTO `following12` (`following_id`, `user_id`, `received`, `confirm`) VALUES
(12, 14, 1, 1),
(13, 6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `following13`
--

CREATE TABLE IF NOT EXISTS `following13` (
  `following_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `received` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`following_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `following14`
--

CREATE TABLE IF NOT EXISTS `following14` (
  `following_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `received` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`following_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `following15`
--

CREATE TABLE IF NOT EXISTS `following15` (
  `following_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `received` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`following_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `following16`
--

CREATE TABLE IF NOT EXISTS `following16` (
  `following_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `received` int(1) NOT NULL DEFAULT '1',
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`following_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification6`
--

CREATE TABLE IF NOT EXISTS `notification6` (
  `notify_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(1024) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification8`
--

CREATE TABLE IF NOT EXISTS `notification8` (
  `notify_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(1024) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification9`
--

CREATE TABLE IF NOT EXISTS `notification9` (
  `notify_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(1024) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification10`
--

CREATE TABLE IF NOT EXISTS `notification10` (
  `notify_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(1024) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification12`
--

CREATE TABLE IF NOT EXISTS `notification12` (
  `notify_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(1024) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification13`
--

CREATE TABLE IF NOT EXISTS `notification13` (
  `notify_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(1024) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification14`
--

CREATE TABLE IF NOT EXISTS `notification14` (
  `notify_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(1024) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification15`
--

CREATE TABLE IF NOT EXISTS `notification15` (
  `notify_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(1024) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification16`
--

CREATE TABLE IF NOT EXISTS `notification16` (
  `notify_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(1024) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `photo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tags` varchar(1024) NOT NULL,
  `path` varchar(1024) NOT NULL,
  `size` float NOT NULL,
  `ext` varchar(10) NOT NULL,
  `image` varchar(200) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_id`, `user_id`, `tags`, `path`, `size`, `ext`, `image`, `view`, `likes`) VALUES
(40, 6, '#labour#', 'images/8de655879f31210b2171_16child6.jpg', 0.171653, 'jpg', '', 2, 3),
(41, 6, '#child#labour#', 'images/140023eaf4233a10970f_16child6.jpg', 0.171653, 'jpg', '', 2, 2),
(42, 6, '#Lamborghani#', 'images/c435bb85c68652503ad3_novitec-torado-lamborghini-aventador-08.jpg', 1.07649, 'jpg', '', 1, 1),
(43, 6, '#Buildings#', 'images/cecd72c75d2878d4f380_1.jpg', 0.232089, 'jpg', '', 0, 1),
(44, 6, '#Bridge#', 'images/23a71ac2da16b0bafc26_22brid20.jpg', 0.0589466, 'jpg', '', 2, 2),
(45, 6, '#universe#', 'images/1203338518585cc764d0_140418172140-kepler-186f-0417-horizontal-gallery.jpg', 0.0357466, 'jpg', '', 1, 0),
(46, 6, '#Buildings#', 'images/63d344f441f50bc83f81_3.jpg', 0.0990229, 'jpg', '', 1, 2),
(47, 6, '#Buildings#', 'images/be3a5032e9ee73776aea_5.jpg', 0.0622892, 'jpg', '', 0, 1),
(48, 6, '#Sherlock#', 'images/acc04563ab6f0ae6b7c8_sherlock.jpg', 1.08442, 'jpg', '', 1, 0),
(49, 6, '#Sherlock#', 'images/b3818090c3b9da7caca6_SHERLOCK7.png', 0.571705, 'png', '', 0, 0),
(50, 6, '#Bridge#', 'images/f55b3f2474a700ca7ec1_4774775241_0be272272b_z.jpg', 0.0770807, 'jpg', '', 1, 2),
(51, 6, '#Lamborghani#', 'images/ad82a004bbea8c1d61d4_10636259_906427822709671_8045013021213620955_n.jpg', 0.0698633, 'jpg', '', 1, 2),
(52, 6, '#SRK#', 'images/b6943ceb738cafebbc52_10934013_546664238769281_8761397988510090721_n.jpg', 0.0296221, 'jpg', '', 1, 1),
(53, 6, '#SRK#Srk#', 'images/9d3c43b9082c2f7f6498_10934013_546664238769281_8761397988510090721_n.jpg', 0.0296221, 'jpg', '', 1, 1),
(54, 6, '##', 'images/ccc426d81f21750f932f_11051_10154817067930035_4444160489109728890_n.jpg', 0.0890551, 'jpg', '', 0, 1),
(55, 6, '#Lamborghani#', 'images/d81ff65d14558ea32868_10376265_10154869703535035_220023207441573475_n.jpg', 0.0438538, 'jpg', '', 0, 1),
(56, 6, '#Lamborghani#', 'images/d5e460a953a5ebca54f7_10376265_10154869703535035_220023207441573475_n.jpg', 0.0438538, 'jpg', '', 0, 1),
(57, 6, '#Lamborghani#', 'images/e5e170a25932f1f065df_10376265_10154869703535035_220023207441573475_n.jpg', 0.0438538, 'jpg', '', 0, 1),
(58, 6, '#Sports#Lamborghani#', 'images/e02edfaa6cc61a2ffa25_10428094_10154820344280035_5219949126645187667_n.jpg', 0.0735149, 'jpg', '', 1, 1),
(59, 6, '#Festival#', 'images/091a28d03c6687a9bfb2_11057459_454764964680970_1348031474167710427_n.jpg', 0.0211449, 'jpg', '', 1, 2),
(60, 6, '#Entertainment#', 'images/929f3cada028eeae14a2_1621435.jpg', 0.403685, 'jpg', '', 0, 0),
(61, 6, '#Entertainment#', 'images/47473361e455c4f75a3e_1621435.jpg', 0.403685, 'jpg', '', 1, 2),
(62, 6, '#Random#', 'images/32a1e0c52ce0b928545a_11.jpg', 0.08636, 'jpg', '', 0, 0),
(63, 6, '#Random#', 'images/78dd2819b377335ed568_11.jpg', 0.08636, 'jpg', '', 0, 0),
(64, 6, '#Entertainment#abhishek#aditya#', 'images/7ac3ef8f45108578fc3b_2f027e6261f2279d33d5d789529f9265.jpg', 0.0129223, 'jpg', '', 2, 2),
(65, 6, '#Trip#volkswagon#', 'images/52999d20443d65f9ddcd_11051_10154817067930035_4444160489109728890_n.jpg', 0.0890551, 'jpg', '', 0, 0),
(66, 6, '#Trip#malad#china#', 'images/de43acc0c8169e305f8a_10376265_10154869703535035_220023207441573475_n.jpg', 0.0438538, 'jpg', '', 0, 0),
(67, 6, '#Trip#dubai#burj#me#family#', 'images/8956624085f4fa26b659_2.jpg', 0.0442543, 'jpg', '', 1, 1),
(68, 6, '#Trip#Buildings#burjdubai#', 'images/d9af272f7e2107efb982_7.jpg', 0.265485, 'jpg', '', 0, 0),
(69, 6, '#Trip#Buildings#switzerland#', 'images/68a8a0db085bc6a6fb70_8.jpg', 0.0597906, 'jpg', '', 1, 2),
(70, 6, '#Events#dubai#trip#', 'images/c63472ccf725d52ff806_9.jpg', 0.278231, 'jpg', '', 0, 2),
(71, 6, '#Sports#olympics#china#', 'images/804edf4c290de83e4c29_3.jpg', 0.0990229, 'jpg', '', 0, 1),
(72, 6, '#Trip#dubai#friends#fun#', 'images/ab012332f5554ad9cbd9_2.jpg', 0.0442543, 'jpg', '', 0, 1),
(73, 6, '#Trip#friends#vodka#lakshya#', 'images/dba02eb9fbeb101f53dc_4.jpg', 0.560297, 'jpg', '', 0, 0),
(74, 6, '#Random#', 'images/837a0fc0d51945dfb2ba_10.jpg', 0.0582085, 'jpg', '', 0, 0),
(75, 6, '#Random#', 'images/3756dc3d3b4a02b65179_10.jpg', 0.0582085, 'jpg', '', 1, 1),
(76, 6, '#Events#', 'images/b055241f690408af8964_1.jpg', 0.232089, 'jpg', '', 0, 1),
(77, 6, '#Profile#Shubham#1302913108#', 'images/135aa29e410745840633_7.jpg', 0.265485, 'jpg', '', 0, 1),
(78, 6, '#Profile#Shubham#1302913108#', 'images/14998c2b50b431009225_c360_2014-02-14-16-22-44-388_001.jpg', 0.5062, 'jpg', '', 2, 0),
(79, 12, '#Profile#Shivam#shivamagrawal8765#', 'images/1a8213a3655ed6def703_Photo0103.jpg', 0.340775, 'jpg', '', 2, 3),
(80, 14, '#Profile#Shivam#salmanji@786#', 'images/db08dae975a94a0c223a_Photo0109.jpg', 0.29462, 'jpg', '', 1, 1),
(81, 15, '#Profile#preeti#premratandanpayo#', 'images/457f067e54ca046b3ac1_12191655_1636682043251533_8920906476704043530_n.jpg', 0.101621, 'jpg', '', 1, 1),
(82, 14, '#Profile#Shivam#salmanji@786#', 'images/26d64f983399d11bb81b_12191655_1636682043251533_8920906476704043530_n.jpg', 0.101621, 'jpg', '', 0, 0),
(83, 12, '#Profile#Shivam#shivamagrawal8765#', 'images/98bd89a9df85e7bafcdd_12191655_1636682043251533_8920906476704043530_n.jpg', 0.101621, 'jpg', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `photo_likes`
--

CREATE TABLE IF NOT EXISTS `photo_likes` (
  `like_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;

--
-- Dumping data for table `photo_likes`
--

INSERT INTO `photo_likes` (`like_id`, `photo_id`, `user_id`) VALUES
(65, 50, 6),
(71, 44, 6),
(79, 40, 6),
(84, 51, 6),
(88, 61, 6),
(91, 64, 12),
(94, 69, 6),
(95, 70, 6),
(96, 72, 6),
(100, 44, 12),
(101, 50, 12),
(102, 46, 12),
(103, 61, 12),
(104, 59, 12),
(107, 40, 12),
(108, 42, 12),
(109, 51, 12),
(110, 79, 12),
(111, 75, 12),
(112, 58, 12),
(113, 52, 12),
(114, 53, 12),
(115, 69, 12),
(116, 67, 12),
(117, 54, 12),
(119, 43, 12),
(120, 47, 12),
(121, 76, 12),
(122, 70, 12),
(123, 55, 12),
(125, 56, 12),
(126, 57, 12),
(127, 77, 12),
(128, 71, 12),
(129, 79, 6),
(130, 46, 14),
(131, 59, 14),
(132, 40, 14),
(134, 80, 14),
(135, 79, 15),
(136, 64, 15),
(137, 81, 15),
(142, 41, 6),
(143, 41, 8);

-- --------------------------------------------------------

--
-- Table structure for table `photo_view`
--

CREATE TABLE IF NOT EXISTS `photo_view` (
  `view_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`view_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `photo_view`
--

INSERT INTO `photo_view` (`view_id`, `photo_id`, `user_id`) VALUES
(69, 40, 6),
(70, 41, 6),
(71, 41, 8),
(72, 44, 6),
(73, 50, 6),
(74, 53, 6),
(75, 45, 6),
(76, 42, 6),
(77, 48, 6),
(78, 51, 6),
(79, 58, 6),
(80, 61, 6),
(81, 46, 6),
(82, 67, 6),
(83, 52, 6),
(84, 59, 6),
(85, 64, 12),
(86, 64, 6),
(87, 69, 6),
(88, 79, 12),
(89, 75, 12),
(90, 78, 12),
(91, 79, 6),
(92, 40, 14),
(93, 80, 14),
(94, 81, 15),
(95, 78, 6),
(96, 44, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `city` varchar(32) NOT NULL,
  `home` varchar(32) NOT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(1024) NOT NULL,
  `interest` varchar(1024) NOT NULL,
  `relation` varchar(15) NOT NULL,
  `education` varchar(20) NOT NULL,
  `profession` varchar(15) NOT NULL,
  `bio` varchar(3000) NOT NULL,
  `email_code` varchar(32) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `password_recover` int(1) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL DEFAULT '0',
  `allow_email` int(1) NOT NULL DEFAULT '0',
  `profile` varchar(1024) NOT NULL DEFAULT 'images/profile.jpg',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `gender`, `date`, `city`, `home`, `mobile`, `email`, `interest`, `relation`, `education`, `profession`, `bio`, `email_code`, `active`, `password_recover`, `type`, `allow_email`, `profile`) VALUES
(6, '1302913108', '5f4dcc3b5aa765d61d8327deb882cf99', 'Shubham', 'Agrawal', 'male', '1994-06-17', 'Allahabad', 'Ghaziabad', 918765630863, 'shubham.agrawal1906@gmail.com', 'Cricket', 'single', 'undergraduate', 'student', 'My name is Shubham.', 'b1d451b76179bd45a468b72fb64af1f0', 1, 0, 1, 0, 'images/14998c2b50b431009225_c360_2014-02-14-16-22-44-388_001.jpg'),
(8, '1302913109', '5f4dcc3b5aa765d61d8327deb882cf99', 'Shubham', 'Agrawal', '', '0000-00-00', 'New Delhi', '', 8765630863, 'shubham199541@gmail.com', '', '', '', '', '', '336d6efa75ace41d0f75ffe8aace9202', 1, 0, 0, 1, 'images/profile.jpg'),
(9, 'arpit', '25d55ad283aa400af464c76d713c07ad', 'Arpit', '', '', '0000-00-00', '', '', 0, 'masterarpitagarwal@gmail.com', '', '', '', '', '', '0d4ae05991d295dd631851fcf3931c77', 1, 0, 0, 0, 'images/profile.jpg'),
(10, 'amanjarvis', '0c84248ce460b47fea81ab48959ff65e', 'aman', 'mehrotra', '', '0000-00-00', '', '', 0, 'amansammehrotra@gmail.com', '', '', '', '', '', '71313d1b6ea4b33e00545723f9ab1510', 1, 0, 0, 0, 'images/profile.jpg'),
(12, 'shivamagrawal8765', 'd96e526dbcdbfaf8f38cb2eb18e926c4', 'Shivam', 'Agrawal', 'male', '1998-07-18', 'Allahabad', 'Allahabad', 9795059475, 'shivamagrawal8765@gmail.com', 'Cricket,Football', 'single', 'schooling', 'student', '', 'a506334b4dd7d9ca8fc771e7691cf05f', 1, 0, 0, 0, 'images/98bd89a9df85e7bafcdd_12191655_1636682043251533_8920906476704043530_n.jpg'),
(13, 'VIKS', '91c120520697033d9f3e8efaff8ff410', 'vikASH', 'GUPTA', '', '0000-00-00', '', '', 0, 'VIKS@GMAIL.COM', '', '', '', '', '', '37849e32ca32e4bbd0b6623677d3090a', 0, 0, 0, 0, 'images/profile.jpg'),
(14, 'salmanji@786', 'fe061058be4f731bbc1178173d5298e1', 'Shivam', 'Agrawal', 'male', '1998-07-18', '222/250 gariwontola ,allahabad', 'Allahabad', 9795059475, 'shubham199541@yahoo.com', 'Cricket,Football', 'single', 'schooling', 'student', '', '4344be3ff7f8c67662777a42f6668b85', 1, 0, 0, 0, 'images/26d64f983399d11bb81b_12191655_1636682043251533_8920906476704043530_n.jpg'),
(15, 'premratandanpayo', '25d55ad283aa400af464c76d713c07ad', 'preeti', 'Agrawal', 'female', '0000-00-00', '222/250 gariwontola ,allahabad', 'Allahabad', 8542857699, 'sa121agrawal@gmail.com', 'T.V.', 'married', 'other', '', 'i am very fatty', '839f9ef8c6fbba52fd582bb36abef3ba', 1, 0, 0, 0, 'images/457f067e54ca046b3ac1_12191655_1636682043251533_8920906476704043530_n.jpg'),
(16, 'ut', '04d4ff4fc80ec656ecdb62487f61a39f', 'UTKARSH', 'RATHORE', '', '0000-00-00', '', '', NULL, 'rutkarsh96@gmail.com', '', '', '', '', '', 'fa4b32e24aa11f842ec88bdaaa8aa17d', 0, 0, 0, 0, 'images/profile.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
