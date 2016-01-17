--
-- MySQL database dump
-- Created by DbManage class, Power By yanue. 
-- http://yanue.net 
--
-- 主机: localhost
-- 生成日期: 2016 年  01 月 14 日 08:27
-- MySQL版本: 5.5.20-log
-- PHP 版本: 5.3.10

--
-- 数据库: `e9data`
--

-- -------------------------------------------------------

--
-- 表的结构t_news
--

DROP TABLE IF EXISTS `t_news`;
CREATE TABLE `t_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `seotitle` varchar(255) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `content` text,
  `url` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `att` varchar(255) DEFAULT NULL,
  `show` int(11) NOT NULL,
  `insert_user` varchar(50) NOT NULL,
  `insert_date` date NOT NULL,
  `urlname` varchar(255) DEFAULT NULL,
  `guid` varchar(50) NOT NULL,
  `hits` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `info` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=385 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 t_news
--

INSERT INTO `t_news` VALUES('382','2','333','','','','','?/products/382.html','/easp9/content/upload/thumail/201510211615153617.jpg','','-1','','2015-10-21','','EE17F7B9-010D-4804-9399-298374AE3722','13','99','');
INSERT INTO `t_news` VALUES('383','2','ccc','','','','','?products/383.html','/easp9/content/upload/thumail/201510211618222613.jpg','','-1','','2015-10-21','','3E517819-D7C0-4D29-ADD7-7B7FF6988216','3','99','');
INSERT INTO `t_news` VALUES('384','2','1','','','','','?/products/384.html','/easp9/content/upload/thumail/201511030920087845.jpg','','-1','','2015-11-03','','692DEAB0-B588-4798-8D42-A0FABBFDE51F','8','99','');
--
-- 表的结构t_sort
--

DROP TABLE IF EXISTS `t_sort`;
CREATE TABLE `t_sort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort_template` varchar(255) NOT NULL,
  `content_template` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 t_sort
--

INSERT INTO `t_sort` VALUES('1','产品分类','0','','','','','','','99');
INSERT INTO `t_sort` VALUES('2','联系我们','0','','','','','','','99');
INSERT INTO `t_sort` VALUES('3','产品分类一','1','','','','','','','0');
INSERT INTO `t_sort` VALUES('4','产品分类一1111111111','3','','','','','','','99');
