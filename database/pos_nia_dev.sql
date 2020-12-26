/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80022
 Source Host           : localhost:3306
 Source Schema         : pos_nia_dev

 Target Server Type    : MySQL
 Target Server Version : 80022
 File Encoding         : 65001

 Date: 26/12/2020 15:21:08
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
  `amount` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

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
  `id` int NOT NULL AUTO_INCREMENT,
  `attribute_type_id` int NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `amount` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

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
  `id` int NOT NULL AUTO_INCREMENT,
  `attribute_type_id` int NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `amount` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_attribute_semester
-- ----------------------------
INSERT INTO `m_attribute_semester` VALUES (1, 2, 'Uts', 0);
INSERT INTO `m_attribute_semester` VALUES (2, 2, 'Uas', 0);

-- ----------------------------
-- Table structure for m_attribute_type
-- ----------------------------
DROP TABLE IF EXISTS `m_attribute_type`;
CREATE TABLE `m_attribute_type`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

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
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `amount` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_kebutuhan
-- ----------------------------
INSERT INTO `m_kebutuhan` VALUES (2, 'Meja', 'PRIMARY', 'Membeli meja dan kebutuhan lainnya', 0);
INSERT INTO `m_kebutuhan` VALUES (3, 'Membeli Game', 'SECONDARY', 'Kebutuhan yang sangar', 0);
INSERT INTO `m_kebutuhan` VALUES (4, 'bagong', 'PRIMARY', 'babi yang sangat banyak di semua tempat', 0);

-- ----------------------------
-- Table structure for m_kelas
-- ----------------------------
DROP TABLE IF EXISTS `m_kelas`;
CREATE TABLE `m_kelas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `level` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

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
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `saldo` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_lembaga
-- ----------------------------
INSERT INTO `m_lembaga` VALUES (1, 'SMP', 'SMP', 1410000);
INSERT INTO `m_lembaga` VALUES (2, 'MTS', 'MTS', 405000);
INSERT INTO `m_lembaga` VALUES (3, 'SMA', 'SMA', 0);
INSERT INTO `m_lembaga` VALUES (4, 'SMK', 'SMK', 0);

-- ----------------------------
-- Table structure for m_siswa
-- ----------------------------
DROP TABLE IF EXISTS `m_siswa`;
CREATE TABLE `m_siswa`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `lembaga_id` int NULL DEFAULT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `birthday` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `is_graduated` int NULL DEFAULT 0,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_siswa
-- ----------------------------
INSERT INTO `m_siswa` VALUES (1, 1, 'S2020120001', 'Nazmudin', '1996-05-31', '08568029330', 0, '2020-12-19 23:35:26.000000', NULL);
INSERT INTO `m_siswa` VALUES (2, 2, 'S2020120002', 'Nuralam', '2020-12-25', '08987728762', 0, '2020-12-25 03:47:54.000000', NULL);
INSERT INTO `m_siswa` VALUES (3, 1, 'S2020120003', 'Juhe', '2020-12-25', '08987728687', 0, '2020-12-25 13:34:51.000000', NULL);

-- ----------------------------
-- Table structure for m_tahun_ajaran
-- ----------------------------
DROP TABLE IF EXISTS `m_tahun_ajaran`;
CREATE TABLE `m_tahun_ajaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `is_active` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_tahun_ajaran
-- ----------------------------
INSERT INTO `m_tahun_ajaran` VALUES (14, '2020-2021', 1);
INSERT INTO `m_tahun_ajaran` VALUES (15, '2021-2022', 0);

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (1, 1, 'admin', '$2y$10$zmvkTBUCtqXwtrc7/umOZOckmRWjtuxM.ziB.R6wVkM0sdQCSbyJq');

-- ----------------------------
-- Table structure for m_user_type
-- ----------------------------
DROP TABLE IF EXISTS `m_user_type`;
CREATE TABLE `m_user_type`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

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
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int NULL DEFAULT NULL,
  `lembaga_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_biaya_kebutuhan
-- ----------------------------
INSERT INTO `t_biaya_kebutuhan` VALUES (1, 14, 1);
INSERT INTO `t_biaya_kebutuhan` VALUES (2, 14, 2);
INSERT INTO `t_biaya_kebutuhan` VALUES (3, 14, 4);

-- ----------------------------
-- Table structure for t_biaya_kebutuhan_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_kebutuhan_detail`;
CREATE TABLE `t_biaya_kebutuhan_detail`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `biaya_kebutuhan_id` int NULL DEFAULT NULL,
  `kebutuhan_id` int NULL DEFAULT NULL,
  `amount` int NULL DEFAULT NULL,
  `is_checked` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_biaya_kebutuhan_detail
-- ----------------------------
INSERT INTO `t_biaya_kebutuhan_detail` VALUES (1, 1, 2, 7000, 1);
INSERT INTO `t_biaya_kebutuhan_detail` VALUES (2, 1, 3, 8000, 1);
INSERT INTO `t_biaya_kebutuhan_detail` VALUES (3, 2, 2, 2000, 0);
INSERT INTO `t_biaya_kebutuhan_detail` VALUES (4, 2, 4, 3000, 0);
INSERT INTO `t_biaya_kebutuhan_detail` VALUES (5, 2, 3, 5000, 0);
INSERT INTO `t_biaya_kebutuhan_detail` VALUES (6, 3, 2, 5000, 0);
INSERT INTO `t_biaya_kebutuhan_detail` VALUES (7, 3, 4, 0, 0);
INSERT INTO `t_biaya_kebutuhan_detail` VALUES (8, 3, 3, 0, 0);

-- ----------------------------
-- Table structure for t_biaya_lembaga
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga`;
CREATE TABLE `t_biaya_lembaga`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int NULL DEFAULT NULL,
  `lembaga_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_biaya_lembaga
-- ----------------------------
INSERT INTO `t_biaya_lembaga` VALUES (6, 14, 1);
INSERT INTO `t_biaya_lembaga` VALUES (7, 14, 2);

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
) ENGINE = InnoDB AUTO_INCREMENT = 121 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_biaya_lembaga_komite
-- ----------------------------
INSERT INTO `t_biaya_lembaga_komite` VALUES (97, 6, 12, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (98, 6, 11, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (99, 6, 10, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (100, 6, 9, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (101, 6, 8, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (102, 6, 7, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (103, 6, 6, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (104, 6, 5, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (105, 6, 4, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (106, 6, 3, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (107, 6, 2, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (108, 6, 1, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (109, 7, 12, 135000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (110, 7, 11, 135000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (111, 7, 10, 135000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (112, 7, 9, 135000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (113, 7, 8, 135000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (114, 7, 7, 135000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (115, 7, 6, 135000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (116, 7, 5, 135000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (117, 7, 4, 135000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (118, 7, 3, 135000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (119, 7, 2, 135000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (120, 7, 1, 135000, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_biaya_lembaga_lainnya
-- ----------------------------
INSERT INTO `t_biaya_lembaga_lainnya` VALUES (17, 6, 2, 180000, 1);
INSERT INTO `t_biaya_lembaga_lainnya` VALUES (18, 6, 1, 125000, 1);
INSERT INTO `t_biaya_lembaga_lainnya` VALUES (19, 7, 2, 120000, 1);
INSERT INTO `t_biaya_lembaga_lainnya` VALUES (20, 7, 1, 90000, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_biaya_lembaga_semester
-- ----------------------------
INSERT INTO `t_biaya_lembaga_semester` VALUES (17, 6, 2, 250000, 1);
INSERT INTO `t_biaya_lembaga_semester` VALUES (18, 6, 1, 250000, 1);
INSERT INTO `t_biaya_lembaga_semester` VALUES (19, 7, 2, 150000, 1);
INSERT INTO `t_biaya_lembaga_semester` VALUES (20, 7, 1, 150000, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_pembayaran
-- ----------------------------
INSERT INTO `t_pembayaran` VALUES (1, 14, 1, 1, 1, 'IN/SMP/202012/0001', 525000, '2020-12-25 04:00:27.000000', 1);
INSERT INTO `t_pembayaran` VALUES (2, 14, 2, 2, 1, 'IN/MTS/202012/0002', 135000, '2020-12-25 04:01:02.000000', 1);
INSERT INTO `t_pembayaran` VALUES (3, 14, 2, 2, 1, 'IN/MTS/202012/0003', 135000, '2020-12-25 10:41:54.000000', 1);
INSERT INTO `t_pembayaran` VALUES (4, 14, 1, 3, 1, 'IN/SMP/202012/0004', 900000, '2020-12-25 13:35:21.000000', 1);
INSERT INTO `t_pembayaran` VALUES (5, 14, 2, 2, 1, 'IN/MTS/202012/0005', 135000, '2020-12-26 14:05:20.000000', 1);

-- ----------------------------
-- Table structure for t_pembayaran_komite
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_komite`;
CREATE TABLE `t_pembayaran_komite`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int NULL DEFAULT NULL,
  `biaya_lembaga_komite_id` int NULL DEFAULT NULL,
  `is_checkout` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_pembayaran_komite
-- ----------------------------
INSERT INTO `t_pembayaran_komite` VALUES (1, 1, 108, 1);
INSERT INTO `t_pembayaran_komite` VALUES (2, 1, 107, 0);
INSERT INTO `t_pembayaran_komite` VALUES (3, 1, 106, 0);
INSERT INTO `t_pembayaran_komite` VALUES (4, 1, 105, 0);
INSERT INTO `t_pembayaran_komite` VALUES (5, 1, 104, 0);
INSERT INTO `t_pembayaran_komite` VALUES (6, 1, 103, 0);
INSERT INTO `t_pembayaran_komite` VALUES (7, 1, 102, 0);
INSERT INTO `t_pembayaran_komite` VALUES (8, 1, 101, 0);
INSERT INTO `t_pembayaran_komite` VALUES (9, 1, 100, 0);
INSERT INTO `t_pembayaran_komite` VALUES (10, 1, 99, 0);
INSERT INTO `t_pembayaran_komite` VALUES (11, 1, 98, 0);
INSERT INTO `t_pembayaran_komite` VALUES (12, 1, 97, 0);
INSERT INTO `t_pembayaran_komite` VALUES (13, 2, 120, 1);
INSERT INTO `t_pembayaran_komite` VALUES (14, 2, 119, 0);
INSERT INTO `t_pembayaran_komite` VALUES (15, 2, 118, 0);
INSERT INTO `t_pembayaran_komite` VALUES (16, 2, 117, 0);
INSERT INTO `t_pembayaran_komite` VALUES (17, 2, 116, 0);
INSERT INTO `t_pembayaran_komite` VALUES (18, 2, 115, 0);
INSERT INTO `t_pembayaran_komite` VALUES (19, 2, 114, 0);
INSERT INTO `t_pembayaran_komite` VALUES (20, 2, 113, 0);
INSERT INTO `t_pembayaran_komite` VALUES (21, 2, 112, 0);
INSERT INTO `t_pembayaran_komite` VALUES (22, 2, 111, 0);
INSERT INTO `t_pembayaran_komite` VALUES (23, 2, 110, 0);
INSERT INTO `t_pembayaran_komite` VALUES (24, 2, 109, 0);
INSERT INTO `t_pembayaran_komite` VALUES (25, 3, 120, 1);
INSERT INTO `t_pembayaran_komite` VALUES (26, 3, 119, 1);
INSERT INTO `t_pembayaran_komite` VALUES (27, 3, 118, 0);
INSERT INTO `t_pembayaran_komite` VALUES (28, 3, 117, 0);
INSERT INTO `t_pembayaran_komite` VALUES (29, 3, 116, 0);
INSERT INTO `t_pembayaran_komite` VALUES (30, 3, 115, 0);
INSERT INTO `t_pembayaran_komite` VALUES (31, 3, 114, 0);
INSERT INTO `t_pembayaran_komite` VALUES (32, 3, 113, 0);
INSERT INTO `t_pembayaran_komite` VALUES (33, 3, 112, 0);
INSERT INTO `t_pembayaran_komite` VALUES (34, 3, 111, 0);
INSERT INTO `t_pembayaran_komite` VALUES (35, 3, 110, 0);
INSERT INTO `t_pembayaran_komite` VALUES (36, 3, 109, 0);
INSERT INTO `t_pembayaran_komite` VALUES (37, 4, 108, 1);
INSERT INTO `t_pembayaran_komite` VALUES (38, 4, 107, 1);
INSERT INTO `t_pembayaran_komite` VALUES (39, 4, 106, 1);
INSERT INTO `t_pembayaran_komite` VALUES (40, 4, 105, 1);
INSERT INTO `t_pembayaran_komite` VALUES (41, 4, 104, 1);
INSERT INTO `t_pembayaran_komite` VALUES (42, 4, 103, 1);
INSERT INTO `t_pembayaran_komite` VALUES (43, 4, 102, 0);
INSERT INTO `t_pembayaran_komite` VALUES (44, 4, 101, 0);
INSERT INTO `t_pembayaran_komite` VALUES (45, 4, 100, 0);
INSERT INTO `t_pembayaran_komite` VALUES (46, 4, 99, 0);
INSERT INTO `t_pembayaran_komite` VALUES (47, 4, 98, 0);
INSERT INTO `t_pembayaran_komite` VALUES (48, 4, 97, 0);
INSERT INTO `t_pembayaran_komite` VALUES (49, 5, 120, 1);
INSERT INTO `t_pembayaran_komite` VALUES (50, 5, 119, 1);
INSERT INTO `t_pembayaran_komite` VALUES (51, 5, 118, 1);
INSERT INTO `t_pembayaran_komite` VALUES (52, 5, 117, 0);
INSERT INTO `t_pembayaran_komite` VALUES (53, 5, 116, 0);
INSERT INTO `t_pembayaran_komite` VALUES (54, 5, 115, 0);
INSERT INTO `t_pembayaran_komite` VALUES (55, 5, 114, 0);
INSERT INTO `t_pembayaran_komite` VALUES (56, 5, 113, 0);
INSERT INTO `t_pembayaran_komite` VALUES (57, 5, 112, 0);
INSERT INTO `t_pembayaran_komite` VALUES (58, 5, 111, 0);
INSERT INTO `t_pembayaran_komite` VALUES (59, 5, 110, 0);
INSERT INTO `t_pembayaran_komite` VALUES (60, 5, 109, 0);

-- ----------------------------
-- Table structure for t_pembayaran_lainnya
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_lainnya`;
CREATE TABLE `t_pembayaran_lainnya`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int NULL DEFAULT NULL,
  `biaya_lembaga_lainnya_id` int NULL DEFAULT NULL,
  `is_checkout` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_pembayaran_lainnya
-- ----------------------------
INSERT INTO `t_pembayaran_lainnya` VALUES (1, 1, 18, 1);
INSERT INTO `t_pembayaran_lainnya` VALUES (2, 1, 17, 0);
INSERT INTO `t_pembayaran_lainnya` VALUES (3, 2, 20, 0);
INSERT INTO `t_pembayaran_lainnya` VALUES (4, 2, 19, 0);
INSERT INTO `t_pembayaran_lainnya` VALUES (5, 3, 20, 0);
INSERT INTO `t_pembayaran_lainnya` VALUES (6, 3, 19, 0);
INSERT INTO `t_pembayaran_lainnya` VALUES (7, 4, 18, 0);
INSERT INTO `t_pembayaran_lainnya` VALUES (8, 4, 17, 0);
INSERT INTO `t_pembayaran_lainnya` VALUES (9, 5, 20, 0);
INSERT INTO `t_pembayaran_lainnya` VALUES (10, 5, 19, 0);

-- ----------------------------
-- Table structure for t_pembayaran_semester
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_semester`;
CREATE TABLE `t_pembayaran_semester`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int NULL DEFAULT NULL,
  `biaya_lembaga_semester_id` int NULL DEFAULT NULL,
  `is_checkout` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_pembayaran_semester
-- ----------------------------
INSERT INTO `t_pembayaran_semester` VALUES (1, 1, 18, 1);
INSERT INTO `t_pembayaran_semester` VALUES (2, 1, 17, 0);
INSERT INTO `t_pembayaran_semester` VALUES (3, 2, 20, 0);
INSERT INTO `t_pembayaran_semester` VALUES (4, 2, 19, 0);
INSERT INTO `t_pembayaran_semester` VALUES (5, 3, 20, 0);
INSERT INTO `t_pembayaran_semester` VALUES (6, 3, 19, 0);
INSERT INTO `t_pembayaran_semester` VALUES (7, 4, 18, 0);
INSERT INTO `t_pembayaran_semester` VALUES (8, 4, 17, 0);
INSERT INTO `t_pembayaran_semester` VALUES (9, 5, 20, 0);
INSERT INTO `t_pembayaran_semester` VALUES (10, 5, 19, 0);

-- ----------------------------
-- Table structure for t_pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `t_pengeluaran`;
CREATE TABLE `t_pengeluaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `approval_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `receive_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `amount` int NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_pengeluaran
-- ----------------------------
INSERT INTO `t_pengeluaran` VALUES (25, 'OUT/SMP/20201226/0001', 'admin', 'nazmudin', 7000, '2020-12-26 14:02:12.000000', 1);
INSERT INTO `t_pengeluaran` VALUES (26, 'OUT/SMP/20201226/0002', 'admin', 'haha', 8000, '2020-12-26 14:21:43.000000', 1);

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
  `biaya_kebutuhan_detail_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_pengeluaran_detail
-- ----------------------------
INSERT INTO `t_pengeluaran_detail` VALUES (4, 25, 14, 1, 1, 1);
INSERT INTO `t_pengeluaran_detail` VALUES (5, 26, 14, 1, 1, 2);

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_saldo
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
