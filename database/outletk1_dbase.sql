/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.1.36-MariaDB : Database - outletk1_dbase
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`outletk1_dbase` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `outletk1_dbase`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `link_name` varchar(100) NOT NULL,
  `account_partner` varchar(25) DEFAULT '0000001',
  `account_status` int(2) NOT NULL DEFAULT '1',
  `account_post` text,
  `business_category` int(11) NOT NULL,
  `about_us` text,
  `bg_color` varchar(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `street` varchar(200) DEFAULT NULL,
  `village` varchar(200) DEFAULT NULL,
  `barangay` varchar(200) DEFAULT NULL,
  `city` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `telephone_no` varchar(15) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `shoppee` varchar(100) DEFAULT NULL,
  `free_shipping` int(5) DEFAULT '0',
  `del_date` int(5) DEFAULT '0' COMMENT 'Customer allowed to choose delivery date',
  `confirm_email` int(11) NOT NULL DEFAULT '0',
  `loc_image` varchar(100) DEFAULT NULL,
  `date_insert` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_inactive` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

/*Data for the table `account` */

insert  into `account`(`id`,`account_id`,`account_name`,`link_name`,`account_partner`,`account_status`,`account_post`,`business_category`,`about_us`,`bg_color`,`user_id`,`first_name`,`middle_name`,`last_name`,`address`,`street`,`village`,`barangay`,`city`,`province`,`email`,`mobile_no`,`telephone_no`,`website`,`facebook`,`twitter`,`instagram`,`shoppee`,`free_shipping`,`del_date`,`confirm_email`,`loc_image`,`date_insert`,`date_update`,`date_inactive`) values (1,1940001,'shoe store','shoestore','0000001',0,NULL,3,NULL,NULL,0,'Jandelle','T','Comilang','pateros mm2',NULL,NULL,NULL,1024,52,'outletko@gmail.com','2147483647','6272316',NULL,'ellednaj112','ellednaj11','ellednaj11','ellednaj11',0,0,1,'a:1:{i:0;s:18:\"file_31_290493.png\";}','2019-07-16 00:00:00',NULL,NULL),(26,1940006,'asfasf','','0000001',0,NULL,1,NULL,NULL,0,'adlfka','','aldkfalk','asfas',NULL,NULL,NULL,1024,52,'dooleycheasel1@gmail.com','2147483647','0',NULL,NULL,NULL,NULL,NULL,0,0,0,'a:1:{i:0;s:18:\"file_31_290493.png\";}','2019-08-12 23:10:22',NULL,NULL),(25,1940005,'asfkafladf','','0000001',0,NULL,1,NULL,NULL,0,'asfjaks','','kasjfkaj','aslfkas',NULL,NULL,NULL,1024,52,'dooleycsadheasel@gmail.com','2147483647','0',NULL,NULL,NULL,NULL,NULL,0,0,1,'a:1:{i:0;s:18:\"file_31_290493.png\";}','2019-08-12 23:07:23',NULL,NULL),(23,1940003,'bussiness','bussiness','0000001',0,NULL,10,NULL,NULL,0,'cheasel','kim','caparal','askfjaskf',NULL,NULL,NULL,1024,52,'adsfasd','2147483647','0',NULL,NULL,NULL,NULL,NULL,0,0,1,'a:1:{i:0;s:18:\"file_31_939194.png\";}','2019-08-11 22:29:14',NULL,NULL),(24,1940004,'beauty','','0000001',0,NULL,1,NULL,NULL,0,'cheasel kim','','caparal','adlfkafkl',NULL,NULL,NULL,1024,52,'ck.caparal263@gmail.com','2147483647','0',NULL,NULL,NULL,NULL,NULL,0,0,0,'a:1:{i:0;s:18:\"file_31_939194.png\";}','2019-08-12 23:03:01',NULL,NULL),(22,1940002,'aasd store','','0000001',0,NULL,3,NULL,NULL,22,'jandelle','t','comilang','[aterps m,',NULL,NULL,NULL,1024,52,'ellednaj11@gmail.com','123123','0',NULL,NULL,NULL,NULL,NULL,0,0,1,'a:1:{i:0;s:18:\"file_31_939194.png\";}','2019-07-30 11:43:29',NULL,NULL),(27,1940007,'asfafdasf','','0000001',0,NULL,1,NULL,NULL,0,'asfkas','','aklfalsk','asfaksfa',NULL,NULL,NULL,1024,52,'dooleycheasel@gmail.com','2147483647','0',NULL,NULL,NULL,NULL,NULL,0,0,0,'a:1:{i:0;s:18:\"file_31_666383.png\";}','2019-08-12 23:23:05',NULL,NULL),(28,1940008,'asfadsf','','0000001',0,NULL,1,NULL,NULL,0,'asfka','','adslfakl','asfkalskf',NULL,NULL,NULL,1024,52,'ck.capasadfasfral26@gmail.com','2147483647','0',NULL,NULL,NULL,NULL,NULL,0,0,0,'a:1:{i:0;s:18:\"file_31_666383.png\";}','2019-08-12 23:24:43',NULL,NULL),(29,1940009,'asfkkaskf','','0000001',0,NULL,1,NULL,NULL,0,'asklfaslkf','','ladsslfkaslf','aslfkasflk',NULL,NULL,NULL,1024,52,'ck.caparal26@gmail.com','2147483647','0',NULL,NULL,NULL,NULL,NULL,0,0,0,'a:1:{i:0;s:18:\"file_31_290493.png\";}','2019-08-12 23:28:01',NULL,NULL),(30,1940010,'Eric Hardware','erichardware','0000001',0,NULL,8,NULL,NULL,0,'Enrique','','Purugganan','Captain Henry P. Javier Street, Barangay Oranbo',NULL,NULL,NULL,1024,52,'eapurugganan@gmail.com','2147483647','0',NULL,NULL,NULL,NULL,NULL,0,0,1,'a:1:{i:0;s:18:\"file_31_806895.png\";}','2019-08-19 13:28:29',NULL,NULL),(31,1940011,'Brandead Shoes','deadshoes','0000001',1,'20% offf for many',1,'for eakfjsdkfjas\nasdkfjaskf\nafaksfjas\nfasfashkdfjaskfas\nfa\nshfiasfhasihfas\nfashfiasfashfiashfasf\nasfiashfaishfa\nfasfhasfihasfidhasdf\nahifashfashf\nasdfiasfhisahdfiashf\nafhashfasifhasf\nashisdfha\nhsiadfh','',0,'Comilang','','jandelle','Captain Henry P. Javier Street, Barangay Oranb','Captain Henry P. Javier Street, Barangay Oranb','','',1022,52,'jcomilang@gmail.com','2147483647','','','',NULL,'','',0,0,0,'a:1:{i:0;s:18:\"file_31_666383.png\";}','2019-08-19 15:25:54',NULL,NULL),(32,1940012,'Business101','business101','0000001',0,NULL,1,'',NULL,0,'cheasel kim','','caparal','askdfaj','asdfakds','','',0,0,'dooleycheasel@gmail.com','9174668737','','','',NULL,'','',0,0,1,NULL,'2019-11-07 17:08:05',NULL,NULL),(33,1940013,'Carmens Salon','carmenssalon','0000001',1,'',8,'Carmen\'s Salon is a full-service beauty salon for men and women. Founder Ms. Carmen A. Purugganan opened Carmen\'s Salon in 1985 . Carmen\'s Salon takes pride in providing the highest quality of service at prices everyone can afford. Carmen’s Salons’ menu of services include hair cutting and styling, hair coloring, rebonding and perming, hair treatments, nail care, makeup, waxing, and threading. ','c460c9',0,'Enrique','','Purugganan','Captain Henry P. Javier Street, Barangay Oranb','2nd Flr. Isidora Bldg. Rizal Ave.','','',762,41,'eapurugganan@gmail.com','9178243915','','','',NULL,'','',0,0,1,'a:1:{i:0;s:18:\"file_33_211900.png\";}','2019-11-07 17:13:30',NULL,NULL),(34,1910094,'New Company','','0000001',0,NULL,1,NULL,'77933c',0,'CHEASEL KIM','OLDICO','CAPARAL','makati',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','','',NULL,NULL,NULL,NULL,NULL,0,0,1,NULL,'2019-12-04 15:30:27',NULL,NULL),(35,1910095,'KJM Restaurant','','0000001',0,NULL,1,NULL,'77933c',0,'CHEASE','ASD','CAPRAL','asjdfhasjf',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','','',NULL,NULL,NULL,NULL,NULL,0,0,1,NULL,'2019-12-04 15:32:32',NULL,NULL),(36,1910096,'Askfjaskf','','0000001',0,NULL,2,NULL,'77933c',0,'LASKFDL','FALSKFD','ASDLAS','aslfa',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','','',NULL,NULL,NULL,NULL,NULL,0,0,1,NULL,'2019-12-04 15:53:23',NULL,NULL),(37,1910097,'Asdfkasldfk','','0000001',0,NULL,1,NULL,'77933c',0,'AFKLFK','FADSKDF','SKAJFK','alsdkfalskf',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','','',NULL,NULL,NULL,NULL,NULL,0,0,1,NULL,'2019-12-04 15:55:16',NULL,NULL),(38,1910098,'ABC Merchandise','abcmerch','0000001',0,NULL,1,NULL,'77933c',0,'CHEASEL KIM','OLDICO','CAPARAL','asldfkasldf',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','','',NULL,NULL,NULL,NULL,NULL,0,0,1,NULL,'2019-12-04 16:49:01',NULL,NULL),(39,1910099,'Asdfasfdasdf','','0000001',0,NULL,2,NULL,'77933c',0,'CHEASEL KIM','OLDICO','CAPARAL','kasjdfkasjf',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','','',NULL,NULL,NULL,NULL,NULL,0,0,1,NULL,'2019-12-04 16:51:42',NULL,NULL),(40,1910100,'Lala Beauty Salon','lalabty','0000001',0,NULL,1,NULL,'77933c',0,'CHEASEL KIM','OLDICO','CAPARAL','makati',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','','',NULL,NULL,NULL,NULL,NULL,0,0,1,NULL,'2019-12-06 00:00:33',NULL,NULL),(41,1910101,'Hexagon Technology','hextech','0000001',0,NULL,1,NULL,'77933c',0,'CHEASEL KIM','OLDICO','CAPARAL','makati',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','','',NULL,NULL,NULL,NULL,NULL,0,0,1,NULL,'2019-12-06 00:24:49',NULL,NULL),(42,1910102,'Fresh Eggs Option','feo','0000001',0,NULL,18,NULL,NULL,0,'ENRICO','','Purugganan','Captain Henry P. Javier Street, Barangay Oranbo',NULL,NULL,NULL,0,0,'eapurugganan@gmail.com','9214007031','',NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,'2019-12-11 10:38:46',NULL,NULL),(43,1910103,'Business Name','','0000001',0,NULL,1,NULL,NULL,0,'Cheasel kim','','caparal','Caloocan',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','9174668737','',NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,'2019-12-11 10:44:35',NULL,NULL),(44,1910104,'Business Name','','0000001',0,NULL,1,NULL,NULL,0,'Cheasel kim','','caparal','Caloocan',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','9174668737','',NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,'2019-12-11 10:46:34',NULL,NULL),(45,1910105,'Fresh Eggs Oprtion','feo','0000001',0,NULL,18,NULL,NULL,0,'Enrico','','purugganan','Captain Henry P. Javier Street, Barangay Oranbo',NULL,NULL,NULL,0,0,'eapurugganan@gmail.com','9214007031','',NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,'2019-12-11 11:22:21',NULL,NULL),(46,1910106,'Fresh Eggs Option','','0000001',0,NULL,18,NULL,NULL,0,'Enrique','','Purugganan','Captain Henry P. Javier Street, Barangay Oranbo',NULL,NULL,NULL,0,0,'eapurugganan503312@gmail.com','9214007031','',NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,'2019-12-11 11:28:13',NULL,NULL),(47,1910107,'aksdjfaskjf','','0000001',0,NULL,1,NULL,NULL,0,'Cheasel kim','','caparal','safkas',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','9174668737','',NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,'2019-12-11 11:51:15',NULL,NULL),(48,1910108,'askdfjaskfd','','0000001',0,NULL,1,NULL,NULL,0,'Cheasel kim','','caparal','asdkfj',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','9174668737','',NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,'2019-12-11 11:52:48',NULL,NULL),(49,1910109,'sakfjaskf','','0000001',0,NULL,1,NULL,NULL,0,'Cheasel kim','','caparal','askfdjajf',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','9174668737','',NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,'2019-12-11 11:54:17',NULL,NULL),(50,1910110,'sadfaf','','0000001',0,NULL,1,NULL,NULL,0,'Cheasel kim','','caparal','caloocan',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','9174668737','',NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,'2019-12-11 12:04:31',NULL,NULL),(51,1910111,'kadjfasdf','','0000001',0,NULL,1,NULL,NULL,0,'Cheasel kim','','caparal','caloocan',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','9174668737','',NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,'2019-12-11 12:10:09',NULL,NULL),(52,1910112,'Eap\'s Plant Farm','eapplantfarm','0000001',1,'You are Welcome to Visit Our Farm.',20,'We are a team of Millennials inspired to create vital changes in the urban gardening scene. As the first one to offer organic plant kits in the Philippines, we also went through the process our growers go through -- from the excitement of seeing a sprout from our newly sowed plants until the time we get to harvest and use our plants in our daily cookouts or just an additional design to our abodes','507500',0,'Enrique','','Purugganan','Captain Henry P. Javier Street, Barangay Oranbo','Captain Henry P. Javier Street, Barangay Oranbo','','',1033,52,'eapurugganan503312@gmail.com','9214007031','','','',NULL,'','',0,0,0,'a:1:{i:0;s:18:\"file_52_602810.png\";}','2019-12-11 12:27:13',NULL,NULL),(53,1910113,'Blank & Printz General Mdse.','blankprintz','0000001',1,'',49,'Blank & Printz specializes on printing of t-shirts at affordable prices and quality you can trust in. We also offer embroidery, silk screen, full bleed sublimation, made-to-order polo shirts, sports  ','54662d',0,'Nathaniel','','Ocampo','Sitio Magan, Calumabaya','Sitio Magan, Calumabaya','','',755,41,'nathz2008@yahoo.com.ph','9993501068','','','',NULL,'','',0,0,0,'a:1:{i:0;s:17:\"file_53_14137.png\";}','2019-12-21 11:09:40',NULL,NULL),(54,1910114,'asfkajs','','0000001',0,NULL,49,NULL,NULL,0,'asfkja','','askdjfk','asdfkja',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','9174668737','',NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,'2019-12-21 11:15:32',NULL,NULL),(55,1910115,'adskfja','','0000001',0,' ',1,NULL,NULL,0,'asdfkj','','adskfj','asfkasj',NULL,NULL,NULL,0,0,'dooleycheasel@gmail.com','95655656556','',NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,'2019-12-21 11:19:20',NULL,NULL),(59,2010116,'J2 Shoe Store','j2shoestore','0000001',1,NULL,46,'','695b22',0,'Joyce','','Purugganan','Riverside Drive, Provident Village','Riverside Drive, Provident Village','','',1028,52,'j2shoestore@yahoo.com','9214007031','','','',NULL,'','',0,0,0,'a:1:{i:0;s:18:\"file_59_538263.png\";}','2020-01-03 08:10:17',NULL,NULL),(60,2010117,'Woodykraft Enterprises','woodykraftenterprises','0000001',1,NULL,26,'Woodykraft enterprises supply you with the best quality at the lowest prices on small wood turnings and wood cut outs.','9c9261',0,'john ','','Liwanag','Bagong Pag-asa','Bagong Pag-asa','','',797,42,'woodykraftenterprises@gmail.com','9227832092','','','',NULL,'','',0,0,0,'a:1:{i:0;s:18:\"file_60_754060.png\";}','2020-01-06 13:51:14',NULL,NULL),(61,2010118,'Angel\'s Touch Salon','angelstouchsalon','0000001',1,NULL,8,'Angel\'s Touch Salon offers a variety of hair care, nail care, and beauty care services that are delivered with kindness and professionalism. Angel\'s Touch Salon strives to deliver timely, professional services with a flare for style and energy.  ','dc19e6',0,'JA','','Purugganan','Exequel St. Conception','Calumpang','','',1028,52,'angeltouchsalon@outlook.com','9214012717','','','',NULL,'','',0,0,0,'a:1:{i:0;s:18:\"file_61_900730.png\";}','2020-01-10 09:29:32',NULL,NULL);

/*Table structure for table `account_appointment` */

DROP TABLE IF EXISTS `account_appointment`;

CREATE TABLE `account_appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` int(11) DEFAULT NULL,
  `mon` int(11) DEFAULT NULL,
  `tue` int(11) DEFAULT NULL,
  `wed` int(11) DEFAULT NULL,
  `thu` int(11) DEFAULT NULL,
  `fri` int(11) DEFAULT NULL,
  `sat` int(11) DEFAULT NULL,
  `sun` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `date_insert` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `account_appointment` */

insert  into `account_appointment`(`id`,`comp_id`,`mon`,`tue`,`wed`,`thu`,`fri`,`sat`,`sun`,`start_time`,`end_time`,`date_insert`,`date_update`) values (1,31,1,1,1,1,1,0,0,'08:00:00','08:00:00',NULL,'2020-02-09 13:05:19'),(2,33,0,0,0,0,0,0,0,'08:00:00','17:00:00','2019-11-11 11:19:26','2019-11-11 11:19:37'),(3,52,0,0,0,0,0,0,0,'08:00:00','17:00:00','2019-12-11 16:40:19','2019-12-11 18:40:06'),(4,59,0,0,0,0,0,0,0,'08:00:00','17:00:00','2020-01-03 10:31:30','2020-01-29 21:06:38'),(5,53,0,0,0,0,0,0,0,'08:00:00','17:00:00','2020-01-03 18:41:48',NULL),(6,60,0,0,0,0,0,0,0,'08:00:00','17:00:00','2020-01-06 14:07:33','2020-01-06 15:23:44');

/*Table structure for table `account_bank` */

DROP TABLE IF EXISTS `account_bank`;

CREATE TABLE `account_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `account_name` varchar(100) DEFAULT NULL,
  `account_no` varchar(25) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `date_insert` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `account_bank` */

insert  into `account_bank`(`id`,`comp_id`,`bank_id`,`account_name`,`account_no`,`status`,`date_insert`,`date_update`) values (1,31,10,'Juan Dela Cruz','5656265656',0,'2020-01-30 15:01:39','2020-01-30 15:20:51'),(2,31,4,'Juan Dela Cruz','3242341341243',1,'2020-01-30 15:18:18','2020-02-07 18:52:43'),(3,31,6,'Juan Dela Cruz','5656265656',1,'2020-01-30 15:19:20','2020-02-07 18:54:19'),(4,59,4,'J2 Shoe STore','1234565789',1,'2020-01-31 05:35:58',NULL),(5,31,2,'Juan Dela Cruz','589623156565',1,'2020-02-07 18:53:52',NULL);

/*Table structure for table `account_buyer` */

DROP TABLE IF EXISTS `account_buyer`;

CREATE TABLE `account_buyer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `mobile_no` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `province` int(11) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `verify_code` int(10) DEFAULT NULL,
  `verify` int(11) DEFAULT '1',
  `date_insert` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `account_buyer` */

insert  into `account_buyer`(`id`,`account_id`,`first_name`,`middle_name`,`last_name`,`phone_no`,`mobile_no`,`email`,`address`,`barangay`,`city`,`province`,`zip_code`,`contact_person`,`verify_code`,`verify`,`date_insert`,`date_update`) values (1,190001,'Cheasel Kim','asdfasdf','Caparal','23424','09123456789','dooleycheasel@gmail.com','#65656 poblacion, makati','poblacion',499,26,'12123','Cheasel Kim Caparal',550055,0,'2019-10-17 15:31:04','2019-11-02 19:50:53'),(2,190002,'Cheasel Kim',NULL,'Caparal',NULL,NULL,'dooleycheasel@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,796899,0,'2019-11-07 17:09:57',NULL),(3,190003,'Cheasel Kim',NULL,'Caparal',NULL,NULL,'ck.caparal26@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,722250,0,'2019-11-12 16:49:40',NULL),(4,190004,'Erico',NULL,'Abenojar',NULL,NULL,'ericapuruggnan@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,438550,1,'2019-11-12 16:56:09',NULL),(5,190005,'Enrique','','Purugganan',NULL,'','eapurugganan503312@gmail.com','Poblacion','Poblacion',1024,52,NULL,NULL,380012,1,'2019-11-13 09:28:35','2019-11-14 18:25:23'),(6,190006,'Eric ',NULL,'Purugganan',NULL,NULL,'eapurugganan@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,556313,1,'2019-12-09 08:51:58',NULL),(7,190007,'asdfa',NULL,'fsakfj',NULL,NULL,'dooleycheasel@gmai.com',NULL,NULL,NULL,NULL,NULL,NULL,159436,1,'2019-12-09 17:59:23',NULL),(8,190008,'eric',NULL,'purugganan',NULL,NULL,'ericapurugganan@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,610773,1,'2019-12-11 10:03:03',NULL),(9,190009,'eric',NULL,'purugganan',NULL,NULL,'eapurugganan503312@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,962894,1,'2019-12-11 10:08:13',NULL),(10,190010,'eric',NULL,'purugganan',NULL,NULL,'eapurugganan@gmailcom',NULL,NULL,NULL,NULL,NULL,NULL,908674,1,'2019-12-11 10:15:13',NULL),(11,190011,'eric',NULL,'purugganan',NULL,NULL,'eapurugganan503312@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,601961,1,'2019-12-11 11:47:09',NULL),(12,190012,'Nathaniel',NULL,'Ocampo',NULL,NULL,'eapurugganan@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,806747,1,'2019-12-20 07:54:32',NULL),(13,190013,'Nathaniel',NULL,'Ocampo',NULL,NULL,'eapurugganan@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,662864,1,'2019-12-20 09:11:45',NULL),(14,190014,'Nathaniel',NULL,'Ocampo',NULL,NULL,'eapurugganan@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,143199,1,'2019-12-20 09:13:09',NULL),(15,190015,'Cheasel Kim',NULL,'Caparal',NULL,NULL,'dooleycheasel@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,794457,1,'2019-12-20 10:10:39',NULL),(16,190016,'Cheasel Kim',NULL,'Caparal',NULL,NULL,'dooleycheasel@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,540346,0,'2019-12-20 10:13:56',NULL),(17,190017,'Nathaniel',NULL,'Ocampo',NULL,NULL,'eapurugganan@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,723632,0,'2019-12-20 13:42:03',NULL),(18,190018,'Nathaniel','','Ocampo',NULL,'9214007031','eapurugganan@yahoo.com','Sitio Magan','Calumbaya',755,41,NULL,NULL,671567,0,'2019-12-21 08:01:56','2019-12-21 08:08:34'),(19,200001,'Joyce Anne',NULL,'Liwanag',NULL,NULL,'woodykraftenterprises@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,430998,1,'2020-01-06 13:40:39',NULL);

/*Table structure for table `account_courier` */

DROP TABLE IF EXISTS `account_courier`;

CREATE TABLE `account_courier` (
  `id` double NOT NULL AUTO_INCREMENT,
  `comp_id` double DEFAULT NULL,
  `courier_id` double DEFAULT NULL,
  `ship_kg` double DEFAULT NULL,
  `sf_mm` double DEFAULT NULL,
  `sf_luz` double DEFAULT NULL,
  `sf_vis` double DEFAULT NULL,
  `sf_min` double DEFAULT NULL,
  `date_insert` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `account_courier` */

insert  into `account_courier`(`id`,`comp_id`,`courier_id`,`ship_kg`,`sf_mm`,`sf_luz`,`sf_vis`,`sf_min`,`date_insert`,`date_update`) values (1,31,53,0.5,85,120,150,180,'2019-11-23 10:04:34',NULL),(2,31,1,1,75,100,125,150,'2019-11-23 10:05:10','2020-02-08 20:33:07'),(3,31,68,10,120,150,180,200,'2019-11-23 10:07:44',NULL);

/*Table structure for table `account_delivery_type` */

DROP TABLE IF EXISTS `account_delivery_type`;

CREATE TABLE `account_delivery_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `delivery_type_id` int(11) DEFAULT NULL,
  `delivery_type_check` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `account_delivery_type` */

insert  into `account_delivery_type`(`id`,`account_id`,`delivery_type_id`,`delivery_type_check`) values (1,31,1,0),(2,31,2,0),(3,31,3,1),(4,33,1,0),(5,33,2,0),(6,33,3,0),(7,52,1,0),(8,52,2,0),(9,52,3,0),(10,59,1,0),(11,59,2,0),(12,59,3,0),(13,53,1,0),(14,53,2,0),(15,53,3,0),(16,60,1,0),(17,60,2,0),(18,60,3,0);

/*Table structure for table `account_payment_type` */

DROP TABLE IF EXISTS `account_payment_type`;

CREATE TABLE `account_payment_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `payment_type_id` int(11) DEFAULT NULL,
  `payment_type_check` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `account_payment_type` */

insert  into `account_payment_type`(`id`,`account_id`,`payment_type_id`,`payment_type_check`) values (1,31,1,1),(2,31,2,1),(3,31,3,0),(4,31,4,0),(5,33,1,1),(6,33,2,0),(7,33,3,0),(8,33,4,1),(9,52,1,1),(10,52,2,0),(11,52,3,0),(12,52,4,0),(13,59,1,1),(14,59,2,0),(15,59,3,0),(16,59,4,0),(17,53,1,1),(18,53,2,0),(19,53,3,0),(20,53,4,0),(21,60,1,1),(22,60,2,1),(23,60,3,0),(24,60,4,1),(25,59,5,1),(26,59,6,1),(27,31,5,1),(28,31,6,1);

/*Table structure for table `account_remittance` */

DROP TABLE IF EXISTS `account_remittance`;

CREATE TABLE `account_remittance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` int(11) DEFAULT NULL,
  `remittance_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `account_remittance` */

insert  into `account_remittance`(`id`,`comp_id`,`remittance_id`,`status`) values (1,31,1,1),(2,31,5,1),(3,31,2,0),(4,31,7,0),(5,31,9,0),(6,59,1,1),(7,59,9,1),(8,59,5,1);

/*Table structure for table `account_shipping_fee` */

DROP TABLE IF EXISTS `account_shipping_fee`;

CREATE TABLE `account_shipping_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `std_delivery` text,
  `sf_w_mm` double(20,2) DEFAULT NULL,
  `sf_o_mm` double(20,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `account_shipping_fee` */

insert  into `account_shipping_fee`(`id`,`account_id`,`std_delivery`,`sf_w_mm`,`sf_o_mm`) values (1,31,'',23423.00,234234.00),(2,33,'',50.00,100.00),(3,52,'Pickup',0.00,0.00),(4,59,'Php 100.00 Shipping Fee Within Metro Manila',0.00,0.00),(5,53,'',0.00,0.00),(6,60,'7 Days',0.00,0.00);

/*Table structure for table `account_shipping_type` */

DROP TABLE IF EXISTS `account_shipping_type`;

CREATE TABLE `account_shipping_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `shipping_type_id` int(11) DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `account_shipping_type` */

/*Table structure for table `account_store` */

DROP TABLE IF EXISTS `account_store`;

CREATE TABLE `account_store` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `comp_id` double DEFAULT NULL,
  `img_order` double DEFAULT NULL,
  `loc_image` blob,
  `date_insert` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `account_store` */

insert  into `account_store`(`id`,`comp_id`,`img_order`,`loc_image`,`date_insert`,`date_update`) values (1,31,1,'a:1:{i:0;s:19:\"file_31_531315.webp\";}','2019-12-19 15:13:22','2019-12-19 15:13:57'),(2,33,1,'a:1:{i:0;s:18:\"file_33_824760.png\";}','2019-12-19 20:39:30','2020-01-09 14:45:17'),(3,33,2,'a:1:{i:0;s:18:\"file_33_329797.png\";}','2019-12-19 20:39:48','2020-01-09 14:48:08'),(4,33,3,'a:1:{i:0;s:17:\"file_33_10774.png\";}','2019-12-19 20:39:58','2020-01-09 14:54:12'),(5,52,1,'a:1:{i:0;s:18:\"file_52_423633.png\";}','2019-12-19 20:51:49',NULL),(6,52,2,'a:1:{i:0;s:18:\"file_52_159687.png\";}','2019-12-19 20:54:29',NULL),(7,52,3,'a:1:{i:0;s:18:\"file_52_452184.png\";}','2019-12-19 20:56:55',NULL),(8,59,1,'a:1:{i:0;s:17:\"file_59_12435.png\";}','2020-01-03 10:01:59',NULL),(9,59,2,'a:1:{i:0;s:18:\"file_59_328013.png\";}','2020-01-03 10:02:14',NULL),(10,59,3,'a:1:{i:0;s:17:\"file_59_32200.png\";}','2020-01-03 10:02:26',NULL),(11,53,1,'a:1:{i:0;s:18:\"file_53_348289.png\";}','2020-01-03 18:04:26','2020-01-04 08:56:32'),(12,53,2,'a:1:{i:0;s:18:\"file_53_342213.png\";}','2020-01-03 18:27:02','2020-01-04 09:16:12'),(13,53,3,'a:1:{i:0;s:18:\"file_53_109159.png\";}','2020-01-03 18:29:16','2020-01-04 11:33:57'),(14,60,1,'a:1:{i:0;s:18:\"file_60_544566.png\";}','2020-01-06 14:02:23',NULL),(15,60,2,'a:1:{i:0;s:18:\"file_60_814863.png\";}','2020-01-06 14:02:46',NULL),(16,60,3,'a:1:{i:0;s:18:\"file_60_375426.png\";}','2020-01-06 14:03:15',NULL),(17,61,1,'a:1:{i:0;s:18:\"file_61_165221.png\";}','2020-01-10 11:09:56','2020-01-10 11:51:31'),(18,61,2,'a:1:{i:0;s:18:\"file_61_669621.png\";}','2020-01-10 11:47:55','2020-01-10 12:55:52'),(19,61,3,'a:1:{i:0;s:18:\"file_61_676901.png\";}','2020-01-10 11:55:19','2020-01-10 13:00:04');

/*Table structure for table `account_variation` */

DROP TABLE IF EXISTS `account_variation`;

CREATE TABLE `account_variation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `variation` varchar(50) DEFAULT NULL,
  `date_insert` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `account_variation` */

insert  into `account_variation`(`id`,`comp_id`,`prod_id`,`variation`,`date_insert`,`date_update`) values (1,31,23,'Size','2019-11-06 01:10:06',NULL),(2,31,23,'Color','2019-11-06 01:10:06',NULL);

/*Table structure for table `account_variation_type` */

DROP TABLE IF EXISTS `account_variation_type`;

CREATE TABLE `account_variation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` int(11) DEFAULT NULL,
  `variation_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `qty` double(20,2) DEFAULT NULL,
  `unit_price` double(20,2) DEFAULT NULL,
  `date_insert` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `account_variation_type` */

insert  into `account_variation_type`(`id`,`comp_id`,`variation_id`,`type`,`qty`,`unit_price`,`date_insert`,`date_update`) values (1,31,1,'XS',100.00,2500.00,'2019-11-06 01:10:06',NULL),(2,31,1,'M',100.00,2700.00,'2019-11-06 01:10:06',NULL),(3,31,2,'Blue',100.00,2500.00,'2019-11-06 01:10:06',NULL),(4,31,2,'Orange',100.00,2700.00,'2019-11-06 01:10:06',NULL);

/*Table structure for table `account_warranty` */

DROP TABLE IF EXISTS `account_warranty`;

CREATE TABLE `account_warranty` (
  `id` double DEFAULT NULL,
  `comp_id` double DEFAULT NULL,
  `account_warranty` varchar(300) DEFAULT NULL,
  `account_return` varchar(300) DEFAULT NULL,
  `date_insert` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `account_warranty` */

insert  into `account_warranty`(`id`,`comp_id`,`account_warranty`,`account_return`,`date_insert`,`date_update`) values (1,31,'30 Days Warranty','7 Days Warranty','2019-11-20 13:43:00','2020-02-09 13:05:19'),(NULL,52,'No Warranty','No Returns','2019-12-11 17:11:55','2019-12-11 18:40:06'),(NULL,59,'N/A','7 days - replacement','2020-01-03 10:31:30','2020-01-29 21:06:38'),(NULL,53,'NA','7 days return','2020-01-03 18:41:48',NULL),(NULL,60,'N/A','7 Days','2020-01-06 14:07:33','2020-01-06 15:23:44');

/*Table structure for table `activity_log` */

DROP TABLE IF EXISTS `activity_log`;

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` int(11) NOT NULL,
  `sub_module` int(11) NOT NULL,
  `function` int(11) NOT NULL,
  `date_insert` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `activity_log` */

/*Table structure for table `business_type` */

DROP TABLE IF EXISTS `business_type`;

CREATE TABLE `business_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `business_type` */

insert  into `business_type`(`id`,`desc`) values (1,'Agricultural Products'),(2,'Antique store'),(3,'Appliance store'),(4,'Art gallery store'),(5,'Bakershop'),(6,'Bakery supplies and dairy products'),(7,'Beauty products and supplies'),(8,'Beauty salon Spa and Wellness'),(9,'Bike and accessories shop'),(10,'Book Store'),(11,'Carpets and rugs'),(12,'Catering and food Services'),(13,'Cellphone accessories'),(14,'Clothing Bbutique'),(15,'Construction supplies'),(16,'Covenient store'),(17,'Drug store'),(18,'Egg supplier'),(19,'Electronics store'),(20,'Farming and seedlings'),(21,'Feeds fertilizers and insectides'),(22,'Fish and other Seafoods'),(23,'Flower shop'),(24,'Food and Bevarages Store'),(25,'Fruits and vegetables'),(26,'Furniture and handicraft'),(27,'Games and toys store'),(28,'General merchandise'),(29,'Glass and mirror'),(30,'Graphic design and printing '),(31,'Health products'),(32,'Jewelry and Watches'),(33,'Laundry shop'),(34,'Meat and poultry Products'),(35,'Metal works '),(36,'Motor repair shop'),(37,'Motorc parts and accessories'),(38,'Music and instruments'),(39,'Optical'),(40,'Party events'),(41,'Perfumes and  cosmetics'),(42,'Restaurant'),(43,'Rice store'),(44,'Sari-sari store'),(45,'School and Office Supplies'),(46,'Shoes and apparels'),(47,'Tailoring'),(48,'Water refilling station'),(49,'Printing - T-shirts and Apparels');

/*Table structure for table `buyer_order` */

DROP TABLE IF EXISTS `buyer_order`;

CREATE TABLE `buyer_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `order_no` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `delivery_address` text,
  `barangay` varchar(50) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `province` int(11) DEFAULT NULL,
  `zip_code` varchar(11) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `contact_name` varchar(50) DEFAULT NULL,
  `notes` text,
  `payment_type` int(11) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `delivery_type` int(11) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `scheduled_date` date DEFAULT NULL,
  `scheduled_time` time DEFAULT NULL,
  `voucher_code` varchar(20) DEFAULT NULL,
  `voucher_price` double(20,2) DEFAULT NULL,
  `shipping_fee` double(20,2) DEFAULT NULL,
  `sub_total` double(20,2) DEFAULT NULL,
  `discount_amount` double(20,2) DEFAULT NULL,
  `total_amount` double(20,2) DEFAULT NULL,
  `total_vat` double(20,2) DEFAULT NULL,
  `total_items` double(20,2) DEFAULT NULL,
  `courier` varchar(50) DEFAULT NULL,
  `track_no` varchar(50) DEFAULT NULL,
  `date_insert` datetime DEFAULT NULL,
  `date_acknowledge` datetime DEFAULT NULL,
  `date_delivered` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `buyer_order` */

insert  into `buyer_order`(`id`,`comp_id`,`seller_id`,`order_no`,`status`,`delivery_address`,`barangay`,`city`,`province`,`zip_code`,`phone_no`,`contact_no`,`contact_name`,`notes`,`payment_type`,`payment_method`,`delivery_type`,`delivery_date`,`scheduled_date`,`scheduled_time`,`voucher_code`,`voucher_price`,`shipping_fee`,`sub_total`,`discount_amount`,`total_amount`,`total_vat`,`total_items`,`courier`,`track_no`,`date_insert`,`date_acknowledge`,`date_delivered`) values (1,1,31,201900001,4,'#65656 poblacion, makati','poblacion',1024,52,NULL,NULL,'09123456789','Cheasel Kim Caparal','',1,NULL,3,NULL,'0000-00-00','00:00:00',NULL,NULL,100.00,500.00,NULL,600.00,NULL,NULL,'Grab','s5a6df5as6df5ad','2019-10-22 00:00:00',NULL,'2019-10-27 22:00:21'),(2,1,31,201900002,0,'#65656 poblacion, makati','poblacion',1024,52,NULL,NULL,'09123456789','Cheasel Kim Caparal','',1,NULL,3,NULL,'0000-00-00','00:00:00',NULL,NULL,100.00,15000.00,NULL,15100.00,NULL,NULL,NULL,NULL,'2019-10-22 00:00:00','2019-11-06 01:37:46',NULL),(3,1,31,201900003,3,'#65656 poblacion, makati','poblacion',1024,52,NULL,NULL,'09123456789','Cheasel Kim Caparal','',1,NULL,3,NULL,'0000-00-00','00:00:00',NULL,NULL,100.00,15000.00,NULL,15100.00,NULL,NULL,'LBC','323532',NULL,NULL,'2019-11-06 01:38:14'),(4,1,31,201900004,2,'#65656 poblacion, makati','poblacion',0,26,NULL,NULL,'09123456789','Cheasel Kim Caparal','',1,NULL,3,NULL,'0000-00-00','00:00:00',NULL,NULL,0.00,0.00,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,31,201900005,1,'#65656 poblacion, makati','poblacion',0,26,NULL,NULL,'09123456789','Cheasel Kim Caparal','',1,NULL,3,NULL,'0000-00-00','00:00:00',NULL,NULL,150.00,18000.00,NULL,18150.00,NULL,NULL,NULL,NULL,'2019-11-14 00:00:00',NULL,NULL),(6,5,33,201900001,1,'9 Princeton ','Calumbaya',755,41,NULL,NULL,'9176543214','Enrique Purugganan','',1,NULL,3,NULL,'0000-00-00','00:00:00',NULL,NULL,0.00,3840.00,NULL,3840.00,NULL,NULL,NULL,NULL,'2019-11-14 00:00:00',NULL,NULL),(7,5,33,201900002,1,'No 9 ','Calumbaya',755,41,NULL,NULL,'9178761212','Enrique Purugganan','',1,NULL,3,NULL,'0000-00-00','00:00:00',NULL,NULL,0.00,2400.00,NULL,2400.00,NULL,NULL,NULL,NULL,'2019-11-14 00:00:00',NULL,NULL),(8,1,31,201900006,1,'#65656 poblacion, makati','poblacion',0,26,NULL,NULL,'09123456789','Cheasel Kim Caparal','',1,NULL,3,NULL,'0000-00-00','00:00:00',NULL,NULL,150.00,126000.00,NULL,126150.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,1,33,201900007,1,'#65656 poblacion, makati','poblacion',0,26,NULL,NULL,'09123456789','Cheasel Kim Caparal','',1,NULL,3,NULL,'0000-00-00','00:00:00',NULL,NULL,0.00,250.00,NULL,250.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,1,31,201900008,1,'#65656 poblacion, makati','poblacion',0,26,NULL,NULL,'09123456789','Cheasel Kim Caparal','',1,NULL,3,NULL,'0000-00-00','00:00:00',NULL,NULL,0.00,3600.00,NULL,3600.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,1,31,201900009,1,'#65656 poblacion, makati','poblacion',0,26,NULL,NULL,'09123456789','Cheasel Kim Caparal','',1,NULL,3,NULL,'0000-00-00','00:00:00',NULL,NULL,150.00,18000.00,NULL,18150.00,NULL,NULL,NULL,NULL,'2019-11-14 15:25:40',NULL,NULL),(12,1,31,201900010,1,'#65656 poblacion, makati','poblacion',0,26,NULL,NULL,'09123456789','Cheasel Kim Caparal','',1,NULL,3,NULL,'0000-00-00','00:00:00',NULL,NULL,150.00,18000.00,NULL,18150.00,NULL,NULL,NULL,NULL,'2019-11-15 15:12:00',NULL,NULL),(13,1,31,201900011,1,'#65656 poblacion, makati','poblacion',0,26,NULL,NULL,'09123456789','Cheasel Kim Caparal','',1,NULL,3,NULL,'0000-00-00','00:00:00',NULL,NULL,150.00,18000.00,NULL,18150.00,NULL,NULL,NULL,NULL,'2019-11-15 15:24:06',NULL,NULL),(14,1,59,202000012,1,'#65656 poblacion, makati','poblacion',0,26,NULL,NULL,'09123456789','Cheasel Kim Caparal','',5,4,3,NULL,'0000-00-00','00:00:00',NULL,NULL,0.00,1300.00,NULL,1300.00,NULL,NULL,NULL,NULL,'2020-01-31 05:45:45',NULL,NULL),(15,1,59,202000013,1,'#65656 poblacion, makati','poblacion',0,26,NULL,NULL,'09123456789','Cheasel Kim Caparal','',6,1,3,NULL,'0000-00-00','00:00:00',NULL,NULL,0.00,1700.00,NULL,1700.00,NULL,NULL,NULL,NULL,'2020-01-31 05:46:17',NULL,NULL),(16,1,59,202000014,1,'#65656 poblacion, makati','poblacion',0,26,NULL,NULL,'09123456789','Cheasel Kim Caparal','',6,1,3,NULL,'0000-00-00','00:00:00',NULL,NULL,0.00,850.00,NULL,850.00,NULL,NULL,NULL,NULL,'2020-01-31 05:47:03',NULL,NULL),(17,1,59,202000015,1,'#65656 poblacion, makati','poblacion',0,26,NULL,NULL,'09123456789','Cheasel Kim Caparal','',1,0,3,NULL,'0000-00-00','00:00:00',NULL,NULL,0.00,1700.00,NULL,1700.00,NULL,NULL,NULL,NULL,'2020-01-31 06:34:43',NULL,NULL),(18,1,31,202000016,1,'#65656 poblacion, makati','poblacion',499,26,'234234234','23424','09123456789','Cheasel Kim Caparal','asfasfas',NULL,0,2,NULL,NULL,NULL,NULL,NULL,0.00,2655.00,NULL,2655.00,NULL,NULL,NULL,NULL,'2020-02-08 16:58:29',NULL,NULL),(19,1,31,202000017,1,'#65656 poblacion, makati','poblacion',499,26,'12123','23424','09123456789','Cheasel Kim Caparal','asfasfasfasf',NULL,0,3,NULL,NULL,NULL,NULL,NULL,0.00,18000.00,NULL,18150.00,NULL,NULL,'0',NULL,'2020-02-08 20:58:43',NULL,NULL),(20,1,31,202000018,1,'#65656 poblacion, makati','poblacion',499,26,'12123','23424','09123456789','Cheasel Kim Caparal','ksdjfaksjfaosfdsjksdvhueagvjs iejfkafsfhafakjvn ipoa uisdk  ijldafjdfadjc kjakdfsalksn  dfkajfjkas',6,NULL,3,NULL,NULL,NULL,NULL,NULL,0.00,18000.00,NULL,18150.00,NULL,NULL,'0',NULL,'2020-02-08 21:00:59',NULL,NULL),(21,1,31,202000019,1,'#65656 poblacion, makati','poblacion',499,26,'12123','23424','09123456789','Cheasel Kim Caparal','',6,1,3,'0000-00-00',NULL,NULL,NULL,NULL,150.00,18000.00,NULL,18150.00,NULL,NULL,'2',NULL,'2020-02-09 15:03:51',NULL,NULL),(22,1,31,202000020,1,'#65656 poblacion, makati','poblacion',499,26,'12123','23424','09123456789','Cheasel Kim Caparal','',5,6,3,'0000-00-00',NULL,NULL,NULL,NULL,200.00,108000.00,NULL,108150.00,NULL,NULL,'3',NULL,'2020-02-09 15:41:13',NULL,NULL);

/*Table structure for table `buyer_order_products` */

DROP TABLE IF EXISTS `buyer_order_products`;

CREATE TABLE `buyer_order_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `prod_qty` int(11) DEFAULT NULL,
  `prod_price` double(20,2) DEFAULT NULL,
  `prod_total_price` double(20,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `buyer_order_products` */

insert  into `buyer_order_products`(`id`,`comp_id`,`order_id`,`prod_id`,`prod_qty`,`prod_price`,`prod_total_price`) values (2,1,1,24,5,100.00,NULL),(6,1,2,23,1,1500.00,NULL),(8,1,3,23,1,15000.00,15000.00),(9,1,5,23,1,18000.00,18000.00),(10,5,6,40,8,480.00,3840.00),(11,1,8,23,7,18000.00,126000.00),(14,5,7,40,2,480.00,960.00),(15,5,NULL,38,1,NULL,NULL),(16,1,9,28,1,250.00,250.00),(17,5,7,37,3,480.00,1440.00),(18,1,10,42,1,3600.00,3600.00),(20,1,11,23,1,18000.00,18000.00),(21,5,NULL,40,1,NULL,NULL),(22,5,NULL,39,1,NULL,NULL),(23,1,12,23,1,18000.00,18000.00),(24,1,13,23,1,18000.00,18000.00),(25,1,14,63,2,650.00,1300.00),(26,1,15,67,2,850.00,1700.00),(27,1,16,67,1,850.00,850.00),(28,1,17,67,2,850.00,1700.00),(29,1,NULL,65,1,NULL,NULL),(30,1,18,25,1,2655.00,2655.00),(31,1,19,23,1,18000.00,18000.00),(32,1,20,23,1,18000.00,18000.00),(33,1,21,23,1,18000.00,18000.00),(34,1,22,23,1,18000.00,108000.00);

/*Table structure for table `city` */

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `id` double NOT NULL,
  `province_id` double DEFAULT NULL,
  `city_desc` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `city` */

insert  into `city`(`id`,`province_id`,`city_desc`) values (1,1,'Bangued'),(2,1,'Boliney'),(3,1,'Bucay'),(4,1,'Bucloc'),(5,1,'Daguioman'),(6,1,'Danglas'),(7,1,'Dolores'),(8,1,'La Paz'),(9,1,'Lacub'),(10,1,'Lagangilang'),(11,1,'Lagayan'),(12,1,'Langiden'),(13,1,'Licuan-Baay (Licuan)'),(14,1,'Luba'),(15,1,'Malibcong'),(16,1,'Manabo'),(17,1,'Peñarrubia'),(18,1,'Pidigan'),(19,1,'Pilar'),(20,1,'Sallapadan'),(21,1,'San Isidro'),(22,1,'San Juan'),(23,1,'San Quintin'),(24,1,'Tayum'),(25,1,'Tineg'),(26,1,'Tubo'),(27,1,'Villaviciosa'),(28,2,'Buenavista'),(29,2,'Butuan'),(30,2,'Cabadbaran'),(31,2,'Carmen'),(32,2,'Jabonga'),(33,2,'Kitcharao'),(34,2,'Las Nieves'),(35,2,'Magallanes'),(36,2,'Nasipit'),(37,2,'Remedios T. Romualdez'),(38,2,'Santiago'),(39,2,'Tubay'),(40,3,'Bayugan'),(41,3,'Bunawan'),(42,3,'Esperanza'),(43,3,'La Paz'),(44,3,'Loreto'),(45,3,'Prosperidad'),(46,3,'Rosario'),(47,3,'San Francisco'),(48,3,'San Luis'),(49,3,'Santa Josefa'),(50,3,'Sibagat'),(51,3,'Talacogon'),(52,3,'Trento'),(53,3,'Veruela'),(54,4,'Altavas'),(55,4,'Balete'),(56,4,'Banga'),(57,4,'Batan'),(58,4,'Buruanga'),(59,4,'Ibajay'),(60,4,'Kalibo'),(61,4,'Lezo'),(62,4,'Libacao'),(63,4,'Madalag'),(64,4,'Makato'),(65,4,'Malay'),(66,4,'Malinao'),(67,4,'Nabas'),(68,4,'New Washington'),(69,4,'Numancia'),(70,4,'Tangalan'),(71,5,'Bacacay'),(72,5,'Camalig'),(73,5,'Daraga (Locsin)'),(74,5,'Guinobatan'),(75,5,'Jovellar'),(76,5,'Legazpi'),(77,5,'Libon'),(78,5,'Ligao'),(79,5,'Malilipot'),(80,5,'Malinao'),(81,5,'Manito'),(82,5,'Oas'),(83,5,'Pio Duran'),(84,5,'Polangui'),(85,5,'Rapu-Rapu'),(86,5,'Santo Domingo'),(87,5,'Tabaco'),(88,5,'Tiwi'),(89,6,'Anini-y'),(90,6,'Barbaza'),(91,6,'Belison'),(92,6,'Bugasong'),(93,6,'Caluya'),(94,6,'Culasi'),(95,6,'Hamtic'),(96,6,'Laua-an'),(97,6,'Libertad'),(98,6,'Pandan'),(99,6,'Patnongon'),(100,6,'San Jose de Buenavista'),(101,6,'San Remigio'),(102,6,'Sebaste'),(103,6,'Sibalom'),(104,6,'Tibiao'),(105,6,'Tobias Fornier (Dao)'),(106,6,'Valderrama'),(107,7,'Calanasan'),(108,7,'Conner'),(109,7,'Flora'),(110,7,'Kabugao'),(111,7,'Luna'),(112,7,'Pudtol'),(113,7,'Santa Marcela'),(114,8,'Baler'),(115,8,'Casiguran'),(116,8,'Dilasag'),(117,8,'Dinalungan'),(118,8,'Dingalan'),(119,8,'Dipaculao'),(120,8,'Maria Aurora'),(121,8,'San Luis'),(122,9,'Akbar'),(123,9,'Al-Barka'),(124,9,'Hadji Mohammad Ajul'),(125,9,'Hadji Muhtamad'),(126,9,'Isabela City'),(127,9,'Lamitan'),(128,9,'Lantawan'),(129,9,'Maluso'),(130,9,'Sumisip'),(131,9,'Tabuan-Lasa'),(132,9,'Tipo-Tipo'),(133,9,'Tuburan'),(134,9,'Ungkaya Pukan'),(135,10,'Abucay'),(136,10,'Bagac'),(137,10,'Balanga'),(138,10,'Dinalupihan'),(139,10,'Hermosa'),(140,10,'Limay'),(141,10,'Mariveles'),(142,10,'Morong'),(143,10,'Orani'),(144,10,'Orion'),(145,10,'Pilar'),(146,10,'Samal'),(147,11,'Basco'),(148,11,'Itbayat'),(149,11,'Ivana'),(150,11,'Mahatao'),(151,11,'Sabtang'),(152,11,'Uyugan'),(153,12,'Agoncillo'),(154,12,'Alitagtag'),(155,12,'Balayan'),(156,12,'Balete'),(157,12,'Batangas City'),(158,12,'Bauan'),(159,12,'Calaca'),(160,12,'Calatagan'),(161,12,'Cuenca'),(162,12,'Ibaan'),(163,12,'Laurel'),(164,12,'Lemery'),(165,12,'Lian'),(166,12,'Lipa'),(167,12,'Lobo'),(168,12,'Mabini'),(169,12,'Malvar'),(170,12,'Mataasnakahoy'),(171,12,'Nasugbu'),(172,12,'Padre Garcia'),(173,12,'Rosario'),(174,12,'San Jose'),(175,12,'San Juan'),(176,12,'San Luis'),(177,12,'San Nicolas'),(178,12,'San Pascual'),(179,12,'Santa Teresita'),(180,12,'Santo Tomas'),(181,12,'Taal'),(182,12,'Talisay'),(183,12,'Tanauan'),(184,12,'Taysan'),(185,12,'Tingloy'),(186,12,'Tuy'),(187,13,'Atok'),(188,13,'Baguio'),(189,13,'Bakun'),(190,13,'Bokod'),(191,13,'Buguias'),(192,13,'Itogon'),(193,13,'Kabayan'),(194,13,'Kapangan'),(195,13,'Kibungan'),(196,13,'La Trinidad'),(197,13,'Mankayan'),(198,13,'Sablan'),(199,13,'Tuba'),(200,13,'Tublay'),(201,14,'Almeria'),(202,14,'Biliran'),(203,14,'Cabucgayan'),(204,14,'Caibiran'),(205,14,'Culaba'),(206,14,'Kawayan'),(207,14,'Maripipi'),(208,14,'Naval'),(209,15,'Alburquerque'),(210,15,'Alicia'),(211,15,'Anda'),(212,15,'Antequera'),(213,15,'Baclayon'),(214,15,'Balilihan'),(215,15,'Batuan'),(216,15,'Bien Unido'),(217,15,'Bilar'),(218,15,'Buenavista'),(219,15,'Calape'),(220,15,'Candijay'),(221,15,'Carmen'),(222,15,'Catigbian'),(223,15,'Clarin'),(224,15,'Corella'),(225,15,'Cortes'),(226,15,'Dagohoy'),(227,15,'Danao'),(228,15,'Dauis'),(229,15,'Dimiao'),(230,15,'Duero'),(231,15,'Garcia Hernandez'),(232,15,'Getafe'),(233,15,'Guindulman'),(234,15,'Inabanga'),(235,15,'Jagna'),(236,15,'Lila'),(237,15,'Loay'),(238,15,'Loboc'),(239,15,'Loon'),(240,15,'Mabini'),(241,15,'Maribojoc'),(242,15,'Panglao'),(243,15,'Pilar'),(244,15,'President Carlos P. Garcia (Pitogo)'),(245,15,'Sagbayan (Borja)'),(246,15,'San Isidro'),(247,15,'San Miguel'),(248,15,'Sevilla'),(249,15,'Sierra Bullones'),(250,15,'Sikatuna'),(251,15,'Tagbilaran'),(252,15,'Talibon'),(253,15,'Trinidad'),(254,15,'Tubigon'),(255,15,'Ubay'),(256,15,'Valencia'),(257,16,'Baungon'),(258,16,'Cabanglasan'),(259,16,'Damulog'),(260,16,'Dangcagan'),(261,16,'Don Carlos'),(262,16,'Impasugong'),(263,16,'Kadingilan'),(264,16,'Kalilangan'),(265,16,'Kibawe'),(266,16,'Kitaotao'),(267,16,'Lantapan'),(268,16,'Libona'),(269,16,'Malaybalay'),(270,16,'Malitbog'),(271,16,'Manolo Fortich'),(272,16,'Maramag'),(273,16,'Pangantucan'),(274,16,'Quezon'),(275,16,'San Fernando'),(276,16,'Sumilao'),(277,16,'Talakag'),(278,16,'Valencia'),(279,17,'Angat'),(280,17,'Balagtas (Bigaa)'),(281,17,'Baliuag'),(282,17,'Bocaue'),(283,17,'Bulakan'),(284,17,'Bustos'),(285,17,'Calumpit'),(286,17,'Doña Remedios Trinidad'),(287,17,'Guiguinto'),(288,17,'Hagonoy'),(289,17,'Malolos'),(290,17,'Marilao'),(291,17,'Meycauayan'),(292,17,'Norzagaray'),(293,17,'Obando'),(294,17,'Pandi'),(295,17,'Paombong'),(296,17,'Plaridel'),(297,17,'Pulilan'),(298,17,'San Ildefonso'),(299,17,'San Jose del Monte'),(300,17,'San Miguel'),(301,17,'San Rafael'),(302,17,'Santa Maria'),(303,18,'Abulug'),(304,18,'Alcala'),(305,18,'Allacapan'),(306,18,'Amulung'),(307,18,'Aparri'),(308,18,'Baggao'),(309,18,'Ballesteros'),(310,18,'Buguey'),(311,18,'Calayan'),(312,18,'Camalaniugan'),(313,18,'Claveria'),(314,18,'Enrile'),(315,18,'Gattaran'),(316,18,'Gonzaga'),(317,18,'Iguig'),(318,18,'Lal-lo'),(319,18,'Lasam'),(320,18,'Pamplona'),(321,18,'Peñablanca'),(322,18,'Piat'),(323,18,'Rizal'),(324,18,'Sanchez-Mira'),(325,18,'Santa Ana'),(326,18,'Santa Praxedes'),(327,18,'Santa Teresita'),(328,18,'Santo Niño (Faire)'),(329,18,'Solana'),(330,18,'Tuao'),(331,18,'Tuguegarao'),(332,19,'Basud'),(333,19,'Capalonga'),(334,19,'Daet'),(335,19,'Jose Panganiban'),(336,19,'Labo'),(337,19,'Mercedes'),(338,19,'Paracale'),(339,19,'San Lorenzo Ruiz (Imelda)'),(340,19,'San Vicente'),(341,19,'Santa Elena'),(342,19,'Talisay'),(343,19,'Vinzons'),(344,20,'Baao'),(345,20,'Balatan'),(346,20,'Bato'),(347,20,'Bombon'),(348,20,'Buhi'),(349,20,'Bula'),(350,20,'Cabusao'),(351,20,'Calabanga'),(352,20,'Camaligan'),(353,20,'Canaman'),(354,20,'Caramoan'),(355,20,'Del Gallego'),(356,20,'Gainza'),(357,20,'Garchitorena'),(358,20,'Goa'),(359,20,'Iriga'),(360,20,'Lagonoy'),(361,20,'Libmanan'),(362,20,'Lupi'),(363,20,'Magarao'),(364,20,'Milaor'),(365,20,'Minalabac'),(366,20,'Nabua'),(367,20,'Naga'),(368,20,'Ocampo'),(369,20,'Pamplona'),(370,20,'Pasacao'),(371,20,'Pili'),(372,20,'Presentacion (Parubcan)'),(373,20,'Ragay'),(374,20,'Sagñay'),(375,20,'San Fernando'),(376,20,'San Jose'),(377,20,'Sipocot'),(378,20,'Siruma'),(379,20,'Tigaon'),(380,20,'Tinambac'),(381,21,'Catarman'),(382,21,'Guinsiliban'),(383,21,'Mahinog'),(384,21,'Mambajao'),(385,21,'Sagay'),(386,22,'Cuartero'),(387,22,'Dao'),(388,22,'Dumalag'),(389,22,'Dumarao'),(390,22,'Ivisan'),(391,22,'Jamindan'),(392,22,'Maayon'),(393,22,'Mambusao'),(394,22,'Panay'),(395,22,'Panitan'),(396,22,'Pilar'),(397,22,'Pontevedra'),(398,22,'President Roxas'),(399,22,'Roxas City'),(400,22,'Sapian'),(401,22,'Sigma'),(402,22,'Tapaz'),(403,23,'Bagamanoc'),(404,23,'Baras'),(405,23,'Bato'),(406,23,'Caramoran'),(407,23,'Gigmoto'),(408,23,'Pandan'),(409,23,'Panganiban (Payo)'),(410,23,'San Andres (Calolbon)'),(411,23,'San Miguel'),(412,23,'Viga'),(413,23,'Virac'),(414,24,'Alfonso'),(415,24,'Amadeo'),(416,24,'Bacoor'),(417,24,'Carmona'),(418,24,'Cavite City'),(419,24,'Dasmariñas'),(420,24,'General Emilio Aguinaldo'),(421,24,'General Mariano Alvarez'),(422,24,'General Trias'),(423,24,'Imus'),(424,24,'Indang'),(425,24,'Kawit'),(426,24,'Magallanes'),(427,24,'Maragondon'),(428,24,'Mendez (Mendez-Nuñez)'),(429,24,'Naic'),(430,24,'Noveleta'),(431,24,'Rosario'),(432,24,'Silang'),(433,24,'Tagaytay'),(434,24,'Tanza'),(435,24,'Ternate'),(436,24,'Trece Martires'),(437,25,'Alcantara'),(438,25,'Alcoy'),(439,25,'Alegria'),(440,25,'Aloguinsan'),(441,25,'Argao'),(442,25,'Asturias'),(443,25,'Badian'),(444,25,'Balamban'),(445,25,'Bantayan'),(446,25,'Barili'),(447,25,'Bogo'),(448,25,'Boljoon'),(449,25,'Borbon'),(450,25,'Carcar'),(451,25,'Carmen'),(452,25,'Catmon'),(453,25,'Cebu City'),(454,25,'Compostela'),(455,25,'Consolacion'),(456,25,'Cordova'),(457,25,'Daanbantayan'),(458,25,'Dalaguete'),(459,25,'Danao'),(460,25,'Dumanjug'),(461,25,'Ginatilan'),(462,25,'Lapu-Lapu (Opon)'),(463,25,'Liloan'),(464,25,'Madridejos'),(465,25,'Malabuyoc'),(466,25,'Mandaue'),(467,25,'Medellin'),(468,25,'Minglanilla'),(469,25,'Moalboal'),(470,25,'Naga'),(471,25,'Oslob'),(472,25,'Pilar'),(473,25,'Pinamungajan'),(474,25,'Poro'),(475,25,'Ronda'),(476,25,'Samboan'),(477,25,'San Fernando'),(478,25,'San Francisco'),(479,25,'San Remigio'),(480,25,'Santa Fe'),(481,25,'Santander'),(482,25,'Sibonga'),(483,25,'Sogod'),(484,25,'Tabogon'),(485,25,'Tabuelan'),(486,25,'Talisay'),(487,25,'Toledo'),(488,25,'Tuburan'),(489,25,'Tudela'),(490,26,'Compostela'),(491,26,'Laak (San Vicente)'),(492,26,'Mabini (Doña Alicia)'),(493,26,'Maco'),(494,26,'Maragusan (San Mariano)'),(495,26,'Mawab'),(496,26,'Monkayo'),(497,26,'Montevista'),(498,26,'Nabunturan'),(499,26,'New Bataan'),(500,26,'Pantukan'),(501,27,'Alamada'),(502,27,'Aleosan'),(503,27,'Antipas'),(504,27,'Arakan'),(505,27,'Banisilan'),(506,27,'Carmen'),(507,27,'Kabacan'),(508,27,'Kidapawan'),(509,27,'Libungan'),(510,27,'M\'lang'),(511,27,'Magpet'),(512,27,'Makilala'),(513,27,'Matalam'),(514,27,'Midsayap'),(515,27,'Pigcawayan'),(516,27,'Pikit'),(517,27,'President Roxas'),(518,27,'Tulunan'),(519,28,'Asuncion (Saug)'),(520,28,'Braulio E. Dujali'),(521,28,'Carmen'),(522,28,'Kapalong'),(523,28,'New Corella'),(524,28,'Panabo'),(525,28,'Samal'),(526,28,'San Isidro'),(527,28,'Santo Tomas'),(528,28,'Tagum'),(529,28,'Talaingod'),(530,29,'Bansalan'),(531,29,'Davao City'),(532,29,'Digos'),(533,29,'Hagonoy'),(534,29,'Kiblawan'),(535,29,'Magsaysay'),(536,29,'Malalag'),(537,29,'Matanao'),(538,29,'Padada'),(539,29,'Santa Cruz'),(540,29,'Sulop'),(541,30,'Don Marcelino'),(542,30,'Jose Abad Santos (Trinidad)'),(543,30,'Malita'),(544,30,'Santa Maria'),(545,30,'Sarangani'),(546,31,'Baganga'),(547,31,'Banaybanay'),(548,31,'Boston'),(549,31,'Caraga'),(550,31,'Cateel'),(551,31,'Governor Generoso'),(552,31,'Lupon'),(553,31,'Manay'),(554,31,'Mati'),(555,31,'San Isidro'),(556,31,'Tarragona'),(557,32,'Basilisa (Rizal)'),(558,32,'Cagdianao'),(559,32,'Dinagat'),(560,32,'Libjo (Albor)'),(561,32,'Loreto'),(562,32,'San Jose'),(563,32,'Tubajon'),(564,33,'Arteche'),(565,33,'Balangiga'),(566,33,'Balangkayan'),(567,33,'Borongan'),(568,33,'Can-avid'),(569,33,'Dolores'),(570,33,'General MacArthur'),(571,33,'Giporlos'),(572,33,'Guiuan'),(573,33,'Hernani'),(574,33,'Jipapad'),(575,33,'Lawaan'),(576,33,'Llorente'),(577,33,'Maslog'),(578,33,'Maydolong'),(579,33,'Mercedes'),(580,33,'Oras'),(581,33,'Quinapondan'),(582,33,'Salcedo'),(583,33,'San Julian'),(584,33,'San Policarpo'),(585,33,'Sulat'),(586,33,'Taft'),(587,34,'Buenavista'),(588,34,'Jordan'),(589,34,'Nueva Valencia'),(590,34,'San Lorenzo'),(591,34,'Sibunag'),(592,35,'Aguinaldo'),(593,35,'Alfonso Lista (Potia)'),(594,35,'Asipulo'),(595,35,'Banaue'),(596,35,'Hingyon'),(597,35,'Hungduan'),(598,35,'Kiangan'),(599,35,'Lagawe'),(600,35,'Lamut'),(601,35,'Mayoyao'),(602,35,'Tinoc'),(603,36,'Adams'),(604,36,'Bacarra'),(605,36,'Badoc'),(606,36,'Bangui'),(607,36,'Banna (Espiritu)'),(608,36,'Batac'),(609,36,'Burgos'),(610,36,'Carasi'),(611,36,'Currimao'),(612,36,'Dingras'),(613,36,'Dumalneg'),(614,36,'Laoag'),(615,36,'Marcos'),(616,36,'Nueva Era'),(617,36,'Pagudpud'),(618,36,'Paoay'),(619,36,'Pasuquin'),(620,36,'Piddig'),(621,36,'Pinili'),(622,36,'San Nicolas'),(623,36,'Sarrat'),(624,36,'Solsona'),(625,36,'Vintar'),(626,37,'Alilem'),(627,37,'Banayoyo'),(628,37,'Bantay'),(629,37,'Burgos'),(630,37,'Cabugao'),(631,37,'Candon'),(632,37,'Caoayan'),(633,37,'Cervantes'),(634,37,'Galimuyod'),(635,37,'Gregorio del Pilar (Concepcion)'),(636,37,'Lidlidda'),(637,37,'Magsingal'),(638,37,'Nagbukel'),(639,37,'Narvacan'),(640,37,'Quirino (Angkaki)'),(641,37,'Salcedo (Baugen)'),(642,37,'San Emilio'),(643,37,'San Esteban'),(644,37,'San Ildefonso'),(645,37,'San Juan (Lapog)'),(646,37,'San Vicente'),(647,37,'Santa'),(648,37,'Santa Catalina'),(649,37,'Santa Cruz'),(650,37,'Santa Lucia'),(651,37,'Santa Maria'),(652,37,'Santiago'),(653,37,'Santo Domingo'),(654,37,'Sigay'),(655,37,'Sinait'),(656,37,'Sugpon'),(657,37,'Suyo'),(658,37,'Tagudin'),(659,37,'Vigan'),(660,38,'Ajuy'),(661,38,'Alimodian'),(662,38,'Anilao'),(663,38,'Badiangan'),(664,38,'Balasan'),(665,38,'Banate'),(666,38,'Barotac Nuevo'),(667,38,'Barotac Viejo'),(668,38,'Batad'),(669,38,'Bingawan'),(670,38,'Cabatuan'),(671,38,'Calinog'),(672,38,'Carles'),(673,38,'Concepcion'),(674,38,'Dingle'),(675,38,'Dueñas'),(676,38,'Dumangas'),(677,38,'Estancia'),(678,38,'Guimbal'),(679,38,'Igbaras'),(680,38,'Iloilo City'),(681,38,'Janiuay'),(682,38,'Lambunao'),(683,38,'Leganes'),(684,38,'Lemery'),(685,38,'Leon'),(686,38,'Maasin'),(687,38,'Miagao'),(688,38,'Mina'),(689,38,'New Lucena'),(690,38,'Oton'),(691,38,'Passi'),(692,38,'Pavia'),(693,38,'Pototan'),(694,38,'San Dionisio'),(695,38,'San Enrique'),(696,38,'San Joaquin'),(697,38,'San Miguel'),(698,38,'San Rafael'),(699,38,'Santa Barbara'),(700,38,'Sara'),(701,38,'Tigbauan'),(702,38,'Tubungan'),(703,38,'Zarraga'),(704,39,'Alicia'),(705,39,'Angadanan'),(706,39,'Aurora'),(707,39,'Benito Soliven'),(708,39,'Burgos'),(709,39,'Cabagan'),(710,39,'Cabatuan'),(711,39,'Cauayan'),(712,39,'Cordon'),(713,39,'Delfin Albano (Magsaysay)'),(714,39,'Dinapigue'),(715,39,'Divilacan'),(716,39,'Echague'),(717,39,'Gamu'),(718,39,'Ilagan'),(719,39,'Jones'),(720,39,'Luna'),(721,39,'Maconacon'),(722,39,'Mallig'),(723,39,'Naguilian'),(724,39,'Palanan'),(725,39,'Quezon'),(726,39,'Quirino'),(727,39,'Ramon'),(728,39,'Reina Mercedes'),(729,39,'Roxas'),(730,39,'San Agustin'),(731,39,'San Guillermo'),(732,39,'San Isidro'),(733,39,'San Manuel (Callang)'),(734,39,'San Mariano'),(735,39,'San Mateo'),(736,39,'San Pablo'),(737,39,'Santa Maria'),(738,39,'Santiago'),(739,39,'Santo Tomas'),(740,39,'Tumauini'),(741,40,'Balbalan'),(742,40,'Lubuagan'),(743,40,'Pasil'),(744,40,'Pinukpuk'),(745,40,'Rizal (Liwan)'),(746,40,'Tabuk'),(747,40,'Tanudan'),(748,40,'Tinglayan'),(749,41,'Agoo'),(750,41,'Aringay'),(751,41,'Bacnotan'),(752,41,'Bagulin'),(753,41,'Balaoan'),(754,41,'Bangar'),(755,41,'Bauang'),(756,41,'Burgos'),(757,41,'Caba'),(758,41,'Luna'),(759,41,'Naguilian'),(760,41,'Pugo'),(761,41,'Rosario'),(762,41,'San Fernando'),(763,41,'San Gabriel'),(764,41,'San Juan'),(765,41,'Santo Tomas'),(766,41,'Santol'),(767,41,'Sudipen'),(768,41,'Tubao'),(769,42,'Alaminos'),(770,42,'Bay'),(771,42,'Biñan'),(772,42,'Cabuyao'),(773,42,'Calamba'),(774,42,'Calauan'),(775,42,'Cavinti'),(776,42,'Famy'),(777,42,'Kalayaan'),(778,42,'Liliw'),(779,42,'Los Baños'),(780,42,'Luisiana'),(781,42,'Lumban'),(782,42,'Mabitac'),(783,42,'Magdalena'),(784,42,'Majayjay'),(785,42,'Nagcarlan'),(786,42,'Paete'),(787,42,'Pagsanjan'),(788,42,'Pakil'),(789,42,'Pangil'),(790,42,'Pila'),(791,42,'Rizal'),(792,42,'San Pablo'),(793,42,'San Pedro'),(794,42,'Santa Cruz'),(795,42,'Santa Maria'),(796,42,'Santa Rosa'),(797,42,'Siniloan'),(798,42,'Victoria'),(799,43,'Bacolod'),(800,43,'Baloi'),(801,43,'Baroy'),(802,43,'Iligan'),(803,43,'Kapatagan'),(804,43,'Kauswagan'),(805,43,'Kolambugan'),(806,43,'Lala'),(807,43,'Linamon'),(808,43,'Magsaysay'),(809,43,'Maigo'),(810,43,'Matungao'),(811,43,'Munai'),(812,43,'Nunungan'),(813,43,'Pantao Ragat'),(814,43,'Pantar'),(815,43,'Poona Piagapo'),(816,43,'Salvador'),(817,43,'Sapad'),(818,43,'Sultan Naga Dimaporo (Karomatan)'),(819,43,'Tagoloan'),(820,43,'Tangcal'),(821,43,'Tubod'),(822,44,'Amai Manabilang (Bumbaran)'),(823,44,'Bacolod-Kalawi (Bacolod-Grande)'),(824,44,'Balabagan'),(825,44,'Balindong (Watu)'),(826,44,'Bayang'),(827,44,'Binidayan'),(828,44,'Buadiposo-Buntong'),(829,44,'Bubong'),(830,44,'Butig'),(831,44,'Calanogas'),(832,44,'Ditsaan-Ramain'),(833,44,'Ganassi'),(834,44,'Kapai'),(835,44,'Kapatagan'),(836,44,'Lumba-Bayabao (Maguing)'),(837,44,'Lumbaca-Unayan'),(838,44,'Lumbatan'),(839,44,'Lumbayanague'),(840,44,'Madalum'),(841,44,'Madamba'),(842,44,'Maguing'),(843,44,'Malabang'),(844,44,'Marantao'),(845,44,'Marawi'),(846,44,'Marogong'),(847,44,'Masiu'),(848,44,'Mulondo'),(849,44,'Pagayawan (Tatarikan)'),(850,44,'Piagapo'),(851,44,'Picong (Sultan Gumander)'),(852,44,'Poona Bayabao (Gata)'),(853,44,'Pualas'),(854,44,'Saguiaran'),(855,44,'Sultan Dumalondong'),(856,44,'Tagoloan II'),(857,44,'Tamparan'),(858,44,'Taraka'),(859,44,'Tubaran'),(860,44,'Tugaya'),(861,44,'Wao'),(862,45,'Abuyog'),(863,45,'Alangalang'),(864,45,'Albuera'),(865,45,'Babatngon'),(866,45,'Barugo'),(867,45,'Bato'),(868,45,'Baybay'),(869,45,'Burauen'),(870,45,'Calubian'),(871,45,'Capoocan'),(872,45,'Carigara'),(873,45,'Dagami'),(874,45,'Dulag'),(875,45,'Hilongos'),(876,45,'Hindang'),(877,45,'Inopacan'),(878,45,'Isabel'),(879,45,'Jaro'),(880,45,'Javier (Bugho)'),(881,45,'Julita'),(882,45,'Kananga'),(883,45,'La Paz'),(884,45,'Leyte'),(885,45,'MacArthur'),(886,45,'Mahaplag'),(887,45,'Matag-ob'),(888,45,'Matalom'),(889,45,'Mayorga'),(890,45,'Merida'),(891,45,'Ormoc'),(892,45,'Palo'),(893,45,'Palompon'),(894,45,'Pastrana'),(895,45,'San Isidro'),(896,45,'San Miguel'),(897,45,'Santa Fe'),(898,45,'Tabango'),(899,45,'Tabontabon'),(900,45,'Tacloban'),(901,45,'Tanauan'),(902,45,'Tolosa'),(903,45,'Tunga'),(904,45,'Villaba'),(905,46,'Ampatuan'),(906,46,'Barira'),(907,46,'Buldon'),(908,46,'Buluan'),(909,46,'Cotabato City'),(910,46,'Datu Abdullah Sangki'),(911,46,'Datu Anggal Midtimbang'),(912,46,'Datu Blah T. Sinsuat'),(913,46,'Datu Hoffer Ampatuan'),(914,46,'Datu Montawal (Pagagawan)'),(915,46,'Datu Odin Sinsuat (Dinaig)'),(916,46,'Datu Paglas'),(917,46,'Datu Piang (Dulawan)'),(918,46,'Datu Salibo'),(919,46,'Datu Saudi-Ampatuan'),(920,46,'Datu Unsay'),(921,46,'General Salipada K. Pendatun'),(922,46,'Guindulungan'),(923,46,'Kabuntalan (Tumbao)'),(924,46,'Mamasapano'),(925,46,'Mangudadatu'),(926,46,'Matanog'),(927,46,'Northern Kabuntalan'),(928,46,'Pagalungan'),(929,46,'Paglat'),(930,46,'Pandag'),(931,46,'Parang'),(932,46,'Rajah Buayan'),(933,46,'Shariff Aguak (Maganoy)'),(934,46,'Shariff Saydona Mustapha'),(935,46,'South Upi'),(936,46,'Sultan Kudarat (Nuling)'),(937,46,'Sultan Mastura'),(938,46,'Sultan sa Barongis (Lambayong)'),(939,46,'Sultan Sumagka (Talitay)'),(940,46,'Talayan'),(941,46,'Upi'),(942,47,'Boac'),(943,47,'Buenavista'),(944,47,'Gasan'),(945,47,'Mogpog'),(946,47,'Santa Cruz'),(947,47,'Torrijos'),(948,48,'Aroroy'),(949,48,'Baleno'),(950,48,'Balud'),(951,48,'Batuan'),(952,48,'Cataingan'),(953,48,'Cawayan'),(954,48,'Claveria'),(955,48,'Dimasalang'),(956,48,'Esperanza'),(957,48,'Mandaon'),(958,48,'Masbate City'),(959,48,'Milagros'),(960,48,'Mobo'),(961,48,'Monreal'),(962,48,'Palanas'),(963,48,'Pio V. Corpuz (Limbuhan)'),(964,48,'Placer'),(965,48,'San Fernando'),(966,48,'San Jacinto'),(967,48,'San Pascual'),(968,48,'Uson'),(969,49,'Aloran'),(970,49,'Baliangao'),(971,49,'Bonifacio'),(972,49,'Calamba'),(973,49,'Clarin'),(974,49,'Concepcion'),(975,49,'Don Victoriano Chiongbian (Don Mariano Marcos)'),(976,49,'Jimenez'),(977,49,'Lopez Jaena'),(978,49,'Oroquieta'),(979,49,'Ozamiz'),(980,49,'Panaon'),(981,49,'Plaridel'),(982,49,'Sapang Dalaga'),(983,49,'Sinacaban'),(984,49,'Tangub'),(985,49,'Tudela'),(986,50,'Alubijid'),(987,50,'Balingasag'),(988,50,'Balingoan'),(989,50,'Binuangan'),(990,50,'Cagayan de Oro'),(991,50,'Claveria'),(992,50,'El Salvador'),(993,50,'Gingoog'),(994,50,'Gitagum'),(995,50,'Initao'),(996,50,'Jasaan'),(997,50,'Kinoguitan'),(998,50,'Lagonglong'),(999,50,'Laguindingan'),(1000,50,'Libertad'),(1001,50,'Lugait'),(1002,50,'Magsaysay (Linugos)'),(1003,50,'Manticao'),(1004,50,'Medina'),(1005,50,'Naawan'),(1006,50,'Opol'),(1007,50,'Salay'),(1008,50,'Sugbongcogon'),(1009,50,'Tagoloan'),(1010,50,'Talisayan'),(1011,50,'Villanueva'),(1012,51,'Barlig'),(1013,51,'Bauko'),(1014,51,'Besao'),(1015,51,'Bontoc'),(1016,51,'Natonin'),(1017,51,'Paracelis'),(1018,51,'Sabangan'),(1019,51,'Sadanga'),(1020,51,'Sagada'),(1021,51,'Tadian'),(1022,52,'Caloocan'),(1023,52,'Las Piñas'),(1024,52,'Makati'),(1025,52,'Malabon'),(1026,52,'Mandaluyong'),(1027,52,'Manila'),(1028,52,'Marikina'),(1029,52,'Muntinlupa'),(1030,52,'Navotas'),(1031,52,'Parañaque'),(1032,52,'Pasay'),(1033,52,'Pasig'),(1034,52,'Pateros'),(1035,52,'Quezon City'),(1036,52,'San Juan'),(1037,52,'Taguig'),(1038,52,'Valenzuela'),(1039,53,'Bacolod'),(1040,53,'Bago'),(1041,53,'Binalbagan'),(1042,53,'Cadiz'),(1043,53,'Calatrava'),(1044,53,'Candoni'),(1045,53,'Cauayan'),(1046,53,'Enrique B. Magalona (Saravia)'),(1047,53,'Escalante'),(1048,53,'Himamaylan'),(1049,53,'Hinigaran'),(1050,53,'Hinoba-an (Asia)'),(1051,53,'Ilog'),(1052,53,'Isabela'),(1053,53,'Kabankalan'),(1054,53,'La Carlota'),(1055,53,'La Castellana'),(1056,53,'Manapla'),(1057,53,'Moises Padilla (Magallon)'),(1058,53,'Murcia'),(1059,53,'Pontevedra'),(1060,53,'Pulupandan'),(1061,53,'Sagay'),(1062,53,'Salvador Benedicto'),(1063,53,'San Carlos'),(1064,53,'San Enrique'),(1065,53,'Silay'),(1066,53,'Sipalay'),(1067,53,'Talisay'),(1068,53,'Toboso'),(1069,53,'Valladolid'),(1070,53,'Victorias'),(1071,54,'Amlan (Ayuquitan)'),(1072,54,'Ayungon'),(1073,54,'Bacong'),(1074,54,'Bais'),(1075,54,'Basay'),(1076,54,'Bayawan (Tulong)'),(1077,54,'Bindoy (Payabon)'),(1078,54,'Canlaon'),(1079,54,'Dauin'),(1080,54,'Dumaguete'),(1081,54,'Guihulngan'),(1082,54,'Jimalalud'),(1083,54,'La Libertad'),(1084,54,'Mabinay'),(1085,54,'Manjuyod'),(1086,54,'Pamplona'),(1087,54,'San Jose'),(1088,54,'Santa Catalina'),(1089,54,'Siaton'),(1090,54,'Sibulan'),(1091,54,'Tanjay'),(1092,54,'Tayasan'),(1093,54,'Valencia (Luzurriaga)'),(1094,54,'Vallehermoso'),(1095,54,'Zamboanguita'),(1096,55,'Allen'),(1097,55,'Biri'),(1098,55,'Bobon'),(1099,55,'Capul'),(1100,55,'Catarman'),(1101,55,'Catubig'),(1102,55,'Gamay'),(1103,55,'Laoang'),(1104,55,'Lapinig'),(1105,55,'Las Navas'),(1106,55,'Lavezares'),(1107,55,'Lope de Vega'),(1108,55,'Mapanas'),(1109,55,'Mondragon'),(1110,55,'Palapag'),(1111,55,'Pambujan'),(1112,55,'Rosario'),(1113,55,'San Antonio'),(1114,55,'San Isidro'),(1115,55,'San Jose'),(1116,55,'San Roque'),(1117,55,'San Vicente'),(1118,55,'Silvino Lobos'),(1119,55,'Victoria'),(1120,56,'Aliaga'),(1121,56,'Bongabon'),(1122,56,'Cabanatuan'),(1123,56,'Cabiao'),(1124,56,'Carranglan'),(1125,56,'Cuyapo'),(1126,56,'Gabaldon (Bitulok & Sabani)'),(1127,56,'Gapan'),(1128,56,'General Mamerto Natividad'),(1129,56,'General Tinio (Papaya)'),(1130,56,'Guimba'),(1131,56,'Jaen'),(1132,56,'Laur'),(1133,56,'Licab'),(1134,56,'Llanera'),(1135,56,'Lupao'),(1136,56,'Muñoz'),(1137,56,'Nampicuan'),(1138,56,'Palayan'),(1139,56,'Pantabangan'),(1140,56,'Peñaranda'),(1141,56,'Quezon'),(1142,56,'Rizal'),(1143,56,'San Antonio'),(1144,56,'San Isidro'),(1145,56,'San Jose'),(1146,56,'San Leonardo'),(1147,56,'Santa Rosa'),(1148,56,'Santo Domingo'),(1149,56,'Talavera'),(1150,56,'Talugtug'),(1151,56,'Zaragoza'),(1152,57,'Alfonso Castañeda'),(1153,57,'Ambaguio'),(1154,57,'Aritao'),(1155,57,'Bagabag'),(1156,57,'Bambang'),(1157,57,'Bayombong'),(1158,57,'Diadi'),(1159,57,'Dupax del Norte'),(1160,57,'Dupax del Sur'),(1161,57,'Kasibu'),(1162,57,'Kayapa'),(1163,57,'Quezon'),(1164,57,'Santa Fe (Imugan)'),(1165,57,'Solano'),(1166,57,'Villaverde (Ibung)'),(1167,58,'Abra de Ilog'),(1168,58,'Calintaan'),(1169,58,'Looc'),(1170,58,'Lubang'),(1171,58,'Magsaysay'),(1172,58,'Mamburao'),(1173,58,'Paluan'),(1174,58,'Rizal'),(1175,58,'Sablayan'),(1176,58,'San Jose'),(1177,58,'Santa Cruz'),(1178,59,'Baco'),(1179,59,'Bansud'),(1180,59,'Bongabong'),(1181,59,'Bulalacao (San Pedro)'),(1182,59,'Calapan'),(1183,59,'Gloria'),(1184,59,'Mansalay'),(1185,59,'Naujan'),(1186,59,'Pinamalayan'),(1187,59,'Pola'),(1188,59,'Puerto Galera'),(1189,59,'Roxas'),(1190,59,'San Teodoro'),(1191,59,'Socorro'),(1192,59,'Victoria'),(1193,60,'Aborlan'),(1194,60,'Agutaya'),(1195,60,'Araceli'),(1196,60,'Balabac'),(1197,60,'Bataraza'),(1198,60,'Brooke\'s Point'),(1199,60,'Busuanga'),(1200,60,'Cagayancillo'),(1201,60,'Coron'),(1202,60,'Culion'),(1203,60,'Cuyo'),(1204,60,'Dumaran'),(1205,60,'El Nido (Bacuit)'),(1206,60,'Kalayaan'),(1207,60,'Linapacan'),(1208,60,'Magsaysay'),(1209,60,'Narra'),(1210,60,'Puerto Princesa'),(1211,60,'Quezon'),(1212,60,'Rizal (Marcos)'),(1213,60,'Roxas'),(1214,60,'San Vicente'),(1215,60,'Sofronio Española'),(1216,60,'Taytay'),(1217,61,'Angeles'),(1218,61,'Apalit'),(1219,61,'Arayat'),(1220,61,'Bacolor'),(1221,61,'Candaba'),(1222,61,'Floridablanca'),(1223,61,'Guagua'),(1224,61,'Lubao'),(1225,61,'Mabalacat'),(1226,61,'Macabebe'),(1227,61,'Magalang'),(1228,61,'Masantol'),(1229,61,'Mexico'),(1230,61,'Minalin'),(1231,61,'Porac'),(1232,61,'San Fernando'),(1233,61,'San Luis'),(1234,61,'San Simon'),(1235,61,'Santa Ana'),(1236,61,'Santa Rita'),(1237,61,'Santo Tomas'),(1238,61,'Sasmuan'),(1239,62,'Agno'),(1240,62,'Aguilar'),(1241,62,'Alaminos'),(1242,62,'Alcala'),(1243,62,'Anda'),(1244,62,'Asingan'),(1245,62,'Balungao'),(1246,62,'Bani'),(1247,62,'Basista'),(1248,62,'Bautista'),(1249,62,'Bayambang'),(1250,62,'Binalonan'),(1251,62,'Binmaley'),(1252,62,'Bolinao'),(1253,62,'Bugallon'),(1254,62,'Burgos'),(1255,62,'Calasiao'),(1256,62,'Dagupan'),(1257,62,'Dasol'),(1258,62,'Infanta'),(1259,62,'Labrador'),(1260,62,'Laoac'),(1261,62,'Lingayen'),(1262,62,'Mabini'),(1263,62,'Malasiqui'),(1264,62,'Manaoag'),(1265,62,'Mangaldan'),(1266,62,'Mangatarem'),(1267,62,'Mapandan'),(1268,62,'Natividad'),(1269,62,'Pozorrubio'),(1270,62,'Rosales'),(1271,62,'San Carlos'),(1272,62,'San Fabian'),(1273,62,'San Jacinto'),(1274,62,'San Manuel'),(1275,62,'San Nicolas'),(1276,62,'San Quintin'),(1277,62,'Santa Barbara'),(1278,62,'Santa Maria'),(1279,62,'Santo Tomas'),(1280,62,'Sison'),(1281,62,'Sual'),(1282,62,'Tayug'),(1283,62,'Umingan'),(1284,62,'Urbiztondo'),(1285,62,'Urdaneta'),(1286,62,'Villasis'),(1287,63,'Agdangan'),(1288,63,'Alabat'),(1289,63,'Atimonan'),(1290,63,'Buenavista'),(1291,63,'Burdeos'),(1292,63,'Calauag'),(1293,63,'Candelaria'),(1294,63,'Catanauan'),(1295,63,'Dolores'),(1296,63,'General Luna'),(1297,63,'General Nakar'),(1298,63,'Guinayangan'),(1299,63,'Gumaca'),(1300,63,'Infanta'),(1301,63,'Jomalig'),(1302,63,'Lopez'),(1303,63,'Lucban'),(1304,63,'Lucena'),(1305,63,'Macalelon'),(1306,63,'Mauban'),(1307,63,'Mulanay'),(1308,63,'Padre Burgos'),(1309,63,'Pagbilao'),(1310,63,'Panukulan'),(1311,63,'Patnanungan'),(1312,63,'Perez'),(1313,63,'Pitogo'),(1314,63,'Plaridel'),(1315,63,'Polillo'),(1316,63,'Quezon'),(1317,63,'Real'),(1318,63,'Sampaloc'),(1319,63,'San Andres'),(1320,63,'San Antonio'),(1321,63,'San Francisco (Aurora)'),(1322,63,'San Narciso'),(1323,63,'Sariaya'),(1324,63,'Tagkawayan'),(1325,63,'Tayabas'),(1326,63,'Tiaong'),(1327,63,'Unisan'),(1328,64,'Aglipay'),(1329,64,'Cabarroguis'),(1330,64,'Diffun'),(1331,64,'Maddela'),(1332,64,'Nagtipunan'),(1333,64,'Saguday'),(1334,65,'Angono'),(1335,65,'Antipolo'),(1336,65,'Baras'),(1337,65,'Binangonan'),(1338,65,'Cainta'),(1339,65,'Cardona'),(1340,65,'Jalajala'),(1341,65,'Morong'),(1342,65,'Pililla'),(1343,65,'Rodriguez (Montalban)'),(1344,65,'San Mateo'),(1345,65,'Tanay'),(1346,65,'Taytay'),(1347,65,'Teresa'),(1348,66,'Alcantara'),(1349,66,'Banton (Jones)'),(1350,66,'Cajidiocan'),(1351,66,'Calatrava'),(1352,66,'Concepcion'),(1353,66,'Corcuera'),(1354,66,'Ferrol'),(1355,66,'Looc'),(1356,66,'Magdiwang'),(1357,66,'Odiongan'),(1358,66,'Romblon'),(1359,66,'San Agustin'),(1360,66,'San Andres'),(1361,66,'San Fernando'),(1362,66,'San Jose'),(1363,66,'Santa Fe'),(1364,66,'Santa Maria (Imelda)'),(1365,67,'Almagro'),(1366,67,'Basey'),(1367,67,'Calbayog'),(1368,67,'Calbiga'),(1369,67,'Catbalogan'),(1370,67,'Daram'),(1371,67,'Gandara'),(1372,67,'Hinabangan'),(1373,67,'Jiabong'),(1374,67,'Marabut'),(1375,67,'Matuguinao'),(1376,67,'Motiong'),(1377,67,'Pagsanghan'),(1378,67,'Paranas (Wright)'),(1379,67,'Pinabacdao'),(1380,67,'San Jorge'),(1381,67,'San Jose de Buan'),(1382,67,'San Sebastian'),(1383,67,'Santa Margarita'),(1384,67,'Santa Rita'),(1385,67,'Santo Niño'),(1386,67,'Tagapul-an'),(1387,67,'Talalora'),(1388,67,'Tarangnan'),(1389,67,'Villareal'),(1390,67,'Zumarraga'),(1391,68,'Alabel'),(1392,68,'Glan'),(1393,68,'Kiamba'),(1394,68,'Maasim'),(1395,68,'Maitum'),(1396,68,'Malapatan'),(1397,68,'Malungon'),(1398,69,'Enrique Villanueva'),(1399,69,'Larena'),(1400,69,'Lazi'),(1401,69,'Maria'),(1402,69,'San Juan'),(1403,69,'Siquijor'),(1404,70,'Barcelona'),(1405,70,'Bulan'),(1406,70,'Bulusan'),(1407,70,'Casiguran'),(1408,70,'Castilla'),(1409,70,'Donsol'),(1410,70,'Gubat'),(1411,70,'Irosin'),(1412,70,'Juban'),(1413,70,'Magallanes'),(1414,70,'Matnog'),(1415,70,'Pilar'),(1416,70,'Prieto Diaz'),(1417,70,'Santa Magdalena'),(1418,70,'Sorsogon City'),(1419,71,'Banga'),(1420,71,'General Santos (Dadiangas)'),(1421,71,'Koronadal'),(1422,71,'Lake Sebu'),(1423,71,'Norala'),(1424,71,'Polomolok'),(1425,71,'Santo Niño'),(1426,71,'Surallah'),(1427,71,'T\'Boli'),(1428,71,'Tampakan'),(1429,71,'Tantangan'),(1430,71,'Tupi'),(1431,72,'Anahawan'),(1432,72,'Bontoc'),(1433,72,'Hinunangan'),(1434,72,'Hinundayan'),(1435,72,'Libagon'),(1436,72,'Liloan'),(1437,72,'Limasawa'),(1438,72,'Maasin'),(1439,72,'Macrohon'),(1440,72,'Malitbog'),(1441,72,'Padre Burgos'),(1442,72,'Pintuyan'),(1443,72,'Saint Bernard'),(1444,72,'San Francisco'),(1445,72,'San Juan (Cabalian)'),(1446,72,'San Ricardo'),(1447,72,'Silago'),(1448,72,'Sogod'),(1449,72,'Tomas Oppus'),(1450,73,'Bagumbayan'),(1451,73,'Columbio'),(1452,73,'Esperanza'),(1453,73,'Isulan'),(1454,73,'Kalamansig'),(1455,73,'Lambayong (Mariano Marcos)'),(1456,73,'Lebak'),(1457,73,'Lutayan'),(1458,73,'Palimbang'),(1459,73,'President Quirino'),(1460,73,'Senator Ninoy Aquino'),(1461,73,'Tacurong'),(1462,74,'Banguingui (Tongkil)'),(1463,74,'Hadji Panglima Tahil (Marunggas)'),(1464,74,'Indanan'),(1465,74,'Jolo'),(1466,74,'Kalingalan Caluang'),(1467,74,'Lugus'),(1468,74,'Luuk'),(1469,74,'Maimbung'),(1470,74,'Old Panamao'),(1471,74,'Omar'),(1472,74,'Pandami'),(1473,74,'Panglima Estino (New Panamao)'),(1474,74,'Pangutaran'),(1475,74,'Parang'),(1476,74,'Pata'),(1477,74,'Patikul'),(1478,74,'Siasi'),(1479,74,'Talipao'),(1480,74,'Tapul'),(1481,75,'Alegria'),(1482,75,'Bacuag'),(1483,75,'Burgos'),(1484,75,'Claver'),(1485,75,'Dapa'),(1486,75,'Del Carmen'),(1487,75,'General Luna'),(1488,75,'Gigaquit'),(1489,75,'Mainit'),(1490,75,'Malimono'),(1491,75,'Pilar'),(1492,75,'Placer'),(1493,75,'San Benito'),(1494,75,'San Francisco (Anao-Aon)'),(1495,75,'San Isidro'),(1496,75,'Santa Monica (Sapao)'),(1497,75,'Sison'),(1498,75,'Socorro'),(1499,75,'Surigao City'),(1500,75,'Tagana-an'),(1501,75,'Tubod'),(1502,76,'Barobo'),(1503,76,'Bayabas'),(1504,76,'Bislig'),(1505,76,'Cagwait'),(1506,76,'Cantilan'),(1507,76,'Carmen'),(1508,76,'Carrascal'),(1509,76,'Cortes'),(1510,76,'Hinatuan'),(1511,76,'Lanuza'),(1512,76,'Lianga'),(1513,76,'Lingig'),(1514,76,'Madrid'),(1515,76,'Marihatag'),(1516,76,'San Agustin'),(1517,76,'San Miguel'),(1518,76,'Tagbina'),(1519,76,'Tago'),(1520,76,'Tandag'),(1521,77,'Anao'),(1522,77,'Bamban'),(1523,77,'Camiling'),(1524,77,'Capas'),(1525,77,'Concepcion'),(1526,77,'Gerona'),(1527,77,'La Paz'),(1528,77,'Mayantoc'),(1529,77,'Moncada'),(1530,77,'Paniqui'),(1531,77,'Pura'),(1532,77,'Ramos'),(1533,77,'San Clemente'),(1534,77,'San Jose'),(1535,77,'San Manuel'),(1536,77,'Santa Ignacia'),(1537,77,'Tarlac City'),(1538,77,'Victoria'),(1539,78,'Bongao'),(1540,78,'Languyan'),(1541,78,'Mapun (Cagayan de Tawi-Tawi)'),(1542,78,'Panglima Sugala (Balimbing)'),(1543,78,'Sapa-Sapa'),(1544,78,'Sibutu'),(1545,78,'Simunul'),(1546,78,'Sitangkai'),(1547,78,'South Ubian'),(1548,78,'Tandubas'),(1549,78,'Turtle Islands (Taganak)'),(1550,79,'Botolan'),(1551,79,'Cabangan'),(1552,79,'Candelaria'),(1553,79,'Castillejos'),(1554,79,'Iba'),(1555,79,'Masinloc'),(1556,79,'Olongapo'),(1557,79,'Palauig'),(1558,79,'San Antonio'),(1559,79,'San Felipe'),(1560,79,'San Marcelino'),(1561,79,'San Narciso'),(1562,79,'Santa Cruz'),(1563,79,'Subic'),(1564,80,'Baliguian'),(1565,80,'Dapitan'),(1566,80,'Dipolog'),(1567,80,'Godod'),(1568,80,'Gutalac'),(1569,80,'Jose Dalman (Ponot)'),(1570,80,'Kalawit'),(1571,80,'Katipunan'),(1572,80,'La Libertad'),(1573,80,'Labason'),(1574,80,'Leon B. Postigo (Bacungan)'),(1575,80,'Liloy'),(1576,80,'Manukan'),(1577,80,'Mutia'),(1578,80,'Piñan (New Piñan)'),(1579,80,'Polanco'),(1580,80,'President Manuel A. Roxas'),(1581,80,'Rizal'),(1582,80,'Salug'),(1583,80,'Sergio Osmeña Sr.'),(1584,80,'Siayan'),(1585,80,'Sibuco'),(1586,80,'Sibutad'),(1587,80,'Sindangan'),(1588,80,'Siocon'),(1589,80,'Sirawai'),(1590,80,'Tampilisan'),(1591,81,'Aurora'),(1592,81,'Bayog'),(1593,81,'Dimataling'),(1594,81,'Dinas'),(1595,81,'Dumalinao'),(1596,81,'Dumingag'),(1597,81,'Guipos'),(1598,81,'Josefina'),(1599,81,'Kumalarang'),(1600,81,'Labangan'),(1601,81,'Lakewood'),(1602,81,'Lapuyan'),(1603,81,'Mahayag'),(1604,81,'Margosatubig'),(1605,81,'Midsalip'),(1606,81,'Molave'),(1607,81,'Pagadian'),(1608,81,'Pitogo'),(1609,81,'Ramon Magsaysay (Liargo)'),(1610,81,'San Miguel'),(1611,81,'San Pablo'),(1612,81,'Sominot (Don Mariano Marcos)'),(1613,81,'Tabina'),(1614,81,'Tambulig'),(1615,81,'Tigbao'),(1616,81,'Tukuran'),(1617,81,'Vincenzo A. Sagun'),(1618,81,'Zamboanga City'),(1619,82,'Alicia'),(1620,82,'Buug'),(1621,82,'Diplahan'),(1622,82,'Imelda'),(1623,82,'Ipil'),(1624,82,'Kabasalan'),(1625,82,'Mabuhay'),(1626,82,'Malangas'),(1627,82,'Naga'),(1628,82,'Olutanga'),(1629,82,'Payao'),(1630,82,'Roseller Lim'),(1631,82,'Siay'),(1632,82,'Talusan'),(1633,82,'Titay'),(1634,82,'Tungawan');

/*Table structure for table `courier` */

DROP TABLE IF EXISTS `courier`;

CREATE TABLE `courier` (
  `id` double DEFAULT NULL,
  `courier` varchar(1500) DEFAULT NULL,
  `status` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `courier` */

insert  into `courier`(`id`,`courier`,`status`) values (1,'2GO Express, Inc.',1),(2,'3PL Service Provider Phils., Inc.',1),(3,'A-Best Express, Inc.',1),(4,'Ace Logistics, Inc.',1),(5,'ACE-REM Messengerial and General Services, Inc.',1),(6,'Air21',1),(7,'Airspeed International Corporation',1),(8,'AM Services Company, Inc.',1),(9,'ARA Courier Incorporated',1),(10,'Archway Multi-Services Corporation',1),(11,'Arnold Mabanglo Express',1),(12,'ASAP Courier and Logistics Phils., Inc.',1),(13,'Bedacon Express Corporation',1),(14,'Black Arrow Express',1),(15,'BLV Courier Services',1),(16,'BTI Courier Express Incorporated',1),(17,'CACS Express and Allied Services, Inc.',1),(18,'Cavatas-MSI Xpress Service, Inc.',1),(19,'CBL Freight Forwarder & Courier',1),(20,'Chargen Messengerial & General Services',1),(21,'COMET Labor Service Cooperative',1),(22,'Continental Messengerial and Janitorial Services Inc',1),(23,'DAG Xpress Courier, Inc.',1),(24,'DCS3 Xpress, Inc.',1),(25,'Del Asia Express Delivery & General Services, Inc.',1),(26,'Diar\'s Assistance, Incorporated',1),(27,'Doxexpress Services, Inc.',1),(28,'El Grande Messengerial Services, Inc.',1),(29,'Electrobill, Inc.',1),(30,'Elogistics, Inc.',1),(31,'Enrico M. Reyes (EMR) General Services Specialists',1),(32,'EXMER, Inc.',1),(33,'Fastcargo Logistics Corporation',1),(34,'Fastrak Services, Inc.',1),(35,'Fastrust Services, Inc.',1),(36,'Felcor Express & General Services',1),(37,'Fine Express Services, Inc.',1),(38,'Flying High Energy Express Services Corporation',1),(39,'Globewiser Logistics Corporation',1),(40,'GML Cargo Forwarder & Courier Express Int\'l., Inc.',1),(41,'GO21, Inc.',1),(42,'Grab Express',1),(43,'Herald Express, Inc.',1),(44,'Honest Service Providers, Inc.',1),(45,'Information Express Service (Informex), Inc.',1),(46,'Intertraffic Transport Corp.',1),(47,'Intervolve Express Services, Inc.',1),(48,'Jay Messengerial and Manpower Services',1),(49,'JG Manpo Janitorial & Messengerial Services Contractor',1),(50,'Johnny Air Cargo and Delivery Services, Inc.',1),(51,'JRS Business Corporation',1),(52,'Lalamove',1),(53,'LBC Express, Inc.',1),(54,'LIBCAP Marketing Corporation (Libcap Super Express Corporation)',1),(55,'M.M. Bacarisas Courier Services',1),(56,'Mail Expert Messengerial & Gen. Services, Inc.',1),(57,'Mailouwyz Courier',1),(58,'Mailworld Express Service International, Inc.',1),(59,'Megamail Express & General Services, Inc.',1),(60,'MEJABS Services Inc',1),(61,'MESCO Express Service Corporation',1),(62,'Metro Courier, Inc.',1),(63,'Metro Prideco Services Corporation',1),(64,'MMSC Services Corporation',1),(65,'MR Messengerial & General Services, Inc.',1),(66,'MTEL Trading & Manpower Services',1),(67,'Nathaniel G. Cruz Express Service',1),(68,'Ninja Van Express',1),(69,'Ocean Coast Shipping Corp.',1),(70,'Pacserve Business Support Services, Inc.',1),(71,'Pathfinder Courier Services Corporation',1),(72,'Pelican Express Incorporated',1),(73,'PPB Messengerial Services, Inc.',1),(74,'PRC Courier and Maintenance Services',1),(75,'Priority Handling Logistics, Inc.',1),(76,'PRO-2000 Services, Inc.',1),(77,'Promark Corporation',1),(78,'Pronto Express Distribution, Inc.',1),(79,'Qualitrans Courier and Manpower Services, Inc.',1),(80,'Quantium Solutions (Philippines), Inc.',1),(81,'Quickreliable Courier Services, Inc.',1),(82,'R & H Messengerial & General Services',1),(83,'RAF International Forwarding Phils., Inc.',1),(84,'Republic Courier Service, Inc.',1),(85,'RGServe Manpower Services',1),(86,'RML Courier Express Int\'l. Corp.',1),(87,'Ruru Courier Systems, Inc.',1),(88,'Safefreight Services, Inc.',1),(89,'San Gabriel General Messengerial Services and Sales, Inc.',1),(90,'Securetrac, Inc.',1),(91,'Securities & Messages Express',1),(92,'Silver Royal General Services',1),(93,'Speedels Services, Inc.',1),(94,'Speedex International (Speedex Courier and Forwarder, Inc.)',1),(95,'Speed-up Multi Services (SMS), Inc.',1),(96,'Speedworks Courier Services Corporation',1),(97,'Spex International Courier Services',1),(98,'Starexpress Logistics, Corp.',1),(99,'Suremail Courier Services, Inc.',1),(100,'Telexpress, Inc.',1),(101,'The Bill Sender Corp.',1),(102,'TNT Express Deliveries (Phils.), Inc.',1),(103,'Topserve Service Solutions, Inc.',1),(104,'Topserve Worldwide Express, Inc.',1),(105,'Triload Express Systems',1),(106,'Varied Services, Inc.',1),(107,'Vidaguez Courier Services, Co.',1),(108,'Wide Wide World Express Corporation',1),(109,'Worklink Services, Inc.',1),(110,'Xend Business Solutions',1),(111,'Xytron International, Inc.',1),(112,'Yukon General Manpower Services, Corp.',1),(113,'Z.C. St. Joseph Delivery Services',1);

/*Table structure for table `delivery_type` */

DROP TABLE IF EXISTS `delivery_type`;

CREATE TABLE `delivery_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_type` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `delivery_type` */

insert  into `delivery_type`(`id`,`delivery_type`,`status`) values (1,'For Appointment',0),(2,'For Pick Up',0),(3,'For Delivery',1);

/*Table structure for table `outletko_account` */

DROP TABLE IF EXISTS `outletko_account`;

CREATE TABLE `outletko_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_status` int(2) NOT NULL DEFAULT '1',
  `business_category` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `city` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `telephone_no` int(11) NOT NULL,
  `facebook` varchar(25) DEFAULT NULL,
  `twitter` varchar(25) DEFAULT NULL,
  `instagram` varchar(25) DEFAULT NULL,
  `shoppee` varchar(25) DEFAULT NULL,
  `confirm_email` int(11) NOT NULL DEFAULT '0',
  `date_insert` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_inactive` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `outletko_account` */

insert  into `outletko_account`(`id`,`account_id`,`account_name`,`account_status`,`business_category`,`user_id`,`first_name`,`middle_name`,`last_name`,`address`,`city`,`province`,`email`,`mobile_no`,`telephone_no`,`facebook`,`twitter`,`instagram`,`shoppee`,`confirm_email`,`date_insert`,`date_update`,`date_inactive`) values (1,1940001,'BranDead Shoes',1,3,0,'Jandelle','T','Comilang','pateros mm2',1034,52,'outletko@gmail.com',2147483647,6272316,'ellednaj112','ellednaj11','ellednaj11','ellednaj11',1,'2019-07-16 00:00:00',NULL,NULL),(26,1940006,'asfasf',0,1,0,'adlfka','','aldkfalk','asfas',0,0,'dooleycheasel1@gmail.com',2147483647,0,NULL,NULL,NULL,NULL,0,'2019-08-12 23:10:22',NULL,NULL),(25,1940005,'asfkafladf',0,1,0,'asfjaks','','kasjfkaj','aslfkas',0,0,'dooleycsadheasel@gmail.com',2147483647,0,NULL,NULL,NULL,NULL,1,'2019-08-12 23:07:23',NULL,NULL),(23,1940003,'bussiness',0,10,0,'cheasel','kim','caparal','askfjaskf',0,0,'adsfasd',2147483647,0,NULL,NULL,NULL,NULL,1,'2019-08-11 22:29:14',NULL,NULL),(24,1940004,'beauty',0,1,0,'cheasel kim','','caparal','adlfkafkl',0,0,'ck.caparal263@gmail.com',2147483647,0,NULL,NULL,NULL,NULL,0,'2019-08-12 23:03:01',NULL,NULL),(22,1940002,'aasd store',0,3,22,'jandelle','t','comilang','[aterps m,',2,0,'ellednaj11@gmail.com',123123,0,NULL,NULL,NULL,NULL,1,'2019-07-30 11:43:29',NULL,NULL),(27,1940007,'asfafdasf',0,1,0,'asfkas','','aklfalsk','asfaksfa',0,0,'dooleycheasel@gmail.com',2147483647,0,NULL,NULL,NULL,NULL,0,'2019-08-12 23:23:05',NULL,NULL),(28,1940008,'asfadsf',0,1,0,'asfka','','adslfakl','asfkalskf',0,0,'ck.capasadfasfral26@gmail.com',2147483647,0,NULL,NULL,NULL,NULL,0,'2019-08-12 23:24:43',NULL,NULL),(29,1940009,'asfkkaskf',0,1,0,'asklfaslkf','','ladsslfkaslf','aslfkasflk',0,0,'ck.caparal26@gmail.com',2147483647,0,NULL,NULL,NULL,NULL,0,'2019-08-12 23:28:01',NULL,NULL),(30,1940010,'Eric Hardware',0,8,0,'Enrique','','Purugganan','Captain Henry P. Javier Street, Barangay Oranbo',0,0,'eapurugganan@gmail.com',2147483647,0,NULL,NULL,NULL,NULL,1,'2019-08-19 13:28:29',NULL,NULL),(31,1940011,'Brandead Shoes',0,3,0,'Comilang','','jandelle','Captain Henry P. Javier Street, Barangay Oranb',0,0,'jcomilang@gmail.com',2147483647,0,NULL,NULL,NULL,NULL,0,'2019-08-19 15:25:54',NULL,NULL);

/*Table structure for table `payment_type` */

DROP TABLE IF EXISTS `payment_type`;

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `payment_type` */

insert  into `payment_type`(`id`,`payment_type`,`status`) values (1,'Cash on Delivery',1),(2,'Advance Payment',0),(3,'Card Payment',0),(4,'Online Payment',0),(5,'Bank Deposit',1),(6,'Remittance',1);

/*Table structure for table `product_category` */

DROP TABLE IF EXISTS `product_category`;

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Data for the table `product_category` */

insert  into `product_category`(`id`,`account_id`,`comp_id`,`product_category`,`date_insert`,`date_update`) values (23,1940001,0,'airmax 90','2019-08-06 08:19:42',NULL),(22,1940001,0,'airmax 270','2019-08-06 08:19:42',NULL),(21,1940001,0,'air jordan','2019-08-06 08:19:42',NULL),(24,1940003,0,'1','2019-08-11 10:32:21',NULL),(25,1940003,0,'2','2019-08-11 10:32:21',NULL),(26,0,31,'Username','2019-11-09 09:39:44',NULL),(30,0,33,'Hair Cut','2019-11-09 14:32:31',NULL),(31,0,33,'Hair Color','2019-11-09 14:32:44',NULL),(32,0,33,'Wax','2019-11-09 14:35:45',NULL),(33,0,33,'Manicure','2019-11-09 14:57:45',NULL),(34,0,31,'Password','2019-11-10 00:34:28',NULL),(36,0,31,'Username2','2019-11-10 00:37:19',NULL),(37,0,31,'Password2','2019-11-10 00:39:36',NULL),(38,0,31,'Username3','2019-11-10 00:44:35',NULL),(39,0,31,'Password3','2019-11-10 00:45:54',NULL),(40,0,33,'Nail','2019-11-11 06:55:10',NULL),(41,0,33,'Straightening & Perming','2019-11-11 17:51:44',NULL),(42,0,33,'Treatment','2019-11-11 18:05:43',NULL),(43,0,33,'Health Products','2019-11-12 12:48:18',NULL),(44,0,52,'seedlings','2019-12-11 12:48:18',NULL),(47,0,59,'Women Sandals','2020-01-03 10:22:11',NULL),(48,0,59,'Women Sneakers','2020-01-03 10:22:31',NULL),(49,0,53,'Printing Services','2020-01-03 18:41:03',NULL),(50,0,60,'Cut Outs','2020-01-06 14:05:57',NULL),(51,0,61,'Beauty Products','2020-01-10 14:07:30',NULL),(52,0,61,'Beauty Services','2020-01-10 14:08:01',NULL);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `product_status` int(5) NOT NULL DEFAULT '1',
  `product_name` varchar(25) NOT NULL,
  `product_description` varchar(200) DEFAULT NULL,
  `product_other_details` text NOT NULL,
  `product_online` int(11) DEFAULT NULL,
  `product_unit_price` double(20,2) DEFAULT NULL,
  `product_category` int(11) DEFAULT NULL,
  `product_condition` int(11) DEFAULT NULL,
  `product_stock` double(20,2) DEFAULT NULL,
  `product_weight` double(20,2) DEFAULT NULL,
  `product_delivery` int(11) DEFAULT NULL,
  `product_del_opt` varchar(100) DEFAULT NULL,
  `product_return` varchar(100) DEFAULT NULL,
  `product_warranty` varchar(100) DEFAULT NULL,
  `ship_fee_w_mm` double(20,2) DEFAULT NULL,
  `ship_fee_o_mm` double(20,2) DEFAULT NULL,
  `img_location` varchar(50) DEFAULT NULL,
  `date_insert` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`id`,`account_id`,`product_status`,`product_name`,`product_description`,`product_other_details`,`product_online`,`product_unit_price`,`product_category`,`product_condition`,`product_stock`,`product_weight`,`product_delivery`,`product_del_opt`,`product_return`,`product_warranty`,`ship_fee_w_mm`,`ship_fee_o_mm`,`img_location`,`date_insert`,`date_update`) values (15,28,1,'nike airmax 270','Sole Collector','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',NULL,NULL,'a:1:{i:0;s:16:\"file_718892.jfif\";}','2019-08-07 01:10:22','2019-08-28 05:16:51'),(14,28,1,'nike airmax 270','University Gold','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',NULL,NULL,'a:1:{i:0;s:16:\"file_192046.jfif\";}','2019-08-07 01:09:50',NULL),(12,28,1,'nike airmax 270','triple black','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',NULL,NULL,'a:1:{i:0;s:16:\"file_577845.jfif\";}','2019-08-07 11:39:24','2019-08-07 11:48:41'),(13,29,1,'nike airmax 270','Flynit blue','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',NULL,NULL,'a:1:{i:0;s:15:\"file_72231.jfif\";}','2019-08-07 11:46:17','2019-08-07 01:09:28'),(16,29,1,'nike airmax 270','White pink','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',NULL,NULL,'a:1:{i:0;s:16:\"file_917313.jfif\";}','2019-08-07 01:10:49',NULL),(17,29,1,'Image #1','Image #1','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',NULL,NULL,'a:1:{i:0;s:15:\"file_927421.png\";}','2019-08-11 10:32:07','2019-08-14 09:53:04'),(18,30,1,'Image #2','Image #2','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',NULL,NULL,'a:1:{i:0;s:15:\"file_766168.png\";}','2019-08-14 09:37:26','2019-08-14 09:53:18'),(19,30,1,'Image #3','Image #3','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',NULL,NULL,'a:1:{i:0;s:14:\"file_16644.png\";}','2019-08-14 09:37:57','2019-08-14 09:53:35'),(20,30,1,'Image #4','Image #4','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',NULL,NULL,'a:1:{i:0;s:15:\"file_867421.png\";}','2019-08-14 09:39:04','2019-08-14 09:53:51'),(21,30,1,'PHONE','Image #5','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',NULL,NULL,'a:1:{i:0;s:15:\"file_146003.png\";}','2019-08-14 10:01:43',NULL),(23,31,1,'PHONE','PHONE','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',1,18000.00,26,1,500.00,1.00,3,'1 to 3 Days Delivery','7 Days Warranty','30 Days Warranty',100.00,150.00,'a:1:{i:0;s:15:\"file_409366.png\";}','2019-10-14 05:34:56','2020-01-04 10:00:55'),(24,31,0,'ID','ID','',0,100.00,0,1,25.00,0.50,2,'','','',NULL,NULL,'a:1:{i:0;s:14:\"file_13499.png\";}','2019-10-14 05:36:28',NULL),(25,31,1,'VENDOR','VENDOR','',1,2655.00,0,1,0.00,0.00,3,'','','',NULL,NULL,'a:1:{i:0;s:15:\"file_652471.png\";}','2019-10-14 05:54:18',NULL),(28,33,1,'Hair Cut - Premium','Hair Cut with Blower','',0,80.00,0,1,0.00,0.00,0,'n/a','n/a','n/a',0.00,0.00,'a:1:{i:0;s:18:\"file_33_421105.png\";}','2019-11-09 02:28:33','2020-01-09 09:58:55'),(29,33,1,'Hair Color','Hair Color','',0,500.00,31,1,0.00,0.00,0,'n/a','n/a','n/a',0.00,0.00,'a:1:{i:0;s:18:\"file_33_557133.png\";}','2019-11-09 02:33:28','2020-01-09 10:02:23'),(30,33,0,'Full Leg Waxing','Full Leg Waxing','',0,500.00,32,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_361318.png\";}','2019-11-09 02:36:40',NULL),(31,33,1,'Pedicure','Pedicure','',0,80.00,33,1,0.00,0.00,0,'n/a','n/a','n/a',0.00,0.00,'a:1:{i:0;s:18:\"file_33_369322.png\";}','2019-11-09 02:58:27','2020-01-09 10:39:03'),(32,33,1,'Manicure','Manicure','',0,80.00,40,1,0.00,0.00,0,'n/a','n/a','n/a',0.00,0.00,'a:1:{i:0;s:14:\"file_78406.png\";}','2019-11-09 03:04:29','2020-01-09 11:09:54'),(33,33,1,'Hair & Makeup','Hair and Makeup','',0,500.00,30,1,0.00,0.00,0,'n/a','n/a','n/a',0.00,0.00,'a:1:{i:0;s:18:\"file_33_222842.png\";}','2019-11-11 07:07:39','2020-01-09 11:15:49'),(34,33,1,'Hair Rebond','Hair Color','',0,1500.00,42,1,0.00,0.00,0,'n/a','n/a','n/a',0.00,0.00,'a:1:{i:0;s:18:\"file_33_284378.png\";}','2019-11-11 05:44:08','2020-01-09 11:21:49'),(35,33,1,'Foot Spa','Brazilian Treatment','',0,400.00,41,1,0.00,0.00,0,'n/a','n/a','n/a',0.00,0.00,'a:1:{i:0;s:18:\"file_33_346307.png\";}','2019-11-11 05:53:27','2020-01-09 11:51:57'),(36,33,0,'Hair Relax - Premium','Hair Relax','',1,3500.00,41,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_758948.png\";}','2019-11-11 05:53:31',NULL),(37,33,0,'Black Ice Surf Wax','Natural Finish Styling Wax','',1,480.00,43,1,100.00,0.00,3,'','','',0.00,0.00,'a:1:{i:0;s:18:\"file_33_959551.png\";}','2019-11-12 12:50:13','2019-11-12 12:54:21'),(40,33,1,'Eyelash Extension','Eyelash Extension','',0,500.00,42,1,0.00,0.00,3,'n/a','n/a','n/a',0.00,0.00,'a:1:{i:0;s:18:\"file_33_393285.png\";}','2019-11-12 12:59:30','2020-01-09 11:54:03'),(38,33,1,'Air Perm','Air Perm','',0,2000.00,42,1,100.00,0.00,1,'n/a','n/a','n/a',0.00,0.00,'a:1:{i:0;s:18:\"file_33_126926.png\";}','2019-11-12 12:53:44','2020-01-09 11:34:41'),(39,33,1,'Hot Oil','Hot Oil','',0,300.00,42,1,0.00,0.00,3,'n/a','n/a','n/a',0.00,0.00,'a:1:{i:0;s:18:\"file_33_900687.png\";}','2019-11-12 12:55:45','2020-01-09 11:47:47'),(41,33,1,'Hair Spa','Hair Spa','',0,400.00,42,1,0.00,0.00,3,'n/a','n/a','n/a',0.00,0.00,'a:1:{i:0;s:18:\"file_33_593477.png\";}','2019-11-12 01:01:06','2020-01-09 12:21:14'),(42,31,1,'wenst','we;laf','',1,3600.00,26,1,0.00,0.00,1,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_725041.png\";}','2019-11-14 10:55:45',NULL),(43,52,1,'Mulberry seedlings','Mulberry seedings','',1,75.00,44,1,0.00,0.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_678377.png\";}','2019-12-11 06:40:31',NULL),(44,52,1,'Dwarf Papaya seedlings','Dwarf F1 Hybrid Lady Papaya ','',1,80.00,44,1,0.00,0.00,2,'Pickup Only','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_713252.png\";}','2019-12-11 06:41:24','2019-12-13 02:20:10'),(45,52,1,'Lakatan Banana Cultured','Lakatan Banana Tissue Cultured','',1,50.00,44,1,0.00,0.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_622059.png\";}','2019-12-11 06:42:50',NULL),(46,52,1,'Strawberry seedlings','Strawberry seedling for sale 10 plus 1 20 plus 3 30 plus 5 40 plus 7 50 plus 10 100 plus 25','',1,100.00,44,1,0.00,0.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_998503.png\";}','2019-12-11 06:46:19',NULL),(47,52,1,'Citronella seedlings','Citronella seedlings','',1,100.00,44,1,0.00,0.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_762520.png\";}','2019-12-11 07:00:04',NULL),(48,52,1,'Paminta seedlinsg','Paminta seedlings','',1,30.00,44,1,0.00,0.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_105615.png\";}','2019-12-11 07:00:43',NULL),(49,52,1,'Calabash seedlings','Calabash seedlings','',1,30.00,44,1,0.00,0.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_316477.png\";}','2019-12-11 07:01:21',NULL),(50,52,1,'Mangosteen seedlings','Mangosteen seedlings','',1,50.00,44,1,0.00,0.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_287292.png\";}','2019-12-11 07:02:02',NULL),(51,52,1,'Herbal Plant','Herbal Plant','',1,25.00,44,1,0.00,0.00,2,'pickup only','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_709663.png\";}','2019-12-12 07:54:08',NULL),(52,52,1,'Grafted Dwarf Guava','Grafted Dwarf Guava','',1,150.00,44,1,0.00,0.00,2,'pickup only','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:14:\"file_94610.png\";}','2019-12-12 07:55:15',NULL),(53,52,1,'Lucaria Pine Tree','Lucaria Pine Tree','',1,500.00,44,1,0.00,0.00,2,'pickup only','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_820803.png\";}','2019-12-12 07:56:00',NULL),(54,52,1,'Davao Pomelo','Davao Pomelo','',1,150.00,44,1,0.00,0.00,2,'pickup only','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_197154.png\";}','2019-12-12 07:56:58',NULL),(55,52,1,'Dwarf Coconut Trees','Dwarf Coconut Trees','',1,400.00,44,1,0.00,0.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_386998.png\";}','2019-12-18 07:43:15',NULL),(56,52,1,'Adenium','Adenium - Imported from Thailand','',1,100.00,44,1,0.00,0.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_829245.png\";}','2019-12-18 07:46:26',NULL),(57,52,1,'Bonsai Citrus Orange','Bonsai Citrus Orange (SEEDS Only)','',1,130.00,44,1,0.00,0.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_770488.png\";}','2019-12-18 07:49:20',NULL),(58,52,1,'Jaboticaba Tree / Brazili','Jaboticaba Tree / Brazilian Grape Tree','',1,800.00,44,1,0.00,0.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_365490.png\";}','2019-12-18 07:54:17',NULL),(59,52,1,'Carissa Carandas Seedling','Carissa Carandas Seedlings','',1,70.00,44,1,0.00,0.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_274283.png\";}','2019-12-18 07:57:43',NULL),(60,52,1,'Dendro and Vanda Orchids','Debdro and Vanda Orchids','',1,180.00,44,1,0.00,0.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_483102.png\";}','2019-12-18 08:01:16','2019-12-18 08:03:15'),(61,52,1,'Laurel / Bay Leaf Seedlin','Laurel /Bay Leaf seedlings','',1,180.00,44,1,0.00,600.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_407509.png\";}','2019-12-18 08:06:27',NULL),(62,52,1,'Korean Bonsai','Korean Bonsai','',1,500.00,44,1,0.00,1.00,2,'Pickup','No Returns','No Warranty',0.00,0.00,'a:1:{i:0;s:18:\"file_52_516923.png\";}','2019-12-18 08:08:54','2019-12-18 08:10:03'),(63,59,1,'Charles David','Charles David - Women\'s Drea Strappy Patent Leather Illusion Slide Sandals 2869653 YERFZXF\n','',1,650.00,47,1,0.00,0.00,2,'1 to 3 days Delivery','7 days - replacement','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_818522.png\";}','2020-01-03 10:33:01','2020-01-03 11:06:04'),(64,0,1,'otueltko','details','',1,650.00,47,1,0.00,0.00,3,'1 to 3 days Delivery','7 days - replacement','No Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_461613.png\";}','2020-01-03 11:09:22',NULL),(65,59,1,'Kenneth Cole','Kenneth Cole - Women\'s Viola Leather Low Heel Slide Sandals 3000133 XYIXEXI\n','',1,650.00,47,1,0.00,0.00,3,'1 to 3 days delivery','7 days - replacement','N/A',100.00,150.00,'a:1:{i:0;s:15:\"file_179700.png\";}','2020-01-03 11:21:59',NULL),(66,59,1,'Tabitha Simmons','Tabitha Simmons - Women\'s Sprinkles Stripe Slide Sandals 2814158 VYJJEFK\n','',1,650.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_402171.png\";}','2020-01-03 11:26:56',NULL),(67,59,1,'Jaggar','JAGGAR - Women\'s Wedged Leather Wedge Slide Sandals 3006948 BRHNELU\n','',1,850.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_792705.png\";}','2020-01-03 11:27:46',NULL),(68,59,1,'Prada Leather Thong','Prada Leather Thong Sandals NERO Women Flats Sandals 505487508 CMDFAZQ\n','',1,700.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_591129.png\";}','2020-01-03 11:53:33',NULL),(69,59,1,'Mari Giudicelli ','Mari Giudicelli Asami Ruched Satin Slide Sandals RED Women Flats Sandals 505482966 ASTJQDA\n','',1,750.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_198629.png\";}','2020-01-03 11:55:01',NULL),(70,59,1,'Tabitha Simmons Sarlo Spe','Tabitha Simmons Sarlo Specchio Leather Sandals SILVER Women Flats Sandals 505621106 BLOTXUH\n','',1,700.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_962067.png\";}','2020-01-03 11:56:12',NULL),(71,59,1,'Barneys New York Suede Do','Barneys New York Suede Double-Band Slides RED Women Flats Sandals 504719397 SQEVYZL\n','',1,700.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_227458.png\";}','2020-01-03 11:57:16',NULL),(72,59,1,'The Row Ellen Satin Slide','The Row Ellen Satin Slide Sandals RED Women Flats Sandals 505595918 TYZULZZ\n','',1,650.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_431477.png\";}','2020-01-03 12:00:52',NULL),(73,59,1,'Rag & Bone Brie Linen ','Rag & Bone Brie Linen Sandals NATURAL CN Women Flats Sandals 505189603 VZUQDBB\n','',1,850.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:14:\"file_97976.png\";}','2020-01-03 12:35:52',NULL),(74,59,1,'Alaïa Petal-Embellished S','Alaïa Petal-Embellished Suede Slide Sandals BLACK Women Flats Sandals 505545437 HCCPBLM\n','',1,750.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_635059.png\";}','2020-01-03 12:37:49',NULL),(75,59,1,'Barneys New York Suede Do','Barneys New York Suede Double-Band Slides TAN SUEDE Women Flats Sandals 503882165 AWRQRIF\n','',1,700.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_432016.png\";}','2020-01-03 12:38:40',NULL),(76,59,1,'Clarks Shoes Outlet Roman','Clarks Shoes Outlet Romantic Moon Black Leather Women Discount Sandals HSSFBHV\n','',1,750.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_664280.png\";}','2020-01-03 12:46:01',NULL),(77,59,1,'Clarks Shoes Outlet Hayla','Clarks Shoes Outlet Hayla Hum Black Leather Women Discount Sandals BJHWRIA\n','',1,700.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_373389.png\";}','2020-01-03 12:47:29',NULL),(78,59,1,'Clarks Shoes Outlet Tappi','Clarks Shoes Outlet Tappit Lily Silver Women Discount Sandals ODGWHHU\n','',1,700.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_921191.png\";}','2020-01-03 12:48:22',NULL),(79,59,1,'Clarks Shoes Outlet Urast','Clarks Shoes Outlet Uraster Honey Black Leather Women Discount Sandals WNFWXQY\n','',1,700.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_312051.png\";}','2020-01-03 12:56:36',NULL),(80,59,1,'K JACQUES Tonkin ','K JACQUES Tonkin Leather Slide Sandals CAMEL Women Flats Sandals 505568037 UYRFETE\n','',1,650.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_704962.png\";}','2020-01-03 12:59:30',NULL),(81,59,1,'KYMA Antiparos Leather ','KYMA Antiparos Leather Slide Sandals PINK Women Flats Sandals 505636661 YIFBICV\n','',1,650.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_826033.png\";}','2020-01-03 01:18:05',NULL),(82,59,1,'LOEWE Logo Leather ','LOEWE Logo Leather Slide Sandals WHITE/TAN Women Flats Sandals 505535989 UXCQDWT\n','',1,650.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_475727.png\";}','2020-01-03 01:19:37',NULL),(83,59,1,'Fabrizio Viti City Bow ','Fabrizio Viti City Bow Suede Slide Sandals PINK Women Flats Sandals 505533652 JCLCVDN\n','',1,700.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_239270.png\";}','2020-01-03 01:20:21',NULL),(84,59,1,'Archive - Women\'s Bond ','Archive - Women\'s Bond Leather Pointed Toe Slide Mules 2691536 FEVWREN\n','',1,850.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_358345.png\";}','2020-01-03 01:33:41',NULL),(85,59,1,'Cole Haan – Women’s Tali ','Cole Haan – Women’s Tali Flex Snake\nEmbossed Ballet Flats 1252623 IFCJSDH \n','',1,800.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_365599.png\";}','2020-01-03 01:34:39',NULL),(86,59,1,'Tory Burch – Women’s Max ','Tory Burch – Women’s Max Floral \nEmbroidered Espadrille Mules 2833340 TLFLJMU\n','',1,850.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_694930.png\";}','2020-01-03 01:35:18',NULL),(87,59,1,'Jojie – Women’s Jadine Ve','Jojie – Women’s Jadine Velvet Mules 2733357 ZCGXUEY\n','',1,850.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_538706.png\";}','2020-01-03 01:35:55',NULL),(88,59,1,'Splendid - Women\'s Barton','Splendid - Women\'s Barton Knotted Suede Slide Sandals 2788758 KVIKFYT\n','',1,750.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_854400.png\";}','2020-01-03 01:39:09',NULL),(89,59,1,'SENSO - Women\'s Zulu ','SENSO - Women\'s Zulu Suede Slide Sandals 2584353 DQLRRFA\n','',1,650.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_854962.png\";}','2020-01-03 01:40:04',NULL),(90,59,1,'Charles David - Women\'s S','Charles David - Women\'s Suede Harley Block Heel Slide Sandals 2905390 FXIPLIG\n','',1,850.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_729794.png\";}','2020-01-03 01:40:47',NULL),(91,59,1,'Taryn Rose - Women\'s Dahn','Taryn Rose - Women\'s Dahna Leather Slide Sandals 2846956 BJHTGLM\n','',1,850.00,47,1,0.00,0.00,0,'1 to 3 days delivery','7 days - replacement','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_249191.png\";}','2020-01-03 01:41:20',NULL),(92,53,1,'Sublimation Jersey','Sublimation Printing','',0,890.00,49,1,0.00,0.00,0,'1 to 3 Days','7 days return','NA',0.00,0.00,'a:1:{i:0;s:17:\"file_53_35398.png\";}','2020-01-03 06:43:31','2020-01-04 09:24:03'),(93,53,1,'Button Pins','Button Pins - 25mm Badges Pack size No. of uniques designs 50 Badges 1 design 10 Badges 5 designs 500 Badges + 10 designs','',0,120.00,49,1,0.00,0.00,0,'1 day','7 days return','NA',0.00,0.00,'a:1:{i:0;s:18:\"file_53_188748.png\";}','2020-01-03 06:47:31','2020-01-04 10:06:54'),(94,53,1,'Wall Clock','Wall Clock - Sublimation Print','',0,150.00,49,1,0.00,0.00,0,'1 day','7 days return','NA',0.00,0.00,'a:1:{i:0;s:14:\"file_72416.png\";}','2020-01-04 09:52:35',NULL),(95,53,1,'Mugs','Mugs - Sublimation Print','',0,35.00,49,1,0.00,0.00,0,'1 day','7 days return','NA',0.00,0.00,'a:1:{i:0;s:15:\"file_327711.png\";}','2020-01-04 09:55:14',NULL),(96,53,1,'Caps','Caps','',0,120.00,49,1,0.00,0.00,0,'1 day','7 days return','NA',0.00,0.00,'a:1:{i:0;s:15:\"file_223783.png\";}','2020-01-04 10:37:44',NULL),(97,53,1,'Silk Screen Print T-shirt','Customized Silk Screen Print T-shirt','',0,250.00,49,1,0.00,0.00,0,'1 day','7 days return','NA',0.00,0.00,'a:1:{i:0;s:15:\"file_661603.png\";}','2020-01-04 10:44:21',NULL),(98,53,1,'Bags','Bags ','',0,20.00,49,1,0.00,0.00,0,'1 day','7 days return','NA',0.00,0.00,'a:1:{i:0;s:15:\"file_546068.png\";}','2020-01-04 10:51:17',NULL),(99,53,1,'Key Chain','Key Chain','',0,20.00,49,1,0.00,0.00,0,'1 day','7 days return','NA',0.00,0.00,'a:1:{i:0;s:15:\"file_692234.png\";}','2020-01-04 10:58:30',NULL),(100,53,1,'Foldable Fan','Foldable Fan','',1,12.50,49,1,0.00,0.00,0,'1 day','7 days return','NA',0.00,0.00,'a:1:{i:0;s:15:\"file_231677.png\";}','2020-01-04 11:15:25',NULL),(101,60,1,'Miniature Pickle Barrels','7/8” Tall x 5/8” Wide Miniature Pickle Barrels\n','Sold in Packs 10, 25, 100\n',0,20.00,50,1,0.00,0.00,0,' 7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_651059.png\";}','2020-01-06 04:03:47',NULL),(102,60,1,'Butterfly Cut Outs','4 1/2” Butterflies, 1/8 “Thick\n','2 ¾” Tall x 4 ½ “ Wide x approx 1/8” Thick\nMade from birch plywood\nSold in Packs 10, 25\n\nSold in Packs 10, 25, 100\n',0,25.00,50,1,0.00,0.00,0,' 7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_642849.png\";}','2020-01-06 04:10:38',NULL),(103,60,1,'Plywood Heart Cutouts','4 ½” Tall x 4 ½” Wide x 1/8” Thick\n','Ready to paint and decorate.\nSold in Packs 10, 25, 100\n\n',0,25.00,50,1,0.00,0.00,0,' 7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_320727.png\";}','2020-01-06 04:13:51',NULL),(104,60,1,'Miniature Wood  Buckets ','1 1/16” Miniature Wood  Buckets w/ Wire Handle\n','Sold in Packs 10, 25, 100\n\n',0,20.00,50,1,0.00,0.00,0,' 7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_618360.png\";}','2020-01-06 04:19:08',NULL),(105,60,1,'Wood Fish Cutout Shape ','3 ½” long x 1-11/16” wide x approx 1/8” thick\n','Made from birch ply wood.\nSold in Packs 5, 25, 100\n\n\n',0,20.00,50,1,0.00,0.00,0,' 7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_455834.png\";}','2020-01-06 04:22:07',NULL),(106,60,1,'Bean Pot Candle Cups','1 5/8” Tall x 1 3/8” diameter w/ 29/32” Hole\n','Sold in Packs 10, 50, 100\n\n\n',0,35.00,50,1,0.00,0.00,0,' 7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:18:\"file_60_225646.png\";}','2020-01-06 04:25:19','2020-01-06 04:30:55'),(107,60,1,'1” Round Wood Ball','1” Round Wood Ball\n','Sold in Packs 10, 50, 100\n\n\n',0,45.00,50,1,0.00,0.00,0,' 7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_319552.png\";}','2020-01-06 04:30:03',NULL),(108,60,1,'Wood Circle Cut Outs','2 3/8”  Wide 2 3/8” Tall x ¼” Thick\n','',0,45.00,50,1,0.00,0.00,0,'7 days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:18:\"file_60_523183.png\";}','2020-01-06 04:35:13','2020-01-06 04:36:10'),(109,60,1,'Ball Knob / Wood Doll Hea','2 ½” Ball Knob / Wood Doll Heads\n2 ½” Wide , Flat 1 1/16” w/ 3/16” Hole\n','Sold in Pack of 5, 25\n',0,45.00,50,1,0.00,0.00,0,'7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:14:\"file_30047.png\";}','2020-01-06 04:38:47',NULL),(110,60,1,'Ball Finial / Train Bells','3/4” Ball Finial / Train Bells, 1 ¼” Length w/ 1/4” Tenon\nSold in Packs of 5, 25, 100\n','Sold in Pack of 5, 25, 100\n',0,50.00,50,1,0.00,0.00,0,'7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_785929.png\";}','2020-01-06 04:40:02','2020-01-06 04:42:59'),(111,60,1,'Apple w/ Leaf Cut Outs','4 ½” Apples w/ Leaf, 1/8” Thick\n','Sold in Pack of 5, 25, 100\n',0,35.00,50,1,0.00,0.00,0,'7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_954274.png\";}','2020-01-06 04:41:30','2020-01-06 04:43:14'),(112,60,1,'Eggs / Oval Cut Outs','2 ½” Tall x 1 ¾” wide x ¼” Thick\n','Sold in Pack of 5, 25, 100\n',0,25.00,50,1,0.00,0.00,0,'7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_256573.png\";}','2020-01-06 04:42:50',NULL),(113,60,1,'Baby – Little People','Little People – Baby / Game Pawns\n1 1/8” Tall x 5/8” Wide\n','Sold in Pack of 5, 25, 100\n',0,20.00,50,1,0.00,0.00,0,'7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_353732.png\";}','2020-01-06 04:45:32',NULL),(114,60,1,'Little People – Girl w/ S','2” Tall x 7/8” Wide\n','Sold in Pack of 5, 25, 100\n',0,25.00,50,1,0.00,0.00,0,'7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_617066.png\";}','2020-01-06 04:46:35',NULL),(115,60,1,'Little People – Mom','2 1/4” Tall x 3/4” Wide\n','Sold in Pack of 5, 25, 100\n',0,35.00,50,1,0.00,0.00,0,'7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_232676.png\";}','2020-01-06 04:47:53',NULL),(116,60,1,'Little People – Dad','2 3/8” Tall x 7/8” Wide\n','Sold in Pack of 5, 25, 100\n',0,30.00,50,1,0.00,0.00,0,'7 Days','7 Days','N/A',0.00,0.00,'a:1:{i:0;s:15:\"file_768883.png\";}','2020-01-06 04:48:57',NULL),(117,31,1,'ma','dadlfkw','saslfkasl',0,500.00,26,1,0.00,0.00,1,'1 to 3 days Delivery','7 Days Warranty','30 Days Warranty',0.00,0.00,NULL,'2020-01-06 05:04:27',NULL),(118,31,1,'alfk','aslkf','lasfdkdflk',1,500.00,26,1,0.00,0.00,1,'1 to 3 days Delivery','7 Days Warranty','30 Days Warranty',0.00,0.00,'a:1:{i:0;s:15:\"file_787828.jpg\";}','2020-01-06 05:05:09',NULL),(119,33,1,'Brazilian Treatment','Brazilian Treatment','',1,1500.00,42,1,0.00,0.00,0,'n/a','n/a','n/a',0.00,0.00,'a:1:{i:0;s:15:\"file_485619.png\";}','2020-01-09 12:17:50',NULL),(120,33,1,'Hair Cellophane','Hair Cellophane','',0,600.00,42,1,0.00,0.00,0,'n/a','n/a','n/a',0.00,0.00,'a:1:{i:0;s:15:\"file_706606.png\";}','2020-01-09 12:19:19',NULL),(121,61,1,'Hair Cut','Hair Cut with Blower','',0,150.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_356358.png\";}','2020-01-10 02:16:53','2020-01-15 02:49:04'),(122,61,1,'Hair Color','Hair Color','',0,750.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_725819.png\";}','2020-01-10 02:20:01',NULL),(123,61,1,'Hair & Makeup','Hair & Makeup','',0,1250.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_724109.png\";}','2020-01-10 02:24:06','2020-01-11 08:12:05'),(124,61,1,'Hair Spa','Hair Spa','',0,550.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:14:\"file_78405.png\";}','2020-01-10 02:27:42',NULL),(125,61,1,'Hair Rebond','Hair Rebond','',0,1750.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_837624.png\";}','2020-01-11 07:08:31','2020-01-11 08:11:55'),(126,61,1,'Brazilian Treatment','Brazilian Treatment','',0,2000.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:14:\"file_13677.png\";}','2020-01-11 07:11:45','2020-01-11 08:11:49'),(127,61,1,'Manicure','Manicure','',0,100.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:14:\"file_27207.png\";}','2020-01-11 07:13:14','2020-01-11 08:11:37'),(128,61,1,'Pedicure','Pedicure','',0,100.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_862477.png\";}','2020-01-11 07:15:49','2020-01-11 08:11:29'),(129,61,1,'Foot Spa','Foot Spa','',0,750.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_282746.png\";}','2020-01-11 07:20:05','2020-01-11 08:11:20'),(130,61,1,'Eyelash Extension','Eyelash Extension','',0,600.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_650942.png\";}','2020-01-11 07:27:28','2020-01-11 08:11:12'),(131,61,1,'Eyebrow Threading','Eyebrow Threading','',0,180.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_353740.png\";}','2020-01-11 08:08:09','2020-01-11 08:11:04'),(132,61,1,'Under Arm Waxing','Under Arm Waxing','',0,300.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_765978.png\";}','2020-01-11 08:10:59',NULL),(133,61,1,'Papaya Soap','Herbal Bath Soap for Face and Body / ORIGINAL AUTHENTIC LIKAS PAPAYA / Whitening Soap /','',0,40.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_602997.png\";}','2020-01-11 08:46:05','2020-01-11 08:49:14'),(134,61,1,'Keratin Hair Shampoo','Keratin Hair Treatment Ultimate Repair Shampoo','',0,500.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_964782.png\";}','2020-01-11 09:09:01',NULL),(135,61,1,'Bentonite Clay Mask ','Bentonite Clay Mask 1 KG (Non-food)','',0,200.00,51,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_230875.png\";}','2020-01-11 09:15:45',NULL),(136,61,1,'Whitening Face Mask','Authentic Rorec Whitening Style Korean Face Mask','',0,50.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:14:\"file_11091.png\";}','2020-01-11 09:19:15','2020-01-11 09:20:18'),(137,61,1,'Fashionable Head Band','Fashionable Head Band','',0,80.00,52,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_344811.png\";}','2020-01-11 09:22:58',NULL),(138,61,1,'3pcs Hairpin Hair clip Se','3pcs Hairpin Hair clip Set Minimalist Geometry Models With Pearls For Women','',0,50.00,51,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_721398.png\";}','2020-01-11 09:25:59',NULL),(139,61,1,' 12 pieces Ladies Hair Ro',' 12 pieces Ladies Female Women Girl Velvet Elastic Hair Rope Tie Scrunchie Ponytail Holder Head Rope','',0,200.00,51,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_525793.png\";}','2020-01-11 09:31:11',NULL),(140,61,1,'1* Headband Rope Ribbon ','1* Headband Rope Ribbon Girls Headwear Elastic 2pcs/set Children Headdress Ponytail Holder Hair Accessories Fur Ball Headband Elastic Hair Rope','',0,125.00,51,1,0.00,0.00,0,'','','',0.00,0.00,'a:1:{i:0;s:15:\"file_513312.png\";}','2020-01-11 09:34:23',NULL);

/*Table structure for table `province` */

DROP TABLE IF EXISTS `province`;

CREATE TABLE `province` (
  `id` double NOT NULL,
  `province_desc` varchar(300) DEFAULT NULL,
  `island_group` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `province` */

insert  into `province`(`id`,`province_desc`,`island_group`) values (1,'Abra',2),(2,'Agusan del Norte',4),(3,'Agusan del Sur',4),(4,'Aklan',3),(5,'Albay',2),(6,'Antique',3),(7,'Apayao',2),(8,'Aurora',2),(9,'Basilan',4),(10,'Bataan',2),(11,'Batanes',2),(12,'Batangas',2),(13,'Benguet',2),(14,'Biliran',3),(15,'Bohol',3),(16,'Bukidnon',4),(17,'Bulacan',2),(18,'Cagayan',2),(19,'Camarines Norte',2),(20,'Camarines Sur',2),(21,'Camiguin',4),(22,'Capiz',3),(23,'Catanduanes',2),(24,'Cavite',2),(25,'Cebu',3),(26,'Compostela Valley',4),(27,'Cotabato',4),(28,'Davao del Norte',4),(29,'Davao del Sur',4),(30,'Davao Occidental',4),(31,'Davao Oriental',4),(32,'Dinagat Islands',4),(33,'Eastern Samar',3),(34,'Guimaras',3),(35,'Ifugao',2),(36,'Ilocos Norte',2),(37,'Ilocos Sur',2),(38,'Iloilo',3),(39,'Isabela',2),(40,'Kalinga',2),(41,'La Union',2),(42,'Laguna',2),(43,'Lanao del Norte',4),(44,'Lanao del Sur',4),(45,'Leyte',3),(46,'Maguindanao',4),(47,'Marinduque',2),(48,'Masbate',2),(49,'Misamis Occidental',4),(50,'Misamis Oriental',4),(51,'Mountain Province',2),(52,'NCR',1),(53,'Negros Occidental',3),(54,'Negros Oriental',3),(55,'Northern Samar',3),(56,'Nueva Ecija',2),(57,'Nueva Vizcaya',2),(58,'Occidental Mindoro',2),(59,'Oriental Mindoro',2),(60,'Palawan',2),(61,'Pampanga',2),(62,'Pangasinan',2),(63,'Quezon',2),(64,'Quirino',2),(65,'Rizal',2),(66,'Romblon',2),(67,'Samar',3),(68,'Sarangani',4),(69,'Siquijor',3),(70,'Sorsogon',2),(71,'South Cotabato',4),(72,'Southern Leyte',3),(73,'Sultan Kudarat',4),(74,'Sulu',4),(75,'Surigao del Norte',4),(76,'Surigao del Sur',4),(77,'Tarlac',2),(78,'Tawi-Tawi',4),(79,'Zambales',2),(80,'Zamboanga del Norte',4),(81,'Zamboanga del Sur',4),(82,'Zamboanga Sibugay',4);

/*Table structure for table `remittance_list` */

DROP TABLE IF EXISTS `remittance_list`;

CREATE TABLE `remittance_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `remittance_list` */

insert  into `remittance_list`(`id`,`name`,`status`) values (1,'Globe GCASH',1),(2,'Paymaya',1),(3,'Coins.PH',1),(4,'TrueMoney',1),(5,'Palawan Express Padala',1),(6,'Cebuana Lhullier',1),(7,'Western Union',1),(8,'MoneyGram',1),(9,'LBC',1),(10,'M. Lhullier',1),(11,'Smart Padala',1);

/*Table structure for table `shipping_type_fee` */

DROP TABLE IF EXISTS `shipping_type_fee`;

CREATE TABLE `shipping_type_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_type_fee` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `shipping_type_fee` */

insert  into `shipping_type_fee`(`id`,`shipping_type_fee`,`status`) values (1,'Shipping Fee (within Metro Manila)',1),(2,'Shipping Fee (Outside Metro Manila)',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `otp` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `users` */

/*Table structure for table `bank_list` */

DROP TABLE IF EXISTS `bank_list`;

/*!50001 DROP VIEW IF EXISTS `bank_list` */;
/*!50001 DROP TABLE IF EXISTS `bank_list` */;

/*!50001 CREATE TABLE  `bank_list`(
 `id` int(11) ,
 `bank_code` varchar(20) ,
 `bank_name` varchar(100) ,
 `status` int(5) 
)*/;

/*Table structure for table `bank_list2` */

DROP TABLE IF EXISTS `bank_list2`;

/*!50001 DROP VIEW IF EXISTS `bank_list2` */;
/*!50001 DROP TABLE IF EXISTS `bank_list2` */;

/*!50001 CREATE TABLE  `bank_list2`(
 `id` int(11) ,
 `bank_code` varchar(20) ,
 `bank_name` varchar(100) ,
 `status` int(5) 
)*/;

/*View structure for view bank_list */

/*!50001 DROP TABLE IF EXISTS `bank_list` */;
/*!50001 DROP VIEW IF EXISTS `bank_list` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bank_list` AS (select `outletk1_eoutletsuite_dbase`.`bank_list`.`id` AS `id`,`outletk1_eoutletsuite_dbase`.`bank_list`.`bank_code` AS `bank_code`,`outletk1_eoutletsuite_dbase`.`bank_list`.`bank_name` AS `bank_name`,`outletk1_eoutletsuite_dbase`.`bank_list`.`status` AS `status` from `outletk1_eoutletsuite_dbase`.`bank_list`) */;

/*View structure for view bank_list2 */

/*!50001 DROP TABLE IF EXISTS `bank_list2` */;
/*!50001 DROP VIEW IF EXISTS `bank_list2` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bank_list2` AS (select `outletk1_eoutletsuite_dbase`.`bank_list`.`id` AS `id`,`outletk1_eoutletsuite_dbase`.`bank_list`.`bank_code` AS `bank_code`,`outletk1_eoutletsuite_dbase`.`bank_list`.`bank_name` AS `bank_name`,`outletk1_eoutletsuite_dbase`.`bank_list`.`status` AS `status` from `outletk1_eoutletsuite_dbase`.`bank_list`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
