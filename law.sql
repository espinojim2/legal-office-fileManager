-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2016 at 11:21 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `law`
--

-- --------------------------------------------------------

--
-- Table structure for table `sys_account_type`
--

CREATE TABLE IF NOT EXISTS `sys_account_type` (
  `accountTypeId` int(2) NOT NULL AUTO_INCREMENT,
  `accountType` varchar(20) NOT NULL,
  `accntclass` varchar(50) NOT NULL COMMENT 'classification of account',
  PRIMARY KEY (`accountTypeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sys_account_type`
--

INSERT INTO `sys_account_type` (`accountTypeId`, `accountType`, `accntclass`) VALUES
(1, 'Superadmin', 'S'),
(3, 'Admin', 'A'),
(4, 'User', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `sys_account_type_template`
--

CREATE TABLE IF NOT EXISTS `sys_account_type_template` (
  `pageTemplateId` int(10) NOT NULL,
  `accountTypeId` int(2) NOT NULL,
  `pageId` int(10) NOT NULL,
  `aview` tinyint(1) NOT NULL COMMENT '1=show 0=hidden ',
  PRIMARY KEY (`pageTemplateId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_account_type_template`
--

INSERT INTO `sys_account_type_template` (`pageTemplateId`, `accountTypeId`, `pageId`, `aview`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 1),
(9, 1, 9, 1),
(10, 1, 10, 1),
(11, 1, 11, 1),
(12, 1, 12, 1),
(13, 1, 13, 1),
(14, 1, 14, 1),
(15, 1, 15, 1),
(16, 1, 16, 1),
(17, 1, 17, 1),
(18, 3, 6, 1),
(19, 5, 6, 1),
(20, 3, 1, 1),
(21, 4, 1, 1),
(22, 4, 6, 1),
(23, 4, 4, 0),
(24, 4, 7, 0),
(25, 4, 9, 1),
(26, 4, 17, 1),
(27, 4, 10, 1),
(28, 4, 11, 1),
(29, 4, 5, 0),
(30, 4, 16, 1),
(31, 4, 12, 1),
(32, 4, 13, 1),
(33, 4, 14, 1),
(34, 4, 15, 1),
(35, 5, 1, 1),
(36, 3, 4, 1),
(37, 3, 5, 1),
(38, 3, 7, 1),
(39, 3, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_files`
--

CREATE TABLE IF NOT EXISTS `sys_files` (
  `fid` int(10) NOT NULL,
  `file_location` text NOT NULL,
  `file_type` text NOT NULL,
  `remark` int(2) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_files`
--

INSERT INTO `sys_files` (`fid`, `file_location`, `file_type`, `remark`) VALUES
(1, 'resources/All_files/2016-01-261.jpg', 'image/jpeg', 1),
(2, 'resources/All_files/2016-01-262.pdf', 'application/pdf', 1),
(3, 'resources/All_files/2016-01-263.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_file_data`
--

CREATE TABLE IF NOT EXISTS `sys_file_data` (
  `fdid` int(10) NOT NULL,
  `folderid` int(10) NOT NULL,
  `fid` int(10) NOT NULL,
  `filename` text NOT NULL,
  `filedescription` text NOT NULL,
  `date` date NOT NULL,
  `remark` int(2) NOT NULL,
  PRIMARY KEY (`fdid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_file_data`
--

INSERT INTO `sys_file_data` (`fdid`, `folderid`, `fid`, `filename`, `filedescription`, `date`, `remark`) VALUES
(1, 2, 1, 'File 1', 'this is a file...', '2016-01-26', 1),
(2, 2, 2, 'folder 2', '....', '2016-01-26', 0),
(3, 2, 2, 'File 2', '....', '2016-01-26', 1),
(4, 2, 3, 'file 3', '...', '2016-01-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_folders`
--

CREATE TABLE IF NOT EXISTS `sys_folders` (
  `folderid` int(10) NOT NULL,
  `foldername` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `remark` int(2) NOT NULL,
  PRIMARY KEY (`folderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_folders`
--

INSERT INTO `sys_folders` (`folderid`, `foldername`, `description`, `date`, `remark`) VALUES
(1, 'MOA', 'Somethig..important...for sure', '2016-01-24', 0),
(2, 'MOA', 'Something Important....maybe', '2016-01-24', 1),
(3, 'Folder 2', '...', '2016-01-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_module`
--

CREATE TABLE IF NOT EXISTS `sys_module` (
  `moduleId` int(10) NOT NULL AUTO_INCREMENT,
  `moduleOrder` varchar(50) NOT NULL,
  `moduleAlias` text NOT NULL,
  `moduleName` varchar(50) NOT NULL,
  PRIMARY KEY (`moduleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sys_module`
--

INSERT INTO `sys_module` (`moduleId`, `moduleOrder`, `moduleAlias`, `moduleName`) VALUES
(1, '1', 'home', 'Home'),
(2, '3', 'human_resource', 'PIS'),
(4, '8', 'privilege', 'Privilege'),
(5, '5', 'account_management', 'Account Management'),
(6, '2', 'profile', 'Profile'),
(8, '6', 'reports', 'Reports'),
(9, '4', 'documents', 'Documents');

-- --------------------------------------------------------

--
-- Table structure for table `sys_p_account`
--

CREATE TABLE IF NOT EXISTS `sys_p_account` (
  `accountId` int(11) NOT NULL,
  `pid` int(10) NOT NULL,
  `accountTypeId` int(2) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `accountStatus` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL COMMENT 'active=1 inactive=0',
  PRIMARY KEY (`accountId`),
  KEY `pid` (`pid`),
  KEY `accountTypeId` (`accountTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_p_account`
--

INSERT INTO `sys_p_account` (`accountId`, `pid`, `accountTypeId`, `username`, `password`, `accountStatus`, `active`) VALUES
(1, 1, 1, 'superadmin', '1a1dc91c907325c69271ddf0c944bc72', 1, 1),
(2, 2, 3, 'username', '1a1dc91c907325c69271ddf0c944bc72', 1, 1),
(3, 3, 3, 'jamesreed', '5f04cfaf269fa89ee3bf0a84383ee9cf', 1, 1),
(4, 4, 4, 'president', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_p_authorization`
--

CREATE TABLE IF NOT EXISTS `sys_p_authorization` (
  `accountId` int(10) NOT NULL,
  `pageId` int(10) NOT NULL,
  `aview` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_p_authorization`
--

INSERT INTO `sys_p_authorization` (`accountId`, `pageId`, `aview`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 9, 1),
(1, 10, 1),
(1, 11, 1),
(1, 12, 1),
(1, 13, 1),
(1, 14, 1),
(1, 15, 1),
(1, 16, 1),
(1, 17, 1),
(1, 8, 1),
(3, 6, 1),
(3, 1, 1),
(3, 4, 1),
(3, 5, 1),
(3, 7, 1),
(2, 6, 1),
(2, 1, 1),
(2, 4, 1),
(2, 5, 1),
(2, 7, 1),
(2, 8, 1),
(3, 8, 1),
(4, 1, 1),
(4, 6, 1),
(4, 9, 1),
(4, 17, 1),
(4, 10, 1),
(4, 11, 1),
(4, 16, 1),
(4, 12, 1),
(4, 13, 1),
(4, 14, 1),
(4, 15, 1),
(4, 4, 0),
(4, 7, 0),
(4, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sys_p_person`
--

CREATE TABLE IF NOT EXISTS `sys_p_person` (
  `pid` int(10) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `ename` text NOT NULL,
  `gender` varchar(1) NOT NULL,
  `bdate` date NOT NULL,
  `bplace` text NOT NULL,
  `imgId` int(10) NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `remark` int(2) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_p_person`
--

INSERT INTO `sys_p_person` (`pid`, `fname`, `mname`, `lname`, `ename`, `gender`, `bdate`, `bplace`, `imgId`, `email`, `contact`, `remark`) VALUES
(1, 'James', 'Protacio', 'Reed', '', 'm', '1995-06-13', '', 0, 'jamesreed@gmail.com', '09272522276', 1),
(2, 'Norly', '', 'Reyes', '', 'm', '2015-12-03', '', 0, '', '', 1),
(3, 'Michelle', '', 'Andes', '', 'm', '1995-12-16', '', 0, '', '', 1),
(4, 'President', '', 'BU', '', 'm', '0000-00-00', '', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_systempages`
--

CREATE TABLE IF NOT EXISTS `sys_systempages` (
  `id` int(10) NOT NULL,
  `pageId` int(10) NOT NULL,
  `pageOrder` int(10) NOT NULL,
  `pageAlias` varchar(100) NOT NULL,
  `pageName` varchar(100) NOT NULL,
  `moduleId` int(10) NOT NULL,
  `iconId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pageId` (`pageId`),
  KEY `moduleId` (`moduleId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_systempages`
--

INSERT INTO `sys_systempages` (`id`, `pageId`, `pageOrder`, `pageAlias`, `pageName`, `moduleId`, `iconId`) VALUES
(1, 1, 1, 'dashboard', 'Main Page', 1, 0),
(2, 2, 1, 'system_template', 'Pages', 4, 0),
(3, 3, 2, 'system_privilege', 'Page Privilege', 4, 0),
(4, 4, 1, 'personnel_information', 'Personnel Information', 2, 0),
(5, 5, 1, 'user_accounts', 'User Accounts', 5, 0),
(6, 6, 1, 'my_profile', 'My Profile', 6, 0),
(7, 7, 1, 'personnel_list_report', 'Personnel List', 8, 1),
(8, 8, 1, 'document_management', 'Document Management', 9, 0),
(9, 9, 1, 'document_viewing', 'Document Viewing', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_passwords`
--

CREATE TABLE IF NOT EXISTS `sys_user_passwords` (
  `accountId` int(10) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user_passwords`
--

INSERT INTO `sys_user_passwords` (`accountId`, `password`) VALUES
(2, 'pass'),
(3, 'Reed'),
(4, 'password');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
