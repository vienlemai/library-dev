/*
Navicat MySQL Data Transfer

Source Server         : vienlemai
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : library

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2014-04-06 17:01:23
*/

SET FOREIGN_KEY_CHECKS=0;
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
  `cutter` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO books VALUES ('1', '245884', 'canh dong bat tan ', '', 'Nguyen ngoc tu', '', 'Xuất bản lần đầu', 'Van hoc', 'khong biet', '120', '17x21', 'không', 'Học viện cảnh sát', 'Tieng Viet', 'canh-dong-bat-tan', '123', '60.000', '1', '100', '1', '', '1', '2014-03-21 13:40:21', '2014-03-31 22:07:37', '1', '0', '2014-03-31 22:07:37', null, null, null);
INSERT INTO books VALUES ('2', '200910', 'Tiếu ngạo giang hồ', '', 'Kim Dung', '', '', '', '', '0', '', '', '', '', '', '', '', '1', '10', '1', '', '1', '2014-03-21 14:21:57', '2014-03-31 22:07:37', '1', '0', '2014-03-31 22:07:37', null, null, null);
INSERT INTO books VALUES ('3', '431603', 'Tuyển tập nhạc Trịnh', '', 'Nhiều tác giả', '', '', '', '', '0', '', '', '', '', '', '', '', '1', '10', '1', '', '3', '2014-03-21 14:22:50', '2014-03-31 22:24:22', '1', '0', '2014-03-31 22:07:37', '2014-03-31 22:24:22', '1', null);
INSERT INTO books VALUES ('4', '363076', 'Lão tử tinh hoa', '', 'Nguyễn Duy Cần', '', '', '', '', '0', '', '', '', '', '', '', '', '1', '20', '2', '', '2', '2014-03-21 14:23:16', '2014-04-02 20:54:11', '1', '0', '2014-03-31 22:08:00', null, null, '');
INSERT INTO books VALUES ('5', '826457', 'Kinh dịch diễn giải', '', 'Nguyễn Duy Cần', '', '', '', '', '0', '', '', '', '', '', '', '', '12', '10', '3', '<p>Đ&atilde; sửa lỗi ch&iacute;nh tả</p>', '0', '2014-03-21 14:23:50', '2014-03-31 22:05:34', '1', '0', '2014-03-29 22:46:48', '2014-03-31 21:36:57', '1', '<p>Lỗi số lượng t&agrave;i liệu</p>\r\n<p>Lỗi ch&iacute;nh tả ng&ocirc;n ngữ</p>\r\n<p>Sai th&ocirc;ng tin nh&agrave; xuất bản</p>');
INSERT INTO books VALUES ('6', '107583', 'Có một phố vừa đi qua phố', '', 'Đinh Vũ Hoàng Nguyên', '', '', '', '', '0', '', '', '', '', '', '', '', '1', '30', '1', '', '0', '2014-03-21 14:24:26', '2014-03-31 22:04:58', '1', '0', '2014-03-28 22:30:44', null, null, null);
INSERT INTO books VALUES ('7', '433851', 'Đêm qua sân trước một nhành mai', '', 'Nguyễn Tường Bách', '', '', '', '', '0', '', '', '', '', '', '', '', '1', '12', '3', '<p>Đ&atilde; sửa lỗi ch&iacute;nh tả</p>', '0', '2014-03-22 10:14:57', '2014-03-31 22:04:46', '1', '0', '2014-03-28 22:30:44', null, null, 'Sai chính tả tên tác giả\r\nSai chính tả nhà xuất bản');
INSERT INTO books VALUES ('8', '147935', 'Bên kia cánh cửa', '', 'Hà Thủy Nguyên', '', '', '', '', '0', '', '', '', '', '', '', '', '1', '10', '1', '', '0', '2014-03-22 10:19:34', '2014-03-31 22:04:36', '1', '0', '2014-03-28 09:48:49', '2014-03-28 21:59:42', '1', null);
INSERT INTO books VALUES ('9', '327315', 'Kỹ thuật tàu thủy', '', 'Chưa rõ', '', '', '', '', '0', '', '', '', '', '', '', '', '1', '10', '1', '', '0', '2014-03-22 10:20:37', '2014-03-31 22:04:19', '1', '0', '2014-03-28 09:48:49', '2014-03-28 22:30:27', '1', null);
INSERT INTO books VALUES ('10', '421536', 'Kỹ thuật tàu lửa', '', 'Chưa rõ', '', '', '', '', '0', '', '', '', '', '', '', '', '1', '10', '1', '', '0', '2014-03-22 10:41:30', '2014-03-31 22:03:59', '1', '0', '2014-03-28 09:39:31', '2014-03-28 21:59:20', '1', null);
INSERT INTO books VALUES ('11', '385456', 'Kỹ thuật tàu thủy', '', 'Chưa rõ', '', '', '', '', '0', '', '', '', '', '', '', '', '1', '10', '1', '', '3', '2014-03-22 10:45:44', '2014-03-31 22:32:51', '1', '0', '2014-03-31 22:23:22', '2014-03-31 22:32:51', '1', null);
INSERT INTO books VALUES ('12', '209972', 'Văn hóa phật giáo nguyên thủy', '', 'Nguyễn Duy Cần', '', '', '', '', '0', '', '', '', '', '', '', '', '1', '20', '1', '<p>Nhập 45 cuốn t&agrave;i li&ecirc;u</p>\r\n<p>Văn h&oacute;a phật gi&aacute;o nguy&ecirc;n thủy</p>', '3', '2014-03-29 13:36:51', '2014-03-31 22:24:14', '1', '0', '2014-03-31 22:23:25', '2014-03-31 22:24:14', '1', 'Lưu sai kho, sai nhà xuất bản');

-- ----------------------------
-- Table structure for `book_items`
-- ----------------------------
DROP TABLE IF EXISTS `book_items`;
CREATE TABLE `book_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=384 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book_items
-- ----------------------------
INSERT INTO book_items VALUES ('92', '209972001', '0', '12');
INSERT INTO book_items VALUES ('93', '209972002', '0', '12');
INSERT INTO book_items VALUES ('94', '209972003', '0', '12');
INSERT INTO book_items VALUES ('95', '209972004', '0', '12');
INSERT INTO book_items VALUES ('96', '209972005', '0', '12');
INSERT INTO book_items VALUES ('97', '209972006', '0', '12');
INSERT INTO book_items VALUES ('98', '209972007', '0', '12');
INSERT INTO book_items VALUES ('99', '209972008', '0', '12');
INSERT INTO book_items VALUES ('100', '209972009', '0', '12');
INSERT INTO book_items VALUES ('101', '209972010', '0', '12');
INSERT INTO book_items VALUES ('102', '209972011', '0', '12');
INSERT INTO book_items VALUES ('103', '209972012', '0', '12');
INSERT INTO book_items VALUES ('104', '209972013', '0', '12');
INSERT INTO book_items VALUES ('105', '209972014', '0', '12');
INSERT INTO book_items VALUES ('106', '209972015', '0', '12');
INSERT INTO book_items VALUES ('107', '209972016', '0', '12');
INSERT INTO book_items VALUES ('108', '209972017', '0', '12');
INSERT INTO book_items VALUES ('109', '209972018', '0', '12');
INSERT INTO book_items VALUES ('110', '209972019', '0', '12');
INSERT INTO book_items VALUES ('111', '209972020', '0', '12');
INSERT INTO book_items VALUES ('112', '385456001', '0', '11');
INSERT INTO book_items VALUES ('113', '385456002', '0', '11');
INSERT INTO book_items VALUES ('114', '385456003', '0', '11');
INSERT INTO book_items VALUES ('115', '385456004', '0', '11');
INSERT INTO book_items VALUES ('116', '385456005', '0', '11');
INSERT INTO book_items VALUES ('117', '385456006', '0', '11');
INSERT INTO book_items VALUES ('118', '385456007', '0', '11');
INSERT INTO book_items VALUES ('119', '385456008', '0', '11');
INSERT INTO book_items VALUES ('120', '385456009', '0', '11');
INSERT INTO book_items VALUES ('121', '385456010', '0', '11');
INSERT INTO book_items VALUES ('122', '421536001', '0', '10');
INSERT INTO book_items VALUES ('123', '421536002', '0', '10');
INSERT INTO book_items VALUES ('124', '421536003', '0', '10');
INSERT INTO book_items VALUES ('125', '421536004', '0', '10');
INSERT INTO book_items VALUES ('126', '421536005', '0', '10');
INSERT INTO book_items VALUES ('127', '421536006', '0', '10');
INSERT INTO book_items VALUES ('128', '421536007', '0', '10');
INSERT INTO book_items VALUES ('129', '421536008', '0', '10');
INSERT INTO book_items VALUES ('130', '421536009', '0', '10');
INSERT INTO book_items VALUES ('131', '421536010', '0', '10');
INSERT INTO book_items VALUES ('132', '327315001', '0', '9');
INSERT INTO book_items VALUES ('133', '327315002', '0', '9');
INSERT INTO book_items VALUES ('134', '327315003', '0', '9');
INSERT INTO book_items VALUES ('135', '327315004', '0', '9');
INSERT INTO book_items VALUES ('136', '327315005', '0', '9');
INSERT INTO book_items VALUES ('137', '327315006', '0', '9');
INSERT INTO book_items VALUES ('138', '327315007', '0', '9');
INSERT INTO book_items VALUES ('139', '327315008', '0', '9');
INSERT INTO book_items VALUES ('140', '327315009', '0', '9');
INSERT INTO book_items VALUES ('141', '327315010', '0', '9');
INSERT INTO book_items VALUES ('142', '147935001', '0', '8');
INSERT INTO book_items VALUES ('143', '147935002', '0', '8');
INSERT INTO book_items VALUES ('144', '147935003', '0', '8');
INSERT INTO book_items VALUES ('145', '147935004', '0', '8');
INSERT INTO book_items VALUES ('146', '147935005', '0', '8');
INSERT INTO book_items VALUES ('147', '147935006', '0', '8');
INSERT INTO book_items VALUES ('148', '147935007', '0', '8');
INSERT INTO book_items VALUES ('149', '147935008', '0', '8');
INSERT INTO book_items VALUES ('150', '147935009', '0', '8');
INSERT INTO book_items VALUES ('151', '147935010', '0', '8');
INSERT INTO book_items VALUES ('152', '433851001', '0', '7');
INSERT INTO book_items VALUES ('153', '433851002', '0', '7');
INSERT INTO book_items VALUES ('154', '433851003', '0', '7');
INSERT INTO book_items VALUES ('155', '433851004', '0', '7');
INSERT INTO book_items VALUES ('156', '433851005', '0', '7');
INSERT INTO book_items VALUES ('157', '433851006', '0', '7');
INSERT INTO book_items VALUES ('158', '433851007', '0', '7');
INSERT INTO book_items VALUES ('159', '433851008', '0', '7');
INSERT INTO book_items VALUES ('160', '433851009', '0', '7');
INSERT INTO book_items VALUES ('161', '433851010', '0', '7');
INSERT INTO book_items VALUES ('162', '433851011', '0', '7');
INSERT INTO book_items VALUES ('163', '433851012', '0', '7');
INSERT INTO book_items VALUES ('164', '107583001', '0', '6');
INSERT INTO book_items VALUES ('165', '107583002', '0', '6');
INSERT INTO book_items VALUES ('166', '107583003', '0', '6');
INSERT INTO book_items VALUES ('167', '107583004', '0', '6');
INSERT INTO book_items VALUES ('168', '107583005', '0', '6');
INSERT INTO book_items VALUES ('169', '107583006', '0', '6');
INSERT INTO book_items VALUES ('170', '107583007', '0', '6');
INSERT INTO book_items VALUES ('171', '107583008', '0', '6');
INSERT INTO book_items VALUES ('172', '107583009', '0', '6');
INSERT INTO book_items VALUES ('173', '107583010', '0', '6');
INSERT INTO book_items VALUES ('174', '107583011', '0', '6');
INSERT INTO book_items VALUES ('175', '107583012', '0', '6');
INSERT INTO book_items VALUES ('176', '107583013', '0', '6');
INSERT INTO book_items VALUES ('177', '107583014', '0', '6');
INSERT INTO book_items VALUES ('178', '107583015', '0', '6');
INSERT INTO book_items VALUES ('179', '107583016', '0', '6');
INSERT INTO book_items VALUES ('180', '107583017', '0', '6');
INSERT INTO book_items VALUES ('181', '107583018', '0', '6');
INSERT INTO book_items VALUES ('182', '107583019', '0', '6');
INSERT INTO book_items VALUES ('183', '107583020', '0', '6');
INSERT INTO book_items VALUES ('184', '107583021', '0', '6');
INSERT INTO book_items VALUES ('185', '107583022', '0', '6');
INSERT INTO book_items VALUES ('186', '107583023', '0', '6');
INSERT INTO book_items VALUES ('187', '107583024', '0', '6');
INSERT INTO book_items VALUES ('188', '107583025', '0', '6');
INSERT INTO book_items VALUES ('189', '107583026', '0', '6');
INSERT INTO book_items VALUES ('190', '107583027', '0', '6');
INSERT INTO book_items VALUES ('191', '107583028', '0', '6');
INSERT INTO book_items VALUES ('192', '107583029', '0', '6');
INSERT INTO book_items VALUES ('193', '107583030', '0', '6');
INSERT INTO book_items VALUES ('204', '826457001', '0', '5');
INSERT INTO book_items VALUES ('205', '826457002', '0', '5');
INSERT INTO book_items VALUES ('206', '826457003', '0', '5');
INSERT INTO book_items VALUES ('207', '826457004', '0', '5');
INSERT INTO book_items VALUES ('208', '826457005', '0', '5');
INSERT INTO book_items VALUES ('209', '826457006', '0', '5');
INSERT INTO book_items VALUES ('210', '826457007', '0', '5');
INSERT INTO book_items VALUES ('211', '826457008', '0', '5');
INSERT INTO book_items VALUES ('212', '826457009', '0', '5');
INSERT INTO book_items VALUES ('213', '826457010', '0', '5');
INSERT INTO book_items VALUES ('244', '431603001', '0', '3');
INSERT INTO book_items VALUES ('245', '431603002', '0', '3');
INSERT INTO book_items VALUES ('246', '431603003', '0', '3');
INSERT INTO book_items VALUES ('247', '431603004', '0', '3');
INSERT INTO book_items VALUES ('248', '431603005', '0', '3');
INSERT INTO book_items VALUES ('249', '431603006', '0', '3');
INSERT INTO book_items VALUES ('250', '431603007', '0', '3');
INSERT INTO book_items VALUES ('251', '431603008', '0', '3');
INSERT INTO book_items VALUES ('252', '431603009', '0', '3');
INSERT INTO book_items VALUES ('253', '431603010', '0', '3');
INSERT INTO book_items VALUES ('254', '200910001', '0', '2');
INSERT INTO book_items VALUES ('255', '200910002', '0', '2');
INSERT INTO book_items VALUES ('256', '200910003', '0', '2');
INSERT INTO book_items VALUES ('257', '200910004', '0', '2');
INSERT INTO book_items VALUES ('258', '200910005', '0', '2');
INSERT INTO book_items VALUES ('259', '200910006', '0', '2');
INSERT INTO book_items VALUES ('260', '200910007', '0', '2');
INSERT INTO book_items VALUES ('261', '200910008', '0', '2');
INSERT INTO book_items VALUES ('262', '200910009', '0', '2');
INSERT INTO book_items VALUES ('263', '200910010', '0', '2');
INSERT INTO book_items VALUES ('264', '245884001', '0', '1');
INSERT INTO book_items VALUES ('265', '245884002', '0', '1');
INSERT INTO book_items VALUES ('266', '245884003', '0', '1');
INSERT INTO book_items VALUES ('267', '245884004', '0', '1');
INSERT INTO book_items VALUES ('268', '245884005', '0', '1');
INSERT INTO book_items VALUES ('269', '245884006', '0', '1');
INSERT INTO book_items VALUES ('270', '245884007', '0', '1');
INSERT INTO book_items VALUES ('271', '245884008', '0', '1');
INSERT INTO book_items VALUES ('272', '245884009', '0', '1');
INSERT INTO book_items VALUES ('273', '245884010', '0', '1');
INSERT INTO book_items VALUES ('274', '245884011', '0', '1');
INSERT INTO book_items VALUES ('275', '245884012', '0', '1');
INSERT INTO book_items VALUES ('276', '245884013', '0', '1');
INSERT INTO book_items VALUES ('277', '245884014', '0', '1');
INSERT INTO book_items VALUES ('278', '245884015', '0', '1');
INSERT INTO book_items VALUES ('279', '245884016', '0', '1');
INSERT INTO book_items VALUES ('280', '245884017', '0', '1');
INSERT INTO book_items VALUES ('281', '245884018', '0', '1');
INSERT INTO book_items VALUES ('282', '245884019', '0', '1');
INSERT INTO book_items VALUES ('283', '245884020', '0', '1');
INSERT INTO book_items VALUES ('284', '245884021', '0', '1');
INSERT INTO book_items VALUES ('285', '245884022', '0', '1');
INSERT INTO book_items VALUES ('286', '245884023', '0', '1');
INSERT INTO book_items VALUES ('287', '245884024', '0', '1');
INSERT INTO book_items VALUES ('288', '245884025', '0', '1');
INSERT INTO book_items VALUES ('289', '245884026', '0', '1');
INSERT INTO book_items VALUES ('290', '245884027', '0', '1');
INSERT INTO book_items VALUES ('291', '245884028', '0', '1');
INSERT INTO book_items VALUES ('292', '245884029', '0', '1');
INSERT INTO book_items VALUES ('293', '245884030', '0', '1');
INSERT INTO book_items VALUES ('294', '245884031', '0', '1');
INSERT INTO book_items VALUES ('295', '245884032', '0', '1');
INSERT INTO book_items VALUES ('296', '245884033', '0', '1');
INSERT INTO book_items VALUES ('297', '245884034', '0', '1');
INSERT INTO book_items VALUES ('298', '245884035', '0', '1');
INSERT INTO book_items VALUES ('299', '245884036', '0', '1');
INSERT INTO book_items VALUES ('300', '245884037', '0', '1');
INSERT INTO book_items VALUES ('301', '245884038', '0', '1');
INSERT INTO book_items VALUES ('302', '245884039', '0', '1');
INSERT INTO book_items VALUES ('303', '245884040', '0', '1');
INSERT INTO book_items VALUES ('304', '245884041', '0', '1');
INSERT INTO book_items VALUES ('305', '245884042', '0', '1');
INSERT INTO book_items VALUES ('306', '245884043', '0', '1');
INSERT INTO book_items VALUES ('307', '245884044', '0', '1');
INSERT INTO book_items VALUES ('308', '245884045', '0', '1');
INSERT INTO book_items VALUES ('309', '245884046', '0', '1');
INSERT INTO book_items VALUES ('310', '245884047', '0', '1');
INSERT INTO book_items VALUES ('311', '245884048', '0', '1');
INSERT INTO book_items VALUES ('312', '245884049', '0', '1');
INSERT INTO book_items VALUES ('313', '245884050', '0', '1');
INSERT INTO book_items VALUES ('314', '245884051', '0', '1');
INSERT INTO book_items VALUES ('315', '245884052', '0', '1');
INSERT INTO book_items VALUES ('316', '245884053', '0', '1');
INSERT INTO book_items VALUES ('317', '245884054', '0', '1');
INSERT INTO book_items VALUES ('318', '245884055', '0', '1');
INSERT INTO book_items VALUES ('319', '245884056', '0', '1');
INSERT INTO book_items VALUES ('320', '245884057', '0', '1');
INSERT INTO book_items VALUES ('321', '245884058', '0', '1');
INSERT INTO book_items VALUES ('322', '245884059', '0', '1');
INSERT INTO book_items VALUES ('323', '245884060', '0', '1');
INSERT INTO book_items VALUES ('324', '245884061', '0', '1');
INSERT INTO book_items VALUES ('325', '245884062', '0', '1');
INSERT INTO book_items VALUES ('326', '245884063', '0', '1');
INSERT INTO book_items VALUES ('327', '245884064', '0', '1');
INSERT INTO book_items VALUES ('328', '245884065', '0', '1');
INSERT INTO book_items VALUES ('329', '245884066', '0', '1');
INSERT INTO book_items VALUES ('330', '245884067', '0', '1');
INSERT INTO book_items VALUES ('331', '245884068', '0', '1');
INSERT INTO book_items VALUES ('332', '245884069', '0', '1');
INSERT INTO book_items VALUES ('333', '245884070', '0', '1');
INSERT INTO book_items VALUES ('334', '245884071', '0', '1');
INSERT INTO book_items VALUES ('335', '245884072', '0', '1');
INSERT INTO book_items VALUES ('336', '245884073', '0', '1');
INSERT INTO book_items VALUES ('337', '245884074', '0', '1');
INSERT INTO book_items VALUES ('338', '245884075', '0', '1');
INSERT INTO book_items VALUES ('339', '245884076', '0', '1');
INSERT INTO book_items VALUES ('340', '245884077', '0', '1');
INSERT INTO book_items VALUES ('341', '245884078', '0', '1');
INSERT INTO book_items VALUES ('342', '245884079', '0', '1');
INSERT INTO book_items VALUES ('343', '245884080', '0', '1');
INSERT INTO book_items VALUES ('344', '245884081', '0', '1');
INSERT INTO book_items VALUES ('345', '245884082', '0', '1');
INSERT INTO book_items VALUES ('346', '245884083', '0', '1');
INSERT INTO book_items VALUES ('347', '245884084', '0', '1');
INSERT INTO book_items VALUES ('348', '245884085', '0', '1');
INSERT INTO book_items VALUES ('349', '245884086', '0', '1');
INSERT INTO book_items VALUES ('350', '245884087', '0', '1');
INSERT INTO book_items VALUES ('351', '245884088', '0', '1');
INSERT INTO book_items VALUES ('352', '245884089', '0', '1');
INSERT INTO book_items VALUES ('353', '245884090', '0', '1');
INSERT INTO book_items VALUES ('354', '245884091', '0', '1');
INSERT INTO book_items VALUES ('355', '245884092', '0', '1');
INSERT INTO book_items VALUES ('356', '245884093', '0', '1');
INSERT INTO book_items VALUES ('357', '245884094', '0', '1');
INSERT INTO book_items VALUES ('358', '245884095', '0', '1');
INSERT INTO book_items VALUES ('359', '245884096', '0', '1');
INSERT INTO book_items VALUES ('360', '245884097', '0', '1');
INSERT INTO book_items VALUES ('361', '245884098', '0', '1');
INSERT INTO book_items VALUES ('362', '245884099', '0', '1');
INSERT INTO book_items VALUES ('363', '245884100', '0', '1');
INSERT INTO book_items VALUES ('364', '363076001', '0', '4');
INSERT INTO book_items VALUES ('365', '363076002', '0', '4');
INSERT INTO book_items VALUES ('366', '363076003', '0', '4');
INSERT INTO book_items VALUES ('367', '363076004', '0', '4');
INSERT INTO book_items VALUES ('368', '363076005', '0', '4');
INSERT INTO book_items VALUES ('369', '363076006', '0', '4');
INSERT INTO book_items VALUES ('370', '363076007', '0', '4');
INSERT INTO book_items VALUES ('371', '363076008', '0', '4');
INSERT INTO book_items VALUES ('372', '363076009', '0', '4');
INSERT INTO book_items VALUES ('373', '363076010', '0', '4');
INSERT INTO book_items VALUES ('374', '363076011', '0', '4');
INSERT INTO book_items VALUES ('375', '363076012', '0', '4');
INSERT INTO book_items VALUES ('376', '363076013', '0', '4');
INSERT INTO book_items VALUES ('377', '363076014', '0', '4');
INSERT INTO book_items VALUES ('378', '363076015', '0', '4');
INSERT INTO book_items VALUES ('379', '363076016', '0', '4');
INSERT INTO book_items VALUES ('380', '363076017', '0', '4');
INSERT INTO book_items VALUES ('381', '363076018', '0', '4');
INSERT INTO book_items VALUES ('382', '363076019', '0', '4');
INSERT INTO book_items VALUES ('383', '363076020', '0', '4');

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO groups VALUES ('1', 'admin', '{\"superuser\":1}', '2014-03-19 14:53:39', '2014-03-19 14:53:39');
INSERT INTO groups VALUES ('2', 'cataloger', '{\"home\":1,\"error\":1,\"logout\":1,\"book.create\":1,\"book.catalog\":1,\"book.preview\":1}', '2014-03-19 14:53:39', '2014-03-19 14:53:39');
INSERT INTO groups VALUES ('3', 'moderator', '{\"home\":1,\"error\":1,\"logout\":1}', '2014-03-19 14:53:39', '2014-03-19 14:53:39');
INSERT INTO groups VALUES ('4', 'librarian', '{\"home\":1,\"error\":1,\"logout\":1}', '2014-03-19 14:53:39', '2014-03-19 14:53:39');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of storages
-- ----------------------------
INSERT INTO storages VALUES ('1', null, '1', '2', '0', '2014-03-21 13:48:25', '2014-03-21 13:48:25', 'Kho A');
INSERT INTO storages VALUES ('2', null, '3', '24', '0', '2014-03-21 13:48:25', '2014-03-21 13:48:26', 'Kho B');
INSERT INTO storages VALUES ('3', '2', '4', '5', '1', '2014-03-21 13:48:25', '2014-03-21 13:48:25', 'Luật');
INSERT INTO storages VALUES ('4', '2', '6', '7', '1', '2014-03-21 13:48:25', '2014-03-21 13:48:25', 'Tham Khảo');
INSERT INTO storages VALUES ('5', '2', '8', '9', '1', '2014-03-21 13:48:25', '2014-03-21 13:48:26', 'Nghiệp vụ cơ bản');
INSERT INTO storages VALUES ('6', '2', '10', '23', '1', '2014-03-21 13:48:26', '2014-03-21 13:48:26', 'Chuyên ngành');
INSERT INTO storages VALUES ('7', '6', '11', '12', '2', '2014-03-21 13:48:26', '2014-03-21 13:48:26', 'Đường thủy');
INSERT INTO storages VALUES ('8', '6', '13', '14', '2', '2014-03-21 13:48:26', '2014-03-21 13:48:26', 'Đường bộ - Đường sắt');
INSERT INTO storages VALUES ('9', '6', '15', '16', '2', '2014-03-21 13:48:26', '2014-03-21 13:48:26', 'Cảnh sát môi trường');
INSERT INTO storages VALUES ('10', '6', '17', '18', '2', '2014-03-21 13:48:26', '2014-03-21 13:48:26', 'Cảnh sát kinh tế');
INSERT INTO storages VALUES ('11', '6', '19', '20', '2', '2014-03-21 13:48:26', '2014-03-21 13:48:26', 'Kỹ thuật hình sự');
INSERT INTO storages VALUES ('12', '6', '21', '22', '2', '2014-03-21 13:48:26', '2014-03-21 13:48:26', 'CA phụ trách xã');

-- ----------------------------
-- Table structure for `throttle`
-- ----------------------------
DROP TABLE IF EXISTS `throttle`;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of throttle
-- ----------------------------
INSERT INTO throttle VALUES ('1', '1', '127.0.0.1', '0', '0', '0', null, null, null);
INSERT INTO throttle VALUES ('2', '2', '127.0.0.1', '0', '0', '0', '2014-03-18 17:25:15', null, null);
INSERT INTO throttle VALUES ('3', '4', '127.0.0.1', '0', '0', '0', null, null, null);

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO users VALUES ('1', 'admin', '$2y$10$tKtC8a4baQvrXhH5.mkCQOZTd2Zqx3nYQBz./x4bPOh6ATNqzJUry', '{\"superuser\":1}', '1', null, null, '2014-04-03 20:19:28', '$2y$10$vGnDhN6BK2UVY.Q40zhErOdTYj08RbnTub1Y8yVaJJ1Ggytx4ulvi', null, null, null, '2014-03-19 14:53:42', '2014-04-03 20:19:28');
INSERT INTO users VALUES ('2', 'cataloger', '$2y$10$rUSKD.CUgYfvtcd9mGrU5eQFlj6q.BSSZ1tyQlBZ3DiYrucZgAC2C', '', '1', null, null, '2014-04-02 20:54:42', '$2y$10$NnvwnYYhahgRwD.4FO5IoeS8VixHoFXOsDieXV4zO.5V1.UjP3duK', null, null, null, '2014-03-19 14:53:42', '2014-04-02 20:54:42');
INSERT INTO users VALUES ('3', 'moderator', '$2y$10$LVZHuCxzBxao9/KeQWcP.uB9kKjaJkYcInkNllHAE5f9GLJvxt5AS', '', '1', null, null, null, null, null, null, null, '2014-03-19 14:53:42', '2014-03-19 14:53:42');
INSERT INTO users VALUES ('4', 'librarian', '$2y$10$m/1YH/gxyOVtITj8kIG.Q.pbAnCTn1e7/fvy0VN.6C8O4mp6jiX5W', '', '1', null, null, null, null, null, null, null, '2014-03-19 14:53:42', '2014-03-19 14:53:42');

-- ----------------------------
-- Table structure for `users_groups`
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO users_groups VALUES ('1', '1');
INSERT INTO users_groups VALUES ('2', '2');
INSERT INTO users_groups VALUES ('3', '3');
INSERT INTO users_groups VALUES ('4', '4');
