-- Script Written by: Paul Eshun
-- Role: Software Web Developer

-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database Name: `sip`
-- --------------------------


-- table structure for system users account
-- ----------------------------------------------
CREATE TABLE `admin`(
  `userid` int(30) NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(50) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `phoneno` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `loginid` varchar(200) NOT NULL, -- login_ID
  `password` text NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `create_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- table structure for students account
-- ----------------------------------------------
CREATE TABLE `students`(
  `studentid` int(30) NOT NULL AUTO_INCREMENT,
  `student_no` varchar(50) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact_name` varchar(250) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `programme_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `loginid` varchar(200) NOT NULL, -- login_ID
  `password` text NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- table structure for lecturers account
-- ----------------------------------------------
CREATE TABLE `lecturers` (
  `lecturerid` int(30) NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(50) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact_name` varchar(250) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `loginid` varchar(200) NOT NULL, -- login_ID
  `password` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`lecturerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- table structure for session
-- -----------------------------
CREATE TABLE `session`(
	`sessionid` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`sessionid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- table structure for classes
-- -----------------------------
CREATE TABLE `classes`(
	`pid` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`pid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- table structure for accademic year
-- ------------------------------------
CREATE TABLE `academic_year`(
	`ayid` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`ayid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- table structure for courses or programmes
-- ----------------------------------------------
CREATE TABLE `courses` (
  `courseid` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- table structure for programmes types
-- ----------------------------------------------
CREATE TABLE `programmes` (
  `pid` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- table structure for lecturers courses taught
-- ----------------------------------------------
CREATE TABLE `lecturer_courses` (
  `lcid` int(30) NOT NULL AUTO_INCREMENT,
  `course_id` int(30) NOT NULL,
  `lecturer_id` int(30) NOT NULL,
  `session_id` int(30) NOT NULL,
  `academic_year_id` int(30) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`lcid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- table structure for faculty
-- -----------------------------------
CREATE TABLE `faculty` (
  `facultyid` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`facultyid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- table structure for fees_structure
-- -----------------------------------
CREATE TABLE `fees_structure` (
  `fsid` int(30) NOT NULL AUTO_INCREMENT,
  `course_id` int(30) NOT NULL,
  `fee_amount` decimal(10,2) NOT NULL COMMENT 'total fees amount for the course in academic year',
  `description` varchar(250) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`fsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- table structure for fees_payments
-- -----------------------------------
CREATE TABLE `fees_payments` (
  `fpid` int(30) NOT NULL AUTO_INCREMENT,
  `student_id` int(30) NOT NULL,
  `academic_year_id` int(30) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `paid_by` varchar(250) NOT NULL,
  `paid_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`fpid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
