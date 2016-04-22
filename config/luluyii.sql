/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : luluyii

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-04-22 14:48:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lulu_auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `lulu_auth_assignment`;
CREATE TABLE `lulu_auth_assignment` (
  `user_id` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`item_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_auth_assignment
-- ----------------------------

-- ----------------------------
-- Table structure for lulu_auth_item
-- ----------------------------
DROP TABLE IF EXISTS `lulu_auth_item`;
CREATE TABLE `lulu_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `lulu_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `lulu_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lulu_auth_item
-- ----------------------------

-- ----------------------------
-- Table structure for lulu_auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `lulu_auth_item_child`;
CREATE TABLE `lulu_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `lulu_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `lulu_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lulu_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `lulu_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lulu_auth_item_child
-- ----------------------------

-- ----------------------------
-- Table structure for lulu_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `lulu_auth_rule`;
CREATE TABLE `lulu_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lulu_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for lulu_config
-- ----------------------------
DROP TABLE IF EXISTS `lulu_config`;
CREATE TABLE `lulu_config` (
  `id` varchar(64) NOT NULL,
  `value` text NOT NULL,
  `key` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_config
-- ----------------------------
INSERT INTO `lulu_config` VALUES ('1', 'luluyii', 'sys_site_name');
INSERT INTO `lulu_config` VALUES ('2', 'lulubin的第一个项目', 'sys_site_description');
INSERT INTO `lulu_config` VALUES ('3', '主题一', 'sys_site_theme');

-- ----------------------------
-- Table structure for lulu_content
-- ----------------------------
DROP TABLE IF EXISTS `lulu_content`;
CREATE TABLE `lulu_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `takonomy_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_user_name` varchar(64) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `focus_count` int(11) NOT NULL DEFAULT '0',
  `favorite_count` int(11) NOT NULL DEFAULT '0',
  `view_count` int(11) NOT NULL DEFAULT '0',
  `comment_count` int(11) NOT NULL DEFAULT '0',
  `agree_count` int(11) NOT NULL DEFAULT '0',
  `against_count` int(11) NOT NULL DEFAULT '0',
  `is_sticky` tinyint(1) NOT NULL DEFAULT '0',
  `is_recommend` tinyint(1) NOT NULL DEFAULT '0',
  `is_headline` tinyint(1) NOT NULL DEFAULT '0',
  `flag` tinyint(4) NOT NULL DEFAULT '0',
  `allow_comment` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(64) DEFAULT NULL,
  `template` varchar(64) DEFAULT NULL,
  `sort_num` int(11) NOT NULL DEFAULT '0',
  `visibility` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `content` varchar(64) NOT NULL,
  `seo_title` varchar(256) DEFAULT NULL,
  `seo_keywords` varchar(256) DEFAULT NULL,
  `seo_description` varchar(256) DEFAULT NULL,
  `title` varchar(256) NOT NULL,
  `summary` varchar(512) DEFAULT NULL,
  `thumb` varchar(256) DEFAULT NULL,
  `excerpt` varchar(255) NOT NULL,
  `alias` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_content
-- ----------------------------

-- ----------------------------
-- Table structure for lulu_customer
-- ----------------------------
DROP TABLE IF EXISTS `lulu_customer`;
CREATE TABLE `lulu_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_customer
-- ----------------------------
INSERT INTO `lulu_customer` VALUES ('1', 'zhangsan');
INSERT INTO `lulu_customer` VALUES ('2', 'lisi');

-- ----------------------------
-- Table structure for lulu_migration
-- ----------------------------
DROP TABLE IF EXISTS `lulu_migration`;
CREATE TABLE `lulu_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_migration
-- ----------------------------
INSERT INTO `lulu_migration` VALUES ('m000000_000000_base', '1460083699');
INSERT INTO `lulu_migration` VALUES ('m160308_030054_create_table_news', '1460083701');
INSERT INTO `lulu_migration` VALUES ('m160406_034253_create_table_customer', '1460083702');
INSERT INTO `lulu_migration` VALUES ('m160406_034457_create_table_order', '1460083702');

-- ----------------------------
-- Table structure for lulu_order
-- ----------------------------
DROP TABLE IF EXISTS `lulu_order`;
CREATE TABLE `lulu_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` smallint(1) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_order
-- ----------------------------
INSERT INTO `lulu_order` VALUES ('1', '1', '10');
INSERT INTO `lulu_order` VALUES ('2', '1', '20');
INSERT INTO `lulu_order` VALUES ('3', '2', '30');

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
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flags` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lulu_user
-- ----------------------------
INSERT INTO `lulu_user` VALUES ('5', 'admin', 'cNwPsB7XJ93Fp-eziBvTANdb5tK-Dpef', '$2y$13$5tZf5YGC7Gw3c/5EmpbBUeho8EH2p.ePGCDAdNctYS0qgOcJSO3zi', null, '452936616@qq.com', '30', '10', '1459492201', '1459495937', null, null, null, null, '0');
INSERT INTO `lulu_user` VALUES ('11', 'alulubin', 'yPz_8GnKK7j--XUuwuWVFblTd4GHyKqM', '$2y$13$s0adftQRqH33NnnE4pjbU.Yd3bqBlMg2Oo8EQO7dQvzdg1/Fnq1GW', null, '1436539127@qq.com', '10', '10', '1461304779', '1461304849', null, null, null, null, '0');

-- ----------------------------
-- Table structure for lulu_user_info
-- ----------------------------
DROP TABLE IF EXISTS `lulu_user_info`;
CREATE TABLE `lulu_user_info` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `job` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_user_info
-- ----------------------------
