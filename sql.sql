-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.36 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for cba_db
DROP DATABASE IF EXISTS `cba_db`;
CREATE DATABASE IF NOT EXISTS `cba_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cba_db`;


-- Dumping structure for table cba_db.courses
DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cba_db.courses: ~4 rows (approximately)
DELETE FROM `courses`;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'BSHM', 'Bachelor of Science in Hospitality Management', '2014-02-25 17:40:20', '2014-02-25 17:40:20'),
	(2, 'BSBA', 'Bachelor of Science in Business Administration', '2014-02-25 18:53:36', '2014-02-25 18:53:36'),
	(3, 'AHM', 'Associate in Hospitality Management', '2014-02-25 19:39:18', '2014-02-25 19:39:18'),
	(4, 'BSACC', 'Bachelor of Science in Accountancy', '2014-03-01 09:19:23', '2014-03-01 09:19:23');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;


-- Dumping structure for table cba_db.curriculums
DROP TABLE IF EXISTS `curriculums`;
CREATE TABLE IF NOT EXISTS `curriculums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) unsigned NOT NULL,
  `sy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_curriculums_courses` (`course_id`),
  CONSTRAINT `FK_curriculums_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cba_db.curriculums: ~4 rows (approximately)
DELETE FROM `curriculums`;
/*!40000 ALTER TABLE `curriculums` DISABLE KEYS */;
INSERT INTO `curriculums` (`id`, `course_id`, `sy`, `description`, `created_at`, `updated_at`) VALUES
	(2, 1, '2013-2014', 'Revised Curriculum for BSHM and AHM Effective 1st semester SY 2013-2014', '2014-02-25 18:38:10', '2014-02-25 18:52:16'),
	(3, 2, '2012-2013', 'Effective First Semester of SY 2013-2014 Per CHED Memo Order No. 06, Series of 2012', '2014-02-25 18:56:49', '2014-02-25 18:58:26'),
	(4, 3, '2013-2014', 'Revised Curriculum for BSHM and AHM Effective 1st semester SY 2013-2014', '2014-02-25 19:40:16', '2014-02-26 00:59:56'),
	(5, 1, '2012-2013', 'Test', '2014-02-26 02:00:33', '2014-02-26 02:00:33');
/*!40000 ALTER TABLE `curriculums` ENABLE KEYS */;


-- Dumping structure for table cba_db.curriculum_subject
DROP TABLE IF EXISTS `curriculum_subject`;
CREATE TABLE IF NOT EXISTS `curriculum_subject` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curriculum_id` int(11) unsigned NOT NULL,
  `subject_id` int(11) unsigned NOT NULL,
  `year_lvl` enum('1','2','3','4') COLLATE utf8_unicode_ci NOT NULL,
  `semester` enum('First','Second') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_curriculum_subject_curriculums` (`curriculum_id`),
  KEY `FK_curriculum_subject_subjects` (`subject_id`),
  CONSTRAINT `FK_curriculum_subject_curriculums` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_curriculum_subject_subjects` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cba_db.curriculum_subject: ~1 rows (approximately)
DELETE FROM `curriculum_subject`;
/*!40000 ALTER TABLE `curriculum_subject` DISABLE KEYS */;
INSERT INTO `curriculum_subject` (`id`, `curriculum_id`, `subject_id`, `year_lvl`, `semester`, `created_at`, `updated_at`) VALUES
	(1, 4, 1, '1', 'First', '2014-03-02 16:51:19', '2014-03-02 16:51:28');
/*!40000 ALTER TABLE `curriculum_subject` ENABLE KEYS */;


-- Dumping structure for table cba_db.enrollments
DROP TABLE IF EXISTS `enrollments`;
CREATE TABLE IF NOT EXISTS `enrollments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) unsigned NOT NULL,
  `curriculum_subject_id` int(11) unsigned NOT NULL,
  `subject_id` int(11) unsigned NOT NULL,
  `teacher_id` int(11) unsigned DEFAULT NULL,
  `grade` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_enrollments_students` (`student_id`),
  KEY `FK_enrollments_curriculum_subject` (`curriculum_subject_id`),
  KEY `FK_enrollments_subjects` (`subject_id`),
  KEY `FK_enrollments_teachers` (`teacher_id`),
  CONSTRAINT `FK_enrollments_curriculum_subject` FOREIGN KEY (`curriculum_subject_id`) REFERENCES `curriculum_subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_enrollments_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_enrollments_subjects` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_enrollments_teachers` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cba_db.enrollments: ~0 rows (approximately)
DELETE FROM `enrollments`;
/*!40000 ALTER TABLE `enrollments` DISABLE KEYS */;
/*!40000 ALTER TABLE `enrollments` ENABLE KEYS */;


-- Dumping structure for table cba_db.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cba_db.migrations: ~11 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2014_02_25_074046_create_subjects_table', 1),
	('2014_02_25_074326_create_prerequisites_table', 2),
	('2014_02_25_080437_create_courses_table', 3),
	('2014_02_25_082243_create_curriculums_table', 4),
	('2014_02_25_082626_pivot_curriculum_subject_table', 4),
	('2014_02_25_083004_create_students_table', 5),
	('2014_02_25_083632_create_enrollments_table', 6),
	('2014_02_25_084535_create_teachers_table', 7),
	('2014_02_25_084701_create_users_table', 8),
	('2014_02_25_090854_create_settings_table', 9),
	('2014_02_25_190501_create_curriculum_subject_table', 10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table cba_db.pages
DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa-icon-reorder',
  `order` int(11) NOT NULL,
  `only_admin` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cba_db.pages: ~9 rows (approximately)
DELETE FROM `pages`;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `name`, `route`, `icon`, `order`, `only_admin`, `created_at`, `updated_at`) VALUES
	(7, 'Home', '/', 'fa-icon-home', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 'Courses', 'courses', 'fa-icon-reorder', 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 'Subjects', 'subjects', 'fa-icon-reorder', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 'Students', 'students', 'fa-icon-user', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(11, 'Teachers', 'teachers', 'fa-icon-user', 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, 'Submit Grades', 'submit-grades', 'fa-icon-retweet', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, 'Home', '/', 'fa-icon-home', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, 'Users', 'users', 'fa-icon-user', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, 'About Us', 'about-us', 'fa-icon-info-sign', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(16, 'Evaluate', 'evaluate', 'fa-icon-reorder', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;


-- Dumping structure for table cba_db.prerequisites
DROP TABLE IF EXISTS `prerequisites`;
CREATE TABLE IF NOT EXISTS `prerequisites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `curr_subj_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cba_db.prerequisites: ~12 rows (approximately)
DELETE FROM `prerequisites`;
/*!40000 ALTER TABLE `prerequisites` DISABLE KEYS */;
INSERT INTO `prerequisites` (`id`, `subject_id`, `curr_subj_id`, `created_at`, `updated_at`) VALUES
	(13, 3, 5, '2014-02-25 23:03:19', '2014-02-25 23:03:19'),
	(14, 3, 3, '2014-02-25 23:04:10', '2014-02-25 23:04:10'),
	(15, 4, 3, '2014-02-25 23:04:10', '2014-02-25 23:04:10'),
	(16, 1, 4, '2014-02-25 23:10:44', '2014-02-25 23:10:44'),
	(17, 3, 4, '2014-02-25 23:10:44', '2014-02-25 23:10:44'),
	(18, 4, 4, '2014-02-25 23:10:44', '2014-02-25 23:10:44'),
	(19, 10, 7, '2014-02-25 23:19:17', '2014-02-25 23:19:17'),
	(20, 3, 15, '2014-02-26 06:45:37', '2014-02-26 06:45:37'),
	(24, 1, 1, '2014-03-02 16:51:28', '2014-03-02 16:51:28'),
	(25, 4, 1, '2014-03-02 16:51:28', '2014-03-02 16:51:28'),
	(26, 5, 1, '2014-03-02 16:51:28', '2014-03-02 16:51:28'),
	(27, 10, 1, '2014-03-02 16:51:28', '2014-03-02 16:51:28');
/*!40000 ALTER TABLE `prerequisites` ENABLE KEYS */;


-- Dumping structure for table cba_db.settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vision` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mission` longtext COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cba_db.settings: ~1 rows (approximately)
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `site_name`, `vision`, `mission`, `short_name`, `created_at`, `updated_at`) VALUES
	(1, 'College of Business Administration <br/> Negros Oriental State University - Siaton Campus <br/> Information and  Evaluation System', 'Content', 'Mission', 'CBA NORSU Evaluation System', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Dumping structure for table cba_db.students
DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) unsigned DEFAULT NULL,
  `curriculum_id` int(11) unsigned DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bdate` date NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_students_courses` (`course_id`),
  KEY `FK_students_curriculums` (`curriculum_id`),
  CONSTRAINT `FK_students_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `FK_students_curriculums` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculums` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cba_db.students: ~4 rows (approximately)
DELETE FROM `students`;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `course_id`, `curriculum_id`, `fname`, `mname`, `lname`, `bdate`, `gender`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'Asshurim', 'Ortado', 'Larita', '2014-02-25', 'Male', '0000-00-00 00:00:00', '2014-03-01 08:56:04'),
	(2, 3, 4, 'Reyna', 'L', 'Meraveles', '2014-02-20', 'Male', '2014-02-26 00:02:56', '2014-02-26 00:11:27'),
	(3, 2, 3, 'Shaynie', 'Gale', 'Toylo', '2014-02-13', 'Female', '2014-02-26 00:10:19', '2014-02-26 00:10:19'),
	(4, 2, 3, 'Skythale', 'Peralta', 'Cruz', '2014-02-13', 'Female', '2014-02-26 04:44:01', '2014-02-26 04:44:01');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;


-- Dumping structure for table cba_db.subjects
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sub_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `units` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cba_db.subjects: ~5 rows (approximately)
DELETE FROM `subjects`;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`, `sub_code`, `description`, `units`, `created_at`, `updated_at`) VALUES
	(1, 'Eng 0', 'Remedial English', 0, '0000-00-00 00:00:00', '2014-03-01 09:13:40'),
	(4, 'Math 113', 'Business Math', 3, '2014-02-25 20:01:42', '2014-02-25 20:01:42'),
	(5, 'PE 112', 'Recreational Games and Sports', 3, '2014-02-25 20:57:14', '2014-02-25 21:03:42'),
	(9, 'Eng 112', 'Writing in Discipline', 3, '2014-02-25 23:16:54', '2014-02-25 23:16:54'),
	(10, 'Eng 111', 'Study and Thinking Skills', 3, '2014-02-25 23:18:06', '2014-02-25 23:18:06');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;


-- Dumping structure for table cba_db.teachers
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cba_db.teachers: ~5 rows (approximately)
DELETE FROM `teachers`;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` (`id`, `user_id`, `fname`, `mname`, `lname`, `gender`, `created_at`, `updated_at`) VALUES
	(1, 0, 'Briggiddo', 'Tapales', 'Horcerada', 'Male', '0000-00-00 00:00:00', '2014-02-26 04:24:05'),
	(2, 0, 'Asshurim Joy', 'Ortado', 'Larita', 'Male', '2014-02-26 04:19:39', '2014-02-26 04:19:39'),
	(3, 3, 'Ash', 'O', 'Larita', 'Male', '2014-02-26 05:48:23', '2014-02-26 05:48:23'),
	(4, 7, 'Roche', 'C', 'Cabanlit', 'Male', '2014-03-01 09:02:30', '2014-03-01 09:02:30'),
	(5, 8, 'Reymil', 'C', 'Cadapan', 'Male', '2014-03-01 09:02:58', '2014-03-01 09:02:58');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;


-- Dumping structure for table cba_db.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cba_db.users: ~5 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin', '$2y$10$Jn7Vb3T.EPourrcKz9U22eLDOqZeOZs..kKdpCVCGo7fCPlvrNHVK', 1, '2014-02-25 08:54:32', '2014-02-25 08:54:32'),
	(3, 'Ash', 'asshurim', '$2y$10$iXaq95EBR5CwvU8J0XiY8OTAEScsD9IX4CzURtvNus.zI0P5RWoxm', 0, '2014-02-26 05:48:23', '2014-02-26 05:48:23'),
	(4, 'Reyna Meraveles', 'reyna', '$2y$10$Z6XhKf7.s9XYMmvWcC7ESeewKf0XBAf3AbjXqrUuw2Frfn5F4qj7e', 1, '2014-03-01 07:29:08', '2014-03-01 07:58:32'),
	(7, 'Roche', 'roche', '$2y$10$M2/5X7BODU35SIfAZZfjp.312Fbrc/IwWUGFrZwnTVBN5b0/fuA1O', 0, '2014-03-01 09:02:29', '2014-03-01 09:02:29'),
	(8, 'Reymil', 'reymil', '$2y$10$3bzeG9vt0/ZGmvcqjY.2eOmlWnEQmrjkCCn5DkVKESJVBI7Dv5mWK', 0, '2014-03-01 09:02:58', '2014-03-01 09:02:58');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
