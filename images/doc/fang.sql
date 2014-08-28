/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : fang

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-08-28 22:33:05
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `ad`
-- ----------------------------
DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增',
  `title` varchar(30) DEFAULT NULL COMMENT '标题',
  `des` varchar(500) DEFAULT NULL COMMENT '描述',
  `previewimg` varchar(50) DEFAULT NULL COMMENT '预览图',
  `oid` int(11) unsigned DEFAULT NULL COMMENT '指向org表',
  `url` varchar(500) DEFAULT NULL COMMENT '连接地址',
  `type` varchar(10) DEFAULT NULL COMMENT '记录类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ad
-- ----------------------------
INSERT INTO `ad` VALUES ('1', '广告1', null, '35e004b2ada27d005224963f7b9c88dc.jpg', '0', '', 'ad');
INSERT INTO `ad` VALUES ('2', '广告2', null, '8e1689fb9a44dfbf885b2621a5e61084.jpg', '0', '', 'ad');
INSERT INTO `ad` VALUES ('3', '百度', null, '734cd3471b27dfff2652ad40ac44ca48.png', null, 'www.baidu.com', 'links');
INSERT INTO `ad` VALUES ('4', '网易', null, '38216f9e207630d9175f6a7ed4b419a6.png', null, 'www.163.com', 'links');

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID，自增唯一标识',
  `pid` int(11) unsigned DEFAULT NULL COMMENT 'ID,PID搭配实现无限分类',
  `type` tinyint(3) unsigned DEFAULT NULL COMMENT '类型：0 为类型、1，为记录内容',
  `title` char(50) COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '标题',
  `published` date DEFAULT NULL COMMENT '发布日期',
  `createtime` int(11) unsigned DEFAULT NULL COMMENT '创建时间',
  `modifytime` int(11) unsigned DEFAULT NULL COMMENT '修改时间',
  `keyword` char(200) COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '关键字',
  `content` text COLLATE utf8_esperanto_ci COMMENT '内容',
  `order` int(11) DEFAULT NULL COMMENT '排序',
  `previewimg` varchar(50) COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '预览图1',
  `praise` int(10) DEFAULT NULL COMMENT '赞的次数，递增，不可为负',
  `previewimg2` varchar(50) COLLATE utf8_esperanto_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `selected` tinyint(1) DEFAULT '0' COMMENT '默认为首级分类',
  `mid` int(11) DEFAULT NULL COMMENT '发布者id',
  `tuanid` int(11) DEFAULT NULL COMMENT '看访团id',
  `builtarea` int(11) DEFAULT NULL COMMENT '房屋面积',
  `landarea` int(11) DEFAULT NULL COMMENT '土地面积',
  `bedrooms` int(11) DEFAULT NULL,
  `toilets` int(11) DEFAULT NULL COMMENT '卫生间数量',
  `housetype` int(11) DEFAULT NULL COMMENT '住宅类型：1普通住宅，2商住两用，3公寓，4别墅，5其他',
  `img1` varchar(50) COLLATE utf8_esperanto_ci DEFAULT NULL,
  `img2` varchar(50) COLLATE utf8_esperanto_ci DEFAULT NULL,
  `displayprice` int(11) DEFAULT NULL,
  `desc` varchar(5000) COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci COMMENT='CMSæ–‡ç« åº“';

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '0', '0', '房源信息', null, null, '1406343756', null, null, '0', null, null, null, '1', '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `article` VALUES ('2', '0', '0', '网站新闻', null, null, null, null, null, '0', null, null, null, '1', '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `article` VALUES ('13', '1', '1', '房源信息1', '2014-07-27', '1406476042', '1406476084', null, '<p>房源信息房源信息房源信息房源信息房源信息房源信息</p>', '0', '34d51306184942ac8b81bd86a93d00df.gif', null, null, '1', '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `article` VALUES ('4', '2', '1', '新闻信息1', '2014-07-26', '1406344163', '1406470933', null, '<p>新闻信息内容新闻信息内容新闻信息内容新闻信息内容新闻信息内容新闻信息内容新闻信息内容新闻信息内容新闻信息内容</p>', '0', '34d51306184942ac8b81bd86a93d00df.gif', null, null, '1', '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `article` VALUES ('5', '1', '1', '首页测试房源一', '2014-07-27', '1406467607', '1406468484', null, '<p><span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">Yellowstone National Park is the centerpiece of the Greater Yellowstone Ecosystem, the largest intact ecosystem in the Earth&#39;s northern temperate zone. Yellowstone became the world&#39;s first national park on March 1, 1872. Located mostly in the U.S. state of Wyoming, the park extends into Montana and Idaho. The park is known for its wildlife and geothermal features; the Old Faithful Geyser is one of the most popular features in the park.</span></p>', '1', '2e7298964822fb2b196317ebe2ba9081.jpg', null, null, '1', '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `article` VALUES ('6', '1', '1', '首页测试房源标题二', '2014-07-27', '1406467725', '1406468437', null, '<p><span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">Yellowstone National Park is the centerpiece of the Greater Yellowstone Ecosystem, the largest intact ecosystem in the Earth&#39;s northern temperate zone. Yellowstone became the world&#39;s first national park on March 1, 1872. Located mostly in the U.S. state of Wyoming, the park extends into Montana and Idaho. The park is known for its wildlife and geothermal features; the Old Faithful Geyser is one of the most popular features in the park.</span></p>', '2', '4db416e634558d8d9a432e6c1f786314.jpg', null, null, '1', '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `article` VALUES ('7', '1', '1', '首页测试房源标题三', '2014-07-27', '1406467793', '1406468457', null, '<p><span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">Yellowstone National Park is the centerpiece of the Greater Yellowstone Ecosystem, the largest intact ecosystem in the Earth&#39;s northern temperate zone. Yellowstone became the world&#39;s first national park on March 1, 1872. Located mostly in the U.S. state of Wyoming, the park extends into Montana and Idaho. The park is known for its wildlife and geothermal features; the Old Faithful Geyser is one of the most popular features in the park.</span></p>', '3', 'f202451568462a2887e9124b89d276c6.jpg', null, null, '1', '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `article` VALUES ('8', '0', '0', 'TARGET_COUNTRIES', null, null, null, null, null, '0', null, null, null, '1', '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `article` VALUES ('9', '0', '0', 'PURPOSE_PURCHASE', null, null, null, null, null, '0', null, null, null, '1', '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `article` VALUES ('10', '1', '1', '房源信息2', '2014-07-27', '1406470430', null, null, '<p><span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容1，<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容1，<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容1，<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容1<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容1，<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容1，</span></span></span></span></span></span></p>', '0', '34d51306184942ac8b81bd86a93d00df.gif', null, null, '1', '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `article` VALUES ('11', '1', '1', '房源信息3', '2014-07-27', '1406470458', null, null, '<p><span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容1，<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容1，<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容1<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容1，<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容1，<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容1，，。<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容13333333333</span></span></span></span></span></span></span></p>', '0', '34d51306184942ac8b81bd86a93d00df.gif', null, null, '1', '0', null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `article` VALUES ('12', '1', '1', '房源信息4', '2014-07-27', '1406470485', null, null, '<p><span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容4，<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容4，<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容4<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容4<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容4<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容4<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容4<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容4<span style=\"color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);\">房源信息测试内容4</span></span></span></span></span></span></span></span></span></p>', '0', '34d51306184942ac8b81bd86a93d00df.gif', null, null, '1', '0', null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `captcha`
-- ----------------------------
DROP TABLE IF EXISTS `captcha`;
CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB AUTO_INCREMENT=258 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of captcha
-- ----------------------------
INSERT INTO `captcha` VALUES ('253', '1409152515', '127.0.0.1', 'fang');
INSERT INTO `captcha` VALUES ('254', '1409155308', '127.0.0.1', 'fang');
INSERT INTO `captcha` VALUES ('255', '1409155821', '127.0.0.1', 'fang');
INSERT INTO `captcha` VALUES ('256', '1409155887', '127.0.0.1', 'fang');
INSERT INTO `captcha` VALUES ('257', '1409156852', '127.0.0.1', 'fang');

-- ----------------------------
-- Table structure for `dictdata`
-- ----------------------------
DROP TABLE IF EXISTS `dictdata`;
CREATE TABLE `dictdata` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `value` varchar(255) DEFAULT NULL COMMENT '值',
  `order` int(11) NOT NULL DEFAULT '0',
  `code` varchar(10) DEFAULT NULL COMMENT '唯一编码',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='数据字典';

-- ----------------------------
-- Records of dictdata
-- ----------------------------
INSERT INTO `dictdata` VALUES ('1', '城市', '上海', null, '0', '0101');
INSERT INTO `dictdata` VALUES ('2', '城市', '北京', null, '0', '0102');
INSERT INTO `dictdata` VALUES ('3', '会员等级', '个人', '300', '0', '0201');
INSERT INTO `dictdata` VALUES ('4', '会员等级', '商家', '800', '1', '0202');

-- ----------------------------
-- Table structure for `fang`
-- ----------------------------
DROP TABLE IF EXISTS `fang`;
CREATE TABLE `fang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL COMMENT '发布房源者',
  `tuanid` int(11) DEFAULT NULL COMMENT '看访团id',
  `title` varchar(100) DEFAULT NULL,
  `builtarea` int(11) DEFAULT NULL COMMENT '房屋面积',
  `landarea` int(11) DEFAULT NULL COMMENT '土地面积',
  `bedrooms` int(11) DEFAULT NULL COMMENT '卧室数量',
  `toilets` int(11) DEFAULT NULL COMMENT '卫生间数量',
  `housetype` int(11) DEFAULT NULL COMMENT '住宅类型：1普通住宅，2商住两用，3公寓，4别墅，5其他',
  `img1` varchar(50) DEFAULT NULL COMMENT '房屋图片',
  `img2` varchar(50) DEFAULT NULL COMMENT '房屋图片',
  `displayprice` int(11) DEFAULT NULL COMMENT '显示价格',
  `desc` varchar(5000) DEFAULT NULL COMMENT '房屋描述',
  `isenable` int(11) DEFAULT '1' COMMENT '是否审核通过',
  `createtime` datetime DEFAULT NULL COMMENT '创建时间',
  `order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fang
-- ----------------------------
INSERT INTO `fang` VALUES ('19', '1', '15', '我南京的房子', '1000', '2000', '100', '50', '3', '3fae87f432a0e8ddd9bc6f6c389a273b.png', null, '10000', '别墅来了，别墅来了，别墅来了别墅来了', '1', '2014-08-28 22:23:10', '0');
INSERT INTO `fang` VALUES ('21', '1', '14', '我的北京的房子', '100', '120', '10', '23', '4', null, null, '120', '北京的房子北京的房子北京的房子北京的房子北京的房子北京的房子北京的房子北京的房子', '1', '2014-08-28 22:23:13', '0');

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
  `isenable` int(11) DEFAULT '1' COMMENT '是否审核通过',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fangtuan
-- ----------------------------
INSERT INTO `fangtuan` VALUES ('16', '7', '看房团3', '行程注意行程注意  行程注意行程注意                   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   ', '行程注意', '2014-08-01 00:00:00', '2014-08-02 00:00:00', '100', '1222', '111', '0', null, '2014-08-23 13:20:52', '1');
INSERT INTO `fangtuan` VALUES ('14', '1', '看房团1.0', '注意安全                                                                ', '注意安全', '2014-08-09 00:00:00', '2014-08-02 00:00:00', '1', '1', '1', '0', null, '2014-08-23 13:17:33', '1');
INSERT INTO `fangtuan` VALUES ('15', '1', '看房团2.0', '阿迪发顺丰斯蒂芬     asdf                            ', '阿斯顿发撒旦法', '2014-08-22 00:00:00', '2014-08-22 00:00:00', '1333', '223', '23', '0', null, '2014-08-23 13:17:54', '1');

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(50) NOT NULL DEFAULT '' COMMENT '登陆帐号',
  `password` varchar(50) DEFAULT NULL COMMENT '密码 MD5',
  `realname` varchar(100) DEFAULT NULL COMMENT '真实姓名',
  `idcard` varchar(20) DEFAULT NULL,
  `accountype` varchar(11) DEFAULT NULL COMMENT '账号类型',
  `qq` varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `gender` varchar(10) NOT NULL DEFAULT '' COMMENT '男,女 dict->gengder',
  `type` varchar(20) DEFAULT NULL COMMENT '身份证号',
  `mobile` varchar(50) DEFAULT NULL COMMENT '手机',
  `city` varchar(50) DEFAULT NULL COMMENT 'dict->city',
  `rank` varchar(50) DEFAULT NULL COMMENT 'dict->会员等级',
  `creer` varchar(50) NOT NULL DEFAULT '0' COMMENT 'CRM系统中的客户编号',
  `point` double(12,2) NOT NULL DEFAULT '0.00' COMMENT '积分',
  `status` varchar(11) NOT NULL DEFAULT '未审核' COMMENT 'dict->审核',
  `createtime` datetime DEFAULT NULL COMMENT '创建时间',
  `modifytime` datetime DEFAULT NULL COMMENT '最后修改时间',
  `address` varchar(300) DEFAULT NULL,
  `weibo` varchar(50) DEFAULT NULL,
  `xueli` varchar(50) DEFAULT NULL,
  `isenable` tinyint(3) NOT NULL DEFAULT '1' COMMENT '审批',
  `company` varchar(100) DEFAULT NULL COMMENT '单位名称',
  `job` varchar(200) DEFAULT NULL COMMENT '职务',
  `personal_location` varchar(100) DEFAULT NULL COMMENT '个人住址',
  `company_location` varchar(100) DEFAULT NULL COMMENT '公司住址',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='会员表';

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', '2', '96e79218965eb72c92a549dd5a330112', '', null, 'business', '', null, '', null, null, null, null, '0', '100.00', '未审核', '2014-08-23 14:56:20', null, null, null, null, '1', null, null, null, null);
INSERT INTO `member` VALUES ('3', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', null, null, 'business', '', null, '', null, null, null, null, '0', '100.00', '未审核', '2014-08-25 22:19:32', null, null, null, null, '1', null, null, null, null);
INSERT INTO `member` VALUES ('7', '4', 'a87ff679a2f3e71d9181a67b7542122c', '张凯', '342201198209162419', 'business', '', null, '', null, null, '黄浦', null, '0', '100.00', '未审核', '2014-08-28 00:13:20', null, null, null, null, '1', '恒生电子', '主管', '杭州', '滨江');
INSERT INTO `member` VALUES ('8', '5', 'e4da3b7fbbce2345d7772b0674a318d5', null, null, 'normal', '', null, '', null, null, null, null, '0', '100.00', '未审核', '2014-08-28 00:27:39', null, null, null, null, '1', null, null, null, null);

-- ----------------------------
-- Table structure for `org`
-- ----------------------------
DROP TABLE IF EXISTS `org`;
CREATE TABLE `org` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增唯一标识',
  `pid` int(10) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `order` int(10) DEFAULT NULL COMMENT '排序字段',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COMMENT='组织架构表';

-- ----------------------------
-- Records of org
-- ----------------------------
INSERT INTO `org` VALUES ('1', '0', '课程中心', null);
INSERT INTO `org` VALUES ('2', '0', '水平测试', null);
INSERT INTO `org` VALUES ('3', '0', '合作导师', null);
INSERT INTO `org` VALUES ('4', '0', '合作机构', null);
INSERT INTO `org` VALUES ('5', '0', '行业资讯', null);
INSERT INTO `org` VALUES ('6', '5', '品牌资讯', null);
INSERT INTO `org` VALUES ('7', '5', '设计师资讯', null);
INSERT INTO `org` VALUES ('8', '5', '时尚产业', null);
INSERT INTO `org` VALUES ('9', '5', '数字技术', null);
INSERT INTO `org` VALUES ('10', '5', '媒体2', null);
INSERT INTO `org` VALUES ('11', '5', '时尚博主', null);
INSERT INTO `org` VALUES ('12', '5', '时尚买手', null);
INSERT INTO `org` VALUES ('13', '5', '时尚电商', null);
INSERT INTO `org` VALUES ('14', '4', '国外机构', null);
INSERT INTO `org` VALUES ('15', '4', '国内机构', null);
INSERT INTO `org` VALUES ('51', '0', '关于我们', null);
INSERT INTO `org` VALUES ('52', '0', '公司新闻', null);
INSERT INTO `org` VALUES ('53', '0', '时尚大事件', null);
INSERT INTO `org` VALUES ('56', '2', 'test222', '0');
INSERT INTO `org` VALUES ('16', '5', '预发布资讯', '0');

-- ----------------------------
-- Table structure for `point`
-- ----------------------------
DROP TABLE IF EXISTS `point`;
CREATE TABLE `point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL COMMENT '会员ID',
  `type` varchar(50) DEFAULT NULL COMMENT 'dict->积分类型',
  `point` int(11) DEFAULT NULL COMMENT '积分数',
  `creattime` datetime DEFAULT NULL COMMENT '创建时间',
  `modifytime` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='会员积分表';

-- ----------------------------
-- Records of point
-- ----------------------------
INSERT INTO `point` VALUES ('2', '10', '入会礼遇', '10', '2014-03-20 00:00:00', null);

-- ----------------------------
-- Table structure for `reviewlist`
-- ----------------------------
DROP TABLE IF EXISTS `reviewlist`;
CREATE TABLE `reviewlist` (
  `id` int(11) NOT NULL COMMENT '自增，唯一标示',
  `aid` int(11) DEFAULT NULL COMMENT '指向文章表中的ID',
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL COMMENT '指向评论的客户，当值==0的时候表示游客',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='客户评论表';

-- ----------------------------
-- Records of reviewlist
-- ----------------------------
INSERT INTO `reviewlist` VALUES ('1', '1', '测试标题', '测试内容', '1');

-- ----------------------------
-- Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sessions
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(100) DEFAULT NULL COMMENT '用户名',
  `password` varchar(100) DEFAULT NULL COMMENT '密码',
  `icon` varchar(100) DEFAULT NULL COMMENT '用户头像',
  `sex` smallint(1) DEFAULT '0' COMMENT '性别：1男，女0',
  `city` varchar(100) DEFAULT NULL COMMENT '所在城市',
  `industry` varchar(100) DEFAULT NULL COMMENT '从事行业',
  `birthday` varchar(100) DEFAULT NULL COMMENT '生日',
  `QQ` smallint(11) DEFAULT NULL COMMENT 'QQ号码',
  `realname` varchar(100) DEFAULT NULL COMMENT '真实姓名',
  `education` varchar(50) DEFAULT NULL COMMENT '学历',
  `address` varchar(200) DEFAULT NULL COMMENT '联系地址',
  `zipcode` int(11) DEFAULT NULL COMMENT '邮政编码',
  `interested` varchar(200) DEFAULT NULL COMMENT '感兴趣的内容',
  `salary` int(10) DEFAULT NULL COMMENT '薪资',
  `telephone` int(10) DEFAULT NULL COMMENT '手机号码',
  `isactive` smallint(6) DEFAULT '0' COMMENT '是否激活',
  `power` varchar(300) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL COMMENT '待扩展',
  `tag` varchar(200) DEFAULT NULL COMMENT '个人标签：摄影师、时尚博主...',
  `studystate` smallint(6) DEFAULT '0' COMMENT '学习状态：0未开始学习，1学习中，2学习完成',
  `timeLogin` datetime DEFAULT NULL COMMENT '本次登陆时间',
  `timeLastvisit` datetime DEFAULT NULL COMMENT '上次登陆时间',
  `timeCreated` datetime NOT NULL COMMENT '会员注册时间',
  `timeLastModified` datetime DEFAULT NULL COMMENT '上次登陆时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'root', '96e79218965eb72c92a549dd5a330112', null, '0', null, null, null, null, null, null, null, null, null, null, null, '0', '/文章库/,/文章库/文章中心/,/文章库/文章中心/分类列表/,/文章库/文章中心/创建分类/,/文章库/文章中心/文章列表/,/文章库/文章中心/创建文章/,/产品中心/,/产品中心/产品中心/,/产品中心/产品中心/产品列表/,/产品中心/产品中心/预约管理/,/产品中心/产品中心/产品净值信息管理/,/会员中心/,/会员中心/会员中心/,/会员中心/会员中心/会员列表/,/会员中心/会员中心/积分管理/,/会员中心/会员中心/意见反馈/,/管理员中心/,/管理员中心/管理员中心/,/管理员中心/管理员中心/管理员模块/,/访客分析/,', '0', null, '0', null, null, '2014-07-15 21:38:58', '2014-07-15 21:39:04');
