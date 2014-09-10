/*
Navicat MySQL Data Transfer

Source Server         : vienlemai
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : library

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2014-09-10 13:45:35
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of accounts
-- ----------------------------
INSERT INTO accounts VALUES ('1', 'admin', '$2y$10$jPPMNzmU1fiP3WED.HnPxe7O.dnuzad0div6crrhc3KwFRytDYr.y', '1', 'User', '');
INSERT INTO accounts VALUES ('2', 'lemaibk08@gmail.com', '$2y$10$5szXsazOSbqKpT6BC1DsEe81Hb2uK8YD/1o9NkYKabbMBNJPSupYC', '1', 'Reader', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of activities
-- ----------------------------
INSERT INTO activities VALUES ('1', '1', 'User', 'submited_book', 'catolog', '1', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('2', '1', 'User', 'submited_book', 'catolog', '2', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('3', '1', 'User', 'submited_book', 'catolog', '3', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('4', '1', 'User', 'submited_book', 'catolog', '4', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('5', '1', 'User', 'submited_book', 'catolog', '5', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('6', '1', 'User', 'submited_book', 'catolog', '6', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('7', '1', 'User', 'submited_book', 'catolog', '7', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('8', '1', 'User', 'submited_book', 'catolog', '8', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('9', '1', 'User', 'submited_book', 'catolog', '9', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('10', '1', 'User', 'submited_book', 'catolog', '10', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('11', '1', 'User', 'submited_book', 'catolog', '11', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('12', '1', 'User', 'submited_book', 'catolog', '12', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('13', '1', 'User', 'submited_book', 'catolog', '13', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('14', '1', 'User', 'submited_book', 'catolog', '14', 'Book', '2014-09-10 09:48:23');
INSERT INTO activities VALUES ('15', '1', 'User', 'published_book', 'catolog', '1', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('16', '1', 'User', 'published_book', 'catolog', '2', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('17', '1', 'User', 'published_book', 'catolog', '3', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('18', '1', 'User', 'published_book', 'catolog', '4', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('19', '1', 'User', 'published_book', 'catolog', '5', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('20', '1', 'User', 'published_book', 'catolog', '6', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('21', '1', 'User', 'published_book', 'catolog', '7', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('22', '1', 'User', 'published_book', 'catolog', '8', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('23', '1', 'User', 'published_book', 'catolog', '9', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('24', '1', 'User', 'published_book', 'catolog', '10', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('25', '1', 'User', 'published_book', 'catolog', '11', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('26', '1', 'User', 'published_book', 'catolog', '12', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('27', '1', 'User', 'published_book', 'catolog', '13', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('28', '1', 'User', 'published_book', 'catolog', '14', 'Book', '2014-09-10 09:48:40');
INSERT INTO activities VALUES ('29', '1', 'User', 'added_card', 'management', '1', 'Reader', '2014-09-10 10:50:26');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO books VALUES ('1', '893222092', 'Kinh dịch diễn giải', null, 'Nguyễn Duy Cần', null, 'Nhã Nam', null, '20', null, null, null, null, '1', null, '1', '20', '2', null, '3', '2014-09-10 09:46:31', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '0', '[3, 1]', '0', '0', '0', '1995', 'GIA-D');
INSERT INTO books VALUES ('2', '893216479', 'Có một phố vừa đi qua phố', null, 'Đinh Vũ Hoàng Nguyên', null, null, null, '40', null, null, null, null, '2', null, '11', '30', '3', null, '3', '2014-09-10 09:46:31', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '1', '[3]', '0', '0', '0', '1999', 'GIA-D');
INSERT INTO books VALUES ('3', '893129240', 'Hành trình về phương Đông', null, 'Hesen', null, 'NXB Văn học', null, '30', null, null, null, null, '3', null, '7', '30', '2', null, '3', '2014-09-10 09:46:32', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '1', '[3, 1]', '0', '0', '0', '1995', 'GIA-D');
INSERT INTO books VALUES ('4', '893283530', 'Cái cười của thánh nhân', null, 'Nguyễn Duy Cần', null, 'NXB Tôn giáo', null, '30', null, null, null, null, '4', null, '8', '20', '2', null, '3', '2014-09-10 09:46:32', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '1', '[3, 1, 2]', '0', '0', '0', '1992', 'GIA-D');
INSERT INTO books VALUES ('5', '893297315', 'Đường mây qua xứ tuyết', null, 'ANAGARIKA GOVINDA', 'Nguyên Phong', 'NXB Tôn giáo', null, '50', null, null, null, null, '5', null, '8', '20', '1', null, '3', '2014-09-10 09:46:32', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '1', '[1]', '0', '0', '0', '2000', 'GIA-D');
INSERT INTO books VALUES ('6', '893555809', 'Kỹ thuật lập trình C', null, 'Nguyễn Văn Ất', null, 'NXB KHKT', null, '30', null, null, null, null, '6', null, '4', '10', '3', null, '3', '2014-09-10 09:46:32', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '1', '[3, 2]', '0', '0', '0', '1990', 'GIA-D');
INSERT INTO books VALUES ('7', '893266479', 'Khoa học máy tính', null, 'Quách Tuấn Ngọc', null, 'NXB Đà Nẵng', null, '20', null, null, null, null, '7', null, '4', '20', '2', null, '3', '2014-09-10 09:46:32', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '0', '[3, 1]', '0', '0', '0', '1868', 'GIA-D');
INSERT INTO books VALUES ('8', '893141017', 'Em sẽ đến cùng cơn mưa', null, 'Chưa rõ', null, 'NXB Kim Đồng', null, '20', null, null, null, null, '8', null, '5', '10', '1', null, '3', '2014-09-10 09:46:32', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '0', '[3, 1, 2]', '0', '0', '0', '1987', 'GIA-D');
INSERT INTO books VALUES ('9', '893232902', 'Tay cự phách', null, 'Chưa rõ', null, 'NXB Văn học', null, '20', null, null, null, null, '9', null, '5', '10', '2', null, '3', '2014-09-10 09:46:33', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '1', '[3]', '0', '0', '0', '2001', 'GIA-D');
INSERT INTO books VALUES ('10', '893288734', 'Trang Tử Nam Hoa Kinh', null, 'Nguyễn Duy Cần', null, 'NXB Tôn giáo', null, '50', null, null, null, null, '10', null, '1', '30', '1', null, '3', '2014-09-10 09:46:33', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '1', '[3, 2]', '0', '0', '0', '2014', 'GIA-D');
INSERT INTO books VALUES ('11', '893299016', 'Lão Tử Đạo Đức Kinh', null, 'Nguyễn Duy Cần', null, 'NXB Tôn giáo', null, '50', null, null, null, null, '11', null, '4', '50', '2', null, '3', '2014-09-10 09:46:33', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '1', '[3]', '0', '0', '0', '2013', 'GIA-D');
INSERT INTO books VALUES ('12', '893930973', 'Lịch sử Trung Quốc', null, 'Nguyễn Hiến Lê', null, 'NXB Văn hóa', null, '20', null, null, null, null, '12', null, '7', '20', '1', null, '3', '2014-09-10 09:46:33', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '1', '[3, 1]', '0', '0', '0', '1998', 'GIA-D');
INSERT INTO books VALUES ('13', '893410981', 'Hồi ký Nguyễn Hiến Lê ', null, 'Nguyễn Hiến Lê', null, 'NXB Cần Thơ', null, '20', null, null, null, null, '13', null, '7', '20', '1', null, '3', '2014-09-10 09:46:33', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '1', '[3]', '0', '0', '0', '1998', 'GIA-D');
INSERT INTO books VALUES ('14', '893109653', 'Toán cao cấp', null, 'Hoàng Tụy', null, 'NXB Hà Nội', null, '20', null, null, null, null, '14', null, '4', '30', '1', null, '3', '2014-09-10 09:46:33', '2014-09-10 09:48:40', '1', '0', '2014-09-10 09:48:23', '2014-09-10 09:48:40', '1', null, null, null, null, null, null, '1', '0', '[3, 1, 2]', '0', '0', '0', '1998', 'GIA-D');
INSERT INTO books VALUES ('16', '893938481', 'Tạp chí 1', null, '', null, null, null, null, null, null, null, null, '145', null, '1', '20', '2', null, '0', '2014-09-10 10:44:52', '2014-09-10 10:44:52', '1', '0', null, null, null, null, null, null, null, null, null, '2', '0', '[3, 1]', '0', '0', '0', '1990', 'E-345');
INSERT INTO books VALUES ('17', '893950025', 'Tạp chí 2', null, '', null, null, null, null, null, null, null, null, '178', null, '11', '30', '3', null, '0', '2014-09-10 10:44:52', '2014-09-10 10:44:52', '1', '0', null, null, null, null, null, null, null, null, null, '2', '1', '[3]', '0', '0', '0', '1965', 'D-898');
INSERT INTO books VALUES ('18', '893285640', 'Kinh dịch diễn giải', null, 'Nguyễn Duy Cần', null, 'Nhã Nam', null, '20', null, null, null, null, '1', null, '1', '20', '2', null, '0', '2014-09-10 10:45:09', '2014-09-10 10:45:09', '1', '0', null, null, null, null, null, null, null, null, null, '1', '0', '[3, 1]', '0', '0', '0', '1995', 'GIA-D');
INSERT INTO books VALUES ('19', '893214142', 'Có một phố vừa đi qua phố', null, 'Đinh Vũ Hoàng Nguyên', null, null, null, '40', null, null, null, null, '2', null, '11', '30', '3', null, '0', '2014-09-10 10:45:09', '2014-09-10 10:45:09', '1', '0', null, null, null, null, null, null, null, null, null, '1', '1', '[3]', '0', '0', '0', '1999', 'GIA-D');
INSERT INTO books VALUES ('20', '893243864', 'Hành trình về phương Đông', null, 'Hesen', null, 'NXB Văn học', null, '30', null, null, null, null, '3', null, '7', '30', '2', null, '0', '2014-09-10 10:45:10', '2014-09-10 10:45:10', '1', '0', null, null, null, null, null, null, null, null, null, '1', '1', '[3, 1]', '0', '0', '0', '1995', 'GIA-D');
INSERT INTO books VALUES ('21', '893174893', 'Cái cười của thánh nhân', null, 'Nguyễn Duy Cần', null, 'NXB Tôn giáo', null, '30', null, null, null, null, '4', null, '8', '20', '2', null, '0', '2014-09-10 10:45:10', '2014-09-10 10:45:10', '1', '0', null, null, null, null, null, null, null, null, null, '1', '1', '[3, 1, 2]', '0', '0', '0', '1992', 'GIA-D');
INSERT INTO books VALUES ('22', '893127586', 'Đường mây qua xứ tuyết', null, 'ANAGARIKA GOVINDA', 'Nguyên Phong', 'NXB Tôn giáo', null, '50', null, null, null, null, '5', null, '8', '20', '1', null, '0', '2014-09-10 10:45:10', '2014-09-10 10:45:10', '1', '0', null, null, null, null, null, null, null, null, null, '1', '1', '[1]', '0', '0', '0', '2000', 'GIA-D');
INSERT INTO books VALUES ('23', '893274417', 'Kỹ thuật lập trình C', null, 'Nguyễn Văn Ất', null, 'NXB KHKT', null, '30', null, null, null, null, '6', null, '4', '10', '3', null, '0', '2014-09-10 10:45:10', '2014-09-10 10:45:10', '1', '0', null, null, null, null, null, null, null, null, null, '1', '1', '[3, 2]', '0', '0', '0', '1990', 'GIA-D');
INSERT INTO books VALUES ('24', '893106072', 'Khoa học máy tính', null, 'Quách Tuấn Ngọc', null, 'NXB Đà Nẵng', null, '20', null, null, null, null, '7', null, '4', '20', '2', null, '0', '2014-09-10 10:45:10', '2014-09-10 10:45:10', '1', '0', null, null, null, null, null, null, null, null, null, '1', '0', '[3, 1]', '0', '0', '0', '1868', 'GIA-D');
INSERT INTO books VALUES ('25', '893479192', 'Em sẽ đến cùng cơn mưa', null, 'Chưa rõ', null, 'NXB Kim Đồng', null, '20', null, null, null, null, '8', null, '5', '10', '1', null, '0', '2014-09-10 10:45:10', '2014-09-10 10:45:10', '1', '0', null, null, null, null, null, null, null, null, null, '1', '0', '[3, 1, 2]', '0', '0', '0', '1987', 'GIA-D');
INSERT INTO books VALUES ('26', '893127291', 'Tay cự phách', null, 'Chưa rõ', null, 'NXB Văn học', null, '20', null, null, null, null, '9', null, '5', '10', '2', null, '0', '2014-09-10 10:45:11', '2014-09-10 10:45:11', '1', '0', null, null, null, null, null, null, null, null, null, '1', '1', '[3]', '0', '0', '0', '2001', 'GIA-D');
INSERT INTO books VALUES ('27', '893242334', 'Trang Tử Nam Hoa Kinh', null, 'Nguyễn Duy Cần', null, 'NXB Tôn giáo', null, '50', null, null, null, null, '10', null, '1', '30', '1', null, '0', '2014-09-10 10:45:11', '2014-09-10 10:45:11', '1', '0', null, null, null, null, null, null, null, null, null, '1', '1', '[3, 2]', '0', '0', '0', '2014', 'GIA-D');
INSERT INTO books VALUES ('28', '893652706', 'Lão Tử Đạo Đức Kinh', null, 'Nguyễn Duy Cần', null, 'NXB Tôn giáo', null, '50', null, null, null, null, '11', null, '4', '50', '2', null, '0', '2014-09-10 10:45:11', '2014-09-10 10:45:11', '1', '0', null, null, null, null, null, null, null, null, null, '1', '1', '[3]', '0', '0', '0', '2013', 'GIA-D');
INSERT INTO books VALUES ('29', '893216520', 'Lịch sử Trung Quốc', null, 'Nguyễn Hiến Lê', null, 'NXB Văn hóa', null, '20', null, null, null, null, '12', null, '7', '20', '1', null, '0', '2014-09-10 10:45:11', '2014-09-10 10:45:11', '1', '0', null, null, null, null, null, null, null, null, null, '1', '1', '[3, 1]', '0', '0', '0', '1998', 'GIA-D');
INSERT INTO books VALUES ('30', '893172592', 'Hồi ký Nguyễn Hiến Lê ', null, 'Nguyễn Hiến Lê', null, 'NXB Cần Thơ', null, '20', null, null, null, null, '13', null, '7', '20', '1', null, '0', '2014-09-10 10:45:12', '2014-09-10 10:45:12', '1', '0', null, null, null, null, null, null, null, null, null, '1', '1', '[3]', '0', '0', '0', '1998', 'GIA-D');
INSERT INTO books VALUES ('31', '893115831', 'Toán cao cấp', null, 'Hoàng Tụy', null, 'NXB Hà Nội', null, '20', null, null, null, null, '14', null, '4', '30', '1', null, '0', '2014-09-10 10:45:12', '2014-09-10 10:45:12', '1', '0', null, null, null, null, null, null, null, null, null, '1', '0', '[3, 1, 2]', '0', '0', '0', '1998', 'GIA-D');

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
) ENGINE=InnoDB AUTO_INCREMENT=791 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book_items
-- ----------------------------
INSERT INTO book_items VALUES ('1', '8932220920016', '0', '1', '1');
INSERT INTO book_items VALUES ('2', '8932220920023', '0', '1', '2');
INSERT INTO book_items VALUES ('3', '8932220920030', '0', '1', '3');
INSERT INTO book_items VALUES ('4', '8932220920047', '0', '1', '4');
INSERT INTO book_items VALUES ('5', '8932220920054', '0', '1', '5');
INSERT INTO book_items VALUES ('6', '8932220920061', '0', '1', '6');
INSERT INTO book_items VALUES ('7', '8932220920078', '0', '1', '7');
INSERT INTO book_items VALUES ('8', '8932220920085', '0', '1', '8');
INSERT INTO book_items VALUES ('9', '8932220920092', '0', '1', '9');
INSERT INTO book_items VALUES ('10', '8932220920108', '0', '1', '10');
INSERT INTO book_items VALUES ('11', '8932220920115', '0', '1', '11');
INSERT INTO book_items VALUES ('12', '8932220920122', '0', '1', '12');
INSERT INTO book_items VALUES ('13', '8932220920139', '0', '1', '13');
INSERT INTO book_items VALUES ('14', '8932220920146', '0', '1', '14');
INSERT INTO book_items VALUES ('15', '8932220920153', '0', '1', '15');
INSERT INTO book_items VALUES ('16', '8932220920160', '0', '1', '16');
INSERT INTO book_items VALUES ('17', '8932220920177', '0', '1', '17');
INSERT INTO book_items VALUES ('18', '8932220920184', '0', '1', '18');
INSERT INTO book_items VALUES ('19', '8932220920191', '0', '1', '19');
INSERT INTO book_items VALUES ('20', '8932220920207', '0', '1', '20');
INSERT INTO book_items VALUES ('21', '8932164790010', '0', '2', '1');
INSERT INTO book_items VALUES ('22', '8932164790027', '0', '2', '2');
INSERT INTO book_items VALUES ('23', '8932164790034', '0', '2', '3');
INSERT INTO book_items VALUES ('24', '8932164790041', '0', '2', '4');
INSERT INTO book_items VALUES ('25', '8932164790058', '0', '2', '5');
INSERT INTO book_items VALUES ('26', '8932164790065', '0', '2', '6');
INSERT INTO book_items VALUES ('27', '8932164790072', '0', '2', '7');
INSERT INTO book_items VALUES ('28', '8932164790089', '0', '2', '8');
INSERT INTO book_items VALUES ('29', '8932164790096', '0', '2', '9');
INSERT INTO book_items VALUES ('30', '8932164790102', '0', '2', '10');
INSERT INTO book_items VALUES ('31', '8932164790119', '0', '2', '11');
INSERT INTO book_items VALUES ('32', '8932164790126', '0', '2', '12');
INSERT INTO book_items VALUES ('33', '8932164790133', '0', '2', '13');
INSERT INTO book_items VALUES ('34', '8932164790140', '0', '2', '14');
INSERT INTO book_items VALUES ('35', '8932164790157', '0', '2', '15');
INSERT INTO book_items VALUES ('36', '8932164790164', '0', '2', '16');
INSERT INTO book_items VALUES ('37', '8932164790171', '0', '2', '17');
INSERT INTO book_items VALUES ('38', '8932164790188', '0', '2', '18');
INSERT INTO book_items VALUES ('39', '8932164790195', '0', '2', '19');
INSERT INTO book_items VALUES ('40', '8932164790201', '0', '2', '20');
INSERT INTO book_items VALUES ('41', '8932164790218', '0', '2', '21');
INSERT INTO book_items VALUES ('42', '8932164790225', '0', '2', '22');
INSERT INTO book_items VALUES ('43', '8932164790232', '0', '2', '23');
INSERT INTO book_items VALUES ('44', '8932164790249', '0', '2', '24');
INSERT INTO book_items VALUES ('45', '8932164790256', '0', '2', '25');
INSERT INTO book_items VALUES ('46', '8932164790263', '0', '2', '26');
INSERT INTO book_items VALUES ('47', '8932164790270', '0', '2', '27');
INSERT INTO book_items VALUES ('48', '8932164790287', '0', '2', '28');
INSERT INTO book_items VALUES ('49', '8932164790294', '0', '2', '29');
INSERT INTO book_items VALUES ('50', '8932164790300', '0', '2', '30');
INSERT INTO book_items VALUES ('51', '8931292400013', '0', '3', '1');
INSERT INTO book_items VALUES ('52', '8931292400020', '0', '3', '2');
INSERT INTO book_items VALUES ('53', '8931292400037', '0', '3', '3');
INSERT INTO book_items VALUES ('54', '8931292400044', '0', '3', '4');
INSERT INTO book_items VALUES ('55', '8931292400051', '0', '3', '5');
INSERT INTO book_items VALUES ('56', '8931292400068', '0', '3', '6');
INSERT INTO book_items VALUES ('57', '8931292400075', '0', '3', '7');
INSERT INTO book_items VALUES ('58', '8931292400082', '0', '3', '8');
INSERT INTO book_items VALUES ('59', '8931292400099', '0', '3', '9');
INSERT INTO book_items VALUES ('60', '8931292400105', '0', '3', '10');
INSERT INTO book_items VALUES ('61', '8931292400112', '0', '3', '11');
INSERT INTO book_items VALUES ('62', '8931292400129', '0', '3', '12');
INSERT INTO book_items VALUES ('63', '8931292400136', '0', '3', '13');
INSERT INTO book_items VALUES ('64', '8931292400143', '0', '3', '14');
INSERT INTO book_items VALUES ('65', '8931292400150', '0', '3', '15');
INSERT INTO book_items VALUES ('66', '8931292400167', '0', '3', '16');
INSERT INTO book_items VALUES ('67', '8931292400174', '0', '3', '17');
INSERT INTO book_items VALUES ('68', '8931292400181', '0', '3', '18');
INSERT INTO book_items VALUES ('69', '8931292400198', '0', '3', '19');
INSERT INTO book_items VALUES ('70', '8931292400204', '0', '3', '20');
INSERT INTO book_items VALUES ('71', '8931292400211', '0', '3', '21');
INSERT INTO book_items VALUES ('72', '8931292400228', '0', '3', '22');
INSERT INTO book_items VALUES ('73', '8931292400235', '0', '3', '23');
INSERT INTO book_items VALUES ('74', '8931292400242', '0', '3', '24');
INSERT INTO book_items VALUES ('75', '8931292400259', '0', '3', '25');
INSERT INTO book_items VALUES ('76', '8931292400266', '0', '3', '26');
INSERT INTO book_items VALUES ('77', '8931292400273', '0', '3', '27');
INSERT INTO book_items VALUES ('78', '8931292400280', '0', '3', '28');
INSERT INTO book_items VALUES ('79', '8931292400297', '0', '3', '29');
INSERT INTO book_items VALUES ('80', '8931292400303', '0', '3', '30');
INSERT INTO book_items VALUES ('81', '8932835300012', '0', '4', '1');
INSERT INTO book_items VALUES ('82', '8932835300029', '0', '4', '2');
INSERT INTO book_items VALUES ('83', '8932835300036', '0', '4', '3');
INSERT INTO book_items VALUES ('84', '8932835300043', '0', '4', '4');
INSERT INTO book_items VALUES ('85', '8932835300050', '0', '4', '5');
INSERT INTO book_items VALUES ('86', '8932835300067', '0', '4', '6');
INSERT INTO book_items VALUES ('87', '8932835300074', '0', '4', '7');
INSERT INTO book_items VALUES ('88', '8932835300081', '0', '4', '8');
INSERT INTO book_items VALUES ('89', '8932835300098', '0', '4', '9');
INSERT INTO book_items VALUES ('90', '8932835300104', '0', '4', '10');
INSERT INTO book_items VALUES ('91', '8932835300111', '0', '4', '11');
INSERT INTO book_items VALUES ('92', '8932835300128', '0', '4', '12');
INSERT INTO book_items VALUES ('93', '8932835300135', '0', '4', '13');
INSERT INTO book_items VALUES ('94', '8932835300142', '0', '4', '14');
INSERT INTO book_items VALUES ('95', '8932835300159', '0', '4', '15');
INSERT INTO book_items VALUES ('96', '8932835300166', '0', '4', '16');
INSERT INTO book_items VALUES ('97', '8932835300173', '0', '4', '17');
INSERT INTO book_items VALUES ('98', '8932835300180', '0', '4', '18');
INSERT INTO book_items VALUES ('99', '8932835300197', '0', '4', '19');
INSERT INTO book_items VALUES ('100', '8932835300203', '0', '4', '20');
INSERT INTO book_items VALUES ('101', '8932973150012', '0', '5', '1');
INSERT INTO book_items VALUES ('102', '8932973150029', '0', '5', '2');
INSERT INTO book_items VALUES ('103', '8932973150036', '0', '5', '3');
INSERT INTO book_items VALUES ('104', '8932973150043', '0', '5', '4');
INSERT INTO book_items VALUES ('105', '8932973150050', '0', '5', '5');
INSERT INTO book_items VALUES ('106', '8932973150067', '0', '5', '6');
INSERT INTO book_items VALUES ('107', '8932973150074', '0', '5', '7');
INSERT INTO book_items VALUES ('108', '8932973150081', '0', '5', '8');
INSERT INTO book_items VALUES ('109', '8932973150098', '0', '5', '9');
INSERT INTO book_items VALUES ('110', '8932973150104', '0', '5', '10');
INSERT INTO book_items VALUES ('111', '8932973150111', '0', '5', '11');
INSERT INTO book_items VALUES ('112', '8932973150128', '0', '5', '12');
INSERT INTO book_items VALUES ('113', '8932973150135', '0', '5', '13');
INSERT INTO book_items VALUES ('114', '8932973150142', '0', '5', '14');
INSERT INTO book_items VALUES ('115', '8932973150159', '0', '5', '15');
INSERT INTO book_items VALUES ('116', '8932973150166', '0', '5', '16');
INSERT INTO book_items VALUES ('117', '8932973150173', '0', '5', '17');
INSERT INTO book_items VALUES ('118', '8932973150180', '0', '5', '18');
INSERT INTO book_items VALUES ('119', '8932973150197', '0', '5', '19');
INSERT INTO book_items VALUES ('120', '8932973150203', '0', '5', '20');
INSERT INTO book_items VALUES ('121', '8935558090017', '0', '6', '1');
INSERT INTO book_items VALUES ('122', '8935558090024', '0', '6', '2');
INSERT INTO book_items VALUES ('123', '8935558090031', '0', '6', '3');
INSERT INTO book_items VALUES ('124', '8935558090048', '0', '6', '4');
INSERT INTO book_items VALUES ('125', '8935558090055', '0', '6', '5');
INSERT INTO book_items VALUES ('126', '8935558090062', '0', '6', '6');
INSERT INTO book_items VALUES ('127', '8935558090079', '0', '6', '7');
INSERT INTO book_items VALUES ('128', '8935558090086', '0', '6', '8');
INSERT INTO book_items VALUES ('129', '8935558090093', '0', '6', '9');
INSERT INTO book_items VALUES ('130', '8935558090109', '0', '6', '10');
INSERT INTO book_items VALUES ('131', '8932664790015', '0', '7', '1');
INSERT INTO book_items VALUES ('132', '8932664790022', '0', '7', '2');
INSERT INTO book_items VALUES ('133', '8932664790039', '0', '7', '3');
INSERT INTO book_items VALUES ('134', '8932664790046', '0', '7', '4');
INSERT INTO book_items VALUES ('135', '8932664790053', '0', '7', '5');
INSERT INTO book_items VALUES ('136', '8932664790060', '0', '7', '6');
INSERT INTO book_items VALUES ('137', '8932664790077', '0', '7', '7');
INSERT INTO book_items VALUES ('138', '8932664790084', '0', '7', '8');
INSERT INTO book_items VALUES ('139', '8932664790091', '0', '7', '9');
INSERT INTO book_items VALUES ('140', '8932664790107', '0', '7', '10');
INSERT INTO book_items VALUES ('141', '8932664790114', '0', '7', '11');
INSERT INTO book_items VALUES ('142', '8932664790121', '0', '7', '12');
INSERT INTO book_items VALUES ('143', '8932664790138', '0', '7', '13');
INSERT INTO book_items VALUES ('144', '8932664790145', '0', '7', '14');
INSERT INTO book_items VALUES ('145', '8932664790152', '0', '7', '15');
INSERT INTO book_items VALUES ('146', '8932664790169', '0', '7', '16');
INSERT INTO book_items VALUES ('147', '8932664790176', '0', '7', '17');
INSERT INTO book_items VALUES ('148', '8932664790183', '0', '7', '18');
INSERT INTO book_items VALUES ('149', '8932664790190', '0', '7', '19');
INSERT INTO book_items VALUES ('150', '8932664790206', '0', '7', '20');
INSERT INTO book_items VALUES ('151', '8931410170019', '0', '8', '1');
INSERT INTO book_items VALUES ('152', '8931410170026', '0', '8', '2');
INSERT INTO book_items VALUES ('153', '8931410170033', '0', '8', '3');
INSERT INTO book_items VALUES ('154', '8931410170040', '0', '8', '4');
INSERT INTO book_items VALUES ('155', '8931410170057', '0', '8', '5');
INSERT INTO book_items VALUES ('156', '8931410170064', '0', '8', '6');
INSERT INTO book_items VALUES ('157', '8931410170071', '0', '8', '7');
INSERT INTO book_items VALUES ('158', '8931410170088', '0', '8', '8');
INSERT INTO book_items VALUES ('159', '8931410170095', '0', '8', '9');
INSERT INTO book_items VALUES ('160', '8931410170101', '0', '8', '10');
INSERT INTO book_items VALUES ('161', '8932329020013', '0', '9', '1');
INSERT INTO book_items VALUES ('162', '8932329020020', '0', '9', '2');
INSERT INTO book_items VALUES ('163', '8932329020037', '0', '9', '3');
INSERT INTO book_items VALUES ('164', '8932329020044', '0', '9', '4');
INSERT INTO book_items VALUES ('165', '8932329020051', '0', '9', '5');
INSERT INTO book_items VALUES ('166', '8932329020068', '0', '9', '6');
INSERT INTO book_items VALUES ('167', '8932329020075', '0', '9', '7');
INSERT INTO book_items VALUES ('168', '8932329020082', '0', '9', '8');
INSERT INTO book_items VALUES ('169', '8932329020099', '0', '9', '9');
INSERT INTO book_items VALUES ('170', '8932329020105', '0', '9', '10');
INSERT INTO book_items VALUES ('171', '8932887340011', '0', '10', '1');
INSERT INTO book_items VALUES ('172', '8932887340028', '0', '10', '2');
INSERT INTO book_items VALUES ('173', '8932887340035', '0', '10', '3');
INSERT INTO book_items VALUES ('174', '8932887340042', '0', '10', '4');
INSERT INTO book_items VALUES ('175', '8932887340059', '0', '10', '5');
INSERT INTO book_items VALUES ('176', '8932887340066', '0', '10', '6');
INSERT INTO book_items VALUES ('177', '8932887340073', '0', '10', '7');
INSERT INTO book_items VALUES ('178', '8932887340080', '0', '10', '8');
INSERT INTO book_items VALUES ('179', '8932887340097', '0', '10', '9');
INSERT INTO book_items VALUES ('180', '8932887340103', '0', '10', '10');
INSERT INTO book_items VALUES ('181', '8932887340110', '0', '10', '11');
INSERT INTO book_items VALUES ('182', '8932887340127', '0', '10', '12');
INSERT INTO book_items VALUES ('183', '8932887340134', '0', '10', '13');
INSERT INTO book_items VALUES ('184', '8932887340141', '0', '10', '14');
INSERT INTO book_items VALUES ('185', '8932887340158', '0', '10', '15');
INSERT INTO book_items VALUES ('186', '8932887340165', '0', '10', '16');
INSERT INTO book_items VALUES ('187', '8932887340172', '0', '10', '17');
INSERT INTO book_items VALUES ('188', '8932887340189', '0', '10', '18');
INSERT INTO book_items VALUES ('189', '8932887340196', '0', '10', '19');
INSERT INTO book_items VALUES ('190', '8932887340202', '0', '10', '20');
INSERT INTO book_items VALUES ('191', '8932887340219', '0', '10', '21');
INSERT INTO book_items VALUES ('192', '8932887340226', '0', '10', '22');
INSERT INTO book_items VALUES ('193', '8932887340233', '0', '10', '23');
INSERT INTO book_items VALUES ('194', '8932887340240', '0', '10', '24');
INSERT INTO book_items VALUES ('195', '8932887340257', '0', '10', '25');
INSERT INTO book_items VALUES ('196', '8932887340264', '0', '10', '26');
INSERT INTO book_items VALUES ('197', '8932887340271', '0', '10', '27');
INSERT INTO book_items VALUES ('198', '8932887340288', '0', '10', '28');
INSERT INTO book_items VALUES ('199', '8932887340295', '0', '10', '29');
INSERT INTO book_items VALUES ('200', '8932887340301', '0', '10', '30');
INSERT INTO book_items VALUES ('201', '8932990160018', '0', '11', '1');
INSERT INTO book_items VALUES ('202', '8932990160025', '0', '11', '2');
INSERT INTO book_items VALUES ('203', '8932990160032', '0', '11', '3');
INSERT INTO book_items VALUES ('204', '8932990160049', '0', '11', '4');
INSERT INTO book_items VALUES ('205', '8932990160056', '0', '11', '5');
INSERT INTO book_items VALUES ('206', '8932990160063', '0', '11', '6');
INSERT INTO book_items VALUES ('207', '8932990160070', '0', '11', '7');
INSERT INTO book_items VALUES ('208', '8932990160087', '0', '11', '8');
INSERT INTO book_items VALUES ('209', '8932990160094', '0', '11', '9');
INSERT INTO book_items VALUES ('210', '8932990160100', '0', '11', '10');
INSERT INTO book_items VALUES ('211', '8932990160117', '0', '11', '11');
INSERT INTO book_items VALUES ('212', '8932990160124', '0', '11', '12');
INSERT INTO book_items VALUES ('213', '8932990160131', '0', '11', '13');
INSERT INTO book_items VALUES ('214', '8932990160148', '0', '11', '14');
INSERT INTO book_items VALUES ('215', '8932990160155', '0', '11', '15');
INSERT INTO book_items VALUES ('216', '8932990160162', '0', '11', '16');
INSERT INTO book_items VALUES ('217', '8932990160179', '0', '11', '17');
INSERT INTO book_items VALUES ('218', '8932990160186', '0', '11', '18');
INSERT INTO book_items VALUES ('219', '8932990160193', '0', '11', '19');
INSERT INTO book_items VALUES ('220', '8932990160209', '0', '11', '20');
INSERT INTO book_items VALUES ('221', '8932990160216', '0', '11', '21');
INSERT INTO book_items VALUES ('222', '8932990160223', '0', '11', '22');
INSERT INTO book_items VALUES ('223', '8932990160230', '0', '11', '23');
INSERT INTO book_items VALUES ('224', '8932990160247', '0', '11', '24');
INSERT INTO book_items VALUES ('225', '8932990160254', '0', '11', '25');
INSERT INTO book_items VALUES ('226', '8932990160261', '0', '11', '26');
INSERT INTO book_items VALUES ('227', '8932990160278', '0', '11', '27');
INSERT INTO book_items VALUES ('228', '8932990160285', '0', '11', '28');
INSERT INTO book_items VALUES ('229', '8932990160292', '0', '11', '29');
INSERT INTO book_items VALUES ('230', '8932990160308', '0', '11', '30');
INSERT INTO book_items VALUES ('231', '8932990160315', '0', '11', '31');
INSERT INTO book_items VALUES ('232', '8932990160322', '0', '11', '32');
INSERT INTO book_items VALUES ('233', '8932990160339', '0', '11', '33');
INSERT INTO book_items VALUES ('234', '8932990160346', '0', '11', '34');
INSERT INTO book_items VALUES ('235', '8932990160353', '0', '11', '35');
INSERT INTO book_items VALUES ('236', '8932990160360', '0', '11', '36');
INSERT INTO book_items VALUES ('237', '8932990160377', '0', '11', '37');
INSERT INTO book_items VALUES ('238', '8932990160384', '0', '11', '38');
INSERT INTO book_items VALUES ('239', '8932990160391', '0', '11', '39');
INSERT INTO book_items VALUES ('240', '8932990160407', '0', '11', '40');
INSERT INTO book_items VALUES ('241', '8932990160414', '0', '11', '41');
INSERT INTO book_items VALUES ('242', '8932990160421', '0', '11', '42');
INSERT INTO book_items VALUES ('243', '8932990160438', '0', '11', '43');
INSERT INTO book_items VALUES ('244', '8932990160445', '0', '11', '44');
INSERT INTO book_items VALUES ('245', '8932990160452', '0', '11', '45');
INSERT INTO book_items VALUES ('246', '8932990160469', '0', '11', '46');
INSERT INTO book_items VALUES ('247', '8932990160476', '0', '11', '47');
INSERT INTO book_items VALUES ('248', '8932990160483', '0', '11', '48');
INSERT INTO book_items VALUES ('249', '8932990160490', '0', '11', '49');
INSERT INTO book_items VALUES ('250', '8932990160506', '0', '11', '50');
INSERT INTO book_items VALUES ('251', '8939309730016', '0', '12', '1');
INSERT INTO book_items VALUES ('252', '8939309730023', '0', '12', '2');
INSERT INTO book_items VALUES ('253', '8939309730030', '0', '12', '3');
INSERT INTO book_items VALUES ('254', '8939309730047', '0', '12', '4');
INSERT INTO book_items VALUES ('255', '8939309730054', '0', '12', '5');
INSERT INTO book_items VALUES ('256', '8939309730061', '0', '12', '6');
INSERT INTO book_items VALUES ('257', '8939309730078', '0', '12', '7');
INSERT INTO book_items VALUES ('258', '8939309730085', '0', '12', '8');
INSERT INTO book_items VALUES ('259', '8939309730092', '0', '12', '9');
INSERT INTO book_items VALUES ('260', '8939309730108', '0', '12', '10');
INSERT INTO book_items VALUES ('261', '8939309730115', '0', '12', '11');
INSERT INTO book_items VALUES ('262', '8939309730122', '0', '12', '12');
INSERT INTO book_items VALUES ('263', '8939309730139', '0', '12', '13');
INSERT INTO book_items VALUES ('264', '8939309730146', '0', '12', '14');
INSERT INTO book_items VALUES ('265', '8939309730153', '0', '12', '15');
INSERT INTO book_items VALUES ('266', '8939309730160', '0', '12', '16');
INSERT INTO book_items VALUES ('267', '8939309730177', '0', '12', '17');
INSERT INTO book_items VALUES ('268', '8939309730184', '0', '12', '18');
INSERT INTO book_items VALUES ('269', '8939309730191', '0', '12', '19');
INSERT INTO book_items VALUES ('270', '8939309730207', '0', '12', '20');
INSERT INTO book_items VALUES ('271', '8934109810012', '0', '13', '1');
INSERT INTO book_items VALUES ('272', '8934109810029', '0', '13', '2');
INSERT INTO book_items VALUES ('273', '8934109810036', '0', '13', '3');
INSERT INTO book_items VALUES ('274', '8934109810043', '0', '13', '4');
INSERT INTO book_items VALUES ('275', '8934109810050', '0', '13', '5');
INSERT INTO book_items VALUES ('276', '8934109810067', '0', '13', '6');
INSERT INTO book_items VALUES ('277', '8934109810074', '0', '13', '7');
INSERT INTO book_items VALUES ('278', '8934109810081', '0', '13', '8');
INSERT INTO book_items VALUES ('279', '8934109810098', '0', '13', '9');
INSERT INTO book_items VALUES ('280', '8934109810104', '0', '13', '10');
INSERT INTO book_items VALUES ('281', '8934109810111', '0', '13', '11');
INSERT INTO book_items VALUES ('282', '8934109810128', '0', '13', '12');
INSERT INTO book_items VALUES ('283', '8934109810135', '0', '13', '13');
INSERT INTO book_items VALUES ('284', '8934109810142', '0', '13', '14');
INSERT INTO book_items VALUES ('285', '8934109810159', '0', '13', '15');
INSERT INTO book_items VALUES ('286', '8934109810166', '0', '13', '16');
INSERT INTO book_items VALUES ('287', '8934109810173', '0', '13', '17');
INSERT INTO book_items VALUES ('288', '8934109810180', '0', '13', '18');
INSERT INTO book_items VALUES ('289', '8934109810197', '0', '13', '19');
INSERT INTO book_items VALUES ('290', '8934109810203', '0', '13', '20');
INSERT INTO book_items VALUES ('291', '8931096530015', '0', '14', '1');
INSERT INTO book_items VALUES ('292', '8931096530022', '0', '14', '2');
INSERT INTO book_items VALUES ('293', '8931096530039', '0', '14', '3');
INSERT INTO book_items VALUES ('294', '8931096530046', '0', '14', '4');
INSERT INTO book_items VALUES ('295', '8931096530053', '0', '14', '5');
INSERT INTO book_items VALUES ('296', '8931096530060', '0', '14', '6');
INSERT INTO book_items VALUES ('297', '8931096530077', '0', '14', '7');
INSERT INTO book_items VALUES ('298', '8931096530084', '0', '14', '8');
INSERT INTO book_items VALUES ('299', '8931096530091', '0', '14', '9');
INSERT INTO book_items VALUES ('300', '8931096530107', '0', '14', '10');
INSERT INTO book_items VALUES ('301', '8931096530114', '0', '14', '11');
INSERT INTO book_items VALUES ('302', '8931096530121', '0', '14', '12');
INSERT INTO book_items VALUES ('303', '8931096530138', '0', '14', '13');
INSERT INTO book_items VALUES ('304', '8931096530145', '0', '14', '14');
INSERT INTO book_items VALUES ('305', '8931096530152', '0', '14', '15');
INSERT INTO book_items VALUES ('306', '8931096530169', '0', '14', '16');
INSERT INTO book_items VALUES ('307', '8931096530176', '0', '14', '17');
INSERT INTO book_items VALUES ('308', '8931096530183', '0', '14', '18');
INSERT INTO book_items VALUES ('309', '8931096530190', '0', '14', '19');
INSERT INTO book_items VALUES ('310', '8931096530206', '0', '14', '20');
INSERT INTO book_items VALUES ('311', '8931096530213', '0', '14', '21');
INSERT INTO book_items VALUES ('312', '8931096530220', '0', '14', '22');
INSERT INTO book_items VALUES ('313', '8931096530237', '0', '14', '23');
INSERT INTO book_items VALUES ('314', '8931096530244', '0', '14', '24');
INSERT INTO book_items VALUES ('315', '8931096530251', '0', '14', '25');
INSERT INTO book_items VALUES ('316', '8931096530268', '0', '14', '26');
INSERT INTO book_items VALUES ('317', '8931096530275', '0', '14', '27');
INSERT INTO book_items VALUES ('318', '8931096530282', '0', '14', '28');
INSERT INTO book_items VALUES ('319', '8931096530299', '0', '14', '29');
INSERT INTO book_items VALUES ('320', '8931096530305', '0', '14', '30');
INSERT INTO book_items VALUES ('321', '8932087170012', '0', '15', '1');
INSERT INTO book_items VALUES ('322', '8932087170029', '0', '15', '2');
INSERT INTO book_items VALUES ('323', '8932087170036', '0', '15', '3');
INSERT INTO book_items VALUES ('324', '8932087170043', '0', '15', '4');
INSERT INTO book_items VALUES ('325', '8932087170050', '0', '15', '5');
INSERT INTO book_items VALUES ('326', '8932087170067', '0', '15', '6');
INSERT INTO book_items VALUES ('327', '8932087170074', '0', '15', '7');
INSERT INTO book_items VALUES ('328', '8932087170081', '0', '15', '8');
INSERT INTO book_items VALUES ('329', '8932087170098', '0', '15', '9');
INSERT INTO book_items VALUES ('330', '8932087170104', '0', '15', '10');
INSERT INTO book_items VALUES ('331', '8932087170111', '0', '15', '11');
INSERT INTO book_items VALUES ('332', '8932087170128', '0', '15', '12');
INSERT INTO book_items VALUES ('333', '8932087170135', '0', '15', '13');
INSERT INTO book_items VALUES ('334', '8932087170142', '0', '15', '14');
INSERT INTO book_items VALUES ('335', '8932087170159', '0', '15', '15');
INSERT INTO book_items VALUES ('336', '8932087170166', '0', '15', '16');
INSERT INTO book_items VALUES ('337', '8932087170173', '0', '15', '17');
INSERT INTO book_items VALUES ('338', '8932087170180', '0', '15', '18');
INSERT INTO book_items VALUES ('339', '8932087170197', '0', '15', '19');
INSERT INTO book_items VALUES ('340', '8932087170203', '0', '15', '20');
INSERT INTO book_items VALUES ('341', '8932087170210', '0', '15', '21');
INSERT INTO book_items VALUES ('342', '8932087170227', '0', '15', '22');
INSERT INTO book_items VALUES ('343', '8932087170234', '0', '15', '23');
INSERT INTO book_items VALUES ('344', '8932087170241', '0', '15', '24');
INSERT INTO book_items VALUES ('345', '8932087170258', '0', '15', '25');
INSERT INTO book_items VALUES ('346', '8932087170265', '0', '15', '26');
INSERT INTO book_items VALUES ('347', '8932087170272', '0', '15', '27');
INSERT INTO book_items VALUES ('348', '8932087170289', '0', '15', '28');
INSERT INTO book_items VALUES ('349', '8932087170296', '0', '15', '29');
INSERT INTO book_items VALUES ('350', '8932087170302', '0', '15', '30');
INSERT INTO book_items VALUES ('351', '8932087170319', '0', '15', '31');
INSERT INTO book_items VALUES ('352', '8932087170326', '0', '15', '32');
INSERT INTO book_items VALUES ('353', '8932087170333', '0', '15', '33');
INSERT INTO book_items VALUES ('354', '8932087170340', '0', '15', '34');
INSERT INTO book_items VALUES ('355', '8932087170357', '0', '15', '35');
INSERT INTO book_items VALUES ('356', '8932087170364', '0', '15', '36');
INSERT INTO book_items VALUES ('357', '8932087170371', '0', '15', '37');
INSERT INTO book_items VALUES ('358', '8932087170388', '0', '15', '38');
INSERT INTO book_items VALUES ('359', '8932087170395', '0', '15', '39');
INSERT INTO book_items VALUES ('360', '8932087170401', '0', '15', '40');
INSERT INTO book_items VALUES ('361', '8932087170418', '0', '15', '41');
INSERT INTO book_items VALUES ('362', '8932087170425', '0', '15', '42');
INSERT INTO book_items VALUES ('363', '8932087170432', '0', '15', '43');
INSERT INTO book_items VALUES ('364', '8932087170449', '0', '15', '44');
INSERT INTO book_items VALUES ('365', '8932087170456', '0', '15', '45');
INSERT INTO book_items VALUES ('366', '8932087170463', '0', '15', '46');
INSERT INTO book_items VALUES ('367', '8932087170470', '0', '15', '47');
INSERT INTO book_items VALUES ('368', '8932087170487', '0', '15', '48');
INSERT INTO book_items VALUES ('369', '8932087170494', '0', '15', '49');
INSERT INTO book_items VALUES ('370', '8932087170500', '0', '15', '50');
INSERT INTO book_items VALUES ('371', '8932087170517', '0', '15', '51');
INSERT INTO book_items VALUES ('372', '8932087170524', '0', '15', '52');
INSERT INTO book_items VALUES ('373', '8932087170531', '0', '15', '53');
INSERT INTO book_items VALUES ('374', '8932087170548', '0', '15', '54');
INSERT INTO book_items VALUES ('375', '8932087170555', '0', '15', '55');
INSERT INTO book_items VALUES ('376', '8932087170562', '0', '15', '56');
INSERT INTO book_items VALUES ('377', '8932087170579', '0', '15', '57');
INSERT INTO book_items VALUES ('378', '8932087170586', '0', '15', '58');
INSERT INTO book_items VALUES ('379', '8932087170593', '0', '15', '59');
INSERT INTO book_items VALUES ('380', '8932087170609', '0', '15', '60');
INSERT INTO book_items VALUES ('381', '8932087170616', '0', '15', '61');
INSERT INTO book_items VALUES ('382', '8932087170623', '0', '15', '62');
INSERT INTO book_items VALUES ('383', '8932087170630', '0', '15', '63');
INSERT INTO book_items VALUES ('384', '8932087170647', '0', '15', '64');
INSERT INTO book_items VALUES ('385', '8932087170654', '0', '15', '65');
INSERT INTO book_items VALUES ('386', '8932087170661', '0', '15', '66');
INSERT INTO book_items VALUES ('387', '8932087170678', '0', '15', '67');
INSERT INTO book_items VALUES ('388', '8932087170685', '0', '15', '68');
INSERT INTO book_items VALUES ('389', '8932087170692', '0', '15', '69');
INSERT INTO book_items VALUES ('390', '8932087170708', '0', '15', '70');
INSERT INTO book_items VALUES ('391', '8932087170715', '0', '15', '71');
INSERT INTO book_items VALUES ('392', '8932087170722', '0', '15', '72');
INSERT INTO book_items VALUES ('393', '8932087170739', '0', '15', '73');
INSERT INTO book_items VALUES ('394', '8932087170746', '0', '15', '74');
INSERT INTO book_items VALUES ('395', '8932087170753', '0', '15', '75');
INSERT INTO book_items VALUES ('396', '8932087170760', '0', '15', '76');
INSERT INTO book_items VALUES ('397', '8932087170777', '0', '15', '77');
INSERT INTO book_items VALUES ('398', '8932087170784', '0', '15', '78');
INSERT INTO book_items VALUES ('399', '8932087170791', '0', '15', '79');
INSERT INTO book_items VALUES ('400', '8932087170807', '0', '15', '80');
INSERT INTO book_items VALUES ('401', '8932087170814', '0', '15', '81');
INSERT INTO book_items VALUES ('402', '8932087170821', '0', '15', '82');
INSERT INTO book_items VALUES ('403', '8932087170838', '0', '15', '83');
INSERT INTO book_items VALUES ('404', '8932087170845', '0', '15', '84');
INSERT INTO book_items VALUES ('405', '8932087170852', '0', '15', '85');
INSERT INTO book_items VALUES ('406', '8932087170869', '0', '15', '86');
INSERT INTO book_items VALUES ('407', '8932087170876', '0', '15', '87');
INSERT INTO book_items VALUES ('408', '8932087170883', '0', '15', '88');
INSERT INTO book_items VALUES ('409', '8932087170890', '0', '15', '89');
INSERT INTO book_items VALUES ('410', '8932087170906', '0', '15', '90');
INSERT INTO book_items VALUES ('411', '8932087170913', '0', '15', '91');
INSERT INTO book_items VALUES ('412', '8932087170920', '0', '15', '92');
INSERT INTO book_items VALUES ('413', '8932087170937', '0', '15', '93');
INSERT INTO book_items VALUES ('414', '8932087170944', '0', '15', '94');
INSERT INTO book_items VALUES ('415', '8932087170951', '0', '15', '95');
INSERT INTO book_items VALUES ('416', '8932087170968', '0', '15', '96');
INSERT INTO book_items VALUES ('417', '8932087170975', '0', '15', '97');
INSERT INTO book_items VALUES ('418', '8932087170982', '0', '15', '98');
INSERT INTO book_items VALUES ('419', '8932087170999', '0', '15', '99');
INSERT INTO book_items VALUES ('420', '8932087171002', '0', '15', '100');
INSERT INTO book_items VALUES ('421', '8939384810016', '0', '16', '1');
INSERT INTO book_items VALUES ('422', '8939384810023', '0', '16', '2');
INSERT INTO book_items VALUES ('423', '8939384810030', '0', '16', '3');
INSERT INTO book_items VALUES ('424', '8939384810047', '0', '16', '4');
INSERT INTO book_items VALUES ('425', '8939384810054', '0', '16', '5');
INSERT INTO book_items VALUES ('426', '8939384810061', '0', '16', '6');
INSERT INTO book_items VALUES ('427', '8939384810078', '0', '16', '7');
INSERT INTO book_items VALUES ('428', '8939384810085', '0', '16', '8');
INSERT INTO book_items VALUES ('429', '8939384810092', '0', '16', '9');
INSERT INTO book_items VALUES ('430', '8939384810108', '0', '16', '10');
INSERT INTO book_items VALUES ('431', '8939384810115', '0', '16', '11');
INSERT INTO book_items VALUES ('432', '8939384810122', '0', '16', '12');
INSERT INTO book_items VALUES ('433', '8939384810139', '0', '16', '13');
INSERT INTO book_items VALUES ('434', '8939384810146', '0', '16', '14');
INSERT INTO book_items VALUES ('435', '8939384810153', '0', '16', '15');
INSERT INTO book_items VALUES ('436', '8939384810160', '0', '16', '16');
INSERT INTO book_items VALUES ('437', '8939384810177', '0', '16', '17');
INSERT INTO book_items VALUES ('438', '8939384810184', '0', '16', '18');
INSERT INTO book_items VALUES ('439', '8939384810191', '0', '16', '19');
INSERT INTO book_items VALUES ('440', '8939384810207', '0', '16', '20');
INSERT INTO book_items VALUES ('441', '8939500250016', '0', '17', '1');
INSERT INTO book_items VALUES ('442', '8939500250023', '0', '17', '2');
INSERT INTO book_items VALUES ('443', '8939500250030', '0', '17', '3');
INSERT INTO book_items VALUES ('444', '8939500250047', '0', '17', '4');
INSERT INTO book_items VALUES ('445', '8939500250054', '0', '17', '5');
INSERT INTO book_items VALUES ('446', '8939500250061', '0', '17', '6');
INSERT INTO book_items VALUES ('447', '8939500250078', '0', '17', '7');
INSERT INTO book_items VALUES ('448', '8939500250085', '0', '17', '8');
INSERT INTO book_items VALUES ('449', '8939500250092', '0', '17', '9');
INSERT INTO book_items VALUES ('450', '8939500250108', '0', '17', '10');
INSERT INTO book_items VALUES ('451', '8939500250115', '0', '17', '11');
INSERT INTO book_items VALUES ('452', '8939500250122', '0', '17', '12');
INSERT INTO book_items VALUES ('453', '8939500250139', '0', '17', '13');
INSERT INTO book_items VALUES ('454', '8939500250146', '0', '17', '14');
INSERT INTO book_items VALUES ('455', '8939500250153', '0', '17', '15');
INSERT INTO book_items VALUES ('456', '8939500250160', '0', '17', '16');
INSERT INTO book_items VALUES ('457', '8939500250177', '0', '17', '17');
INSERT INTO book_items VALUES ('458', '8939500250184', '0', '17', '18');
INSERT INTO book_items VALUES ('459', '8939500250191', '0', '17', '19');
INSERT INTO book_items VALUES ('460', '8939500250207', '0', '17', '20');
INSERT INTO book_items VALUES ('461', '8939500250214', '0', '17', '21');
INSERT INTO book_items VALUES ('462', '8939500250221', '0', '17', '22');
INSERT INTO book_items VALUES ('463', '8939500250238', '0', '17', '23');
INSERT INTO book_items VALUES ('464', '8939500250245', '0', '17', '24');
INSERT INTO book_items VALUES ('465', '8939500250252', '0', '17', '25');
INSERT INTO book_items VALUES ('466', '8939500250269', '0', '17', '26');
INSERT INTO book_items VALUES ('467', '8939500250276', '0', '17', '27');
INSERT INTO book_items VALUES ('468', '8939500250283', '0', '17', '28');
INSERT INTO book_items VALUES ('469', '8939500250290', '0', '17', '29');
INSERT INTO book_items VALUES ('470', '8939500250306', '0', '17', '30');
INSERT INTO book_items VALUES ('471', '8932856400210', '0', '18', '21');
INSERT INTO book_items VALUES ('472', '8932856400227', '0', '18', '22');
INSERT INTO book_items VALUES ('473', '8932856400234', '0', '18', '23');
INSERT INTO book_items VALUES ('474', '8932856400241', '0', '18', '24');
INSERT INTO book_items VALUES ('475', '8932856400258', '0', '18', '25');
INSERT INTO book_items VALUES ('476', '8932856400265', '0', '18', '26');
INSERT INTO book_items VALUES ('477', '8932856400272', '0', '18', '27');
INSERT INTO book_items VALUES ('478', '8932856400289', '0', '18', '28');
INSERT INTO book_items VALUES ('479', '8932856400296', '0', '18', '29');
INSERT INTO book_items VALUES ('480', '8932856400302', '0', '18', '30');
INSERT INTO book_items VALUES ('481', '8932856400319', '0', '18', '31');
INSERT INTO book_items VALUES ('482', '8932856400326', '0', '18', '32');
INSERT INTO book_items VALUES ('483', '8932856400333', '0', '18', '33');
INSERT INTO book_items VALUES ('484', '8932856400340', '0', '18', '34');
INSERT INTO book_items VALUES ('485', '8932856400357', '0', '18', '35');
INSERT INTO book_items VALUES ('486', '8932856400364', '0', '18', '36');
INSERT INTO book_items VALUES ('487', '8932856400371', '0', '18', '37');
INSERT INTO book_items VALUES ('488', '8932856400388', '0', '18', '38');
INSERT INTO book_items VALUES ('489', '8932856400395', '0', '18', '39');
INSERT INTO book_items VALUES ('490', '8932856400401', '0', '18', '40');
INSERT INTO book_items VALUES ('491', '8932141420312', '0', '19', '31');
INSERT INTO book_items VALUES ('492', '8932141420329', '0', '19', '32');
INSERT INTO book_items VALUES ('493', '8932141420336', '0', '19', '33');
INSERT INTO book_items VALUES ('494', '8932141420343', '0', '19', '34');
INSERT INTO book_items VALUES ('495', '8932141420350', '0', '19', '35');
INSERT INTO book_items VALUES ('496', '8932141420367', '0', '19', '36');
INSERT INTO book_items VALUES ('497', '8932141420374', '0', '19', '37');
INSERT INTO book_items VALUES ('498', '8932141420381', '0', '19', '38');
INSERT INTO book_items VALUES ('499', '8932141420398', '0', '19', '39');
INSERT INTO book_items VALUES ('500', '8932141420404', '0', '19', '40');
INSERT INTO book_items VALUES ('501', '8932141420411', '0', '19', '41');
INSERT INTO book_items VALUES ('502', '8932141420428', '0', '19', '42');
INSERT INTO book_items VALUES ('503', '8932141420435', '0', '19', '43');
INSERT INTO book_items VALUES ('504', '8932141420442', '0', '19', '44');
INSERT INTO book_items VALUES ('505', '8932141420459', '0', '19', '45');
INSERT INTO book_items VALUES ('506', '8932141420466', '0', '19', '46');
INSERT INTO book_items VALUES ('507', '8932141420473', '0', '19', '47');
INSERT INTO book_items VALUES ('508', '8932141420480', '0', '19', '48');
INSERT INTO book_items VALUES ('509', '8932141420497', '0', '19', '49');
INSERT INTO book_items VALUES ('510', '8932141420503', '0', '19', '50');
INSERT INTO book_items VALUES ('511', '8932141420510', '0', '19', '51');
INSERT INTO book_items VALUES ('512', '8932141420527', '0', '19', '52');
INSERT INTO book_items VALUES ('513', '8932141420534', '0', '19', '53');
INSERT INTO book_items VALUES ('514', '8932141420541', '0', '19', '54');
INSERT INTO book_items VALUES ('515', '8932141420558', '0', '19', '55');
INSERT INTO book_items VALUES ('516', '8932141420565', '0', '19', '56');
INSERT INTO book_items VALUES ('517', '8932141420572', '0', '19', '57');
INSERT INTO book_items VALUES ('518', '8932141420589', '0', '19', '58');
INSERT INTO book_items VALUES ('519', '8932141420596', '0', '19', '59');
INSERT INTO book_items VALUES ('520', '8932141420602', '0', '19', '60');
INSERT INTO book_items VALUES ('521', '8932438640317', '0', '20', '31');
INSERT INTO book_items VALUES ('522', '8932438640324', '0', '20', '32');
INSERT INTO book_items VALUES ('523', '8932438640331', '0', '20', '33');
INSERT INTO book_items VALUES ('524', '8932438640348', '0', '20', '34');
INSERT INTO book_items VALUES ('525', '8932438640355', '0', '20', '35');
INSERT INTO book_items VALUES ('526', '8932438640362', '0', '20', '36');
INSERT INTO book_items VALUES ('527', '8932438640379', '0', '20', '37');
INSERT INTO book_items VALUES ('528', '8932438640386', '0', '20', '38');
INSERT INTO book_items VALUES ('529', '8932438640393', '0', '20', '39');
INSERT INTO book_items VALUES ('530', '8932438640409', '0', '20', '40');
INSERT INTO book_items VALUES ('531', '8932438640416', '0', '20', '41');
INSERT INTO book_items VALUES ('532', '8932438640423', '0', '20', '42');
INSERT INTO book_items VALUES ('533', '8932438640430', '0', '20', '43');
INSERT INTO book_items VALUES ('534', '8932438640447', '0', '20', '44');
INSERT INTO book_items VALUES ('535', '8932438640454', '0', '20', '45');
INSERT INTO book_items VALUES ('536', '8932438640461', '0', '20', '46');
INSERT INTO book_items VALUES ('537', '8932438640478', '0', '20', '47');
INSERT INTO book_items VALUES ('538', '8932438640485', '0', '20', '48');
INSERT INTO book_items VALUES ('539', '8932438640492', '0', '20', '49');
INSERT INTO book_items VALUES ('540', '8932438640508', '0', '20', '50');
INSERT INTO book_items VALUES ('541', '8932438640515', '0', '20', '51');
INSERT INTO book_items VALUES ('542', '8932438640522', '0', '20', '52');
INSERT INTO book_items VALUES ('543', '8932438640539', '0', '20', '53');
INSERT INTO book_items VALUES ('544', '8932438640546', '0', '20', '54');
INSERT INTO book_items VALUES ('545', '8932438640553', '0', '20', '55');
INSERT INTO book_items VALUES ('546', '8932438640560', '0', '20', '56');
INSERT INTO book_items VALUES ('547', '8932438640577', '0', '20', '57');
INSERT INTO book_items VALUES ('548', '8932438640584', '0', '20', '58');
INSERT INTO book_items VALUES ('549', '8932438640591', '0', '20', '59');
INSERT INTO book_items VALUES ('550', '8932438640607', '0', '20', '60');
INSERT INTO book_items VALUES ('551', '8931748930217', '0', '21', '21');
INSERT INTO book_items VALUES ('552', '8931748930224', '0', '21', '22');
INSERT INTO book_items VALUES ('553', '8931748930231', '0', '21', '23');
INSERT INTO book_items VALUES ('554', '8931748930248', '0', '21', '24');
INSERT INTO book_items VALUES ('555', '8931748930255', '0', '21', '25');
INSERT INTO book_items VALUES ('556', '8931748930262', '0', '21', '26');
INSERT INTO book_items VALUES ('557', '8931748930279', '0', '21', '27');
INSERT INTO book_items VALUES ('558', '8931748930286', '0', '21', '28');
INSERT INTO book_items VALUES ('559', '8931748930293', '0', '21', '29');
INSERT INTO book_items VALUES ('560', '8931748930309', '0', '21', '30');
INSERT INTO book_items VALUES ('561', '8931748930316', '0', '21', '31');
INSERT INTO book_items VALUES ('562', '8931748930323', '0', '21', '32');
INSERT INTO book_items VALUES ('563', '8931748930330', '0', '21', '33');
INSERT INTO book_items VALUES ('564', '8931748930347', '0', '21', '34');
INSERT INTO book_items VALUES ('565', '8931748930354', '0', '21', '35');
INSERT INTO book_items VALUES ('566', '8931748930361', '0', '21', '36');
INSERT INTO book_items VALUES ('567', '8931748930378', '0', '21', '37');
INSERT INTO book_items VALUES ('568', '8931748930385', '0', '21', '38');
INSERT INTO book_items VALUES ('569', '8931748930392', '0', '21', '39');
INSERT INTO book_items VALUES ('570', '8931748930408', '0', '21', '40');
INSERT INTO book_items VALUES ('571', '8931275860216', '0', '22', '21');
INSERT INTO book_items VALUES ('572', '8931275860223', '0', '22', '22');
INSERT INTO book_items VALUES ('573', '8931275860230', '0', '22', '23');
INSERT INTO book_items VALUES ('574', '8931275860247', '0', '22', '24');
INSERT INTO book_items VALUES ('575', '8931275860254', '0', '22', '25');
INSERT INTO book_items VALUES ('576', '8931275860261', '0', '22', '26');
INSERT INTO book_items VALUES ('577', '8931275860278', '0', '22', '27');
INSERT INTO book_items VALUES ('578', '8931275860285', '0', '22', '28');
INSERT INTO book_items VALUES ('579', '8931275860292', '0', '22', '29');
INSERT INTO book_items VALUES ('580', '8931275860308', '0', '22', '30');
INSERT INTO book_items VALUES ('581', '8931275860315', '0', '22', '31');
INSERT INTO book_items VALUES ('582', '8931275860322', '0', '22', '32');
INSERT INTO book_items VALUES ('583', '8931275860339', '0', '22', '33');
INSERT INTO book_items VALUES ('584', '8931275860346', '0', '22', '34');
INSERT INTO book_items VALUES ('585', '8931275860353', '0', '22', '35');
INSERT INTO book_items VALUES ('586', '8931275860360', '0', '22', '36');
INSERT INTO book_items VALUES ('587', '8931275860377', '0', '22', '37');
INSERT INTO book_items VALUES ('588', '8931275860384', '0', '22', '38');
INSERT INTO book_items VALUES ('589', '8931275860391', '0', '22', '39');
INSERT INTO book_items VALUES ('590', '8931275860407', '0', '22', '40');
INSERT INTO book_items VALUES ('591', '8932744170119', '0', '23', '11');
INSERT INTO book_items VALUES ('592', '8932744170126', '0', '23', '12');
INSERT INTO book_items VALUES ('593', '8932744170133', '0', '23', '13');
INSERT INTO book_items VALUES ('594', '8932744170140', '0', '23', '14');
INSERT INTO book_items VALUES ('595', '8932744170157', '0', '23', '15');
INSERT INTO book_items VALUES ('596', '8932744170164', '0', '23', '16');
INSERT INTO book_items VALUES ('597', '8932744170171', '0', '23', '17');
INSERT INTO book_items VALUES ('598', '8932744170188', '0', '23', '18');
INSERT INTO book_items VALUES ('599', '8932744170195', '0', '23', '19');
INSERT INTO book_items VALUES ('600', '8932744170201', '0', '23', '20');
INSERT INTO book_items VALUES ('601', '8931060720213', '0', '24', '21');
INSERT INTO book_items VALUES ('602', '8931060720220', '0', '24', '22');
INSERT INTO book_items VALUES ('603', '8931060720237', '0', '24', '23');
INSERT INTO book_items VALUES ('604', '8931060720244', '0', '24', '24');
INSERT INTO book_items VALUES ('605', '8931060720251', '0', '24', '25');
INSERT INTO book_items VALUES ('606', '8931060720268', '0', '24', '26');
INSERT INTO book_items VALUES ('607', '8931060720275', '0', '24', '27');
INSERT INTO book_items VALUES ('608', '8931060720282', '0', '24', '28');
INSERT INTO book_items VALUES ('609', '8931060720299', '0', '24', '29');
INSERT INTO book_items VALUES ('610', '8931060720305', '0', '24', '30');
INSERT INTO book_items VALUES ('611', '8931060720312', '0', '24', '31');
INSERT INTO book_items VALUES ('612', '8931060720329', '0', '24', '32');
INSERT INTO book_items VALUES ('613', '8931060720336', '0', '24', '33');
INSERT INTO book_items VALUES ('614', '8931060720343', '0', '24', '34');
INSERT INTO book_items VALUES ('615', '8931060720350', '0', '24', '35');
INSERT INTO book_items VALUES ('616', '8931060720367', '0', '24', '36');
INSERT INTO book_items VALUES ('617', '8931060720374', '0', '24', '37');
INSERT INTO book_items VALUES ('618', '8931060720381', '0', '24', '38');
INSERT INTO book_items VALUES ('619', '8931060720398', '0', '24', '39');
INSERT INTO book_items VALUES ('620', '8931060720404', '0', '24', '40');
INSERT INTO book_items VALUES ('621', '8934791920112', '0', '25', '11');
INSERT INTO book_items VALUES ('622', '8934791920129', '0', '25', '12');
INSERT INTO book_items VALUES ('623', '8934791920136', '0', '25', '13');
INSERT INTO book_items VALUES ('624', '8934791920143', '0', '25', '14');
INSERT INTO book_items VALUES ('625', '8934791920150', '0', '25', '15');
INSERT INTO book_items VALUES ('626', '8934791920167', '0', '25', '16');
INSERT INTO book_items VALUES ('627', '8934791920174', '0', '25', '17');
INSERT INTO book_items VALUES ('628', '8934791920181', '0', '25', '18');
INSERT INTO book_items VALUES ('629', '8934791920198', '0', '25', '19');
INSERT INTO book_items VALUES ('630', '8934791920204', '0', '25', '20');
INSERT INTO book_items VALUES ('631', '8931272910112', '0', '26', '11');
INSERT INTO book_items VALUES ('632', '8931272910129', '0', '26', '12');
INSERT INTO book_items VALUES ('633', '8931272910136', '0', '26', '13');
INSERT INTO book_items VALUES ('634', '8931272910143', '0', '26', '14');
INSERT INTO book_items VALUES ('635', '8931272910150', '0', '26', '15');
INSERT INTO book_items VALUES ('636', '8931272910167', '0', '26', '16');
INSERT INTO book_items VALUES ('637', '8931272910174', '0', '26', '17');
INSERT INTO book_items VALUES ('638', '8931272910181', '0', '26', '18');
INSERT INTO book_items VALUES ('639', '8931272910198', '0', '26', '19');
INSERT INTO book_items VALUES ('640', '8931272910204', '0', '26', '20');
INSERT INTO book_items VALUES ('641', '8932423340314', '0', '27', '31');
INSERT INTO book_items VALUES ('642', '8932423340321', '0', '27', '32');
INSERT INTO book_items VALUES ('643', '8932423340338', '0', '27', '33');
INSERT INTO book_items VALUES ('644', '8932423340345', '0', '27', '34');
INSERT INTO book_items VALUES ('645', '8932423340352', '0', '27', '35');
INSERT INTO book_items VALUES ('646', '8932423340369', '0', '27', '36');
INSERT INTO book_items VALUES ('647', '8932423340376', '0', '27', '37');
INSERT INTO book_items VALUES ('648', '8932423340383', '0', '27', '38');
INSERT INTO book_items VALUES ('649', '8932423340390', '0', '27', '39');
INSERT INTO book_items VALUES ('650', '8932423340406', '0', '27', '40');
INSERT INTO book_items VALUES ('651', '8932423340413', '0', '27', '41');
INSERT INTO book_items VALUES ('652', '8932423340420', '0', '27', '42');
INSERT INTO book_items VALUES ('653', '8932423340437', '0', '27', '43');
INSERT INTO book_items VALUES ('654', '8932423340444', '0', '27', '44');
INSERT INTO book_items VALUES ('655', '8932423340451', '0', '27', '45');
INSERT INTO book_items VALUES ('656', '8932423340468', '0', '27', '46');
INSERT INTO book_items VALUES ('657', '8932423340475', '0', '27', '47');
INSERT INTO book_items VALUES ('658', '8932423340482', '0', '27', '48');
INSERT INTO book_items VALUES ('659', '8932423340499', '0', '27', '49');
INSERT INTO book_items VALUES ('660', '8932423340505', '0', '27', '50');
INSERT INTO book_items VALUES ('661', '8932423340512', '0', '27', '51');
INSERT INTO book_items VALUES ('662', '8932423340529', '0', '27', '52');
INSERT INTO book_items VALUES ('663', '8932423340536', '0', '27', '53');
INSERT INTO book_items VALUES ('664', '8932423340543', '0', '27', '54');
INSERT INTO book_items VALUES ('665', '8932423340550', '0', '27', '55');
INSERT INTO book_items VALUES ('666', '8932423340567', '0', '27', '56');
INSERT INTO book_items VALUES ('667', '8932423340574', '0', '27', '57');
INSERT INTO book_items VALUES ('668', '8932423340581', '0', '27', '58');
INSERT INTO book_items VALUES ('669', '8932423340598', '0', '27', '59');
INSERT INTO book_items VALUES ('670', '8932423340604', '0', '27', '60');
INSERT INTO book_items VALUES ('671', '8936527060512', '0', '28', '51');
INSERT INTO book_items VALUES ('672', '8936527060529', '0', '28', '52');
INSERT INTO book_items VALUES ('673', '8936527060536', '0', '28', '53');
INSERT INTO book_items VALUES ('674', '8936527060543', '0', '28', '54');
INSERT INTO book_items VALUES ('675', '8936527060550', '0', '28', '55');
INSERT INTO book_items VALUES ('676', '8936527060567', '0', '28', '56');
INSERT INTO book_items VALUES ('677', '8936527060574', '0', '28', '57');
INSERT INTO book_items VALUES ('678', '8936527060581', '0', '28', '58');
INSERT INTO book_items VALUES ('679', '8936527060598', '0', '28', '59');
INSERT INTO book_items VALUES ('680', '8936527060604', '0', '28', '60');
INSERT INTO book_items VALUES ('681', '8936527060611', '0', '28', '61');
INSERT INTO book_items VALUES ('682', '8936527060628', '0', '28', '62');
INSERT INTO book_items VALUES ('683', '8936527060635', '0', '28', '63');
INSERT INTO book_items VALUES ('684', '8936527060642', '0', '28', '64');
INSERT INTO book_items VALUES ('685', '8936527060659', '0', '28', '65');
INSERT INTO book_items VALUES ('686', '8936527060666', '0', '28', '66');
INSERT INTO book_items VALUES ('687', '8936527060673', '0', '28', '67');
INSERT INTO book_items VALUES ('688', '8936527060680', '0', '28', '68');
INSERT INTO book_items VALUES ('689', '8936527060697', '0', '28', '69');
INSERT INTO book_items VALUES ('690', '8936527060703', '0', '28', '70');
INSERT INTO book_items VALUES ('691', '8936527060710', '0', '28', '71');
INSERT INTO book_items VALUES ('692', '8936527060727', '0', '28', '72');
INSERT INTO book_items VALUES ('693', '8936527060734', '0', '28', '73');
INSERT INTO book_items VALUES ('694', '8936527060741', '0', '28', '74');
INSERT INTO book_items VALUES ('695', '8936527060758', '0', '28', '75');
INSERT INTO book_items VALUES ('696', '8936527060765', '0', '28', '76');
INSERT INTO book_items VALUES ('697', '8936527060772', '0', '28', '77');
INSERT INTO book_items VALUES ('698', '8936527060789', '0', '28', '78');
INSERT INTO book_items VALUES ('699', '8936527060796', '0', '28', '79');
INSERT INTO book_items VALUES ('700', '8936527060802', '0', '28', '80');
INSERT INTO book_items VALUES ('701', '8936527060819', '0', '28', '81');
INSERT INTO book_items VALUES ('702', '8936527060826', '0', '28', '82');
INSERT INTO book_items VALUES ('703', '8936527060833', '0', '28', '83');
INSERT INTO book_items VALUES ('704', '8936527060840', '0', '28', '84');
INSERT INTO book_items VALUES ('705', '8936527060857', '0', '28', '85');
INSERT INTO book_items VALUES ('706', '8936527060864', '0', '28', '86');
INSERT INTO book_items VALUES ('707', '8936527060871', '0', '28', '87');
INSERT INTO book_items VALUES ('708', '8936527060888', '0', '28', '88');
INSERT INTO book_items VALUES ('709', '8936527060895', '0', '28', '89');
INSERT INTO book_items VALUES ('710', '8936527060901', '0', '28', '90');
INSERT INTO book_items VALUES ('711', '8936527060918', '0', '28', '91');
INSERT INTO book_items VALUES ('712', '8936527060925', '0', '28', '92');
INSERT INTO book_items VALUES ('713', '8936527060932', '0', '28', '93');
INSERT INTO book_items VALUES ('714', '8936527060949', '0', '28', '94');
INSERT INTO book_items VALUES ('715', '8936527060956', '0', '28', '95');
INSERT INTO book_items VALUES ('716', '8936527060963', '0', '28', '96');
INSERT INTO book_items VALUES ('717', '8936527060970', '0', '28', '97');
INSERT INTO book_items VALUES ('718', '8936527060987', '0', '28', '98');
INSERT INTO book_items VALUES ('719', '8936527060994', '0', '28', '99');
INSERT INTO book_items VALUES ('720', '8936527061007', '0', '28', '100');
INSERT INTO book_items VALUES ('721', '8932165200211', '0', '29', '21');
INSERT INTO book_items VALUES ('722', '8932165200228', '0', '29', '22');
INSERT INTO book_items VALUES ('723', '8932165200235', '0', '29', '23');
INSERT INTO book_items VALUES ('724', '8932165200242', '0', '29', '24');
INSERT INTO book_items VALUES ('725', '8932165200259', '0', '29', '25');
INSERT INTO book_items VALUES ('726', '8932165200266', '0', '29', '26');
INSERT INTO book_items VALUES ('727', '8932165200273', '0', '29', '27');
INSERT INTO book_items VALUES ('728', '8932165200280', '0', '29', '28');
INSERT INTO book_items VALUES ('729', '8932165200297', '0', '29', '29');
INSERT INTO book_items VALUES ('730', '8932165200303', '0', '29', '30');
INSERT INTO book_items VALUES ('731', '8932165200310', '0', '29', '31');
INSERT INTO book_items VALUES ('732', '8932165200327', '0', '29', '32');
INSERT INTO book_items VALUES ('733', '8932165200334', '0', '29', '33');
INSERT INTO book_items VALUES ('734', '8932165200341', '0', '29', '34');
INSERT INTO book_items VALUES ('735', '8932165200358', '0', '29', '35');
INSERT INTO book_items VALUES ('736', '8932165200365', '0', '29', '36');
INSERT INTO book_items VALUES ('737', '8932165200372', '0', '29', '37');
INSERT INTO book_items VALUES ('738', '8932165200389', '0', '29', '38');
INSERT INTO book_items VALUES ('739', '8932165200396', '0', '29', '39');
INSERT INTO book_items VALUES ('740', '8932165200402', '0', '29', '40');
INSERT INTO book_items VALUES ('741', '8931725920217', '0', '30', '21');
INSERT INTO book_items VALUES ('742', '8931725920224', '0', '30', '22');
INSERT INTO book_items VALUES ('743', '8931725920231', '0', '30', '23');
INSERT INTO book_items VALUES ('744', '8931725920248', '0', '30', '24');
INSERT INTO book_items VALUES ('745', '8931725920255', '0', '30', '25');
INSERT INTO book_items VALUES ('746', '8931725920262', '0', '30', '26');
INSERT INTO book_items VALUES ('747', '8931725920279', '0', '30', '27');
INSERT INTO book_items VALUES ('748', '8931725920286', '0', '30', '28');
INSERT INTO book_items VALUES ('749', '8931725920293', '0', '30', '29');
INSERT INTO book_items VALUES ('750', '8931725920309', '0', '30', '30');
INSERT INTO book_items VALUES ('751', '8931725920316', '0', '30', '31');
INSERT INTO book_items VALUES ('752', '8931725920323', '0', '30', '32');
INSERT INTO book_items VALUES ('753', '8931725920330', '0', '30', '33');
INSERT INTO book_items VALUES ('754', '8931725920347', '0', '30', '34');
INSERT INTO book_items VALUES ('755', '8931725920354', '0', '30', '35');
INSERT INTO book_items VALUES ('756', '8931725920361', '0', '30', '36');
INSERT INTO book_items VALUES ('757', '8931725920378', '0', '30', '37');
INSERT INTO book_items VALUES ('758', '8931725920385', '0', '30', '38');
INSERT INTO book_items VALUES ('759', '8931725920392', '0', '30', '39');
INSERT INTO book_items VALUES ('760', '8931725920408', '0', '30', '40');
INSERT INTO book_items VALUES ('761', '8931158310319', '0', '31', '31');
INSERT INTO book_items VALUES ('762', '8931158310326', '0', '31', '32');
INSERT INTO book_items VALUES ('763', '8931158310333', '0', '31', '33');
INSERT INTO book_items VALUES ('764', '8931158310340', '0', '31', '34');
INSERT INTO book_items VALUES ('765', '8931158310357', '0', '31', '35');
INSERT INTO book_items VALUES ('766', '8931158310364', '0', '31', '36');
INSERT INTO book_items VALUES ('767', '8931158310371', '0', '31', '37');
INSERT INTO book_items VALUES ('768', '8931158310388', '0', '31', '38');
INSERT INTO book_items VALUES ('769', '8931158310395', '0', '31', '39');
INSERT INTO book_items VALUES ('770', '8931158310401', '0', '31', '40');
INSERT INTO book_items VALUES ('771', '8931158310418', '0', '31', '41');
INSERT INTO book_items VALUES ('772', '8931158310425', '0', '31', '42');
INSERT INTO book_items VALUES ('773', '8931158310432', '0', '31', '43');
INSERT INTO book_items VALUES ('774', '8931158310449', '0', '31', '44');
INSERT INTO book_items VALUES ('775', '8931158310456', '0', '31', '45');
INSERT INTO book_items VALUES ('776', '8931158310463', '0', '31', '46');
INSERT INTO book_items VALUES ('777', '8931158310470', '0', '31', '47');
INSERT INTO book_items VALUES ('778', '8931158310487', '0', '31', '48');
INSERT INTO book_items VALUES ('779', '8931158310494', '0', '31', '49');
INSERT INTO book_items VALUES ('780', '8931158310500', '0', '31', '50');
INSERT INTO book_items VALUES ('781', '8931158310517', '0', '31', '51');
INSERT INTO book_items VALUES ('782', '8931158310524', '0', '31', '52');
INSERT INTO book_items VALUES ('783', '8931158310531', '0', '31', '53');
INSERT INTO book_items VALUES ('784', '8931158310548', '0', '31', '54');
INSERT INTO book_items VALUES ('785', '8931158310555', '0', '31', '55');
INSERT INTO book_items VALUES ('786', '8931158310562', '0', '31', '56');
INSERT INTO book_items VALUES ('787', '8931158310579', '0', '31', '57');
INSERT INTO book_items VALUES ('788', '8931158310586', '0', '31', '58');
INSERT INTO book_items VALUES ('789', '8931158310593', '0', '31', '59');
INSERT INTO book_items VALUES ('790', '8931158310609', '0', '31', '60');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of book_type_controls
-- ----------------------------
INSERT INTO book_type_controls VALUES ('1', '1', '1', '40');
INSERT INTO book_type_controls VALUES ('2', '2', '2', '60');
INSERT INTO book_type_controls VALUES ('3', '3', '3', '60');
INSERT INTO book_type_controls VALUES ('4', '4', '4', '40');
INSERT INTO book_type_controls VALUES ('5', '5', '5', '40');
INSERT INTO book_type_controls VALUES ('6', '6', '6', '20');
INSERT INTO book_type_controls VALUES ('7', '7', '7', '40');
INSERT INTO book_type_controls VALUES ('8', '8', '8', '20');
INSERT INTO book_type_controls VALUES ('9', '9', '9', '20');
INSERT INTO book_type_controls VALUES ('10', '10', '10', '60');
INSERT INTO book_type_controls VALUES ('11', '11', '11', '100');
INSERT INTO book_type_controls VALUES ('12', '12', '12', '40');
INSERT INTO book_type_controls VALUES ('13', '13', '13', '40');
INSERT INTO book_type_controls VALUES ('14', '14', '14', '60');
INSERT INTO book_type_controls VALUES ('15', '123456789', '15', '100');
INSERT INTO book_type_controls VALUES ('16', '145', '16', '20');
INSERT INTO book_type_controls VALUES ('17', '178', '17', '30');

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
INSERT INTO configs VALUES ('9', 'Lần cuối quét hệ thống', '2014-09-10 11:42:02', '', 'last_execute', '1');

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
INSERT INTO migrations VALUES ('2014_09_10_095915_book_delete_publish_info', '54');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of readers
-- ----------------------------
INSERT INTO readers VALUES ('1', '8931233960637', 'Lê Mai Viện', '08T2', '03/10/1990', 'Quảng Bình', '2008 - 2013', 'CNTT', 'lemaibk08@gmail.com', '01689973826', '2014-09-10 10:50:26', '2014-09-10 11:15:56', '0', '1', 'http://localhost/library-dev/img/readers/btn_nhap_tai_lieu_web.PNG', '2015-09-10 10:50:26', '0', '3', null, '12345567');

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
