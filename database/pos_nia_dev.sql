/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80022
 Source Host           : localhost:3306
 Source Schema         : pos_nia_dev2

 Target Server Type    : MySQL
 Target Server Version : 80022
 File Encoding         : 65001

 Date: 19/12/2020 16:09:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_attribute_komite
-- ----------------------------
DROP TABLE IF EXISTS `m_attribute_komite`;
CREATE TABLE `m_attribute_komite`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `attribute_type_id` int NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `amount` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_attribute_komite
-- ----------------------------

-- ----------------------------
-- Table structure for m_attribute_lainnya
-- ----------------------------
DROP TABLE IF EXISTS `m_attribute_lainnya`;
CREATE TABLE `m_attribute_lainnya`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `attribute_type_id` int NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `amount` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_attribute_lainnya
-- ----------------------------

-- ----------------------------
-- Table structure for m_attribute_semester
-- ----------------------------
DROP TABLE IF EXISTS `m_attribute_semester`;
CREATE TABLE `m_attribute_semester`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `attribute_type_id` int NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `amount` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_attribute_semester
-- ----------------------------

-- ----------------------------
-- Table structure for m_attribute_type
-- ----------------------------
DROP TABLE IF EXISTS `m_attribute_type`;
CREATE TABLE `m_attribute_type`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_attribute_type
-- ----------------------------

-- ----------------------------
-- Table structure for m_kebutuhan
-- ----------------------------
DROP TABLE IF EXISTS `m_kebutuhan`;
CREATE TABLE `m_kebutuhan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tipe` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `amount` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_kebutuhan
-- ----------------------------

-- ----------------------------
-- Table structure for m_kelas
-- ----------------------------
DROP TABLE IF EXISTS `m_kelas`;
CREATE TABLE `m_kelas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `level` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_kelas
-- ----------------------------

-- ----------------------------
-- Table structure for m_lembaga
-- ----------------------------
DROP TABLE IF EXISTS `m_lembaga`;
CREATE TABLE `m_lembaga`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `saldo` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_lembaga
-- ----------------------------

-- ----------------------------
-- Table structure for m_siswa
-- ----------------------------
DROP TABLE IF EXISTS `m_siswa`;
CREATE TABLE `m_siswa`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `birthday` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `is_graduated` int NULL DEFAULT 0,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_siswa
-- ----------------------------

-- ----------------------------
-- Table structure for m_tahun_ajaran
-- ----------------------------
DROP TABLE IF EXISTS `m_tahun_ajaran`;
CREATE TABLE `m_tahun_ajaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `is_active` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_tahun_ajaran
-- ----------------------------
INSERT INTO `m_tahun_ajaran` VALUES (14, '2020-2021', 'jaja', 0);

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_type_id` int NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (1, 1, 'admin', '$10$YCElIPutIVJOqUhoCv9dBOyD9G086WW4Z2Kj00egnQgwkLcWgFtg6');

-- ----------------------------
-- Table structure for m_user_type
-- ----------------------------
DROP TABLE IF EXISTS `m_user_type`;
CREATE TABLE `m_user_type`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_user_type
-- ----------------------------

-- ----------------------------
-- Table structure for t_biaya_lembaga
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga`;
CREATE TABLE `t_biaya_lembaga`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int NULL DEFAULT NULL,
  `lembaga_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_biaya_lembaga
-- ----------------------------

-- ----------------------------
-- Table structure for t_biaya_lembaga_komite
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga_komite`;
CREATE TABLE `t_biaya_lembaga_komite`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `biaya_lembaga_id` int NULL DEFAULT NULL,
  `attribute_komite_id` int NULL DEFAULT NULL,
  `amount` int NULL DEFAULT NULL,
  `is_checked` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_biaya_lembaga_komite
-- ----------------------------

-- ----------------------------
-- Table structure for t_biaya_lembaga_lainnya
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga_lainnya`;
CREATE TABLE `t_biaya_lembaga_lainnya`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `biaya_lembaga_id` int NULL DEFAULT NULL,
  `attribute_lainnya_id` int NULL DEFAULT NULL,
  `amount` int NULL DEFAULT NULL,
  `is_checked` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_biaya_lembaga_lainnya
-- ----------------------------

-- ----------------------------
-- Table structure for t_biaya_lembaga_semester
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga_semester`;
CREATE TABLE `t_biaya_lembaga_semester`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `biaya_lembaga_id` int NULL DEFAULT NULL,
  `attribute_semester_id` int NULL DEFAULT NULL,
  `amount` int NULL DEFAULT NULL,
  `is_checked` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_biaya_lembaga_semester
-- ----------------------------

-- ----------------------------
-- Table structure for t_kebutuhan_lembaga
-- ----------------------------
DROP TABLE IF EXISTS `t_kebutuhan_lembaga`;
CREATE TABLE `t_kebutuhan_lembaga`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kebutuhan_id` int NULL DEFAULT NULL,
  `tahun_ajaran_id` int NULL DEFAULT NULL,
  `lembaga_id` int NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `amount` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_kebutuhan_lembaga
-- ----------------------------

-- ----------------------------
-- Table structure for t_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran`;
CREATE TABLE `t_pembayaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int NULL DEFAULT NULL,
  `lembaga_id` int NULL DEFAULT NULL,
  `siswa_id` int NULL DEFAULT NULL,
  `kelas_id` int NULL DEFAULT NULL,
  `code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `amount` int NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_pembayaran
-- ----------------------------

-- ----------------------------
-- Table structure for t_pembayaran_komite
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_komite`;
CREATE TABLE `t_pembayaran_komite`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int NULL DEFAULT NULL,
  `biaya_lembaga_komite_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_pembayaran_komite
-- ----------------------------

-- ----------------------------
-- Table structure for t_pembayaran_lainnya
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_lainnya`;
CREATE TABLE `t_pembayaran_lainnya`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int NULL DEFAULT NULL,
  `biaya_lembaga_lainnya_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_pembayaran_lainnya
-- ----------------------------

-- ----------------------------
-- Table structure for t_pembayaran_semester
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_semester`;
CREATE TABLE `t_pembayaran_semester`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int NULL DEFAULT NULL,
  `biaya_lembaga_semester_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_pembayaran_semester
-- ----------------------------

-- ----------------------------
-- Table structure for t_pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `t_pengeluaran`;
CREATE TABLE `t_pengeluaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `approval_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `receive_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_pengeluaran
-- ----------------------------

-- ----------------------------
-- Table structure for t_pengeluaran_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_pengeluaran_detail`;
CREATE TABLE `t_pengeluaran_detail`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pengeluaran_id` int NULL DEFAULT NULL,
  `tahun_ajaran_id` int NULL DEFAULT NULL,
  `lembaga_id` int NULL DEFAULT NULL,
  `kebutuhan_lembaga_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_pengeluaran_detail
-- ----------------------------

-- ----------------------------
-- Table structure for t_saldo
-- ----------------------------
DROP TABLE IF EXISTS `t_saldo`;
CREATE TABLE `t_saldo`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int NULL DEFAULT NULL,
  `lembaga_id` int NULL DEFAULT NULL,
  `pembayaran_id` int NULL DEFAULT NULL,
  `amount` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_saldo
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
