-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2024 at 06:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supercare`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `main_title` text DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT '#45AC8B',
  `video` text DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `image`, `main_title`, `title`, `color`, `video`, `description`, `created_at`, `updated_at`) VALUES
(1, 'public/backend/image/about/1723131442.773.jpg', 'We Offer Different Services To Improve Your Health', 'About Us', '#000000', 'https://www.youtube.com/embed/vyit-1zKsZ4?si=VKsFHXBmf26XxGx2', '<ul><li>dummy</li><li>adasda</li><li>sadas</li><li>dasd</li><li>asdasdasdasdas</li><li>asdasdas</li><li>asdasd</li></ul>', '2024-08-08 09:37:22', '2024-09-03 23:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `date`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Tyrone Sweet', 'fikiquxyto@mailinator.com', '2024-08-08 00:00:00', 1, '2024-08-08 10:50:23', '2024-08-08 10:50:23'),
(5, 'Burke Spencer', 'wewefem@mailinator.com', '2024-08-08 00:00:00', 1, '2024-08-08 10:51:25', '2024-08-08 10:51:25'),
(6, 'Angelica Freeman', 'qusypory@mailinator.com', '2024-08-13 00:00:00', 1, '2024-08-13 01:06:12', '2024-08-13 01:06:12'),
(7, 'Rhea Brennan', 'zoqulubin@mailinator.com', '2024-08-13 00:00:00', 1, '2024-08-13 01:08:34', '2024-08-13 01:08:34'),
(8, 'Eagan Powers', 'rafic@mailinator.com', '2024-08-13 00:00:00', 1, '2024-08-13 01:50:04', '2024-08-13 01:50:04'),
(11, 'Ivor Leon', 'xunicus@mailinator.com', '2024-09-05 00:00:00', 1, '2024-09-05 05:13:03', '2024-09-05 05:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `banner_img` varchar(255) NOT NULL,
  `appointment_url` varchar(255) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deActive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `banner_img`, `appointment_url`, `page`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Modern Interior Design Studio', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl pellentesque, faucibus libero eu, gravida quam.', 'public/backend/image/banner/1735042002.1081.png', 'https://supercarehospitalbd.com/appointment', 'home', 1, '2024-08-07 10:19:55', '2024-12-24 06:06:42'),
(2, 'About', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl pellentesque, faucibus libero eu, gravida quam.', 'public/backend/image/banner/1735042015.1599.png', '#', 'about', 1, '2024-08-07 10:20:54', '2024-12-24 22:55:46'),
(3, 'Blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl pellentesque, faucibus libero eu, gravida quam.', 'public/backend/image/banner/1735042021.1774.png', '#', 'blog', 1, '2024-08-07 10:21:32', '2024-12-24 22:55:27'),
(4, 'Contact', 'Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.', 'public/backend/image/banner/1735042028.323.png', NULL, 'contact', 1, NULL, '2024-12-24 22:54:45'),
(5, 'Service', 'Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.', 'public/backend/image/banner/1735042034.3943.png', NULL, 'service', 1, NULL, '2024-12-24 22:55:03'),
(6, 'Shop', 'Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.', 'f', NULL, 'shop', 1, NULL, '2024-12-24 22:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `basic_infos`
--

CREATE TABLE `basic_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `mobile_logo` text DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `phone_optional` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_optional` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `address_optional` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `pinterest` text DEFAULT NULL,
  `facebook_pixel` text DEFAULT NULL,
  `google_analytics` text DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `footer_logo` text DEFAULT NULL,
  `footer_text` text DEFAULT NULL,
  `favicon` text DEFAULT NULL,
  `appointment_side_img` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_infos`
--

INSERT INTO `basic_infos` (`id`, `logo`, `mobile_logo`, `whatsapp`, `phone`, `phone_optional`, `email`, `email_optional`, `address`, `address_optional`, `facebook`, `twitter`, `youtube`, `linkedin`, `instagram`, `pinterest`, `facebook_pixel`, `google_analytics`, `google_map`, `footer_logo`, `footer_text`, `favicon`, `appointment_side_img`, `created_at`, `updated_at`) VALUES
(1, 'public/backend/image/basicInfo/1735043811.118.png', NULL, '+8801310494646', '+8801310494646', '+8801310494646', 'support@supercarehospitalbd.com', 'support@supercarehospitalbd.com', 'Dhaka', 'Dhaka', 'https://www.facebook.com/profile.php?id=61560007019220', '#', '#', '#', '#', '#', 'asdas', 'sada', '#', NULL, '', NULL, 'public/backend/image/basicInfo/1735043811.1158.png', '2024-08-07 09:45:04', '2024-12-24 06:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_short_desc` text DEFAULT NULL,
  `blog_long_desc` text NOT NULL,
  `blog_image` text DEFAULT NULL,
  `blog_author` text DEFAULT NULL,
  `blog_author_img` text DEFAULT NULL,
  `blog_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `blog_short_desc`, `blog_long_desc`, `blog_image`, `blog_author`, `blog_author_img`, `blog_date`, `status`, `created_at`, `updated_at`) VALUES
(4, 'We have annnocuced our new product.', 'Lorem ipsum dolor a sit ameti, consectetur adipisicing elit, sed do eiusmod tempor incididunt sed do incididunt sed.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. Curabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum consequat, pretium pretium nulla. Suspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, interdum metus vel, tincidunt diam.</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum consequat, pretium pretium nulla. Suspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, interdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula egestas. Sed velit nulla, viverra non commod</p><p><img src=\"https://wpthemesgrid.com/themes/mediplus/img/blog2.jpg\" alt=\"#\" width=\"557\" height=\"373\"></p><p><img src=\"https://wpthemesgrid.com/themes/mediplus/img/blog3.jpg\" alt=\"#\" width=\"557\" height=\"373\"></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. Curabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum consequat, pretium pretium nulla. Suspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, interdum metus vel, tincidunt diam.</p><blockquote><p>Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum consequat, pretium pretium nulla. Suspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, interdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula egestas. Sed velit nulla, viverra non commodo et, sodales</p></blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. Curabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum consequat, pretium pretium nulla. Suspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, interdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula egestas. Sed velit nulla, viverra non commodo et, sodales id dui.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. Curabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum consequat, pretium pretium nulla. Suspendisse</p>', 'public/backend/image/blog/1723114985blog1.jpg', 'Sabbir', NULL, '2024-08-08', 1, '2024-08-08 05:03:05', '2024-08-08 05:03:05'),
(5, 'Ipsum excepturi sit', 'Natus distinctio Qu', '<p>In the heart of a bustling city, where the streets were alive with the hum of activity, a small café stood tucked away in a quiet corner. The scent of freshly brewed coffee wafted through the air, mingling with the sound of clinking cups and murmured conversations. Sunlight streamed through the large windows, casting a warm glow over the wooden tables and the eclectic mix of patrons.</p><p>A young woman sat by the window, her fingers tapping idly on the rim of her coffee cup as she stared out at the world beyond. The café was her sanctuary, a place where she could escape the demands of daily life and lose herself in thought. Today, her mind wandered to the possibilities that lay ahead, the dreams she had yet to chase, and the paths she had yet to discover.</p><p>Across the room, an older gentleman flipped through the pages of a well-worn book, his brow furrowed in concentration. He was a regular at the café, known for his quiet demeanor and the way he always chose the same corner seat. The staff had grown fond of him, often sneaking an extra cookie onto his saucer when he wasn\'t looking.</p><p>The café was more than just a place to grab a quick coffee; it was a hub of stories waiting to be told. From the laughter shared over a shared table to the quiet moments of reflection, each visit added a new chapter to the lives of those who passed through its doors. And as the day drew to a close, the café would quietly hum with the echoes of the day’s events, waiting patiently for the next morning when the stories would begin again.</p>', 'public/backend/image/blog/1723136478blog2.jpg', 'Dolor recusandae Qu', NULL, '2024-08-08', 1, '2024-08-08 11:01:18', '2024-08-25 03:49:16'),
(6, 'About Full-Stack Web Developer Md Shahadat', 'I create product design and brand experience', '<p>As a passionate Full Stack Web Developer, I specialize in crafting dynamic and responsive web applications. Proficient in HTML, CSS, and JavaScript, I bring designs to life using React.js for seamless front-end experiences. My backend expertise is anchored in PHP, with a strong focus on Laravel, where I excel at building robust and scalable applications.</p><h4><strong>Full-Stack Web Developer</strong></h4><p>I have successfully completed numerous e-commerce projects, overseeing the entire development process from concept to deployment. With a certified full-stack development background, I am committed to delivering high-quality solutions that meet client needs and enhance user experiences.</p>', 'public/backend/image/blog/1735102250IMG_7348.JPG', 'admin', NULL, '2024-12-25', 1, '2024-12-24 22:50:50', '2024-12-24 22:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@admin.com|::1', 'i:2;', 1723529361),
('admin@admin.com|::1:timer', 'i:1723529361;', 1723529361),
('admin5@gmail.com|::1', 'i:1;', 1722960565),
('admin5@gmail.com|::1:timer', 'i:1722960565;', 1722960565);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `name`, `message`, `created_at`, `updated_at`) VALUES
(2, 4, 'Rifat Bhuiyan', 'Good Service', '2024-08-08 06:20:42', '2024-08-08 06:20:42'),
(3, 4, 'Saif hossain', 'Very Good Clean Hospital', '2024-08-08 07:02:28', '2024-08-08 07:02:28'),
(4, 4, 'Stuff', 'Good Behavior', '2024-08-08 07:04:27', '2024-08-08 07:04:27'),
(5, 4, 'SuperAdmin', 'nice Attitude', '2024-08-08 07:04:42', '2024-08-08 07:04:42'),
(6, 4, 'Sabbir Bhuiyan', 'Testing', '2024-08-08 07:12:06', '2024-08-08 07:12:06'),
(7, 4, 'Rifat Khan', 'jiasodjsoakjdkasc', '2024-08-13 00:05:49', '2024-08-13 00:05:49'),
(8, 5, 'Rifat Khan', 'Is Sick.', '2024-08-20 05:07:16', '2024-08-20 05:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `mobile`, `message`, `created_at`, `updated_at`) VALUES
(5, 'Harvey Miller', 'harvey.websolution9@gmail.com', '8456404550', 'Hello,\r\nYour website is encountering significant SEO (Search Engine Optimization) issues, affecting its visibility on search engines like Google, Bing, and Yahoo. Please provide your phone number and a convenient time for a call so we can address and resolve these issues promptly.\r\n\r\nRegards,\r\nHarvey Miller', '2024-08-21 12:06:58', '2024-09-02 00:33:15'),
(7, 'Greg Di Bruno', 'info@letsgetuoptimize.com', '9497671355', 'Hey team supercarehospitalbd.com,\r\n\r\nI was looking at your website and realized that despite having a good design; it was not ranking high on any of the Search Engines (Google, Yahoo & Bing) for most of the keywords related to your business.\r\n\r\nWe can place your website on Google\'s 1st page.\r\n\r\n*  Top ranking on Google search!\r\n*  Improve website clicks and views!\r\n*  Increase Your Leads, clients & Revenue!\r\n\r\nI can send you more details on the packages/Portfolio/past work details.\r\n\r\nWell wishes,\r\nGreg Di Bruno\r\nSenior Services Consultant - Let’s Get You Optimize\r\nEmail: info@letsgetuoptimize.com\r\nPhone: 9497671355\r\n\r\n\r\n\r\n\r\nIf you don’t want me to contact you again about this, reply with “unsubscribe”', '2024-08-22 03:40:21', '2024-08-22 03:40:21'),
(8, 'Search Engine Index', 'submissions@searchindex.site', '6208616278', 'Hello,\r\n\r\nfor your website do be displayed in searches your domain needs to be indexed in the Google Search Index.\r\n\r\nTo add your domain to Google Search Index now, please visit \r\n\r\nhttps://searchregister.info/', '2024-08-22 14:29:22', '2024-08-22 14:29:22'),
(9, 'Search Engine Index', 'submissions@searchindex.site', '242950582', 'Hello,\r\n\r\nfor your website do be displayed in searches your domain needs to be indexed in the Google Search Index.\r\n\r\nTo add your domain to Google Search Index now, please visit \r\n\r\nhttps://searchregistry.net/', '2024-08-23 08:45:22', '2024-08-23 08:45:22'),
(10, 'Testing', 'admin@gmail.com', '01953461848', 'ghghh', '2024-12-24 06:17:56', '2024-12-24 06:17:56'),
(11, 'Shahadat', 'shahadatmd645@gmail.com', '01953461848', 'testing', '2024-12-24 22:53:26', '2024-12-24 22:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Surgery', 'to convey that a series of buttons is grouped, an appropriate role attribute needs to be provided.', 'public/backend/image/1735043134.9012.svg', '2024-08-08 08:24:39', '2024-12-24 22:42:30'),
(4, 'Orthopedic', 'For button groups, this would be role=\"group\", while toolbars should have a role=\"toolbar\".', 'public/backend/image/1735043162.0012.svg', '2024-08-08 08:25:09', '2024-12-24 22:42:35'),
(5, 'Maryam Frazier', 'My backend expertise is anchored in PHP, with a strong focus on Laravel, where I excel at building robust and scalable applications.', 'public/backend/image/1735043155.3633.svg', '2024-08-20 05:04:31', '2024-12-24 22:43:10'),
(6, '24 Hours Support', 'For button groups, this would be role=\"group\", while toolbars should have a role', 'public/backend/image/1735101838.1868.svg', '2024-12-24 22:43:58', '2024-12-24 22:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` int(20) DEFAULT NULL,
  `image` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deActive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `department_id`, `image`, `title`, `category`, `status`, `created_at`, `updated_at`) VALUES
(9, NULL, 'public/backend/image/1735043854.4955.png', 'sofa', NULL, 0, '2024-12-24 06:37:34', '2024-12-24 06:37:36'),
(10, NULL, 'public/backend/image/1735043867.9541.png', 'chair', NULL, 0, '2024-12-24 06:37:47', '2024-12-24 06:37:50'),
(12, NULL, 'public/backend/image/1735101475.322.png', 'Nordic Chair', NULL, 0, '2024-12-24 22:37:55', '2024-12-24 22:38:38'),
(13, NULL, 'public/backend/image/1735101498.7187.png', 'Kruzo Aero Chair', NULL, 0, '2024-12-24 22:38:18', '2024-12-24 22:38:37'),
(14, NULL, 'public/backend/image/1735101512.6348.png', 'Ergonomic Chair', NULL, 0, '2024-12-24 22:38:32', '2024-12-24 22:38:35'),
(15, NULL, 'public/backend/image/1735101554.1664.png', 'Timthumb', NULL, 0, '2024-12-24 22:39:14', '2024-12-24 22:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`id`, `title`, `description`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'vfggf', 'gfghgh', '#', 'public/backend/image/1735042595.7448.png', '2024-12-24 06:16:35', '2024-12-24 06:16:35'),
(2, 'sofa', 'dffd', '#', 'public/backend/image/1735101237.5059.png', '2024-12-24 22:33:57', '2024-12-24 22:33:57'),
(3, 'chair', 'fdd', '#', 'public/backend/image/1735101251.0435.png', '2024-12-24 22:34:11', '2024-12-24 22:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `headdings`
--

CREATE TABLE `headdings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `headdings`
--

INSERT INTO `headdings` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Crafted with excellent material.', 'Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.', '', NULL, '2024-12-24 22:42:00'),
(2, 'Why Choose Us', 'Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.', 'public/backend/image/1735044694.5076.jpg', NULL, '2024-12-24 06:51:34'),
(3, 'We Help You Make Modern Interior Design', 'Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada', '[\"public\\/backend\\/image\\/1735042517.7198.jpg\",\"public\\/backend\\/image\\/1735042517.7205.jpg\",\"public\\/backend\\/image\\/1735042517.721.jpg\"]', NULL, '2024-12-24 06:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `interior_designs`
--

CREATE TABLE `interior_designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interior_designs`
--

INSERT INTO `interior_designs` (`id`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Ensure correct role and provide a label In order for assistive technologies (such as screen readers)', '2024-12-24 22:32:59', '2024-12-24 22:32:59'),
(2, 'to convey that a series of buttons is grouped, an appropriate role attribute needs to be provided.', '2024-12-24 22:33:04', '2024-12-24 22:33:13'),
(3, 'Donec vitae odio quis nisl dapibus malesuada. update', '2024-12-24 22:33:21', '2024-12-24 22:33:21'),
(4, 'Ensure correct role and provide a label In order for assistive technologies', '2024-12-24 22:33:26', '2024-12-24 22:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_15_072305_create_banners_table', 1),
(5, '2024_07_15_091942_create_contacts_table', 1),
(6, '2024_07_15_104604_create_basic_infos_table', 1),
(7, '2024_07_16_051705_create_abouts_table', 1),
(9, '2024_08_04_161513_create_services_table', 3),
(10, '2024_08_04_161544_create_blogs_table', 4),
(11, '2024_08_04_161641_create_appointments_table', 4),
(12, '2024_08_04_164817_create_comments_table', 4),
(13, '2024_08_04_161350_create_schedules_table', 5),
(14, '2024_08_04_162106_create_projects_table', 6),
(15, '2024_08_08_133654_create_departments_table', 7),
(16, '2024_08_08_130637_create_doctors_table', 8),
(17, '2024_12_21_090523_create_headdings_table', 9),
(18, '2024_12_21_122354_create_interior_designs_table', 9),
(19, '2024_12_22_044213_create_furniture_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deActive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `image`, `title`, `description`, `designation`, `facebook`, `status`, `created_at`, `updated_at`) VALUES
(2, 'public/backend/image/logo/1725520289.1871.jpg', 'Our Doctors', NULL, NULL, NULL, 1, '2024-09-05 01:11:29', '2024-09-05 01:15:42'),
(3, 'public/backend/image/logo/1725520558.5143.jpg', 'Our_Doctors', NULL, NULL, NULL, 1, '2024-09-05 01:15:58', '2024-09-05 01:15:58'),
(4, 'public/backend/image/logo/1725520571.7748.jpg', 'Our Service', NULL, NULL, NULL, 1, '2024-09-05 01:16:11', '2024-09-05 01:16:11'),
(5, 'public/backend/image/logo/1735101048.7839.jpg', 'Md Shahadat', NULL, 'Software Developer at Danpite.Tech', 'https://shahadat.42web.io/?i=1', 1, '2024-09-05 01:16:56', '2024-12-24 22:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quate` text NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `quate`, `author`, `designation`, `image`, `status`, `created_at`, `updated_at`) VALUES
(10, 'As a passionate Full Stack Web Developer, I specialize in crafting dynamic and responsive web applications. Proficient in HTML, CSS, and JavaScript, I bring designs to life using React.js for seamless front-end experiences. My backend expertise is anchored in PHP, with a strong focus on Laravel, where I excel at building robust and scalable applications.', 'Md Shahadat', 'Software Developer at Danpite.Tech', 'public/backend/image/schedule/1735101985.jpg', 1, '2024-12-24 22:46:25', '2024-12-24 22:46:25'),
(11, 'Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque', 'Maria Jones', 'CEO, Co-Founder, XYZ Inc.', 'public/backend/image/schedule/1735102079.jpg', 1, '2024-12-24 22:47:59', '2024-12-24 22:47:59'),
(12, 'Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque', 'Peta Janson', 'CEO, Co-Founder, XYZ Inc.', 'public/backend/image/schedule/1735102097.png', 1, '2024-12-24 22:48:17', '2024-12-24 22:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_icon` varchar(255) DEFAULT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_desc` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_icon`, `service_title`, `service_desc`, `status`, `created_at`, `updated_at`) VALUES
(9, 'icofont icofont-prescription', 'General Treatment', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet.', 1, '2024-08-08 01:52:38', '2024-08-08 01:52:38'),
(10, 'icofont icofont-tooth', 'Teeth Whitening', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet.', 1, '2024-08-08 01:53:53', '2024-08-08 01:53:53'),
(11, 'icofont icofont-heart-alt', 'Heart Surgery', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet.', 1, '2024-08-08 01:55:06', '2024-08-08 01:55:06'),
(12, 'icofont icofont-listening', 'Ear Treatment', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet.', 1, '2024-08-08 01:55:39', '2024-08-08 01:55:39'),
(13, 'icofont icofont-eye-alt', 'Vision Problems', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet.', 1, '2024-08-08 01:56:09', '2024-08-08 01:56:09'),
(14, 'icofont icofont-blood', 'Blood Transfusion', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet.', 1, '2024-08-08 01:56:41', '2024-08-08 02:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Jq9QWzxCJwOF0vAKcv9xFsVAB8d23d9rxMHykoF1', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVmtnQzdFZTVzbDdZeXo5ZWRueFVHbVl1TXpyRUF4QVVhYUhoeG55SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Qvc3VwZXJjYXJlLWhvc3BpdGFsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1735102887);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2 COMMENT '1=admin, 2=user',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active, 2=inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$eQhfKpsh/F3sxui/.b/YlOl6/A/0KB2Fy8HMtmPhNMdq.3u2hJ3UK', 1, 1, NULL, NULL, '2024-08-04 11:31:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_infos`
--
ALTER TABLE `basic_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headdings`
--
ALTER TABLE `headdings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interior_designs`
--
ALTER TABLE `interior_designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `basic_infos`
--
ALTER TABLE `basic_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `headdings`
--
ALTER TABLE `headdings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `interior_designs`
--
ALTER TABLE `interior_designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
