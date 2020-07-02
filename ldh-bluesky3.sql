/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : ldh-bluesky3

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-06-30 20:39:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bluesky_admin`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_admin`;
CREATE TABLE `bluesky_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `admin_name` varchar(255) NOT NULL COMMENT '管理员名称',
  `admin_password` varchar(255) NOT NULL COMMENT '管理员密码',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='管理员名单';

-- ----------------------------
-- Records of bluesky_admin
-- ----------------------------
INSERT INTO `bluesky_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1592012570', '1592012570', '0');
INSERT INTO `bluesky_admin` VALUES ('2', 'admin1', 'e10adc3949ba59abbe56e057f20f883e', '1592496101', '1592496204', '0');
INSERT INTO `bluesky_admin` VALUES ('3', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', '1590295015', '1592496078', '0');

-- ----------------------------
-- Table structure for `bluesky_admin_record`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_admin_record`;
CREATE TABLE `bluesky_admin_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员填表id',
  `admin_id` int(11) NOT NULL COMMENT '管理员id',
  `event_id` int(11) NOT NULL COMMENT '事件id',
  `sheet_id` int(11) NOT NULL COMMENT '工作表id',
  `admin_content` longtext NOT NULL COMMENT '管理员填表内容',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COMMENT='管理员根据事件与表单填表记录';

-- ----------------------------
-- Records of bluesky_admin_record
-- ----------------------------
INSERT INTO `bluesky_admin_record` VALUES ('53', '1', '11', '5', '48*2020年1月1日|49*AA山|50*123456789|51*山野|52*阿明|53*123456789|54*3人（2男1女）|76*90后|77*擦伤|78*无|79*AA山救援事件，三人被困', '1592529414', '1592529414', '0');
INSERT INTO `bluesky_admin_record` VALUES ('54', '1', '11', '6', '55*3人|56*2020年1月1日|57*AA山|58*2天|59*野外装备|60*1辆轿车|61*无|80*无|81*无', '1592529488', '1592529488', '0');
INSERT INTO `bluesky_admin_record` VALUES ('55', '1', '13', '5', '48*20200404|49*梧桐山桃花源0503|50*222|51*山野|52*李先生|53*13813813888|54*3人|76*50|77*1人摔伤，动不了|78*水，食物足|79*上悬崖时摔下', '1592536597', '1592536597', '0');
INSERT INTO `bluesky_admin_record` VALUES ('56', '1', '13', '6', '55*10|56*12：00|57*梧桐山北门|58*1|59*山野装备，担架等|60*2|61*队里指定保险|80*438225|81*要熟悉路线以及有一定的绳索装备', '1592536847', '1592536847', '0');
INSERT INTO `bluesky_admin_record` VALUES ('57', '1', '14', '5', '49*1|50*1|51*山野|52*1|53*1|54*1|76*1|77*1|78*1|79*1|48*2', '1593441789', '1593441789', '0');

-- ----------------------------
-- Table structure for `bluesky_event`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_event`;
CREATE TABLE `bluesky_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `event_state` int(255) NOT NULL COMMENT '事件状态：0为开始，1为开始',
  `event_title` varchar(255) NOT NULL COMMENT '事件标题',
  `event_content` longtext COMMENT '事件内容',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='事件列表';

-- ----------------------------
-- Records of bluesky_event
-- ----------------------------
INSERT INTO `bluesky_event` VALUES ('11', '0', 'AA山救援事件', '11*AA山救援事件（摘要）|12*AA山救援事件（详情）	|13*AA山救援事件（备注）', '1592450439', '1592498431', '0');
INSERT INTO `bluesky_event` VALUES ('12', '0', 'BB山救援事件', null, '1592450452', '1592450452', '0');
INSERT INTO `bluesky_event` VALUES ('13', '0', '20200404桃花源救援', '11*山野救援|12*梧桐山桃花源有一人摔伤，二人同行，有水有食物，天气良好，0503号|13*山野', '1592536348', '1592536348', '0');
INSERT INTO `bluesky_event` VALUES ('14', '0', '测试1', '11*1|12*		|13*', '1593420054', '1593420117', '0');

-- ----------------------------
-- Table structure for `bluesky_event_conf`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_event_conf`;
CREATE TABLE `bluesky_event_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `event_conf_sort` int(11) NOT NULL DEFAULT '0' COMMENT '事件配置项排序',
  `event_conf_type` tinyint(4) NOT NULL COMMENT '类型',
  `event_conf_key` varchar(255) NOT NULL COMMENT '键名',
  `event_conf_value` varchar(255) NOT NULL DEFAULT '' COMMENT '键值',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='事件内容填写选择配置';

-- ----------------------------
-- Records of bluesky_event_conf
-- ----------------------------
INSERT INTO `bluesky_event_conf` VALUES ('11', '1', '1', '摘要', '', '1592450486', '1592498335', '0');
INSERT INTO `bluesky_event_conf` VALUES ('12', '0', '2', '详情', '', '1592450500', '1592498342', '0');
INSERT INTO `bluesky_event_conf` VALUES ('13', '0', '1', '备注', '1/2', '1592450510', '1592498364', '0');
INSERT INTO `bluesky_event_conf` VALUES ('14', '0', '4', '复选', '1/2/3', '1592450547', '1592498366', '1592498366');
INSERT INTO `bluesky_event_conf` VALUES ('15', '0', '5', '下拉', '1/2/3', '1592450560', '1592498368', '1592498368');

-- ----------------------------
-- Table structure for `bluesky_log`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_log`;
CREATE TABLE `bluesky_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `event_id` int(11) NOT NULL COMMENT '事件id',
  `team_id` int(11) NOT NULL COMMENT '队员id',
  `log_content` longtext COMMENT '记录表填写内容',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='记录表';

-- ----------------------------
-- Records of bluesky_log
-- ----------------------------
INSERT INTO `bluesky_log` VALUES ('4', '11', '6', '3*已到达求助地点，情况已稳定，立刻带伤者去安全地点。|4*无', '1592530233', '1592530233', '0');
INSERT INTO `bluesky_log` VALUES ('5', '13', '6', '3*1|4*1', '1593419165', '1593419165', '0');
INSERT INTO `bluesky_log` VALUES ('6', '13', '6', '3*2|4*2', '1593419173', '1593419173', '0');

-- ----------------------------
-- Table structure for `bluesky_log_conf`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_log_conf`;
CREATE TABLE `bluesky_log_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `log_conf_sort` int(11) NOT NULL DEFAULT '0' COMMENT '记录表配置项排序',
  `log_conf_type` tinyint(4) NOT NULL COMMENT '类型',
  `log_conf_key` varchar(255) NOT NULL COMMENT '键名',
  `log_conf_value` varchar(255) NOT NULL DEFAULT '' COMMENT '键值',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='记录表配置';

-- ----------------------------
-- Records of bluesky_log_conf
-- ----------------------------
INSERT INTO `bluesky_log_conf` VALUES ('3', '1', '2', '回传信息', '', '1592445393', '1592527937', '0');
INSERT INTO `bluesky_log_conf` VALUES ('4', '0', '1', '备注', '', '1592445400', '1592527947', '0');
INSERT INTO `bluesky_log_conf` VALUES ('5', '0', '4', '复选', '1/2/3', '1592445411', '1592527949', '1592527949');
INSERT INTO `bluesky_log_conf` VALUES ('6', '0', '5', '下拉', '1/2/3', '1592445420', '1592527950', '1592527950');
INSERT INTO `bluesky_log_conf` VALUES ('7', '0', '6', '图片', '', '1592445430', '1592527951', '1592527951');
INSERT INTO `bluesky_log_conf` VALUES ('8', '0', '7', '定位', '', '1592445438', '1592527952', '1592527952');

-- ----------------------------
-- Table structure for `bluesky_ready`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_ready`;
CREATE TABLE `bluesky_ready` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `event_id` int(11) NOT NULL COMMENT '事件id',
  `team_id` int(11) NOT NULL COMMENT '队员id',
  `ready_content` longtext COMMENT '备勤名单填写内容',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='备勤名单';

-- ----------------------------
-- Records of bluesky_ready
-- ----------------------------
INSERT INTO `bluesky_ready` VALUES ('8', '11', '2', '13*13798572477|14*深圳市龙岗区永甘路20号|15*4座|16*有|17*有|18*没有|19*随时出发|20*出队', '1592529837', '1592529837', '0');
INSERT INTO `bluesky_ready` VALUES ('9', '11', '5', '13*13798572477|14*深圳市福田区农轩路33号|15*无|16*有|17*没有|18*没有|19*随时出发|20*出队', '1592529920', '1592529920', '0');
INSERT INTO `bluesky_ready` VALUES ('10', '11', '6', '13*13798572477|14*深圳市福田区农轩路33号|15*2座|16*有|17*有|18*有|19*随时出发|20*出队', '1592529970', '1592529970', '0');
INSERT INTO `bluesky_ready` VALUES ('11', '11', '4', '13*13798572477|14*深圳市福田区农轩路33号|15*无|16*有|17*有|18*有|19*15小时后出发|20*出队', '1592530023', '1592530023', '0');
INSERT INTO `bluesky_ready` VALUES ('12', '13', '7', '13*13798572477|14*上百间|15*无|16*有|17*有|18*没有|19*随时|20*出不出', '1592537456', '1592537456', '0');
INSERT INTO `bluesky_ready` VALUES ('13', '13', '6', '13*1234569|14*深圳市龙岗区永甘路20号|15*无|16*没有|17*没有|18*没有|19*随时|20*出队', '1592713822', '1593358986', '0');

-- ----------------------------
-- Table structure for `bluesky_ready_conf`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_ready_conf`;
CREATE TABLE `bluesky_ready_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `ready_conf_sort` int(11) NOT NULL DEFAULT '0' COMMENT '备勤名单配置项排序',
  `ready_conf_type` tinyint(4) NOT NULL COMMENT '类型',
  `ready_conf_key` varchar(255) NOT NULL COMMENT '键名',
  `ready_conf_value` varchar(255) NOT NULL DEFAULT '' COMMENT '键值',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='备勤名单配置';

-- ----------------------------
-- Records of bluesky_ready_conf
-- ----------------------------
INSERT INTO `bluesky_ready_conf` VALUES ('13', '0', '1', '电话', '', '1592445151', '1592498541', '0');
INSERT INTO `bluesky_ready_conf` VALUES ('14', '0', '7', '出发点', '', '1592445159', '1592498553', '0');
INSERT INTO `bluesky_ready_conf` VALUES ('15', '0', '3', '有无车辆', '无/2座/4座/5座', '1592445177', '1592498610', '0');
INSERT INTO `bluesky_ready_conf` VALUES ('16', '0', '3', '户外装备', '有/没有', '1592445194', '1592498650', '0');
INSERT INTO `bluesky_ready_conf` VALUES ('17', '0', '3', '绳索装备', '有/没有', '1592445207', '1592498668', '0');
INSERT INTO `bluesky_ready_conf` VALUES ('18', '0', '3', '水域装备', '有/没有', '1592445218', '1592499249', '0');
INSERT INTO `bluesky_ready_conf` VALUES ('19', '0', '1', '出发时间', '', '1592445231', '1592529792', '0');
INSERT INTO `bluesky_ready_conf` VALUES ('20', '0', '1', '出队', '', '1592529800', '1592529800', '0');

-- ----------------------------
-- Table structure for `bluesky_sheet`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_sheet`;
CREATE TABLE `bluesky_sheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '工作表id',
  `sheet_sort` int(11) NOT NULL DEFAULT '0' COMMENT '工作表排序',
  `sheet_name` varchar(255) NOT NULL COMMENT '工作表名称',
  `sheet_notes` varchar(255) NOT NULL COMMENT '工作表备注',
  `sheet_role` tinyint(1) NOT NULL COMMENT '填写人身份，1为队员，2为管理员',
  `sheet_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '工作表启用：1为启用，0为不启用',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='工作表';

-- ----------------------------
-- Records of bluesky_sheet
-- ----------------------------
INSERT INTO `bluesky_sheet` VALUES ('5', '0', '求助信息', '求助信息备注', '2', '1', '1591425633', '1591428696', '0');
INSERT INTO `bluesky_sheet` VALUES ('6', '0', '备勤需求', '备勤需求备注', '2', '1', '1591428726', '1591428726', '0');
INSERT INTO `bluesky_sheet` VALUES ('7', '0', '备勤名单', '备勤名单备注', '1', '1', '1591428753', '1591428753', '1');
INSERT INTO `bluesky_sheet` VALUES ('8', '0', '出队名单', '出队名单备注', '2', '1', '1591428773', '1592272335', '1');
INSERT INTO `bluesky_sheet` VALUES ('9', '0', '记录表', '记录表备注', '1', '1', '1591428834', '1591428834', '1');
INSERT INTO `bluesky_sheet` VALUES ('10', '0', '测试表', '测试表备注', '1', '1', '1591434013', '1591434013', '0');
INSERT INTO `bluesky_sheet` VALUES ('11', '0', '测试表1', '测试表1备注', '1', '1', '1592450064', '1592528872', '1592528872');

-- ----------------------------
-- Table structure for `bluesky_sheet_conf`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_sheet_conf`;
CREATE TABLE `bluesky_sheet_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '工作表配置项id',
  `sheet_conf_sort` int(11) NOT NULL DEFAULT '0' COMMENT '工作表配置项排序',
  `sheet_id` int(11) NOT NULL COMMENT '工作表id',
  `sheet_conf_name` varchar(255) NOT NULL COMMENT '工作表配置项名称',
  `sheet_conf_type` tinyint(1) NOT NULL COMMENT '工作表配置项类型',
  `sheet_conf_values` text NOT NULL COMMENT '工作表配置项可选值',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COMMENT='工作表配置';

-- ----------------------------
-- Records of bluesky_sheet_conf
-- ----------------------------
INSERT INTO `bluesky_sheet_conf` VALUES ('48', '0', '5', '时间', '1', '', '1592445460', '1592528937', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('49', '0', '5', '地点', '1', '', '1592445467', '1592528955', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('50', '0', '5', '坐标', '1', '1/2', '1592449961', '1592528968', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('51', '0', '5', '环境', '4', '山野/海岸线/溪谷/悬崖', '1592450000', '1592529008', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('52', '0', '5', '求助人', '1', '1/2/3', '1592450012', '1592529028', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('53', '0', '5', '联系电话', '1', '', '1592450022', '1592529042', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('54', '0', '5', '人数', '1', '', '1592450032', '1592529057', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('55', '1', '6', '人员', '1', '', '1592450081', '1592529140', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('56', '2', '6', '集合时间', '1', '', '1592450088', '1592529153', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('57', '3', '6', '集合地点', '1', '1/2', '1592450110', '1592529164', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('58', '0', '6', '备勤天数', '1', '1/2/3', '1592450121', '1592529190', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('59', '0', '6', '装备', '1', '1/2/3', '1592450146', '1592529224', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('60', '0', '6', '车辆', '1', '', '1592450158', '1592529239', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('61', '0', '6', '保险', '1', '', '1592450168', '1592529250', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('62', '2', '10', '输入', '1', '', '1592450191', '1592450191', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('63', '3', '10', '文本', '2', '', '1592450198', '1592450198', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('64', '1', '10', '单选', '3', '1/2', '1592450213', '1592450213', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('65', '0', '10', '复选', '4', '1/2/3', '1592450226', '1592450226', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('66', '0', '10', '下拉', '5', '1/2/3', '1592450237', '1592450237', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('67', '0', '10', '图片', '6', '', '1592450247', '1592450247', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('68', '0', '10', '定位', '7', '', '1592450256', '1592450256', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('69', '0', '11', '输入', '1', '', '1592450336', '1592528772', '1592528772');
INSERT INTO `bluesky_sheet_conf` VALUES ('70', '0', '11', '文本', '2', '', '1592450344', '1592528772', '1592528772');
INSERT INTO `bluesky_sheet_conf` VALUES ('71', '0', '11', '单选', '3', '1/2/3', '1592450356', '1592528772', '1592528772');
INSERT INTO `bluesky_sheet_conf` VALUES ('72', '0', '11', '复选', '4', '1/2/3', '1592450368', '1592528772', '1592528772');
INSERT INTO `bluesky_sheet_conf` VALUES ('73', '0', '11', '下拉', '5', '1/2/3', '1592450380', '1592528772', '1592528772');
INSERT INTO `bluesky_sheet_conf` VALUES ('74', '0', '11', '图片', '6', '', '1592450390', '1592528772', '1592528772');
INSERT INTO `bluesky_sheet_conf` VALUES ('75', '0', '11', '定位', '7', '', '1592450397', '1592528772', '1592528772');
INSERT INTO `bluesky_sheet_conf` VALUES ('76', '0', '5', '年龄段', '1', '', '1592529077', '1592529077', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('77', '0', '5', '伤情', '1', '', '1592529094', '1592529094', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('78', '0', '5', '补给情况', '1', '', '1592529112', '1592529112', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('79', '0', '5', '事件', '1', '', '1592529120', '1592529120', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('80', '0', '6', '频率', '1', '', '1592529264', '1592529264', '0');
INSERT INTO `bluesky_sheet_conf` VALUES ('81', '0', '6', '备注', '1', '', '1592529273', '1592529273', '0');

-- ----------------------------
-- Table structure for `bluesky_start`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_start`;
CREATE TABLE `bluesky_start` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `event_id` int(11) NOT NULL COMMENT '事件id',
  `admin_id` int(11) NOT NULL COMMENT '管理员id',
  `no_team_id` varchar(255) DEFAULT NULL COMMENT '不参与队员id',
  `start_content` longtext NOT NULL COMMENT '出队名单内容',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='出队名单';

-- ----------------------------
-- Records of bluesky_start
-- ----------------------------
INSERT INTO `bluesky_start` VALUES ('8', '11', '1', '4', '8*2-5-6|9*2-5-6|10*2-5-6|11*2-5-6|12*2-5-6|13*2-5-6|14*2-5-6|15*2|16*5-6', '1592530074', '1592530074', '0');
INSERT INTO `bluesky_start` VALUES ('9', '13', '1', null, '8*7', '1592537740', '1592537740', '0');

-- ----------------------------
-- Table structure for `bluesky_start_conf`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_start_conf`;
CREATE TABLE `bluesky_start_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `start_conf_sort` int(11) NOT NULL DEFAULT '0' COMMENT '出队名单配置项排序',
  `start_conf_type` tinyint(4) NOT NULL COMMENT '类型',
  `start_conf_key` varchar(255) NOT NULL COMMENT '键名',
  `start_conf_value` varchar(255) NOT NULL DEFAULT '' COMMENT '键值',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='出队名单配置';

-- ----------------------------
-- Records of bluesky_start_conf
-- ----------------------------
INSERT INTO `bluesky_start_conf` VALUES ('8', '0', '0', '后指', '', '1592445325', '1592527770', '0');
INSERT INTO `bluesky_start_conf` VALUES ('9', '0', '0', '协调', '', '1592445338', '1592527808', '0');
INSERT INTO `bluesky_start_conf` VALUES ('10', '0', '0', '前指', '', '1592445346', '1592527822', '0');
INSERT INTO `bluesky_start_conf` VALUES ('11', '0', '0', '信息', '1/2', '1592445357', '1592527832', '0');
INSERT INTO `bluesky_start_conf` VALUES ('12', '0', '0', '通讯', '1/2/3', '1592445368', '1592527849', '0');
INSERT INTO `bluesky_start_conf` VALUES ('13', '0', '0', '医疗', '1/2/3', '1592445378', '1592527863', '0');
INSERT INTO `bluesky_start_conf` VALUES ('14', '0', '0', '协调', '', '1592527873', '1592527873', '0');
INSERT INTO `bluesky_start_conf` VALUES ('15', '0', '0', '行动一组', '', '1592527889', '1592527889', '0');
INSERT INTO `bluesky_start_conf` VALUES ('16', '0', '0', '行动二组', '', '1592527899', '1592527899', '0');

-- ----------------------------
-- Table structure for `bluesky_team`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_team`;
CREATE TABLE `bluesky_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '队员id',
  `team_name` varchar(255) NOT NULL COMMENT '队员名称',
  `team_password` varchar(255) NOT NULL COMMENT '队员密码',
  `team_phone` varchar(255) NOT NULL DEFAULT '0' COMMENT '队员电话',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='队员名单';

-- ----------------------------
-- Records of bluesky_team
-- ----------------------------
INSERT INTO `bluesky_team` VALUES ('1', '傻旦', 'e10adc3949ba59abbe56e057f20f883e', '0', '1590486808', '1590486808', '0');
INSERT INTO `bluesky_team` VALUES ('2', '聂风', 'e10adc3949ba59abbe56e057f20f883e', '0', '1590570997', '1590570997', '0');
INSERT INTO `bluesky_team` VALUES ('3', '皮小卡', 'e10adc3949ba59abbe56e057f20f883e', '0', '1592013208', '1592013208', '0');
INSERT INTO `bluesky_team` VALUES ('4', '菩提', 'e10adc3949ba59abbe56e057f20f883e', '0', '1592498225', '1592498225', '0');
INSERT INTO `bluesky_team` VALUES ('5', '沉默', 'e10adc3949ba59abbe56e057f20f883e', '0', '1592498239', '1592498239', '0');
INSERT INTO `bluesky_team` VALUES ('6', '海风', 'e10adc3949ba59abbe56e057f20f883e', '0', '1592498250', '1592498250', '0');
INSERT INTO `bluesky_team` VALUES ('7', '傻旦傻', 'c4ca4238a0b923820dcc509a6f75849b', '0', '1592535913', '1592535913', '0');

-- ----------------------------
-- Table structure for `bluesky_team_record`
-- ----------------------------
DROP TABLE IF EXISTS `bluesky_team_record`;
CREATE TABLE `bluesky_team_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '工作表记录id',
  `team_id` int(11) NOT NULL COMMENT '队员id',
  `event_id` int(11) NOT NULL COMMENT '事件id',
  `sheet_id` int(11) NOT NULL COMMENT '工作表id',
  `team_content` longtext NOT NULL COMMENT '队员填表内容',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COMMENT='队员根据事件和表单填表记录';

-- ----------------------------
-- Records of bluesky_team_record
-- ----------------------------
