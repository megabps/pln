/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : dbphp

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-09-20 21:06:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for modal
-- ----------------------------
DROP TABLE IF EXISTS `modal`;
CREATE TABLE `modal` (
  `modal_id` int(11) NOT NULL AUTO_INCREMENT,
  `modal_name` varchar(255) DEFAULT NULL,
  `description` text,
  `date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`modal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modal
-- ----------------------------
INSERT INTO `modal` VALUES ('13', 'Modal Bootsrap', 'Crud Menggunkan modal bootstrap', '2016-09-20 20:25:41');
INSERT INTO `modal` VALUES ('15', 'adas', 'adas', '2016-09-20 20:47:04');
SET FOREIGN_KEY_CHECKS=1;
