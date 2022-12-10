/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.27-MariaDB : Database - catering_management
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`catering_management` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `catering_service` */

insert  into `catering_service`(`catering_id`,`login_id`,`catering_name`,`place`,`phone`,`email`,`latitude`,`longitude`,`license_number`) values (1,1,'carmel','kottayam','9632587410','carmel@gmail.com','9.984235582140224','76.26717567443848','7896325410'),(2,3,'paradise','kanjikuzhi','9632587410','paradise@gmail.com','9.973007021584475','76.304759929774','321456987'),(3,4,'choice','alpy','0481-3265418','choice@gmail.com','9.984235582140224','76.26717567443848','kl05123'),(4,5,'best','thrikkara','9874563210','anu@gmail.com','9.985308561232994','76.29772288594059','7410');

/*Table structure for table `complaint` */

DROP TABLE IF EXISTS `complaint`;

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `complaint` varchar(100) DEFAULT NULL,
  `replay` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `complaint` */

insert  into `complaint`(`complaint_id`,`customer_id`,`complaint`,`replay`,`date`) values (1,1,'bad','ddee','2022-12-5'),(2,3,'ghh','pending','2022-12-10'),(3,3,'da','pending','2022-12-10');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `customer` */

insert  into `customer`(`customer_id`,`login_id`,`fname`,`lname`,`place`,`pincode`,`phone`,`email`) values (1,4,'sasi','kk','kollam','324156','36251478936','sasi@gmail.com'),(2,6,'rs','rs','ktm','686012','9941786254','rs@gmai.com'),(3,8,'bzbsbsb','bdndj','snsnnd','688523','6238526459','sankusanku00@gmail.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `employee` */

insert  into `employee`(`employee_id`,`login_id`,`fname`,`lname`,`place`,`phone`,`email`,`aadhar_no`) values (1,4,'renu','v','pala','321456974','renu@gmail.com','1236544789369'),(2,7,'balu','d','mala','9638527412','balu@gmail.com','9638527411231'),(3,9,'suni','tk','alpy','6238526459','sankusanku00@gmail.com','645238515426');

/*Table structure for table `event` */

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `catering_id` int(11) DEFAULT NULL,
  `event` varchar(100) DEFAULT NULL,
  `details` varchar(100) DEFAULT NULL,
  `edate` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `estatus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `event` */

insert  into `event`(`event_id`,`customer_id`,`catering_id`,`event`,`details`,`edate`,`place`,`latitude`,`longitude`,`date`,`estatus`) values (1,1,2,'marriage','qwertyu','2027-6-4','guruvayoor','asdfg','nsbn','2022-12-3','accepted'),(2,2,1,'engagement','qazxsw','2026-6-4','kottayam','ujn','dfgh','2022-12-5','accepted'),(3,3,1,'vsbshb','dhdjdj','jxndjd','jxhdjsj','9.9763166','76.286278','2022-12-10','accepted'),(4,3,4,'sample','sample','sample','sample','9.9763146','76.2862707','2022-12-10','accepted');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `food` */

insert  into `food`(`food_id`,`catering_id`,`food`,`rate`,`no_of_quantity`,`type`) values (2,2,'chicken biriyani','850','5','non.veg'),(3,2,'meals','100','15','non.veg'),(4,1,'chicken noodiles','100','50','non.veg'),(5,1,'masala dossa','90','50','veg'),(6,3,'meals','1000','500','veg'),(8,0,'alfam manthi','800','500','non.veg'),(9,2,'porotta beafff','1000','100','non.vegg');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `login` */

insert  into `login`(`login_id`,`username`,`password`,`usertype`) values (1,'carmel','carmel','catering'),(2,'admin','admin','admin'),(3,'para','para','catering'),(4,'renu','renu','employee'),(5,'best','best','catering'),(7,'venugop','venugop','rejected'),(8,'ccc','ccc','customer'),(9,'ee','ee','employee');

/*Table structure for table `orderdetail` */

DROP TABLE IF EXISTS `orderdetail`;

CREATE TABLE `orderdetail` (
  `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT,
  `ordermaster_id` int(11) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL,
  `no_of_person` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`orderdetail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `orderdetail` */

insert  into `orderdetail`(`orderdetail_id`,`ordermaster_id`,`food_id`,`no_of_person`) values (5,4,3,'20'),(6,4,9,'211'),(7,4,2,'2'),(8,5,5,'500');

/*Table structure for table `ordermaster` */

DROP TABLE IF EXISTS `ordermaster`;

CREATE TABLE `ordermaster` (
  `ordermaster_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `catering_id` int(11) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ordermaster_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ordermaster` */

insert  into `ordermaster`(`ordermaster_id`,`event_id`,`catering_id`,`total`,`date`,`status`) values (4,4,4,'13000','2022-12-10','booked'),(5,4,4,'45000','2022-12-10','booked');

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
  `pstatus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `package` */

insert  into `package`(`package_id`,`food_id`,`catering_id`,`package_name`,`package_details`,`total_no_person`,`total_amount`,`pstatus`) values (1,3,2,'qwertyyy','qwert','50','4500','pending'),(2,3,2,'plmm','nji','50','500','pending'),(3,4,1,'abcdef','hijkl','5000','50000','pending'),(4,2,1,'zxcvvv','asdfgiiii','45','5000','pending'),(5,2,1,'asdfghjkl','plm','456','100','pending');

/*Table structure for table `package_booked` */

DROP TABLE IF EXISTS `package_booked`;

CREATE TABLE `package_booked` (
  `pbooked_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `p_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pbooked_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `package_booked` */

insert  into `package_booked`(`pbooked_id`,`package_id`,`event_id`,`date`,`p_status`) values (1,1,1,'2022-12-3','accepted'),(2,3,2,'2022-12-5','accepted'),(3,5,4,'2022-12-10','pending'),(4,2,3,'2022-12-10','pending');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `pdate` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `payment` */

insert  into `payment`(`payment_id`,`customer_id`,`amount`,`pdate`) values (1,3,'13000','2022-12-10'),(2,3,'45000','2022-12-10');

/*Table structure for table `rating` */

DROP TABLE IF EXISTS `rating`;

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `catering_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `rated` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `rating` */

insert  into `rating`(`rating_id`,`catering_id`,`customer_id`,`rated`,`date`) values (1,2,1,'1','2022-12-5'),(2,2,1,'5','2022-12-5'),(3,1,2,'3','2022-12-5');

/*Table structure for table `request` */

DROP TABLE IF EXISTS `request`;

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `ordermaster_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `r_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `request` */

insert  into `request`(`request_id`,`ordermaster_id`,`employee_id`,`date`,`r_status`) values (1,1,1,'2022-12-5','accepted'),(2,2,2,'2022-12-5','accepted'),(3,5,3,'2022-12-10','pending'),(4,5,3,'2022-12-10','pending');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
