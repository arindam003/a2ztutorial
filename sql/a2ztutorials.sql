-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 11:57 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a2ztutorials`
--

-- --------------------------------------------------------

--
-- Table structure for table `homepage_banner`
--

CREATE TABLE `homepage_banner` (
  `slide_id` int(11) NOT NULL,
  `image_src` varchar(250) NOT NULL,
  `image_src2` varchar(255) NOT NULL,
  `image_caption` text NOT NULL,
  `image_caption2` text NOT NULL,
  `image_caption3` varchar(111) NOT NULL,
  `link_bttn_name` varchar(255) NOT NULL,
  `link_bttn_link` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage_banner`
--

INSERT INTO `homepage_banner` (`slide_id`, `image_src`, `image_src2`, `image_caption`, `image_caption2`, `image_caption3`, `link_bttn_name`, `link_bttn_link`, `added_on`, `updated_on`, `status`) VALUES
(1, 'banner11.jpg', 'logo_white.png', 'TUTORIALS ', 'THAT  DELIVER RESULTS', '', '', '', '2021-07-23 09:23:26', '2021-07-23 10:23:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages_mng`
--

CREATE TABLE `pages_mng` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading_title` longtext NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `descrip` longtext NOT NULL,
  `meta_keyword` longtext NOT NULL,
  `meta_descrip` longtext NOT NULL,
  `image_src` varchar(255) NOT NULL,
  `heading2` varchar(255) NOT NULL,
  `descrip2` text NOT NULL,
  `image_src2` varchar(255) NOT NULL,
  `heading3` varchar(255) NOT NULL,
  `descrip3` text NOT NULL,
  `image_src3` varchar(255) NOT NULL,
  `heading4` varchar(255) NOT NULL,
  `descrip4` text NOT NULL,
  `image_src4` varchar(255) NOT NULL,
  `heading5` varchar(255) NOT NULL,
  `descrip5` text NOT NULL,
  `image_src5` varchar(255) NOT NULL,
  `extra_title` longtext NOT NULL,
  `extra_descrip` longtext NOT NULL,
  `canonical_tag` longtext NOT NULL,
  `robot_index` varchar(100) NOT NULL,
  `robotindex` varchar(50) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages_mng`
--

INSERT INTO `pages_mng` (`id`, `title`, `heading_title`, `meta_title`, `page_slug`, `descrip`, `meta_keyword`, `meta_descrip`, `image_src`, `heading2`, `descrip2`, `image_src2`, `heading3`, `descrip3`, `image_src3`, `heading4`, `descrip4`, `image_src4`, `heading5`, `descrip5`, `image_src5`, `extra_title`, `extra_descrip`, `canonical_tag`, `robot_index`, `robotindex`, `added_on`, `status`) VALUES
(7, 'Home', 'Affordable Private Tuition from £20/hr', '', 'Home', 'We pride ourselves on the ease and flexibility of our tuitionprocess, that&rsquo;s why payment is on a pay as you learn basis,with no upfront or hidden charges.', '', '', 'about1.png', 'A learning plan customised to your specif needs', 'Every student is different. That\'s why we create a learning plan that is perfectly adapted to each student, allowing them to learn at their own pace and build up their confidence along the way.', 'about2.png', 'Highly trained and professional tutors', 'All tutors go through an admission and vetting process which includes training', 'about3.jpg', 'Virtual Classroom', 'High-quality tutoring when &amp; where you want. Digital whiteboard, recording function, screen sharing and much more interative lesson experience.', 'virtual.jpg', '', '', '', '', '', '', 'follow', 'index', '2021-06-09 05:02:50', 1),
(8, 'becometutor', 'WHY ONLINE TUTORING?', '', 'becometutor', 'Lorem Ipsum Dolor Set Amot Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque', '', '', 'bat1.png', 'SHARE YOUR SKILLS WITH KIDS WHO REALLY NEED IT', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', 'bat2.png', 'YOU WON’T BE STRAPPED FOR CASH', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', 'bat3.png', 'IT’S PERFECT FOR YOUR CV', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', 'bat4.png', 'WE SUPPORT YOU ALL THE WAY', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', '', '', '', '', '', '', '2021-06-09 11:08:19', 1),
(9, 'Tutorregistration', 'WORK FROM ANYWHERE', '', 'Tutorregistration', 'All tutorials take place in our online lesson space. This means you can work remotely, wherever you are. All you need is a laptop, earphones, and a stable internet connection.', '', '', '', 'NO PREVIOUS EXPERIENCE REQUIRED', 'Most of our tutors had never tutored before starting with us. You just need to be someone who:1.Enjoys working with people&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2.Loves their subject3.Is looking for a flexible job', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-06-10 13:29:15', 1),
(10, 'About Us', 'WHO WE ARE', '', 'About Us', 'We are a group of passionate teaching professionals , who offer one &ndash; to &ndash; one and group teaching sessions to students at Tuition Centes situated in local libraries &amp; community centres. We have a combined teaching experience of over 35 years and the Head Tutor &ndash; Leslie Quaynor has over 15 years teaching experience', '', '', '', 'THE PROBLEM', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'about-page11.jpg', 'THE SOLUTION', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'about-page1.jpg', '', '', 'about-page2.jpg', '', '', '', '', '', '', '', '', '2021-06-14 03:42:02', 1),
(11, 'Findtutor', 'Looking For Anything Specific?', '', 'Findtutor', 'Let our free tutor-matching service do the searching for you. Simply tell us what you&rsquo;re looking for and one of our tutor experts will be in touch with a shortlist of tutors just for you.', '', '', 'looking.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-07-05 02:46:41', 1),
(12, 'How-it-work', 'ONE-TO-ONE ONLINE TUITION TO RAISE YOUR GRADE', '', 'How-it-work', 'Lorem Ipsum Dolor Set Amot', '', '', '', 'MEET TUTORS FOR FREE BEFORE YOU BOOK', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'howitworks1.png', 'IT’S FLEXIBLE AND SAVES YOU TIME', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'howitworks2.png', 'FIND A TUTOR WITH THE SKILLS YOU NEED', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', '', '', '', '', '', '', '', '', '', '2021-06-14 09:41:29', 1),
(13, 'tnc', 'LOREM IPSUM', '', 'tnc', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-06-15 02:28:03', 1),
(14, 'privacypolicy', 'LOREM IPSUM', '', 'privacypolicy', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-06-15 03:33:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings_mng`
--

CREATE TABLE `settings_mng` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no_1` varchar(255) NOT NULL,
  `phone_no_2` varchar(255) NOT NULL,
  `phone_no_3` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `logo` varchar(255) NOT NULL,
  `fav_icon` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `g_plus` varchar(255) NOT NULL,
  `q_head_1` varchar(255) NOT NULL,
  `q_head_2` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings_mng`
--

INSERT INTO `settings_mng` (`id`, `email`, `phone_no_1`, `phone_no_2`, `phone_no_3`, `address`, `logo`, `fav_icon`, `facebook`, `twitter`, `linkedin`, `youtube`, `g_plus`, `q_head_1`, `q_head_2`, `added_on`) VALUES
(1, 'info@a2ztutorials.co.uk', '07738169928', '', '', 'Elm Park Library&nbsp;12 St Nicholas Ave Hornchurch RM12 4PT', 'logo_green4.png', 'logo_green5.png', '', '', '', '', '', '', '', '2021-07-24 20:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_availability`
--

CREATE TABLE `tbl_availability` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `timing_id` int(11) NOT NULL,
  `dayname_id` int(11) NOT NULL,
  `status` enum('0','1') DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_availability`
--

INSERT INTO `tbl_availability` (`id`, `teacher_id`, `timing_id`, `dayname_id`, `status`, `added_on`) VALUES
(1, 37, 1, 1, '1', '2021-07-18 18:30:00'),
(2, 35, 2, 2, '1', '2021-07-19 06:08:43'),
(4, 37, 1, 3, '1', '2021-07-19 07:00:33'),
(33, 37, 1, 3, '1', '2021-07-20 03:29:53'),
(37, 35, 1, 5, '1', '2021-07-20 03:45:06'),
(38, 4, 2, 3, '1', '2021-07-22 07:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_becometutor`
--

CREATE TABLE `tbl_becometutor` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `descrip` text NOT NULL,
  `image_src` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_becometutor`
--

INSERT INTO `tbl_becometutor` (`id`, `heading`, `descrip`, `image_src`, `status`, `added_on`, `updated_on`) VALUES
(2, 'Remote', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', 'hiw-remote1.png', '1', '2021-06-10 02:21:38', '2021-06-10 06:51:04'),
(3, 'Rewarding', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', 'hiw-reward.png', '1', '2021-06-10 02:22:03', '2021-06-10 06:52:03'),
(4, 'Well Paid', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.Consumers in the United Kingdom get through&nbsp;', 'hiw-paid2.png', '1', '2021-06-10 04:45:29', '2021-06-10 06:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `email`, `name`, `subject`, `message`, `added_on`, `updated_on`) VALUES
(2, 'jonny@gmail.com', 'Jonny Sen', '', 'Good', '2021-07-05 03:55:20', '0000-00-00 00:00:00'),
(3, 'jonny@gmail.com', 'Jonny Sen', '', 'Good', '2021-07-05 05:51:26', '0000-00-00 00:00:00'),
(4, 'jonny@gmail.com', 'Jonny Sen', '', 'Good', '2021-07-05 05:52:34', '0000-00-00 00:00:00'),
(5, 'sani@gmail.com', 'sani roy', '', 'good', '2021-07-05 05:53:00', '0000-00-00 00:00:00'),
(6, 'sani@gmail.com', 'sani roy', '', 'good', '2021-07-05 06:05:08', '0000-00-00 00:00:00'),
(7, 'rocky@gmail.com', 'Rocky', '', 'good', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'rocky@gmail.com', 'Rocky', '', 'good', '2021-07-14 05:13:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dayname`
--

CREATE TABLE `tbl_dayname` (
  `id` int(11) NOT NULL,
  `days_name` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dayname`
--

INSERT INTO `tbl_dayname` (`id`, `days_name`, `status`, `added_on`) VALUES
(1, 'mon', '1', '2021-07-19 06:54:24'),
(2, 'tue', '1', '2021-07-19 06:54:24'),
(3, 'wed', '1', '2021-07-19 06:54:24'),
(4, 'thu', '1', '2021-07-19 06:54:24'),
(5, 'fri', '1', '2021-07-19 06:54:24'),
(6, 'sat', '1', '2021-07-19 06:54:24'),
(7, 'sun', '1', '2021-07-19 06:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_days`
--

CREATE TABLE `tbl_days` (
  `days_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `timing_id` int(11) NOT NULL,
  `days1_id` int(11) NOT NULL,
  `mon` varchar(10) NOT NULL,
  `tue` varchar(10) NOT NULL,
  `wed` varchar(10) NOT NULL,
  `thu` varchar(10) NOT NULL,
  `fri` varchar(10) NOT NULL,
  `sat` varchar(20) NOT NULL,
  `sun` varchar(10) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_days`
--

INSERT INTO `tbl_days` (`days_id`, `teacher_id`, `timing_id`, `days1_id`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`, `status`, `added_on`) VALUES
(1, 37, 1, 0, 'on', '', '', 'on', '', '', 'on', '1', '2021-07-18 18:30:00'),
(3, 35, 2, 0, 'on', '', 'on', '', '', 'on', '', '1', '2021-07-21 18:30:00'),
(4, 4, 2, 0, '', 'on', '', '', '', '', 'on', '1', '2021-07-21 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `question`, `answer`, `status`, `added_on`, `updated_on`) VALUES
(2, 'For whom do we offer our services to. ', 'Our services are open for all. Our focus area is mainly primary and secondary schoo kids but we also offer some adult tuition experience.', '1', '2021-06-18 07:31:22', '2021-06-04 11:54:52'),
(3, 'Who are the A2Z Tutors ?', 'Tutors at A2Z are committed teachers&amp; University students who are experts in their respective subjects. Before tutors can offer online classes, they have to pass a thorough quality check and training programme.', '1', '2021-06-09 04:17:22', '2021-06-04 12:07:22'),
(4, 'What are the benefits of online tutoring?', '\r\nLessons are Interactive &amp; can be recorded for future revision\r\nRemote access from everywhere -just need wi-fi (parents can log in remotely by simply clicking a link and monitor tuition sessions)\r\nNon evasive and private (you don&rsquo;t need a tutor to come directly into your private home)\r\nMore access to our substantial list of national tutors across the whole country whereas face to face tuition limits you to local tutors only.\r\nAfffordable and lower prices than face to face\r\n', '1', '2021-06-09 04:18:01', '2021-06-04 15:40:32'),
(5, 'How to find a tutor?', 'Finding a tutor is very easy. Whatever you need, you can search and filter by subject, level, price and many more.View our tutors, and narrow your search by subject, academic level or price. Or if you\'d like expert help, you can book a free session with our team who will assist you to find a suitable tutor. You can compare tutor profiles and learn about their background, experience and availability. Don\'t forget to look at their reviews from parents and students!\r\nMessage a tutor (or two, or three) and book your free meeting at a time that suits you. Book a lesson and pay as you go. There are no hidden costs and you can skip or cancel any time.', '1', '2021-06-09 04:18:28', '2021-06-04 15:40:58'),
(8, 'How do online lessons work?', 'Our virtual classrooms uses a live video chat, messaging and an interactive whiteboard - this makes it easy for students and tutors to talk to each other, discuss tricky concepts and do practice questions together. The innovative teaching software allows for a natural back-and-forth conversation between tutor and student- just like on FaceTime, Whatsapp and other apps teens use all the time.', '1', '2021-06-09 04:18:51', '2021-06-09 08:48:51'),
(9, 'How do I become a tutor? ', 'Register via our website on the &ldquo;Become a Tutor&rdquo; page. Our team of expert recruiters will follow up your enquiry and call you to discuss all the documents required to register with us.', '1', '2021-06-09 04:19:12', '2021-06-09 08:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_featured`
--

CREATE TABLE `tbl_featured` (
  `featured_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `image_src` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_featured`
--

INSERT INTO `tbl_featured` (`featured_id`, `heading`, `image_src`, `status`, `added_on`, `updated_on`) VALUES
(1, 'WE ARE FEATURED IN', 'bbc-icon1.png', '1', '2021-07-02 08:05:57', '2021-06-07 08:49:29'),
(2, 'WE ARE FEATURED IN', 'sundaytimes-icon.png', '1', '2021-06-07 04:20:36', '2021-06-07 08:50:36'),
(3, 'WE ARE FEATURED IN', 'sky-icon.png', '1', '2021-06-07 04:20:56', '2021-06-07 08:50:56'),
(4, 'WE ARE FEATURED IN', 'theguardian-icon.png', '1', '2021-06-07 04:21:14', '2021-06-07 08:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade`
--

CREATE TABLE `tbl_grade` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_grade`
--

INSERT INTO `tbl_grade` (`id`, `name`, `status`, `added_on`, `updated_on`) VALUES
(1, '7', '1', '2021-06-23 06:01:17', '2021-06-23 10:24:02'),
(2, 'A*', '1', '2021-06-23 05:55:36', '2021-06-23 10:25:36'),
(4, 'A', '1', '2021-06-23 06:02:56', '2021-06-23 10:32:56'),
(5, 'B', '1', '2021-06-23 07:14:30', '2021-06-23 11:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_how_it_works`
--

CREATE TABLE `tbl_how_it_works` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `descrip` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_how_it_works`
--

INSERT INTO `tbl_how_it_works` (`id`, `heading`, `descrip`, `status`, `added_on`, `updated_on`) VALUES
(1, 'Talk Face To Face', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', '1', '2021-06-14 11:37:49', '2021-06-14 16:07:49'),
(2, 'Share and collaborate', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', '1', '2021-06-14 11:38:08', '2021-06-14 16:08:08'),
(3, 'Rewatch lessons', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', '1', '2021-06-14 11:39:33', '2021-06-14 16:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_levels`
--

CREATE TABLE `tbl_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_levels`
--

INSERT INTO `tbl_levels` (`id`, `name`, `status`, `added_on`, `updated_on`) VALUES
(1, 'Professional ', '1', '2021-06-22 11:09:14', '2021-06-22 15:39:14'),
(2, 'Primary', '1', '2021-06-22 11:09:31', '2021-06-22 15:39:31'),
(3, '11 Plus', '1', '2021-06-22 11:09:42', '2021-06-22 15:39:42'),
(4, '13 Plus', '1', '2021-06-22 11:12:46', '2021-06-22 15:42:46'),
(5, 'KS3', '1', '2021-06-22 11:12:57', '2021-06-22 15:42:57'),
(6, 'GCSE', '1', '2021-06-22 11:13:09', '2021-06-22 15:43:09'),
(7, 'National 4 & 5', '1', '2021-06-22 11:13:22', '2021-06-22 15:43:22'),
(8, 'Scottish Highers', '1', '2021-06-22 11:13:32', '2021-06-22 15:43:32'),
(9, 'A -Level', '1', '2021-06-22 11:13:44', '2021-06-22 15:43:44'),
(10, 'University ', '1', '2021-06-22 11:23:45', '2021-06-22 15:44:47'),
(11, 'Adult', '1', '2021-06-22 11:14:56', '2021-06-22 15:44:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`id`, `teacher_id`, `message`, `user_id`, `status`, `added_on`) VALUES
(8, 3, 'good', 1, '1', '2021-07-21 01:39:58'),
(9, 4, 'not bad', 2, '1', '2021-07-21 01:53:05'),
(10, 4, 'hi sir', 1, '1', '2021-07-21 03:54:54'),
(11, 0, 'good', 0, '1', '2021-07-21 09:33:37'),
(12, 0, 'zzdd', 0, '1', '2021-07-21 09:33:45'),
(23, 0, 'gggg', 0, '1', '2021-07-22 04:41:56'),
(24, 0, 'gggg', 0, '1', '2021-07-22 04:42:39'),
(25, 0, 'hh', 0, '1', '2021-07-22 04:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ourteam`
--

CREATE TABLE `tbl_ourteam` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `descrip` text NOT NULL,
  `image_src` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ourteam`
--

INSERT INTO `tbl_ourteam` (`id`, `name`, `designation`, `address`, `descrip`, `image_src`, `status`, `added_on`, `updated_on`) VALUES
(1, 'Sanny', 'members', 'Hornchurch', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'test1.jpg', '1', '2021-06-14 07:54:58', '2021-06-14 12:24:13'),
(2, 'Monny', 'members', 'Hornchurch', 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'test4.jpg', '1', '2021-06-14 07:55:44', '2021-06-14 12:25:44'),
(3, 'Jonny', 'members', 'Hornchurch', 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'test2.jpg', '1', '2021-06-14 07:56:18', '2021-06-14 12:26:18'),
(4, 'Tonny', 'members', 'Hornchurch', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'test21.jpg', '1', '2021-06-14 08:15:21', '2021-06-14 12:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qualifications`
--

CREATE TABLE `tbl_qualifications` (
  `qua_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `levels_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_qualifications`
--

INSERT INTO `tbl_qualifications` (`qua_id`, `teacher_id`, `levels_id`, `subject_id`, `grade_id`, `status`, `added_on`) VALUES
(2, 4, 4, 2, 2, '0', '2021-06-29 09:42:13'),
(4, 35, 1, 1, 1, '1', '2021-06-29 09:44:35'),
(28, 35, 10, 4, 4, '1', '2021-06-30 09:30:20'),
(29, 3, 9, 3, 4, '1', '2021-06-30 09:43:36'),
(30, 3, 4, 3, 4, '0', '2021-06-30 18:30:00'),
(31, 3, 10, 4, 5, '1', '2021-06-30 18:30:00'),
(32, 4, 10, 4, 5, '1', '2021-06-30 18:30:00'),
(33, 37, 11, 4, 4, '1', '2021-07-04 18:30:00'),
(34, 37, 6, 5, 2, '1', '2021-07-07 18:30:00'),
(35, 35, 10, 4, 4, '0', '2021-07-13 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `id` int(11) NOT NULL,
  `testimonials_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL,
  `levels_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`id`, `testimonials_id`, `teacher_id`, `subjects_id`, `levels_id`, `status`) VALUES
(1, 1, 4, 0, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signup`
--

CREATE TABLE `tbl_signup` (
  `id` int(11) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `slug_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `town` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `postalcode` varchar(50) NOT NULL,
  `dateofbirth` date NOT NULL,
  `travel` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `yourbio` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `image_src` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `levels` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL,
  `rating` float NOT NULL,
  `grade` varchar(10) NOT NULL,
  `total_session` int(11) NOT NULL,
  `class_timing` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `session` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `subject_offered` varchar(100) NOT NULL,
  `total_reviews` float NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_on` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_signup`
--

INSERT INTO `tbl_signup` (`id`, `usertype_id`, `slug_name`, `email`, `name`, `university`, `phone`, `title`, `firstname`, `lastname`, `gender`, `address1`, `address2`, `town`, `county`, `country`, `postalcode`, `dateofbirth`, `travel`, `language`, `yourbio`, `experience`, `image_src`, `degree`, `price`, `levels`, `subjects`, `rating`, `grade`, `total_session`, `class_timing`, `about`, `session`, `password`, `category`, `message`, `subject_offered`, `total_reviews`, `added_on`, `updated_on`, `status`) VALUES
(1, 1, '', 'joy@gmail.com', 'Joy Sen', '', '7896543214', '', '', '', 'Male', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', 'Student', '', '', 0, '2021-07-26 07:51:37', '0000-00-00 00:00:00', '1'),
(2, 2, '', 'sani2@gmail.com', 'Sani Roy', '', '7896543217', '', '', '', 'Male', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', 'Parent', '', '', 0, '2021-07-26 07:51:40', '0000-00-00 00:00:00', '1'),
(3, 0, '', 'jonny@gmail.com', 'Jonny Sen1', 'Techno India', '07894563214', 'Mr', '', '', 'Male', 'kolkata', '', '', '', 'UK', '', '0000-00-00', 'home', 'English', 'As of 2020 it has been twelve since I first began studying politics at Sixth Form and the field has only become more fascinating .', 'As of 2020 it has been twelve since I first began studying politics at Sixth Form and the field has only become more fascinating .', 'test21.jpg', 'Political Theory (Doctorate) ', '43', 'null', 'null', 3.7, '', 2, '', 'As of 2020 it has been twelve since I first began studying politics at Sixth Form and the field has only become more fascinating .', 'My philosophy is that intrigue and fascination always come before learning; the best students are those who genuinely want to learn and the best teachers are those who stoke that genuine interest. Both politics and philosophy are particularly suited to this kind of approach as they&nbsp;touch&nbsp;aspects of life that everybody cares about; the role of teaching them is to demonstrate this connection.', '81dc9bdb52d04dc20036dbd8313ed055', 'Teacher', '', '[\"Maths\",\"Physics\"]', 0, '2021-07-26 05:45:38', '0000-00-00 00:00:00', '1'),
(4, 3, '', 'rahul@gmail.com', 'Rahul Roy', 'kolkata', '7899456123', 'Mr', '', '', 'Male', '', '', '', '', 'UK', '', '0000-00-00', 'home', 'English', 'As of 2020 it has been twelve since I first began studying politics at Sixth Form and the field has only become more fascinating .', 'As of 2020 it has been twelve since I first began studying politics at Sixth Form and the field has only become more fascinating .', 'test2.jpg', 'Political Theory (Doctorate) ', '43', 'null', 'null', 4.7, '', 0, '', 'As of 2020 it has been twelve since I first began studying politics at Sixth Form and the field has only become more fascinating .', 'As of 2020 it has been twelve since I first began studying politics at Sixth Form and the field has only become more fascinating .', '81dc9bdb52d04dc20036dbd8313ed055', 'Teacher', '', '[\"English\",\"Maths\"]', 0, '2021-07-26 07:51:49', '0000-00-00 00:00:00', '1'),
(35, 3, '', 'sani@gmail.com', 'sani roy', 'kolkata', '07894563214', 'Ms', 'sani ', 'roy', 'Female', 'kolkata', 'kolkata2', 'kolkata', 'Outside UK', 'UK', '0121231', '2021-06-01', '5 miles', 'German', 'As of 2020 it has been twelve since I first began studying politics at Sixth Form and the field has only become more fascinating .', '21 years', 'test4.jpg', 'Political Theory (Doctorate) ', '43', 'null', 'null', 2.8, '', 2, '', 'As of 2020 it has been twelve since I first began studying politics at Sixth Form and the field has only become more fascinating .', 'my sessions will be based around the student\'s needs. I will link all lessons back to the specification, focusing on a deep understanding of the topic. I will also use a variety of practice exam questions to test the progress', '81dc9bdb52d04dc20036dbd8313ed055', 'Teacher', '', '[\"Physics\"]', 2, '2021-07-26 07:51:57', '0000-00-00 00:00:00', '1'),
(37, 3, '', 'suman@gmail.com', 'Suman Roy', 'Techno India', '07894563214', 'Mr', 'suman', 'ray', 'Male', 'Maharastra', 'kolkata2', 'pune', 'India', 'UK', '033', '2015-01-05', '20 miles', 'English', 'I am Software Developer', '2 years', 'test22.jpg', 'Political Theory (Doctorate) ', '43', 'null', 'null', 2.4, '', 0, '', 'As of 2020 it has been twelve since I first began studying politics at Sixth Form and the field has only become more fascinating .', 'As of 2020 it has been twelve since I first began studying politics at Sixth Form and the field has only become more fascinating .', '81dc9bdb52d04dc20036dbd8313ed055', 'Teacher', '', '[\"Biology\"]', 0, '2021-07-26 07:52:07', '0000-00-00 00:00:00', '1'),
(41, 2, '', 'test2@gmail.com', 'test2', '', '7894561236', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', 0, '2021-07-26 02:51:59', '0000-00-00 00:00:00', '1'),
(42, 1, '', 'test1@gmail.com', 'test1', '', '7894563214', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', '250cf8b51c773f3f8dc8b4be867a9a02', '', '', '', 0, '2021-07-27 09:06:48', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE `tbl_subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`id`, `name`, `status`, `added_on`, `updated_on`) VALUES
(1, 'English', '1', '2021-06-24 03:02:12', '2021-06-22 09:56:15'),
(2, 'Maths', '1', '2021-06-22 08:08:25', '2021-06-22 12:38:25'),
(3, 'Physics', '1', '2021-06-22 08:38:49', '2021-06-22 13:08:49'),
(4, 'Biology', '1', '2021-06-22 08:48:19', '2021-06-22 13:18:19'),
(5, 'Chemistry ', '1', '2021-06-22 08:48:44', '2021-06-22 13:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonials`
--

CREATE TABLE `tbl_testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL,
  `levels_id` int(11) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `descrip` text NOT NULL,
  `image_src` varchar(255) NOT NULL,
  `rating` float NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `added_by` varchar(20) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_testimonials`
--

INSERT INTO `tbl_testimonials` (`id`, `name`, `teacher_id`, `subjects_id`, `levels_id`, `usertype`, `descrip`, `image_src`, `rating`, `added_on`, `added_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'Joni', 0, 0, 0, 'Parent', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt', 'test2.jpg', 1.6, '2021-06-11 02:35:10', '', '0000-00-00 00:00:00', '', '1'),
(2, 'Mona', 0, 0, 0, 'Teacher', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt', 'test1.jpg', 2.3, '2021-06-11 02:34:53', '', '0000-00-00 00:00:00', '', '1'),
(3, 'Sana', 0, 0, 0, 'Parent', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt', 'test3.jpg', 2.8, '2021-06-11 02:35:22', '', '0000-00-00 00:00:00', '', '1'),
(4, 'Joyi', 0, 0, 0, 'Parent', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt', 'test4.jpg', 2, '2021-06-11 02:35:40', '', '0000-00-00 00:00:00', '', '1'),
(5, 'Moni', 0, 0, 0, 'Teacher', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt', 'test11.jpg', 1.8, '2021-06-11 02:35:59', '', '0000-00-00 00:00:00', '', '1'),
(6, 'Joli', 0, 0, 0, 'Teacher', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt', 'test31.jpg', 1.6, '2021-06-11 02:36:15', '', '0000-00-00 00:00:00', '', '1'),
(10, 'Toni', 0, 0, 0, 'Teacher', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt', 'test12.jpg', 1.7, '2021-06-11 02:36:30', '', '0000-00-00 00:00:00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timing`
--

CREATE TABLE `tbl_timing` (
  `id` int(11) NOT NULL,
  `days` varchar(100) NOT NULL,
  `timing` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_timing`
--

INSERT INTO `tbl_timing` (`id`, `days`, `timing`, `status`, `added_on`, `updated_on`) VALUES
(1, '', '12pm-5pm', '1', '2021-06-24 04:15:06', '2021-06-24 08:17:29'),
(2, '', 'After 5pm', '1', '2021-06-24 04:15:32', '2021-06-24 08:41:01'),
(3, '', 'Pre 12pm', '1', '2021-06-24 04:12:26', '2021-06-24 08:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutor`
--

CREATE TABLE `tbl_tutor` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `descrip` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tutor`
--

INSERT INTO `tbl_tutor` (`id`, `heading`, `descrip`, `status`, `added_on`, `updated_on`) VALUES
(2, 'WORK FROM ANYWHERE', 'All tutorials take place in our online lesson space. This means you can work remotely, wherever you are. All you need is a laptop, earphones, and a stable internet connection.', '1', '2021-06-10 11:08:28', '2021-06-10 15:38:28'),
(3, 'No previous experience required', 'Most of our tutors had never tutored before starting with us. You just need to be someone who:&nbsp; &nbsp;\r\n&nbsp; &nbsp; 1.Enjoys working with people &nbsp; &nbsp; &nbsp; &nbsp; 2.Loves their subject&nbsp; &nbsp; &nbsp; &nbsp; 3.Is looking for a flexible job', '1', '2021-06-10 11:21:19', '2021-06-10 15:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `user_code` varchar(100) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `profile_url` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1' COMMENT '0 no 1 yes',
  `created_by` tinyint(11) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_type`, `user_code`, `name`, `profile_url`, `email`, `mobile`, `password`, `status`, `created_by`, `created_on`, `updated_on`) VALUES
(1, NULL, '', 'ADMIN', 'admin', 'admin', NULL, 'e10adc3949ba59abbe56e057f20f883e', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE `tbl_usertype` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`type_id`, `type_name`, `added_on`) VALUES
(1, 'Student', '2021-07-26 06:44:58'),
(2, 'Parent', '2021-07-26 06:44:58'),
(3, 'Teacher', '2021-07-26 06:44:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homepage_banner`
--
ALTER TABLE `homepage_banner`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `pages_mng`
--
ALTER TABLE `pages_mng`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_mng`
--
ALTER TABLE `settings_mng`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_availability`
--
ALTER TABLE `tbl_availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_becometutor`
--
ALTER TABLE `tbl_becometutor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dayname`
--
ALTER TABLE `tbl_dayname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_days`
--
ALTER TABLE `tbl_days`
  ADD PRIMARY KEY (`days_id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `tbl_featured`
--
ALTER TABLE `tbl_featured`
  ADD PRIMARY KEY (`featured_id`);

--
-- Indexes for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_how_it_works`
--
ALTER TABLE `tbl_how_it_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_levels`
--
ALTER TABLE `tbl_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ourteam`
--
ALTER TABLE `tbl_ourteam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_qualifications`
--
ALTER TABLE `tbl_qualifications`
  ADD PRIMARY KEY (`qua_id`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_signup`
--
ALTER TABLE `tbl_signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_timing`
--
ALTER TABLE `tbl_timing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tutor`
--
ALTER TABLE `tbl_tutor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homepage_banner`
--
ALTER TABLE `homepage_banner`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pages_mng`
--
ALTER TABLE `pages_mng`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings_mng`
--
ALTER TABLE `settings_mng`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_availability`
--
ALTER TABLE `tbl_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_becometutor`
--
ALTER TABLE `tbl_becometutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_dayname`
--
ALTER TABLE `tbl_dayname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_days`
--
ALTER TABLE `tbl_days`
  MODIFY `days_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_featured`
--
ALTER TABLE `tbl_featured`
  MODIFY `featured_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_how_it_works`
--
ALTER TABLE `tbl_how_it_works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_levels`
--
ALTER TABLE `tbl_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_ourteam`
--
ALTER TABLE `tbl_ourteam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_qualifications`
--
ALTER TABLE `tbl_qualifications`
  MODIFY `qua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_signup`
--
ALTER TABLE `tbl_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_timing`
--
ALTER TABLE `tbl_timing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tutor`
--
ALTER TABLE `tbl_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
