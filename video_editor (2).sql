-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2021 at 04:31 AM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_editor`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `copy_video`
--

CREATE TABLE `copy_video` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `copy_video`
--

INSERT INTO `copy_video` (`id`, `url`) VALUES
(18, '1629698288-16289388061new.mp4'),
(19, '1633326259-youtube.mp4'),
(20, '1633334955-youtube.mp4'),
(21, '1633335164-p.mov'),
(22, '1633351052-youtube.mp4'),
(23, '1633351640-youtube.mp4'),
(24, '1633355384-youtube.mp4'),
(25, '1633356249-1630582365-Error.mp4'),
(26, '1633356605-1629698288-16289388061new.mp4'),
(27, '1633356897-1629698288-16289388061new.mp4'),
(28, '1633356977-1629698288-16289388061new.mp4'),
(29, '1633357121-1629698288-16289388061new.mp4'),
(30, '1633357736-1629698288-16289388061new.mp4'),
(31, '1633358363-1629698288-16289388061new.mp4'),
(32, '1633358842-1629698288-16289388061new.mp4'),
(33, '1633359149-1629698288-16289388061new.mp4'),
(34, '1633359382-1629698288-16289388061new.mp4'),
(35, '1633359502-1629698288-16289388061new.mp4'),
(36, '1633359876-1629698288-16289388061new.mp4'),
(37, '1633360955-1629698288-16289388061new.mp4'),
(38, '1633361515-1629698288-16289388061new.mp4'),
(39, '1633402333-1629698288-16289388061new.mp4'),
(40, '1633402634-1629698288-16289388061new.mp4'),
(41, '1633402930-1629698288-16289388061new.mp4'),
(42, '1633403200-1629698288-16289388061new.mp4'),
(43, '1633405525-youtube.mp4'),
(44, '1633407491-youtube.mp4'),
(45, '1633428449-1629698288-16289388061new.mp4'),
(46, '1633431653-1629698288-16289388061new.mp4'),
(47, '1633432019-1629698288-16289388061new.mp4'),
(48, '1633432128-youtube.mp4'),
(49, '1633434267-youtube.mp4'),
(50, '1633436742-youtube.mp4'),
(51, '1633436762-youtube.mp4'),
(52, '1633436959-youtube.mp4'),
(53, '1633436994-youtube.mp4'),
(54, '1633437843-youtube.mp4'),
(55, '1633437951-youtube.mp4'),
(56, '1633437975-youtube.mp4'),
(57, '1633439878-youtube.mp4'),
(58, '1633440698-youtube.mp4'),
(59, '1633441399-youtube.mp4'),
(60, '1633494706-youtube.mp4'),
(61, '1633494721-youtube.mp4'),
(62, '1633506749-youtube.mp4'),
(63, '1633512363-youtube.mp4'),
(64, '1633512572-1630582523-1628938272-youtube.mp4'),
(65, '1633512869-1629698288-16289388061new.mp4'),
(66, '1633512884-youtube.mp4'),
(67, '1633513028-youtube.mp4'),
(68, '1633513039-1629698288-16289388061new.mp4'),
(69, '1633513278-youtube.mp4'),
(70, '1633513287-1629698288-16289388061new.mp4'),
(71, '1633513603-youtube.mp4'),
(72, '1633513617-1629698288-16289388061new.mp4'),
(73, '1633513810-youtube.mp4'),
(74, '1633513820-1629698288-16289388061new.mp4'),
(75, '1633514030-youtube.mp4'),
(76, '1633514042-1629698288-16289388061new.mp4'),
(77, '1633529432-youtube.mp4'),
(78, '1633575016-youtube.mp4'),
(79, '1633576721-youtube.mp4'),
(80, '1633576935-youtube.mp4'),
(81, '1633579931-youtube.mp4'),
(82, '1633582943-youtube.mp4'),
(83, '1633582959-youtube.mp4'),
(84, '1633584814-youtube.mp4'),
(85, '1633585965-youtube.mp4'),
(86, '1633587881-youtube.mp4'),
(87, '1633588195-youtube.mp4'),
(88, '1633588549-youtube.mp4'),
(89, '1633593979-youtube.mp4'),
(90, '1633594006-youtube.mp4'),
(91, '1633594829-youtube.mp4'),
(92, '1633595355-youtube.mp4'),
(93, '1633595615-youtube.mp4'),
(94, '1633598420-youtube.mp4'),
(95, '1633608544-youtube.mp4'),
(96, '1633609534-youtube.mp4'),
(97, '1633610084-youtube.mp4'),
(98, '1633610265-youtube.mp4'),
(99, '1633610976-youtube.mp4'),
(100, '1633611774-youtube.mp4'),
(101, '1633612313-youtube.mp4'),
(102, '1633612386-youtube.mp4'),
(103, '1633614310-youtube.mp4'),
(104, '1633614390-youtube.mp4'),
(105, '1633614715-youtube.mp4'),
(106, '1633614891-4.mp4'),
(107, '1633614965-4.mp4'),
(108, '1633615005-youtube.mp4'),
(109, '1633615027-youtube.mp4'),
(110, '1633615092-2.mp4'),
(111, '1633615185-1.mp4'),
(112, '1633615242-2.mp4'),
(113, '1633615332-youtube.mp4'),
(114, '1633615357-1.mp4'),
(115, '1633615554-2.mp4'),
(116, '1633615581-youtube.mp4'),
(117, '1633615601-2.mp4'),
(118, '1633615959-youtube.mp4'),
(119, '1633616110-youtube.mp4'),
(120, '1633616126-youtube.mp4'),
(121, '1633616369-youtube.mp4'),
(122, '1633616390-youtube.mp4'),
(123, '1633616683-youtube.mp4'),
(124, '1633616699-youtube.mp4'),
(125, '1633617325-youtube.mp4'),
(126, '1633617346-youtube.mp4'),
(127, '1633617398-youtube.mp4'),
(128, '1633617417-youtube.mp4'),
(129, '1633617649-youtube.mp4'),
(130, '1633617664-youtube.mp4'),
(131, '1633628364-youtube.mp4'),
(132, '1633632468-2.mp4'),
(133, '1633632477-1.mp4'),
(134, '1633632486-4.mp4'),
(135, '1633664503-2.mp4'),
(136, '1633664693-1.mp4'),
(137, '1633664790-2.mp4'),
(138, '1633664849-1.mp4'),
(139, '1633664912-2.mp4'),
(140, '1633664919-3.mp4'),
(141, '1633665040-1.mp4'),
(142, '1633665063-4.mp4'),
(143, '1633665072-2.mp4'),
(144, '1633665258-1.mp4'),
(145, '1633665264-2.mp4'),
(146, '1633665270-3.mp4'),
(147, '1633665277-4.mp4'),
(148, '1633665403-youtube.mp4'),
(149, '1633666503-youtube.mp4'),
(150, '1633666531-youtube.mp4'),
(151, '1633666558-youtube.mp4'),
(152, '1633671499-youtube.mp4'),
(153, '1633672261-youtube.mp4'),
(154, '1633672413-youtube.mp4'),
(155, '1633672516-youtube.mp4'),
(156, '1633679864-youtube.mp4'),
(157, '1633679881-youtube.mp4'),
(158, '1633694674-1.mp4'),
(159, '1633694681-3.mp4'),
(160, '1633694861-3.mp4'),
(161, '1633694867-1.mp4'),
(162, '1633695202-3.mp4'),
(163, '1633695220-1.mp4'),
(164, '1633696440-3.mp4'),
(165, '1633696595-3.mp4'),
(166, '1633696606-1.mp4'),
(167, '1633697987-youtube.mp4'),
(168, '1633700254-youtube.mp4'),
(169, '1633700287-youtube.mp4'),
(170, '1633700312-youtube.mp4'),
(171, '1633700764-youtube.mp4'),
(172, '1633700823-youtube.mp4'),
(173, '1633701987-youtube.mp4'),
(174, '1633702013-youtube.mp4'),
(175, '1633704042-3.mp4'),
(176, '1633704250-3.mp4'),
(177, '1633704333-3.mp4'),
(178, '1633704467-3.mp4'),
(179, '1633704628-3.mp4'),
(180, '1633704785-3.mp4'),
(181, '1633704791-2.mp4'),
(182, '1633704797-1.mp4'),
(183, '1633705051-3.mp4'),
(184, '1633705064-2.mp4'),
(185, '1633705071-1.mp4'),
(186, '1633709621-4.mp4'),
(187, '1633709789-1.mp4'),
(188, '1633747676-youtube.mp4'),
(189, '1633747696-youtube.mp4'),
(190, '1633747723-youtube.mp4'),
(191, '1633748694-youtube.mp4'),
(192, '1633748722-youtube.mp4'),
(193, '1633749282-youtube.mp4'),
(194, '1633751156-youtube.mp4'),
(195, '1633755523-2.mp4'),
(196, '1633755695-4.mp4'),
(197, '1633756122-2.mp4'),
(198, '1633756173-4.mp4'),
(199, '1633756461-youtube.mp4'),
(200, '1633756479-youtube.mp4'),
(201, '1633757238-youtube.mp4'),
(202, '1633757529-2.mp4'),
(203, '1633757559-2.mp4'),
(204, '1633757612-3.mp4'),
(205, '1633758146-2.mp4'),
(206, '1633758154-1.mp4'),
(207, '1633759830-1.mp4'),
(208, '1633759837-2.mp4'),
(209, '1633760239-2.mp4'),
(210, '1633760253-1.mp4'),
(211, '1633760590-2.mp4'),
(212, '1633760597-1.mp4'),
(213, '1633760742-youtube.mp4'),
(214, '1633760761-youtube.mp4'),
(215, '1633761103-1629698288-16289388061new.mp4'),
(216, '1633761361-1629698288-16289388061new.mp4'),
(217, '1633761459-1630582365-Error.mp4'),
(218, '1633763132-2.mp4'),
(219, '1633763146-1.mp4'),
(220, '1633763415-youtube.mp4'),
(221, '1633763480-2.mp4'),
(222, '1633763489-1.mp4'),
(223, '1633763764-1629698288-16289388061new.mp4'),
(224, '1633763811-1630582722-16289388361_render.mp4'),
(225, '1633764602-WhatsApp_Video_2021-07-20_at_8_13_44_AM_(2).mp4'),
(226, '1633764640-يا_روحي.mp4'),
(227, '1633765115-WhatsApp_Video_2021-07-20_at_8_13_44_AM_(2).mp4'),
(228, '1633765125-يا_روحي.mp4'),
(229, '1633765172-youtube.mp4'),
(230, '1633765293-1629698288-16289388061new.mp4'),
(231, '1633765474-WhatsApp_Video_2021-07-20_at_8_13_44_AM_(2).mp4'),
(232, '1633765488-يا_روحي.mp4'),
(233, '1633765564-1630582523-1628938272-youtube.mp4'),
(234, '1633765749-2.mp4'),
(235, '1633765758-1.mp4'),
(236, '1633766322-يا_روحي.mp4'),
(237, '1633766363-يا_روحي.mp4'),
(238, '1633770155-2.mp4'),
(239, '1633770163-1.mp4'),
(240, '1633770338-VID-20211009-WA0016.mp4'),
(241, '1633770374-VID-20211006-WA0020.mp4'),
(242, '1633770959-1.mp4'),
(243, '1633770973-2.mp4'),
(244, '1633770994-WhatsApp_Video_2021-10-08_at_9_51_21_PM.mp4'),
(245, '1633771023-WhatsApp_Video_2021-10-08_at_9_51_21_PM.mp4'),
(246, '1633771130-1.mp4'),
(247, '1633771145-2.mp4'),
(248, '1633771482-1.mp4'),
(249, '1633771493-2.mp4'),
(250, '1633771673-youtube.mp4'),
(251, '1633771703-youtube.mp4'),
(252, '1633772142-1.mp4'),
(253, '1633772154-2.mp4'),
(254, '1633789878-Screen_Recording_2021-10-08_at_6_14_36_PM.mov'),
(255, '1633789922-Untitled_design.mp4'),
(256, '1633796274-1.mp4'),
(257, '1633796289-2.mp4'),
(258, '1633797093-1.mp4'),
(259, '1633797299-1.mp4'),
(260, '1633797314-2.mp4'),
(261, '1633797522-1.mp4'),
(262, '1633797607-1.mp4'),
(263, '1633797689-1.mp4'),
(264, '1633798684-1.mp4'),
(265, '1633798698-2.mp4'),
(266, '1633799295-1.mp4'),
(267, '1633799310-2.mp4'),
(268, '1633800121-2.mp4'),
(269, '1633800131-1.mp4'),
(270, '1633800307-2.mp4'),
(271, '1633800314-1.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `effects`
--

CREATE TABLE `effects` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(300) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `merge_videos`
--

CREATE TABLE `merge_videos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `thumbnail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rendered_videos`
--

CREATE TABLE `rendered_videos` (
  `id` int(11) NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rendered_videos`
--

INSERT INTO `rendered_videos` (`id`, `video_id`, `user_id`, `url`, `path`, `isDeleted`, `time`) VALUES
(30, '', 7, 'render_615c59ade3567_vid.mp4', '', 0, '1633442364'),
(36, '', 7, 'render_615e8900cad7b_vid.mp4', '', 0, '1633585582'),
(37, '', 7, 'render_615e8e770d2fe_vid.mp4', '', 0, '1633587036'),
(38, '', 7, 'Output1633587942.mp4', '', 1, '1633588068'),
(39, '', 7, 'Output1633588231.mp4', '', 1, '1633588503'),
(40, '', 7, 'render_615e9682bf8c5_vid.mp4', '', 1, '1633588932'),
(43, '', 8, 'Output1633608604.mp4', '', 1, '1633608877'),
(48, '', 8, 'Output1633612769.mp4', '', 1, '1633613353'),
(49, '', 1, 'Output1633614373.mp4', '', 0, '1633614596'),
(50, '', 8, '16336146798_render.mp4', '', 1, '1633614835'),
(51, '', 1, '16336148681_render.mp4', '', 0, '1633614883'),
(52, '', 8, '16336149298_render.mp4', '', 1, '1633614932'),
(53, '', 8, 'Output1633615008.mp4', '', 1, '1633615010'),
(54, '', 9, 'render_615efd225d9a2_vid.mp4', '', 1, '1633615138'),
(55, '', 1, 'render_615efd52ae3a7_vid.mp4', '', 0, '1633615202'),
(56, '', 9, 'render_615efd7195673_vid.mp4', '', 1, '1633615217'),
(57, '', 9, 'render_615efdbabb4e5_vid.mp4', '', 1, '1633615290'),
(58, '', 9, 'render_615efe2ced5b5_vid.mp4', '', 1, '1633615404'),
(59, '', 1, 'render_615efe5cf19a8_vid.mp4', '', 0, '1633615472'),
(60, '', 9, 'render_615efed91b346_vid.mp4', '', 1, '1633615577'),
(61, '', 9, 'render_615eff1120403_vid.mp4', '', 1, '1633615633'),
(62, '', 1, 'render_615eff908cec2_vid.mp4', '', 0, '1633615765'),
(63, '', 1, 'render_615f00871133c_vid.mp4', '', 0, '1633616017'),
(64, '', 1, 'render_615f016121cc4_vid.mp4', '', 0, '1633616234'),
(65, '', 1, 'render_615f0765bf1d5_vid.mp4', '', 0, '1633617781'),
(66, '', 8, 'render_615f3308cf4ae_vid.mp4', '', 1, '1633629084'),
(67, '', 8, 'Output1633632532.mp4', '', 1, '1633633110'),
(68, '', 8, 'render_615fbe37be136_vid.mp4', '', 1, '1633664567'),
(69, '', 1, 'render_615fbed216f1f_vid.mp4', '', 0, '1633664722'),
(70, '', 8, 'render_615fbf425cd1f_vid.mp4', '', 1, '1633664834'),
(71, '', 8, '16336648918_render.mp4', '', 1, '1633664895'),
(72, '', 8, 'Output1633664968.mp4', '', 1, '1633664987'),
(73, '', 8, 'Output1633665169.mp4', '', 1, '1633665182'),
(74, '', 8, 'Output1633665414.mp4', '', 1, '1633665486'),
(75, '', 1, 'render_615fc1d815975_vid.mp4', '', 0, '1633665510'),
(76, '', 1, 'render_615fc874ed251_vid.mp4', '', 0, '1633667211'),
(77, '', 1, 'render_615ffa5e12bf5_vid.mp4', '', 0, '1633679969'),
(78, '', 8, 'render_616034343ddcb_vid.mp4', '', 1, '1633694776'),
(79, '', 8, 'render_61603582c69d3_vid.mp4', '', 1, '1633695106'),
(80, '', 8, 'render_616036c4be219_vid.mp4', '', 1, '1633695428'),
(81, '', 8, 'render_61603ad76413a_vid.mp4', '', 1, '1633696475'),
(82, '', 1, 'render_61604976a0cfe_vid.mp4', '', 0, '1633700217'),
(83, '', 1, 'render_61604ac9ccd96_vid.mp4', '', 0, '1633700585'),
(84, '', 7, 'render_6160510eca9cc_vid.mp4', '', 0, '1633702172'),
(85, '', 8, '16337041118_render.mp4', '', 1, '1633704125'),
(86, '', 8, 'Output1633704283.mp4', '', 1, '1633704288'),
(87, '', 8, 'render_616059c4dd848_vid.mp4', '', 1, '1633704395'),
(88, '', 8, 'render_61605a5d1454a_vid.mp4', '', 1, '1633704548'),
(89, '', 8, 'render_61605af2c6da7_vid.mp4', '', 1, '1633704694'),
(90, '', 8, 'Output1633704873.mp4', '', 1, '1633704926'),
(91, '', 8, 'Output1633705107.mp4', '', 1, '1633706714'),
(92, '', 8, 'render_61606f1db5ab0_vid.mp4', '', 1, '1633709853'),
(93, '', 1, 'Output1633748785.mp4', '', 0, '1633749005'),
(94, '', 1, '16337499691_render.mp4', '', 0, '1633749996'),
(95, '', 1, 'Output1633747787.mp4', '', 0, '1633750198'),
(96, '', 1, '16337514951_render.mp4', '', 0, '1633751516'),
(97, '', 8, 'render_6161235d6bdf4_vid.mp4', '', 1, '1633755997'),
(98, '', 7, 'render_6161248c6aff2_vid.mp4', '', 0, '1633756300'),
(99, '', 1, 'render_61612725a60d2_vid.mp4', '', 0, '1633756990'),
(100, '', 1, '16337573291_render.mp4', '', 0, '1633757348'),
(101, '', 9, 'render_61612a5438138_vid.mp4', '', 1, '1633757785'),
(102, '', 9, 'render_61612c5fcad1f_vid.mp4', '', 1, '1633758303'),
(103, '', 9, 'render_61613483918a0_vid.mp4', '', 0, '1633760387'),
(104, '', 1, 'render_6161359b2e56b_vid.mp4', '', 0, '1633760667'),
(105, '', 1, 'render_616136a031c28_vid.mp4', '', 0, '1633760940'),
(106, '', 1, 'render_61613920e8a22_vid.mp4', '', 0, '1633761586'),
(107, '', 8, 'render_61613fd9dc0db_vid.mp4', '', 1, '1633763289'),
(108, '', 10, 'render_616140edb893d_vid.mp4', '', 0, '1633763565'),
(109, '', 8, 'render_6161429059cca_vid.mp4', '', 1, '1633763987'),
(110, '', 8, 'render_616145c369ad6_vid.mp4', '', 1, '1633764803'),
(111, '', 10, 'render_61615afbd51fc_vid.mp4', '', 0, '1633770235'),
(112, '', 8, 'render_61615bfc70c10_vid.mp4', '', 1, '1633770495'),
(113, '', 1, 'render_61615f8c829eb_vid.mp4', '', 0, '1633771404'),
(114, '', 1, 'render_61616072aaaf3_vid.mp4', '', 0, '1633771634'),
(115, '', 1, 'render_616161638b1d9_vid.mp4', '', 0, '1633771897'),
(116, '', 1, 'render_616162feb4631_vid.mp4', '', 0, '1633772286'),
(117, '', 9, 'render_6161a900f056c_vid.mp4', '', 0, '1633790208'),
(118, '', 1, 'render_6161c34c742ed_vid.mp4', '', 0, '1633796953'),
(119, '', 1, '16337973901_render.mp4', '', 0, '1633797410'),
(120, '', 1, '16337975741_render.mp4', '', 0, '1633797583'),
(121, '', 1, '16337976461_render.mp4', '', 0, '1633797655'),
(122, '', 1, 'render_6161caed40da4_vid.mp4', '', 0, '1633798905'),
(123, '', 1, '16337993901_render.mp4', '', 0, '1633799410'),
(124, '', 9, 'render_6161d01d21b26_vid.mp4', '', 0, '1633800227'),
(125, '', 8, 'render_6161d0e0bfe12_vid.mp4', '', 0, '1633800425');

-- --------------------------------------------------------

--
-- Table structure for table `saved_video`
--

CREATE TABLE `saved_video` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `arrangementPattern` varchar(255) NOT NULL,
  `trimStart` varchar(255) NOT NULL,
  `trimEnd` varchar(255) NOT NULL,
  `extras` varchar(255) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved_video`
--

INSERT INTO `saved_video` (`id`, `user_id`, `video_id`, `arrangementPattern`, `trimStart`, `trimEnd`, `extras`, `isDeleted`) VALUES
(11, 1, 11, '', '00:00:00', '00:00:20', '', 0),
(12, 1, 10, '', '00:00:00', '00:00:10', '', 0),
(13, 1, 14, '', '1', '3', '', 0),
(14, 1, 14, '', '0', '2', '', 0),
(15, 1, 14, '', '0', '1', '', 0),
(16, 1, 14, '', '0', '1', '', 0),
(17, 1, 16, '', '2', '8', '', 0),
(18, 1, 16, '', '1', '5', '', 0),
(19, 1, 16, '', '1', '4', '', 0),
(20, 1, 17, '', '1', '5', '', 0),
(21, 1, 18, '', '1', '6', '', 0),
(22, 1, 18, '', '1', '4', '', 0),
(23, 1, 18, '', '1', '5', '', 0),
(24, 1, 18, '', '1', '5', '', 0),
(25, 7, 20, '', '0', '36', '', 0),
(26, 1, 22, '', '0', '60', '', 0),
(27, 1, 23, '', '0', '60', '', 0),
(28, 1, 25, '', '0', '30', '', 0),
(29, 1, 43, '', '0', '270', '', 0),
(30, 1, 44, '', '0', '15', '', 0),
(31, 1, 45, '', '0', '5', '', 0),
(32, 1, 46, '', '0', '5', '', 0),
(33, 1, 48, '', '0', '150', '', 0),
(34, 1, 49, '', '0', '120', '', 0),
(35, 1, 50, '', '0', '15', '', 0),
(36, 1, 53, '', '0', '15', '', 0),
(37, 1, 52, '', '0', '15', '', 0),
(38, 1, 55, '', '0', '15', '', 0),
(39, 1, 58, '', '0', '240', '', 0),
(40, 7, 59, '', '0', '164', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `select_video`
--

CREATE TABLE `select_video` (
  `id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sorting_num` int(11) NOT NULL DEFAULT '0',
  `is_saved` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `select_video`
--

INSERT INTO `select_video` (`id`, `video_id`, `user_id`, `sorting_num`, `is_saved`) VALUES
(244, 239, 10, 1, 0),
(245, 238, 10, 2, 0),
(267, 266, 1, 1, 0),
(268, 267, 1, 2, 0),
(269, 269, 9, 2, 0),
(270, 268, 9, 1, 0),
(271, 271, 8, 2, 0),
(272, 270, 8, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `profile` varchar(255) NOT NULL,
  `emailId` varchar(200) DEFAULT NULL,
  `userPassword` text,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isActive` int(1) DEFAULT NULL,
  `lastUpdationDate` datetime DEFAULT NULL,
  `last_login` varchar(200) DEFAULT NULL,
  `YoutubeAPIKey` varchar(255) NOT NULL,
  `YoutubeAPISecret` varchar(255) NOT NULL,
  `mobileNumber` varchar(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `is_pro` tinyint(4) NOT NULL,
  `is_admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `Name`, `profile`, `emailId`, `userPassword`, `regDate`, `isActive`, `lastUpdationDate`, `last_login`, `YoutubeAPIKey`, `YoutubeAPISecret`, `mobileNumber`, `username`, `is_pro`, `is_admin`) VALUES
(1, 'Mohd Anas', '1628423525-ead665c21c1351c3351744a938dade9f.jpg', 'mohdanas.codecounter@gmail.com', 'be77f8e570caa9818d15eef603afb116', '2021-08-07 18:30:00', 1, '2021-08-09 00:00:00', '1633796247', 'AIzaSyAE_5rV5TqwS1gihiuffUZZ9i-y8iWhFos', 'dBxl6ZvF-W0B-vKzFAjI31V-', '', '', 1, 0),
(6, 'anas anas', '', 'anjan@gmail.com', 'e931794388d518d5e807d48e5baa0513', '2021-10-04 00:00:00', 1, NULL, NULL, '', '', '', '', 0, 0),
(7, 'Ammaar Yaseen', '', 'yammaar125@gmail.com', 'd3f2f64a94cccc99537876f2e0f3080e', '2021-10-04 00:00:00', 1, '2021-10-04 00:00:00', '1633756045', 'AIzaSyAE_5rV5TqwS1gihiuffUZZ9i-y8iWhFos', 'dBxl6ZvF-W0B-vKzFAjI31V-', '', '', 1, 0),
(8, 'Olign Seret', '', 'yammaar9@gmail.com', 'd3f2f64a94cccc99537876f2e0f3080e', '2021-10-07 00:00:00', 1, '2021-10-07 00:00:00', '1633800295', 'AIzaSyAE_5rV5TqwS1gihiuffUZZ9i-y8iWhFos', 'dBxl6ZvF-W0B-vKzFAjI31V-', '', '', 1, 0),
(9, 'Admin', '', 'admin@youprofit.com', 'e3c02a2c3051438dc2bf4f87c7073e18', '2021-10-07 08:25:53', NULL, '2021-10-07 08:24:48', '1633789827', '', '', '', '', 1, 1),
(10, 'dormamu strange', '', 'test@test.com', 'd3f2f64a94cccc99537876f2e0f3080e', '2021-10-09 00:00:00', 1, NULL, '1633763468', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `upload_video`
--

CREATE TABLE `upload_video` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(300) NOT NULL,
  `thumbnail` varchar(300) NOT NULL,
  `is_delete` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_video`
--

INSERT INTO `upload_video` (`id`, `user_id`, `url`, `thumbnail`, `is_delete`) VALUES
(77, 7, '1633529432-youtube.mp4', '1633529432-1234.jpg', 1),
(152, 1, '1633671499-youtube.mp4', '1633671499-1234.jpg', 1),
(153, 1, '1633672261-youtube.mp4', '1633672261thumb.jpg', 1),
(154, 1, '1633672413-youtube.mp4', '1633672413thumb.jpg', 1),
(155, 1, '1633672516-youtube.mp4', '1633672516thumb.jpg', 1),
(202, 7, '1633757529-2.mp4', '61612959686eb-Thumbnail.jpg', 0),
(207, 9, '1633759830-1.mp4', '61613256a1708-Thumbnail.jpg', 1),
(208, 9, '1633759837-2.mp4', '6161325de7dbe-Thumbnail.jpg', 1),
(215, 1, '1633761103-1629698288-16289388061new.mp4', '6161374f54425-Thumbnail.jpg', 1),
(216, 1, '1633761361-1629698288-16289388061new.mp4', '1633761361thumb.jpg', 1),
(220, 1, '1633763415-youtube.mp4', '1633763415thumb.jpg', 1),
(229, 8, '1633765172-youtube.mp4', '1633765172thumb.jpg', 1),
(230, 1, '1633765293-1629698288-16289388061new.mp4', '1633765293thumb.jpg', 1),
(233, 1, '1633765564-1630582523-1628938272-youtube.mp4', '1633765565thumb.jpg', 1),
(236, 8, '1633766322-يا_روحي.mp4', '1633766322thumb.jpg', 1),
(237, 8, '1633766363-يا_روحي.mp4', '1633766364thumb.jpg', 1),
(242, 1, '1633770959-1.mp4', '1633770959thumb.jpg', 1),
(243, 1, '1633770973-2.mp4', '1633770974thumb.jpg', 1),
(244, 1, '1633770994-WhatsApp_Video_2021-10-08_at_9_51_21_PM.mp4', '1633770994thumb.jpg', 1),
(245, 1, '1633771023-WhatsApp_Video_2021-10-08_at_9_51_21_PM.mp4', '1633771023thumb.jpg', 1),
(252, 1, '1633772142-1.mp4', '1633772143thumb.jpg', 1),
(253, 1, '1633772154-2.mp4', '1633772154thumb.jpg', 1),
(258, 9, '1633797093-1.mp4', '1633797093thumb.jpg', 1),
(263, 1, '1633797689-1.mp4', '1633797689thumb.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `extras` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `effects`
--
ALTER TABLE `effects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merge_videos`
--
ALTER TABLE `merge_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rendered_videos`
--
ALTER TABLE `rendered_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_video`
--
ALTER TABLE `saved_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `select_video`
--
ALTER TABLE `select_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailId` (`emailId`);

--
-- Indexes for table `upload_video`
--
ALTER TABLE `upload_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `effects`
--
ALTER TABLE `effects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merge_videos`
--
ALTER TABLE `merge_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `rendered_videos`
--
ALTER TABLE `rendered_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `saved_video`
--
ALTER TABLE `saved_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `select_video`
--
ALTER TABLE `select_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `upload_video`
--
ALTER TABLE `upload_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
