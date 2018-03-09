-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 05:52 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(2, 'Javascript'),
(3, 'PHP'),
(4, 'Java'),
(5, 'REACT Native'),
(13, 'Native Script vs React Native'),
(16, 'AVVVVDD'),
(17, 'SQLite');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 5, 'Amit', 'amit@amit.com', 'This is one cool superhero', 'Approved', '2018-01-20'),
(3, 1, 'Amit', 'amit@amit.com', 'Its a good cms !', 'Approved', '2018-01-21'),
(8, 5, 'SS', 'SS@SS.SSS', 'SSSSSSSS', 'Unapproved', '2018-01-21'),
(9, 9, 'cc', 'ccc@ccc.ccc', 'ccc', 'Unapproved', '2018-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 1, 'A simple CMS', 'Amit', '2018-01-21', 'php.jpg', 'This is a CMS created with PHP by Amit.', 'cms, php, javascript', 4, 'publish'),
(4, 2, 'A simple React app', 'Amit', '2018-03-08', 'react.png', '<p>This is a simple React weather app.</p>', 'React, javascript, weather, app', 4, 'publish'),
(5, 3, 'Manbat', 'Amit', '2018-03-08', 'MANBAT.jpg', '<p>Funny pic.</p>', 'batman, manbat', 4, 'publish'),
(6, 1, 'Nice one, Good', 'AK', '2018-03-08', 'Screenshot (120).png', '<p>Ya its fine</p>', 'Nice one ', 4, 'publish'),
(9, 1, 'vvv', 'vvv', '2018-03-08', 'Screenshot (9).png', '<p>vvv</p>', 'vvv', 1, 'publish'),
(10, 1, 'qwqwqw', 'qwqwqw', '2018-03-09', 'Screenshot (23).png', '<p>sfsdf</p>', 'qwqwqwe', 4, 'publish'),
(11, 3, 'wetetet', 'rthffgfgdf', '2018-03-09', 'Screenshot (47).png', '<p>xbxbxv</p>', 'wewerwer', 0, 'publish'),
(12, 5, 'eewrtwerw', 'wqerqwerqwer', '2018-03-09', 'Screenshot (26).png', '<p>cvxvdf</p><p>&nbsp;</p>', 'werfvsd', 0, 'publish'),
(13, 13, 'rtyeryertyert', 'sgdfbfvxcv', '2018-03-09', 'Screenshot (64).png', '<p>cvbncghgfdh</p>', 'aefadfds', 0, 'publish'),
(14, 16, 'dfxbx cvjvhjdfg', 'sdfgdv xcv ', '2018-03-09', 'Screenshot (79).png', '<p>qwqweqewqweqw</p>', 'fgbdnfjjkg  jrrtyrte', 0, 'publish'),
(15, 17, 'mvnbnbnbnb', 'sdfsdfdsfasda', '2018-03-09', 'Screenshot (80).png', '<p>fdgsdgsdvd</p><p>&nbsp;</p>', 'fggggggggghgfhfg', 0, 'publish'),
(16, 17, 'vnmnmbmvbvb v', 'xdfvdvxc x x`', '2018-03-09', 'Screenshot (109).png', '<p>gdhdrthxd</p>', 'sdfgsdfsdfd', 0, 'publish'),
(17, 4, 'fdjdsljldkskj', 'sdfjsldfjs;lf', '2018-03-09', 'Screenshot (97).png', '<p>dfsdfsdfsdfs</p><p>&nbsp;</p>', 'sfsfsdfs', 0, 'publish'),
(18, 3, 'ldfjlfksjdflk', 'adsjf;lasdja;l', '2018-03-09', 'Screenshot (145).png', '<p>ldsfjsldjas</p><p>&nbsp;</p>', 'welafjasl', 0, 'publish'),
(19, 13, 'ldjdsljsd;ljdsfl', 'lasdjsldkjasl;dj', '2018-03-09', 'Screenshot (99).png', '<p>j;lvjx;lvjs;dlfjd</p><p>&nbsp;</p>', 'sdfkljdf;ldskjvf;l', 0, 'publish'),
(20, 4, 'jsdf;lsdjgportej', 'jsdlfjsd;lfjsd;', '2018-03-09', 'Screenshot (8).png', '<p>lsdfkjs;faweawe;l</p>', 'sjdfljdvljdsv;l', 0, 'publish'),
(21, 16, 'jdsfgdspgsdpgoisgpo', 'ssdlvjds;lfkjds;lfjsd;l', '2018-03-09', 'Screenshot (101).png', '<p>dfjsld;fjs;ldfjas;fj</p>', 'lsdflsjdflskd;jf;l', 0, 'publish'),
(22, 13, 'ldfjds;lfjsd;lfjas;ljs', 'sdlfjas;lfdja;slfj;', '2018-03-09', 'Screenshot (104).png', '<p>lks;djv;clvj;adsfl</p>', 'sjf;lkasjdf;asljfal;ja;l', 0, 'publish'),
(23, 4, 'jsd;lfjsv;lsjvs;ldjas;l', 'ldfjs;dfljasd;laj', '2018-03-09', 'Screenshot (132).png', '<p>lkdfjds;lkjds;</p>', 'sdjf;lsdjfs;ldfkj;', 0, 'publish'),
(24, 16, 'dslfgjds;lfjsd;l', ';ldfjsd;lfjs;lfjas;', '2018-03-09', 'Screenshot (16).png', '<p>dfjs;dlfjas;fjasj;</p>', 'sdf;ljasf;ljdf;asjl', 0, 'publish'),
(25, 5, 'js;ldfjas;fjas;fldjas;', 'sdfkljasf;as', '2018-03-09', 'Screenshot (31).png', '<p>ljdsf;sldjv;lvjas;l</p>', 'alsjdas;ljas;lj', 0, 'publish'),
(26, 5, 'sdl;fjsdf;lsdj;dslfjvs;ld', 'ldsfjs;dfjs;fdajs;', '2018-03-09', 'Screenshot (54).png', '<p>ldjl;vjsd;ljs;flaj;</p>', 'sfj;lasfjsa;fjas;ljsd;', 0, 'publish'),
(27, 2, 'sd;lfkds;lfkdfsgsdflgkjds', 'lsdjsldvjlsvjslfjsa;l', '2018-03-09', 'Screenshot (23).png', '<p>ldjflvjslfjsf;ljas</p>', 'ejdflas;lfjas;lfja;lj;j;laj;f', 0, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'iamrico', '$1$zXYWGLlY$tBTqlkb0QmRNPPm48l9yP.', 'rico', 'singh', 'ricosingh@gmail.com', '', 'admin', ''),
(2, 'amit1234', '$1$W.RXjxjN$wdpVA1KLWybIAnNwYGRRi0', 'Amit', 'Kr', 'amit1234@gmail.com', '', 'subscriber', ''),
(13, 'www', '$1$wKWlQRPt$Ti5FIinM7VrUPRuq385BF1', 'www', 'www', 'www@www.www', '', 'admin', '$2y$10$iusesomecrazystring22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
