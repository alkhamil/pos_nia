/*
 Navicat Premium Data Transfer

 Source Server         : MYSQL NURULIMAN
 Source Server Type    : MySQL
 Source Server Version : 100327
 Source Host           : localhost:3306
 Source Schema         : nurulim2_niatrans

 Target Server Type    : MySQL
 Target Server Version : 100327
 File Encoding         : 65001

 Date: 05/01/2021 10:53:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_attribute_komite
-- ----------------------------
DROP TABLE IF EXISTS `m_attribute_komite`;
CREATE TABLE `m_attribute_komite`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_type_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_attribute_komite
-- ----------------------------
INSERT INTO `m_attribute_komite` VALUES (1, 1, 'Januari', 0);
INSERT INTO `m_attribute_komite` VALUES (2, 1, 'Februari', 0);
INSERT INTO `m_attribute_komite` VALUES (3, 1, 'Maret', 0);
INSERT INTO `m_attribute_komite` VALUES (4, 1, 'April', 0);
INSERT INTO `m_attribute_komite` VALUES (5, 1, 'Mei', 0);
INSERT INTO `m_attribute_komite` VALUES (6, 1, 'Juni', 0);
INSERT INTO `m_attribute_komite` VALUES (7, 1, 'Juli', 0);
INSERT INTO `m_attribute_komite` VALUES (8, 1, 'Agustus', 0);
INSERT INTO `m_attribute_komite` VALUES (9, 1, 'September', 0);
INSERT INTO `m_attribute_komite` VALUES (10, 1, 'Oktober', 0);
INSERT INTO `m_attribute_komite` VALUES (11, 1, 'November', 0);
INSERT INTO `m_attribute_komite` VALUES (12, 1, 'Desember', 0);

-- ----------------------------
-- Table structure for m_attribute_lainnya
-- ----------------------------
DROP TABLE IF EXISTS `m_attribute_lainnya`;
CREATE TABLE `m_attribute_lainnya`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_type_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_attribute_lainnya
-- ----------------------------
INSERT INTO `m_attribute_lainnya` VALUES (1, 3, 'Pakaian', 0);
INSERT INTO `m_attribute_lainnya` VALUES (2, 3, 'Lks', 0);

-- ----------------------------
-- Table structure for m_attribute_semester
-- ----------------------------
DROP TABLE IF EXISTS `m_attribute_semester`;
CREATE TABLE `m_attribute_semester`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_type_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_attribute_semester
-- ----------------------------
INSERT INTO `m_attribute_semester` VALUES (1, 2, 'Uts', 0);
INSERT INTO `m_attribute_semester` VALUES (2, 2, 'Uas', 0);
INSERT INTO `m_attribute_semester` VALUES (3, 2, 'Pts', 0);
INSERT INTO `m_attribute_semester` VALUES (4, 2, 'Pas', 0);

-- ----------------------------
-- Table structure for m_attribute_type
-- ----------------------------
DROP TABLE IF EXISTS `m_attribute_type`;
CREATE TABLE `m_attribute_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_attribute_type
-- ----------------------------
INSERT INTO `m_attribute_type` VALUES (1, 'KOMITE');
INSERT INTO `m_attribute_type` VALUES (2, 'SEMESTER');
INSERT INTO `m_attribute_type` VALUES (3, 'LAINNYA');

-- ----------------------------
-- Table structure for m_kebutuhan
-- ----------------------------
DROP TABLE IF EXISTS `m_kebutuhan`;
CREATE TABLE `m_kebutuhan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `amount` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_kebutuhan
-- ----------------------------
INSERT INTO `m_kebutuhan` VALUES (1, 'Meja', 'PRIMARY', 'Meja 50 Biji Untuk SMP Smester 5', 0);

-- ----------------------------
-- Table structure for m_kelas
-- ----------------------------
DROP TABLE IF EXISTS `m_kelas`;
CREATE TABLE `m_kelas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `level` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_kelas
-- ----------------------------
INSERT INTO `m_kelas` VALUES (1, '7', 1);
INSERT INTO `m_kelas` VALUES (2, '8', 1);
INSERT INTO `m_kelas` VALUES (3, '9', 1);
INSERT INTO `m_kelas` VALUES (4, '10', 2);
INSERT INTO `m_kelas` VALUES (5, '11', 2);
INSERT INTO `m_kelas` VALUES (6, '12', 2);

-- ----------------------------
-- Table structure for m_lembaga
-- ----------------------------
DROP TABLE IF EXISTS `m_lembaga`;
CREATE TABLE `m_lembaga`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `saldo` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_lembaga
-- ----------------------------
INSERT INTO `m_lembaga` VALUES (1, 'SMP', 'SMP', 9595000);
INSERT INTO `m_lembaga` VALUES (2, 'MTS', 'MTS', 0);
INSERT INTO `m_lembaga` VALUES (3, 'SMA', 'SMA', 0);
INSERT INTO `m_lembaga` VALUES (4, 'SMK', 'SMK', 0);

-- ----------------------------
-- Table structure for m_siswa
-- ----------------------------
DROP TABLE IF EXISTS `m_siswa`;
CREATE TABLE `m_siswa`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lembaga_id` int(11) NULL DEFAULT NULL,
  `nis` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birthday` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_graduated` int(11) NULL DEFAULT 0,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_siswa
-- ----------------------------
INSERT INTO `m_siswa` VALUES (1, 1, 'S2020120001', 'Nazmudin', '1996-05-31', '08568029330', 0, '2020-12-19 23:35:26.000000', NULL);

-- ----------------------------
-- Table structure for m_tahun_ajaran
-- ----------------------------
DROP TABLE IF EXISTS `m_tahun_ajaran`;
CREATE TABLE `m_tahun_ajaran`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_active` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_tahun_ajaran
-- ----------------------------
INSERT INTO `m_tahun_ajaran` VALUES (14, '2020-2021', 0);
INSERT INTO `m_tahun_ajaran` VALUES (15, '2021-2022', 0);
INSERT INTO `m_tahun_ajaran` VALUES (16, '2022-2023', 1);

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (1, 1, 'admin', '$2y$10$zmvkTBUCtqXwtrc7/umOZOckmRWjtuxM.ziB.R6wVkM0sdQCSbyJq');

-- ----------------------------
-- Table structure for m_user_type
-- ----------------------------
DROP TABLE IF EXISTS `m_user_type`;
CREATE TABLE `m_user_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_user_type
-- ----------------------------
INSERT INTO `m_user_type` VALUES (1, 'ADMIN');
INSERT INTO `m_user_type` VALUES (2, 'OPERATOR');

-- ----------------------------
-- Table structure for t_biaya_kebutuhan
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_kebutuhan`;
CREATE TABLE `t_biaya_kebutuhan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int(11) NULL DEFAULT NULL,
  `lembaga_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_kebutuhan
-- ----------------------------
INSERT INTO `t_biaya_kebutuhan` VALUES (1, 14, 1);

-- ----------------------------
-- Table structure for t_biaya_kebutuhan_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_kebutuhan_detail`;
CREATE TABLE `t_biaya_kebutuhan_detail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `biaya_kebutuhan_id` int(11) NULL DEFAULT NULL,
  `kebutuhan_id` int(11) NULL DEFAULT NULL,
  `amount` int(11) NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `is_checked` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_kebutuhan_detail
-- ----------------------------
INSERT INTO `t_biaya_kebutuhan_detail` VALUES (1, 1, 1, 5000, 'Meja 50 Biji Untuk SMP Smester 5', 1);

-- ----------------------------
-- Table structure for t_biaya_lembaga
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga`;
CREATE TABLE `t_biaya_lembaga`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int(11) NULL DEFAULT NULL,
  `lembaga_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_lembaga
-- ----------------------------
INSERT INTO `t_biaya_lembaga` VALUES (1, 14, 1);

-- ----------------------------
-- Table structure for t_biaya_lembaga_komite
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga_komite`;
CREATE TABLE `t_biaya_lembaga_komite`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `biaya_lembaga_id` int(11) NULL DEFAULT NULL,
  `attribute_komite_id` int(11) NULL DEFAULT NULL,
  `amount` int(11) NULL DEFAULT NULL,
  `is_checked` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_lembaga_komite
-- ----------------------------
INSERT INTO `t_biaya_lembaga_komite` VALUES (1, 1, 12, 600000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (2, 1, 11, 600000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (3, 1, 10, 600000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (4, 1, 9, 600000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (5, 1, 8, 600000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (6, 1, 7, 600000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (7, 1, 6, 600000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (8, 1, 5, 600000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (9, 1, 4, 600000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (10, 1, 3, 600000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (11, 1, 2, 600000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (12, 1, 1, 600000, 1);

-- ----------------------------
-- Table structure for t_biaya_lembaga_lainnya
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga_lainnya`;
CREATE TABLE `t_biaya_lembaga_lainnya`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `biaya_lembaga_id` int(11) NULL DEFAULT NULL,
  `attribute_lainnya_id` int(11) NULL DEFAULT NULL,
  `amount` int(11) NULL DEFAULT NULL,
  `is_checked` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_lembaga_lainnya
-- ----------------------------
INSERT INTO `t_biaya_lembaga_lainnya` VALUES (1, 1, 2, 50000, 1);
INSERT INTO `t_biaya_lembaga_lainnya` VALUES (2, 1, 1, 60000, 1);

-- ----------------------------
-- Table structure for t_biaya_lembaga_semester
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga_semester`;
CREATE TABLE `t_biaya_lembaga_semester`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `biaya_lembaga_id` int(11) NULL DEFAULT NULL,
  `attribute_semester_id` int(11) NULL DEFAULT NULL,
  `amount` int(11) NULL DEFAULT NULL,
  `is_checked` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_lembaga_semester
-- ----------------------------
INSERT INTO `t_biaya_lembaga_semester` VALUES (1, 1, 4, 600000, 1);
INSERT INTO `t_biaya_lembaga_semester` VALUES (2, 1, 3, 600000, 1);
INSERT INTO `t_biaya_lembaga_semester` VALUES (3, 1, 2, 600000, 1);
INSERT INTO `t_biaya_lembaga_semester` VALUES (4, 1, 1, 600000, 1);

-- ----------------------------
-- Table structure for t_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran`;
CREATE TABLE `t_pembayaran`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int(11) NULL DEFAULT NULL,
  `lembaga_id` int(11) NULL DEFAULT NULL,
  `siswa_id` int(11) NULL DEFAULT NULL,
  `kelas_id` int(11) NULL DEFAULT NULL,
  `code` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pembayaran
-- ----------------------------
INSERT INTO `t_pembayaran` VALUES (1, 14, 1, 1, 1, 'IN/SMP/202101/0001', 7200000, '2021-01-04 10:02:57.000000', 1);
INSERT INTO `t_pembayaran` VALUES (2, 14, 1, 1, 1, 'IN/SMP/202101/0002', 2400000, '2021-01-04 10:06:05.000000', 1);

-- ----------------------------
-- Table structure for t_pembayaran_komite
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_komite`;
CREATE TABLE `t_pembayaran_komite`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int(11) NULL DEFAULT NULL,
  `biaya_lembaga_komite_id` int(11) NULL DEFAULT NULL,
  `is_checkout` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pembayaran_komite
-- ----------------------------
INSERT INTO `t_pembayaran_komite` VALUES (1, 1, 12, 1);
INSERT INTO `t_pembayaran_komite` VALUES (2, 1, 11, 1);
INSERT INTO `t_pembayaran_komite` VALUES (3, 1, 10, 1);
INSERT INTO `t_pembayaran_komite` VALUES (4, 1, 9, 1);
INSERT INTO `t_pembayaran_komite` VALUES (5, 1, 8, 1);
INSERT INTO `t_pembayaran_komite` VALUES (6, 1, 7, 1);
INSERT INTO `t_pembayaran_komite` VALUES (7, 1, 6, 1);
INSERT INTO `t_pembayaran_komite` VALUES (8, 1, 5, 1);
INSERT INTO `t_pembayaran_komite` VALUES (9, 1, 4, 1);
INSERT INTO `t_pembayaran_komite` VALUES (10, 1, 3, 1);
INSERT INTO `t_pembayaran_komite` VALUES (11, 1, 2, 1);
INSERT INTO `t_pembayaran_komite` VALUES (12, 1, 1, 1);
INSERT INTO `t_pembayaran_komite` VALUES (13, 2, 12, 1);
INSERT INTO `t_pembayaran_komite` VALUES (14, 2, 11, 1);
INSERT INTO `t_pembayaran_komite` VALUES (15, 2, 10, 1);
INSERT INTO `t_pembayaran_komite` VALUES (16, 2, 9, 1);
INSERT INTO `t_pembayaran_komite` VALUES (17, 2, 8, 1);
INSERT INTO `t_pembayaran_komite` VALUES (18, 2, 7, 1);
INSERT INTO `t_pembayaran_komite` VALUES (19, 2, 6, 1);
INSERT INTO `t_pembayaran_komite` VALUES (20, 2, 5, 1);
INSERT INTO `t_pembayaran_komite` VALUES (21, 2, 4, 1);
INSERT INTO `t_pembayaran_komite` VALUES (22, 2, 3, 1);
INSERT INTO `t_pembayaran_komite` VALUES (23, 2, 2, 1);
INSERT INTO `t_pembayaran_komite` VALUES (24, 2, 1, 1);

-- ----------------------------
-- Table structure for t_pembayaran_lainnya
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_lainnya`;
CREATE TABLE `t_pembayaran_lainnya`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int(11) NULL DEFAULT NULL,
  `biaya_lembaga_lainnya_id` int(11) NULL DEFAULT NULL,
  `is_checkout` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pembayaran_lainnya
-- ----------------------------
INSERT INTO `t_pembayaran_lainnya` VALUES (1, 1, 2, 0);
INSERT INTO `t_pembayaran_lainnya` VALUES (2, 1, 1, 0);
INSERT INTO `t_pembayaran_lainnya` VALUES (3, 2, 2, 0);
INSERT INTO `t_pembayaran_lainnya` VALUES (4, 2, 1, 0);

-- ----------------------------
-- Table structure for t_pembayaran_semester
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_semester`;
CREATE TABLE `t_pembayaran_semester`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int(11) NULL DEFAULT NULL,
  `biaya_lembaga_semester_id` int(11) NULL DEFAULT NULL,
  `is_checkout` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pembayaran_semester
-- ----------------------------
INSERT INTO `t_pembayaran_semester` VALUES (1, 1, 4, 0);
INSERT INTO `t_pembayaran_semester` VALUES (2, 1, 3, 0);
INSERT INTO `t_pembayaran_semester` VALUES (3, 1, 2, 0);
INSERT INTO `t_pembayaran_semester` VALUES (4, 1, 1, 0);
INSERT INTO `t_pembayaran_semester` VALUES (5, 2, 4, 1);
INSERT INTO `t_pembayaran_semester` VALUES (6, 2, 3, 1);
INSERT INTO `t_pembayaran_semester` VALUES (7, 2, 2, 1);
INSERT INTO `t_pembayaran_semester` VALUES (8, 2, 1, 1);

-- ----------------------------
-- Table structure for t_pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `t_pengeluaran`;
CREATE TABLE `t_pengeluaran`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `approval_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `receive_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pengeluaran
-- ----------------------------
INSERT INTO `t_pengeluaran` VALUES (1, 'OUT/SMP/20210104/0001', 'admin', 'Jacob', 5000, '2021-01-04 10:03:41.000000', 1);

-- ----------------------------
-- Table structure for t_pengeluaran_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_pengeluaran_detail`;
CREATE TABLE `t_pengeluaran_detail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pengeluaran_id` int(11) NULL DEFAULT NULL,
  `tahun_ajaran_id` int(11) NULL DEFAULT NULL,
  `lembaga_id` int(11) NULL DEFAULT NULL,
  `kebutuhan_lembaga_id` int(11) NULL DEFAULT NULL,
  `biaya_kebutuhan_detail_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pengeluaran_detail
-- ----------------------------
INSERT INTO `t_pengeluaran_detail` VALUES (1, 1, 14, 1, 1, 1);

-- ----------------------------
-- Table structure for t_saldo
-- ----------------------------
DROP TABLE IF EXISTS `t_saldo`;
CREATE TABLE `t_saldo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int(11) NULL DEFAULT NULL,
  `lembaga_id` int(11) NULL DEFAULT NULL,
  `pembayaran_id` int(11) NULL DEFAULT NULL,
  `amount` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
