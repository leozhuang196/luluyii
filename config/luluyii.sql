/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : luluyii

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-06-03 08:56:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lulu_post
-- ----------------------------
DROP TABLE IF EXISTS `lulu_post`;
CREATE TABLE `lulu_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(12) NOT NULL,
  `love_num` int(11) DEFAULT '0',
  `hate_num` int(11) DEFAULT '0',
  `comment_num` int(11) DEFAULT '0',
  `view_num` int(11) DEFAULT '0',
  `collection` int(11) DEFAULT '0',
  `content` varchar(10000) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT '',
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lulu_post_collection
-- ----------------------------
DROP TABLE IF EXISTS `lulu_post_collection`;
CREATE TABLE `lulu_post_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lulu_post_type
-- ----------------------------
DROP TABLE IF EXISTS `lulu_post_type`;
CREATE TABLE `lulu_post_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lulu_shop_category
-- ----------------------------
DROP TABLE IF EXISTS `lulu_shop_category`;
CREATE TABLE `lulu_shop_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `root` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `type` varchar(64) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `root` (`root`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`),
  KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lulu_shop_item
-- ----------------------------
DROP TABLE IF EXISTS `lulu_shop_item`;
CREATE TABLE `lulu_shop_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `stock` int(10) NOT NULL,
  `origin_price` decimal(10,2) NOT NULL,
  `tag_price` decimal(10,2) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `bar_code` varchar(255) NOT NULL,
  `is_new` smallint(1) NOT NULL,
  `is_hot` smallint(1) NOT NULL,
  `is_delete` smallint(1) NOT NULL,
  `view_num` int(11) NOT NULL,
  `collect_num` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_time` int(11) NOT NULL,
  `updated_time` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lulu_shop_item_sku
-- ----------------------------
DROP TABLE IF EXISTS `lulu_shop_item_sku`;
CREATE TABLE `lulu_shop_item_sku` (
  `sku_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sn` varchar(45) NOT NULL,
  `color` varchar(63) NOT NULL,
  `size` varchar(10) NOT NULL,
  PRIMARY KEY (`sku_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lulu_shop_stm
-- ----------------------------
DROP TABLE IF EXISTS `lulu_shop_stm`;
CREATE TABLE `lulu_shop_stm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_use` smallint(2) NOT NULL,
  `stm_type` smallint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lulu_shop_stm_img
-- ----------------------------
DROP TABLE IF EXISTS `lulu_shop_stm_img`;
CREATE TABLE `lulu_shop_stm_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stm_id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_stm_img_pk_1` (`stm_id`),
  CONSTRAINT `pk_stm_img_pk_1` FOREIGN KEY (`stm_id`) REFERENCES `lulu_shop_stm` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for lulu_user_fans
-- ----------------------------
DROP TABLE IF EXISTS `lulu_user_fans`;
CREATE TABLE `lulu_user_fans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(12) NOT NULL,
  `to` varchar(12) NOT NULL,
  `focus_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lulu_user_info
-- ----------------------------
DROP TABLE IF EXISTS `lulu_user_info`;
CREATE TABLE `lulu_user_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'userImage/defaultImage.jpg',
  `sex` tinyint(1) unsigned DEFAULT NULL COMMENT '0=男，1=女，2=保密',
  `qq` int(11) unsigned DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `signin_time` int(11) unsigned NOT NULL,
  `signin_day` int(11) unsigned DEFAULT NULL,
  `signature` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `message_from` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lulu_user_message
-- ----------------------------
DROP TABLE IF EXISTS `lulu_user_message`;
CREATE TABLE `lulu_user_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(12) NOT NULL,
  `to` varchar(12) NOT NULL,
  `content` varchar(255) NOT NULL,
  `send_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lulu_user_visit
-- ----------------------------
DROP TABLE IF EXISTS `lulu_user_visit`;
CREATE TABLE `lulu_user_visit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visit_ip` varchar(255) NOT NULL,
  `visit_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
