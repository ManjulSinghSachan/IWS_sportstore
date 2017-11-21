-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2017 at 08:55 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sql12206252`
--
CREATE DATABASE IF NOT EXISTS `sql12206252` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sql12206252`;

-- --------------------------------------------------------

--
-- Table structure for table `cartpage`
--

DROP TABLE IF EXISTS `cartpage`;
CREATE TABLE IF NOT EXISTS `cartpage` (
  `product_id` int(10) DEFAULT NULL,
  `category_id` mediumint(8) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `price` text COLLATE utf8_bin NOT NULL,
  `photo` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` int(10) NOT NULL,
  `timeadd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
`category_id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'men_football_t-shirts'),
(2, 'men_football_shorts'),
(3, 'men_football_shoes'),
(4, 'men_footall_accessories'),
(5, 'men_basketball_t-shirts'),
(6, 'men_basketball_shorts'),
(7, 'men_basketball_shoes'),
(8, 'men_basketball_accessories'),
(9, 'men_cricket_t-shirts'),
(10, 'men_cricket_shortss'),
(11, 'men_cricket_shoes'),
(12, 'men_cricket_accessories'),
(13, 'women_football_t-shirts'),
(14, 'women_football_shorts'),
(15, 'women_football_shoes'),
(16, 'women_football_accessories'),
(17, 'women_basketball_t-shirts'),
(18, 'women_basketball_shorts'),
(19, 'women_basketball_shoes'),
(20, 'women_basketball_accessories'),
(21, 'women_cricket_t-shirts'),
(22, 'women_cricket_shorts'),
(23, 'women_cricket_shoes'),
(24, 'women_cricket_accessories');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pwd` varchar(200) NOT NULL,
`user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `email`, `pwd`, `user_id`) VALUES
('Harsh', 'harsh@gmail.com', 'harsh', 3),
('Itachi', 'itachi@gmail.com', '1234', 5),
('Kanishk Anand', 'kanishk.anand@gmail.com', 'kanishk', 1),
('Leo Messi', 'leomessi@gmail.com', 'leomessi', 2),
('Naruto', 'naruto@gmai.com', 'naruto', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `user_id` varchar(32) NOT NULL,
  `total_price` int(11) NOT NULL,
  `products` text NOT NULL,
`order_id` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`user_id`, `total_price`, `products`, `order_id`) VALUES
('5', 4852, '7,9,23,47,5,3,', 1),
('5', 4852, '7,9,23,47,5,3,', 2),
('5', 4852, '7,9,23,47,5,3,', 3),
('5', 500, '3,', 4),
('5', 2980, '11,', 5),
('5', 2560, '27,7,29,', 6),
('5', 540, '30,13,', 7),
('2', 1300, '9,', 8),
('2', 2130, '28,', 9);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
`product_id` int(10) NOT NULL,
  `category_id` mediumint(8) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `price` double NOT NULL,
  `detail` text COLLATE utf8_bin NOT NULL,
  `is_commend` tinyint(1) NOT NULL DEFAULT '0',
  `photo` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `price`, `detail`, `is_commend`, `photo`, `post_datetime`) VALUES
(1, 1, 'cramer 5 pad football shirt', 3200, 'Integrated closed-cell Spider Web EVA foam rib, spine and clavicle pads.\r\nVentilating mesh front panel\r\n80% Nylon/20% Spandex, anti-microbial and moisture-wicking', 0, 'spm/footballshirt_.jpg', '0000-00-00 00:00:00'),
(2, 2, 'adidas tastigo 17 shorts', 280, '100% Other Fibers\r\nImported\r\nMade for comfort Breathability Made for athletes\r\nBreathability Made for athletes\r\nMade for athletes', 0, 'spm/41+9dJXqhPL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(3, 3, 'Nike Men''s Hypervenom Phelon II Njr Ic Indoor Socc', 500, 'Synthetic\r\nRubber sole\r\nLow-profile silhouette\r\nLace-up closure for a snug fit\r\nSynthetic upper for good ball handling\r\n', 0, 'spm/51ExATrM6hL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(4, 4, 'Battle Ultra-Stick Receiver Gloves', 200, '90-Day Durability Guarantee\r\nUnlimited Defective Guarantee\r\nUltraTack palm takes you to the legal stick limit\r\nPerfectFit material the ultimate in comfort, breathability and performance\r\nRange of best-selling and limitd edition designs', 0, 'spm/51aGv-KYwML._AA160_.jpg', '0000-00-00 00:00:00'),
(5, 9, 'FOCIL INDIAN TEAM CRICKET T-SHIRT FOR MENS', 370, 'Wear it in upcomming IPL matches to represent your choice\r\nLycra Fit T Shirt', 0, 'spm/41jjgGAX3PL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(6, 10, 'Nautica Men''s Anchor Solid Navy Trunks Shorts', 390, '100% nylon\r\nBuilt-in Polyester Mesh Brief For Support\r\nSoft Elastic Waistband With Drawstring\r\nContrast Stitching & Small Signature Logo on Leg\r\nOne Back Pocket With Velcro Closure\r\nMade Of: 100% Nylon With 100% Polyester Lining', 0, 'spm/51qOCzsfrbL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(7, 11, 'Jazba Men''s SKYDRIVE 110 PU Mesh KPU Cricket Shoes', 590, 'Mesh\r\nImported\r\nRubber sole\r\nRubber spike cricket shoes\r\n3D Layer Craft TPU Cage\r\nPROGUARD: Toe area is reinforced for protection and durability.\r\nSeemless upper design provides support,breathability and protection.\r\nClassic Round Tip Rubber Cleats which helps 360 degree motion and advance cushioning on hard grounds.', 0, 'spm/41Lm4csvNPL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(8, 12, 'CW Cricket Kit With Accessories Senior Size', 1800, 'all in one cricket kit', 0, 'spm/416S7ClnklL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(9, 5, 'adidas Men''s Basketball All World Short Sleeve Tee', 650, '100% Other Fibers\r\nImported\r\nMade for comfort\r\nBreathability\r\nMade for athletes\r\n100% polyester mock eyelet 100% polyester interlock', 0, 'spm/41bI8za2BBL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(10, 6, 'Augusta Sportswear Men''s Hemmed Bottom Short', 200, '100% Polyester\r\n100% polyester wicking knit.\r\nWicks moisture away from the body.\r\nHeat sealed label.\r\nFull-cut.\r\n9-inch inseam.', 0, 'spm/41FQlfAFnJL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(11, 7, 'Nike Men''s The Air Overplay IX Basketball Shoe', 1490, 'Synthetic-And-Mesh\r\nImported\r\nRubber sole\r\nShaft measures approximately 2.88" from arch\r\nLace-up closure ensures a snug fit\r\nA padded tongue and collar provides comfort and ankle support\r\nFull Phylon midsole provides plush underfoot cushioning', 0, 'spm/41I1sO7HLNL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(12, 8, 'SKLZ Pro Mini Micro Hoop w/ Foam Ball', 240, 'INDOOR PLAY. The SKLZ Pro Mini Hoop Micro is the perfect over the door basketball hoop. Shoot safely from your office desk, living room, or bedroom for quick and easy fun. The high-quality hoop and metal rim ensure solid shots, rain or shine.\r\nSHATTERPROOF BACKBOARD. The 15” x 10” backboard is made of shatterproof clear polycarbonate for years of fun. This hoop has padded brackets on the backboard to minimize the impact on doors, so the only damage you do, will be to your opponents ego.\r\nBREAKAWAY RIM. With an 8” diameter spring action break-away rim, you can practice your technique day or night. The spring will bounce back into place once you make the shot. Practice your game or challenge friends with the SKLZ Pro Mini Hoop Micro.', 0, 'spm/41HKz7pPqNL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(13, 13, 'LAT Apparel Ladies Football Jersey V-Neck Tee Shor', 180, 'Superior Comfort: This Football Jersey Is the Top of the Line for Comfort. It''s Soft Flowing Fabric Blend Is Perfect for Looking Cute and Feeling Great. You''ll Never Want to Get Changed.\r\nVintage Look: Trends Come and Go but the Classic Football Shirt Look Is as Timeless as the Sport Itself. Look Casual, Comfortable, and Cute in This Top Whether You''re on the Field or at Home.\r\nNo Irritation: Even the Smallest Seams and Tags Can Be Irritating, so This Shirt Is Designed with Flatlock Stitching and Easytear Label to Make Sure That Comfort Is Always First Priority.', 0, 'spm/31JUUokm2jL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(14, 14, 'Nike Womens Equalizer Soccer Shorts', 250, 'Dri-FIT fabric pulls away sweat for dry comfort\r\nelastic waistband with drawcord helps secure your fit\r\npique fabric construction offers a textured feel. 100% polyester\r\n6'''' inseam\r\nLightweight knit short without brief.', 0, 'spm/41sktS-BgAL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(15, 15, 'adidas Performance Women''s Ace 16.4 FXG W Soccer S', 970, 'ynthetic\r\nImported\r\nSynthetic sole\r\nFlexible ground cleats for the playmaker\r\nSoft, lightweight Control Feel upper shapes to your foot for ultimate ball control\r\nComfortable lining\r\nClassic 3-Stripes\r\nMove with high-speed control and stability on firm ground (dry natural grass), artificial grass (long-bladed synthetic fiber) and hard ground with the Flexible Ground Outsole\r\n', 0, 'spm/41-jL6BxZzL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(16, 16, 'Luwint Adult Cotton Thicken Long Soccer Socks for ', 100, 'Professional socks, calf section mesh design, texture and comfortable\r\nBottom are Thick towel design, Anti-Slip Suck sweat\r\nElastic rubber band design, good elasticity\r\nAdult socks, unisex, one size; above 5 US size feet are recommended to wear\r\nSocks bottom length: 8.3'''', socks leg length: 17''''; 3.7 oz, One pair', 0, 'spm/41rWLeq4xjL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(17, 17, 'Women''s Compression Shirt Sport Performance Crewne', 260, 'FBARIC: 85% Polyester / 15% Spandex\r\nCOMPRESSION FIT: Second skin tight fit\r\nGo 1 size up for slim/regular fit\r\nSTAY COMFORT&DRY : Soft&stretch fabric wicks sweat away from your skin to help keep you dry and comfortable\r\nBEST FOR: all outdoor and indoor gym workouts (e.g.running/basketball)', 0, 'spm/51w8NTWHoLL._AC_UL260_SR200,260_.jpg', '0000-00-00 00:00:00'),
(18, 18, 'adidas Women''s Athletics Basketball Shorts', 350, '100% Other Fibers\r\nImported\r\nMade for comfort\r\nBreathability\r\nMade for athletes', 0, 'spm/41ZTGj90vsL._AC_UL260_SR200,260_.jpg', '0000-00-00 00:00:00'),
(19, 19, 'Nike Women''s Air Force 1 ''07 Basketball Shoe', 600, 'Leather-And-Synthetic\r\nRubber sole\r\nPerforated toe front detail\r\nLow top design with padded ankle collar for comfort\r\nThick sole with embossed ''Air'' logo at outer sides\r\n', 0, 'spm/41Yg1Na3oNL._AC_UL260_SR200,260_.jpg', '0000-00-00 00:00:00'),
(20, 20, 'Nike Swoosh Wristbands', 100, '74% Cotton / 21% Nylon / 3% Rubber / 2% Spandex\r\nImported\r\nNike Swoosh Wristbands\r\nEmbroidered Swoosh logo.\r\nSold in pairs.\r\nMachine washable / Easy care.\r\nWidth: 3 inches/7.62 cm.', 0, 'spm/51hcTjemFWL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(21, 21, 'Woman West Indies Cricket Board Flag Black V-Neck ', 270, 'West Indies Cricket Board FlagWomens V-Neck T Shirt\r\nMachine Wash.\r\nDigital Direct Printing,eco-friendly Ink.', 0, 'spm/417eGJD5aTL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(22, 22, 'Louis Garneau Latitude Short - Women''s Cricket Med', 360, 'Detachable Drytex 2002 innershorts with chamois, Powerband and a 6"/15 cm inseam: Can be worn together or separately\r\nZip fly with snap fastener\r\nAdjustable velcro side tabs: Offer a custom fit without pinching\r\nBelt loops: Allow you to wear your own belt\r\nSnap loop system: Compatible with LG innershorts', 0, 'spm/418+QMQDIsL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(23, 23, 'On Women''s Cloud Sneaker', 500, 'Mesh\r\nMade in USA or Imported\r\nSynthetic sole\r\nFrom the gym to the streets, you are sure to fall for the livable comfort, performance, and style of the Cloud from On™.', 0, 'spm/41FGYpfi0CL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(24, 24, 'Cricket Hat Blue', 120, 'Wide brim sun hat will keep you cool and protected\r\nIntegral towel band to keep you dry.\r\nMade of heavyweight cotton drill material.\r\nSize : Small, Medium, Large\r\n', 0, 'spm/41TbWTc5wCL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(25, 1, 'DRI-EQUIP Men''s Big & Tall Short Sleeve Moisture W', 190, 'DRI-EQUIP(tm)- Men''s TALL Athletic All Sport Training Tee Shirts in 23 Colors DRI-EQUIP Quick dry moisture management fabric is specially constructed to allow full range of motion while keeping you dry and comfortable. Our lightweight Tee has a roomy athletic cut and controls sweat . With a Performance loose fit, the DRI-EQUIP All Sport Training Tee delivers. Printed with DRI-EQUIP(tm) Logo Inside', 0, 'spm/31hJ7F9Af2L_AC_US218_.jpg', '0000-00-00 00:00:00'),
(26, 1, 'Defender Men''s Quick Dry Compression Baselayer Und', 520, 'Polyester 92%, Spandex 8% - Smooth and Ultra-Soft Fabric that provides extreme comfort with very little weight without restriction - Machine Washable.\r\nQuick and Dry Transport System - Wicks Sweat away from the body, keeping you cooler and drier.\r\nWorkout or Compete for all weather sports and activities - Cool in Summer and heat retention in winter.', 0, 'spm/418NFhuI3KL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(27, 2, 'Nike Mens Team Equalizer Soccer Shorts', 230, 'Imported\r\nPerformance shorts are perfect for all your moves on the pitch\r\n8" inseam\r\nElastic waistband with a drawstring 100% Dri-FIT knit polyester\r\nLightweight knit short without brief. ( color white has briefs)', 0, 'spm/41dW+I5KFML._AC_US218_.jpg', '0000-00-00 00:00:00'),
(28, 2, 'adidas Youth Parma 16 Shorts', 710, '100% polyester\r\nImported\r\nMade for Comfort\r\nBreathability\r\nMade for athletes', 0, 'spm/41f+vOJO7EL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(29, 3, 'adidas Performance Men''s Ace 16.4 FXG Soccer Shoe', 460, 'Synthetic\r\nImported\r\nSynthetic sole\r\nShaft measures approximately Low-Top" from arch\r\nFlexible ground cleats for the playmaker\r\nSoft, lightweight Control Feel upper shapes to your foot for ultimate ball control\r\nComfortable lining', 0, 'spm/41s4RcGcu2L._AC_UL246_SR190,246_.jpg', '0000-00-00 00:00:00'),
(30, 3, 'adidas Men''s Messi 16.3 Fg Soccer Shoe', 180, 'Synthetic\r\nImported\r\nRubber sole\r\nExperience zero wear-in time with the agility touch skin upper that molds perfectly to your foot the instant you slip it on\r\nSnug-fit mono-tongue construction keeps out turf material and turns on explosive agility', 0, 'spm/41e6BshbHiL._AC_UL246_SR190,246_.jpg', '0000-00-00 00:00:00'),
(31, 4, 'Under Armour Men''s F5 Football Gloves', 680, '100% Other Fibers\r\nImported\r\nMeets NFHS/NCAA/NOCSAE standards\r\nHeatGear fabric keeps your hands cool, dry & light\r\nBuilt to provide maximum flexibility, breathability & moisture transport\r\nCustom fit closure system', 0, 'spm/61K4KeBgQhL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(32, 4, 'Defender Men''s Compression Baselayer Running Tight', 490, 'Defender Men''s Compression Baselayer Running Tights', 0, 'spm/41jWhllHIyL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(33, 5, 'No.7 Bird Jersey Basketball Jersey Sports Embroide', 830, 'About 1-2 weeks arrive\r\nRefuse low quality products\r\nExquisite embroidery Double Stitch\r\n', 0, 'spm/51sxcbqkh+L._AC_US218_.jpg', '0000-00-00 00:00:00'),
(34, 5, 'No.2 Irving Jersey Basketball Jersey Sports Embroi', 420, 'About 1-2 weeks arrive\r\nRefuse low quality products\r\nExquisite embroidery Double Stitch', 0, 'spm/51Pe5jJrfIL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(35, 6, 'Rigorer Men''s Camouflage Mesh Basketball Shorts wi', 270, '100% polyester with wicking mesh body inserts\r\nDurable waist band with internal drawstring\r\nSide pockets for storage\r\nLightweight, durable stretch materials let you move with extreme comfort', 0, 'spm/51wqR8q3f-L._AC_US218_.jpg', '0000-00-00 00:00:00'),
(36, 6, 'TopTie Two Tone Basketball Shorts For Men with Poc', 540, 'Our basketball shorts are made of 100% polyester which offers these shorts comfort and durability, and high moisture wicking mesh body inserts that allows for free air circulation during sports activities like basketball, or during rigorous workouts.\r\nThe smart moisture control keeps your skin dry and thus help improve your performance by providing the best working conditions. The fabric is light and loose enough to allow for free movement of your body - thus not affecting your game performance in any way.', 0, 'spm/41nAJlMUqTL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(37, 7, 'AND1 Mens Xcelerate Basketball Shoe', 590, 'Synthetic\r\nShaft measures approximately High Top" from arch\r\nLow-Sew synthetic upper provides lightweight durability.\r\nHybrid low-sew construction enhances comfort and provides breathability.\r\nInternal bootie construction provides comfort and breathability.\r\nHigh rebound Duraspring Midsole Foam gives structural stability and provides impact cushioning.', 0, 'spm/41LM2TDw1FL._AC_UL260_SR200,260_.jpg', '0000-00-00 00:00:00'),
(38, 7, 'Nike Men''s Prime Hype DF II Basketball Shoe', 810, 'Synthetic-And-Leather\r\nRubber sole\r\nShaft measures approximately 2.5" from arch\r\nDecoupled collar for full-range ankle movement\r\nBreathe Tech construction for breathable support', 0, 'spm/41kIMApXT0L._AC_UL260_SR200,260_.jpg', '0000-00-00 00:00:00'),
(39, 8, 'SKLZ Shot Spotz - Basketball Training Markers', 600, 'Rubber\r\nMade in USA and Imported\r\nFun basketball game and effective learning tool\r\nComes with five 8-inch durable, high-density ground discs, numbered 1 through 5\r\nAllows for a variety of drills and games all over the court\r\nDevelops good court sense and positioning', 0, 'spm/51kAtD2m4aL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(40, 8, 'Unique Sports Dribble Specs Basketball Training Ai', 770, '6 pack of Dribble Specs\r\nUnique design helps train players to Dribble and handle the ball without looking down\r\nImproves ball handling\r\nDoes not interfere with Shooting\r\nSoft plastic material, molded nose piece, and adjustable fit makes this comfortable to wear', 0, 'spm/51I4gnW0EwL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(41, 9, 'Pro Impact Star India Cricket Mens T-Shirt MEDIUM', 150, '100% Polyester - STAR INDIA MENS CRICKET TSHIRT', 0, 'spm/51zGV1aFKgL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(42, 9, 'KD Cricket IPL Jersey Supporter Jersey T-Shirt 201', 200, '100% Polyester Wick Dry Material\r\nKolkatta Knight Riders, Mumbai Indians and Royal Challengers Bangalore Supporter Jersey 2017\r\nIts true to size. However some customers have given us feedback that it may be slightly on the Smaller Side So Order One Size Up', 0, 'spm/61J-Cbl4yoL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(43, 10, 'Under Armour Men''s Raid Printed 10" Shorts', 460, '100% Other Fibers\r\nMade in USA or Imported\r\nHeatGear fabric is ultra-soft & smooth for extreme comfort with very little weight\r\nUPF 30+ protects your skin from the sun''s harmful rays\r\n4-way stretch fabrication allows greater mobility in any direction\r\nMoisture Transport System wicks sweat & dries fast', 0, 'spm/41EQ6rDiQlL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(44, 10, 'CYZ Men''s Performance Jersey Short', 240, '100% Polyester\r\nLightweight athletic short featuring elastic waist with internal drawcord.\r\nSport underwear extends to the top of the thigh\r\nPro performance fabric blend wicks moisture away from the skin to keep you cool and dry\r\nAllows you to stay confident and comfortable throughout the day', 0, 'spm/41zzuwCCyxL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(45, 11, 'Yepme Cricket Batting / Fielding Shoes Quality Gea', 380, 'Mesh & Rexine\r\nEmpower the spirit of your game in these black and orange cricket batting shoes by Yepme.\r\nOuter Material: Mesh & Rexine\r\nSole: PVC\r\nClosure type: Lace-up\r\nColor: Black & Yellow', 0, 'spm/415+uOBIBjL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(46, 11, 'Kookaburra Pro 770 Cricket Spike Shoes - SS17', 560, 'Kookaburra Cage Technology - Offering essential ankle support.\r\nNewly Designed Outsole - Gives the wearer superb traction.\r\nWater Resistant Durable Upper - The very latest in breathable mesh construction.\r\nAdvanced Durafoam EVA Midsole - Offers superior shock absorption.\r\nStitched Toe Section - Gives enhanced durability.', 0, 'spm/518kgROtdoL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(47, 12, 'SS Yuvi 20/20 Cricket Bat Kashmir Willow by Sunrid', 310, 'An outstanding bat for T20 Cricket match\r\nSS Yuvi 20/20 Bat is amazing for perfect balance and excellent output\r\nThe comfort of the grip provides extreme pleasure for batting\r\nWeight 2.8 LBS (Short Handle)', 0, 'spm/41-x9+Rn+gL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(48, 12, 'SS Sangakara KS84 Premium Kashmir Willow Bat by Su', 490, 'This Bat is made of finest Kashmir Willow and named after the renowned Sri lankan cricketer Kumar Sangakara\r\nBest for better pick up and excellent shot delivery\r\nIt''s large sweet spot and Thick Edges made it an unbeatable among any other professional level cricket bat', 0, 'spm/41Ik2G43rSL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(49, 13, 'Meaneor Women''s V Neck Short Sleeve Basic Varsity ', 110, 'Material: 2% Polyester, 98% Cotton\r\nGarment Care: Machine Washable or Hand Wash in Cold\r\nShort Sleeve Tee , V Neck Top , Slim Fitting,Basic Girlfriends Football Shirts with Contrast Sleeve Stripes\r\nOur Model Information: Height 179cm, Bust 90cm, Waist 61cm, Hip 91cm\r\nThis football shirt can be paired with a cute pair of jeans when you are at the gym, playing sports, or at the mall', 0, 'spm/41eDeVd9vbL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(50, 13, 'Custom Kamal Ohava Women''s Replica Football Jersey', 290, 'Choose your jersey size and color then click the "Customize Now" button to choose the text and number you would like screen printed on the front and back of your jersey.\r\nChoose from a variety of different fonts.\r\nThese are WOMENS sizes with a feminine fit: please refer to product description for exact measurements. Plus sizes are available up to XXXXL (4XL).\r\nJersey is SportTek brand which is manufactured with PosiCharge technology to lock in color and wick away moisture.\r\nCrossover rib-knit v-neck and sleeve stripes.', 0, 'spm/41mkCYm46HL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(51, 14, 'adidas Women''s Soccer Tastigo 17 Shorts', 510, '100% Other Fibers\r\nImported\r\nVentilated climacool keeps you cool and dry\r\n13 cm inseam (size M)\r\nDrawcord on elastic waist', 0, 'spm/41LWXsM7e1L._AC_US218_.jpg', '0000-00-00 00:00:00'),
(52, 14, 'adidas Women''s Soccer Squadra 17 Shorts', 690, '100% Other Fibers\r\nImported\r\nMade for comfort Breathability Made for athletes\r\nBreathability Made for athletes\r\nMade for athletes', 0, 'spm/41ZsVMgMrtL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(53, 15, 'adidas Performance Women''s Ace 16.4 FXG W Soccer S', 390, 'Synthetic\r\nImported\r\nSynthetic sole\r\nFlexible ground cleats for the playmaker\r\nSoft, lightweight Control Feel upper shapes to your foot for ultimate ball control\r\nComfortable lining\r\nClassic 3-Stripes', 0, 'spm/41-jL6BxZzL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(54, 15, 'adidas Women''s Goletto Vi Fg W Soccer Shoe', 960, 'Leather\r\nImported\r\nSynthetic sole\r\nLightweight synthetic leather upper offers durability\r\nFg outsole\r\nDesigned for maximum traction on firm ground (dry natural grass)', 0, 'spm/411T-lhkRML._AC_US218_.jpg', '0000-00-00 00:00:00'),
(55, 16, 'McDavid Hex Thudd Shorts', 350, 'McDavid Adult Hexpad Thudd Football Girdle', 0, 'spm/31nG3wZCqjL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(56, 16, 'Nike Pro Combat Skull Cap', 120, 'Nike Pro Combat Skull Cap. Nike Dri-Fit keeps athletes dry and comfortable\r\nFlat seam construction lies smooth against the head\r\nTight, dynamic fit allows a wide range of motion', 0, 'spm/31lvDWZS1YL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(57, 17, 'Basketball Graphic Cap Sleeve Tee', 260, '50% Cotton/50% Polyester\r\nImported\r\n50% cotton/50% polyester fitted fit\r\nScreen printed graphic\r\nOfficial name & Number tee\r\nBy adidas, an official outfitter of the NBA', 0, 'spm/51GeSJIhZkL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(58, 17, 'NBA Women''s Assist Raglan Long Sleeve T-Shirt Top', 420, '60% Cotton, 40% Polyester\r\nImported\r\nOfficially Licensed By The NBA (National Basketball Association)\r\nPerfect for casual wear, exercise, yoga, lounging around the house, or anything in between\r\nHigh quality screen print graphics of team logo and name\r\nRaglan style design with stripe sleeves in team colors\r\nBallet style neckline; Machine washable', 0, 'spm/41mlWAJR6fL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(59, 18, 'Champion Women''s Mesh Short', 240, '100% Polyester\r\nImported\r\nElastic closure\r\nMachine Wash\r\nFoldover elastic waistband with Champion script logo\r\nBreathable mesh fabric helps keep you cool\r\nInner lining helps prevent rubbing and chafing\r\n4" inseam', 0, 'spm/41WFVbfdaRL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(60, 18, 'Women''s Mettle Basketball Short', 340, 'Steel Grate printed design accent\r\nDurable 2" waistband with internal drawcord', 0, 'spm/41kvd41Fx7L._AC_US218_.jpg', '0000-00-00 00:00:00'),
(61, 19, 'Under Armour Women''s UA Torch Fade Basketball Shoe', 860, 'Synthetic\r\nEngineered Women''s fit includes added padding in the heel & is designed specifically to support a more narrow foot structure\r\nLightweight leather upper with molded foam heel & forefoot to provide complete comfort and structure that moves with the foot\r\nMesh tongue offers increased breathability & a better fit\r\nMolded toe cap for added protection & durability\r\nOversized UA license plate logo for an elevated on court design', 0, 'spm/41Jbdwib66L._AC_US200_.jpg', '0000-00-00 00:00:00'),
(62, 19, 'Nike Women''s Hyperdunk 2016 TB Basketball Shoes', 360, 'Synthetic\r\nModel Number: 844391001\r\nGender: womens\r\nColor: Black / Black - White\r\nMade In: Vietnam\r\nBrand New With Original Box', 0, 'spm/51O2GwpmAWL._AC_US200_.jpg', '0000-00-00 00:00:00'),
(63, 20, 'Liomor Ankle Support Breathable Ankle Brace for Ru', 520, 'ULTRA-STRONG SUPPORT - Our ankle support fitted with crisscross reinforcement straps to offer strong support & stabilization for the ankle tendons and joints.\r\nIDEAL FOR ANKLE HEALTH - Designed to minimize the risk of injury especially during the strenuous activities, also helps to relieve edema and symptoms associated with acute injuries, which is ideal for sprains, tendonitis and arthritis.\r\nANTI ODOR & ANTI ITCH - Made of high-elastic and moisture wicking material. Interlayer with perforation design allows oxygen circulation to eliminate odor and prevent bacteria from breeding. Keep your feet dry and cool.', 0, 'spm/414wdq4Kh8L._AC_US218_.jpg', '0000-00-00 00:00:00'),
(64, 20, 'Nike Swoosh Doublewide Wristbands', 630, 'Nike Swoosh Doublewide Wristbands\r\nEmbroidered Swoosh logo\r\nSold in pairs\r\nMachine washable / Easy care\r\nWidth: 5 inches/12.7 cm', 0, 'spm/41jRzexxPtL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(65, 21, 'Louis Garneau Beeze Vent Women''s Jersey', 550, '[main body] Airfit| [insert panels] Airfit Mesh\r\nMaterial: [main body] Airfit, [insert panels] Airfit Mesh\r\nFit: semi form-fitting\r\nZip: 15in invisible\r\nSeason: spring, summer\r\nUPF Rating: 50', 0, 'spm/41MYo-SbORL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(66, 21, 'Eddany Usa sport Cricket Womens Long Sleeve T-Shir', 100, 'The Cricket Long Sleeve T-Shirt by Eddany\r\nT-Shirt 100% cotton\r\nGreat for gifts, holidays, anniversaries and other special occasions.\r\nWash Cold, Dry Low\r\nThe design is printed with new age printing technology', 0, 'spm/41mizDNubQL._AC_US160_.jpg', '0000-00-00 00:00:00'),
(67, 22, 'Louis Garneau Latitude Short - Women''s Cricket Lar', 370, 'Detachable Drytex 2002 innershorts with chamois, Powerband and a 6"/15 cm inseam: Can be worn together or separately\r\nZip fly with snap fastener\r\nAdjustable velcro side tabs: Offer a custom fit without pinching\r\nBelt loops: Allow you to wear your own belt\r\nSnap loop system: Compatible with LG innershorts', 0, 'spm/418+QMQDIsL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(68, 22, 'Woodworm West Indies Training Shorts', 290, 'Woodworm PowerDry fabric to absorb perspiration instantly and dry quickly.\r\nWoodworm Breathable fabric to allow increased air intake and circulation.\r\nWoodworm Extra-Stretch fabric for increased mobility and performance.', 0, 'spm/41pzcQrB0AL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(69, 23, 'Yepme Cricket Batting / Fielding Shoes Quality Gea', 390, 'Canvas\r\nEmpower the spirit of your game in these black and orange cricket batting/ fielding shoes by Yepme.\r\nOuter Material: Canvas\r\nSole: PVC\r\nClosure type: Lace-up', 0, 'spm/41zLyd8J9wL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(70, 23, 'Gray Nicolls 5604927 Atomic Cricket Shoes', 680, 'Brand: Gray Nicolls\r\nCricket shoes\r\nSize: US 9.5 - UK 8.5\r\nUS 9.5 - UK 8.5 size', 0, 'spm/41J3+Ry-tBL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(71, 24, 'Kookaburra Cricket Sun Hat', 130, 'Comfortable Wide Brim.\r\nIntegral Towel Band for moisture management.\r\nAvailable in Small, Medium, Large and X-Large.', 0, 'spm/31B3ibHyklL._AC_US218_.jpg', '0000-00-00 00:00:00'),
(72, 24, 'GUNN & MOORE Mogul F4.5 DXM 303 Cricket Bat, Short', 490, 'MOGUL F4.5 DXM 303 English willow grade is brand new for 2015! with an awesome Big Bat design, optimized flatter face, improved spin control and great feel!\r\nDri Guard - All GM English made bats are treated with GM DriGuard, a water repellent solution which is applied to the toe of the bat to reduce the absorption of water and thus prevent toe swelling!\r\nTOETEK - The specialized sturdy shield fitted to toe of the bat reduces toe damage and feathering that is often caused by tapping at the crease along with acting as a barrier to damp!', 0, 'spm/41CbkIfG5FL._AC_US218_.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `street` varchar(300) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `company` varchar(300) DEFAULT NULL,
  `alternate_email` varchar(300) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `street`, `zip`, `city`, `state`, `company`, `alternate_email`, `phone`, `user_id`) VALUES
('Kanishk', 'Anand', 'abcd', '213314', 'Dadri', 'Uttar Pradesh', 'Shiv Nadar University', '', '9971010807', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartpage`
--
ALTER TABLE `cartpage`
 ADD PRIMARY KEY (`timeadd`), ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`category_id`), ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`email`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`order_id`), ADD KEY `session_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`), ADD KEY `categories` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
