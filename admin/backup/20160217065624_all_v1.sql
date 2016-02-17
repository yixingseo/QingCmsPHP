--
-- MySQL database dump
-- Created by DbManage class, Power By yanue. 
-- http://yanue.net 
--
-- 主机: localhost
-- 生成日期: 2016 年  02 月 17 日 06:56
-- MySQL版本: 5.5.20-log
-- PHP 版本: 5.3.10

--
-- 数据库: `e9data`
--

-- -------------------------------------------------------

--
-- 表的结构t_config
--

DROP TABLE IF EXISTS `t_config`;
CREATE TABLE `t_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 t_config
--

INSERT INTO `t_config` VALUES('1','name','企业网站管理系统');
INSERT INTO `t_config` VALUES('2','domain','http://www.yixingseo.com');
INSERT INTO `t_config` VALUES('3','enable','false');
INSERT INTO `t_config` VALUES('4','news_att','推荐,滚动,幻灯片');
INSERT INTO `t_config` VALUES('5','code','统计代码');
INSERT INTO `t_config` VALUES('6','meta','meta··');
INSERT INTO `t_config` VALUES('7','footer','底部代码');
INSERT INTO `t_config` VALUES('8','cache','true');
INSERT INTO `t_config` VALUES('9','root','企业网站管理系统');
INSERT INTO `t_config` VALUES('10','domain','http://www.yixingseo.com');
INSERT INTO `t_config` VALUES('11','title','企业网站管理系统');
INSERT INTO `t_config` VALUES('12','logo','logo1');
INSERT INTO `t_config` VALUES('13','seotitle','企业网站管理系统seotitle');
INSERT INTO `t_config` VALUES('14','keywords','关键词');
INSERT INTO `t_config` VALUES('15','description','描述');
INSERT INTO `t_config` VALUES('16','copyright','版权所有 ©');
INSERT INTO `t_config` VALUES('17','info','网站公告：');
INSERT INTO `t_config` VALUES('18','phone','0510-87994300');
INSERT INTO `t_config` VALUES('19','email','66866111@qq.com');
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
) ENGINE=InnoDB AUTO_INCREMENT=389 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 t_news
--

INSERT INTO `t_news` VALUES('382','2','333','aaa','bbb','ccc','ddd','?/products/382.html','/easp9/content/upload/thumail/201510211615153617.jpg','','-1','','2015-10-21','','EE17F7B9-010D-4804-9399-298374AE3722','13','99','');
INSERT INTO `t_news` VALUES('383','2','ccc','','','','','?products/383.html','/easp9/content/upload/thumail/201510211618222613.jpg','','-1','','2015-10-21','','3E517819-D7C0-4D29-ADD7-7B7FF6988216','3','99','');
INSERT INTO `t_news` VALUES('384','7','1aaa八佰伴八佰伴','','','','<p>aaaaaaa测试11</p>','','','','-1','','2015-11-03','','70167ffa-bb33-11e5-b4ce-50e549e84861','8','99','');
INSERT INTO `t_news` VALUES('385','1','aaaaaaaaa','','','','','','','','0','','0000-00-00','','6e347ba6-d393-11e5-8433-50e549e84861','0','0','');
INSERT INTO `t_news` VALUES('386','1','aaaaaaaaa','','','','','','','','0','','0000-00-00','','7e1a15ff-d393-11e5-8433-50e549e84861','0','0','');
INSERT INTO `t_news` VALUES('387','3',' 测试是事实上事实上事实上','<br /><font size=\'1\'><table class=\'xdebug-error\' dir=\'ltr\' border=\'1\' cellspacing=\'0\' cellpadding=\'1\'><tr><th align=\'left\' bgcolor=\'#f57900\' colspan=','<br /><font size=\'1\'><table class=\'xdebug-error\' dir=\'ltr\' border=\'1\' cellspacing=\'0\' cellpadding=\'1\'><tr><th align=\'left\' bgcolor=\'#f57900\' colspan=','<br />\r\n<font size=\'1\'><table class=\'xdebug-error\' dir=\'ltr\' border=\'1\' cellspacing=\'0\' cellpadding=\'1\'>\r\n<tr><th align=\'left\' bgcolor=\'#f57900\' colspan=\"5\"><span style=\'background-color: #cc0000; col','<p>按时发生</p>','','','','0','','0000-00-00','<br /><font size=\'1\'><table class=\'xdebug-error\' dir=\'ltr\' border=\'1\' cellspacing=\'0\' cellpadding=\'1\'><tr><th align=\'left\' bgcolor=\'#f57900\' colspan=','88936ed3-d393-11e5-8433-50e549e84861','0','0','');
INSERT INTO `t_news` VALUES('388','7','这只是一个测试！！！！！！！！！','','','','<p>这只是一个测试！！！！！！！！！这只是一个测试！！！！！！！！！这只是一个测试！！！！！！！！！</p>','','content/upload/thumail/thumail_56c3d8ef5c4ee.jpg','','0','','0000-00-00','','7C073D3F-A328-47E4-8B76-01926654D4C3','0','99','');
--
-- 表的结构t_photos
--

DROP TABLE IF EXISTS `t_photos`;
CREATE TABLE `t_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(37) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 t_photos
--

INSERT INTO `t_photos` VALUES('1','9D605DCA-D151-4B0C-B610-3940CCCB644B','http://www.google.com');
--
-- 表的结构t_sort
--

DROP TABLE IF EXISTS `t_sort`;
CREATE TABLE `t_sort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `urlname` varchar(255) DEFAULT NULL,
  `sort_template` varchar(255) NOT NULL,
  `content_template` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `is_parent` int(11) NOT NULL,
  `is_nav` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 t_sort
--

INSERT INTO `t_sort` VALUES('1','测试测试测试','0','','','','','','','1','1','','99');
INSERT INTO `t_sort` VALUES('3','产品分类一','1','','','','','','','0','0','','0');
INSERT INTO `t_sort` VALUES('4','产品分类一1111111111','3','','','','','','','0','0','','99');
INSERT INTO `t_sort` VALUES('7','产品展示11','0','','333','产品列表页.html','产品详情页_订购.html','','<p>bbbb</p>','1','1','content/upload/thumail/thumail_56c2b0ff49ee3.jpg11','99');
INSERT INTO `t_sort` VALUES('8','产品分类22222222222','4','','','','','','','1','1','','99');
