-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2022 at 01:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `id_message`, `sender`, `receiver`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 3, '2022-02-13 10:58:19', '2022-02-13 06:53:10'),
(2, 0, 2, 3, '2022-02-13 06:53:10', '2022-02-13 06:53:10');

-- --------------------------------------------------------

--
-- Stand-in structure for view `conversationviews`
-- (See below for the actual view)
--
CREATE TABLE `conversationviews` (
`room_id` int(11)
,`room_name` varchar(255)
,`username` varchar(255)
,`avatar` text
,`user_id` int(11)
,`messages_id` int(11)
,`messages` text
,`file` text
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `deletedmessages`
--

CREATE TABLE `deletedmessages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  `message` text NOT NULL,
  `file` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `userId`, `roomId`, `message`, `file`, `created_at`, `updated_at`) VALUES
(76, 5, 1, 'sdsds', 'storage/files/gXTnL6mcum0Gc5AmbCNWcuMocZy0e9DSKsTnlFkP.png', '2022-02-14 11:04:13', '2022-02-14 04:04:13'),
(77, 5, 1, 'asdasdasd', 'storage/files/jEsph6PnQTc2BqXkutweomDHtdF3B5ddT6X787tA.png', '2022-02-14 12:24:34', '2022-02-14 05:24:34'),
(78, 5, 1, 'terbaru', 'storage/files/rmKt2IOXVLV060oRAPXOHOkvo40Qbf0DwzyIyEf4.png', '2022-02-16 07:58:45', '2022-02-16 00:58:45'),
(79, 8, 1, 'terbaru', 'storage/files/WS8vfP3lrvIawg7wb5vQEaT3duF63Jb8asfHRbpc.png', '2022-02-16 08:46:00', '2022-02-16 01:27:13'),
(80, 8, 1, 'terbaru ini 3', 'storage/files/Hje7f5SmrX6vps2iNjURgktbmmfcfsQtvVTv978k.png', '2022-02-16 08:46:08', '2022-02-16 01:37:11'),
(81, 3, 1, 'terbaru ini 3', 'storage/files/lp7mMl6lRnnfe3JIV7ZQgiBJUfklPp2OhZtmoPR1.png', '2022-02-16 10:29:24', '2022-02-16 03:29:24'),
(82, 5, 1, 'ini dari react', NULL, '2022-02-16 03:34:31', '2022-02-16 03:34:31'),
(83, 5, 1, 'coba', NULL, '2022-02-16 03:35:30', '2022-02-16 03:35:30'),
(84, 5, 1, 'coba dari react', NULL, '2022-02-16 03:35:58', '2022-02-16 03:35:58'),
(85, 5, 1, 'coba dari react', NULL, '2022-02-16 03:41:53', '2022-02-16 03:41:53'),
(86, 5, 1, 'coba dari asdasda', NULL, '2022-02-16 03:41:59', '2022-02-16 03:41:59'),
(87, 8, 1, 'in i drai 8', NULL, '2022-02-16 03:47:15', '2022-02-16 03:47:15'),
(88, 8, 1, 'in i drai 8', NULL, '2022-02-16 03:47:15', '2022-02-16 03:47:15'),
(89, 8, 1, 'ini juga', NULL, '2022-02-16 03:48:27', '2022-02-16 03:48:27'),
(90, 8, 1, 'ini juga', NULL, '2022-02-16 03:48:43', '2022-02-16 03:48:43'),
(91, 8, 3, 'ssadsd', NULL, '2022-02-16 03:50:01', '2022-02-16 03:50:01'),
(92, 8, 5, 'asdasdas', NULL, '2022-02-16 03:50:01', '2022-02-16 03:50:01'),
(93, 8, 5, 'asdasd', NULL, '2022-02-16 04:11:35', '2022-02-16 04:11:35'),
(94, 5, 3, 'asdsada', NULL, '2022-02-16 04:15:20', '2022-02-16 04:15:20'),
(95, 5, 1, 'asdasd', NULL, '2022-02-16 04:16:10', '2022-02-16 04:16:10'),
(96, 5, 5, 'asdasd', NULL, '2022-02-16 04:16:21', '2022-02-16 04:16:21'),
(97, 5, 5, 'ini 8', NULL, '2022-02-16 04:16:29', '2022-02-16 04:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `userId`, `roomId`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2022-02-15 14:15:27', '2022-02-13 04:19:24'),
(2, 5, 3, '2022-02-15 07:50:32', '2022-02-15 07:50:32'),
(3, 5, 5, '2022-02-15 07:50:36', '2022-02-15 07:50:36'),
(4, 8, 2, '2022-02-15 07:50:54', '2022-02-15 07:50:54'),
(5, 8, 4, '2022-02-15 07:50:57', '2022-02-15 07:50:57');

-- --------------------------------------------------------

--
-- Stand-in structure for view `participantsviews`
-- (See below for the actual view)
--
CREATE TABLE `participantsviews` (
`room_id` int(11)
,`room_name` varchar(255)
,`user_id` bigint(20) unsigned
,`username` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 5, 'token-auth', 'f882fbd593274084e5d6284da8e5d7a777380a9a234cd4435eb377a27d096596', '[\"*\"]', NULL, '2022-02-13 05:27:45', '2022-02-13 05:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'grup', '2022-02-13 04:17:08', '2022-02-13 04:17:08'),
(2, 'baru', '2022-02-15 07:49:53', '2022-02-15 07:49:53'),
(3, 'baru s', '2022-02-15 07:49:57', '2022-02-15 07:49:57'),
(4, 'baru 23s', '2022-02-15 07:50:00', '2022-02-15 07:50:00'),
(5, 'baru123 23s', '2022-02-15 07:50:02', '2022-02-15 07:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `usercontacts`
--

CREATE TABLE `usercontacts` (
  `id` int(11) NOT NULL,
  `saver` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercontacts`
--

INSERT INTO `usercontacts` (`id`, `saver`, `contact_id`, `created_at`, `updated_at`) VALUES
(3, 3, 4, '2022-02-14 12:26:19', '2022-02-13 00:14:55'),
(4, 0, 0, '2022-02-13 00:17:40', '2022-02-13 00:17:40'),
(45, 6, 56, '2022-02-14 12:26:24', '2022-02-13 00:28:41'),
(46, 5, 6, '2022-02-14 05:31:07', '2022-02-14 05:31:07'),
(47, 5, 7, '2022-02-14 05:31:15', '2022-02-14 05:31:15'),
(48, 5, 8, '2022-02-14 05:31:18', '2022-02-14 05:31:18'),
(49, 5, 9, '2022-02-14 05:31:21', '2022-02-14 05:31:21'),
(50, 5, 10, '2022-02-14 05:31:25', '2022-02-14 05:31:25'),
(51, 2, 2, '2022-02-14 05:31:30', '2022-02-14 05:31:30'),
(52, 2, 3, '2022-02-14 05:31:33', '2022-02-14 05:31:33'),
(53, 2, 4, '2022-02-14 05:31:35', '2022-02-14 05:31:35'),
(54, 2, 5, '2022-02-14 05:31:38', '2022-02-14 05:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT 'storage/files/default.jpeg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `device_id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `file`, `created_at`, `updated_at`) VALUES
(5, '', 'user1', 'user1', NULL, '$2y$10$kAy4kO/SE1b1dTbnHFz9/./njLrkXUsxIBU2AomLg9IPrLc8bblsa', 'XE8mCWI3lo9IMfC09s8EcETBZzLwOiULHWHCpN6aIyxJtZAQASU43TPwvRNA', 'storage/files/rmKt2IOXVLV060oRAPXOHOkvo40Qbf0DwzyIyEf4.png', '2022-02-12 18:03:10', '2022-02-12 18:03:10'),
(8, '5', '1', 'asdasdas', NULL, '$2y$10$h3EyQcqii28zwiQTJqRDTOuAMLbkTUtA/JAMZPBsoJLm5rCipJXGC', 'IeHbPxPONvbxjxVAM3oVo9FHG7gSKTlFEoIHlbaHW1tPOMLeNTaoyOrHTtBO', 'storage/files/default.jpeg', '2022-02-14 04:08:17', '2022-02-14 04:08:17'),
(10, 'sds', 'user21', 'user231', NULL, '$2y$10$c7q/iQC/FV5YfJhbghKWYe6ZmgqcrJuxCAI6Ri2G/gqx8BcrpIufW', 'oRtn8c9wlqYY3g3axjbsnxSrheW0reT0iYxpdYymf70dyJAwJJscMKT8iskj', NULL, '2022-02-15 06:50:55', '2022-02-15 06:50:55'),
(14, 'sdsss', 'user221', 'user23as1s', NULL, '$2y$10$a9Oe5XUKF..50eTK150qRObU3kipnreybgg7f7DQJqV9al/w3Tw7q', 'q1G06wfLwIDVaBXDqDBBMaGWSETXOTsd4y9zHCdOfTGJkYq2TRvidQxdA9ko', 'sdfsd.png', '2022-02-15 06:51:30', '2022-02-15 06:51:30'),
(15, 'sdssasdasds', 'useasdasdr221', 'userasdasd23as1s', NULL, '$2y$10$UChJHYuwJZ5lnhU0I5otBOOMcJPjn6at.QYgt1LsN3FACZw60f8qe', '05cB6v68C7u4z2n8xjXKD8GULzd9OgtDhGid1MYmRaqzC1hwNeUbyC4e9lw8', NULL, '2022-02-15 06:57:14', '2022-02-15 06:57:14'),
(16, 'sdsxcsasdasds', 'useasxcxdasdr221', 'userasdasxcxcd23as1s', NULL, '$2y$10$fWNPL.7tnSw4BDYTE66uX.ahI41dTJptLovonXY5chfa0v4KiqD.y', 'CDbshX9hLBJhxt8iww8RozDg9azflsP2ur8EKGRPWzpRNobpKLHXe95jgOP0', NULL, '2022-02-15 06:57:39', '2022-02-15 06:57:39'),
(18, 'ini baru asw', 'baru banget', 'userasdasasdsdsdxcxcd23as1s', NULL, '$2y$10$JWWEcVh4WcjnN4wNsniB3e73.4Lmj2YqWyPcDI9ljSOsbXy5SHpQa', 'P9X9AWrApy9T5NggbgL2BYIpiBymdhrFwPCDHUg272Fl6IKxO9SdhZ8ZsRcX', NULL, '2022-02-15 06:59:58', '2022-02-15 06:59:58'),
(19, '4', NULL, '2', NULL, '$2y$10$BYNoF9HSS7h1UcIf8YXjBexH4qJuYQkVI1b3dou1.LVewIXncmlyy', 'Sseoe1WmHMfhqAZOWd0gazlYNapWaLKmve3cpGMio6ir3JEGY2vsqJaZ8fxu', NULL, '2022-02-15 15:52:12', '2022-02-15 15:52:12'),
(22, '432', NULL, '22', NULL, '$2y$10$XbNFUvIyXewZ2u9j6CkZKueVrvxTcB/So4BFqz6hmX5pMWXYBrdKu', 'I0nVenBPOaQXaLA0qMRjRZO6jrOsZCU9yhB1H4Hb1OofWa48Aqg0SdNlBbmZ', 'storage/files/o0nlHitsw0aCArprMk8YufRk73iVTEBnfrgegIEw.png', '2022-02-15 15:52:42', '2022-02-15 15:52:42'),
(24, '43223', NULL, '2243', NULL, '$2y$10$vAwnzuiGLwvKODWj.VELwuALezIKPFatjqIFA8YL1/1yg6iD3ibaa', 'HpttBQApz9yef3dsUdufcumuuujmgWmENInUDnIrzj9fJXj75c1cl21UVAoj', 'storage/files/onQm7MXjAI4BT7tXAavD7laED3u19wHXfH1rngBy.png', '2022-02-15 15:56:12', '2022-02-15 15:56:12');

-- --------------------------------------------------------

--
-- Structure for view `conversationviews`
--
DROP TABLE IF EXISTS `conversationviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `conversationviews`  AS SELECT `rooms`.`id` AS `room_id`, `rooms`.`name` AS `room_name`, `users`.`username` AS `username`, `users`.`file` AS `avatar`, `messages`.`userId` AS `user_id`, `messages`.`id` AS `messages_id`, `messages`.`message` AS `messages`, `messages`.`file` AS `file`, `messages`.`created_at` AS `created_at` FROM ((`messages` join `rooms` on(`messages`.`roomId` = `rooms`.`id`)) join `users` on(`messages`.`userId` = `users`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `participantsviews`
--
DROP TABLE IF EXISTS `participantsviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `participantsviews`  AS SELECT `rooms`.`id` AS `room_id`, `rooms`.`name` AS `room_name`, `users`.`id` AS `user_id`, `users`.`username` AS `username` FROM ((`participants` join `rooms` on(`participants`.`roomId` = `rooms`.`id`)) join `users` on(`participants`.`userId` = `users`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deletedmessages`
--
ALTER TABLE `deletedmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercontacts`
--
ALTER TABLE `usercontacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_usercontacts` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `device_id` (`device_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usercontacts`
--
ALTER TABLE `usercontacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
