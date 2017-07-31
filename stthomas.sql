-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2017 at 06:07 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stthomas`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE IF NOT EXISTS `aboutus` (
`aboutus_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`aboutus_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(11, '<p>We welcome you to the website of St. Thomas School, Bahadurgarh. We thank you for your interest in our school. We do hope our website covers a large part of your queries and we personally assure you of our deep commitment and continued service to education and society at large.</p>\r\n\r\n<p>St. Thomas School, established in 1995, is a private, minority, co-educational school which aimed at, and successfully bridged the urban-rural divide that is very much a part of our Indian society .</p>\r\n\r\n<p>From the Chairman’s Desk:</p>', 1, '2017-06-08 13:31:35', '2017-07-26 13:33:19', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `admissioncriteria`
--

CREATE TABLE IF NOT EXISTS `admissioncriteria` (
`admissioncriteria_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admissioncriteria`
--

INSERT INTO `admissioncriteria` (`admissioncriteria_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '<p>test admission criteria</p>', 1, '2017-06-14 09:15:27', '2017-07-26 14:09:36', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `admissionfees`
--

CREATE TABLE IF NOT EXISTS `admissionfees` (
`admissionfees_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admissionfees`
--

INSERT INTO `admissionfees` (`admissionfees_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '<p>test admission fees</p>', 1, '2017-06-14 09:46:15', '2017-07-26 14:10:21', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `affiliations`
--

CREATE TABLE IF NOT EXISTS `affiliations` (
`affiliations_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `affiliations`
--

INSERT INTO `affiliations` (`affiliations_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(2, '<p>Central Board of Secondary Education ( CBSE )</p>\r\n\r\n<p>STS is affiliated to CBSE, New Delhi . Our Affiliation No.  is 530329.</p>', 1, '2017-06-09 14:05:55', '2017-07-19 16:18:10', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `artculture`
--

CREATE TABLE IF NOT EXISTS `artculture` (
`artculture_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `artculture`
--

INSERT INTO `artculture` (`artculture_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(2, '<p>“ The Aim of Art is to represent not the outward appearance of things, but their inward significance”  ~ Aristotle</p>\r\n\r\n<p>Education is not just learning how to read and write, but art, music and drama Each of these subjects help develop a well-balanced student. Education is developing the next musician, artist and movie star.</p>\r\n\r\n<p> Art is the finest and subtle way of self-expression. Excellence in art enhances creativity as well as confidence and concentration. At STS, various art sessions in music, drawing, painting, craftwork, dramatics  are conducted which provide encouragement and inspiration to students to appreciate and understand art.</p>\r\n\r\n<p>The art and craft work done by the students in showcased in the annual exhibition. The drama/ performing arts clubs showcase their talent on the stage on various functions.</p>', 1, '2017-07-19 17:59:37', '2017-07-19 17:59:37', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `assessmentcriteria`
--

CREATE TABLE IF NOT EXISTS `assessmentcriteria` (
`assessmentcriteria_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `assessmentcriteria`
--

INSERT INTO `assessmentcriteria` (`assessmentcriteria_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '<p>1. Academic year is divided into two semesters. <br>\r\n    1st Semester: April - September<br>\r\n    2nd Semester: October - March.</p>\r\n\r\n<p>2. No re-examination will be given for a child who is on leave/absent from examination or test.</p>\r\n\r\n<p>3. If any student is caught for malpractice, he/she will be detained or expelled.</p>\r\n\r\n<p>4. The assessments  and promotions are based on guidelines from CBSE.</p>', 1, '2017-06-13 09:50:47', '2017-07-20 14:14:07', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
`assignment_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `teacher_name` char(255) NOT NULL,
  `s_class` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `type`, `teacher_name`, `s_class`, `subject`, `title`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'Home Work', 'xyz', 'KG', 'Math', 'Math', 1, '2017-07-25 18:12:04', '2017-07-27 12:49:19', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
`banner_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `bannertitle` varchar(100) NOT NULL,
  `bannersubtitle` varchar(100) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `image`, `bannertitle`, `bannersubtitle`, `sort_order`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(32, 'upload/banner/img_slide1.jpg', 'A Unique Learning Experience', 'Stay tuned as we reveal more of our approach and how we will change the way you learn, forever.', 1, 1, '2017-06-08 08:59:09', '2017-07-19 18:19:10', '::1'),
(33, 'upload/banner/img_slide2.jpg', 'A Unique Learning Experience', 'Stay tuned as we reveal more of our approach and how we will change the way you learn, forever.', 2, 1, '2017-06-08 08:59:28', '2017-07-19 18:20:12', '::1'),
(34, 'upload/banner/img_slide3.jpg', 'A Unique Learning Experience', 'Stay tuned as we reveal more of our approach and how we will change the way you learn, forever.', 3, 1, '2017-07-19 18:20:56', '2017-07-26 13:10:20', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
`bus_id` int(11) NOT NULL,
  `bus_number` varchar(255) NOT NULL,
  `driver_id` varchar(255) NOT NULL,
  `conductor_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_number`, `driver_id`, `conductor_id`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(2, 'BL-4145', '1', '1', 1, '2017-07-22 15:46:25', '2017-07-27 12:11:33', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `cbscguidelines`
--

CREATE TABLE IF NOT EXISTS `cbscguidelines` (
`cbscguidelines_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cbscguidelines`
--

INSERT INTO `cbscguidelines` (`cbscguidelines_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'aaaaaaaaaaa', 1, '2017-06-09 14:45:04', '2017-07-01 14:21:47', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
`class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_description`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'NURSERY', '<p>Nursery Class</p>\r\n', 1, '2017-07-28 11:43:26', '2017-07-28 11:43:26', '::1'),
(2, 'KG', '<p>KG Class</p>\r\n', 1, '2017-07-28 11:43:42', '2017-07-28 11:43:42', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `collaborators`
--

CREATE TABLE IF NOT EXISTS `collaborators` (
`collaborators_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `collaborators`
--

INSERT INTO `collaborators` (`collaborators_id`, `image`, `title`, `content`, `sort_order`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'upload/collaborators/burger.png', 'test collaborators title', '<p>test collaborators content</p>\r\n', 1, 1, '2017-06-14 08:33:26', '2017-07-26 13:56:18', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `currentadministration`
--

CREATE TABLE IF NOT EXISTS `currentadministration` (
`currentadministration_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `currentadministration`
--

INSERT INTO `currentadministration` (`currentadministration_id`, `image`, `title`, `content`, `sort_order`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(3, 'upload/currentadministration/blankperson.jpg', 'test title', '<p>test content</p>\r\n', 1, 1, '2017-06-13 13:36:07', '2017-07-26 13:36:51', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `currentstaff`
--

CREATE TABLE IF NOT EXISTS `currentstaff` (
`currentstaff_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `currentstaff`
--

INSERT INTO `currentstaff` (`currentstaff_id`, `image`, `title`, `content`, `sort_order`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'upload/currentstaff/blankperson.png', 'test current staff title', '<p>test current staff content</p>\r\n', 1, 1, '2017-06-13 14:16:05', '2017-07-26 13:43:50', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `disandrules`
--

CREATE TABLE IF NOT EXISTS `disandrules` (
`disandrules_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `disandrules`
--

INSERT INTO `disandrules` (`disandrules_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '<p>1. All students must be punctual and properly dressed in complete school uniform for all activities in and out of the school.</p>\r\n\r\n<p>2. Free movement individually or collectively with out the class ‘Out Pass’ with in the premises is forbidden</p>\r\n\r\n<p>3. Shouting, whistling, throwing bits of paper or chalk or stone, teasing fellow students or animals and using any abusive language, is strictly forbidden.</p>\r\n\r\n<p>4. Books (other than textbooks or library books), magazines, cameras, radio or tape recorders and any such electronic items brought to the school without prior written permission will be confiscated.</p>\r\n\r\n<p>5. Mobile phones are strictly prohibited.</p>\r\n\r\n<p>6. Students should take care of their properties and the school will not be responsible for any goods lost.</p>\r\n\r\n<p>7. Students should move in line for all activities.</p>\r\n\r\n<p>8. If any student is caught for forging signature, he/she will be expelled from the school.</p>\r\n\r\n<p>9. No students is allowed to leave the school during school hours. In case of emergency the parents should make the request in writing. The authorised person other than parents should be identified.</p>\r\n\r\n<p>10. When a Teacher, Principal or a Visitor enters a classroom, the students should stand up and should remain so till they are instructed to sit down.</p>\r\n\r\n<p>11. Students should be with complete timetable and proper stationery for the class.</p>\r\n\r\n<p>12. Lending/borrowing of books, money or other material among students is strictly prohibited.</p>\r\n\r\n<p>13. Students should observe good manners at all times and they should spread the fragrance of their good conduct to bring credit to themselves, their parents and the school.</p>\r\n\r\n<p>14. Singing National Anthem/Songs and School Prayers are compulsory.</p>\r\n\r\n<p>15. Distribution of pamphlets, notices or eatables without written permission of the Principal is forbidden.</p>\r\n\r\n<p>16. Students should not posses any sharp objects, like blade, knife, paper cutter , etc., that might hurt themselves or others.</p>\r\n\r\n<p>17. Students are not allowed to wear accessories like bangles, jewellery, colured band, coloured pins, sweat bands, nail paints, tattoos etc. Mehendi, Nail polish, Bindi, Nose pins and ornaments are strit and tattoos are strictly prohibited. Girls are allowed to wear small/round earrings close to the ear lobes.</p>\r\n\r\n<p>18. Those who disobey the rules will be detained from the school.</p>', 1, '2017-06-13 07:43:19', '2017-07-26 14:00:30', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `examtimetable`
--

CREATE TABLE IF NOT EXISTS `examtimetable` (
`examtimetable_id` int(11) NOT NULL,
  `s_class` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `examtimetable`
--

INSERT INTO `examtimetable` (`examtimetable_id`, `s_class`, `subject`, `teacher_name`, `exam_date`, `exam_time`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'KG', 'Hindi', 'XYZ', '2017-07-05', '10:30:00', 1, '2017-07-27 18:30:57', '2017-07-27 18:31:05', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `feesrules`
--

CREATE TABLE IF NOT EXISTS `feesrules` (
`feesrules_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feesrules`
--

INSERT INTO `feesrules` (`feesrules_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '<p>1. It is the responsibility of the parents to deposit the fees and other charges on time. Fees are to be deposited quarterly directly to the bank as per the given schedule below: <br>\r\n1st Quarter (April - June): Before/On the 10th  April.<br>\r\n2nd Quarter (July - September): Before/On the 10th  July.<br>\r\n3rd Quarter (October - December): Before/On the 10th  October. <br>\r\n4th Quarter( January - March): Before/On the 10th  January.</p>\r\n\r\n<p>2. All cheques should be cleared on or before 10th of the respective month. The net amount credited in the school account should be the fees amount. Bank charges, if any, are to be paid by the parents.</p>\r\n\r\n<p>3. If the cheque is dishonoured, a fine of Rs. 250/-will be charged in addition to the bank charges and the fine due till the date of payment. </p>\r\n\r\n<p>4. If the fees amount is not credited in the school account on 10th of the respective month, a fine of Rs. 250/-will be levied till the last working day of the month. The child will not be permitted in the school from the first of the next month and a fine of Rs. 10/-per day will be levied in addition to the late fees. Fine will not be excused/exempted if 10th falls to be a Sunday or a bank holiday.</p>\r\n\r\n<p>5. Safe custody of the Fee Books is the parents’ responsibility and the duplicate fees book will cost Rs. 100/-(One Hundred only).     </p>\r\n\r\n<h1><strong>Withdrawals </strong>         </h1>\r\n\r\n<p>1. Every application for a Transfer Certificate shall be made in writing by the parent. T. C.  will be issued only after the clearance of all dues.</p>\r\n\r\n<p>2. The Transfer Certificate applied for must be taken within three months of the child leaving the school.</p>\r\n\r\n<p>3. Security deposit should be collected by the parents within 3 months of last attendance.</p>\r\n\r\n<p>4. A fee of Rs. 100/-will be charged for a duplicate Transfer Certificate and this will be issued only 3 days from the receipt of an application. An affidavit affirming the original is irrecoverably lost should also be attached along with the application.</p>\r\n\r\n<p>5. The date of birth of a student once entered in the school register will not be changed.</p>\r\n\r\n<p>6. Before a student is withdrawn midyear, quarterly instalment of fees will be charged. No notice is accepted during the school vacations, and incase of a withdrawal at this time, the fee must be paid up to the end of the quarter.</p>', 1, '2017-06-13 09:06:14', '2017-07-20 13:57:27', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `feessummary`
--

CREATE TABLE IF NOT EXISTS `feessummary` (
`feessummary_id` int(11) NOT NULL,
  `fee_type` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `tution_fee` varchar(255) NOT NULL,
  `miday_charge` varchar(255) NOT NULL,
  `other_charge` varchar(255) NOT NULL,
  `bus_charge` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `feessummary`
--

INSERT INTO `feessummary` (`feessummary_id`, `fee_type`, `class`, `tution_fee`, `miday_charge`, `other_charge`, `bus_charge`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(2, 'Quaterly', 'nursery', '15000', '3000', '5000', '5000', 1, '2017-07-06 11:57:49', '2017-07-27 11:44:51', '::1'),
(3, 'Montly', 'nursery', '5000', '1000', '1000', '2000', 1, '2017-07-06 12:35:15', '2017-07-27 11:44:25', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `generalrules`
--

CREATE TABLE IF NOT EXISTS `generalrules` (
`generalrules_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `generalrules`
--

INSERT INTO `generalrules` (`generalrules_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '<p>This almanac has to be brought to school daily. All students and their parents must acquaint themselves with the rules and regulations of the school and are bound to obey them.</p>\r\n\r\n<h1><strong>Issue of Certificates </strong></h1>\r\n\r\n<p>1. Certificates for age/date of birth, fees statement, character and conduct , etc., can be obtained from the school office if an application is made to this effect three days in advance.</p>\r\n\r\n<p>2. All applications should be made by the parent and should bear the name of the child, class and admission number.</p>\r\n\r\n<p>3. Any certificate issued from the school will fetch Rs. 10/-per certificate, except original Transfer Certificate.</p>\r\n\r\n<p>4. All certificates applied for must be collected from the school within seven days of application. Otherwise a new application may have to be made.</p>\r\n\r\n<p>5. All certificates will be issued as per records of the school only.</p>', 1, '2017-06-13 08:27:51', '2017-07-20 14:20:06', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `homecontent`
--

CREATE TABLE IF NOT EXISTS `homecontent` (
`homecontent_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `homecontent`
--

INSERT INTO `homecontent` (`homecontent_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '<p>We welcome you to the website of St. Thomas School, Bahadurgarh. We thank you for your interest in our school. We do hope our website covers a large part of your queries and we personally assure you of our deep commitment and continued service to education and society at large.</p>\r\n\r\n<p>St. Thomas School, established in 1995, is a private, minority, co-educational school which aimed at, and successfully bridged the urban-rural divide that is very much a part of our Indian society. ggggggg</p>', 1, '2017-07-20 17:09:39', '2017-07-20 17:13:28', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure`
--

CREATE TABLE IF NOT EXISTS `infrastructure` (
`infrastructure_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `infrastructure`
--

INSERT INTO `infrastructure` (`infrastructure_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(2, '<p>St. Thomas School is an ideal setting for learning: a diverse community knit together by its physical environment as well as by its commitment to the highest standards of excellence, integrity, free expression and inquiry. The school sprawls over a two-acre campus nestled on the outskirts of Bahadurgarh. a peaceful town which is growing very fast. The town’s uniqueness lies in the fact that it retains its small town charm even though it’s just a stone&#39;s throw away from New Delhi.</p>\r\n\r\n<p>Our campus, despite its limited resources, today hosts learning spaces such as science and maths labs, a dedicated language classrooms, library, multi-media center, music and art room among others.</p>\r\n\r\n<p>Interactive white boards as well as Content Softwares are provided in language labs to enhance the teaching – learning experience in a interactive, fun-filled manner for the teachers and students. The content is tailor made on a CBSE syllabi. The school has aligned with Hitachi for its Interactive white boards and Next Education for its computer based classroom learning solution.</p>\r\n\r\n<p>Sports and games are an important part of education and curricullum. The school has basketball, volleyball, football,  kho-kho courts as well as a seperate play area for the primary students. Summer camps as well as after-school programs are conducted to ensure a holistic education is provided through sports. The school has futher more aligned with EduSports though their SOAR™ platform- India’s first integrated school sports and physical education platform. The SOAR™ tools draw inspiration from globally accepted tools and standards- The curriculum is based on NASPE standards. The Assessment modules are bases on FitnessGram methodology. These tools are adapted to suit Indian conditions.</p>\r\n\r\n<p>STS has a well-qualified, diligent, dedicated and experienced staff. The administrative team provides leadership toward the achievement of the school’s strategic initiatives and vision. The school’s dedicated staff help ensure professional management of resources and facilities. Together, we form a team that focuses on the care and education of our students, in partnership with the parents.</p>\r\n\r\n<p>The school has its own fleet of buses, which cover most parts of the town. The bus are all installed with GPS, CCTV cameras, speed governors etc in compliance with the rules and regulations of the Transport authorities.</p>', 1, '2017-06-09 14:20:50', '2017-07-19 16:24:10', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `latesthappenings`
--

CREATE TABLE IF NOT EXISTS `latesthappenings` (
`latesthappenings_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `latesthappenings`
--

INSERT INTO `latesthappenings` (`latesthappenings_id`, `title`, `content`, `sort_order`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'gggggggggggyyyyy', '<p>kkkkkkkkkkkkyyyyyyyyy</p>\r\n', 1, 1, '2017-06-10 13:44:53', '2017-07-26 14:28:02', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `learning`
--

CREATE TABLE IF NOT EXISTS `learning` (
`learning_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `learning`
--

INSERT INTO `learning` (`learning_id`, `image`, `category`, `title`, `content`, `sort_order`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'upload/learning/300_expertise3.png', 'primaryschool', 'primary school title', '<p>primary school content</p>\r\n', 1, 1, '2017-06-15 09:39:08', '2017-07-26 12:44:19', '::1'),
(2, 'upload/learning/burger.png', 'seniorsecondaryschool', 'middle school title', '<p>middle school content</p>\r\n', 2, 1, '2017-06-15 09:39:49', '2017-07-26 14:49:16', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE IF NOT EXISTS `library` (
`library_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`library_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(2, '<p>STS&#39;s Library is one of the most important sections for learning spaces within the campus. Reading is an important part of our unique learning system. As such, we have a huge variety of books from various sections including -</p>\r\n\r\n<ul>\r\n <li>Classics</li>\r\n <li>Fiction & Fantasy</li>\r\n <li>Biographies, Autobiographies & Anecdotes</li>\r\n <li>History & other social sciences</li>\r\n <li>Science & Sci-fi</li>\r\n <li>Thrillers & Best Sellers</li>\r\n <li>Encyclopaedias & Other references</li>\r\n <li>Drama & Poetry,</li>\r\n <li>Comics, etc.</li>\r\n</ul>', 1, '2017-07-19 18:04:50', '2017-07-19 18:10:29', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `libraryrules`
--

CREATE TABLE IF NOT EXISTS `libraryrules` (
`libraryrules_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `libraryrules`
--

INSERT INTO `libraryrules` (`libraryrules_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'pppppppppppp', 1, '2017-06-13 08:47:26', '2017-07-01 16:29:55', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `uid` varchar(36) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `name`, `username`, `password`) VALUES
('dad795e5-4b33-11e3-8c00-90590c30cc70', 'admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `ourlegacy`
--

CREATE TABLE IF NOT EXISTS `ourlegacy` (
`ourlegacy_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ourlegacy`
--

INSERT INTO `ourlegacy` (`ourlegacy_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '<p>All things were made through Him, and without Him nothing was made that was made. - John 1:3</p>\r\n\r\n<p>STS was a dream venture for a young Keralite settled in a North Indian industrial town of Bahadurgarh. Borne by the limitations of working under managements and torn between providing opportunities to the privileged rather than the deserving, Mr. N. Thomaskutty, the eldest son of teachers proud of their profession decided to start a school based on his Christian ideals. Though the decision to start STS seemed to be an impulsive reaction, over time it was proved to be God’s will at work.</p>\r\n\r\n<p>The school had a very humble beginning on April 6, 1995 in the home of Prof. D.B. Malik. The estimated strength of 150 turned out to be a gross miscalculation. 423 students needed to be accommodated in the very first year, and in the absence of space, Mr. Prem Singh Parashar, a neighbor, vacated himself to a rented space and provided his house for the school. God’s providence and the timely help of all these people have enabled STS to be the success story it is today.</p>\r\n\r\n<p>In 1996 the school was able to purchase land and the construction work commenced on August 24th that year. After a dedication ceremony on September 18, 1997 the school moved to its new premises.</p>\r\n\r\n<p>The school was recognized by the State of Haryana in the year 1999. It was later affiliated to the Central Board of Secondary education in 2001. The first batch of X passed out in the year 2003. Each year brings more successful results and St. Thomas has even gone on to achieve both 3rd and 6th rank in the All India Secondary School Examination in the same year.</p>\r\n\r\n<p>Since 2007 based on the demand of parents and students of Bahadurgarh, St. Thomas School has started batches for XII graders who find it difficult to travel all the way to Delhi for basic school education.</p>\r\n\r\n<p>Today our school boasts of an enrollment of nearly 2000 students. Our school has aimed at and successfully so bridged the urban-rural divide that is very much a part of our Indian society. Our campus, despite its limited resources, today hosts learning spaces such as science labs, a dedicated language classroom, library, multi-media center, music and art room among others. The success rate of the students of STS in the AISSE and AISSCE each year is a public statement about the school&#39;s commitment to education.</p>\r\n\r\n<p>Our story so far : Timeline depiction</p>', 1, '2017-06-09 13:16:19', '2017-07-19 16:13:34', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `parentsinstructions`
--

CREATE TABLE IF NOT EXISTS `parentsinstructions` (
`parentsinstructions_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `parentsinstructions`
--

INSERT INTO `parentsinstructions` (`parentsinstructions_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '<p>1. As soon as the diary is issued, parents should fill in all the required data and sign in the spaces provided.</p>\r\n\r\n<p>2. Parents should sign the school diary daily. Daily assignments, irregularity in (a) completion of assignment (b) books (c) uniforms, or any other instructions and circulars should be acknowledged by signing the diary at the respective space provided.</p>\r\n\r\n<p>3. Parents are requested to frame a daily routine time table for each child. Ensure that it is strictly followed so that they get ample time for all activities in a disciplined manner.</p>\r\n\r\n<p>4. Parents should encourage the children to work themselves. The school does not encourage private tuitions.</p>\r\n\r\n<p>5. Encourage the children to participate in all curricular and co-curricular activities like news reading, expression of the thought as it is meant to boost the morale of the child to face a crowd and to avoid stage fright.</p>\r\n\r\n<p>6. Kindly supervise the children while arranging the next day’s time table to confirm that the child has the complete books & exercise books for smoother working in the class.</p>\r\n\r\n<p>7. Kindly provide stationery as and when required by the teachers, as it is used by the children for academic purpose.</p>\r\n\r\n<p>8. Please ensure that the child is sent neatly dressed with groomed nails and properly trimmed hair.</p>\r\n\r\n<p>9. Kindly replace worn or torn shoes and dresses without any reminder.</p>\r\n\r\n<p>10. Sick children should not be sent to the school even for a test or examination. Medical certificate may be sent along with an application.</p>\r\n\r\n<p>11. Attendance of parents for “Parent Teacher Interaction” and attendance of children for remedial classes are compulsory.</p>\r\n\r\n<p>12. All communications to the school should be addressed to the Principal and it should bear the child’s name, admission number, class, section and the address of the Parent/Guardian.</p>\r\n\r\n<p>13. Parents are not permitted to meet the teacher in the classes, on the road or in their houses to discuss the child’s performance.</p>\r\n\r\n<p>14. Parents should trust the school, its teachers and their assessment anf try to inculcate a similar attitude in their children. Criticism of the teacher , or the school should be best avoided.</p>\r\n\r\n<p>15. Parents are not permitted to meet the teacher in the classes, on the road or in their houses to discuss the child’s performance.</p>\r\n\r\n<p>16. Exchange of gifts to teachers or any staff member without a written consent of the Principal is not permitted.</p>\r\n\r\n<p>17. Parents are requested to frame a daily routine time table for each child. Ensure that it is strictly followed so that they get ample time for all activities in a disciplined manner.</p>\r\n\r\n<p>18. Parents are also requested to notify the school / class teacher for any change of address or phone numbers.</p>\r\n\r\n<p>19. Small children who are on self conveyance should be received at the gate either by parents or authorised person after the school.</p>\r\n\r\n<p>20. When a pupil is admitted on a Transfer Certificate, he shall not be placed in any class higher than that for which the certificate shows him to be qualified, nor will he/she be promoted before the end of the school year.</p>\r\n\r\n<p>21. The school neither encourages nor permits students to open accounts on social networking sites such as Facebook, Twitter, Orkut etc. and publish any material on these sites. Students may however user their parental accounts with their knowledge and guaidance to connect and communicate through these sites. Please note that participating in cyber bullying, stalking etc. is punishable by  law.</p>\r\n\r\n<h1><strong>Visiting Hours </strong></h1>\r\n\r\n<p>1. Parents may see teachers, if desired, during the following working hours except on examination days:</p>\r\n\r\n<p>            Classes I to V – 9:00 A.M. to 11 A.M. ( On all Saturdays except second satudays )</p>\r\n\r\n<p>            Classes VI onwards – 9:00 A.M to 11:00 A.M. ( On all second Satudays)</p>\r\n\r\n<p>Teachers are unavailable for meetings during examination days.</p>\r\n\r\n<p>2. Parents may meet the Principal only with prior appointment.<br>\r\nNote: Anything urgent may be communicated to the school telephonically.</p>', 1, '2017-06-13 09:21:08', '2017-07-20 12:09:43', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `photogallery`
--

CREATE TABLE IF NOT EXISTS `photogallery` (
`photogallery_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `photogallery`
--

INSERT INTO `photogallery` (`photogallery_id`, `image`, `title`, `sort_order`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'upload/photogallery/avatar-3.jpg', 'avtar aa', 2, 1, '2017-06-10 08:23:30', '2017-07-26 14:36:23', '::1'),
(2, 'upload/photogallery/avatar-11.jpg', 'avtar singh', 1, 1, '2017-06-10 08:23:51', '2017-06-23 07:16:29', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `plcredential`
--

CREATE TABLE IF NOT EXISTS `plcredential` (
`plcredential_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `student_name` char(255) NOT NULL,
  `current_class` varchar(255) NOT NULL,
  `admission_year` varchar(255) NOT NULL,
  `admission_class` varchar(255) NOT NULL,
  `parent_name` char(255) NOT NULL,
  `mother_name` char(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `plcredential`
--

INSERT INTO `plcredential` (`plcredential_id`, `type`, `username`, `student_name`, `current_class`, `admission_year`, `admission_class`, `parent_name`, `mother_name`, `email`, `phone`, `password`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(9, 'parent', 'parent7244', 'test student', 'test class', '2016-2017', 'second', 'test parent qq', 'test mother', 'test123@gmail.com', 7898456558, '12345678', 1, '2017-07-05 12:47:57', '2017-07-27 11:24:23', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `portallogin`
--

CREATE TABLE IF NOT EXISTS `portallogin` (
`portallogin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `portallogin`
--

INSERT INTO `portallogin` (`portallogin_id`, `username`, `password`, `type`, `status`) VALUES
(2, 'parent7244', '12345678', 'parent', 1),
(3, 'teacher3282', '12345', 'teacher', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pressrelease`
--

CREATE TABLE IF NOT EXISTS `pressrelease` (
`pressrelease_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pressrelease`
--

INSERT INTO `pressrelease` (`pressrelease_id`, `title`, `content`, `sort_order`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'jjhhjh', '<p>jhhhghh</p>\r\n', 1, 1, '2017-06-10 12:27:48', '2017-07-26 14:18:13', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `questionpaper`
--

CREATE TABLE IF NOT EXISTS `questionpaper` (
`questionpaper_id` int(11) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `questionpaper_pdf` varchar(500) NOT NULL,
  `session` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `questionpaper`
--

INSERT INTO `questionpaper` (`questionpaper_id`, `class_id`, `subject_id`, `questionpaper_pdf`, `session`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '2', '5', 'upload/questionpaper/Basic_Site_STThomas.pdf', '2017-2018', 1, '2017-07-29 18:04:56', '2017-07-29 18:06:32', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
`route_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `name`, `description`, `amount`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'manglapuri - dwarka Sec-1', '<p>manglapuri to dwarka sec 1</p>\r\n', '2000', 1, '2017-07-21 13:52:16', '2017-07-27 11:50:58', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `rulesconcerning`
--

CREATE TABLE IF NOT EXISTS `rulesconcerning` (
`rulesconcerning_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rulesconcerning`
--

INSERT INTO `rulesconcerning` (`rulesconcerning_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '<p>1. Leave of absence for any reason other than illness requires a prior written application and is granted only for very important occasions. In case of illness, an application is to be submitted on commencement of leave.</p>\r\n\r\n<p>2. Sick leave exceeding two days must be covered by medical certificate.</p>\r\n\r\n<p>3. No leave is granted on examination days, or after three or more consecutive holidays.</p>\r\n\r\n<p>4. School discourages leave for more than 2 days for domestic and religious functions.</p>\r\n\r\n<p>5. Students, after recovering from communicable diseases, will attend classes only after submitting a fitness certificate, stating that isolation is no more required. <br>\r\nThe quarantine period for: <br>\r\nMeasles - 10 days after appearance of rash. <br>\r\nChicken-Pox - 15 days after the falling of scabs.                                                <br>\r\nMumps - Until the disappearance of swelling.</p>\r\n\r\n<p>6. Repeated or extended absence (of one week) without leave, tenders the student liable to have his name struck off from the rolls. Readmission, if granted, will only be after the payment of fresh admission fees.</p>\r\n\r\n<p>7. All students are expected to attend classes on the re-opening day after each vacation. If absent without prior approved leave for 2 days at beginning of the session or after the summer or winter break, the student is liable to pay re-admission fee (If re-admitted).</p>\r\n\r\n<p>8. Leave of absence without reason will be fined per day.</p>', 1, '2017-06-13 08:11:51', '2017-07-20 12:43:54', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `schooltiming`
--

CREATE TABLE IF NOT EXISTS `schooltiming` (
`schooltiming_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `schooltiming`
--

INSERT INTO `schooltiming` (`schooltiming_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '<p>Summer - 7:30 A.M. to 1:50 P.M.</p>\r\n\r\n<p>Winter - 8:00 A.M. to 2:30 P.M.</p>\r\n\r\n<p>* Subject to change according to weather conditions.</p>', 1, '2017-07-20 16:31:40', '2017-07-26 14:56:09', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
`section_id` int(11) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `max_no_student` varchar(255) NOT NULL,
  `teacherregistration_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `class_id`, `section_name`, `max_no_student`, `teacherregistration_id`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '1', 'A', '50', '1', 1, '2017-07-28 12:52:03', '2017-07-28 12:52:14', '::1'),
(2, '1', 'B', '60', '1', 1, '2017-07-28 12:52:26', '2017-07-28 12:52:26', '::1'),
(3, '2', 'A', '55', '1', 1, '2017-07-28 12:52:41', '2017-07-28 12:52:41', '::1'),
(4, '1', 'B', '54', '1', 1, '2017-07-28 12:53:00', '2017-07-28 14:03:09', '::1'),
(5, '1', 'C', '60', '', 1, '2017-07-28 16:46:47', '2017-07-28 16:46:47', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE IF NOT EXISTS `sports` (
`sports_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`sports_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(2, '<p>“ Champions aren’t made in the gyms. Champions are made from something they have deep inside them – a desire, a dream, a vision. “ ~ Muhammad Ali</p>\r\n\r\n<p>Holistic education through physical activity and and sports help children improve their  health and fitness levels dramatically.  We have facilites for various sports like Basketball, Volleyball, Football, Handball etc.</p>\r\n\r\n<p>Students are taught basic skills and rules and regulations of the game. The abilities are then honed by regular practise in the field under the able guidance of the Physical Education Teachers. Special Training is provided to students also after school hours and also during vacations.</p>\r\n\r\n<p>The school has aligned with EduSport for tracking the fitness level of the students. The EduSports programme is implemented through the SOAR™ platform- India&#39;s first integrated school sports and physical education platform. The EduSports SOAR™ platform has different modules specifically designed to address the critical needs of schools, physical education teachers, parents and children for a 360 degree high quality learning experience.</p>\r\n\r\n<p>The SOAR™ tools draw inspiration from globally accepted tools and standards- The curriculum is based on NASPE standards. The Assessment modules are bases on FitnessGram methodology. These tools are adapted to suit Indian conditions.</p>\r\n\r\n<p>Indoor sports are also encouraged and various games like chess, table tennis etc are taught through the clubs.</p>\r\n\r\n<p>Sports week is favourite fixture in the annual school calender and provides an oppurtunity to students to showcase their physical abilities and compete against each other on a congenial evnironment.</p>\r\n\r\n<p>The school teams also participate n various sports competition orrganized locally as well as CBSE clusters.</p>', 1, '2017-07-19 17:46:23', '2017-07-19 17:46:23', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `studentcouncil`
--

CREATE TABLE IF NOT EXISTS `studentcouncil` (
`studentcouncil_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `studentcouncil`
--

INSERT INTO `studentcouncil` (`studentcouncil_id`, `image`, `title`, `content`, `sort_order`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(2, 'upload/studentcouncil/blankperson.png', 'student council title', 'student council content\r\n', 1, 1, '2017-06-13 15:09:05', '2017-07-26 13:50:21', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `studentregistration`
--

CREATE TABLE IF NOT EXISTS `studentregistration` (
`studentregistration_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_image` varchar(255) NOT NULL,
  `s_admissionno` varchar(255) NOT NULL,
  `s_rollno` varchar(255) NOT NULL,
  `s_class` varchar(255) NOT NULL,
  `s_dob` date NOT NULL,
  `s_dateofjoining` date NOT NULL,
  `s_dateofadmission` date NOT NULL,
  `s_bloodgroup` varchar(255) NOT NULL,
  `s_nationality` varchar(255) NOT NULL,
  `s_presentaddress` varchar(500) NOT NULL,
  `s_permanentaddress` varchar(500) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_image` varchar(255) NOT NULL,
  `f_qualification` varchar(255) NOT NULL,
  `f_organisation` varchar(255) NOT NULL,
  `f_occupation` varchar(255) NOT NULL,
  `f_designation` varchar(255) NOT NULL,
  `f_mobileno` varchar(255) NOT NULL,
  `f_email` varchar(255) NOT NULL,
  `f_address` varchar(500) NOT NULL,
  `f_city` varchar(255) NOT NULL,
  `f_state` varchar(255) NOT NULL,
  `f_country` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_image` varchar(255) NOT NULL,
  `m_qualification` varchar(255) NOT NULL,
  `m_organisation` varchar(255) NOT NULL,
  `m_occupation` varchar(255) NOT NULL,
  `m_designation` varchar(255) NOT NULL,
  `m_mobileno` varchar(255) NOT NULL,
  `m_email` varchar(255) NOT NULL,
  `m_address` varchar(500) NOT NULL,
  `m_city` varchar(255) NOT NULL,
  `m_state` varchar(255) NOT NULL,
  `m_country` varchar(255) NOT NULL,
  `lg_name` varchar(255) NOT NULL,
  `lg_image` varchar(500) NOT NULL,
  `lg_mobileno` varchar(255) NOT NULL,
  `lg_email` varchar(255) NOT NULL,
  `lg_relation` varchar(255) NOT NULL,
  `lg_address` varchar(500) NOT NULL,
  `route_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `studentregistration`
--

INSERT INTO `studentregistration` (`studentregistration_id`, `s_name`, `s_image`, `s_admissionno`, `s_rollno`, `s_class`, `s_dob`, `s_dateofjoining`, `s_dateofadmission`, `s_bloodgroup`, `s_nationality`, `s_presentaddress`, `s_permanentaddress`, `f_name`, `f_image`, `f_qualification`, `f_organisation`, `f_occupation`, `f_designation`, `f_mobileno`, `f_email`, `f_address`, `f_city`, `f_state`, `f_country`, `m_name`, `m_image`, `m_qualification`, `m_organisation`, `m_occupation`, `m_designation`, `m_mobileno`, `m_email`, `m_address`, `m_city`, `m_state`, `m_country`, `lg_name`, `lg_image`, `lg_mobileno`, `lg_email`, `lg_relation`, `lg_address`, `route_id`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'rahul ', 'upload/studentregistration/blankperson_jpgblankperson2.png', '123456', '10', 'KG', '2017-03-07', '2017-07-06', '2017-07-04', 'B +', 'Indian', 'delhi', 'delhi', 'jai ', 'upload/studentregistration/blankperson4.jpg', 'Bsc', 'company', 'manager', 'manager', '7898456558', 'jai123@gmail.com', 'delhi', 'nagloi', 'delhi', 'India', 'swata', 'upload/studentregistration/blankperson2.png', 'Msc', 'company', 'engineer', 'engineer', '8798456558', 'swata321@gmail.com', 'delhi', 'nagloi', 'Delhi', 'India', 'Ram ', 'upload/studentregistration/blankperson5.jpg', '6541239871', 'ram123@gmail.com', 'Grand father', 'delhi', '1', 1, '2017-07-24 16:17:08', '2017-07-27 12:35:37', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `studentsubject`
--

CREATE TABLE IF NOT EXISTS `studentsubject` (
`studentsubject_id` int(11) NOT NULL,
  `s_class` varchar(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `studentsubject`
--

INSERT INTO `studentsubject` (`studentsubject_id`, `s_class`, `title`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(2, 'KG', 'English,HIndi,Math,Drawing', 1, '2017-07-25 15:06:50', '2017-07-27 12:43:00', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`subject_id` int(11) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `class_id`, `subject_name`, `subject_code`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '1', 'Hindi', 'H-101', 1, '2017-07-28 17:03:20', '2017-07-28 17:03:20', '::1'),
(2, '1', 'English', 'E-101', 1, '2017-07-28 17:03:44', '2017-07-28 17:03:44', '::1'),
(3, '2', 'Hindi', 'H-201', 1, '2017-07-28 17:04:02', '2017-07-28 17:04:02', '::1'),
(4, '2', 'English', 'E-202', 1, '2017-07-28 17:04:24', '2017-07-28 17:10:43', '::1'),
(5, '2', 'Math', 'M-203', 1, '2017-07-29 10:45:51', '2017-07-29 10:45:51', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE IF NOT EXISTS `syllabus` (
`syllabus_id` int(11) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `syllabus_pdf` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`syllabus_id`, `class_id`, `subject_id`, `syllabus_pdf`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(3, '1', '1', 'upload/syllabus/Basic_Site_STThomas1.pdf', 1, '2017-07-29 15:40:02', '2017-07-29 16:05:06', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `teacherregistration`
--

CREATE TABLE IF NOT EXISTS `teacherregistration` (
`teacherregistration_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `teacher_name` char(255) NOT NULL,
  `father_name` char(255) NOT NULL,
  `join_year` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teacherregistration`
--

INSERT INTO `teacherregistration` (`teacherregistration_id`, `type`, `username`, `teacher_name`, `father_name`, `join_year`, `qualification`, `email`, `phone`, `password`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'teacher', 'teacher3282', 'test teacher name', 'test father name', '2017', 'test qualification', 'test456@gmail.com', '7898456512', '12345', 1, '2017-07-05 16:21:05', '2017-07-27 11:36:05', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `testpaper`
--

CREATE TABLE IF NOT EXISTS `testpaper` (
`testpaper_id` int(11) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `testpaper_pdf` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `testpaper`
--

INSERT INTO `testpaper` (`testpaper_id`, `class_id`, `subject_id`, `session`, `testpaper_pdf`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, '1', '2', '2017-2018', 'upload/testpaper/Basic_Site_STThomas1.pdf', 1, '2017-07-29 16:53:46', '2017-07-29 16:56:48', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `thefounders`
--

CREATE TABLE IF NOT EXISTS `thefounders` (
`thefounders_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `thefounders`
--

INSERT INTO `thefounders` (`thefounders_id`, `content`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'ppppppppp', 1, '2017-06-09 13:52:55', '2017-07-01 14:16:58', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `transportconductor`
--

CREATE TABLE IF NOT EXISTS `transportconductor` (
`transportconductor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobileno` bigint(20) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `dateofjoining` date NOT NULL,
  `presentaddress` varchar(500) NOT NULL,
  `permanentaddress` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `transportconductor`
--

INSERT INTO `transportconductor` (`transportconductor_id`, `name`, `mobileno`, `qualification`, `dateofjoining`, `presentaddress`, `permanentaddress`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'xwy', 7845655898, 'highschool ', '2017-07-12', 'palam delhi', 'palam delhi', 1, '2017-07-22 11:32:10', '2017-07-27 12:06:36', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `transportdriver`
--

CREATE TABLE IF NOT EXISTS `transportdriver` (
`transportdriver_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dl_number` varchar(255) NOT NULL,
  `dateofjoining` date NOT NULL,
  `mobileno` bigint(20) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `presentaddress` varchar(500) NOT NULL,
  `permanentaddress` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `transportdriver`
--

INSERT INTO `transportdriver` (`transportdriver_id`, `name`, `dl_number`, `dateofjoining`, `mobileno`, `qualification`, `presentaddress`, `permanentaddress`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'xyz', 'DL-1254', '2017-07-05', 7898456558, 'inter', 'delhi', 'delhi', 1, '2017-07-21 18:31:48', '2017-07-27 11:57:16', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `videogallery`
--

CREATE TABLE IF NOT EXISTS `videogallery` (
`videogallery_id` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `videogallery`
--

INSERT INTO `videogallery` (`videogallery_id`, `url`, `sort_order`, `status`, `entry_date`, `modified_date`, `ip_address`) VALUES
(1, 'https://www.youtube.com/embed/XGSy3_Czz8k', 1, 1, '2017-06-10 09:45:25', '2017-07-26 11:20:42', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
 ADD PRIMARY KEY (`aboutus_id`);

--
-- Indexes for table `admissioncriteria`
--
ALTER TABLE `admissioncriteria`
 ADD PRIMARY KEY (`admissioncriteria_id`);

--
-- Indexes for table `admissionfees`
--
ALTER TABLE `admissionfees`
 ADD PRIMARY KEY (`admissionfees_id`);

--
-- Indexes for table `affiliations`
--
ALTER TABLE `affiliations`
 ADD PRIMARY KEY (`affiliations_id`);

--
-- Indexes for table `artculture`
--
ALTER TABLE `artculture`
 ADD PRIMARY KEY (`artculture_id`);

--
-- Indexes for table `assessmentcriteria`
--
ALTER TABLE `assessmentcriteria`
 ADD PRIMARY KEY (`assessmentcriteria_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
 ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
 ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
 ADD PRIMARY KEY (`bus_id`), ADD UNIQUE KEY `bus_number` (`bus_number`), ADD UNIQUE KEY `driver_id` (`driver_id`), ADD UNIQUE KEY `conductor_id` (`conductor_id`);

--
-- Indexes for table `cbscguidelines`
--
ALTER TABLE `cbscguidelines`
 ADD PRIMARY KEY (`cbscguidelines_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
 ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `collaborators`
--
ALTER TABLE `collaborators`
 ADD PRIMARY KEY (`collaborators_id`);

--
-- Indexes for table `currentadministration`
--
ALTER TABLE `currentadministration`
 ADD PRIMARY KEY (`currentadministration_id`);

--
-- Indexes for table `currentstaff`
--
ALTER TABLE `currentstaff`
 ADD PRIMARY KEY (`currentstaff_id`);

--
-- Indexes for table `disandrules`
--
ALTER TABLE `disandrules`
 ADD PRIMARY KEY (`disandrules_id`);

--
-- Indexes for table `examtimetable`
--
ALTER TABLE `examtimetable`
 ADD PRIMARY KEY (`examtimetable_id`);

--
-- Indexes for table `feesrules`
--
ALTER TABLE `feesrules`
 ADD PRIMARY KEY (`feesrules_id`);

--
-- Indexes for table `feessummary`
--
ALTER TABLE `feessummary`
 ADD PRIMARY KEY (`feessummary_id`);

--
-- Indexes for table `generalrules`
--
ALTER TABLE `generalrules`
 ADD PRIMARY KEY (`generalrules_id`);

--
-- Indexes for table `homecontent`
--
ALTER TABLE `homecontent`
 ADD PRIMARY KEY (`homecontent_id`);

--
-- Indexes for table `infrastructure`
--
ALTER TABLE `infrastructure`
 ADD PRIMARY KEY (`infrastructure_id`);

--
-- Indexes for table `latesthappenings`
--
ALTER TABLE `latesthappenings`
 ADD PRIMARY KEY (`latesthappenings_id`);

--
-- Indexes for table `learning`
--
ALTER TABLE `learning`
 ADD PRIMARY KEY (`learning_id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
 ADD PRIMARY KEY (`library_id`);

--
-- Indexes for table `libraryrules`
--
ALTER TABLE `libraryrules`
 ADD PRIMARY KEY (`libraryrules_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `ourlegacy`
--
ALTER TABLE `ourlegacy`
 ADD PRIMARY KEY (`ourlegacy_id`);

--
-- Indexes for table `parentsinstructions`
--
ALTER TABLE `parentsinstructions`
 ADD PRIMARY KEY (`parentsinstructions_id`);

--
-- Indexes for table `photogallery`
--
ALTER TABLE `photogallery`
 ADD PRIMARY KEY (`photogallery_id`);

--
-- Indexes for table `plcredential`
--
ALTER TABLE `plcredential`
 ADD PRIMARY KEY (`plcredential_id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `portallogin`
--
ALTER TABLE `portallogin`
 ADD PRIMARY KEY (`portallogin_id`);

--
-- Indexes for table `pressrelease`
--
ALTER TABLE `pressrelease`
 ADD PRIMARY KEY (`pressrelease_id`);

--
-- Indexes for table `questionpaper`
--
ALTER TABLE `questionpaper`
 ADD PRIMARY KEY (`questionpaper_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
 ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `rulesconcerning`
--
ALTER TABLE `rulesconcerning`
 ADD PRIMARY KEY (`rulesconcerning_id`);

--
-- Indexes for table `schooltiming`
--
ALTER TABLE `schooltiming`
 ADD PRIMARY KEY (`schooltiming_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
 ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
 ADD PRIMARY KEY (`sports_id`);

--
-- Indexes for table `studentcouncil`
--
ALTER TABLE `studentcouncil`
 ADD PRIMARY KEY (`studentcouncil_id`);

--
-- Indexes for table `studentregistration`
--
ALTER TABLE `studentregistration`
 ADD PRIMARY KEY (`studentregistration_id`);

--
-- Indexes for table `studentsubject`
--
ALTER TABLE `studentsubject`
 ADD PRIMARY KEY (`studentsubject_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
 ADD PRIMARY KEY (`syllabus_id`);

--
-- Indexes for table `teacherregistration`
--
ALTER TABLE `teacherregistration`
 ADD PRIMARY KEY (`teacherregistration_id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `testpaper`
--
ALTER TABLE `testpaper`
 ADD PRIMARY KEY (`testpaper_id`);

--
-- Indexes for table `thefounders`
--
ALTER TABLE `thefounders`
 ADD PRIMARY KEY (`thefounders_id`);

--
-- Indexes for table `transportconductor`
--
ALTER TABLE `transportconductor`
 ADD PRIMARY KEY (`transportconductor_id`);

--
-- Indexes for table `transportdriver`
--
ALTER TABLE `transportdriver`
 ADD PRIMARY KEY (`transportdriver_id`);

--
-- Indexes for table `videogallery`
--
ALTER TABLE `videogallery`
 ADD PRIMARY KEY (`videogallery_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
MODIFY `aboutus_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `admissioncriteria`
--
ALTER TABLE `admissioncriteria`
MODIFY `admissioncriteria_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admissionfees`
--
ALTER TABLE `admissionfees`
MODIFY `admissionfees_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `affiliations`
--
ALTER TABLE `affiliations`
MODIFY `affiliations_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `artculture`
--
ALTER TABLE `artculture`
MODIFY `artculture_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `assessmentcriteria`
--
ALTER TABLE `assessmentcriteria`
MODIFY `assessmentcriteria_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cbscguidelines`
--
ALTER TABLE `cbscguidelines`
MODIFY `cbscguidelines_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `collaborators`
--
ALTER TABLE `collaborators`
MODIFY `collaborators_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `currentadministration`
--
ALTER TABLE `currentadministration`
MODIFY `currentadministration_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `currentstaff`
--
ALTER TABLE `currentstaff`
MODIFY `currentstaff_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `disandrules`
--
ALTER TABLE `disandrules`
MODIFY `disandrules_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `examtimetable`
--
ALTER TABLE `examtimetable`
MODIFY `examtimetable_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feesrules`
--
ALTER TABLE `feesrules`
MODIFY `feesrules_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feessummary`
--
ALTER TABLE `feessummary`
MODIFY `feessummary_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `generalrules`
--
ALTER TABLE `generalrules`
MODIFY `generalrules_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `homecontent`
--
ALTER TABLE `homecontent`
MODIFY `homecontent_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `infrastructure`
--
ALTER TABLE `infrastructure`
MODIFY `infrastructure_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `latesthappenings`
--
ALTER TABLE `latesthappenings`
MODIFY `latesthappenings_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `learning`
--
ALTER TABLE `learning`
MODIFY `learning_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
MODIFY `library_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `libraryrules`
--
ALTER TABLE `libraryrules`
MODIFY `libraryrules_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ourlegacy`
--
ALTER TABLE `ourlegacy`
MODIFY `ourlegacy_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parentsinstructions`
--
ALTER TABLE `parentsinstructions`
MODIFY `parentsinstructions_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `photogallery`
--
ALTER TABLE `photogallery`
MODIFY `photogallery_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `plcredential`
--
ALTER TABLE `plcredential`
MODIFY `plcredential_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `portallogin`
--
ALTER TABLE `portallogin`
MODIFY `portallogin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pressrelease`
--
ALTER TABLE `pressrelease`
MODIFY `pressrelease_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `questionpaper`
--
ALTER TABLE `questionpaper`
MODIFY `questionpaper_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rulesconcerning`
--
ALTER TABLE `rulesconcerning`
MODIFY `rulesconcerning_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schooltiming`
--
ALTER TABLE `schooltiming`
MODIFY `schooltiming_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
MODIFY `sports_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `studentcouncil`
--
ALTER TABLE `studentcouncil`
MODIFY `studentcouncil_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `studentregistration`
--
ALTER TABLE `studentregistration`
MODIFY `studentregistration_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `studentsubject`
--
ALTER TABLE `studentsubject`
MODIFY `studentsubject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
MODIFY `syllabus_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teacherregistration`
--
ALTER TABLE `teacherregistration`
MODIFY `teacherregistration_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testpaper`
--
ALTER TABLE `testpaper`
MODIFY `testpaper_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `thefounders`
--
ALTER TABLE `thefounders`
MODIFY `thefounders_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transportconductor`
--
ALTER TABLE `transportconductor`
MODIFY `transportconductor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transportdriver`
--
ALTER TABLE `transportdriver`
MODIFY `transportdriver_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `videogallery`
--
ALTER TABLE `videogallery`
MODIFY `videogallery_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
