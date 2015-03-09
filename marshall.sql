-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015 m. Kov 08 d. 17:14
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marshall`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`admin_id` int(8) NOT NULL,
  `admin_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Sukurta duomenų kopija lentelei `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_username`, `admin_password`) VALUES
(2, 'admin', '123456789');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`cat_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Sukurta duomenų kopija lentelei `category`
--

INSERT INTO `category` (`cat_id`, `parent_id`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `entity`
--

CREATE TABLE IF NOT EXISTS `entity` (
`id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
`id` int(2) NOT NULL,
  `title` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Sukurta duomenų kopija lentelei `lang`
--

INSERT INTO `lang` (`id`, `title`, `picture`) VALUES
(1, 'LT', 'lt.png'),
(2, 'ENG', 'eng.png'),
(3, 'RU', 'ru.png');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `lang_category`
--

CREATE TABLE IF NOT EXISTS `lang_category` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `lang_id` int(2) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Sukurta duomenų kopija lentelei `lang_category`
--

INSERT INTO `lang_category` (`id`, `category_id`, `lang_id`, `title`) VALUES
(1, 1, 1, 'Vidaus apdailai'),
(2, 2, 1, 'Mūrinimui'),
(3, 3, 1, 'Betonavimui'),
(4, 4, 1, 'Plytelių klojimui'),
(5, 1, 2, 'Interior decoration'),
(6, 2, 2, 'Bricklaying'),
(7, 3, 2, 'Concreting'),
(8, 4, 2, 'Tiling'),
(12, 1, 3, 'Для внутренней отделки'),
(13, 2, 3, 'Для кладки'),
(14, 3, 3, 'Для бетонирования'),
(15, 4, 3, 'Для укладки плиток');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `lang_entity`
--

CREATE TABLE IF NOT EXISTS `lang_entity` (
`id` int(11) NOT NULL,
  `lang_id` int(2) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `lang_main_menu`
--

CREATE TABLE IF NOT EXISTS `lang_main_menu` (
`id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `lang_id` int(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Sukurta duomenų kopija lentelei `lang_main_menu`
--

INSERT INTO `lang_main_menu` (`id`, `menu_id`, `title`, `lang_id`) VALUES
(1, 1, 'PRADINIS', 1),
(2, 1, 'HOME', 2),
(3, 1, 'ГЛАВНАЯ', 3),
(4, 2, 'APIE ĮMONĘ', 1),
(5, 2, 'ABOUT COMPANY', 2),
(6, 2, 'О КОМПАНИИ', 3),
(7, 3, 'KONTAKTAI', 1),
(8, 3, 'CONTACTS', 2),
(9, 3, 'КОНТАКТЫ', 3),
(10, 4, 'INFO', 1),
(11, 4, 'INFO', 2),
(12, 4, 'ИНФО', 3);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `lang_main_pages`
--

CREATE TABLE IF NOT EXISTS `lang_main_pages` (
`id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Sukurta duomenų kopija lentelei `lang_main_pages`
--

INSERT INTO `lang_main_pages` (`id`, `menu_id`, `lang_id`, `title`, `page_content`) VALUES
(1, 2, 1, 'APIE ĮMONĘ', '<h1>Apie</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p>'),
(2, 2, 2, 'ABOUT COMPANY', '<h1>About</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>gjhkh ghghj ghjhh kh jkgjh g</p>'),
(3, 2, 3, 'О КОМПАНИИ', '<h1>О компании</h1><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</div><div>Cum ullam dignissimos minus nobis animi assumenda sint recusandae, vel veritatis! Animi illum quo repellendus pariatur enim doloribus deleniti fugiat sit alias illo. Voluptatum sed quod eaque adipisci cupiditate placeat qui, delectus rerum vel, dignissimos necessitatibus architecto, quas nemo alias reprehenderit dolorem dolore omnis. Unde voluptate aperiam facere, molestiae a.</div><div>Quidem hic dolore voluptate, impedit architecto, nesciunt, harum modi non quasi, doloribus tempora expedita! Quasi iste maxime laudantium ipsum rem voluptate ratione numquam consequuntur quibusdam vitae, quo nam blanditiis dolorum molestiae deserunt perspiciatis labore ut eaque suscipit fugiat illum quis voluptatibus porro, quae laborum. Nihil facere sapiente necessitatibus vitae libero.</div>'),
(4, 3, 1, 'KONTAKTAI', '<h1>Kontaktai</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p>'),
(5, 3, 2, 'CONTACTS', '<h1>Contacts</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p>'),
(6, 3, 3, 'КОНТАКТЫ', '<h1>Контакты</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p>'),
(7, 4, 1, 'INFO', '<h1>Info</h1><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</div><div>Cum ullam dignissimos minus nobis animi assumenda sint recusandae, vel veritatis! Animi illum quo repellendus pariatur enim doloribus deleniti fugiat sit alias illo. Voluptatum sed quod eaque adipisci cupiditate placeat qui, delectus rerum vel, dignissimos necessitatibus architecto, quas nemo alias reprehenderit dolorem dolore omnis. Unde voluptate aperiam facere, molestiae a.</div><div>Quidem hic dolore voluptate, impedit architecto, nesciunt, harum modi non quasi, doloribus tempora expedita! Quasi iste maxime laudantium ipsum rem voluptate ratione numquam consequuntur quibusdam vitae, quo nam blanditiis dolorum molestiae deserunt perspiciatis labore ut eaque suscipit fugiat illum quis voluptatibus porro, quae laborum. Nihil facere sapiente necessitatibus vitae libero.</div>'),
(8, 4, 2, 'INFO', '<h1>Info</h1>\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</div>\r\n<div>Cum ullam dignissimos minus nobis animi assumenda sint recusandae, vel veritatis! Animi illum quo repellendus pariatur enim doloribus deleniti fugiat sit alias illo. Voluptatum sed quod eaque adipisci cupiditate placeat qui, delectus rerum vel, dignissimos necessitatibus architecto, quas nemo alias reprehenderit dolorem dolore omnis. Unde voluptate aperiam facere, molestiae a.</div>\r\n<div>Quidem hic dolore voluptate, impedit architecto, nesciunt, harum modi non quasi, doloribus tempora expedita! Quasi iste maxime laudantium ipsum rem voluptate ratione numquam consequuntur quibusdam vitae, quo nam blanditiis dolorum molestiae deserunt perspiciatis labore ut eaque suscipit fugiat illum quis voluptatibus porro, quae laborum. Nihil facere sapiente necessitatibus vitae libero.</div>'),
(9, 4, 3, 'ИНФО', '<h1>Инфо</h1>\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</div>\r\n<div>Cum ullam dignissimos minus nobis animi assumenda sint recusandae, vel veritatis! Animi illum quo repellendus pariatur enim doloribus deleniti fugiat sit alias illo. Voluptatum sed quod eaque adipisci cupiditate placeat qui, delectus rerum vel, dignissimos necessitatibus architecto, quas nemo alias reprehenderit dolorem dolore omnis. Unde voluptate aperiam facere, molestiae a.</div>\r\n<div>Quidem hic dolore voluptate, impedit architecto, nesciunt, harum modi non quasi, doloribus tempora expedita! Quasi iste maxime laudantium ipsum rem voluptate ratione numquam consequuntur quibusdam vitae, quo nam blanditiis dolorum molestiae deserunt perspiciatis labore ut eaque suscipit fugiat illum quis voluptatibus porro, quae laborum. Nihil facere sapiente necessitatibus vitae libero.</div>');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `lang_news`
--

CREATE TABLE IF NOT EXISTS `lang_news` (
`lang_news_id` int(8) NOT NULL,
  `news_id` int(8) NOT NULL,
  `lang_news_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang_short_text` text COLLATE utf8_unicode_ci NOT NULL,
  `lang_news_text` text COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `lang_pages`
--

CREATE TABLE IF NOT EXISTS `lang_pages` (
`id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `lang_id` int(2) NOT NULL,
  `page_content` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Sukurta duomenų kopija lentelei `lang_pages`
--

INSERT INTO `lang_pages` (`id`, `menu_id`, `lang_id`, `page_content`) VALUES
(4, 2, 1, '<h1>Apie</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p>'),
(5, 2, 2, '<h1>About</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p>'),
(6, 2, 3, '<h1>О компании</h1><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</div><div>Cum ullam dignissimos minus nobis animi assumenda sint recusandae, vel veritatis! Animi illum quo repellendus pariatur enim doloribus deleniti fugiat sit alias illo. Voluptatum sed quod eaque adipisci cupiditate placeat qui, delectus rerum vel, dignissimos necessitatibus architecto, quas nemo alias reprehenderit dolorem dolore omnis. Unde voluptate aperiam facere, molestiae a.</div><div>Quidem hic dolore voluptate, impedit architecto, nesciunt, harum modi non quasi, doloribus tempora expedita! Quasi iste maxime laudantium ipsum rem voluptate ratione numquam consequuntur quibusdam vitae, quo nam blanditiis dolorum molestiae deserunt perspiciatis labore ut eaque suscipit fugiat illum quis voluptatibus porro, quae laborum. Nihil facere sapiente necessitatibus vitae libero.</div>'),
(7, 3, 1, '<h1>Kontaktai</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p>'),
(8, 3, 2, '<h1>Contacts</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p>'),
(9, 3, 3, '<h1>Контакты</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</p>'),
(10, 4, 1, '<h1>Info</h1><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</div><div>Cum ullam dignissimos minus nobis animi assumenda sint recusandae, vel veritatis! Animi illum quo repellendus pariatur enim doloribus deleniti fugiat sit alias illo. Voluptatum sed quod eaque adipisci cupiditate placeat qui, delectus rerum vel, dignissimos necessitatibus architecto, quas nemo alias reprehenderit dolorem dolore omnis. Unde voluptate aperiam facere, molestiae a.</div><div>Quidem hic dolore voluptate, impedit architecto, nesciunt, harum modi non quasi, doloribus tempora expedita! Quasi iste maxime laudantium ipsum rem voluptate ratione numquam consequuntur quibusdam vitae, quo nam blanditiis dolorum molestiae deserunt perspiciatis labore ut eaque suscipit fugiat illum quis voluptatibus porro, quae laborum. Nihil facere sapiente necessitatibus vitae libero.</div>'),
(11, 4, 2, '<h1>Info</h1><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</div><div>Cum ullam dignissimos minus nobis animi assumenda sint recusandae, vel veritatis! Animi illum quo repellendus pariatur enim doloribus deleniti fugiat sit alias illo. Voluptatum sed quod eaque adipisci cupiditate placeat qui, delectus rerum vel, dignissimos necessitatibus architecto, quas nemo alias reprehenderit dolorem dolore omnis. Unde voluptate aperiam facere, molestiae a.</div><div>Quidem hic dolore voluptate, impedit architecto, nesciunt, harum modi non quasi, doloribus tempora expedita! Quasi iste maxime laudantium ipsum rem voluptate ratione numquam consequuntur quibusdam vitae, quo nam blanditiis dolorum molestiae deserunt perspiciatis labore ut eaque suscipit fugiat illum quis voluptatibus porro, quae laborum. Nihil facere sapiente necessitatibus vitae libero.</div>'),
(12, 4, 3, '<h1>Инфо</h1><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit, pariatur odio unde deleniti eveniet magni, cum ad iure vel nisi minima vero voluptates ut ipsum amet iusto hic ex totam! Distinctio ea, sit explicabo perspiciatis animi dignissimos odit iusto tempore? Ex porro dicta temporibus impedit ullam, quas beatae.</div><div>Cum ullam dignissimos minus nobis animi assumenda sint recusandae, vel veritatis! Animi illum quo repellendus pariatur enim doloribus deleniti fugiat sit alias illo. Voluptatum sed quod eaque adipisci cupiditate placeat qui, delectus rerum vel, dignissimos necessitatibus architecto, quas nemo alias reprehenderit dolorem dolore omnis. Unde voluptate aperiam facere, molestiae a.</div><div>Quidem hic dolore voluptate, impedit architecto, nesciunt, harum modi non quasi, doloribus tempora expedita! Quasi iste maxime laudantium ipsum rem voluptate ratione numquam consequuntur quibusdam vitae, quo nam blanditiis dolorum molestiae deserunt perspiciatis labore ut eaque suscipit fugiat illum quis voluptatibus porro, quae laborum. Nihil facere sapiente necessitatibus vitae libero.</div>');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `main_menu`
--

CREATE TABLE IF NOT EXISTS `main_menu` (
`id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Sukurta duomenų kopija lentelei `main_menu`
--

INSERT INTO `main_menu` (`id`, `page`) VALUES
(1, 'home'),
(2, 'about'),
(3, 'contacts'),
(4, 'info');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` int(8) NOT NULL,
  `news_picture` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `entity`
--
ALTER TABLE `entity`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang_category`
--
ALTER TABLE `lang_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang_entity`
--
ALTER TABLE `lang_entity`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang_main_menu`
--
ALTER TABLE `lang_main_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang_main_pages`
--
ALTER TABLE `lang_main_pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang_news`
--
ALTER TABLE `lang_news`
 ADD PRIMARY KEY (`lang_news_id`);

--
-- Indexes for table `lang_pages`
--
ALTER TABLE `lang_pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `admin_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `entity`
--
ALTER TABLE `entity`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lang_category`
--
ALTER TABLE `lang_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `lang_entity`
--
ALTER TABLE `lang_entity`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lang_main_menu`
--
ALTER TABLE `lang_main_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `lang_main_pages`
--
ALTER TABLE `lang_main_pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `lang_news`
--
ALTER TABLE `lang_news`
MODIFY `lang_news_id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lang_pages`
--
ALTER TABLE `lang_pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `news_id` int(8) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
