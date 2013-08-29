/*
MySQL Data Transfer
Source Host: localhost
Source Database: istar_db
Target Host: localhost
Target Database: istar_db
Date: 2013-08-25 22:27:36
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for core_fans
-- ----------------------------
CREATE TABLE `core_fans` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(30) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `created` int(10) DEFAULT NULL,
  `updated` int(10) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for core_program
-- ----------------------------
CREATE TABLE `core_program` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `p_c_id` tinyint(1) DEFAULT NULL,
  `p_c` varchar(255) DEFAULT NULL,
  `p_a_id` tinyint(1) DEFAULT NULL,
  `p_a` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created` int(10) DEFAULT NULL,
  `updated` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for core_program_area
-- ----------------------------
CREATE TABLE `core_program_area` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for core_program_category
-- ----------------------------
CREATE TABLE `core_program_category` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for core_share
-- ----------------------------
CREATE TABLE `core_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `fans` text,
  `sid` int(11) DEFAULT NULL,
  `star` text,
  `s_c_id` int(11) DEFAULT NULL,
  `share_collection` text,
  `desc` varchar(255) DEFAULT NULL,
  `img_group` text,
  `created` int(10) DEFAULT NULL,
  `updated` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for core_share_collection
-- ----------------------------
CREATE TABLE `core_share_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `fans` text,
  `name` varchar(40) DEFAULT NULL,
  `created` int(10) DEFAULT NULL,
  `updated` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for core_star
-- ----------------------------
CREATE TABLE `core_star` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `truename` varchar(10) DEFAULT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `fans_tag` varchar(10) DEFAULT NULL,
  `pid` smallint(5) DEFAULT NULL,
  `program` text,
  `avatar` varchar(255) DEFAULT NULL,
  `created` int(10) DEFAULT NULL,
  `updated` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for core_star_share_collection
-- ----------------------------
CREATE TABLE `core_star_share_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` smallint(5) DEFAULT NULL,
  `star` text,
  `uid` int(11) DEFAULT NULL,
  `fans` text,
  `name` varchar(40) DEFAULT NULL,
  `created` int(10) DEFAULT NULL,
  `updated` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sys_account
-- ----------------------------
CREATE TABLE `sys_account` (
  `aid` int(11) NOT NULL AUTO_INCREMENT COMMENT '账户ID',
  `aname` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '账户名',
  `apwd` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '账户密码',
  `created` int(10) DEFAULT NULL COMMENT '创建时间',
  `updated` int(10) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  KEY `account_name` (`aname`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for sys_admin
-- ----------------------------
CREATE TABLE `sys_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(255) NOT NULL,
  `aid` int(11) DEFAULT NULL,
  `created` int(10) DEFAULT NULL,
  `updated` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for sys_log
-- ----------------------------
CREATE TABLE `sys_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(10) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `core_fans` VALUES ('3', '靓颖', '2b0b91ef131442c5f3353621c1374756.jpg', '3', '{\"aname\":\"19831030tq\",\"apwd\":\"3c705ee140ca9df8cea3b46f36d470f4ec771846a4bd1b17bd96f2657a168cb4\",\"aid\":3}', '1377015259', '1377015259');
INSERT INTO `core_fans` VALUES ('4', '春春2', 'f8e36aa04ebe9a4eb6f524ad0030ff4a.gif', '4', '{\"aname\":\"nosky\",\"apwd\":\"41367da481cbf34865643031d2ff9cdddd4afa25a00e21ff830baf364ef170fd\",\"aid\":4}', '1377015926', '1377015926');
INSERT INTO `core_fans` VALUES ('5', '靓颖2', 'ad855f21587082cadcd55cb23fe846af.jpg', '5', '{\"aname\":\"testone1\",\"apwd\":\"f943b6a474bf371753df364f502805386cfd25387cc704cd5323f35df0db6c26\",\"aid\":5}', '1377015954', '1377019714');
INSERT INTO `core_program_area` VALUES ('1', '大陆');
INSERT INTO `core_program_area` VALUES ('2', '港台');
INSERT INTO `core_program_area` VALUES ('3', '欧美');
INSERT INTO `core_program_area` VALUES ('4', '日韩');
INSERT INTO `core_program_category` VALUES ('1', '综艺');
INSERT INTO `core_program_category` VALUES ('3', 'NBA');
INSERT INTO `core_program_category` VALUES ('4', '选美大赛');
INSERT INTO `core_program_category` VALUES ('9', '其他');
INSERT INTO `core_share` VALUES ('4', '5', '{\"uid\":\"5\",\"nickname\":\"\\u9753\\u98962\",\"avatar\":\"ad855f21587082cadcd55cb23fe846af.jpg\",\"aid\":\"5\",\"account\":\"{\\\"aname\\\":\\\"testone1\\\",\\\"apwd\\\":\\\"f943b6a474bf371753df364f502805386cfd25387cc704cd5323f35df0db6c26\\\",\\\"aid\\\":5}\"}', '1', '{\"id\":\"1\",\"truename\":\"\\u674e\\u5b87\\u6625\",\"nickname\":\"\\u6625\\u6625\",\"fans_tag\":\"\\u7389\\u7c73\",\"pid\":\"2\",\"program\":\"{\\\"id\\\":\\\"2\\\",\\\"p_c\\\":\\\"{\\\\\\\"id\\\\\\\":1,\\\\\\\"name\\\\\\\":\\\\\\\"\\\\\\\\u7efc\\\\\\\\u827a\\\\\\\"}\\\",\\\"p_a\\\":\\\"{\\\\\\\"id\\\\\\\":1,\\\\\\\"name\\\\\\\":\\\\\\\"\\\\\\\\u5927\\\\\\\\u9646\\\\\\\"}\\\",\\\"name\\\":\\\"\\\\u8d85\\\\u7ea7\\\\u5973\\\\u58f0\\\",\\\"logo\\\":\\\"b9fdefa400bde3bd00e3110d2aa667c2.jpg\\\"}\",\"avatar\":\"lyc.jpg\"}', '4', '{\"id\":\"4\",\"uid\":\"5\",\"fans\":\"{\\\"uid\\\":\\\"5\\\",\\\"nickname\\\":\\\"\\\\u9753\\\\u98962\\\",\\\"avatar\\\":\\\"ad855f21587082cadcd55cb23fe846af.jpg\\\",\\\"aid\\\":\\\"5\\\",\\\"account\\\":\\\"{\\\\\\\"aname\\\\\\\":\\\\\\\"testone1\\\\\\\",\\\\\\\"apwd\\\\\\\":\\\\\\\"f943b6a474bf371753df364f502805386cfd25387cc704cd5323f35df0db6c26\\\\\\\",\\\\\\\"aid\\\\\\\":5}\\\"}\",\"name\":\"NBA\"}', '1111111122', '{\"img_group0\":\"5a222f391dddd92e84f385ed57eca900.jpg\",\"img_group1\":\"7ba1c35aab0ae8f8dee13938c374f806.jpg\",\"img_group2\":\"05f3d8b75dcff1bd7c3bb219b1326d97.jpg\",\"img_group3\":\"ebf25582e644066f07f6df8e78bf880e.jpg\"}', '1377157527', '1377159319');
INSERT INTO `core_share_collection` VALUES ('2', '5', '{\"uid\":\"5\",\"nickname\":\"\\u9753\\u98962\",\"avatar\":\"ad855f21587082cadcd55cb23fe846af.jpg\",\"account\":\"{\\\"aname\\\":\\\"testone1\\\",\\\"apwd\\\":\\\"f943b6a474bf371753df364f502805386cfd25387cc704cd5323f35df0db6c26\\\",\\\"aid\\\":5}\"}', '好看的杂志7', '1377065467', '1377066602');
INSERT INTO `core_share_collection` VALUES ('3', '4', '{\"uid\":\"4\",\"nickname\":\"\\u6625\\u66252\",\"avatar\":\"f8e36aa04ebe9a4eb6f524ad0030ff4a.gif\",\"account\":\"{\\\"aname\\\":\\\"nosky\\\",\\\"apwd\\\":\\\"41367da481cbf34865643031d2ff9cdddd4afa25a00e21ff830baf364ef170fd\\\",\\\"aid\\\":4}\"}', '春哥好杂志', '1377066030', '1377066030');
INSERT INTO `core_share_collection` VALUES ('4', '5', '{\"uid\":\"5\",\"nickname\":\"\\u9753\\u98962\",\"avatar\":\"ad855f21587082cadcd55cb23fe846af.jpg\",\"aid\":\"5\",\"account\":\"{\\\"aname\\\":\\\"testone1\\\",\\\"apwd\\\":\\\"f943b6a474bf371753df364f502805386cfd25387cc704cd5323f35df0db6c26\\\",\\\"aid\\\":5}\"}', 'NBA', '1377088134', '1377088134');
INSERT INTO `core_star_share_collection` VALUES ('6', '1', '{\"id\":\"1\",\"truename\":\"\\u674e\\u5b87\\u6625\",\"nickname\":\"\\u6625\\u6625\",\"fans_tag\":\"\\u7389\\u7c73\",\"pid\":\"2\",\"program\":\"{\\\"id\\\":\\\"2\\\",\\\"p_c\\\":\\\"{\\\\\\\"id\\\\\\\":1,\\\\\\\"name\\\\\\\":\\\\\\\"\\\\\\\\u7efc\\\\\\\\u827a\\\\\\\"}\\\",\\\"p_a\\\":\\\"{\\\\\\\"id\\\\\\\":1,\\\\\\\"name\\\\\\\":\\\\\\\"\\\\\\\\u5927\\\\\\\\u9646\\\\\\\"}\\\",\\\"name\\\":\\\"\\\\u8d85\\\\u7ea7\\\\u5973\\\\u58f0\\\",\\\"logo\\\":\\\"b9fdefa400bde3bd00e3110d2aa667c2.jpg\\\"}\",\"avatar\":\"lyc.jpg\"}', '5', '{\"uid\":\"5\",\"nickname\":\"\\u9753\\u98962\",\"avatar\":\"ad855f21587082cadcd55cb23fe846af.jpg\",\"aid\":\"5\",\"account\":\"{\\\"aname\\\":\\\"testone1\\\",\\\"apwd\\\":\\\"f943b6a474bf371753df364f502805386cfd25387cc704cd5323f35df0db6c26\\\",\\\"aid\\\":5}\"}', '方法2', '1377314171', '1377314984');
INSERT INTO `sys_account` VALUES ('1', 'qq19831030qq', '3c705ee140ca9df8cea3b46f36d470f4ec771846a4bd1b17bd96f2657a168cb4', '1376827290', '1376827290');
INSERT INTO `sys_account` VALUES ('2', 'qq19831030qq', 'ff200eef6ba997ea95fda5f504cffb6f4a6a01e02c9f14839cc207b6512f62e5', '1377015105', '1377015105');
INSERT INTO `sys_account` VALUES ('3', '19831030tq', '3c705ee140ca9df8cea3b46f36d470f4ec771846a4bd1b17bd96f2657a168cb4', '1377015259', '1377015259');
INSERT INTO `sys_account` VALUES ('4', 'nosky', '41367da481cbf34865643031d2ff9cdddd4afa25a00e21ff830baf364ef170fd', '1377015926', '1377015926');
INSERT INTO `sys_account` VALUES ('5', 'testone1', 'f943b6a474bf371753df364f502805386cfd25387cc704cd5323f35df0db6c26', '1377015954', '1377019714');
INSERT INTO `sys_account` VALUES ('6', 'ss1', '7e9375a8a555cc9f8cd9e8898bfc1b00045ccb17c1104cf2cb55da2670251095', '1377086643', '1377087163');
INSERT INTO `sys_admin` VALUES ('29', '{\"aid\":\"1\",\"aname\":\"qq19831030qq\",\"apwd\":\"3c705ee140ca9df8cea3b46f36d470f4ec771846a4bd1b17bd96f2657a168cb4\"}', '1', '1377181460', '1377181460');
INSERT INTO `sys_admin` VALUES ('66', '{\"aid\":\"6\",\"aname\":\"ss1\",\"apwd\":\"7e9375a8a555cc9f8cd9e8898bfc1b00045ccb17c1104cf2cb55da2670251095\"}', '6', '1377182106', '1377182106');
INSERT INTO `sys_admin` VALUES ('69', '{\"aid\":\"4\",\"aname\":\"nosky\",\"apwd\":\"41367da481cbf34865643031d2ff9cdddd4afa25a00e21ff830baf364ef170fd\"}', '4', '1377182160', '1377182160');
