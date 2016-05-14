/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : luluyii

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-05-14 17:04:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lulu_post
-- ----------------------------
DROP TABLE IF EXISTS `lulu_post`;
CREATE TABLE `lulu_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `author` varchar(12) NOT NULL,
  `love_num` int(11) DEFAULT '0',
  `hate_num` int(11) DEFAULT '0',
  `comment_num` int(11) DEFAULT '0',
  `view_num` int(11) DEFAULT '0',
  `collection` int(11) DEFAULT '0',
  `content` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lulu_user
-- ----------------------------
DROP TABLE IF EXISTS `lulu_user`;
CREATE TABLE `lulu_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for lulu_user_fans
-- ----------------------------
DROP TABLE IF EXISTS `lulu_user_fans`;
CREATE TABLE `lulu_user_fans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(12) NOT NULL COMMENT '关注者',
  `to` varchar(12) NOT NULL COMMENT '被关注者',
  `focus_time` int(11) NOT NULL COMMENT '关注时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lulu_user_info
-- ----------------------------
DROP TABLE IF EXISTS `lulu_user_info`;
CREATE TABLE `lulu_user_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'images/default.jpg',
  `sex` tinyint(1) unsigned DEFAULT NULL COMMENT '0=男，1=女，2=保密',
  `qq` int(11) unsigned DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT '0' COMMENT '积分',
  `signin_time` int(11) DEFAULT NULL COMMENT '签到时间',
  `signature` varchar(255) DEFAULT NULL COMMENT '个性签名',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
