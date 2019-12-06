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

 Date: 06/12/2019 23:57:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for changes
-- ----------------------------
DROP TABLE IF EXISTS `changes`;
CREATE TABLE `changes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tenant_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `change_set` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `module_id` int(11) NULL DEFAULT NULL,
  `module_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `element_id` bigint(20) NULL DEFAULT NULL,
  `element_uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `field` varchar(124) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `old` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `new` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dolor_sits
-- ----------------------------
DROP TABLE IF EXISTS `dolor_sits`;
CREATE TABLE `dolor_sits`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
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
INSERT INTO `dolor_sits` VALUES (1, '7be17d1c-1bd9-4620-876a-f3ca5a05717e', NULL, 'Super wings', 1, 5, 5, '2019-11-20 14:56:35', '2019-11-20 14:56:35', NULL, NULL);
INSERT INTO `dolor_sits` VALUES (2, '7be17d1c-1bd9-4620-876a-f3ca5a05717f', NULL, 'Paw Petrol', 1, 5, 5, '2019-11-20 14:56:35', '2019-11-20 14:56:35', NULL, NULL);
INSERT INTO `dolor_sits` VALUES (3, '7be17d1c-1bd9-4620-876a-f3ca5a05717g', NULL, 'Captain Planet', 1, 5, 5, '2019-11-20 14:56:35', '2019-11-20 14:56:35', NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'd48c591a-e6b2-4f7b-9458-0693362e55a6', 'superuser', 'Superuser', '{\"superuser\":1}', 1, 1, 1, '2018-12-10 06:50:18', '2019-11-13 15:51:18', NULL, NULL);
INSERT INTO `groups` VALUES (9, '9c085751-ea3a-44e4-a858-e008894dc1f3', 'api', 'API user', '{\"superuser\":1,\"modules\":1,\"modules-view-list\":1,\"modules-view-details\":1,\"modules-create\":1,\"modules-edit\":1,\"modules-delete\":1,\"modules-restore\":1,\"modules-change-logs\":1,\"modules-report\":1,\"module-groups\":1,\"module-groups-view-list\":1,\"module-groups-view-details\":1,\"module-groups-create\":1,\"module-groups-edit\":1,\"module-groups-delete\":1,\"module-groups-restore\":1,\"module-groups-change-logs\":1,\"module-groups-report\":1,\"Widget\":1,\"viewWidgetAppTile\":1,\"API\":1,\"canMakeApiCallUsingXAuthToken\":1}', 1, 1, 1, '2018-12-10 16:10:53', '2019-11-27 10:36:47', NULL, NULL);

-- ----------------------------
-- Table structure for lorem_ipsums
-- ----------------------------
DROP TABLE IF EXISTS `lorem_ipsums`;
CREATE TABLE `lorem_ipsums`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lorem_ipsums
-- ----------------------------
INSERT INTO `lorem_ipsums` VALUES (1, '2c9e9057-6095-4a48-aa9e-181e96172cb1', NULL, 'Test Input', NULL, 'Prior to proceeding with the enforcement of new rules and regulations , it was good if authorities concerned would have been taken of such possible unruly anarchies of the transport workers .', NULL, NULL, NULL, NULL, '[\"0\"]', 1, NULL, 1, 0, 1, 5, 5, '2019-11-20 14:29:07', '2019-11-20 15:30:36', NULL, NULL);
INSERT INTO `lorem_ipsums` VALUES (2, '175da4d1-e448-4e27-a642-4da5179ec5c6', NULL, 'ainw bNW', NULL, 'asdfasdf', 'asdfasdfsdf asdfasdf', 'Country,takes,lorem', NULL, NULL, '[\"0\",\"1\"]', 1, '[\"1\"]', 2, 0, 0, 5, 5, '2019-11-20 16:01:06', '2019-12-02 21:47:20', NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
  `parent_id` int(11) NULL DEFAULT NULL,
  `level` int(11) NULL DEFAULT NULL,
  `order` int(11) NULL DEFAULT NULL,
  `default_route` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `color_css` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `icon_css` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
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
INSERT INTO `module_groups` VALUES (1, '770e22e8-e572-44a3-9a9a-be7fb1964ae5', 'app-settings', 'Settings', 'Manage configuration', 0, 0, 0, 'app-configs.index', 'aqua', 'fa fa-gears', 1, 1, 1, '2018-12-10 06:47:46', '2019-10-28 14:07:42', NULL, NULL);
INSERT INTO `module_groups` VALUES (2, 'a0dc562b-d6ce-45d1-9279-2a8ca2982dc8', 'accounts', 'Accounts', NULL, 0, 0, 0, 'letsbab.index', 'aqua', 'fa fa-calculator', 1, 1, 1, '2018-12-14 06:18:07', '2019-10-28 12:41:42', NULL, NULL);

-- ----------------------------
-- Table structure for modules
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `model` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `controller` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `view` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `module_group_id` int(11) NULL DEFAULT NULL,
  `level` int(11) NULL DEFAULT NULL,
  `order` int(11) NULL DEFAULT NULL,
  `default_route` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `color_css` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `icon_css` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES (1, 'ca56b8a2-368a-4f84-8336-e9850c406e2d', 'modules', 'Module', 'Manage module', '\\App\\Mainframe\\Modules\\Modules\\Module', '\\App\\Mainframe\\Modules\\Modules\\ModuleController', 'mainframe.modules.modules', 0, 1, 0, 0, 'modules.index', 'aqua', 'fa fa-puzzle-piece', 1, 5, 1, '2018-12-10 06:47:46', '2018-12-10 06:47:46', NULL, NULL);
INSERT INTO `modules` VALUES (2, '0b89564c-7198-4b1b-9869-a02a0e584262', 'module-groups', 'Module group', 'Manage module group', '\\App\\Mainframe\\Modules\\ModuleGroups\\ModuleGroup', '\\App\\Mainframe\\Modules\\ModuleGroups\\ModuleGroupController', 'mainframe.modules.module-groups', 0, 1, 0, 0, 'modulegroups.index', 'aqua', 'fa fa-puzzle-piece', 1, 5, 1, '2018-12-10 06:47:46', '2018-12-10 06:47:46', NULL, NULL);
INSERT INTO `modules` VALUES (3, 'eee7b4a8-abab-4b79-a751-b681624eb586', 'tenants', 'Tenant', 'Manage tenant', '\\App\\Mainframe\\Modules\\Tenants\\Tenant', '\\App\\Mainframe\\Modules\\Tenants\\TenantController', 'mainframe.modules.tenants', 0, 1, 0, 0, 'tenants.index', 'aqua', 'fa fa-plus', 1, 5, 1, '2018-12-10 06:47:46', '2018-12-10 06:47:46', NULL, NULL);
INSERT INTO `modules` VALUES (4, '8f27f918-3a05-4b04-9bd3-d953e9492293', 'users', 'User', 'Manage user', '\\App\\User', '\\App\\Mainframe\\Modules\\Users\\UserController', 'mainframe.modules.users', 0, 0, 0, 4, 'users.index', 'aqua', 'fa fa-user-plus', 1, 5, 1, '2018-12-10 06:47:46', '2018-12-10 06:47:46', NULL, NULL);
INSERT INTO `modules` VALUES (5, '14612def-5850-49fb-bf99-48d99c73b589', 'groups', 'Group', 'Manage group', '\\App\\Mainframe\\Modules\\Groups\\Group', '\\App\\Mainframe\\Modules\\Groups\\GroupController', 'mainframe.modules.groups', 0, 1, 0, 0, 'groups.index', 'aqua', 'fa fa-plus', 1, 5, 1, '2018-12-10 06:47:46', '2018-12-10 06:47:46', NULL, NULL);
INSERT INTO `modules` VALUES (6, '50ed1cc8-3ecf-4caf-9724-819cd90dd3d2', 'uploads', 'Upload', 'Manage upload', '\\App\\Mainframe\\Modules\\Uploads\\Upload', '\\App\\Mainframe\\Modules\\Uploads\\UploadController', 'mainframe.modules.uploads', 0, 1, 0, 0, 'uploads.index', 'aqua', 'fa fa-plus', 1, 5, 1, '2018-12-13 20:57:47', '2018-12-13 20:57:47', NULL, NULL);
INSERT INTO `modules` VALUES (7, '04a9fb30-17ac-4390-86f2-053f2b7cb028', 'changes', 'Change', 'Manage change', '\\App\\Mainframe\\Modules\\Changes\\Change', '\\App\\Mainframe\\Modules\\Changes\\ChangeController', 'mainframe.modules.changes', 0, 1, 0, 0, 'changes.index', 'aqua', 'fa fa-plus', 1, 5, 1, '2018-12-13 20:58:36', '2018-12-13 20:58:36', NULL, NULL);
INSERT INTO `modules` VALUES (21, '6d1fff93-328b-4501-b643-e21cc6cbf9d2', 'settings', 'Setting', 'Manage setting', '\\App\\Mainframe\\Modules\\Settings\\Setting', '\\App\\Mainframe\\Modules\\Settings\\SettingController', 'mainframe.modules.settings', 0, 1, 0, 0, 'settings.index', 'aqua', 'fa fa-list-alt', 1, 5, 1, '2018-12-24 19:56:38', '2019-12-03 05:01:17', NULL, NULL);
INSERT INTO `modules` VALUES (23, '3207985e-3886-4a1c-8121-c8e4147cfa72', 'reports', 'Report', 'Manage report', '\\App\\Mainframe\\Modules\\Reports\\Report', '\\App\\Mainframe\\Modules\\Reports\\ReportController', 'mainframe.modules.reports', 0, 0, 0, 999, 'reports.index', 'aqua', 'fa fa-pie-chart', 1, 5, 1, '2019-01-17 05:00:25', '2019-01-22 08:33:07', NULL, NULL);
INSERT INTO `modules` VALUES (50, '778e5ea8-acee-4458-aab7-5e275a4084a5', 'lorem-ipsums', 'Lorem ipsum', 'Manage lorem ipsum', '\\App\\Mainframe\\Modules\\LoremIpsums\\LoremIpsum', '\\App\\Mainframe\\Modules\\LoremIpsums\\LoremIpsumController', NULL, 0, 1, 0, 0, 'lorem-ipsums.index', 'aqua', 'fa fa-plus', 1, 5, 1, '2019-11-20 14:08:23', '2019-11-20 14:08:23', NULL, NULL);
INSERT INTO `modules` VALUES (51, 'a0c23e13-1bd6-4346-828b-b7878d67ee29', 'dolor-sits', 'Dolor sit', 'Manage dolor sit', '\\App\\Mainframe\\Modules\\DolorSits\\DolorSit', '\\App\\Mainframe\\Modules\\DolorSits\\DolorSitController', NULL, 0, 1, 0, 0, 'dolor-sits.index', 'aqua', 'fa fa-plus', 0, 5, 1, '2019-11-20 14:10:34', '2019-12-03 05:31:58', NULL, NULL);

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
-- Table structure for reports
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tenant_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `title` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `parameters` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `version` varchar(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `module_id` int(11) NULL DEFAULT NULL,
  `is_module_default` smallint(6) NULL DEFAULT NULL,
  `tags` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of reports
-- ----------------------------
INSERT INTO `reports` VALUES (1, '4d59ac27-554c-4b0a-993c-e2664119e93f', NULL, 'List of App users with summary', NULL, 'List of App users with summary', NULL, '/users/report?alias_columns_csv=ID%2CName%2CEmail%2CGroup%2CFull%20name%2CGender%2CDOB%2CAddress%2CCity%2CCountry%2CZip%20code%2CPhone%2CMobile%2CFirst%20Login%2CLast%20login%2CShare%20code%2CCurrency%2CAcc%20Name%2CAcc%20number%2CAcc%20Type%2CAcc%20country%2CAcc%20City%2CAcc%20State%2CAcc%20Post%20Code%2CAcc%20First%20Line%2CSort%20Code%2CABARTN%2CIBAN%2CSWIFT%2CDevice%2CApp%20Version%2CTransferwise%20ID%2CSocial%20ID%2CSocial%20Acc%20Type%2CGift%20Aid%3F%2CTotal%20Commission%2CTotal%20Paid%2CDue%2CTotal%20Donated%2CDonation%20Due%2CRecommendations%2CVisits%2CConversions%2CAvg.%20Buzz%20Off%20Rate%2CNext%20Payment%2CLast%20Payment%2CEmail%20Verified%2CRegistered%20at%2CLast%20updated&created_at_from=&created_at_till=&group_ids%5B0%5D=8&order_by=id%20desc&report_name=List%20of%20App%20users%20with%20summary&rows_per_page=10&select_columns_csv=id%2Cname%2Cemail%2Cgroup_ids_csv%2Cis_active%2Ccreated_at%2Cupdated_at%2Cfirst_name%2Clast_name%2Cgender%2Cdob%2Caddress1%2Caddress2%2Ccity%2Ccounty%2Ccountry_name%2Czip_code%2Cphone%2Cmobile%2Cfirst_login_at%2Clast_login_at%2Cshare_code%2Caccount_holder_name%2Caccount_number%2Caccount_type%2Caccount_country%2Caccount_city%2Caccount_state%2Caccount_post_code%2Caccount_first_line%2Csort_code%2Cabartn%2Ciban%2Cswift%2Cdevice_name%2Ccurrent_app_version%2Ctransferwise_account_id%2Cemail_verified_at%2Ccurrency%2Csocial_account_id%2Csocial_account_type%2Cgift_aid_checked%2Cstat_total_commission_to_date_in_user_currency%2Cstat_total_commission_to_date_in_user_currency_formatted%2Cstat_total_commission_to_date_in_lb_currency%2Cstat_total_commission_to_date_in_lb_currency_formatted%2Cstat_total_amounts_paid_to_date_in_user_currency%2Cstat_total_amounts_paid_to_date_in_user_currency_formatted%2Cstat_total_amounts_paid_to_date_in_lb_currency%2Cstat_total_amounts_paid_to_date_in_lb_currency_formatted%2Cstat_amount_due_in_user_currency%2Cstat_amount_due_in_user_currency_formatted%2Cstat_amount_due_in_lb_currency%2Cstat_amount_due_in_lb_currency_formatted%2Cstat_total_donation_to_date_in_user_currency%2Cstat_total_donation_to_date_in_user_currency_formatted%2Cstat_total_donation_to_date_in_lb_currency%2Cstat_total_donation_to_date_in_lb_currency_formatted%2Cstat_donation_due_in_user_currency%2Cstat_donation_due_in_user_currency_formatted%2Cstat_donation_due_in_lb_currency%2Cstat_donation_due_in_lb_currency_formatted%2Cstat_no_of_recommendations%2Cstat_no_of_successful_recommendations%2Cstat_no_of_conversions%2Cstat_avg_buzz_of_rate%2Cnext_payment_on%2Clast_payment_on&show_columns_csv=id%2Cname%2Cemail%2Cgroup_ids_csv%2Cfull_name%2Cgender%2Cdob%2Caddress1%2Ccity%2Ccountry_name%2Czip_code%2Cphone%2Cmobile%2Cfirst_login_at%2Clast_login_at%2Cshare_code%2Ccurrency%2Caccount_holder_name%2Caccount_number%2Caccount_type%2Caccount_country%2Caccount_city%2Caccount_state%2Caccount_post_code%2Caccount_first_line%2Csort_code%2Cabartn%2Ciban%2Cswift%2Cdevice_name%2Ccurrent_app_version%2Ctransferwise_account_id%2Csocial_account_id%2Csocial_account_type%2Cgift_aid_checked%2Cstat_total_commission_to_date_in_user_currency_formatted%2Cstat_total_amounts_paid_to_date_in_user_currency_formatted%2Cstat_amount_due_in_user_currency_formatted%2Cstat_total_donation_to_date_in_user_currency_formatted%2Cstat_donation_due_in_user_currency_formatted%2Cstat_no_of_recommendations%2Cstat_no_of_successful_recommendations%2Cstat_no_of_conversions%2Cstat_avg_buzz_of_rate%2Cnext_payment_on%2Clast_payment_on%2Cemail_verified_at%2Ccreated_at%2Cupdated_at&submit=Run', NULL, '1.0', 4, 1, NULL, 1, 1, 1, '2019-03-03 14:05:06', '2019-03-03 14:05:06', NULL, NULL);
INSERT INTO `reports` VALUES (2, '71566f5a-85c9-48d5-807c-6908d0737a39', NULL, 'App version report', NULL, 'App version report', NULL, '/users/report?alias_columns_csv=ID%2CName%2CEmail%2CGroup%2CFull%20name%2CKuldeeps%20Given%20Title&created_at_from=&created_at_till=&group_ids%5B0%5D=8&order_by=id%20desc&report_name=List%20of%20App%20users%20with%20summary&rows_per_page=10&select_columns_csv=id%2Cname%2Cemail%2Cgroup_ids_csv%2Cis_active%2Ccreated_at%2Cupdated_at%2Cfirst_name%2Clast_name%2Cgender%2Cdob%2Caddress1%2Caddress2%2Ccity%2Ccounty%2Ccountry_name%2Czip_code%2Cphone%2Cmobile%2Cfirst_login_at%2Clast_login_at%2Cshare_code%2Caccount_holder_name%2Caccount_number%2Caccount_type%2Caccount_country%2Caccount_city%2Caccount_state%2Caccount_post_code%2Caccount_first_line%2Csort_code%2Cabartn%2Ciban%2Cswift%2Cdevice_name%2Ccurrent_app_version%2Ctransferwise_account_id%2Cemail_verified_at%2Ccurrency%2Csocial_account_id%2Csocial_account_type%2Cgift_aid_checked%2Cstat_total_commission_to_date_in_user_currency%2Cstat_total_commission_to_date_in_user_currency_formatted%2Cstat_total_commission_to_date_in_lb_currency%2Cstat_total_commission_to_date_in_lb_currency_formatted%2Cstat_total_amounts_paid_to_date_in_user_currency%2Cstat_total_amounts_paid_to_date_in_user_currency_formatted%2Cstat_total_amounts_paid_to_date_in_lb_currency%2Cstat_total_amounts_paid_to_date_in_lb_currency_formatted%2Cstat_amount_due_in_user_currency%2Cstat_amount_due_in_user_currency_formatted%2Cstat_amount_due_in_lb_currency%2Cstat_amount_due_in_lb_currency_formatted%2Cstat_total_donation_to_date_in_user_currency%2Cstat_total_donation_to_date_in_user_currency_formatted%2Cstat_total_donation_to_date_in_lb_currency%2Cstat_total_donation_to_date_in_lb_currency_formatted%2Cstat_donation_due_in_user_currency&show_columns_csv=id%2Cname%2Cgroup_ids_csv%2Cfull_name%2Cgender%2Ccurrent_app_version&submit=Run', NULL, '1.0', 4, 0, NULL, 1, 1, 1, '2019-03-04 06:47:24', '2019-03-04 06:47:24', NULL, NULL);
INSERT INTO `reports` VALUES (3, '8466aa36-3605-4ca6-a3e2-95549c363996', NULL, 'List of App users with summary only for UK users', NULL, 'List of App users with summary only for UK users', NULL, '/users/report?alias_columns_csv=ID%2CName%2CEmail%2CGroup%2CFull%20name%2CGender%2CDOB%2CAddress%2CCity%2CCountry%2CZip%20code%2CPhone%2CMobile%2CFirst%20Login%2CLast%20login%2CShare%20code%2CCurrency%2CAcc%20Name%2CAcc%20number%2CAcc%20Type%2CAcc%20country%2CAcc%20City%2CAcc%20State%2CAcc%20Post%20Code%2CAcc%20First%20Line%2CSort%20Code%2CABARTN%2CIBAN%2CSWIFT%2CDevice%2CApp%20Version%2CTransferwise%20ID%2CSocial%20ID%2CSocial%20Acc%20Type%2CGift%20Aid%3F%2CTotal%20Commission%2CTotal%20Paid%2CDue%2CTotal%20Donated%2CDonation%20Due%2CRecommendations%2CVisits%2CConversions%2CAvg.%20Buzz%20Off%20Rate%2CNext%20Payment%2CLast%20Payment%2CEmail%20Verified%2CRegistered%20at%2CLast%20updated&country_id%5B0%5D=187&created_at_from=&created_at_till=&group_ids%5B0%5D=8&order_by=id%20desc&report_name=List%20of%20App%20users%20with%20summary&rows_per_page=10&show_columns_csv=id%2Cname%2Cemail%2Cgroup_ids_csv%2Cfull_name%2Cgender%2Cdob%2Caddress1%2Ccity%2Ccountry_name%2Czip_code%2Cphone%2Cmobile%2Cfirst_login_at%2Clast_login_at%2Cshare_code%2Ccurrency%2Caccount_holder_name%2Caccount_number%2Caccount_type%2Caccount_country%2Caccount_city%2Caccount_state%2Caccount_post_code%2Caccount_first_line%2Csort_code%2Cabartn%2Ciban%2Cswift%2Cdevice_name%2Ccurrent_app_version%2Ctransferwise_account_id%2Csocial_account_id%2Csocial_account_type%2Cgift_aid_checked%2Cstat_total_commission_to_date_in_user_currency_formatted%2Cstat_total_amounts_paid_to_date_in_user_currency_formatted%2Cstat_amount_due_in_user_currency_formatted%2Cstat_total_donation_to_date_in_user_currency_formatted%2Cstat_donation_due_in_user_currency_formatted%2Cstat_no_of_recommendations%2Cstat_no_of_successful_recommendations%2Cstat_no_of_conversions%2Cstat_avg_buzz_of_rate%2Cnext_payment_on%2Clast_payment_on%2Cemail_verified_at%2Ccreated_at%2Cupdated_at&submit=Run', NULL, NULL, 4, 0, NULL, 1, 1, 1, '2019-03-08 10:28:00', '2019-03-08 10:28:00', NULL, NULL);
INSERT INTO `reports` VALUES (4, '60218627-a0a6-4209-8991-eb26ba1230ef', NULL, 'Recommendation report', NULL, 'Recommendation report', NULL, '/recommendurls/report?submit=Run&report_name=&rows_per_page=25&created_at_from=&created_at_till=&is_shared=1&show_columns_csv=id%2Crecommender_user_id%2Cuser_name%2Ccreated_at%2Curl%2Cshort_code%2Cpartner_id%2Cpartner_name%2Cproduct_name%2Cproduct_price_currency%2Cproduct_price%2Clb_env%2Cexpires_at%2Chas_expired%2Ccharity_id%2Ccharity_name%2Ccommission_percentage_lb%2Ccommission_percentage_recommender%2Ccharity_share_percentage%2Cis_shared&alias_columns_csv=ID%2CUser+ID%2CUser+name%2CTIme%2CURL%2CShort+Code%2CPartner+ID%2CPartner+Name%2CProduct%2CCurrency%2CPrice%2CENV%2CExpiry+time%2CExpired%3F%2CCharity+ID%2CCharity+Name%2CLB+%25%2CUser+%25%2CCharity+%25%2CShared%3F&order_by=created_at+desc&is_test=0', NULL, '1.0', 15, 1, NULL, 1, 1, 1, '2019-03-04 20:07:53', '2019-03-04 20:11:34', NULL, NULL);
INSERT INTO `reports` VALUES (5, '498c2eb3-f950-4627-8f77-ddabd46237f1', NULL, 'Partners report', NULL, 'Partners report', NULL, '/partners/report?submit=Run&report_name=&rows_per_page=25&created_at_from=&created_at_till=&show_columns_csv=id%2Cname%2Csitecms_name%2Clive_url_root%2Cstatus%2Cis_published%2Cpublished_at%2Cis_active%2Caddress1%2Caddress2%2Ccity%2Ccounty%2Czip_code%2Ccountry_name%2Cphone%2Cmobile%2Clegal_name%2Cvat_no%2Cregistration_no%2Cein_no%2Ccontact_name%2Ccontact_email%2Ccontact_phone%2Ccontact_address%2Cfinance_contact_name%2Cfinance_contact_email%2Cfinance_contact_phone%2Cfinance_contact_address%2Ccommission_percentage_lb%2Ccommission_percentage_recommender%2Ccommission_percentage_total%2Crecommendation_expiry_in_days%2Crecommendation_count%2Caccount_holder_name%2Cbank_name%2Caccount_number%2Caccount_type%2Caccount_country%2Caccount_city%2Caccount_state%2Caccount_post_code%2Caccount_first_line%2Csort_code%2Cabartn%2Ciban%2Cswift%2Ccurrency%2Cbank_account_address%2Caccount_name&alias_columns_csv=id%2Cname%2Csitecms_name%2Clive_url_root%2Cstatus%2Cis_published%2Cpublished_at%2Cis_active%2Caddress1%2Caddress2%2Ccity%2Cco/unty%2Czip_code%2Ccountry_name%2Cphone%2Cmobile%2Clegal_name%2Cvat_no%2Cregistration_no%2Cein_no%2Ccontact_name%2Ccontact_email%2Ccontact_phone%2Ccontact_address%2Cfinance_contact_name%2Cfinance_contact_email%2Cfinance_contact_phone%2Cfinance_contact_address%2Ccommission_percentage_lb%2Ccommission_percentage_recommender%2Ccommission_percentage_total%2Crecommendation_expiry_in_days%2Crecommendation_count%2Caccount_holder_name%2Cbank_name%2Caccount_number%2Caccount_type%2Caccount_country%2Caccount_city%2Caccount_state%2Caccount_post_code%2Caccount_first_line%2Csort_code%2Cabartn%2Ciban%2Cswift%2Ccurrency%2Cbank_account_address%2Caccount_name&order_by=name+ASC\r\n', NULL, '1.0', 13, 1, NULL, 1, 1, 1, '2019-03-04 20:46:52', '2019-03-04 20:46:52', NULL, NULL);
INSERT INTO `reports` VALUES (6, '892f6c49-c1dd-43c8-b284-a006bbceab94', NULL, 'Invoices base report (Combines Users, Charities and Partners)', NULL, 'Invoices base report (Combines Users, Charities and Partners)', NULL, '/invoices/report?alias_columns_csv=&created_at_from=&created_at_till=&is_active=0&is_published=0&order_by=&report_name=&rows_per_page=10&show_columns_csv=&submit=Run', NULL, '1.0', 18, 1, NULL, 1, 1, 1, '2019-03-04 21:10:36', '2019-03-11 12:05:05', NULL, NULL);
INSERT INTO `reports` VALUES (8, '962f7bdb-d567-4b0e-b53d-b87d1d8a663d', NULL, 'Monthly Invoicing Report', NULL, 'Monthly Invoicing Report', 'Monthly report for manual invoicing', 'ns_csv=&submit=Run\r\n/purchases/report?alias_columns_csv=Id%2CPartner%20Name%2CProduct%20Name%2CPurchase%20Data%2CProduct%20Price%20in%20Product%20Currency%2CUser%20Commission%20in%20Partner%20Currency%2CCharity%20Donation%20in%20Partner%20Currency&from_date=&is_approved=%20&order_by=&partner_env=%20&report_name=&rows_per_page=25&show_columns_csv=id%2Cpartner_name%2Cproduct_name%2Cpurchase_data%2Cproduct_price_in_product_currency%2Cuser_commission_in_partner_currency%2Ccharity_share_percentage%2Ccharity_donation_in_partner_currency%2Clb_commission_in_partner_currency%2Cpartner_currency&submit=Run&to_date=', NULL, '1.0', 23, 0, 'Invoicing', 1, 1259, 1259, '2019-03-29 16:37:22', '2019-03-29 16:51:40', '2019-03-29 16:51:40', NULL);
INSERT INTO `reports` VALUES (9, '20de65bf-c270-4821-a037-d7e51778bcda', NULL, 'Conversion report (partner currency)', NULL, 'Conversion report (partner currency)', 'Transaction detail report - all values in partner currency (for invoicing)', '/purchases/report?alias_columns_csv=Partner%2CPartner%20Currency%2CTransaction%20ID%2CProduct%20Name%2CProduct%20SKU%2CPurchased%20At%2CPrice%2CUser%20Commission%2CCharity%20Selected%2CCharity%20%25age%2CCharity%20Donation%2CLetsBab%20Commission&from_date=&is_approved=%20&order_by=&partner_env=%20&report_name=&rows_per_page=25&show_columns_csv=partner_name%2Cpartner_currency%2Cid%2Cproduct_name%2Cproduct_sku%2Cpurchased_at%2Cproduct_price_in_partner_currency%2Cuser_commission_in_partner_currency%2Ccharity_name%2Ccharity_share_percentage%2Ccharity_donation_in_partner_currency%2Clb_commission_in_partner_currency&submit=Run&to_date=', NULL, '1.0', 17, 0, NULL, 1, 1259, 1259, '2019-03-29 16:51:28', '2019-03-29 16:51:28', NULL, NULL);
INSERT INTO `reports` VALUES (10, '771c2d02-01ea-4d44-821a-2673c5b66386', NULL, 'Conversion report - Default', NULL, 'Conversion report - Default', 'Default report for purchase', '/purchases/report?alias_columns_csv=ID%2CCreated%20at%2CProduct%2CSKU%2COrder%2CPartner%2CCharity%20Name%2CCurrency%2CPrice%2CUser%2CChariy%2Cstatus%2CShort%20Code&from_date=&is_approved=%20&order_by=&pur_partner_env=%20&report_name=&route=&rows_per_page=25&show_columns_csv=id%2Ccreated_at%2Cproduct_name%2Cproduct_sku%2Cproduct_order_id%2Cpartner_name%2Ccharity_name%2Cproduct_currency%2Cproduct_price_in_product_currency%2Cuser_commission_in_partner_currency%2Ccharity_donation_in_partner_currency%2Cstatus%2Crecommendurl_short_code&submit=Run&to_date=', NULL, '1.0', 17, 1, 'default', 1, 1, 1, '2019-04-02 09:51:09', '2019-04-02 14:07:00', NULL, NULL);
INSERT INTO `reports` VALUES (11, '751545d5-a4a0-49fe-96d4-775c47ec17bb', NULL, 'Recommendation Report with Test Field', NULL, 'Recommendation Report with Test Field', 'Recommendation data with ability to filter out test', '/recommendurls/report?alias_columns_csv=ID%2CUser%20ID%2CUser%20name%2CTIme%2CURL%2CShort%20Code%2CPartner%20ID%2CPartner%20Name%2CProduct%2CCurrency%2CPrice%2CENV%2CExpiry%20time%2CExpired%3F%2CCharity%20ID%2CCharity%20Name%2CLB%20%25%2CUser%20%25%2CCharity%20%25%2CShared%3F%2CTest&created_at_from=&created_at_till=&expires_at_from=&expires_at_till=&has_expired=0&is_shared=1&is_test=0&order_by=created_at%20desc&report_name=&rows_per_page=25&show_columns_csv=id%2Crecommender_user_id%2Cuser_name%2Ccreated_at%2Curl%2Cshort_code%2Cpartner_id%2Cpartner_name%2Cproduct_name%2Cproduct_price_currency%2Cproduct_price%2Clb_env%2Cexpires_at%2Chas_expired%2Ccharity_id%2Ccharity_name%2Ccommission_percentage_lb%2Ccommission_percentage_recommender%2Ccharity_share_percentage%2Cis_shared%2Cis_test&submit=Run', NULL, NULL, 15, 0, NULL, 1, 1259, 1259, '2019-04-04 21:06:39', '2019-04-04 21:06:39', NULL, NULL);
INSERT INTO `reports` VALUES (12, 'bbb26cc6-da3b-48d4-8658-e95b164aae90', NULL, 'Claire - Charity Report', NULL, 'Claire - Charity Report', NULL, '/purchases/report?alias_columns_csv=ID%2CCreated%20at%2CProduct%2CSKU%2COrder%2CPartner%2CCharity%20Name%2CCurrency%2CPrice%2CUser%2CChariy%2Cstatus%2CShort%20Code%2CCharity%20Share%20Percentage%2Cuser_name%2Crecommender_user_id%2Crecommender_full_name%2Ccountry_name&from_date=&is_approved=%20&is_test=0&order_by=&partner_env=%20&report_name=&route=&rows_per_page=25&show_columns_csv=id%2Ccreated_at%2Cproduct_name%2Cproduct_sku%2Cproduct_order_id%2Cpartner_name%2Ccharity_name%2Cproduct_currency%2Cproduct_price_in_product_currency%2Cuser_commission_in_partner_currency%2Ccharity_donation_in_partner_currency%2Cstatus%2Crecommendurl_short_code%2Ccharity_share_percentage%2Cuser_name%2Crecommender_user_id%2Crecommender_full_name%2Ccountry_name&submit=Run&to_date=', NULL, NULL, 17, 0, NULL, 0, 1863, 1863, '2019-04-16 13:41:07', '2019-04-16 13:41:07', NULL, NULL);
INSERT INTO `reports` VALUES (13, 'efc26b7f-f8d3-4771-90e2-69a7857e9bb4', NULL, 'User & charity balances  for invoicing', NULL, 'User & charity balances  for invoicing', 'Gives user balances in the liability currency, and charity balances in the liability currency  for invoicing.', NULL, NULL, NULL, 0, 0, NULL, 0, 1259, 1259, '2019-05-05 03:31:59', '2019-05-05 03:32:22', '2019-05-05 03:32:22', NULL);
INSERT INTO `reports` VALUES (14, '1b2690aa-ea69-41d0-b400-7aed3cdf406e', NULL, 'Conversions with User Commission in User Currency & Charity Donations in Charity Currency', NULL, 'Conversions with User Commission in User Currency & Charity Donations in Charity Currency', NULL, '/purchases/report?alias_columns_csv=ID%2CCreated%20at%2CProduct%2CSKU%2COrder%2CPartner%2CCharity%20Name%2CCurrency%2CPrice%2CUser%2CChariy%2Cstatus%2CShort%20Code%2CUser%20Currency%2CUser%20Commission%20User%20Currency%2CCharity%20Currency%2CCharity%20Donation%20in%20Charity%20Currency&from_date=&is_approved=%20&is_test=0&order_by=&partner_env=%20&report_name=&route=&rows_per_page=25&show_columns_csv=id%2Ccreated_at%2Cproduct_name%2Cproduct_sku%2Cproduct_order_id%2Cpartner_name%2Ccharity_name%2Cproduct_currency%2Cproduct_price_in_product_currency%2Cuser_commission_in_partner_currency%2Ccharity_donation_in_partner_currency%2Cstatus%2Crecommendurl_short_code%2Cuser_currency%2Cuser_commission_in_user_currency%2Ccharity_currency%2Ccharity_donation_charity_currency&submit=Run&to_date=', NULL, NULL, 17, 0, NULL, 0, 1259, 1259, '2019-05-05 03:35:42', '2019-05-05 03:35:42', NULL, NULL);
INSERT INTO `reports` VALUES (15, '50e37eda-adc5-46f0-a860-f363defcbe6d', NULL, 'User Commission report', NULL, 'User Commission report', 'Report showing recommender name, currency & payment amount', '/purchases/report?alias_columns_csv=ID%2CCreated%20at%2CProduct%2CSKU%2COrder%2CPartner%2CCharity%20Name%2CCurrency%2CPrice%2CUser%2CChariy%2Cstatus%2CShort%20Code%2CRecommender%2CUser%20Currency%2CUser%20Commission%20in%20User%20Currency&from_date=&is_approved=%20&is_test=0&order_by=&partner_env=%20&report_name=&route=&rows_per_page=25&show_columns_csv=id%2Ccreated_at%2Cproduct_name%2Cproduct_sku%2Cproduct_order_id%2Cpartner_name%2Ccharity_name%2Cproduct_currency%2Cproduct_price_in_product_currency%2Cuser_commission_in_partner_currency%2Ccharity_donation_in_partner_currency%2Cstatus%2Crecommendurl_short_code%2Crecommender_full_name%2Cuser_currency%2Cuser_commission_in_user_currency&submit=Run&to_date=', NULL, NULL, 17, 0, NULL, 0, 1259, 1259, '2019-05-15 08:17:36', '2019-05-15 08:17:36', NULL, NULL);
INSERT INTO `reports` VALUES (16, '074f13ea-5a7c-49dc-95f2-c3e384105059', NULL, 'Conversion Report - Charity', NULL, 'Conversion Report - Charity', 'Conversion report showing additional parameters:\r\n\r\nPurchase date\r\nCharity Donation %age\r\nCharity Currency\r\nCharity Donation Value in Charity Currency', '/purchases/report?alias_columns_csv=ID%2CCreated%20at%2CProduct%2CSKU%2COrder%2CPartner%2CCharity%20Name%2CCurrency%2CPrice%2CUser%2CChariy%2Cstatus%2CShort%20Code%2Cpurchase%20date%2Ccharity%20donation%2Ccharity%20currency%2Ccharity%20donation%20in%20charity%20currency&from_date=&is_approved=%20&is_test=0&order_by=&partner_env=%20&report_name=&route=&rows_per_page=25&show_columns_csv=id%2Ccreated_at%2Cproduct_name%2Cproduct_sku%2Cproduct_order_id%2Cpartner_name%2Ccharity_name%2Cproduct_currency%2Cproduct_price_in_product_currency%2Cuser_commission_in_partner_currency%2Ccharity_donation_in_partner_currency%2Cstatus%2Crecommendurl_short_code%2Cpurchased_at%2Ccharity_share_percentage%2Ccharity_currency%2Ccharity_donation_charity_currency&submit=Run&to_date=', NULL, NULL, 17, 0, NULL, 0, 1259, 1259, '2019-06-17 10:43:32', '2019-06-17 10:43:32', NULL, NULL);
INSERT INTO `reports` VALUES (17, 'ddd995c3-7c80-4419-b10f-5954d4e6f0fc', NULL, 'Conversion Aid-declaration report', NULL, 'Conversion Aid-declaration report', 'This report shows all transactions eligible for the payment, each payment cycle e.g. for 20th April payment this report would show all eligible gift aid donations included in that payment cycle.', '/purchases/report?alias_columns_csv=First%20Name%2CSurname%2CHome%20Address%2CHome%20Address%20Line%202%2CPostcode%2CCountry%2CEmail%2CDate%20of%20Declaration%2CTransaction%20ID%2CTransaction%20Date%2CDonation%20Amount%2CStatus&from_date=&is_approved=%20&is_test=0&order_by=&partner_env=%20&report_name=&route=&rows_per_page=25&show_columns_csv=aiddeclaration_first_name%2Caiddeclaration_last_name%2Caiddeclaration_address1%2Caiddeclaration_address2%2Caiddeclaration_zip_code%2Caiddeclaration_country_name%2Caiddeclaration_email%2Caiddeclaration_date%2Cid%2Ccreated_at%2Ccharity_donation_in_partner_currency%2Cstatus&submit=Run&to_date=', NULL, '1.0', 17, 0, NULL, 1, 2062, 2062, '2019-07-01 06:37:35', '2019-07-01 06:37:35', NULL, NULL);

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
  `description` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `value` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, '6e9d6b57-966d-4b1e-aa77-fc937d9118b6', 'app-name', 'Mainframe', 'string', 'test description', 'LetsBab', 1, 1, 1, '2018-12-24 20:25:41', '2019-03-29 14:22:26', NULL, NULL);
INSERT INTO `settings` VALUES (2, '2dfc744e-752b-49ef-baee-048fa2fa4969', 'ios-app-version', 'iOS App Version', 'string', 'Latest iOS app version. This is matched with the users app version to prompt app update.', '1.2.0', 1, 1, 1, '2018-12-24 20:26:42', '2019-05-17 07:53:55', NULL, NULL);
INSERT INTO `settings` VALUES (3, 'e446d927-902b-4633-83d8-5f9fa0ef43cb', 'android-app-version', 'Android App Version', 'string', 'Latest Android app version. This is matched with the users app version to prompt app update.', '1.24', 0, 1, 1, '2018-12-24 20:27:46', '2019-04-11 09:16:28', NULL, NULL);
INSERT INTO `settings` VALUES (4, '279fb65c-30c2-4727-b3e6-fc18a3476bf7', 'mobile-portrait-help-steps', 'Mobile Portrait Help Steps', 'file', 'Mobile Portrait Helps slides for screen size.', NULL, 1, 1, 1, '2019-03-19 10:02:46', '2019-03-20 09:21:39', NULL, NULL);
INSERT INTO `settings` VALUES (5, 'f8e2ab99-e6ef-46d5-ae98-edee783b8f56', 'mobile-landscape-help-steps', 'Mobile Landscape Help Steps', 'file', 'Mobile landscape Helps slides for screen size.', NULL, 1, 1, 1, '2019-03-19 10:15:44', '2019-03-30 09:19:32', NULL, NULL);
INSERT INTO `settings` VALUES (6, 'f05d80a3-9f0d-4f29-982c-331c4f1a4c38', 'ipad-landscape-help-steps', 'ipad Landscape Help Steps', 'file', 'ipad landscape Helps slides for screen size.', NULL, 1, 1, 1, '2019-03-19 11:21:31', '2019-03-19 12:53:38', NULL, NULL);
INSERT INTO `settings` VALUES (7, '38b7feda-f71f-4d33-a747-f76a3ef2dd6c', 'ipad-Portrait-help-steps', 'ipad Portrait Help Steps', 'file', 'ipad Portrait Helps slides for screen size.', NULL, 1, 1, 1, '2019-03-19 11:23:45', '2019-03-20 08:57:38', NULL, NULL);
INSERT INTO `settings` VALUES (8, '9b8c14eb-9727-45cd-aac8-408ce28ef9ff', 'iphone-x-portrait-help-steps', 'iphone x portrait Help Steps', 'file', 'iphone x portrait Helps slides for screen size.', NULL, 1, 1, 1, '2019-03-19 11:27:09', '2019-03-19 12:44:58', NULL, NULL);
INSERT INTO `settings` VALUES (9, '52c18f31-b450-47c7-b832-2d7022118d26', 'popup-show-time', 'Popup show time', 'string', NULL, '1000', 1, 2, 2, '2019-03-27 15:31:06', '2019-03-28 15:21:06', NULL, NULL);
INSERT INTO `settings` VALUES (10, 'c20bb33e-2252-4412-bfce-53ab92b911b7', 'test-addition', 'test', 'string', NULL, 'test', 0, 1, 1, '2019-03-29 14:22:42', '2019-03-29 18:01:26', '2019-03-29 18:01:26', NULL);
INSERT INTO `settings` VALUES (11, 'e59fe84e-eb1f-4207-ba19-3cad930731e0', 'app-version-android', 'Android App Version', 'string', 'Latest Android app version. This is matched with the users app version to prompt app update.', '1.4.5', 1, 1, 1, '2019-04-12 04:42:28', '2019-06-20 11:42:33', NULL, NULL);
INSERT INTO `settings` VALUES (12, 'f49feefd-ca6e-47de-999a-f3a199b08a92', 'app-version-ios', 'iOS App Version', 'string', 'Latest iOS app version. This is matched with the users app version to prompt app update.', '1.3.5', 1, 1, 1, '2019-04-12 04:43:41', '2019-06-17 07:16:41', NULL, NULL);
INSERT INTO `settings` VALUES (13, '21da3eb2-977f-4200-b699-56febe1957ef', 'review-popup-setting', 'Review Pop Up Settings', 'array', 'Here are the values which use to show/hide the app review popup on the mobile app. Below points you need to keep in your mind for any changes.<br />\r\n1. Never change the parameter names.<br />\r\n2. If you want to stop/disable any condition just remove that parameter from the above value box data. It will be good if you can store somewhere for reminder befor save it. May be you want it again in future.<br />\r\n3. The time value is in minutes for &#39;app-time-spent&#39; and &#39;second_time&#39; parameters. So if you want to set it 2 hours you need to replace 15 by 120.', '{\r\n  \"recommendations\": 10000,\r\n  \"conversions\": 200,\r\n  \"app_time_spent\": 2,\r\n  \"second_time\": 6,\r\n  \"viewed_brands\": 6000,\r\n  \"select_charity\": 100,\r\n  \"total_made\": 2000.33,\r\n  \"total_shared\": 120000\r\n}', 1, 1, 1, '2019-04-18 10:21:39', '2019-06-12 13:05:04', NULL, NULL);
INSERT INTO `settings` VALUES (14, 'db7adc17-fb5a-4dc5-811d-b6e0fc03183b', 'crowd-funding-popup-enable', 'Crowd Funding Popup', 'boolean', NULL, 'false', 1, 1, 1, '2019-05-09 11:45:27', '2019-06-25 09:24:04', NULL, NULL);
INSERT INTO `settings` VALUES (15, '899243d5-f301-4e82-a905-b5226b456dd1', 'home-screen-popup-enable', 'Two home screen popups', 'array', 'This single setting used to enable / disable => \"Shop It | Bab It | Bank It | Give It\" popup and \"Cookie and Terms & condition\" popup.', '{\r\n\"shopBabBankGive\": true,\r\n\"shopBabBankGiveText\": \"Shop It | Bab It | Bank It | Give It\",\r\n\"cookieTermsAndCondition\": true,\r\n\"cookieURL\": \"https://www.letsbab.com/cookies-policy/\",\r\n\"termsAndConditionsURL\": \"http://www.letsbab.com/termsofuse/\",\r\n\"cookieTermsAndConditionText\": \"By using our app, you agree to our http://www.letsbab.com/termsofuse/ and our https://www.letsbab.com/cookies-policy/\",\r\n\"cookieURLReplaceText\": \"Privacy and Cookie Statement.\",\r\n\"termsAndConditionsURLReplaceText\": \"Terms and Conditions\"\r\n}', 1, 1, 1, '2019-05-09 12:41:03', '2019-07-05 05:04:06', NULL, NULL);
INSERT INTO `settings` VALUES (16, 'ef8ec3fb-92c9-4254-86f5-fee1d6a0931a', 'update-app-popup', 'Update app popup', 'array', '<strong>nTimeToDisplay</strong> = How many times to show \"App update popup\".<br />\r\n<strong>interval</strong> (in minutes) = Time different between showing this popup. E.g. First time this popup displayed, and user not updated the app, after that user have to spent N minutes (E.g. 15) in app to see this popup again.<br />\r\n<strong>popupLine1</strong> = First line of app update popup.<br />\r\n<strong>popupLine2</strong> = Second line of app update popup.<br />\r\n<strong>buttonText = </strong>Text of bottom button. This button will open relevant app store to update app.<br />\r\n<br />\r\nIf you want to disable this popup, then change first two field values to 0. You can also remove first two fields to disable this popup.', '{\r\n\"nTimeToDisplay\": 6,\r\n\"interval\": 10,\r\n\"popupLine1\": \"\",\r\n\"popupLine2\": \"To continue \'Babbing\' please update your app to unlock exciting new changes!\",\r\n\"buttonText\": \"Update\"\r\n}', 1, 1, 1, '2019-05-23 06:39:38', '2019-06-20 13:46:34', NULL, NULL);
INSERT INTO `settings` VALUES (17, '89d6040e-2f19-4127-95cc-cd6f46b9b354', 'first-notification-update-bank-detail', 'First Notification Update Bank Detail', 'array', 'The COMMISSION_AMOUNT is a constant which will use to replace with actual value at app end..', '{\r\n\"message\": \"You’ve made COMMISSION_AMOUNT in commission! Please enter your payment details.\"\r\n}', 1, 1, 1, '2019-06-05 10:03:06', '2019-06-18 10:54:42', NULL, NULL);
INSERT INTO `settings` VALUES (18, '9565d2e6-996b-46d1-aa3e-db92f73bf595', 'test', 'test', 'string', 'lest', 'test', 0, 1, 1, '2019-06-05 10:06:52', '2019-10-16 15:33:42', NULL, NULL);
INSERT INTO `settings` VALUES (19, 'c87f5654-5080-4981-9a6e-6630828f8255', 'recommend_popup', 'Recommend additional popup', 'array', '<strong>enable  </strong>= <strong>0</strong> for disable and <strong>1 </strong>for enable.<br />\r\n<strong>iosMsg </strong>= Message to show in ios apps only.<br />\r\n<strong>androidMsg  </strong>= Message to show in android apps only.', '{\r\n\"enable\": 1,\r\n\"iosMsg\": \"\\\\u{1F44A} You\'ve made a recommendation! If your friend buys it, it can take up to 48 hours to show in your app.\",\r\n\"androidMsg\": \"\\\\u{1F44A} You\'ve made a recommendation! If your friend buys it, it can take up to 48 hours to show in your app.\"\r\n}', 1, 1, 1, '2019-06-13 07:47:20', '2019-06-17 07:23:25', NULL, NULL);
INSERT INTO `settings` VALUES (20, 'a56df79f-8a30-4f50-8964-a64fffb90079', 'rev_split_buy_now_popup', 'Revenue Split Buy Now Popup', 'array', '<strong>popupLine1</strong>: First line of popup<br />\r\n<strong>popupLine2</strong>: Second line of popup. If you don\'t want to show the name of recommender (User A), then you can remove the word \"USERNAME\". Otherwise you need to keep this word as it is. This word will replace with the first name of User A.<br />\r\n<strong>buttonText</strong>: Bottom button text.', '{\r\n\"popupLine1\": \"Welcome to LetsBab!\",\r\n\"popupLine2\": \"Don\'t forget USERNAME\'s recommendation is waiting for you \\\\u{1F4E6}\",\r\n\"buttonText\": \"Check it out\"\r\n}', 0, 1, 1, '2019-06-27 06:43:46', '2019-07-02 12:28:04', NULL, NULL);
INSERT INTO `settings` VALUES (21, '4ccd44ff-ed04-4927-9b86-ccb48b271633', 'asdfasdf', 'Location popup message text.', 'array', 'For location popup, we are showing tow popup in app.<br />\r\n1) Using first popup we are asking user, why we need this permission. If user denied the permission first time. <strong>This popup only specific to Android OS.</strong><br />\r\n2). Second popup displays to guide user, how to enable location permission, when it is permanently disabled by user.<br />\r\n<br />\r\n<strong>title:</strong> Title of dfirst popup. Only for Android. asdf<br />\r\n<strong>popup1Msg</strong>: Message for first popup. Only for Android.<br />\r\n<br />\r\n<strong>androidMsg</strong>: For android message we can change \"<em><strong>LetsBab needs location permission, please enable it from</strong></em>\" and \"<em><strong>To do that select</strong></em>\". Rest of words we need to keep as it is.<br />\r\n<br />\r\n<strong>iosMsg:</strong> For ios message we can also change \"<em><strong>LetsBab needs location permission, please enable it from</strong></em>\" and \"<em><strong>To do that select</strong></em>\". Rest of words we need to keep as it is.', '{\r\n\"title\": \"Location Permission\",\r\n\"popup1Msg\": \"Letsbab App needs access to your device location so you can see brands that are available in your region.\",\r\n\"androidMsg\": \"LetsBab needs location permission, please enable it from settings.\\nTo do that select Open Settings -> Permissions -> enable \'Location\'.\",\r\n\"iosMsg\": \"LetsBab needs location permission, please enable it from settings.\\nTo do that select Open Settings -> Location -> select \'While Using the App\'.\"\r\n}', 0, 1, 1, '2019-07-09 13:47:52', '2019-10-24 09:53:56', NULL, NULL);
INSERT INTO `settings` VALUES (22, '456fcf8a-274a-436b-89c7-384651f4f0e2', 'asdfasdf', '', 'boolean', '', '', 0, NULL, NULL, '2019-10-24 10:15:47', '2019-10-24 10:15:47', NULL, NULL);
INSERT INTO `settings` VALUES (23, '77caa344-ce49-40c9-b3fd-1b8e225f625e', 'asdfasdf', '', 'boolean', '', '', 0, NULL, NULL, '2019-10-24 10:16:09', '2019-10-24 10:16:09', NULL, NULL);
INSERT INTO `settings` VALUES (24, '3ed7267a-5caa-49fb-bc8e-44492ae1333d', 'tertreyryrty', '', 'boolean', '', '', 0, NULL, NULL, '2019-10-24 10:16:52', '2019-10-24 10:16:52', NULL, NULL);
INSERT INTO `settings` VALUES (25, '88f40313-9793-43e3-b777-ef49ced38378', 'raihan', '', 'boolean', '', '', 0, NULL, NULL, '2019-10-24 10:17:11', '2019-10-24 10:17:11', NULL, NULL);
INSERT INTO `settings` VALUES (26, '9a0ab966-d229-44f0-beb8-f3fa8f5cac80', 'raihan', '', 'boolean', '', '', 0, NULL, NULL, '2019-10-24 10:18:47', '2019-10-24 10:18:47', NULL, NULL);
INSERT INTO `settings` VALUES (27, '60633455-2617-48c3-88d5-615733935f36', 'asdfasdf', '', 'boolean', '', '', 0, NULL, NULL, '2019-10-24 10:19:04', '2019-10-24 10:19:04', NULL, NULL);
INSERT INTO `settings` VALUES (28, 'a8b42074-91c9-40ac-be19-52ae08f9fd0a', 'asdfasdf', '', 'boolean', '', '', 0, NULL, NULL, '2019-10-24 10:19:23', '2019-10-24 10:19:23', NULL, NULL);
INSERT INTO `settings` VALUES (29, '74a81c0f-8d10-415a-99c0-b2c929f05415', 'sdfasdf', NULL, 'boolean', NULL, NULL, 0, 5, 5, '2019-10-24 10:23:16', '2019-10-24 10:23:16', NULL, NULL);
INSERT INTO `settings` VALUES (30, '74a81c0f-8d10-415a-99c0-b2c929f05415', 'sdfasdf', NULL, 'boolean', NULL, NULL, 0, 5, 5, '2019-10-24 10:24:04', '2019-10-24 10:24:04', NULL, NULL);
INSERT INTO `settings` VALUES (31, '74a81c0f-8d10-415a-99c0-b2c929f05415', 'sdfasdf', NULL, 'boolean', NULL, NULL, 0, 5, 5, '2019-10-24 10:24:34', '2019-10-24 10:24:34', NULL, NULL);
INSERT INTO `settings` VALUES (32, '727517d9-4757-44e7-a528-dcaa835365eb', 'aaa', 'asdf', 'string', NULL, 'asdfsdf', 0, 5, 5, '2019-10-24 10:27:53', '2019-12-02 21:11:23', NULL, NULL);
INSERT INTO `settings` VALUES (33, '41ca3ed4-5b3d-4bb2-a020-326396efe209', 'Wow', NULL, 'string', NULL, NULL, 1, 5, 5, '2019-10-24 13:20:52', '2019-10-28 10:51:09', '2019-10-28 10:51:09', NULL);
INSERT INTO `settings` VALUES (34, 'd602a787-1b8c-46c9-aa64-2ad6aa830c70', 'test-upload', 'test upload', 'string', NULL, 'asdfadf', 0, 5, 5, '2019-10-31 09:56:42', '2019-10-31 09:57:32', NULL, NULL);
INSERT INTO `settings` VALUES (35, 'e85d9a3d-b77e-46db-9422-078eeac8923a', 'sASDasd', 'asdASD', 'string', NULL, 'AsdaSD', 0, 5, 5, '2019-10-31 10:09:22', '2019-11-22 09:28:42', NULL, NULL);
INSERT INTO `settings` VALUES (36, 'cdbff8f5-b6a7-4c73-9c65-2f3f46f5138a', 'testasdfsadf', 'asdfasdfasdf', 'string', NULL, 'asdfasdf', 0, 5, 5, '2019-10-31 10:33:21', '2019-10-31 11:35:22', NULL, NULL);
INSERT INTO `settings` VALUES (37, 'd793a3f5-477a-4ba0-94dc-3bd3aa3064fe', 'fouritems', 'fouritems', 'string', NULL, 'asdfasdf', 0, 5, 5, '2019-10-31 13:00:19', '2019-10-31 13:00:19', NULL, NULL);
INSERT INTO `settings` VALUES (38, '8ebb7c68-ccb4-414b-8633-8d08f602b10c', 'sadfasdf', 'asdfasdf', 'string', NULL, 'asdfasdf', 0, 5, 5, '2019-10-31 13:01:56', '2019-10-31 13:01:56', NULL, NULL);
INSERT INTO `settings` VALUES (39, '931f290b-8cd3-4ca1-a0f1-087bb1355b8a', 'some-setting-tag', 'Lorem Ipsum dolor Sit amet', 'string', NULL, 'Lorel ipsum dolor sit amet', 0, 5, 5, '2019-10-31 13:10:35', '2019-11-20 11:03:13', '2019-11-20 11:03:13', NULL);
INSERT INTO `settings` VALUES (40, 'a3645306-4f30-41f1-845f-f2ae2ed77dcf', 'rrrr', 'rrrr', 'boolean', NULL, 'true', 0, 5, 5, '2019-11-12 12:18:05', '2019-11-12 12:18:47', '2019-11-12 12:18:47', NULL);
INSERT INTO `settings` VALUES (41, 'fadb9776-d741-4248-bfa8-19a4a1757081', 'test555', '555523wer', 'string', 'asdfasdf aasdfaf', 'test', 1, 5, 5, '2019-11-20 11:03:42', '2019-12-05 10:24:07', NULL, NULL);
INSERT INTO `settings` VALUES (42, 'd879c7df-d4ce-48c7-8abc-dc82af05a37d', 'dfasdfasdf', 'asdfasdfasdf', 'string', NULL, 'asdfadsafsdf', 1, 5, 5, '2019-12-02 16:57:43', '2019-12-02 16:58:10', NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of telescope_entries
-- ----------------------------
INSERT INTO `telescope_entries` VALUES (1, '8e92cbbc-5d17-4525-9a70-54eb026b8d0e', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', 'ad7d07e5104cadcc6e9623dfc5fefdd8', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from information_schema.tables where table_schema = \'mainframe\' and table_name = \'migrations\' and table_type = \'BASE TABLE\'\",\"time\":\"7.57\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:44');
INSERT INTO `telescope_entries` VALUES (2, '8e92cbbc-7821-4210-ac05-d17edb5d704b', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', '246242198a8fbc1beb167611385ac644', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `migrations` (`id` int unsigned not null auto_increment primary key, `migration` varchar(255) not null, `batch` int not null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"45.23\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:44');
INSERT INTO `telescope_entries` VALUES (3, '8e92cbbc-7b1a-43fc-8008-c29bd8c701ca', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', 'ed08a59c7f0b8851f0fd2291ca94d5c7', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select `migration` from `migrations` order by `batch` asc, `migration` asc\",\"time\":\"4.37\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:44');
INSERT INTO `telescope_entries` VALUES (4, '8e92cbbc-7d25-4f4a-91c7-8effa406289f', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', '06e60d7b3d1a0c2de504de4e6f27735e', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select max(`batch`) as aggregate from `migrations`\",\"time\":\"0.69\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:44');
INSERT INTO `telescope_entries` VALUES (5, '8e92cbbc-88fd-492f-b49d-b6c744617919', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', '47c20151560e04dbf058d1eaaf31fc80', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `users` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(255) not null, `email` varchar(255) not null, `email_verified_at` timestamp null, `password` varchar(255) not null, `remember_token` varchar(100) null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"26.35\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\database\\\\migrations\\\\2014_10_12_000000_create_users_table.php\",\"line\":24,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (6, '8e92cbbc-92a0-4d94-ac67-e47cb9f74fe5', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', '0648806a3d18c0f5b81e2257de64675e', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `users` add unique `users_email_unique`(`email`)\",\"time\":\"22.98\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\database\\\\migrations\\\\2014_10_12_000000_create_users_table.php\",\"line\":24,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (7, '8e92cbbc-96f9-4b1d-b79e-d67d30e553f1', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', 'f2b8e8e4266db16aec6db940c643eb68', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'2014_10_12_000000_create_users_table\', 1)\",\"time\":\"9.30\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (8, '8e92cbbc-a1d5-443b-9990-76e6ab8dafee', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', '6a64d07661eabf9849c9a4281ec344ad', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `password_resets` (`email` varchar(255) not null, `token` varchar(255) not null, `created_at` timestamp null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"26.14\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\database\\\\migrations\\\\2014_10_12_100000_create_password_resets_table.php\",\"line\":20,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (9, '8e92cbbc-ab19-42fe-9bdb-cdbe96474832', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', 'e47bfd004ad9142afc1b2460960fbe08', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `password_resets` add index `password_resets_email_index`(`email`)\",\"time\":\"22.06\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\database\\\\migrations\\\\2014_10_12_100000_create_password_resets_table.php\",\"line\":20,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (10, '8e92cbbc-af9c-4644-9f41-2c4912e12b7d', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', 'f2b8e8e4266db16aec6db940c643eb68', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'2014_10_12_100000_create_password_resets_table\', 1)\",\"time\":\"10.30\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (11, '8e92cbbc-be2c-491c-a7bc-e1206eaffa21', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', 'd9429550f8856c1af1c89f24a6440cb5', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `telescope_entries` (`sequence` bigint unsigned not null auto_increment primary key, `uuid` char(36) not null, `batch_id` char(36) not null, `family_hash` varchar(255) null, `should_display_on_index` tinyint(1) not null default \'1\', `type` varchar(20) not null, `content` longtext not null, `created_at` datetime null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"34.19\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (12, '8e92cbbc-c7be-4a51-a923-69a047bbe1be', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', '9fb859ae1faff74c6b9e0b70dfd8eea9', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries` add unique `telescope_entries_uuid_unique`(`uuid`)\",\"time\":\"23.45\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (13, '8e92cbbc-d455-47df-b193-db6c101f9b99', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', '2b075509a9242d6e3f622536c5ccca07', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries` add index `telescope_entries_batch_id_index`(`batch_id`)\",\"time\":\"31.01\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (14, '8e92cbbc-e88a-4696-8b54-f861b9bbae76', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', '7317a4cad2dfa1a5167548a6acd0b6a5', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries` add index `telescope_entries_type_should_display_on_index_index`(`type`, `should_display_on_index`)\",\"time\":\"50.77\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (15, '8e92cbbc-f198-4a53-a06c-374fc62f9eeb', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', '3d25a2a244bd2028dfa0326d3dbf7f4c', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries` add index `telescope_entries_family_hash_index`(`family_hash`)\",\"time\":\"22.30\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (16, '8e92cbbd-0032-4cee-a886-7beef1115cac', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', '5ed47d3cfcd3051674e3cb7b613f0fba', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `telescope_entries_tags` (`entry_uuid` char(36) not null, `tag` varchar(255) not null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"36.19\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (17, '8e92cbbd-0f82-4141-92fb-86ef3aaa317a', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', 'd77cdf5585b51f60954d40e76786e20f', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries_tags` add index `telescope_entries_tags_entry_uuid_tag_index`(`entry_uuid`, `tag`)\",\"time\":\"38.10\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (18, '8e92cbbd-164c-4ae8-97db-3d69bf120a93', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', '0bdb35d17e876d6225a7774a2c17647d', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries_tags` add index `telescope_entries_tags_tag_index`(`tag`)\",\"time\":\"16.58\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (19, '8e92cbbd-4534-4404-8f4c-fa18266d9ed2', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', '662a818f80a3a9ba2570081fd7a6af2f', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"alter table `telescope_entries_tags` add constraint `telescope_entries_tags_entry_uuid_foreign` foreign key (`entry_uuid`) references `telescope_entries` (`uuid`) on delete cascade\",\"time\":\"118.88\",\"slow\":true,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (20, '8e92cbbd-4eb8-47ee-9a2d-0cfb39e55755', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', '8cddf327ba1b3bd52637b409200a4c1f', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `telescope_monitoring` (`tag` varchar(255) not null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"23.20\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (21, '8e92cbbd-52b7-4de4-be19-79631110b6a6', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', 'f2b8e8e4266db16aec6db940c643eb68', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'2018_08_08_100000_create_telescope_entries_table\', 1)\",\"time\":\"9.04\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (22, '8e92cbbd-5ee6-4310-87cd-c71ccea3e6a0', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', 'fae1ec3edafa895343ae718d06e992c7', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"create table `failed_jobs` (`id` bigint unsigned not null auto_increment primary key, `connection` text not null, `queue` text not null, `payload` longtext not null, `exception` longtext not null, `failed_at` timestamp default CURRENT_TIMESTAMP not null) default character set utf8mb4 collate \'utf8mb4_unicode_ci\'\",\"time\":\"29.75\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\database\\\\migrations\\\\2019_08_19_000000_create_failed_jobs_table.php\",\"line\":23,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (23, '8e92cbbd-6076-439a-be3d-a62c6e0a208f', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', 'f2b8e8e4266db16aec6db940c643eb68', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"insert into `migrations` (`migration`, `batch`) values (\'2019_08_19_000000_create_failed_jobs_table\', 1)\",\"time\":\"2.69\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\artisan\",\"line\":37,\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (24, '8e92cbbd-6117-415e-86b0-5d4b9a1b3f11', '8e92cbbd-615e-4a45-8cf5-f2f1dafe7800', NULL, 1, 'command', '{\"command\":\"migrate\",\"exit_code\":0,\"arguments\":{\"command\":\"migrate\"},\"options\":{\"database\":null,\"force\":false,\"path\":[],\"realpath\":false,\"pretend\":false,\"seed\":false,\"step\":false,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"Raihan\"}', '2019-09-04 15:35:45');
INSERT INTO `telescope_entries` VALUES (25, '8e92cbcb-f3b2-4f11-8955-9d0bc0fa99fb', '8e92cbcb-fa92-4d15-9b69-b3f95a0435da', NULL, 1, 'command', '{\"command\":\"telescope:publish\",\"exit_code\":0,\"arguments\":{\"command\":\"telescope:publish\"},\"options\":{\"force\":false,\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":false,\"no-ansi\":false,\"no-interaction\":false,\"env\":null},\"hostname\":\"Raihan\"}', '2019-09-04 15:35:55');
INSERT INTO `telescope_entries` VALUES (26, '8f19d05e-2e84-4815-89d0-10b6c6818f11', '8f19d05e-5880-471a-b0b0-5657af64c572', NULL, 1, 'cache', '{\"type\":\"hit\",\"key\":\"modules.hasTable\",\"value\":true,\"hostname\":\"Raihan\"}', '2019-11-10 18:25:27');
INSERT INTO `telescope_entries` VALUES (27, '8f19d05e-352c-4c6d-a7d2-d034cd54de97', '8f19d05e-5880-471a-b0b0-5657af64c572', '4925b3348b8f365a0013d3a95fdf4d81', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `modules` where `modules`.`deleted_at` is null\",\"time\":\"0.86\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\app\\\\Mainframe\\\\Helpers\\\\Mf.php\",\"line\":25,\"hostname\":\"Raihan\"}', '2019-11-10 18:25:27');
INSERT INTO `telescope_entries` VALUES (28, '8f19d05e-360f-49ef-9494-95c2363cc050', '8f19d05e-5880-471a-b0b0-5657af64c572', NULL, 1, 'cache', '{\"type\":\"hit\",\"key\":\"module_groups.hasTable\",\"value\":true,\"hostname\":\"Raihan\"}', '2019-11-10 18:25:27');
INSERT INTO `telescope_entries` VALUES (29, '8f19d05e-3716-43de-95b3-c8e52ce6622a', '8f19d05e-5880-471a-b0b0-5657af64c572', '3a72bbf5e9548ab422b0bf96d99dd45a', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `module_groups` where `module_groups`.`deleted_at` is null\",\"time\":\"0.62\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\app\\\\Mainframe\\\\Helpers\\\\Mf.php\",\"line\":26,\"hostname\":\"Raihan\"}', '2019-11-10 18:25:27');
INSERT INTO `telescope_entries` VALUES (30, '8f19d05e-4d0b-40e7-99bb-616f8dc22fd1', '8f19d05e-5880-471a-b0b0-5657af64c572', NULL, 1, 'view', '{\"name\":\"errors::404\",\"path\":\"\\\\resources\\\\views\\/errors\\/404.blade.php\",\"data\":[\"exception\"],\"hostname\":\"Raihan\"}', '2019-11-10 18:25:27');
INSERT INTO `telescope_entries` VALUES (31, '8f19d05e-4d8a-446c-b237-e2151eb9d4c8', '8f19d05e-5880-471a-b0b0-5657af64c572', NULL, 1, 'view', '{\"name\":\"errors::illustrated-layout\",\"path\":\"\\\\resources\\\\views\\/errors\\/illustrated-layout.blade.php\",\"data\":[\"exception\"],\"hostname\":\"Raihan\"}', '2019-11-10 18:25:27');
INSERT INTO `telescope_entries` VALUES (32, '8f19d05e-5509-4ef1-8131-fc779ba41e34', '8f19d05e-5880-471a-b0b0-5657af64c572', NULL, 1, 'debugbar', '{\"requestId\":\"Xffcf0e07fbd016530b795c23e32c93e5\",\"hostname\":\"Raihan\"}', '2019-11-10 18:25:27');
INSERT INTO `telescope_entries` VALUES (33, '8f19d05e-5763-4d9a-964a-5f495b0b52aa', '8f19d05e-5880-471a-b0b0-5657af64c572', NULL, 1, 'request', '{\"uri\":\"\\/mainframe\\/templates\\/js\\/jquery-ui-1.10.3.min.js\",\"method\":\"GET\",\"controller_action\":null,\"middleware\":[],\"headers\":{\"host\":\"localhost:8081\",\"connection\":\"keep-alive\",\"user-agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/78.0.3904.87 Safari\\/537.36\",\"accept\":\"*\\/*\",\"purpose\":\"prefetch\",\"sec-fetch-site\":\"same-origin\",\"sec-fetch-mode\":\"no-cors\",\"referer\":\"http:\\/\\/localhost:8081\\/mainframe\\/public\\/settings\",\"accept-encoding\":\"gzip, deflate, br\",\"accept-language\":\"en-US,en;q=0.9\",\"cookie\":\"_ga=GA1.1.1533448064.1557140663; __utma=111872281.1533448064.1557140663.1563875520.1563875520.1; __utmz=111872281.1563875520.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); _gcl_au=1.1.1104356383.1566466527; _lo_uid=42619-1566466525537-a52fc264580c515c; _lo_v=1; __lotl=http%3A%2F%2Flocalhost%3A8081%2Fletsbab-server-laravel-iso%2Fpublic%2Fshop%2Fsite%3Furl%3Dhttps%253A%252F%252Fwww.athleticpropulsionlabs.com; session-set=true; stc111938=tsa:-133729519:20190822102628|env:1566467788%7C20190922095628%7C20190822102628%7C1%7C1018797:20200821095628|uid:1566466528863.1602185555.079319.111938.1779185056.:20200821095628|srchist:1018797%3A1566467788%3A20190922095628:20200821095628; _y=b8c61723-6986-42D7-D006-42A3B919EEA2; _shopify_y=b8c61723-6986-42D7-D006-42A3B919EEA2; _shopify_fs=2019-08-22T10%3A01%3A18.031Z; currency=GBP; _hjid=a0dc079f-c388-4911-aeb8-71c437c51df0; _privy_30CD21B392F662664B80B23B=%7B%22uuid%22%3A%223c61d691-f8a2-4152-847e-e4e1b048d4eb%22%2C%22variations%22%3A%7B%7D%2C%22country_code%22%3A%22BD%22%2C%22region_code%22%3A%22BD_81%22%2C%22postal_code%22%3A%221000%22%7D; _sp_id.1fff=da12f6e74228d5d9.1566468089.2.1566474348.1566469249; SQLiteManager_currentLangue=2; laravel_session=8mFR79roagoJIpiarLUm1rs9itcbfaa79uG8ymDx; XSRF-TOKEN=eyJpdiI6IjRWcHAxR21TY0VkN0JrVlwvdFVEMzZnPT0iLCJ2YWx1ZSI6IklZV0Q2MHVDN2FXU0NzYjZjZkUxZlZmR09meHVHSHFFcVZ1eFBCTzNVUFYrcGFQZm9aeGl6WlBRRVFvR3AybEsiLCJtYWMiOiIxNWJkMWEwMTFiYjBkOGMwNDFmOWVlNTczMzdhYjMyMzhmNDNkNmY4Mzc5MjcxMzMyMzQwNTJjNjMzNDI2MTk4In0%3D\"},\"payload\":[],\"session\":{\"_token\":\"QQ7Svhg2ReltwbEhlWA6BSYKSjU9Z05YqOF5M88L\",\"_flash\":{\"old\":[],\"new\":[]},\"url\":[],\"_previous\":{\"url\":\"http:\\/\\/localhost:8081\\/mainframe\\/public\\/_ignition\\/health-check\"},\"login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d\":5,\"model-changes\":[],\"permissions\":{\"superuser\":1},\"PHPDEBUGBAR_STACK_DATA\":[]},\"response_status\":404,\"response\":\"HTML Response\",\"duration\":426,\"memory\":2,\"hostname\":\"Raihan\"}', '2019-11-10 18:25:27');
INSERT INTO `telescope_entries` VALUES (34, '8f1d3326-0807-46c2-9c00-3301a1f580bd', '8f1d3326-3867-4b42-ae9c-2b2942539bd4', NULL, 1, 'cache', '{\"type\":\"hit\",\"key\":\"modules.hasTable\",\"value\":true,\"hostname\":\"Raihan\"}', '2019-11-12 10:49:09');
INSERT INTO `telescope_entries` VALUES (35, '8f1d3326-1076-48b4-a912-889a6b9b1b0f', '8f1d3326-3867-4b42-ae9c-2b2942539bd4', '4925b3348b8f365a0013d3a95fdf4d81', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `modules` where `modules`.`deleted_at` is null\",\"time\":\"0.91\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\app\\\\Mainframe\\\\Helpers\\\\Mf.php\",\"line\":25,\"hostname\":\"Raihan\"}', '2019-11-12 10:49:09');
INSERT INTO `telescope_entries` VALUES (36, '8f1d3326-115f-45b3-b522-6366f4362def', '8f1d3326-3867-4b42-ae9c-2b2942539bd4', NULL, 1, 'cache', '{\"type\":\"hit\",\"key\":\"module_groups.hasTable\",\"value\":true,\"hostname\":\"Raihan\"}', '2019-11-12 10:49:09');
INSERT INTO `telescope_entries` VALUES (37, '8f1d3326-1296-461d-94aa-b16da1192c0d', '8f1d3326-3867-4b42-ae9c-2b2942539bd4', '3a72bbf5e9548ab422b0bf96d99dd45a', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `module_groups` where `module_groups`.`deleted_at` is null\",\"time\":\"0.73\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\app\\\\Mainframe\\\\Helpers\\\\Mf.php\",\"line\":26,\"hostname\":\"Raihan\"}', '2019-11-12 10:49:09');
INSERT INTO `telescope_entries` VALUES (38, '8f1d3326-2c67-4e64-9038-347dad4e1535', '8f1d3326-3867-4b42-ae9c-2b2942539bd4', NULL, 1, 'view', '{\"name\":\"errors::404\",\"path\":\"\\\\resources\\\\views\\/errors\\/404.blade.php\",\"data\":[\"exception\"],\"hostname\":\"Raihan\"}', '2019-11-12 10:49:09');
INSERT INTO `telescope_entries` VALUES (39, '8f1d3326-2d14-4a18-8955-f0bf6acd70af', '8f1d3326-3867-4b42-ae9c-2b2942539bd4', NULL, 1, 'view', '{\"name\":\"errors::illustrated-layout\",\"path\":\"\\\\resources\\\\views\\/errors\\/illustrated-layout.blade.php\",\"data\":[\"exception\"],\"hostname\":\"Raihan\"}', '2019-11-12 10:49:09');
INSERT INTO `telescope_entries` VALUES (40, '8f1d3326-33dd-41bb-983f-aec9bdef070d', '8f1d3326-3867-4b42-ae9c-2b2942539bd4', NULL, 1, 'debugbar', '{\"requestId\":\"X4e44d02c07c597226c38eda5bdc68128\",\"hostname\":\"Raihan\"}', '2019-11-12 10:49:09');
INSERT INTO `telescope_entries` VALUES (41, '8f1d3326-3710-4da3-9d30-c7170f131e95', '8f1d3326-3867-4b42-ae9c-2b2942539bd4', NULL, 1, 'request', '{\"uri\":\"\\/mainframe\\/templates\\/js\\/jquery-ui-1.10.3.min.js\",\"method\":\"GET\",\"controller_action\":null,\"middleware\":[],\"headers\":{\"host\":\"localhost:8081\",\"connection\":\"keep-alive\",\"user-agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/78.0.3904.87 Safari\\/537.36\",\"accept\":\"*\\/*\",\"sec-fetch-site\":\"same-origin\",\"sec-fetch-mode\":\"no-cors\",\"referer\":\"http:\\/\\/localhost:8081\\/mainframe\\/public\\/settings\\/39\\/edit\",\"accept-encoding\":\"gzip, deflate, br\",\"accept-language\":\"en-US,en;q=0.9\",\"cookie\":\"_ga=GA1.1.1533448064.1557140663; __utma=111872281.1533448064.1557140663.1563875520.1563875520.1; __utmz=111872281.1563875520.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); _gcl_au=1.1.1104356383.1566466527; _lo_uid=42619-1566466525537-a52fc264580c515c; _lo_v=1; __lotl=http%3A%2F%2Flocalhost%3A8081%2Fletsbab-server-laravel-iso%2Fpublic%2Fshop%2Fsite%3Furl%3Dhttps%253A%252F%252Fwww.athleticpropulsionlabs.com; session-set=true; stc111938=tsa:-133729519:20190822102628|env:1566467788%7C20190922095628%7C20190822102628%7C1%7C1018797:20200821095628|uid:1566466528863.1602185555.079319.111938.1779185056.:20200821095628|srchist:1018797%3A1566467788%3A20190922095628:20200821095628; _y=b8c61723-6986-42D7-D006-42A3B919EEA2; _shopify_y=b8c61723-6986-42D7-D006-42A3B919EEA2; _shopify_fs=2019-08-22T10%3A01%3A18.031Z; currency=GBP; _hjid=a0dc079f-c388-4911-aeb8-71c437c51df0; _privy_30CD21B392F662664B80B23B=%7B%22uuid%22%3A%223c61d691-f8a2-4152-847e-e4e1b048d4eb%22%2C%22variations%22%3A%7B%7D%2C%22country_code%22%3A%22BD%22%2C%22region_code%22%3A%22BD_81%22%2C%22postal_code%22%3A%221000%22%7D; _sp_id.1fff=da12f6e74228d5d9.1566468089.2.1566474348.1566469249; laravel_session=12AwaqnDOEAYWWvV5uPVZcqA1r0Xc2pNLCD7LReu; XSRF-TOKEN=eyJpdiI6IlhmUGpcLzQwTXpySStUNTgxaWcxNnhnPT0iLCJ2YWx1ZSI6IjV3YW5raENGUGg0NjQ1bVNXeEtETklVSWRnQXdjQkdyeU5Cblg2eXI3dUdiaysrVkJMWENlcU9kZ3l3Z0YxR00iLCJtYWMiOiJhMjZkM2QzZDIxY2QwZjE3YzU0ZDk1NzA0NzM1OTFiZTZlNjU3ZGMyM2UwNTgxZjc1MzlkMTYzMDZlZjAwOGRlIn0%3D\"},\"payload\":[],\"session\":{\"_token\":\"Pi2fPPuMQMQMPvCxyc6oRvbp9y1denHF3Jzk5Eq6\",\"url\":[],\"_previous\":{\"url\":\"http:\\/\\/localhost:8081\\/mainframe\\/public\\/settings\\/39\\/edit\"},\"_flash\":{\"old\":[],\"new\":[]},\"login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d\":5,\"model-changes\":[],\"permissions\":{\"superuser\":1},\"PHPDEBUGBAR_STACK_DATA\":[]},\"response_status\":404,\"response\":\"HTML Response\",\"duration\":516,\"memory\":2,\"hostname\":\"Raihan\"}', '2019-11-12 10:49:09');
INSERT INTO `telescope_entries` VALUES (42, '8f1d8865-d32b-4e2a-a2cc-7733b80982df', '8f1d8866-3ffe-4705-ad3d-eaca747a064b', NULL, 1, 'cache', '{\"type\":\"hit\",\"key\":\"modules.hasTable\",\"value\":true,\"hostname\":\"Raihan\"}', '2019-11-12 14:47:31');
INSERT INTO `telescope_entries` VALUES (43, '8f1d8865-e77d-4bb9-918b-72d040c5bb40', '8f1d8866-3ffe-4705-ad3d-eaca747a064b', '4925b3348b8f365a0013d3a95fdf4d81', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `modules` where `modules`.`deleted_at` is null\",\"time\":\"1.45\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\app\\\\Mainframe\\\\Helpers\\\\Mf.php\",\"line\":25,\"hostname\":\"Raihan\"}', '2019-11-12 14:47:32');
INSERT INTO `telescope_entries` VALUES (44, '8f1d8865-e938-4f7b-82d5-b98d61b7ba55', '8f1d8866-3ffe-4705-ad3d-eaca747a064b', NULL, 1, 'cache', '{\"type\":\"hit\",\"key\":\"module_groups.hasTable\",\"value\":true,\"hostname\":\"Raihan\"}', '2019-11-12 14:47:32');
INSERT INTO `telescope_entries` VALUES (45, '8f1d8865-ed5f-450e-8123-0a5d7a40d68c', '8f1d8866-3ffe-4705-ad3d-eaca747a064b', '3a72bbf5e9548ab422b0bf96d99dd45a', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `module_groups` where `module_groups`.`deleted_at` is null\",\"time\":\"6.75\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\app\\\\Mainframe\\\\Helpers\\\\Mf.php\",\"line\":26,\"hostname\":\"Raihan\"}', '2019-11-12 14:47:32');
INSERT INTO `telescope_entries` VALUES (46, '8f1d8866-1f7a-4244-8168-a7aba26d1266', '8f1d8866-3ffe-4705-ad3d-eaca747a064b', NULL, 1, 'view', '{\"name\":\"errors::404\",\"path\":\"\\\\resources\\\\views\\/errors\\/404.blade.php\",\"data\":[\"exception\"],\"hostname\":\"Raihan\"}', '2019-11-12 14:47:32');
INSERT INTO `telescope_entries` VALUES (47, '8f1d8866-206b-46d0-9c77-8473954aed81', '8f1d8866-3ffe-4705-ad3d-eaca747a064b', NULL, 1, 'view', '{\"name\":\"errors::illustrated-layout\",\"path\":\"\\\\resources\\\\views\\/errors\\/illustrated-layout.blade.php\",\"data\":[\"exception\"],\"hostname\":\"Raihan\"}', '2019-11-12 14:47:32');
INSERT INTO `telescope_entries` VALUES (48, '8f1d8866-34db-4ec0-b23c-cef701465878', '8f1d8866-3ffe-4705-ad3d-eaca747a064b', NULL, 1, 'debugbar', '{\"requestId\":\"Xa3d88d291d4af75aeefbadd8632d1e10\",\"hostname\":\"Raihan\"}', '2019-11-12 14:47:32');
INSERT INTO `telescope_entries` VALUES (49, '8f1d8866-3e17-400a-a6f9-ae6656f20d78', '8f1d8866-3ffe-4705-ad3d-eaca747a064b', NULL, 1, 'request', '{\"uri\":\"\\/mainframe\\/templates\\/js\\/jquery-ui-1.10.3.min.js\",\"method\":\"GET\",\"controller_action\":null,\"middleware\":[],\"headers\":{\"host\":\"localhost:8081\",\"connection\":\"keep-alive\",\"pragma\":\"no-cache\",\"cache-control\":\"no-cache\",\"user-agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/78.0.3904.87 Safari\\/537.36\",\"accept\":\"*\\/*\",\"sec-fetch-site\":\"same-origin\",\"sec-fetch-mode\":\"no-cors\",\"referer\":\"http:\\/\\/localhost:8081\\/mainframe\\/public\\/login\",\"accept-encoding\":\"gzip, deflate, br\",\"accept-language\":\"en-US,en;q=0.9\",\"cookie\":\"_ga=GA1.1.1533448064.1557140663; __utma=111872281.1533448064.1557140663.1563875520.1563875520.1; __utmz=111872281.1563875520.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); _gcl_au=1.1.1104356383.1566466527; _lo_uid=42619-1566466525537-a52fc264580c515c; _lo_v=1; __lotl=http%3A%2F%2Flocalhost%3A8081%2Fletsbab-server-laravel-iso%2Fpublic%2Fshop%2Fsite%3Furl%3Dhttps%253A%252F%252Fwww.athleticpropulsionlabs.com; session-set=true; stc111938=tsa:-133729519:20190822102628|env:1566467788%7C20190922095628%7C20190822102628%7C1%7C1018797:20200821095628|uid:1566466528863.1602185555.079319.111938.1779185056.:20200821095628|srchist:1018797%3A1566467788%3A20190922095628:20200821095628; _y=b8c61723-6986-42D7-D006-42A3B919EEA2; _shopify_y=b8c61723-6986-42D7-D006-42A3B919EEA2; _shopify_fs=2019-08-22T10%3A01%3A18.031Z; currency=GBP; _hjid=a0dc079f-c388-4911-aeb8-71c437c51df0; _privy_30CD21B392F662664B80B23B=%7B%22uuid%22%3A%223c61d691-f8a2-4152-847e-e4e1b048d4eb%22%2C%22variations%22%3A%7B%7D%2C%22country_code%22%3A%22BD%22%2C%22region_code%22%3A%22BD_81%22%2C%22postal_code%22%3A%221000%22%7D; _sp_id.1fff=da12f6e74228d5d9.1566468089.2.1566474348.1566469249; laravel_session=6ooZbJXFemzeYZLLTHvbGeZjCHI2UOkmjwPLEs62; XSRF-TOKEN=eyJpdiI6InN3RWFkTERnZ21kZUExNlF4MVJEWnc9PSIsInZhbHVlIjoiR3BROUw0UHlzQUJMVXk5SEYyVlhQTXlaYjJQVDFTNWdjbWxZbGlIcXFzalRXKzVTSkZWNzlrblgyZ2pRWDBEdyIsIm1hYyI6IjE4Y2U1MGU0ZTAxZDllMDk1MDUyMTcxOTU1ODZlMzQ3ZmRiZGQ2Yzc5ODI2NTgwZGJkNTU5YjYxZGZiNWIzZDkifQ%3D%3D\"},\"payload\":[],\"session\":{\"_flash\":{\"old\":[],\"new\":[]},\"_token\":\"4ADgj3YiUSG4B4KyQintivS2lVLhQpdjJ63vDWcu\",\"url\":{\"intended\":\"http:\\/\\/localhost:8081\\/mainframe\\/public\"},\"_previous\":{\"url\":\"http:\\/\\/localhost:8081\\/mainframe\\/public\\/login\"},\"PHPDEBUGBAR_STACK_DATA\":[]},\"response_status\":404,\"response\":\"HTML Response\",\"duration\":992,\"memory\":4,\"hostname\":\"Raihan\"}', '2019-11-12 14:47:32');
INSERT INTO `telescope_entries` VALUES (50, '8f25e0ad-771c-49b5-8d9a-f975e072e933', '8f25e0ad-cbca-4113-8f12-360da9aeca7e', NULL, 1, 'cache', '{\"type\":\"hit\",\"key\":\"modules.hasTable\",\"value\":true,\"hostname\":\"Raihan\"}', '2019-11-16 18:21:00');
INSERT INTO `telescope_entries` VALUES (51, '8f25e0ad-93a4-4127-b209-f9eef252f875', '8f25e0ad-cbca-4113-8f12-360da9aeca7e', '4925b3348b8f365a0013d3a95fdf4d81', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `modules` where `modules`.`deleted_at` is null\",\"time\":\"3.90\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\app\\\\Mainframe\\\\Helpers\\\\Mf.php\",\"line\":24,\"hostname\":\"Raihan\"}', '2019-11-16 18:21:00');
INSERT INTO `telescope_entries` VALUES (52, '8f25e0ad-956a-4f71-876b-9f3ad8ef6908', '8f25e0ad-cbca-4113-8f12-360da9aeca7e', NULL, 1, 'cache', '{\"type\":\"hit\",\"key\":\"module_groups.hasTable\",\"value\":true,\"hostname\":\"Raihan\"}', '2019-11-16 18:21:00');
INSERT INTO `telescope_entries` VALUES (53, '8f25e0ad-970b-4dc1-8f20-fd81f1ff5e12', '8f25e0ad-cbca-4113-8f12-360da9aeca7e', '3a72bbf5e9548ab422b0bf96d99dd45a', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `module_groups` where `module_groups`.`deleted_at` is null\",\"time\":\"0.65\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\app\\\\Mainframe\\\\Helpers\\\\Mf.php\",\"line\":25,\"hostname\":\"Raihan\"}', '2019-11-16 18:21:00');
INSERT INTO `telescope_entries` VALUES (54, '8f25e0ad-bc2f-4a37-a469-c7a4325cc996', '8f25e0ad-cbca-4113-8f12-360da9aeca7e', 'c49063100c7dfe13f01438cc128d8d9c', 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `modules` where `name` = \'modules\' and `modules`.`deleted_at` is null limit 1\",\"time\":\"0.84\",\"slow\":false,\"file\":\"E:\\\\MAMP\\\\htdocs\\\\mainframe\\\\app\\\\Mainframe\\\\Modules\\\\Modules\\\\ModuleHelper.php\",\"line\":20,\"hostname\":\"Raihan\"}', '2019-11-16 18:21:00');
INSERT INTO `telescope_entries` VALUES (55, '8f25e0ad-c8ee-482f-9b62-c87dec0a7a08', '8f25e0ad-cbca-4113-8f12-360da9aeca7e', NULL, 1, 'debugbar', '{\"requestId\":\"X6459ffcc63c4ffd0ae2f856c4e03859b\",\"hostname\":\"Raihan\"}', '2019-11-16 18:21:00');
INSERT INTO `telescope_entries` VALUES (56, '8f25e0ad-cb20-436e-b497-007dd22141ba', '8f25e0ad-cbca-4113-8f12-360da9aeca7e', NULL, 1, 'request', '{\"uri\":\"\\/modules\\/21\\/edit\",\"method\":\"GET\",\"controller_action\":\"\\\\App\\\\Mainframe\\\\Modules\\\\Modules\\\\ModuleController@edit\",\"middleware\":[\"web\",\"auth\"],\"headers\":{\"host\":\"localhost:8081\",\"connection\":\"keep-alive\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/78.0.3904.97 Safari\\/537.36\",\"sec-fetch-user\":\"?1\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3\",\"sec-fetch-site\":\"same-origin\",\"sec-fetch-mode\":\"navigate\",\"referer\":\"http:\\/\\/localhost:8081\\/mainframe\\/public\\/modules\\/21\\/edit\",\"accept-encoding\":\"gzip, deflate, br\",\"accept-language\":\"en-US,en;q=0.9\",\"cookie\":\"_ga=GA1.1.1533448064.1557140663; __utma=111872281.1533448064.1557140663.1563875520.1563875520.1; __utmz=111872281.1563875520.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); _gcl_au=1.1.1104356383.1566466527; _lo_uid=42619-1566466525537-a52fc264580c515c; _lo_v=1; __lotl=http%3A%2F%2Flocalhost%3A8081%2Fletsbab-server-laravel-iso%2Fpublic%2Fshop%2Fsite%3Furl%3Dhttps%253A%252F%252Fwww.athleticpropulsionlabs.com; session-set=true; stc111938=tsa:-133729519:20190822102628|env:1566467788%7C20190922095628%7C20190822102628%7C1%7C1018797:20200821095628|uid:1566466528863.1602185555.079319.111938.1779185056.:20200821095628|srchist:1018797%3A1566467788%3A20190922095628:20200821095628; _y=b8c61723-6986-42D7-D006-42A3B919EEA2; _shopify_y=b8c61723-6986-42D7-D006-42A3B919EEA2; _shopify_fs=2019-08-22T10%3A01%3A18.031Z; currency=GBP; _hjid=a0dc079f-c388-4911-aeb8-71c437c51df0; _privy_30CD21B392F662664B80B23B=%7B%22uuid%22%3A%223c61d691-f8a2-4152-847e-e4e1b048d4eb%22%2C%22variations%22%3A%7B%7D%2C%22country_code%22%3A%22BD%22%2C%22region_code%22%3A%22BD_81%22%2C%22postal_code%22%3A%221000%22%7D; _sp_id.1fff=da12f6e74228d5d9.1566468089.2.1566474348.1566469249; SQLiteManager_currentLangue=2; mainframe_session=oLXWTOIuz7ts8ZCl3XXDoIu6Jq9X0RYPu5aN8rDz; XSRF-TOKEN=eyJpdiI6Ik93REV0YmR1NkhHcEp4d1Noc1NOQlE9PSIsInZhbHVlIjoiNWtyTWhrYVFsU3lST1JXR0pra1hrRlBsdFdEZDJCQkhhUnMxV2lzaWNJY2Y4NDZzQTFKSEMrOFpVQmxpOFBpYyIsIm1hYyI6Ijc1ZGI3YjcwNTUxMzlmMjQ3MjZhMDNlNmM1MWRlYzEzODJmMGQwYjIyMWU5NzkzMGZjM2Q2MjdjZGEwNDg4ZDAifQ%3D%3D\"},\"payload\":[],\"session\":{\"_token\":\"qw3DZHDrwRz0CXvjnKctfYZ1xmEewB4EGQJ4JE16\",\"url\":{\"intended\":\"http:\\/\\/localhost:8081\\/mainframe\\/public\\/modules\\/21\\/edit\"},\"PHPDEBUGBAR_STACK_DATA\":{\"X6459ffcc63c4ffd0ae2f856c4e03859b\":null},\"_previous\":{\"url\":\"http:\\/\\/localhost:8081\\/mainframe\\/public\\/modules\\/21\\/edit\"},\"_flash\":{\"old\":[],\"new\":[]}},\"response_status\":302,\"response\":\"Redirected to http:\\/\\/localhost:8081\\/mainframe\\/public\\/login\",\"duration\":685,\"memory\":2,\"hostname\":\"Raihan\"}', '2019-11-16 18:21:00');

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
-- Records of telescope_entries_tags
-- ----------------------------
INSERT INTO `telescope_entries_tags` VALUES ('8e92cbbd-4534-4404-8f4c-fa18266d9ed2', 'slow');

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
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `code` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for uploads
-- ----------------------------
DROP TABLE IF EXISTS `uploads`;
CREATE TABLE `uploads`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tenant_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `type` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `path` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `order` smallint(6) NULL DEFAULT NULL,
  `ext` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `bytes` bigint(20) NULL DEFAULT NULL,
  `description` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `module_id` int(11) NULL DEFAULT NULL,
  `element_id` bigint(20) NULL DEFAULT NULL,
  `element_uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_active` smallint(6) NULL DEFAULT 1,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of uploads
-- ----------------------------
INSERT INTO `uploads` VALUES (1, '821b341e-1eb7-412c-a9ae-0dcfda244275', NULL, '2019-10-31 15_41_04-Start.jpg', NULL, '/files/7km7BL7t_2019-10-31 15_41_04-Start.jpg', NULL, 'jpg', NULL, NULL, 21, NULL, NULL, 1, 5, 5, '2019-10-31 13:03:35', '2019-10-31 13:03:35', NULL, NULL);
INSERT INTO `uploads` VALUES (2, '90020e48-a92d-42b5-947d-b1da2ba60204', NULL, '2019-10-31 15_41_04-Start.jpg', NULL, '/files/9ZpEl7dT_2019-10-31 15_41_04-Start.jpg', NULL, 'jpg', NULL, NULL, 21, 39, '931f290b-8cd3-4ca1-a0f1-087bb1355b8a', 1, 5, 5, '2019-10-31 13:10:17', '2019-11-20 11:03:13', NULL, NULL);
INSERT INTO `uploads` VALUES (3, 'c0c7f836-b76c-4ef1-9481-c82529f2bd1a', NULL, '2019-10-31 15_41_04-Start.jpg', NULL, '/files/vYaQdT0Z_2019-10-31 15_41_04-Start.jpg', NULL, 'jpg', NULL, NULL, 21, 35, 'e85d9a3d-b77e-46db-9422-078eeac8923a', 1, 5, 5, '2019-10-31 15:10:02', '2019-11-22 09:28:42', NULL, NULL);
INSERT INTO `uploads` VALUES (4, '8db449ef-4733-4f09-ab2d-061460b6ee3a', NULL, 'Central-HRIS-for-MoHFW-New-Era-of-Data-Driven-Decision-Final (1).jpg', NULL, '/files/Ie6cROjt_Central-HRIS-for-MoHFW-New-Era-of-Data-Driven-Decision-Final (1).jpg', NULL, 'jpg', NULL, NULL, 21, 39, '931f290b-8cd3-4ca1-a0f1-087bb1355b8a', 1, 5, 5, '2019-11-13 16:17:29', '2019-11-13 16:17:41', '2019-11-13 16:17:41', NULL);
INSERT INTO `uploads` VALUES (5, '5809f712-1527-4620-9ef8-bcd904d3b21b', NULL, '2019-11-27 10_10_58-Cortana.jpg', NULL, '/files/UohSKFJT_2019-11-27 10_10_58-Cortana.jpg', NULL, 'jpg', NULL, NULL, 21, 42, 'd879c7df-d4ce-48c7-8abc-dc82af05a37d', 1, 5, 5, '2019-12-02 16:58:02', '2019-12-02 16:58:11', NULL, NULL);

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
INSERT INTO `user_group` VALUES (5, 1, NULL, NULL);
INSERT INTO `user_group` VALUES (2, 2, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tenant_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `api_token` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
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
  `auth_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` datetime(0) NULL DEFAULT NULL,
  `email_verification_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `currency` varchar(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `social_account_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `social_account_type` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `dob` date NULL DEFAULT NULL,
  `group_ids` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `is_test` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2601 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, '856a81bf-ab1b-4289-9d65-9751009d00ad', NULL, 'API', 'api@mainframe', '$2y$10$t5wa5wPH8XAgoRYyptOJ0uSf/klm0S/71XUdK3Gz.2llsQHh1nXAm', '7HL9zfX8YzCLTo8uHS4qsYo50twq2nwQLT9R8Evgu5QxhnuQ3Azw0SkVEE0q', '7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0', NULL, 0, NULL, 1, 1, 1, '2018-12-24 05:48:25', '2019-11-20 13:31:57', NULL, NULL, NULL, 'LB', 'API', 'LB API', NULL, 'eFGlVn8yFn8:APA91bHgq2zk-9JrBNNtVMn4iFMB6eicQOUVyFZGRft8jv-GwGJej9sFppTG5w9E_3IeOyR_3NN1i3cWFHaiVl_k1Zlt2jDMVoh7D90CsJG1qxVnuruH-Eidi1CgO9QVlpmFByK2azr3', NULL, NULL, NULL, NULL, 187, 'UK (United Kingdom)', NULL, NULL, NULL, '2019-01-31 08:31:54', '2019-04-09 15:17:25', 'Q29anuSIvoR9N8OmB2ueGGRI8tlHPZau', '2019-01-01 12:00:00', NULL, 'GBP', NULL, NULL, NULL, '[\"2\"]', 0);
INSERT INTO `users` VALUES (5, '3ef9b174-6c7c-41fd-b68e-18d003fb9481', NULL, 'Super admin', 'su@mainframe', '$2y$10$t5wa5wPH8XAgoRYyptOJ0uSf/klm0S/71XUdK3Gz.2llsQHh1nXAm', 'eTqDNlAdVEhBDKW5QTs3WWOwWxosBXMDDUOYN3zvi7WMS64Ytrytv76R0HHN', NULL, NULL, 1, NULL, 1, 1, 1, '2018-09-10 15:30:06', '2019-12-02 15:28:52', NULL, NULL, NULL, 'Raihan', 'Raihan', 'Raihan Raihan', NULL, NULL, NULL, NULL, NULL, NULL, 187, 'UK (United Kingdom)', NULL, NULL, NULL, '2018-09-10 15:30:06', '2019-11-12 12:47:17', 'Tr1JojY6w2WjM5z/t/.HQvj2HJUzrjse', '2019-01-22 19:27:07', NULL, 'GBP', NULL, NULL, NULL, '[\"1\"]', 0);

SET FOREIGN_KEY_CHECKS = 1;
