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

 Date: 09/01/2021 22:01:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_attribute_komite
-- ----------------------------
DROP TABLE IF EXISTS `m_attribute_komite`;
CREATE TABLE `m_attribute_komite`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `attribute_type_id` int(0) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `attribute_type_id` int(0) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `attribute_type_id` int(0) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `amount` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_kebutuhan
-- ----------------------------
INSERT INTO `m_kebutuhan` VALUES (1, 'Meja', 'Meja 50 Biji Untuk SMP Smester 5', 100000);
INSERT INTO `m_kebutuhan` VALUES (2, 'Pengadaan Laptop untuk LAB', 'Pengadaan Laptop untuk LAB yang di pimpin oleh bpk Junaedi', 50000);

-- ----------------------------
-- Table structure for m_kelas
-- ----------------------------
DROP TABLE IF EXISTS `m_kelas`;
CREATE TABLE `m_kelas`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `level` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `saldo` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_lembaga
-- ----------------------------
INSERT INTO `m_lembaga` VALUES (1, 'SMP', 'SMP', 6190000);
INSERT INTO `m_lembaga` VALUES (2, 'MTS', 'MTS', 260000);
INSERT INTO `m_lembaga` VALUES (3, 'SMA', 'SMA', 0);
INSERT INTO `m_lembaga` VALUES (4, 'SMK', 'SMK', 0);

-- ----------------------------
-- Table structure for m_siswa
-- ----------------------------
DROP TABLE IF EXISTS `m_siswa`;
CREATE TABLE `m_siswa`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `lembaga_id` int(0) NULL DEFAULT NULL,
  `nis` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birthday` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `is_graduated` int(0) NULL DEFAULT 0,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_siswa
-- ----------------------------
INSERT INTO `m_siswa` VALUES (1, 1, 'S2020120001', 'Nazmudin', '1996-05-31', '08568029330', 'Kp Leuwilisung, RT/RW 001/001', 0, '2020-12-19 23:35:26.000000', NULL);
INSERT INTO `m_siswa` VALUES (6, 2, 'S2021010001', 'Erin Herniawati', '2021-01-05', '08981278122', 'Kp Leuwilisung, RT/RW 001/001', 0, '2021-01-05 15:25:08.000000', NULL);
INSERT INTO `m_siswa` VALUES (7, 1, 'S2021010003', 'Rochman', '2021-01-06', '08981298912', 'Kp. Pamijahan No 05 RT/RW 002/008', 0, '2021-01-06 18:42:43.000000', NULL);

-- ----------------------------
-- Table structure for m_tahun_ajaran
-- ----------------------------
DROP TABLE IF EXISTS `m_tahun_ajaran`;
CREATE TABLE `m_tahun_ajaran`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_active` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_tahun_ajaran
-- ----------------------------
INSERT INTO `m_tahun_ajaran` VALUES (14, '2020-2021', 1);
INSERT INTO `m_tahun_ajaran` VALUES (15, '2021-2022', 0);
INSERT INTO `m_tahun_ajaran` VALUES (16, '2022-2023', 0);

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(0) NULL DEFAULT NULL,
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
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int(0) NULL DEFAULT NULL,
  `lembaga_id` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_kebutuhan
-- ----------------------------
INSERT INTO `t_biaya_kebutuhan` VALUES (1, 14, 1);

-- ----------------------------
-- Table structure for t_biaya_kebutuhan_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_kebutuhan_detail`;
CREATE TABLE `t_biaya_kebutuhan_detail`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `biaya_kebutuhan_id` int(0) NULL DEFAULT NULL,
  `kebutuhan_id` int(0) NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `is_checked` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_kebutuhan_detail
-- ----------------------------
INSERT INTO `t_biaya_kebutuhan_detail` VALUES (1, 1, 1, 5000, 'Meja 50 Biji Untuk SMP Smester 5', 1);

-- ----------------------------
-- Table structure for t_biaya_lembaga
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga`;
CREATE TABLE `t_biaya_lembaga`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int(0) NULL DEFAULT NULL,
  `lembaga_id` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_lembaga
-- ----------------------------
INSERT INTO `t_biaya_lembaga` VALUES (1, 14, 1);
INSERT INTO `t_biaya_lembaga` VALUES (2, 14, 2);

-- ----------------------------
-- Table structure for t_biaya_lembaga_komite
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga_komite`;
CREATE TABLE `t_biaya_lembaga_komite`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `biaya_lembaga_id` int(0) NULL DEFAULT NULL,
  `attribute_komite_id` int(0) NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  `is_checked` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_lembaga_komite
-- ----------------------------
INSERT INTO `t_biaya_lembaga_komite` VALUES (1, 1, 12, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (2, 1, 11, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (3, 1, 10, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (4, 1, 9, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (5, 1, 8, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (6, 1, 7, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (7, 1, 6, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (8, 1, 5, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (9, 1, 4, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (10, 1, 3, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (11, 1, 2, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (12, 1, 1, 150000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (13, 2, 12, 140000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (14, 2, 11, 140000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (15, 2, 10, 140000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (16, 2, 9, 140000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (17, 2, 8, 140000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (18, 2, 7, 140000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (19, 2, 6, 140000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (20, 2, 5, 140000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (21, 2, 4, 140000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (22, 2, 3, 140000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (23, 2, 2, 140000, 1);
INSERT INTO `t_biaya_lembaga_komite` VALUES (24, 2, 1, 140000, 1);

-- ----------------------------
-- Table structure for t_biaya_lembaga_lainnya
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga_lainnya`;
CREATE TABLE `t_biaya_lembaga_lainnya`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `biaya_lembaga_id` int(0) NULL DEFAULT NULL,
  `attribute_lainnya_id` int(0) NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  `is_checked` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_lembaga_lainnya
-- ----------------------------
INSERT INTO `t_biaya_lembaga_lainnya` VALUES (1, 1, 2, 90000, 1);
INSERT INTO `t_biaya_lembaga_lainnya` VALUES (2, 1, 1, 180000, 1);
INSERT INTO `t_biaya_lembaga_lainnya` VALUES (3, 2, 2, 90000, 1);
INSERT INTO `t_biaya_lembaga_lainnya` VALUES (4, 2, 1, 75000, 1);

-- ----------------------------
-- Table structure for t_biaya_lembaga_semester
-- ----------------------------
DROP TABLE IF EXISTS `t_biaya_lembaga_semester`;
CREATE TABLE `t_biaya_lembaga_semester`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `biaya_lembaga_id` int(0) NULL DEFAULT NULL,
  `attribute_semester_id` int(0) NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  `is_checked` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_biaya_lembaga_semester
-- ----------------------------
INSERT INTO `t_biaya_lembaga_semester` VALUES (1, 1, 4, 200000, 1);
INSERT INTO `t_biaya_lembaga_semester` VALUES (2, 1, 3, 200000, 1);
INSERT INTO `t_biaya_lembaga_semester` VALUES (3, 1, 2, 200000, 1);
INSERT INTO `t_biaya_lembaga_semester` VALUES (4, 1, 1, 200000, 1);
INSERT INTO `t_biaya_lembaga_semester` VALUES (5, 2, 4, 120000, 1);
INSERT INTO `t_biaya_lembaga_semester` VALUES (6, 2, 3, 120000, 1);
INSERT INTO `t_biaya_lembaga_semester` VALUES (7, 2, 2, 120000, 1);
INSERT INTO `t_biaya_lembaga_semester` VALUES (8, 2, 1, 120000, 1);

-- ----------------------------
-- Table structure for t_checkout
-- ----------------------------
DROP TABLE IF EXISTS `t_checkout`;
CREATE TABLE `t_checkout`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(0) NULL DEFAULT NULL,
  `kelas_id` int(0) NULL DEFAULT NULL,
  `biaya_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `biaya_type_id` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_checkout
-- ----------------------------
INSERT INTO `t_checkout` VALUES (1, 1, 1, 'komite', 12);
INSERT INTO `t_checkout` VALUES (2, 1, 1, 'komite', 11);
INSERT INTO `t_checkout` VALUES (3, 1, 1, 'komite', 10);
INSERT INTO `t_checkout` VALUES (4, 1, 1, 'semester', 4);
INSERT INTO `t_checkout` VALUES (5, 1, 1, 'lainnya', 2);
INSERT INTO `t_checkout` VALUES (6, 6, 1, 'komite', 24);
INSERT INTO `t_checkout` VALUES (7, 6, 1, 'semester', 8);
INSERT INTO `t_checkout` VALUES (8, 1, 1, 'komite', 9);
INSERT INTO `t_checkout` VALUES (9, 1, 1, 'komite', 8);
INSERT INTO `t_checkout` VALUES (10, 1, 1, 'komite', 7);
INSERT INTO `t_checkout` VALUES (11, 1, 1, 'komite', 6);
INSERT INTO `t_checkout` VALUES (12, 1, 1, 'komite', 5);
INSERT INTO `t_checkout` VALUES (13, 1, 1, 'komite', 4);
INSERT INTO `t_checkout` VALUES (14, 1, 1, 'komite', 3);
INSERT INTO `t_checkout` VALUES (15, 1, 1, 'komite', 2);
INSERT INTO `t_checkout` VALUES (16, 1, 1, 'komite', 1);
INSERT INTO `t_checkout` VALUES (17, 1, 1, 'semester', 3);
INSERT INTO `t_checkout` VALUES (18, 1, 1, 'semester', 2);
INSERT INTO `t_checkout` VALUES (19, 1, 1, 'semester', 1);
INSERT INTO `t_checkout` VALUES (20, 1, 1, 'lainnya', 1);
INSERT INTO `t_checkout` VALUES (21, 1, 2, 'komite', 12);
INSERT INTO `t_checkout` VALUES (22, 1, 2, 'komite', 11);
INSERT INTO `t_checkout` VALUES (23, 1, 2, 'komite', 10);
INSERT INTO `t_checkout` VALUES (24, 1, 2, 'semester', 4);
INSERT INTO `t_checkout` VALUES (25, 1, 2, 'lainnya', 2);
INSERT INTO `t_checkout` VALUES (26, 1, 2, 'komite', 9);
INSERT INTO `t_checkout` VALUES (27, 1, 2, 'komite', 8);
INSERT INTO `t_checkout` VALUES (28, 1, 2, 'semester', 3);
INSERT INTO `t_checkout` VALUES (29, 1, 2, 'semester', 2);
INSERT INTO `t_checkout` VALUES (30, 1, 2, 'lainnya', 1);
INSERT INTO `t_checkout` VALUES (31, 1, 2, 'komite', 7);
INSERT INTO `t_checkout` VALUES (32, 1, 2, 'komite', 6);
INSERT INTO `t_checkout` VALUES (33, 1, 2, 'semester', 1);
INSERT INTO `t_checkout` VALUES (34, 1, 2, 'komite', 5);
INSERT INTO `t_checkout` VALUES (35, 1, 2, 'komite', 4);
INSERT INTO `t_checkout` VALUES (36, 1, 2, 'komite', 3);
INSERT INTO `t_checkout` VALUES (37, 1, 2, 'komite', 2);
INSERT INTO `t_checkout` VALUES (38, 1, 2, 'komite', 1);

-- ----------------------------
-- Table structure for t_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran`;
CREATE TABLE `t_pembayaran`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int(0) NULL DEFAULT NULL,
  `lembaga_id` int(0) NULL DEFAULT NULL,
  `siswa_id` int(0) NULL DEFAULT NULL,
  `kelas_id` int(0) NULL DEFAULT NULL,
  `code` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `created_by` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pembayaran
-- ----------------------------
INSERT INTO `t_pembayaran` VALUES (3, 14, 1, 1, 1, 'IN/SMP/7/202101/0001', 150000, '2021-01-09 19:25:19.000000', 1);
INSERT INTO `t_pembayaran` VALUES (4, 14, 1, 1, 1, 'IN/SMP/7/202101/0002', 300000, '2021-01-09 19:33:22.000000', 1);
INSERT INTO `t_pembayaran` VALUES (5, 14, 1, 1, 1, 'IN/SMP/7/202101/0003', 380000, '2021-01-09 19:35:21.000000', 1);
INSERT INTO `t_pembayaran` VALUES (6, 14, 2, 6, 1, 'IN/MTS/7/202101/0004', 260000, '2021-01-09 19:37:46.000000', 1);
INSERT INTO `t_pembayaran` VALUES (7, 14, 1, 1, 1, 'IN/SMP/7/202101/0005', 2040000, '2021-01-09 19:38:54.000000', 1);
INSERT INTO `t_pembayaran` VALUES (8, 14, 1, 1, 2, 'IN/SMP/8/202101/0006', 300000, '2021-01-09 19:40:23.000000', 1);
INSERT INTO `t_pembayaran` VALUES (9, 14, 1, 1, 2, 'IN/SMP/8/202101/0007', 530000, '2021-01-09 20:48:11.000000', 1);
INSERT INTO `t_pembayaran` VALUES (10, 14, 1, 1, 2, 'IN/SMP/8/202101/0008', 790000, '2021-01-09 20:48:46.000000', 1);
INSERT INTO `t_pembayaran` VALUES (11, 14, 1, 1, 2, 'IN/SMP/8/202101/0009', 500000, '2021-01-09 20:49:17.000000', 1);
INSERT INTO `t_pembayaran` VALUES (12, 14, 1, 1, 2, 'IN/SMP/8/202101/0010', 300000, '2021-01-09 21:57:14.000000', 1);
INSERT INTO `t_pembayaran` VALUES (13, 14, 1, 1, 2, 'IN/SMP/8/202101/0011', 150000, '2021-01-09 21:57:29.000000', 1);
INSERT INTO `t_pembayaran` VALUES (14, 14, 1, 1, 2, 'IN/SMP/8/202101/0012', 300000, '2021-01-09 21:57:49.000000', 1);

-- ----------------------------
-- Table structure for t_pembayaran_komite
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_komite`;
CREATE TABLE `t_pembayaran_komite`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int(0) NULL DEFAULT NULL,
  `biaya_lembaga_komite_id` int(0) NULL DEFAULT NULL,
  `is_checkout` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pembayaran_komite
-- ----------------------------
INSERT INTO `t_pembayaran_komite` VALUES (4, 3, 12, 1);
INSERT INTO `t_pembayaran_komite` VALUES (5, 4, 11, 1);
INSERT INTO `t_pembayaran_komite` VALUES (6, 4, 10, 1);
INSERT INTO `t_pembayaran_komite` VALUES (7, 6, 24, 1);
INSERT INTO `t_pembayaran_komite` VALUES (8, 7, 9, 1);
INSERT INTO `t_pembayaran_komite` VALUES (9, 7, 8, 1);
INSERT INTO `t_pembayaran_komite` VALUES (10, 7, 7, 1);
INSERT INTO `t_pembayaran_komite` VALUES (11, 7, 6, 1);
INSERT INTO `t_pembayaran_komite` VALUES (12, 7, 5, 1);
INSERT INTO `t_pembayaran_komite` VALUES (13, 7, 4, 1);
INSERT INTO `t_pembayaran_komite` VALUES (14, 7, 3, 1);
INSERT INTO `t_pembayaran_komite` VALUES (15, 7, 2, 1);
INSERT INTO `t_pembayaran_komite` VALUES (16, 7, 1, 1);
INSERT INTO `t_pembayaran_komite` VALUES (17, 8, 12, 1);
INSERT INTO `t_pembayaran_komite` VALUES (18, 8, 11, 1);
INSERT INTO `t_pembayaran_komite` VALUES (19, 9, 10, 1);
INSERT INTO `t_pembayaran_komite` VALUES (20, 10, 9, 1);
INSERT INTO `t_pembayaran_komite` VALUES (21, 10, 8, 1);
INSERT INTO `t_pembayaran_komite` VALUES (22, 11, 7, 1);
INSERT INTO `t_pembayaran_komite` VALUES (23, 11, 6, 1);
INSERT INTO `t_pembayaran_komite` VALUES (24, 12, 5, 1);
INSERT INTO `t_pembayaran_komite` VALUES (25, 12, 4, 1);
INSERT INTO `t_pembayaran_komite` VALUES (26, 13, 3, 1);
INSERT INTO `t_pembayaran_komite` VALUES (27, 14, 2, 1);
INSERT INTO `t_pembayaran_komite` VALUES (28, 14, 1, 1);

-- ----------------------------
-- Table structure for t_pembayaran_lainnya
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_lainnya`;
CREATE TABLE `t_pembayaran_lainnya`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int(0) NULL DEFAULT NULL,
  `biaya_lembaga_lainnya_id` int(0) NULL DEFAULT NULL,
  `is_checkout` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pembayaran_lainnya
-- ----------------------------
INSERT INTO `t_pembayaran_lainnya` VALUES (1, 5, 2, 1);
INSERT INTO `t_pembayaran_lainnya` VALUES (2, 7, 1, 1);
INSERT INTO `t_pembayaran_lainnya` VALUES (3, 9, 2, 1);
INSERT INTO `t_pembayaran_lainnya` VALUES (4, 10, 1, 1);

-- ----------------------------
-- Table structure for t_pembayaran_semester
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_semester`;
CREATE TABLE `t_pembayaran_semester`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int(0) NULL DEFAULT NULL,
  `biaya_lembaga_semester_id` int(0) NULL DEFAULT NULL,
  `is_checkout` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pembayaran_semester
-- ----------------------------
INSERT INTO `t_pembayaran_semester` VALUES (1, 5, 4, 1);
INSERT INTO `t_pembayaran_semester` VALUES (2, 6, 8, 1);
INSERT INTO `t_pembayaran_semester` VALUES (3, 7, 3, 1);
INSERT INTO `t_pembayaran_semester` VALUES (4, 7, 2, 1);
INSERT INTO `t_pembayaran_semester` VALUES (5, 7, 1, 1);
INSERT INTO `t_pembayaran_semester` VALUES (6, 9, 4, 1);
INSERT INTO `t_pembayaran_semester` VALUES (7, 10, 3, 1);
INSERT INTO `t_pembayaran_semester` VALUES (8, 10, 2, 1);
INSERT INTO `t_pembayaran_semester` VALUES (9, 11, 1, 1);

-- ----------------------------
-- Table structure for t_pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `t_pengeluaran`;
CREATE TABLE `t_pengeluaran`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int(0) NULL DEFAULT NULL,
  `lembaga_id` int(0) NULL DEFAULT NULL,
  `code` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `approval_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `receive_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `created_by` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pengeluaran_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_pengeluaran_detail`;
CREATE TABLE `t_pengeluaran_detail`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `pengeluaran_id` int(0) NULL DEFAULT NULL,
  `kebutuhan_id` int(0) NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_saldo
-- ----------------------------
DROP TABLE IF EXISTS `t_saldo`;
CREATE TABLE `t_saldo`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` int(0) NULL DEFAULT NULL,
  `lembaga_id` int(0) NULL DEFAULT NULL,
  `pembayaran_id` int(0) NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
