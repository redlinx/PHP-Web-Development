-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2018 at 11:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_student_rms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `display_students` ()  BEGIN

	SELECT s.stud_id,
		s.stud_lname,
		s.stud_fname,
		s.stud_mname,
		s.stud_email,
		s.stud_mob_no,
		s.stud_bday,
		p.prog_desc, 
		u.univ_name,
		u.univ_address
	FROM student s,program p, college c, university u, academic_degree_level adl
	WHERE s.prog_id = p.prog_id AND 
		  p.col_id = c.col_id AND
		  c.univ_id = u.univ_id AND 
		  p.acad_dl_id = adl.acad_dl_id 
	ORDER BY p.acad_dl_id DESC, s.stud_lname ASC;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_student` (IN `sLname` VARCHAR(45), IN `sFname` VARCHAR(45), IN `sMname` VARCHAR(45), IN `sEmail` VARCHAR(45), IN `sMobNo` VARCHAR(45), IN `sBday` DATE, IN `p_id` INT)  BEGIN

	INSERT INTO `student` (`stud_lname`, 
						   `stud_fname`, 
						   `stud_mname`, 
					       `stud_email`, 
						   `stud_mob_no`, 
						   `stud_bday`, 
					       `prog_id`) 
	VALUES (sLname, 
			sFname, 
			sMname, 
			sEmail, 
			sMobNo, 
			sBday, 
			p_id);

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `academic_degree_level`
--

CREATE TABLE `academic_degree_level` (
  `acad_dl_id` int(11) NOT NULL,
  `acad_dl_desc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_degree_level`
--

INSERT INTO `academic_degree_level` (`acad_dl_id`, `acad_dl_desc`) VALUES
(1, 'Undergraduate Degree'),
(2, 'Graduate Degree'),
(3, 'Post Graduate Degree');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `col_id` int(11) NOT NULL,
  `col_code` varchar(45) DEFAULT NULL,
  `col_name` varchar(80) DEFAULT NULL,
  `date_time_log` datetime DEFAULT CURRENT_TIMESTAMP,
  `univ_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`col_id`, `col_code`, `col_name`, `date_time_log`, `univ_id`) VALUES
(1, 'SLSU-CCSIT', 'College of Computer Studies and Information Technology', '2018-09-30 07:05:03', 2),
(2, 'VSU-COE', 'College of Engineering', '2018-11-23 09:12:13', 1),
(3, 'UIC-ITE', 'Information Technology Education', '2018-11-23 09:18:11', 3),
(4, 'CITU-CCS', 'College of Computer Studies', '2018-11-23 12:43:58', 5),
(5, 'UPD-CCS', 'College of Computer Studies', '2018-11-23 12:50:39', 4);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `prog_id` int(11) NOT NULL,
  `prod_code` varchar(45) DEFAULT NULL,
  `prog_desc` varchar(45) DEFAULT NULL,
  `col_id` int(11) NOT NULL,
  `acad_dl_id` int(11) NOT NULL,
  `date_time_log` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`prog_id`, `prod_code`, `prog_desc`, `col_id`, `acad_dl_id`, `date_time_log`) VALUES
(1, 'SLSU-BSInfoTech', 'Bachelor of Science in Information Technology', 1, 1, '2018-09-30 07:52:33'),
(2, 'VSU-BSCS', 'Bachelor of Science in Computer Science', 2, 1, '2018-11-23 09:14:13'),
(3, 'UIC-BSCS', 'Bachelor of Science in Computer Science', 3, 1, '2018-11-23 09:19:43'),
(8, 'CITU-CCS', 'Bachelor of Science in Computer Science', 4, 1, '2018-11-23 12:47:27'),
(9, 'CITU-DIT', 'Doctor in Information Technology', 4, 3, '2018-11-23 12:49:01'),
(10, 'UPD-BSCS', 'Bachelor of Science in Computer Science', 5, 1, '2018-11-23 12:51:34'),
(11, 'UIC-MIM', 'Master in Information Management', 3, 2, '2018-11-23 12:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `stud_lname` varchar(45) DEFAULT NULL,
  `stud_fname` varchar(45) DEFAULT NULL,
  `stud_mname` varchar(45) DEFAULT NULL,
  `stud_email` varchar(45) DEFAULT NULL,
  `stud_mob_no` varchar(45) DEFAULT NULL,
  `stud_bday` date DEFAULT NULL,
  `prog_id` int(11) NOT NULL,
  `date_time_log` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_lname`, `stud_fname`, `stud_mname`, `stud_email`, `stud_mob_no`, `stud_bday`, `prog_id`, `date_time_log`) VALUES
(1, 'Padao', 'Francis Rey', 'Francisquete', 'francisreypadao@gmail.com', '09776920392', '1988-09-11', 9, '2018-11-06 06:11:29'),
(4, 'Orano', 'Jannie Fleur', 'Villar', 'janniefleur@gmail.com', '09171234567', '2018-11-23', 2, '2018-11-23 08:54:59'),
(22, 'Orano', 'David', 'Fernandez', 'oranyo@gmail.com', '09361220070', '1992-11-10', 1, '2018-11-23 13:44:25'),
(23, 'Dagale', 'Marnife', 'Vallejos', 'dagale.marnife.vallejos@gmail.com', '09361231234', '1992-03-06', 1, '2018-11-23 14:10:33'),
(24, 'Malangsa', 'Rhoderick', 'Dargantes', 'Rhojud@yahoo.com', '09171234567', '2018-11-23', 9, '2018-11-23 15:03:27'),
(25, 'Auguis', 'Jhuniever', 'Juarbal', 'jhuniverjuarbalauguis@gmail.com', '09364900535', '1998-05-29', 1, '2018-11-23 16:37:53'),
(26, 'Rarangol', 'Jessa Mae', 'L', 'jessamaerarangol7@gmail.com', '09553144367', '1998-08-26', 1, '2018-11-23 16:38:02'),
(27, 'Abrio', 'Criscelia', 'Paguyo', 'abriocriscelia@gmail.com', '09974167198', '1999-05-05', 1, '2018-11-23 16:38:35'),
(28, 'Dikit', 'Jemarie', 'Timbal', 'dikitjemarie@gmail.com', '09757753868', '1999-11-01', 1, '2018-11-23 16:38:52'),
(29, 'Malbas', 'Ranil', 'Diada', 'lenarsmalbas@gmail.com', '09651331005', '1995-10-03', 1, '2018-11-23 16:39:08'),
(30, 'Templa', 'Mary Girlie', 'Cortan', 'templagirlie@gmail.com', '09350625570', '1997-12-30', 1, '2018-11-23 16:39:12'),
(31, 'Garong', 'Junrie', 'G.', 'junriegarong456@gmail.com', '09757743246', '1998-06-16', 1, '2018-11-23 16:39:25'),
(32, 'Ligutan', 'Kenneth', 'Duma-op', 'liguta41@gmail.com', '09654882375', '1996-04-12', 1, '2018-11-23 16:39:34'),
(33, 'Busa', 'Vanessa', 'Glario', 'vanessabusa.vb@gmail.com', '09566254665', '1997-08-05', 1, '2018-11-23 16:39:44'),
(34, 'Abrigo', 'Novie Marie', 'Palomar', 'noviemarieabrigo@gmail.com', '09978848830', '1998-11-11', 1, '2018-11-23 16:39:53'),
(35, 'Keliste', 'Reina', 'Maylim', 'kreinamaylim@gmail.com', '09351171067', '1998-01-22', 1, '2018-11-23 16:39:59'),
(36, 'Lucilo', 'Rachel Ann', 'Heling', 'rachelannhelinglucilo@gmail.com', '09651342665', '1995-11-15', 1, '2018-11-23 16:40:01'),
(37, 'Rodriguez', 'Joedee Mark', 'Aralan', 'joedeemark1995@gmail.com', '09651777366', '1995-01-20', 1, '2018-11-23 16:40:07'),
(38, 'Salon', 'Maria Ethel', 'Agravante', 'ethelagravante@gmail.com', '09365414407', '1997-03-10', 1, '2018-11-23 16:40:28'),
(39, 'Valenzona', 'Mark Anthony', 'Ramis', 'mav_bello@yahoo.com', '09268322823', '1996-06-13', 1, '2018-11-23 16:40:44'),
(40, 'Talabo', 'Nikke', 'Irinco', 'nikniktab1@gmail.com', '09554211323', '1998-10-10', 1, '2018-11-23 16:41:10'),
(41, 'Mabahin', 'Virgelio Jr.', 'Ollado', 'verlmabahin@gmail.com', '09168861220', '1996-07-31', 1, '2018-11-23 16:41:43'),
(42, 'Obbus', 'Rocelle', 'Galing', 'ros_obbus@yahoo.com', '09651776017', '1995-03-16', 1, '2018-11-23 16:42:57'),
(43, 'chua', 'mj', 'lee', 'mjchualee@outlook.com', '09300758171', '1996-01-29', 1, '2018-11-23 16:45:30'),
(44, 'imus-chua', 'mj', 'lee', 'mjchualee@outlook.com', '09300758171', '1999-01-29', 1, '2018-11-23 16:47:36'),
(45, 'Sy', 'Keano Nikko', 'L', 'test@test.com', '09171234567', '2018-11-23', 1, '2018-11-23 18:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `univ_id` int(11) NOT NULL,
  `univ_code` varchar(45) DEFAULT NULL,
  `univ_name` varchar(100) DEFAULT NULL,
  `univ_address` varchar(200) DEFAULT NULL,
  `date_time_log` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`univ_id`, `univ_code`, `univ_name`, `univ_address`, `date_time_log`) VALUES
(1, 'VSU', 'Visayas State University', 'Visca, Baybay City, Leyte, Philippines', '2018-11-23 09:04:59'),
(2, 'SLSU', 'Southern Leyte State University', 'Sogod, Southern Leyte, Philippines', '2018-11-23 09:05:38'),
(3, 'UIC', 'University of the Immaculate Conception', 'Fr. Selga St., Davao City, Philippines', '2018-11-23 09:17:09'),
(4, 'UPD', 'University of the Philippines - Diliman', 'Quezon City, Manila', '2018-11-23 12:42:16'),
(5, 'CITU', 'Cebu Institute of Technology - University', 'Cebu City, Philippines', '2018-11-23 12:43:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_degree_level`
--
ALTER TABLE `academic_degree_level`
  ADD PRIMARY KEY (`acad_dl_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`col_id`),
  ADD KEY `fk_college_university1_idx` (`univ_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`prog_id`),
  ADD KEY `fk_program_college_idx` (`col_id`),
  ADD KEY `fk_program_academic_degree_level1_idx` (`acad_dl_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `fk_Student_program1_idx` (`prog_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`univ_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_degree_level`
--
ALTER TABLE `academic_degree_level`
  MODIFY `acad_dl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `col_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `univ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `college`
--
ALTER TABLE `college`
  ADD CONSTRAINT `fk_college_university1` FOREIGN KEY (`univ_id`) REFERENCES `university` (`univ_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `fk_program_academic_degree_level1` FOREIGN KEY (`acad_dl_id`) REFERENCES `academic_degree_level` (`acad_dl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_program_college` FOREIGN KEY (`col_id`) REFERENCES `college` (`col_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_Student_program1` FOREIGN KEY (`prog_id`) REFERENCES `program` (`prog_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
