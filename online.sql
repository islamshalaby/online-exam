-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2021 at 12:48 PM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.34-16+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `stu_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `given_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `true_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `stu_id`, `question`, `given_answer`, `true_answer`, `created_at`, `updated_at`) VALUES
(110, 67, 'test1', 'a2', 'a4', '2021-06-12 16:30:17', '2021-06-12 16:30:17'),
(111, 67, 'test2', 'b1', 'b2', '2021-06-12 16:30:20', '2021-06-12 16:30:20'),
(119, 79, 'test1', '4', '4', '2021-06-12 17:36:39', '2021-06-12 17:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `examinfos`
--

CREATE TABLE `examinfos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `Teacher_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_lenth` int(11) NOT NULL,
  `uniqueid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) DEFAULT NULL,
  `score` double DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `exam_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examinfos`
--

INSERT INTO `examinfos` (`id`, `user_id`, `Teacher_id`, `Course`, `question_lenth`, `uniqueid`, `time`, `level`, `score`, `type`, `exam_id`, `created_at`, `updated_at`) VALUES
(9, 0, '8', 'Math', 2, 'GCvm1', '1', 1, 25, 1, 0, '2021-06-14 17:13:42', '2021-06-14 17:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(10) UNSIGNED NOT NULL,
  `speciality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2012_07_15_201117_create_types_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2017_11_28_175416_create_examinfos_table', 1),
(5, '2017_12_01_182704_create_questions_table', 1),
(6, '2017_12_04_200618_create_students_table', 1),
(7, '2017_12_04_200730_create_answers_table', 1),
(8, '2020_07_15_210023_add_types_to_users', 1),
(9, '2020_07_26_134543_create_subjects_table', 2),
(10, '2020_07_26_135215_create_professors_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`, `created_at`, `updated_at`) VALUES
(16, 9, 'test1', '1', '2', '3', '4', '3', '2021-06-14 17:14:14', '2021-06-14 17:14:14'),
(17, 9, 'test2', '1', '2', '3', '4', '2', '2021-06-14 17:14:27', '2021-06-14 17:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `uniqueid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) DEFAULT NULL,
  `test_score` double NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `uniqueid`, `score`, `test_score`, `status`, `created_at`, `updated_at`) VALUES
(67, 9, 'RFaCI', 4, 0, 0, '2021-06-12 15:52:14', '2021-06-12 17:12:17'),
(68, 8, 'HYhFW', 0, 0, 0, '2021-06-12 16:19:37', '2021-06-12 16:19:37'),
(69, 8, 'RFaCI', 0, 0, 0, '2021-06-12 16:19:45', '2021-06-12 16:19:45'),
(70, 9, 'NzTia', 0, 0, 0, '2021-06-12 16:30:12', '2021-06-12 16:30:12'),
(79, 9, 'ndrNF', 1, 0, 0, '2021-06-12 17:36:37', '2021-06-12 17:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-07-26 12:24:41', '2020-07-26 12:24:41'),
(2, 'student', '2020-07-26 12:25:00', '2020-07-26 12:25:00'),
(3, 'professor', '2020-07-26 12:25:24', '2020-07-26 12:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `birthdate`, `phone`, `type_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Aria', 'admin@admin.com', '$2y$10$XvqwmNIur7x8Dk0dt/q0QudGIrooFm9L8dhepywUL4.nlXcSs/uTC', '1975-11-10', '014569825', 1, 'JJGkpHJCnYFHjEMezC7OSvN4Cin3WvXSUBuRHIyKp00dvHAiyBYJnj83PmKM', '2020-07-26 10:38:54', '2020-07-26 10:38:54'),
(5, 'Mag', 'mag@me.com', '$2y$10$XvqwmNIur7x8Dk0dt/q0QudGIrooFm9L8dhepywUL4.nlXcSs/uTC', '2000-12-12', '01478569', 3, 'JbWyeNkiGUQ0QeiRAMiFZc9rXBr8nC1TpqhdVyOFY9in9CwexwmaTioBmI7O', '2020-07-26 10:39:30', '2020-07-26 17:29:49'),
(6, 'student', 'stud@me.com', '$2y$10$IzjaUM.TefNVtixBicuoCezstlsnn9i/JsMJp0zlpEAU.9kpjVCSu', '1999-12-05', '012569', 2, 'UUHd4MECJ36P53ST6aZGCUJPIaBk2GVLQS9JhcDLvl2cl94q0nbqQBwCpveu', '2020-07-26 16:17:54', '2020-07-26 16:17:54'),
(8, 'islam', 'islamshalby510@gmail.com', '$2y$10$sc12eITA5wlns2l7wKDoh.EYFTFh0hR2StmTgea45TnXgV1EgOkaa', '1990-07-22', '01142849437', 3, 'dz42IWjLIzosogUulkLHRT6KlRTuWJ39RWD1vwnJmuXiJ4DxPFsSQXS1ISFp', '2020-08-12 14:25:51', '2020-08-12 14:25:51'),
(9, 'Islam shalaby', 'islamshalaby63@yahoo.com', '$2y$10$sc12eITA5wlns2l7wKDoh.EYFTFh0hR2StmTgea45TnXgV1EgOkaa', '1990-07-22', '01142849437', 2, 'ukEkkfplG9nrjc2S4LLQhkrTCKVPl53BLl9ZF2ZzXuyKuhyzaAsySrfZ3F9F', '2020-08-14 22:05:30', '2020-08-14 22:05:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_stu_id_foreign` (`stu_id`);

--
-- Indexes for table `examinfos`
--
ALTER TABLE `examinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_type_id_foreign` (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `examinfos`
--
ALTER TABLE `examinfos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_stu_id_foreign` FOREIGN KEY (`stu_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `examinfos` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
