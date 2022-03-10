-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2020 at 01:01 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `etutor`
--
CREATE DATABASE `etutor` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `etutor`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE IF NOT EXISTS `tbl_account` (
  `ac_id` bigint(10) NOT NULL,
  `pin` bigint(4) NOT NULL,
  `amount` bigint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`ac_id`, `pin`, `amount`) VALUES
(12345678, 4321, 905000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`user_id`, `username`, `password`, `firstname`, `lastname`, `image`) VALUES
(47, 'admin', 'admin', 'cyril cereaic', 'joseph', 'uploads/download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allottedqns`
--

CREATE TABLE IF NOT EXISTS `tbl_allottedqns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `qn_paper_code` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_allottedqns`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE IF NOT EXISTS `tbl_chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_chat`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE IF NOT EXISTS `tbl_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `student_id`, `subject_id`, `teacher_id`) VALUES
(52, 51, 39, 18),
(56, 54, 50, 42),
(55, 27, 41, 19),
(53, 51, 40, 18),
(54, 51, 41, 19),
(57, 55, 41, 43),
(58, 56, 52, 44),
(59, 54, 50, 42),
(60, 57, 60, 45),
(61, 57, 60, 45);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE IF NOT EXISTS `tbl_course` (
  `course_id` varchar(100) NOT NULL,
  `course_title` varchar(150) NOT NULL,
  `dept_id` int(100) NOT NULL,
  `major` varchar(100) NOT NULL,
  `fee_structure` int(10) NOT NULL,
  `course_duration` varchar(150) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_title`, `dept_id`, `major`, `fee_structure`, `course_duration`) VALUES
('DMCA', 'DIPLOMA IN COMPUTER MULTILINGUAL APPLICATIONS', 9, 'MAJOR', 2000, '2 months'),
('DGMDP', 'DIPLOMA IN GRAPHICS & MULTILINGUAL DESKTOP PUBLISHING', 9, 'MAJOR', 5000, '6 months'),
('DMOA', 'DIPLOMA IN OFFICE AUTOMATION & APPLICATION OF GIST', 9, 'MAJOR', 6000, '6 months'),
(' DMCP', 'DIPLOMA IN COMPUTER MULTILINGUAL PROGRAMMING', 9, 'MAJOR', 6000, '6 months'),
('DHN', 'DIPLOMA IN HARDWARE & NETWORKING', 9, 'MAJOR', 10000, '6 months'),
('DECom', 'DIPLOMA IN E-COMMERCE', 10, 'MAJOR', 8000, '6 months'),
('DMOAFA', 'DIPLOMA IN OFFICE AUTOMATION & FIN. ACCOUNTING', 10, 'MAJOR', 6000, '3 months'),
('BSW10', 'Bachelor of social work', 10, 'MAJOR', 10000, '2 months'),
('ENGL89', 'CRITICAL THINKING', 11, 'MAJOR', 5000, '2 months'),
('ENGL65', 'GRAMMER & PRACTICE IN COMMUNICATION', 11, 'MAJOR', 6000, '3 months');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE IF NOT EXISTS `tbl_department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `inCharge` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`dept_id`, `inCharge`, `title`, `dept_name`) VALUES
(11, 'Mrs. Rosely', 'HOD', 'English'),
(10, 'Mr.Ameer', 'HOD', 'Commerce'),
(9, 'Mr.Thomas', 'HOD', 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE IF NOT EXISTS `tbl_exam` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `exam_date` varchar(20) NOT NULL,
  `max_mark` float NOT NULL,
  `mark_obtained` float NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`exam_id`, `student_id`, `subject_id`, `exam_date`, `max_mark`, `mark_obtained`) VALUES
(12, 25, 51, '2015-10-14', 0, 0),
(13, 28, 47, '2015-10-15', 100, 20),
(11, 25, 52, '2015-10-14', 0, 0),
(36, 28, 49, '2018-03-29', 100, 0),
(17, 29, 47, '2015-10-16', 100, 10),
(38, 36, 55, '2018-03-29', 0, 0),
(19, 31, 47, '2015-10-17', 100, 10),
(20, 25, 50, '2018-03-22', 0, 0),
(21, 30, 47, '2018-02-03', 100, 10),
(31, 30, 49, '2018-03-29', 100, 0),
(23, 26, 46, '2018-02-28', 0, 0),
(24, 23, 53, '2018-03-09', 100, 0),
(25, 24, 57, '2018-03-21', 100, 20),
(26, 38, 46, '2018-03-22', 100, 10),
(27, 29, 48, '2018-03-23', 100, 10),
(28, 39, 56, '2018-03-23', 100, 0),
(29, 26, 45, '2018-03-25', 100, 15),
(30, 27, 41, '2018-03-27', 100, 0),
(39, 30, 48, '2018-03-29', 100, 10),
(40, 28, 48, '2018-03-29', 100, 0),
(41, 50, 44, '2018-03-31', 100, 15),
(42, 51, 40, '2018-04-05', 100, 0),
(43, 54, 50, '2020-04-24', 100, 5),
(44, 54, 51, '2020-05-20', 0, 0),
(45, 54, 52, '2020-05-20', 0, 0),
(46, 57, 60, '2020-05-20', 100, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE IF NOT EXISTS `tbl_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(500) NOT NULL,
  `fdateIn` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`file_id`, `location`, `fdateIn`, `description`, `fname`, `teacher_id`, `subject_id`) VALUES
(37, 'uploads/8666_File_Inheritance.pptx', '15:10:14', 'inheritance', 'inheri', 18, 49),
(36, 'uploads/2167_File_inheritance_to_MCA.docx', '15:10:14', 'inheritance', 'inher', 20, 48),
(35, 'uploads/1748_File_Predict the output or error.docx', '15:10:14', 'predicate output error', 'eror', 20, 47),
(33, 'uploads/4515_File_CREATE A FILE AND STORE DATA IN IT IN C PROGRAM.docx', '15:10:14', 'c pgm', 'c pgm', 20, 47),
(34, 'uploads/7224_File_C program to read a file.docx', '15:10:14', 'read a file', 'read', 20, 47),
(32, 'uploads/7681_File_csmodule1new.doc', '15:10:12', 'module2', 'module2', 20, 51),
(31, 'uploads/7751_File_MODULE2.docx', '15:10:12', 'module1', 'module1', 20, 51),
(30, 'uploads/1692_File_csmodule1_2ndhalf.docx', '15:10:12', 'module2', 'module2', 19, 52),
(29, 'uploads/5232_File_2D Transformations.pptx', '15:10:12', 'module1', 'module1', 19, 52),
(28, 'uploads/9070_File_csmodule1new.doc', '15:10:12', 'ISM', 'ISM', 22, 57),
(27, 'uploads/9429_File_keymgmt and MAC.pptx', '15:10:12', 'ISM', 'ISM', 22, 57),
(26, 'uploads/5655_File_DES.docx', '15:10:12', 'Digital Signature', 'Digital Signature', 22, 53),
(38, 'uploads/5744_File_Package.pptx', '15:10:14', 'package', 'package', 18, 49),
(39, 'uploads/8105_File_Sessions Presentation.pptx', '15:10:16', 'aaaaaaa', 'aaaaaa', 18, 38),
(40, 'uploads/5341_File_4.Introduction_flora.docx', '15:10:16', 'introduction', 'Flora', 18, 50),
(41, 'uploads/7718_File_Validation.pptx', '15:10:17', 'php', 'php', 18, 50),
(42, 'uploads/3947_File_1692_File_csmodule1_2ndhalf.docx', '18:02:05', 'ko', 'h', 32, 60),
(43, 'uploads/2680_File_1741_File_Dedication.docx', '18:03:09', 'Codes and programs', 'C Programming codes', 20, 47),
(44, 'uploads/7851_File_1692_File_csmodule1_2ndhalf.docx', '18:03:19', 'CS', 'CHP 1', 21, 36),
(45, 'uploads/9451_File_2591_File_MENU.docx', '18:03:19', 'DATABASE', 'MS SQL', 18, 46),
(46, 'uploads/6204_File_5341_File_4.Introduction_flora.docx', '18:03:21', 'data abstraction', 'dms overview', 23, 57),
(47, 'uploads/8831_File_9451_File_2591_File_MENU.docx', '18:03:22', 'databases', 'MS SQL', 18, 46),
(48, 'uploads/6259_File_3942_File_Web Image Re-Ranking UsingQuery-Specific Semantic Signatures.docx', '18:03:29', 'critical thinking', 'barriers to critical thinking', 26, 60),
(49, 'uploads/2049_File_dummy.pdf', '20:04:24', 'data for learning', 'Basic electronics note', 42, 50),
(50, 'uploads/1558_File_dummy.pdf', '20:04:25', 'd', 'dd', 42, 50),
(51, 'uploads/7088_File_dummy.pdf', '20:04:25', 'd', 'dd', 42, 50),
(52, 'uploads/6356_File_dummy.pdf', '20:04:26', 'gtg', 'res', 42, 50),
(53, 'uploads/9611_File_dummy.pdf', '20:04:26', 'aq', 'dd', 42, 50),
(54, 'uploads/9057_File_dummy.pdf', '20:04:26', 'rfrf', 'dd', 42, 50),
(55, 'uploads/7904_File_dummy.pdf', '20:04:26', 'w', 'video tets', 42, 50),
(56, 'uploads/4216_File_documentation.docx', '20:05:20', 'df', 'james', 42, 50),
(57, 'uploads/1253_File_Frront-2 2.docx', '20:05:20', 'test2', 'test', 44, 52),
(58, 'uploads/9206_File_Frront-2 2.docx', '20:05:20', 'gjjh', 'james', 44, 52),
(59, 'uploads/9729_File_documentation.docx', '20:05:20', 'test', 'english', 45, 60);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE IF NOT EXISTS `tbl_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sentby` int(11) NOT NULL,
  `sentto` int(11) NOT NULL,
  `msg` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`id`, `sentby`, `sentto`, `msg`) VALUES
(1, 1, 2, 'hi'),
(2, 1, 2, 'hi'),
(3, 1, 2, 'hi'),
(4, 1, 2, 'hi'),
(5, 1, 2, 'koi'),
(6, 1, 2, 'oi'),
(7, 1, 2, 'ahahah'),
(8, 1, 2, 'hi'),
(9, 1, 2, 'f'),
(10, 1, 2, 'f'),
(11, 1, 2, 'ok'),
(12, 1, 2, 'po'),
(13, 1, 2, 'oi'),
(14, 1, 2, 'jjijjiji'),
(15, 1, 2, 'dedededed'),
(17, 0, 1, '1'),
(18, 0, 1, '1'),
(19, 0, 1, '1'),
(20, 1, 1, ''),
(21, 1, 1, 'fuck'),
(22, 1, 1, 'fffffffffffffffff'),
(23, 1, 1, 'sfsd'),
(24, 1, 1, 'sdfds'),
(25, 1, 1, 'sdfsd'),
(26, 1, 1, 'sdfsf'),
(27, 1, 1, 'ok'),
(28, 1, 1, 'fsdfsdfsdfsdfsd'),
(29, 1, 1, 'hos');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE IF NOT EXISTS `tbl_questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `qn_paper_code` varchar(100) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `correct_ans` varchar(500) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=177 ;

--
-- Dumping data for table `tbl_questions`
--

INSERT INTO `tbl_questions` (`question_id`, `qn_paper_code`, `course_id`, `teacher_id`, `subject_id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_ans`) VALUES
(29, 'CSC15', ' DMCP', 20, 47, 'C function return ______ value by default?', 'Charecter', 'No', 'Integer', 'float', 'Integer'),
(28, 'CSC15', ' DMCP', 20, 47, 'A function can ---------?', 'perform a task', 'return a value', 'All the above', 'none of the above', 'All the above'),
(26, 'CSNW15', 'DHN', 19, 52, 'A device that convert digital signal to analog signal is -----?', 'packet', 'modem', 'block', 'both A and B', 'modem'),
(25, 'CSNW15', 'DHN', 19, 52, 'Coaxial cable has conductors with -----?', 'equal resistence', 'the same diameter', 'Both A and B', 'a common axis', 'a common axis'),
(24, 'CSNW15', 'DHN', 19, 52, 'The area of coverage of a sattelite radio beam is known as ----?', 'Footprint', 'Circular polarization', 'Beam width', 'Identity', 'Circular polarization'),
(23, 'CSNW15', 'DHN', 19, 52, 'Which of the following is not a guided medium?', 'Twisted pair cable', 'Coaxial cable', 'Fiber obtic cable', 'Atmosphere', 'Atmosphere'),
(22, 'CSNW15', 'DHN', 19, 52, 'In fiber optics, the signal source is ----- waves?', 'light', 'infrared', 'radio', ' very low frequency', 'light'),
(21, 'CSNW15', 'DHN', 19, 52, 'Transmission media is generally categorised as -----?', 'fixed or unfixed', 'determinate or indeterminate', 'guided or unguided', 'metalic or non metalic', 'guided or unguided'),
(30, 'CSC15', ' DMCP', 20, 47, 'Which of the following is not a C function?', 'printf', 'fprintf', 'sprintf', 'tprintf', 'tprintf'),
(31, 'CSC15', ' DMCP', 20, 47, 'Which of the function is not a header file of C?', 'ctype.h', 'string.h', 'stdlib.h', 'type.h', 'type.h'),
(32, 'CSC15', ' DMCP', 20, 47, 'Encapsulation is also known as ------?', 'Information hiding', 'Data abstraction', 'Data about Data', 'None of these', 'Information hiding'),
(33, 'QCJ15', ' DMCP', 18, 49, 'java is two things. a programing language and --------?', 'a platform', 'an application', 'both a and b', 'none of this', 'a platform'),
(34, 'QCJ15', ' DMCP', 18, 49, 'The default parameter passing mechanism is --------?', 'call by value', 'call by reference', 'call by value result', 'None of these', 'call by value'),
(35, 'QCJ15', ' DMCP', 18, 49, 'The parameter passing mechanism for an array is -------?', 'call by value', 'call by value result', 'call by reference', 'none of these', 'call by value'),
(36, 'QCJ15', ' DMCP', 18, 49, 'Overloading is otherwise called as ------?', 'virtual polymorphism', 'transcient polymorphism', 'pseudo polymorphism', 'ad-hoc polymorphism', 'ad-hoc polymorphism'),
(37, 'QCJ15', ' DMCP', 18, 49, 'A function that calls itself for its processing is known as -------- function?', 'Recursive', 'Inline', 'Nested', 'Overloaded', 'Recursive'),
(38, 'QCJ15', ' DMCP', 18, 49, 'How many time a do while loop is guarenteed to loop?', '0', '1', 'Depending upon value of the variable', 'Infinitly', '1'),
(39, 'QCJ15', ' DMCP', 20, 48, '_______ is not a jumb statement in C++?', 'break', 'goto', 'exit', 'switch', 'break'),
(40, 'QCCPP15', ' DMCP', 20, 48, '________ is a selection statement in CPP?', 'switch', 'brak', 'goto', 'exit', 'switch'),
(41, 'QCCPP15', ' DMCP', 20, 48, 'The continue statement is _______?', 'skips the rest of the loop in current iteration ', 'resumes the program if it is hanged', 'resume the program if break was applied', 'None of the above', 'skips the rest of the loop in current iteration '),
(42, 'QCCPP15', ' DMCP', 20, 49, 'Array is access using ______ approah?', 'LIFO', 'FIFO', 'index number', 'operator', 'index number'),
(43, 'QCCPP15', ' DMCP', 20, 48, 'A class having no name is ---------?', 'is not allowed', 'cannot have a constructor', 'cannot have a destructor', 'cannot be passed as an argument', 'is not allowed'),
(45, 'G78SQL8ER', 'DMOA', 18, 46, 'This set of Oracle Database Multiple Choice Questions & Answers (MCQs) focuses on “DML Command”.', 'DML', 'DDL', 'QUERY LANGUAGE', 'ALL OF THE ABOVE', 'DML'),
(46, '11w1r', 'DMOA', 18, 45, 'Which is not a font style ?', 'bold', 'subscript', 'italics', 'regular', 'subscript'),
(47, '11w1r', 'DMOA', 18, 45, 'Landscape is ?', 'A font style', 'Paper Size', 'Page Layout', 'Page Orientation', 'Page Orientation'),
(48, '11w1r', 'DMOA', 18, 45, 'Typeface option will come under which menu', 'Edit', 'view', 'format', 'tools', 'format'),
(49, '11w1r', 'DMOA', 18, 45, ' Background color on a document is not visible in ?', 'Web layout view', 'Print Preview', 'Reading View', 'Print Layout view', 'Print Preview'),
(51, '11w1r', 'DMOA', 18, 45, ' What is a portion of a document in which you set certain page formatting options ?', 'page setup', 'page', 'section', 'document', 'section'),
(56, 'CP451A', ' DMCP', 20, 47, 'C function return ______ value by default?', 'character', 'number', 'integer', 'float', 'integer'),
(61, 'FE34A', 'DECom', 23, 54, 'To check integrity of a message, or document, receiver creates the', 'hash-table', 'hash tag', 'hyper text', 'finger print', 'hash tag'),
(57, 'CP451A', ' DMCP', 20, 47, 'A function can ---------?', 'perform a task', 'return a value', 'all the above', 'none of them', 'all the above'),
(58, 'CP451A', ' DMCP', 20, 47, 'Which of the following is not a C function?', 'printf', 'fprintf', 'sprintf', 'tprintf', 'tprintf'),
(59, 'CP451A', ' DMCP', 20, 47, 'Which of the function is not a header file of C?', 'ctype.h', 'string.h', 'studlib.h', 'type.h', 'type.h'),
(60, 'CP451A', ' DMCP', 20, 47, 'Encapsulation is also known as ------?', 'Information hiding', 'Data abstraction', 'Data about Data', 'none of them', 'information hiding'),
(62, 'FE34A', 'DECom', 23, 54, 'one way to preserve integrity of a document  is through use of a', 'eye-rays', 'finger print', 'biometrics', 'x-rays', 'finger prints'),
(63, 'FE34A', 'DECom', 23, 54, 'A session symmetric key between two parties is used', 'only once', 'twice', 'multiple times', 'conditions dependant', 'only once'),
(64, 'FE34A', 'DECom', 23, 54, 'Encryption and decryption provide secrecy, or confidentiality, but not', 'Authentation', 'integrity', 'privacy', 'all of the above', 'integrity'),
(65, 'FE34A', 'DECom', 23, 54, 'Message confidentiality is using ', 'cipher text', 'cipher', 'symmetric-key', 'asymmetric-key', 'asymmetric key'),
(66, 'AW4RDX', 'DECom', 23, 53, 'A digital signature needs a', 'private key stream', 'shared key stream ', 'public key stream', 'all of the above', 'public key stream'),
(67, 'AW4RDX', 'DECom', 23, 53, 'To preserve integrity of a document, both document and finger print are', 'not used', 'unimportant', 'needed', 'not needed', 'needed'),
(68, 'AW4RDX', 'DECom', 23, 53, 'A sender must not be able to deny sending a message that was sent, is known as', 'message nonrepudiation', 'message integrity', 'message confidentiality', 'message sending', 'message nonrepudiation'),
(69, 'AW4RDX', 'DECom', 23, 53, 'message digest needs to be', 'public', 'private', 'kept secret', 'none', 'kept secret'),
(70, 'AW4RDX', 'DECom', 23, 53, 'In mesage integrity, message digest needs to be kept', 'secret', 'low', 'high', 'constant 0', 'secret'),
(71, 'CM0UI', 'DECom', 23, 55, 'direct marketting is continuing to become more____________ oriented', 'television', 'web', 'mail', 'radio', 'web'),
(72, 'CM0UI', 'DECom', 23, 55, 'which of the following is essential for direct marketing to be effective', 'an online presence', 'a good customer data base', 'a well trained sales force', 'digital direct marketing techniquies', 'a good customer database'),
(73, 'CM0UI', 'DECom', 23, 55, 'The use of which of the new forms of direct-mail marketing is booming?', 'fax mail', 'e-mail', 'voice mail', 'u.s.mail', 'e-mail'),
(74, 'CM0UI', 'DECom', 23, 55, 'marketers use ___________ telephone marketing to receive orders from television ads and catelogs', 'inbound', 'outbound', 'interactive', 'direct-response', 'inbound'),
(75, 'CM0UI', 'DECom', 23, 55, 'Ringtones gives away, mobile games, and text-in contests are all example of __________ marketing', 'kiosk', 'online', 'podcast', 'mobilephone', 'mobilephone'),
(76, 'CD4TH', 'DECom', 37, 55, 'marketers use ___________ telephone marketing to receive orders from television ads and catelogs', 'inbound', 'outbound', 'interactive', 'direct-response', 'inbound'),
(77, 'CD4TH', 'DECom', 37, 55, 'direct marketting is continuing to become more____________ oriented', 'television', 'web', 'mail', 'radio', 'web'),
(78, 'CD4TH', 'DECom', 37, 55, 'which of the following is essential for direct marketing to be effective', 'an online presence', 'a good customer data base', 'a well trained sales force', 'digital direct marketing techniquies', 'a good customer database'),
(79, 'CD4TH', 'DECom', 37, 55, 'The use of which of the new forms of direct-mail marketing is booming?', 'fax mail', 'e-mail', 'voice mail', 'u.s.mail', 'e-mail'),
(80, 'CD4TH', 'DECom', 37, 55, 'Ringtones gives away, mobile games, and text-in contests are all example of __________ marketing', 'kiosk', 'online', 'podcast', 'mobilephone', 'mobilephone'),
(81, 'WIN07Y', 'DMOAFA', 37, 56, 'which of the following os do you choose to implement a client server network?', 'ms dos', 'windows', 'window 98', 'windows 2000', 'windows 2000'),
(82, 'WIN07Y', 'DMOAFA', 37, 56, 'my computer was introduced from', 'windows 3.1', 'windows 3.11', 'windows 95', 'windows 98', 'windows 95'),
(83, 'WIN07Y', 'DMOAFA', 37, 56, 'which of the following windows do not have a start button', 'windows vista', 'windows 7', 'windows 8', 'none of them', 'windows 8'),
(84, 'WIN07Y', 'DMOAFA', 37, 56, 'which of these is latest version of ms windows', 'windows 8', 'windows 10', 'windows 7', 'none of them', 'windows 10'),
(85, 'WIN07Y', 'DMOAFA', 37, 56, 'which of the following does not support more than one program at a time', 'dos', 'linux', 'windows', 'unix', 'dos'),
(86, 'TA2I3P', 'DMOAFA', 37, 58, 'in the tally software which one of the following directories stores all data entered by the user?', 'bin', 'sub', 'data', 'database', 'data'),
(87, 'TA2I3P', 'DMOAFA', 37, 58, 'the shortcut key is used to select company in tally is:', 'alt+F1', 'alt+f3', 'f1', 'f4', 'f1'),
(88, 'TA2I3P', 'DMOAFA', 37, 58, 'the submenu available for voucher entry in tally is:', 'account voucher', 'accounts info.', 'vouchers', 'none of them', 'account voucher'),
(89, 'TA2I3P', 'DMOAFA', 37, 58, 'which shortcut is used for calculator in tally', 'ctrl+p', 'ctrl+c', 'ctrl+n', 'ctrl+a', 'ctrl+n'),
(90, 'TA2I3P', 'DMOAFA', 37, 58, 'which shortcut is used to create a new company in tally?', 'ctrl+f3', 'alt+f3', 'ctrl+f4', 'alt+f3', 'alt+f3'),
(94, 'TA2I3P', 'DMOAFA', 37, 58, 'the option used in tally to close opened company is', 'alter company', 'close company', 'shut company', 'exit company', 'shut company'),
(93, 'TA2I3P', 'DMOAFA', 37, 58, 'the option used in tally to close opened company is', 'alter company', 'close company', 'shut company', 'exit company', 'shut company'),
(95, 'ENG5UI', 'ENGL89', 26, 60, 'Critical thinking concerns…', 'Determining the cause of our beliefs ', ' Pinpointing the psychological basis of our beliefs', 'Determining the quality of our beliefs', 'Assessing the practical impact of our beliefs', 'Determining the quality of our beliefs '),
(96, 'ENG5UI', 'ENGL89', 26, 60, 'A belief is worth accepting if…', 'We have good reasons to accept it ', 'It is consistent with our needs', ' It has not been proven wrong ', ' It is accepted by our peers ', 'We have good reasons to accept it.'),
(97, 'ENG5UI', 'ENGL89', 26, 60, 'The word critical in critical thinking refers to…', 'A fault-finding attitude', 'Attempts to win an argument ', 'Using careful judgment or judicious evaluation', 'A lack of respect for other people', 'Using careful judgment or judicious evaluation.'),
(98, 'ENG5UI', 'ENGL89', 26, 60, 'According to the text, critical thinking complements…', 'Our prejudices ', ' Our emotions ', 'Peer pressure ', 'Our unconscious desires', 'Our emotions.'),
(99, 'ENG5UI', 'ENGL89', 26, 60, 'A statement is…', ' A question or exclamation ', 'An affirmation of prior beliefs ', 'An assertion that something is or is not the case ', 'An assertion that is neither true nor false', 'An assertion that something is or is not the case.'),
(100, 'NO7YR', 'ENGL65', 26, 61, 'a board of directors refused new proposal? (which word is collective noun?)', 'refused', 'board of directors', 'new', 'proposal', 'board of directors'),
(101, 'NO7YR', 'ENGL65', 26, 61, 'what is reason of his failure in exams? (which word is an abstract noun?)', 'reason', 'failure', 'exams', 'what', 'failure'),
(102, 'NO7YR', 'ENGL65', 26, 61, 'please keep boxes carefully. (which word is a common noun?)', 'boxes', 'please', 'keep', 'carefully', 'boxes'),
(103, 'NO7YR', 'ENGL65', 26, 61, 'Butterflies taste with their legs. (which word is plural noun?)', 'Butterflies', 'taste', 'their', 'with', 'Butterflies'),
(104, 'NO7YR', 'ENGL65', 26, 61, 'you cannot go for playing outside, first do your homework. (which word is a non-count noun?)', 'playing', 'first', 'homework', 'outside', 'homework'),
(110, 'SE4R6T', 'BSW10', 38, 59, 'which poet is considered a national hero in Greece?', 'John Keats', 'Lord Byron', 'solan', 'Sappho', 'Lord Byron'),
(111, 'SE4R6T', 'BSW10', 38, 59, 'which kind of poem is Edward Lear associated with?', 'Nature', 'Epics', 'Sonnets', 'Nonsense', 'Nonsence'),
(112, 'SE4R6T', 'BSW10', 38, 59, 'Rupert Brooke wrote his poetry during which conflicts?', 'Boer war', 'Second world war', 'korean war', 'first world war', 'first world war'),
(113, 'NET8U4', 'DHN', 18, 52, 'A device that convert digital signal to analog signal is -----?', 'packet', 'modem', 'block', 'both A and B', 'modem'),
(114, 'NET8U4', 'DHN', 18, 52, 'Coaxial cable has conductors with -----?', 'equal resistence', 'the same diameter', 'Both A and B', 'a common axis', 'a common axis'),
(115, 'NET8U4', 'DHN', 18, 52, 'The area of coverage of a sattelite radio beam is known as ----?', 'Footprint', 'Circular polarization', 'Beam width', 'Identity', 'Circular polarization'),
(116, 'NET8U4', 'DHN', 18, 52, 'Which of the following is not a guided medium?', 'Twisted pair cable', 'Coaxial cable', 'Fiber obtic cable', 'Atmosphere', 'Atmosphere'),
(117, 'NET8U4', 'DHN', 18, 52, 'In fiber optics, the signal source is ----- waves?', 'light', 'infrared', 'radio', ' very low frequency', 'light'),
(118, 'IS76QR4', 'DGMDP', 18, 40, 'which of the following suffers from write hole problem?', 'RAID 0', 'RAID 1', 'RAID 5', 'RAIDZ', 'RAID 5'),
(119, 'IS76QR4', 'DGMDP', 18, 40, 'if read and write performance is the only crition, which would you choose?', 'RAID 0', 'RAID 1', 'RAID 50', 'RAID 5', 'RAID 0'),
(120, 'IS76QR4', 'DGMDP', 18, 40, 'which one of the following is an invalid RAID level?', 'RAID 10', 'RAID 50', 'RAID 53', 'RAID 80', 'RAID 80'),
(121, 'IS76QR4', 'DGMDP', 18, 40, 'what is the name of raid module in a linux kernel?', 'lvm', 'raidsoft', 'md', 'none of them', 'md'),
(122, 'IS76QR4', 'DGMDP', 18, 40, 'what is the minimum number of disks needed for raid level 5?', '2', '3', '4', '5', '3'),
(123, 'PH7TR4', 'DGMDP', 18, 39, 'to get desaturate option in photoshop, we have to go', 'file menu', 'layer menu', 'image>adjustment', 'none of them', 'image>adjustment'),
(124, 'PH7TR4', 'DGMDP', 18, 39, 'how many color modes are there in photoshop?', '5', '1', '3', '2', '5'),
(125, 'PH7TR4', 'DGMDP', 18, 39, 'is overlay a layer blending mode in photoshop?', 'yes', 'no', 'both', 'none', 'yes'),
(126, 'PH7TR4', 'DGMDP', 18, 39, 'we can find variation option under filter menu in photoshop.', 'true', 'false', 'none', 'both', 'false'),
(127, 'PH7TR4', 'DGMDP', 18, 39, 'how many types of marquee tool are there in photoshop?', '7', '1', '4', '2', '4'),
(128, 'SQ5YTF', 'DMOA', 18, 46, 'you can add a row using SQL in a database with which of the following?', 'add', 'create', 'insert', 'make', 'insert'),
(129, 'SQ5YTF', 'DMOA', 18, 46, 'the SQL where clause:', 'limits the column data that are returned', 'limits the row data are returned', 'both of them', 'none of them', 'limits the row data are returned'),
(130, 'SQ5YTF', 'DMOA', 18, 46, 'SQL data definition commands make up a(n)____', 'DDL', 'DML', 'HTML', 'XML', 'DDL'),
(131, 'SQ5YTF', 'DMOA', 18, 46, 'the result of a SQL select statement is a(n)________', 'report', 'form', 'file', 'table', 'table'),
(132, 'SQ5YTF', 'DMOA', 18, 46, 'to remove duplicate rows from the results of an SQL select statement, the ____________ qualifier specified must be included', 'ONLY', 'UNIQUE', 'DISTINCT', 'SINGLE', 'DISTINCT'),
(133, 'ELC4R5T', 'DHN', 21, 50, 'choose the below option in terms of ascending order of band gap energy', 'diamond, graphite, silicon', 'graphite, silicon, diamond', 'silicon, graphite, diamond', 'silicon, diamond, graphite', 'graphite, silicon, diamond'),
(134, 'ELC4R5T', 'DHN', 21, 50, 'band gap energy for silicon and germanium at room temperature(300 Kelvin) are _________ and __________ respectively:-', '56eV,1.1eV', '72eV,1.2eV', '1eV,0.72eV', '1eV,0.56eV', '1eV,0.72eV'),
(135, 'ELC4R5T', 'DHN', 21, 50, 'transport of charge carriers in semiconductor is achieved through:-', 'conduction and diffusion', 'conduction', 'diffusion', 'none of them', 'conduction and diffusion'),
(136, 'ELC4R5T', 'DHN', 21, 50, 'which metal among these is widely used as a recombination agent by semiconductor manufactures to obtain desired carrier lifetime of charge carriers?', 'silver', 'gold', 'iron', 'aluminium', 'gold'),
(137, 'ELC4R5T', 'DHN', 21, 50, 'formation of a junction  between a sample of P-type and N-type material causes ____________ action', 'rectifying', 'conducting', 'insulating', 'none of them', 'rectifying'),
(138, 'HT56R4', 'DHN', 21, 51, 'from what loction are the 1st computer instructions available on boot up?', 'rom bios', 'cpu', 'boot.ini', 'config.sys', 'rom bios'),
(139, 'HT56R4', 'DHN', 21, 51, 'what could cause a fixed disk error.', 'no-CD installed', 'bad ram ', 'slow processor', 'incorrect cmos setting', 'incorrect cmos setting'),
(140, 'HT56R4', 'DHN', 21, 51, 'missing slot covers on a computer can cause?', 'over heat', 'power surge', 'emi', 'incomplete path for esd', 'over heat'),
(141, 'HT56R4', 'DHN', 21, 51, 'when installing pci nics you can check the irq availability by looking at', 'dip switches', 'config.sys', 'jumper settings', 'motherboard bios', 'motherboard bios'),
(142, 'HT56R4', 'DHN', 21, 51, 'which motherboard form factor uses one 20 pin connector', 'atx', 'at', 'baby at', 'all of the above', 'atx'),
(143, 'DD4ERT', 'DGMDP', 19, 41, 'how many sites can you define with one copy of dreamweaver installed on your computer?', 'unlimited', '2', '10', '999', 'unlimited'),
(144, 'DD4ERT', 'DGMDP', 19, 41, 'which of the following is not a style', 'linked', 'embedded', 'inline', 'ortogonal', 'ortogonal'),
(145, 'DD4ERT', 'DGMDP', 19, 41, 'which of the following is not supported by older browsers', 'css', 'layers', 'frames', 'all of the above', 'all of the above'),
(146, 'DD4ERT', 'DGMDP', 19, 41, 'which of the following is the html tag to start a heading level 3?', '<h3>', '</h3>', '<#h3>', '<h3/>', '<h3>'),
(147, 'EXT4E3', 'DMOA', 19, 43, 'what is the insertion of a column and row on a worksheet called?', 'column', 'value', 'address', 'cell', 'cell'),
(148, 'EXT4E3', 'DMOA', 19, 43, 'what type of chart is useful for comparing values over categories', 'pie chart', 'column chart', 'line chart', 'dot graph', 'column chart'),
(149, 'EXT4E3', 'DMOA', 19, 43, 'which function in excel tells how many numeric entries are there?', 'num', 'count', 'sum', 'chksum', 'count'),
(150, 'EXT4E3', 'DMOA', 19, 43, 'a feature that displays only the data in column (s) according to specified criteria', 'formula', 'sorting', 'filtering', 'pivot', 'filtering'),
(151, 'EXT4E3', 'DMOA', 19, 43, 'statistical calculations and preparation of tables and graphs can be done using ', 'photoshop', 'excel', 'notepad', 'power point', 'excel'),
(152, 'PW34RT', 'DMOA', 19, 44, 'in microsoft power point good design determines', 'credibility', 'first impression', 'readability', 'all the above', 'all the above'),
(153, 'PW34RT', 'DMOA', 19, 44, 'which command brings you to the first slide in your presentation?', 'new slide button', 'page up', 'ctrl+home', 'ctrl+end', 'ctrl+home'),
(154, 'PW34RT', 'DMOA', 19, 44, 'in ms power point to add a header or footer to your handout, you can use', 'the title master', 'the slide master', 'the handout master', 'all the above', 'the handout master'),
(155, 'PW34RT', 'DMOA', 19, 44, 'in ms power point the following will not advance the slides in aslide show view', 'esc key', 'the spacebar', 'the enter key', 'the mouse button', 'esc key'),
(156, 'PW34RT', 'DMOA', 19, 44, 'in ms power point the following is the default page setup orientation for notes pages, outlines and hangouts', 'vertical', 'landscape', 'portrait', 'none of them', 'portrait'),
(157, 'WOD456W', 'DMOA', 19, 42, 'how many steps are there on mail merger', '5', '6', '7', '8', '8'),
(158, 'WOD456W', 'DMOA', 19, 42, 'which menu contains the option of bullets and numbering', 'insert', 'format', 'tools', 'view', 'format'),
(159, 'WOD456W', 'DMOA', 19, 42, 'what is the shortcut key to break the line', 'ctrl+enter', 'alt+enter', 'shift+enter', 'space+enter', 'shift+enter'),
(160, 'WOD456W', 'DMOA', 19, 42, 'how many types of summaries can we create in :auto summarize option" in ms word', '3', '4', '5', '6', '4'),
(161, 'WOD456W', 'DMOA', 19, 42, 'the maximum number of characters in the file name created in ms windows can be', '256', '255', '8', '11', '255'),
(162, '501', 'DHN', 42, 50, 'what is ea?', 'ww', 'ss', 'dd', 'dd', 'ss'),
(163, '501', 'DHN', 42, 50, 'what is ss?', 'dd', 'fd', 'dd', 'ggg', 'ggg'),
(164, '11', 'DHN', 44, 52, 'what is this', 'dsds', 'dc', 'sd', 'dfsd', 'dc'),
(165, '11', 'DHN', 44, 52, 'what is that', 'fs', 'dc', 'fdg', 'g', 'g'),
(166, '50', 'DHN', 42, 51, 'what is this', 'fdg', 'fg', 'gf', 'fd', 'fd'),
(167, '50', 'DHN', 42, 51, 'what is that', 'sf', 'fs', 'f', 'hh', 'f'),
(168, '50', 'DHN', 42, 51, 'esd', 'd', 'e', 'r', 't', 't'),
(169, '50', 'DHN', 42, 51, 'fff', 'f', 'rr', 'rrr', 'fdd', 'rr'),
(170, '50', 'DHN', 42, 51, 'dfgsdgsd', 'fddf', 'fd', 'gg', 'o', 'o'),
(171, '5', 'ENGL89', 45, 60, 'what is this', 'f', 'fd', 'gf', 'dd', 'dd'),
(172, '5', 'ENGL89', 45, 60, 'dfgsdgsd', 'g', 'gh', 'hf', 'fh', 'g'),
(173, '5', 'ENGL89', 45, 60, 'gfhdgff', 'te', 'tyy', 'yyre', 'tdgf', 'te'),
(174, '5', 'ENGL89', 45, 60, 'hgdndfghgf', 'gh', 'hhf', 'fd', 'fgnbv', 'gh'),
(175, '5', 'ENGL89', 45, 60, 'fvzvcx', 'fzvcx', 'fdz', 'sdfffffff', 'q', 'q'),
(176, '5', 'ENGL89', 45, 60, 'trdsssssssss', 'yr', 'tf', 'th', 'h', 'h');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(150) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `course_id` varchar(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(10) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `city` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `due` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `fullname`, `dept_id`, `course_id`, `username`, `password`, `gender`, `email`, `contactno`, `city`, `image`, `due`, `status`) VALUES
(27, 'Ameen  U C', 9, 'DGMDP', 'amee', 'amee', 'Female', 'amm@gmail.com', '0486227780', 'Kottayam', 'uploads/images (2).jpg', 'no', 0),
(54, 'gopal prakash', 9, 'DHN', 'Gopal', 'gopal', 'Male', 'g@gmail.com', '7876786567', 'Kottayam', 'uploads/download.jfif', 'no', 0),
(51, 'muneer', 9, 'DGMDP', 'muneer', 'muneer', 'Male', 'muna@gmail.com', '9946781542', 'Alapuzha', 'uploads/23.jpg', 'no', 0),
(55, 'David John', 9, 'DGMDP', 'david', 'david', 'Male', 'david@gmail.com', '9874563210', 'Palakkad', 'uploads/_MG_3355-01.jpeg.jpg', 'no', 0),
(56, 'Bino v george', 9, 'DHN', 'bino', 'bino', 'Male', 'bino@gmail.com', '8978767898', 'Kottayam', 'uploads/_MG_3355-01.jpeg.jpg', 'no', 0),
(57, 'lal', 11, 'ENGL89', 'lal', 'lal', 'Male', 'peter.jamesmar@gmail.com', '9874562211', 'Kottayam', 'uploads/teach.png', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(150) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `dept_id`, `course_id`, `subject_code`, `subject_title`) VALUES
(46, 9, 'DMOA', '305', 'MS SQL'),
(47, 9, ' DMCP', '401', 'C programming'),
(45, 9, 'DMOA', '304', 'Open Office'),
(43, 9, 'DMOA', '302', 'MS Excel 2013 & XP using ISM'),
(44, 9, 'DMOA', '303', 'MS Power Point 2013 using ISM'),
(42, 9, 'DMOA', '301', 'MS Word 2013 & XP using ISM'),
(41, 9, 'DGMDP', '203', 'Design and Animation - Dream weaver'),
(40, 9, 'DGMDP', '202', 'ISM-Soft'),
(39, 9, 'DGMDP', '201', 'Adobe Photoshop '),
(38, 9, 'DMCA', '102', 'VB.Net'),
(36, 9, 'DMCA', '101', 'MS SQL'),
(48, 9, ' DMCP', '402', 'Cpp'),
(49, 9, ' DMCP', '403', 'Java Programming'),
(50, 9, 'DHN', '501', 'Basic Electronics'),
(51, 9, 'DHN', '502', 'Hardware Maintenance'),
(52, 9, 'DHN', '503', 'Networking'),
(53, 10, 'DECom', '601', 'Digital Signature '),
(54, 10, 'DECom', '602', 'Network security '),
(55, 10, 'DECom', '603', 'Existing business and channels '),
(56, 10, 'DMOAFA', '701', 'Windows OS '),
(57, 10, 'DMOAFA', '702', 'ISM'),
(58, 10, 'DMOAFA', '703', 'TALLY ERP 9'),
(60, 11, 'ENGL89', 'ENG457N', 'CRITICAL THINKING AND CRITICAL LEARNING'),
(61, 11, 'ENGL65', '84SMENG', 'SIMPLE NOUNS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE IF NOT EXISTS `tbl_teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `middlename` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `student_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `dept_id`, `username`, `password`, `firstname`, `lastname`, `middlename`, `email`, `student_id`, `image`) VALUES
(23, 10, 'ubais', 'ubais', 'Mr. Ubais', 'S', 'C', 'ubai@gmail.com', 0, 'uploads/images (7).jpg'),
(37, 10, 'ebin', 'ebin', 'Ebin', 'joseph', 'k', 'ebin@gmail.com', 0, 'uploads/images (1).jpg'),
(21, 9, 'sneha', 'sneha', 'Mrs.Sneha', 'Babu', 'p', 'sneha@gmail.com', 0, 'uploads/images (13).jpg'),
(20, 9, 'athu', 'athu', 'Mrs.Athulya', 'S', 'Tom', 'athu@gmail.com', 0, 'uploads/images (2).jpg'),
(18, 9, 'rasiya', 'rasiya', 'Mrs.Rasiya ', 'H', 'K', 'rasi@gmail.com', 0, 'uploads/imagemagic.jpg'),
(19, 9, 'divya', 'divya', 'Mrs.Divya', 'G', 'S', 'divu@gmail.com', 0, 'uploads/beautiful-flowers.jpg'),
(26, 11, 'james ', '123', 'James', 'JOSEPH', 'k', 'james@gmail.com', 0, 'uploads/images (2).jpg'),
(42, 9, 'Dan', 'dan', 'dan', 'joseph', 'm', 'd@gmail.com', 0, 'uploads/download.jfif'),
(43, 9, 'john', 'john', 'John', 'Joseph', 'Elias', 'john@gmail.com', 0, 'uploads/WhatsApp Image 2020-02-24 at 1.17.25 PM.jpeg'),
(44, 9, 'manu', 'manu', 'manu', 'm', 'd', 'ananthakrishna.ofc1@gmail.com', 0, 'uploads/stud.png'),
(45, 11, 'abin', 'abin', 'abin', 'v', 'v', 'abin@gmail.com', 0, 'uploads/teach.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_teacher_subject` (
  `teacher_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_subject_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `tbl_teacher_subject`
--

INSERT INTO `tbl_teacher_subject` (`teacher_subject_id`, `teacher_id`, `course_id`, `subject_id`) VALUES
(26, 19, 'DMCA', 36),
(27, 19, 'DGMDP', 41),
(28, 19, 'DMOA', 46),
(29, 19, ' DMCP', 48),
(30, 19, 'DHN', 52),
(31, 18, 'DMCA', 38),
(32, 18, 'DGMDP', 40),
(33, 18, 'DMOA', 45),
(34, 18, 'DMOA', 43),
(35, 18, ' DMCP', 49),
(36, 18, 'DHN', 50),
(37, 22, 'DECom', 53),
(38, 22, 'DECom', 54),
(39, 22, 'DMOAFA', 57),
(40, 23, 'DECom', 55),
(41, 23, 'DECom', 53),
(42, 23, 'DECom', 54),
(46, 20, 'DHN', 51),
(44, 23, 'DMOAFA', 58),
(45, 23, 'DMOAFA', 57),
(47, 20, ' DMCP', 48),
(48, 20, ' DMCP', 47),
(49, 18, 'DHN', 52),
(50, 18, 'DMOA', 46),
(51, 24, 'ENGL89', 60),
(53, 32, 'ENGL89', 60),
(54, 21, 'DMCA', 36),
(55, 18, 'DGMDP', 39),
(57, 19, 'DMCA', 38),
(58, 19, 'DMOA', 43),
(59, 19, 'DMOA', 44),
(60, 19, 'DMOA', 42),
(61, 26, 'ENGL89', 60),
(78, 26, 'ENGL65', 61),
(63, 22, 'DECom', 55),
(64, 22, 'DMOAFA', 56),
(65, 22, 'DMOAFA', 58),
(66, 21, 'DHN', 50),
(67, 21, 'DHN', 51),
(68, 21, 'DMCA', 38),
(69, 23, '0', 0),
(70, 37, 'DECom', 53),
(71, 37, 'DECom', 55),
(72, 37, 'DMOAFA', 56),
(73, 37, 'DMOAFA', 58),
(74, 38, 'BSW10', 59),
(75, 41, 'ENGL89', 60),
(77, 26, 'ENGL65', 0),
(79, 42, 'DHN', 50),
(80, 42, 'DGMDP', 40),
(81, 43, 'DGMDP', 41),
(82, 44, 'DHN', 52),
(83, 45, 'ENGL89', 60);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE IF NOT EXISTS `tbl_video` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`vid`, `name`, `location`, `teacher_id`, `subject_id`) VALUES
(4, 'file_example_MP4_480_1_5MG.mp4', 'videos/file_example_MP4_480_1_5MG.mp4', 42, 50),
(13, '1280.mp4', 'videos/1280.mp4', 42, 50),
(14, '1280.mp4', 'videos/1280.mp4', 42, 50),
(15, 'WhatsApp Video 2020-05-13 at 1.40.59 AM.mp4', 'videos/WhatsApp Video 2020-05-13 at 1.40.59 AM.mp4', 43, 41),
(16, 'WhatsApp Video 2020-05-13 at 1.40.59 AM.mp4', 'videos/WhatsApp Video 2020-05-13 at 1.40.59 AM.mp4', 42, 50),
(17, 'videoplayback.mp4', 'videos/videoplayback.mp4', 42, 50),
(18, 'video-output-B16BF20D-DEA5-429A-A5AD-6E398FD1D7B9-1.MOV', 'videos/video-output-B16BF20D-DEA5-429A-A5AD-6E398FD1D7B9-1.MOV', 44, 52),
(19, 'videoplayback.mp4', 'videos/videoplayback.mp4', 44, 52),
(20, '2019-11-11-211734767.mp4', 'videos/2019-11-11-211734767.mp4', 45, 60);

-- --------------------------------------------------------

--
-- Table structure for table `user_mailbox`
--

CREATE TABLE IF NOT EXISTS `user_mailbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `mailbox` varchar(100) NOT NULL,
  `message_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_mailbox`
--

