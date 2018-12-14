/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : chat

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 14/12/2018 18:46:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment`  (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('超级管理员', '1', 1541773710);

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data` blob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  INDEX `rule_name`(`rule_name`) USING BTREE,
  INDEX `type`(`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', 2, NULL, NULL, NULL, 1541773560, 1541773560);
INSERT INTO `auth_item` VALUES ('/admin/*', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/assignment/*', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/assignment/assign', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/assignment/index', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/assignment/view', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/default/*', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/default/index', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/menu/*', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/menu/create', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/menu/delete', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/menu/index', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/menu/update', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/menu/view', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/permission/*', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/permission/assign', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/permission/create', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/permission/index', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/permission/remove', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/permission/update', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/permission/view', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/role/*', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/role/assign', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/role/create', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/role/delete', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/role/index', 2, NULL, NULL, NULL, 1541773557, 1541773557);
INSERT INTO `auth_item` VALUES ('/admin/role/remove', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/role/update', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/role/view', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/route/*', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/route/assign', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/route/create', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/route/index', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/route/refresh', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/route/remove', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/rule/*', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/rule/create', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/rule/index', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/rule/update', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/rule/view', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/user/*', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/user/activate', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/user/change-password', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/user/delete', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/user/index', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/user/login', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/user/logout', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/user/reset-password', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/user/signup', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/admin/user/view', 2, NULL, NULL, NULL, 1541773558, 1541773558);
INSERT INTO `auth_item` VALUES ('/chat/*', 2, NULL, NULL, NULL, 1542286415, 1542286415);
INSERT INTO `auth_item` VALUES ('/chat/index', 2, NULL, NULL, NULL, 1542286415, 1542286415);
INSERT INTO `auth_item` VALUES ('/chat/save', 2, NULL, NULL, NULL, 1542286415, 1542286415);
INSERT INTO `auth_item` VALUES ('/common/*', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/debug/*', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/debug/default/*', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/debug/default/index', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/debug/default/view', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/debug/user/*', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/debug/user/set-identity', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/gii/*', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/gii/default/*', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/gii/default/action', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/gii/default/diff', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/gii/default/index', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/gii/default/preview', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/gii/default/view', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/make-eth/*', 2, NULL, NULL, NULL, 1541775376, 1541775376);
INSERT INTO `auth_item` VALUES ('/make-eth/create', 2, NULL, NULL, NULL, 1541775376, 1541775376);
INSERT INTO `auth_item` VALUES ('/make-eth/delete', 2, NULL, NULL, NULL, 1541775376, 1541775376);
INSERT INTO `auth_item` VALUES ('/make-eth/index', 2, NULL, NULL, NULL, 1541775376, 1541775376);
INSERT INTO `auth_item` VALUES ('/make-eth/update', 2, NULL, NULL, NULL, 1541775376, 1541775376);
INSERT INTO `auth_item` VALUES ('/make-eth/view', 2, NULL, NULL, NULL, 1541775376, 1541775376);
INSERT INTO `auth_item` VALUES ('/node/*', 2, NULL, NULL, NULL, 1541775461, 1541775461);
INSERT INTO `auth_item` VALUES ('/node/create', 2, NULL, NULL, NULL, 1541775461, 1541775461);
INSERT INTO `auth_item` VALUES ('/node/delete', 2, NULL, NULL, NULL, 1541775461, 1541775461);
INSERT INTO `auth_item` VALUES ('/node/index', 2, NULL, NULL, NULL, 1541775461, 1541775461);
INSERT INTO `auth_item` VALUES ('/node/update', 2, NULL, NULL, NULL, 1541775461, 1541775461);
INSERT INTO `auth_item` VALUES ('/node/view', 2, NULL, NULL, NULL, 1541775461, 1541775461);
INSERT INTO `auth_item` VALUES ('/site/*', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/site/auth', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/site/error', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/site/index', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/site/login', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/site/logout', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/site/upload', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/upload/*', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/upload/do', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/upload/qiniu', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/user-backend/*', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/user-backend/create', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/user-backend/delete', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/user-backend/index', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/user-backend/signup', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/user-backend/update', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/user-backend/view', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/user/*', 2, NULL, NULL, NULL, 1541773560, 1541773560);
INSERT INTO `auth_item` VALUES ('/user/create', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/user/data', 2, NULL, NULL, NULL, 1541773560, 1541773560);
INSERT INTO `auth_item` VALUES ('/user/delete', 2, NULL, NULL, NULL, 1541773560, 1541773560);
INSERT INTO `auth_item` VALUES ('/user/index', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('/user/update', 2, NULL, NULL, NULL, 1541773560, 1541773560);
INSERT INTO `auth_item` VALUES ('/user/view', 2, NULL, NULL, NULL, 1541773559, 1541773559);
INSERT INTO `auth_item` VALUES ('超级管理员', 1, '拥有最高权限', NULL, NULL, 1541773679, 1542344942);

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child`  (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `child`(`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/assignment/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/assignment/assign');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/assignment/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/assignment/revoke');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/assignment/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/default/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/default/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/menu/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/menu/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/menu/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/menu/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/menu/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/menu/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/assign');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/remove');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/assign');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/remove');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/route/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/route/assign');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/route/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/route/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/route/refresh');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/route/remove');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/rule/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/rule/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/rule/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/rule/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/rule/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/rule/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/activate');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/change-password');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/login');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/logout');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/request-password-reset');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/reset-password');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/signup');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/chat/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/chat/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/chat/save');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/common/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/default/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/default/db-explain');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/default/download-mail');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/default/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/default/toolbar');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/default/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/user/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/user/reset-identity');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/user/set-identity');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/default/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/default/action');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/default/diff');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/default/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/default/preview');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/default/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/make-eth/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/make-eth/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/make-eth/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/make-eth/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/make-eth/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/make-eth/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/node/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/node/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/node/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/node/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/node/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/node/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/auth');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/error');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/login');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/logout');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/upload');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/upload/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/upload/do');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/upload/qiniu');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/signup');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/data');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/view');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `data` blob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chat_content
-- ----------------------------
DROP TABLE IF EXISTS `chat_content`;
CREATE TABLE `chat_content`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fromid` int(11) NOT NULL,
  `fromname` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `toid` int(11) NOT NULL,
  `toname` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isread` tinyint(1) NOT NULL DEFAULT 0,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=文本,2=图片',
  `created_time` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 621 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of chat_content
-- ----------------------------
INSERT INTO `chat_content` VALUES (597, 6, '2', 1, '李白', '123', 1, 1, '2018-12-13 06:26:35');
INSERT INTO `chat_content` VALUES (598, 1, '李白', 6, '2', '兄dei', 1, 1, '2018-12-13 06:27:53');
INSERT INTO `chat_content` VALUES (599, 1, '李白', 6, '2', '兄dei', 1, 1, '2018-12-13 06:27:53');
INSERT INTO `chat_content` VALUES (600, 6, '2', 1, '李白', '老哥666', 1, 1, '2018-12-13 06:28:02');
INSERT INTO `chat_content` VALUES (601, 1, '李白', 6, '2', '休息休息吧', 1, 1, '2018-12-13 06:28:20');
INSERT INTO `chat_content` VALUES (602, 1, '李白', 6, '2', '休息休息吧', 1, 1, '2018-12-13 06:28:20');
INSERT INTO `chat_content` VALUES (603, 1, 'superadmin', 6, '2', '222', 1, 1, '2018-12-13 06:50:07');
INSERT INTO `chat_content` VALUES (604, 1, 'superadmin', 6, '2', '222', 1, 1, '2018-12-13 06:50:07');
INSERT INTO `chat_content` VALUES (605, 1, 'superadmin', 6, '2', '333', 1, 1, '2018-12-13 10:19:23');
INSERT INTO `chat_content` VALUES (606, 1, 'superadmin', 6, '2', '333', 1, 1, '2018-12-13 10:19:23');
INSERT INTO `chat_content` VALUES (607, 6, '2', 1, '李白', 'dsadsdadsd', 1, 1, '2018-12-13 10:21:52');
INSERT INTO `chat_content` VALUES (608, 5, '1', 1, '李白', 'aaa', 1, 1, '2018-12-13 10:23:12');
INSERT INTO `chat_content` VALUES (609, 5, '1', 1, '李白', '/static/upload/chat_img_5c123313cd0c7.jpg', 1, 2, '2018-12-13 18:23:15');
INSERT INTO `chat_content` VALUES (610, 1, 'superadmin', 5, '122', '2222', 1, 1, '2018-12-13 10:24:04');
INSERT INTO `chat_content` VALUES (611, 1, 'superadmin', 5, '122', '2222', 1, 1, '2018-12-13 10:24:04');
INSERT INTO `chat_content` VALUES (612, 5, '122', 1, '李白', 'dddd', 1, 1, '2018-12-13 10:25:02');
INSERT INTO `chat_content` VALUES (613, 5, '122', 1, '李白', '2312321', 1, 1, '2018-12-13 10:28:09');
INSERT INTO `chat_content` VALUES (614, 1, '李白', 5, '122', '321331', 1, 1, '2018-12-13 10:29:45');
INSERT INTO `chat_content` VALUES (615, 1, '李白', 5, '122', '321331', 1, 1, '2018-12-13 10:29:45');
INSERT INTO `chat_content` VALUES (616, 5, '122', 1, '李白', '321', 1, 1, '2018-12-13 10:29:54');
INSERT INTO `chat_content` VALUES (617, 5, '索隆', 1, '李白', '3231', 1, 1, '2018-12-13 10:30:15');
INSERT INTO `chat_content` VALUES (618, 5, '索隆', 1, '李白', '321313', 1, 1, '2018-12-13 10:30:32');
INSERT INTO `chat_content` VALUES (619, 5, '索隆', 1, '李白', '3', 1, 1, '2018-12-13 10:32:09');
INSERT INTO `chat_content` VALUES (620, 5, '索隆', 1, '李白', '3231', 1, 1, '2018-12-13 10:32:40');

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) NULL DEFAULT NULL COMMENT '用户ID',
  `friend_id` int(11) NULL DEFAULT NULL COMMENT '好友id',
  `created_time` datetime NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `idx_uid_fid`(`uid`, `friend_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES (1, 1, 2, '2018-12-14 10:03:14');
INSERT INTO `contact` VALUES (2, 1, 3, '2018-12-14 10:03:22');
INSERT INTO `contact` VALUES (3, 1, 4, '2018-12-14 10:03:33');
INSERT INTO `contact` VALUES (4, 1, 5, '2018-12-14 10:03:46');
INSERT INTO `contact` VALUES (17, 1, 6, '2018-12-14 17:17:32');

-- ----------------------------
-- Table structure for make_eth
-- ----------------------------
DROP TABLE IF EXISTS `make_eth`;
CREATE TABLE `make_eth`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `eth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `make_eth` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'email拼eth后md5',
  `request_time` datetime NULL DEFAULT NULL COMMENT '请求时间',
  `created_time` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of make_eth
-- ----------------------------
INSERT INTO `make_eth` VALUES (1, '213123.com', 'dsadsaewq321321', '5f8e1ce4feef24c1735184cd576732d0', '2018-10-31 21:51:55', '2018-10-31 21:51:55');
INSERT INTO `make_eth` VALUES (8, '21312@3.com', 'dsadsa2ewq321321', '591b96a88285e8939494fb26ec17bfd3', '2018-10-31 22:21:03', '2018-10-31 22:21:03');
INSERT INTO `make_eth` VALUES (9, '213212@3.com', 'dsadsa2ewq321321', 'cde56ea56461c3952785d9926b25a4cd', '2018-10-31 22:44:05', '2018-10-31 22:44:05');
INSERT INTO `make_eth` VALUES (10, '213212@3.com', 'dsadsa222ewq321321', '2797d117e53ea9a7a29c256577c39074', '2018-10-31 22:48:35', '2018-10-31 22:48:35');
INSERT INTO `make_eth` VALUES (11, '2132212@3.com', 'dsadsa222ewq321321', 'd9fc94cbc722f8f2370579b332f177c3', '2018-10-31 22:48:50', '2018-10-31 22:48:50');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parent` int(11) NULL DEFAULT NULL,
  `route` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order` int(11) NULL DEFAULT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `parent`(`parent`) USING BTREE,
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, '后台用户管理', NULL, '/user-backend/index', 1, NULL);
INSERT INTO `menu` VALUES (2, '权限管理', NULL, '/admin/route/index', 4, NULL);
INSERT INTO `menu` VALUES (3, '权限管理', 2, '/admin/permission/index', NULL, NULL);
INSERT INTO `menu` VALUES (4, '菜单设置', 2, '/admin/menu/index', NULL, NULL);
INSERT INTO `menu` VALUES (5, '角色分配', 2, '/admin/assignment/index', NULL, NULL);
INSERT INTO `menu` VALUES (6, '角色管理', 2, '/admin/role/index', NULL, NULL);
INSERT INTO `menu` VALUES (7, '路由管理', 2, '/admin/route/index', NULL, NULL);

-- ----------------------------
-- Table structure for node
-- ----------------------------
DROP TABLE IF EXISTS `node`;
CREATE TABLE `node`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nick_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '社群昵称',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `eth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '来源',
  `request_time` datetime NULL DEFAULT NULL COMMENT '抢占时间',
  `created_time` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of node
-- ----------------------------
INSERT INTO `node` VALUES (1, '123', '213123.com', 'dsadsaewq321321', NULL, '2018-10-31 21:51:55', '2018-10-31 21:51:55');
INSERT INTO `node` VALUES (8, '2313', '21312@3.com', 'dsadsa2ewq321321', '', '2018-10-31 22:21:03', '2018-10-31 22:21:03');
INSERT INTO `node` VALUES (9, '2313', '213212@3.com', 'dsadsa222ewq321321', NULL, '2018-10-31 22:44:40', '2018-10-31 22:44:40');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invite_mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '邀请人手机',
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '账号',
  `display_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `real_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `login_num` int(11) NOT NULL,
  `login_ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `login_time` datetime NULL DEFAULT NULL,
  `user_group` int(11) NOT NULL,
  `updated_by` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '自动登录key',
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '加密密码',
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '重置密码token',
  `role` smallint(6) NOT NULL,
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `api_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user_backend
-- ----------------------------
DROP TABLE IF EXISTS `user_backend`;
CREATE TABLE `user_backend`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '账号',
  `head_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '头像',
  `display_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `real_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `my_sign` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `login_num` int(11) NOT NULL,
  `login_ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `login_time` datetime NULL DEFAULT NULL,
  `user_group` int(11) NOT NULL,
  `updated_by` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '自动登录key',
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '加密密码',
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '重置密码token',
  `role` smallint(6) NOT NULL,
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_backend
-- ----------------------------
INSERT INTO `user_backend` VALUES (1, 'superadmin', '/static/chat/img/user2-160x160.jpg', '李白', '', '123456', '靡不有初，鲜克有终', '', 0, '', '0000-00-00 00:00:00', 0, '管理员甲', '2018-12-14 09:46:11', 10, 'superadmin@admin.com', 'e3FX_xB9zC0ICa1ybXoPZW14JZDMID9G', '$2y$13$0xfVo63PPDzLhCWKT8mOOeR0O8SCni/ER1dxA1GxCHjEM0p1fmzGe', '', 0, 1498650661);
INSERT INTO `user_backend` VALUES (2, 'test', '/static/chat/img/123.jpg', '测试', '', '123456', '', NULL, 0, NULL, NULL, 0, '', '0000-00-00 00:00:00', 10, 'test@qq.com', 'PHA8NjRFeCCcDBl25YH0mB8dClT-Bncl', '$2y$13$RVd./v8lZq77Ey68cjLLh.Wgo8g2fZ0caL3RsaGK0YmM0gvztINEa', NULL, 0, 1542346674);
INSERT INTO `user_backend` VALUES (3, 'luohao', '/static/chat/img/28dfbfef890719d3002f73613562a783_1.jpg', '罗豪', '', '123456', '', '', 0, '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', 10, 'test@qq.com', 'PHA8NjRFeCCcDBl25YH0mB8dClT-Bncl', '$2y$13$RVd./v8lZq77Ey68cjLLh.Wgo8g2fZ0caL3RsaGK0YmM0gvztINEa', '', 0, 1542346674);
INSERT INTO `user_backend` VALUES (4, 'luohao', '/static/chat/img/user1-128x128.jpg', '罗罗', '', '123456', '', '', 0, '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', 10, 'test@qq.com', 'PHA8NjRFeCCcDBl25YH0mB8dClT-Bncl', '$2y$13$RVd./v8lZq77Ey68cjLLh.Wgo8g2fZ0caL3RsaGK0YmM0gvztINEa', '', 0, 1542346674);
INSERT INTO `user_backend` VALUES (5, '1', '/static/upload/headImg/20181213/e7293e3e8508b5d181cf012e72c9cee0.jpg', '索隆', '', '1', '', NULL, 0, NULL, NULL, 0, '', '0000-00-00 00:00:00', 0, '', '', '', NULL, 0, 1544671452);
INSERT INTO `user_backend` VALUES (6, '2', '/static/chat/img/avatar04.png', '23333', '', '2', '', NULL, 0, NULL, NULL, 0, '', '0000-00-00 00:00:00', 0, '', '', '', NULL, 0, 1544671589);

SET FOREIGN_KEY_CHECKS = 1;
