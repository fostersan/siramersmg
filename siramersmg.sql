/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.37-MariaDB : Database - siramersmg
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`siramersmg` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `siramersmg`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id` char(5) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`id`,`nama_barang`,`stok`,`satuan_id`,`jenis_id`) values 
('5AD01','Adult Nasal Dewasa',2839,2,1),
('5HA01','Hansaplast',200,2,1),
('5JA01','Jarum Suntik',16,1,1),
('5KO02','Obat Panadol',0,1,4),
('5MA01','Masker Sensi 100 pcs',6999,1,1),
('5MA02','Masker Tie',250,2,1),
('5PA01','Panadol',2,1,4),
('5PA02','Paracetamol',10,2,4),
('5SE01','Selang Infus',1,2,1);

/*Table structure for table `barangkeluar` */

DROP TABLE IF EXISTS `barangkeluar`;

CREATE TABLE `barangkeluar` (
  `id` char(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(5) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barangkeluar` */

insert  into `barangkeluar`(`id`,`user_id`,`barang_id`,`jumlah_keluar`,`tanggal_keluar`) values 
('BK20071800001',1,'5JA01',2,'2020-07-18'),
('BK20071900003',1,'5JA01',1,'2020-07-19'),
('BK20072200001',1,'5MA01',1001,'2020-07-22'),
('BK20072400001',1,'5AD01',110,'2018-10-07'),
('BK20072400002',1,'5AD01',120,'2018-11-15'),
('BK20072400003',1,'5AD01',200,'2018-12-07'),
('BK20072400004',1,'5AD01',150,'2019-01-07'),
('BK20072400005',1,'5AD01',150,'2019-02-07'),
('BK20072400006',1,'5AD01',100,'2019-03-07'),
('BK20072400007',1,'5AD01',150,'2019-04-07'),
('BK20072400008',1,'5AD01',150,'2019-05-07'),
('BK20072400009',1,'5AD01',150,'2019-06-07'),
('BK20072400010',1,'5AD01',100,'2019-07-07'),
('BK20072400011',1,'5AD01',50,'2019-08-07'),
('BK20072400012',1,'5AD01',150,'2019-09-07'),
('BK20072400013',1,'5AD01',100,'2019-10-07'),
('BK20072400014',1,'5AD01',200,'2019-11-07'),
('BK20072400015',1,'5AD01',54,'2019-12-07'),
('BK20072400016',1,'5AD01',147,'2020-01-07'),
('BK20072400017',1,'5AD01',200,'2020-02-07'),
('BK20072400018',1,'5AD01',100,'2020-03-07'),
('BK20072800001',1,'5JA01',1,'2020-07-28'),
('BK20072800002',1,'5AD01',150,'2017-04-15'),
('BK20072800003',1,'5AD01',150,'2017-05-28'),
('BK20072800004',1,'5AD01',100,'2017-06-28'),
('BK20072800005',1,'5AD01',100,'2017-07-28'),
('BK20072800006',1,'5AD01',150,'2017-08-28'),
('BK20072800007',1,'5AD01',120,'2017-09-28'),
('BK20072800008',1,'5AD01',140,'2017-10-28'),
('BK20072800009',1,'5AD01',110,'2017-11-28'),
('BK20072800010',1,'5AD01',200,'2017-12-28'),
('BK20072800011',1,'5AD01',100,'2018-01-28'),
('BK20072800012',1,'5AD01',150,'2018-02-28'),
('BK20072800013',1,'5AD01',100,'2018-03-28'),
('BK20072800014',1,'5AD01',150,'2018-04-28'),
('BK20072800015',1,'5AD01',150,'2018-05-28'),
('BK20072800016',1,'5AD01',150,'2018-06-28'),
('BK20072800017',1,'5AD01',100,'2018-07-28'),
('BK20072800018',1,'5AD01',50,'2018-08-28'),
('BK20072800019',1,'5AD01',100,'2018-09-28'),
('BK20072800020',1,'5MA02',300,'2017-04-28'),
('BK20072800021',1,'5MA02',400,'2017-05-28'),
('BK20072800022',1,'5MA02',350,'2017-06-28'),
('BK20072800023',1,'5MA02',250,'2017-07-28'),
('BK20072800024',1,'5MA02',300,'2017-08-28'),
('BK20072800025',1,'5MA02',500,'2017-09-28'),
('BK20072800026',1,'5MA02',600,'2017-10-28'),
('BK20072800027',1,'5MA02',650,'2017-11-28'),
('BK20072800028',1,'5MA02',400,'2017-12-28'),
('BK20072800029',1,'5MA02',250,'2018-01-28'),
('BK20072800030',1,'5MA02',300,'2018-02-28'),
('BK20072800031',1,'5MA02',550,'2018-03-28'),
('BK20072800032',1,'5MA02',450,'2018-04-28'),
('BK20072800033',1,'5MA02',300,'2018-05-28'),
('BK20072800034',1,'5MA02',350,'2018-06-28'),
('BK20072800035',1,'5MA02',350,'2018-07-28'),
('BK20072800036',1,'5MA02',700,'2018-08-28'),
('BK20072800037',1,'5MA02',500,'2018-09-28'),
('BK20072800038',1,'5MA02',200,'2018-10-28'),
('BK20072800039',1,'5MA02',150,'2018-11-28'),
('BK20072800040',1,'5MA02',250,'2018-12-28'),
('BK20072800041',1,'5MA02',550,'2019-01-28'),
('BK20072800042',1,'5MA02',450,'2019-02-28'),
('BK20072800043',1,'5MA02',150,'2019-03-28'),
('BK20072800044',1,'5MA02',250,'2019-04-28'),
('BK20072800045',1,'5MA02',450,'2019-05-28'),
('BK20072800046',1,'5MA02',350,'2019-06-28'),
('BK20072800047',1,'5MA02',250,'2019-07-28'),
('BK20072800048',1,'5MA02',400,'2019-08-28'),
('BK20072800049',1,'5MA02',300,'2019-09-28'),
('BK20072800050',1,'5MA02',350,'2019-10-28'),
('BK20072800051',1,'5MA02',650,'2019-11-28'),
('BK20072800052',1,'5MA02',300,'2019-12-28'),
('BK20072800053',1,'5MA02',450,'2020-01-28'),
('BK20072800054',1,'5MA02',650,'2020-02-28'),
('BK20072800055',1,'5MA02',2100,'2020-03-28'),
('BK20072800056',1,'5HA01',800,'2017-04-28'),
('BK20072800057',1,'5HA01',500,'2017-05-28'),
('BK20072800058',1,'5HA01',200,'2017-06-28'),
('BK20072800059',1,'5HA01',300,'2017-07-28'),
('BK20072800060',1,'5HA01',500,'2017-08-28'),
('BK20072800061',1,'5HA01',400,'2017-09-28'),
('BK20072800062',1,'5HA01',200,'2017-10-28'),
('BK20072800063',1,'5HA01',700,'2017-11-28'),
('BK20072800064',1,'5HA01',600,'2017-12-28'),
('BK20072800065',1,'5HA01',500,'2018-01-28'),
('BK20072800066',1,'5HA01',100,'2018-02-28'),
('BK20072800067',1,'5HA01',300,'2018-03-28'),
('BK20072800068',1,'5HA01',300,'2018-04-28'),
('BK20072800069',1,'5HA01',200,'2018-05-28'),
('BK20072800070',1,'5HA01',400,'2018-06-28'),
('BK20072800071',1,'5HA01',900,'2018-07-28'),
('BK20072800072',1,'5HA01',500,'2018-08-28'),
('BK20072800073',1,'5HA01',300,'2018-09-28'),
('BK20072800074',1,'5HA01',400,'2018-10-28'),
('BK20072800075',1,'5HA01',900,'2018-11-28'),
('BK20072800076',1,'5HA01',500,'2018-12-28'),
('BK20072800077',1,'5HA01',800,'2019-01-28'),
('BK20072800078',1,'5HA01',300,'2019-02-28'),
('BK20072800079',1,'5HA01',600,'2019-03-28'),
('BK20072800080',1,'5HA01',200,'2019-04-28'),
('BK20072800081',1,'5HA01',1200,'2019-05-28'),
('BK20072800082',1,'5HA01',700,'2019-06-28'),
('BK20072800083',1,'5HA01',400,'2019-08-28'),
('BK20072800084',1,'5HA01',100,'2019-07-28'),
('BK20072800085',1,'5HA01',500,'2019-09-28'),
('BK20072800086',1,'5HA01',300,'2019-10-01'),
('BK20072800087',1,'5HA01',700,'2019-11-28'),
('BK20072800088',1,'5HA01',100,'2019-12-01'),
('BK20072800089',1,'5HA01',400,'2020-01-28'),
('BK20072800090',1,'5HA01',200,'2020-02-28'),
('BK20072800091',1,'5HA01',300,'2020-03-28');

/*Table structure for table `barangmasuk` */

DROP TABLE IF EXISTS `barangmasuk`;

CREATE TABLE `barangmasuk` (
  `id` char(20) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(5) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barangmasuk` */

insert  into `barangmasuk`(`id`,`supplier_id`,`user_id`,`barang_id`,`jumlah_masuk`,`tanggal_masuk`) values 
('BM20071800001',5,1,'5PA01',10,'2020-07-18'),
('BM20071800002',5,1,'5JA01',20,'2020-07-18'),
('BM20071800003',5,1,'5SE01',22,'2020-07-18'),
('BM20071900001',5,1,'5SE01',3,'2020-07-19'),
('BM20072200001',5,1,'5MA01',8000,'2020-07-22'),
('BM20072400001',5,1,'5AD01',2500,'2020-07-24'),
('BM20072800001',5,1,'5AD01',5000,'2020-07-28'),
('BM20072800002',5,1,'5MA02',16000,'2020-07-28'),
('BM20072800003',5,1,'5HA01',16500,'2020-07-28'),
('BM20111100001',5,1,'5PA02',10,'2020-11-11');

/*Table structure for table `jenis` */

DROP TABLE IF EXISTS `jenis`;

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `jenis` */

insert  into `jenis`(`id`,`nama_jenis`) values 
(1,'Alat Medis'),
(4,'Obat-Obatan');

/*Table structure for table `peramalan` */

DROP TABLE IF EXISTS `peramalan`;

CREATE TABLE `peramalan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_id` varchar(5) NOT NULL,
  `konstanta` float(11,4) NOT NULL,
  `et` int(11) NOT NULL,
  `hasil` float(11,4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `peramalan` */

insert  into `peramalan`(`id`,`barang_id`,`konstanta`,`et`,`hasil`) values 
(2,'5AD01',387.5833,400,NULL),
(3,'5AD01',387.7333,400,NULL),
(4,'5HA01',1358.3333,1360,NULL),
(5,'5HA01',387.5833,400,NULL);

/*Table structure for table `satuan` */

DROP TABLE IF EXISTS `satuan`;

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `satuan` */

insert  into `satuan`(`id`,`nama_satuan`) values 
(1,'Box'),
(2,'Pcs'),
(3,'Dozen');

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`id`,`nama_supplier`,`no_telp`,`alamat`) values 
(5,'PT. Jaya Hiden Sentosa','021 0011 2233','Jalan Kok Gitu No. 01, Jakarta Pusat, DKI Jakarta');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`username`,`password`) values 
(1,'Admin Ganteng Sekali','admin','$2y$10$C6pHhdUdonz0QRZ/k6/tW.YSLkGb.HuNI3G9BIO9E23P/INJDLd.S'),
(2,'Felix Budi Kusuma','felixbudi','$2y$10$FnahbF18vLoDIhW2aYYY0.nI/BwOkavpUTc/fZXP2oEOQU8eNeXva'),
(3,'Foster Tampan','fostersan','$2y$10$1kyb6svXA25dYt0ZylEZJeY5Ahyt78yhgbMYulkfnJDE7DlZSFR9y');

/* Trigger structure for table `barangkeluar` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_stok_keluar` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_stok_keluar` BEFORE INSERT ON `barangkeluar` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - NEW.jumlah_keluar WHERE `barang`.`id` = NEW.barang_id */$$


DELIMITER ;

/* Trigger structure for table `barangmasuk` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_stok_masuk` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_stok_masuk` BEFORE INSERT ON `barangmasuk` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + NEW.jumlah_masuk WHERE `barang`.`id` = NEW.barang_id */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
