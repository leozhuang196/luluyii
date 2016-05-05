/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : luluyii

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-05-05 15:17:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lulu_user
-- ----------------------------
DROP TABLE IF EXISTS `lulu_user`;
CREATE TABLE `lulu_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lulu_user
-- ----------------------------
INSERT INTO `lulu_user` VALUES ('1', 'admin', 'J573Z_0Y8_6LMentBd1easgnsSScBQXC', '$2y$13$LMTc/mbbPqGdAVHSdkeYd.UCPB.b/KR2XYZAmJQ02o8WCDD07.U5a', null, '452936616@qq.com', '10', '1462430000', '1462432169', '127.0.0.1');
INSERT INTO `lulu_user` VALUES ('2', 'lulubin', 'YheVCoikf4ksLIryW6Niwot4Xpwko3Td', '$2y$13$YQwQgDzpTmgsrGju30nbneBmfB8.l6MOY5Q/Q.pz/S8BATVgBsf9S', null, '1363236681@qq.com', '10', '1462430049', '1462430055', '127.0.0.1');
