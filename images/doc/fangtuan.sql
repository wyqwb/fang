/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : fang

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-08-19 18:01:13
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `fangtuan`
-- ----------------------------
DROP TABLE IF EXISTS `fangtuan`;
CREATE TABLE `fangtuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID，自增唯一标识',
  `mid` int(11) DEFAULT NULL COMMENT '发布人',
  `title` char(50) DEFAULT NULL COMMENT '房团标题',
  `attention` varchar(500) DEFAULT NULL COMMENT '注意事项',
  `Travelinfo` varchar(500) DEFAULT NULL COMMENT '行程信息',
  `godate` datetime DEFAULT NULL COMMENT '行程日期',
  `gotime` datetime DEFAULT NULL COMMENT '出行时间',
  `normalCost` varchar(100) DEFAULT NULL COMMENT '普通费用',
  `vipCost` varchar(100) DEFAULT NULL COMMENT 'VIP费用',
  `displayCost` varchar(100) DEFAULT NULL COMMENT '显示费用',
  `order` int(11) DEFAULT '0' COMMENT '排序',
  `previewimg` varchar(50) DEFAULT NULL COMMENT '预览图',
  `createtime` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fangtuan
-- ----------------------------
INSERT INTO `fangtuan` VALUES ('1', '36', '24wqeerwre', 'qweqrqwre', 'weerew', '2014-08-19 16:15:51', '2014-08-19 16:15:51', '1679091c5a880faf6fb5e6087eb1b2dc', 'c4ca4238a0b923820dcc509a6f75849b', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '0', null, '2014-08-19 16:18:17');
INSERT INTO `fangtuan` VALUES ('4', '36', '24wqeerwre', 'qweqrqwre', 'weerew', '2014-08-19 16:15:51', '2014-08-19 16:15:51', '1679091c5a880faf6fb5e6087eb1b2dc', 'c4ca4238a0b923820dcc509a6f75849b', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '0', null, '2014-08-19 16:21:08');
INSERT INTO `fangtuan` VALUES ('5', '36', '啊发顺丰的', '阿迪发生大放送', '阿打发斯蒂芬', '2014-08-19 16:29:51', '2014-08-19 16:29:51', 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', '0', null, '2014-08-19 16:30:03');
