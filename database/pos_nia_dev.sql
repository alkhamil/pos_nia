/*
 Navicat Premium Data Transfer

 Source Server         : MYSQL LOCAL UBUNTU
 Source Server Type    : MySQL
 Source Server Version : 80022
 Source Host           : localhost:3306
 Source Schema         : pos_nia_dev

 Target Server Type    : MySQL
 Target Server Version : 80022
 File Encoding         : 65001

 Date: 17/12/2020 21:12:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_attribute
-- ----------------------------
DROP TABLE IF EXISTS `m_attribute`;
CREATE TABLE `m_attribute`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `attribute_type_id` int(0) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_attribute
-- ----------------------------
INSERT INTO `m_attribute` VALUES (2, 1, 'Komite', 'Komite', 0);
INSERT INTO `m_attribute` VALUES (3, 2, 'Gasal', 'Gasal', 0);
INSERT INTO `m_attribute` VALUES (4, 2, 'Genap', 'Genap', 0);

-- ----------------------------
-- Table structure for m_attribute_type
-- ----------------------------
DROP TABLE IF EXISTS `m_attribute_type`;
CREATE TABLE `m_attribute_type`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_attribute_type
-- ----------------------------
INSERT INTO `m_attribute_type` VALUES (1, 'KOMITE', 'KOMITE');
INSERT INTO `m_attribute_type` VALUES (2, 'SEMESTER', 'SEMESTER');
INSERT INTO `m_attribute_type` VALUES (3, 'LAINNYA', 'LAINNYA');

-- ----------------------------
-- Table structure for m_kelas
-- ----------------------------
DROP TABLE IF EXISTS `m_kelas`;
CREATE TABLE `m_kelas`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_kelas
-- ----------------------------
INSERT INTO `m_kelas` VALUES (1, '7', 'SMP');
INSERT INTO `m_kelas` VALUES (2, '8', 'SMP');
INSERT INTO `m_kelas` VALUES (3, '9', 'SMP');
INSERT INTO `m_kelas` VALUES (4, '10', 'SMA');
INSERT INTO `m_kelas` VALUES (5, '11', 'SMA');
INSERT INTO `m_kelas` VALUES (6, '12', 'SMA');

-- ----------------------------
-- Table structure for m_lembaga
-- ----------------------------
DROP TABLE IF EXISTS `m_lembaga`;
CREATE TABLE `m_lembaga`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `saldo` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_lembaga
-- ----------------------------
INSERT INTO `m_lembaga` VALUES (6, 'SMP', 'SMP', 0);
INSERT INTO `m_lembaga` VALUES (7, 'SMA', 'SMA', 0);
INSERT INTO `m_lembaga` VALUES (8, 'MA', 'Ma', 0);

-- ----------------------------
-- Table structure for m_siswa
-- ----------------------------
DROP TABLE IF EXISTS `m_siswa`;
CREATE TABLE `m_siswa`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `lembaga_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `birthday` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_siswa
-- ----------------------------
INSERT INTO `m_siswa` VALUES (3, '6', 'S2020120001', 'Naz', '2020-12-15', '085612891289', '2020-12-15 19:24:59', '2020-12-15 19:25:02');
INSERT INTO `m_siswa` VALUES (5, '7', 'S2020120002', 'Hui', '2020-12-16', '89013031', '2020-12-16 00:18:23', NULL);

-- ----------------------------
-- Table structure for m_tahun_ajaran
-- ----------------------------
DROP TABLE IF EXISTS `m_tahun_ajaran`;
CREATE TABLE `m_tahun_ajaran`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_tahun_ajaran
-- ----------------------------
INSERT INTO `m_tahun_ajaran` VALUES (16, '2020-2021', 'Tahun Terbanyak Siswa', 1);
INSERT INTO `m_tahun_ajaran` VALUES (17, '2021-2022', 'Tahun Terkeren', 0);

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_type_id` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_user_type
-- ----------------------------
DROP TABLE IF EXISTS `m_user_type`;
CREATE TABLE `m_user_type`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_user_type
-- ----------------------------
INSERT INTO `m_user_type` VALUES (1, 'ADMIN', 'ADMIN');
INSERT INTO `m_user_type` VALUES (2, 'OPERATOR', 'OPERATOR');

-- ----------------------------
-- Table structure for t_biaya_lembaga
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga`;
CREATE TABLE `t_biaya_lembaga`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int(0) NULL DEFAULT NULL,
  `lembaga_id` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_lembaga
-- ----------------------------
INSERT INTO `t_biaya_lembaga` VALUES (4, 16, 6);
INSERT INTO `t_biaya_lembaga` VALUES (5, 16, 7);
INSERT INTO `t_biaya_lembaga` VALUES (6, 17, 7);

-- ----------------------------
-- Table structure for t_biaya_lembaga_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga_detail`;
CREATE TABLE `t_biaya_lembaga_detail`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `biaya_lembaga_id` int(0) NULL DEFAULT NULL,
  `attribute_id` int(0) NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_lembaga_detail
-- ----------------------------
INSERT INTO `t_biaya_lembaga_detail` VALUES (4, 4, 2, 20000);
INSERT INTO `t_biaya_lembaga_detail` VALUES (5, 4, 3, 20000);
INSERT INTO `t_biaya_lembaga_detail` VALUES (6, 4, 4, 10000);
INSERT INTO `t_biaya_lembaga_detail` VALUES (7, 5, 2, 100);
INSERT INTO `t_biaya_lembaga_detail` VALUES (8, 5, 3, 300);
INSERT INTO `t_biaya_lembaga_detail` VALUES (9, 5, 4, 8000);
INSERT INTO `t_biaya_lembaga_detail` VALUES (10, 6, 2, 100000);
INSERT INTO `t_biaya_lembaga_detail` VALUES (11, 6, 3, 800000);
INSERT INTO `t_biaya_lembaga_detail` VALUES (12, 6, 4, 200000);

-- ----------------------------
-- Table structure for t_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran`;
CREATE TABLE `t_pembayaran`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `lembaga_id` int(0) NULL DEFAULT NULL,
  `siswa_id` int(0) NULL DEFAULT NULL,
  `kelas_id` int(0) NULL DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pembayaran_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_detail`;
CREATE TABLE `t_pembayaran_detail`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int(0) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_saldo
-- ----------------------------
DROP TABLE IF EXISTS `t_saldo`;
CREATE TABLE `t_saldo`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `lembaga_id` int(0) NULL DEFAULT NULL,
  `tahun_ajaran_id` int(0) NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  `is_active` int(0) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
