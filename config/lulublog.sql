/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : lulublog

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-04-01 17:35:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lulu_auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `lulu_auth_assignment`;
CREATE TABLE `lulu_auth_assignment` (
  `user` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL,
  `created_at` int(11) NOT NULL,
  `note` text,
  PRIMARY KEY (`user`,`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_auth_assignment
-- ----------------------------
INSERT INTO `lulu_auth_assignment` VALUES ('admin111', 'administrator', '1427599963', null);

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
INSERT INTO `lulu_auth_item` VALUES ('A_BASIC_OPERATION_WEIXIN', '2', '微信基本操作', null, null, '1435547821', '1435547821');
INSERT INTO `lulu_auth_item` VALUES ('A_BASIC_SITE_WEIXIN', '2', '微站基本操作', null, null, '1435547821', '1435547821');
INSERT INTO `lulu_auth_item` VALUES ('A_MODIFY_PASSWORD', '2', '密码管理', null, null, '1435547821', '1435547821');
INSERT INTO `lulu_auth_item` VALUES ('A_MODIFY_ROLE', '2', '角色组管理', null, null, '1435547821', '1435547821');
INSERT INTO `lulu_auth_item` VALUES ('A_MODIFY_USER', '2', '用户组管理', null, null, '1435547821', '1435547821');
INSERT INTO `lulu_auth_item` VALUES ('A_MODIFY_WEIXIN', '2', '微信账号管理', null, null, '1435547821', '1435547821');
INSERT INTO `lulu_auth_item` VALUES ('A_VIEW_WEIXIN', '2', '微信账号查询', null, null, '1435547821', '1435547821');

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
INSERT INTO `lulu_config` VALUES ('1', 'lulublog', 'sys_site_name');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_content
-- ----------------------------

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
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flags` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lulu_user
-- ----------------------------
INSERT INTO `lulu_user` VALUES ('5', 'admin', 'cNwPsB7XJ93Fp-eziBvTANdb5tK-Dpef', '$2y$13$5tZf5YGC7Gw3c/5EmpbBUeho8EH2p.ePGCDAdNctYS0qgOcJSO3zi', null, '452936616@qq.com', '10', '1459492201', '1459495937', null, null, null, null, '0');
