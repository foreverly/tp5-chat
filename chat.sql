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

 Date: 18/01/2019 18:59:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL COMMENT '作者、渠道等',
  `title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '标题',
  `sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '副标题',
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '简要描述',
  `slogan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '标语',
  `cover_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '封面图片',
  `seo_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'SEO关键字，逗号分割',
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default' COMMENT '文章分类，逗号分割',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=显示，0=隐藏',
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '文章内容',
  `push_time` datetime NULL DEFAULT NULL COMMENT '推送时间',
  `created_time` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_time` datetime NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES (1, 14, '国庆七天乐', '国庆七天乐', '', '国庆七天乐国庆七天乐国庆七天乐', '/static/blog/admin1/img/a5.png', '', 'default', 0, '&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0059.gif&quot;/&gt;&lt;/p&gt;', '2019-01-17 11:20:30', '2019-01-17 11:20:30', '2019-01-18 18:42:16');
INSERT INTO `article` VALUES (2, 14, '查询数据', '一个人站在汹涌的街头，突然就感到无可抑制的悲伤……', NULL, '国庆七天乐国庆七天乐国庆七天乐', '/static/blog/admin1/img/a5.png', '', 'default', 0, 'test内容', '2019-01-17 11:30:59', '2019-01-17 11:30:59', NULL);
INSERT INTO `article` VALUES (3, 14, '这城市那么空', '爱就像蓝天白云，晴空万里，突然暴风雨……', NULL, '国庆七天乐国庆七天乐国庆七天乐', '/static/blog/admin1/img/a5.png', '', 'default', 0, 'test内容', '2019-01-17 11:31:05', '2019-01-17 11:31:05', NULL);
INSERT INTO `article` VALUES (4, 14, '国庆七天乐', '国庆七天乐', NULL, '国庆七天乐国庆七天乐国庆七天乐', '/static/blog/admin1/img/a5.png', '', 'default', 0, 'test内容', '2019-01-17 11:31:12', '2019-01-17 11:31:12', NULL);
INSERT INTO `article` VALUES (5, 14, '偏偏爱上你', '爱就像蓝天白云，晴空万里，突然暴风雨……', NULL, '国庆七天乐国庆七天乐国庆七天乐', '/static/blog/admin1/img/a5.png', '', 'default', 0, 'test内容', '2019-01-17 11:31:22', '2019-01-17 11:31:22', NULL);
INSERT INTO `article` VALUES (6, 14, 'Laradock端口映射', '爱就像蓝天白云，晴空万里，突然暴风雨……', NULL, '国庆七天乐国庆七天乐国庆七天乐', '/static/blog/admin1/img/a5.png', '', 'default', 0, 'test内容', '2019-01-17 11:31:30', '2019-01-17 11:31:30', NULL);

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
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '标题',
  `sub_title` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '副标题',
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '描述',
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '图片地址',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '跳转地址',
  `order` int(11) NULL DEFAULT NULL COMMENT '排序',
  `status` tinyint(4) NULL DEFAULT NULL COMMENT '状态1=启用，0=禁用',
  `created_time` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `updated_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES (1, '这城市那么空', '一个人站在汹涌的街头，突然就感到无可抑制的悲伤……', '你在哪...', '/static/upload/banner/20190115/e43667bf88b288fc5acddbb1c277dc09.jpg', 'www.52xue.site', 0, 1, '2019-01-14 16:14:28', '2019-01-15 15:45:41');
INSERT INTO `banner` VALUES (2, '这城市那么空', '一个人站在汹涌的街头，突然就感到无可抑制的悲伤……', '', '/static/upload/banner/20190115/c058e067e3bccc4c1dd40318924cd6ce.jpg', '', 0, 0, '2019-01-15 10:17:48', '2019-01-15 15:45:49');
INSERT INTO `banner` VALUES (3, '偏偏爱上你', '爱就像蓝天白云，晴空万里，突然暴风雨……', '', '/static/upload/banner/20190115/8a48e2b0d8ddcf7ae9a6aeabbc19aa40.jpg', '', 0, 0, '2019-01-15 10:18:53', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 636 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

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
INSERT INTO `chat_content` VALUES (621, 8, 'morning', 1, '李白', '123', 1, 1, '2018-12-17 07:42:14');
INSERT INTO `chat_content` VALUES (622, 8, 'morning', 2, '测试', '2222222', 0, 1, '2018-12-18 08:06:58');
INSERT INTO `chat_content` VALUES (623, 8, 'morning', 2, '测试', '111', 0, 1, '2018-12-19 09:43:49');
INSERT INTO `chat_content` VALUES (624, 8, 'morning', 2, '测试', '222', 0, 1, '2018-12-19 09:43:55');
INSERT INTO `chat_content` VALUES (625, 8, 'morning', 2, '测试', '[em_18]', 0, 1, '2018-12-19 09:44:00');
INSERT INTO `chat_content` VALUES (626, 1, '李白', 8, 'morning', '111', 0, 1, '2018-12-26 08:52:19');
INSERT INTO `chat_content` VALUES (627, 2, '测试', 1, '李白', '123333', 1, 1, '2018-12-26 08:58:04');
INSERT INTO `chat_content` VALUES (628, 1, '李白', 2, '测试', '321313212311231', 1, 1, '2018-12-26 08:58:09');
INSERT INTO `chat_content` VALUES (629, 2, '测试', 1, '李白', '[em_22]', 1, 1, '2018-12-26 08:59:16');
INSERT INTO `chat_content` VALUES (630, 2, '测试', 1, '李白', '[em_35]', 1, 1, '2018-12-26 08:59:32');
INSERT INTO `chat_content` VALUES (631, 1, '李白', 2, '测试', '2', 1, 1, '2018-12-26 09:00:14');
INSERT INTO `chat_content` VALUES (632, 1, '李白', 2, '测试', '2', 1, 1, '2018-12-26 09:00:21');
INSERT INTO `chat_content` VALUES (633, 2, '测试', 1, '李白', '22', 1, 1, '2018-12-26 09:00:32');
INSERT INTO `chat_content` VALUES (634, 2, '测试', 1, '李白', '/static/upload/chat_img_5c2353e82ae9c.jpg', 1, 2, '2018-12-26 18:11:52');
INSERT INTO `chat_content` VALUES (635, 1, '李白', 2, '测试', '/static/upload/chat_img_5c2355d2701e4.jpg', 1, 2, '2018-12-26 18:20:02');

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
) ENGINE = MyISAM AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES (1, 1, 2, '2018-12-14 10:03:14');
INSERT INTO `contact` VALUES (2, 1, 3, '2018-12-14 10:03:22');
INSERT INTO `contact` VALUES (3, 1, 4, '2018-12-14 10:03:33');
INSERT INTO `contact` VALUES (4, 1, 5, '2018-12-14 10:03:46');
INSERT INTO `contact` VALUES (17, 1, 6, '2018-12-14 17:17:32');
INSERT INTO `contact` VALUES (18, 8, 1, '2018-12-17 15:42:06');
INSERT INTO `contact` VALUES (22, 8, 3, '2018-12-18 10:35:21');
INSERT INTO `contact` VALUES (21, 8, 2, '2018-12-18 10:25:13');

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
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (11, '首页', NULL, '/admin.php/index', 1, 'home');
INSERT INTO `menu` VALUES (13, '菜单管理', NULL, '/admin.php/menu', 0, 'share-alt');
INSERT INTO `menu` VALUES (15, '轮播管理', NULL, '/admin.php/banner', 0, 'image');
INSERT INTO `menu` VALUES (16, '素材管理', NULL, '#', 4, 'camera-retro');
INSERT INTO `menu` VALUES (17, '文章管理', NULL, '#', 0, 'envira');
INSERT INTO `menu` VALUES (18, '网站设置', NULL, '/admin.php/setting', 0, 'cog');
INSERT INTO `menu` VALUES (19, '素材', 16, '/admin.php/picture/sucai', 0, '');
INSERT INTO `menu` VALUES (20, '美女', 16, '/admin.php/picture/meinv', 0, '');
INSERT INTO `menu` VALUES (21, '壁纸', 16, '/admin.php/picture/bizhi', 0, '');
INSERT INTO `menu` VALUES (22, '图片库', 16, '/admin.php/picture/libs', 0, '');
INSERT INTO `menu` VALUES (23, 'PHP', 17, '/admin.php/article/php', 0, '');
INSERT INTO `menu` VALUES (24, 'Linux', 17, '/admin.php/article/linux', 0, '');
INSERT INTO `menu` VALUES (25, 'Docker', 17, '/admin.php/article/docker', 0, '');
INSERT INTO `menu` VALUES (26, 'Others', 17, '/admin.php/article/others', 0, '');
INSERT INTO `menu` VALUES (27, '文章列表', 17, '/admin.php/article', -1, '');

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
  `login_num` int(11) NOT NULL DEFAULT 0,
  `login_ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `login_time` datetime NULL DEFAULT NULL,
  `user_group` int(11) NOT NULL DEFAULT 10,
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
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_backend
-- ----------------------------
INSERT INTO `user_backend` VALUES (1, 'superadmin', '/static/chat/img/user2-160x160.jpg', '李白', '', '7JZ/s2oPwZBEw', '靡不有初，鲜克有终', '', 0, '', '0000-00-00 00:00:00', 0, '管理员甲', '2018-12-14 09:46:11', 10, 'superadmin@admin.com', 'e3FX_xB9zC0ICa1ybXoPZW14JZDMID9G', '7JZ/s2oPwZBEw', '', 0, 1498650661);
INSERT INTO `user_backend` VALUES (2, 'test', '/static/upload/headImg/20181226/2df2926b1a6345754e67038cb429d7f4.jpg', '测试', '', '7JZ/s2oPwZBEw', '', NULL, 0, NULL, NULL, 0, '', '2018-12-26 17:00:07', 10, 'test@qq.com', 'PHA8NjRFeCCcDBl25YH0mB8dClT-Bncl', '7JZ/s2oPwZBEw', NULL, 0, 1542346674);
INSERT INTO `user_backend` VALUES (3, 'luohao', '/static/chat/img/28dfbfef890719d3002f73613562a783_1.jpg', '罗豪', '', '7JZ/s2oPwZBEw', '', '', 0, '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', 10, 'test@qq.com', 'PHA8NjRFeCCcDBl25YH0mB8dClT-Bncl', '7JZ/s2oPwZBEw', '', 0, 1542346674);
INSERT INTO `user_backend` VALUES (4, 'luohao', '/static/chat/img/user1-128x128.jpg', '罗罗', '', '7JZ/s2oPwZBEw', '', '', 0, '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', 10, 'test@qq.com', 'PHA8NjRFeCCcDBl25YH0mB8dClT-Bncl', '7JZ/s2oPwZBEw', '', 0, 1542346674);
INSERT INTO `user_backend` VALUES (5, '1', '/static/upload/headImg/20181213/e7293e3e8508b5d181cf012e72c9cee0.jpg', '索隆', '', '7JZ/s2oPwZBEw', '', NULL, 0, NULL, NULL, 0, '', '0000-00-00 00:00:00', 0, '', '', '7JZ/s2oPwZBEw', NULL, 0, 1544671452);
INSERT INTO `user_backend` VALUES (6, '2', '/static/chat/img/avatar04.png', '23333', '', '7JZ/s2oPwZBEw', '', NULL, 0, NULL, NULL, 0, '', '0000-00-00 00:00:00', 0, '', '', '7JZ/s2oPwZBEw', NULL, 0, 1544671589);
INSERT INTO `user_backend` VALUES (7, 'test', '/static/chat/img/avatar04.png', '猫猫', '', '7JZ/s2oPwZBEw', '', NULL, 0, NULL, NULL, 0, '', '0000-00-00 00:00:00', 0, '', '', '7JZ/s2oPwZBEw', NULL, 0, 1545030597);
INSERT INTO `user_backend` VALUES (8, 'test001', '/static/chat/img/avatar04.png', 'morning', '', '7JZ/s2oPwZBEw', '喵，早安', NULL, 0, NULL, NULL, 0, '', '2018-12-18 10:34:50', 0, '', '', '7JZ/s2oPwZBEw', NULL, 0, 1545030934);
INSERT INTO `user_backend` VALUES (9, '3', '/static/chat/img/avatar04.png', '3', 'default', '7JZ/s2oPwZBEw', '', NULL, 0, NULL, NULL, 0, '', '0000-00-00 00:00:00', 0, '', '', '7JZ/s2oPwZBEw', NULL, 0, 1545097214);
INSERT INTO `user_backend` VALUES (10, '4', '/static/chat/img/avatar04.png', '4', 'default', '7JZ/s2oPwZBEw', '', NULL, 0, NULL, NULL, 0, '', '0000-00-00 00:00:00', 0, '', '', '7JZ/s2oPwZBEw', NULL, 0, 1545097728);
INSERT INTO `user_backend` VALUES (11, '333', '/static/chat/img/avatar04.png', '333', 'default', '333', '', NULL, 0, NULL, NULL, 0, '', '0000-00-00 00:00:00', 0, '', '', '7J40Bg.0PDvjo', NULL, 0, 1545120751);
INSERT INTO `user_backend` VALUES (12, '2222', '/static/chat/img/avatar04.png', '2222', 'default', '22222222', '', NULL, 0, NULL, NULL, 10, '', '0000-00-00 00:00:00', 0, '', '', '7JJsWyQ2o6.CQ', NULL, 0, 1546068909);
INSERT INTO `user_backend` VALUES (14, '185330767@qq.com', '/static/chat/img/user1-128x128.jpg', '超人会飞吗', 'default', '123456', '', NULL, 0, NULL, NULL, 10, '', '2018-12-29 18:11:18', 0, '185330767@qq.com', '', '7JZ/s2oPwZBEw', NULL, 0, 1546073840);
INSERT INTO `user_backend` VALUES (15, 'bruce_1110@163.com', '/static/chat/img/user4-128x128.jpg', '超人喔', 'default', '123456', '', NULL, 0, NULL, NULL, 10, '', '0000-00-00 00:00:00', 0, 'bruce_1110@163.com', '', '7JZ/s2oPwZBEw', NULL, 0, 1546413070);

SET FOREIGN_KEY_CHECKS = 1;
