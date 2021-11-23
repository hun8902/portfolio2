# MySQL-Front 3.2  (Build 1.36)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET CHARACTER SET 'euckr' */;


# Host: localhost    Database: test
# ------------------------------------------------------
# Server version 5.0.17-nt

#
# Table structure for table bbs
#

CREATE TABLE `bbs` (
  `seq` int(10) unsigned NOT NULL auto_increment,
  `uname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `password` varchar(16) NOT NULL,
  `comment_cnt` int(8) unsigned NOT NULL default '0',
  `viewcnt` int(8) unsigned NOT NULL default '0',
  `createtime` timestamp NOT NULL,
  PRIMARY KEY  (`seq`)
) TYPE=MyISAM;

CREATE TABLE `comment` (
  `no` int(10) unsigned NOT NULL auto_increment,
  `seq` int(10) unsigned NOT NULL,
  `uname` varchar(50) NOT NULL,
  `content` mediumtext NOT NULL,
  `password` varchar(16) NOT NULL,
  `createtime` timestamp(14) NOT NULL,
  PRIMARY KEY  (`no`)
) TYPE=MyISAM; 

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
