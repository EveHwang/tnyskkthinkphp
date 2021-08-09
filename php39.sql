/*
 Navicat Premium Data Transfer

 Source Server         :  localhost
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : php39

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 12/01/2021 22:51:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for p39_admin
-- ----------------------------
DROP TABLE IF EXISTS `p39_admin`;
CREATE TABLE `p39_admin`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '管理员' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_admin
-- ----------------------------
INSERT INTO `p39_admin` VALUES (1, 'root', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `p39_admin` VALUES (3, 'goods', '59da8bd04473ac6711d74cd91dbe903d');
INSERT INTO `p39_admin` VALUES (4, 'rbac', 'eae22f4f89a3e1a049b3992d107229d1');

-- ----------------------------
-- Table structure for p39_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `p39_admin_role`;
CREATE TABLE `p39_admin_role`  (
  `admin_id` mediumint(8) UNSIGNED NOT NULL COMMENT '管理员id',
  `role_id` mediumint(8) UNSIGNED NOT NULL COMMENT '角色id',
  INDEX `admin_id`(`admin_id`) USING BTREE,
  INDEX `role_id`(`role_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '管理员角色' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_admin_role
-- ----------------------------
INSERT INTO `p39_admin_role` VALUES (3, 1);
INSERT INTO `p39_admin_role` VALUES (4, 2);

-- ----------------------------
-- Table structure for p39_attribute
-- ----------------------------
DROP TABLE IF EXISTS `p39_attribute`;
CREATE TABLE `p39_attribute`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `attr_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '属性名称',
  `attr_type` enum('唯一','可选') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '属性类型',
  `attr_option_values` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '属性可选值',
  `type_id` mediumint(8) UNSIGNED NOT NULL COMMENT '所属类型Id',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '属性表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for p39_brand
-- ----------------------------
DROP TABLE IF EXISTS `p39_brand`;
CREATE TABLE `p39_brand`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `brand_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '品牌名称',
  `site_url` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '官方网址',
  `logo` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '品牌Logo图片',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '品牌' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for p39_cart
-- ----------------------------
DROP TABLE IF EXISTS `p39_cart`;
CREATE TABLE `p39_cart`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `goods_id` mediumint(8) UNSIGNED NOT NULL COMMENT '商品Id',
  `goods_attr_id` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商品属性Id',
  `goods_number` mediumint(8) UNSIGNED NOT NULL COMMENT '购买的数量',
  `member_id` mediumint(8) UNSIGNED NOT NULL COMMENT '会员Id',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `member_id`(`member_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '购物车' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_cart
-- ----------------------------
INSERT INTO `p39_cart` VALUES (14, 7, '2,6', 1, 1);

-- ----------------------------
-- Table structure for p39_category
-- ----------------------------
DROP TABLE IF EXISTS `p39_category`;
CREATE TABLE `p39_category`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `cat_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '分类名称',
  `parent_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '上级分类的Id,0:顶级分类',
  `is_floor` enum('是','否') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '否' COMMENT '是否推荐楼层',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '分类' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for p39_comment
-- ----------------------------
DROP TABLE IF EXISTS `p39_comment`;
CREATE TABLE `p39_comment`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `goods_id` mediumint(8) UNSIGNED NOT NULL COMMENT '商品Id',
  `member_id` mediumint(8) UNSIGNED NOT NULL COMMENT '会员Id',
  `content` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容',
  `addtime` datetime(0) NOT NULL COMMENT '发表时间',
  `star` tinyint(3) UNSIGNED NOT NULL COMMENT '分值',
  `click_count` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '有用的数字',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `goods_id`(`goods_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '评论' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_comment
-- ----------------------------
INSERT INTO `p39_comment` VALUES (1, 4, 1, '测试', '2015-10-28 09:40:55', 5, 0);
INSERT INTO `p39_comment` VALUES (2, 4, 1, '测试', '2015-10-28 09:41:25', 4, 0);
INSERT INTO `p39_comment` VALUES (3, 4, 1, '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试v', '2015-10-28 09:41:53', 4, 0);
INSERT INTO `p39_comment` VALUES (4, 4, 1, 'formformformformformform', '2015-10-28 09:43:26', 4, 0);
INSERT INTO `p39_comment` VALUES (5, 4, 1, 'fdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasfdasf', '2015-10-28 09:43:40', 3, 0);
INSERT INTO `p39_comment` VALUES (6, 4, 1, '1233212', '2015-10-28 09:43:57', 5, 0);
INSERT INTO `p39_comment` VALUES (7, 4, 1, '测试一下！！', '2015-10-28 09:54:28', 4, 0);
INSERT INTO `p39_comment` VALUES (8, 4, 1, '再测试一下！！', '2015-10-28 09:55:22', 1, 0);
INSERT INTO `p39_comment` VALUES (9, 4, 1, '再评论五！！', '2015-10-28 09:56:25', 2, 0);
INSERT INTO `p39_comment` VALUES (10, 4, 1, '123', '2015-10-28 09:56:30', 4, 0);
INSERT INTO `p39_comment` VALUES (11, 4, 1, '53645', '2015-10-28 09:56:34', 3, 0);
INSERT INTO `p39_comment` VALUES (12, 4, 1, '6576', '2015-10-28 09:56:39', 1, 0);
INSERT INTO `p39_comment` VALUES (13, 4, 1, '45645', '2015-10-28 09:56:42', 3, 0);

-- ----------------------------
-- Table structure for p39_comment_reply
-- ----------------------------
DROP TABLE IF EXISTS `p39_comment_reply`;
CREATE TABLE `p39_comment_reply`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `comment_id` mediumint(8) UNSIGNED NOT NULL COMMENT '评论Id',
  `member_id` mediumint(8) UNSIGNED NOT NULL COMMENT '会员Id',
  `content` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容',
  `addtime` datetime(0) NOT NULL COMMENT '发表时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `comment_id`(`comment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '评论回复' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_comment_reply
-- ----------------------------
INSERT INTO `p39_comment_reply` VALUES (1, 54, 1, '回复！！', '2015-10-28 16:19:54');
INSERT INTO `p39_comment_reply` VALUES (2, 54, 1, '回复！！！', '2015-10-28 16:22:37');
INSERT INTO `p39_comment_reply` VALUES (3, 54, 1, '回复一下1！！', '2015-10-28 16:33:59');
INSERT INTO `p39_comment_reply` VALUES (8, 53, 1, 'yuyuyuyuyu', '2015-10-28 16:43:58');
INSERT INTO `p39_comment_reply` VALUES (9, 51, 1, 'ohjgfsdf', '2015-10-28 16:44:16');

-- ----------------------------
-- Table structure for p39_goods
-- ----------------------------
DROP TABLE IF EXISTS `p39_goods`;
CREATE TABLE `p39_goods`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `goods_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品名称',
  `market_price` decimal(10, 2) NOT NULL COMMENT '市场价格',
  `shop_price` decimal(10, 2) NOT NULL COMMENT '本店价格',
  `goods_desc` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '商品描述',
  `is_on_sale` enum('是','否') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '是' COMMENT '是否上架',
  `is_delete` enum('是','否') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '否' COMMENT '是否放到回收站',
  `addtime` datetime(0) NOT NULL COMMENT '添加时间',
  `logo` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '原图',
  `sm_logo` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '小图',
  `mid_logo` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '中图',
  `big_logo` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '大图',
  `mbig_logo` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '更大图',
  `brand_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '品牌id',
  `cat_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '主分类Id',
  `type_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '类型Id',
  `promote_price` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '促销价格',
  `promote_start_date` datetime(0) NOT NULL COMMENT '促销开始时间',
  `promote_end_date` datetime(0) NOT NULL COMMENT '促销结束时间',
  `is_new` enum('是','否') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '否' COMMENT '是否新品',
  `is_hot` enum('是','否') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '否' COMMENT '是否热卖',
  `is_best` enum('是','否') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '否' COMMENT '是否精品',
  `sort_num` tinyint(3) UNSIGNED NOT NULL DEFAULT 100 COMMENT '排序的数字',
  `is_floor` enum('是','否') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '否' COMMENT '是否推荐楼层',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `shop_price`(`shop_price`) USING BTREE,
  INDEX `addtime`(`addtime`) USING BTREE,
  INDEX `brand_id`(`brand_id`) USING BTREE,
  INDEX `is_on_sale`(`is_on_sale`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for p39_goods_attr
-- ----------------------------
DROP TABLE IF EXISTS `p39_goods_attr`;
CREATE TABLE `p39_goods_attr`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `attr_value` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '属性值',
  `attr_id` mediumint(8) UNSIGNED NOT NULL COMMENT '属性Id',
  `goods_id` mediumint(8) UNSIGNED NOT NULL COMMENT '商品Id',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `goods_id`(`goods_id`) USING BTREE,
  INDEX `attr_id`(`attr_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品属性' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for p39_goods_cat
-- ----------------------------
DROP TABLE IF EXISTS `p39_goods_cat`;
CREATE TABLE `p39_goods_cat`  (
  `cat_id` mediumint(8) UNSIGNED NOT NULL COMMENT '分类id',
  `goods_id` mediumint(8) UNSIGNED NOT NULL COMMENT '商品Id',
  INDEX `goods_id`(`goods_id`) USING BTREE,
  INDEX `cat_id`(`cat_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品扩展分类' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_goods_cat
-- ----------------------------
INSERT INTO `p39_goods_cat` VALUES (16, 4);
INSERT INTO `p39_goods_cat` VALUES (17, 4);
INSERT INTO `p39_goods_cat` VALUES (20, 4);
INSERT INTO `p39_goods_cat` VALUES (25, 3);
INSERT INTO `p39_goods_cat` VALUES (4, 6);
INSERT INTO `p39_goods_cat` VALUES (19, 6);
INSERT INTO `p39_goods_cat` VALUES (6, 6);

-- ----------------------------
-- Table structure for p39_goods_number
-- ----------------------------
DROP TABLE IF EXISTS `p39_goods_number`;
CREATE TABLE `p39_goods_number`  (
  `goods_id` mediumint(8) UNSIGNED NOT NULL COMMENT '商品Id',
  `goods_number` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '库存量',
  `goods_attr_id` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品属性表的ID,如果有多个，就用程序拼成字符串存到这个字段中',
  INDEX `goods_id`(`goods_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '库存量' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_goods_number
-- ----------------------------
INSERT INTO `p39_goods_number` VALUES (7, 0, '1,5');
INSERT INTO `p39_goods_number` VALUES (7, 3109, '2,5');
INSERT INTO `p39_goods_number` VALUES (7, 439, '3,5');
INSERT INTO `p39_goods_number` VALUES (7, 665, '1,6');
INSERT INTO `p39_goods_number` VALUES (7, 415, '2,6');
INSERT INTO `p39_goods_number` VALUES (7, 119, '3,6');
INSERT INTO `p39_goods_number` VALUES (3, 95, '');
INSERT INTO `p39_goods_number` VALUES (4, 0, '');

-- ----------------------------
-- Table structure for p39_goods_pic
-- ----------------------------
DROP TABLE IF EXISTS `p39_goods_pic`;
CREATE TABLE `p39_goods_pic`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `pic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '原图',
  `sm_pic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '小图',
  `mid_pic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '中图',
  `big_pic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '大图',
  `goods_id` mediumint(8) UNSIGNED NOT NULL COMMENT '商品Id',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `goods_id`(`goods_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品相册' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_goods_pic
-- ----------------------------
INSERT INTO `p39_goods_pic` VALUES (2, 'Goods/2015-10-15/561f5e4374c7d.jpg', 'Goods/2015-10-15/thumb_2_561f5e4374c7d.jpg', 'Goods/2015-10-15/thumb_1_561f5e4374c7d.jpg', 'Goods/2015-10-15/thumb_0_561f5e4374c7d.jpg', 3);
INSERT INTO `p39_goods_pic` VALUES (4, 'Goods/2015-10-15/561f6f5e19948.jpg', 'Goods/2015-10-15/thumb_2_561f6f5e19948.jpg', 'Goods/2015-10-15/thumb_1_561f6f5e19948.jpg', 'Goods/2015-10-15/thumb_0_561f6f5e19948.jpg', 3);
INSERT INTO `p39_goods_pic` VALUES (5, 'Goods/2015-10-15/561f6f6018a1a.jpg', 'Goods/2015-10-15/thumb_2_561f6f6018a1a.jpg', 'Goods/2015-10-15/thumb_1_561f6f6018a1a.jpg', 'Goods/2015-10-15/thumb_0_561f6f6018a1a.jpg', 3);
INSERT INTO `p39_goods_pic` VALUES (6, 'Goods/2015-10-15/561f6f612ab67.jpg', 'Goods/2015-10-15/thumb_2_561f6f612ab67.jpg', 'Goods/2015-10-15/thumb_1_561f6f612ab67.jpg', 'Goods/2015-10-15/thumb_0_561f6f612ab67.jpg', 3);
INSERT INTO `p39_goods_pic` VALUES (7, 'Goods/2015-10-15/561f6f7151c1c.gif', 'Goods/2015-10-15/thumb_2_561f6f7151c1c.gif', 'Goods/2015-10-15/thumb_1_561f6f7151c1c.gif', 'Goods/2015-10-15/thumb_0_561f6f7151c1c.gif', 3);
INSERT INTO `p39_goods_pic` VALUES (8, 'Goods/2015-10-16/562045b377902.jpg', 'Goods/2015-10-16/thumb_2_562045b377902.jpg', 'Goods/2015-10-16/thumb_1_562045b377902.jpg', 'Goods/2015-10-16/thumb_0_562045b377902.jpg', 3);
INSERT INTO `p39_goods_pic` VALUES (9, 'Goods/2015-10-16/56204632606ed.jpg', 'Goods/2015-10-16/thumb_2_56204632606ed.jpg', 'Goods/2015-10-16/thumb_1_56204632606ed.jpg', 'Goods/2015-10-16/thumb_0_56204632606ed.jpg', 3);
INSERT INTO `p39_goods_pic` VALUES (10, 'Goods/2015-10-16/56204632b13f8.jpg', 'Goods/2015-10-16/thumb_2_56204632b13f8.jpg', 'Goods/2015-10-16/thumb_1_56204632b13f8.jpg', 'Goods/2015-10-16/thumb_0_56204632b13f8.jpg', 3);
INSERT INTO `p39_goods_pic` VALUES (11, 'Goods/2015-10-19/56245be9ae66d.jpg', 'Goods/2015-10-19/thumb_2_56245be9ae66d.jpg', 'Goods/2015-10-19/thumb_1_56245be9ae66d.jpg', 'Goods/2015-10-19/thumb_0_56245be9ae66d.jpg', 7);
INSERT INTO `p39_goods_pic` VALUES (12, 'Goods/2015-10-19/56245bea13dda.jpg', 'Goods/2015-10-19/thumb_2_56245bea13dda.jpg', 'Goods/2015-10-19/thumb_1_56245bea13dda.jpg', 'Goods/2015-10-19/thumb_0_56245bea13dda.jpg', 7);
INSERT INTO `p39_goods_pic` VALUES (13, 'Goods/2015-10-19/56245bea6ac8f.jpg', 'Goods/2015-10-19/thumb_2_56245bea6ac8f.jpg', 'Goods/2015-10-19/thumb_1_56245bea6ac8f.jpg', 'Goods/2015-10-19/thumb_0_56245bea6ac8f.jpg', 7);
INSERT INTO `p39_goods_pic` VALUES (14, 'Goods/2015-10-19/56245beab2910.jpg', 'Goods/2015-10-19/thumb_2_56245beab2910.jpg', 'Goods/2015-10-19/thumb_1_56245beab2910.jpg', 'Goods/2015-10-19/thumb_0_56245beab2910.jpg', 7);

-- ----------------------------
-- Table structure for p39_member
-- ----------------------------
DROP TABLE IF EXISTS `p39_member`;
CREATE TABLE `p39_member`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `face` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '头像',
  `jifen` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '积分',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '会员' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_member
-- ----------------------------
INSERT INTO `p39_member` VALUES (1, 'php39', '9724f7a7f7887b4388c15d2ff86fb784', '', 15000);

-- ----------------------------
-- Table structure for p39_member_level
-- ----------------------------
DROP TABLE IF EXISTS `p39_member_level`;
CREATE TABLE `p39_member_level`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `level_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '级别名称',
  `jifen_bottom` mediumint(8) UNSIGNED NOT NULL COMMENT '积分下限',
  `jifen_top` mediumint(8) UNSIGNED NOT NULL COMMENT '积分上限',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '会员级别' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_member_level
-- ----------------------------
INSERT INTO `p39_member_level` VALUES (1, '注册会员', 0, 5000);
INSERT INTO `p39_member_level` VALUES (2, '初级会员', 5001, 10000);
INSERT INTO `p39_member_level` VALUES (3, '高级会员', 10001, 20000);
INSERT INTO `p39_member_level` VALUES (4, 'VIP', 20001, 16777215);

-- ----------------------------
-- Table structure for p39_member_price
-- ----------------------------
DROP TABLE IF EXISTS `p39_member_price`;
CREATE TABLE `p39_member_price`  (
  `price` decimal(10, 2) NOT NULL COMMENT '会员价格',
  `level_id` mediumint(8) UNSIGNED NOT NULL COMMENT '级别Id',
  `goods_id` mediumint(8) UNSIGNED NOT NULL COMMENT '商品Id',
  INDEX `level_id`(`level_id`) USING BTREE,
  INDEX `goods_id`(`goods_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '会员价格' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_member_price
-- ----------------------------
INSERT INTO `p39_member_price` VALUES (105.00, 2, 7);
INSERT INTO `p39_member_price` VALUES (95.00, 3, 7);
INSERT INTO `p39_member_price` VALUES (90.00, 4, 7);
INSERT INTO `p39_member_price` VALUES (333.00, 2, 2);
INSERT INTO `p39_member_price` VALUES (444.00, 4, 2);

-- ----------------------------
-- Table structure for p39_order
-- ----------------------------
DROP TABLE IF EXISTS `p39_order`;
CREATE TABLE `p39_order`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `member_id` mediumint(8) UNSIGNED NOT NULL COMMENT '会员Id',
  `addtime` int(10) UNSIGNED NOT NULL COMMENT '下单时间',
  `pay_status` enum('是','否') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '否' COMMENT '支付状态',
  `pay_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '支付时间',
  `total_price` decimal(10, 2) NOT NULL COMMENT '定单总价',
  `shr_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '收货人姓名',
  `shr_tel` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '收货人电话',
  `shr_province` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '收货人省',
  `shr_city` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '收货人城市',
  `shr_area` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '收货人地区',
  `shr_address` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '收货人详细地址',
  `post_status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '发货状态,0:未发货,1:已发货2:已收到货',
  `post_number` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '快递号',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `member_id`(`member_id`) USING BTREE,
  INDEX `addtime`(`addtime`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '定单基本信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for p39_order_goods
-- ----------------------------
DROP TABLE IF EXISTS `p39_order_goods`;
CREATE TABLE `p39_order_goods`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `order_id` mediumint(8) UNSIGNED NOT NULL COMMENT '定单Id',
  `goods_id` mediumint(8) UNSIGNED NOT NULL COMMENT '商品Id',
  `goods_attr_id` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商品属性id',
  `goods_number` mediumint(8) UNSIGNED NOT NULL COMMENT '购买的数量',
  `price` decimal(10, 2) NOT NULL COMMENT '购买的价格',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `order_id`(`order_id`) USING BTREE,
  INDEX `goods_id`(`goods_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '定单商品表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_order_goods
-- ----------------------------
INSERT INTO `p39_order_goods` VALUES (2, 2, 7, '2,6', 7, 95.00);
INSERT INTO `p39_order_goods` VALUES (3, 2, 7, '3,5', 4, 95.00);
INSERT INTO `p39_order_goods` VALUES (4, 2, 7, '1,5', 4, 95.00);
INSERT INTO `p39_order_goods` VALUES (5, 2, 7, '3,6', 4, 95.00);
INSERT INTO `p39_order_goods` VALUES (6, 2, 3, '', 4, 222.00);
INSERT INTO `p39_order_goods` VALUES (7, 2, 4, '', 2, 333.00);
INSERT INTO `p39_order_goods` VALUES (8, 3, 4, '', 1, 333.00);

-- ----------------------------
-- Table structure for p39_privilege
-- ----------------------------
DROP TABLE IF EXISTS `p39_privilege`;
CREATE TABLE `p39_privilege`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `pri_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '权限名称',
  `module_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '模块名称',
  `controller_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '控制器名称',
  `action_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '方法名称',
  `parent_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '上级权限Id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '权限' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_privilege
-- ----------------------------
INSERT INTO `p39_privilege` VALUES (1, '商品模块', '', '', '', 0);
INSERT INTO `p39_privilege` VALUES (2, '商品列表', 'Admin', 'Goods', 'lst', 1);
INSERT INTO `p39_privilege` VALUES (3, '添加商品', 'Admin', 'Goods', 'add', 2);
INSERT INTO `p39_privilege` VALUES (4, '修改商品', 'Admin', 'Goods', 'edit', 2);
INSERT INTO `p39_privilege` VALUES (5, '删除商品', 'Admin', 'Goods', 'delete', 2);
INSERT INTO `p39_privilege` VALUES (6, '分类列表', 'Admin', 'Category', 'lst', 1);
INSERT INTO `p39_privilege` VALUES (7, '添加分类', 'Admin', 'Category', 'add', 6);
INSERT INTO `p39_privilege` VALUES (8, '修改分类', 'Admin', 'Category', 'edit', 6);
INSERT INTO `p39_privilege` VALUES (9, '删除分类', 'Admin', 'Category', 'delete', 6);
INSERT INTO `p39_privilege` VALUES (10, 'RBAC', '', '', '', 0);
INSERT INTO `p39_privilege` VALUES (11, '权限列表', 'Admin', 'Privilege', 'lst', 10);
INSERT INTO `p39_privilege` VALUES (12, '添加权限', 'Privilege', 'Admin', 'add', 11);
INSERT INTO `p39_privilege` VALUES (13, '修改权限', 'Admin', 'Privilege', 'edit', 11);
INSERT INTO `p39_privilege` VALUES (14, '删除权限', 'Admin', 'Privilege', 'delete', 11);
INSERT INTO `p39_privilege` VALUES (15, '角色列表', 'Admin', 'Role', 'lst', 10);
INSERT INTO `p39_privilege` VALUES (16, '添加角色', 'Admin', 'Role', 'add', 15);
INSERT INTO `p39_privilege` VALUES (17, '修改角色', 'Admin', 'Role', 'edit', 15);
INSERT INTO `p39_privilege` VALUES (18, '删除角色', 'Admin', 'Role', 'delete', 15);
INSERT INTO `p39_privilege` VALUES (19, '管理员列表', 'Admin', 'Admin', 'lst', 10);
INSERT INTO `p39_privilege` VALUES (20, '添加管理员', 'Admin', 'Admin', 'add', 19);
INSERT INTO `p39_privilege` VALUES (21, '修改管理员', 'Admin', 'Admin', 'edit', 19);
INSERT INTO `p39_privilege` VALUES (22, '删除管理员', 'Admin', 'Admin', 'delete', 19);
INSERT INTO `p39_privilege` VALUES (23, '类型列表', 'Admin', 'Type', 'lst', 1);
INSERT INTO `p39_privilege` VALUES (24, '添加类型', 'Admin', 'Type', 'add', 23);
INSERT INTO `p39_privilege` VALUES (25, '修改类型', 'Admin', 'Type', 'edit', 23);
INSERT INTO `p39_privilege` VALUES (26, '删除类型', 'Admin', 'Type', 'delete', 23);
INSERT INTO `p39_privilege` VALUES (27, '属性列表', 'Admin', 'Attribute', 'lst', 23);
INSERT INTO `p39_privilege` VALUES (28, '添加属性', 'Admin', 'Attribute', 'add', 27);
INSERT INTO `p39_privilege` VALUES (29, '修改属性', 'Admin', 'Attribute', 'edit', 27);
INSERT INTO `p39_privilege` VALUES (30, '删除属性', 'Admin', 'Attribute', 'delete', 27);
INSERT INTO `p39_privilege` VALUES (31, 'ajax删除商品属性', 'Admin', 'Goods', 'ajaxDelGoodsAttr', 4);
INSERT INTO `p39_privilege` VALUES (32, 'ajax删除商品相册图片', 'Admin', 'Goods', 'ajaxDelImage', 4);
INSERT INTO `p39_privilege` VALUES (33, '会员管理', '', '', '', 0);
INSERT INTO `p39_privilege` VALUES (34, '会员级别列表', 'Admin', 'MemberLevel', 'lst', 33);
INSERT INTO `p39_privilege` VALUES (35, '添加会员级别', 'Admin', 'MemberLevel', 'add', 34);
INSERT INTO `p39_privilege` VALUES (36, '修改会员级别', 'Admin', 'MemberLevel', 'edit', 34);
INSERT INTO `p39_privilege` VALUES (37, '删除会员级别', 'Admin', 'MemberLevel', 'delete', 34);
INSERT INTO `p39_privilege` VALUES (38, '品牌列表', 'Admin', 'Brand', 'lst', 1);

-- ----------------------------
-- Table structure for p39_role
-- ----------------------------
DROP TABLE IF EXISTS `p39_role`;
CREATE TABLE `p39_role`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `role_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '角色' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_role
-- ----------------------------
INSERT INTO `p39_role` VALUES (1, '商品模块管理员');
INSERT INTO `p39_role` VALUES (2, 'RBAC管理员');

-- ----------------------------
-- Table structure for p39_role_pri
-- ----------------------------
DROP TABLE IF EXISTS `p39_role_pri`;
CREATE TABLE `p39_role_pri`  (
  `pri_id` mediumint(8) UNSIGNED NOT NULL COMMENT '权限id',
  `role_id` mediumint(8) UNSIGNED NOT NULL COMMENT '角色id',
  INDEX `pri_id`(`pri_id`) USING BTREE,
  INDEX `role_id`(`role_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '角色权限' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of p39_role_pri
-- ----------------------------
INSERT INTO `p39_role_pri` VALUES (10, 2);
INSERT INTO `p39_role_pri` VALUES (11, 2);
INSERT INTO `p39_role_pri` VALUES (12, 2);
INSERT INTO `p39_role_pri` VALUES (13, 2);
INSERT INTO `p39_role_pri` VALUES (14, 2);
INSERT INTO `p39_role_pri` VALUES (15, 2);
INSERT INTO `p39_role_pri` VALUES (16, 2);
INSERT INTO `p39_role_pri` VALUES (17, 2);
INSERT INTO `p39_role_pri` VALUES (18, 2);
INSERT INTO `p39_role_pri` VALUES (19, 2);
INSERT INTO `p39_role_pri` VALUES (20, 2);
INSERT INTO `p39_role_pri` VALUES (21, 2);
INSERT INTO `p39_role_pri` VALUES (22, 2);
INSERT INTO `p39_role_pri` VALUES (1, 1);
INSERT INTO `p39_role_pri` VALUES (2, 1);
INSERT INTO `p39_role_pri` VALUES (3, 1);
INSERT INTO `p39_role_pri` VALUES (4, 1);
INSERT INTO `p39_role_pri` VALUES (31, 1);
INSERT INTO `p39_role_pri` VALUES (32, 1);
INSERT INTO `p39_role_pri` VALUES (5, 1);
INSERT INTO `p39_role_pri` VALUES (6, 1);
INSERT INTO `p39_role_pri` VALUES (7, 1);
INSERT INTO `p39_role_pri` VALUES (8, 1);
INSERT INTO `p39_role_pri` VALUES (9, 1);
INSERT INTO `p39_role_pri` VALUES (23, 1);
INSERT INTO `p39_role_pri` VALUES (24, 1);
INSERT INTO `p39_role_pri` VALUES (25, 1);
INSERT INTO `p39_role_pri` VALUES (26, 1);
INSERT INTO `p39_role_pri` VALUES (27, 1);
INSERT INTO `p39_role_pri` VALUES (28, 1);
INSERT INTO `p39_role_pri` VALUES (29, 1);
INSERT INTO `p39_role_pri` VALUES (30, 1);
INSERT INTO `p39_role_pri` VALUES (38, 1);
INSERT INTO `p39_role_pri` VALUES (10, 1);
INSERT INTO `p39_role_pri` VALUES (11, 1);
INSERT INTO `p39_role_pri` VALUES (12, 1);
INSERT INTO `p39_role_pri` VALUES (13, 1);
INSERT INTO `p39_role_pri` VALUES (14, 1);
INSERT INTO `p39_role_pri` VALUES (15, 1);
INSERT INTO `p39_role_pri` VALUES (16, 1);
INSERT INTO `p39_role_pri` VALUES (17, 1);
INSERT INTO `p39_role_pri` VALUES (18, 1);
INSERT INTO `p39_role_pri` VALUES (19, 1);
INSERT INTO `p39_role_pri` VALUES (20, 1);
INSERT INTO `p39_role_pri` VALUES (21, 1);
INSERT INTO `p39_role_pri` VALUES (22, 1);

-- ----------------------------
-- Table structure for p39_type
-- ----------------------------
DROP TABLE IF EXISTS `p39_type`;
CREATE TABLE `p39_type`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `type_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '类型名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '类型' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for p39_yinxiang
-- ----------------------------
DROP TABLE IF EXISTS `p39_yinxiang`;
CREATE TABLE `p39_yinxiang`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `goods_id` mediumint(8) UNSIGNED NOT NULL COMMENT '商品Id',
  `yx_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '印象名称',
  `yx_count` smallint(5) UNSIGNED NOT NULL DEFAULT 1 COMMENT '印象的次数',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `goods_id`(`goods_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '印象' ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
