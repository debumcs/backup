/*
SQLyog Community v12.2.4 (32 bit)
MySQL - 10.1.21-MariaDB : Database - anars
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`anars` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `anars`;

/*Table structure for table `banner` */

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `subtitle` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `modifiedby` varchar(50) NOT NULL,
  `createdip` varchar(100) NOT NULL,
  `modifiedip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `banner` */

insert  into `banner`(`id`,`title`,`image`,`subtitle`,`status`,`createddate`,`modifieddate`,`createdby`,`modifiedby`,`createdip`,`modifiedip`) values 
(22,'test title 7','walking1.png','test subtitle 7',1,'2018-03-01 23:01:35','2018-03-19 09:43:40','admin','admin','::1','198.15.76.187');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `modifiedby` varchar(50) NOT NULL,
  `createdip` varchar(100) NOT NULL,
  `modifiedip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`status`,`createddate`,`modifieddate`,`createdby`,`modifiedby`,`createdip`,`modifiedip`) values 
(1,'news',1,'2018-03-16 08:57:37','2018-03-16 08:57:37','admin','admin','::1','::1'),
(2,'lifestyle',1,'2018-03-16 11:17:09','2018-03-19 09:44:11','admin','admin','::1','198.15.76.187');

/*Table structure for table `groupinfo` */

DROP TABLE IF EXISTS `groupinfo`;

CREATE TABLE `groupinfo` (
  `id` int(11) DEFAULT NULL,
  `category_id` varchar(100) NOT NULL,
  `subcategory_id` varchar(100) NOT NULL,
  `format` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `include_in` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `modifiedby` varchar(50) NOT NULL,
  `createdip` varchar(100) NOT NULL,
  `modifiedip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `groupinfo` */

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `uid` varchar(36) CHARACTER SET utf8 NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `username` varchar(55) CHARACTER SET utf8 NOT NULL,
  `password` varchar(55) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`uid`,`name`,`username`,`password`) values 
('dad795e5-4b33-11e3-8c00-90590c30cc70','admin','admin','e10adc3949ba59abbe56e057f20f883e');

/*Table structure for table `subcategory` */

DROP TABLE IF EXISTS `subcategory`;

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `modifiedby` varchar(50) NOT NULL,
  `createdip` varchar(100) NOT NULL,
  `modifiedip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `subcategory` */

insert  into `subcategory`(`id`,`name`,`category_id`,`status`,`createddate`,`modifieddate`,`createdby`,`modifiedby`,`createdip`,`modifiedip`) values 
(1,'news sub','1',1,'2018-03-16 11:23:50','2018-03-16 12:12:45','admin','admin','::1','::1'),
(2,'lifestyles data','2',1,'2018-03-17 11:57:02','2018-03-19 09:44:31','admin','admin','::1','198.15.76.187');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
