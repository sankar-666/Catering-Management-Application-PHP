/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.25-MariaDB : Database - catering_management
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`catering_management` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `catering_management`;

/*Table structure for table `catering_service` */

DROP TABLE IF EXISTS `catering_service`;

CREATE TABLE `catering_service` (
  `catering_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `catering_name` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `license_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`catering_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `catering_service` */

insert  into `catering_service`(`catering_id`,`login_id`,`catering_name`,`place`,`phone`,`email`,`latitude`,`longitude`,`license_number`) values 
(1,1,'','kottayam','9632587410','carmel@gmail.com','9.984235582140224','76.26717567443848','7896325410'),
(2,3,'paradise','kanjikuzhi','9632587410','paradise@gmail.com','9.973007021584475','76.304759929774','321456987');

/*Table structure for table `complaint` */

DROP TABLE IF EXISTS `complaint`;

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `complaint` varchar(100) DEFAULT NULL,
  `replay` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `complaint` */

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer` */

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `aadhar_no` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `employee` */

/*Table structure for table `event` */

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `event` varchar(100) DEFAULT NULL,
  `details` varchar(100) DEFAULT NULL,
  `edate` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `event` */

/*Table structure for table `food` */

DROP TABLE IF EXISTS `food`;

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `catering_id` int(11) DEFAULT NULL,
  `food` varchar(100) DEFAULT NULL,
  `rate` varchar(100) DEFAULT NULL,
  `no_of_quantity` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `food` */

insert  into `food`(`food_id`,`catering_id`,`food`,`rate`,`no_of_quantity`,`type`) values 
(2,2,'','850','5','non.veg'),
(3,2,'meals','100','15','non.veg');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `login` */

insert  into `login`(`login_id`,`username`,`password`,`usertype`) values 
(1,'carmel','carmel','catering'),
(2,'admin','admin','admin'),
(3,'para','para','catering');

/*Table structure for table `orderdetail` */

DROP TABLE IF EXISTS `orderdetail`;

CREATE TABLE `orderdetail` (
  `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT,
  `ordermaster_id` int(11) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL,
  `no_of_person` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`orderdetail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `orderdetail` */

/*Table structure for table `ordermaster` */

DROP TABLE IF EXISTS `ordermaster`;

CREATE TABLE `ordermaster` (
  `ordermaster_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `catering_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ordermaster_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ordermaster` */

/*Table structure for table `package` */

DROP TABLE IF EXISTS `package`;

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_id` int(11) DEFAULT NULL,
  `catering_id` int(11) DEFAULT NULL,
  `package_name` varchar(100) DEFAULT NULL,
  `package_details` varchar(100) DEFAULT NULL,
  `total_no_person` varchar(100) DEFAULT NULL,
  `total_amount` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `package` */

/*Table structure for table `package_booked` */

DROP TABLE IF EXISTS `package_booked`;

CREATE TABLE `package_booked` (
  `pbooked_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pbooked_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `package_booked` */

/*Table structure for table `rating` */

DROP TABLE IF EXISTS `rating`;

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `catering_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rated` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `rating` */

/*Table structure for table `request` */

DROP TABLE IF EXISTS `request`;

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `ordermaster_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `request` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
