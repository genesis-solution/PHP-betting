-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2023 at 02:48 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_swer3`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_area`
--

CREATE TABLE `active_area` (
  `id` int(11) NOT NULL,
  `country` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_operator` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `active_area`
--

INSERT INTO `active_area` (`id`, `country`, `region`, `sub_operator`, `city`, `date`) VALUES
(1, 'ph', 'Negros Island Region', 'gabrione', 'Province of Negros Oriental', '2023-09-04 01:09:01'),
(2, 'ph', 'Negros Island Region', 'CB.SO.Test1', 'Province of Negros Oriental', '2023-09-09 06:35:51'),
(3, 'ph', 'Negros Island Region', 'CB.SO.Test2', 'Province of Negros Oriental', '2023-09-09 06:36:21'),
(4, 'ph', 'Negros Island Region', 'Test Sub Station', 'Province of Negros Oriental', '2023-09-16 08:03:49'),
(5, 'ph', 'Negros Island Region', 'Subtest1', 'Province of Negros Oriental', '2023-09-16 08:25:27'),
(6, 'ph', 'Negros Island Region', 'TRIAL', 'Province of Negros Oriental', '2023-09-16 08:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `sponsor` varchar(500) NOT NULL,
  `full_name` varchar(500) NOT NULL,
  `role` enum('super_admin','declerator','admin','staff') NOT NULL,
  `password` varchar(500) NOT NULL,
  `date_registered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `sponsor`, `full_name`, `role`, `password`, `date_registered`) VALUES
(1, 'pick3_declerator', 'pick3_admin', 'Pick 3 Declerator', 'declerator', 'e10adc3949ba59abbe56e057f20f883e', '2023-08-24 10:06:24'),
(2, 'pick3_admin', 'head', 'Pick 3 Super Admin', 'super_admin', 'f85bd8b3a9edd3e0542563c6e8342f0d', '2023-08-25 17:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `announcement` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `announcement`) VALUES
(1, 'WELCOME TO PICK 3 | PLEASE WAIT FOR THE NEXT DRAW');

-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE `bets` (
  `id` int(11) NOT NULL,
  `username` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_time` enum('D1','D2','D3','D4','D5','D6') COLLATE utf8mb4_unicode_ci NOT NULL,
  `1st_ball` int(11) NOT NULL,
  `2nd_ball` int(11) NOT NULL,
  `3rd_ball` int(11) NOT NULL,
  `combinations` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `combi_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `combi_pick` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raffle_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL,
  `win_amount` double NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_before_bet` double NOT NULL,
  `balance_after_bet` double NOT NULL,
  `bet_area` enum('Local Draw','National Draw') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Open','Closed','Loss','Win') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Open',
  `result` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win_status` enum('Unclaimed','Claimed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unclaimed',
  `collection` enum('Not Collected','Collected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Collected',
  `same_num` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_placed` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bets`
--

INSERT INTO `bets` (`id`, `username`, `sponsor`, `game_time`, `1st_ball`, `2nd_ball`, `3rd_ball`, `combinations`, `combi_type`, `combi_pick`, `raffle_code`, `amount`, `win_amount`, `remark`, `balance_before_bet`, `balance_after_bet`, `bet_area`, `status`, `result`, `ticket_number`, `win_status`, `collection`, `same_num`, `date_placed`) VALUES
(1, 'JACK', 'TRIAL', 'D1', 0, 0, 0, '0-0-0', 'Straight Ball', 'Manual', '', 10, 4500, '', 13860, 13850, 'Local Draw', 'Win', '', 'UR3H98-38-263-2023', 'Claimed', 'Collected', '0', '2023-09-20 09:20:58AM'),
(2, 'JACK', 'TRIAL', 'D1', 0, 0, 0, '0-0-0', 'Straight Ball', 'Manual', '', 10, 4500, '', 13850, 13840, 'Local Draw', 'Win', '', 'A4J606-38-263-2023', 'Claimed', 'Collected', '0', '2023-09-20 09:21:19AM'),
(3, 'JACK', 'TRIAL', 'D2', 8, 8, 0, '8-8-0', 'Straight Ball', 'Manual', '', 10, 4500, '', 50000, 49990, 'National Draw', 'Win', '', 'ZX9NNU-38-263-2023', 'Unclaimed', 'Collected', '0', '2023-09-20 09:39:01AM'),
(4, 'JACK', 'TRIAL', 'D2', 8, 8, 0, '8-8-0', 'Rambolito', 'Manual', '', 10, 1500, '', 49990, 49980, 'National Draw', 'Win', '', 'ZX9NNU-38-263-2023', 'Unclaimed', 'Collected', '0', '2023-09-20 09:39:01AM'),
(5, 'JACK', 'TRIAL', 'D2', 0, 8, 8, '0-8-8', 'Rambolito', 'Manual', '', 10, 1500, '', 49980, 49970, 'National Draw', 'Win', '', 'ZX9NNU-38-263-2023', 'Unclaimed', 'Collected', '0', '2023-09-20 09:39:01AM'),
(6, 'JACK', 'TRIAL', 'D3', 7, 8, 9, '7-8-9', 'Straight Ball', 'Manual', '', 10, 4500, '', 42470, 42460, 'Local Draw', 'Win', '', 'IZIOMK-38-263-2023', 'Unclaimed', 'Collected', '0', '2023-09-20 09:46:34AM'),
(7, 'JACK', 'TRIAL', 'D3', 7, 8, 9, '7-8-9', 'Rambolito', 'Manual', '', 10, 750, '', 42460, 42450, 'Local Draw', 'Win', '', 'IZIOMK-38-263-2023', 'Unclaimed', 'Collected', '0', '2023-09-20 09:46:34AM'),
(8, 'JACK', 'TRIAL', 'D3', 8, 9, 7, '8-9-7', 'Rambolito', 'Manual', '', 10, 750, '', 42450, 42440, 'Local Draw', 'Win', '', 'IZIOMK-38-263-2023', 'Unclaimed', 'Collected', '0', '2023-09-20 09:46:34AM'),
(9, 'JACK', 'TRIAL', 'D3', 8, 9, 7, '8-9-7', 'Straight Ball', 'Manual', '', 10, 0, '', 42440, 42430, 'Local Draw', 'Loss', '', 'IZIOMK-38-263-2023', 'Unclaimed', 'Collected', '0', '2023-09-20 09:46:34AM'),
(10, 'kiosk_negros2', 'gabrione', 'D1', 1, 5, 1, '1-5-1', 'Straight Ball', 'Lucky', '72F82', 10, 0, '', 50000, 49990, 'National Draw', 'Open', '', 'HMO1L9-3-263-2023', 'Unclaimed', 'Not Collected', '0', '2023-09-21 07:28:41PM'),
(11, 'kiosk_negros1', 'gabrione', 'D4', 5, 6, 7, '5-6-7', 'Straight Ball', 'Lucky', 'O14KB', 10, 0, '', 50000, 49990, 'National Draw', 'Open', '', '2N40525S6-2-264-2023', 'Unclaimed', 'Not Collected', '0', '2023-09-21 12:31:52PM'),
(12, 'kiosk_negros1', 'gabrione', 'D4', 5, 8, 8, '5-8-8', 'Rambolito', 'Lucky', '5KGIR', 10, 0, '', 49990, 49980, 'National Draw', 'Open', '', '2N40525S6-2-264-2023', 'Unclaimed', 'Not Collected', '0', '2023-09-21 12:31:52PM'),
(13, 'kiosk_negros1', 'gabrione', 'D4', 5, 8, 1, '5-8-1', 'Straight Ball', 'Lucky', 'GPGXY', 10, 0, '', 49980, 49970, 'National Draw', 'Open', '', '2LL5E88T1-2-264-2023', 'Unclaimed', 'Not Collected', '0', '2023-09-21 12:32:42PM');

-- --------------------------------------------------------

--
-- Table structure for table `draw_winners`
--

CREATE TABLE `draw_winners` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `sponsor` varchar(500) NOT NULL,
  `game_time` varchar(500) NOT NULL,
  `combinations` varchar(500) NOT NULL,
  `bet_id` int(11) NOT NULL,
  `combi_type` varchar(500) NOT NULL,
  `combi_pick` varchar(500) NOT NULL,
  `bet_amount` double NOT NULL,
  `winning_amount` double NOT NULL,
  `ticket_number` varchar(500) NOT NULL,
  `status` enum('Unclaimed','Claimed','Declined') NOT NULL DEFAULT 'Unclaimed',
  `draw_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `draw_winners`
--

INSERT INTO `draw_winners` (`id`, `username`, `sponsor`, `game_time`, `combinations`, `bet_id`, `combi_type`, `combi_pick`, `bet_amount`, `winning_amount`, `ticket_number`, `status`, `draw_date`) VALUES
(1, 'JACK', 'TRIAL', 'D1', '0-0-0', 1, 'Straight Ball', 'Manual', 10, 4500, 'UR3H98-38-263-2023', 'Claimed', '2023-09-20 09:26:01'),
(2, 'JACK', 'TRIAL', 'D1', '0-0-0', 2, 'Straight Ball', 'Manual', 10, 4500, 'A4J606-38-263-2023', 'Unclaimed', '2023-09-20 09:26:01'),
(3, 'JACK', 'TRIAL', 'D2', '8-8-0', 3, 'Straight Ball', 'Manual', 10, 4500, 'ZX9NNU-38-263-2023', 'Unclaimed', '2023-09-20 09:41:06'),
(4, 'JACK', 'TRIAL', 'D2', '8-8-0', 4, 'Rambolito', 'Manual', 10, 1500, 'ZX9NNU-38-263-2023', 'Unclaimed', '2023-09-20 09:41:06'),
(5, 'JACK', 'TRIAL', 'D2', '0-8-8', 5, 'Rambolito', 'Manual', 10, 1500, 'ZX9NNU-38-263-2023', 'Unclaimed', '2023-09-20 09:41:06'),
(6, 'JACK', 'TRIAL', 'D3', '7-8-9', 6, 'Straight Ball', 'Manual', 10, 4500, 'IZIOMK-38-263-2023', 'Unclaimed', '2023-09-20 09:47:37'),
(7, 'JACK', 'TRIAL', 'D3', '7-8-9', 7, 'Rambolito', 'Manual', 10, 750, 'IZIOMK-38-263-2023', 'Unclaimed', '2023-09-20 09:47:37'),
(8, 'JACK', 'TRIAL', 'D3', '8-9-7', 8, 'Rambolito', 'Manual', 10, 750, 'IZIOMK-38-263-2023', 'Unclaimed', '2023-09-20 09:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `game_history`
--

CREATE TABLE `game_history` (
  `id` int(11) NOT NULL,
  `1st_number` int(11) NOT NULL,
  `2nd_number` int(11) NOT NULL,
  `3rd_number` int(11) NOT NULL,
  `draw_time` varchar(500) NOT NULL,
  `combinations` varchar(500) NOT NULL,
  `declared_by` varchar(500) NOT NULL,
  `date_declared` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_history`
--

INSERT INTO `game_history` (`id`, `1st_number`, `2nd_number`, `3rd_number`, `draw_time`, `combinations`, `declared_by`, `date_declared`) VALUES
(1, 0, 0, 0, 'D1', '0-0-0', 'pick3_declerator', '2023-09-20 09:26:01'),
(2, 8, 8, 0, 'D2', '8-8-0', 'pick3_declerator', '2023-09-20 09:41:06'),
(3, 7, 8, 9, 'D3', '7-8-9', 'pick3_declerator', '2023-09-20 09:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `game_status`
--

CREATE TABLE `game_status` (
  `id` int(11) NOT NULL,
  `game_status` enum('Open','Close','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_time` enum('D1','D2','D3','D4','D5','D6') COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_result` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_status`
--

INSERT INTO `game_status` (`id`, `game_status`, `game_time`, `last_result`) VALUES
(1, 'Close', 'D1', '0-0-0'),
(2, 'Close', 'D2', '8-8-0'),
(3, 'Close', 'D3', '7-8-9'),
(4, 'Open', 'D4', ''),
(5, 'Close', 'D5', ''),
(6, 'Close', 'D6', '');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `type` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `sponsor` varchar(500) NOT NULL,
  `role` varchar(500) NOT NULL,
  `total_bet` double NOT NULL,
  `total_player_wins` double NOT NULL,
  `total_banka_wins` double NOT NULL,
  `total_management` double NOT NULL,
  `total_collected` double NOT NULL,
  `total_not_collected` double NOT NULL,
  `date_report` date NOT NULL,
  `date_generated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(11) NOT NULL,
  `username` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processed_by` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_type` enum('Deposit','Withdrawal','Commission Withdrawal','Placed Bet','Winnings','Collections') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `game_time` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`id`, `username`, `full_name`, `sponsor`, `processed_by`, `transaction_type`, `amount`, `game_time`, `transaction_date`) VALUES
(1, 'JACK', 'JACK', 'TRIAL', 'SAMPLE1', 'Collections', 20, '', '2023-09-20 09:32:28'),
(2, 'JACK', 'JACK', 'TRIAL', 'SAMPLE1', 'Collections', 70, '', '2023-09-20 09:49:06'),
(3, 'JACK', 'JACK', 'TRIAL', 'TRIAL', 'Withdrawal', 4500, '', '2023-09-20 04:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Sub Operator','Kiosk','Collection','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_wallet` double NOT NULL,
  `wallet` double NOT NULL,
  `commission` double NOT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_status` enum('Offline','Online') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `country`, `region`, `city`, `barangay`, `mobile`, `password`, `role`, `sponsor`, `starting_wallet`, `wallet`, `commission`, `date`, `ip_address`, `access_status`) VALUES
(1, 'gabrione', 'Gabrione Games, inc', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', 'none', 'e10adc3949ba59abbe56e057f20f883e', 'Sub Operator', 'pick3_admin', 50000, 0, 0, '2023-09-04 01:09:01', '172.71.210.216', 'Offline'),
(2, 'kiosk_negros1', 'Kiosk Negros Oriental', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '092182938475', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 49970, 0, '2023-09-04 01:09:44', '172.71.210.21', 'Online'),
(3, 'kiosk_negros2', 'kiosk_negros2', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', 'kiosk_negros2', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 49990, 0, '2023-09-06 08:25:22', '172.71.214.38', 'Online'),
(4, 'kiosk_negros3', 'kiosk_negros3', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', 'kiosk_negros3', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-06 08:26:03', '172.71.214.38', 'Offline'),
(5, 'kiosk_negros4', 'kiosk_negros4', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', 'kiosk_negros4', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-06 08:26:17', '172.71.214.38', 'Offline'),
(6, 'kiosk_negros5', 'kiosk_negros5', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', 'kiosk_negros5', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-06 08:26:34', '172.71.214.38', 'Offline'),
(7, 'kiosk_negros6', 'kiosk_negros6', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', 'kiosk_negros6', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-06 08:33:12', '172.71.218.126', 'Offline'),
(8, 'collection_negros1', 'Negros Collections', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', 'NONE', 'e10adc3949ba59abbe56e057f20f883e', 'Collection', 'gabrione', 0, 0, 0, '2023-09-07 11:57:48', '172.70.123.48', 'Online'),
(9, 'collection_negros2', 'Negros 2 Collection', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', 'none', 'e10adc3949ba59abbe56e057f20f883e', 'Collection', 'gabrione', 0, 0, 0, '2023-09-08 01:32:33', '172.70.123.23', 'Offline'),
(10, 'test321', '123123assd', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '123123123', '4297f44b13955235245b2497399d7a93', 'Collection', 'gabrione', 0, 0, 0, '2023-09-08 10:27:29', '172.70.122.62', 'Offline'),
(11, 'CB.Test1', 'CB', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '123455', 'e10adc3949ba59abbe56e057f20f883e', 'Collection', 'gabrione', 0, 0, 0, '2023-09-08 10:36:44', '172.70.122.14', 'Offline'),
(12, 'CB.Test2', 'CB', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '12345678', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-08 10:37:13', '172.68.118.178', 'Offline'),
(13, 'CB.Test3', 'CB', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '12342351234', 'e10adc3949ba59abbe56e057f20f883e', 'Collection', 'gabrione', 0, 0, 0, '2023-09-08 10:38:08', '172.70.123.48', 'Offline'),
(14, 'CB.Test4', 'CB', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '1233251253214', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-08 10:38:29', '172.68.118.147', 'Offline'),
(15, 'Beta Kiosk1', '123456', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '09161231234', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-09 12:32:48', '172.68.119.110', 'Offline'),
(16, 'Kiosk_beta2', '123456', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '09983434347', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-09 01:24:17', '172.68.119.86', 'Offline'),
(17, 'Kiosk_beta3', 'Beta3', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '0919676668', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-09 01:25:41', '172.68.118.98', 'Offline'),
(18, 'Kiosk_beta4', 'Beta4', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '090909999', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-09 01:26:53', '172.68.119.102', 'Offline'),
(19, 'Beta_kiosk6', 'Beta6', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '09879876543', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-09 01:28:04', '172.68.118.77', 'Offline'),
(20, 'CB.SO.Test1', 'gabrione2', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '132213123213', 'e10adc3949ba59abbe56e057f20f883e', 'Sub Operator', 'pick3_admin', 50000, 0, 0, '2023-09-09 06:35:51', '172.70.122.65', 'Offline'),
(21, 'CB.SO.Test2', 'CB.SO.Test2', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '1312312321', 'e10adc3949ba59abbe56e057f20f883e', 'Sub Operator', 'pick3_admin', 50000, 0, 0, '2023-09-09 06:36:21', '172.70.122.65', 'Offline'),
(22, 'kiosk_cb1', 'kiosk_cb1', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', 'kiosk_cb1', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'CB.SO.Test1', 50000, 50000, 0, '2023-09-10 01:40:02', '172.68.119.85', 'Offline'),
(23, 'collection_cb1', 'collection_cb1', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', 'collection_cb1', 'e10adc3949ba59abbe56e057f20f883e', 'Collection', 'CB.SO.Test1', 0, 0, 0, '2023-09-10 02:25:37', '172.70.122.197', 'Offline'),
(24, 'DINA', 'DINA TUTO', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '09123456789', 'cb5370b81aa2920adf6ca2e34c191b00', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-14 08:02:53', '162.158.119.59', 'Online'),
(25, 'GAB-B01', 'GAB BOOTH 01', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '09123456879', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-14 08:09:57', '162.158.118.225', 'Online'),
(26, 'SAMPLE', 'SAMPLE LANG', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'gabrione', 50000, 50000, 0, '2023-09-14 08:24:15', '162.158.119.109', 'Offline'),
(27, 'Test Sub Station', 'Test test', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '09178989898', 'e10adc3949ba59abbe56e057f20f883e', 'Sub Operator', 'pick3_admin', 500000, 0, 0, '2023-09-16 08:03:49', '162.158.118.32', 'Offline'),
(28, 'Test1', '123456', '', '', '', '', '09987767766', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'Test', 0, 50000, 0, '2023-09-16 08:05:25', '162.158.118.34', 'Offline'),
(29, 'Test2', 'Test2', '', '', '', '', '0988667789', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'Test', 0, 50000, 0, '2023-09-16 08:07:45', '162.158.118.35', 'Online'),
(30, 'kiosktest0123', 'kiosktest0123', '', '', '', '', 'kiosktest0123', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'Test', 0, 50000, 0, '2023-09-16 08:15:12', '162.158.118.23', 'Offline'),
(31, 'kiosk_pandi', 'kiosk_pandi', '', '', '', '', 'kiosk_pandi', '46ea7ac5af08d7a84fde0d12ff3e9f47', 'Kiosk', 'Test', 0, 50000, 0, '2023-09-16 08:19:17', '162.158.118.93', 'Offline'),
(32, 'kiosk1', 'kiosk1', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', 'kiosk1', '12770538e412e2570f04d587d7cc4ba2', 'Kiosk', 'CB.SO.Test1', 50000, 50000, 0, '2023-09-16 08:20:19', '162.158.118.93', 'Offline'),
(33, 'Subtest1', '123456', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '09170000000', 'e10adc3949ba59abbe56e057f20f883e', 'Sub Operator', 'pick3_admin', 500000, 0, 0, '2023-09-16 08:25:27', '162.158.118.92', 'Offline'),
(34, 'Subtestkiosk1', '123456', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '09170000000', 'e10adc3949ba59abbe56e057f20f883e', 'Kiosk', 'Subtest1', 500000, 50000, 0, '2023-09-16 08:26:39', '162.158.118.93', 'Offline'),
(35, 'TRIAL', 'TRIAL ONLY', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '09999999999', 'b5cfb306f0e8268bd4e5e00a703de214', 'Sub Operator', 'pick3_admin', 50000, 0, 0, '2023-09-16 08:29:19', '162.158.118.33', 'Offline'),
(36, 'SAMPLE1', 'SAMPLE ONLY', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '09888888888', 'e10adc3949ba59abbe56e057f20f883e', 'Collection', 'TRIAL', 0, 0, 0, '2023-09-16 08:32:19', '172.70.123.7', 'Online'),
(37, 'collector-demo1', 'demo1', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '0905256346', 'a1f5706761102820b4019f9cf24933da', 'Collection', 'TRIAL', 0, 0, 0, '2023-09-16 08:33:18', '162.158.119.4', 'Offline'),
(38, 'JACK', 'JACK', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '09887777777', '1d6c1e168e362bc0092f247399003a88', 'Kiosk', 'TRIAL', 50000, 50000, 0, '2023-09-16 08:36:17', '162.158.118.33', 'Online'),
(39, 'sample3', 'sample only', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '0988888888', '5e8ff9bf55ba3508199d22e984129be6', 'Collection', 'TRIAL', 0, 0, 0, '2023-09-20 07:40:39', '162.158.119.16', 'Online'),
(40, 'CB.Test.C10', '123456', 'ph', 'Negros Island Region', 'Province of Negros Oriental', '', '534523453245423', 'e10adc3949ba59abbe56e057f20f883e', 'Collection', 'gabrione', 0, 0, 0, '2023-09-20 07:40:54', '172.70.123.84', 'Offline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_area`
--
ALTER TABLE `active_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `draw_winners`
--
ALTER TABLE `draw_winners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_history`
--
ALTER TABLE `game_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_status`
--
ALTER TABLE `game_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_area`
--
ALTER TABLE `active_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bets`
--
ALTER TABLE `bets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `draw_winners`
--
ALTER TABLE `draw_winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `game_history`
--
ALTER TABLE `game_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `game_status`
--
ALTER TABLE `game_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
