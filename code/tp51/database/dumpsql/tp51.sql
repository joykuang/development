-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `tp51`;
CREATE DATABASE `tp51` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `tp51`;

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
(1,	1,	'cover_image',	'https://unsplash.it/400/300',	'taxonomy');

DROP TABLE IF EXISTS `jkc_posts`;
CREATE TABLE `jkc_posts` (
  `post_id` int(12) NOT NULL AUTO_INCREMENT,
  `parent_id` int(12) NOT NULL DEFAULT '0',
  `user_id` int(12) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='博文与页面';

INSERT INTO `jkc_posts` (`post_id`, `parent_id`, `user_id`, `created_at`, `updated_at`, `post_slug`, `post_type`, `post_title`, `post_content`, `post_excerpt`, `post_password`, `post_status`) VALUES
(1,	0,	0,	'2017-09-28 15:14:00',	'2017-10-25 20:40:15',	'test',	'post',	'Test',	NULL,	NULL,	'disabled',	'published'),
(2,	1,	1,	'2017-09-28 21:30:29',	'2017-09-28 21:30:33',	'hello-world',	'page',	'Front Page',	'This is the content',	NULL,	'disabled',	'published'),
(3,	0,	2,	'2017-09-28 21:47:51',	'2017-09-28 21:47:55',	'test-again',	'post',	'博文测试',	NULL,	NULL,	'disabled',	'published'),
(4,	0,	2,	'2017-11-04 20:49:46',	'2017-11-04 20:49:49',	'auto-draft',	'post',	'博文再测试',	NULL,	NULL,	'disabled',	'auto-draft');

DROP TABLE IF EXISTS `jkc_taxonomies`;
CREATE TABLE `jkc_taxonomies` (
  `taxonomy_id` int(12) NOT NULL AUTO_INCREMENT,
  `taxonomy_parent_id` int(12) NOT NULL DEFAULT '0',
  `taxonomy_type` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT 'category',
  `taxonomy_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `taxonomy_content` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `taxonomy_slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `order_number` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`taxonomy_id`),
  KEY `taxonomy_parent_id` (`taxonomy_parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='分类、标签、菜单、链接';

INSERT INTO `jkc_taxonomies` (`taxonomy_id`, `taxonomy_parent_id`, `taxonomy_type`, `taxonomy_name`, `taxonomy_content`, `taxonomy_slug`, `order_number`) VALUES
(1,	0,	'category',	'默认分类',	NULL,	'uncategoried',	0),
(2,	0,	'category',	'编程技术',	NULL,	'technical-document',	0);

DROP TABLE IF EXISTS `jkc_taxonomy_relationship`;
CREATE TABLE `jkc_taxonomy_relationship` (
  `rid` int(12) NOT NULL AUTO_INCREMENT,
  `post_id` int(12) NOT NULL DEFAULT '0',
  `taxonomy_id` int(12) NOT NULL DEFAULT '0',
  `order_number` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`),
  KEY `post_id` (`post_id`),
  KEY `taxonomy_id` (`taxonomy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='分类关联表';

INSERT INTO `jkc_taxonomy_relationship` (`rid`, `post_id`, `taxonomy_id`, `order_number`) VALUES
(1,	1,	1,	0),
(2,	2,	2,	0),
(3,	3,	1,	0);

-- 2017-11-19 15:29:05
