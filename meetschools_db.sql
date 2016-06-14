-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2016 at 10:40 AM
-- Server version: 5.7.12-0ubuntu1
-- PHP Version: 7.0.4-7ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meetschools`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrative_area_levels_1`
--

CREATE TABLE `administrative_area_levels_1` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 00:00:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `administrative_area_levels_2`
--

CREATE TABLE `administrative_area_levels_2` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `country_code` varchar(5) DEFAULT NULL,
  `phone_primary` varchar(12) DEFAULT NULL,
  `unique_key` varchar(36) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 00:00:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `last_updated_at`) VALUES
(1, 'delhi', '2000-01-01 05:30:00', '2016-06-08 14:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 00:00:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `localities`
--

CREATE TABLE `localities` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `sublocality_level_2_id` int(11) DEFAULT NULL,
  `sublocality_level_1_id` int(11) DEFAULT NULL,
  `locality_id` int(11) DEFAULT NULL,
  `administrative_area_level_2_id` int(11) DEFAULT NULL,
  `administrative_area_level_1_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `code` varchar(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `zone_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `code`, `url`, `name`, `views`, `zone_id`, `city_id`, `district_id`, `state_id`, `created_at`, `last_updated_at`) VALUES
(1, '', 'abc', 'def', 0, 1, NULL, 0, NULL, '2016-06-05 05:13:22', '2016-06-11 14:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `schools_boards`
--

CREATE TABLE `schools_boards` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schools_students`
--

CREATE TABLE `schools_students` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `start_year` int(4) DEFAULT NULL,
  `end_year` int(4) DEFAULT NULL,
  `on_going` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_contactinfo`
--

CREATE TABLE `school_contactinfo` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `address` varchar(5000) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `email_2` varchar(256) DEFAULT NULL,
  `country_code` varchar(5) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `country_code_2` varchar(5) DEFAULT NULL,
  `phone_2` varchar(15) DEFAULT NULL,
  `website` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_infrastructure`
--

CREATE TABLE `school_infrastructure` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `swimming_pool` tinyint(1) DEFAULT '0',
  `dance_room` tinyint(1) DEFAULT '0',
  `gym` tinyint(1) DEFAULT '0',
  `music_room` tinyint(1) DEFAULT '0',
  `hostel` tinyint(1) DEFAULT '0',
  `medical_facility` tinyint(1) DEFAULT '0',
  `indoor_games` tinyint(1) DEFAULT '0',
  `computer_aided_learning` tinyint(1) DEFAULT '0',
  `library` tinyint(1) DEFAULT '0',
  `playground` tinyint(1) DEFAULT '0',
  `ramps` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_social_profiles`
--

CREATE TABLE `school_social_profiles` (
  `id` int(11) NOT NULL,
  `social_profile_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social_profiles`
--

CREATE TABLE `social_profiles` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `salutation` enum('mr','mrs','ms','dr') DEFAULT NULL,
  `unique_key` varchar(36) DEFAULT NULL,
  `phone_primary` varchar(12) DEFAULT NULL,
  `country_code` varchar(5) DEFAULT '+91',
  `utm_source` varchar(256) DEFAULT NULL,
  `utm_medium` varchar(256) DEFAULT NULL,
  `utm_campaign` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '1999-12-31 18:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `first_name`, `last_name`, `salutation`, `unique_key`, `phone_primary`, `country_code`, `utm_source`, `utm_medium`, `utm_campaign`, `created_at`, `last_updated_at`) VALUES
(1, 1, 'Ankur', 'Jain', 'mr', 'test', '9717247177', '+91', NULL, NULL, NULL, '1999-12-31 18:30:00', '2016-06-11 21:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `sublocality_levels_1`
--

CREATE TABLE `sublocality_levels_1` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sublocality_levels_2`
--

CREATE TABLE `sublocality_levels_2` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `status` enum('unconfirmed','active','unsubscribed','inactive','workshop','workshop_subscription') NOT NULL,
  `unique_key` varchar(36) DEFAULT NULL,
  `utm_source` varchar(256) DEFAULT NULL,
  `utm_medium` varchar(512) DEFAULT NULL,
  `utm_campaign` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '1999-12-31 18:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `type` enum('student','admin','user','school') NOT NULL,
  `status` enum('unregistered','unconfirmed','active','inactive','blocked') DEFAULT 'unregistered',
  `unique_key` varchar(36) DEFAULT NULL,
  `last_seen_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '1999-12-31 18:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `status`, `unique_key`, `last_seen_at`, `last_login_at`, `created_at`, `last_updated_at`) VALUES
(1, 'ankur_jain33@live.com', 'test', 'student', 'active', 'test', NULL, NULL, '1999-12-31 18:30:00', '2016-06-11 21:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2000-01-01 05:30:00',
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`, `created_at`, `last_updated_at`) VALUES
(1, 'test', '2000-01-01 05:30:00', '2016-06-11 14:02:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrative_area_levels_1`
--
ALTER TABLE `administrative_area_levels_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrative_area_levels_2`
--
ALTER TABLE `administrative_area_levels_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UniqueField` (`name`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `localities`
--
ALTER TABLE `localities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UniqueField` (`name`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_locality_id` (`sublocality_level_1_id`),
  ADD KEY `locality_id` (`locality_id`),
  ADD KEY `city_id` (`administrative_area_level_2_id`),
  ADD KEY `state_id` (`administrative_area_level_1_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `sublocality_level_2_id` (`sublocality_level_2_id`),
  ADD KEY `sublocality_level_2_id_2` (`sublocality_level_2_id`),
  ADD KEY `sublocality_level_1_id` (`sublocality_level_1_id`),
  ADD KEY `locality_id_2` (`locality_id`),
  ADD KEY `administrative_area_level_2_id` (`administrative_area_level_2_id`),
  ADD KEY `administrative_area_level_1_id` (`administrative_area_level_1_id`),
  ADD KEY `country_id_2` (`country_id`),
  ADD KEY `country_id_3` (`country_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locality_id` (`zone_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `schools_boards`
--
ALTER TABLE `schools_boards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `board_id` (`board_id`);

--
-- Indexes for table `schools_students`
--
ALTER TABLE `schools_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `school_contactinfo`
--
ALTER TABLE `school_contactinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `school_infrastructure`
--
ALTER TABLE `school_infrastructure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `school_social_profiles`
--
ALTER TABLE `school_social_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_profile_id` (`social_profile_id`);

--
-- Indexes for table `social_profiles`
--
ALTER TABLE `social_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UniqueField` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_user_id_uq` (`user_id`),
  ADD UNIQUE KEY `students_unique_key_uq` (`unique_key`);

--
-- Indexes for table `sublocality_levels_1`
--
ALTER TABLE `sublocality_levels_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sublocality_levels_2`
--
ALTER TABLE `sublocality_levels_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `subscribers_status_idx` (`status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_uq` (`email`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UniqueField` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrative_area_levels_1`
--
ALTER TABLE `administrative_area_levels_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `administrative_area_levels_2`
--
ALTER TABLE `administrative_area_levels_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `localities`
--
ALTER TABLE `localities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schools_boards`
--
ALTER TABLE `schools_boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schools_students`
--
ALTER TABLE `schools_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school_contactinfo`
--
ALTER TABLE `school_contactinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school_infrastructure`
--
ALTER TABLE `school_infrastructure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school_social_profiles`
--
ALTER TABLE `school_social_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social_profiles`
--
ALTER TABLE `social_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sublocality_levels_1`
--
ALTER TABLE `sublocality_levels_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sublocality_levels_2`
--
ALTER TABLE `sublocality_levels_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`sublocality_level_2_id`) REFERENCES `sublocality_levels_2` (`id`),
  ADD CONSTRAINT `locations_ibfk_2` FOREIGN KEY (`sublocality_level_1_id`) REFERENCES `sublocality_levels_1` (`id`),
  ADD CONSTRAINT `locations_ibfk_3` FOREIGN KEY (`locality_id`) REFERENCES `localities` (`id`),
  ADD CONSTRAINT `locations_ibfk_4` FOREIGN KEY (`administrative_area_level_2_id`) REFERENCES `administrative_area_levels_2` (`id`),
  ADD CONSTRAINT `locations_ibfk_5` FOREIGN KEY (`administrative_area_level_1_id`) REFERENCES `administrative_area_levels_1` (`id`),
  ADD CONSTRAINT `locations_ibfk_6` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`),
  ADD CONSTRAINT `schools_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `schools_ibfk_3` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `schools_boards`
--
ALTER TABLE `schools_boards`
  ADD CONSTRAINT `schools_boards_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `schools_boards_ibfk_2` FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`);

--
-- Constraints for table `schools_students`
--
ALTER TABLE `schools_students`
  ADD CONSTRAINT `schools_students_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `schools_students_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `school_contactinfo`
--
ALTER TABLE `school_contactinfo`
  ADD CONSTRAINT `school_contactinfo_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `school_infrastructure`
--
ALTER TABLE `school_infrastructure`
  ADD CONSTRAINT `school_infrastructure_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `school_social_profiles`
--
ALTER TABLE `school_social_profiles`
  ADD CONSTRAINT `school_social_profiles_ibfk_1` FOREIGN KEY (`social_profile_id`) REFERENCES `social_profiles` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `subscribers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `subscribers_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
