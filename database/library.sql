/*
Navicat MySQL Data Transfer

Source Server         : vienlemai
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : library

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2014-04-21 22:24:05
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `activities`
-- ----------------------------
DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activity_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activity_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visibility` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of activities
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO books VALUES ('1', '893520389', 'canh dong bat tan ', '', 'Nguyen ngoc tu', '', 'Xuất bản lần đầu', 'Van hoc', 'khong biet', '120', '17x21', 'không', 'Học viện cảnh sát', 'Tieng Viet', 'canh-dong-bat-tan', '123', '60.000', '1', '100', '1', '', '3', '2014-03-21 13:40:21', '2014-04-20 15:03:03', '1', '0', '2014-04-20 15:02:07', '2014-04-20 15:03:03', '1', null);
INSERT INTO books VALUES ('2', '893256620', 'Tiếu ngạo giang hồ', '', 'Kim Dung', '', '', '', '', '100', '', '', '', '', '', '', '', '1', '10', '1', '', '3', '2014-03-21 14:21:57', '2014-04-20 15:02:23', '1', '0', '2014-04-20 15:02:08', '2014-04-20 15:02:23', '1', null);
INSERT INTO books VALUES ('3', '893109731', 'Tuyển tập nhạc Trịnh', '', 'Nhiều tác giả', '', '', '', '', '100', '', '', '', '', '', '', '', '1', '10', '1', '', '3', '2014-03-21 14:22:50', '2014-04-20 15:02:30', '1', '0', '2014-04-20 15:02:08', '2014-04-20 15:02:30', '1', null);
INSERT INTO books VALUES ('4', '893289488', 'Lão tử tinh hoa', '', 'Nguyễn Duy Cần', '', '', '', '', '100', '', '', '', '', '', '', '', '1', '20', '2', '', '3', '2014-03-21 14:23:16', '2014-04-20 15:02:35', '1', '0', '2014-04-20 15:02:08', '2014-04-20 15:02:35', '1', '');
INSERT INTO books VALUES ('5', '893131518', 'Kinh dịch diễn giải', '', 'Nguyễn Duy Cần', '', '', '', '', '100', '', '', '', '', '', '', '', '1', '10', '3', '<p>Đ&atilde; sửa lỗi ch&iacute;nh tả</p>', '3', '2014-03-21 14:23:50', '2014-04-20 15:03:08', '1', '0', '2014-04-20 15:02:07', '2014-04-20 15:03:08', '1', '<p>Lỗi số lượng t&agrave;i liệu</p>\r\n<p>Lỗi ch&iacute;nh tả ng&ocirc;n ngữ</p>\r\n<p>Sai th&ocirc;ng tin nh&agrave; xuất bản</p>');
INSERT INTO books VALUES ('6', '893583982', 'Có một phố vừa đi qua phố', '', 'Đinh Vũ Hoàng Nguyên', '', '', '', '', '100', '', '', '', '', '', '', '', '1', '30', '1', '', '3', '2014-03-21 14:24:26', '2014-04-20 15:03:14', '1', '0', '2014-04-20 15:02:07', '2014-04-20 15:03:14', '1', null);
INSERT INTO books VALUES ('7', '893264897', 'Đêm qua sân trước một nhành mai', '', 'Nguyễn Tường Bách', '', '', '', '', '100', '', '', '', '', '', '', '', '1', '12', '3', '<p>Đ&atilde; sửa lỗi ch&iacute;nh tả</p>', '3', '2014-03-22 10:14:57', '2014-04-20 15:03:19', '1', '0', '2014-04-20 15:02:07', '2014-04-20 15:03:19', '1', 'Sai chính tả tên tác giả\r\nSai chính tả nhà xuất bản');
INSERT INTO books VALUES ('8', '893236803', 'Bên kia cánh cửa', '', 'Hà Thủy Nguyên', '', '', '', '', '100', '', '', '', '', '', '', '', '1', '10', '1', '', '3', '2014-03-22 10:19:34', '2014-04-20 15:02:41', '1', '0', '2014-04-20 15:02:08', '2014-04-20 15:02:41', '1', null);
INSERT INTO books VALUES ('9', '893181659', 'Kỹ thuật tàu thủy', '', 'Chưa rõ', '', '', '', '', '100', '', '', '', '', '', '', '', '1', '10', '1', '', '3', '2014-03-22 10:20:37', '2014-04-20 15:02:46', '1', '0', '2014-04-20 15:02:08', '2014-04-20 15:02:46', '1', null);
INSERT INTO books VALUES ('10', '893255160', 'Kỹ thuật tàu lửa', '', 'Chưa rõ', '', '', '', '', '100', '', '', '', '', '', '', '', '1', '10', '1', '', '3', '2014-03-22 10:41:30', '2014-04-20 15:03:24', '1', '0', '2014-04-20 15:02:07', '2014-04-20 15:03:24', '1', null);
INSERT INTO books VALUES ('11', '893165372', 'Kỹ thuật tàu thủy', '', 'Chưa rõ', '', '', '', '', '100', '', '', '', '', '', '', '', '1', '10', '1', '', '3', '2014-03-22 10:45:44', '2014-04-20 15:03:29', '1', '0', '2014-04-20 15:02:07', '2014-04-20 15:03:29', '1', null);
INSERT INTO books VALUES ('12', '893456807', 'Văn hóa phật giáo nguyên thủy', '', 'Nguyễn Duy Cần', '', '', '', '', '100', '', '', '', '', '', '', '', '1', '20', '1', '<p>Nhập 45 cuốn t&agrave;i li&ecirc;u</p>\r\n<p>Văn h&oacute;a phật gi&aacute;o nguy&ecirc;n thủy</p>', '3', '2014-03-29 13:36:51', '2014-04-20 15:02:52', '1', '0', '2014-04-20 15:02:08', '2014-04-20 15:02:52', '1', 'Lưu sai kho, sai nhà xuất bản');
INSERT INTO books VALUES ('13', '893175124', 'Đường mây qua xứ tuyết', '', 'Chưa rõ', 'Nguyên Phong', '', '', '', '100', '', '', '', '', '', '', '', '1', '20', '1', '', '3', '2014-04-08 09:57:45', '2014-04-20 15:03:34', '1', '0', '2014-04-20 15:02:07', '2014-04-20 15:03:34', '1', null);
INSERT INTO books VALUES ('14', '893148836', 'Trung quán luận', '', 'Ấn Thuận', '', '', '', '', '100', '', '', '', '', '', '', '', '1', '10', '1', '', '3', '2014-04-15 23:18:46', '2014-04-20 15:03:39', '1', '0', '2014-04-20 15:02:07', '2014-04-20 15:03:39', '1', null);
INSERT INTO books VALUES ('15', '893185507', 'Trung quán luận', '', 'Ấn Thuận', '', '', '', '', '100', '', '', '', '', '', '', '', '1', '10', '1', '', '3', '2014-04-20 13:03:22', '2014-04-20 15:02:57', '1', '0', '2014-04-20 15:02:08', '2014-04-20 15:02:57', '1', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=706 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book_items
-- ----------------------------
INSERT INTO book_items VALUES ('414', '8931855070011', '1', '15');
INSERT INTO book_items VALUES ('415', '8931855070028', '0', '15');
INSERT INTO book_items VALUES ('416', '8931855070035', '0', '15');
INSERT INTO book_items VALUES ('417', '8931855070042', '0', '15');
INSERT INTO book_items VALUES ('418', '8931855070059', '0', '15');
INSERT INTO book_items VALUES ('419', '8931855070066', '0', '15');
INSERT INTO book_items VALUES ('420', '8931855070073', '0', '15');
INSERT INTO book_items VALUES ('421', '8931855070080', '0', '15');
INSERT INTO book_items VALUES ('422', '8931855070097', '0', '15');
INSERT INTO book_items VALUES ('423', '8931855070103', '0', '15');
INSERT INTO book_items VALUES ('424', '8934568070019', '0', '12');
INSERT INTO book_items VALUES ('425', '8934568070026', '1', '12');
INSERT INTO book_items VALUES ('426', '8934568070033', '0', '12');
INSERT INTO book_items VALUES ('427', '8934568070040', '0', '12');
INSERT INTO book_items VALUES ('428', '8934568070057', '0', '12');
INSERT INTO book_items VALUES ('429', '8934568070064', '0', '12');
INSERT INTO book_items VALUES ('430', '8934568070071', '0', '12');
INSERT INTO book_items VALUES ('431', '8934568070088', '0', '12');
INSERT INTO book_items VALUES ('432', '8934568070095', '0', '12');
INSERT INTO book_items VALUES ('433', '8934568070101', '0', '12');
INSERT INTO book_items VALUES ('434', '8934568070118', '0', '12');
INSERT INTO book_items VALUES ('435', '8934568070125', '0', '12');
INSERT INTO book_items VALUES ('436', '8934568070132', '0', '12');
INSERT INTO book_items VALUES ('437', '8934568070149', '0', '12');
INSERT INTO book_items VALUES ('438', '8934568070156', '0', '12');
INSERT INTO book_items VALUES ('439', '8934568070163', '0', '12');
INSERT INTO book_items VALUES ('440', '8934568070170', '0', '12');
INSERT INTO book_items VALUES ('441', '8934568070187', '0', '12');
INSERT INTO book_items VALUES ('442', '8934568070194', '0', '12');
INSERT INTO book_items VALUES ('443', '8934568070200', '1', '12');
INSERT INTO book_items VALUES ('444', '8932894880012', '0', '4');
INSERT INTO book_items VALUES ('445', '8932894880029', '0', '4');
INSERT INTO book_items VALUES ('446', '8932894880036', '0', '4');
INSERT INTO book_items VALUES ('447', '8932894880043', '0', '4');
INSERT INTO book_items VALUES ('448', '8932894880050', '0', '4');
INSERT INTO book_items VALUES ('449', '8932894880067', '0', '4');
INSERT INTO book_items VALUES ('450', '8932894880074', '0', '4');
INSERT INTO book_items VALUES ('451', '8932894880081', '0', '4');
INSERT INTO book_items VALUES ('452', '8932894880098', '0', '4');
INSERT INTO book_items VALUES ('453', '8932894880104', '0', '4');
INSERT INTO book_items VALUES ('454', '8932894880111', '0', '4');
INSERT INTO book_items VALUES ('455', '8932894880128', '0', '4');
INSERT INTO book_items VALUES ('456', '8932894880135', '0', '4');
INSERT INTO book_items VALUES ('457', '8932894880142', '0', '4');
INSERT INTO book_items VALUES ('458', '8932894880159', '0', '4');
INSERT INTO book_items VALUES ('459', '8932894880166', '0', '4');
INSERT INTO book_items VALUES ('460', '8932894880173', '0', '4');
INSERT INTO book_items VALUES ('461', '8932894880180', '0', '4');
INSERT INTO book_items VALUES ('462', '8932894880197', '0', '4');
INSERT INTO book_items VALUES ('463', '8932894880203', '0', '4');
INSERT INTO book_items VALUES ('464', '8931097310012', '0', '3');
INSERT INTO book_items VALUES ('465', '8931097310029', '1', '3');
INSERT INTO book_items VALUES ('466', '8931097310036', '0', '3');
INSERT INTO book_items VALUES ('467', '8931097310043', '0', '3');
INSERT INTO book_items VALUES ('468', '8931097310050', '0', '3');
INSERT INTO book_items VALUES ('469', '8931097310067', '0', '3');
INSERT INTO book_items VALUES ('470', '8931097310074', '0', '3');
INSERT INTO book_items VALUES ('471', '8931097310081', '0', '3');
INSERT INTO book_items VALUES ('472', '8931097310098', '0', '3');
INSERT INTO book_items VALUES ('473', '8931097310104', '0', '3');
INSERT INTO book_items VALUES ('474', '8932368030011', '0', '8');
INSERT INTO book_items VALUES ('475', '8932368030028', '0', '8');
INSERT INTO book_items VALUES ('476', '8932368030035', '0', '8');
INSERT INTO book_items VALUES ('477', '8932368030042', '0', '8');
INSERT INTO book_items VALUES ('478', '8932368030059', '1', '8');
INSERT INTO book_items VALUES ('479', '8932368030066', '0', '8');
INSERT INTO book_items VALUES ('480', '8932368030073', '0', '8');
INSERT INTO book_items VALUES ('481', '8932368030080', '0', '8');
INSERT INTO book_items VALUES ('482', '8932368030097', '0', '8');
INSERT INTO book_items VALUES ('483', '8932368030103', '0', '8');
INSERT INTO book_items VALUES ('484', '8931816590015', '0', '9');
INSERT INTO book_items VALUES ('485', '8931816590022', '0', '9');
INSERT INTO book_items VALUES ('486', '8931816590039', '0', '9');
INSERT INTO book_items VALUES ('487', '8931816590046', '0', '9');
INSERT INTO book_items VALUES ('488', '8931816590053', '0', '9');
INSERT INTO book_items VALUES ('489', '8931816590060', '0', '9');
INSERT INTO book_items VALUES ('490', '8931816590077', '0', '9');
INSERT INTO book_items VALUES ('491', '8931816590084', '0', '9');
INSERT INTO book_items VALUES ('492', '8931816590091', '0', '9');
INSERT INTO book_items VALUES ('493', '8931816590107', '0', '9');
INSERT INTO book_items VALUES ('494', '8932566200018', '0', '2');
INSERT INTO book_items VALUES ('495', '8932566200025', '0', '2');
INSERT INTO book_items VALUES ('496', '8932566200032', '0', '2');
INSERT INTO book_items VALUES ('497', '8932566200049', '0', '2');
INSERT INTO book_items VALUES ('498', '8932566200056', '0', '2');
INSERT INTO book_items VALUES ('499', '8932566200063', '0', '2');
INSERT INTO book_items VALUES ('500', '8932566200070', '0', '2');
INSERT INTO book_items VALUES ('501', '8932566200087', '0', '2');
INSERT INTO book_items VALUES ('502', '8932566200094', '0', '2');
INSERT INTO book_items VALUES ('503', '8932566200100', '0', '2');
INSERT INTO book_items VALUES ('504', '8935203890016', '0', '1');
INSERT INTO book_items VALUES ('505', '8935203890023', '0', '1');
INSERT INTO book_items VALUES ('506', '8935203890030', '0', '1');
INSERT INTO book_items VALUES ('507', '8935203890047', '0', '1');
INSERT INTO book_items VALUES ('508', '8935203890054', '0', '1');
INSERT INTO book_items VALUES ('509', '8935203890061', '0', '1');
INSERT INTO book_items VALUES ('510', '8935203890078', '0', '1');
INSERT INTO book_items VALUES ('511', '8935203890085', '0', '1');
INSERT INTO book_items VALUES ('512', '8935203890092', '0', '1');
INSERT INTO book_items VALUES ('513', '8935203890108', '0', '1');
INSERT INTO book_items VALUES ('514', '8935203890115', '0', '1');
INSERT INTO book_items VALUES ('515', '8935203890122', '0', '1');
INSERT INTO book_items VALUES ('516', '8935203890139', '0', '1');
INSERT INTO book_items VALUES ('517', '8935203890146', '0', '1');
INSERT INTO book_items VALUES ('518', '8935203890153', '0', '1');
INSERT INTO book_items VALUES ('519', '8935203890160', '0', '1');
INSERT INTO book_items VALUES ('520', '8935203890177', '0', '1');
INSERT INTO book_items VALUES ('521', '8935203890184', '0', '1');
INSERT INTO book_items VALUES ('522', '8935203890191', '0', '1');
INSERT INTO book_items VALUES ('523', '8935203890207', '0', '1');
INSERT INTO book_items VALUES ('524', '8935203890214', '0', '1');
INSERT INTO book_items VALUES ('525', '8935203890221', '0', '1');
INSERT INTO book_items VALUES ('526', '8935203890238', '0', '1');
INSERT INTO book_items VALUES ('527', '8935203890245', '0', '1');
INSERT INTO book_items VALUES ('528', '8935203890252', '0', '1');
INSERT INTO book_items VALUES ('529', '8935203890269', '0', '1');
INSERT INTO book_items VALUES ('530', '8935203890276', '0', '1');
INSERT INTO book_items VALUES ('531', '8935203890283', '0', '1');
INSERT INTO book_items VALUES ('532', '8935203890290', '0', '1');
INSERT INTO book_items VALUES ('533', '8935203890306', '0', '1');
INSERT INTO book_items VALUES ('534', '8935203890313', '0', '1');
INSERT INTO book_items VALUES ('535', '8935203890320', '0', '1');
INSERT INTO book_items VALUES ('536', '8935203890337', '0', '1');
INSERT INTO book_items VALUES ('537', '8935203890344', '0', '1');
INSERT INTO book_items VALUES ('538', '8935203890351', '0', '1');
INSERT INTO book_items VALUES ('539', '8935203890368', '0', '1');
INSERT INTO book_items VALUES ('540', '8935203890375', '0', '1');
INSERT INTO book_items VALUES ('541', '8935203890382', '0', '1');
INSERT INTO book_items VALUES ('542', '8935203890399', '0', '1');
INSERT INTO book_items VALUES ('543', '8935203890405', '0', '1');
INSERT INTO book_items VALUES ('544', '8935203890412', '0', '1');
INSERT INTO book_items VALUES ('545', '8935203890429', '0', '1');
INSERT INTO book_items VALUES ('546', '8935203890436', '0', '1');
INSERT INTO book_items VALUES ('547', '8935203890443', '0', '1');
INSERT INTO book_items VALUES ('548', '8935203890450', '0', '1');
INSERT INTO book_items VALUES ('549', '8935203890467', '0', '1');
INSERT INTO book_items VALUES ('550', '8935203890474', '0', '1');
INSERT INTO book_items VALUES ('551', '8935203890481', '0', '1');
INSERT INTO book_items VALUES ('552', '8935203890498', '0', '1');
INSERT INTO book_items VALUES ('553', '8935203890504', '0', '1');
INSERT INTO book_items VALUES ('554', '8935203890511', '0', '1');
INSERT INTO book_items VALUES ('555', '8935203890528', '0', '1');
INSERT INTO book_items VALUES ('556', '8935203890535', '0', '1');
INSERT INTO book_items VALUES ('557', '8935203890542', '0', '1');
INSERT INTO book_items VALUES ('558', '8935203890559', '0', '1');
INSERT INTO book_items VALUES ('559', '8935203890566', '0', '1');
INSERT INTO book_items VALUES ('560', '8935203890573', '0', '1');
INSERT INTO book_items VALUES ('561', '8935203890580', '0', '1');
INSERT INTO book_items VALUES ('562', '8935203890597', '0', '1');
INSERT INTO book_items VALUES ('563', '8935203890603', '0', '1');
INSERT INTO book_items VALUES ('564', '8935203890610', '0', '1');
INSERT INTO book_items VALUES ('565', '8935203890627', '0', '1');
INSERT INTO book_items VALUES ('566', '8935203890634', '0', '1');
INSERT INTO book_items VALUES ('567', '8935203890641', '0', '1');
INSERT INTO book_items VALUES ('568', '8935203890658', '0', '1');
INSERT INTO book_items VALUES ('569', '8935203890665', '0', '1');
INSERT INTO book_items VALUES ('570', '8935203890672', '0', '1');
INSERT INTO book_items VALUES ('571', '8935203890689', '0', '1');
INSERT INTO book_items VALUES ('572', '8935203890696', '0', '1');
INSERT INTO book_items VALUES ('573', '8935203890702', '0', '1');
INSERT INTO book_items VALUES ('574', '8935203890719', '0', '1');
INSERT INTO book_items VALUES ('575', '8935203890726', '0', '1');
INSERT INTO book_items VALUES ('576', '8935203890733', '0', '1');
INSERT INTO book_items VALUES ('577', '8935203890740', '0', '1');
INSERT INTO book_items VALUES ('578', '8935203890757', '0', '1');
INSERT INTO book_items VALUES ('579', '8935203890764', '0', '1');
INSERT INTO book_items VALUES ('580', '8935203890771', '0', '1');
INSERT INTO book_items VALUES ('581', '8935203890788', '0', '1');
INSERT INTO book_items VALUES ('582', '8935203890795', '0', '1');
INSERT INTO book_items VALUES ('583', '8935203890801', '0', '1');
INSERT INTO book_items VALUES ('584', '8935203890818', '0', '1');
INSERT INTO book_items VALUES ('585', '8935203890825', '0', '1');
INSERT INTO book_items VALUES ('586', '8935203890832', '0', '1');
INSERT INTO book_items VALUES ('587', '8935203890849', '0', '1');
INSERT INTO book_items VALUES ('588', '8935203890856', '0', '1');
INSERT INTO book_items VALUES ('589', '8935203890863', '0', '1');
INSERT INTO book_items VALUES ('590', '8935203890870', '0', '1');
INSERT INTO book_items VALUES ('591', '8935203890887', '0', '1');
INSERT INTO book_items VALUES ('592', '8935203890894', '0', '1');
INSERT INTO book_items VALUES ('593', '8935203890900', '0', '1');
INSERT INTO book_items VALUES ('594', '8935203890917', '0', '1');
INSERT INTO book_items VALUES ('595', '8935203890924', '0', '1');
INSERT INTO book_items VALUES ('596', '8935203890931', '0', '1');
INSERT INTO book_items VALUES ('597', '8935203890948', '0', '1');
INSERT INTO book_items VALUES ('598', '8935203890955', '0', '1');
INSERT INTO book_items VALUES ('599', '8935203890962', '0', '1');
INSERT INTO book_items VALUES ('600', '8935203890979', '0', '1');
INSERT INTO book_items VALUES ('601', '8935203890986', '0', '1');
INSERT INTO book_items VALUES ('602', '8935203890993', '0', '1');
INSERT INTO book_items VALUES ('603', '8935203891006', '0', '1');
INSERT INTO book_items VALUES ('604', '8931751240013', '0', '13');
INSERT INTO book_items VALUES ('605', '8931751240020', '0', '13');
INSERT INTO book_items VALUES ('606', '8931751240037', '0', '13');
INSERT INTO book_items VALUES ('607', '8931751240044', '0', '13');
INSERT INTO book_items VALUES ('608', '8931751240051', '0', '13');
INSERT INTO book_items VALUES ('609', '8931751240068', '0', '13');
INSERT INTO book_items VALUES ('610', '8931751240075', '0', '13');
INSERT INTO book_items VALUES ('611', '8931751240082', '0', '13');
INSERT INTO book_items VALUES ('612', '8931751240099', '0', '13');
INSERT INTO book_items VALUES ('613', '8931751240105', '0', '13');
INSERT INTO book_items VALUES ('614', '8931751240112', '0', '13');
INSERT INTO book_items VALUES ('615', '8931751240129', '0', '13');
INSERT INTO book_items VALUES ('616', '8931751240136', '0', '13');
INSERT INTO book_items VALUES ('617', '8931751240143', '0', '13');
INSERT INTO book_items VALUES ('618', '8931751240150', '0', '13');
INSERT INTO book_items VALUES ('619', '8931751240167', '0', '13');
INSERT INTO book_items VALUES ('620', '8931751240174', '0', '13');
INSERT INTO book_items VALUES ('621', '8931751240181', '0', '13');
INSERT INTO book_items VALUES ('622', '8931751240198', '0', '13');
INSERT INTO book_items VALUES ('623', '8931751240204', '0', '13');
INSERT INTO book_items VALUES ('624', '8932648970013', '0', '7');
INSERT INTO book_items VALUES ('625', '8932648970020', '0', '7');
INSERT INTO book_items VALUES ('626', '8932648970037', '0', '7');
INSERT INTO book_items VALUES ('627', '8932648970044', '0', '7');
INSERT INTO book_items VALUES ('628', '8932648970051', '0', '7');
INSERT INTO book_items VALUES ('629', '8932648970068', '0', '7');
INSERT INTO book_items VALUES ('630', '8932648970075', '0', '7');
INSERT INTO book_items VALUES ('631', '8932648970082', '0', '7');
INSERT INTO book_items VALUES ('632', '8932648970099', '0', '7');
INSERT INTO book_items VALUES ('633', '8932648970105', '0', '7');
INSERT INTO book_items VALUES ('634', '8932648970112', '0', '7');
INSERT INTO book_items VALUES ('635', '8932648970129', '0', '7');
INSERT INTO book_items VALUES ('636', '8935839820012', '0', '6');
INSERT INTO book_items VALUES ('637', '8935839820029', '0', '6');
INSERT INTO book_items VALUES ('638', '8935839820036', '0', '6');
INSERT INTO book_items VALUES ('639', '8935839820043', '0', '6');
INSERT INTO book_items VALUES ('640', '8935839820050', '0', '6');
INSERT INTO book_items VALUES ('641', '8935839820067', '0', '6');
INSERT INTO book_items VALUES ('642', '8935839820074', '0', '6');
INSERT INTO book_items VALUES ('643', '8935839820081', '0', '6');
INSERT INTO book_items VALUES ('644', '8935839820098', '0', '6');
INSERT INTO book_items VALUES ('645', '8935839820104', '0', '6');
INSERT INTO book_items VALUES ('646', '8935839820111', '0', '6');
INSERT INTO book_items VALUES ('647', '8935839820128', '0', '6');
INSERT INTO book_items VALUES ('648', '8935839820135', '0', '6');
INSERT INTO book_items VALUES ('649', '8935839820142', '0', '6');
INSERT INTO book_items VALUES ('650', '8935839820159', '0', '6');
INSERT INTO book_items VALUES ('651', '8935839820166', '0', '6');
INSERT INTO book_items VALUES ('652', '8935839820173', '0', '6');
INSERT INTO book_items VALUES ('653', '8935839820180', '0', '6');
INSERT INTO book_items VALUES ('654', '8935839820197', '0', '6');
INSERT INTO book_items VALUES ('655', '8935839820203', '0', '6');
INSERT INTO book_items VALUES ('656', '8935839820210', '0', '6');
INSERT INTO book_items VALUES ('657', '8935839820227', '0', '6');
INSERT INTO book_items VALUES ('658', '8935839820234', '0', '6');
INSERT INTO book_items VALUES ('659', '8935839820241', '0', '6');
INSERT INTO book_items VALUES ('660', '8935839820258', '0', '6');
INSERT INTO book_items VALUES ('661', '8935839820265', '0', '6');
INSERT INTO book_items VALUES ('662', '8935839820272', '0', '6');
INSERT INTO book_items VALUES ('663', '8935839820289', '0', '6');
INSERT INTO book_items VALUES ('664', '8935839820296', '0', '6');
INSERT INTO book_items VALUES ('665', '8935839820302', '0', '6');
INSERT INTO book_items VALUES ('666', '8931315180014', '0', '5');
INSERT INTO book_items VALUES ('667', '8931315180021', '0', '5');
INSERT INTO book_items VALUES ('668', '8931315180038', '0', '5');
INSERT INTO book_items VALUES ('669', '8931315180045', '0', '5');
INSERT INTO book_items VALUES ('670', '8931315180052', '0', '5');
INSERT INTO book_items VALUES ('671', '8931315180069', '0', '5');
INSERT INTO book_items VALUES ('672', '8931315180076', '0', '5');
INSERT INTO book_items VALUES ('673', '8931315180083', '0', '5');
INSERT INTO book_items VALUES ('674', '8931315180090', '0', '5');
INSERT INTO book_items VALUES ('675', '8931315180106', '0', '5');
INSERT INTO book_items VALUES ('676', '8931653720019', '0', '11');
INSERT INTO book_items VALUES ('677', '8931653720026', '0', '11');
INSERT INTO book_items VALUES ('678', '8931653720033', '0', '11');
INSERT INTO book_items VALUES ('679', '8931653720040', '0', '11');
INSERT INTO book_items VALUES ('680', '8931653720057', '0', '11');
INSERT INTO book_items VALUES ('681', '8931653720064', '0', '11');
INSERT INTO book_items VALUES ('682', '8931653720071', '0', '11');
INSERT INTO book_items VALUES ('683', '8931653720088', '0', '11');
INSERT INTO book_items VALUES ('684', '8931653720095', '0', '11');
INSERT INTO book_items VALUES ('685', '8931653720101', '0', '11');
INSERT INTO book_items VALUES ('686', '8932551600014', '0', '10');
INSERT INTO book_items VALUES ('687', '8932551600021', '0', '10');
INSERT INTO book_items VALUES ('688', '8932551600038', '0', '10');
INSERT INTO book_items VALUES ('689', '8932551600045', '0', '10');
INSERT INTO book_items VALUES ('690', '8932551600052', '0', '10');
INSERT INTO book_items VALUES ('691', '8932551600069', '0', '10');
INSERT INTO book_items VALUES ('692', '8932551600076', '0', '10');
INSERT INTO book_items VALUES ('693', '8932551600083', '0', '10');
INSERT INTO book_items VALUES ('694', '8932551600090', '0', '10');
INSERT INTO book_items VALUES ('695', '8932551600106', '0', '10');
INSERT INTO book_items VALUES ('696', '8931488360015', '0', '14');
INSERT INTO book_items VALUES ('697', '8931488360022', '0', '14');
INSERT INTO book_items VALUES ('698', '8931488360039', '0', '14');
INSERT INTO book_items VALUES ('699', '8931488360046', '0', '14');
INSERT INTO book_items VALUES ('700', '8931488360053', '0', '14');
INSERT INTO book_items VALUES ('701', '8931488360060', '0', '14');
INSERT INTO book_items VALUES ('702', '8931488360077', '0', '14');
INSERT INTO book_items VALUES ('703', '8931488360084', '0', '14');
INSERT INTO book_items VALUES ('704', '8931488360091', '0', '14');
INSERT INTO book_items VALUES ('705', '8931488360107', '0', '14');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of circulations
-- ----------------------------
INSERT INTO circulations VALUES ('1', '1', '414', '1', '1', '2014-04-20 15:04:30', '0', '0', '2014-05-30 15:04:30');
INSERT INTO circulations VALUES ('2', '1', '425', '1', '0', '2014-04-20 15:04:48', '0', '0', '2014-05-20 15:04:48');
INSERT INTO circulations VALUES ('3', '1', '443', '1', '0', '2014-04-20 15:14:51', '0', '0', '2014-05-20 15:14:51');
INSERT INTO circulations VALUES ('4', '1', '465', '1', '0', '2014-04-20 15:15:05', '0', '0', '2014-05-20 15:15:05');
INSERT INTO circulations VALUES ('5', '1', '478', '1', '0', '2014-04-20 15:15:13', '0', '0', '2014-05-20 15:15:13');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of configs
-- ----------------------------
INSERT INTO configs VALUES ('1', 'Thời hạn thẻ', '365', 'Ngày', 'reader_expired');
INSERT INTO configs VALUES ('2', 'Hạn trả tài liệu', '30', 'Ngày', 'book_expired');
INSERT INTO configs VALUES ('3', 'Số tài liệu mượn tối đa mượn tại chỗ', '5', 'Cuốn', 'max_book_local');
INSERT INTO configs VALUES ('4', 'Số tài liệu mượn tối đa mượn về nhà', '5', 'Cuốn', 'max_book_remote');
INSERT INTO configs VALUES ('5', 'Số lần gia hạn tối đa', '2', 'Lần', 'extra_times');
INSERT INTO configs VALUES ('6', 'Thời gian gia hạn thêm tài liệu', '10', 'Ngày', 'book_more_time');
INSERT INTO configs VALUES ('7', 'Thời gian gia hạn thêm thẻ', '365', 'Ngày', 'reader_more_time');
INSERT INTO configs VALUES ('8', 'Tiền phạt trễ hạn tài liệu', '1000', 'Đồng/ngày/cuốn', 'book_expired_fine');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of readers
-- ----------------------------
INSERT INTO readers VALUES ('1', '8931099276002', 'Bạn đọc 1', 'CSGT-02', '', '', '', '', 'bandoc1@gmail.com', '', '2014-04-20 15:12:36', '2014-04-20 15:12:36', '0', '1', 'http://dev.library.com/img/readers/00_21913_506317849388288_1070815768_n.jpg', '2015-04-20 15:12:36', '0');
INSERT INTO readers VALUES ('2', '8931398854444', 'Bạn đọc 2', 'CSGT-01', '', '', '', '', 'bandoc2@gmail.com', '', '2014-04-20 15:13:01', '2014-04-20 15:13:01', '0', '1', 'http://dev.library.com/img/readers/00_67109_491182837568456_587673803_n.jpg', '2015-04-20 15:13:01', '0');
INSERT INTO readers VALUES ('3', '8932354449872', 'Bạn đọc 3', 'CSGT-02', '', '', '', '', 'bandoc3@gmail.com', '', '2014-04-20 15:13:26', '2014-04-20 15:13:26', '0', '1', 'http://dev.library.com/img/readers/00_196619_488302877856452_1805650384_n.jpg', '2015-04-20 15:13:26', '0');
INSERT INTO readers VALUES ('4', '8931329055544', 'Bạn đọc 4', 'CSGT-02', '', '', '', '', 'bandoc4@gmail.com', '', '2014-04-20 15:13:52', '2014-04-20 15:13:52', '0', '1', 'http://dev.library.com/img/readers/00_269818_497258706960869_766665040_n.jpg', '2015-04-20 15:13:52', '0');

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
INSERT INTO users VALUES ('1', 'admin', '$2y$10$tKtC8a4baQvrXhH5.mkCQOZTd2Zqx3nYQBz./x4bPOh6ATNqzJUry', '{\"superuser\":1}', '1', null, null, '2014-04-21 21:48:53', '$2y$10$eCl2LismshHERGBpIcByr.kHdoTGEMZad..HuA.E.juCOqaHxDG8u', null, null, 'Viện', '2014-03-19 14:53:42', '2014-04-21 21:48:53');
INSERT INTO users VALUES ('2', 'cataloger', '$2y$10$rUSKD.CUgYfvtcd9mGrU5eQFlj6q.BSSZ1tyQlBZ3DiYrucZgAC2C', '', '1', null, null, '2014-04-02 20:54:42', '$2y$10$NnvwnYYhahgRwD.4FO5IoeS8VixHoFXOsDieXV4zO.5V1.UjP3duK', null, null, 'Luân', '2014-03-19 14:53:42', '2014-04-02 20:54:42');
INSERT INTO users VALUES ('3', 'moderator', '$2y$10$LVZHuCxzBxao9/KeQWcP.uB9kKjaJkYcInkNllHAE5f9GLJvxt5AS', '', '1', null, null, null, null, null, null, 'Thuật', '2014-03-19 14:53:42', '2014-03-19 14:53:42');
INSERT INTO users VALUES ('4', 'librarian', '$2y$10$m/1YH/gxyOVtITj8kIG.Q.pbAnCTn1e7/fvy0VN.6C8O4mp6jiX5W', '', '1', null, null, null, null, null, null, 'Huynh', '2014-03-19 14:53:42', '2014-03-19 14:53:42');

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
