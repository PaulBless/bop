-- Script Written by: Paul Eshun
-- Role: Full Stack Software Developer
-- Email: eshunbless1@gmail.com
-- Linkedin Profile: https://linkedin.com/in/paul-eshun
-- Github Profile: https://github.com/paulbless

-- Description: Database Script for Business Operating Permit System

-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4
-- Date Written: February 17, 2022

--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- --------------------------
-- Database Name: `bop_database`
CREATE DATABASE IF NOT EXISTS `bop_database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Choose & Use Database 
USE `bop_database`;

-- --------------------------------------------------------


-- Table structure for account status
CREATE TABLE IF NOT EXISTS `bop_account_status`(
  `asid` INT(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(10) NOT NULL,
  `status_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`asid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------------------

-- Dump data in account status table
INSERT INTO `bop_account_status` 
  (`status_name`, `status_date`) VALUES
  ('Locked', CURRENT_TIMESTAMP),
  ('Active', CURRENT_TIMESTAMP);

-- --------------------------


-- table structure for roles
CREATE TABLE IF NOT EXISTS `bop_roles`(
  `rid` INT(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `role_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------------------

-- Dump data in roles table
INSERT INTO `bop_roles` 
  (`rid`,`role_name`, `role_date`) VALUES
  (1,'Admin', CURRENT_TIMESTAMP),
  (2,'User', CURRENT_TIMESTAMP),
  (3,'Collector', CURRENT_TIMESTAMP);


-- table structure for system users : Mandatory to Create in App
-- ----------------------------------------------------------------
CREATE TABLE `bop_users`(
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(19) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `address` varchar(250) NOT NULL,
  `loginid` varchar(19) NOT NULL, -- login ID
  `password` text NOT NULL, -- login password
  `user_type` int(11) NOT NULL, -- foreign key for roles table
  `user_status` int(11) NOT NULL, -- foreign key for account_status table
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


-- table structure for categories 
-- ----------------------------------------------
CREATE TABLE `bop_bill_categories`(
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  -- `uuid` bigint(10) NOT NULL,
  `category_name` varchar(155) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  -- `created_user_id` int(11) NOT NULL,
  `cat_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8b4;


-- table structure for towns
-- -----------------------------
CREATE TABLE `bop_towns_villages`(
	`tvid` int(11) NOT NULL AUTO_INCREMENT,
  `tvname` varchar(200) NOT NULL,
  `tvdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`tvid`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


-- table structure for business types
-- ------------------------------------
CREATE TABLE `bop_business_types`(
	`btid` int(11) NOT NULL AUTO_INCREMENT,
  `btname` varchar(155) NOT NULL,
  `btcomment` text NOT NULL,
  `btdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`btid`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


-- table structure for payments
-- -------------------------------
CREATE TABLE `bop_payments`(
	`pid` int(11) NOT NULL AUTO_INCREMENT,
  `payment_amount` double(10,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `business_id` int(11) NOT NULL, -- foreign key to business table
  `receipt_id` int(11) not null, -- foreign key to receipts table
  `users_id` int(11) not null, -- foreign key to users table
    PRIMARY KEY (`pid`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8bm4;


-- table structure for receipts
-- --------------------------------
CREATE TABLE `bop_receipts`(
	`rid` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_number` varchar(19) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_used` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0', 
  `receipt_range_id` int(11) not null, -- foreign key to receipt_ranges table
  `user_assigned_id` int(11) not null, -- foreign key to users table
    PRIMARY KEY (`rid`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8bm4;


-- table structure for receipts_ranges
-- ------------------------------------
CREATE TABLE `bop_receipts_ranges`(
	`rrid` int(11) NOT NULL AUTO_INCREMENT,
  `start_number` varchar(19) NOT NULL,
  `end_number` varchar(19) NOT NULL,
  `total` int(11) NOT NULL, 
  `is_used` enum('Pending','Finished') NOT NULL DEFAULT 'Pending' , -- 'NOTE: Pending -> Not Used All Ranges, Finished -> Have Used All Ranges'
  `user_assigned_id` int(11) not null, -- foreign key to users table
  `timestamp` timestamp not null default current_timestamp,
    PRIMARY KEY (`rrid`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8bm4;


-- table structure for bill 
-- ----------------------------------------------
CREATE TABLE `bop_bill_structure` (
  `bid` int(30) NOT NULL AUTO_INCREMENT,
  `bill_name` varchar(155) NOT NULL,
  `bill_amount` double(10,2) NOT NULL COMMENT 'Total Bill Amount for the Year ',
  `bill_year` varchar(10) NOT NULL COMMENT 'Specific Year for Bill eg. 2022',
  `category_id` int(10) NOT NULL COMMENT 'Category Type Assigned for Bill',
  `bill_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT =1 DEFAULT CHARSET=utf8mb4;


-- table structure for settings
-- ------------------------------------
CREATE TABLE `bop_settings`(
	`settings_id` INT(11) NOT NULL AUTO_INCREMENT,
  `settings_option` mediumtext DEFAULT NULL,
  `settings_ans` mediumtext DEFAULT NULL,
    PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- ----------------------------------------------------------------

-- Dump data in settings table
INSERT INTO `bop_settings` 
  (`settings_id`, `settings_option`,`settings_ans`) VALUES
  (1, 'system_name', 'Jecmas BOPA'),
  (2, 'system_title', 'Business Operating Permit Application'),
  (3, 'address', 'Accra, Ghana'),
  (4, 'contact', '0272898916'),
  (5, 'email', 'jecmasghana@gmail.com'),
  (6, 'currency', 'GHC'),
  (7, 'profile_pic', 'logo2.png'),


