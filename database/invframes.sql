-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2015 at 11:22 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `invframes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assign_keyword`
--

CREATE TABLE IF NOT EXISTS `assign_keyword` (
  `assignID` int(11) NOT NULL AUTO_INCREMENT,
  `keywordID` int(11) NOT NULL,
  `pageID` int(11) NOT NULL,
  PRIMARY KEY (`assignID`),
  KEY `fk_assign_keyword_keywords_idx` (`keywordID`),
  KEY `fk_assign_keyword_pages1_idx` (`pageID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assign_skill`
--

CREATE TABLE IF NOT EXISTS `assign_skill` (
  `assignID` int(11) NOT NULL AUTO_INCREMENT,
  `projectID` int(11) NOT NULL,
  `skillID` int(11) NOT NULL,
  PRIMARY KEY (`assignID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assign_social_media`
--

CREATE TABLE IF NOT EXISTS `assign_social_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linkname` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `socialMediaID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_assign_social_media_socialmedialinks1_idx` (`socialMediaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `keywordID` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(45) NOT NULL,
  PRIMARY KEY (`keywordID`),
  UNIQUE KEY `keyword_UNIQUE` (`keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `optionsID` int(11) NOT NULL,
  `pageID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `text` varchar(60) NOT NULL,
  `icon` varchar(45) NOT NULL,
  `link` text,
  PRIMARY KEY (`optionsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pageID` int(11) NOT NULL AUTO_INCREMENT,
  `pagename` varchar(45) NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT 'Invincible Frames - Delivering Enlightening Stories',
  `description` text NOT NULL,
  PRIMARY KEY (`pageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageID`, `pagename`, `title`, `description`) VALUES
(1, 'home', 'Invincible Frames - Delivering Enlightening Stories', 'Invincible Frames is a creative film production and CGI company based in London.'),
(2, 'projects', 'Invincible Frames - Delivering Enlightening Stories', '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `projectID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `subtitle` varchar(400) NOT NULL,
  `projectInfo` text NOT NULL,
  `client` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `createdOn` datetime NOT NULL,
  `media` enum('image','gallery','video') NOT NULL,
  `link` varchar(200) NOT NULL,
  `thumb` text NOT NULL,
  PRIMARY KEY (`projectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectID`, `title`, `subtitle`, `projectInfo`, `client`, `date`, `createdOn`, `media`, `link`, `thumb`) VALUES
(1, 'Red Room', 'When a mysterious young man takes up lodgings next to a bickering couple, he has no idea how their argments will impact his life. He just wished the people next room would shut up...', 'Director: Femi Oyeniran\r\n<br>\r\nWriter: DD Armstrong\r\n<br>\r\nDirector of Photography: Robert Cairns\r\n<br>\r\nProducers: Victor Adebodun, Richie Campbell, Fabien Soazandry\r\n<br>\r\nExecutive Producers: Victor Adebodun, Femi Oyeniran , Fabien Soazandry\r\n<br><br>\r\nWhen a mysterious young man takes up lodgings next to a bickering couple, he has no idea how their argments will impact his life. He just wished the people next room would shut up.\r\n<br><br>\r\nBased on a concept by Carlos Husbands and developed by DD Armstron Red Room was first produced for stage by Square Yard Theatre for a one night \r\nshowcase at The Hospital Club in Cover Garden. Building on the night’s success and audience reviews, we now bring to screen an adaption in this explosive short thriller.', 'None', '2015-06-01', '2015-06-01 00:00:00', 'image', '', 'i1.jpg'),
(2, 'EY', 'The brief of this project was to create an internal comms video of duration between 60 seconds to three minutes in length, to promote the up and coming Advisory Executive Communities Events in a timeless manner.', 'Director: Fabien Soazandry<br>\nDirector of Photography: Robert Cairns, Yana Cairns<br>\nVFX: Mathew Thomas<br>\n<br><br>\nThe brief of this project was to create an internal comms video of duration between 60 seconds to three minutes in length, to promote the up and coming Advisory Executive Communities Events in a timeless manner.\n<br><br>\nEY wanted us to create something fresh for an internal campaign, we explored the idea of breaking out of talking heads so we focused on an old HP advert with Bill Gate and used the art style to convey their message.', 'Ernst & Young', '2015-06-17', '2015-06-01 00:00:00', 'video', 'www.ey.com/UK/en/Home', 'i2.jpg'),
(3, 'Bag Ladies', 'A story about four women, who have spent their lives running away for issues which taunt them. Each women represent a problem, religion, abuse, insecurities and rape. ', 'Director: Victor Adebodun<br>\r\nWriter: Baby Isako<br>\r\nExecutive Producer: Mario Fransisco, Baby Isako, Nicole de Sousa<br>\r\nDirector of Photography: Robert Cairns, Yana Rits-Cairns<br>\r\n1st AD: Fabien Soazandry<br>\r\nProducer: Victor Adebodun, Fabien Soazandry \r\n<br><br>\r\nBag Ladies By Baby Isako. A story about four women, who have spent their lives running away for issues which taunt them. Each women represent a problem, religion, abuse, insecurities and rape. In this piece we see the women being questioned by their conscious in order to let go of their past.\r\n<br><br>\r\nThis film world premiered at Festival de Cannes', 'None', '2015-06-01', '0000-00-00 00:00:00', 'video', '', 'i3.jpg'),
(4, 'Lucky Dice', 'It''s just another average day for David and Trev. Nothing interesting ever happens to these two friends. However, they stumble on a package leading them to debate on ''luck'' and if it exists. ', 'Writer: Fabien Soazandry<br>\r\nDirector: Fabien Soazandry<br>\r\nDirector of Photography: Yana Rits Cairns <br>\r\nProducers: Fabien Soazandry, Victor Addendum<br\r\nSeries Producer: Vanessa Van-Yeboah<br>\r\nExecutive Producer: Lawrence Lartey<br><br>It''s just another average day for David and Trev. Nothing interesting ever happens to these two friends. However, they stumble on a package leading them to debate on ''luck'' and if it exists. Immediately both of their theories are put to the test, but can luck or fortune predict how the day will end?', 'Channel 4 Random Acts', '2015-06-10', '2015-06-23 00:00:00', 'video', 'http://randomacts.channel4.com/', 'i4.jpg'),
(5, 'Pimp That Bbq', 'This was hugely successful generation 14K views over night and being nominated for several Branding and Marketing awards.', 'Directed by: Mark Leung<br>\r\nDirector of Photography: Matthew Peltier<br>\r\nEditor: Fabien Soazandry<br>\r\nAnimation: Fabien Soazandry<br><br>This was hugely successful generation 14K views over night and being nominated for several Branding and Marketing awards.', 'Heck food', '2014-07-24', '2015-07-21 00:00:00', 'video', 'http://heckfood.co.uk/', 'i5.jpg'),
(6, 'Thriller', 'On their way home after ''date night'' an unsuspecting couple come across something a little spooky and strange. Will their dance moves be enough to save them from what''s lurking in the shadows?', 'Writer: Fabien Soazandry<br>\r\nDirector: Fabien Soazandry<br>\r\nDirector of Photography: Yana Rits Cairns <br>\r\nProducers: Fabien Soazandry, Victor Addendum<br>\r\nSeries Producer: Vanessa Van-Yeboah<br>\r\nExecutive Producer: Lawrence Lartey<br><br>On their way home after ''date night'' an unsuspecting couple come across something a little spooky and strange. Will their dance moves be enough to save them from what''s lurking in the shadows?', 'Channel 4 Random Act', '2014-04-17', '2015-07-21 00:00:00', 'video', 'http://randomacts.channel4.com/', 'i6.jpg'),
(7, 'Santander', 'Pearsons approached us to record an internal promo for their client Santander to be showcased at a conference the next. Our team went out to Santander head office in Leicester, the interviews had to be captured and edited the same day to be delivered by the afternoon.', 'Agent: Pearsons<br>\r\nDirector: Fabien Soazandry<br>\r\nDirector of Photography: Robert cairns<br>\r\nEditor: Fabien Soazandry<br><br>\r\nPearsons approached us to record an internal promo for their client Santander to be showcased at a conference the next. Our team went out to Santander head office in Leicester, the interviews had to be captured and edited the same day to be delivered by the afternoon.', 'Santander ', '2015-07-08', '2015-07-23 00:00:00', 'image', 'http://www.santander.co.uk/uk/index', 'i7.jpg'),
(8, 'Accenture', 'We were asked by Accenture to create an online viral campaign for the Bright Ideas Trust’s Business Box.', 'Director: Fabien Soazandry<br>\r\nDirector of Photography: Fabien Soazandry<br>\r\nVFX: Johnny Moko<br><br>\r\nWe were asked by Accenture to create an online viral campaign for the Bright Ideas Trust’s Business Box.\r\n<br><br>Hear what Accenture had to say about us', 'Accenture', '2015-07-07', '2015-07-15 00:00:00', 'video', 'https://www.accenture.com/gb-en', 'i8.jpg'),
(9, 'Holland and Holland', 'Our amazing Director of Photography Robert cairns was asked to create a promo for Holland and Holland shooting range event.', 'Director: Robert Cairns<br>\r\nDirector of Photography: Robert Cairns<br>\r\nEditor: Fabien Soazandry<br><br>\r\nOur amazing Director of Photography Robert cairns was asked to create a promo for Holland and Holland shooting range event.', 'Holland and Holland', '2015-07-06', '2015-07-15 00:00:00', 'video', 'hollandandholland.com/', 'i9.jpg'),
(10, 'Venus VS Mars Season Two Intro', 'Sky Living recently picked up the hit web series Venus VS Mars and winner of Two Screen Nation awards.', 'Director: Fabien Soazandry<br>\r\nDirector of Photography: Robert Cairns<br>\r\nProducer: Victor Adebodun<br>\r\nVFX: Fabien Soazandry<br>\r\nGrade: MPC<br><br>\r\nSky Living recently picked up the hit web series Venus VS Mars and winner of Two Screen Nation awards.<br><br>\r\nWe were asked to create an intro for season two of the web series which only aired for 3 episodes of the online series before being picked up by Sky.', 'Venus VS Mars', '2015-07-20', '2015-07-29 00:00:00', 'video', '', 'i10.jpg'),
(11, 'Rabobank', 'We were asked to capture 8 days conference with member of the executive board of Rabobank.', 'Agency: Knight&Castle Media <br>\r\nDirector: Fabien Soazandry <br>\r\nEditor: Paris Tume<br><br>\r\nWe were asked to capture 8 days conference with member of the executive board of Rabobank.', 'Rabobank', '2015-07-09', '2015-07-21 00:00:00', 'video', 'www.rabobank.com/', 'i11.jpg'),
(12, 'Clench', 'As part of Generation 3.0''s ambitious campaign we have made the organization’s first short narrative film which tells the story of Ash, a mixed race girl from Old Trafford, Manchester.', 'Directed by Riffat Ahmed <br>\r\nDirector of Photography: Jake Scott <br>\r\nProducers: Shane Davey, Courtney Edwards and Fabien Soazandry  <br><br>\r\nAs part of Generation 3.0''s ambitious campaign we have made the organization’s first short narrative film which tells the story of Ash, a mixed race girl from Old Trafford, Manchester.<br><br>\r\nOur initial challenge here was to convince the Runnymeade Trust to committing to trying something different and exploring the concept of shooting a fictional narrative that would communicate the same message as a corporate video but in a timeless manner and reach a wider audience.<br><br>\r\nSince then Clench as won Best Drama Limelight Film Awards 2012, Best Shortfilm Born Short Film Festival Denmark 2012, Official Selection for NoGloss Festival Leeds 2012 and Official Selection for Portobello Film Festival 2012.<br><br>\r\nOn a youth referral scheme, we see Ash go to the iconic Salford Lads club where boxing, aided by the training of an elder experienced coach, offers them an alternative perspective on the world where race, difference and what neighborhoods you come from become secondary to the training.<br><br>\r\nThe film explores how prejudice and racism are often manifested ideas leading to judgments based on stereotypes where the notion of seeing than knowing becomes a focal point.<br><br>\r\nBoxing becomes the ultimate tool for communication unraveling that every person has a story to tell regardless of their cover.', 'Runnymede Trust', '2015-07-21', '2015-07-14 00:00:00', 'video', 'www.runnymedetrust.org/', 'i12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE IF NOT EXISTS `project_images` (
  `imageID` int(11) NOT NULL AUTO_INCREMENT,
  `projectID` int(11) NOT NULL,
  `image` text NOT NULL,
  `dateAdded` datetime NOT NULL ,
  KEY `imageID` (`imageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`imageID`, `projectID`, `image`, `dateAdded`) VALUES
(1, 1, '1.jpg', '2015-06-29 12:39:11'),
(2, 7, '2.jpg', '2015-07-21 08:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `project_media`
--

CREATE TABLE IF NOT EXISTS `project_media` (
  `mediaID` int(11) NOT NULL AUTO_INCREMENT,
  `projectID` int(11) NOT NULL,
  `media` text NOT NULL,
  `dateAdded` datetime ,
  PRIMARY KEY (`mediaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `project_media`
--

INSERT INTO `project_media` (`mediaID`, `projectID`, `media`, `dateAdded`) VALUES
(1, 2, '8c71OEzfNjg', '2015-06-29 12:34:09'),
(2, 3, 'k2KiKmKF360', '2015-06-29 13:30:03'),
(3, 4, 'lasudP3FY9w', '2015-06-29 13:30:03'),
(4, 5, 'YUydoobysUE', '2015-07-21 07:43:57'),
(5, 6, 'daPXxQ_bblk', '2015-07-21 07:43:57'),
(6, 8, 'sWjWueZieow', '2015-07-21 08:20:48'),
(7, 9, 'i2DggIO-MBk', '2015-07-21 08:38:09'),
(8, 10, 'fojaeVWSX0M', '2015-07-21 08:38:09'),
(9, 11, 'QpIk2uUFEhY', '2015-07-21 08:55:21'),
(10, 12, 'pODFazGZWtc', '2015-07-21 08:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `skillID` int(11) NOT NULL AUTO_INCREMENT,
  `skill` enum('film','editing','illustration','business') DEFAULT NULL,
  `projectID` int(10) NOT NULL,
  PRIMARY KEY (`skillID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skillID`, `skill`, `projectID`) VALUES
(1, 'film', 1),
(2, 'business', 2),
(3, 'film', 3),
(4, 'film', 4),
(5, 'business', 5),
(6, 'film', 6),
(7, 'editing', 5),
(8, 'illustration', 5),
(9, 'business', 7),
(10, 'business', 8),
(11, 'editing', 9),
(12, 'business', 9),
(13, 'illustration', 10),
(14, 'business', 11),
(15, 'film', 12);

-- --------------------------------------------------------

--
-- Table structure for table `socialmedialinks`
--

CREATE TABLE IF NOT EXISTS `socialmedialinks` (
  `socialMediaID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `icon` varchar(45) NOT NULL,
  PRIMARY KEY (`socialMediaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `socialmedialinks`
--

INSERT INTO `socialmedialinks` (`socialMediaID`, `name`, `icon`) VALUES
(1, 'Facebook', 'fa fa-facebook-official'),
(2, 'Twitter', 'fa fa-twitter'),
(3, 'YouTube', 'fa fa-youtube'),
(4, 'Pinterest', 'fa fa-pinterest-p'),
(5, 'Flickr', 'fa fa-flickr'),
(6, 'Vimeo', 'fa fa-vimeo-square'),
(7, 'Tumblr', 'fa fa-tumblr'),
(8, 'Google Plus', 'fa fa-google-plus');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `teamID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `info` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`teamID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_keyword`
--
ALTER TABLE `assign_keyword`
  ADD CONSTRAINT `fk_assign_keyword_keywords` FOREIGN KEY (`keywordID`) REFERENCES `keywords` (`keywordID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_assign_keyword_pages1` FOREIGN KEY (`pageID`) REFERENCES `pages` (`pageID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `assign_social_media`
--
ALTER TABLE `assign_social_media`
  ADD CONSTRAINT `fk_assign_social_media_socialmedialinks1` FOREIGN KEY (`socialMediaID`) REFERENCES `socialmedialinks` (`socialMediaID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
