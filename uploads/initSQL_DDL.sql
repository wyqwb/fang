
create database edu;


------2014.7.06 22:08  `questionbank` section 【张凯】
-- ----------------------------
-- Table structure for `questionbank`
-- ----------------------------
DROP TABLE IF EXISTS `questionbank`;
CREATE TABLE ` questionbank` (
`id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
`title` varchar(500)  NULL DEFAULT NULL COMMENT '问题标题',
`pic` varchar(500)  NULL DEFAULT NULL  COMMENT '问题配图',
`a` varchar(255)  NULL DEFAULT NULL  COMMENT 'A选项，默认正确答案，若是判断题则是1或0',
`b` varchar(255)  NULL DEFAULT NULL COMMENT 'B选项',
`c` varchar(255)  NULL DEFAULT NULL COMMENT 'C选项',
`d` varchar(255)  NULL DEFAULT NULL COMMENT 'D选项',
`class` varchar(10)  NULL DEFAULT NULL COMMENT '题目属于那种课程类型',
`type` varchar(10)  NULL DEFAULT NULL COMMENT '题型，选择题or判断题',
`desc` varchar(1000)  NULL DEFAULT NULL COMMENT '问题描述',
`status` varchar(20)  NULL DEFAULT NULL COMMENT '预留字段',
`timecreated` datetime NULL DEFAULT NULL COMMENT '题目创建时间',
PRIMARY KEY (`id`) 
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

------
alter table questionbank add chid  int;
alter table questionbank add cid  int;



-- ----------------------------
-- Table structure for `examresault`
-- ----------------------------
DROP TABLE IF EXISTS `examresault`;
CREATE TABLE `examresault` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`userid` int(11) NULL DEFAULT NULL COMMENT '用户id',
`qs1` varchar(200)  NULL DEFAULT NULL,
`qs2` varchar(200)  NULL DEFAULT NULL,
`qs3` varchar(200)  NULL DEFAULT NULL,
`qs4` varchar(200)  NULL DEFAULT NULL,
`qs5` varchar(200)  NULL DEFAULT NULL,
`qs6` varchar(200)  NULL DEFAULT NULL,
`qs7` varchar(200)  NULL DEFAULT NULL,
`qs8` varchar(200)  NULL DEFAULT NULL,
`qs9` varchar(200)  NULL DEFAULT NULL,
`qs10` varchar(200)  NULL DEFAULT NULL,
`qs11` varchar(200)  NULL DEFAULT NULL,
`qs12` varchar(200)  NULL DEFAULT NULL,
`qs13` varchar(200)  NULL DEFAULT NULL,
`qs14` varchar(200)  NULL DEFAULT NULL,
`qs15` varchar(200)  NULL DEFAULT NULL,
`qs16` varchar(200)  NULL DEFAULT NULL,
`qs17` varchar(200)  NULL DEFAULT NULL,
`qs18` varchar(200)  NULL DEFAULT NULL,
`qs19` varchar(200)  NULL DEFAULT NULL,
`qs20` varchar(200)  NULL DEFAULT NULL,
`qs21` varchar(200)  NULL DEFAULT NULL,
`qs22` varchar(200)  NULL DEFAULT NULL,
`qs23` varchar(200)  NULL DEFAULT NULL,
`qs24` varchar(200)  NULL DEFAULT NULL,
`qs25` varchar(200)  NULL DEFAULT NULL,
`qs26` varchar(200)  NULL DEFAULT NULL,
`qs27` varchar(200)  NULL DEFAULT NULL,
`qs28` varchar(200)  NULL DEFAULT NULL,
`qs29` varchar(200)  NULL DEFAULT NULL,
`qs30` varchar(200)  NULL DEFAULT NULL,
`qs31` varchar(200)  NULL DEFAULT NULL,
`qs32` varchar(200)  NULL DEFAULT NULL,
`qs33` varchar(200)  NULL DEFAULT NULL,
`qs34` varchar(200)  NULL DEFAULT NULL,
`qs35` varchar(200)  NULL DEFAULT NULL,
`qs36` varchar(200)  NULL DEFAULT NULL,
`qs37` varchar(200)  NULL DEFAULT NULL,
`qs38` varchar(200)  NULL DEFAULT NULL,
`qs39` varchar(200)  NULL DEFAULT NULL,
`qs40` varchar(200)  NULL DEFAULT NULL,
`qs41` varchar(200)  NULL DEFAULT NULL,
`qs42` varchar(200)  NULL DEFAULT NULL,
`qs43` varchar(200)  NULL DEFAULT NULL,
`qs44` varchar(200)  NULL DEFAULT NULL,
`qs45` varchar(200)  NULL DEFAULT NULL,
`qs46` varchar(200)  NULL DEFAULT NULL,
`qs47` varchar(200)  NULL DEFAULT NULL,
`qs48` varchar(200)  NULL DEFAULT NULL,
`qs49` varchar(200)  NULL DEFAULT NULL,
`qs50` varchar(200)  NULL DEFAULT NULL,
`qs51` varchar(200)  NULL DEFAULT NULL,
`qs52` varchar(200)  NULL DEFAULT NULL,
`qs53` varchar(200)  NULL DEFAULT NULL,
`qs54` varchar(200)  NULL DEFAULT NULL,
`qs55` varchar(200)  NULL DEFAULT NULL,
`qs56` varchar(200)  NULL DEFAULT NULL,
`qs57` varchar(200)  NULL DEFAULT NULL,
`qs58` varchar(200)  NULL DEFAULT NULL,
`qs59` varchar(200)  NULL DEFAULT NULL,
`qs60` varchar(200)  NULL DEFAULT NULL,
`qs61` varchar(200)  NULL DEFAULT NULL,
`qs62` varchar(200)  NULL DEFAULT NULL,
`qs63` varchar(200)  NULL DEFAULT NULL,
`qs64` varchar(200)  NULL DEFAULT NULL,
`qs65` varchar(200)  NULL DEFAULT NULL,
`qs66` varchar(200)  NULL DEFAULT NULL,
`qs67` varchar(200)  NULL DEFAULT NULL,
`qs68` varchar(200)  NULL DEFAULT NULL,
`qs69` varchar(200)  NULL DEFAULT NULL,
`qs70` varchar(200)  NULL DEFAULT NULL,
`qs71` varchar(200)  NULL DEFAULT NULL,
`qs72` varchar(200)  NULL DEFAULT NULL,
`qs73` varchar(200)  NULL DEFAULT NULL,
`qs74` varchar(200)  NULL DEFAULT NULL,
`qs75` varchar(200)  NULL DEFAULT NULL,
`qs76` varchar(200)  NULL DEFAULT NULL,
`qs77` varchar(200)  NULL DEFAULT NULL,
`qs78` varchar(200)  NULL DEFAULT NULL,
`qs79` varchar(200)  NULL DEFAULT NULL,
`qs80` varchar(200)  NULL DEFAULT NULL,
`qs81` varchar(200)  NULL DEFAULT NULL,
`qs82` varchar(200)  NULL DEFAULT NULL,
`qs83` varchar(200)  NULL DEFAULT NULL,
`qs84` varchar(200)  NULL DEFAULT NULL,
`qs85` varchar(200)  NULL DEFAULT NULL,
`qs86` varchar(200)  NULL DEFAULT NULL,
`qs87` varchar(200)  NULL DEFAULT NULL,
`qs88` varchar(200)  NULL DEFAULT NULL,
`qs89` varchar(200)  NULL DEFAULT NULL,
`qs90` varchar(200)  NULL DEFAULT NULL,
`qs91` varchar(200)  NULL DEFAULT NULL,
`qs92` varchar(200)  NULL DEFAULT NULL,
`qs93` varchar(200)  NULL DEFAULT NULL,
`qs94` varchar(200)  NULL DEFAULT NULL,
`qs95` varchar(200)  NULL DEFAULT NULL,
`qs96` varchar(200)  NULL DEFAULT NULL,
`qs97` varchar(200)  NULL DEFAULT NULL,
`qs98` varchar(200)  NULL DEFAULT NULL,
`qs99` varchar(200)  NULL DEFAULT NULL,
`qs100` varchar(200)  NULL DEFAULT NULL,
`class` varchar(200)  NULL DEFAULT NULL COMMENT '所属课程分类',
`score` varchar(5)  NULL DEFAULT NULL COMMENT '考试分数',
`ispast` varchar(50)  NULL DEFAULT NULL COMMENT '是否通过考试',
`examstatus` int(11) NULL DEFAULT NULL COMMENT '考试状态:考试中1，考试结束0',
`timeModify` datetime NULL DEFAULT NULL COMMENT '考试结束时间',
`timeCreated` datetime NULL DEFAULT NULL COMMENT '考试开始时间',
PRIMARY KEY (`id`)
)
ENGINE=InnoDB  DEFAULT CHARACTER SET=utf8 AUTO_INCREMENT=1 ;
------ 表说明：examresault一条记录为一名学员一次考试的结果
------ 所有qs字段说明：1_a
------ 字段值由2部分组成，1为questionid,a为学员选择的结果


-- ---------------------------------------------
-- Table structure for `industryinfo` 行业资讯表
-- ---------------------------------------------
DROP TABLE IF EXISTS `industryinfo`;
CREATE TABLE `industryinfo` (
`id` int(11)  NOT NULL AUTO_INCREMENT,
`title` varchar(500)  NULL DEFAULT NULL COMMENT '资讯标题',
`pic` varchar(500)  NULL DEFAULT NULL  COMMENT '资讯配图',
`type` varchar(10)  NULL DEFAULT NULL COMMENT '资讯类型：品牌资讯、设计师资讯、时尚产业、数字技术、媒体、时尚博主、时尚买手、时尚电商',
`desc` varchar(5000)  NULL DEFAULT NULL COMMENT '问题描述',
`timecreated` datetime NULL DEFAULT NULL COMMENT '资讯创建时间',
`timeModify` datetime NULL DEFAULT NULL COMMENT '资讯最后修改时间',
PRIMARY KEY (`id`) 
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ---------------------------------------------
-- Table structure for `cooper` 合作对象表
-- ---------------------------------------------
DROP TABLE IF EXISTS `cooper`;
CREATE TABLE `cooper` (
`id` int(11)  NOT NULL AUTO_INCREMENT,
`pic` varchar(500)  NULL DEFAULT NULL  COMMENT '合作对象配图',
`type` int(11)  NULL DEFAULT NULL COMMENT '合作类型：导师1、机构2',
`area` int(11)  NULL DEFAULT NULL COMMENT '合作对象区域：国内1、国外0',
`sex` int(11)  NULL DEFAULT NULL COMMENT '合作导师性别：男1、女2',
`desc` varchar(5000)  NULL DEFAULT NULL COMMENT '合作对象描述',
`course` int(11)  NULL DEFAULT NULL COMMENT '合作对象提供的课程id',
`praise` int(11)  NULL DEFAULT 0 COMMENT '被赞数',
`timecreated` datetime NULL DEFAULT NULL COMMENT '资讯创建时间',
`timeModify` datetime NULL DEFAULT NULL COMMENT '资讯最后修改时间',
PRIMARY KEY (`id`) 
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment COMMENT '主键',
  `username` varchar(100)  default NULL COMMENT '用户名',
  `password` varchar(100)  default NULL COMMENT '密码',
  `icon` varchar(100) default Null COMMENT '用户头像',
  `sex` smallint(1) default '0' COMMENT '性别：1男，女0',
  `city` varchar(100)  default NULL COMMENT '所在城市',
  `industry` varchar(100)  default NULL COMMENT '从事行业',
  `birthday` varchar(100)  default NULL COMMENT '生日',
  `QQ` smallint(11)  default NULL COMMENT 'QQ号码',
  `realname` varchar(100)  default NULL COMMENT '真实姓名',
  `education` varchar(50)  default NULL COMMENT '学历',
  `address` varchar(200)  default NULL COMMENT '联系地址',
  `zipcode` int(11)  default NULL COMMENT '邮政编码',
  `interested` varchar(200)  default NULL COMMENT '感兴趣的内容',
  `salary` int(10)  default NULL COMMENT '薪资',
  `telephone` int(10)  default NULL COMMENT '手机号码',
  `isactive` smallint not null default 0 COMMENT '是否激活',
  `tag` varchar(200)  default NULL COMMENT '个人标签：摄影师、时尚博主...',
  `studystate` smallint not null  default 0 COMMENT '学习状态：0未开始学习，1学习中，2学习完成',
  `timeLogin` datetime  default NULL COMMENT '本次登陆时间',
  `timeLastvisit` datetime  default NULL COMMENT '上次登陆时间', 
  `timeCreated` datetime  not NULL COMMENT '会员注册时间',  
  `timeLastModified` datetime  not NULL COMMENT '上次登陆时间',   
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ;
