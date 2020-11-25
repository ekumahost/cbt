-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2020 at 09:45 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbtugarsoft_cbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `cbt_exams`
--

CREATE TABLE `cbt_exams` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `total_question` int(11) NOT NULL,
  `staff` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `grade` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=active, 2 =complete',
  `graded` tinyint(1) NOT NULL DEFAULT 0,
  `synchronised` int(11) NOT NULL DEFAULT 0,
  `year` int(11) NOT NULL,
  `term` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbt_exams`
--

INSERT INTO `cbt_exams` (`id`, `name`, `type`, `subject`, `total_question`, `staff`, `duration`, `date`, `grade`, `status`, `graded`, `synchronised`, `year`, `term`) VALUES
(1, 'ND General Exam ', 1, 2, 5, 12, 70, '2018-12-01 00:00:00', 1, 2, 1, 0, 3, 1),
(2, 'QUESTRA CBT Presentation Exam', 1, 3, 10, 12, 125, '2017-05-12 00:00:00', 1, 1, 0, 0, 3, 1),
(3, 'First Semester Test For Regular Students', 1, 2, 5, 12, 10, '2017-05-12 00:00:00', 1, 0, 0, 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cbt_exams_type`
--

CREATE TABLE `cbt_exams_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbt_exams_type`
--

INSERT INTO `cbt_exams_type` (`id`, `name`, `status`) VALUES
(1, 'Objective Test\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cbt_subjects`
--

CREATE TABLE `cbt_subjects` (
  `id` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `question_table` varchar(100) NOT NULL,
  `answer_table` varchar(100) NOT NULL,
  `grade` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbt_subjects`
--

INSERT INTO `cbt_subjects` (`id`, `subject`, `question_table`, `answer_table`, `grade`, `status`) VALUES
(1, 10, '_new_question_1494335095', '_new_answer_1494335095', 1, 1),
(2, 8, '_new_question_1494335160', '_new_answer_1494335160', 1, 1),
(3, 1, '_new_question_1494409240', '_new_answer_1494409240', 1, 1),
(4, 7, '_new_question_1494409249', '_new_answer_1494409249', 1, 1),
(5, 14, '_new_question_1494409262', '_new_answer_1494409262', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cbt_subscription`
--

CREATE TABLE `cbt_subscription` (
  `id` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `exam_start_time` varchar(50) NOT NULL DEFAULT '0000000000',
  `exam_end_time` varchar(50) NOT NULL DEFAULT '0000000000',
  `score` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `submit_paper_time` varchar(50) NOT NULL DEFAULT '0000000000',
  `user_ip` varchar(50) NOT NULL DEFAULT '0.0.0.0',
  `online` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '2=submited, 1= student can take exam, 0 pending payment and not allowd'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbt_subscription`
--

INSERT INTO `cbt_subscription` (`id`, `exam`, `student`, `exam_start_time`, `exam_end_time`, `score`, `position`, `submit_paper_time`, `user_ip`, `online`, `status`) VALUES
(1, 1, 1, '1494348670', '1494352870', 3, 1, '1494349553', '127.0.0.1', 0, 2),
(2, 1, 2, '1494401984', '1494406184', 1, 2, '1494402950', '127.0.0.1', 0, 2),
(4, 1, 3, '1494407079', '1494411279', 0, 3, '1494407500', '127.0.0.1', 0, 2),
(5, 2, 1, '1494413067', '1494420567', 3, 1, '1494414651', '127.0.0.1', 0, 2),
(6, 2, 3, '1494523476', '1494530976', 0, 0, '1494523549', '127.0.0.1', 0, 2),
(7, 2, 2, '1494585719', '1494593219', 0, 0, '1494585753', '127.0.0.1', 0, 2),
(8, 2, 4, '1497524329', '1497531829', 0, 0, '0000000000', '127.0.0.1', 1, 1),
(9, 2, 5, '1497525831', '1497533331', 0, 0, '1497525875', '127.0.0.1', 0, 2),
(10, 2, 6, '1500882629', '1500890129', 0, 0, '0000000000', '127.0.0.1', 1, 1),
(11, 2, 7, '1500892766', '1500900266', 0, 0, '0000000000', '127.0.0.1', 1, 1),
(12, 2, 8, '1502191196', '1502198696', 0, 0, '0000000000', '127.0.0.1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` char(2) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
('AD', 'Andorra'),
('AE', 'United Arab Emirates'),
('AF', 'Afghanistan'),
('AG', 'Antigua and Barbuda'),
('AI', 'Anguilla'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AN', 'Netherlands Antilles'),
('AO', 'Angola'),
('AR', 'Argentina'),
('AS', 'American Samoa'),
('AT', 'Austria'),
('AU', 'Australia'),
('AW', 'Aruba'),
('AX', 'Aland Islands'),
('AZ', 'Azerbaijan'),
('BA', 'Bosnia and Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Belgium'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahrain'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BM', 'Bermuda'),
('BN', 'Brunei Darussalam'),
('BO', 'Bolivia'),
('BR', 'Brazil'),
('BS', 'Bahamas'),
('BT', 'Bhutan'),
('BV', 'Bouvet Island'),
('BW', 'Botswana'),
('BY', 'Belarus'),
('BZ', 'Belize'),
('CA', 'Canada'),
('CC', 'Cocos (Keeling) Islands'),
('CD', 'Democratic Republic of the Congo'),
('CF', 'Central African Republic'),
('CG', 'Congo'),
('CH', 'Switzerland'),
('CI', 'Cote D\'Ivoire'),
('CK', 'Cook Islands'),
('CL', 'Chile'),
('CM', 'Cameroon'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CS', 'Serbia and Montenegro'),
('CU', 'Cuba'),
('CV', 'Cape Verde'),
('CX', 'Christmas Island'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DE', 'Germany'),
('DJ', 'Djibouti'),
('DK', 'Denmark'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('DZ', 'Algeria'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egypt'),
('EH', 'Western Sahara'),
('ER', 'Eritrea'),
('ES', 'Spain'),
('ET', 'Ethiopia'),
('EU', 'European Union'),
('FI', 'Finland'),
('FJ', 'Fiji'),
('FK', 'Falkland Islands'),
('FM', 'Federated States of Micronesia'),
('FO', 'Faroe Islands'),
('FR', 'France'),
('GA', 'Gabon'),
('GB', 'Great Britain'),
('GD', 'Grenada'),
('GE', 'Georgia'),
('GF', 'French Guiana'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GL', 'Greenland'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GP', 'Guadeloupe'),
('GQ', 'Equatorial Guinea'),
('GR', 'Greece'),
('GS', 'S. Georgia and S. Sandwich Islands'),
('GT', 'Guatemala'),
('GU', 'Guam'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HK', 'Hong Kong'),
('HM', 'Heard Island and McDonald Islands'),
('HN', 'Honduras'),
('HR', 'Croatia (Hrvatska)'),
('HT', 'Haiti'),
('HU', 'Hungary'),
('ID', 'Indonesia'),
('IE', 'Ireland'),
('IL', 'Israel'),
('IN', 'India'),
('IO', 'British Indian Ocean Territory'),
('IQ', 'Iraq'),
('IR', 'Iran'),
('IS', 'Iceland'),
('IT', 'Italy'),
('JM', 'Jamaica'),
('JO', 'Jordan'),
('JP', 'Japan'),
('KE', 'Kenya'),
('KG', 'Kyrgyzstan'),
('KH', 'Cambodia'),
('KI', 'Kiribati'),
('KM', 'Comoros'),
('KN', 'Saint Kitts and Nevis'),
('KP', 'Korea (North)'),
('KR', 'Korea (South)'),
('KW', 'Kuwait'),
('KY', 'Cayman Islands'),
('KZ', 'Kazakhstan'),
('LA', 'Laos'),
('LB', 'Lebanon'),
('LC', 'Saint Lucia'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('LY', 'Libya'),
('MA', 'Morocco'),
('MC', 'Monaco'),
('MD', 'Moldova'),
('MG', 'Madagascar'),
('MH', 'Marshall Islands'),
('MK', 'Macedonia'),
('ML', 'Mali'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MO', 'Macao'),
('MP', 'Northern Mariana Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MS', 'Montserrat'),
('MT', 'Malta'),
('MU', 'Mauritius'),
('MV', 'Maldives'),
('MW', 'Malawi'),
('MX', 'Mexico'),
('MY', 'Malaysia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NC', 'New Caledonia'),
('NE', 'Niger'),
('NF', 'Norfolk Island'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'Netherlands'),
('NO', 'Norway'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NU', 'Niue'),
('NZ', 'New Zealand (Aotearoa)'),
('OM', 'Oman'),
('PA', 'Panama'),
('PE', 'Peru'),
('PF', 'French Polynesia'),
('PG', 'Papua New Guinea'),
('PH', 'Philippines'),
('PK', 'Pakistan'),
('PL', 'Poland'),
('PM', 'Saint Pierre and Miquelon'),
('PN', 'Pitcairn'),
('PR', 'Puerto Rico'),
('PS', 'Palestinian Territory'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('SA', 'Saudi Arabia'),
('SB', 'Solomon Islands'),
('SC', 'Seychelles'),
('SD', 'Sudan'),
('SE', 'Sweden'),
('SG', 'Singapore'),
('SH', 'Saint Helena'),
('SI', 'Slovenia'),
('SJ', 'Svalbard and Jan Mayen'),
('SK', 'Slovakia'),
('SL', 'Sierra Leone'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Suriname'),
('ST', 'Sao Tome and Principe'),
('SU', 'USSR (former)'),
('SV', 'El Salvador'),
('SY', 'Syria'),
('SZ', 'Swaziland'),
('TC', 'Turks and Caicos Islands'),
('TD', 'Chad'),
('TF', 'French Southern Territories'),
('TG', 'Togo'),
('TH', 'Thailand'),
('TJ', 'Tajikistan'),
('TK', 'Tokelau'),
('TL', 'Timor-Leste'),
('TM', 'Turkmenistan'),
('TN', 'Tunisia'),
('TO', 'Tonga'),
('TP', 'East Timor'),
('TR', 'Turkey'),
('TT', 'Trinidad and Tobago'),
('TV', 'Tuvalu'),
('TW', 'Taiwan'),
('TZ', 'Tanzania'),
('UA', 'Ukraine'),
('UG', 'Uganda'),
('UK', 'United Kingdom'),
('UM', 'United States Minor Outlying Islands'),
('US', 'United States'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VA', 'Vatican City State'),
('VC', 'Saint Vincent and the Grenadines'),
('VE', 'Venezuela'),
('VG', 'Virgin Islands (UK)'),
('VI', 'Virgin Islands (US)'),
('VN', 'Viet Nam'),
('VU', 'Vanuatu'),
('WF', 'Wallis and Futuna'),
('WS', 'Samoa'),
('YE', 'Yemen'),
('YT', 'Mayotte'),
('ZA', 'South Africa'),
('ZM', 'Zambia'),
('ZR', 'Zaire'),
('ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `dropcognitive_domain`
--

CREATE TABLE `dropcognitive_domain` (
  `id` int(3) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dropcognitive_domain`
--

INSERT INTO `dropcognitive_domain` (`id`, `value`) VALUES
(1, 'Neatness'),
(2, 'Puntuality'),
(3, 'Attitude to Property'),
(4, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `dropgrades_domain`
--

CREATE TABLE `dropgrades_domain` (
  `grades_domain_id` tinyint(1) NOT NULL,
  `grades_domain_desc` varchar(20) NOT NULL,
  `grades_domain_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dropgrades_domain`
--

INSERT INTO `dropgrades_domain` (`grades_domain_id`, `grades_domain_desc`, `grades_domain_status`) VALUES
(4, 'Jambites', 1),
(2, 'Post graduate', 1),
(3, 'Sandwidtch', 1),
(1, 'Undergraduates', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ethnicity`
--

CREATE TABLE `ethnicity` (
  `ethnicity_id` int(3) NOT NULL,
  `ethnicity_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ethnicity`
--

INSERT INTO `ethnicity` (`ethnicity_id`, `ethnicity_desc`) VALUES
(1, 'Abua'),
(2, 'Andoni'),
(3, 'Badenchi'),
(4, 'Efik'),
(5, 'Esako'),
(6, 'Esan(Ishan)'),
(7, 'Fulani'),
(8, 'Hausa'),
(9, 'Ibani'),
(10, 'Ibibio (Ibeno)'),
(11, 'Idoma'),
(12, 'Igbo'),
(13, 'Igede'),
(14, 'Ijaw'),
(15, 'Ijebu'),
(16, 'Ijesa'),
(17, 'Ikwere'),
(18, 'Isekiri'),
(19, 'Isoko'),
(20, 'Junkun'),
(21, 'kafa'),
(22, 'Kalabari'),
(23, 'kanuri'),
(24, 'Kwale'),
(25, 'Mbe'),
(26, 'Nupe'),
(27, 'Ogoni'),
(28, 'Okpe'),
(29, 'Okriki'),
(30, 'Opobo'),
(31, 'Owan'),
(32, 'TIV'),
(33, 'Urhobo'),
(34, 'Yewa'),
(35, 'Yoruba'),
(36, 'Ughelli'),
(37, 'Eggon'),
(38, 'Agbo'),
(39, 'Akaju-Ndem'),
(40, 'Amo'),
(41, 'Anaguta'),
(42, 'Bachama'),
(43, 'Banso (Panso)'),
(44, 'Baruba (Barba)'),
(45, 'Bassa'),
(46, 'Baushi'),
(47, 'Bette'),
(48, 'Bini'),
(49, 'Bobua'),
(50, 'Bunu'),
(51, 'Buru'),
(52, 'Buli (Buji)'),
(53, 'Challa'),
(54, 'Chibok (Chibbak)'),
(55, 'Daba'),
(56, 'Dakarkari'),
(57, 'Degema'),
(58, 'Deno (Denawa)'),
(59, 'Diba'),
(60, 'Ebu'),
(61, 'Egun'),
(62, 'Ejagham'),
(63, 'Etsako'),
(64, 'Etuno'),
(65, 'Gade'),
(66, 'Gombi'),
(67, 'Gonia'),
(68, 'Gude (Gudu)'),
(69, 'Gwa (Gurawa)'),
(70, 'Gwom'),
(71, 'Jaku (Jara)'),
(72, 'Kadara (Kafanchan)'),
(73, 'Kajuru (Kajurawa)'),
(74, 'Kantana'),
(75, 'Kariya'),
(76, 'Kenern (Koenoem)'),
(77, 'Kiballo (Kiwollo)'),
(78, 'Kugama'),
(79, 'Kulere (Kaler)'),
(80, 'Kwaro'),
(81, 'Limono'),
(82, 'Mambilla'),
(83, 'Mama'),
(84, 'Mbembe'),
(85, 'Mbula'),
(86, 'Mbum'),
(87, 'Miango'),
(88, 'Miya (Miyawa)'),
(89, 'Nunku'),
(90, 'Njayi'),
(91, 'Ngamo'),
(92, 'Mushere'),
(93, 'Ogori'),
(94, 'Olulumo'),
(95, 'Owan'),
(96, 'Oworo (Owe)'),
(97, 'Pkanzom (Poll)'),
(98, 'Polchi Habe'),
(99, 'Rindire (Rendre)'),
(100, 'Rubu'),
(101, 'Rumada (Rumaya)'),
(102, 'Segidi (Sigidawa)'),
(103, 'Shomo'),
(104, 'Shuwa'),
(105, 'Sura'),
(106, 'Teshena (Teshenawa)'),
(107, 'Tula'),
(108, 'Zzz - Not Listed'),
(109, 'Ika');

-- --------------------------------------------------------

--
-- Table structure for table `exams_types`
--

CREATE TABLE `exams_types` (
  `exams_types_id` int(11) UNSIGNED NOT NULL,
  `exams_types_desc` varchar(50) DEFAULT NULL COMMENT 'good boy'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams_types`
--

INSERT INTO `exams_types` (`exams_types_id`, `exams_types_desc`) VALUES
(1, 'Examination'),
(4, 'POST UTME'),
(2, 'Test 1'),
(3, 'Test 2');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grades_id` int(8) UNSIGNED NOT NULL,
  `grades_desc` varchar(20) NOT NULL DEFAULT '',
  `grades_active` tinyint(1) NOT NULL DEFAULT 1,
  `grades_domain` int(3) NOT NULL COMMENT 'connnect to tbl grade_domain'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='static table';

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grades_id`, `grades_desc`, `grades_active`, `grades_domain`) VALUES
(1, 'First Year', 1, 1),
(2, 'Second Year', 1, 1),
(3, 'Third Year', 1, 1),
(4, 'Fourth Year', 1, 1),
(5, 'Others', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `grade_history_primary`
--

CREATE TABLE `grade_history_primary` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_type` tinyint(2) NOT NULL,
  `student` int(8) NOT NULL,
  `year` int(3) NOT NULL,
  `quarter` int(3) NOT NULL COMMENT 'Semester or term',
  `course_code` int(2) NOT NULL,
  `ca_score1` int(2) NOT NULL,
  `ca_score2` int(2) NOT NULL,
  `exam_score` int(2) NOT NULL,
  `level_taken` int(3) NOT NULL,
  `date` varchar(30) NOT NULL,
  `aprove` int(1) NOT NULL COMMENT 'is it aproved by form master',
  `notes` varchar(50) NOT NULL,
  `user` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='In this table, grade_history_primary_user is the Teacher name.';

-- --------------------------------------------------------

--
-- Table structure for table `grade_subjects`
--

CREATE TABLE `grade_subjects` (
  `grade_subject_id` int(8) NOT NULL,
  `grade_subject_desc` varchar(200) NOT NULL DEFAULT '',
  `grade` int(3) NOT NULL,
  `describe` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='storing subject names';

--
-- Dumping data for table `grade_subjects`
--

INSERT INTO `grade_subjects` (`grade_subject_id`, `grade_subject_desc`, `grade`, `describe`, `code`) VALUES
(1, 'Morphology and Physiology of living things [STB 112 ]', 1, '', ''),
(2, 'General and Physical Chemistry [BCH 111]', 1, '', 'BCH 111'),
(3, 'Mechanics and properties of matter [BPH 111]', 1, '', 'BPH 111'),
(4, 'Introduction to statistics [STA 111]', 1, '', 'STA 111'),
(5, 'Logic and Linear Algebra [MTH 111]', 1, '', 'MTH 111'),
(6, 'Introduction to dental technology [DTE 111]', 1, '', 'DTE 111'),
(7, 'Primary Health Care [DTH 112]', 1, '', 'DTH 112'),
(8, 'Communication in English I [GNS 102]', 1, '', 'GNS 102'),
(9, 'Biological Techniques II [STB 318]', 2, '', 'STB 318'),
(10, 'ComputerResearch Methodology [NUD 435]', 2, '', 'NUD 435'),
(11, 'Complete Denture Prosthetics III [DTE 411]', 0, '', 'DTE 411'),
(12, 'Orthodontic Technology II [DTE 412]', 0, '', 'DTE 412'),
(13, 'Metallic Prosthodontics Dentures I [DTE 413]', 0, '', 'DTE 413'),
(14, 'Science of Dental Materials III [DTE 414]', 0, '', 'DTE 414'),
(15, 'Professional Ethics and Jurisprudence [DTE 415]', 0, '', 'DTE 415'),
(16, 'Use of English III [GNS 301]', 0, '', 'GNS 301');

-- --------------------------------------------------------

--
-- Table structure for table `grade_terms`
--

CREATE TABLE `grade_terms` (
  `grade_terms_id` int(1) NOT NULL,
  `grade_terms_desc` varchar(40) NOT NULL DEFAULT '',
  `current` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_terms`
--

INSERT INTO `grade_terms` (`grade_terms_id`, `grade_terms_desc`, `current`) VALUES
(1, 'First Semester', 1),
(2, 'Second Semester', 0),
(3, 'Others', 0);

-- --------------------------------------------------------

--
-- Table structure for table `school_years`
--

CREATE TABLE `school_years` (
  `school_years_id` int(4) UNSIGNED NOT NULL,
  `school_years_desc` varchar(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_years`
--

INSERT INTO `school_years` (`school_years_id`, `school_years_desc`) VALUES
(1, '2015/2016 '),
(2, '2016/2017 '),
(3, '2017/2018 '),
(4, '2018/2019 '),
(5, '2019/2020 '),
(6, '2020/2021 '),
(7, '2021/2022 ');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(8) UNSIGNED NOT NULL,
  `staff_fname` varchar(30) DEFAULT NULL,
  `staff_lname` varchar(30) DEFAULT NULL,
  `staff_mi` varchar(5) DEFAULT NULL,
  `staff_school` int(10) UNSIGNED DEFAULT 0 COMMENT 'select from tbl_school_domain, or set=0(select from tbl_config)',
  `staff_email` varchar(60) DEFAULT NULL,
  `staff_title` int(10) UNSIGNED DEFAULT NULL,
  `staff_status` int(2) NOT NULL COMMENT '0= not aproved, 1 = approved, 2 = Retired',
  `staff_country` varchar(5) NOT NULL,
  `staff_state` varchar(10) NOT NULL COMMENT 'select state name from tbl_state',
  `staff_dob` varchar(30) NOT NULL,
  `staff_mobile` varchar(20) NOT NULL,
  `staff_entry_year` int(9) NOT NULL,
  `staff_adress` varchar(100) NOT NULL,
  `staff_res_town` varchar(50) NOT NULL,
  `staff_res_state` varchar(10) NOT NULL COMMENT 'select from tbl_state',
  `staff_image` text NOT NULL COMMENT '/pictures',
  `staff_bank` varchar(50) NOT NULL COMMENT 'use bank id from bank table',
  `staff_account` varchar(15) NOT NULL,
  `staff_acc_name` varchar(50) NOT NULL,
  `staff_act_type` varchar(15) NOT NULL,
  `staff_bank_sort` varchar(20) NOT NULL COMMENT 'branch sort code',
  `staff_id_no` varchar(20) NOT NULL,
  `staff_sex` varchar(6) NOT NULL,
  `staff_salary_type` int(11) NOT NULL COMMENT 'select from salary ',
  `teaching_type` varchar(20) NOT NULL COMMENT 'to show if corpper or practise',
  `staff_ethnicity` int(10) NOT NULL COMMENT 'select from ethnicity',
  `staff_birth_city` varchar(50) NOT NULL,
  `staff_kin_name` varchar(50) NOT NULL,
  `staff_kin_phone` varchar(20) NOT NULL,
  `staff_kin_email` varchar(100) NOT NULL,
  `staff_kin_adress` varchar(100) NOT NULL,
  `staff_kin_relationship` int(11) NOT NULL COMMENT 'from relationship table',
  `staff_biography` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_fname`, `staff_lname`, `staff_mi`, `staff_school`, `staff_email`, `staff_title`, `staff_status`, `staff_country`, `staff_state`, `staff_dob`, `staff_mobile`, `staff_entry_year`, `staff_adress`, `staff_res_town`, `staff_res_state`, `staff_image`, `staff_bank`, `staff_account`, `staff_acc_name`, `staff_act_type`, `staff_bank_sort`, `staff_id_no`, `staff_sex`, `staff_salary_type`, `teaching_type`, `staff_ethnicity`, `staff_birth_city`, `staff_kin_name`, `staff_kin_phone`, `staff_kin_email`, `staff_kin_adress`, `staff_kin_relationship`, `staff_biography`) VALUES
(12, 'Lauretta', 'Ubah', 'A', 0, 'laurryubah@yahoo.com', 4, 1, 'NG', 'Delta', '31/08/1984', '07088182143', 1, 'Reachman garden estate behind 1st bank Nnebisi road.', 'Asaba', 'Delta', 'uploads/images/myjanee.jpeg', '', '', '', '', '', 'Not Assigned', 'Female', 0, '', 12, 'Ogwashi ukwu', 'Ubah Chika', '09081361805', 'chikaubah1@gmail.com', 'Reachman garden estate behind 1st bank Nnebisi road. Asaba', 23, ''),
(76, 'Sophia', 'Dumbili', NULL, 0, 'precibonn@yahoo.com', NULL, 1, '', '', '', '07068213919', 1, '3,emma chidi lane,okpanam', '', '', '', '', '', '', '', '', 'Not Assigned', 'Female', 0, '', 0, '', '', '', '', '', 0, ''),
(77, 'Fortune', 'Osemiha', 'Emman', 0, 'fortune.sabastine.@yahoo.com', 5, 1, 'NG', 'Delta', '23/05/1985', '08067281334', 1, 'No.6 Chigozie Street,Opposite St.Brigid Junction,Asaba,Delta State.', 'Asaba', 'Delta', '', '', '', '', '', '', '000', 'Male', 0, '', 108, 'Agbor', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `staff_role`
--

CREATE TABLE `staff_role` (
  `id` int(8) NOT NULL,
  `staff_id` int(8) NOT NULL,
  `liberian` tinyint(1) NOT NULL DEFAULT 0,
  `discipline` tinyint(1) NOT NULL DEFAULT 0,
  `attendance` tinyint(1) NOT NULL DEFAULT 0,
  `health` tinyint(1) NOT NULL DEFAULT 0,
  `receipt` tinyint(1) NOT NULL DEFAULT 0,
  `timetable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_role`
--

INSERT INTO `staff_role` (`id`, `staff_id`, `liberian`, `discipline`, `attendance`, `health`, `receipt`, `timetable`) VALUES
(12, 12, 0, 0, 0, 0, 0, 0),
(13, 15, 0, 0, 0, 0, 0, 0),
(14, 16, 0, 0, 0, 0, 0, 0),
(15, 17, 0, 0, 0, 0, 0, 0),
(16, 18, 0, 0, 0, 0, 0, 0),
(17, 19, 0, 0, 0, 0, 0, 0),
(18, 20, 0, 0, 0, 0, 0, 0),
(25, 27, 0, 0, 0, 0, 0, 0),
(26, 37, 0, 0, 0, 0, 0, 0),
(27, 38, 0, 0, 0, 0, 0, 0),
(28, 39, 0, 0, 0, 0, 0, 0),
(30, 46, 0, 0, 0, 0, 0, 0),
(31, 47, 0, 0, 0, 0, 0, 0),
(32, 58, 0, 0, 0, 0, 0, 0),
(33, 59, 0, 0, 0, 0, 0, 0),
(34, 60, 0, 0, 0, 0, 0, 0),
(35, 61, 0, 0, 0, 0, 0, 0),
(36, 62, 0, 0, 0, 0, 0, 0),
(37, 63, 0, 0, 0, 0, 0, 0),
(38, 64, 0, 0, 0, 0, 0, 0),
(39, 65, 0, 0, 0, 0, 0, 0),
(40, 66, 1, 0, 0, 0, 0, 0),
(41, 67, 0, 0, 0, 0, 1, 0),
(42, 68, 0, 0, 0, 0, 0, 0),
(43, 69, 0, 0, 0, 1, 0, 0),
(44, 70, 0, 0, 0, 0, 0, 0),
(45, 72, 0, 0, 0, 0, 0, 0),
(46, 76, 0, 0, 0, 0, 0, 0),
(47, 77, 0, 0, 0, 0, 0, 0),
(48, 79, 0, 0, 0, 0, 0, 0),
(49, 80, 0, 0, 0, 0, 0, 0),
(50, 81, 0, 0, 0, 0, 0, 0),
(51, 82, 0, 0, 0, 0, 0, 0),
(52, 83, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `std_report_cards`
--

CREATE TABLE `std_report_cards` (
  `id` int(10) NOT NULL,
  `student` int(8) NOT NULL,
  `session` int(3) NOT NULL,
  `term` int(2) NOT NULL,
  `grade` int(4) NOT NULL,
  `c_form_teacher` varchar(150) NOT NULL,
  `c_principal` varchar(150) NOT NULL,
  `check_result` tinyint(1) NOT NULL DEFAULT 0,
  `check_counter` tinyint(1) NOT NULL,
  `cog_1` int(3) NOT NULL DEFAULT 0,
  `cog_2` int(3) NOT NULL DEFAULT 0,
  `cog_3` int(3) NOT NULL DEFAULT 0,
  `cog_4` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_report_cards`
--

INSERT INTO `std_report_cards` (`id`, `student`, `session`, `term`, `grade`, `c_form_teacher`, `c_principal`, `check_result`, `check_counter`, `cog_1`, `cog_2`, `cog_3`, `cog_4`) VALUES
(1, 1, 1, 1, 10, '', '', 0, 0, 0, 0, 0, 0),
(2, 2, 1, 1, 5, '', '', 0, 0, 0, 0, 0, 0),
(3, 3, 1, 1, 3, '', '', 0, 0, 0, 0, 0, 0),
(4, 6, 1, 1, 9, '', '', 0, 0, 0, 0, 0, 0),
(5, 8, 1, 1, 9, '', '', 0, 0, 0, 0, 0, 0),
(6, 9, 1, 1, 5, '', '', 0, 0, 0, 0, 0, 0),
(7, 10, 1, 1, 7, '', '', 0, 0, 0, 0, 0, 0),
(8, 11, 1, 1, 4, '', '', 0, 0, 0, 0, 0, 0),
(9, 12, 1, 1, 11, '', '', 0, 0, 0, 0, 0, 0),
(10, 13, 1, 1, 10, '', '', 0, 0, 0, 0, 0, 0),
(11, 14, 1, 1, 12, '', '', 0, 0, 0, 0, 0, 0),
(12, 15, 1, 1, 10, '', '', 0, 0, 0, 0, 0, 0),
(13, 16, 1, 1, 7, '', '', 0, 0, 0, 0, 0, 0),
(14, 17, 1, 1, 7, '', '', 0, 0, 0, 0, 0, 0),
(15, 18, 1, 1, 6, '', '', 0, 0, 0, 0, 0, 0),
(16, 19, 1, 1, 3, '', '', 0, 0, 0, 0, 0, 0),
(17, 20, 1, 1, 8, '', '', 0, 0, 0, 0, 0, 0),
(18, 21, 1, 1, 3, '', '', 0, 0, 0, 0, 0, 0),
(19, 22, 1, 1, 5, '', '', 0, 0, 0, 0, 0, 0),
(20, 23, 1, 1, 7, '', '', 0, 0, 0, 0, 0, 0),
(21, 24, 1, 1, 6, '', '', 0, 0, 0, 0, 0, 0),
(22, 25, 1, 1, 3, '', '', 0, 0, 0, 0, 0, 0),
(23, 26, 1, 1, 10, '', '', 0, 0, 0, 0, 0, 0),
(24, 27, 1, 1, 8, '', '', 0, 0, 0, 0, 0, 0),
(25, 28, 1, 1, 7, '', '', 0, 0, 0, 0, 0, 0),
(26, 29, 1, 1, 12, '', '', 0, 0, 0, 0, 0, 0),
(27, 30, 1, 1, 5, '', '', 0, 0, 0, 0, 0, 0),
(28, 31, 1, 1, 9, '', '', 0, 0, 0, 0, 0, 0),
(29, 32, 1, 1, 7, '', '', 0, 0, 0, 0, 0, 0),
(30, 33, 1, 1, 5, '', '', 0, 0, 0, 0, 0, 0),
(31, 34, 1, 1, 11, '', '', 0, 0, 0, 0, 0, 0),
(32, 35, 1, 1, 12, '', '', 0, 0, 0, 0, 0, 0),
(33, 36, 1, 1, 11, '', '', 0, 0, 0, 0, 0, 0),
(34, 37, 1, 1, 6, '', '', 0, 0, 0, 0, 0, 0),
(35, 38, 1, 1, 11, '', '', 0, 0, 0, 0, 0, 0),
(36, 39, 1, 1, 5, '', '', 0, 0, 0, 0, 0, 0),
(37, 40, 1, 1, 3, '', '', 0, 0, 0, 0, 0, 0),
(38, 41, 1, 1, 11, '', '', 0, 0, 0, 0, 0, 0),
(39, 42, 1, 1, 11, '', '', 0, 0, 0, 0, 0, 0),
(40, 43, 1, 1, 3, '', '', 0, 0, 0, 0, 0, 0),
(41, 44, 1, 1, 5, '', '', 0, 0, 0, 0, 0, 0),
(42, 45, 1, 1, 3, '', '', 0, 0, 0, 0, 0, 0),
(43, 46, 1, 1, 5, '', '', 0, 0, 0, 0, 0, 0),
(44, 47, 1, 1, 6, '', '', 0, 0, 0, 0, 0, 0),
(45, 48, 1, 1, 3, '', '', 0, 0, 0, 0, 0, 0),
(46, 49, 1, 1, 9, '', '', 0, 0, 0, 0, 0, 0),
(47, 50, 1, 1, 6, '', '', 0, 0, 0, 0, 0, 0),
(48, 51, 1, 1, 9, '', '', 0, 0, 0, 0, 0, 0),
(49, 52, 1, 1, 11, '', '', 0, 0, 0, 0, 0, 0),
(50, 53, 1, 1, 5, '', '', 0, 0, 0, 0, 0, 0),
(51, 54, 1, 1, 4, '', '', 0, 0, 0, 0, 0, 0),
(52, 55, 1, 1, 4, '', '', 0, 0, 0, 0, 0, 0),
(53, 56, 1, 1, 11, '', '', 0, 0, 0, 0, 0, 0),
(54, 57, 1, 1, 5, '', '', 0, 0, 0, 0, 0, 0),
(55, 58, 1, 1, 7, '', '', 0, 0, 0, 0, 0, 0),
(56, 59, 1, 1, 11, '', '', 0, 0, 0, 0, 0, 0),
(57, 60, 1, 1, 3, '', '', 0, 0, 0, 0, 0, 0),
(58, 61, 1, 1, 5, '', '', 0, 0, 0, 0, 0, 0),
(59, 62, 1, 1, 4, '', '', 0, 0, 0, 0, 0, 0),
(60, 63, 1, 1, 11, '', '', 0, 0, 0, 0, 0, 0),
(61, 64, 1, 1, 4, '', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentbio`
--

CREATE TABLE `studentbio` (
  `studentbio_id` int(8) UNSIGNED NOT NULL,
  `studentbio_internalid` varchar(30) NOT NULL DEFAULT '',
  `studentbio_title` int(3) NOT NULL,
  `studentbio_lname` varchar(30) NOT NULL DEFAULT '',
  `studentbio_fname` varchar(30) NOT NULL DEFAULT '',
  `studentbio_mname` varchar(20) DEFAULT NULL,
  `studentbio_generation` smallint(5) UNSIGNED DEFAULT NULL,
  `studentbio_entry_year` int(3) NOT NULL COMMENT 'which session selected from school_year that is current did he register',
  `studentbio_entry_grade` int(4) NOT NULL COMMENT 'grade at which student choose for admission',
  `studentbio_sped` smallint(5) UNSIGNED DEFAULT NULL,
  `studentbio_gender` varchar(6) NOT NULL DEFAULT '',
  `studentbio_pictures` text NOT NULL COMMENT '/pictures',
  `studentbio_ethnicity` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `studentbio_dob` varchar(30) DEFAULT NULL,
  `studentbio_birthcity` varchar(50) DEFAULT NULL,
  `studentbio_birthstate` varchar(30) DEFAULT NULL,
  `studentbio_birthcountry` varchar(5) DEFAULT NULL,
  `studentbio_prevschoolname` varchar(40) DEFAULT NULL,
  `studentbio_prevschooladdress` varchar(40) DEFAULT NULL,
  `studentbio_prevschoolcity` varchar(40) DEFAULT NULL,
  `studentbio_prevschoolstate` varchar(25) DEFAULT NULL,
  `studentbio_prevschoolzip` varchar(10) DEFAULT NULL,
  `studentbio_prevschoolcountry` varchar(5) DEFAULT NULL,
  `studentbio_school` smallint(5) UNSIGNED DEFAULT 0,
  `studentbio_homed` smallint(5) UNSIGNED DEFAULT NULL,
  `studentbio_primarycontact` smallint(5) UNSIGNED DEFAULT NULL,
  `studentbio_form_master` int(9) UNSIGNED DEFAULT NULL,
  `studentbio_bus` varchar(20) DEFAULT NULL,
  `admit` varchar(10) NOT NULL DEFAULT '0' COMMENT '0=not admited, 1=admited, 2= Graduate, 3= suspended, 4= expelled, 5= transferd, 6 withdrawn, 7 deceased',
  `std_bio_class_control` varchar(100) NOT NULL DEFAULT 'Change Grade' COMMENT 'DO NOTHING: this colum is only controlling student database grid, do not execute anything',
  `std_bio_address` varchar(100) NOT NULL,
  `std_bio_resident_town` varchar(100) NOT NULL,
  `std_bio_resident_state` varchar(30) NOT NULL,
  `std_bio_mobile` varchar(11) NOT NULL,
  `std_bio_phone` varchar(15) NOT NULL,
  `std_bio_living_with_parent` tinyint(1) NOT NULL DEFAULT 1,
  `admission_badge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentbio`
--

INSERT INTO `studentbio` (`studentbio_id`, `studentbio_internalid`, `studentbio_title`, `studentbio_lname`, `studentbio_fname`, `studentbio_mname`, `studentbio_generation`, `studentbio_entry_year`, `studentbio_entry_grade`, `studentbio_sped`, `studentbio_gender`, `studentbio_pictures`, `studentbio_ethnicity`, `studentbio_dob`, `studentbio_birthcity`, `studentbio_birthstate`, `studentbio_birthcountry`, `studentbio_prevschoolname`, `studentbio_prevschooladdress`, `studentbio_prevschoolcity`, `studentbio_prevschoolstate`, `studentbio_prevschoolzip`, `studentbio_prevschoolcountry`, `studentbio_school`, `studentbio_homed`, `studentbio_primarycontact`, `studentbio_form_master`, `studentbio_bus`, `admit`, `std_bio_class_control`, `std_bio_address`, `std_bio_resident_town`, `std_bio_resident_state`, `std_bio_mobile`, `std_bio_phone`, `std_bio_living_with_parent`, `admission_badge`) VALUES
(1, 'JEIS/001', 6, 'Onyenike', 'Goodness', '', 3, 1, 10, NULL, 'Female', 'admin_1454403275_stn_ONYENIKE GOODNESS.jpg', 1, '18/01/2007', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 12, NULL, '1', 'Change Grade', '', '', 'Enugu', '', '', 1, 0),
(2, 'JEIS/002', 6, 'Nwachukwu-Jubilee', 'Tobechukwu', 'Melissa', 3, 1, 5, NULL, 'Female', 'student_61536_NWACHUKWU-JUBILEE MELISA ED.jpg', 12, '02/05/2012', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(3, 'JEIS/003', 6, 'Oliver', 'Iheomachukwuyem', 'Grace', 1, 1, 3, NULL, 'Female', 'student_86922_OJEBOR GRACE ED.jpg', 12, '10/02/2014', 'Asaba ', 'Delta', 'NG', 'Nil', 'Nil ', 'Nil ', '', 'Nil ', 'NG', 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', 'No 8 chris okonkwo street', 'Asaba ', 'Delta', '08032860203', '', 1, 0),
(6, 'JEIS/004', 5, 'Edoreh', 'Edafe', '', 1, 1, 9, NULL, 'Male', 'student_70771_EDOREH EDAFE DESIRE ED.jpg', 1, '28/10/2007', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(8, 'JEIS/005', 6, 'Okoh', 'Nduka', '', 1, 1, 9, NULL, 'Male', 'student_60589_OKOH MICHEAL ED.jpg', 1, '01/10/2009', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(9, 'JEIS/006', 6, 'Egbune', 'Jessica', '', 1, 1, 5, NULL, 'Female', 'student_44533_EGBUNE JESSICA ED.jpg', 1, '12/04/2011', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(10, 'JEIS/007', 6, 'Egbune', 'Emmanuella', '', 1, 1, 7, NULL, 'Female', 'student_83987_EGBUNE EMMANUELLA ED.jpg', 1, '22/10/2005', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(11, 'JEIS/008', 6, 'Adigwe', 'Cheryl', '', 1, 1, 4, NULL, 'Female', 'student_67772_ADIGWE CHERYL.jpg', 1, '06/08/2012', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(12, 'JEIS/009', 6, 'Okeme', 'Mary-Joy', 'Angela', 1, 1, 11, NULL, 'Female', 'student_31218_OKEME MARYJOY ED.jpg', 1, '15/05/2003', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(13, 'JEIS/010', 1, 'Okafor', 'Chigozie', 'Collins', 1, 1, 10, NULL, 'Male', 'student_65058_OKAFOR CHIGOZIE ED.jpg', 1, '05/11/2005', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(14, 'JEIS/011', 1, 'Uche-Egiliga', 'Ebuke', 'Tansi', 1, 1, 12, NULL, 'Male', 'student_38097_UCHE-EGILIGA EBUKE TANSI.jpg', 1, '25/10/2004', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(15, 'JEIS/012', 1, 'Uche-Egiliga', 'Ebube', 'Michael', 1, 1, 10, NULL, 'Male', 'student_28240_UCHE-EGILIGA EBUBE MICHEAL.jpg', 1, '28/03/2006', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(16, 'JEIS/013', 1, 'Uche-Egiliga', 'Ekene', 'Raphael', 1, 1, 7, NULL, 'Male', 'student_72788_UCHE-EGILIGA EKENE RAPHEAL ED.jpg', 1, '28/03/2009', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(17, 'JEIS/014', 0, 'Uche-Egiliga', 'Obianuju', 'Chloe', 1, 1, 7, NULL, 'Female', 'student_59264_UCHE-EGILIGA OBIANUJU CHLOE ED.jpg', 1, '20/03/2009', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(18, 'JEIS/016', 1, 'Asuzu', 'Chimauchem', 'Alexius', 1, 1, 6, NULL, 'Male', 'student_68942_ASUZU CHIMAUCEM.jpg', 1, '19/01/2011', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(19, 'JEIS/017', 6, 'Asuzu', 'Chichebem', 'Felicitas', 1, 1, 3, NULL, 'Female', 'student_97343_ASUZU CHICHEBEM.jpg', 1, '24/04/2013', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(20, 'JEIS/018', 1, 'Okafor', 'Obinna', 'Victory', 1, 1, 8, NULL, 'Male', 'student_53796_OKAFOR VICTORY.jpg', 1, '09/09/2007', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(21, 'JEIS/019', 1, 'Emeka', 'Ifeanyi', 'Light', 1, 1, 3, NULL, 'Female', 'student_22523_EMEKA LIGHT.jpg', 1, '03/04/2013', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(22, 'JEIS/021', 6, 'Efeurhobo', 'Omakpakpo', 'Tryphaena', 1, 1, 5, NULL, 'Female', 'student_53726_EFEURHOBO TRYPHAENA.jpg', 1, '03/07/2010', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(23, 'JEIS/023', 1, 'Oyibodoro', 'Jesu-Ovie', 'Joshua', 1, 1, 7, NULL, 'Male', 'student_53884_OYIBODORO JOSHUA.jpg', 1, '19/01/2009', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(24, 'JEIS/024', 1, 'Monyei', 'Naomi', 'Dumebi', 1, 1, 6, NULL, 'Female', 'student_40566_MONYEI DUMEBI.jpg', 1, '29/07/2010', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(25, 'JEIS/025', 6, 'Monyei', 'Uchenna', 'Deborah', 1, 1, 3, NULL, 'Female', 'student_57532_MONYEI DEBORAH.jpg', 1, '28/05/2013', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(26, 'JEIS/026', 1, 'Okeme', 'David', 'Richard', 1, 1, 10, NULL, 'Male', 'student_75910_OKEME RICHARD.jpg', 1, '12/03/2005', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(27, 'JEIS/027', 6, 'Agbaza', 'Orhowo', 'Joan', 1, 1, 8, NULL, 'Female', 'student_68261_AGBAZA JOAN.jpg', 1, '21/09/2008', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(28, 'JEIS/028', 1, 'Agbaza', 'Efezino', 'KingDavid', 1, 1, 7, NULL, 'Male', 'student_73656_AGBAZA KINGDAVID.jpg', 1, '20/10/2009', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(29, 'JEIS/020', 1, 'Okoh', 'Utomi', 'Wisdom', 1, 1, 12, NULL, 'Male', 'student_22172_OKOH WISDOM.jpg', 1, '25/02/2004', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(30, 'JEIS/029', 1, 'Agbaza', 'Chikamso', 'Ovie Damain', 1, 1, 5, NULL, 'Male', 'student_80809_AGBAZA DAMIAN.jpg', 1, '16/05/2011', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(31, 'JEIS/031', 1, 'Oweh', 'Odesiri', 'Omamoke', 1, 1, 9, NULL, 'Female', 'student_74143_OWEH OMAMOKE.jpg', 1, '', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(32, 'JEIS/032', 1, 'Oweh', 'Urinrin', 'Omamusi', 1, 1, 16, NULL, 'Male', 'student_16137_OWEH OMAMUSI.jpg', 1, '14/06/2008', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(33, 'JEIS/034', 1, 'Nwaedozie', 'Goodluck', '', 1, 1, 5, NULL, 'Male', 'student_96575_NWAEDOZIE GOODLUCK.jpg', 108, '12/05/2011', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(34, 'JEIS/038', 6, 'Efeurhobo', 'Akpemie', 'Jochebed', 3, 1, 11, NULL, 'Female', 'student_51644_EFEURHOBO JOCHEBED.jpg', 1, '19/04/2006', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(35, 'JEIS/039', 1, 'Mbanusi', 'Makuachukwu', 'Joseph', 3, 1, 12, NULL, 'Male', 'student_89955_MBANUSI JOSEPH.jpg', 108, '27/05/2003', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(36, 'JEIS/040', 1, 'Chukwuemeke', 'Prosper', 'Ochelli', 3, 1, 11, NULL, 'Male', 'student_52033_CHUKWUEMEKE OCHELLI PROSPER.jpg', 1, '20/07/2005', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(37, 'JEIS/041', 1, 'Oghenekaro', 'Oghenemaro', 'Valiant', 3, 1, 6, NULL, 'Female', 'student_40772_OHENEKARO OGHENEM.jpg', 1, '08/05/2010', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(38, 'JEIS/043', 1, 'Esumeh', 'Ugochukwu', '', 1, 1, 11, NULL, 'Male', 'student_77423_ESUMEH UGOCHUKWU.jpg', 1, '27/06/2004', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(39, 'JEIS/044', 1, 'Joseph', 'Victory', 'Elozino', 1, 1, 5, NULL, 'Male', 'student_22144_JOSEPH VICTORY ELOZINO.jpg', 1, '11/01/2012', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(40, 'JEIS/045', 1, 'Joseph', 'Victorian', 'Ewomazino', 1, 1, 3, NULL, 'Female', 'student_45595_JOSEPH VICTORIAN.jpg', 1, '13/04/2013', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(41, 'JEIS/046', 1, 'Ogbe-Tosan', 'Serun', 'Zillan', 1, 1, 11, NULL, 'Male', 'student_65903_OGBE-TOSAN ZILLIAN.jpg', 1, '06/07/2006', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(42, 'JEIS/047', 1, 'Ojugbana', 'Zita', 'Kosisochukwu', 1, 1, 11, NULL, 'Female', '', 1, '31/05/2005', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(43, 'JEIS/048', 1, 'Oke Akozor', 'Treasure', 'Ogheneyolameh', 1, 1, 3, NULL, 'Female', 'student_23700_OKE TREASURE.jpg', 1, '29/10/2013', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(44, 'JEIS/035', 1, 'David', 'Mikayla', 'Chimgozirim', 1, 1, 5, NULL, 'Female', '', 1, '01/06/2011', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(45, 'JEIS/036', 1, 'David', 'Mikhalis', 'Chimdiamara', 1, 1, 3, NULL, 'Male', '', 1, '14/10/2013', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(46, 'JEIS/049', 1, 'Mormah', 'Nmeri', 'Theophilus', 1, 1, 5, NULL, 'Male', 'student_79362_MORMAH THEOPHILUS.jpg', 1, '26/01/2012', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(47, 'JEIS/050', 1, 'Mormah', 'Onyekachukwu', 'Stephanie', 1, 1, 6, NULL, 'Female', 'student_91018_MORMAH STEPHANIE.jpg', 1, '07/10/2010', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(48, 'JEIS/051', 1, 'Mormah', 'Louis', '', 1, 1, 3, NULL, 'Male', 'student_49385_MORMAH LOUIS.jpg', 1, '25/09/2013', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(49, 'JEIS/052', 6, 'Oke Akozor', 'Oghenemaro', 'Jennifer', 1, 1, 9, NULL, 'Female', '', 1, '03/03/2007', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(50, 'JEIS/053', 1, 'Oke Akozor', 'Iroghene', 'Israel', 1, 1, 6, NULL, 'Male', '', 1, '30/09/2010', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(51, 'JEIS/054', 6, 'Ofoye', 'Dami', '', 1, 1, 9, NULL, 'Female', 'student_91302_OFOYE DAMI.JPG', 1, '', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(52, 'JEIS/055', 6, 'Ofoye', 'Tsola', '', 1, 1, 11, NULL, 'Female', 'student_90430_OFOYE TSOLA.jpg', 1, '', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(53, 'JEIS/056', 6, 'Ofoye', 'Toju', '', 1, 1, 5, NULL, 'Female', 'student_17429_OFOYE TOJU.jpg', 1, '', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(54, 'JEIS/057', 6, 'Ofoye', 'Dere', '', 1, 1, 4, NULL, 'Female', 'student_77527_OFOYE DERE.jpg', 1, '', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(55, 'JEIS/058', 1, 'Onyekachukwu', 'Louis', 'Delightsome', 1, 1, 4, NULL, 'Female', 'student_83267_ONYEKACHUKWU DELIGTHSOME.jpg', 1, '16/11/2012', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(56, 'JEIS/059', 6, 'Omodiagbe', 'Daniella', 'Miracle', 1, 1, 11, NULL, 'Female', 'student_17557_OMODIAGBE DANIELLA.jpg', 1, '', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(57, 'JEIS/060', 1, 'Okonkwo', 'Mmesoma', 'Maryjame', 1, 1, 5, NULL, 'Female', 'student_86092_OKONKWO MARYJANE.jpg', 1, '11/07/2011', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(58, 'JEIS/064', 1, 'Igara', 'Gracious', '', 1, 1, 7, NULL, 'Male', '', 1, '13/06/2008', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(59, 'JEIS/030', 34, 'Chukwuji', 'Daniel', 'Akachukwu', 1, 1, 11, NULL, 'Male', '', 1, '15/12/2004', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(60, 'JEIS/033', 1, 'Chika', 'Brain', 'Somtochukwu', 1, 1, 3, NULL, 'Male', 'student_92988_CHIKA BRIAN SOMTOCHUKWU.jpg', 1, '12/03/2013', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(61, 'JEIS/062', 1, 'Ogoh-Chikadibia', 'Freshness', '', 1, 1, 5, NULL, 'Female', '', 1, '05/08/2010', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(62, 'JEIS/063', 1, 'Ogoh-Chikadibia', 'Borngreat', '', 1, 1, 4, NULL, 'Male', '', 1, '13/08/2012', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(63, 'JEIS/065', 1, 'Ibegbu', 'Chimezie', 'Miracle', 1, 1, 11, NULL, 'Male', '', 1, '29/06/2004', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0),
(64, 'JEIS/066', 1, 'Ikechukwu', 'Onyekachi', 'Alvin', 1, 1, 4, NULL, 'Male', '', 1, '21/03/2012', '', 'Delta', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 'Change Grade', '', '', 'Delta', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_grade_year`
--

CREATE TABLE `student_grade_year` (
  `student_grade_year_id` int(8) UNSIGNED NOT NULL,
  `student_grade_year_student` int(8) DEFAULT NULL COMMENT 'web_students',
  `student_grade_year_year` int(3) UNSIGNED DEFAULT NULL COMMENT 'session',
  `student_grade_year_grade` int(3) UNSIGNED DEFAULT NULL COMMENT 'level',
  `student_grade_year_class_room` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_grade_year`
--

INSERT INTO `student_grade_year` (`student_grade_year_id`, `student_grade_year_student`, `student_grade_year_year`, `student_grade_year_grade`, `student_grade_year_class_room`) VALUES
(1, 1, 3, 1, 0),
(2, 2, 3, 1, 0),
(3, 3, 3, 1, 0),
(4, 4, 3, 1, 0),
(5, 5, 3, 1, 0),
(6, 6, 3, 1, 0),
(7, 7, 3, 1, 0),
(8, 8, 3, 1, 0),
(9, 10, 3, 1, 0),
(10, 11, 3, 1, 0),
(11, 12, 3, 1, 0),
(12, 13, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admission`
--

CREATE TABLE `tbl_admission` (
  `id` int(11) NOT NULL,
  `badge_name` varchar(50) NOT NULL COMMENT 'eg. September 2014 A',
  `application_starts` varchar(20) NOT NULL,
  `application_ends` varchar(20) NOT NULL,
  `interview_date` varchar(20) NOT NULL,
  `interview_time` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `instruction` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admission`
--

INSERT INTO `tbl_admission` (`id`, `badge_name`, `application_starts`, `application_ends`, `interview_date`, `interview_time`, `active`, `instruction`) VALUES
(1, '2015/2016 Entrance', '10/10/2015', '14/12/2015', '01/11/2015', '11:58', 0, 'Bring your Photo Card when coming, am try be early...');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admit_code`
--

CREATE TABLE `tbl_admit_code` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admit_code`
--

INSERT INTO `tbl_admit_code` (`id`, `title`) VALUES
(1, 'Admitted'),
(2, 'Graduate'),
(3, 'Suspended'),
(4, 'Expelled'),
(5, 'Transfered'),
(6, 'Withdrawn'),
(7, 'Deceased'),
(8, 'Unknown'),
(9, 'Not Admitted');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_app_config`
--

CREATE TABLE `tbl_app_config` (
  `id` int(11) NOT NULL,
  `module` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `detail` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `api_user` varchar(50) NOT NULL COMMENT 'same as api id',
  `api_pass` varchar(50) NOT NULL COMMENT 'same as api secret',
  `api_def` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_app_config`
--

INSERT INTO `tbl_app_config` (`id`, `module`, `type`, `description`, `detail`, `status`, `api_user`, `api_pass`, `api_def`) VALUES
(1, 'student_registration', 'registration', 'Old Student Registration', 'Enabling this Will allow old students to Register ion the portal', 1, '', '', ''),
(2, 'student_discussion', 'main', 'Student Discussions', 'When enables, students can post and chat with themselves', 0, '', '', ''),
(3, 'student_login', 'login', 'Student Login', 'When Enabled, students will be allowed to log in', 1, '', '', ''),
(4, 'staff_registration', 'registration', 'Staff Registration', 'When enabled, new Staff can register him or herself', 1, '', '', ''),
(5, 'staff_discussion', 'main', 'Staff Discussion', 'When enabled, staff will be allowed to post and chat with themselves', 1, '', '', ''),
(6, 'staff_login', 'login', 'Staff Login', 'When enabled, staff will be able to log in', 1, '', '', ''),
(8, 'paypal_api', 'main', 'Paypal API', '', 0, '', '', ''),
(9, 'sms_api', 'api', 'Bulk SMS API', '<a href=\"http://sms.hypertera.ng\">GET API </a>', 1, 'jostinexcel2015', 'jostinexcel2015', 'sms.hypertera.ng'),
(10, 'google_map', 'api', 'Google Map API', 'API to show your location in your website, copy your map url and paste it inside definitions', 1, '', '', 'http://'),
(11, 'smtp', 'api', 'SMTP Details', 'Simple Mail Transfer Protocol: enable you to send email: Instruction the API definition = SMTP serve', 1, '', '', ''),
(13, 'facebook_app', 'api', 'Facebook APP', 'API definition is serving as the app url', 1, '', '', ''),
(14, 'maintenance_mode', 'main', 'Maintenance Mode', 'When this is turned on, the portal puts itself to maintenence mode', 0, '', '', ''),
(15, 'parent_login', 'login', 'Parent Login ', 'When this is enabled, parents can log in', 1, '', '', ''),
(16, 'parent_registration', 'registration', 'Parent Registration', 'When this is Enabled, new Parents can register', 1, '', '', ''),
(17, 'student_result_checking', 'main', 'Student Result Checking Portal Enable/Disable', 'if this is open, the students can check their result else they cant', 0, '', '', ''),
(18, 'student_result_uploading', 'main', 'Staff Result Uploading', 'When enabled, Staff have the privilege to upload result', 1, '', '', ''),
(19, 'result_note', 'main', 'Show result note', 'When enabled, note will show on result', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_automatics`
--

CREATE TABLE `tbl_automatics` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `string` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='defines automation in the portal';

--
-- Dumping data for table `tbl_automatics`
--

INSERT INTO `tbl_automatics` (`id`, `autoid`, `value`, `string`, `status`) VALUES
(1, 'principal_comment_f', 'Bad result', '', '1'),
(2, 'principal_comment_e', 'Bad results', '', '1'),
(3, 'principal_comment_d', 'Student needs extra help with homework.', '', ''),
(4, 'principal_comment_c', 'Student needs extra help with homework.', '', ''),
(5, 'principal_comment_b', 'Always does quality work.', '', ''),
(6, 'principal_comment_a', 'A truly excellent student.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barned_words`
--

CREATE TABLE `tbl_barned_words` (
  `id` int(11) NOT NULL,
  `word_names` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barned_words`
--

INSERT INTO `tbl_barned_words` (`id`, `word_names`) VALUES
(1, 'Sex'),
(3, 'Fuck');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config`
--

CREATE TABLE `tbl_config` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `current_year` int(10) UNSIGNED DEFAULT NULL,
  `messageto_staff` tinytext DEFAULT NULL,
  `messageto_parents` tinytext DEFAULT NULL,
  `messageto_students` tinytext NOT NULL,
  `messageto_all` tinytext DEFAULT NULL,
  `default_city` varchar(30) DEFAULT NULL,
  `default_state` varchar(30) DEFAULT NULL,
  `default_zip` varchar(10) DEFAULT NULL,
  `default_entry_date` varchar(10) DEFAULT NULL,
  `portal_launch_date` varchar(10) NOT NULL,
  `school_logo_path` varchar(100) NOT NULL COMMENT 'files/image',
  `school_badge_path` varchar(100) NOT NULL COMMENT '/files/images',
  `school_bar_code_app` varchar(100) NOT NULL COMMENT 'files/images',
  `app_membership` varchar(20) NOT NULL DEFAULT '0' COMMENT 'set to one for school that have put MySchoolApp Logo in their school',
  `app_licence` varchar(20) NOT NULL,
  `school_app_version` varchar(20) NOT NULL,
  `school_app_framework` varchar(20) NOT NULL,
  `portal_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_config`
--

INSERT INTO `tbl_config` (`id`, `school_name`, `current_year`, `messageto_staff`, `messageto_parents`, `messageto_students`, `messageto_all`, `default_city`, `default_state`, `default_zip`, `default_entry_date`, `portal_launch_date`, `school_logo_path`, `school_badge_path`, `school_bar_code_app`, `app_membership`, `app_licence`, `school_app_version`, `school_app_framework`, `portal_url`) VALUES
(1, 'Federal School of Dental Technology & Therapy', 3, 'Welcome Staff. Feel free to ask the Admin any Question.', 'Welcome Super Parent. Feel free to ask the Admin any Question.', 'Welcome Great Students, leaders of tomorrow.\r\n ', 'Welcome to Federal School of Dental Technology & Therapy', 'Enugu', 'en', '05896 ', '10/12/2017', '19/10/2017', '1459462805_lb_jostin-logo.png', '1459462834_lb_jostin-logo.png', 'qr.jpg', '0', '[UGN/EK/015/EN/001]', '1.0.1', 'Blingo', 'http://localhost/cbt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_domains`
--

CREATE TABLE `tbl_grade_domains` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `school_names` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `school_logo_path` varchar(50) NOT NULL COMMENT '/files/images',
  `school_badge_path` varchar(50) NOT NULL COMMENT '/files/images',
  `address` text NOT NULL,
  `term_result_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_grade_domains`
--

INSERT INTO `tbl_grade_domains` (`id`, `school_names`, `status`, `school_logo_path`, `school_badge_path`, `address`, `term_result_fee`) VALUES
(1, 'ND', 1, 'logo.png', 'logo.png', 'Main Building', 500),
(2, 'HND', 1, 'logo.png', 'logo.png', 'Main Building', 500),
(3, 'Post graduates', 1, 'logo.png', 'logo.png', 'Main Building', 600);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_domains`
--

CREATE TABLE `tbl_school_domains` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `school_names` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `school_logo_path` varchar(50) NOT NULL COMMENT '/files/images',
  `school_badge_path` varchar(50) NOT NULL COMMENT '/files/images',
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_school_domains`
--

INSERT INTO `tbl_school_domains` (`id`, `school_names`, `status`, `school_logo_path`, `school_badge_path`, `address`) VALUES
(1, 'first school', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_profile`
--

CREATE TABLE `tbl_school_profile` (
  `id` tinyint(1) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `adress` varchar(500) NOT NULL,
  `state` varchar(25) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_school_profile`
--

INSERT INTO `tbl_school_profile` (`id`, `phone`, `fax`, `email`, `mobile`, `adress`, `state`, `latitude`, `longitude`, `country`) VALUES
(1, '08168568424', '', 'jostinexcelinternationalsch@gmail.com', '08129058966', '4. G. O Ebinum-Olisah Street, Behind Basalt Oil & Gas, along Asaba- Benin Expressway, Okpanam. Delta State.', 'Delta', '', '', 'Nigeria ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

CREATE TABLE `tbl_states` (
  `state_code` char(10) NOT NULL DEFAULT '',
  `state_css` varchar(20) NOT NULL,
  `state_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_states`
--

INSERT INTO `tbl_states` (`state_code`, `state_css`, `state_name`) VALUES
('ab', 'Abia', 'Abia'),
('abj', 'FCT', 'Abuja'),
('ada', 'Adamawa', 'Adamawa'),
('ak', 'Akwa-ibom', 'Akwa-ibom'),
('ana', 'Anambra', 'Anambra'),
('ba', 'Bauchi', 'Bauchi'),
('bay', 'Bayelsa', 'Bayelsa'),
('be', 'Benue', 'Benue'),
('bo', 'Borno', 'Borno'),
('cr', 'Cross-River', 'Cross-River'),
('de', 'Delta', 'Delta'),
('eb', 'Ebonyi', 'Ebonyi'),
('ed', 'Edo', 'Edo'),
('ek', 'Ekiti', 'Ekiti'),
('en', 'Enugu', 'Enugu'),
('foreign', 'foreign', 'International'),
('go', 'Gombe', 'Gombe'),
('im', 'Imo', 'Imo'),
('jig', 'Jigawa', 'Jigawa'),
('ka', 'Kano', 'Kano'),
('kad', 'Kaduna', 'Kaduna'),
('kas', 'Kastina', 'Kastina'),
('keb', 'Kebbi', 'Kebbi'),
('ko', 'Kogi', 'Kogi'),
('kw', 'Kwara', 'Kwara'),
('la', 'Lagos', 'Lagos'),
('na', 'Nasarawa', 'Nasarawa'),
('ni', 'Niger', 'Niger'),
('og', 'Ogun', 'Ogun'),
('on', 'Ondo', 'Ondo'),
('os', 'Osun', 'Osun'),
('oy', 'Oyo', 'Oyo'),
('pl', 'Plateau', 'Plateau'),
('rv', 'Rivers', 'Rivers'),
('sk', 'Sokoto', 'Sokoto'),
('tb', 'Taraba', 'Taraba'),
('yb', 'Yobe', 'Yobe'),
('za', 'Zamfara', 'Zamfara'),
('zz', 'Zzz - Not Listed', 'Zzz - Not Listed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_std_denomination`
--

CREATE TABLE `tbl_std_denomination` (
  `id` int(2) NOT NULL,
  `deno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_std_denomination`
--

INSERT INTO `tbl_std_denomination` (`id`, `deno`) VALUES
(1, 'Sciences'),
(2, 'Art'),
(3, 'Commercial'),
(4, 'Nursery'),
(5, 'Primary');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_titles`
--

CREATE TABLE `tbl_titles` (
  `title_id` int(2) UNSIGNED NOT NULL,
  `title_desc` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_titles`
--

INSERT INTO `tbl_titles` (`title_id`, `title_desc`) VALUES
(1, 'Mr.'),
(2, 'Provost'),
(3, 'Professor'),
(4, 'Mrs'),
(5, 'Master'),
(6, 'Miss'),
(7, 'Doctor'),
(8, 'Barrister'),
(9, 'Coloniel'),
(10, 'Engineer'),
(11, 'Madam'),
(12, 'Senator'),
(13, 'Governor'),
(14, 'Ambassador'),
(15, 'President'),
(16, 'Governor'),
(17, 'Councillor'),
(18, 'Envagelist'),
(19, 'Prelate'),
(20, 'Reverend'),
(21, 'Pastor'),
(22, 'Bishop'),
(23, 'Prince'),
(24, 'Princess'),
(25, 'King'),
(26, 'Queen'),
(27, 'Lord'),
(28, 'Dame'),
(29, 'Advocate'),
(30, 'Justice'),
(31, 'Pope'),
(32, 'General'),
(33, 'Brigadier'),
(34, 'Captain'),
(35, 'Officer'),
(36, 'Oba'),
(37, 'Eze'),
(38, 'Obi'),
(39, 'Elder'),
(40, 'Chancellor');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_grade_year`
--

CREATE TABLE `teacher_grade_year` (
  `id` int(8) NOT NULL,
  `teacher` int(8) NOT NULL,
  `session` int(3) NOT NULL,
  `grade_class` int(3) NOT NULL DEFAULT 0,
  `grade_class_room` int(3) NOT NULL DEFAULT 0,
  `main_teacher` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_grade_year`
--

INSERT INTO `teacher_grade_year` (`id`, `teacher`, `session`, `grade_class`, `grade_class_room`, `main_teacher`) VALUES
(1, 12, 1, 7, 0, 1),
(2, 16, 1, 12, 0, 1),
(3, 17, 1, 4, 0, 1),
(4, 18, 1, 3, 0, 1),
(5, 19, 1, 1, 0, 0),
(6, 20, 1, 5, 0, 1),
(13, 27, 1, 1, 0, 0),
(14, 37, 1, 1, 0, 0),
(15, 38, 1, 9, 0, 1),
(16, 39, 1, 1, 0, 0),
(17, 58, 1, 2, 0, 0),
(18, 59, 1, 2, 0, 0),
(19, 60, 1, 2, 0, 0),
(20, 61, 1, 8, 0, 1),
(21, 62, 1, 10, 0, 0),
(22, 63, 1, 1, 0, 0),
(23, 64, 1, 4, 0, 0),
(24, 68, 1, 11, 0, 0),
(25, 70, 1, 1, 0, 0),
(26, 72, 1, 6, 0, 0),
(27, 76, 1, 10, 0, 1),
(28, 77, 1, 1, 0, 0),
(29, 80, 1, 1, 0, 0),
(30, 81, 1, 1, 0, 0),
(31, 82, 1, 1, 0, 0),
(32, 83, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `web_parents`
--

CREATE TABLE `web_parents` (
  `web_parents_id` int(8) UNSIGNED NOT NULL,
  `web_parents_type` char(2) DEFAULT NULL COMMENT 'A=master admin, B=admin, T= teacher, C= parent, S= non teaching staff, Ty= nysc, Tp=practising teacher, Tl= lesson teacher',
  `web_parents_relid` int(8) UNSIGNED DEFAULT NULL COMMENT 'inserted rows from student_parent.id',
  `web_parents_username` varchar(15) DEFAULT NULL,
  `web_parents_password` varchar(50) DEFAULT NULL,
  `web_parents_flname` varchar(60) DEFAULT NULL,
  `web_parents_active` varchar(12) NOT NULL COMMENT 'email verification',
  `online` tinyint(1) NOT NULL,
  `last_log` varchar(50) NOT NULL COMMENT 'sample dd/mm/yyy 04:44:33'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_parents`
--

INSERT INTO `web_parents` (`web_parents_id`, `web_parents_type`, `web_parents_relid`, `web_parents_username`, `web_parents_password`, `web_parents_flname`, `web_parents_active`, `online`, `last_log`) VALUES
(1, 'C', 1, 'Grace ', '56d4cc9c151aeed11a65e506a4541c7c', 'ojebor ', '1', 0, '06/05/2016 13:50:36'),
(2, 'C', 2, 'DADDYMELISSA', '3356f1f794f0c4c75901e4df5422dcf6', 'JUBILEE', '1', 0, '04/02/2016 10:39:48'),
(3, 'C', 3, 'Ebicent', 'ae55392c12be4f9c134c4dbfa6e17dbc', 'Ebere', '1', 0, ''),
(4, 'C', 4, 'zino814', '87555039f1dda4c18f620ca85f8ed8ff', 'Esi ', '1', 0, ''),
(5, 'C', 5, 'ofoye', '4eb77cb9a8e207e7ce40c48b6f623632', 'ofoye', 'ee1ffd2d12', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `web_students`
--

CREATE TABLE `web_students` (
  `id` int(8) NOT NULL,
  `stdbio_id` int(8) NOT NULL COMMENT 'inserted row from studentbio.id',
  `identify` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_n` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reg_date` varchar(30) NOT NULL COMMENT 'current date stamp',
  `admission_badge` int(11) NOT NULL DEFAULT 1,
  `form_no` varchar(20) NOT NULL,
  `denomination` tinyint(2) NOT NULL DEFAULT 0,
  `last_log` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_students`
--

INSERT INTO `web_students` (`id`, `stdbio_id`, `identify`, `email`, `user_n`, `pass`, `status`, `reg_date`, `admission_badge`, `form_no`, `denomination`, `last_log`) VALUES
(1, 1, '11111', 'bubefro@gmail.com', 'student', 'cd73502828457d15655bbd7a63fb0bc8', '1', '', 1, '', 0, ''),
(2, 2, '43566564', 'student2@ugarsoft.com', 'student2', '213ee683360d88249109c2f92789dbc3', '1', '', 1, '', 0, ''),
(3, 3, '465787654', 'stdent3@ugarsoft.com', 'student3', '8e4947690532bc44a8e41e9fb365b76a', '1', '', 1, '', 0, ''),
(4, 6, '324566', 'student4@ugarsoft.com', 'student4', '166a50c910e390d922db4696e4c7747b', '1', '', 1, '', 0, ''),
(5, 8, '2435656', 'student@ugarsoft.com', 'student5', '9fd9280a7aa3578c8e853745a5fcc18a', '1', '', 1, '', 0, ''),
(6, 9, '3454657687', 'student6@gmail.com', 'student6', '27e062bf3df59edebb5db9f89952c8b3', '1', '', 1, '', 0, ''),
(7, 10, '24356676543', 'student7@gmail.com', 'student7', '72e8744fc2faa17a83dec9bed06b8b65', '1', '', 1, '', 0, ''),
(8, 11, '34676322345', 'student8@ugarsoft.com', 'student8', '8aa7fb36a4efbbf019332b4677b528cf', '1', '', 1, '', 0, ''),
(10, 12, '23443248998', 'student9@gmail.com', 'student9', '7c8cd5da17441ff04bf445736964dd16', '1', '', 1, '', 0, ''),
(11, 13, '435654', 'student10@gmail.com', 'student10', '2c62e6068c765179e1aed9bc2bfd4689', '1', '', 1, '', 0, ''),
(12, 14, '43654422343', 'student11@gmail.com', 'student11', '9cf695ac37ef238e62f6ee874b4b3968', '1', '', 1, '', 0, ''),
(13, 15, '253455432112345', 'student12@gmail.com', 'student12', '7e941d9a3237b1770effdcb05a0aa2a5', '1', '', 1, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `web_users`
--

CREATE TABLE `web_users` (
  `web_users_id` int(8) UNSIGNED NOT NULL,
  `web_users_type` char(2) DEFAULT NULL COMMENT 'A=master admin, B=admin, T= teacher, C= parent, S= non teaching staff, Ty= nysc, Tp=practising teacher, Tl= lesson teacher, X=principal, Xp=vice principal, Y= director, Z=Teranig, Yp=propritor',
  `web_users_relid` int(8) UNSIGNED DEFAULT NULL COMMENT 'inserted rows() from staff.id',
  `web_users_username` varchar(15) DEFAULT NULL,
  `image_url` varchar(100) DEFAULT NULL,
  `web_users_password` varchar(50) DEFAULT NULL,
  `web_users_flname` varchar(60) DEFAULT NULL,
  `web_users_active` varchar(12) NOT NULL COMMENT 'email verification',
  `online` tinyint(1) NOT NULL,
  `last_log` varchar(50) NOT NULL COMMENT 'sample dd/mm/yyy 04:44:33'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_users`
--

INSERT INTO `web_users` (`web_users_id`, `web_users_type`, `web_users_relid`, `web_users_username`, `image_url`, `web_users_password`, `web_users_flname`, `web_users_active`, `online`, `last_log`) VALUES
(1, 'A', 12, 'admin', NULL, '21232f297a57a5a743894a0e4a801fc3', 'Admin', '1', 0, '16/05/2016 23:50:33'),
(2, 'A', 0, 'ben', NULL, '81aee43cfe305a9fb37d90e7798ebe0c', 'Ben', '1', 0, '09/05/2016 13:55:51'),
(14, 'T', 12, 'Laurry', NULL, '2b1b22f52a1ae855298b6e9fe24cbdcf', 'lauretta', '1', 0, ''),
(15, 'S', 15, 'swit Ng', NULL, '56d4cc9c151aeed11a65e506a4541c7c', 'Joy ', '1', 0, '06/05/2016 13:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `_new_answer_1494335095`
--

CREATE TABLE `_new_answer_1494335095` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(1) NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `_new_answer_1494335160`
--

CREATE TABLE `_new_answer_1494335160` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(1) NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_new_answer_1494335160`
--

INSERT INTO `_new_answer_1494335160` (`id`, `student`, `exam`, `question_id`, `answer`, `submit_time`, `status`) VALUES
(1, 1, 1, 1, 'b', '2017-05-09 16:52:30', 0),
(2, 1, 1, 2, 'a', '2017-05-09 16:53:01', 0),
(3, 1, 1, 3, 'c', '2017-05-09 16:53:13', 0),
(4, 1, 1, 4, 'd', '2017-05-09 16:56:29', 0),
(5, 1, 1, 5, 'c', '2017-05-09 17:05:35', 0),
(6, 2, 1, 1, 'c', '2017-05-10 07:50:13', 0),
(7, 2, 1, 2, 'a', '2017-05-10 07:51:43', 0),
(8, 2, 1, 3, 'b', '2017-05-10 07:52:08', 0),
(9, 2, 1, 4, 'd', '2017-05-10 07:52:15', 0),
(10, 2, 1, 5, '0', '2017-05-10 07:52:21', 0),
(20, 3, 1, 1, 'd', '2017-05-10 09:10:55', 0),
(21, 3, 1, 2, 'b', '2017-05-10 09:04:55', 0),
(22, 3, 1, 3, 'b', '2017-05-10 09:11:36', 0),
(23, 3, 1, 4, 'b', '2017-05-10 09:11:05', 0),
(24, 3, 1, 5, 'a', '2017-05-10 09:11:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `_new_answer_1494409240`
--

CREATE TABLE `_new_answer_1494409240` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(1) NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_new_answer_1494409240`
--

INSERT INTO `_new_answer_1494409240` (`id`, `student`, `exam`, `question_id`, `answer`, `submit_time`, `status`) VALUES
(1, 1, 2, 1, '', '2017-05-10 10:44:27', 0),
(2, 1, 2, 2, 'c', '2017-05-10 10:59:16', 0),
(3, 1, 2, 3, '', '2017-05-10 10:44:27', 0),
(4, 1, 2, 4, '', '2017-05-10 10:44:27', 0),
(5, 1, 2, 5, '', '2017-05-10 10:44:27', 0),
(6, 1, 2, 6, 'd', '2017-05-10 11:07:27', 0),
(7, 1, 2, 7, '', '2017-05-10 10:44:27', 0),
(8, 1, 2, 8, '', '2017-05-10 10:44:27', 0),
(9, 1, 2, 9, 'd', '2017-05-10 11:09:35', 0),
(10, 1, 2, 10, 'e', '2017-05-10 11:05:24', 0),
(11, 3, 2, 1, 'a', '2017-05-11 17:24:58', 0),
(12, 3, 2, 2, 'b', '2017-05-11 17:25:09', 0),
(13, 3, 2, 3, 'b', '2017-05-11 17:25:15', 0),
(14, 3, 2, 4, 'a', '2017-05-11 17:25:19', 0),
(15, 3, 2, 5, 'd', '2017-05-11 17:25:24', 0),
(16, 3, 2, 6, 'e', '2017-05-11 17:25:29', 0),
(17, 3, 2, 7, 'c', '2017-05-11 17:25:32', 0),
(18, 3, 2, 8, '', '2017-05-11 17:24:36', 0),
(19, 3, 2, 9, '', '2017-05-11 17:24:36', 0),
(20, 3, 2, 10, '', '2017-05-11 17:24:36', 0),
(26, 2, 2, 1, 'a', '2017-05-12 10:42:12', 0),
(27, 2, 2, 2, 'c', '2017-05-12 10:42:22', 0),
(28, 2, 2, 3, '', '2017-05-12 10:41:59', 0),
(29, 2, 2, 4, '', '2017-05-12 10:41:59', 0),
(30, 2, 2, 5, '', '2017-05-12 10:41:59', 0),
(31, 2, 2, 6, '', '2017-05-12 10:41:59', 0),
(32, 2, 2, 7, '', '2017-05-12 10:41:59', 0),
(33, 2, 2, 8, '', '2017-05-12 10:41:59', 0),
(34, 2, 2, 9, '', '2017-05-12 10:41:59', 0),
(35, 2, 2, 10, '', '2017-05-12 10:41:59', 0),
(36, 4, 2, 1, '', '2017-06-15 10:58:49', 0),
(37, 4, 2, 2, '', '2017-06-15 10:58:49', 0),
(38, 4, 2, 3, '', '2017-06-15 10:58:49', 0),
(39, 4, 2, 4, '', '2017-06-15 10:58:49', 0),
(40, 4, 2, 5, '', '2017-06-15 10:58:49', 0),
(41, 4, 2, 6, '', '2017-06-15 10:58:49', 0),
(42, 4, 2, 7, '', '2017-06-15 10:58:49', 0),
(43, 4, 2, 8, '', '2017-06-15 10:58:49', 0),
(44, 4, 2, 9, '', '2017-06-15 10:58:49', 0),
(45, 4, 2, 10, '', '2017-06-15 10:58:49', 0),
(51, 5, 2, 1, 'a', '2017-06-15 11:24:11', 0),
(52, 5, 2, 2, 'd', '2017-06-15 11:24:17', 0),
(53, 5, 2, 3, 'a', '2017-06-15 11:24:23', 0),
(54, 5, 2, 4, 'a', '2017-06-15 11:24:28', 0),
(55, 5, 2, 5, '', '2017-06-15 11:23:51', 0),
(56, 5, 2, 6, '', '2017-06-15 11:23:51', 0),
(57, 5, 2, 7, '', '2017-06-15 11:23:51', 0),
(58, 5, 2, 8, '', '2017-06-15 11:23:51', 0),
(59, 5, 2, 9, '', '2017-06-15 11:23:51', 0),
(60, 5, 2, 10, '', '2017-06-15 11:23:51', 0),
(61, 6, 2, 1, '', '2017-07-24 07:50:29', 0),
(62, 6, 2, 2, '', '2017-07-24 07:50:29', 0),
(63, 6, 2, 3, '', '2017-07-24 07:50:29', 0),
(64, 6, 2, 4, '', '2017-07-24 07:50:29', 0),
(65, 6, 2, 5, '', '2017-07-24 07:50:29', 0),
(66, 6, 2, 6, '', '2017-07-24 07:50:29', 0),
(67, 6, 2, 7, '', '2017-07-24 07:50:29', 0),
(68, 6, 2, 8, '', '2017-07-24 07:50:29', 0),
(69, 6, 2, 9, '', '2017-07-24 07:50:29', 0),
(70, 6, 2, 10, '', '2017-07-24 07:50:29', 0),
(76, 7, 2, 1, '', '2017-07-24 10:39:26', 0),
(77, 7, 2, 2, '', '2017-07-24 10:39:26', 0),
(78, 7, 2, 3, '', '2017-07-24 10:39:26', 0),
(79, 7, 2, 4, '', '2017-07-24 10:39:26', 0),
(80, 7, 2, 5, '', '2017-07-24 10:39:26', 0),
(81, 7, 2, 6, '', '2017-07-24 10:39:26', 0),
(82, 7, 2, 7, '', '2017-07-24 10:39:26', 0),
(83, 7, 2, 8, '', '2017-07-24 10:39:26', 0),
(84, 7, 2, 9, '', '2017-07-24 10:39:26', 0),
(85, 7, 2, 10, '', '2017-07-24 10:39:26', 0),
(86, 8, 2, 1, '', '2017-08-08 11:19:56', 0),
(87, 8, 2, 2, '', '2017-08-08 11:19:56', 0),
(88, 8, 2, 3, '', '2017-08-08 11:19:56', 0),
(89, 8, 2, 4, '', '2017-08-08 11:19:56', 0),
(90, 8, 2, 5, '', '2017-08-08 11:19:56', 0),
(91, 8, 2, 6, '', '2017-08-08 11:19:56', 0),
(92, 8, 2, 7, '', '2017-08-08 11:19:56', 0),
(93, 8, 2, 8, '', '2017-08-08 11:19:56', 0),
(94, 8, 2, 9, '', '2017-08-08 11:19:56', 0),
(95, 8, 2, 10, '', '2017-08-08 11:19:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `_new_answer_1494409249`
--

CREATE TABLE `_new_answer_1494409249` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(1) NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `_new_answer_1494409262`
--

CREATE TABLE `_new_answer_1494409262` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(1) NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `_new_question_1494335095`
--

CREATE TABLE `_new_question_1494335095` (
  `id` int(11) NOT NULL,
  `sn` int(11) NOT NULL,
  `cbt_exam` int(11) NOT NULL,
  `question` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ar` enum('a','b','c','d','e') NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `e` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `_new_question_1494335160`
--

CREATE TABLE `_new_question_1494335160` (
  `id` int(11) NOT NULL,
  `sn` int(11) NOT NULL,
  `cbt_exam` int(11) NOT NULL,
  `question` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ar` enum('a','b','c','d','e') NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `e` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_new_question_1494335160`
--

INSERT INTO `_new_question_1494335160` (`id`, `sn`, `cbt_exam`, `question`, `status`, `ar`, `a`, `b`, `c`, `d`, `e`) VALUES
(1, 1, 1, 'Who is the &lt;b&gt;president&lt;/b&gt; of Nigeria.', 1, 'e', 'Amodu Buhari', 'Bahhari', 'Moham Buhari', 'All of the above', 'Amodu Buhari'),
(2, 2, 1, '&lt;p&gt;President of Nigeria is a male?&lt;/p&gt;', 1, 'a', 'True', 'False', '', '', ''),
(3, 3, 1, '&lt;p&gt;which of the folowing is an alphabet&lt;/p&gt;', 1, 'c', '1', '5', 'A', 'Cc', 'All'),
(4, 4, 1, '&lt;p&gt;Which of the following is not true&lt;/p&gt;', 1, 'e', 'Water is liquid', 'Water is solid', 'water is Gas', 'All of the above', 'None of the Above'),
(5, 5, 1, '&lt;p&gt;The first girl to enter Moon is&lt;/p&gt;', 1, 'c', 'Mary', 'Jane', 'Chidera', 'None of the above', '');

-- --------------------------------------------------------

--
-- Table structure for table `_new_question_1494409240`
--

CREATE TABLE `_new_question_1494409240` (
  `id` int(11) NOT NULL,
  `sn` int(11) NOT NULL,
  `cbt_exam` int(11) NOT NULL,
  `question` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ar` enum('a','b','c','d','e') NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `e` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_new_question_1494409240`
--

INSERT INTO `_new_question_1494409240` (`id`, `sn`, `cbt_exam`, `question`, `status`, `ar`, `a`, `b`, `c`, `d`, `e`) VALUES
(1, 1, 2, '&lt;p&gt;&lt;img src=&quot;data:image/jpeg;base64,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&quot; data-filename=&quot;living things.jpg&quot; style=&quot;width: 475px;&quot;&gt;&lt;/p&gt;&lt;p&gt;The &lt;b&gt;image&lt;/b&gt; above can represent _____?&lt;/p&gt;', 1, 'a', 'Living Things', 'Food Chain', 'Aquatic Living', 'Animals', 'Plants');
INSERT INTO `_new_question_1494409240` (`id`, `sn`, `cbt_exam`, `question`, `status`, `ar`, `a`, `b`, `c`, `d`, `e`) VALUES
(2, 2, 2, '&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;data:image/png;base64,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&quot; data-filename=&quot;label-the-blue-flower-complete.png&quot; style=&quot;width: 330px;&quot;&gt;&lt;b&gt;&lt;br&gt;&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;What can we call the yellow part if the flower?&lt;/b&gt;&lt;/p&gt;', 1, 'b', 'Milk', 'Pistal', 'Style', 'Sepal', 'Non of the above'),
(3, 3, 2, '&lt;p&gt;&lt;span style=&quot;color: rgb(77, 77, 77); font-family: arial, sans-serif;&quot;&gt;Today scientists understand that certain organisms are alike because of_____&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 'a', 'Physical traits', 'Common ancestry', 'Observable features', 'Classification', 'None of the Above'),
(4, 4, 2, '&lt;p&gt;&lt;span style=&quot;color: rgb(77, 77, 77); font-family: arial, sans-serif;&quot;&gt;The correct scientific name for a leopard gecko is____&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 'a', 'Eublepharis macularius', 'Eublepharic macularius', '', '', ''),
(5, 5, 2, '&lt;p&gt;&lt;span style=&quot;color: rgb(77, 77, 77); font-family: arial, sans-serif;&quot;&gt;The experiment that provided evidence that life does not spontaneously generate was conducted by&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 'c', 'Carolus Linneaus', 'Charles Darwin', 'Francesco Redi', 'Aristotle', 'None of the Above'),
(6, 6, 2, '&lt;p&gt;&lt;span style=&quot;color: rgb(77, 77, 77); font-family: arial, sans-serif;&quot;&gt;Homeostasis refers to an organisms need for which of the following?&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 'c', 'Energy', 'Water', 'Stable internal conditions', 'Space', 'All of the above'),
(7, 7, 2, '&lt;p&gt;&lt;span style=&quot;color: rgb(77, 77, 77); font-family: arial, sans-serif;&quot;&gt;Which of the following was most likely the first step in the development of life on earth?&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 'b', 'Multicellular organisms emerge', 'Bacteria formed', 'Emergence of organisms in oceans', 'Presence of an atmosphere containing nitrogen, water vapor, carbon dioxide, and methane', 'Creation of woman'),
(8, 8, 2, '&lt;p&gt;&lt;span style=&quot;color: rgb(77, 77, 77); font-family: arial, sans-serif;&quot;&gt;Linneaus created a naming system for organisms that used the&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 'a', 'Kingdom and Phylum', 'Class and Order', 'Order and Family', 'Genus and Species', ''),
(9, 9, 2, '&lt;p&gt;&lt;font color=&quot;#444444&quot; face=&quot;arial, sans-serif&quot;&gt;&lt;span style=&quot;background-color: rgb(255, 255, 255);&quot;&gt;Which of the following BEST describes organisms of the same species?&lt;/span&gt;&lt;/font&gt;&lt;br&gt;&lt;/p&gt;', 1, 'd', 'They can mate (in nature) to produce offspring', 'They are similar closely related organisms', 'They live in the same type of habitat', 'They eat the same type of Food', 'Share different scientific names'),
(10, 10, 2, '&lt;p&gt;&lt;iframe frameborder=&quot;0&quot; src=&quot;//www.youtube.com/embed/yLl7iEpqxZA&quot; width=&quot;450&quot; height=&quot;360&quot; class=&quot;note-video-clip&quot;&gt;&lt;/iframe&gt;&lt;/p&gt;&lt;p&gt;WHICH OF THE FOLLOWING IS WRONG ABOUT THE VIDEO&lt;/p&gt;', 1, 'b', 'The sepals are removed first', 'The petals are removed last', 'DISSECTION OF ALL FLOWERS Follow this step', 'The ovary is split open', 'The Ovals are inside the Ovary');

-- --------------------------------------------------------

--
-- Table structure for table `_new_question_1494409249`
--

CREATE TABLE `_new_question_1494409249` (
  `id` int(11) NOT NULL,
  `sn` int(11) NOT NULL,
  `cbt_exam` int(11) NOT NULL,
  `question` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ar` enum('a','b','c','d','e') NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `e` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `_new_question_1494409262`
--

CREATE TABLE `_new_question_1494409262` (
  `id` int(11) NOT NULL,
  `sn` int(11) NOT NULL,
  `cbt_exam` int(11) NOT NULL,
  `question` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ar` enum('a','b','c','d','e') NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `e` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cbt_exams`
--
ALTER TABLE `cbt_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbt_exams_type`
--
ALTER TABLE `cbt_exams_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbt_subjects`
--
ALTER TABLE `cbt_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbt_subscription`
--
ALTER TABLE `cbt_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropcognitive_domain`
--
ALTER TABLE `dropcognitive_domain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropgrades_domain`
--
ALTER TABLE `dropgrades_domain`
  ADD PRIMARY KEY (`grades_domain_desc`),
  ADD UNIQUE KEY `grades_domain_id` (`grades_domain_id`);

--
-- Indexes for table `ethnicity`
--
ALTER TABLE `ethnicity`
  ADD PRIMARY KEY (`ethnicity_id`);

--
-- Indexes for table `exams_types`
--
ALTER TABLE `exams_types`
  ADD PRIMARY KEY (`exams_types_id`),
  ADD UNIQUE KEY `exams_types_desc` (`exams_types_desc`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grades_id`);

--
-- Indexes for table `grade_history_primary`
--
ALTER TABLE `grade_history_primary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_subjects`
--
ALTER TABLE `grade_subjects`
  ADD PRIMARY KEY (`grade_subject_id`),
  ADD UNIQUE KEY `grade_subject_desc` (`grade_subject_desc`);

--
-- Indexes for table `grade_terms`
--
ALTER TABLE `grade_terms`
  ADD PRIMARY KEY (`grade_terms_id`);

--
-- Indexes for table `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`school_years_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `staff_email` (`staff_email`);

--
-- Indexes for table `staff_role`
--
ALTER TABLE `staff_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_report_cards`
--
ALTER TABLE `std_report_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentbio`
--
ALTER TABLE `studentbio`
  ADD PRIMARY KEY (`studentbio_id`),
  ADD UNIQUE KEY `studentbio_internalid_3` (`studentbio_internalid`),
  ADD KEY `studentbio_internalidndx` (`studentbio_internalid`),
  ADD KEY `studentbio_internalid` (`studentbio_internalid`),
  ADD KEY `studentbio_internalid_2` (`studentbio_internalid`);

--
-- Indexes for table `student_grade_year`
--
ALTER TABLE `student_grade_year`
  ADD PRIMARY KEY (`student_grade_year_id`);

--
-- Indexes for table `tbl_admission`
--
ALTER TABLE `tbl_admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admit_code`
--
ALTER TABLE `tbl_admit_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_app_config`
--
ALTER TABLE `tbl_app_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `module` (`module`);

--
-- Indexes for table `tbl_automatics`
--
ALTER TABLE `tbl_automatics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barned_words`
--
ALTER TABLE `tbl_barned_words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_config`
--
ALTER TABLE `tbl_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_grade_domains`
--
ALTER TABLE `tbl_grade_domains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_school_domains`
--
ALTER TABLE `tbl_school_domains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_school_profile`
--
ALTER TABLE `tbl_school_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD PRIMARY KEY (`state_code`),
  ADD UNIQUE KEY `state_code` (`state_code`);

--
-- Indexes for table `tbl_std_denomination`
--
ALTER TABLE `tbl_std_denomination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_titles`
--
ALTER TABLE `tbl_titles`
  ADD PRIMARY KEY (`title_id`);

--
-- Indexes for table `teacher_grade_year`
--
ALTER TABLE `teacher_grade_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_parents`
--
ALTER TABLE `web_parents`
  ADD PRIMARY KEY (`web_parents_id`),
  ADD UNIQUE KEY `web_parents_username` (`web_parents_username`);

--
-- Indexes for table `web_students`
--
ALTER TABLE `web_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identify` (`identify`),
  ADD UNIQUE KEY `user_n` (`user_n`);

--
-- Indexes for table `web_users`
--
ALTER TABLE `web_users`
  ADD PRIMARY KEY (`web_users_id`),
  ADD UNIQUE KEY `web_users_username` (`web_users_username`);

--
-- Indexes for table `_new_answer_1494335095`
--
ALTER TABLE `_new_answer_1494335095`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_new_answer_1494335160`
--
ALTER TABLE `_new_answer_1494335160`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_new_answer_1494409240`
--
ALTER TABLE `_new_answer_1494409240`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_new_answer_1494409249`
--
ALTER TABLE `_new_answer_1494409249`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_new_answer_1494409262`
--
ALTER TABLE `_new_answer_1494409262`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_new_question_1494335095`
--
ALTER TABLE `_new_question_1494335095`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_new_question_1494335160`
--
ALTER TABLE `_new_question_1494335160`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_new_question_1494409240`
--
ALTER TABLE `_new_question_1494409240`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_new_question_1494409249`
--
ALTER TABLE `_new_question_1494409249`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_new_question_1494409262`
--
ALTER TABLE `_new_question_1494409262`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cbt_exams`
--
ALTER TABLE `cbt_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cbt_exams_type`
--
ALTER TABLE `cbt_exams_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cbt_subjects`
--
ALTER TABLE `cbt_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cbt_subscription`
--
ALTER TABLE `cbt_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dropcognitive_domain`
--
ALTER TABLE `dropcognitive_domain`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dropgrades_domain`
--
ALTER TABLE `dropgrades_domain`
  MODIFY `grades_domain_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ethnicity`
--
ALTER TABLE `ethnicity`
  MODIFY `ethnicity_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `exams_types`
--
ALTER TABLE `exams_types`
  MODIFY `exams_types_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grades_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grade_history_primary`
--
ALTER TABLE `grade_history_primary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_subjects`
--
ALTER TABLE `grade_subjects`
  MODIFY `grade_subject_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `grade_terms`
--
ALTER TABLE `grade_terms`
  MODIFY `grade_terms_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_grade_year`
--
ALTER TABLE `student_grade_year`
  MODIFY `student_grade_year_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `web_students`
--
ALTER TABLE `web_students`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `_new_answer_1494335095`
--
ALTER TABLE `_new_answer_1494335095`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_new_answer_1494335160`
--
ALTER TABLE `_new_answer_1494335160`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `_new_answer_1494409240`
--
ALTER TABLE `_new_answer_1494409240`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `_new_answer_1494409249`
--
ALTER TABLE `_new_answer_1494409249`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_new_answer_1494409262`
--
ALTER TABLE `_new_answer_1494409262`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_new_question_1494335095`
--
ALTER TABLE `_new_question_1494335095`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_new_question_1494335160`
--
ALTER TABLE `_new_question_1494335160`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `_new_question_1494409240`
--
ALTER TABLE `_new_question_1494409240`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `_new_question_1494409249`
--
ALTER TABLE `_new_question_1494409249`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_new_question_1494409262`
--
ALTER TABLE `_new_question_1494409262`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
