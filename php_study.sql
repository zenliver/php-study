-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-08-31 11:25:09
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_study`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_title` varchar(200) NOT NULL,
  `article_author` varchar(20) DEFAULT NULL,
  `article_desc` tinytext NOT NULL,
  `article_content` text NOT NULL,
  `article_date` bigint(15) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `article_date` (`article_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `article_title`, `article_author`, `article_desc`, `article_content`, `article_date`) VALUES
(8, '凡度：美的态度 相遇美的力量', 'zen', '近日，美丽的西子湖畔迎来一场有关美的盛会。由中华文化促进会人居文化委员会，杭州中华文化促进会主办的“美的力量” 之“中华人居美学季”。', '近日，美丽的西子湖畔迎来一场有关美的盛会。由中华文化促进会人居文化委员会，杭州中华文化促进会主办的“美的力量” 之“中华人居美学季”。<br>\r\n\r\n凡度以“战略合作伙伴”身份受邀出席了挂牌仪式，并成为CCPS设计师创意驻栈中心合作家具品牌。<br><br>\r\n\r\n\r\n活动设置了公开课课程，为新晋设计师提供与名家直接交流的机会。<br><br>\r\n\r\n海内外知名学者王石、王守常、邓晓芒、西川、苑举正，知名文化创意人柴晓冬、包益民、段威、许照明、鞠肖男、黄静美、江力、陈暄、金雷等数十位来自哲学、美学、儒学、艺术、建筑、设计、收藏界的专家学者济济一堂开课，助力“美的力量”。<br><br>\r\n\r\nCCPS设计师创意驻栈中心，是在当下国家大力推动文化创意产业发展的大趋势下，由中华文化促进会人居文化委员会以“人居美学”为原点，整合优质文化资源，进而影响建筑、景观、设计、家具器物乃至人居美学产业链的一次落地，用实际行动践行“美的力量”。<br><br>\r\n\r\n635.jpg\r\n\r\n凡度品牌，从创立之初便坚定了以设计为驱动，以科技创新为指导力量的发展之路。凡度的产品线条简洁前卫，色彩搭配大胆创意，品质舒适优质，与本次活动主题“美的力量”完美契合，在现场更受到不少设计师、美学人士的关注和认可。<br><br>\r\n\r\n凡度Gluck、Mountain、Panton系列产品在驻栈中心中与多种空间搭配，完美融合。<br><br>\r\n\r\n图片关键词\r\n\r\n图片关键词\r\n\r\n图片关键词\r\n\r\n坚持美的态度，创造属于凡度美的力量。', 1501914775),
(9, '凡度•2017品鉴会', '凡度', '3月27日，全国办公行业精英代表齐聚凡度基地。凡度，第一次亮相在大家面前。', '3月27日，全国办公行业精英代表齐聚凡度基地。凡度，第一次亮相在大家面前。\r\n\r\n品鉴会.jpg\r\n\r\n凡度，在设计中更加关注情感的诉求，产品是有生命的，让产品满足人的需求，它才焕发出源源不断的生命力。办公家具不仅是产品，更是设计对空间解决方案及人体工学的理解。  凡度，重视创新的力量，让每一个细节都是对产品完美的表现。\r\n\r\n6671.jpg\r\n\r\n在轻松愉悦的环境中，凡度销售总监对新产品进行讲解。在座谈会上，凡度总经理周云介绍了凡度品牌的诞生及定位，让大家对凡度有更清晰的认识。随后，在互动交流环节中，大家分享了对新产品的看法。\r\n\r\n667.jpg\r\n\r\n《办公家具》杂志苏蓓主编肯定了凡度的定位，她表示，如今未来办公家具的发展不仅要靠好的设计先行，更要分析行业的发展，对客户的需求有着清晰的认识。\r\n\r\n  668.jpg\r\n\r\n 凡度相信，我们的坚持，将一直在凡度发展的道路上。\r\n\r\n', 1501572733),
(10, 'Choose your love, and then keep walking', 'zenliver', 'rfsarrwrwrwrwrwrwrwrwrwewwqrwrwrwrw的东西，梦想想要的未来，这大概是每个人想要的生活。', '做喜欢的事，接触喜欢的东西，梦想想要的未来，这大概是每个人想要的生活。\r\n\r\n我们为了梦想，一直在努力，与凡度共同进步。\r\n\r\n\r\n从形象上严格要求自己，展示完美的凡度形象。\r\n\r\n每天早上轮流分享小故事，从早上开始喝一碗“鸡汤”，保持一天的精力。\r\n\r\n\r\n实践是学习的重要手段，自己动手组装产品，比纸上谈兵的学习更有效。\r\n', 1501576293),
(18, '粉身碎骨深深的感到伤感的相关函数是', '嘀咕嘀咕上的改善', '打官司大公司的归属感', '大概受到广大广东公司', 1501573033),
(19, '人提问体温凡度', '凡度', '凡度', '凡度', 1501914813),
(20, '凡度厄特特', '凡度', '凡度', '凡度', 1501914823),
(21, '问天网凡度徐熙娣', '凡度', '凡度', '凡度', 1501914833);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
