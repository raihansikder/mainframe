/*
 Navicat Premium Data Transfer

 Source Server         : __LOCALHOST_MariaDB
 Source Server Type    : MariaDB
 Source Server Version : 100313
 Source Host           : localhost:33062
 Source Schema         : mainframe

 Target Server Type    : MariaDB
 Target Server Version : 100313
 File Encoding         : 65001

 Date: 20/01/2020 02:00:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for audits
-- ----------------------------
DROP TABLE IF EXISTS `audits`;
CREATE TABLE `audits`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `new_values` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` varchar(1023) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `audits_auditable_type_auditable_id_index`(`auditable_type`, `auditable_id`) USING BTREE,
  INDEX `audits_user_id_user_type_index`(`user_id`, `user_type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 104 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of audits
-- ----------------------------
INSERT INTO `audits` VALUES (1, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Settings\\Setting', 6, '{\"value\":\"asdfasdf\"}', '{\"value\":\"asdfasdf asdfasdf\"}', 'http://localhost:8081/mainframe/public/settings/6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-07 13:12:40', '2020-01-07 13:12:40');
INSERT INTO `audits` VALUES (2, 'App\\User', 1, 'deleted', 'App\\Mainframe\\Modules\\Settings\\Setting', 6, '{\"id\":6,\"uuid\":\"f05d80a3-9f0d-4f29-982c-331c4f1a4c38\",\"name\":\"ipad-landscape-help-steps\",\"title\":\"ipad Landscape Help Steps asdf\",\"type\":\"file\",\"description\":\"ipad landscape Helps slides for screen size.\",\"value\":\"asdfasdf asdfasdf\",\"is_active\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}', '[]', 'http://localhost:8081/mainframe/public/settings/6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-07 13:13:02', '2020-01-07 13:13:02');
INSERT INTO `audits` VALUES (3, 'App\\User', 1, 'created', 'App\\Mainframe\\Modules\\Settings\\Setting', 46, '[]', '{\"uuid\":\"b3e8cd01-50e6-4eba-975a-357b2b9d35ba\",\"name\":\"sdfsdfsdf\",\"title\":\"sdgfsdfgsdfg\",\"type\":\"string\",\"value\":\"sdfgdfg\",\"description\":null,\"is_active\":\"1\",\"created_by\":1,\"updated_by\":1,\"id\":46}', 'http://localhost:8081/mainframe/public/settings', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-07 13:13:26', '2020-01-07 13:13:26');
INSERT INTO `audits` VALUES (4, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Settings\\Setting', 46, '{\"value\":\"sdfgdfg\"}', '{\"value\":\"sdfgdfgdfgsdfg\"}', 'http://localhost:8081/mainframe/public/settings/46', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-07 13:39:49', '2020-01-07 13:39:49');
INSERT INTO `audits` VALUES (5, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Groups\\Group', 20, '{\"permissions\":\"\"}', '{\"permissions\":\"{\\\"modules\\\":1,\\\"modules-view-list\\\":1,\\\"modules-view-details\\\":1,\\\"modules-create\\\":1,\\\"modules-edit\\\":1,\\\"modules-delete\\\":1,\\\"modules-restore\\\":1,\\\"modules-change-logs\\\":1,\\\"modules-report\\\":1}\"}', 'http://localhost:8081/mainframe/public/groups/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-08 09:17:05', '2020-01-08 09:17:05');
INSERT INTO `audits` VALUES (6, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Groups\\Group', 20, '{\"permissions\":\"{\\\"modules\\\":1,\\\"modules-view-list\\\":1,\\\"modules-view-details\\\":1,\\\"modules-create\\\":1,\\\"modules-edit\\\":1,\\\"modules-delete\\\":1,\\\"modules-restore\\\":1,\\\"modules-change-logs\\\":1,\\\"modules-report\\\":1}\"}', '{\"permissions\":\"{\\\"modules\\\":1,\\\"modules-view-list\\\":1,\\\"modules-view-details\\\":1,\\\"modules-create\\\":1,\\\"modules-edit\\\":1,\\\"modules-delete\\\":1,\\\"modules-restore\\\":1,\\\"modules-change-logs\\\":1,\\\"modules-report\\\":1,\\\"apis\\\":1,\\\"api\\\":1}\"}', 'http://localhost:8081/mainframe/public/groups/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-08 10:00:32', '2020-01-08 10:00:32');
INSERT INTO `audits` VALUES (7, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Groups\\Group', 20, '{\"permissions\":\"{\\\"modules\\\":1,\\\"modules-view-list\\\":1,\\\"modules-view-details\\\":1,\\\"modules-create\\\":1,\\\"modules-edit\\\":1,\\\"modules-delete\\\":1,\\\"modules-restore\\\":1,\\\"modules-change-logs\\\":1,\\\"modules-report\\\":1,\\\"apis\\\":1,\\\"api\\\":1}\"}', '{\"permissions\":\"{\\\"widgets\\\":1,\\\"view-widgets\\\":1}\"}', 'http://localhost:8081/mainframe/public/groups/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-08 10:16:46', '2020-01-08 10:16:46');
INSERT INTO `audits` VALUES (8, 'App\\User', 1, 'created', 'App\\Mainframe\\Modules\\Groups\\Group', 25, '[]', '{\"uuid\":\"c998e022-4885-4585-a850-3d2f1afbdccd\",\"name\":\"test-group\",\"is_active\":\"1\",\"created_by\":1,\"updated_by\":1,\"permissions\":\"\",\"id\":25}', 'http://localhost:8081/mainframe/public/groups', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-08 10:36:31', '2020-01-08 10:36:31');
INSERT INTO `audits` VALUES (9, 'App\\User', 1, 'updated', 'App\\User', 999, '{\"created_by\":null,\"updated_by\":null,\"first_name\":null,\"last_name\":null,\"full_name\":null,\"group_ids\":\"[\\\"15\\\"]\",\"is_test\":null}', '{\"created_by\":1,\"updated_by\":1,\"first_name\":\"Dote\",\"last_name\":\"Test\",\"full_name\":\"Dote Test\",\"group_ids\":\"[\\\"12\\\"]\",\"is_test\":0}', 'http://localhost:8081/mainframe/public/users/999', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-08 11:41:23', '2020-01-08 11:41:23');
INSERT INTO `audits` VALUES (10, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Groups\\Group', 25, '{\"permissions\":\"\"}', '{\"permissions\":\"{\\\"settings\\\":1,\\\"settings-view-any\\\":1,\\\"settings-view\\\":1,\\\"settings-create\\\":1,\\\"settings-update\\\":1,\\\"settings-delete\\\":1,\\\"settings-view-change-log\\\":1,\\\"settings-view-report\\\":1}\"}', 'http://localhost:8081/mainframe/public/groups/25', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-08 11:48:14', '2020-01-08 11:48:14');
INSERT INTO `audits` VALUES (11, 'App\\User', 1, 'updated', 'App\\User', 999, '{\"group_ids\":\"[\\\"12\\\"]\"}', '{\"group_ids\":null}', 'http://localhost:8081/mainframe/public/users/999', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-08 11:56:12', '2020-01-08 11:56:12');
INSERT INTO `audits` VALUES (12, 'App\\User', 1, 'updated', 'App\\User', 999, '{\"group_ids\":\"\"}', '{\"group_ids\":null}', 'http://localhost:8081/mainframe/public/users/999', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-08 11:57:07', '2020-01-08 11:57:07');
INSERT INTO `audits` VALUES (13, 'App\\User', 1, 'updated', 'App\\User', 999, '{\"group_ids\":null}', '{\"group_ids\":\"[\\\"25\\\"]\"}', 'http://localhost:8081/mainframe/public/users/999', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-08 13:11:18', '2020-01-08 13:11:18');
INSERT INTO `audits` VALUES (14, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Groups\\Group', 25, '{\"permissions\":\"{\\\"settings\\\":1,\\\"settings-view-any\\\":1,\\\"settings-view\\\":1,\\\"settings-create\\\":1,\\\"settings-update\\\":1,\\\"settings-delete\\\":1,\\\"settings-view-change-log\\\":1,\\\"settings-view-report\\\":1}\"}', '{\"permissions\":\"{\\\"settings\\\":1,\\\"settings-view\\\":1,\\\"settings-create\\\":1,\\\"settings-update\\\":1,\\\"settings-delete\\\":1,\\\"settings-view-change-log\\\":1,\\\"settings-view-report\\\":1}\"}', 'http://localhost:8081/mainframe/public/groups/25', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-08 13:26:17', '2020-01-08 13:26:17');
INSERT INTO `audits` VALUES (15, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Groups\\Group', 25, '{\"permissions\":\"{\\\"settings\\\":1,\\\"settings-view\\\":1,\\\"settings-create\\\":1,\\\"settings-update\\\":1,\\\"settings-delete\\\":1,\\\"settings-view-change-log\\\":1,\\\"settings-view-report\\\":1}\"}', '{\"permissions\":\"{\\\"settings\\\":1,\\\"settings-view\\\":1,\\\"settings-create\\\":1,\\\"settings-update\\\":1,\\\"settings-delete\\\":1,\\\"settings-view-change-log\\\":1,\\\"settings-view-report\\\":1,\\\"settings-view-any\\\":1}\"}', 'http://localhost:8081/mainframe/public/groups/25', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-08 13:26:30', '2020-01-08 13:26:30');
INSERT INTO `audits` VALUES (16, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Settings\\Setting', 2, '{\"value\":\"1.2.0\"}', '{\"value\":\"1.2.0 asdf\"}', 'http://localhost:8081/mainframe/public/settings/2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-08 15:20:24', '2020-01-08 15:20:24');
INSERT INTO `audits` VALUES (17, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"uNVpgMtiaQDbGzNpST15O4yjRTQlcYRmKbdqjcupBdNHd1qmG2gF7d794lko\"}', '{\"remember_token\":\"nIehdmE76nquYhQwFskboKNTQOzzvDUEM91tSrfJMrfaQrkGXFm4i7GHoj1C\"}', 'http://localhost:8081/mainframe/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-08 16:17:13', '2020-01-08 16:17:13');
INSERT INTO `audits` VALUES (18, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"nIehdmE76nquYhQwFskboKNTQOzzvDUEM91tSrfJMrfaQrkGXFm4i7GHoj1C\"}', '{\"remember_token\":\"6zlCYrxfk4hAJvqxPwMXjvDk3wcztxd2REXiHevn8xSuLAvVkclVHV2fnyuJ\"}', 'http://localhost:8081/mainframe/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-10 05:13:14', '2020-01-10 05:13:14');
INSERT INTO `audits` VALUES (19, 'App\\User', 1, 'created', 'App\\Mainframe\\Modules\\LoremIpsums\\LoremIpsum', 3, '[]', '{\"uuid\":\"094dec8f-ff59-4d02-9536-63597f744ea1\",\"hidden\":null,\"name\":\"test\",\"tags\":null,\"textarea\":null,\"textarea_ckeditor\":null,\"select_array\":null,\"dolor_sit_id\":\"3\",\"parent_id\":null,\"checkbox\":\"0\",\"is_active\":\"0\",\"created_by\":1,\"updated_by\":1,\"id\":3}', 'http://localhost:8081/mainframe/public/lorem-ipsums', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-12 05:17:54', '2020-01-12 05:17:54');
INSERT INTO `audits` VALUES (20, 'App\\User', 1, 'deleted', 'App\\Mainframe\\Modules\\LoremIpsums\\LoremIpsum', 16, '{\"id\":16,\"uuid\":\"9a6e4812-cf83-4333-b8f0-8c66630200d0\",\"project_id\":null,\"tenant_id\":null,\"name\":\"phpunit-test-202001120546\",\"hidden\":null,\"textarea\":null,\"textarea_ckeditor\":null,\"tags\":null,\"text\":null,\"select_array\":null,\"select_array_multiple\":null,\"dolor_sit_id\":null,\"dolor_sit_ids\":null,\"parent_id\":null,\"checkbox\":null,\"is_active\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}', '[]', 'http://localhost:8081/mainframe/public/lorem-ipsums/16', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-12 05:47:30', '2020-01-12 05:47:30');
INSERT INTO `audits` VALUES (21, 'App\\User', 1, 'deleted', 'App\\Mainframe\\Modules\\LoremIpsums\\LoremIpsum', 2, '{\"id\":2,\"uuid\":\"175da4d1-e448-4e27-a642-4da5179ec5c6\",\"project_id\":1,\"tenant_id\":1,\"name\":\"ainw bNW\",\"hidden\":null,\"textarea\":\"asdfasdf\",\"textarea_ckeditor\":\"asdfasdfsdf asdfasdf\",\"tags\":\"Country,takes,lorem\",\"text\":null,\"select_array\":null,\"select_array_multiple\":\"[\\\"0\\\",\\\"1\\\"]\",\"dolor_sit_id\":1,\"dolor_sit_ids\":\"[\\\"1\\\"]\",\"parent_id\":2,\"checkbox\":0,\"is_active\":1,\"created_by\":5,\"updated_by\":5,\"deleted_by\":null}', '[]', 'http://localhost:8081/mainframe/public/lorem-ipsums/2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-12 06:53:31', '2020-01-12 06:53:31');
INSERT INTO `audits` VALUES (22, 'App\\User', 1, 'deleted', 'App\\Mainframe\\Modules\\LoremIpsums\\LoremIpsum', 2, '{\"id\":2,\"uuid\":\"175da4d1-e448-4e27-a642-4da5179ec5c6\",\"project_id\":1,\"tenant_id\":1,\"name\":\"ainw bNW\",\"hidden\":null,\"textarea\":\"asdfasdf\",\"textarea_ckeditor\":\"asdfasdfsdf asdfasdf\",\"tags\":\"Country,takes,lorem\",\"text\":null,\"select_array\":null,\"select_array_multiple\":\"[\\\"0\\\",\\\"1\\\"]\",\"dolor_sit_id\":1,\"dolor_sit_ids\":\"[\\\"1\\\"]\",\"parent_id\":2,\"checkbox\":0,\"is_active\":1,\"created_by\":5,\"updated_by\":5,\"deleted_by\":null}', '[]', 'http://localhost:8081/mainframe/public/lorem-ipsums/2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-12 08:39:58', '2020-01-12 08:39:58');
INSERT INTO `audits` VALUES (23, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Groups\\Group', 2, '{\"permissions\":\"{\\\"modules\\\":1,\\\"modules-view-list\\\":1,\\\"modules-view-details\\\":1,\\\"modules-create\\\":1,\\\"modules-edit\\\":1,\\\"modules-delete\\\":1,\\\"modules-restore\\\":1,\\\"modules-change-logs\\\":1,\\\"modules-report\\\":1,\\\"module-groups\\\":1,\\\"module-groups-view-list\\\":1,\\\"module-groups-view-details\\\":1,\\\"module-groups-create\\\":1,\\\"module-groups-edit\\\":1,\\\"module-groups-delete\\\":1,\\\"module-groups-restore\\\":1,\\\"module-groups-change-logs\\\":1,\\\"module-groups-report\\\":1,\\\"Widget\\\":1,\\\"API\\\":1}\"}', '{\"permissions\":\"{\\\"modules\\\":1,\\\"modules-create\\\":1,\\\"modules-delete\\\":1,\\\"module-groups\\\":1,\\\"module-groups-create\\\":1,\\\"module-groups-delete\\\":1,\\\"apis\\\":1,\\\"api\\\":1}\"}', 'http://localhost:8081/mainframe/public/groups/2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-12 09:21:37', '2020-01-12 09:21:37');
INSERT INTO `audits` VALUES (24, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Groups\\Group', 2, '{\"permissions\":\"{\\\"modules\\\":1,\\\"modules-create\\\":1,\\\"modules-delete\\\":1,\\\"module-groups\\\":1,\\\"module-groups-create\\\":1,\\\"module-groups-delete\\\":1,\\\"apis\\\":1,\\\"api\\\":1}\"}', '{\"permissions\":\"{\\\"apis\\\":1,\\\"api\\\":1,\\\"superuser\\\":1}\"}', 'http://localhost:8081/mainframe/public/groups/2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-12 09:22:14', '2020-01-12 09:22:14');
INSERT INTO `audits` VALUES (25, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Groups\\Group', 2, '{\"permissions\":\"{\\\"apis\\\":1,\\\"api\\\":1,\\\"superuser\\\":1}\"}', '{\"permissions\":\"{\\\"apis\\\":1,\\\"superuser\\\":1,\\\"make-api-call\\\":1}\"}', 'http://localhost:8081/mainframe/public/groups/2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-12 10:52:21', '2020-01-12 10:52:21');
INSERT INTO `audits` VALUES (26, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\LoremIpsums\\LoremIpsum', 1, '{\"textarea\":\"Prior to proceeding with the enforcement of new rules and regulations , it was good if authorities concerned would have been taken of such possible unruly anarchies of the transport workers .\"}', '{\"textarea\":\"Prior to proceeding with the enforcement of new rules and regulations , it was good if authorities concerned would have been taken of such possible unruly anarchies of the transport workers . asdfasdf\"}', 'http://localhost:8081/mainframe/public/lorem-ipsums/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-12 13:19:20', '2020-01-12 13:19:20');
INSERT INTO `audits` VALUES (27, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\LoremIpsums\\LoremIpsum', 1, '{\"select_array_multiple\":\"[\\\"0\\\"]\",\"dolor_sit_ids\":null}', '{\"select_array_multiple\":\"[\\\"0\\\",\\\"2\\\"]\",\"dolor_sit_ids\":\"[\\\"3\\\",\\\"1\\\"]\"}', 'http://localhost:8081/mainframe/public/lorem-ipsums/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-12 13:33:04', '2020-01-12 13:33:04');
INSERT INTO `audits` VALUES (28, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Settings\\Setting', 46, '{\"description\":null,\"value\":\"sdfgdfgdfgsdfg\"}', '{\"description\":\"asdfasdfsadf\",\"value\":\"sdfgdfgdfgsdfg sdfasdf\"}', 'http://localhost:8081/mainframe/public/settings/46', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-12 13:34:32', '2020-01-12 13:34:32');
INSERT INTO `audits` VALUES (29, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\LoremIpsums\\LoremIpsum', 1, '{\"textarea\":\"Prior to proceeding with the enforcement of new rules and regulations , it was good if authorities concerned would have been taken of such possible unruly anarchies of the transport workers . asdfasdf\",\"textarea_ckeditor\":null,\"tags\":null}', '{\"textarea\":\"Prior to proceeding with the enforcement of new rules and regulations , it was good if authorities concerned would have been taken of such possible unruly anarchies of the transport workers . asdfasdf sdfgsdfg sdfg\",\"textarea_ckeditor\":\"sdfgssdfgsdfgdfsg\",\"tags\":\"Roads\"}', 'http://localhost:8081/mainframe/public/lorem-ipsums/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', NULL, '2020-01-12 13:35:30', '2020-01-12 13:35:30');
INSERT INTO `audits` VALUES (30, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 1, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Modules\\\\ModulePolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Modules\\\\ModuleProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (31, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 2, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\ModuleGroups\\\\ModuleGroupPolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\ModuleGroups\\\\ModuleGroupProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (32, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 3, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Tenants\\\\TenantPolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Tenants\\\\TenantProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (33, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 4, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Users\\\\UserPolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Users\\\\UserProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (34, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 5, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Groups\\\\GroupPolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Groups\\\\GroupProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (35, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 6, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Uploads\\\\UploadPolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Uploads\\\\UploadProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (36, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 21, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Settings\\\\SettingPolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Settings\\\\SettingProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (37, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 23, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Reports\\\\ReportPolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Reports\\\\ReportProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (38, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 50, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\LoremIpsums\\\\LoremIpsumPolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\LoremIpsums\\\\LoremIpsumProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (39, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 51, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\DolorSits\\\\DolorSitPolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\DolorSits\\\\DolorSitProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (40, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 52, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Subscriptions\\\\SubscriptionPolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Subscriptions\\\\SubscriptionProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (41, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 53, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Packages\\\\PackagePolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Packages\\\\PackageProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (42, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 54, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Countries\\\\CountryPolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Countries\\\\CountryProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (43, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 55, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Notifications\\\\NotificationPolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Notifications\\\\NotificationProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (44, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 56, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\ProductThemes\\\\ProductThemePolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\ProductThemes\\\\ProductThemeProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (45, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 57, '{\"policy\":null,\"processor\":null}', '{\"policy\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Projects\\\\ProjectPolicy\",\"processor\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Projects\\\\ProjectProcessor\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 05:11:38', '2020-01-16 05:11:38');
INSERT INTO `audits` VALUES (46, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 1, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Modules\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (47, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 2, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\ModuleGroups\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (48, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 3, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Tenants\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (49, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 4, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Users\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (50, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 5, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Groups\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (51, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 6, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Uploads\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (52, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 21, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Settings\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (53, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 23, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Reports\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (54, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 50, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\LoremIpsums\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (55, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 51, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\DolorSits\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (56, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 52, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Subscriptions\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (57, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 53, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Packages\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (58, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 54, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Countries\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (59, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 55, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Notifications\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (60, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 56, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\ProductThemes\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (61, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 57, '{\"namespace\":null}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Projects\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-16 06:01:43', '2020-01-16 06:01:43');
INSERT INTO `audits` VALUES (62, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"40RN4t8LKUHDXJurdeUfHQOxbJhUR7Jv1kGyEn6tSyjaWQ6oRE1VsQ3mjwtL\"}', '{\"remember_token\":\"ANalQuuhQsnekgSoRMnyLH0OoEieVEfSancJYhGQprooHcXvHHJrSQ8Pfbpa\"}', 'http://localhost:8081/mainframe/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 07:31:41', '2020-01-18 07:31:41');
INSERT INTO `audits` VALUES (63, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"s6tHB2ZDbOkhAb41I3KCNHu6bgBYgCXRRNwKDPiGgLSBzjLwa1CP48lpbVxk\"}', '{\"remember_token\":\"juzBNH77SiVC4qtBb1cEaDk5JQhonWMiu4aVVYT8Ad72WQzaGnNOwkxBqn4u\"}', 'http://localhost:8081/mainframe/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 07:51:17', '2020-01-18 07:51:17');
INSERT INTO `audits` VALUES (64, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"Q423TxRK30eceINdQhICRtfMfiUfIZuNXV3NPSCLnjDTBbGnPi1g11g37WcQ\"}', '{\"remember_token\":\"dMsyt6kN4LMDDDNv6j6I7w5VKjyHHRJ8yVsZDobwU9UcxPGZhAQmQwsTdlL9\"}', 'http://localhost:8081/mainframe/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 10:20:27', '2020-01-18 10:20:27');
INSERT INTO `audits` VALUES (65, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"y5n0jvIugjVYxTybWJM9kO3Oy4Hunl9zAvWKMaaCLEDFyIaHgh1ug3W0Xrwb\"}', '{\"remember_token\":\"u7cbCJwZ27gE10s4p2Hdp0aR0OF8w0fRxtYAm4f6ZCTHBaik8nC1KhHwixnH\"}', 'http://localhost:8081/mainframe/public/logout', '127.0.0.1', 'PostmanRuntime/7.21.0', NULL, '2020-01-18 11:01:55', '2020-01-18 11:01:55');
INSERT INTO `audits` VALUES (66, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"u7cbCJwZ27gE10s4p2Hdp0aR0OF8w0fRxtYAm4f6ZCTHBaik8nC1KhHwixnH\"}', '{\"remember_token\":\"2MgPTalYfb3tIqc25sv0tPV4IsK9fPbVzP4W74H1teLiSvTKIs3NuJ7XJYKV\"}', 'http://localhost:8081/mainframe/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 11:12:05', '2020-01-18 11:12:05');
INSERT INTO `audits` VALUES (67, NULL, NULL, 'created', 'App\\Mainframe\\Modules\\Users\\User', 2627, '[]', '{\"first_name\":null,\"last_name\":null,\"name\":\" \",\"email\":\"caqon@mailinator.net\",\"password\":\"$2y$10$ijbN5B0M74mOXV.vxLFVnOQ7CPmpPKNtyXBzoWtU65bRJEeq57IvO\",\"group_ids\":\"[\\\"26\\\"]\",\"uuid\":\"e0471264-c8cd-4855-a20e-28965cda3b70\",\"created_by\":null,\"updated_by\":null,\"id\":2627}', 'http://localhost:8081/mainframe/public/register', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 15:00:26', '2020-01-18 15:00:26');
INSERT INTO `audits` VALUES (68, 'App\\User', 2627, 'updated', 'App\\User', 2627, '{\"remember_token\":null,\"created_by\":null,\"updated_by\":null}', '{\"remember_token\":\"kfJghO48gRZYzGF8ZneofpzuaLR3xOQ5OZKCXpl12CEIKjVVADkYdNc212iY\",\"created_by\":2627,\"updated_by\":2627}', 'http://localhost:8081/mainframe/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 15:01:51', '2020-01-18 15:01:51');
INSERT INTO `audits` VALUES (69, 'App\\User', 2627, 'updated', 'App\\User', 2627, '{\"email_verified_at\":null}', '{\"email_verified_at\":\"2020-01-18T15:01:51.794049Z\"}', 'http://localhost:8081/mainframe/public/email/verify/2627/39bbeab86143a73d56253edf47ff250ad610129d?expires=1579363226&signature=499563acbd1fddc1294e6c471179d7620b110aa7d8b3d5c6c6ffebd78bf383d3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 15:01:51', '2020-01-18 15:01:51');
INSERT INTO `audits` VALUES (70, 'App\\User', 2627, 'updated', 'App\\User', 2627, '{\"remember_token\":\"kfJghO48gRZYzGF8ZneofpzuaLR3xOQ5OZKCXpl12CEIKjVVADkYdNc212iY\"}', '{\"remember_token\":\"tMMgb17Pmt2OOYVf0KYZ4Kf1eQYOYYC64tFTYVD0S92dt3DAqWwhcucfJgzA\"}', 'http://localhost:8081/mainframe/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 15:13:08', '2020-01-18 15:13:08');
INSERT INTO `audits` VALUES (71, NULL, NULL, 'created', 'App\\Mainframe\\Modules\\Users\\User', 2628, '[]', '{\"first_name\":\"Wang\",\"last_name\":\"Young\",\"name\":\"Wang Young\",\"email\":\"cujiberaf@mailinator.net\",\"password\":\"$2y$10$Ycu7HdTxwo\\/pO5F9MSwfAuwPreO89oiJ5Hz\\/8T8jdO96ScLyvFUtW\",\"group_ids\":\"[\\\"26\\\"]\",\"uuid\":\"967675ba-438c-4235-89ba-88d664e9ea15\",\"created_by\":null,\"updated_by\":null,\"id\":2628}', 'http://localhost:8081/mainframe/public/register', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 15:31:13', '2020-01-18 15:31:13');
INSERT INTO `audits` VALUES (72, NULL, NULL, 'created', 'App\\Mainframe\\Modules\\Users\\User', 2634, '[]', '{\"first_name\":\"Tarik\",\"last_name\":\"Sawyer\",\"name\":\"Tarik Sawyer\",\"email\":\"xiqoky@mailinator.net\",\"password\":\"$2y$10$gj4Ltp4kEuvgk51xx1FmOubZdqD6prbpNvF33SNp35EeW8K61c8pi\",\"group_ids\":\"[\\\"26\\\"]\",\"uuid\":\"a286c011-b56b-46ee-857e-3a5d966326c1\",\"created_by\":null,\"updated_by\":null,\"id\":2634}', 'http://localhost:8081/mainframe/public/register', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 16:05:42', '2020-01-18 16:05:42');
INSERT INTO `audits` VALUES (73, NULL, NULL, 'created', 'App\\Mainframe\\Modules\\Users\\User', 2635, '[]', '{\"first_name\":\"Tyler\",\"last_name\":\"Kelley\",\"name\":\"Tyler Kelley\",\"email\":\"hixaze@mailinator.com\",\"password\":\"$2y$10$m35xndrcR0UYCNtn.Vwibe04LqVKKAbaOL9bneNvTcgwWHOkLQLHq\",\"group_ids\":\"[\\\"26\\\"]\",\"uuid\":\"9a2497a7-9132-4f29-aa32-57064318c105\",\"created_by\":null,\"updated_by\":null,\"id\":2635}', 'http://localhost:8081/mainframe/public/register', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 16:11:00', '2020-01-18 16:11:00');
INSERT INTO `audits` VALUES (74, 'App\\User', 2635, 'updated', 'App\\User', 2635, '{\"created_by\":null,\"updated_by\":null,\"email_verified_at\":null}', '{\"created_by\":2635,\"updated_by\":2635,\"email_verified_at\":\"2020-01-18T16:18:29.766321Z\"}', 'http://localhost:8081/mainframe/public/email/verify/2635/840fc3d48102ebf6f9d428a22b0eaccfd3d36884?expires=1579367885&signature=8d29ce27ea43afe986469c4c77873235bb511bdf9a8cc2b861dd6b4db3ea8ec5', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 16:18:29', '2020-01-18 16:18:29');
INSERT INTO `audits` VALUES (75, 'App\\User', 2635, 'updated', 'App\\User', 2635, '{\"email_verified_at\":null}', '{\"email_verified_at\":\"2020-01-18T16:40:17.435941Z\"}', 'http://localhost:8081/mainframe/public/email/verify/2635/840fc3d48102ebf6f9d428a22b0eaccfd3d36884?expires=1579369199&signature=0cae062b2ccf5d0b84b2fb6df5ea8cb256a20046df35e47757af87c492f3e160', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 16:40:17', '2020-01-18 16:40:17');
INSERT INTO `audits` VALUES (76, 'App\\User', 2635, 'updated', 'App\\User', 2635, '{\"email_verified_at\":null}', '{\"email_verified_at\":\"2020-01-18T16:51:45.283497Z\"}', 'http://localhost:8081/mainframe/public/email/verify/2635/840fc3d48102ebf6f9d428a22b0eaccfd3d36884?expires=1579369889&signature=91f9d74608526ca606d1047c512d47641d271f23f498e4372491aeeb3f0579de', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 16:51:45', '2020-01-18 16:51:45');
INSERT INTO `audits` VALUES (77, 'App\\User', 2635, 'updated', 'App\\User', 2635, '{\"password\":\"$2y$10$m35xndrcR0UYCNtn.Vwibe04LqVKKAbaOL9bneNvTcgwWHOkLQLHq\",\"remember_token\":null}', '{\"password\":\"$2y$10$1BsrwSnSiRw03p2md5mhd.RcpfQqGEgXaUey1sYNTyQ2vMOWN0n4C\",\"remember_token\":\"uzMLZUo5sL7zadz0jH7KXGazkuqJxUDUCiaQgMjpjqHRxw5lf41pVe67uoIY\"}', 'http://localhost:8081/mainframe/public/password/reset', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 16:53:00', '2020-01-18 16:53:00');
INSERT INTO `audits` VALUES (78, 'App\\User', 2635, 'updated', 'App\\User', 2635, '{\"remember_token\":\"uzMLZUo5sL7zadz0jH7KXGazkuqJxUDUCiaQgMjpjqHRxw5lf41pVe67uoIY\"}', '{\"remember_token\":\"9J6tvjqMfXEV4aT12UE3W5NjSAiVd1wkIwq3rXa94UG1xUZsGU8UMitZtcAS\"}', 'http://localhost:8081/mainframe/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 17:06:40', '2020-01-18 17:06:40');
INSERT INTO `audits` VALUES (79, NULL, NULL, 'created', 'App\\Mainframe\\Modules\\Users\\User', 2637, '[]', '{\"first_name\":\"Howard\",\"last_name\":\"Gray\",\"name\":\"Howard Gray\",\"email\":\"valowunejoz@mailinator.net\",\"password\":\"$2y$10$4HQ7SVDsXATeNDT3kXjjje659eCeuYD9Fs74cnuxDJtd\\/rd0JHilO\",\"group_ids\":\"[\\\"26\\\"]\",\"uuid\":\"419186d3-d8d9-4666-a297-f886744256cc\",\"created_by\":null,\"updated_by\":null,\"id\":2637}', 'http://localhost:8081/mainframe/public/register', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 17:06:52', '2020-01-18 17:06:52');
INSERT INTO `audits` VALUES (80, 'App\\User', 2637, 'updated', 'App\\User', 2637, '{\"created_by\":null,\"updated_by\":null,\"email_verified_at\":null}', '{\"created_by\":2637,\"updated_by\":2637,\"email_verified_at\":\"2020-01-18T17:07:56.079490Z\"}', 'http://localhost:8081/mainframe/public/email/verify/2637/b13f0c41b92b719ee707831d2097cde1169c5a95?expires=1579370812&signature=681a0e8867c25340d27922afa242a4d04e908fd874dbb72b856095b81a655605', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 17:07:56', '2020-01-18 17:07:56');
INSERT INTO `audits` VALUES (81, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum', 2, '{\"textarea\":\"asdfasdf\"}', '{\"textarea\":\"asdfasdf adfsdf\"}', 'http://localhost:8081/mainframe/public/lorem-ipsums/2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 17:19:24', '2020-01-18 17:19:24');
INSERT INTO `audits` VALUES (82, NULL, NULL, 'updated', 'App\\User', 2641, '{\"password\":\"$2y$04$XGZLGUiIfA6VyJjWSKpjGeH8lz7.CNrD5Lb6mFFJ4wJQaUJ4UUalq\",\"remember_token\":null}', '{\"password\":\"$2y$10$gNN5dBgEkCOTe5bEnDv.ge7MHdMW.vSJGs.BIyc01w8ulT0QhIDKe\",\"remember_token\":\"vf2LBIQ5GFkNWxngI8el0g58Kq0flkxgY5tNsIzslyc2iFnuTWLpWdHMgCHi\"}', 'http://localhost:8081/mainframe/public/password/reset', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 17:23:04', '2020-01-18 17:23:04');
INSERT INTO `audits` VALUES (83, 'App\\User', 2641, 'updated', 'App\\User', 2641, '{\"created_by\":null,\"updated_by\":null,\"email_verified_at\":null}', '{\"created_by\":2641,\"updated_by\":2641,\"email_verified_at\":\"2020-01-18T17:24:32.300142Z\"}', 'http://localhost:8081/mainframe/public/email/verify/2641/117583204bf104249deaa46f7ac5387146c2be73?expires=1579371860&signature=b2647a60c61234312faba3536185ba2681995de685d215b24349eb0a158e275e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 17:24:32', '2020-01-18 17:24:32');
INSERT INTO `audits` VALUES (84, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 50, '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Samples\\\\LoremIpsums\"}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\LoremIpsums\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 17:28:21', '2020-01-18 17:28:21');
INSERT INTO `audits` VALUES (85, 'App\\User', 1, 'updated', 'App\\Mainframe\\Modules\\Modules\\Module', 51, '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Samples\\\\DolorSits\"}', '{\"namespace\":\"\\\\App\\\\Mainframe\\\\Modules\\\\DolorSits\"}', 'http://localhost:8081/mainframe/public/test', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 17:28:21', '2020-01-18 17:28:21');
INSERT INTO `audits` VALUES (86, 'App\\User', 2641, 'updated', 'App\\User', 2641, '{\"password\":\"$2y$10$gNN5dBgEkCOTe5bEnDv.ge7MHdMW.vSJGs.BIyc01w8ulT0QhIDKe\",\"remember_token\":\"vf2LBIQ5GFkNWxngI8el0g58Kq0flkxgY5tNsIzslyc2iFnuTWLpWdHMgCHi\"}', '{\"password\":\"$2y$10$A92Hd341FbAU5OJzIcgcVug0.FgepQ8JJtYUVlsN2.1iM3mHzsPbC\",\"remember_token\":\"WjTGMvoRuatdDi1Lt9uO3EFsJ4EQ1EtaxfqHxxJjezf4yRymaqcbPcQPe2rA\"}', 'http://localhost:8081/mainframe/public/password/reset', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', NULL, '2020-01-18 17:30:16', '2020-01-18 17:30:16');
INSERT INTO `audits` VALUES (87, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"fUfnaqSvt4N5DLAJXEyTWI3eLrQbFlmJRTa8bgiIne94YzfVTjL5jPm6HUTN\"}', '{\"remember_token\":\"hNkJ3TimNCvwRtQH38RS9WmJVC74Bc3QYIf6vKBFYKzgUFCl8UFVep6Ruor2\"}', 'http://localhost:8081/mainframe/public/api/core/1.0/register?email=test%40domain.com&password=activation1', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 10:25:18', '2020-01-19 10:25:18');
INSERT INTO `audits` VALUES (88, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"FybypbJymIt8pEj7pNwOgcwteEnxWRS1mZhR5U0YSM4ztcj7aVaqBKrqmbLa\"}', '{\"remember_token\":\"73wc5j2BSmL4KRt5JayncXN428aEIuF8fi0B4bOIE6roRTPCE5Q7kM9HGie3\"}', 'http://localhost:8081/mainframe/public/api/core/1.0/register?email=test%40domain.com&password=activation1', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 10:37:40', '2020-01-19 10:37:40');
INSERT INTO `audits` VALUES (89, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"73wc5j2BSmL4KRt5JayncXN428aEIuF8fi0B4bOIE6roRTPCE5Q7kM9HGie3\"}', '{\"remember_token\":\"QlWaMWJTNigSCnavyvFSkmOIguOPzZG2Gxqo2lkyWhJ79PubZkGuoAC4FqjQ\"}', 'http://localhost:8081/mainframe/public/api/core/1.0/register?email=test%40domain.com&password=activation1', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 10:38:54', '2020-01-19 10:38:54');
INSERT INTO `audits` VALUES (90, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"QlWaMWJTNigSCnavyvFSkmOIguOPzZG2Gxqo2lkyWhJ79PubZkGuoAC4FqjQ\"}', '{\"remember_token\":\"1bNq4wmpVW0wshdR4c5VGCALUkOeA9cCNDLl9Vz3YG4sjK2oLlfBjVe0EYus\"}', 'http://localhost:8081/mainframe/public/api/core/1.0/login?email=su%40mainframe&password=5DHHiTjgg', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 10:39:45', '2020-01-19 10:39:45');
INSERT INTO `audits` VALUES (91, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"pXrBHa9UbRMusMUJxMP4ie70vYlsW0tbOvuiDMVtp4ML4zWxAHknjhe8ROQL\"}', '{\"remember_token\":\"oCcufS1LHXa83sgTzeiLaJH0oA1iLktMmfkW70U2TxrTYmNMQFhkI4KMS1Rs\"}', 'http://localhost:8081/mainframe/public/api/core/1.0/login?email=su%40mainframe&password=5DHHiTjgg', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 11:20:12', '2020-01-19 11:20:12');
INSERT INTO `audits` VALUES (92, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"oCcufS1LHXa83sgTzeiLaJH0oA1iLktMmfkW70U2TxrTYmNMQFhkI4KMS1Rs\"}', '{\"remember_token\":\"rnQvDNdcJpz6pTfdAWXBh8S4NtFADd7CCGgvrfEOvY7CwaHpAhl4oiLULsGl\"}', 'http://localhost:8081/mainframe/public/api/core/1.0/login?email=su%40mainframe&password=5DHHiTjgg', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 11:20:55', '2020-01-19 11:20:55');
INSERT INTO `audits` VALUES (93, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"rnQvDNdcJpz6pTfdAWXBh8S4NtFADd7CCGgvrfEOvY7CwaHpAhl4oiLULsGl\"}', '{\"remember_token\":\"VuolY3HNGGtklhHL0cSeRRiG3GSlinOMI1sCehQzQBnf16V8IRE7CyvIpj1B\"}', 'http://localhost:8081/mainframe/public/api/core/1.0/login?email=su%40mainframe&password=5DHHiTjgg', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 11:22:10', '2020-01-19 11:22:10');
INSERT INTO `audits` VALUES (94, 'App\\User', 1, 'updated', 'App\\User', 1, '{\"remember_token\":\"eYYfcQt92B3wWdaNEXXB4Mydi6Yu8gOwHSYLhFXxaqXsL17mKjqUGk6TLg34\"}', '{\"remember_token\":\"oAI4ohBGsdPIPF8N0GwZDTtEf2K79TzCOPV65IT7iMhc2K224rK3X42Ldfzv\"}', 'http://localhost:8081/mainframe/public/api/core/1.0/user/test', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 11:39:14', '2020-01-19 11:39:14');
INSERT INTO `audits` VALUES (95, NULL, NULL, 'created', 'App\\Mainframe\\Modules\\Users\\User', 2677, '[]', '{\"first_name\":\"Signe\",\"last_name\":\"Reid\",\"name\":\"Signe Reid\",\"email\":\"lusawylyk@mailinator.net\",\"password\":\"$2y$10$I9kpw6X4cIr\\/ySnBf7qAau6oGgdLagtMbIPpYFSRUR3uaL15Oglbu\",\"group_ids\":\"[\\\"25\\\"]\",\"uuid\":\"b8904004-79a4-4be1-b7e9-853bcf257131\",\"created_by\":null,\"updated_by\":null,\"id\":2677}', 'http://localhost:8081/mainframe/public/register/test-group', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', NULL, '2020-01-19 18:41:21', '2020-01-19 18:41:21');
INSERT INTO `audits` VALUES (96, NULL, NULL, 'created', 'App\\Mainframe\\Modules\\Users\\User', 2678, '[]', '{\"first_name\":\"pu-First\",\"last_name\":\"Last\",\"name\":\"pu-First Last\",\"email\":\"test@domain.com\",\"password\":\"$2y$10$tjKqDEhSgDiaun6WE6RYZOabV0QZYzjXLZhF0I6AG6xs0drUXnsMu\",\"group_ids\":\"[\\\"26\\\"]\",\"uuid\":\"5c63d193-e737-46d2-af5d-f8bfa94f1830\",\"created_by\":2,\"updated_by\":2,\"id\":2678}', 'http://localhost:8081/mainframe/public/api/core/1.0/register?email=test%40domain.com&first_name=pu-First&last_name=Last&password=activation1&password_confirmation=activation1', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 18:49:07', '2020-01-19 18:49:07');
INSERT INTO `audits` VALUES (97, NULL, NULL, 'created', 'App\\Mainframe\\Modules\\Tenants\\Tenant', 30, '[]', '{\"name\":\"Macon Brock\",\"uuid\":\"64fbf54f-4ba9-4f72-aff2-b76e24ce25db\",\"created_by\":null,\"updated_by\":null,\"id\":30}', 'http://localhost:8081/mainframe/public/register-tenant', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', NULL, '2020-01-19 19:04:41', '2020-01-19 19:04:41');
INSERT INTO `audits` VALUES (98, NULL, NULL, 'created', 'App\\Mainframe\\Modules\\Users\\User', 2686, '[]', '{\"first_name\":\"Quyn\",\"last_name\":\"Rosario\",\"name\":\"Quyn Rosario\",\"email\":\"zihitonam@mailinator.com\",\"password\":\"$2y$10$O64qPC7yOKpcmvauvpcmFO2AZ6Ypttdt5TN4X4lCoMzOqYAjGeB8i\",\"group_ids\":\"[\\\"3\\\"]\",\"uuid\":\"069a048e-1d79-4828-b610-861d86749a72\",\"created_by\":null,\"updated_by\":null,\"id\":2686}', 'http://localhost:8081/mainframe/public/register-tenant', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', NULL, '2020-01-19 19:04:41', '2020-01-19 19:04:41');
INSERT INTO `audits` VALUES (99, NULL, NULL, 'updated', 'App\\Mainframe\\Modules\\Settings\\Setting', 2, '{\"description\":\"Latest iOS app version. This is matched with the users app version to prompt app update.\"}', '{\"description\":\"8\"}', 'http://localhost:8081/mainframe/public/api/core/1.0/module/settings/2?description=8', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 19:26:34', '2020-01-19 19:26:34');
INSERT INTO `audits` VALUES (100, NULL, NULL, 'updated', 'App\\Mainframe\\Modules\\Settings\\Setting', 2, '{\"description\":\"8\"}', '{\"description\":\"7\"}', 'http://localhost:8081/mainframe/public/api/core/1.0/module/settings/2?description=7', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 19:26:50', '2020-01-19 19:26:50');
INSERT INTO `audits` VALUES (101, NULL, NULL, 'updated', 'App\\Mainframe\\Modules\\Settings\\Setting', 2, '{\"description\":\"7\"}', '{\"description\":\"Feil Mills\"}', 'http://localhost:8081/mainframe/public/api/core/1.0/module/settings/2?description=Feil%20Mills', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 19:27:18', '2020-01-19 19:27:18');
INSERT INTO `audits` VALUES (102, NULL, NULL, 'updated', 'App\\Mainframe\\Modules\\Settings\\Setting', 2, '{\"description\":\"Feil Mills\",\"value\":\"1.2.0 asdf\"}', '{\"description\":\"Murray Forest\",\"value\":\"1.1.t.t\"}', 'http://localhost:8081/mainframe/public/api/core/1.0/module/settings/2?description=Murray%20Forest&value=1.1.t.t', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 19:27:59', '2020-01-19 19:27:59');
INSERT INTO `audits` VALUES (103, NULL, NULL, 'created', 'App\\Mainframe\\Modules\\Users\\User', 2691, '[]', '{\"first_name\":\"pu-Mr.\",\"last_name\":\"Last\",\"name\":\"pu-Mr. Last\",\"email\":\"Hunter.Balistreri8@yahoo.com\",\"password\":\"$2y$10$xNveAHuvpb.VRXn2mlJpyOzcWddBqR2KrO1jJACZhhM90BzYr3ybq\",\"group_ids\":\"[\\\"25\\\"]\",\"uuid\":\"fe61cccd-89c6-4d8b-ac9a-7c6550f6810b\",\"created_by\":2,\"updated_by\":2,\"id\":2691}', 'http://localhost:8081/mainframe/public/api/core/1.0/register/test-group?email=Hunter.Balistreri8%40yahoo.com&first_name=pu-Mr.&last_name=Last&password=activation1&password_confirmation=activation1', '127.0.0.1', 'PostmanRuntime/7.22.0', NULL, '2020-01-19 19:30:42', '2020-01-19 19:30:42');

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `code` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `country_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `iso2` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `country_short_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `country_long_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `iso3` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `numcode` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `un_member` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `calling_code` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `cctld` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  `currency` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `currency_symbol` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `currency_override` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `currency_override_symbol` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 255 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES (1, NULL, 'Benin', '9999', '24', 'BJ', 'Benin', 'Republic of Benin', 'BEN', '204', 'yes', '229', '.bj', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (2, NULL, 'Russia', '9999', '182', 'RU', 'Russia', 'Russian Federation', 'RUS', '643', 'yes', '7', '.ru', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (3, NULL, 'Norway', '9999', '165', 'NO', 'Norway', 'Kingdom of Norway', 'NOR', '578', 'yes', '47', '.no', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (4, NULL, 'Burkina Faso', '9999', '36', 'BF', 'Burkina Faso', 'Burkina Faso', 'BFA', '854', 'yes', '226', '.bf', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (5, NULL, 'Japan', '9999', '111', 'JP', 'Japan', 'Japan', 'JPN', '392', 'yes', '81', '.jp', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (6, NULL, 'Slovakia', '9999', '201', 'SK', 'Slovakia', 'Slovak Republic', 'SVK', '703', 'yes', '421', '.sk', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (7, NULL, 'Luxembourg', '9999', '128', 'LU', 'Luxembourg', 'Grand Duchy of Luxembourg', 'LUX', '442', 'yes', '352', '.lu', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (8, NULL, 'Malta', '9999', '136', 'MT', 'Malta', 'Republic of Malta', 'MLT', '470', 'yes', '356', '.mt', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (9, NULL, 'Kazakhstan', '9999', '114', 'KZ', 'Kazakhstan', 'Republic of Kazakhstan', 'KAZ', '398', 'yes', '7', '.kz', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (10, NULL, 'Iraq', '9999', '105', 'IQ', 'Iraq', 'Republic of Iraq', 'IRQ', '368', 'yes', '964', '.iq', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (11, NULL, 'Ukraine', '9999', '233', 'UA', 'Ukraine', 'Ukraine', 'UKR', '804', 'yes', '380', '.ua', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (12, NULL, 'Hungary', '9999', '100', 'HU', 'Hungary', 'Hungary', 'HUN', '348', 'yes', '36', '.hu', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (13, NULL, 'Australia', '9999', '14', 'AU', 'Australia', 'Commonwealth of Australia', 'AUS', '36', 'yes', '61', '.au', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (14, NULL, 'San Marino', '9999', '192', 'SM', 'San Marino', 'Republic of San Marino', 'SMR', '674', 'yes', '378', '.sm', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (15, NULL, 'Lesotho', '9999', '123', 'LS', 'Lesotho', 'Kingdom of Lesotho', 'LSO', '426', 'yes', '266', '.ls', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (16, NULL, 'Haiti', '9999', '96', 'HT', 'Haiti', 'Republic of Haiti', 'HTI', '332', 'yes', '509', '.ht', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (17, NULL, 'Latvia', '9999', '121', 'LV', 'Latvia', 'Republic of Latvia', 'LVA', '428', 'yes', '371', '.lv', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (18, NULL, 'Vatican City', '9999', '241', 'VA', 'Vatican City', 'State of the Vatican City', 'VAT', '336', 'no', '39', '.va', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (19, NULL, 'Cambodia', '9999', '38', 'KH', 'Cambodia', 'Kingdom of Cambodia', 'KHM', '116', 'yes', '855', '.kh', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (20, NULL, 'Yemen', '9999', '248', 'YE', 'Yemen', 'Republic of Yemen', 'YEM', '887', 'yes', '967', '.ye', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (21, NULL, 'South Korea', '9999', '207', 'KR', 'South Korea', 'Republic of Korea', 'KOR', '410', 'yes', '82', '.kr', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (22, NULL, 'New Zealand', '9999', '157', 'NZ', 'New Zealand', 'New Zealand', 'NZL', '554', 'yes', '64', '.nz', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (23, NULL, 'Afghanistan', '9999', '1', 'AF', 'Afghanistan', 'Islamic Republic of Afghanistan', 'AFG', '4', 'yes', '93', '.af', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (24, NULL, 'Jamaica', '9999', '110', 'JM', 'Jamaica', 'Jamaica', 'JAM', '388', 'yes', '1+876', '.jm', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (25, NULL, 'Heard Island and McDonald Islands', '9999', '97', 'HM', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', 'HMD', '334', 'no', 'NONE', '.hm', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (26, NULL, 'Belize', '9999', '23', 'BZ', 'Belize', 'Belize', 'BLZ', '84', 'yes', '501', '.bz', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (27, NULL, 'Netherlands', '9999', '155', 'NL', 'Netherlands', 'Kingdom of the Netherlands', 'NLD', '528', 'yes', '31', '.nl', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (28, NULL, 'Virgin Islands, British', '9999', '244', 'VG', 'Virgin Islands, British', 'British Virgin Islands', 'VGB', '92', 'no', '1+284', '.vg', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (29, NULL, 'Pitcairn', '9999', '175', 'PN', 'Pitcairn', 'Pitcairn', 'PCN', '612', 'no', 'NONE', '.pn', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (30, NULL, 'Timor-Leste (East Timor)', '9999', '222', 'TL', 'Timor-Leste (East Timor)', 'Democratic Republic of Timor-Leste', 'TLS', '626', 'yes', '670', '.tl', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (31, NULL, 'Samoa', '9999', '191', 'WS', 'Samoa', 'Independent State of Samoa', 'WSM', '882', 'yes', '685', '.ws', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (32, NULL, 'Israel', '9999', '108', 'IL', 'Israel', 'State of Israel', 'ISR', '376', 'yes', '972', '.il', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (33, NULL, 'Anguilla', '9999', '8', 'AI', 'Anguilla', 'Anguilla', 'AIA', '660', 'no', '1+264', '.ai', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (34, NULL, 'Swaziland', '9999', '214', 'SZ', 'Swaziland', 'Kingdom of Swaziland', 'SWZ', '748', 'yes', '268', '.sz', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (35, NULL, 'French Polynesia', '9999', '78', 'PF', 'French Polynesia', 'French Polynesia', 'PYF', '258', 'no', '689', '.pf', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (36, NULL, 'Burundi', '9999', '37', 'BI', 'Burundi', 'Republic of Burundi', 'BDI', '108', 'yes', '257', '.bi', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (37, NULL, 'Northern Mariana Islands', '9999', '164', 'MP', 'Northern Mariana Islands', 'Northern Mariana Islands', 'MNP', '580', 'no', '1+670', '.mp', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (38, NULL, 'Lebanon', '9999', '122', 'LB', 'Lebanon', 'Republic of Lebanon', 'LBN', '422', 'yes', '961', '.lb', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (39, NULL, 'Thailand', '9999', '221', 'TH', 'Thailand', 'Kingdom of Thailand', 'THA', '764', 'yes', '66', '.th', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (40, NULL, 'Sao Tome and Principe', '9999', '193', 'ST', 'Sao Tome and Principe', 'Democratic Republic of S&atilde;o Tom&eacute; and Pr&iacute;ncipe', 'STP', '678', 'yes', '239', '.st', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (41, NULL, 'Seychelles', '9999', '197', 'SC', 'Seychelles', 'Republic of Seychelles', 'SYC', '690', 'yes', '248', '.sc', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (42, NULL, 'Papua New Guinea', '9999', '171', 'PG', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'PNG', '598', 'yes', '675', '.pg', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (43, NULL, 'Somalia', '9999', '204', 'SO', 'Somalia', 'Somali Republic', 'SOM', '706', 'yes', '252', '.so', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (44, NULL, 'Namibia', '9999', '152', 'NA', 'Namibia', 'Republic of Namibia', 'NAM', '516', 'yes', '264', '.na', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (45, NULL, 'Mali', '9999', '135', 'ML', 'Mali', 'Republic of Mali', 'MLI', '466', 'yes', '223', '.ml', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (46, NULL, 'Mozambique', '9999', '150', 'MZ', 'Mozambique', 'Republic of Mozambique', 'MOZ', '508', 'yes', '258', '.mz', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (47, NULL, 'Cyprus', '9999', '58', 'CY', 'Cyprus', 'Republic of Cyprus', 'CYP', '196', 'yes', '357', '.cy', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (48, NULL, 'Micronesia', '9999', '143', 'FM', 'Micronesia', 'Federated States of Micronesia', 'FSM', '583', 'yes', '691', '.fm', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (49, NULL, 'France', '9999', '76', 'FR', 'France', 'French Republic', 'FRA', '250', 'yes', '33', '.fr', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (50, NULL, 'Sri Lanka', '9999', '210', 'LK', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', 'LKA', '144', 'yes', '94', '.lk', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (51, NULL, 'Libya', '9999', '125', 'LY', 'Libya', 'Libya', 'LBY', '434', 'yes', '218', '.ly', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (52, NULL, 'Kenya', '9999', '115', 'KE', 'Kenya', 'Republic of Kenya', 'KEN', '404', 'yes', '254', '.ke', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (53, NULL, 'Rwanda', '9999', '183', 'RW', 'Rwanda', 'Republic of Rwanda', 'RWA', '646', 'yes', '250', '.rw', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (54, NULL, 'Venezuela', '9999', '242', 'VE', 'Venezuela', 'Bolivarian Republic of Venezuela', 'VEN', '862', 'yes', '58', '.ve', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (55, NULL, 'Italy', '9999', '109', 'IT', 'Italy', 'Italian Republic', 'ITA', '380', 'yes', '39', '.jm', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (56, NULL, 'Suriname', '9999', '212', 'SR', 'Suriname', 'Republic of Suriname', 'SUR', '740', 'yes', '597', '.sr', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (57, NULL, 'Mauritania', '9999', '139', 'MR', 'Mauritania', 'Islamic Republic of Mauritania', 'MRT', '478', 'yes', '222', '.mr', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (58, NULL, 'Aland Islands', '9999', '2', 'AX', 'Aland Islands', '&Aring;land Islands', 'ALA', '248', 'no', '358', '.ax', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (59, NULL, 'Guadaloupe', '9999', '89', 'GP', 'Guadaloupe', 'Guadeloupe', 'GLP', '312', 'no', '590', '.gp', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (60, NULL, 'Tanzania', '9999', '220', 'TZ', 'Tanzania', 'United Republic of Tanzania', 'TZA', '834', 'yes', '255', '.tz', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (61, NULL, 'Guam', '9999', '90', 'GU', 'Guam', 'Guam', 'GUM', '316', 'no', '1+671', '.gu', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (62, NULL, 'Sudan', '9999', '211', 'SD', 'Sudan', 'Republic of the Sudan', 'SDN', '729', 'yes', '249', '.sd', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (63, NULL, 'Chile', '9999', '45', 'CL', 'Chile', 'Republic of Chile', 'CHL', '152', 'yes', '56', '.cl', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (64, NULL, 'Germany', '9999', '83', 'DE', 'Germany', 'Federal Republic of Germany', 'DEU', '276', 'yes', '49', '.de', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (65, NULL, 'Norfolk Island', '9999', '162', 'NF', 'Norfolk Island', 'Norfolk Island', 'NFK', '574', 'no', '672', '.nf', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (66, NULL, 'Oman', '9999', '166', 'OM', 'Oman', 'Sultanate of Oman', 'OMN', '512', 'yes', '968', '.om', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (67, NULL, 'Tunisia', '9999', '227', 'TN', 'Tunisia', 'Republic of Tunisia', 'TUN', '788', 'yes', '216', '.tn', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (68, NULL, 'Turkey', '9999', '228', 'TR', 'Turkey', 'Republic of Turkey', 'TUR', '792', 'yes', '90', '.tr', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (69, NULL, 'China', '9999', '46', 'CN', 'China', 'People\'s Republic of China', 'CHN', '156', 'yes', '86', '.cn', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (70, NULL, 'Tonga', '9999', '225', 'TO', 'Tonga', 'Kingdom of Tonga', 'TON', '776', 'yes', '676', '.to', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (71, NULL, 'Puerto Rico', '9999', '178', 'PR', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'PRI', '630', 'no', '1+939', '.pr', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (72, NULL, 'Uruguay', '9999', '238', 'UY', 'Uruguay', 'Eastern Republic of Uruguay', 'URY', '858', 'yes', '598', '.uy', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (73, NULL, 'Indonesia', '9999', '103', 'ID', 'Indonesia', 'Republic of Indonesia', 'IDN', '360', 'yes', '62', '.id', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (74, NULL, 'Niger', '9999', '159', 'NE', 'Niger', 'Republic of Niger', 'NER', '562', 'yes', '227', '.ne', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (75, NULL, 'Faroe Islands', '9999', '73', 'FO', 'Faroe Islands', 'The Faroe Islands', 'FRO', '234', 'no', '298', '.fo', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (76, NULL, 'Greece', '9999', '86', 'GR', 'Greece', 'Hellenic Republic', 'GRC', '300', 'yes', '30', '.gr', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (77, NULL, 'Morocco', '9999', '149', 'MA', 'Morocco', 'Kingdom of Morocco', 'MAR', '504', 'yes', '212', '.ma', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (78, NULL, 'Malaysia', '9999', '133', 'MY', 'Malaysia', 'Malaysia', 'MYS', '458', 'yes', '60', '.my', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (79, NULL, 'Montenegro', '9999', '147', 'ME', 'Montenegro', 'Montenegro', 'MNE', '499', 'yes', '382', '.me', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (80, NULL, 'Sierra Leone', '9999', '198', 'SL', 'Sierra Leone', 'Republic of Sierra Leone', 'SLE', '694', 'yes', '232', '.sl', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (81, NULL, 'Fiji', '9999', '74', 'FJ', 'Fiji', 'Republic of Fiji', 'FJI', '242', 'yes', '679', '.fj', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (82, NULL, 'Antarctica', '9999', '9', 'AQ', 'Antarctica', 'Antarctica', 'ATA', '10', 'no', '672', '.aq', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (83, NULL, 'Croatia', '9999', '55', 'HR', 'Croatia', 'Republic of Croatia', 'HRV', '191', 'yes', '385', '.hr', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (84, NULL, 'Andorra', '9999', '6', 'AD', 'Andorra', 'Principality of Andorra', 'AND', '20', 'yes', '376', '.ad', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (85, NULL, 'Turks and Caicos Islands', '9999', '230', 'TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'TCA', '796', 'no', '1+649', '.tc', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (86, NULL, 'Western Sahara', '9999', '247', 'EH', 'Western Sahara', 'Western Sahara', 'ESH', '732', 'no', '212', '.eh', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (87, NULL, 'Ghana', '9999', '84', 'GH', 'Ghana', 'Republic of Ghana', 'GHA', '288', 'yes', '233', '.gh', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (88, NULL, 'Vanuatu', '9999', '240', 'VU', 'Vanuatu', 'Republic of Vanuatu', 'VUT', '548', 'yes', '678', '.vu', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (89, NULL, 'South Africa', '9999', '205', 'ZA', 'South Africa', 'Republic of South Africa', 'ZAF', '710', 'yes', '27', '.za', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (90, NULL, 'Guyana', '9999', '95', 'GY', 'Guyana', 'Co-operative Republic of Guyana', 'GUY', '328', 'yes', '592', '.gy', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (91, NULL, 'Zambia', '9999', '249', 'ZM', 'Zambia', 'Republic of Zambia', 'ZMB', '894', 'yes', '260', '.zm', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (92, NULL, 'Saint Lucia', '9999', '187', 'LC', 'Saint Lucia', 'Saint Lucia', 'LCA', '662', 'yes', '1+758', '.lc', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (93, NULL, 'Eritrea', '9999', '69', 'ER', 'Eritrea', 'State of Eritrea', 'ERI', '232', 'yes', '291', '.er', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (94, NULL, 'Gabon', '9999', '80', 'GA', 'Gabon', 'Gabonese Republic', 'GAB', '266', 'yes', '241', '.ga', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (95, NULL, 'Wallis and Futuna', '9999', '246', 'WF', 'Wallis and Futuna', 'Wallis and Futuna', 'WLF', '876', 'no', '681', '.wf', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (96, NULL, 'South Georgia and the South Sandwich Islands', '9999', '206', 'GS', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'SGS', '239', 'no', '500', '.gs', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (97, NULL, 'Paraguay', '9999', '172', 'PY', 'Paraguay', 'Republic of Paraguay', 'PRY', '600', 'yes', '595', '.py', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (98, NULL, 'Martinique', '9999', '138', 'MQ', 'Martinique', 'Martinique', 'MTQ', '474', 'no', '596', '.mq', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (99, NULL, 'United Arab Emirates', '9999', '234', 'AE', 'United Arab Emirates', 'United Arab Emirates', 'ARE', '784', 'yes', '971', '.ae', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (100, NULL, 'Dominican Republic', '9999', '64', 'DO', 'Dominican Republic', 'Dominican Republic', 'DOM', '214', 'yes', '1+809, 8', '.do', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (101, NULL, 'Dominica', '9999', '63', 'DM', 'Dominica', 'Commonwealth of Dominica', 'DMA', '212', 'yes', '1+767', '.dm', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (102, NULL, 'Nepal', '9999', '154', 'NP', 'Nepal', 'Federal Democratic Republic of Nepal', 'NPL', '524', 'yes', '977', '.np', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (103, NULL, 'Belarus', '9999', '21', 'BY', 'Belarus', 'Republic of Belarus', 'BLR', '112', 'yes', '375', '.by', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (104, NULL, 'Equatorial Guinea', '9999', '68', 'GQ', 'Equatorial Guinea', 'Republic of Equatorial Guinea', 'GNQ', '226', 'yes', '240', '.gq', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (105, NULL, 'North Korea', '9999', '163', 'KP', 'North Korea', 'Democratic People\'s Republic of Korea', 'PRK', '408', 'yes', '850', '.kp', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (106, NULL, 'Georgia', '9999', '82', 'GE', 'Georgia', 'Georgia', 'GEO', '268', 'yes', '995', '.ge', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (107, NULL, 'Iceland', '9999', '101', 'IS', 'Iceland', 'Republic of Iceland', 'ISL', '352', 'yes', '354', '.is', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (108, NULL, 'Costa Rica', '9999', '53', 'CR', 'Costa Rica', 'Republic of Costa Rica', 'CRI', '188', 'yes', '506', '.cr', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (109, NULL, 'Lithuania', '9999', '127', 'LT', 'Lithuania', 'Republic of Lithuania', 'LTU', '440', 'yes', '370', '.lt', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (110, NULL, 'Tajikistan', '9999', '219', 'TJ', 'Tajikistan', 'Republic of Tajikistan', 'TJK', '762', 'yes', '992', '.tj', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (111, NULL, 'Macao', '9999', '129', 'MO', 'Macao', 'The Macao Special Administrative Region', 'MAC', '446', 'no', '853', '.mo', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (112, NULL, 'Djibouti', '9999', '62', 'DJ', 'Djibouti', 'Republic of Djibouti', 'DJI', '262', 'yes', '253', '.dj', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (113, NULL, 'Austria', '9999', '15', 'AT', 'Austria', 'Republic of Austria', 'AUT', '40', 'yes', '43', '.at', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (114, NULL, 'Mexico', '9999', '142', 'MX', 'Mexico', 'United Mexican States', 'MEX', '484', 'yes', '52', '.mx', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (115, NULL, 'Tokelau', '9999', '224', 'TK', 'Tokelau', 'Tokelau', 'TKL', '772', 'no', '690', '.tk', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (116, NULL, 'Poland', '9999', '176', 'PL', 'Poland', 'Republic of Poland', 'POL', '616', 'yes', '48', '.pl', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (117, NULL, 'Gibraltar', '9999', '85', 'GI', 'Gibraltar', 'Gibraltar', 'GIB', '292', 'no', '350', '.gi', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (118, NULL, 'Romania', '9999', '181', 'RO', 'Romania', 'Romania', 'ROU', '642', 'yes', '40', '.ro', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (119, NULL, 'Uganda', '9999', '232', 'UG', 'Uganda', 'Republic of Uganda', 'UGA', '800', 'yes', '256', '.ug', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (120, NULL, 'Syria', '9999', '217', 'SY', 'Syria', 'Syrian Arab Republic', 'SYR', '760', 'yes', '963', '.sy', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (121, NULL, 'India', '9999', '102', 'IN', 'India', 'Republic of India', 'IND', '356', 'yes', '91', '.in', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (122, NULL, 'Cayman Islands', '9999', '42', 'KY', 'Cayman Islands', 'The Cayman Islands', 'CYM', '136', 'no', '1+345', '.ky', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (123, NULL, 'Kyrgyzstan', '9999', '119', 'KG', 'Kyrgyzstan', 'Kyrgyz Republic', 'KGZ', '417', 'yes', '996', '.kg', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (124, NULL, 'Greenland', '9999', '87', 'GL', 'Greenland', 'Greenland', 'GRL', '304', 'no', '299', '.gl', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (125, NULL, 'Guinea-Bissau', '9999', '94', 'GW', 'Guinea-Bissau', 'Republic of Guinea-Bissau', 'GNB', '624', 'yes', '245', '.gw', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (126, NULL, 'Azerbaijan', '9999', '16', 'AZ', 'Azerbaijan', 'Republic of Azerbaijan', 'AZE', '31', 'yes', '994', '.az', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (127, NULL, 'Portugal', '9999', '177', 'PT', 'Portugal', 'Portuguese Republic', 'PRT', '620', 'yes', '351', '.pt', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (128, NULL, 'Cameroon', '9999', '39', 'CM', 'Cameroon', 'Republic of Cameroon', 'CMR', '120', 'yes', '237', '.cm', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (129, NULL, 'Saint Barthelemy', '9999', '184', 'BL', 'Saint Barthelemy', 'Saint Barth&eacute;lemy', 'BLM', '652', 'no', '590', '.bl', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (130, NULL, 'Denmark', '9999', '61', 'DK', 'Denmark', 'Kingdom of Denmark', 'DNK', '208', 'yes', '45', '.dk', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (131, NULL, 'Niue', '9999', '161', 'NU', 'Niue', 'Niue', 'NIU', '570', 'some', '683', '.nu', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (132, NULL, 'Bhutan', '9999', '26', 'BT', 'Bhutan', 'Kingdom of Bhutan', 'BTN', '64', 'yes', '975', '.bt', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (133, NULL, 'Aruba', '9999', '13', 'AW', 'Aruba', 'Aruba', 'ABW', '533', 'no', '297', '.aw', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (134, NULL, 'Turkmenistan', '9999', '229', 'TM', 'Turkmenistan', 'Turkmenistan', 'TKM', '795', 'yes', '993', '.tm', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (135, NULL, 'Liechtenstein', '9999', '126', 'LI', 'Liechtenstein', 'Principality of Liechtenstein', 'LIE', '438', 'yes', '423', '.li', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (136, NULL, 'Tuvalu', '9999', '231', 'TV', 'Tuvalu', 'Tuvalu', 'TUV', '798', 'yes', '688', '.tv', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (137, NULL, 'Democratic Republic of the Congo', '9999', '60', 'CD', 'Democratic Republic of the Congo', 'Democratic Republic of the Congo', 'COD', '180', 'yes', '243', '.cd', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (138, NULL, 'Chad', '9999', '44', 'TD', 'Chad', 'Republic of Chad', 'TCD', '148', 'yes', '235', '.td', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (139, NULL, 'Bahamas', '9999', '17', 'BS', 'Bahamas', 'Commonwealth of The Bahamas', 'BHS', '44', 'yes', '1+242', '.bs', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (140, NULL, 'Falkland Islands (Malvinas)', '9999', '72', 'FK', 'Falkland Islands (Malvinas)', 'The Falkland Islands (Malvinas)', 'FLK', '238', 'no', '500', '.fk', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (141, NULL, 'Kiribati', '9999', '116', 'KI', 'Kiribati', 'Republic of Kiribati', 'KIR', '296', 'yes', '686', '.ki', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (142, NULL, 'Antigua and Barbuda', '9999', '10', 'AG', 'Antigua and Barbuda', 'Antigua and Barbuda', 'ATG', '28', 'yes', '1+268', '.ag', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (143, NULL, 'Ireland', '9999', '106', 'IE', 'Ireland', 'Ireland', 'IRL', '372', 'yes', '353', '.ie', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (144, NULL, 'Armenia', '9999', '12', 'AM', 'Armenia', 'Republic of Armenia', 'ARM', '51', 'yes', '374', '.am', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (145, NULL, 'Uzbekistan', '9999', '239', 'UZ', 'Uzbekistan', 'Republic of Uzbekistan', 'UZB', '860', 'yes', '998', '.uz', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (146, NULL, 'Palestine', '9999', '169', 'PS', 'Palestine', 'State of Palestine (or Occupied Palestinian Territory)', 'PSE', '275', 'some', '970', '.ps', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (147, NULL, 'Spain', '9999', '209', 'ES', 'Spain', 'Kingdom of Spain', 'ESP', '724', 'yes', '34', '.es', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (148, NULL, 'Curacao', '9999', '57', 'CW', 'Curacao', 'Cura&ccedil;ao', 'CUW', '531', 'no', '599', '.cw', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (149, NULL, 'Bolivia', '9999', '27', 'BO', 'Bolivia', 'Plurinational State of Bolivia', 'BOL', '68', 'yes', '591', '.bo', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (150, NULL, 'Estonia', '9999', '70', 'EE', 'Estonia', 'Republic of Estonia', 'EST', '233', 'yes', '372', '.ee', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (151, NULL, 'Hong Kong', '9999', '99', 'HK', 'Hong Kong', 'Hong Kong', 'HKG', '344', 'no', '852', '.hk', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (152, NULL, 'Algeria', '9999', '4', 'DZ', 'Algeria', 'People\'s Democratic Republic of Algeria', 'DZA', '12', 'yes', '213', '.dz', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (153, NULL, 'Brunei', '9999', '34', 'BN', 'Brunei', 'Brunei Darussalam', 'BRN', '96', 'yes', '673', '.bn', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (154, NULL, 'Barbados', '9999', '20', 'BB', 'Barbados', 'Barbados', 'BRB', '52', 'yes', '1+246', '.bb', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (155, NULL, 'Laos', '9999', '120', 'LA', 'Laos', 'Lao People\'s Democratic Republic', 'LAO', '418', 'yes', '856', '.la', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (156, NULL, 'Bahrain', '9999', '18', 'BH', 'Bahrain', 'Kingdom of Bahrain', 'BHR', '48', 'yes', '973', '.bh', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (157, NULL, 'Macedonia', '9999', '130', 'MK', 'Macedonia', 'The Former Yugoslav Republic of Macedonia', 'MKD', '807', 'yes', '389', '.mk', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (158, NULL, 'Bermuda', '9999', '25', 'BM', 'Bermuda', 'Bermuda Islands', 'BMU', '60', 'no', '1+441', '.bm', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (159, NULL, 'Gambia', '9999', '81', 'GM', 'Gambia', 'Republic of The Gambia', 'GMB', '270', 'yes', '220', '.gm', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (160, NULL, 'Senegal', '9999', '195', 'SN', 'Senegal', 'Republic of Senegal', 'SEN', '686', 'yes', '221', '.sn', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (161, NULL, 'Guinea', '9999', '93', 'GN', 'Guinea', 'Republic of Guinea', 'GIN', '324', 'yes', '224', '.gn', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (162, NULL, 'Grenada', '9999', '88', 'GD', 'Grenada', 'Grenada', 'GRD', '308', 'yes', '1+473', '.gd', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (163, NULL, 'Madagascar', '9999', '131', 'MG', 'Madagascar', 'Republic of Madagascar', 'MDG', '450', 'yes', '261', '.mg', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (164, NULL, 'Iran', '9999', '104', 'IR', 'Iran', 'Islamic Republic of Iran', 'IRN', '364', 'yes', '98', '.ir', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (165, NULL, 'American Samoa', '9999', '5', 'AS', 'American Samoa', 'American Samoa', 'ASM', '16', 'no', '1+684', '.as', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (166, NULL, 'Mauritius', '9999', '140', 'MU', 'Mauritius', 'Republic of Mauritius', 'MUS', '480', 'yes', '230', '.mu', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (167, NULL, 'Panama', '9999', '170', 'PA', 'Panama', 'Republic of Panama', 'PAN', '591', 'yes', '507', '.pa', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (168, NULL, 'Argentina', '9999', '11', 'AR', 'Argentina', 'Argentine Republic', 'ARG', '32', 'yes', '54', '.ar', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (169, NULL, 'Jordan', '9999', '113', 'JO', 'Jordan', 'Hashemite Kingdom of Jordan', 'JOR', '400', 'yes', '962', '.jo', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (170, NULL, 'Nauru', '9999', '153', 'NR', 'Nauru', 'Republic of Nauru', 'NRU', '520', 'yes', '674', '.nr', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (171, NULL, 'Slovenia', '9999', '202', 'SI', 'Slovenia', 'Republic of Slovenia', 'SVN', '705', 'yes', '386', '.si', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (172, NULL, 'Reunion', '9999', '180', 'RE', 'Reunion', 'R&eacute;union', 'REU', '638', 'no', '262', '.re', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (173, NULL, 'Mayotte', '9999', '141', 'YT', 'Mayotte', 'Mayotte', 'MYT', '175', 'no', '262', '.yt', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (174, NULL, 'Marshall Islands', '9999', '137', 'MH', 'Marshall Islands', 'Republic of the Marshall Islands', 'MHL', '584', 'yes', '692', '.mh', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (175, NULL, 'Bonaire, Sint Eustatius and Saba', '9999', '28', 'BQ', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba', 'BES', '535', 'no', '599', '.bq', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (176, NULL, 'Kuwait', '9999', '118', 'KW', 'Kuwait', 'State of Kuwait', 'KWT', '414', 'yes', '965', '.kw', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (177, NULL, 'Vietnam', '9999', '243', 'VN', 'Vietnam', 'Socialist Republic of Vietnam', 'VNM', '704', 'yes', '84', '.vn', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (178, NULL, 'Ethiopia', '9999', '71', 'ET', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', 'ETH', '231', 'yes', '251', '.et', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (179, NULL, 'Bulgaria', '9999', '35', 'BG', 'Bulgaria', 'Republic of Bulgaria', 'BGR', '100', 'yes', '359', '.bg', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (180, NULL, 'Taiwan', '9999', '218', 'TW', 'Taiwan', 'Republic of China (Taiwan)', 'TWN', '158', 'former', '886', '.tw', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (181, NULL, 'Guernsey', '9999', '92', 'GG', 'Guernsey', 'Guernsey', 'GGY', '831', 'no', '44', '.gg', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (182, NULL, 'Comoros', '9999', '50', 'KM', 'Comoros', 'Union of the Comoros', 'COM', '174', 'yes', '269', '.km', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (183, NULL, 'Jersey', '9999', '112', 'JE', 'Jersey', 'The Bailiwick of Jersey', 'JEY', '832', 'no', '44', '.je', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (184, NULL, 'Botswana', '9999', '30', 'BW', 'Botswana', 'Republic of Botswana', 'BWA', '72', 'yes', '267', '.bw', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (185, NULL, 'Ecuador', '9999', '65', 'EC', 'Ecuador', 'Republic of Ecuador', 'ECU', '218', 'yes', '593', '.ec', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (186, NULL, 'Saudi Arabia', '9999', '194', 'SA', 'Saudi Arabia', 'Kingdom of Saudi Arabia', 'SAU', '682', 'yes', '966', '.sa', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (187, NULL, 'UK (United Kingdom)', '2', '235', 'GB', 'United Kingdom', 'United Kingdom of Great Britain and Nothern Ireland', 'GBR', '826', 'yes', '44', '.uk', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'GBP', '£', 'GBP', '£');
INSERT INTO `countries` VALUES (188, NULL, 'Finland', '9999', '75', 'FI', 'Finland', 'Republic of Finland', 'FIN', '246', 'yes', '358', '.fi', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (189, NULL, 'Mongolia', '9999', '146', 'MN', 'Mongolia', 'Mongolia', 'MNG', '496', 'yes', '976', '.mn', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (190, NULL, 'Colombia', '9999', '49', 'CO', 'Colombia', 'Republic of Colombia', 'COL', '170', 'yes', '57', '.co', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (191, NULL, 'Saint Martin', '9999', '188', 'MF', 'Saint Martin', 'Saint Martin', 'MAF', '663', 'no', '590', '.mf', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (192, NULL, 'Switzerland', '9999', '216', 'CH', 'Switzerland', 'Swiss Confederation', 'CHE', '756', 'yes', '41', '.ch', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (193, NULL, 'Svalbard and Jan Mayen', '9999', '213', 'SJ', 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen', 'SJM', '744', 'no', '47', '.sj', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (194, NULL, 'Nicaragua', '9999', '158', 'NI', 'Nicaragua', 'Republic of Nicaragua', 'NIC', '558', 'yes', '505', '.ni', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (195, NULL, 'Christmas Island', '9999', '47', 'CX', 'Christmas Island', 'Christmas Island', 'CXR', '162', 'no', '61', '.cx', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (196, NULL, 'Moldava', '9999', '144', 'MD', 'Moldava', 'Republic of Moldova', 'MDA', '498', 'yes', '373', '.md', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (197, NULL, 'Bouvet Island', '9999', '31', 'BV', 'Bouvet Island', 'Bouvet Island', 'BVT', '74', 'no', 'NONE', '.bv', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (198, NULL, 'United States Minor Outlying Islands', '9999', '237', 'UM', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'UMI', '581', 'no', 'NONE', 'NONE', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (199, NULL, 'Saint Kitts and Nevis', '9999', '186', 'KN', 'Saint Kitts and Nevis', 'Federation of Saint Christopher and Nevis', 'KNA', '659', 'yes', '1+869', '.kn', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (200, NULL, 'US (United States)', '1', '236', 'US', 'United States', 'United States of America', 'USA', '840', 'yes', '1', '.us', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (201, NULL, 'Singapore', '9999', '199', 'SG', 'Singapore', 'Republic of Singapore', 'SGP', '702', 'yes', '65', '.sg', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (202, NULL, 'Belgium', '9999', '22', 'BE', 'Belgium', 'Kingdom of Belgium', 'BEL', '56', 'yes', '32', '.be', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (203, NULL, 'Solomon Islands', '9999', '203', 'SB', 'Solomon Islands', 'Solomon Islands', 'SLB', '90', 'yes', '677', '.sb', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (204, NULL, 'Saint Helena', '9999', '185', 'SH', 'Saint Helena', 'Saint Helena, Ascension and Tristan da Cunha', 'SHN', '654', 'no', '290', '.sh', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (205, NULL, 'Serbia', '9999', '196', 'RS', 'Serbia', 'Republic of Serbia', 'SRB', '688', 'yes', '381', '.rs', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (206, NULL, 'New Caledonia', '9999', '156', 'NC', 'New Caledonia', 'New Caledonia', 'NCL', '540', 'no', '687', '.nc', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (207, NULL, 'Congo', '9999', '51', 'CG', 'Congo', 'Republic of the Congo', 'COG', '178', 'yes', '242', '.cg', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (208, NULL, 'Sint Maarten', '9999', '200', 'SX', 'Sint Maarten', 'Sint Maarten', 'SXM', '534', 'no', '1+721', '.sx', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (209, NULL, 'Malawi', '9999', '132', 'MW', 'Malawi', 'Republic of Malawi', 'MWI', '454', 'yes', '265', '.mw', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (210, NULL, 'Honduras', '9999', '98', 'HN', 'Honduras', 'Republic of Honduras', 'HND', '340', 'yes', '504', '.hn', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (211, NULL, 'Albania', '9999', '3', 'AL', 'Albania', 'Republic of Albania', 'ALB', '8', 'yes', '355', '.al', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (212, NULL, 'Monaco', '9999', '145', 'MC', 'Monaco', 'Principality of Monaco', 'MCO', '492', 'yes', '377', '.mc', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (213, NULL, 'Angola', '9999', '7', 'AO', 'Angola', 'Republic of Angola', 'AGO', '24', 'yes', '244', '.ao', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (214, NULL, 'Canada', '9999', '40', 'CA', 'Canada', 'Canada', 'CAN', '124', 'yes', '1', '.ca', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (215, NULL, 'Qatar', '9999', '179', 'QA', 'Qatar', 'State of Qatar', 'QAT', '634', 'yes', '974', '.qa', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (216, NULL, 'Togo', '9999', '223', 'TG', 'Togo', 'Togolese Republic', 'TGO', '768', 'yes', '228', '.tg', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (217, NULL, 'Myanmar (Burma)', '9999', '151', 'MM', 'Myanmar (Burma)', 'Republic of the Union of Myanmar', 'MMR', '104', 'yes', '95', '.mm', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (218, NULL, 'Czech Republic', '9999', '59', 'CZ', 'Czech Republic', 'Czech Republic', 'CZE', '203', 'yes', '420', '.cz', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (219, NULL, 'Montserrat', '9999', '148', 'MS', 'Montserrat', 'Montserrat', 'MSR', '500', 'no', '1+664', '.ms', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (220, NULL, 'Pakistan', '9999', '167', 'PK', 'Pakistan', 'Islamic Republic of Pakistan', 'PAK', '586', 'yes', '92', '.pk', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (221, NULL, 'Cocos (Keeling) Islands', '9999', '48', 'CC', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'CCK', '166', 'no', '61', '.cc', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (222, NULL, 'Egypt', '9999', '66', 'EG', 'Egypt', 'Arab Republic of Egypt', 'EGY', '818', 'yes', '20', '.eg', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (223, NULL, 'Virgin Islands, US', '9999', '245', 'VI', 'Virgin Islands, US', 'Virgin Islands of the United States', 'VIR', '850', 'no', '1+340', '.vi', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (224, NULL, 'Saint Pierre and Miquelon', '9999', '189', 'PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'SPM', '666', 'no', '508', '.pm', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (225, NULL, 'Nigeria', '9999', '160', 'NG', 'Nigeria', 'Federal Republic of Nigeria', 'NGA', '566', 'yes', '234', '.ng', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (226, NULL, 'Peru', '9999', '173', 'PE', 'Peru', 'Republic of Peru', 'PER', '604', 'yes', '51', '.pe', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (227, NULL, 'British Indian Ocean Territory', '9999', '33', 'IO', 'British Indian Ocean Territory', 'British Indian Ocean Territory', 'IOT', '86', 'no', '246', '.io', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (228, NULL, 'Cape Verde', '9999', '41', 'CV', 'Cape Verde', 'Republic of Cape Verde', 'CPV', '132', 'yes', '238', '.cv', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (229, NULL, 'Bosnia and Herzegovina', '9999', '29', 'BA', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'BIH', '70', 'yes', '387', '.ba', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (230, NULL, 'Cuba', '9999', '56', 'CU', 'Cuba', 'Republic of Cuba', 'CUB', '192', 'yes', '53', '.cu', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (231, NULL, 'Central African Republic', '9999', '43', 'CF', 'Central African Republic', 'Central African Republic', 'CAF', '140', 'yes', '236', '.cf', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (232, NULL, 'Guatemala', '9999', '91', 'GT', 'Guatemala', 'Republic of Guatemala', 'GTM', '320', 'yes', '502', '.gt', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (233, NULL, 'Cook Islands', '9999', '52', 'CK', 'Cook Islands', 'Cook Islands', 'COK', '184', 'some', '682', '.ck', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (234, NULL, 'Sweden', '9999', '215', 'SE', 'Sweden', 'Kingdom of Sweden', 'SWE', '752', 'yes', '46', '.se', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (235, NULL, 'French Guiana', '9999', '77', 'GF', 'French Guiana', 'French Guiana', 'GUF', '254', 'no', '594', '.gf', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (236, NULL, 'Palau', '9999', '168', 'PW', 'Palau', 'Republic of Palau', 'PLW', '585', 'yes', '680', '.pw', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (237, NULL, 'Phillipines', '9999', '174', 'PH', 'Phillipines', 'Republic of the Philippines', 'PHL', '608', 'yes', '63', '.ph', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (238, NULL, 'Trinidad and Tobago', '9999', '226', 'TT', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', 'TTO', '780', 'yes', '1+868', '.tt', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (239, NULL, 'Maldives', '9999', '134', 'MV', 'Maldives', 'Republic of Maldives', 'MDV', '462', 'yes', '960', '.mv', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (240, NULL, 'Isle of Man', '9999', '107', 'IM', 'Isle of Man', 'Isle of Man', 'IMN', '833', 'no', '44', '.im', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (241, NULL, 'Brazil', '9999', '32', 'BR', 'Brazil', 'Federative Republic of Brazil', 'BRA', '76', 'yes', '55', '.br', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (242, NULL, 'Bangladesh', '9999', '19', 'BD', 'Bangladesh', 'People\'s Republic of Bangladesh', 'BGD', '50', 'yes', '880', '.bd', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (243, NULL, 'French Southern Territories', '9999', '79', 'TF', 'French Southern Territories', 'French Southern Territories', 'ATF', '260', 'no', NULL, '.tf', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (244, 'c2c978b0-06e2-4db9-901b-e86ae1cc850b', 'Liberia', '9999', '124', 'LR', 'Liberia', 'Republic of Liberia', 'LBR', '430', 'yes', '231', '.lr', 1, 1, 1, '2020-01-08 15:17:08', '2020-01-08 15:17:08', NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (245, NULL, 'Saint Vincent and the Grenadines', '9999', '190', 'VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'VCT', '670', 'yes', '1+784', '.vc', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (246, NULL, 'Zimbabwe', '9999', '250', 'ZW', 'Zimbabwe', 'Republic of Zimbabwe', 'ZWE', '716', 'yes', '263', '.zw', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (247, NULL, 'El Salvador', '9999', '67', 'SV', 'El Salvador', 'Republic of El Salvador', 'SLV', '222', 'yes', '503', '.sv', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (248, NULL, 'South Sudan', '9999', '208', 'SS', 'South Sudan', 'Republic of South Sudan', 'SSD', '728', 'yes', '211', '.ss', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (249, NULL, 'Kosovo', '9999', '117', 'XK', 'Kosovo', 'Republic of Kosovo', '---', '0', 'some', '381', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (250, NULL, 'Cote d\'ivoire (Ivory Coast)', '9999', '54', 'CI', 'Cote d\'ivoire (Ivory Coast)', 'Republic of C&ocirc;te D\'Ivoire (Ivory Coast)', 'CIV', '384', 'yes', '225', '.ci', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (251, '2f6287bd-1bee-442e-9207-7ca4490f9552', 'Europe', '9999', NULL, NULL, 'Europe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2019-01-22 11:26:33', '2019-01-22 11:26:33', NULL, NULL, 'EUR', '€', 'EUR', '€');
INSERT INTO `countries` VALUES (252, 'ff2697d0-c886-45b7-9437-01b998ab50cc', 'Rest of the World', '9999', NULL, NULL, 'Rest of the World', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2019-01-22 11:27:06', '2019-01-22 11:27:06', NULL, NULL, 'USD', '$', 'USD', '$');
INSERT INTO `countries` VALUES (253, 'c5220793-86dd-4f5f-9217-ce554dfd66f7', 'georgia test', '9999', NULL, NULL, 'georgia test', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '2019-01-25 12:44:08', '2019-02-18 09:13:57', '2019-02-18 09:13:57', NULL, 'Pounds', '£', NULL, NULL);
INSERT INTO `countries` VALUES (254, 'cfbbadca-94e6-49fd-8182-a02a89df8efb', 'Test', '9999', NULL, NULL, 'Test', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '2019-02-28 12:34:46', '2019-02-28 12:34:55', '2019-02-28 12:34:55', NULL, 'GBP', '£', 'GBP', '£');

-- ----------------------------
-- Table structure for dolor_sits
-- ----------------------------
DROP TABLE IF EXISTS `dolor_sits`;
CREATE TABLE `dolor_sits`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `tenant_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint(4) NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dolor_sits
-- ----------------------------
INSERT INTO `dolor_sits` VALUES (1, '7be17d1c-1bd9-4620-876a-f3ca5a05717e', NULL, NULL, 'Super wings', 1, 5, 5, '2019-11-20 14:56:35', '2019-11-20 14:56:35', NULL, NULL);
INSERT INTO `dolor_sits` VALUES (2, '7be17d1c-1bd9-4620-876a-f3ca5a05717f', NULL, NULL, 'Paw Petrol', 1, 5, 5, '2019-11-20 14:56:35', '2019-11-20 14:56:35', NULL, NULL);
INSERT INTO `dolor_sits` VALUES (3, '7be17d1c-1bd9-4620-876a-f3ca5a05717g', NULL, NULL, 'Captain Planet', 1, 5, 5, '2019-11-20 14:56:35', '2020-01-06 09:25:49', NULL, NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `tenant_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `permissions` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'd48c591a-e6b2-4f7b-9458-0693362e55a6', NULL, NULL, 'superuser', 'Superuser', '{\"superuser\":1}', 1, 1, 1, '2018-12-10 06:50:18', '2019-11-13 15:51:18', NULL, NULL);
INSERT INTO `groups` VALUES (2, '9c085751-ea3a-44e4-a858-e008894dc1f3', NULL, NULL, 'api', 'API', '{\"apis\":1,\"superuser\":1,\"make-api-call\":1}', 1, 1, 1, '2018-12-10 16:10:53', '2020-01-12 10:52:21', NULL, NULL);
INSERT INTO `groups` VALUES (3, '2e5c36e4-7ec2-4c77-8167-1e99237c1336', NULL, NULL, 'tenant-admin', 'Tenant Admin', '', 1, 5, 5, '1970-01-01 00:00:05', '2019-12-19 14:21:45', NULL, NULL);
INSERT INTO `groups` VALUES (4, 'bacee691-a0f7-4ba2-93b6-462b4af9cfb0', NULL, NULL, 'project-admin', 'Project Admin', '', 1, 5, 5, '2019-12-28 14:16:31', '2019-12-28 14:16:38', NULL, NULL);
INSERT INTO `groups` VALUES (16, '45efaa36-ea5a-4f9d-8eb7-722922c9dd9b', NULL, 1, 'artp-admin', 'Artemis Admin', '', 1, 5, 5, '1970-01-01 00:00:05', '2019-12-19 14:26:04', NULL, NULL);
INSERT INTO `groups` VALUES (17, 'c903c4b0-1e40-47eb-ad58-9a536f30bec2', NULL, 1, 'artp-buyer', 'Artemis Buyer', '', 1, 5, 5, '1970-01-01 00:00:05', '2019-12-19 14:26:59', NULL, NULL);
INSERT INTO `groups` VALUES (18, '28600a12-69ed-49a3-9be7-e825cf228822', NULL, 2, 'orhc-admin', 'Orange Admin', '', 0, 5, 5, '1970-01-01 00:00:05', '2019-12-19 14:27:35', NULL, NULL);
INSERT INTO `groups` VALUES (19, 'b07a9afb-3d15-45b6-9c53-5ee8c3541b58', NULL, 2, 'orhc-nurse', 'Nurse', '', 1, 5, 5, '1970-01-01 00:00:05', '2019-12-19 14:27:53', NULL, NULL);
INSERT INTO `groups` VALUES (20, 'f36dcced-f84f-4fdb-9948-a2c044729e22', NULL, 2, 'orhc-patient', 'Patient', '{\"widgets\":1,\"view-widgets\":1}', 1, 5, 5, '1970-01-01 00:00:05', '2020-01-08 10:16:46', NULL, NULL);
INSERT INTO `groups` VALUES (21, '3b426c6f-3b7c-487a-8008-15ead138ce4d', NULL, 2, 'orhc-patient-family-member', 'Family member', '', 1, 5, 5, '1970-01-01 00:00:05', '2019-12-19 14:28:51', NULL, NULL);
INSERT INTO `groups` VALUES (22, 'a457a065-fb79-4779-9e6f-8a00cb0c2e43', NULL, 2, 'orhc-api', 'API', '', 1, 5, 5, '1970-01-01 00:00:05', '2019-12-19 14:32:43', NULL, NULL);
INSERT INTO `groups` VALUES (23, '186062eb-3f99-40f7-a541-223996e1f4e6', NULL, 1, 'artp-api', 'API', '{\"API\":1,\"api\":1}', 1, 5, 5, '1970-01-01 00:00:05', '2020-01-05 05:57:53', NULL, NULL);
INSERT INTO `groups` VALUES (25, 'c998e022-4885-4585-a850-3d2f1afbdccd', NULL, NULL, 'test-group', 'Test Group', '{\"settings\":1,\"settings-view\":1,\"settings-create\":1,\"settings-update\":1,\"settings-delete\":1,\"settings-view-change-log\":1,\"settings-view-report\":1,\"settings-view-any\":1}', 1, 1, 1, '2020-01-08 10:36:31', '2020-01-08 13:26:30', NULL, NULL);
INSERT INTO `groups` VALUES (26, '03682753-1654-46f1-ad9d-7a7f78794a3d', NULL, NULL, 'user', 'User', '', 1, 1, 1, '2020-01-18 11:42:51', '2020-01-18 11:42:51', NULL, NULL);

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------
INSERT INTO `jobs` VALUES (3, 'default', '{\"displayName\":\"App\\\\Mainframe\\\\Notifications\\\\Auth\\\\VerifyEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:2641;s:9:\\\"relations\\\";a:1:{i:0;s:6:\\\"groups\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:44:\\\"App\\\\Mainframe\\\\Notifications\\\\Auth\\\\VerifyEmail\\\":9:{s:2:\\\"id\\\";s:36:\\\"cf179600-9439-43f6-a163-50de83a14f8b\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579368189, 1579368189);
INSERT INTO `jobs` VALUES (4, 'default', '{\"displayName\":\"App\\\\Mainframe\\\\Notifications\\\\Auth\\\\VerifyEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:2641;s:9:\\\"relations\\\";a:1:{i:0;s:6:\\\"groups\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:44:\\\"App\\\\Mainframe\\\\Notifications\\\\Auth\\\\VerifyEmail\\\":9:{s:2:\\\"id\\\";s:36:\\\"1ccb9d6e-46c6-4a82-a993-667c6275d9ae\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579368204, 1579368204);
INSERT INTO `jobs` VALUES (5, 'default', '{\"displayName\":\"App\\\\Mainframe\\\\Notifications\\\\Auth\\\\VerifyEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:2641;s:9:\\\"relations\\\";a:1:{i:0;s:6:\\\"groups\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:44:\\\"App\\\\Mainframe\\\\Notifications\\\\Auth\\\\VerifyEmail\\\":9:{s:2:\\\"id\\\";s:36:\\\"cb33c973-2401-4bd0-bffe-105d21b1d020\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579368221, 1579368221);

-- ----------------------------
-- Table structure for lorem_ipsums
-- ----------------------------
DROP TABLE IF EXISTS `lorem_ipsums`;
CREATE TABLE `lorem_ipsums`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `tenant_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hidden` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `textarea` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `textarea_ckeditor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `select_array` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `select_array_multiple` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dolor_sit_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `dolor_sit_ids` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `checkbox` int(255) NULL DEFAULT NULL,
  `is_active` tinyint(4) NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 306 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lorem_ipsums
-- ----------------------------
INSERT INTO `lorem_ipsums` VALUES (1, '2c9e9057-6095-4a48-aa9e-181e96172cb1', NULL, NULL, 'Test Input', NULL, 'Prior to proceeding with the enforcement of new rules and regulations , it was good if authorities concerned would have been taken of such possible unruly anarchies of the transport workers . asdfasdf sdfgsdfg sdfg', 'sdfgssdfgsdfgdfsg', 'Roads', NULL, NULL, '[\"0\",\"2\"]', 1, '[\"3\",\"1\"]', 1, 0, 1, 5, 5, '2019-11-20 16:01:06', '2020-01-17 06:36:36', NULL, NULL);
INSERT INTO `lorem_ipsums` VALUES (2, '175da4d1-e448-4e27-a642-4da5179ec5c6', 1, 1, 'ainw bNW', NULL, 'asdfasdf adfsdf', 'asdfasdfsdf asdfasdf', 'Country,takes,lorem', NULL, NULL, '[\"0\",\"1\"]', 1, '[\"1\"]', 2, 0, 1, 5, 5, '2019-11-20 16:01:06', '2020-01-18 17:19:24', NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_08_08_100000_create_telescope_entries_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_09_29_125631_create_permission_tables', 2);
INSERT INTO `migrations` VALUES (6, '2019_11_20_140017_create_lorem_ipsums_table', 3);
INSERT INTO `migrations` VALUES (7, '2019_11_20_140847_create_dolor_sits_table', 4);
INSERT INTO `migrations` VALUES (8, '2019_12_19_135326_create_subscriptions_table', 5);
INSERT INTO `migrations` VALUES (9, '2019_12_19_140356_create_packages_table', 6);
INSERT INTO `migrations` VALUES (10, '2019_12_19_143935_create_notifications_table', 6);
INSERT INTO `migrations` VALUES (11, '2019_12_19_152132_create_product_themes_table', 7);
INSERT INTO `migrations` VALUES (12, '2019_12_28_134422_create_mf_projects_table', 8);
INSERT INTO `migrations` VALUES (13, '2020_01_06_134600_create_jobs_table', 9);
INSERT INTO `migrations` VALUES (14, '2020_01_07_123232_create_audits_table', 10);
INSERT INTO `migrations` VALUES (15, '2020_01_07_132100_delete_changes_table', 11);
INSERT INTO `migrations` VALUES (16, '2020_01_17_120103_create_artm_products_table', 12);
INSERT INTO `migrations` VALUES (17, '2020_01_17_120806_create_artm_products_table', 13);
INSERT INTO `migrations` VALUES (18, '2020_01_17_123930_create_artm_products_table', 14);

-- ----------------------------
-- Table structure for module_groups
-- ----------------------------
DROP TABLE IF EXISTS `module_groups`;
CREATE TABLE `module_groups`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `route_path` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `route_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `level` int(11) NULL DEFAULT NULL,
  `order` int(11) NULL DEFAULT NULL,
  `default_route` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `color_css` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `icon_css` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_visible` smallint(255) UNSIGNED NULL DEFAULT NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of module_groups
-- ----------------------------
INSERT INTO `module_groups` VALUES (1, '770e22e8-e572-44a3-9a9a-be7fb1964ae5', 'app-settings', 'Settings', 'Manage configuration', 'app-settings', 'app-settings', 0, 0, 0, 'app-configs.index', 'aqua', 'fa fa-gears', 1, 1, 1, 1, '2018-12-10 06:47:46', '2019-10-28 14:07:42', NULL, NULL);
INSERT INTO `module_groups` VALUES (2, 'a0dc562b-d6ce-45d1-9279-2a8ca2982dc8', 'accounts', 'Accounts', NULL, 'app-settings', 'app-settings', 0, 0, 0, 'letsbab.index', 'aqua', 'fa fa-calculator', 1, 1, 1, 1, '2018-12-14 06:18:07', '2019-10-28 12:41:42', NULL, NULL);

-- ----------------------------
-- Table structure for modules
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `tenant_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `module_table` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `route_path` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '/relative/path/to/index',
  `route_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'some.name',
  `class_directory` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'app/Mainframe/Modules/SomeModules',
  `namespace` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `model` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'app/Mainframe/Modules/SomeModules/NameOfModule',
  `policy` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `processor` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `controller` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `view_directory` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `module_group_id` int(11) NULL DEFAULT NULL,
  `level` int(11) NULL DEFAULT NULL,
  `order` int(11) NULL DEFAULT NULL,
  `default_route` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `color_css` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `icon_css` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_visible` smallint(255) UNSIGNED NULL DEFAULT NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES (1, 'ca56b8a2-368a-4f84-8336-e9850c406e2d', 'modules', NULL, NULL, 'Module', 'Manage modules', 'modules', 'modules', 'modules', 'app/Mainframe/Modules/Modules', '\\App\\Mainframe\\Modules\\Modules', '\\App\\Mainframe\\Modules\\Modules\\Module', '\\App\\Mainframe\\Modules\\Modules\\ModulePolicy', '\\App\\Mainframe\\Modules\\Modules\\ModuleProcessor', '\\App\\Mainframe\\Modules\\Modules\\ModuleController', 'mainframe.modules.modules', 0, 1, 0, 0, 'modules.index', 'aqua', 'fa fa-puzzle-piece', 1, 1, 1, 1, '2018-12-10 06:47:46', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (2, '0b89564c-7198-4b1b-9869-a02a0e584262', 'module-groups', NULL, NULL, 'Module group', 'Manage module groups', 'module_groups', 'module-groups', 'module-groups', 'app/Mainframe/Modules/ModuleGroups', '\\App\\Mainframe\\Modules\\ModuleGroups', '\\App\\Mainframe\\Modules\\ModuleGroups\\ModuleGroup', '\\App\\Mainframe\\Modules\\ModuleGroups\\ModuleGroupPolicy', '\\App\\Mainframe\\Modules\\ModuleGroups\\ModuleGroupProcessor', '\\App\\Mainframe\\Modules\\ModuleGroups\\ModuleGroupController', 'mainframe.modules.module-groups', 0, 1, 0, 0, 'modulegroups.index', 'aqua', 'fa fa-puzzle-piece', 1, 1, 1, 1, '2018-12-10 06:47:46', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (3, 'eee7b4a8-abab-4b79-a751-b681624eb586', 'tenants', NULL, NULL, 'Tenant', 'Manage tenants', 'tenants', 'tenants', 'tenants', 'app/Mainframe/Modules/Tenants', '\\App\\Mainframe\\Modules\\Tenants', '\\App\\Mainframe\\Modules\\Tenants\\Tenant', '\\App\\Mainframe\\Modules\\Tenants\\TenantPolicy', '\\App\\Mainframe\\Modules\\Tenants\\TenantProcessor', '\\App\\Mainframe\\Modules\\Tenants\\TenantController', 'mainframe.modules.tenants', 0, 1, 0, 0, 'tenants.index', 'aqua', 'fa fa-plus', 1, 1, 1, 1, '2018-12-10 06:47:46', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (4, '8f27f918-3a05-4b04-9bd3-d953e9492293', 'users', NULL, NULL, 'User', 'Manage users', 'users', 'users', 'users', 'app/Mainframe/Modules/Users', '\\App\\Mainframe\\Modules\\Users', '\\App\\Mainframe\\Modules\\Users\\User', '\\App\\Mainframe\\Modules\\Users\\UserPolicy', '\\App\\Mainframe\\Modules\\Users\\UserProcessor', '\\App\\Mainframe\\Modules\\Users\\UserController', 'mainframe.modules.users', 0, 0, 0, 4, 'users.index', 'aqua', 'fa fa-user-plus', 1, 1, 1, 1, '2018-12-10 06:47:46', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (5, '14612def-5850-49fb-bf99-48d99c73b589', 'groups', NULL, NULL, 'Group', 'Manage groups', 'groups', 'groups', 'groups', 'app/Mainframe/Modules/Groups', '\\App\\Mainframe\\Modules\\Groups', '\\App\\Mainframe\\Modules\\Groups\\Group', '\\App\\Mainframe\\Modules\\Groups\\GroupPolicy', '\\App\\Mainframe\\Modules\\Groups\\GroupProcessor', '\\App\\Mainframe\\Modules\\Groups\\GroupController', 'mainframe.modules.groups', 0, 1, 0, 0, 'groups.index', 'aqua', 'fa fa-plus', 1, 1, 1, 1, '2018-12-10 06:47:46', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (6, '50ed1cc8-3ecf-4caf-9724-819cd90dd3d2', 'uploads', NULL, NULL, 'Upload', 'Manage uploads', 'uploads', 'uploads', 'uploads', 'app/Mainframe/Modules/Uploads', '\\App\\Mainframe\\Modules\\Uploads', '\\App\\Mainframe\\Modules\\Uploads\\Upload', '\\App\\Mainframe\\Modules\\Uploads\\UploadPolicy', '\\App\\Mainframe\\Modules\\Uploads\\UploadProcessor', '\\App\\Mainframe\\Modules\\Uploads\\UploadController', 'mainframe.modules.uploads', 0, 1, 0, 0, 'uploads.index', 'aqua', 'fa fa-plus', 1, 1, 1, 1, '2018-12-13 20:57:47', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (21, '6d1fff93-328b-4501-b643-e21cc6cbf9d2', 'settings', NULL, NULL, 'Setting', 'Manage settings', 'settings', 'settings', 'settings', 'app/Mainframe/Modules/Settings', '\\App\\Mainframe\\Modules\\Settings', '\\App\\Mainframe\\Modules\\Settings\\Setting', '\\App\\Mainframe\\Modules\\Settings\\SettingPolicy', '\\App\\Mainframe\\Modules\\Settings\\SettingProcessor', '\\App\\Mainframe\\Modules\\Settings\\SettingController', 'mainframe.modules.settings', 0, 1, 0, 0, 'settings.index', 'aqua', 'fa fa-list-alt', 1, 1, 1, 1, '2018-12-24 19:56:38', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (23, '3207985e-3886-4a1c-8121-c8e4147cfa72', 'reports', NULL, NULL, 'Report', 'Manage reports', 'reports', 'reports', 'reports', 'app/Mainframe/Modules/Reports', '\\App\\Mainframe\\Modules\\Reports', '\\App\\Mainframe\\Modules\\Reports\\Report', '\\App\\Mainframe\\Modules\\Reports\\ReportPolicy', '\\App\\Mainframe\\Modules\\Reports\\ReportProcessor', '\\App\\Mainframe\\Modules\\Reports\\ReportController', 'mainframe.modules.reports', 0, 0, 0, 999, 'reports.index', 'aqua', 'fa fa-pie-chart', 1, 1, 1, 1, '2019-01-17 05:00:25', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (50, '778e5ea8-acee-4458-aab7-5e275a4084a5', 'lorem-ipsums', NULL, NULL, 'Lorem ipsum', 'Manage lorem ipsums', 'lorem_ipsums', 'lorem-ipsums', 'lorem-ipsums', 'app/Mainframe/Modules/Samples/LoremIpsums', '\\App\\Mainframe\\Modules\\LoremIpsums', '\\App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum', '\\App\\Mainframe\\Modules\\LoremIpsums\\LoremIpsumPolicy', '\\App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsumProcessor', '\\App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsumController', 'mainframe.modules.samples.lorem-ipsums', 0, 1, 0, 0, 'lorem-ipsums.index', 'aqua', 'fa fa-plus', 1, 1, 1, 1, '2019-11-20 14:08:23', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (51, 'a0c23e13-1bd6-4346-828b-b7878d67ee29', 'dolor-sits', NULL, NULL, 'Dolor sit', 'Manage dolor sits', 'dolor-sits', 'dolor-sits', 'dolor-sits', 'app/Mainframe/Modules/Samples/DolorSits', '\\App\\Mainframe\\Modules\\DolorSits', '\\App\\Mainframe\\Modules\\Samples\\DolorSits\\DolorSit', '\\App\\Mainframe\\Modules\\DolorSits\\DolorSitPolicy', '\\App\\Mainframe\\Modules\\Samples\\DolorSits\\DolorSitProcessor', '\\App\\Mainframe\\Modules\\Samples\\DolorSits\\DolorSitController', 'mainframe.modules.samples.dolor-sits', 0, 1, 0, 0, 'dolor-sits.index', 'aqua', 'fa fa-plus', 1, 1, 1, 1, '2019-11-20 14:10:34', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (52, '2da95896-4a15-4ad6-9919-767dabeef9fe', 'subscriptions', NULL, NULL, 'Subscription', 'Manage subscriptions', 'subscriptions', 'subscriptions', 'subscriptions', 'app/Mainframe/Modules/Subscriptions', '\\App\\Mainframe\\Modules\\Subscriptions', '\\App\\Mainframe\\Modules\\Subscriptions\\Subscription', '\\App\\Mainframe\\Modules\\Subscriptions\\SubscriptionPolicy', '\\App\\Mainframe\\Modules\\Subscriptions\\SubscriptionProcessor', '\\App\\Mainframe\\Modules\\Subscriptions\\SubscriptionController', 'mainframe.modules.subscriptions', 0, 1, 0, 0, 'subscriptions.index', 'aqua', 'fa fa-plus', 1, 1, 1, 1, '2019-12-19 14:00:52', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (53, '11a3b809-b3e0-4c8f-b59a-b99192e99588', 'packages', NULL, NULL, 'Package', 'Manage packages', 'packages', 'packages', 'packages', 'app/Mainframe/Modules/Packages', '\\App\\Mainframe\\Modules\\Packages', '\\App\\Mainframe\\Modules\\Packages\\Package', '\\App\\Mainframe\\Modules\\Packages\\PackagePolicy', '\\App\\Mainframe\\Modules\\Packages\\PackageProcessor', '\\App\\Mainframe\\Modules\\Packages\\PackageController', 'mainframe.modules.packages', 0, 1, 0, 0, 'packages.index', 'aqua', 'fa fa-plus', 1, 1, 1, 1, '2019-12-19 14:39:47', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (54, 'c4582951-e9ee-4d1d-a9de-9230c037699a', 'countries', NULL, NULL, 'Country', 'Manage countries', 'countries', 'countries', 'countries', 'app/Mainframe/Modules/Countries', '\\App\\Mainframe\\Modules\\Countries', '\\App\\Mainframe\\Modules\\Countries\\Country', '\\App\\Mainframe\\Modules\\Countries\\CountryPolicy', '\\App\\Mainframe\\Modules\\Countries\\CountryProcessor', '\\App\\Mainframe\\Modules\\Countries\\CountryController', 'mainframe.modules.countries', 0, 1, 0, 0, 'countries.index', 'aqua', 'fa fa-plus', 1, 1, 1, 1, '2019-12-19 14:39:47', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (55, 'cb21c345-ba75-452c-b326-5c20f6cd17b8', 'notifications', NULL, NULL, 'Notification', 'List of notifications', 'notifications', 'notifications', 'notifications', 'app/Mainframe/Modules/Notifications', '\\App\\Mainframe\\Modules\\Notifications', '\\App\\Mainframe\\Modules\\Notifications\\Notification', '\\App\\Mainframe\\Modules\\Notifications\\NotificationPolicy', '\\App\\Mainframe\\Modules\\Notifications\\NotificationProcessor', '\\App\\Mainframe\\Modules\\Notifications\\NotificationController', 'mainframe.modules.notifications', 0, 1, 0, 0, 'notifications.index', 'aqua', 'fa fa-plus', 1, 1, 1, 1, '2019-12-19 14:39:47', '2020-01-18 17:28:21', NULL, NULL);
INSERT INTO `modules` VALUES (57, '47df59d0-bacb-4d1e-bfda-01c051c63681', 'projects', NULL, NULL, 'Project', 'Manage projects', 'projects', 'projects', 'projects', 'app/Mainframe/Modules/Projects', '\\App\\Mainframe\\Modules\\Projects', '\\App\\Mainframe\\Modules\\Projects\\Project', '\\App\\Mainframe\\Modules\\Projects\\ProjectPolicy', '\\App\\Mainframe\\Modules\\Projects\\ProjectProcessor', '\\App\\Mainframe\\Modules\\Projects\\ProjectController', 'mainframe.modules.projects', 0, 1, 0, 0, 'projects.index', 'aqua', 'fa fa-plus', 1, 1, 1, 1, '2019-12-28 13:57:38', '2020-01-18 17:28:21', NULL, NULL);

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `tenant_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `element_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `element_uuid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `notifications_notifiable_type_notifiable_id_index`(`notifiable_type`, `notifiable_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for packages
-- ----------------------------
DROP TABLE IF EXISTS `packages`;
CREATE TABLE `packages`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `monthly_price` decimal(10, 2) UNSIGNED NULL DEFAULT NULL,
  `yearly_price` decimal(10, 2) NULL DEFAULT NULL,
  `modules` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `limits` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint(4) NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('tenant113@gmail.com', '$2y$10$qdhrBqozQiQbeef4zPWaJ.uG90q8DuBlNceF.NXSS0GzTzhxTkze6', '2019-12-28 10:18:21');
INSERT INTO `password_resets` VALUES ('namup@mailinator.net', '$2y$10$dQx0uGG.wrrsnxPmHOdyHexhOOBdsbA0NDJAXtuRI1y9jpHgWqp3i', '2020-01-07 11:31:54');
INSERT INTO `password_resets` VALUES ('su@mainframe', '$2y$10$TBv5sLxs8QaszW3Ll9fkyu.dAvN3t6yV6QSo2Qaf7/psF9lJmy95q', '2020-01-18 15:56:50');

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `code` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `configuration` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'JSON configuration for a project',
  `route_group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `class_directory` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `namespace` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `view_directory` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint(4) NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES (1, 'b632635d-877b-461e-8f3f-97256567eea7', 'artp', 'ArtemisPod', NULL, NULL, 'artp', 'app/Projects/ArtemisPod', '\\App\\ArtemisPod', 'mainframe.projects.artemis-pod', 1, 5, 5, '2019-12-28 14:13:40', '2019-12-28 14:13:40', NULL, NULL);
INSERT INTO `projects` VALUES (2, 'cedb4d2c-a465-4bb4-818e-09100ed02580', 'orhc', 'OrangeHC', NULL, NULL, 'orhc', 'app/Projects/OrangeHc', '\\App\\OrangeHC', 'mainframe.projects.orange-hc', 1, 5, 5, '2019-12-28 14:14:04', '2019-12-28 14:14:04', NULL, NULL);

-- ----------------------------
-- Table structure for reports
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `tenant_id` int(11) NULL DEFAULT NULL,
  `name` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `title` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `parameters` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `version` varchar(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `module_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `is_module_default` smallint(6) NULL DEFAULT NULL,
  `tags` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) UNSIGNED NULL DEFAULT NULL,
  `updated_by` int(11) UNSIGNED NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of reports
-- ----------------------------
INSERT INTO `reports` VALUES (1, '4d59ac27-554c-4b0a-993c-e2664119e93f', NULL, NULL, 'List of App users with summary', NULL, 'List of App users with summary', NULL, '/users/report?alias_columns_csv=ID%2CName%2CEmail%2CGroup%2CFull%20name%2CGender%2CDOB%2CAddress%2CCity%2CCountry%2CZip%20code%2CPhone%2CMobile%2CFirst%20Login%2CLast%20login%2CShare%20code%2CCurrency%2CAcc%20Name%2CAcc%20number%2CAcc%20Type%2CAcc%20country%2CAcc%20City%2CAcc%20State%2CAcc%20Post%20Code%2CAcc%20First%20Line%2CSort%20Code%2CABARTN%2CIBAN%2CSWIFT%2CDevice%2CApp%20Version%2CTransferwise%20ID%2CSocial%20ID%2CSocial%20Acc%20Type%2CGift%20Aid%3F%2CTotal%20Commission%2CTotal%20Paid%2CDue%2CTotal%20Donated%2CDonation%20Due%2CRecommendations%2CVisits%2CConversions%2CAvg.%20Buzz%20Off%20Rate%2CNext%20Payment%2CLast%20Payment%2CEmail%20Verified%2CRegistered%20at%2CLast%20updated&created_at_from=&created_at_till=&group_ids%5B0%5D=8&order_by=id%20desc&report_name=List%20of%20App%20users%20with%20summary&rows_per_page=10&select_columns_csv=id%2Cname%2Cemail%2Cgroup_ids_csv%2Cis_active%2Ccreated_at%2Cupdated_at%2Cfirst_name%2Clast_name%2Cgender%2Cdob%2Caddress1%2Caddress2%2Ccity%2Ccounty%2Ccountry_name%2Czip_code%2Cphone%2Cmobile%2Cfirst_login_at%2Clast_login_at%2Cshare_code%2Caccount_holder_name%2Caccount_number%2Caccount_type%2Caccount_country%2Caccount_city%2Caccount_state%2Caccount_post_code%2Caccount_first_line%2Csort_code%2Cabartn%2Ciban%2Cswift%2Cdevice_name%2Ccurrent_app_version%2Ctransferwise_account_id%2Cemail_verified_at%2Ccurrency%2Csocial_account_id%2Csocial_account_type%2Cgift_aid_checked%2Cstat_total_commission_to_date_in_user_currency%2Cstat_total_commission_to_date_in_user_currency_formatted%2Cstat_total_commission_to_date_in_lb_currency%2Cstat_total_commission_to_date_in_lb_currency_formatted%2Cstat_total_amounts_paid_to_date_in_user_currency%2Cstat_total_amounts_paid_to_date_in_user_currency_formatted%2Cstat_total_amounts_paid_to_date_in_lb_currency%2Cstat_total_amounts_paid_to_date_in_lb_currency_formatted%2Cstat_amount_due_in_user_currency%2Cstat_amount_due_in_user_currency_formatted%2Cstat_amount_due_in_lb_currency%2Cstat_amount_due_in_lb_currency_formatted%2Cstat_total_donation_to_date_in_user_currency%2Cstat_total_donation_to_date_in_user_currency_formatted%2Cstat_total_donation_to_date_in_lb_currency%2Cstat_total_donation_to_date_in_lb_currency_formatted%2Cstat_donation_due_in_user_currency%2Cstat_donation_due_in_user_currency_formatted%2Cstat_donation_due_in_lb_currency%2Cstat_donation_due_in_lb_currency_formatted%2Cstat_no_of_recommendations%2Cstat_no_of_successful_recommendations%2Cstat_no_of_conversions%2Cstat_avg_buzz_of_rate%2Cnext_payment_on%2Clast_payment_on&show_columns_csv=id%2Cname%2Cemail%2Cgroup_ids_csv%2Cfull_name%2Cgender%2Cdob%2Caddress1%2Ccity%2Ccountry_name%2Czip_code%2Cphone%2Cmobile%2Cfirst_login_at%2Clast_login_at%2Cshare_code%2Ccurrency%2Caccount_holder_name%2Caccount_number%2Caccount_type%2Caccount_country%2Caccount_city%2Caccount_state%2Caccount_post_code%2Caccount_first_line%2Csort_code%2Cabartn%2Ciban%2Cswift%2Cdevice_name%2Ccurrent_app_version%2Ctransferwise_account_id%2Csocial_account_id%2Csocial_account_type%2Cgift_aid_checked%2Cstat_total_commission_to_date_in_user_currency_formatted%2Cstat_total_amounts_paid_to_date_in_user_currency_formatted%2Cstat_amount_due_in_user_currency_formatted%2Cstat_total_donation_to_date_in_user_currency_formatted%2Cstat_donation_due_in_user_currency_formatted%2Cstat_no_of_recommendations%2Cstat_no_of_successful_recommendations%2Cstat_no_of_conversions%2Cstat_avg_buzz_of_rate%2Cnext_payment_on%2Clast_payment_on%2Cemail_verified_at%2Ccreated_at%2Cupdated_at&submit=Run', NULL, '1.0', 4, 1, NULL, 1, 1, 1, '2019-03-03 14:05:06', '2019-03-03 14:05:06', NULL, NULL);
INSERT INTO `reports` VALUES (2, '71566f5a-85c9-48d5-807c-6908d0737a39', NULL, NULL, 'App version report', NULL, 'App version report', NULL, '/users/report?alias_columns_csv=ID%2CName%2CEmail%2CGroup%2CFull%20name%2CKuldeeps%20Given%20Title&created_at_from=&created_at_till=&group_ids%5B0%5D=8&order_by=id%20desc&report_name=List%20of%20App%20users%20with%20summary&rows_per_page=10&select_columns_csv=id%2Cname%2Cemail%2Cgroup_ids_csv%2Cis_active%2Ccreated_at%2Cupdated_at%2Cfirst_name%2Clast_name%2Cgender%2Cdob%2Caddress1%2Caddress2%2Ccity%2Ccounty%2Ccountry_name%2Czip_code%2Cphone%2Cmobile%2Cfirst_login_at%2Clast_login_at%2Cshare_code%2Caccount_holder_name%2Caccount_number%2Caccount_type%2Caccount_country%2Caccount_city%2Caccount_state%2Caccount_post_code%2Caccount_first_line%2Csort_code%2Cabartn%2Ciban%2Cswift%2Cdevice_name%2Ccurrent_app_version%2Ctransferwise_account_id%2Cemail_verified_at%2Ccurrency%2Csocial_account_id%2Csocial_account_type%2Cgift_aid_checked%2Cstat_total_commission_to_date_in_user_currency%2Cstat_total_commission_to_date_in_user_currency_formatted%2Cstat_total_commission_to_date_in_lb_currency%2Cstat_total_commission_to_date_in_lb_currency_formatted%2Cstat_total_amounts_paid_to_date_in_user_currency%2Cstat_total_amounts_paid_to_date_in_user_currency_formatted%2Cstat_total_amounts_paid_to_date_in_lb_currency%2Cstat_total_amounts_paid_to_date_in_lb_currency_formatted%2Cstat_amount_due_in_user_currency%2Cstat_amount_due_in_user_currency_formatted%2Cstat_amount_due_in_lb_currency%2Cstat_amount_due_in_lb_currency_formatted%2Cstat_total_donation_to_date_in_user_currency%2Cstat_total_donation_to_date_in_user_currency_formatted%2Cstat_total_donation_to_date_in_lb_currency%2Cstat_total_donation_to_date_in_lb_currency_formatted%2Cstat_donation_due_in_user_currency&show_columns_csv=id%2Cname%2Cgroup_ids_csv%2Cfull_name%2Cgender%2Ccurrent_app_version&submit=Run', NULL, '1.0', 4, 0, NULL, 1, 1, 1, '2019-03-04 06:47:24', '2019-03-04 06:47:24', NULL, NULL);
INSERT INTO `reports` VALUES (3, '8466aa36-3605-4ca6-a3e2-95549c363996', NULL, NULL, 'List of App users with summary only for UK users', NULL, 'List of App users with summary only for UK users', NULL, '/users/report?alias_columns_csv=ID%2CName%2CEmail%2CGroup%2CFull%20name%2CGender%2CDOB%2CAddress%2CCity%2CCountry%2CZip%20code%2CPhone%2CMobile%2CFirst%20Login%2CLast%20login%2CShare%20code%2CCurrency%2CAcc%20Name%2CAcc%20number%2CAcc%20Type%2CAcc%20country%2CAcc%20City%2CAcc%20State%2CAcc%20Post%20Code%2CAcc%20First%20Line%2CSort%20Code%2CABARTN%2CIBAN%2CSWIFT%2CDevice%2CApp%20Version%2CTransferwise%20ID%2CSocial%20ID%2CSocial%20Acc%20Type%2CGift%20Aid%3F%2CTotal%20Commission%2CTotal%20Paid%2CDue%2CTotal%20Donated%2CDonation%20Due%2CRecommendations%2CVisits%2CConversions%2CAvg.%20Buzz%20Off%20Rate%2CNext%20Payment%2CLast%20Payment%2CEmail%20Verified%2CRegistered%20at%2CLast%20updated&country_id%5B0%5D=187&created_at_from=&created_at_till=&group_ids%5B0%5D=8&order_by=id%20desc&report_name=List%20of%20App%20users%20with%20summary&rows_per_page=10&show_columns_csv=id%2Cname%2Cemail%2Cgroup_ids_csv%2Cfull_name%2Cgender%2Cdob%2Caddress1%2Ccity%2Ccountry_name%2Czip_code%2Cphone%2Cmobile%2Cfirst_login_at%2Clast_login_at%2Cshare_code%2Ccurrency%2Caccount_holder_name%2Caccount_number%2Caccount_type%2Caccount_country%2Caccount_city%2Caccount_state%2Caccount_post_code%2Caccount_first_line%2Csort_code%2Cabartn%2Ciban%2Cswift%2Cdevice_name%2Ccurrent_app_version%2Ctransferwise_account_id%2Csocial_account_id%2Csocial_account_type%2Cgift_aid_checked%2Cstat_total_commission_to_date_in_user_currency_formatted%2Cstat_total_amounts_paid_to_date_in_user_currency_formatted%2Cstat_amount_due_in_user_currency_formatted%2Cstat_total_donation_to_date_in_user_currency_formatted%2Cstat_donation_due_in_user_currency_formatted%2Cstat_no_of_recommendations%2Cstat_no_of_successful_recommendations%2Cstat_no_of_conversions%2Cstat_avg_buzz_of_rate%2Cnext_payment_on%2Clast_payment_on%2Cemail_verified_at%2Ccreated_at%2Cupdated_at&submit=Run', NULL, NULL, 4, 0, NULL, 1, 1, 1, '2019-03-08 10:28:00', '2019-03-08 10:28:00', NULL, NULL);
INSERT INTO `reports` VALUES (4, '60218627-a0a6-4209-8991-eb26ba1230ef', NULL, NULL, 'Recommendation report', NULL, 'Recommendation report', NULL, '/recommendurls/report?submit=Run&report_name=&rows_per_page=25&created_at_from=&created_at_till=&is_shared=1&show_columns_csv=id%2Crecommender_user_id%2Cuser_name%2Ccreated_at%2Curl%2Cshort_code%2Cpartner_id%2Cpartner_name%2Cproduct_name%2Cproduct_price_currency%2Cproduct_price%2Clb_env%2Cexpires_at%2Chas_expired%2Ccharity_id%2Ccharity_name%2Ccommission_percentage_lb%2Ccommission_percentage_recommender%2Ccharity_share_percentage%2Cis_shared&alias_columns_csv=ID%2CUser+ID%2CUser+name%2CTIme%2CURL%2CShort+Code%2CPartner+ID%2CPartner+Name%2CProduct%2CCurrency%2CPrice%2CENV%2CExpiry+time%2CExpired%3F%2CCharity+ID%2CCharity+Name%2CLB+%25%2CUser+%25%2CCharity+%25%2CShared%3F&order_by=created_at+desc&is_test=0', NULL, '1.0', 15, 1, NULL, 1, 1, 1, '2019-03-04 20:07:53', '2019-03-04 20:11:34', NULL, NULL);
INSERT INTO `reports` VALUES (5, '498c2eb3-f950-4627-8f77-ddabd46237f1', NULL, NULL, 'Partners report', NULL, 'Partners report', NULL, '/partners/report?submit=Run&report_name=&rows_per_page=25&created_at_from=&created_at_till=&show_columns_csv=id%2Cname%2Csitecms_name%2Clive_url_root%2Cstatus%2Cis_published%2Cpublished_at%2Cis_active%2Caddress1%2Caddress2%2Ccity%2Ccounty%2Czip_code%2Ccountry_name%2Cphone%2Cmobile%2Clegal_name%2Cvat_no%2Cregistration_no%2Cein_no%2Ccontact_name%2Ccontact_email%2Ccontact_phone%2Ccontact_address%2Cfinance_contact_name%2Cfinance_contact_email%2Cfinance_contact_phone%2Cfinance_contact_address%2Ccommission_percentage_lb%2Ccommission_percentage_recommender%2Ccommission_percentage_total%2Crecommendation_expiry_in_days%2Crecommendation_count%2Caccount_holder_name%2Cbank_name%2Caccount_number%2Caccount_type%2Caccount_country%2Caccount_city%2Caccount_state%2Caccount_post_code%2Caccount_first_line%2Csort_code%2Cabartn%2Ciban%2Cswift%2Ccurrency%2Cbank_account_address%2Caccount_name&alias_columns_csv=id%2Cname%2Csitecms_name%2Clive_url_root%2Cstatus%2Cis_published%2Cpublished_at%2Cis_active%2Caddress1%2Caddress2%2Ccity%2Cco/unty%2Czip_code%2Ccountry_name%2Cphone%2Cmobile%2Clegal_name%2Cvat_no%2Cregistration_no%2Cein_no%2Ccontact_name%2Ccontact_email%2Ccontact_phone%2Ccontact_address%2Cfinance_contact_name%2Cfinance_contact_email%2Cfinance_contact_phone%2Cfinance_contact_address%2Ccommission_percentage_lb%2Ccommission_percentage_recommender%2Ccommission_percentage_total%2Crecommendation_expiry_in_days%2Crecommendation_count%2Caccount_holder_name%2Cbank_name%2Caccount_number%2Caccount_type%2Caccount_country%2Caccount_city%2Caccount_state%2Caccount_post_code%2Caccount_first_line%2Csort_code%2Cabartn%2Ciban%2Cswift%2Ccurrency%2Cbank_account_address%2Caccount_name&order_by=name+ASC\r\n', NULL, '1.0', 13, 1, NULL, 1, 1, 1, '2019-03-04 20:46:52', '2019-03-04 20:46:52', NULL, NULL);
INSERT INTO `reports` VALUES (6, '892f6c49-c1dd-43c8-b284-a006bbceab94', NULL, NULL, 'Invoices base report (Combines Users, Charities and Partners)', NULL, 'Invoices base report (Combines Users, Charities and Partners)', NULL, '/invoices/report?alias_columns_csv=&created_at_from=&created_at_till=&is_active=0&is_published=0&order_by=&report_name=&rows_per_page=10&show_columns_csv=&submit=Run', NULL, '1.0', 18, 1, NULL, 1, 1, 1, '2019-03-04 21:10:36', '2019-03-11 12:05:05', NULL, NULL);
INSERT INTO `reports` VALUES (8, '962f7bdb-d567-4b0e-b53d-b87d1d8a663d', NULL, NULL, 'Monthly Invoicing Report', NULL, 'Monthly Invoicing Report', 'Monthly report for manual invoicing', 'ns_csv=&submit=Run\r\n/purchases/report?alias_columns_csv=Id%2CPartner%20Name%2CProduct%20Name%2CPurchase%20Data%2CProduct%20Price%20in%20Product%20Currency%2CUser%20Commission%20in%20Partner%20Currency%2CCharity%20Donation%20in%20Partner%20Currency&from_date=&is_approved=%20&order_by=&partner_env=%20&report_name=&rows_per_page=25&show_columns_csv=id%2Cpartner_name%2Cproduct_name%2Cpurchase_data%2Cproduct_price_in_product_currency%2Cuser_commission_in_partner_currency%2Ccharity_share_percentage%2Ccharity_donation_in_partner_currency%2Clb_commission_in_partner_currency%2Cpartner_currency&submit=Run&to_date=', NULL, '1.0', 23, 0, 'Invoicing', 1, 1259, 1259, '2019-03-29 16:37:22', '2019-03-29 16:51:40', '2019-03-29 16:51:40', NULL);
INSERT INTO `reports` VALUES (9, '20de65bf-c270-4821-a037-d7e51778bcda', NULL, NULL, 'Conversion report (partner currency)', NULL, 'Conversion report (partner currency)', 'Transaction detail report - all values in partner currency (for invoicing)', '/purchases/report?alias_columns_csv=Partner%2CPartner%20Currency%2CTransaction%20ID%2CProduct%20Name%2CProduct%20SKU%2CPurchased%20At%2CPrice%2CUser%20Commission%2CCharity%20Selected%2CCharity%20%25age%2CCharity%20Donation%2CLetsBab%20Commission&from_date=&is_approved=%20&order_by=&partner_env=%20&report_name=&rows_per_page=25&show_columns_csv=partner_name%2Cpartner_currency%2Cid%2Cproduct_name%2Cproduct_sku%2Cpurchased_at%2Cproduct_price_in_partner_currency%2Cuser_commission_in_partner_currency%2Ccharity_name%2Ccharity_share_percentage%2Ccharity_donation_in_partner_currency%2Clb_commission_in_partner_currency&submit=Run&to_date=', NULL, '1.0', 17, 0, NULL, 1, 1259, 1259, '2019-03-29 16:51:28', '2019-03-29 16:51:28', NULL, NULL);
INSERT INTO `reports` VALUES (10, '771c2d02-01ea-4d44-821a-2673c5b66386', NULL, NULL, 'Conversion report - Default', NULL, 'Conversion report - Default', 'Default report for purchase', '/purchases/report?alias_columns_csv=ID%2CCreated%20at%2CProduct%2CSKU%2COrder%2CPartner%2CCharity%20Name%2CCurrency%2CPrice%2CUser%2CChariy%2Cstatus%2CShort%20Code&from_date=&is_approved=%20&order_by=&pur_partner_env=%20&report_name=&route=&rows_per_page=25&show_columns_csv=id%2Ccreated_at%2Cproduct_name%2Cproduct_sku%2Cproduct_order_id%2Cpartner_name%2Ccharity_name%2Cproduct_currency%2Cproduct_price_in_product_currency%2Cuser_commission_in_partner_currency%2Ccharity_donation_in_partner_currency%2Cstatus%2Crecommendurl_short_code&submit=Run&to_date=', NULL, '1.0', 17, 1, 'default', 1, 1, 1, '2019-04-02 09:51:09', '2019-04-02 14:07:00', NULL, NULL);
INSERT INTO `reports` VALUES (11, '751545d5-a4a0-49fe-96d4-775c47ec17bb', NULL, NULL, 'Recommendation Report with Test Field', NULL, 'Recommendation Report with Test Field', 'Recommendation data with ability to filter out test', '/recommendurls/report?alias_columns_csv=ID%2CUser%20ID%2CUser%20name%2CTIme%2CURL%2CShort%20Code%2CPartner%20ID%2CPartner%20Name%2CProduct%2CCurrency%2CPrice%2CENV%2CExpiry%20time%2CExpired%3F%2CCharity%20ID%2CCharity%20Name%2CLB%20%25%2CUser%20%25%2CCharity%20%25%2CShared%3F%2CTest&created_at_from=&created_at_till=&expires_at_from=&expires_at_till=&has_expired=0&is_shared=1&is_test=0&order_by=created_at%20desc&report_name=&rows_per_page=25&show_columns_csv=id%2Crecommender_user_id%2Cuser_name%2Ccreated_at%2Curl%2Cshort_code%2Cpartner_id%2Cpartner_name%2Cproduct_name%2Cproduct_price_currency%2Cproduct_price%2Clb_env%2Cexpires_at%2Chas_expired%2Ccharity_id%2Ccharity_name%2Ccommission_percentage_lb%2Ccommission_percentage_recommender%2Ccharity_share_percentage%2Cis_shared%2Cis_test&submit=Run', NULL, NULL, 15, 0, NULL, 1, 1259, 1259, '2019-04-04 21:06:39', '2019-04-04 21:06:39', NULL, NULL);
INSERT INTO `reports` VALUES (12, 'bbb26cc6-da3b-48d4-8658-e95b164aae90', NULL, NULL, 'Claire - Charity Report', NULL, 'Claire - Charity Report', NULL, '/purchases/report?alias_columns_csv=ID%2CCreated%20at%2CProduct%2CSKU%2COrder%2CPartner%2CCharity%20Name%2CCurrency%2CPrice%2CUser%2CChariy%2Cstatus%2CShort%20Code%2CCharity%20Share%20Percentage%2Cuser_name%2Crecommender_user_id%2Crecommender_full_name%2Ccountry_name&from_date=&is_approved=%20&is_test=0&order_by=&partner_env=%20&report_name=&route=&rows_per_page=25&show_columns_csv=id%2Ccreated_at%2Cproduct_name%2Cproduct_sku%2Cproduct_order_id%2Cpartner_name%2Ccharity_name%2Cproduct_currency%2Cproduct_price_in_product_currency%2Cuser_commission_in_partner_currency%2Ccharity_donation_in_partner_currency%2Cstatus%2Crecommendurl_short_code%2Ccharity_share_percentage%2Cuser_name%2Crecommender_user_id%2Crecommender_full_name%2Ccountry_name&submit=Run&to_date=', NULL, NULL, 17, 0, NULL, 0, 1863, 1863, '2019-04-16 13:41:07', '2019-04-16 13:41:07', NULL, NULL);
INSERT INTO `reports` VALUES (13, 'efc26b7f-f8d3-4771-90e2-69a7857e9bb4', NULL, NULL, 'User & charity balances  for invoicing', NULL, 'User & charity balances  for invoicing', 'Gives user balances in the liability currency, and charity balances in the liability currency  for invoicing.', NULL, NULL, NULL, 0, 0, NULL, 0, 1259, 1259, '2019-05-05 03:31:59', '2019-05-05 03:32:22', '2019-05-05 03:32:22', NULL);
INSERT INTO `reports` VALUES (14, '1b2690aa-ea69-41d0-b400-7aed3cdf406e', NULL, NULL, 'Conversions with User Commission in User Currency & Charity Donations in Charity Currency', NULL, 'Conversions with User Commission in User Currency & Charity Donations in Charity Currency', NULL, '/purchases/report?alias_columns_csv=ID%2CCreated%20at%2CProduct%2CSKU%2COrder%2CPartner%2CCharity%20Name%2CCurrency%2CPrice%2CUser%2CChariy%2Cstatus%2CShort%20Code%2CUser%20Currency%2CUser%20Commission%20User%20Currency%2CCharity%20Currency%2CCharity%20Donation%20in%20Charity%20Currency&from_date=&is_approved=%20&is_test=0&order_by=&partner_env=%20&report_name=&route=&rows_per_page=25&show_columns_csv=id%2Ccreated_at%2Cproduct_name%2Cproduct_sku%2Cproduct_order_id%2Cpartner_name%2Ccharity_name%2Cproduct_currency%2Cproduct_price_in_product_currency%2Cuser_commission_in_partner_currency%2Ccharity_donation_in_partner_currency%2Cstatus%2Crecommendurl_short_code%2Cuser_currency%2Cuser_commission_in_user_currency%2Ccharity_currency%2Ccharity_donation_charity_currency&submit=Run&to_date=', NULL, NULL, 17, 0, NULL, 0, 1259, 1259, '2019-05-05 03:35:42', '2019-05-05 03:35:42', NULL, NULL);
INSERT INTO `reports` VALUES (15, '50e37eda-adc5-46f0-a860-f363defcbe6d', NULL, NULL, 'User Commission report', NULL, 'User Commission report', 'Report showing recommender name, currency & payment amount', '/purchases/report?alias_columns_csv=ID%2CCreated%20at%2CProduct%2CSKU%2COrder%2CPartner%2CCharity%20Name%2CCurrency%2CPrice%2CUser%2CChariy%2Cstatus%2CShort%20Code%2CRecommender%2CUser%20Currency%2CUser%20Commission%20in%20User%20Currency&from_date=&is_approved=%20&is_test=0&order_by=&partner_env=%20&report_name=&route=&rows_per_page=25&show_columns_csv=id%2Ccreated_at%2Cproduct_name%2Cproduct_sku%2Cproduct_order_id%2Cpartner_name%2Ccharity_name%2Cproduct_currency%2Cproduct_price_in_product_currency%2Cuser_commission_in_partner_currency%2Ccharity_donation_in_partner_currency%2Cstatus%2Crecommendurl_short_code%2Crecommender_full_name%2Cuser_currency%2Cuser_commission_in_user_currency&submit=Run&to_date=', NULL, NULL, 17, 0, NULL, 0, 1259, 1259, '2019-05-15 08:17:36', '2019-05-15 08:17:36', NULL, NULL);
INSERT INTO `reports` VALUES (16, '074f13ea-5a7c-49dc-95f2-c3e384105059', NULL, NULL, 'Conversion Report - Charity', NULL, 'Conversion Report - Charity', 'Conversion report showing additional parameters:\r\n\r\nPurchase date\r\nCharity Donation %age\r\nCharity Currency\r\nCharity Donation Value in Charity Currency', '/purchases/report?alias_columns_csv=ID%2CCreated%20at%2CProduct%2CSKU%2COrder%2CPartner%2CCharity%20Name%2CCurrency%2CPrice%2CUser%2CChariy%2Cstatus%2CShort%20Code%2Cpurchase%20date%2Ccharity%20donation%2Ccharity%20currency%2Ccharity%20donation%20in%20charity%20currency&from_date=&is_approved=%20&is_test=0&order_by=&partner_env=%20&report_name=&route=&rows_per_page=25&show_columns_csv=id%2Ccreated_at%2Cproduct_name%2Cproduct_sku%2Cproduct_order_id%2Cpartner_name%2Ccharity_name%2Cproduct_currency%2Cproduct_price_in_product_currency%2Cuser_commission_in_partner_currency%2Ccharity_donation_in_partner_currency%2Cstatus%2Crecommendurl_short_code%2Cpurchased_at%2Ccharity_share_percentage%2Ccharity_currency%2Ccharity_donation_charity_currency&submit=Run&to_date=', NULL, NULL, 17, 0, NULL, 0, 1259, 1259, '2019-06-17 10:43:32', '2019-06-17 10:43:32', NULL, NULL);
INSERT INTO `reports` VALUES (17, 'ddd995c3-7c80-4419-b10f-5954d4e6f0fc', NULL, NULL, 'Conversion Aid-declaration report', NULL, 'Conversion Aid-declaration report', 'This report shows all transactions eligible for the payment, each payment cycle e.g. for 20th April payment this report would show all eligible gift aid donations included in that payment cycle.', '/purchases/report?alias_columns_csv=First%20Name%2CSurname%2CHome%20Address%2CHome%20Address%20Line%202%2CPostcode%2CCountry%2CEmail%2CDate%20of%20Declaration%2CTransaction%20ID%2CTransaction%20Date%2CDonation%20Amount%2CStatus&from_date=&is_approved=%20&is_test=0&order_by=&partner_env=%20&report_name=&route=&rows_per_page=25&show_columns_csv=aiddeclaration_first_name%2Caiddeclaration_last_name%2Caiddeclaration_address1%2Caiddeclaration_address2%2Caiddeclaration_zip_code%2Caiddeclaration_country_name%2Caiddeclaration_email%2Caiddeclaration_date%2Cid%2Ccreated_at%2Ccharity_donation_in_partner_currency%2Cstatus&submit=Run&to_date=', NULL, '1.0', 17, 0, NULL, 1, 2062, 2062, '2019-07-01 06:37:35', '2019-07-01 06:37:35', NULL, NULL);

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) UNSIGNED NULL DEFAULT NULL,
  `updated_by` int(11) UNSIGNED NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, '6e9d6b57-966d-4b1e-aa77-fc937d9118b6', 'app-name', 'App Name', 'string', 'Mainframe Rapid Development Framework', 'Mainframe', 1, 1, 1, '2018-12-24 20:25:41', '2020-01-05 11:57:39', NULL, NULL);
INSERT INTO `settings` VALUES (2, '2dfc744e-752b-49ef-baee-048fa2fa4969', 'ios-app-version', 'iOS App Version', 'string', 'Murray Forest', '1.1.t.t', 1, 1, 1, '2018-12-24 20:26:42', '2020-01-19 19:27:59', NULL, NULL);
INSERT INTO `settings` VALUES (3, 'e446d927-902b-4633-83d8-5f9fa0ef43cb', 'android-app-version', 'Android App Version', 'string', 'Latest Android app version. This is matched with the users app version to prompt app update.', '1.24', 0, 1, 1, '2018-12-24 20:27:46', '2019-04-11 09:16:28', NULL, NULL);
INSERT INTO `settings` VALUES (4, '279fb65c-30c2-4727-b3e6-fc18a3476bf7', 'mobile-portrait-help-steps', 'Mobile Portrait Help Steps', 'file', 'Mobile Portrait Helps slides for screen size.', NULL, 1, 1, 1, '2019-03-19 10:02:46', '2019-03-20 09:21:39', NULL, NULL);
INSERT INTO `settings` VALUES (5, 'f8e2ab99-e6ef-46d5-ae98-edee783b8f56', 'mobile-landscape-help-steps', 'Mobile Landscape Help Steps', 'file', 'Mobile landscape Helps slides for screen size.', NULL, 1, 1, 1, '2019-03-19 10:15:44', '2020-01-18 17:17:38', NULL, NULL);
INSERT INTO `settings` VALUES (6, 'f05d80a3-9f0d-4f29-982c-331c4f1a4c38', 'ipad-landscape-help-steps', 'ipad Landscape Help Steps asdf', 'file', 'ipad landscape Helps slides for screen size.', 'asdfasdf asdfasdf', 1, 1, 1, '2019-03-19 11:21:31', '2020-01-07 13:13:02', '2020-01-07 13:13:02', NULL);

-- ----------------------------
-- Table structure for subscriptions
-- ----------------------------
DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE `subscriptions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `tenant_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `package_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `valid_from` timestamp(0) NULL DEFAULT NULL,
  `valid_till` timestamp(0) NULL DEFAULT NULL,
  `is_active` tinyint(4) NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for telescope_entries
-- ----------------------------
DROP TABLE IF EXISTS `telescope_entries`;
CREATE TABLE `telescope_entries`  (
  `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`sequence`) USING BTREE,
  UNIQUE INDEX `telescope_entries_uuid_unique`(`uuid`) USING BTREE,
  INDEX `telescope_entries_batch_id_index`(`batch_id`) USING BTREE,
  INDEX `telescope_entries_type_should_display_on_index_index`(`type`, `should_display_on_index`) USING BTREE,
  INDEX `telescope_entries_family_hash_index`(`family_hash`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1156 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for telescope_entries_tags
-- ----------------------------
DROP TABLE IF EXISTS `telescope_entries_tags`;
CREATE TABLE `telescope_entries_tags`  (
  `entry_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  INDEX `telescope_entries_tags_entry_uuid_tag_index`(`entry_uuid`, `tag`) USING BTREE,
  INDEX `telescope_entries_tags_tag_index`(`tag`) USING BTREE,
  CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for telescope_monitoring
-- ----------------------------
DROP TABLE IF EXISTS `telescope_monitoring`;
CREATE TABLE `telescope_monitoring`  (
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tenants
-- ----------------------------
DROP TABLE IF EXISTS `tenants`;
CREATE TABLE `tenants`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `code` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_id` int(11) UNSIGNED NULL DEFAULT NULL COMMENT 'Tenant admin who signed up',
  `route_group` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `class_directory` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `namespace` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `view_directory` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) UNSIGNED NULL DEFAULT NULL,
  `updated_by` int(11) UNSIGNED NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tenants
-- ----------------------------
INSERT INTO `tenants` VALUES (1, 'ceba2dba-bfad-4045-a36f-ce0572f77679', 1, 'ArtemisPod-default', 'artp', NULL, 'artp', 'app/Projects/ArtemisPod', '\\App\\ArtemisPod', 'mainframe.projects.artemis-pod', 1, 5, 5, '2019-12-19 13:31:02', '2019-12-19 13:31:02', NULL, NULL);
INSERT INTO `tenants` VALUES (2, '2170cada-a1fc-43a9-90e5-6bf6a5037952', 2, 'OrangeHC-default', 'orhc', NULL, 'orhc', 'app/Projects/OrangeHc', '\\App\\OrangeHC', 'mainframe.projects.orange-hc', 1, 5, 5, '2019-12-19 13:31:02', '2019-12-28 14:26:39', NULL, NULL);

-- ----------------------------
-- Table structure for uploads
-- ----------------------------
DROP TABLE IF EXISTS `uploads`;
CREATE TABLE `uploads`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `tenant_id` int(11) NULL DEFAULT NULL,
  `name` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `path` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `order` smallint(6) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `ext` varchar(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `bytes` bigint(20) NULL DEFAULT NULL,
  `description` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `uploadable_type` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `uploadable_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `module_id` int(11) NULL DEFAULT NULL,
  `element_id` bigint(20) NULL DEFAULT NULL,
  `element_uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) UNSIGNED NULL DEFAULT NULL,
  `updated_by` int(11) UNSIGNED NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of uploads
-- ----------------------------
INSERT INTO `uploads` VALUES (1, '821b341e-1eb7-412c-a9ae-0dcfda244275', NULL, NULL, '2019-10-31 15_41_04-Start.jpg', NULL, '/files/7km7BL7t_2019-10-31 15_41_04-Start.jpg', NULL, 'jpg', NULL, NULL, NULL, NULL, 21, NULL, NULL, 1, 5, 5, '2019-10-31 13:03:35', '2019-10-31 13:03:35', NULL, NULL);
INSERT INTO `uploads` VALUES (2, '90020e48-a92d-42b5-947d-b1da2ba60204', NULL, NULL, '2019-10-31 15_41_04-Start.jpg', NULL, '/files/9ZpEl7dT_2019-10-31 15_41_04-Start.jpg', NULL, 'jpg', NULL, NULL, NULL, NULL, 21, 39, '931f290b-8cd3-4ca1-a0f1-087bb1355b8a', 1, 5, 5, '2019-10-31 13:10:17', '2019-11-20 11:03:13', NULL, NULL);
INSERT INTO `uploads` VALUES (3, 'c0c7f836-b76c-4ef1-9481-c82529f2bd1a', NULL, NULL, '2019-10-31 15_41_04-Start.jpg', NULL, '/files/vYaQdT0Z_2019-10-31 15_41_04-Start.jpg', NULL, 'jpg', NULL, NULL, NULL, NULL, 21, 35, 'e85d9a3d-b77e-46db-9422-078eeac8923a', 1, 5, 5, '2019-10-31 15:10:02', '2019-11-22 09:28:42', NULL, NULL);
INSERT INTO `uploads` VALUES (4, '8db449ef-4733-4f09-ab2d-061460b6ee3a', NULL, NULL, 'Central-HRIS-for-MoHFW-New-Era-of-Data-Driven-Decision-Final (1).jpg', NULL, '/files/Ie6cROjt_Central-HRIS-for-MoHFW-New-Era-of-Data-Driven-Decision-Final (1).jpg', NULL, 'jpg', NULL, NULL, NULL, NULL, 21, 39, '931f290b-8cd3-4ca1-a0f1-087bb1355b8a', 1, 5, 5, '2019-11-13 16:17:29', '2019-11-13 16:17:41', '2019-11-13 16:17:41', NULL);
INSERT INTO `uploads` VALUES (5, '5809f712-1527-4620-9ef8-bcd904d3b21b', NULL, NULL, '2019-11-27 10_10_58-Cortana.jpg', NULL, '/files/UohSKFJT_2019-11-27 10_10_58-Cortana.jpg', NULL, 'jpg', NULL, NULL, NULL, NULL, 21, 42, 'd879c7df-d4ce-48c7-8abc-dc82af05a37d', 1, 5, 5, '2019-12-02 16:58:02', '2019-12-19 07:54:40', NULL, NULL);
INSERT INTO `uploads` VALUES (6, '940f11a7-6772-4de4-a27d-370982e3383c', NULL, NULL, 'WWW.YIFY-TORRENTS.COM.jpg', NULL, '/files/z0rOZjo2_WWW.YIFY-TORRENTS.COM.jpg', NULL, 'jpg', NULL, NULL, NULL, NULL, 21, 34, 'd602a787-1b8c-46c9-aa64-2ad6aa830c70', 1, 5, 5, '2019-12-19 08:53:16', '2019-12-19 08:55:20', '2019-12-19 08:55:20', NULL);
INSERT INTO `uploads` VALUES (7, 'e5d35b1f-4625-4214-8dda-9f1ad4608383', NULL, NULL, 'raihan-round.png', NULL, '/files/hsQtWhy1_raihan-round.png', NULL, 'png', NULL, NULL, NULL, NULL, 4, NULL, NULL, 1, 1, 1, '2020-01-05 17:40:40', '2020-01-05 17:40:40', NULL, NULL);
INSERT INTO `uploads` VALUES (8, '52047e4d-262f-435d-8959-9a7f43157293', NULL, NULL, 'raihan-round.png', NULL, '/files/ocJxKCvK_raihan-round.png', NULL, 'png', NULL, NULL, NULL, NULL, 4, NULL, '338b5180-c35a-494e-b684-02288035361f', 1, 1, 1, '2020-01-05 17:41:57', '2020-01-05 17:41:57', NULL, NULL);
INSERT INTO `uploads` VALUES (9, 'ced54918-9691-4212-8a8c-5cbfca4c127a', NULL, NULL, 'raihan-round.png', NULL, '/files/RdniZdHy_raihan-round.png', NULL, 'png', NULL, NULL, NULL, NULL, 21, 43, 'a285cd17-969a-4dac-9898-d94168b13057', 1, 1, 1, '2020-01-05 18:51:19', '2020-01-05 18:51:19', NULL, NULL);
INSERT INTO `uploads` VALUES (10, '4f4d5297-170c-4313-b15c-cf4bbace9056', NULL, NULL, 'raihan-round.png', NULL, '/files/GShmXTCO_raihan-round.png', NULL, 'png', NULL, NULL, 'App\\Mainframe\\Modules\\Settings\\Setting', 0, 21, 43, 'a285cd17-969a-4dac-9898-d94168b13057', 1, 1, 1, '2020-01-05 18:52:15', '2020-01-05 18:52:15', NULL, NULL);
INSERT INTO `uploads` VALUES (11, 'ff387f29-c792-4b8e-a985-85c665f6be8e', NULL, NULL, 'raihan-round.png', NULL, '/files/sSCXBzSS_raihan-round.png', NULL, 'png', NULL, NULL, 'App\\Mainframe\\Modules\\Settings\\Setting', 45, 21, 45, '29900234-2353-4098-9390-4a7ef688f639', 1, 1, 1, '2020-01-05 18:55:51', '2020-01-06 04:44:42', NULL, NULL);
INSERT INTO `uploads` VALUES (12, '919d6d5a-fec4-4fde-9fb2-872a84752b84', NULL, NULL, 'raihan-round.png', NULL, '/files/ITeOd51R_raihan-round.png', NULL, 'png', NULL, NULL, 'App\\Mainframe\\Modules\\Settings\\Setting', 45, 21, 45, '29900234-2353-4098-9390-4a7ef688f639', 1, 1, 1, '2020-01-06 04:39:17', '2020-01-06 04:44:42', NULL, NULL);
INSERT INTO `uploads` VALUES (13, '71f5f437-2b83-408f-90ba-34afd4851e76', NULL, NULL, 'retro-wallpaper-49.jpg', NULL, '/files/WLcA82gK_retro-wallpaper-49.jpg', NULL, 'jpg', NULL, NULL, 'App\\Mainframe\\Modules\\Settings\\Setting', 45, 21, 45, '29900234-2353-4098-9390-4a7ef688f639', 1, 1, 1, '2020-01-06 04:39:21', '2020-01-06 04:44:42', NULL, NULL);
INSERT INTO `uploads` VALUES (14, 'a960dbeb-6901-4810-bf61-d7ac9d8c08c9', NULL, NULL, 'temp.txt', NULL, '/files/MLJ54xuL_temp.txt', NULL, 'txt', NULL, NULL, 'App\\Mainframe\\Modules\\Settings\\Setting', 45, 21, 45, '29900234-2353-4098-9390-4a7ef688f639', 1, 1, 1, '2020-01-06 04:39:30', '2020-01-06 04:44:42', NULL, NULL);

-- ----------------------------
-- Table structure for user_group
-- ----------------------------
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group`  (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_group
-- ----------------------------
INSERT INTO `user_group` VALUES (2, 2, NULL, NULL);
INSERT INTO `user_group` VALUES (1, 1, NULL, NULL);
INSERT INTO `user_group` VALUES (999, 25, NULL, NULL);
INSERT INTO `user_group` VALUES (2660, 26, NULL, NULL);
INSERT INTO `user_group` VALUES (2662, 26, NULL, NULL);
INSERT INTO `user_group` VALUES (2664, 26, NULL, NULL);
INSERT INTO `user_group` VALUES (2666, 26, NULL, NULL);
INSERT INTO `user_group` VALUES (2668, 26, NULL, NULL);
INSERT INTO `user_group` VALUES (2670, 26, NULL, NULL);
INSERT INTO `user_group` VALUES (2672, 26, NULL, NULL);
INSERT INTO `user_group` VALUES (2674, 26, NULL, NULL);
INSERT INTO `user_group` VALUES (2676, 26, NULL, NULL);
INSERT INTO `user_group` VALUES (2677, 25, NULL, NULL);
INSERT INTO `user_group` VALUES (2678, 26, NULL, NULL);
INSERT INTO `user_group` VALUES (2685, 26, NULL, NULL);
INSERT INTO `user_group` VALUES (2686, 3, NULL, NULL);
INSERT INTO `user_group` VALUES (2690, 26, NULL, NULL);
INSERT INTO `user_group` VALUES (2691, 25, NULL, NULL);
INSERT INTO `user_group` VALUES (2695, 26, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `tenant_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `api_token` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'X-Auth-Token',
  `api_token_generated_at` datetime(0) NULL DEFAULT NULL,
  `is_tenant_editable` smallint(6) NOT NULL DEFAULT 1,
  `permissions` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  `name_initial` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `first_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `full_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `gender` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `device_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `address1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `address2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `city` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `county` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `country_id` int(11) NULL DEFAULT NULL,
  `country_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `zip_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `first_login_at` datetime(0) NULL DEFAULT NULL,
  `last_login_at` datetime(0) NULL DEFAULT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Bearer token',
  `email_verified_at` datetime(0) NULL DEFAULT NULL,
  `email_verification_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `currency` varchar(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `social_account_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `social_account_type` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `dob` date NULL DEFAULT NULL,
  `group_ids` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `is_test` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2696 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '3ef9b174-6c7c-41fd-b68e-18d003fb9481', NULL, NULL, 'Super admin', 'su@mainframe', '$2y$10$MPClZ27.7vXjZR9U.RtAOunXE7aNR3CTe.m9JYJTpVlLTmDWBZhBq', '3XuKoETQ1ND4lIp0EDWPXtDzgoCyIMPoej9szv3OqIbwkrMbKEf6HpEItnEY', NULL, NULL, 1, NULL, 1, 1, 1, '2018-09-10 15:30:06', '2020-01-19 19:39:53', NULL, NULL, NULL, 'Prime', 'Superuser', 'Prime Superuser', NULL, NULL, NULL, NULL, NULL, NULL, 187, 'UK (United Kingdom)', NULL, NULL, NULL, '2018-09-10 15:30:06', '2019-11-12 12:47:17', 'wfluT/VAZmTHFBO3Gj.vJBqjrwjI2Fix', '2019-01-22 19:27:07', NULL, 'GBP', NULL, NULL, NULL, '[\"1\"]', 0);
INSERT INTO `users` VALUES (2, '856a81bf-ab1b-4289-9d65-9751009d00ad', NULL, NULL, 'API', 'api@mainframe', '$2y$10$t5wa5wPH8XAgoRYyptOJ0uSf/klm0S/71XUdK3Gz.2llsQHh1nXAm', 'Pi5HPpAcExu26sIXM33doMtjOzt7t1AHAkGWodKGLhCucPkRCn8zfpGPZsDJ', '7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0', NULL, 0, NULL, 1, 1, 1, '2018-12-24 05:48:25', '2020-01-19 19:39:53', NULL, NULL, NULL, 'LB', 'API', 'LB API', NULL, 'eFGlVn8yFn8:APA91bHgq2zk-9JrBNNtVMn4iFMB6eicQOUVyFZGRft8jv-GwGJej9sFppTG5w9E_3IeOyR_3NN1i3cWFHaiVl_k1Zlt2jDMVoh7D90CsJG1qxVnuruH-Eidi1CgO9QVlpmFByK2azr3', NULL, NULL, NULL, NULL, 187, 'UK (United Kingdom)', NULL, NULL, NULL, '2019-01-31 08:31:54', '2019-04-09 15:17:25', 'Q29anuSIvoR9N8OmB2ueGGRI8tlHPZau', '2019-01-01 12:00:00', NULL, 'GBP', NULL, NULL, NULL, '[\"2\"]', 0);
INSERT INTO `users` VALUES (999, '0b11bb84-a6f9-4612-b823-6eb0feda3342', NULL, NULL, ' ', 'dote@mailinator.net', '$2y$10$zZmnBn0xe0wXNCmKpWFnV.dQq/yJasjT4Bk1gZ9yQdWrp/e.2GgFK', NULL, NULL, NULL, 1, NULL, 1, 1, 1, '2020-01-06 16:55:14', '2020-01-08 13:11:18', NULL, NULL, NULL, 'Dote', 'Test', 'Dote Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Q29anuSIvoR9N8OmB2ueGGRI8tlHPZau', '2020-01-19 10:49:34', NULL, NULL, NULL, NULL, NULL, '[\"25\"]', 0);
INSERT INTO `users` VALUES (2690, 'de95502e-6af2-489b-9a3f-6a4a78932b5e', NULL, NULL, 'Adan Ziemann', 'trystan98@morar.com', '$2y$04$bZwgm6MGJhgITlPb8lLTT.4DbcwKiv6DeO9/Znj6k3LdK.FKZ6QIe', NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, '2020-01-19 19:08:48', '2020-01-19 19:08:48', NULL, NULL, NULL, 'Adan', 'Ziemann', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"26\"]', NULL);
INSERT INTO `users` VALUES (2695, 'c3399e8a-0f0a-4900-8eea-4eeb6a44d4d2', NULL, NULL, 'Lia Littel', 'adrianna.damore@hotmail.com', '$2y$04$qp4S9SZ0AiRGESGZej.r1.1SxaFVgmSdSaQUF1sj08Rj1qtUec0le', NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, '2020-01-19 19:39:53', '2020-01-19 19:39:53', NULL, NULL, NULL, 'Lia', 'Littel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"26\"]', NULL);

SET FOREIGN_KEY_CHECKS = 1;
