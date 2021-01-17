-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 08:19 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` varchar(15) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_mobile` varchar(15) NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `p_cat` varchar(225) NOT NULL,
  `p_doc` varchar(15) NOT NULL,
  `p_pres` varchar(15) NOT NULL,
  PRIMARY KEY (`p_id`),
  CONSTRAINT FK_patient_cat FOREIGN KEY (`p_cat`) REFERENCES `category`(`cat_type`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_patient_doc FOREIGN KEY (`p_doc`) REFERENCES `doctor`(`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_patient_pres FOREIGN KEY (`p_pres`) REFERENCES `prescription`(`pres_id`) ON DELETE CASCADE ON UPDATE CASCADE
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

----------------- NOTE ALL VALUES ARE FAKE AND JUST INSERTED FOR EXPERIMENTATION -----------------------------
-- Dumping data for table `patient`
--
-- can we autoinsert id????
INSERT INTO `patient` (`p_id`, `p_name`,`p_mobile`, `p_email`, `p_cat`, `p_doc`, `p_pres`) VALUES
('PAT001', 'Renae Gould','7887940451', 'renne123@renne.com', 'Group 1', 'D002', 'PRES2'),
('PAT002', 'Hadi Gill','6127999112', 'gill123@gill.com', 'Group 2', 'D003', 'PRES4'),
('PAT003', 'Rubi Sykes','7217636748', 'skyhigh@sky.com', 'Group 1', 'D003', "PRES5"),
('PAT004', 'Andrea Garrett','5896321475', 'andrea@and.com', 'Group 3', 'D001', 'PRES1'),
('PAT005', 'Zac Nairn', '9512357864', 'zaczac@zac.com', 'Group 2', 'D004', 'PRES3'),
('PAT006', 'Britany Khan','9658321475', 'britania@brit.com', 'Group 1', 'D005', 'PRES6'),
('PAT007','Anika Hicks','8524693178', 'anika789@anika.com', 'Group 2', 'D001', 'PRES3');
-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--id??????????????

-- Indexing or creating a primary key for patient table
-- ALTER TABLE `patient`
-- ADD PRIMARY KEY (`pid`);

CREATE TABLE `doctor` (
  `doc_id` varchar(15) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `doc_mobile` varchar(15) NOT NULL,
  `doc_email` varchar(255) NOT NULL,
  `doc_hos` varchar(15) NOT NULL,
  -- `dspec` varchar(255) NOT NULL
  PRIMARY KEY (`doc_id`),
  CONSTRAINT FK_doctor_hos FOREIGN KEY (`doc_hos`) REFERENCES `hospital`(`hos_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doc_id`, `doc_name`, `doc_mobile`, `doc_email`, `doc_hos`) VALUES
('D001', 'Peter Field', '8329660993','peter123@peter.com','H003'),
('D002', 'Anna Weeks', '6127981733','weeks123@year.com','H001'),
('D003', 'Camilla Valencia', '6127948488','camilla@camilla.com','H003'),
('D004', 'Suhail Howarth', '7185872080','suhail555@suhail.com','H002'),
('D005', 'Eamon Simmons', '7397078485','simmons420@simmons.com','H004');

-- --------------------------------------------------------

-- Creating primary key for doctor table
-- ALTER TABLE `doctor`
-- ADD PRIMARY KEY (`did`);

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hos_id` varchar(15) NOT NULL,
  `hos_name` varchar(255) NOT NULL,
  `hos_type` varchar(255) NOT NULL,
  `hos_address` varchar(255) NOT NULL,
  PRIMARY KEY (`hos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--auto insert id???

INSERT INTO `hospital` (`hos_id`, `hos_name`, `hos_type`, `hos_address`) VALUES
('H001', 'Lakewood Medical Clinic', 'COVID Care Center', '11th Floor, 28 Gopal Das Bhawan, Barakhamba Road, Delhi, Delhi, 110001'),
('H002', 'Angelstone General Hospital', 'Dedicated COVID Health Centre', 
'48/2, Opp Pink Apt, 7 Bunglows, B/h Municipal Garden, Andheri (west), Mumbai, Maharashtra, 400061'),
('H003', 'Memorial Community Hospital', 'Dedicated COVID Health Centre', 
'169, Nagraj Complex, Old Kasai Road, Raja Market, Avenue Road, Bangalore, Karnataka, 560002'),
('H004', 'Golden Oak Hospital', 'Dedicated COVID Hospital', '169, Govindappa Naicken St, Parrys, Chennai, Tamil Nadu, 600001');

-- --------------------------------------------------------

-- creating a primary key for hospital table
-- ALTER TABLE `hospital`
-- ADD PRIMARY KEY (`hid`);

-- ALTER TABLE `hospital`
-- ADD PRIMARY KEY (`hname`);

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_type` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  `cat_criteria` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Creation Of Patient Table and inserting values
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_type`, `cat_description`, `cat_criteria` ) VALUES
('Group 1', 'Suspect and confirmed cases clinically assigned as mild and very mild', 
'Cases presenting with fever and/or upper respiratory tract illness (Influenza Like Illness)'),
('Group 2', 'Suspect and confirmed cases clinically assigned as moderate', 
'Pneumonia  with  no  signs  of  severe  disease  (Respiratory  Rate  15  to 30/minute, SpO290%-94%)'),
('Group 3', 'Suspect and confirmed cases clinically assigned as severe', 
'Severe Pneumonia (with respiratory rate greater than or equal to 30/minute and/or SpO2 less than 90% in room air) or ARDS or Septicshock');
--

-- Table structure for table `Prescription`
--

CREATE TABLE `prescription` (
  `pres_id` varchar(15) NOT NULL,
  `medicine` varchar(255) NOT NULL,
  `pres_cat` varchar(255) NOT NULL,
  `pres_doc` varchar(15) NOT NULL,
  -- `prescription` varchar(255) NOT NULL,
  PRIMARY KEY (`pres_id`),
  CONSTRAINT FK_prescription_cat FOREIGN KEY (`pres_cat`) REFERENCES `category`(`cat_type`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_prescription_doc FOREIGN KEY (`pres_doc`) REFERENCES `doctor`(`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `prescription` (`pres_id`, `medicine`, `pres_cat`, `pres_doc`) VALUES
('PRES1','Naftinil Gemnuma', 'Group 1', 'D002'),
('PRES2', 'Tacrotecan Selenil', 'Group 1', 'D003'),
('PRES3', 'Alphazone Alasine', 'Group 2', 'D001'),
('PRES4', 'Agenebutrol', 'Group 1', 'D004'),
('PRES5', 'Angiotensin Neuronadryl', 'Group 3', 'D003'),
('PRES6', 'Hexapion', 'Group 2', 'D005');

