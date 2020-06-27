/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.36-MariaDB : Database - db_pulsaku
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_pulsaku` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_pulsaku`;

/*Table structure for table `tbl_master_barang` */

DROP TABLE IF EXISTS `tbl_master_barang`;

CREATE TABLE `tbl_master_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) DEFAULT NULL,
  `kategori_barang` int(11) DEFAULT NULL,
  `harga_satuan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_master_barang` */

insert  into `tbl_master_barang`(`id_barang`,`nama_barang`,`kategori_barang`,`harga_satuan`) values 
(1,'Paket XL 37GB',1,'98000'),
(2,'Paket XL 21GB',1,'65000'),
(3,'Paket XL 15GB',1,'30000'),
(4,'Paket XL 30GB',2,'75000'),
(5,'Paket XL 21GB',2,'65000'),
(6,'Perdana XL No Biasa',3,'10000'),
(7,'Perdana XL No Cantik',3,'50000');

/*Table structure for table `tbl_master_kategori` */

DROP TABLE IF EXISTS `tbl_master_kategori`;

CREATE TABLE `tbl_master_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_master_kategori` */

insert  into `tbl_master_kategori`(`id_kategori`,`nama_kategori`) values 
(1,'Perdana Paket Data XL'),
(2,'Voucher Paket Data XL'),
(3,'Kartu Perdana XL');

/*Table structure for table `tbl_transaksi` */

DROP TABLE IF EXISTS `tbl_transaksi`;

CREATE TABLE `tbl_transaksi` (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `barang` varchar(200) DEFAULT NULL,
  `qty` text,
  `tgl_beli` date DEFAULT NULL,
  PRIMARY KEY (`id_trans`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_transaksi` */

insert  into `tbl_transaksi`(`id_trans`,`nama_pelanggan`,`barang`,`qty`,`tgl_beli`) values 
(1,'Paijo','2','2','2020-06-27'),
(2,'Tukiyem','1','5','2020-06-27');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(10) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text,
  `keterangan` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`nama_user`,`username`,`password`,`keterangan`,`level`) values 
(1,'Mr. Admin','admin','b34b40ca8771c48c204e55f927376885','okedeh',1),
(2,'Mr. Kasir','kasir','c7911af3adbd12a035b289556d96470a','kasir',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
