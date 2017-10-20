# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.35)
# Database: tp5
# Generation Time: 2017-08-15 13:41:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
# Dump of database vox
# ------------------------------------------------------------
drop DATABASE if  EXISTS `vox`;
CREATE DATABASE if NOT EXISTS `vox`;

USE `vox`;


# Dump of table vox_theme_1
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_theme_1`;

CREATE TABLE `vox_theme_1` (
  `id` INT unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` VARCHAR(100) DEFAULT NULL COMMENT '名称',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dump of table vox_theme_2
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_theme_2`;

CREATE TABLE `vox_theme_2` (
  `id` INT unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `t1_id` INT unsigned NOT NULL COMMENT '外键，以及主题',
  `name` VARCHAR(100) DEFAULT NULL COMMENT '名称',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  FOREIGN KEY (t1_id) REFERENCES vox_theme_1(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


# Dump of table vox_theme_3
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_theme_3`;

CREATE TABLE `vox_theme_3` (
  `id` INT unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `t2_id` INT unsigned NOT NULL COMMENT '外键，二级主题',
  `name` VARCHAR(100) DEFAULT NULL COMMENT '名称',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  FOREIGN KEY (t2_id) REFERENCES vox_theme_2(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# ------------------------------------------------------------
# Dump of table vox_role_admin

DROP TABLE IF EXISTS `vox_role_admin`;

CREATE TABLE `vox_role_admin` (
  `id` INT unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` VARCHAR(50) DEFAULT NULL COMMENT '角色名',
  `remark` VARCHAR(50) DEFAULT NULL COMMENT '备注',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `vox_role_admin` (`name`, `remark`, `status`, `createtime`, `updatetime`) VALUES
('admin', '管理员', 1, 1503037656, NULL),
('edit', '普通管理员', 1, 1503037656, NULL);



# Dump of table vox_user_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_user_admin`;

CREATE TABLE `vox_user_admin` (
  `id` INT unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` VARCHAR(50) DEFAULT NULL COMMENT '账号',
  `pass` VARCHAR(50) DEFAULT NULL COMMENT '密码',
  `roleid` TINYINT DEFAULT NULL COMMENT '角色',
  `remark` VARCHAR(50) DEFAULT NULL COMMENT '备注',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭；3->禁用',
  `logintime` INT DEFAULT NULL COMMENT '登陆时间',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  FOREIGN KEY (roleid) REFERENCES vox_role_admin(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `vox_user_admin` (username`, `pass`, `roleid`, `remark`, `status`, `logintime`, `createtime`, `updatetime`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1, '超级管理员', 1, 1508462059, 1503213456, 1508462059),
('edit', '21232f297a57a5a743894a0e4a801fc3', 1, '编辑', 1, 1507363353, 1503213456, 1507363353),
('transbit10', '63cb797f1fc844d1644942de578b1724', 1, '', 1, 1508388553, 1508222974, 1508388553);


# Dump of table vox_action_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_action_admin`;

CREATE TABLE `vox_action_admin` (
  `id` INT unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` VARCHAR(50) DEFAULT NULL COMMENT '操作名称',
  `tag` VARCHAR(50) DEFAULT NULL COMMENT '备注',
  `pid` VARCHAR(4) DEFAULT NULL COMMENT '父节点',
  `pids` VARCHAR(10) DEFAULT NULL COMMENT '父子节点关系',
  `level` TINYINT DEFAULT NULL COMMENT '层次',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


# Dump of table vox_role_action_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_role_action_admin`;

CREATE TABLE `vox_role_action_admin` (
  `roleid` INT unsigned NOT NULL COMMENT '外键,角色id',
  `actionid` INT DEFAULT NULL COMMENT '外键,操作id',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`roleid`, `actionid`),
  FOREIGN KEY (roleid) REFERENCES vox_role_admin(id),
  FOREIGN KEY (actionid) REFERENCES vox_action_admin(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


# Dump of table vox_website_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_website_type`;

CREATE TABLE `vox_website_type` (
  `id` INT unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` VARCHAR(100) DEFAULT NULL COMMENT '类型名',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


# Dump of table vox_website
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_website`;

CREATE TABLE `vox_website` (
  `id` INT unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `type_id` INT DEFAULT NULL COMMENT '外键，类型',
  `name` VARCHAR(100) DEFAULT NULL COMMENT '名称',
  `url` VARCHAR(100) DEFAULT NULL COMMENT '网址',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  FOREIGN KEY (type_id) REFERENCES vox_website_type(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table vox_operationlog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_operationlog`;

CREATE TABLE `vox_operationlog` (
  `id` INT unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` VARCHAR(100) DEFAULT NULL COMMENT '名称',
  `IP` VARCHAR(20) DEFAULT NULL COMMENT 'IP地址',
  `action_id` INT DEFAULT NULL COMMENT '外键，操作对象',
  `actiontime` INT DEFAULT NULL COMMENT '操作时间',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  FOREIGN KEY (action_id) REFERENCES vox_action_admin(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table vox_data
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_data`;

CREATE TABLE `vox_data` (
  `id` INT unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `theme_3_id` INT unsigned NOT NULL  COMMENT '外键，三级主题',
  `websitetype_id` TINYINT DEFAULT NULL COMMENT '外键，网站类型',
  `task_id` INT DEFAULT NULL COMMENT '任务编号',
  `title` varchar(100) COMMENT '标题',
  `content` text COMMENT '内容',
  `source` VARCHAR(100) DEFAULT NULL COMMENT '来源',
  `media_type` VARCHAR(100) DEFAULT NULL COMMENT '媒体类型',
  `nature` VARCHAR(100) DEFAULT NULL COMMENT '舆情属性',
  `url` VARCHAR(100) DEFAULT NULL COMMENT '网址',
  `relevance` VARCHAR(100) DEFAULT NULL COMMENT '关联度',
  `publishtime` INT DEFAULT NULL COMMENT '发表时间',
  `similar_num` INT DEFAULT NULL COMMENT '相似文章数',
  `is_collect` TINYINT DEFAULT NULL COMMENT '是否收藏：1->是，2->否',
  `is_warn` TINYINT DEFAULT NULL COMMENT '是否预警：1->是，2->否',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  FOREIGN KEY (theme_3_id) REFERENCES vox_theme_3(id),
  FOREIGN KEY (websitetype_id) REFERENCES vox_website_type(id),
   FOREIGN KEY (task_id) REFERENCES vox_task(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table vox_inform
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_inform`;

CREATE TABLE `vox_inform` (
  `id` INT unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `detail` VARCHAR(100) DEFAULT NULL COMMENT '通知详情',
  `operation` VARCHAR(50) DEFAULT NULL COMMENT '操作',
  `priority` TINYINT DEFAULT NULL COMMENT '优先级',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table vox_inform_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_inform_user`;

CREATE TABLE `vox_inform_user` (
  `id` INT unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `inform_id` INT unsigned NOT NULL COMMENT '外键，通知',
  `user_id` INT unsigned NOT NULL  COMMENT '外键，用户',
  `solution` TINYINT DEFAULT NULL COMMENT '是否处理：1->是；2->否',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  FOREIGN KEY (inform_id) REFERENCES vox_inform(id),
  FOREIGN KEY (user_id) REFERENCES vox_user_admin(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dump of table vox_task
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_task`;

CREATE TABLE `vox_task` (
  `id` INT unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` VARCHAR(20) DEFAULT NULL COMMENT '名称',
  `loop` INT DEFAULT NULL COMMENT '循环周期',
  `begintime` INT DEFAULT NULL COMMENT '开始时间',
  `endtime` INT DEFAULT NULL COMMENT '结束时间',
  `task_num` INT DEFAULT NULL COMMENT '任务量',
  `quantity_complete` INT DEFAULT NULL COMMENT '已完成数量',
  `time_predict` INT DEFAULT NULL COMMENT '预计耗时',
  `taskstatus` TINYINT DEFAULT NULL COMMENT '任务状态：0->正常；1->中断；2->结束',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dump of table vox_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_tag`;

CREATE TABLE `vox_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `section` varchar(50) DEFAULT NULL COMMENT '版块',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` int(11) DEFAULT NULL COMMENT '创建时间',
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


# Dump of table vox_task_website
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_task_website`;

CREATE TABLE `vox_task_website` (
  `task_id` INT DEFAULT NULL COMMENT '外键,任务id',
  `website_id` INT DEFAULT NULL COMMENT '外键,网站id',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`website_id`, `task_id`),
  FOREIGN KEY (website_id) REFERENCES vox_website(id),
  FOREIGN KEY (task_id) REFERENCES vox_task(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table vox_role_task_theme
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vox_task_theme`;

CREATE TABLE `vox_task_theme` (
  `task_id` INT DEFAULT NULL COMMENT '外键,任务id',
  `theme_3_id` INT DEFAULT NULL COMMENT '外键,三级主题id',
  `status` TINYINT DEFAULT NULL COMMENT '状态：1->启用；2->关闭',
  `createtime` INT DEFAULT NULL COMMENT '创建时间',
  `updatetime` INT DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`task_id`, `theme_3_id`),
  FOREIGN KEY (task_id) REFERENCES vox_task(id),
  FOREIGN KEY (theme_3_id) REFERENCES vox_theme_3(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
