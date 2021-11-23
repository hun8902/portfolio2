-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2013 at 05:35 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `articles`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `date`, `description`, `status`) VALUES
(1, 'What is php?', '2013-06-08', 'PHP is a server-side scripting language designed for web development but also used as a general-purpose programming language.', 1),
(2, 'What is ASP?', '2013-06-08', 'An ASP file can contain text, HTML tags and scripts. Scripts in an ASP file are executed on the server. What you should already know', 1),
(3, 'what is javascript', '2013-06-08', 'JavaScript is a popular programming language that''s built into all the major web browsers and used to make web pages interactive', 1),
(4, 'what is ajax?', '2013-06-08', 'Ajax is a group of interrelated web development techniques used on the client-side to create asynchronous web applications', 1),
(8, 'what is Jquery?', '2013-06-09', 'The purpose of jQuery is to make it much easier to use JavaScript on your website. What You Should Already Know', 1);
