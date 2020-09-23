/*
 Navicat Premium Data Transfer

 Source Server         : Xampp
 Source Server Type    : MySQL
 Source Server Version : 100140
 Source Host           : localhost:3306
 Source Schema         : ta

 Target Server Type    : MySQL
 Target Server Version : 100140
 File Encoding         : 65001

 Date: 22/09/2020 23:35:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for murid
-- ----------------------------
DROP TABLE IF EXISTS `murid`;
CREATE TABLE `murid`  (
  `NIS` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Namalengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Kelas` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`NIS`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of murid
-- ----------------------------
INSERT INTO `murid` VALUES ('121300001', 'Gilang Januar', 'XII - RPL 1');
INSERT INTO `murid` VALUES ('121300002', 'Hamdan Mahendra', 'XII - RPL 1');
INSERT INTO `murid` VALUES ('121300003', 'Reni Nuraeni', 'XII - RPL 1');
INSERT INTO `murid` VALUES ('121300004', 'Normansyah', 'XII - RPL 1');
INSERT INTO `murid` VALUES ('121300006', 'Fajar Yusup', 'XII - RPL 1');
INSERT INTO `murid` VALUES ('121300007', 'Genta Rizky Permana', 'XII - TPL');
INSERT INTO `murid` VALUES ('121300008', 'Muhamad Fajar Setiawan', 'XII - TKJ 2');
INSERT INTO `murid` VALUES ('121300009', 'Akbar Piandi', 'XII - TP 1');
INSERT INTO `murid` VALUES ('121300010', 'Anastasyatannya', 'XI - RPL 2');

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('admin', 'administrator', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `admin` VALUES ('Admin007', 'Gilang J', '7b7bc2512ee1fedcd76bdc68926d4f7b');
INSERT INTO `admin` VALUES ('admin01', 'Reni Nuraeni', '18c6d818ae35a3e8279b5330eda01498');
INSERT INTO `admin` VALUES ('admin02', 'Hamdan Mahendra', '6e60a28384bc05fa5b33cc579d040c56');
INSERT INTO `admin` VALUES ('admin03', 'Gilang Januar', 'c37fddfb7b3f538674c6e9a77e7bf486');
INSERT INTO `admin` VALUES ('admin23', 'Gilang Januar', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for kehadiran
-- ----------------------------
DROP TABLE IF EXISTS `kehadiran`;
CREATE TABLE `kehadiran`  (
  `NIS` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Tanggal` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `Hadir` int NOT NULL,
  `Telat` int NOT NULL,
  `Sakit` int NOT NULL,
  `Izin` int NOT NULL,
  `Verifikasi` int NULL DEFAULT NULL,
  INDEX `NIS`(`NIS`) USING BTREE,
  CONSTRAINT `kehadiran_ibfk_2` FOREIGN KEY (`NIS`) REFERENCES `murid` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kehadiran
-- ----------------------------
INSERT INTO `kehadiran` VALUES ('121300002', '2018-04-17 00:55:36', 1, 0, 0, 0, 1);
INSERT INTO `kehadiran` VALUES ('121300003', '2018-04-17 00:56:01', 1, 0, 0, 0, 1);
INSERT INTO `kehadiran` VALUES ('121300006', '2018-04-17 00:56:23', 1, 0, 0, 0, 1);
INSERT INTO `kehadiran` VALUES ('121300001', '2019-09-09 07:28:35', 0, 0, 1, 0, 1);
INSERT INTO `kehadiran` VALUES ('121300001', '2020-09-22 23:08:28', 0, 1, 0, 0, 1);
INSERT INTO `kehadiran` VALUES ('121300002', '2020-09-22 23:15:52', 0, 0, 0, 1, 1);
INSERT INTO `kehadiran` VALUES ('121300010', '2020-09-22 23:18:10', 0, 1, 0, 0, 1);

-- ----------------------------
-- View structure for jmlkehadiran
-- ----------------------------
DROP VIEW IF EXISTS `jmlkehadiran`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `jmlkehadiran` AS (select `murid`.`NIS` AS `NIS`,`murid`.`Namalengkap` AS `Namalengkap`,`murid`.`Kelas` AS `Kelas`,`kehadiran`.`Tanggal` AS `Tanggal`,`kehadiran`.`Hadir` AS `Hadir`,`kehadiran`.`Telat` AS `Telat`,`kehadiran`.`Sakit` AS `Sakit`,`kehadiran`.`Izin` AS `Izin`,`kehadiran`.`Verifikasi` AS `Verifikasi` from (`murid` join `kehadiran` on((`murid`.`NIS` = `kehadiran`.`NIS`)))) ;

SET FOREIGN_KEY_CHECKS = 1;
