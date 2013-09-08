-- --------------------------------------------------------
-- Host:                         192.168.1.222
-- Server version:               5.1.49-1ubuntu8.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-08-02 20:28:15
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for sample_ci
CREATE DATABASE IF NOT EXISTS `sample_ci` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sample_ci`;


-- Dumping structure for table sample_ci.ci_sessions
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(255) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `session_data` longtext NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sample_ci.ci_sessions: 0 rows
DELETE FROM `ci_sessions`;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


-- Dumping structure for table sample_ci.login
DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `company` varchar(255) DEFAULT '',
  `ip_address` varchar(255) DEFAULT '',
  `status` enum('1','0') DEFAULT '1',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table sample_ci.login: ~10 rows (approximately)
DELETE FROM `login`;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id`, `name`, `email`, `company`, `ip_address`, `status`, `date_added`, `last_modified`) VALUES
	(1, 'T. Satyanarayana Raju', 'rajutsn@gmail.com', 'Enterpi', '192.168.1.18', '1', '2012-08-02 16:20:33', '2012-08-02 16:20:33'),
	(2, 'Manmohan', 'rich.mmj@gmail.com', 'Enterpi', '192.168.1.18', '1', '2012-08-02 16:20:33', '2012-08-02 16:20:33'),
	(3, 'Narsi', 'narsiatwork100@gmail.com', 'Enterpi', '192.168.1.18', '1', '2012-08-02 16:20:33', '2012-08-02 16:20:33'),
	(4, 'Swetha', 'swetha.epi@gmail.com', 'Enterpi', '192.168.1.18', '1', '2012-08-02 16:20:33', '2012-08-02 16:20:33'),
	(5, 'Name', 'email@email.com', 'Company Name', '192.168.1.56', '0', '2012-08-02 18:56:00', '2012-08-02 18:56:00'),
	(6, 'M.RajaShekar Reddy', 'rajut@gmail.com', 'Enterpi', '192.168.1.18', '1', '2012-08-02 19:09:48', '2012-08-02 19:09:48'),
	(7, 'Satyanarayana Raju', 'rajutsn@gmail.com', 'Enterpi', '', '1', '2012-08-02 19:57:33', '2012-08-02 19:57:33'),
	(8, 'Ram Raju', 'rajutsn@gmail.com', 'Enterpi', '', '1', '2012-08-02 20:02:21', '2012-08-02 20:02:21'),
	(9, 'Rama Raju', 'rajutsn@gmail.com', 'Enterpi', '', '1', '2012-08-02 20:02:40', '2012-08-02 20:02:40'),
	(10, 'AAA Raju', 'rajutsn@gmail.com', 'Enterpi', '', '1', '2012-08-02 20:08:08', '2012-08-02 20:15:16');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
