/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : fang

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-09-12 02:27:41
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `reviewlist`
-- ----------------------------
DROP TABLE IF EXISTS `reviewlist`;
CREATE TABLE `reviewlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增，唯一标示',
  `aid` int(11) DEFAULT NULL COMMENT '指向文章表中的ID',
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL COMMENT '指向评论的客户id，当值==0的时候表示游客',
  `type` int(11) DEFAULT NULL COMMENT '1：为房源评论，2：看房团评论',
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='客户评论表';

-- ----------------------------
-- Records of reviewlist
-- ----------------------------
INSERT INTO `reviewlist` VALUES ('1', '1', '测试标题', '测试内容', '1', null, null);
INSERT INTO `reviewlist` VALUES ('6', '19', null, '该房很好，该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好该房很好', '1', '1', '2014-09-12 01:36:49');
INSERT INTO `reviewlist` VALUES ('7', '19', null, '不错，作为一种客观存在的物质形态，在形态：即土地、建筑物、房地合一。在房地产拍卖中，其拍卖标的也可以有三种存在形态，即土地（或土地使用权）、建筑物和房地合一状态下的物质实体及其权益。随着个人财产所有权的发展，房地产已经成为商业交易的主要组成部分。很好', '1', '1', '2014-09-12 01:37:32');
INSERT INTO `reviewlist` VALUES ('9', '20', null, '的飞洒大放送', '1', '2', '2014-09-12 02:11:46');
INSERT INTO `reviewlist` VALUES ('10', '20', null, '这个看房图不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错，不错', '1', '2', '2014-09-12 02:14:13');
