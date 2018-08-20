-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2018 at 05:07 PM
-- Server version: 5.6.36
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antiques`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Ceramics / Porcelain'),
(2, 'Furniture'),
(3, 'Masks'),
(4, 'Paintings'),
(5, 'Statuary / Sculpture / Carvings / Castings'),
(6, 'Boxes / Chests'),
(7, 'Silver'),
(8, 'Sports Memorabilia'),
(9, 'Tools / Implements'),
(10, 'Wearables'),
(11, 'Militaria'),
(12, 'Musical Instruments'),
(13, 'Books / Maps'),
(14, 'Scientific Instruments'),
(15, 'Food / drink related'),
(16, 'Nautical'),
(17, 'Advertising'),
(18, 'Toys'),
(19, 'Cards'),
(20, 'Ceremonial / Religious'),
(21, 'Miniature'),
(22, 'Architectural'),
(23, 'Lighting'),
(24, 'Clocks / Watches'),
(25, 'Photos'),
(26, 'Mirrors'),
(27, 'NA'),
(28, 'Bottles / Containers for Liquids');

-- --------------------------------------------------------

--
-- Table structure for table `compositions`
--

DROP TABLE IF EXISTS `compositions`;
CREATE TABLE IF NOT EXISTS `compositions` (
  `compositionID` int(11) NOT NULL,
  `materialName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compositions`
--

INSERT INTO `compositions` (`compositionID`, `materialName`) VALUES
(1, 'Brass/Bronze'),
(2, 'Canvas'),
(3, 'Bamboo/Wicker'),
(4, 'Ceramic/Porcelain'),
(5, 'Hide/Leather/Fur'),
(6, 'Glass/Crystal'),
(7, 'Plaster/Gesso'),
(9, 'Marble/Stone/Jade'),
(10, 'Paper/Cardboard'),
(11, 'Wicker/Bamboo'),
(12, 'Tin/Pewter'),
(13, 'Silver'),
(14, 'Wood'),
(15, 'Iron/Steel'),
(16, 'Copper/Bronze'),
(17, 'Lacquer/Cinnebar'),
(18, 'Textile/Cloth/Silk'),
(19, 'Other'),
(20, 'Bakelite'),
(21, 'Ivory/Bone'),
(22, 'Digital'),
(23, 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `dimensions`
--

DROP TABLE IF EXISTS `dimensions`;
CREATE TABLE IF NOT EXISTS `dimensions` (
  `itemID` int(11) NOT NULL,
  `width` decimal(11,2) NOT NULL,
  `height` decimal(11,2) NOT NULL,
  `depth` decimal(11,2) NOT NULL,
  `weight` decimal(11,2) NOT NULL,
  `dimensionsDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dimensions`
--

INSERT INTO `dimensions` (`itemID`, `width`, `height`, `depth`, `weight`, `dimensionsDesc`) VALUES
(1, 14.00, 48.00, 2.00, 3.00, ''),
(2, 12.00, 8.00, 5.00, 2.00, ''),
(3, 24.00, 28.00, 12.00, 13.00, ''),
(4, 24.00, 28.00, 12.00, 8.00, ''),
(5, 30.00, 43.00, 12.00, 30.00, ''),
(6, 0.00, 3.50, 0.00, 0.50, ''),
(7, 0.00, 2.00, 0.00, 1.00, ''),
(8, 17.00, 10.00, 5.00, 1.00, ''),
(9, 15.00, 8.00, 12.00, 3.00, ''),
(10, 15.00, 8.00, 12.00, 3.00, ''),
(11, 15.00, 8.00, 12.00, 3.00, ''),
(12, 36.00, 60.00, 1.00, 3.00, ''),
(13, 6.00, 18.00, 2.00, 14.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `imageID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `imageName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageID`, `itemID`, `imageName`) VALUES
(1, 1, '3-gopes-faces.jpg'),
(2, 1, '3-gopes-horiz.jpg'),
(3, 2, '33_h-0.jpg'),
(4, 2, '33_g1.jpg'),
(5, 3, 'guanyin01.jpg'),
(6, 3, 'guanyin11.jpg'),
(7, 4, '00633_44.JPG'),
(8, 4, '00633_29.JPG'),
(9, 5, '3_d.jpg'),
(10, 5, '3_a.jpg'),
(11, 5, '3_d.jpg'),
(12, 5, '3_a.jpg'),
(13, 6, 'famrose4.jpg'),
(14, 6, 'famrose5.jpg'),
(15, 7, 'plat1.jpg'),
(16, 7, 'plat7.jpg'),
(17, 8, '28_a.jpg'),
(18, 8, '28_f.jpg'),
(19, 9, '14_h.jpg'),
(20, 9, ''),
(21, 9, '14_j.jpg'),
(22, 10, 'hepplewhite-chair-06.jpg'),
(23, 10, 'hepplewhite-chair-07.jpg'),
(24, 11, '04-image2.jpg'),
(25, 11, '01-image6.jpg'),
(26, 12, 'Chinese_Painted_Ancestor_Panel_20th_Century_941_10.jpg'),
(27, 12, 'Chinese_Painted_Ancestor_Panel_20th_Century_941_11.jpg'),
(28, 13, '00553_70.jpg'),
(29, 13, '00553_86.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `itemID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `isAvailable` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `year` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `compositionID` int(11) NOT NULL,
  `originID` int(11) NOT NULL,
  `mainImageID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `title`, `isAvailable`, `description`, `price`, `year`, `categoryID`, `compositionID`, `originID`, `mainImageID`) VALUES
(1, 'Papua New Guinea Gope Board with finial, ex. Laurie Bragge collection', 1, 'Exquisitely carved in raised relief, with natural pigment polychrome, 48" tall.\r\n\r\nPapua New Guinea Gope Board with finial, ex. Laurie Bragge collection. Mr. Bragge was a Patrol Officer in charge of the Sepik Region for the Australian colonial government from 1971-76, during which time he collected this gope, as well as many other old, authentic and tribally used pieces', 875.00, 1930, 5, 14, 52, 1),
(2, 'George III mahogany and satinwood tea caddy', 1, 'sarcophagus form with satinwood string inlay, late-18th - early 19th century\r\n\r\nA very fine George III mahogany Tea Caddy of sarcophagus form with satinwood string inlay, with hinged lip opening to reveal twin lidded compartments flanking a period cut glass mixing bowl; cross banded mahogany veneer inlay with diamond-shaped bone escutcheon, all original brass hardware includes basket-of-flowers ringed pulls and ball feet', 1750.00, 1810, 6, 14, 68, 3),
(3, 'Guanyin statue', 1, 'Carved wood and lacquered Guanyin figure in â€œRoyal Relaxationâ€ pose on lotus stand; traces of polychrome lacquer; square notch cut in back for anchoring figure to its niche', 3750.00, 1750, 3, 14, 44, 5),
(4, 'Chinese carved and lacquered mirror stand', 1, 'Carved and lacquered mirror stand or table-top altar, with three-panel screen lavishly carved in the Ming manner, with tendrils and central lotus; adorned with short-snouted dragon heads; cupboard doors flanked by finial-topped posts, opening to reveal two pull drawers, each with lozenge-shaped pull; appears to retain original surface and snipe-hinge hardware; abundant signs of authentic use and age', 850.00, 1750, 2, 14, 45, 7),
(5, 'Papua New Guinea Kakame figure', 1, 'Rare and fine Kakame ancestor spirit figure made from a single piece of wood, with each limb a tree branch, with raised relief carving and natural pigment polychrome', 1200.00, 1930, 5, 14, 42, 11),
(6, 'Censer', 1, 'Porcelain, polychrome enamel bowl with mythical beasts in medallions', 1275.00, 1730, 1, 4, 44, 13),
(7, '18th century Japanese Imari scalloped charger', 1, 'Polychrome enamels, gilding and underglaze blue in dark colbalt blue; most likdely made for Dutch market, c. 1730\r\n\r\nDark colbalt underglaze blue with vivid enameled polychrome and gilding; eight scalloped panels surrounding central vase; apocryphal Ming Jiajing reign mark; repaired break, terminating in \r\nsmall chip on reverse', 875.00, 1760, 1, 4, 42, 15),
(8, 'Rare c. 1800 American Federal Period military bicorn hat', 1, 'Beaver, silk, leather and brass, embroidered with stars & eagles circa 1800\r\n\r\nVery rare American military bicorn hat, circa 1800, of embroidered silk featuring eagles and stars, together with beaver fur lining, metal, possibly electrum, braids and epaulettes, with a leather lining', 1500.00, 1800, 11, 18, 41, 17),
(9, 'African Congo Lulua maternity figure', 1, 'Exquisitely carved, with kaolin over black pigment over fine honey-colored wood\r\n\r\nAfrican Congo Lulua maternity figure. Exquisitely carved, with kaolin over black pigment over fine honey-colored wood. Fine raised relief, notch cut in chest and throat for holding sacrificial items; beautiful proportions, a very rare piece', 2345.00, 1920, 6, 14, 12, 19),
(10, 'American Hepplewhite carved mahogany side chair, c. 1790', 1, 'American Hepplewhite carved mahogany side chair, c. 1790, shield back with carved back splat, spade feet and original basket weave seat', 1800.00, 1790, 2, 12, 49, 22),
(11, 'French brass hourglass, inset with two Napoleon medallions, dated 1805', 1, 'French brass hourglass, inset with two Napoleon medallions, dated 1805, Medallions commemorate Napoelon''s coronation as Emperor of Italy in Milan, May 1805. medallion-coins are silver-plated bronze, numismatically excellent, uncirculated coins, one displaying obverse with bust of Napoleon Bonaparte, the reverse showing a classical temple, as well as the date MDXXXV (1805)', 1875.00, 1830, 11, 18, 49, 24),
(12, '18th-19th century Chinese ancestor portrait', 1, 'Six seated and robed figures in courtyard with ancestral shrine; identifying calligraphy; foo dogs flanking entrance', 2500.00, 1830, 4, 18, 5, 26),
(13, 'Chinese Ananda iron Lohan figure', 1, 'Iron figure with praying hands, traces of polychrome and gilding, evidence of mounting in temple niche: square-cut hole in back of head, old anchoring nails', 250.00, 1850, 5, 15, 44, 28);

-- --------------------------------------------------------

--
-- Table structure for table `origins`
--

DROP TABLE IF EXISTS `origins`;
CREATE TABLE IF NOT EXISTS `origins` (
  `originID` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `era` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `origins`
--

INSERT INTO `origins` (`originID`, `place`, `era`) VALUES
(1, '', 'Ming Dynasty'),
(2, '', 'Elizabethan'),
(3, '', 'Jacobean'),
(4, '', 'Louie XIV'),
(5, '', 'Qing Dynasty'),
(6, '', 'Louie XV'),
(8, '', 'William and Mary'),
(9, '', 'Queen Anne'),
(10, '', 'George I'),
(11, '', 'George II'),
(12, '', 'George III'),
(13, '', 'Louie XVI'),
(14, '', 'Reproduction'),
(15, '', 'Regency'),
(16, '', 'Victorian'),
(17, '', 'Art Nouveau'),
(18, '', 'Art Deco'),
(19, '', 'post-WWII'),
(20, '', 'Baroque'),
(21, '', 'English Chippendale'),
(22, '', 'American Chippendale'),
(23, '', 'English Hepplewite'),
(24, '', 'American Hepplewhite'),
(25, '', 'English Sheraton'),
(26, '', 'American Sheraton'),
(27, '', 'American William and Mary'),
(28, '', 'American Queen Anne'),
(29, '', 'Renaissance Revival'),
(30, '', 'American Civil War'),
(31, '', 'Eastlake'),
(32, '', 'Arts and Crafts'),
(33, '', 'Hudson Valley'),
(34, '', 'Pilgrim Century'),
(35, '', 'American Empire'),
(36, '', 'American Federal'),
(37, '', 'Rococo'),
(38, '', 'American Neo-Classical'),
(39, '', 'French Empire'),
(40, '', 'Chinese Republic'),
(41, '', 'Pennsylvania German'),
(42, '', '19th century'),
(43, '', '1st qtr 20th century'),
(44, '', 'c. 2nd qtr 20th century'),
(45, '', 'c. 3rd qtr 20th century'),
(46, '', 'Centennial Era (1875-1900)'),
(47, '', 'c. 3rd qtr 19th century'),
(48, '', 'c. 2nd qtr 19th century'),
(49, '', 'c. 1st qtr 19th century'),
(50, '', '4th qtr 20th century'),
(51, '', 'c. early 18th century'),
(52, '', 'c. mid 18th century'),
(53, '', 'c. late 18th century'),
(54, '', 'Pop Art'),
(55, '', 'Contemporary'),
(56, '', 'Renaissance'),
(57, '', '17th century'),
(58, '', '16th century'),
(59, '', 'Edo Period'),
(60, '', 'late Ming - early Qing'),
(61, '', 'mid-Qing'),
(62, '', 'late-Qing'),
(63, '', 'late 19th - early 20th century'),
(64, '', 'Ming Dynasty'),
(65, '', 'early Ming'),
(66, '', 'mid-Ming'),
(67, '', 'late-Ming'),
(68, '', 'Qing Dynasty'),
(69, '', 'Ming Dynasty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `compositions`
--
ALTER TABLE `compositions`
  ADD PRIMARY KEY (`compositionID`);

--
-- Indexes for table `dimensions`
--
ALTER TABLE `dimensions`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `origins`
--
ALTER TABLE `origins`
  ADD PRIMARY KEY (`originID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `compositions`
--
ALTER TABLE `compositions`
  MODIFY `compositionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `origins`
--
ALTER TABLE `origins`
  MODIFY `originID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
