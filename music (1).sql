-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2014 at 06:30 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE IF NOT EXISTS `music` (
`id` int(3) NOT NULL,
  `band` varchar(25) NOT NULL,
  `album` varchar(30) NOT NULL,
  `format` varchar(5) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `quantity_aval` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `band`, `album`, `format`, `description`, `price`, `quantity_aval`) VALUES
(1, 'OAR', 'All Sides', 'CD', 'Proving that sometimes you can in fact go home again, the album is a reflection of OAR.\r\n', '8.99', 25),
(2, 'Queen', 'Greatest Hits', 'CD', 'Good old rock and roll.', '12.99', 15),
(3, 'The Killers', 'Direct Hits', 'CD', 'The Killers is an American rock band formed in Las Vegas, Nevada in 2001.', '10.99', 12),
(4, 'Coldplay', 'Greatest Hits', 'CD', 'All the best hits of this great band Coldplay', '12.99', 12),
(5, 'OAR', 'Any Time Now', 'CD', 'O.A.R. (an acronym for the bands full moniker, Of a Revolution) transformed itself from an independent college band to a Billboard chart-topper over the course of a long, varied career. ', '10.99', 2),
(6, 'Dave Matthews', 'Some Devil', 'CD', 'Formed in the early ''90s by South African vocalist/guitarist Dave Matthews, the Dave Matthews Band presented a more pop-oriented version of the Grateful Dead crossed with elements of jazz, funk, and t', '13.99', 7),
(7, 'Coldplay', 'Speed of Sound', 'CD', 'After surfacing in 2000 with the breakthrough single "Yellow," Coldplay quickly became one of the biggest bands of the new millennium, honing a mix of introspective Brit-pop and anthemic rock', '13.99', 17),
(8, 'The Killers', 'Believe Me Natalie', 'CD', 'Few bands in the early 2000s rose so quickly to the forefront of pop music as the Killers. With a mix of ''80s-styled synth pop and fashionista charm, the band''s street-smart debut, Hot Fuss, became on', '9.99', 23),
(9, 'The Temper Trap', 'Sweet Disposition', 'CD', 'With their choir boy vocals and panoramic pop/rock sound, the Temper Trap began building an audience in Melbourne, Australia, where the band first rose to local acclaim after playing St. Jerome''s Lane', '11.99', 8),
(10, 'Counting Crows', 'August and Everything After', 'CD', 'With their angst-filled hybrid of Van Morrison, the Band, and R.E.M., Counting Crows became an overnight sensation in 1994.', '10.99', 11),
(11, 'The Script', 'Science and Faith', 'CD', 'A self-described "Celtic soul" trio, the Script were founded by guitarist Mark Sheehan and vocalist Danny O''Donoghue in 2001. ', '8.99', 21),
(12, 'Imagine Dragons', 'Night Vision', 'CD', 'Las Vegas-based indie rockers Imagine Dragons formed in Provo, Utah in 2009. Like their desert-born stadium rock contemporaries the Killers, Imagine Dragons blend engaging, synth-based dance-pop with ', '11.99', 31),
(13, 'OneRepublic', 'Dreaming Out Loud', 'CD', 'OneRepublic had spent five years touring the musical minor leagues before its release, with Tedder splitting his time between the band''s work and production gigs for other artists', '12.99', 14),
(14, 'Coldplay', 'Ghost Stories', 'CD', 'The group''s emergence was perfectly timed; Radiohead had just released the overly cerebral Kid A, while Oasis had ditched two founding members and embraced psychedelic experimentation on Standing on t', '11.99', 10),
(15, 'Smashing Pumpkins', 'Oceania', 'CD', 'Of all the major alternative rock bands of the early ''90s, Smashing Pumpkins were the group least influenced by traditional underground rock. ', '14.50', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
