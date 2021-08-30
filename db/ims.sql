-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 09:29 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `image1` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `email`, `contact`, `address`, `password`, `image1`, `created_at`) VALUES
(1, 'deepak maurya', 'deepak@gmail.com', '8081008926', ' Lucknow                        ', 'e10adc3949ba59abbe56e057f20f883e', '752b67b53f06b3707f133f8e81862ab82.jpg', '2021-07-06 12:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_articles`
--

CREATE TABLE `tbl_articles` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_articles`
--

INSERT INTO `tbl_articles` (`id`, `image`, `created_at`, `updated_at`) VALUES
(2, 'a56790159c24ecee9a7e741b1c13bd24.jpg', '2021-07-28 07:17:58', ''),
(3, '4134b69209122710c62b00bc715f69bf.jpg', '2021-07-28 07:17:38', ''),
(4, 'bacdaf2c4b3e4b938f98e7f256262e2d.jpg', '2021-07-28 07:17:25', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_associate`
--

CREATE TABLE `tbl_associate` (
  `id` int(11) NOT NULL,
  `asscociate_name` varchar(255) DEFAULT NULL,
  `asscociate_number` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_associate`
--

INSERT INTO `tbl_associate` (`id`, `asscociate_name`, `asscociate_number`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Deepak Maurya', '8081008926', 'deepakmauryacs16@gmail.com', 'ruppanpur natui sarnath varansi\r\nlucknow\r\nruppanpur', '2021-08-06 11:40:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `category`, `title`, `description`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(2, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer', 'd858d2be9be130941a6433dd39f18900.jpg', '2021-07-28 06:37:05', NULL),
(3, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer1', '3a4f9daad022fcc580c3dbeebed3a471.jpg', '2021-07-28 07:41:25', NULL),
(4, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer2', '558296009c6def528191988fc6c2599c.jpg', '2021-07-28 07:41:48', NULL),
(5, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer4', '69401bebacfba562f426674899b0756e.jpg', '2021-07-28 07:42:04', NULL),
(6, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer5', '9e9df759b10b2b1820cd9e248f36ab58.jpg', '2021-07-28 06:52:28', NULL),
(7, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer6', 'ede29aa0fba93e380b07e5a750abd806.jpg', '2021-07-28 06:52:31', NULL),
(8, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer7', 'e871b5708dafa95a0f1e71b92e789272.jpg', '2021-07-28 06:52:35', NULL),
(9, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer8', 'e871b5708dafa95a0f1e71b92e789272.jpg', '2021-07-28 06:52:38', NULL),
(10, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer9', 'e871b5708dafa95a0f1e71b92e789272.jpg', '2021-07-28 06:52:52', NULL),
(11, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer10', 'e871b5708dafa95a0f1e71b92e789272.jpg', '2021-07-28 06:52:57', NULL),
(12, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer11', 'e871b5708dafa95a0f1e71b92e789272.jpg', '2021-07-28 06:53:00', NULL),
(13, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer12', 'e871b5708dafa95a0f1e71b92e789272.jpg', '2021-07-28 06:53:03', NULL),
(14, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer13', 'e871b5708dafa95a0f1e71b92e789272.jpg', '2021-07-28 06:53:06', NULL),
(15, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer14', 'e871b5708dafa95a0f1e71b92e789272.jpg', '2021-07-28 06:53:09', NULL),
(16, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer15', 'e871b5708dafa95a0f1e71b92e789272.jpg', '2021-07-28 06:53:12', NULL),
(17, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer16', 'e871b5708dafa95a0f1e71b92e789272.jpg', '2021-07-28 06:53:16', NULL),
(18, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer18', 'e871b5708dafa95a0f1e71b92e789272.jpg', '2021-07-28 06:53:20', NULL),
(19, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer19', 'e871b5708dafa95a0f1e71b92e789272.jpg', '2021-07-28 06:53:22', NULL),
(20, 'html', 'How Frontend Developers Can Help To Bridge The Gap Between Desigers And Developers', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter conquences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces</p>\r\n', 'computer20', 'e871b5708dafa95a0f1e71b92e789272.jpg', '2021-07-28 06:53:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_category`
--

CREATE TABLE `tbl_blog_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blog_category`
--

INSERT INTO `tbl_blog_category` (`id`, `category`, `slug`, `created_at`) VALUES
(1, 'web', 'Vegetables', '2021-07-26 08:14:22'),
(2, 'html', 'html', '2021-07-27 07:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL,
  `company_name` text DEFAULT NULL,
  `conatact` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `service_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id`, `company_name`, `conatact`, `email`, `service_type`, `created_at`, `updated_at`) VALUES
(1, 'cslearning', '08081008926', 'deepakmauryacs16@gmail.com', 'web', '2021-08-13 07:42:22', ''),
(2, 'codelearning', '8081008926', 'gurumauryacs16@gmail.com', 'web', '2021-08-13 07:42:10', ''),
(3, 'techextra', '08081008926', 'deepakmauryacs16@gmail.com', 'web', '2021-08-06 10:51:58', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `city`, `contact`, `message`, `created_at`) VALUES
(1, 'deepak maurya', 'deepakmauryacs16@gmail.com', '8081008926', 'hello', '2021-07-30 06:45:23'),
(4, 'deepak maurya', 'deepakmauryacs16@gmail.com', '8081008926', 'hello', '2021-07-30 06:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `sub_category` int(11) DEFAULT NULL,
  `sort_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `product_unit` varchar(255) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `mrp` int(11) DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `image_one` text DEFAULT NULL,
  `image_two` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `course`, `category`, `sub_category`, `sort_description`, `description`, `url`, `product_unit`, `product_quantity`, `price`, `discount`, `discount_type`, `mrp`, `selling_price`, `discount_price`, `status`, `image_one`, `image_two`, `created_at`, `updated_at`) VALUES
(4, 'The Complete 2021 Web Development Bootcamp', 1, 0, 'Become a full-stack web developer with just one course. HTML, CSS, Javascript, Node, React, MongoDB and more!', '<h2>What you&#39;ll learn</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Be able to build ANY website you want.</p>\r\n	</li>\r\n	<li>\r\n	<p>Craft a portfolio of websites to apply for junior developer jobs.</p>\r\n	</li>\r\n	<li>\r\n	<p>Build fully-fledged websites and web apps for your startup or business.</p>\r\n	</li>\r\n	<li>\r\n	<p>Work as a freelance web developer.</p>\r\n	</li>\r\n	<li>\r\n	<p>Master backend development with Node</p>\r\n	</li>\r\n	<li>\r\n	<p>Master frontend development with React</p>\r\n	</li>\r\n	<li>\r\n	<p>Learn the latest frameworks and technologies, including Javascript ES6, Bootstrap 4, MongoDB.</p>\r\n	</li>\r\n</ul>\r\n', 'https://www.udemy.com/course/the-complete-web-development-bootcamp/', NULL, NULL, NULL, NULL, NULL, 8000, 455, NULL, '1', 'e7d38f24d99b7eebf1a68a24e5f322a6.jpg', '52f10f667c02f2848c6c0ed62c5d9299.jpg', '2021-07-10 06:28:32', NULL),
(27, 'The Complete JavaScript Course 2021: From Zero to Expert!', 6, 0, 'The modern JavaScript course for everyone! Master JavaScript with projects, challenges and theory. Many courses in one!', '<h2>What you&#39;ll learn</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Become an advanced, confident, and modern JavaScript developer from scratch</p>\r\n	</li>\r\n	<li>\r\n	<p>Build 6 beautiful real-world projects for your portfolio (not boring toy apps)</p>\r\n	</li>\r\n	<li>\r\n	<p>Become job-ready by understanding how JavaScript really works behind the scenes</p>\r\n	</li>\r\n	<li>\r\n	<p>How to think and work like a developer: problem-solving, researching, workflows</p>\r\n	</li>\r\n	<li>\r\n	<p>JavaScript fundamentals: variables, if/else, operators, boolean logic, functions, arrays, objects, loops, strings, etc.</p>\r\n	</li>\r\n	<li>\r\n	<p>Modern ES6+ from the beginning: arrow functions, destructuring, spread operator, optional chaining (ES2020), etc.</p>\r\n	</li>\r\n	<li>\r\n	<p>Modern OOP: Classes, constructors, prototypal inheritance, encapsulation, etc.</p>\r\n	</li>\r\n	<li>\r\n	<p>Complex concepts like the &#39;this&#39; keyword, higher-order functions, closures, etc.</p>\r\n	</li>\r\n	<li>\r\n	<p>Asynchronous JavaScript: Event loop, promises, async/await, AJAX calls and APIs</p>\r\n	</li>\r\n	<li>\r\n	<p>How to architect your code using flowcharts and common patterns</p>\r\n	</li>\r\n	<li>\r\n	<p>Modern tools for 2021 and beyond: NPM, Parcel, Babel and ES6 modules</p>\r\n	</li>\r\n	<li>\r\n	<p>Practice your skills with 50+ challenges and assignments (solutions included)</p>\r\n	</li>\r\n	<li>\r\n	<p>Get friendly support in the Q&amp;A area</p>\r\n	</li>\r\n	<li>\r\n	<p>Design your unique learning path according to your goals: course pathways</p>\r\n	</li>\r\n</ul>\r\n', '', NULL, NULL, NULL, NULL, NULL, 8600, 455, NULL, '1', '50f7cd3317c74476737797d2b08fb00a.png', 'c9a8e7b6247ff6928e57493569fc59f5.png', '2021-07-10 06:23:58', NULL),
(28, 'The Complete Web Developer Course 2.0', 1, 0, 'Learn Web Development by building 25 websites and mobile apps using HTML, CSS, Javascript, PHP, Python, MySQL & more!', '<h2>What you&#39;ll learn</h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Build websites and webapps</p>\r\n	</li>\r\n	<li>\r\n	<p>Build HTML-based mobile apps</p>\r\n	</li>\r\n	<li>\r\n	<p>Get a job as a junior web developer</p>\r\n	</li>\r\n	<li>\r\n	<p>Bid for projects on freelance websites</p>\r\n	</li>\r\n	<li>\r\n	<p>Start their own online business</p>\r\n	</li>\r\n	<li>\r\n	<p>Be a comfortable front-end developer</p>\r\n	</li>\r\n	<li>\r\n	<p>Be proficient with databases and server-side languages</p>\r\n	</li>\r\n</ul>\r\n', 'https://www.udemy.com/course/the-complete-web-developer-course-2/', NULL, NULL, NULL, NULL, NULL, 8000, 455, NULL, '1', '9d5b88959a09d272efa1c0ee977c75ec.jpg', '6b7bc674ed480c74055e02e5c5fbfdd4.jpg', '2021-07-10 07:32:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ebook`
--

CREATE TABLE `tbl_ebook` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ebook`
--

INSERT INTO `tbl_ebook` (`id`, `name`, `email`, `contact`, `type`, `created_at`) VALUES
(2, 'deepak maurya', 'deepakmauryacs16@gmail.com', '08081008926', 'Paid', '2021-07-31 07:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eventcateogery`
--

CREATE TABLE `tbl_eventcateogery` (
  `id` int(11) NOT NULL,
  `category_name` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_eventcateogery`
--

INSERT INTO `tbl_eventcateogery` (`id`, `category_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'New IT', 'New-IT', NULL, NULL),
(4, 'Vegetables', 'vegetables', NULL, NULL),
(5, 'Web development', 'web-development', NULL, NULL),
(6, 'Breakfast & Dairy', 'breakfast', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `image`, `created_at`, `updated_at`) VALUES
(4, '98053cd1b9fa736e7f999661f9e1b01f.jpeg', '2021-07-30 13:49:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issue_items`
--

CREATE TABLE `tbl_issue_items` (
  `id` int(11) NOT NULL,
  `asscociate_name` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_issue_items`
--

INSERT INTO `tbl_issue_items` (`id`, `asscociate_name`, `product_name`, `product_type`, `quantity`, `issue_date`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'New', 40, '2021-08-12', '2021-08-12 13:18:28', NULL),
(2, 1, '1', 'New', 30, '2021-08-15', '2021-08-12 14:52:53', NULL),
(3, 1, '2', 'New', 1, '2021-08-15', '2021-08-18 06:53:49', NULL),
(4, 1, '11', 'Defected', 100, '2021-08-19', '2021-08-19 06:36:21', NULL),
(5, 1, '1', 'New', 4, '2021-08-21', '2021-08-21 14:33:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `base_price` int(11) NOT NULL,
  `sgst` int(11) DEFAULT 0,
  `cgst` int(11) DEFAULT 0,
  `igst` int(11) DEFAULT 0,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `company_name`, `product_type`, `product_name`, `quantity`, `base_price`, `sgst`, `cgst`, `igst`, `price`, `created_at`, `updated_at`) VALUES
(1, 'techextra', 'New', 'Apple', 216, 400, 50, 0, 0, 450, '2021-08-12 13:12:09', NULL),
(2, 'techextra', 'New', 'software', 7, 999, 200, 0, 0, 1199, '2021-08-12 13:12:09', NULL),
(9, 'codelearning', 'Used', 'Apple', 100, 800, 70, 0, 0, 870, '2021-08-13 08:15:25', NULL),
(11, 'techextra', 'Defected', 'HP', 100, 400, 50, 0, 0, 450, '2021-08-13 11:13:38', NULL),
(12, 'cslearning', 'New', 'tech', 100, 400, 40, 0, 0, 440, '2021-08-21 11:59:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_returnto_company`
--

CREATE TABLE `tbl_returnto_company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `base_price` int(11) NOT NULL,
  `sgst` int(11) DEFAULT 0,
  `cgst` int(11) DEFAULT 0,
  `igst` int(11) DEFAULT 0,
  `price` int(11) NOT NULL,
  `return_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_returnto_company`
--

INSERT INTO `tbl_returnto_company` (`id`, `company_name`, `product_type`, `product_name`, `quantity`, `base_price`, `sgst`, `cgst`, `igst`, `price`, `return_date`, `created_at`, `updated_at`) VALUES
(1, 'techextra', 'Defected', 'HP', 200, 400, 50, 0, 0, 450, NULL, '2021-08-13 11:13:38', NULL),
(2, 'techextra', 'Defected', 'HP', 200, 400, 50, 0, 0, 450, NULL, '2021-08-13 11:13:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return_items`
--

CREATE TABLE `tbl_return_items` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `asscociate_name` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_return_items`
--

INSERT INTO `tbl_return_items` (`id`, `company_name`, `asscociate_name`, `product_name`, `product_type`, `quantity`, `return_date`, `created_at`, `updated_at`) VALUES
(1, '1', 1, '1', 'Used', 100, '2021-08-13', '2021-08-13 07:51:18', NULL),
(2, '2', 1, '1', 'Used', 100, '2021-08-14', '2021-08-13 08:11:02', NULL),
(3, '1', 1, '1', 'New', 100, '2021-08-13', '2021-08-13 08:14:48', NULL),
(4, '2', 1, '1', 'Used', 100, '2021-08-13', '2021-08-13 08:15:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `category`, `title`, `description`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(4, 'equity', 'Equity ', '<p>Our Equity Fund Administration services encompass all aspects in the life of an equity fund, including consultation during the fund formation process, assistance with investor onboarding, fund closings, fund accounting & reporting, allocations, maintenance of distribution waterfall, and investor reporting.</p>\r\n\r\n<h3>Services for Equity Funds:</h3>\r\n\r\n<ul>\r\n	<li>Accounting and Reporting Services</li>\r\n	<li>Investor Services</li>\r\n	<li>Treasury Services</li>\r\n	<li>US Tax Compliance Services</li>\r\n	<li>Management Company Services</li>\r\n	<li>Regulatory Support Services</li>\r\n	<li>Professional Services</li>\r\n	<li>Onboarding Services</li>\r\n	<li>Distribution Services</li>\r\n	<li>Alternative Funds Tax Services</li>\r\n</ul>\r\n\r\n<h3>Portfolio Administration</h3>\r\n\r\n<p>In addition to Fund Administration, Vinbull India provides a modular end-to-end solution for Institutional Investors, Family Offices and Fund of Funds, supporting the portfolio of fund and direct investments.  At the core is our expert data management services supporting operational and accounting deliverables and front office performance and analytics needs.</p>\r\n\r\n<p>Services for Limited Partner Portfolios:</p>\r\n\r\n<ul>\r\n	<li>Data and Document Management</li>\r\n	<li>Capital Call and Distribution process</li>\r\n	<li>Valuations processing</li>\r\n	<li>Support monthly, quarterly, annual accounting processes</li>\r\n	<li>Front office portfolio and investment reporting and analytics</li>\r\n</ul>\r\n\r\n<p> </p>\r\n', 'equity ', '419b9c144e77b8c0ffc0e1767446806f.jpg', '2021-07-28 10:31:22', NULL),
(5, 'commodity', 'Commodity', '<p>Tight margins, increasing regulatory pressure and complex trading environment, are forcing traders to alter their operating strategies across the entire value chain. As a result of these strategic changes, the industry is altering their business models, expanding into new geographies, broadening their activities and adopting digital technologies. In this very dynamic environment, we help our clients to develop the right strategy, planning and capabilities for a winning future.</p>\r\n\r\n<h3>Our commodities advisory services for strategy and the market include:</h3>\r\n\r\n<p>&nbsp;Business plan preparation<br />\r\n&nbsp;Roadmap for new products, markets, geographies and customers<br />\r\n&nbsp;Market entry strategy and feasibility studies<br />\r\n&nbsp;Market research and fundamental studies<br />\r\n&nbsp;Transaction advisory (e.g. hedging strategies)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'commodity', '8dbfe4fc83694c564bf87c11326d525f.jpg', '2021-07-30 09:32:27', NULL),
(6, 'currency', 'Currencys', '<p>&nbsp; Flexibility. Forex exchange markets provide traders with a lot of flexibility. ...<br />\r\n&nbsp; Trading Options. Forex markets provide traders with a wide variety of trading options. ...<br />\r\n&nbsp; Transaction Costs. ...<br />\r\n&nbsp; Leverage.</p>\r\n', 'currency', 'a331c4f20c69cc26d4dc1701f5ec7614.jpg', '2021-07-30 09:32:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_category`
--

CREATE TABLE `tbl_service_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service_category`
--

INSERT INTO `tbl_service_category` (`id`, `category`, `slug`, `created_at`) VALUES
(2, 'Equity', 'equity', '2021-07-28 09:56:21'),
(3, 'Commodity', 'commodity', '2021-07-28 09:56:35'),
(4, 'Currency', 'currency', '2021-07-28 09:56:48'),
(5, 'Mutual Funds', 'mutual-funds', '2021-07-28 09:57:06'),
(6, 'Bonds', 'bonds', '2021-07-28 09:57:21'),
(7, 'Insurance', 'insurance', '2021-07-28 09:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe`
--

CREATE TABLE `tbl_subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subscribe`
--

INSERT INTO `tbl_subscribe` (`id`, `email`, `created_at`) VALUES
(1, 'deepakmauryacs16@gmail.co', '2021-07-30 07:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` enum('1','2') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `email`, `contact`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'deepak maurya', 'deepak', 'deepak@gmail.com', '8081008926', '123456', '1', '2021-07-13 05:24:36', NULL),
(2, 'deepak', 'deepakji', 'deepak@gmail.com', NULL, '123456', '1', '2021-07-13 05:32:36', NULL),
(3, 'deepak maurya', 'guru', 'guru@gmail.com', '9506018089', '12345678', '1', '2021-07-13 05:24:36', NULL),
(4, 'jas', 'jas', 'jk@gmail.com', '34', 'password', '1', '2021-07-20 12:04:11', NULL),
(5, 'karan', 'karan', 'ks@gmail.com', '56', 'password', '1', '2021-07-21 08:32:49', NULL),
(6, 'neha', 'neha jaishal', 'erneha0315@gmail.com', '6306257700', '123', '1', '2021-07-23 10:04:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_articles`
--
ALTER TABLE `tbl_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_associate`
--
ALTER TABLE `tbl_associate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog_category`
--
ALTER TABLE `tbl_blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ebook`
--
ALTER TABLE `tbl_ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_eventcateogery`
--
ALTER TABLE `tbl_eventcateogery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_issue_items`
--
ALTER TABLE `tbl_issue_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_returnto_company`
--
ALTER TABLE `tbl_returnto_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_return_items`
--
ALTER TABLE `tbl_return_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service_category`
--
ALTER TABLE `tbl_service_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_articles`
--
ALTER TABLE `tbl_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_associate`
--
ALTER TABLE `tbl_associate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_blog_category`
--
ALTER TABLE `tbl_blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_ebook`
--
ALTER TABLE `tbl_ebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_eventcateogery`
--
ALTER TABLE `tbl_eventcateogery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_issue_items`
--
ALTER TABLE `tbl_issue_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_returnto_company`
--
ALTER TABLE `tbl_returnto_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_return_items`
--
ALTER TABLE `tbl_return_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_service_category`
--
ALTER TABLE `tbl_service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
