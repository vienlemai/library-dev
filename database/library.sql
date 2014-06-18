/*
Navicat MySQL Data Transfer

Source Server         : vienlemai
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : library

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2014-06-18 08:10:20
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `accounts`
-- ----------------------------
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `loginable_id` int(11) NOT NULL,
  `loginable_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of accounts
-- ----------------------------
INSERT INTO accounts VALUES ('1', 'admin', '$2y$10$jPPMNzmU1fiP3WED.HnPxe7O.dnuzad0div6crrhc3KwFRytDYr.y', '1', 'User', 'ZNmALF6vMsaUAzyooFs69Dvj4I6hJKmSOk1EVnz2W8k6B3SZ0T94dLjUpPwG');

-- ----------------------------
-- Table structure for `activities`
-- ----------------------------
DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `author_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object_id` int(11) NOT NULL,
  `object_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of activities
-- ----------------------------

-- ----------------------------
-- Table structure for `articles`
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `barcode` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `translator` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `printer` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `size` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attach` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `storage` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `another_infor` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `barcode_printed` int(11) NOT NULL DEFAULT '0',
  `submitted_at` datetime DEFAULT NULL,
  `published_at` datetime DEFAULT NULL,
  `published_by` int(11) DEFAULT NULL,
  `error_reason` text COLLATE utf8_unicode_ci,
  `magazine_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magazine_publish_day` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magazine_additional` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magazine_special` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magazine_local` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_type` int(11) NOT NULL DEFAULT '0',
  `book_scope` int(11) NOT NULL,
  `permission` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lended` int(11) NOT NULL DEFAULT '0',
  `lost` int(11) NOT NULL DEFAULT '0',
  `lend_count` int(11) NOT NULL DEFAULT '0',
  `year_publish` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `cutter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of books
-- ----------------------------

-- ----------------------------
-- Table structure for `book_items`
-- ----------------------------
DROP TABLE IF EXISTS `book_items`;
CREATE TABLE `book_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `sequence` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book_items
-- ----------------------------

-- ----------------------------
-- Table structure for `book_type_controls`
-- ----------------------------
DROP TABLE IF EXISTS `book_type_controls`;
CREATE TABLE `book_type_controls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `book_type_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `book_id` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of book_type_controls
-- ----------------------------

-- ----------------------------
-- Table structure for `circulations`
-- ----------------------------
DROP TABLE IF EXISTS `circulations`;
CREATE TABLE `circulations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reader_id` int(11) NOT NULL,
  `book_item_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `extensions` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `returned` tinyint(1) NOT NULL DEFAULT '0',
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  `expired_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `scope` int(11) NOT NULL,
  `is_lost` tinyint(1) NOT NULL DEFAULT '0',
  `returned_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_reminded` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of circulations
-- ----------------------------

-- ----------------------------
-- Table structure for `configs`
-- ----------------------------
DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_hide` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of configs
-- ----------------------------
INSERT INTO configs VALUES ('1', 'Thời hạn thẻ', '365', 'Ngày', 'reader_expired', '0');
INSERT INTO configs VALUES ('2', 'Hạn trả tài liệu', '30', 'Ngày', 'book_expired', '0');
INSERT INTO configs VALUES ('3', 'Số tài liệu mượn tối đa mượn tại chỗ', '2', 'Cuốn', 'max_book_local', '0');
INSERT INTO configs VALUES ('4', 'Số tài liệu mượn tối đa mượn về nhà', '5', 'Cuốn', 'max_book_remote', '0');
INSERT INTO configs VALUES ('5', 'Số lần gia hạn tối đa', '2', 'Lần', 'extra_times', '0');
INSERT INTO configs VALUES ('6', 'Thời gian gia hạn thêm tài liệu', '10', 'Ngày', 'book_more_time', '0');
INSERT INTO configs VALUES ('7', 'Thời gian gia hạn thêm thẻ', '365', 'Ngày', 'reader_more_time', '0');
INSERT INTO configs VALUES ('8', 'Tiền phạt trễ hạn tài liệu', '1000', 'Đồng/ngày/cuốn', 'book_expired_fine', '0');
INSERT INTO configs VALUES ('9', 'Lần cuối quét hệ thống', '2014-06-17 09:51:12', '', 'last_execute', '1');

-- ----------------------------
-- Table structure for `cron_job`
-- ----------------------------
DROP TABLE IF EXISTS `cron_job`;
CREATE TABLE `cron_job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `return` text COLLATE utf8_unicode_ci NOT NULL,
  `runtime` float(8,2) NOT NULL,
  `cron_manager_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cron_job
-- ----------------------------

-- ----------------------------
-- Table structure for `cron_manager`
-- ----------------------------
DROP TABLE IF EXISTS `cron_manager`;
CREATE TABLE `cron_manager` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rundate` datetime NOT NULL,
  `runtime` float(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cron_manager
-- ----------------------------
INSERT INTO cron_manager VALUES ('1', '2014-05-31 23:37:12', '0.00');
INSERT INTO cron_manager VALUES ('2', '2014-05-31 23:37:42', '0.00');
INSERT INTO cron_manager VALUES ('3', '2014-05-31 23:38:52', '0.00');
INSERT INTO cron_manager VALUES ('4', '2014-05-31 23:39:19', '0.00');
INSERT INTO cron_manager VALUES ('5', '2014-05-31 23:47:38', '0.00');
INSERT INTO cron_manager VALUES ('6', '2014-05-31 23:47:38', '0.00');
INSERT INTO cron_manager VALUES ('7', '2014-05-31 23:48:05', '0.00');
INSERT INTO cron_manager VALUES ('8', '2014-05-31 23:48:05', '0.00');
INSERT INTO cron_manager VALUES ('9', '2014-05-31 23:48:09', '0.00');
INSERT INTO cron_manager VALUES ('10', '2014-05-31 23:48:12', '0.00');
INSERT INTO cron_manager VALUES ('11', '2014-05-31 23:48:15', '0.00');
INSERT INTO cron_manager VALUES ('12', '2014-05-31 23:48:15', '0.00');
INSERT INTO cron_manager VALUES ('13', '2014-05-31 23:48:19', '0.00');
INSERT INTO cron_manager VALUES ('14', '2014-05-31 23:49:14', '0.00');
INSERT INTO cron_manager VALUES ('15', '2014-05-31 23:51:15', '0.00');
INSERT INTO cron_manager VALUES ('16', '2014-05-31 23:52:04', '0.00');
INSERT INTO cron_manager VALUES ('17', '2014-05-31 23:52:39', '0.00');
INSERT INTO cron_manager VALUES ('18', '2014-05-31 23:52:55', '0.00');
INSERT INTO cron_manager VALUES ('19', '2014-05-31 23:53:40', '0.00');
INSERT INTO cron_manager VALUES ('20', '2014-05-31 23:53:53', '0.00');
INSERT INTO cron_manager VALUES ('21', '2014-05-31 23:54:06', '0.00');
INSERT INTO cron_manager VALUES ('22', '2014-05-31 23:54:32', '0.00');
INSERT INTO cron_manager VALUES ('23', '2014-05-31 23:54:37', '0.00');
INSERT INTO cron_manager VALUES ('24', '2014-05-31 23:54:41', '0.00');
INSERT INTO cron_manager VALUES ('25', '2014-05-31 23:54:55', '0.00');
INSERT INTO cron_manager VALUES ('26', '2014-05-31 23:55:24', '0.00');
INSERT INTO cron_manager VALUES ('27', '2014-05-31 23:55:30', '0.00');
INSERT INTO cron_manager VALUES ('28', '2014-05-31 23:55:35', '0.00');
INSERT INTO cron_manager VALUES ('29', '2014-05-31 23:56:00', '0.00');
INSERT INTO cron_manager VALUES ('30', '2014-05-31 23:56:09', '0.00');
INSERT INTO cron_manager VALUES ('31', '2014-05-31 23:56:13', '0.00');
INSERT INTO cron_manager VALUES ('32', '2014-05-31 23:56:16', '0.00');
INSERT INTO cron_manager VALUES ('33', '2014-05-31 23:56:34', '0.00');
INSERT INTO cron_manager VALUES ('34', '2014-05-31 23:56:40', '0.00');
INSERT INTO cron_manager VALUES ('35', '2014-05-31 23:56:43', '0.00');
INSERT INTO cron_manager VALUES ('36', '2014-05-31 23:57:05', '0.00');
INSERT INTO cron_manager VALUES ('37', '2014-05-31 23:57:10', '0.00');
INSERT INTO cron_manager VALUES ('38', '2014-05-31 23:57:36', '0.00');
INSERT INTO cron_manager VALUES ('39', '2014-05-31 23:58:15', '0.00');
INSERT INTO cron_manager VALUES ('40', '2014-05-31 23:58:54', '0.00');
INSERT INTO cron_manager VALUES ('41', '2014-05-31 23:59:58', '0.00');
INSERT INTO cron_manager VALUES ('42', '2014-06-01 00:00:00', '0.00');
INSERT INTO cron_manager VALUES ('43', '2014-06-01 00:00:04', '0.00');
INSERT INTO cron_manager VALUES ('44', '2014-06-01 00:00:08', '0.00');
INSERT INTO cron_manager VALUES ('45', '2014-06-01 00:00:15', '0.00');
INSERT INTO cron_manager VALUES ('46', '2014-06-01 00:01:48', '0.00');
INSERT INTO cron_manager VALUES ('47', '2014-06-01 00:02:30', '0.00');
INSERT INTO cron_manager VALUES ('48', '2014-06-01 00:02:33', '0.00');
INSERT INTO cron_manager VALUES ('49', '2014-06-01 00:02:35', '0.00');
INSERT INTO cron_manager VALUES ('50', '2014-06-01 00:02:50', '0.00');
INSERT INTO cron_manager VALUES ('51', '2014-06-01 00:02:58', '0.00');
INSERT INTO cron_manager VALUES ('52', '2014-06-01 00:03:01', '0.00');
INSERT INTO cron_manager VALUES ('53', '2014-06-01 00:03:04', '0.00');
INSERT INTO cron_manager VALUES ('54', '2014-06-01 00:03:17', '0.00');
INSERT INTO cron_manager VALUES ('55', '2014-06-01 00:03:26', '0.00');
INSERT INTO cron_manager VALUES ('56', '2014-06-01 00:05:24', '0.00');
INSERT INTO cron_manager VALUES ('57', '2014-06-01 00:06:05', '0.00');
INSERT INTO cron_manager VALUES ('58', '2014-06-01 00:07:08', '0.00');
INSERT INTO cron_manager VALUES ('59', '2014-06-01 00:07:34', '0.00');
INSERT INTO cron_manager VALUES ('60', '2014-06-01 00:07:34', '0.00');
INSERT INTO cron_manager VALUES ('61', '2014-06-01 00:07:41', '0.00');
INSERT INTO cron_manager VALUES ('62', '2014-06-01 00:07:41', '0.00');
INSERT INTO cron_manager VALUES ('63', '2014-06-01 00:07:49', '0.00');
INSERT INTO cron_manager VALUES ('64', '2014-06-01 00:07:49', '0.00');
INSERT INTO cron_manager VALUES ('65', '2014-06-01 00:08:00', '0.00');
INSERT INTO cron_manager VALUES ('66', '2014-06-01 00:08:04', '0.00');
INSERT INTO cron_manager VALUES ('67', '2014-06-01 00:08:09', '0.00');
INSERT INTO cron_manager VALUES ('68', '2014-06-01 00:08:30', '0.00');
INSERT INTO cron_manager VALUES ('69', '2014-06-01 00:08:53', '0.00');
INSERT INTO cron_manager VALUES ('70', '2014-06-01 00:09:14', '0.00');
INSERT INTO cron_manager VALUES ('71', '2014-06-01 00:09:40', '0.00');
INSERT INTO cron_manager VALUES ('72', '2014-06-01 00:09:43', '0.00');
INSERT INTO cron_manager VALUES ('73', '2014-06-01 00:10:12', '0.00');
INSERT INTO cron_manager VALUES ('74', '2014-06-01 00:10:55', '0.00');
INSERT INTO cron_manager VALUES ('75', '2014-06-01 00:10:59', '0.00');
INSERT INTO cron_manager VALUES ('76', '2014-06-01 00:11:05', '0.00');
INSERT INTO cron_manager VALUES ('77', '2014-06-01 00:11:21', '0.00');
INSERT INTO cron_manager VALUES ('78', '2014-06-01 00:11:24', '0.00');
INSERT INTO cron_manager VALUES ('79', '2014-06-01 00:11:28', '0.00');
INSERT INTO cron_manager VALUES ('80', '2014-06-01 00:11:35', '0.00');
INSERT INTO cron_manager VALUES ('81', '2014-06-01 00:11:39', '0.00');
INSERT INTO cron_manager VALUES ('82', '2014-06-01 00:11:47', '0.00');
INSERT INTO cron_manager VALUES ('83', '2014-06-01 00:11:52', '0.00');
INSERT INTO cron_manager VALUES ('84', '2014-06-01 00:11:54', '0.00');
INSERT INTO cron_manager VALUES ('85', '2014-06-01 00:11:59', '0.00');
INSERT INTO cron_manager VALUES ('86', '2014-06-01 00:12:01', '0.00');
INSERT INTO cron_manager VALUES ('87', '2014-06-01 00:12:08', '0.00');
INSERT INTO cron_manager VALUES ('88', '2014-06-01 00:12:08', '0.00');
INSERT INTO cron_manager VALUES ('89', '2014-06-01 00:12:11', '0.00');
INSERT INTO cron_manager VALUES ('90', '2014-06-01 00:12:21', '0.00');
INSERT INTO cron_manager VALUES ('91', '2014-06-01 00:12:21', '0.00');
INSERT INTO cron_manager VALUES ('92', '2014-06-01 00:12:22', '0.00');
INSERT INTO cron_manager VALUES ('93', '2014-06-01 00:12:22', '0.00');
INSERT INTO cron_manager VALUES ('94', '2014-06-01 00:12:23', '0.00');
INSERT INTO cron_manager VALUES ('95', '2014-06-01 00:12:24', '0.00');
INSERT INTO cron_manager VALUES ('96', '2014-06-01 00:12:36', '0.00');
INSERT INTO cron_manager VALUES ('97', '2014-06-01 00:12:43', '0.00');
INSERT INTO cron_manager VALUES ('98', '2014-06-01 00:12:43', '0.00');
INSERT INTO cron_manager VALUES ('99', '2014-06-01 00:13:04', '0.00');
INSERT INTO cron_manager VALUES ('100', '2014-06-01 00:13:07', '0.00');
INSERT INTO cron_manager VALUES ('101', '2014-06-01 00:13:07', '0.00');
INSERT INTO cron_manager VALUES ('102', '2014-06-01 00:13:53', '0.00');
INSERT INTO cron_manager VALUES ('103', '2014-06-01 00:13:53', '0.00');
INSERT INTO cron_manager VALUES ('104', '2014-06-01 00:14:18', '0.00');
INSERT INTO cron_manager VALUES ('105', '2014-06-01 00:15:57', '0.00');
INSERT INTO cron_manager VALUES ('106', '2014-06-01 00:16:03', '0.00');
INSERT INTO cron_manager VALUES ('107', '2014-06-01 00:16:21', '0.00');
INSERT INTO cron_manager VALUES ('108', '2014-06-01 00:16:21', '0.00');
INSERT INTO cron_manager VALUES ('109', '2014-06-01 00:16:26', '0.00');
INSERT INTO cron_manager VALUES ('110', '2014-06-01 00:16:30', '0.00');
INSERT INTO cron_manager VALUES ('111', '2014-06-01 00:16:34', '0.00');
INSERT INTO cron_manager VALUES ('112', '2014-06-01 00:17:35', '0.00');
INSERT INTO cron_manager VALUES ('113', '2014-06-01 00:17:41', '0.00');
INSERT INTO cron_manager VALUES ('114', '2014-06-01 00:17:50', '0.00');
INSERT INTO cron_manager VALUES ('115', '2014-06-01 00:18:12', '0.00');
INSERT INTO cron_manager VALUES ('116', '2014-06-01 00:18:15', '0.00');
INSERT INTO cron_manager VALUES ('117', '2014-06-01 00:18:20', '0.00');
INSERT INTO cron_manager VALUES ('118', '2014-06-01 00:18:20', '0.00');
INSERT INTO cron_manager VALUES ('119', '2014-06-01 00:18:22', '0.00');
INSERT INTO cron_manager VALUES ('120', '2014-06-01 00:18:23', '0.00');
INSERT INTO cron_manager VALUES ('121', '2014-06-01 00:18:27', '0.00');
INSERT INTO cron_manager VALUES ('122', '2014-06-01 00:18:35', '0.00');
INSERT INTO cron_manager VALUES ('123', '2014-06-01 00:18:35', '0.00');
INSERT INTO cron_manager VALUES ('124', '2014-06-01 00:20:05', '0.00');
INSERT INTO cron_manager VALUES ('125', '2014-06-01 00:20:19', '0.00');
INSERT INTO cron_manager VALUES ('126', '2014-06-01 00:20:29', '0.00');
INSERT INTO cron_manager VALUES ('127', '2014-06-01 00:20:32', '0.00');
INSERT INTO cron_manager VALUES ('128', '2014-06-01 00:21:38', '0.00');
INSERT INTO cron_manager VALUES ('129', '2014-06-01 00:21:38', '0.00');
INSERT INTO cron_manager VALUES ('130', '2014-06-01 00:21:39', '0.00');
INSERT INTO cron_manager VALUES ('131', '2014-06-01 00:21:54', '0.00');
INSERT INTO cron_manager VALUES ('132', '2014-06-01 00:24:39', '0.00');
INSERT INTO cron_manager VALUES ('133', '2014-06-01 00:25:00', '0.00');
INSERT INTO cron_manager VALUES ('134', '2014-06-01 00:39:25', '0.00');
INSERT INTO cron_manager VALUES ('135', '2014-06-01 00:39:56', '0.00');
INSERT INTO cron_manager VALUES ('136', '2014-06-01 00:40:20', '0.00');
INSERT INTO cron_manager VALUES ('137', '2014-06-01 00:42:01', '0.00');
INSERT INTO cron_manager VALUES ('138', '2014-06-01 00:42:20', '0.00');
INSERT INTO cron_manager VALUES ('139', '2014-06-01 00:42:38', '0.00');
INSERT INTO cron_manager VALUES ('140', '2014-06-01 00:42:52', '0.00');
INSERT INTO cron_manager VALUES ('141', '2014-06-01 00:44:44', '0.00');
INSERT INTO cron_manager VALUES ('142', '2014-06-01 00:45:12', '0.00');
INSERT INTO cron_manager VALUES ('143', '2014-06-01 00:46:44', '0.00');
INSERT INTO cron_manager VALUES ('144', '2014-06-01 00:47:06', '0.00');
INSERT INTO cron_manager VALUES ('145', '2014-06-01 00:47:42', '0.00');
INSERT INTO cron_manager VALUES ('146', '2014-06-01 00:48:43', '0.00');
INSERT INTO cron_manager VALUES ('147', '2014-06-01 00:49:32', '0.00');

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO groups VALUES ('1', 'Quản trị', '[1,2,3,4,5,6]', '2014-06-17 18:04:27', '2014-06-17 18:04:27');
INSERT INTO groups VALUES ('2', 'Biên mục', '[1]', '2014-06-17 18:04:28', '2014-06-17 18:04:28');
INSERT INTO groups VALUES ('3', 'Kiểm duyệt', '[2]', '2014-06-17 18:04:28', '2014-06-17 18:04:28');
INSERT INTO groups VALUES ('4', 'Thủ thư', '[3]', '2014-06-17 18:04:28', '2014-06-17 18:04:28');

-- ----------------------------
-- Table structure for `inventories`
-- ----------------------------
DROP TABLE IF EXISTS `inventories`;
CREATE TABLE `inventories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `number_of_book` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of inventories
-- ----------------------------

-- ----------------------------
-- Table structure for `lost_books`
-- ----------------------------
DROP TABLE IF EXISTS `lost_books`;
CREATE TABLE `lost_books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `circulation_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lost_books
-- ----------------------------

-- ----------------------------
-- Table structure for `mail_queues`
-- ----------------------------
DROP TABLE IF EXISTS `mail_queues`;
CREATE TABLE `mail_queues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mail_to` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mail_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mail_queues
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO migrations VALUES ('2014_03_17_161412_create_books_table', '1');
INSERT INTO migrations VALUES ('2012_12_06_225921_migration_cartalyst_sentry_install_users', '2');
INSERT INTO migrations VALUES ('2012_12_06_225929_migration_cartalyst_sentry_install_groups', '2');
INSERT INTO migrations VALUES ('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', '2');
INSERT INTO migrations VALUES ('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', '2');
INSERT INTO migrations VALUES ('2014_03_19_165539_create_storages_table', '3');
INSERT INTO migrations VALUES ('2014_04_07_205653_create_reader_table', '4');
INSERT INTO migrations VALUES ('2014_04_07_222004_readers_add_column_status', '4');
INSERT INTO migrations VALUES ('2014_04_08_092017_reader_add_created_by', '4');
INSERT INTO migrations VALUES ('2014_04_08_212215_create_configs_table', '4');
INSERT INTO migrations VALUES ('2014_04_08_213934_configs_add_column_key', '4');
INSERT INTO migrations VALUES ('2014_04_12_123725_readers_add_avatar', '4');
INSERT INTO migrations VALUES ('2014_04_12_142515_readers_add_day_expired', '4');
INSERT INTO migrations VALUES ('2014_04_16_233727_create_table_circulations', '5');
INSERT INTO migrations VALUES ('2014_04_17_184845_circulation_add_status', '5');
INSERT INTO migrations VALUES ('2014_04_17_193458_circulation_add_expired_at', '6');
INSERT INTO migrations VALUES ('2014_04_17_194756_circulation_add_expired_at2', '7');
INSERT INTO migrations VALUES ('2014_04_16_000854_create_activities_table', '8');
INSERT INTO migrations VALUES ('2014_04_20_122309_readers_add_expired', '9');
INSERT INTO migrations VALUES ('2014_04_22_220457_create_table_inventories', '10');
INSERT INTO migrations VALUES ('2014_04_22_221720_inventories_add_reason', '11');
INSERT INTO migrations VALUES ('2014_04_22_222302_add_author_type_to_activities', '12');
INSERT INTO migrations VALUES ('2014_04_22_233011_inventories_add_update_at', '12');
INSERT INTO migrations VALUES ('2014_04_22_231709_remove_activity_type_from_activities_table', '13');
INSERT INTO migrations VALUES ('2014_04_22_232416_reogranize_activities_table', '13');
INSERT INTO migrations VALUES ('2014_04_23_210446_inventories_add_number_of_book', '14');
INSERT INTO migrations VALUES ('2014_05_03_102422_remove_author_class_from_activities', '15');
INSERT INTO migrations VALUES ('2014_05_03_125537_create_user_table', '15');
INSERT INTO migrations VALUES ('2014_05_03_141408_user_add_remember_token', '16');
INSERT INTO migrations VALUES ('2014_05_03_143638_user_add_email', '17');
INSERT INTO migrations VALUES ('2014_05_04_082523_user_add_routes', '18');
INSERT INTO migrations VALUES ('2014_05_04_000330_restructure_activities', '19');
INSERT INTO migrations VALUES ('2014_05_05_220722_book_add_field_magazine', '20');
INSERT INTO migrations VALUES ('2014_05_06_222313_reader_add_type', '21');
INSERT INTO migrations VALUES ('2014_05_06_234146_book_add_scope', '22');
INSERT INTO migrations VALUES ('2014_05_07_003812_book_rename_scope', '23');
INSERT INTO migrations VALUES ('2014_05_07_100813_book_change_type_permission', '24');
INSERT INTO migrations VALUES ('2014_05_07_101047_book_add_permission_again', '25');
INSERT INTO migrations VALUES ('2014_05_08_215045_circulation_add_scope', '26');
INSERT INTO migrations VALUES ('2014_05_16_000136_book_add_lended', '27');
INSERT INTO migrations VALUES ('2014_05_24_082559_reader_add_department', '28');
INSERT INTO migrations VALUES ('2014_05_24_102746_create_table_system_config', '29');
INSERT INTO migrations VALUES ('2014_05_24_135232_create_accounts_table', '30');
INSERT INTO migrations VALUES ('2014_05_25_112113_reader_make_department_nullable', '31');
INSERT INTO migrations VALUES ('2014_05_25_113020_account_make_token_nullable', '32');
INSERT INTO migrations VALUES ('2014_05_25_114518_create_table_lost_books', '33');
INSERT INTO migrations VALUES ('2014_05_25_114926_circulation_add_is_lost', '34');
INSERT INTO migrations VALUES ('2014_05_25_115634_books_add_lost', '35');
INSERT INTO migrations VALUES ('2014_05_27_204226_circulatinon_add_returned_at', '36');
INSERT INTO migrations VALUES ('2014_05_27_232240_book_make_cutter_ai', '37');
INSERT INTO migrations VALUES ('2014_05_27_233832_book_make_cutter_ai_2', '38');
INSERT INTO migrations VALUES ('2014_05_27_234420_book_item_add_cutter', '39');
INSERT INTO migrations VALUES ('2014_05_27_231446_create_orders_table', '40');
INSERT INTO migrations VALUES ('2014_05_28_084138_reader_add_card_number', '40');
INSERT INTO migrations VALUES ('2014_05_28_085659_create_table_mail_queues', '41');
INSERT INTO migrations VALUES ('2014_05_28_212801_reader_add_is_reminded', '42');
INSERT INTO migrations VALUES ('2014_05_29_135450_order_add_pick_up_at', '43');
INSERT INTO migrations VALUES ('2014_05_29_143812_order_add_scope', '44');
INSERT INTO migrations VALUES ('2014_05_30_002201_order_add_reason', '45');
INSERT INTO migrations VALUES ('2014_05_30_231215_update_orders_table', '46');
INSERT INTO migrations VALUES ('2013_06_27_143953_create_cronmanager_table', '47');
INSERT INTO migrations VALUES ('2013_06_27_144035_create_cronjob_table', '47');
INSERT INTO migrations VALUES ('2014_05_31_154327_delete_system_config', '48');
INSERT INTO migrations VALUES ('2014_06_01_212123_book_add_lend_count', '48');
INSERT INTO migrations VALUES ('2014_06_03_214212_create_articles', '49');
INSERT INTO migrations VALUES ('2014_06_06_215355_create_table_cutter_controls', '50');
INSERT INTO migrations VALUES ('2014_06_06_222030_book_item_remove_cutter', '51');
INSERT INTO migrations VALUES ('2014_06_06_222205_book_item_add_sequence', '51');
INSERT INTO migrations VALUES ('2014_06_06_232821_book_add_year_publish', '52');
INSERT INTO migrations VALUES ('2014_06_11_062029_books_add_cutter_again', '53');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reader_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `scope` int(11) NOT NULL,
  `pick_up_at` timestamp NULL DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL,
  `rejected_at` datetime DEFAULT NULL,
  `reason_reject` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for `password_reminders`
-- ----------------------------
DROP TABLE IF EXISTS `password_reminders`;
CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_reminders
-- ----------------------------

-- ----------------------------
-- Table structure for `readers`
-- ----------------------------
DROP TABLE IF EXISTS `readers`;
CREATE TABLE `readers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `barcode` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `year_of_birth` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hometown` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_year` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expired_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  `reader_type` int(11) NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of readers
-- ----------------------------

-- ----------------------------
-- Table structure for `storages`
-- ----------------------------
DROP TABLE IF EXISTS `storages`;
CREATE TABLE `storages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `storages_parent_id_index` (`parent_id`),
  KEY `storages_lft_index` (`lft`),
  KEY `storages_rgt_index` (`rgt`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of storages
-- ----------------------------
INSERT INTO storages VALUES ('1', null, '1', '2', '0', '2014-06-04 00:20:52', '2014-06-04 00:20:52', 'Tài liệu tham khảo');
INSERT INTO storages VALUES ('2', null, '3', '22', '0', '2014-06-04 00:20:52', '2014-06-04 00:20:53', 'Tư liệu giáo khoa');
INSERT INTO storages VALUES ('3', '2', '4', '5', '1', '2014-06-04 00:20:52', '2014-06-04 00:20:52', 'Luật');
INSERT INTO storages VALUES ('4', '2', '6', '7', '1', '2014-06-04 00:20:52', '2014-06-04 00:20:52', 'Tham Khảo');
INSERT INTO storages VALUES ('5', '2', '8', '9', '1', '2014-06-04 00:20:52', '2014-06-04 00:20:52', 'Nghiệp vụ cơ bản');
INSERT INTO storages VALUES ('6', '2', '10', '21', '1', '2014-06-04 00:20:52', '2014-06-04 00:20:53', 'Chuyên ngành');
INSERT INTO storages VALUES ('7', '6', '11', '12', '2', '2014-06-04 00:20:52', '2014-06-04 00:20:52', 'Đường thủy');
INSERT INTO storages VALUES ('8', '6', '13', '14', '2', '2014-06-04 00:20:52', '2014-06-04 00:20:52', 'Đường bộ - Đường sắt');
INSERT INTO storages VALUES ('9', '6', '15', '16', '2', '2014-06-04 00:20:52', '2014-06-04 00:20:53', 'Ma túy');
INSERT INTO storages VALUES ('10', '6', '17', '18', '2', '2014-06-04 00:20:53', '2014-06-04 00:20:53', 'Hình sự');
INSERT INTO storages VALUES ('11', '6', '19', '20', '2', '2014-06-04 00:20:53', '2014-06-04 00:20:53', 'Quản lý hành chính');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '0',
  `permissions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `routes` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO users VALUES ('1', 'admin', '$2y$10$38ZiVdWD1vItGbRl1dOeruTwi152kJFGpRTR2yqvUCqPrp.QAtOl2', '1', 'Quản trị viên', '', '1', '[]', '2014-06-17 18:04:28', '2014-06-17 18:04:28', '', 'admin@email.com', '[\"book.catalog\",\"book.create\",\"book.edit\",\"book.catalog.view\",\"book.barcode\",\"book.label\",\"book.submit\",\"book.save\",\"book.update\",\"book.import\",\"book.export.choose\",\"book.moderate\",\"book.moderate.view\",\"book.disapprove\",\"book.publish\",\"book.barcode\",\"book.label\",\"circulation\",\"book.library\",\"book.library.view\",\"book.barcode\",\"readers\",\"reader.create\",\"reader.view\",\"reader.edit\",\"reader.card\",\"reader.pause\",\"reader.unpause\",\"order\",\"book.label\",\"inventory.index\",\"inventory.create\",\"inventory.execute\",\"inventory.result\",\"inventory.print\",\"statistics.reader\",\"statistics.book\",\"statistics.circulation\",\"statistics.user\",\"send.mail\",\"configs\",\"users\",\"user.create\",\"user.view\",\"user.edit\",\"user.permission\",\"articles\",\"article.create\",\"article.edit\",\"article.active\",\"article.unactive\",\"home\"]');
