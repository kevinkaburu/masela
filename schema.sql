-- Adminer 4.7.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

create database if not exist travel_planner;
use travel_planner;

DROP TABLE IF EXISTS `accomodation`;
CREATE TABLE `accomodation` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(160) DEFAULT NULL,
  `type` enum('checkin','checkout') NOT NULL,
  `time` time DEFAULT NULL,
  `notes` varchar(1200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(160) DEFAULT NULL,
  `location` varchar(120) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `notes` varchar(1200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `code` varchar(4) NOT NULL,
  `flag_img` varchar(70) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `country`;
INSERT INTO `country` (`country_id`, `name`, `code`, `flag_img`, `created`, `modified`) VALUES
(57,	'Afghanistan',	'AF',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(58,	'Albania',	'AL',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(59,	'Algeria',	'DZ',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(60,	'American Samoa',	'AS',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(61,	'Andorra',	'AD',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(62,	'Angola',	'AO',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(63,	'Anguilla',	'AI',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(64,	'Antarctica',	'AQ',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(65,	'Antigua And Barbuda',	'AG',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(66,	'Argentina',	'AR',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(67,	'Armenia',	'AM',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(68,	'Aruba',	'AW',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(69,	'Australia',	'AU',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(70,	'Austria',	'AT',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(71,	'Azerbaijan',	'AZ',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(72,	'Bahamas',	'BS',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(73,	'Bahrain',	'BH',	'',	'2020-12-16 23:21:03',	'2020-12-16 20:21:03'),
(74,	'Bangladesh',	'BD',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(75,	'Barbados',	'BB',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(76,	'Belarus',	'BY',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(77,	'Belgium',	'BE',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(78,	'Belize',	'BZ',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(79,	'Benin',	'BJ',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(80,	'Bermuda',	'BM',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(81,	'Bhutan',	'BT',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(82,	'Bolivia',	'BO',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(83,	'Bosnia And Herzegovina',	'BA',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(84,	'Botswana',	'BW',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(85,	'Bouvet Island',	'BV',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(86,	'Brazil',	'BR',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(87,	'British Indian Ocean Territory',	'IO',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(88,	'Brunei Darussalam',	'BN',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(89,	'Bulgaria',	'BG',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(90,	'Burkina Faso',	'BF',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(91,	'Burundi',	'BI',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(92,	'Cambodia',	'KH',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(93,	'Cameroon',	'CM',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(94,	'Canada',	'CA',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(95,	'Cape Verde',	'CV',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(96,	'Cayman Islands',	'KY',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(97,	'Central African Republic',	'CF',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(98,	'Chad',	'TD',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(99,	'Chile',	'CL',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(100,	'China',	'CN',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(101,	'Christmas Island',	'CX',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(102,	'Cocos (keeling) Islands',	'CC',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(103,	'Colombia',	'CO',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(104,	'Comoros',	'KM',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(105,	'Congo',	'CG',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(106,	'Congo, The Democratic Republic Of The',	'CD',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(107,	'Cook Islands',	'CK',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(108,	'Costa Rica',	'CR',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(109,	'Cote D\'ivoire',	'CI',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(110,	'Croatia',	'HR',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(111,	'Cuba',	'CU',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(112,	'Cyprus',	'CY',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(113,	'Czech Republic',	'CZ',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(114,	'Denmark',	'DK',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(115,	'Djibouti',	'DJ',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(116,	'Dominica',	'DM',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(117,	'Dominican Republic',	'DO',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(118,	'East Timor',	'TP',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(119,	'Ecuador',	'EC',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(120,	'Egypt',	'EG',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(121,	'El Salvador',	'SV',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(122,	'Equatorial Guinea',	'GQ',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(123,	'Eritrea',	'ER',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(124,	'Estonia',	'EE',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(125,	'Ethiopia',	'ET',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(126,	'Falkland Islands (malvinas)',	'FK',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(127,	'Faroe Islands',	'FO',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(128,	'Fiji',	'FJ',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(129,	'Finland',	'FI',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(130,	'France',	'FR',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(131,	'French Guiana',	'GF',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(132,	'French Polynesia',	'PF',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(133,	'French Southern Territories',	'TF',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(134,	'Gabon',	'GA',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(135,	'Gambia',	'GM',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(136,	'Georgia',	'GE',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(137,	'Germany',	'DE',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(138,	'Ghana',	'GH',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(139,	'Gibraltar',	'GI',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(140,	'Greece',	'GR',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(141,	'Greenland',	'GL',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(142,	'Grenada',	'GD',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(143,	'Guadeloupe',	'GP',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(144,	'Guam',	'GU',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(145,	'Guatemala',	'GT',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(146,	'Guinea',	'GN',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(147,	'Guinea-bissau',	'GW',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(148,	'Guyana',	'GY',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(149,	'Haiti',	'HT',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(150,	'Heard Island And Mcdonald Islands',	'HM',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(151,	'Holy See (vatican City State)',	'VA',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(152,	'Honduras',	'HN',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(153,	'Hong Kong',	'HK',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(154,	'Hungary',	'HU',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(155,	'Iceland',	'IS',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(156,	'India',	'IN',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(157,	'Indonesia',	'ID',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(158,	'Iran, Islamic Republic Of',	'IR',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(159,	'Iraq',	'IQ',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(160,	'Ireland',	'IE',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(161,	'Israel',	'IL',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(162,	'Italy',	'IT',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(163,	'Jamaica',	'JM',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(164,	'Japan',	'JP',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(165,	'Jordan',	'JO',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(166,	'Kazakstan',	'KZ',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(167,	'Kenya',	'KE',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(168,	'Kiribati',	'KI',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(169,	'Korea, Democratic People\'s Republic Of',	'KP',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(170,	'Korea, Republic Of',	'KR',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(171,	'Kosovo',	'KV',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(172,	'Kuwait',	'KW',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(173,	'Kyrgyzstan',	'KG',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(174,	'Lao People\'s Democratic Republic',	'LA',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(175,	'Latvia',	'LV',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(176,	'Lebanon',	'LB',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(177,	'Lesotho',	'LS',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(178,	'Liberia',	'LR',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(179,	'Libyan Arab Jamahiriya',	'LY',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(180,	'Liechtenstein',	'LI',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(181,	'Lithuania',	'LT',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(182,	'Luxembourg',	'LU',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(183,	'Macau',	'MO',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(184,	'Macedonia, The Former Yugoslav Republic Of',	'MK',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(185,	'Madagascar',	'MG',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(186,	'Malawi',	'MW',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(187,	'Malaysia',	'MY',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(188,	'Maldives',	'MV',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(189,	'Mali',	'ML',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(190,	'Malta',	'MT',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(191,	'Marshall Islands',	'MH',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(192,	'Martinique',	'MQ',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(193,	'Mauritania',	'MR',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(194,	'Mauritius',	'MU',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(195,	'Mayotte',	'YT',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(196,	'Mexico',	'MX',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(197,	'Micronesia, Federated States Of',	'FM',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(198,	'Moldova, Republic Of',	'MD',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(199,	'Monaco',	'MC',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(200,	'Mongolia',	'MN',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(201,	'Montserrat',	'MS',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(202,	'Montenegro',	'ME',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(203,	'Morocco',	'MA',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(204,	'Mozambique',	'MZ',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(205,	'Myanmar',	'MM',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(206,	'Namibia',	'NA',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(207,	'Nauru',	'NR',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(208,	'Nepal',	'NP',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(209,	'Netherlands',	'NL',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(210,	'Netherlands Antilles',	'AN',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(211,	'New Caledonia',	'NC',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(212,	'New Zealand',	'NZ',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(213,	'Nicaragua',	'NI',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(214,	'Niger',	'NE',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(215,	'Nigeria',	'NG',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(216,	'Niue',	'NU',	'',	'2020-12-16 23:21:04',	'2020-12-16 20:21:04'),
(217,	'Norfolk Island',	'NF',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(218,	'Northern Mariana Islands',	'MP',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(219,	'Norway',	'NO',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(220,	'Oman',	'OM',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(221,	'Pakistan',	'PK',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(222,	'Palau',	'PW',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(223,	'Palestinian Territory, Occupied',	'PS',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(224,	'Panama',	'PA',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(225,	'Papua New Guinea',	'PG',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(226,	'Paraguay',	'PY',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(227,	'Peru',	'PE',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(228,	'Philippines',	'PH',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(229,	'Pitcairn',	'PN',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(230,	'Poland',	'PL',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(231,	'Portugal',	'PT',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(232,	'Puerto Rico',	'PR',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(233,	'Qatar',	'QA',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(234,	'Reunion',	'RE',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(235,	'Romania',	'RO',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(236,	'Russian Federation',	'RU',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(237,	'Rwanda',	'RW',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(238,	'Saint Helena',	'SH',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(239,	'Saint Kitts And Nevis',	'KN',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(240,	'Saint Lucia',	'LC',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(241,	'Saint Pierre And Miquelon',	'PM',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(242,	'Saint Vincent And The Grenadines',	'VC',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(243,	'Samoa',	'WS',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(244,	'San Marino',	'SM',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(245,	'Sao Tome And Principe',	'ST',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(246,	'Saudi Arabia',	'SA',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(247,	'Senegal',	'SN',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(248,	'Serbia',	'RS',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(249,	'Seychelles',	'SC',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(250,	'Sierra Leone',	'SL',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(251,	'Singapore',	'SG',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(252,	'Slovakia',	'SK',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(253,	'Slovenia',	'SI',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(254,	'Solomon Islands',	'SB',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(255,	'Somalia',	'SO',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(256,	'South Africa',	'ZA',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(257,	'South Georgia And The South Sandwich Islands',	'GS',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(258,	'Spain',	'ES',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(259,	'Sri Lanka',	'LK',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(260,	'Sudan',	'SD',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(261,	'Suriname',	'SR',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(262,	'Svalbard And Jan Mayen',	'SJ',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(263,	'Swaziland',	'SZ',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(264,	'Sweden',	'SE',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(265,	'Switzerland',	'CH',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(266,	'Syrian Arab Republic',	'SY',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(267,	'Taiwan, Province Of China',	'TW',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(268,	'Tajikistan',	'TJ',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(269,	'Tanzania, United Republic Of',	'TZ',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(270,	'Thailand',	'TH',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(271,	'Togo',	'TG',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(272,	'Tokelau',	'TK',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(273,	'Tonga',	'TO',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(274,	'Trinidad And Tobago',	'TT',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(275,	'Tunisia',	'TN',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(276,	'Turkey',	'TR',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(277,	'Turkmenistan',	'TM',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(278,	'Turks And Caicos Islands',	'TC',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(279,	'Tuvalu',	'TV',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(280,	'Uganda',	'UG',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(281,	'Ukraine',	'UA',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(282,	'United Arab Emirates',	'AE',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(283,	'United Kingdom',	'GB',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(284,	'United States',	'US',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(285,	'United States Minor Outlying Islands',	'UM',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(286,	'Uruguay',	'UY',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(287,	'Uzbekistan',	'UZ',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(288,	'Vanuatu',	'VU',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(289,	'Venezuela',	'VE',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(290,	'Viet Nam',	'VN',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(291,	'Virgin Islands, British',	'VG',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(292,	'Virgin Islands, U.s.',	'VI',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(293,	'Wallis And Futuna',	'WF',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(294,	'Western Sahara',	'EH',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(295,	'Yemen',	'YE',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(296,	'Zambia',	'ZM',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05'),
(297,	'Zimbabwe',	'ZW',	'',	'2020-12-16 23:21:05',	'2020-12-16 20:21:05');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `itinerary`;
CREATE TABLE `itinerary` (
  `itinerary_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('activity','transport','accomodation') DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `trip_date_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`itinerary_id`),
  KEY `resource_id` (`event_id`),
  KEY `trip_date_id` (`trip_date_id`),
  CONSTRAINT `itinerary_ibfk_2` FOREIGN KEY (`trip_date_id`) REFERENCES `trip_date` (`trip_date_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `itinerary_order`;
CREATE TABLE `itinerary_order` (
  `itinerary_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `itinerary_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`itinerary_order_id`),
  KEY `itinerary_id` (`itinerary_id`),
  CONSTRAINT `itinerary_order_ibfk_1` FOREIGN KEY (`itinerary_id`) REFERENCES `itinerary` (`itinerary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `operator`;
CREATE TABLE `operator` (
  `operator_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `description` varchar(1200) DEFAULT NULL,
  `logo_img` varchar(70) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`operator_id`),
  KEY `country_id` (`country_id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `operator_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`),
  CONSTRAINT `operator_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `operator_user`;
CREATE TABLE `operator_user` (
  `operator_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `operator_id` int(11) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `role` varchar(70) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`operator_user_id`),
  KEY `operator_id` (`operator_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `operator_user_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `operator` (`operator_id`),
  CONSTRAINT `operator_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `resource`;
CREATE TABLE `resource` (
  `resource_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `type` enum('hotel','lodge','park','beach') NOT NULL,
  `url` varchar(120) DEFAULT NULL,
  `description` varchar(600) DEFAULT NULL,
  `location` varchar(80) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `operator_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`resource_id`),
  KEY `operator_id` (`operator_id`),
  CONSTRAINT `resource_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `operator` (`operator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `transport`;
CREATE TABLE `transport` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(160) DEFAULT NULL,
  `from` varchar(160) DEFAULT NULL,
  `to` varchar(160) DEFAULT NULL,
  `type` enum('Drive','Cruise','Flight') DEFAULT NULL,
  `notes` varchar(1200) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `trip`;
CREATE TABLE `trip` (
  `trip_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(160) NOT NULL,
  `includes` varchar(3000) DEFAULT NULL,
  `excludes` varchar(3000) DEFAULT NULL,
  `trip_amount` decimal(14,2) DEFAULT NULL,
  `operator_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `type` enum('PUBLIC','PRIVATE') NOT NULL,
  `start_date` date NOT NULL,
  `cover_image` varchar(70) DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`trip_id`),
  KEY `operator_id` (`operator_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `trip_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `operator` (`operator_id`),
  CONSTRAINT `trip_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `trip_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `trip_date`;
CREATE TABLE `trip_date` (
  `trip_date_id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `trip_date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`trip_date_id`),
  KEY `trip_id` (`trip_id`),
  CONSTRAINT `trip_date_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2020-12-16 20:21:37