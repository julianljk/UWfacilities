-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2015 at 06:29 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
USE facilities;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `facilities`
--

-- --------------------------------------------------------

--
-- Table structure for table `Academic_Depts`
--

CREATE TABLE IF NOT EXISTS `Academic_Depts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Academic_Depts`
--

INSERT INTO `Academic_Depts` (`id`, `academic_name`) VALUES
(1, 'Engineering'),
(2, 'Academic Committee'),
(3, 'Architecture - (Milwaukee)'),
(4, 'Biological Systems Engineering'),
(5, 'Botany'),
(6, 'Community and Environmental Sociology'),
(7, 'Department of Psychology'),
(8, 'Forest and Wildlife Ecology'),
(9, 'Geography'),
(10, 'History'),
(11, 'Landscape Architecture'),
(12, 'Nelson Institute'),
(13, 'Soils Department'),
(14, 'Urban and Regional Planning'),
(15, 'Zoology');

-- --------------------------------------------------------

--
-- Table structure for table `Departments`
--

CREATE TABLE IF NOT EXISTS `Departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Departments`
--

INSERT INTO `Departments` (`id`, `dept_name`) VALUES
(1, 'FP&M Transportation Services'),
(2, 'FP&M Business and Staff Services'),
(3, 'FP&M Campus Planning and Landscape Architecture'),
(4, 'FP&M Capital Planning and Development'),
(5, 'FP&M Environment Health and Safety'),
(6, 'FP&M Office of the Associate Vice Chancellor'),
(7, 'FP&M Physical Plant'),
(8, 'FP&M Space Management Office');

-- --------------------------------------------------------

--
-- Table structure for table `Document_Lead`
--

CREATE TABLE IF NOT EXISTS `Document_Lead` (
  `doc_lead_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_lead_author` text NOT NULL,
  PRIMARY KEY (`doc_lead_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Document_Lead`
--

INSERT INTO `Document_Lead` (`doc_lead_id`, `doc_lead_author`) VALUES
(1, 'FP&M'),
(2, 'UW Faculty'),
(3, 'UW Graduate Student'),
(4, 'UW Undergraduate Student'),
(5, 'UW Research Center Staff'),
(6, 'Community Organization/Member'),
(7, 'UW Housing'),
(8, 'UW Extension'),
(9, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `Document_Types`
--

CREATE TABLE IF NOT EXISTS `Document_Types` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_type` text NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `Document_Types`
--

INSERT INTO `Document_Types` (`doc_id`, `doc_type`) VALUES
(1, 'Industry Publication'),
(2, 'Interview'),
(3, 'Master Plan'),
(4, 'Personal Communication'),
(5, 'Presentation'),
(6, 'Program Review'),
(7, 'Spreadsheet'),
(8, 'Strategic Plan'),
(9, 'Survey'),
(10, 'UW Faculty Research'),
(11, 'UW Graduate Research'),
(12, 'UW Undergraduate Project'),
(13, 'Website'),
(14, 'Working Document');

-- --------------------------------------------------------

--
-- Table structure for table `FPMsector`
--

CREATE TABLE IF NOT EXISTS `FPMsector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `FPMsector`
--

INSERT INTO `FPMsector` (`id`, `sector_name`) VALUES
(1, 'FP&M Led'),
(2, 'FP&M/Research Partnership'),
(3, 'FP&M/Academic Partnership'),
(4, 'FP&M/Student Employee or Student Org. Partnership');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FPMsector_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `proj_date` date NOT NULL,
  `Action` text NOT NULL,
  `findings` text NOT NULL,
  `future_opp` text NOT NULL,
  `authors` text NOT NULL,
  `dept_id` int(11) NOT NULL,
  `FPMpartner_proj` int(11) NOT NULL,
  `academic_dept_id` int(11) NOT NULL,
  `research_centers` text NOT NULL,
  `num_students` text NOT NULL,
  `doc_name` text NOT NULL,
  `stud_org_id` int(11) DEFAULT NULL,
  `doc_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `FPMsector_id`, `title`, `proj_date`, `Action`, `findings`, `future_opp`, `authors`, `dept_id`, `FPMpartner_proj`, `academic_dept_id`, `research_centers`, `num_students`, `doc_name`, `stud_org_id`, `doc_type_id`) VALUES
(1, 1, 'Hospital Garage Expansion - LED Lighting Upgrade', '2014-10-14', 'Transportation Services collaborated with CP&D to replace metal halide and spec. LED lamps for exterior lamp posts', '', '', 'Patrick J Kass', 1, 0, 0, '', '', '', 0, 4),
(2, 1, 'Transportation Services Sustainability Partnerships', '2014-08-18', 'An overview of Transportation Services numerous collaborations in multiple fields of sustainability  up to 2014', 'A diverse set of collaborations has helped TS approach sustainability goals on campus', '', 'Patrick J Kass', 1, 0, 0, '', '10-15', 'Transportation Services Sustainability Partnerships', 0, 6),
(3, 3, 'Lighted Regulatory Sign Study', '2014-08-18', '1. School of Engineering TOPS students are evaluating two types of lighted regulatory signs on campus streets to evaluate their effectiveness in increasing driver compliance and safety. 2014', '', '', '', 1, 1, 1, 'TOPS', '10-15', 'Transportation Services Sustainability Partnerships', 0, 6),
(4, 4, 'Student mapping project', '2014-08-18', '3. Student interns in FPM’s Planning unit typically work with TS on a dozen or more design and mapping projects related to parking, bus and bicycle facilities, sidewalks, and streets. 2005 - 2014', '', '', '', 1, 0, 0, '', '', 'Transportation Services Sustainability Partnerships', 0, 6),
(5, 3, 'Presentations to TOPS classes', '2014-08-18', '4. Several times over the past five years I have presented at TOPS classes describing such things as the transportation aspects of specific major projects as well as the campus’ sustainable Long Range Transportation Plan. 2010 -2013.', '', '', 'Patrick Kass', 1, 1, 1, 'TOPS', '10-15', 'Transportation Services Sustainability Partnerships', 0, 6),
(6, 1, 'Power Washing Drains', '2014-08-18', 'Added pits in 2012 and 2013 to lots 17 and 76 to ensure waste water from power washing goes to a sanitary sewer thus preventing contamination of lakes.', '', '', '', 1, 0, 0, '', '', 'Transportation Services Sustainability Partnerships', 0, 6),
(7, 4, 'Garage Clean Up for storm water', '2014-08-18', ' Added student staff to increase sweeping in garages thus reducing sand from entering storm water and providing students with supplemental income and work experience', '', '', '', 1, 0, 0, '', '3', 'Transportation Services Sustainability Partnerships', 0, 6),
(8, 1, 'Moped Mgmt.', '2014-08-18', 'Collaborated with City of Madison to improve moped parking management and reduce accidents, vehicle circulation, and energy consumption.', '', '', '', 1, 0, 0, '', '', 'Transportation Services Sustainability Partnerships', 0, 6),
(9, 4, 'Waste Reduction at parking lots', '2014-08-18', 'Collaborated with WEConserve students to measure recycling and waste in garages during event days, specifically hockey and basketball games in Lot 46.  Resulted in increasing the number of trash receptacles.', 'Increased number of trash receptacles to maintain clean facility', '', '', 1, 0, 0, '', '', 'Transportation Services Sustainability Partnerships', 9, 6),
(10, 1, 'Parking Enforcement', '2014-08-18', 'Increased the number of students writing citations providing improved compliance, reduced fuel consumption, and provided students with supplemental income while encouraging students to walk & bike while enforcing.', '', '', '', 1, 0, 0, '', '5', 'Transportation Services Sustainability Partnerships', 0, 6),
(11, 1, 'Carpool Permit', '2014-08-01', 'Designated carpool permit allows carpools of 3+ people to receive parking permits without having to go through the priority assignment process. Launched Fall of 2014', '', '', 'Dar Ward', 1, 0, 0, 'n/a', 'n/a', 'Transportation Services Sustainability Partnerships', 0, 6),
(12, 1, 'Electric Vehicle Charging Stations', '2014-07-01', '7 locations on campus providing free electric vehicle charging (Lot 7, 17, 20, 29, 36, 64, 75). Each location has two charging plugs. Lot 75 is a partnership with a private donor. Lot 64 is a partnership with MG&E', 'Electric vehicle charging survey completed in 2013 to determine demand. Stations initiated in July of 2014', 'Additional donors may come forward to donate more stations.', 'Dar Ward', 1, 0, 0, 'n/a', 'n/a', 'Transportation Services Sustainability Partnerships', 0, 6),
(13, 1, 'UW Housing Bicycle Program', '2014-01-01', 'Partnered with UW Housing to take over management of their bicycle program to enhance consistency and accessible of bicycle parking on the campus. Initiated spring 2014.', '', '', 'Dar Ward', 1, 0, 0, 'Housing', 'n/a', 'Transportation Services Sustainability Partnerships', 0, 6),
(14, 2, 'Reduction in Vehicle Idling Emissions Through Conversion of Signaled Intersection to Roundabout', '2013-12-27', 'Study of emissions reductions from conversion of Walnut and Observatory traffic light to roundabout', '83.7 Metric tons of CO2 are avoided annually from conversion to roundabout intersection.', '', 'Dawson, Pakes-Ahlman, Kennedy', 1, 1, 0, 'Traffic Operations and Safety Lab, Office of Sustainability', '', 'Roundabout Emissions Reductions Final', 0, 10),
(15, 2, 'Reduction in Vehicle Idling Emissions Using RFID Parking Permits', '2013-09-20', 'Analysis of RFID program to reduce vehicle idling emissions', 'Savings of 12.2 metric tons of CO2 emissions. Technology is now in use across the entire campus as well as at other leading collegiate institutions', 'Study could be updated to quantify subsequent adoption of RFID permits at all parking structures', 'Dawson, Pakes-Ahlman, Graham, Gutierrez, Vilasdaeschanont', 1, 1, 0, 'Radio Frequency ID Lab - UW RFID', '10', 'End of Summer report.docx', 0, 14),
(16, 1, ' UW Hospital Park and Ride at Hillfarms ', '2013-09-01', ' Partnered with UW Hospital to fund the operation of a park and ride facility at Hillfarms to provide additional access to parking while reducing the number of single occupancy vehicles on the campus.', '', '', 'Dar Ward', 1, 0, 0, 'UW Hospital', 'n/a', 'Transportation Services Sustainability Partnerships', 0, 6),
(17, 1, 'Park and Ride facility at Wingra ', '2013-09-01', 'Provided park and ride facility  to provide additional access to parking while reducing the number of single occupancy vehicles on the campus.', '', '', 'Dar Ward', 1, 0, 0, 'n/a', 'n/a', 'Transportation Services Sustainability Partnerships', 0, 6),
(18, 1, '2012 On-Board Campus Bus Survey ', '2012-03-21', 'A 4 day survey conducted during standard service schedule to identify ridership information', 'Approximately: 80% students, 14% staff. 22% Eagle Heights, 23% residence halls, 50% other. 74% undergrad, 21% graduate. 81% 12+credits.', '', 'TS Staff', 1, 0, 0, '', '5', '2012_Campus_Bus_Survey_Final_Report(FINAL).pdf', 0, 9),
(19, 1, 'Campus Bus and Accessibility Study', '2012-01-01', 'Consultant study (Nelson Nygaard) to evaluate campus bus service and accessibile transportation on campus', 'several recommendations made including an accessible circulator shuttle which was implemented in Sept 2014', 'study can be used to adjust campus bus service in future as funding allows', '', 0, 1, 0, 'McBurney Center, UW Hospital, OED provided feedback', 'n/a', 'Transportation Services Sustainability Partnerships', 1, 6),
(20, 1, 'Transition to fuel powered LSV''s', '2011-08-08', 'Acquire fuel powered Low Speed Vehicles to replace and expand usage profiles similar to the NEV electric drive vehicles.  Initially 3, up to 51 as of 1/7/2015', 'Use fossil fuel but the fuel efficiency is far superior to alternative vehicles on campus.  The Noise Vibration Harshness (NVH) profile of the vehicles is comparable to alternatives and sufficient.  These LSV''s are available with both automatic transmission and four wheel drive.  The HVAC capabilities are comparable to alternatives and sufficient.', 'Continue to try and re-purpose full speed vehicles to longer trip duty while increasing use of LSV''s for campus only duty. ', 'Jim Bogan - Fleet Mgr.', 1, 0, 0, '', '', '', 0, NULL),
(21, 1, 'Transportation.CleanDW.doc', '2010-09-17', 'Draft from Sustainability Task Force, Transporation Working group. Summary of TS diverse successes in promoting lower impact transport, and vision goals for future', 'Projects proposed include Single Occpancy vehicle reduction and greater convenience for walking/biking', '', 'Patrick J Kass', 1, 1, 2, '', '', 'Transportation.CleanDW.doc', 1, 6),
(22, 1, 'Eagle Heights 80/84 Bus Survey', '2010-03-16', 'Survey of rider satisfaction with route 80/84 service', 'High degree of satisfaction overall, some specific requests', '', 'TS Staff', 1, 0, 0, '', '', 'SURVEY RESULTS - SUMMARY v.1.xls', 0, 9),
(23, 1, 'Recycling Trucks', '2009-05-01', 'Support maximum flexibility in recycling by the use of (3 so far as of 1/7/2015) trucks with special bodies for sorting recycling into separate streams.  The trucks have three compartments, each of these can dump their contents.  They are used to collect various recycling streams form single collection points while maintaining the separate recycling streams.  For instance picking up office paper plus corrugate paper plus aluminum and keeping them separate.', 'The truck bodies required more reinforcement than the original design for one of the dumping compartments.  Cart tipper hydraulic arm devices were added in order to load heavier carts.  This allowed for the development of a food composting program.  The truck chassis were upgraded from one ton to clas five in order to support the heavier (wet) food waste loads.', 'Expansion of food waste composting program, expansion of recycling efforts in general', 'Jim Bogan - Fleet Mgr.', 1, 0, 0, '', '', '', 0, NULL),
(24, 1, 'Commuter Solutions Individual Marketing', '2008-01-01', 'Encouraged alternatives to single-occupancy vehicle travel via individualized marketing program http://www.transportation.wisc.edu/forms/commutersolutions.aspx and at over 50 outreach events on campus each year.', '', '', 'Dar Ward', 1, 0, 0, 'n/a', 'n/a', 'http://www.transportation.wisc.edu/forms/commutersolutions.aspx', 0, NULL),
(25, 1, 'Use of Neighborhood Electric Vehicles', '2007-01-08', 'Acquire Neighborhood Electric Vehicles for use on campus to augment fleet after state mandated fleet cuts.  Initially, three, eventually up to 30, as of 1/7/2015 down to 21.', 'Useful to maintain productivity IF the users ', 'If NEV development is able to provide a cost effective design with better HVAC capabilities while maintaining range and GVWR and reliability then these may be a favored choice', 'Jim Bogan - Fleet Mgr.', 1, 0, 0, '', '', '', 0, NULL),
(26, 1, 'West Campus Bike and Pedestrian Circulation Improvements Report', '2003-09-02', 'A status report and draft of solutions for concerns from members of the Joint West Campus Area Committee (JWCAC). Report identifies ways to improve safety and accessibility for pedestrians and bicyclists in the study area.', 'A handful of sidewalk additions and pedestrian thoroughfares would resolve many issues.  A handful of intersection problems point to need to re-prioritize pedestrians and bicyclists in future infrastructure redevelopment.  Most of proposed solutions have been completed as of 2015.', 'The status report will be updated at least twice a year and presented to the JWCAC for review. Draft calls for more extensive mapping of bike/ped. Network on campus and identification of concerns across other areas of campus', '', 1, 0, 0, '', '', '', 0, 14),
(27, 1, 'Employee Bus Pass', '2003-01-01', 'Partnership with Madison Metro to provide low cost bus passes ($24 per year for a pass that is valued at over $700) to employees and affiliated employees. UW Health, UW Foundation, Alumni Association, WARF/WICell, Morgridge Institute for Research (MIR) covers the full cost for their employees. WI Historical Society also makes the pass available to their employees for a fee that they set.', 'Survey data indicates that the the ridership of city buses increased after the employee bus pass became available in 2003. A similar trend was observed when the Associated Students of Madison began providing a pass in 1996.', '', 'Dar Ward', 1, 1, 0, ' UW Health, UW Foundation, Alumni Association, WARF/WICell, Morgridge Institute for Research (MIR), WI Historical Society', 'n/a', 'Transportation Services Sustainability Partnerships', 0, 6),
(28, 1, 'Student Bus Passes', '1996-01-01', 'Students have collectively purchased bus passes through segregated fees', '', '', '', 1, 0, 0, '', '', 'Transportation Services Sustainability Partnerships', 1, 6),
(29, 1, 'SAFEwalk Program', '1992-01-01', 'Encouraged walking via the SAFEwalk program (student employees and customers) to reduce vehicle traffic on campus and improve campus safety and security. Initiated in 1992', 'SAFEwalk has seen a strong increase in use in the last two years', '', 'Dar Ward', 1, 0, 0, 'n/a', '25-30', 'Transportation Services Sustainability Partnerships', 0, 6),
(30, 1, 'Park and Ride facility at University Research Park', '1980-01-01', ' Partnered with University Research Park to provide a park and ride facility  to provide additional access to parking while reducing the number of single occupancy vehicles on the campus.', '', '', 'Dar Ward', 1, 0, 0, 'University Research Park', 'n/a', 'Transportation Services Sustainability Partnerships', 0, 6),
(31, 1, 'Single Occupancy Alternative Support Programs', '1980-01-01', 'Supported alternatives to single-occupancy vehicle travel via flex parking, emergency ride home, and Zipcar car-share.', '', '', 'Dar Ward', 1, 0, 0, 'n/a', 'n/a', 'Transportation Services Sustainability Partnerships', 0, 6),
(32, 1, 'Carpool Program', '1980-01-01', 'Carpools of any size may share permit costs', '', '', 'Dar Ward', 1, 0, 0, 'n/a', 'n/a', 'Transportation Services Sustainability Partnerships', 0, 6),
(33, 1, 'Vanpool Program', '1980-01-01', 'Partnership with the Department of Administration to provide vanpool opportunities to campus.', '', '', 'Dar Ward', 1, 0, 0, 'n/a', 'n/a', 'Transportation Services Sustainability Partnerships', 0, 6),
(34, 4, 'Campus Bicycle Programs', '1980-01-01', 'Encouraged student & employee bicycling through education, engineering, enforcement, and encouragement. Programs include University Bicycle Resource Center (launched 2012, provides open hours and events), bicycle parking (racks, lockers/cages, valet), departmental bicycle program and Bcycle bike share (program launched 2011, reduced cost student/employee partnership begun 2012).  Increasing bicycle commuting to campus reduces energy consumption & air pollution while increasing exercise and employee health.', 'Survey data shows a significant share of students and employees come to campus by bicycle.', '', 'Dar Ward', 1, 0, 0, 'n/a', 'UBRC has up to 1,000 visitors per year, a majority of which are students', 'Transportation Services Sustainability Partnerships', 8, 6),
(35, 1, 'Campus Bus', '1980-01-01', 'Partnership with Associated Students of Madison, Housing, and Madison Metro to provide $1.5 million of campus bus service via routes 80, 81, 82, 84', '', '', 'Dar Ward', 1, 1, 0, 'Housing', 'Student Transportation Board participates in campus bus planning. Up to 2 million students ride the campus bus each year.', 'Transportation Services Sustainability Partnerships', 1, 6),
(36, 1, 'Campus mode share survey', '1970-01-01', 'Monitored progress on student, fac/staff, and hospital employee mode share via data collection including a biennial campus mode share survey. Used survey information to prioritize product and service offerings. Survey has been conducted every two years since the 1970''s.', 'Feb 2013 Drive Alone Mode Share: fac/staff good weather  48%; hospital good weather  68%; students good weather  6%; fac/staff bad weather 53%; hospital bad weather 70%; students bad weather 7%', '', 'Dar Ward', 1, 1, 0, 'Hospital; UW Survey Center', 'n/a', 'Transportation Services Sustainability Partnerships', 0, 6),
(37, 4, 'Donate and Take Tents Set-up in Campus Parking Lots', '0000-00-00', 'Coordinated with ReThink to help set up the Donate and Take tents for move out waste Reduction', '', '', '', 0, 0, 0, '', '', 'Transportation Services Sustainability Partnerships', 6, 6),
(38, 1, 'BioFuel Program', '0000-00-00', 'Fleet trucks and campus construction and landscaping equipment use a B20 blend (20% biodiesel, 80% diesel).  The 50,000 gallons of fuel consumed equates to 10,000 gallons biodiesel used annually in place of conventional diesel.   Increased fuel efficiency of modern diesel vehicles has led fleet to replace gas powered trucks with diesel as well', '', '', 'Jim Bogan - Fleet Mgr.', 1, 0, 0, '', '', 'Transportation.CleanDW.doc', 0, 6),
(39, 1, 'Campus Drive Bicycle Path', '0000-00-00', 'TS funded a $1.5 Million dollar bike path along campus drive to improve bicycle commuting on campus.', 'Contributed to the City of Madison''s Gold Rating from the League of American Bicyclists', '', '', 1, 0, 0, '', '', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Research_Centers`
--

CREATE TABLE IF NOT EXISTS `Research_Centers` (
  `research_id` int(11) NOT NULL AUTO_INCREMENT,
  `research_name` text NOT NULL,
  PRIMARY KEY (`research_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Research_Centers`
--

INSERT INTO `Research_Centers` (`research_id`, `research_name`) VALUES
(1, 'Center for Limnology'),
(2, 'Institute for Biology Education'),
(3, 'Kaufmann Lab for Food Systems'),
(4, 'Center for Limnology'),
(5, 'Institute for Biology Education'),
(6, 'Kaufmann Lab for Food Systems'),
(7, 'Lakeshore Nature Preserve'),
(8, 'Office of Sustainability'),
(9, 'PEOPLE Program'),
(10, 'Radio Frequency ID Lab - UW RFID'),
(11, 'Recycled Materials Resource Center - RMRC-3G'),
(12, 'Traffic Operations and Safety Lab'),
(13, 'University of Wisconsin Extension '),
(14, 'University of Wisconsin System Solid Waste Research Program'),
(15, 'UW Arboretum');

-- --------------------------------------------------------

--
-- Table structure for table `Student_Orgs`
--

CREATE TABLE IF NOT EXISTS `Student_Orgs` (
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` text NOT NULL,
  PRIMARY KEY (`org_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Student_Orgs`
--

INSERT INTO `Student_Orgs` (`org_id`, `org_name`) VALUES
(1, 'ASM'),
(2, 'ASM Sustainability Committee'),
(3, 'Edible Landscaping'),
(4, 'FH King'),
(5, 'Horticulture Club'),
(6, 'ReThink Wisconsin'),
(7, 'Student Hourly Employment'),
(8, 'Torqued Bicycle Club'),
(9, 'We Conserve'),
(10, 'WIASLA - Amer. Society for Landscape Architecture');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
