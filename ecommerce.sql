-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 08:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `carousel_1`
--

CREATE TABLE `carousel_1` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `header` varchar(255) NOT NULL,
  `sub_header` varchar(255) NOT NULL,
  `btn_name` varchar(20) NOT NULL,
  `btn_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel_1`
--

INSERT INTO `carousel_1` (`id`, `img`, `header`, `sub_header`, `btn_name`, `btn_link`) VALUES
(1, 'sample-featured.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Suspendisse non eros diam. Maecenas massa est, volutpat a vulputate eu, blandit ac urna', 'Shop', 'shop.php'),
(3, 'khaki_sweat_1.jpg', 'LOREM LOREM LOREM', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `carousel_2`
--

CREATE TABLE `carousel_2` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel_2`
--

INSERT INTO `carousel_2` (`id`, `img`) VALUES
(2, 'black_sweat_4.jpg'),
(4, 'D3-32-1200x800.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `carousel_3`
--

CREATE TABLE `carousel_3` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel_3`
--

INSERT INTO `carousel_3` (`id`, `img`) VALUES
(2, 'gray_pants_1.jpg'),
(3, 'D2-16-sq-1400x788.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `carousel_4`
--

CREATE TABLE `carousel_4` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel_4`
--

INSERT INTO `carousel_4` (`id`, `img`) VALUES
(2, 'kahki_sample_1.jpg'),
(3, 'D3-32-1200x800.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Shirt'),
(2, 'Sweatshirt'),
(3, 'Pants'),
(4, 'Others'),
(6, 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `email`, `password`) VALUES
(1, 'jason.kandabog@gmail.com', 'c20216efaddd54fbfffe8b7c8dbfd3a9'),
(2, 'abbygayle@gmail.com', '4636b17d0d975f911bc94c6a5ae745b6'),
(3, 'sample@gmail.com', '4e91b1cbe42b5c884de47d4c7fda0555');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(40) NOT NULL,
  `postal` int(11) NOT NULL,
  `region` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `phone` text NOT NULL,
  `total` int(11) NOT NULL,
  `payment_method` varchar(40) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `lname`, `fname`, `address`, `city`, `postal`, `region`, `country`, `phone`, `total`, `payment_method`, `order_date`, `order_status`) VALUES
(1, 3, 'Rivera', 'Charles Jason', '14 DAVID COMP. 379 GOV A PASCUAL ST', 'NAVOTAS CITY', 1485, 'Metro Manila', 'Philippines', '09754018144', 320, 'COD', '2021-07-06 11:10:38', 'Processing'),
(2, 3, 'Rivera', 'Charles Jason', '14 DAVID COMP. 379 GOV A PASCUAL ST', 'NAVOTAS CITY', 1485, 'Metro Manila', 'Philippines', '09754018144', 180, 'COD', '2021-07-09 07:11:34', 'Done'),
(3, 3, 'asd', 'asd', 'asd', 'asd', 123, 'Bulacan', 'Philippines', '09754018144', 240, 'COD', '2021-07-13 01:35:13', 'Processing'),
(4, 3, 'Rivera', 'Charles Jason', '14 DAVID COMP. 379 GOV A PASCUAL ST', 'NAVOTAS CITY', 1485, 'Metro Manila', 'Philippines', '09754018144', 419, 'COD', '2021-07-13 01:35:56', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `order_date`) VALUES
(1, 1, 1, 2, '2021-07-06 11:10:38'),
(2, 2, 1, 1, '2021-07-09 07:11:34'),
(3, 3, 1, 1, '2021-07-13 01:35:14'),
(4, 4, 2, 1, '2021-07-13 01:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactus`
--

CREATE TABLE `tbl_contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` text NOT NULL,
  `concern` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contactus`
--

INSERT INTO `tbl_contactus` (`id`, `name`, `email`, `contact_no`, `concern`, `date`) VALUES
(1, 'Charles Jason Rivera', 'charlesjasonriveraa@gmail.com', '09754018144', 'sample lang muna kung gumagana\r\n', '2021-07-02'),
(2, '', '', '', '', '2021-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`id`, `title`, `content`) VALUES
(1, 'How do I place order?', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla eu ante eu accumsan. Aliquam accumsan tortor sit amet lacus tempor elementum. Fusce erat magna, pretium a sem sit amet, fringilla porttitor sapien. Sed at aliquam leo.&nbsp;</p><ul><li>Lorem ipsum</li><li>Lorem ipsum</li><li>Lorem ipsum</li><li>Lorem ipsum</li></ul><p>Sed nec condimentum tortor. Nunc viverra lectus vel quam ultrices finibus. Proin elit elit, convallis sed accumsan nec, imperdiet quis lectus. Sed sed turpis non quam dapibus egestas. Vestibulum faucibus dolor purus, nec auctor sapien lacinia a. Aliquam consequat ex vel aliquet cursus. Maecenas lobortis non diam a imperdiet. Nam orci orci, porta eget porttitor ac, laoreet commodo lectus. Integer cursus rutrum eros ac suscipit. Etiam quis lorem sem. Etiam nunc metus, viverra vitae nunc sit amet, tristique cursus mauris.</p>'),
(3, 'three', '<p>content threeasdasd</p>'),
(8, 'Sample title', '<p>Sample <strong>description</strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favicon`
--

CREATE TABLE `tbl_favicon` (
  `id` int(11) NOT NULL,
  `apple_touch_icon` text NOT NULL,
  `shortcut_icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_favicon`
--

INSERT INTO `tbl_favicon` (`id`, `apple_touch_icon`, `shortcut_icon`) VALUES
(1, 'favicon.ico', 'favicon.ico'),
(2, 'adastra-nobg.png', 'adastra-white.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(50) NOT NULL,
  `collection` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `img` text NOT NULL,
  `hover_img` text NOT NULL,
  `date` date NOT NULL,
  `featured` varchar(10) NOT NULL,
  `weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `name`, `color`, `collection`, `category_id`, `img`, `hover_img`, `date`, `featured`, `weight`) VALUES
(1, 'Ad Astra Originals | Oversized Tee', 'Black', 'Ad Astra Originals', 1, 'black.png', 'sample-featured.jpg', '2021-06-24', 'yes', 2.6),
(2, 'Ad Astra Originals | Oversized Tee', 'White', 'Ad Astra Originals', 1, 'white.png', 'Love_Unites_Hoodie_5.jpg', '2021-06-24', 'yes', 6.2),
(3, 'Ad Astra Originals | Oversized Tee', 'Khaki', 'Ad Astra Originals', 1, 'khaki.png', 'khaki_sweat_1.jpg', '2021-06-24', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_gallery`
--

CREATE TABLE `tbl_item_gallery` (
  `id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item_gallery`
--

INSERT INTO `tbl_item_gallery` (`id`, `img_id`, `img`) VALUES
(1, 1, 'black1.jpg'),
(2, 1, 'black2.jpg'),
(3, 1, 'black3.jpg'),
(4, 1, 'black4.jpg'),
(5, 2, 'Love_Unites_Hoodie_3.jpg'),
(6, 2, 'Love_Unites_Hoodie_4.jpg'),
(7, 2, 'Love_Unites_Hoodie_5.jpg'),
(8, 2, 'Love_Unites_Hoodie_1.jpg'),
(9, 3, 'kahki_sample_2.jpg'),
(10, 3, 'kahki_sample_3.jpg'),
(11, 3, 'kahki_sample_1.jpg'),
(12, 3, 'kahki_sample_4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meta`
--

CREATE TABLE `tbl_meta` (
  `id` int(11) NOT NULL,
  `meta_title_content` text NOT NULL,
  `meta_description_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_meta`
--

INSERT INTO `tbl_meta` (`id`, `meta_title_content`, `meta_description_content`) VALUES
(1, 'Home - Ad Astra', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur tellus sit amet dui sodales laoreet. Vivamus at facilisis eros, in hendrerit eros. Nulla facilisi. Etiam viverra, augue eget ultrices fringilla, neque ipsum volutpat erat, ac condimentum mauris justo rutrum velit. Phasellus quis lorem pellentesque, pellentesque nibh sit amet, consectetur enim. Ut a volutpat mi. Sed ornare lacus lacus, eget efficitur leo lobortis non. Maecenas lobortis velit sit amet feugiat ullamcorper. Praesent augue lacus, maximus id lobortis vel, malesuada vitae sapien. Phasellus vulputate blandit diam sed sollicitudin.'),
(2, 'Shop - Ad Astra', 'asddqw'),
(3, 'Contact Us - Ad Astra', ''),
(4, 'Frequently Asked Questions - Ad Astra', ''),
(5, 'Terms of Service - Ad Astra', ''),
(6, 'Returns - Ad Astra', ''),
(7, 'Privacy Policy - Ad Astra', ''),
(8, 'Shipping Information - Ad Astra', ''),
(9, 'Cart - Ad Astra', ''),
(10, 'Categories - Ad Astra', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privacy`
--

CREATE TABLE `tbl_privacy` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_privacy`
--

INSERT INTO `tbl_privacy` (`id`, `content`) VALUES
(1, '<p><strong>SECTION 1 – WHAT DO WE DO WITH YOUR INFORMATION?</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p><strong>SECTION 2 – CONSENT</strong></p><p><i>How do you get my consent?</i></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p><i>How do I withdraw my consent?</i></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p><strong>SECTION 3 – DISCLOSURE</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p><strong>SECTION 4 – STRIPE</strong></p><p><i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</i></p><p><i>Payment:</i></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p><strong>SECTION 5 – THIRD-PARTY SERVICES</strong></p><p><i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo.&nbsp;</i></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris.&nbsp;<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p><i>Links</i></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_returns`
--

CREATE TABLE `tbl_returns` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_returns`
--

INSERT INTO `tbl_returns` (`id`, `content`) VALUES
(1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.&nbsp;</p><p><strong>Before you Process a Return:</strong></p><ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li></ul><p><strong>Damaged Items:</strong> &nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p><strong>Non-Returnable Items:</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.&nbsp;</p><ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li></ul><p><strong>Exchanges:</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.&nbsp;</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.&nbsp;</p><p><strong>Refunds for Returns:</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo.&nbsp;</p><p><strong>Reserved Rights Regarding Returns:</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.</li></ul><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p><strong>To Process a Return:</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id`, `content`) VALUES
(1, '<ul><li>Lorem ipsum dolor sit amet</li><li>Lorem ipsum dolor sit amet</li><li>Lorem ipsum dolor sit amet</li><li>Lorem ipsum dolor sit amet</li></ul><figure class=\"table\"><table><tbody><tr><td><strong>Method</strong></td><td><strong>Time</strong></td><td><strong>Rate</strong></td></tr><tr><td><strong>Door to Door Delivery (Metro Manila ONLY): &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></td><td>1 day after email confirmation is received &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td><td>₱ 150</td></tr><tr><td><p><strong>Province:</strong></p><p>via J&amp;T</p></td><td>2 – 4 business days (from the receiving email confirmation)</td><td>₱ 230</td></tr></tbody></table></figure><p><strong>We currently ship to:&nbsp;</strong>Philippines</p><p><strong>Shipping fees are non-refundable. </strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.&nbsp;</p><p><strong>Demmand Apparel Co. does not hold or accept any responsibility for packages that have been stated as items lost, stolen, stuck in transit, or delivered.</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis.&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribers`
--

CREATE TABLE `tbl_subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subscribers`
--

INSERT INTO `tbl_subscribers` (`id`, `email`, `date`) VALUES
(1, 'sample@gmail.com', '2021-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_terms`
--

CREATE TABLE `tbl_terms` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_terms`
--

INSERT INTO `tbl_terms` (`id`, `content`) VALUES
(1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo.&nbsp;</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra.&nbsp;</p><ul><li>An irregular or excessive returns history indicative of “wardrobing;”</li><li>An irregular or excessive returns history involving worn, altered, laundered, damaged, or missing items; or,</li><li>Potential fraudulent or criminal activity.</li></ul><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo.</p><p>&nbsp;</p><p><strong>OVERVIEW:</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta.&nbsp;</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta.&nbsp;</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris.&nbsp;</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p><strong>SECTION 1 – ONLINE STORE TERMS</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p><strong>SECTION 2 – GENERAL CONDITIONS</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo.&nbsp;</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra.&nbsp;</p><p><strong>SECTION 3 – ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p><strong>SECTION 4 – MODIFICATIONS TO THE SERVICE AND PRICES</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo.&nbsp;</p><p><strong>SECTION 5 – PRODUCTS OR SERVICES (if applicable)</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo.&nbsp;</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices.&nbsp;</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta.&nbsp;</p><p><strong>SECTION 6 – ACCURACY OF BILLING AND ACCOUNT INFORMATION</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non nulla a tortor imperdiet pharetra. Quisque interdum augue ante, eget cursus nisi cursus quis. Proin sollicitudin odio sit amet metus mattis ultrices. Sed faucibus maximus commodo. Sed vestibulum eleifend vehicula. Nulla sed nisl massa. Fusce dignissim dapibus blandit. Ut ornare massa nec elementum porta. Ut id varius mauris. Donec vel massa in libero fringilla ullamcorper blandit et nibh. In posuere pharetra auctor. Donec purus risus, bibendum et luctus quis, semper ut erat. Duis non vestibulum nunc.</p><p>For more detail, please review our returns policy in the below accordion.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_variations`
--

CREATE TABLE `tbl_variations` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `size` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_variations`
--

INSERT INTO `tbl_variations` (`id`, `item_id`, `size`, `price`) VALUES
(2, 1, 'Medium ', 200),
(3, 1, 'Large', 300),
(4, 1, 'Extra Large', 400),
(5, 2, 'Small', 299),
(6, 2, 'Medium', 399),
(7, 2, 'Large', 499),
(8, 2, 'Extra Large ', 599),
(9, 3, 'Small', 200),
(10, 3, 'Medium', 399),
(11, 3, 'Large', 499),
(12, 3, 'Extra Large', 699);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel_1`
--
ALTER TABLE `carousel_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel_2`
--
ALTER TABLE `carousel_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel_3`
--
ALTER TABLE `carousel_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel_4`
--
ALTER TABLE `carousel_4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_favicon`
--
ALTER TABLE `tbl_favicon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item_gallery`
--
ALTER TABLE `tbl_item_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_id` (`img_id`);

--
-- Indexes for table `tbl_meta`
--
ALTER TABLE `tbl_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_privacy`
--
ALTER TABLE `tbl_privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_returns`
--
ALTER TABLE `tbl_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_terms`
--
ALTER TABLE `tbl_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_variations`
--
ALTER TABLE `tbl_variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carousel_1`
--
ALTER TABLE `carousel_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carousel_2`
--
ALTER TABLE `carousel_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carousel_3`
--
ALTER TABLE `carousel_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carousel_4`
--
ALTER TABLE `carousel_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_favicon`
--
ALTER TABLE `tbl_favicon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_item_gallery`
--
ALTER TABLE `tbl_item_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_meta`
--
ALTER TABLE `tbl_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_privacy`
--
ALTER TABLE `tbl_privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_returns`
--
ALTER TABLE `tbl_returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_terms`
--
ALTER TABLE `tbl_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_variations`
--
ALTER TABLE `tbl_variations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_item_gallery`
--
ALTER TABLE `tbl_item_gallery`
  ADD CONSTRAINT `tbl_item_gallery_ibfk_1` FOREIGN KEY (`img_id`) REFERENCES `tbl_item` (`id`);

--
-- Constraints for table `tbl_variations`
--
ALTER TABLE `tbl_variations`
  ADD CONSTRAINT `tbl_variations_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `tbl_item` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
