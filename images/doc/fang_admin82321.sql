-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 08 月 30 日 09:46
-- 服务器版本: 5.1.58
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `admin82321`
--

-- --------------------------------------------------------

--
-- 表的结构 `ad`
--

DROP TABLE IF EXISTS `ad`;
CREATE TABLE IF NOT EXISTS `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增',
  `title` varchar(30) DEFAULT NULL COMMENT '标题',
  `des` varchar(500) DEFAULT NULL COMMENT '描述',
  `previewimg` varchar(50) DEFAULT NULL COMMENT '预览图',
  `oid` int(11) unsigned DEFAULT NULL COMMENT '指向org表',
  `url` varchar(500) DEFAULT NULL COMMENT '连接地址',
  `type` varchar(10) DEFAULT NULL COMMENT '记录类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ad`
--

INSERT INTO `ad` (`id`, `title`, `des`, `previewimg`, `oid`, `url`, `type`) VALUES
(1, '广告1', NULL, '35e004b2ada27d005224963f7b9c88dc.jpg', 0, '', 'ad'),
(2, '广告2', NULL, '8e1689fb9a44dfbf885b2621a5e61084.jpg', 0, '', 'ad'),
(3, '百度', NULL, '734cd3471b27dfff2652ad40ac44ca48.png', NULL, 'www.baidu.com', 'links'),
(4, '网易', NULL, '38216f9e207630d9175f6a7ed4b419a6.png', NULL, 'www.163.com', 'links'),
(5, 'ces', NULL, 'efb01d00de1a77206b723106a2499d1c.jpg', 0, '111', 'ad');

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci COMMENT='CMSæ–‡ç« åº“' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `pid`, `type`, `title`, `published`, `createtime`, `modifytime`, `keyword`, `content`, `order`, `previewimg`, `praise`, `previewimg2`, `status`, `selected`, `mid`, `tuanid`, `builtarea`, `landarea`, `bedrooms`, `toilets`, `housetype`, `img1`, `img2`, `displayprice`, `desc`) VALUES
(1, 0, 0, '房源信息', NULL, NULL, 1406343756, NULL, NULL, 0, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, 0, '网站新闻', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, 1, '房源信息1', '2014-07-27', 1406476042, 1406476084, NULL, '<p>房源信息房源信息房源信息房源信息房源信息房源信息</p>', 0, '34d51306184942ac8b81bd86a93d00df.gif', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, 1, '新闻信息1', '2014-07-26', 1406344163, 1406470933, NULL, '<p>新闻信息内容新闻信息内容新闻信息内容新闻信息内容新闻信息内容新闻信息内容新闻信息内容新闻信息内容新闻信息内容</p>', 0, '34d51306184942ac8b81bd86a93d00df.gif', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 1, '首页测试房源一', '2014-07-27', 1406467607, 1406468484, NULL, '<p><span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">Yellowstone National Park is the centerpiece of the Greater Yellowstone Ecosystem, the largest intact ecosystem in the Earth&#39;s northern temperate zone. Yellowstone became the world&#39;s first national park on March 1, 1872. Located mostly in the U.S. state of Wyoming, the park extends into Montana and Idaho. The park is known for its wildlife and geothermal features; the Old Faithful Geyser is one of the most popular features in the park.</span></p>', 1, '2e7298964822fb2b196317ebe2ba9081.jpg', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, 1, '首页测试房源标题二', '2014-07-27', 1406467725, 1406468437, NULL, '<p><span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">Yellowstone National Park is the centerpiece of the Greater Yellowstone Ecosystem, the largest intact ecosystem in the Earth&#39;s northern temperate zone. Yellowstone became the world&#39;s first national park on March 1, 1872. Located mostly in the U.S. state of Wyoming, the park extends into Montana and Idaho. The park is known for its wildlife and geothermal features; the Old Faithful Geyser is one of the most popular features in the park.</span></p>', 2, '4db416e634558d8d9a432e6c1f786314.jpg', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 1, '首页测试房源标题三', '2014-07-27', 1406467793, 1406468457, NULL, '<p><span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">Yellowstone National Park is the centerpiece of the Greater Yellowstone Ecosystem, the largest intact ecosystem in the Earth&#39;s northern temperate zone. Yellowstone became the world&#39;s first national park on March 1, 1872. Located mostly in the U.S. state of Wyoming, the park extends into Montana and Idaho. The park is known for its wildlife and geothermal features; the Old Faithful Geyser is one of the most popular features in the park.</span></p>', 3, 'f202451568462a2887e9124b89d276c6.jpg', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 0, 0, 'TARGET_COUNTRIES', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 0, 0, 'PURPOSE_PURCHASE', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 1, '房源信息2', '2014-07-27', 1406470430, NULL, NULL, '<p><span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容1，<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容1，<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容1，<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容1<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容1，<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容1，</span></span></span></span></span></span></p>', 0, '34d51306184942ac8b81bd86a93d00df.gif', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, 1, '房源信息3', '2014-07-27', 1406470458, NULL, NULL, '<p><span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容1，<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容1，<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容1<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容1，<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容1，<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容1，，。<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容13333333333</span></span></span></span></span></span></span></p>', 0, '34d51306184942ac8b81bd86a93d00df.gif', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, 1, '房源信息4', '2014-07-27', 1406470485, NULL, NULL, '<p><span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容4，<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容4，<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容4<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容4<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容4<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容4<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容4<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容4<span style="color: rgb(164, 164, 164); font-family: Tahoma, Helvetica, Arial, 宋体; font-size: 12px; line-height: 18px; background-color: rgb(243, 243, 243);">房源信息测试内容4</span></span></span></span></span></span></span></span></span></p>', 0, '34d51306184942ac8b81bd86a93d00df.gif', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `captcha`
--

DROP TABLE IF EXISTS `captcha`;
CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=258 ;

--
-- 转存表中的数据 `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(253, 1409152515, '127.0.0.1', 'fang'),
(254, 1409155308, '127.0.0.1', 'fang'),
(255, 1409155821, '127.0.0.1', 'fang'),
(256, 1409155887, '127.0.0.1', 'fang'),
(257, 1409156852, '127.0.0.1', 'fang');

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增唯一标示',
  `pid` int(11) unsigned DEFAULT NULL COMMENT '指向id',
  `papersid` int(11) unsigned DEFAULT NULL COMMENT '指向该课程所附带的考卷',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `category` varchar(30) DEFAULT NULL COMMENT '课程类别',
  `type` varchar(30) DEFAULT NULL COMMENT '类型',
  `level` varchar(30) DEFAULT NULL COMMENT '课程等级',
  `price` decimal(10,2) DEFAULT NULL COMMENT '估价',
  `des` varchar(20000) DEFAULT NULL COMMENT '描述',
  `ctime` datetime DEFAULT NULL COMMENT '创建时间',
  `video` varchar(200) DEFAULT NULL COMMENT '课程包括的视频',
  `videoimg` varchar(50) DEFAULT NULL COMMENT '课程视频的预览图',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='课程表，用来记录所有可以学习的教程，课程' AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`id`, `pid`, `papersid`, `title`, `category`, `type`, `level`, `price`, `des`, `ctime`, `video`, `videoimg`) VALUES
(16, 0, NULL, '英语托福考试', '普通课程', NULL, '一级', '888.00', '<p>这个是辅助同学们出国留学的考试</p>', '2014-07-07 14:16:52', NULL, NULL),
(17, 0, NULL, '计算机基础培训', '普通课程', NULL, '一级', '220.00', '<p>这个是计算机初级入门的培训课程</p>', '2014-07-07 14:17:27', NULL, NULL),
(18, 16, NULL, '语法讲解（一）', '视频课', NULL, '一级', NULL, '<p>test</p>', '2014-07-07 14:19:46', 'test', ''),
(19, 17, NULL, '短语培训（二）', '图文讲解', NULL, '一级', NULL, '<p>test</p>', '2014-07-07 14:20:18', '', ''),
(20, 16, NULL, '完形填空(二)', '图文讲解', NULL, '一级', NULL, '<p>test</p>', '2014-07-07 14:21:25', '', ''),
(21, 17, NULL, 'office培训', '图文讲解', NULL, '一级', NULL, '<p>test</p>', '2014-07-07 14:21:53', 'ttt', '');

-- --------------------------------------------------------

--
-- 表的结构 `dictdata`
--

DROP TABLE IF EXISTS `dictdata`;
CREATE TABLE IF NOT EXISTS `dictdata` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `value` varchar(255) DEFAULT NULL COMMENT '值',
  `order` int(11) NOT NULL DEFAULT '0',
  `code` varchar(10) DEFAULT NULL COMMENT '唯一编码',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='数据字典' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `dictdata`
--

INSERT INTO `dictdata` (`Id`, `type`, `name`, `value`, `order`, `code`) VALUES
(1, '城市', '上海', NULL, 0, '0101'),
(2, '城市', '北京', NULL, 0, '0102'),
(3, '会员等级', '个人', '300', 0, '0201'),
(4, '会员等级', '商家', '800', 1, '0202');

-- --------------------------------------------------------

--
-- 表的结构 `fang`
--

DROP TABLE IF EXISTS `fang`;
CREATE TABLE IF NOT EXISTS `fang` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `fang`
--

INSERT INTO `fang` (`id`, `mid`, `tuanid`, `title`, `builtarea`, `landarea`, `bedrooms`, `toilets`, `housetype`, `img1`, `img2`, `displayprice`, `desc`, `isenable`, `createtime`, `order`) VALUES
(19, 1, 15, '我南京的房子', 1000, 2000, 100, 50, 3, '3fae87f432a0e8ddd9bc6f6c389a273b.png', NULL, 10000, '别墅来了，别墅来了，别墅来了别墅来了', 1, '2014-08-28 22:23:10', 0),
(21, 1, 14, '我的北京的房子', 100, 120, 10, 23, 4, NULL, NULL, 120, '北京的房子北京的房子北京的房子北京的房子北京的房子北京的房子北京的房子北京的房子', 1, '2014-08-28 22:23:13', 0);

-- --------------------------------------------------------

--
-- 表的结构 `fangtuan`
--

DROP TABLE IF EXISTS `fangtuan`;
CREATE TABLE IF NOT EXISTS `fangtuan` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `fangtuan`
--

INSERT INTO `fangtuan` (`id`, `mid`, `title`, `attention`, `Travelinfo`, `godate`, `gotime`, `normalCost`, `vipCost`, `displayCost`, `order`, `previewimg`, `createtime`, `isenable`) VALUES
(16, 7, '看房团3', '行程注意行程注意  行程注意行程注意                   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   行程注意行程注意  行程注意行程注意   ', '行程注意', '2014-08-01 00:00:00', '2014-08-02 00:00:00', '100', '1222', '111', 0, NULL, '2014-08-23 13:20:52', 1),
(14, 1, '看房团1.0', '注意安全                                                                ', '注意安全', '2014-08-09 00:00:00', '2014-08-02 00:00:00', '1', '1', '1', 0, NULL, '2014-08-23 13:17:33', 1),
(15, 1, '看房团2.0', '阿迪发顺丰斯蒂芬     asdf                            ', '阿斯顿发撒旦法', '2014-08-22 00:00:00', '2014-08-22 00:00:00', '1333', '223', '23', 0, NULL, '2014-08-23 13:17:54', 1);

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='会员表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`Id`, `account`, `password`, `realname`, `idcard`, `accountype`, `qq`, `email`, `gender`, `type`, `mobile`, `city`, `rank`, `creer`, `point`, `status`, `createtime`, `modifytime`, `address`, `weibo`, `xueli`, `isenable`, `company`, `job`, `personal_location`, `company_location`) VALUES
(1, '2', '96e79218965eb72c92a549dd5a330112', '', NULL, 'business', '', NULL, '', NULL, NULL, NULL, NULL, '0', 100.00, '未审核', '2014-08-23 14:56:20', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(3, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL, NULL, 'business', '', NULL, '', NULL, NULL, NULL, NULL, '0', 100.00, '未审核', '2014-08-25 22:19:32', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(7, '4', 'a87ff679a2f3e71d9181a67b7542122c', '张凯', '342201198209162419', 'business', '', NULL, '', NULL, NULL, '黄浦', NULL, '0', 100.00, '未审核', '2014-08-28 00:13:20', NULL, NULL, NULL, NULL, 1, '恒生电子', '主管', '杭州', '滨江'),
(8, '5', 'e4da3b7fbbce2345d7772b0674a318d5', NULL, NULL, 'normal', '', NULL, '', NULL, NULL, NULL, NULL, '0', 100.00, '未审核', '2014-08-28 00:27:39', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `org`
--

DROP TABLE IF EXISTS `org`;
CREATE TABLE IF NOT EXISTS `org` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增唯一标识',
  `pid` int(10) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `order` int(10) DEFAULT NULL COMMENT '排序字段',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='组织架构表' AUTO_INCREMENT=57 ;

--
-- 转存表中的数据 `org`
--

INSERT INTO `org` (`id`, `pid`, `title`, `order`) VALUES
(1, 0, '课程中心', NULL),
(2, 0, '水平测试', NULL),
(3, 0, '合作导师', NULL),
(4, 0, '合作机构', NULL),
(5, 0, '行业资讯', NULL),
(6, 5, '品牌资讯', NULL),
(7, 5, '设计师资讯', NULL),
(8, 5, '时尚产业', NULL),
(9, 5, '数字技术', NULL),
(10, 5, '媒体2', NULL),
(11, 5, '时尚博主', NULL),
(12, 5, '时尚买手', NULL),
(13, 5, '时尚电商', NULL),
(14, 4, '国外机构', NULL),
(15, 4, '国内机构', NULL),
(51, 0, '关于我们', NULL),
(52, 0, '公司新闻', NULL),
(53, 0, '时尚大事件', NULL),
(56, 2, 'test222', 0),
(16, 5, '预发布资讯', 0);

-- --------------------------------------------------------

--
-- 表的结构 `point`
--

DROP TABLE IF EXISTS `point`;
CREATE TABLE IF NOT EXISTS `point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL COMMENT '会员ID',
  `type` varchar(50) DEFAULT NULL COMMENT 'dict->积分类型',
  `point` int(11) DEFAULT NULL COMMENT '积分数',
  `creattime` datetime DEFAULT NULL COMMENT '创建时间',
  `modifytime` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='会员积分表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `point`
--

INSERT INTO `point` (`id`, `mid`, `type`, `point`, `creattime`, `modifytime`) VALUES
(2, 10, '入会礼遇', 10, '2014-03-20 00:00:00', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `reviewlist`
--

DROP TABLE IF EXISTS `reviewlist`;
CREATE TABLE IF NOT EXISTS `reviewlist` (
  `id` int(11) NOT NULL COMMENT '自增，唯一标示',
  `aid` int(11) DEFAULT NULL COMMENT '指向文章表中的ID',
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL COMMENT '指向评论的客户，当值==0的时候表示游客',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='客户评论表';

--
-- 转存表中的数据 `reviewlist`
--

INSERT INTO `reviewlist` (`id`, `aid`, `title`, `content`, `mid`) VALUES
(1, 1, '测试标题', '测试内容', 1);

-- --------------------------------------------------------

--
-- 表的结构 `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `icon`, `sex`, `city`, `industry`, `birthday`, `QQ`, `realname`, `education`, `address`, `zipcode`, `interested`, `salary`, `telephone`, `isactive`, `power`, `status`, `tag`, `studystate`, `timeLogin`, `timeLastvisit`, `timeCreated`, `timeLastModified`) VALUES
(1, 'root', '96e79218965eb72c92a549dd5a330112', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '/文章库/,/文章库/文章中心/,/文章库/文章中心/分类列表/,/文章库/文章中心/创建分类/,/文章库/文章中心/文章列表/,/文章库/文章中心/创建文章/,/产品中心/,/产品中心/产品中心/,/产品中心/产品中心/产品列表/,/产品中心/产品中心/预约管理/,/产品中心/产品中心/产品净值信息管理/,/会员中心/,/会员中心/会员中心/,/会员中心/会员中心/会员列表/,/会员中心/会员中心/积分管理/,/会员中心/会员中心/意见反馈/,/管理员中心/,/管理员中心/管理员中心/,/管理员中心/管理员中心/管理员模块/,/访客分析/,', 0, NULL, 0, NULL, NULL, '2014-07-15 21:38:58', '2014-07-15 21:39:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
