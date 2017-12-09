-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `jkc_city`;
CREATE TABLE `jkc_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `city_zipcode` int(11) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `jkc_city` (`city_id`, `city_name`, `city_zipcode`) VALUES
(1,	'江门市',	529000),
(2,	'广州市',	510000),
(3,	'深圳市',	518000),
(4,	'珠海市',	519000);

DROP TABLE IF EXISTS `jkc_metas`;
CREATE TABLE `jkc_metas` (
  `meta_id` int(12) NOT NULL AUTO_INCREMENT,
  `object_id` int(12) NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `meta_value` text COLLATE utf8_bin,
  `meta_type` varchar(32) COLLATE utf8_bin DEFAULT 'post',
  PRIMARY KEY (`meta_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='元数据记录表';

INSERT INTO `jkc_metas` (`meta_id`, `object_id`, `meta_key`, `meta_value`, `meta_type`) VALUES
(1,	1,	'taxonomy_cover',	'https://unsplash.it/400/300',	'taxonomy');

DROP TABLE IF EXISTS `jkc_posts`;
CREATE TABLE `jkc_posts` (
  `post_id` int(12) NOT NULL AUTO_INCREMENT,
  `parent_id` int(12) NOT NULL DEFAULT '0',
  `user_id` int(12) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `post_slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `post_type` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT 'post',
  `post_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_content` longtext COLLATE utf8_bin,
  `post_excerpt` text COLLATE utf8_bin,
  `post_password` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT 'disabled',
  `post_status` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT 'published',
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_slug` (`post_slug`),
  KEY `parent_id` (`parent_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='博文与页面';

INSERT INTO `jkc_posts` (`post_id`, `parent_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `post_slug`, `post_type`, `post_title`, `post_content`, `post_excerpt`, `post_password`, `post_status`) VALUES
(1,	0,	3,	'2017-09-28 15:14:00',	'2017-10-25 20:40:15',	NULL,	'test',	'post',	'Test',	NULL,	NULL,	'disabled',	'published'),
(2,	1,	1,	'2017-09-28 21:30:29',	'2017-09-28 21:30:33',	NULL,	'hello-world',	'page',	'Front Page',	'This is the content',	NULL,	'disabled',	'published'),
(3,	0,	2,	'2017-09-28 21:47:51',	'2017-09-28 21:47:55',	NULL,	'test-again',	'post',	'博文测试',	NULL,	NULL,	'disabled',	'published'),
(4,	0,	2,	'2017-11-04 20:49:46',	'2017-11-04 20:49:49',	NULL,	'post-test-again',	'post',	'博文再测试',	NULL,	NULL,	'disabled',	'auto-draft'),
(8,	0,	1,	'2017-12-05 01:36:52',	'2017-12-05 01:44:02',	'2017-12-05 01:44:02',	'test-slug',	'post',	'测试标题',	'<p>测试内容</p>',	'测试简介',	'ceshi',	'published'),
(9,	0,	1,	'2017-12-05 01:39:29',	'2017-12-05 01:39:29',	NULL,	'new-post-slug',	'post',	'新增博文',	'<p>新增博文内容</p>',	'新增博文简介',	'disabled',	'published');

DROP TABLE IF EXISTS `jkc_taxonomies`;
CREATE TABLE `jkc_taxonomies` (
  `taxonomy_id` int(12) NOT NULL AUTO_INCREMENT,
  `taxonomy_parent_id` int(12) NOT NULL DEFAULT '0',
  `taxonomy_type` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT 'category',
  `taxonomy_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `taxonomy_content` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `taxonomy_slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `taxonomy_order` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`taxonomy_id`),
  KEY `taxonomy_parent_id` (`taxonomy_parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='分类、标签、菜单、链接';

INSERT INTO `jkc_taxonomies` (`taxonomy_id`, `taxonomy_parent_id`, `taxonomy_type`, `taxonomy_name`, `taxonomy_content`, `taxonomy_slug`, `taxonomy_order`) VALUES
(1,	0,	'category',	'默认分类',	NULL,	'uncategoried',	0),
(2,	0,	'category',	'编程技术',	NULL,	'programming-and-technical',	0),
(3,	0,	'category',	'网购剁手',	'买买买、剁剁剁、购购购',	'my-shopping-cart',	0),
(4,	0,	'category',	'素材珍藏',	'网上收集的各种素材：网页模板、插件、设计、源文件',	'material-collections',	0),
(6,	0,	'category',	'日常记事',	'记录的日常、日记、每日随想、随记',	'my-diaries',	0);

DROP TABLE IF EXISTS `jkc_taxonomy_relationship`;
CREATE TABLE `jkc_taxonomy_relationship` (
  `relation_id` int(12) NOT NULL AUTO_INCREMENT,
  `relation_order` int(12) NOT NULL DEFAULT '0',
  `post_id` int(12) NOT NULL DEFAULT '0',
  `taxonomy_id` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`relation_id`),
  KEY `post_id` (`post_id`),
  KEY `taxonomy_id` (`taxonomy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='分类关联表';

INSERT INTO `jkc_taxonomy_relationship` (`relation_id`, `relation_order`, `post_id`, `taxonomy_id`) VALUES
(1,	0,	1,	1),
(2,	0,	2,	2),
(3,	0,	3,	1),
(4,	0,	4,	1),
(5,	0,	4,	2),
(6,	0,	8,	1),
(7,	0,	9,	6);

DROP TABLE IF EXISTS `jkc_topic`;
CREATE TABLE `jkc_topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `topic_content` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `jkc_topic` (`topic_id`, `topic_title`, `topic_content`, `user_id`) VALUES
(1,	'红米新手机',	'红米5/5 Plus 全面屏手机即将发布',	4),
(2,	'政府工作信息化',	'某科技公司与政府合作建设信息平台',	2),
(3,	'纪录片《走向世界的中国食材》即将开播',	'央视拍摄大型纪录片《走向世界的中国食材》首篇道地陈皮',	1),
(4,	'前端新技术 Webpack',	'前端开启了工作流模式，Webpack 的打包方式开始被各大开发者使用',	2),
(5,	'小米出品游戏《小米超神》正式公测',	'由西山居制作小米出品的大型射击类游戏《小米超神》正式公测了',	3);

DROP TABLE IF EXISTS `jkc_user`;
CREATE TABLE `jkc_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_position` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_company` varchar(255) COLLATE utf8_bin NOT NULL,
  `city_id` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `jkc_user` (`user_id`, `user_name`, `user_position`, `user_company`, `city_id`) VALUES
(1,	'王博',	'CEO',	'顺为基金',	2),
(2,	'周一同',	'CTO',	'西山居游戏',	3),
(3,	'朱晓晓',	'COO',	'青稞广告',	4),
(4,	'张悦',	'FEE',	'悦软工作室',	1);

-- 2017-12-09 14:23:15
