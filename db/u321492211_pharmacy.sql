-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2024 at 06:03 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u321492211_pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin_tinigkalinga@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `ads_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tagline` varchar(200) NOT NULL,
  `bio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`ads_id`, `name`, `image`, `address`, `tagline`, `bio`) VALUES
(4, 'LOSARTAN ', 'losartan.jpg', 'Sample Address', 'Angiotensin Receptor Blocker', 'Sample'),
(5, 'TEST AD', 'watch.jpg', 'TESTAD', 'TESTAD', 'TESTAD'),
(6, 'Sample Ads', 'FDA-Web-Logo-150x150-1.png', 'Sample Address', 'Sample Tagline', 'Sample Bio'),
(8, 'Diclofenac', 'diclofenac.jpg', 'Sanomed Pharmacy', 'Ang gamot para sa arthritis', 'Diclofenac is a nonsteroidal anti-inflammatory drug (NSAID) used to treat mild-to-moderate pain, and helps to relieve symptoms of arthritis');

-- --------------------------------------------------------

--
-- Table structure for table `authorization`
--

CREATE TABLE `authorization` (
  `auth_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `auth_name` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `control_number` varchar(100) NOT NULL,
  `email_auth` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `qrcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authorization`
--

INSERT INTO `authorization` (`auth_id`, `user_id`, `auth_name`, `first_name`, `last_name`, `contact_no`, `control_number`, `email_auth`, `email`, `relationship`, `qrcode`) VALUES
(11, 0, '', 'Rovic', 'Bhambhani', '2147483647', '0', '', 'ravlauren5@gmail.com', 'Sibling', ''),
(12, 0, '', 'Cath', 'Omana', '2147483647', '0', '', 'karyllenicolea@gmail.com', 'Cousin', ''),
(14, 0, '', 'Geneva', 'Florendo', '2147483647', '0', '', 'florendorixxa@gmail.com', 'Parent', ''),
(15, 0, '', 'Karylle', 'Abante', '2147483647', '0', '', 'krsabante@gmail.com', 'Guardian', ''),
(16, 0, '', 'Geneva', 'Florendo', '2147483647', '0', '', 'rixxa.geleine.florendo@adamson.edu.ph', 'Parent', ''),
(17, 0, '', 'Rovic', 'Bhambhani', '2147483647', '0', '', 'raver.lauren.bhambhani@gmail.com', 'Sibling', ''),
(18, 0, '', 'Raver', 'Bhambhani', '2147483647', '0', '', 'karylle.nicole.abante@adamson.edu.ph', 'Guardian', ''),
(19, 0, '', 'Karylle', 'Abante', '2147483647', '0', '', 'raverb@gmail.com', 'Daughter', ''),
(20, 0, '', 'Cath', 'Omana', '2147483647', '0', '', 'memoriesbunk@gmail.com', 'Uncle', ''),
(22, 0, '', 'Justine', 'Vista', '2147483647', '0', '', 'abante.romeo11@gmail.com', 'Guardian', ''),
(23, 59, '', 'Karylle', 'Abante', '2147483647', '0', '', 'rixxaflorendo@gmail.com', 'Aunt', ''),
(24, 60, '', 'Jade', 'Dacoroon', '2147483647', '0', '', 'jadedacoroon27@gmail.com', 'Daughter', ''),
(25, 62, '', 'Karylle', 'Abante', '2147483647', '0', '', 'romeoabante1110@gmail.com', 'Daughter', ''),
(26, 67, 'Kakaka', '', '', '2147483647', '0', 'Baba@gmail.com', 'aaaa@gmail.com', 'Guardian', 'temp/qr_8e58d92b001a423a7758cfe4533c205a.png'),
(28, 70, 'Rosie Lim', 'Corazon', 'Bautista', '2147483647', '', 'rlim@gmail.com', 'pinkpantherrrr1@gmail.com', 'Aunt', 'temp/qr_8e8a3dc3ca2bde2c2d09db1fe28ca978.png'),
(29, 70, 'Rosie Lim', 'Corazon', 'Bautista', '2147483647', '', 'rlim@gmail.com', 'admin_tinigkalinga@gmail.com', 'Aunt', 'temp/qr_8e8a3dc3ca2bde2c2d09db1fe28ca978.png'),
(30, 73, 'Karylle Abante', 'Karylle Nicole', 'Abante', '2147483647', '', 'sanantoniocarlvennice@gmail.com', 'sanantoniocarlvennice@gmail.com', 'Daughter', 'temp/qr_6b9b381f3867fe0e61cef4cfc7bf682a.png'),
(31, 74, 'Karylle Abante', 'Cath', 'Omana', '2147483647', '', 'craomanaa@gmail.com', 'craomanaa@gmail.com', 'Parent', 'temp/qr_e111561c741b745c3b44441f87053cee.png'),
(36, 80, 'sample', 'Raver', 'Bhambhani', '+639616940400', '', 'ravlauren5@gmail.com', 'ravlauren5@gmail.com', 'Cousin', 'temp/qr_643a907ba1230153162abcdb7a12b3c6.png'),
(37, 81, 'sample auth rep name', 'FirstName', 'LastName', '+639616940400', '', 'sample12345@gmail.com', 'sample12345@gmail.com', 'Grandchildren', 'temp/qr_5ac1cfefda984a686be349d05719b32f.png'),
(38, 82, 'Karylle Abante', 'sample', 'sample', '+639531434791', '', 'abante@gmail.com', 'abante@gmail.com', 'Grandchildren', 'temp/qr_d6de5ca1b83da1a97004988b5df3f079.png'),
(39, 83, 'sample', 'sample', 'sample', '+639913446999', '', 'sampple@gmail.com', 'sampple@gmail.com', 'Aunt', 'temp/qr_25f8ee7700576f047123a1c7a28fd4f6.png'),
(40, 84, 'TEST AR', 'Test1', 'Test2', '+639616940400', '', 'testemail@gmail.com', 'testemail@gmail.com', 'Nephew', 'temp/qr_b156f1ae0cb3ee6407a3f209f741720d.png'),
(41, 85, 'Karylle Abante', 'Emerlina', 'Interino', '+639052430587', '', 'nicole@gmail.com', 'nicole@gmail.com', 'Aunt', 'temp/qr_0c4ad336c2fbf2668b784ece98b01599.png'),
(42, 86, 'Karylle Abante', 'Aidan', 'Tucaling', '+639123456789', '', 'karylle.nicole.abante@adamson.edu.ph', 'karylle.nicole.abante@adamson.edu.ph', 'Nephew', 'temp/qr_89489a06188a4bee13f078c0b2a58cdd.png'),
(43, 87, 'Karylle Abante', 'Emerlina', 'Interino', '+639052430587', '', 'memoriesbunk@gmail.com', 'memoriesbunk@gmail.com', 'Aunt', 'temp/qr_a25bd8440fb5248997875324b72acda6.png'),
(44, 88, 'Authorized Representative', 'Raver', 'Bhambhani', '+639616940400', '', 'testingmail@gmail.com', 'testingmail@gmail.com', 'Nephew', 'temp/qr_fa210c1570f8d28d126641612fa8742a.png'),
(45, 89, 'Karylle Abante', 'Karylle', 'Abante', '+639531434791', '', 'romeo@gmail.com', 'romeo@gmail.com', 'Aunt', 'temp/qr_7bce6d87744ccc8b55cf827d9bf4454c.png'),
(46, 90, 'Rixxa Geleine Florendo', 'Kara', 'Manlosa', '+639273660213', '', 'karamanlosa0@gmail.com', 'karamanlosa0@gmail.com', 'Cousin', 'temp/qr_6d1efcfac0a8ab72a318b26c1460a3f1.png'),
(47, 92, 'srawewea', 'test', 'test', '+639616940400', '', 'emailemail@gmail.com', 'emailemail@gmail.com', 'Nephew', 'temp/qr_bcc23e3924293b350b2f6274f11787a9.png'),
(48, 93, 'Sample Authorized', 'vassillisaandre', 'andrade', '+639179745328', '', 'testing@gmail.com', 'testing@gmail.com', 'Parent', 'temp/qr_166edca3a201467bc391aa00fa7f5b05.png'),
(49, 91, 'mariz', 'cheryl mariz', 'diaz', '+639569776904', '', 'teredizon56@gmail.com', 'teredizon56@gmail.com', 'Guardian', 'temp/qr_f3cc0a2637522ff47bd3593c4fbc6066.png'),
(50, 94, 'Sample Authorized', 'vassillisaandre', 'andrade', '+639179745328', '', 'raverb23@gmail.com', 'raverb23@gmail.com', 'Parent', 'temp/qr_7a5c48e4801e00a94eb71e814563f12b.png'),
(51, 95, 'Sample Authorized', 'vassillisaandre', 'andrade', '+635674765474', '', 'raverb234@gmail.com', 'raverb234@gmail.com', 'Parent', 'temp/qr_d81afa56ee9d9ecf3f5d87771ce7131f.png'),
(52, 101, 'Mariz Diaz', 'Alpin', 'Aguillon', '+639457736924', '', 'pinkpantherrrr1@gmail.com', 'pinkpantherrrr1@gmail.com', 'Aunt', 'temp/qr_d957f3ff4015b2885ec6c4b060b5b7d4.png'),
(53, 103, 'testrep', 'fname', 'lname', '+639616940400', '', 'testemail@gmail.com', 'testemail@gmail.com', 'Uncle', 'temp/qr_df45e92e12c5d6356d877cc344069568.png'),
(54, 104, 'sample', 'Karylle', 'Abante', '+639616940400', '', 'karyllenicolea@gmail.com', 'karyllenicolea@gmail.com', 'Nephew', 'temp/qr_461b719c9b73a09ad6b234d7871cc9c7.png'),
(55, 105, 'Karylle Abante', 'sample', 'San Antonio', '+639616940400', '', 'karylle@gmail.com', 'karylle@gmail.com', 'Uncle', 'temp/qr_89100c5ec827c99b86737add111aec5a.png'),
(56, 106, 'ARsample', 'Raver', 'Bhambhani', '+639616940400', '', 'raverb23@gmail.com', 'raverb23@gmail.com', 'Uncle', 'temp/qr_b8937b700aad4f0412d0372b7f2e17f9.png'),
(57, 107, 'Auth name Jr.', 'Raver', 'Bhambhani', '+639616940400', '', 'emailraver@gmail.com', 'emailraver@gmail.com', 'Uncle', 'temp/qr_9fd8297fec97ccdeb3cf3919fcde7f0d.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `available_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `establishment`
--

CREATE TABLE `establishment` (
  `establishment_id` int(11) NOT NULL,
  `establishment_no` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_contact` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `establishment_name` varchar(50) NOT NULL,
  `tag_line` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `establishment_contact` varchar(50) NOT NULL,
  `website_link` varchar(50) NOT NULL,
  `bio` varchar(50) NOT NULL,
  `otp_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `establishment`
--

INSERT INTO `establishment` (`establishment_id`, `establishment_no`, `email`, `password`, `admin_name`, `admin_contact`, `admin_email`, `establishment_name`, `tag_line`, `location`, `category`, `establishment_contact`, `website_link`, `bio`, `otp_pass`) VALUES
(6, 554998, 'raverb23@gmail.com', '8605b9f31634f19c60ef66dc57251291b74b699e', 'Sample firstname', '123412412312', 'raverb23@gmail.com', ' Sanomed', 'Sample tagline', 'San Pedro Laguna', 'Pharmacy', '1241231231231', 'www.sampleweb.com', 'sample bio', 0),
(10, 610888, 'raver.lauren.bhambhani@gmail.com', '8605b9f31634f19c60ef66dc57251291b74b699e', 'Raver', '639616940400', 'raver.lauren.bhambhani@gmail.com', ' Sample Estab Name', 'Sample', 'San Pedro Laguna', 'Pharmacy', '6367893834425', 'www.samplewebsite.com', 'sample bio', 0),
(11, 481709, 'karyllenicolea@gmail.com', '2b4d7896eab6344048b2b8c36f088e07f7205a3c', 'Karylle Nicole Abante', '09531434791', 'karyllenicolea@gmail.com', ' Barubal', 'everyday barubal', 'San Pedro Laguna', 'Pharmacy', '09531434791', 'barubal.com', 'everyday barubal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `medicine_photo` varchar(100) NOT NULL,
  `approval` varchar(250) NOT NULL,
  `notification_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `prescription_id`, `user_id`, `email`, `contact_no`, `first_name`, `last_name`, `middle_name`, `medicine_photo`, `approval`, `notification_date`) VALUES
(1, 30, 79, 'raverb23@gmail.com', '0', 'Raver', 'Bhambhani', '', 'sanomed.jpg', '0', '2024-11-21 16:28:07'),
(2, 31, 69, 'karyllenicolea@gmail.com', '0', 'Karylle', 'Abante', 'Aldenese', '44ed675e-a696-402b-bba2-912f07c53688.jpg', '○ Your request for prescriptions has been <b>Approved</b>,<i> please bring your prescriptions</i> and visit to our nearest store!', '2024-11-21 16:28:07'),
(3, 33, 79, 'raverb23@gmail.com', '0', 'Raver', 'Bhambhani', '', 'sampledigsignature.jpg', '○ Your request for prescriptions has been <b>Approved</b>,<i> please bring your prescriptions</i> and visit our store!', '2024-11-22 14:28:48'),
(4, 36, 87, 'memoriesbunk@gmail.com', '0', 'Emerlina', 'Interino', '', 'prescription.jpg', '○ Your request for prescriptions has been <b>Approved</b>,<i> please bring your prescriptions</i> and visit our store!', '2024-11-23 23:16:50'),
(5, 25, 67, 'aaaa@gmail.com', '0', 'Habibi', 'Akbar', 'Mike', '17308662465441362073267022942263.jpg', '○ Your request for prescriptions has been <b>Denied.</b>', '2024-11-23 23:53:01'),
(6, 38, 106, 'raverb23@gmail.com', '0', 'Raver', 'Bhambhani', '', 'norvatrol.jpg', '○ Your request for prescriptions has been <b>Approved</b>,<i> please bring your prescriptions</i> and visit our store!', '2024-11-23 23:56:11'),
(7, 37, 106, 'raverb23@gmail.com', '0', 'Raver', 'Bhambhani', '', 'diclofenac.jpg', '○ Your request for prescriptions has been <b>Approved</b>,<i> please bring your prescriptions</i> and visit our store!', '2024-11-23 23:56:15'),
(8, 39, 87, 'memoriesbunk@gmail.com', '0', 'Emerlina', 'Interino', '', 'prescription.jpg', '○ Your request for prescriptions has been <b>Denied.</b>', '2024-11-23 23:57:33'),
(9, 40, 90, 'karamanlosa0@gmail.com', '0', 'Kara Patrixia', 'Manlosa', '', 'prescription.jpg', '○ Your request for prescriptions has been <b>Approved</b>,<i> please bring your prescriptions</i> and visit our store!', '2024-11-24 01:23:26'),
(10, 35, 80, 'ravlauren5@gmail.com', '0', 'Raver', 'Bhambhani ', '', 'sampledigsignature.jpg', '○ Your request for prescriptions has been <b>Approved</b>,<i> please bring your prescriptions</i> and visit our store!', '2024-12-03 14:46:28'),
(11, 34, 80, 'ravlauren5@gmail.com', '0', 'Raver', 'Bhambhani ', '', 'sampledigsignature.jpg', '○ Your request for prescriptions has been <b>Approved</b>,<i> please bring your prescriptions</i> and visit our store!', '2024-12-05 15:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `flat` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `total_products` varchar(250) NOT NULL,
  `total_price` int(100) NOT NULL,
  `track_code` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_date` int(11) NOT NULL,
  `control_number` varchar(200) NOT NULL,
  `gcash_photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `contact_no`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`, `track_code`, `created_at`, `order_date`, `control_number`, `gcash_photo`) VALUES
(30, 0, 'Rixxa Geleine', '2147483647', 'florendorixxa@gmail.com', 'Cash', 'Laguna', 'Calendola', 'San Pedro', 'PWD', 'Female', 23, 'Eyemo (4) , Biogesic (3) , Robitusin (3) , Astepro', 268, 15267, '0000-00-00 00:00:00', 0, '0', ''),
(31, 0, 'Raver ', '2147483647', 'ravlauren5@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (4) , Biogesic (3) , Robitusin (3) , Astepro', 268, 38091, '0000-00-00 00:00:00', 0, '0', ''),
(32, 0, 'Raver ', '2147483647', 'ravlauren5@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (4) , Biogesic (3) , Robitusin (3) , Astepro', 268, 54776, '0000-00-00 00:00:00', 0, '0', ''),
(33, 0, 'Rixxa Geleine', '2147483647', 'florendorixxa@gmail.com', 'Digital (Gcash)', 'Laguna', 'San Pedro', 'San Pedro', 'PWD', 'Female', 23, 'Eyemo (4) , Biogesic (3) , Robitusin (3) , Astepro', 268, 55918, '0000-00-00 00:00:00', 0, '0', ''),
(34, 0, 'Karylle', '2147483647', 'krsabante@gmail.com', 'Cash', 'Laguna', 'Calendola', 'San Pedro', 'Senior Citizen', 'Female', 67, 'Eyemo (1) , Biogesic (1) , Robitusin (1) , Astepro', 76, 93488, '0000-00-00 00:00:00', 0, '0', ''),
(35, 0, 'Raver', '2147483647', 'raver.lauren.bhambhani@gmail.com', 'Cash', 'Laguna', 'Bagong Silang', 'San Pedro', 'PWD', 'Male', 29, 'Biogesic (1) ', 4, 45034, '0000-00-00 00:00:00', 0, '0', ''),
(36, 0, 'Raver ', '2147483647', 'ravlauren5@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (10) , Biogesic (10) ', 400, 30773, '0000-00-00 00:00:00', 0, '0', ''),
(37, 0, 'Raver ', '2147483647', 'ravlauren5@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (10) , Biogesic (10) ', 400, 79129, '0000-00-00 00:00:00', 0, '0', ''),
(38, 0, 'Karylle', '2147483647', 'memoriesbunk@gmail.com', 'Cash', 'Laguna', 'Nueva', 'San Pedro', 'PWD', 'Male', 1, 'Eyemo (1) , Biogesic (1) ', 40, 80217, '0000-00-00 00:00:00', 0, '0', ''),
(39, 0, 'Karylle', '2147483647', 'memoriesbunk@gmail.com', 'Cash', 'Laguna', 'Nueva', 'San Pedro', 'PWD', 'Male', 1, 'Eyemo (1) , Biogesic (1) ', 40, 94467, '0000-00-00 00:00:00', 0, '0', ''),
(40, 0, 'Karylle', '2147483647', 'memoriesbunk@gmail.com', 'Cash', 'Laguna', 'Nueva', 'San Pedro', 'PWD', 'Male', 1, 'Eyemo (1) , Biogesic (1) ', 40, 13287, '0000-00-00 00:00:00', 0, '0', ''),
(41, 55, 'Karylle', '2147483647', 'abante.romeo11@gmail.com', 'Cash', 'Laguna', 'Chrysanthemum', 'San Pedro', 'PWD', 'Female', 23, 'Biogesic (500) , Robitusin (500) , Astepro (1) ', 12012, 17414, '0000-00-00 00:00:00', 0, '0', ''),
(42, 59, 'Raver', '2147483647', 'rixxaflorendo@gmail.com', 'Digital (Gcash)', 'Laguna', 'GSIS', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (10) ', 360, 84883, '0000-00-00 00:00:00', 0, '0', ''),
(44, 60, 'Jade', '2147483647', 'jadedacoroon27@gmail.com', 'Cash', 'Laguna', 'Cuyab', 'San Pedro', 'Senior Citizen', 'Female', 91, 'Eyemo (1) , Sample drug (1) ', 116, 34102, '0000-00-00 00:00:00', 0, '0', ''),
(45, 64, 'Flordeluna', '2147483647', 'fmanlosa28@gmail.com', 'Digital (Gcash)', 'Laguna', 'Cuyab', 'San Pedro', 'PWD', 'Female', 44, 'Eyemo (2) , Biogesic (10) ', 112, 33766, '2024-11-05 07:47:17', 0, '0', ''),
(46, 67, 'Habibi', '2147483647', 'aaaa@gmail.com', 'Cash', 'Laguna', 'Bagong Silang', 'San Pedro', 'PWD', 'Prefer not to', 7, 'Eyemo (1) , Biogesic (1) , Robitusin (1) ', 60, 73379, '2024-11-06 04:10:35', 0, '0', ''),
(47, 67, 'Habibi', '2147483647', 'aaaa@gmail.com', 'Digital (Gcash)', 'Laguna', 'Bagong Silang', 'San Pedro', 'PWD', 'Prefer not to', 7, 'Ferrous Sulfate (1) , Biogesic (1) , Eyemo (1) , Sample drug (1) ', 356, 39507, '2024-11-06 04:20:00', 0, '0', ''),
(50, 65, 'Alpinia', '2147483647', 'pinkpantherrrr1@gmail.com', 'Cash', 'Laguna', 'Chrysanthemum', 'San Pedro', 'Senior Citizen', 'Female', 77, 'Eyemo (1) , Ferrous Sulfate (1) ', 272, 33491, '2024-11-10 11:47:36', 2024, '35151', ''),
(53, 72, 'Corazon', '2147483647', 'pinkpantherrrr1@gmail.com', 'Cash', 'Laguna', 'Magsaysay', 'San Pedro', 'Senior Citizen', 'Female', 79, 'Sample drug (1) ', 80, 79170, '2024-11-12 06:32:18', 2024, '2418', ''),
(54, 37, 'Rixxa Geleine', '2147483647', 'florendorixxa@gmail.com', 'Cash', 'Laguna', '', 'San Pedro', 'PWD', 'Female', 23, 'Sample drug (1) ', 80, 94116, '2024-11-12 10:36:08', 2024, '0', ''),
(56, 68, 'Czarina Lyn', '2147483647', 'czarinalynvb@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'Senior Citizen', 'Female', 64, 'Biogesic (2) , Tuseran Forte (1) ', 36, 26410, '2024-11-16 03:26:12', 2024, '43403', ''),
(57, 68, 'Czarina Lyn', '2147483647', 'czarinalynvb@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'Senior Citizen', 'Female', 64, 'Tuseran Forte (1) ', 20, 53892, '2024-11-16 03:27:13', 2024, '43403', ''),
(58, 68, 'Czarina Lyn', '2147483647', 'czarinalynvb@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'Senior Citizen', 'Female', 64, 'Tuseran Forte (1) ', 20, 35414, '2024-11-16 03:56:43', 2024, '43403', ''),
(60, 76, 'Raver', '2147483647', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Biogesic (1) ', 8, 35649, '2024-11-20 06:38:16', 2024, '12345', ''),
(61, 76, 'Raver', '2147483647', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Solmux (1) ', 16, 76801, '2024-11-20 07:02:34', 2024, '12345', ''),
(62, 76, 'Raver', '2147483647', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Tuseran Forte (1) ', 20, 24809, '2024-11-20 07:05:44', 2024, '12345', ''),
(63, 77, 'Raver', '2147483647', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Calendola', 'San Pedro', 'PWD', 'Male', 23, 'Biogesic (1) ', 8, 95421, '2024-11-21 07:54:21', 2024, '41231515123', ''),
(64, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Biogesic (1) ', 8, 27790, '2024-11-21 09:54:29', 2024, '12345', ''),
(66, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (4) ', 144, 93970, '2024-11-21 10:12:44', 2024, '12345', ''),
(67, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (1) ', 36, 29028, '2024-11-21 10:16:52', 2024, '12345', ''),
(68, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (1) ', 36, 79432, '2024-11-21 13:47:41', 2024, '12345', ''),
(69, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (1) ', 36, 74274, '2024-11-21 13:51:04', 2024, '12345', ''),
(71, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (1) ', 36, 52662, '2024-11-21 13:53:02', 2024, '12345', ''),
(72, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (1) ', 36, 42190, '2024-11-21 13:54:49', 2024, '12345', ''),
(81, 72, 'Corazon', '2147483647', 'pinkpantherrrr1@gmail.com', 'Cash', 'Laguna', 'Magsaysay', 'San Pedro', 'Senior Citizen', 'Female', 79, 'Solmux (1) , Biogesic (1) ', 24, 29582, '2024-11-22 14:59:50', 2024, '2418', ''),
(82, 72, 'Corazon', '2147483647', 'pinkpantherrrr1@gmail.com', 'Cash', 'Laguna', 'Magsaysay', 'San Pedro', 'Senior Citizen', 'Female', 79, 'Solmux (2) , Biogesic (4) , Eyemo (4) ', 208, 82654, '2024-11-22 15:04:52', 2024, '2418', ''),
(84, 80, 'Raver', '2147483647', 'ravlauren5@gmail.com', 'Cash', 'Laguna', 'Pacita 1', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (1) ', 36, 93435, '2024-11-22 15:09:00', 2024, '21341', ''),
(85, 80, 'Raver', '2147483647', 'ravlauren5@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 1', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (10) ', 360, 18880, '2024-11-22 15:10:13', 2024, '21341', ''),
(86, 80, 'Raver', '2147483647', 'ravlauren5@gmail.com', 'Cash', 'Laguna', 'Pacita 1', 'San Pedro', 'PWD', 'Male', 23, 'Eyemo (1) ', 36, 98934, '2024-11-22 15:12:17', 2024, '21341', ''),
(89, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'EyeMo (1) , Solmux (1) ', 52, 28916, '2024-11-22 18:29:02', 2024, '12345', ''),
(91, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'EyeMo (1) ', 36, 17842, '2024-11-22 18:35:08', 2024, '12345', ''),
(93, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'EyeMo (1) ', 36, 91478, '2024-11-22 18:45:46', 2024, '12345', ''),
(95, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'EyeMo (1) ', 36, 63728, '2024-11-22 19:07:23', 2024, '12345', ''),
(96, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'EyeMo (1) ', 36, 61293, '2024-11-22 19:10:17', 2024, '12345', ''),
(97, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'EyeMo (1) ', 36, 40530, '2024-11-22 19:22:54', 2024, '12345', ''),
(98, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'EyeMo (1) ', 36, 81222, '2024-11-22 19:54:06', 2024, '12345', 'includes/images/1732305274_FDA-Web-Logo-150x150-1.png'),
(99, 72, 'Corazon', '2147483647', 'pinkpantherrrr1@gmail.com', 'Cash', 'Laguna', 'Magsaysay', 'San Pedro', 'Senior Citizen', 'Female', 79, 'Adult Diaper Care (1) , Betadine (1) ', 58, 20404, '2024-11-23 10:08:38', 2024, '2418', ''),
(100, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Betadine (1) ', 21, 46539, '2024-11-23 13:18:29', 2024, '12345', 'includes/images/1732367921_sampledigsignature.jpg'),
(101, 79, 'Raver', '2147483647', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Betadine (997) ', 20738, 55871, '2024-11-23 13:46:10', 2024, '12345', 'includes/images/1732369600_gcash.jpg'),
(103, 91, 'cheryl mariz', '2147483647', 'teredizon56@gmail.com', 'Digital (Gcash)', 'Laguna', 'Sampaguita', 'San Pedro', 'Senior Citizen', 'Female', 72, 'Biogesic (1) ', 8, 89000, '2024-11-23 13:53:56', 2024, '12345', 'includes/images/1732370095_cartoon-woman-with-name-id-card_530386-178.jpg'),
(112, 87, 'Emerlina', '2147483647', 'memoriesbunk@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'Senior Citizen', 'Female', 69, 'Betadine (76) ', 1581, 24912, '2024-11-23 23:44:12', 2024, '595959', ''),
(114, 101, 'Alpin', '2147483647', 'pinkpantherrrr1@gmail.com', 'Cash', 'Laguna', 'Nueva', 'San Pedro', 'Senior Citizen', 'Female', 72, 'Bioflu (15) , Lagundi Syrup (1) , Betadine (1) ', 277, 63306, '2024-11-23 23:52:37', 2024, '2245', ''),
(115, 90, 'Kara Patrixia', '63', 'karamanlosa0@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 1', 'San Pedro', 'PWD', 'Female', 22, 'Betadine (6) , Adult Diaper Care (5) , Lagundi Syrup (3) ', 613, 88308, '2024-11-23 23:58:00', 2024, '1564896523', ''),
(116, 90, 'Kara Patrixia', '63', 'karamanlosa0@gmail.com', 'Cash', 'Laguna', 'Pacita 1', 'San Pedro', 'PWD', 'Female', 22, 'Betadine (6) , Adult Diaper Care (5) , Lagundi Syrup (3) ', 613, 65104, '2024-11-23 23:59:16', 2024, '1564896523', ''),
(117, 90, 'Kara Patrixia', '63', 'karamanlosa0@gmail.com', 'Cash', 'Laguna', 'Pacita 1', 'San Pedro', 'PWD', 'Female', 22, 'Adult Diaper Care (1) , Betadine (980) ', 20422, 53722, '2024-11-24 01:11:30', 2024, '1564896523', ''),
(118, 90, 'Kara Patrixia', '63', 'karamanlosa0@gmail.com', 'Cash', 'Laguna', 'Pacita 1', 'San Pedro', 'PWD', 'Female', 22, 'MX3 Coffee Mix (1) ', 18, 75200, '2024-11-24 01:11:52', 2024, '1564896523', ''),
(121, 87, 'Emerlina', '+639052430587', 'memoriesbunk@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'Senior Citizen', 'Female', 69, 'Betadine (9) ', 187, 94252, '2024-12-03 04:06:19', 2024, '595959', 'includes/images/1733198798_gcash.jpg'),
(125, 106, 'Raver', '+639616940400', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Betadine (1) ', 21, 67619, '2024-12-05 15:21:50', 2024, '12345', ''),
(126, 106, 'Raver', '+639616940400', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Betadine (1) ', 21, 61704, '2024-12-05 15:24:07', 2024, '12345', ''),
(127, 106, 'Raver', '+639616940400', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Betadine (1) , MX3 Coffee Mix (1) ', 39, 39757, '2024-12-05 15:25:32', 2024, '12345', ''),
(128, 106, 'Raver', '+639616940400', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Adult Diaper Care (1) , Lagundi Syrup (1) ', 138, 25171, '2024-12-05 15:26:29', 2024, '12345', ''),
(129, 106, 'Raver', '+639616940400', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'MX3 Coffee Mix (1) , Adult Diaper Care (1) ', 56, 30839, '2024-12-05 15:27:05', 2024, '12345', ''),
(130, 106, 'Raver', '+639616940400', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Betadine (1) , Adult Diaper Care (1) ', 58, 52372, '2024-12-05 15:27:23', 2024, '12345', ''),
(131, 106, 'Raver', '+639616940400', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Bioflu (1) , MX3 Coffee Mix (1) , Betadine (1) , Lagundi Syrup (1) ', 150, 31174, '2024-12-05 15:28:03', 2024, '12345', ''),
(132, 106, 'Raver', '+639616940400', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Betadine (1) , MX3 Coffee Mix (1) , Adult Diaper Care (1) ', 77, 80309, '2024-12-05 15:28:37', 2024, '12345', 'includes/images/1733412525_ddd43579-e5ac-48fd-8ca8-4babf3d0d579.jpg'),
(133, 106, 'Raver', '+639616940400', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Betadine (1) ', 21, 15801, '2024-12-05 15:50:34', 2024, '12345', 'includes/images/1733413851_sample pwd card.png'),
(135, 106, 'Raver', '+639616940400', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'MX3 Coffee Mix (5) , Betadine (4) ', 175, 12725, '2024-12-09 10:52:58', 2024, '12345', ''),
(136, 106, 'Raver', '+639616940400', 'raverb23@gmail.com', 'Cash', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'MX3 Coffee Mix (10) ', 184, 32985, '2024-12-09 10:59:43', 2024, '12345', ''),
(137, 106, 'Raver', '+639616940400', 'raverb23@gmail.com', 'Digital (Gcash)', 'Laguna', 'Pacita 2', 'San Pedro', 'PWD', 'Male', 23, 'Betadine (3) ', 62, 64363, '2024-12-10 05:56:44', 2024, '12345', 'includes/images/1733810218_sample pwd card.png');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `medicine_photo` varchar(200) NOT NULL,
  `approval` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `user_id`, `first_name`, `last_name`, `middle_name`, `contact_no`, `email`, `medicine_photo`, `approval`) VALUES
(20, 37, 'Rixxa Geleine', 'Florendo', 'NA', 2147483647, 'florendorixxa@gmail.com', 'prescription.jpg', 'Pending'),
(21, 38, 'Karylle', 'Abante', 'Nicole', 2147483647, 'krsabante@gmail.com', '289066843_3977998452424774_7737574115699378631_n.jpg', 'Pending'),
(22, 34, 'Raver ', 'Bhambhani', 'Abantte', 2147483647, 'ravlauren5@gmail.com', 'sample pwd card.png', 'Pending'),
(23, 59, 'Raver', 'Bhambhani', 'Trinidad', 0, 'rixxaflorendo@gmail.com', 'prescription.jpg', 'Pending'),
(24, 60, 'Jade', 'Dacoroon', 'Bagay', 0, 'jadedacoroon27@gmail.com', 'AHRI2.webp', 'Pending'),
(26, 68, 'Czarina Lyn', 'Bunag', 'VERBA', 0, 'czarinalynvb@gmail.com', 'sample id with selfie.jpeg', 'Pending'),
(27, 73, 'Karylle Nicole', 'Abante', '', 0, 'sanantoniocarlvennice@gmail.com', 'prescription.jpg', 'Pending'),
(28, 68, 'Czarina Lyn', 'Bunag', 'VERBA', 0, 'czarinalynvb@gmail.com', '20180815_prescription-1024x1024.webp', 'Pending'),
(29, 68, 'Czarina Lyn', 'Bunag', 'VERBA', 0, 'czarinalynvb@gmail.com', '20180815_prescription-1024x1024.webp', 'Pending'),
(32, 69, 'Karylle', 'Abante', 'Aldenese', 0, 'karyllenicolea@gmail.com', '44ed675e-a696-402b-bba2-912f07c53688.jpg', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `expiration_date` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `price`, `expiration_date`, `image`) VALUES
(2, 'Betadine', 461, 26, '2025-11-21', 'Screenshot 2024-11-23 180404.png'),
(5, 'MX3 Coffee Mix', 871, 23, '2025-11-23', 'Screenshot 2024-11-23 180210.png'),
(15, 'Adult Diaper Care', 978, 47, '2025-11-23', 'Screenshot 2024-11-23 180258.png'),
(18, 'Lagundi Syrup', 979, 125, '2025-11-23', 'Screenshot 2024-11-23 180522.png'),
(20, 'Bioflu', 983, 13, '2025-11-23', 'Screenshot 2024-11-23 175637.png'),
(21, 'Salbutamol', 999, 21, '2025-11-23', 'Screenshot 2024-11-23 175524.png');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_refund`
--

CREATE TABLE `receipt_refund` (
  `refund_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `total_products` varchar(250) NOT NULL,
  `total_price` int(11) NOT NULL,
  `control_number` varchar(200) NOT NULL,
  `track_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipt_refund`
--

INSERT INTO `receipt_refund` (`refund_id`, `order_id`, `user_id`, `name`, `email`, `contact_no`, `method`, `total_products`, `total_price`, `control_number`, `track_code`) VALUES
(1, 48, 68, 'Czarina Lyn', 'czarinalynvb@gmail.com', '2147483647', 'Cash', 'Eyemo (1) , Biogesic (1) ', 40, '43403', 58900),
(2, 59, 68, 'Czarina Lyn', 'czarinalynvb@gmail.com', '2147483647', 'Cash', 'Tuseran Forte (1) ', 20, '43403', 32324),
(3, 49, 69, 'Karylle', 'karyllenicolea@gmail.com', '2147483647', 'Cash', 'Ferrous Sulfate (1) ', 236, '0', 54068),
(4, 111, 87, 'Emerlina', 'memoriesbunk@gmail.com', '2147483647', 'Cash', 'Betadine (5) ', 104, '595959', 94645),
(5, 102, 90, 'Kara', 'karamanlosa0@gmail.com', '2147483647', 'Digital (Gcash)', 'Biogesic (3) , Adult Diaper Care (3) , Alaxan  (3) ', 168, '1564896523', 13936),
(6, 120, 106, 'Raver', 'raverb23@gmail.com', '2147483647', 'Cash', 'MX3 Coffee Mix (9) ', 166, '12345', 90696);

-- --------------------------------------------------------

--
-- Table structure for table `reciept`
--

CREATE TABLE `reciept` (
  `reciept_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `total_products` varchar(200) NOT NULL,
  `total_price` bigint(30) NOT NULL,
  `control_number` varchar(200) NOT NULL,
  `track_code` int(11) NOT NULL,
  `approval` varchar(200) NOT NULL,
  `transaction_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reciept`
--

INSERT INTO `reciept` (`reciept_id`, `user_id`, `order_id`, `name`, `email`, `contact_no`, `method`, `total_products`, `total_price`, `control_number`, `track_code`, `approval`, `transaction_date`) VALUES
(0, 59, 0, 'Raver', 'rixxaflorendo@gmail.com', '2147483647', 'Cash', 'Eyemo (1) ', 36, '0', 41312, '', '2024-11-21 16:27:56'),
(0, 0, 0, 'Raver ', 'ravlauren5@gmail.com', '2147483647', 'Cash', 'Biogesic (5) , Robitusin (5) ', 120, '0', 71540, '', '2024-11-21 16:27:56'),
(0, 0, 0, 'Raver ', 'ravlauren5@gmail.com', '2147483647', 'Digital (Gcash)', 'Biogesic (5) , Robitusin (5) ', 120, '0', 27283, '', '2024-11-21 16:27:56'),
(0, 68, 0, 'Czarina Lyn', 'czarinalynvb@gmail.com', '2147483647', 'Cash', 'Eyemo (480) , Biogesic (187) , Robitusin (699) , Astepro (999) , Sample drug (10) , Ferrous Sulfate (997) , sample1 (10) ', 280888, '0', 90828, '', '2024-11-21 16:27:56'),
(0, 73, 0, 'Karylle Nicole', 'sanantoniocarlvennice@gmail.com', '2147483647', 'Cash', 'Sample drug (1) ', 80, '0', 11815, '', '2024-11-21 16:27:56'),
(0, 69, 0, 'Karylle', 'karyllenicolea@gmail.com', '2147483647', 'Cash', 'Eyemo (1) ', 36, '', 16770, '○ Your request for product has been <b>Approved</b>', '2024-11-21 16:27:56'),
(0, 69, 0, 'Karylle', 'karyllenicolea@gmail.com', '2147483647', 'Digital (Gcash)', 'Eyemo (9) ', 324, '', 24293, '○ Your request for product has been <b>Approved</b>', '2024-11-21 16:27:56'),
(0, 69, 0, 'Karylle', 'karyllenicolea@gmail.com', '2147483647', 'Digital (Gcash)', 'Tuseran Forte (4) ', 80, '', 72322, '○ Your request for product has been <b>Approved</b>', '2024-11-21 16:27:56'),
(0, 69, 0, 'Karylle', 'karyllenicolea@gmail.com', '2147483647', 'Cash', 'Eyemo (5) ', 180, '', 84911, '○ Your request for product has been <b>Approved</b>', '2024-11-21 16:27:56'),
(0, 69, 0, 'Karylle', 'karyllenicolea@gmail.com', '2147483647', 'Digital (Gcash)', 'Solmux (10) ', 160, '', 17486, '○ Your request for product has been <b>Approved</b>', '2024-11-22 04:19:43'),
(0, 0, 0, 'Raver ', 'ravlauren5@gmail.com', '2147483647', 'Cash', 'Eyemo (5) ', 200, '', 92623, '○ Your request for product has been <b>Denied</b>', '2024-11-22 07:55:59'),
(0, 69, 0, 'Karylle', 'karyllenicolea@gmail.com', '2147483647', 'Cash', 'Eyemo (1) ', 36, '', 85699, '○ Your request for product has been <b>Denied</b>', '2024-11-22 08:22:15'),
(0, 69, 0, 'Karylle', 'karyllenicolea@gmail.com', '2147483647', 'Digital (Gcash)', 'Solmux (3) ', 48, '', 32062, '○ Your request for product has been <b>Approved</b>', '2024-11-22 08:22:18'),
(0, 79, 0, 'Raver', 'raverb23@gmail.com', '2147483647', 'Digital (Gcash)', 'Eyemo (4) ', 144, '', 81404, '○ Your request for product has been <b>Approved</b>', '2024-11-22 14:29:28'),
(0, 101, 0, 'Alpin', 'pinkpantherrrr1@gmail.com', '2147483647', 'Digital (Gcash)', 'Adult Diaper Care (1) , Betadine (1) , Lagundi Syrup (1) ', 158, '', 31149, '○ Your request for product has been <b>Approved</b>', '2024-11-23 14:57:14'),
(0, 79, 0, 'Raver', 'raverb23@gmail.com', '2147483647', 'Digital (Gcash)', 'EyeMo (1) ', 36, '', 71809, '○ Your request for product has been <b>Denied</b>', '2024-11-23 21:57:15'),
(0, 79, 0, 'Raver', 'raverb23@gmail.com', '2147483647', 'Cash', 'Eyemo (1) ', 36, '', 48402, '○ Your request for product has been <b>Denied</b>', '2024-11-23 21:57:21'),
(0, 79, 0, 'Raver', 'raverb23@gmail.com', '2147483647', 'Cash', 'Eyemo (1) ', 36, '', 91549, '○ Your request for product has been <b>Approved</b>', '2024-11-23 21:57:29'),
(0, 0, 0, '', '', '0', '', '', 0, '', 0, '○ Your request for product has been <b>Denied</b>', '2024-11-23 21:57:37'),
(0, 0, 0, '', '', '0', '', '', 0, '', 0, '○ Your request for product has been <b>Denied</b>', '2024-11-23 21:57:47'),
(0, 87, 0, 'Emerlina', 'memoriesbunk@gmail.com', '2147483647', 'Digital (Gcash)', 'Betadine (5) , MX3 Coffee Mix (56) , Adult Diaper Care (1) ', 1172, '', 60445, '○ Your request for product has been <b>Approved</b>', '2024-11-23 23:16:22'),
(0, 106, 0, 'Raver', 'raverb23@gmail.com', '2147483647', 'Cash', 'MX3 Coffee Mix (3) ', 55, '', 95901, '○ Your request for product has been <b>Approved</b>', '2024-11-23 23:53:59'),
(0, 90, 0, 'Kara Patrixia', 'karamanlosa0@gmail.com', '63', 'Digital (Gcash)', 'MX3 Coffee Mix (39) ', 718, '', 32936, '○ Your request for product has been <b>Approved</b>', '2024-11-24 01:19:23'),
(0, 106, 0, 'Raver', 'raverb23@gmail.com', '+639616940400', 'Digital (Gcash)', 'Betadine (8) ', 166, '', 75126, '○ Your request for product has been <b>Approved</b>', '2024-12-03 14:45:06'),
(0, 106, 0, 'Raver', 'raverb23@gmail.com', '+639616940400', 'Cash', 'Betadine (8) ', 166, '', 49995, '○ Your request for product has been <b>Approved</b>', '2024-12-03 14:45:10'),
(0, 106, 0, 'Raver', 'raverb23@gmail.com', '+639616940400', 'Digital (Gcash)', 'MX3 Coffee Mix (1) ', 18, '', 28198, '○ Your request for product has been <b>Approved</b>', '2024-12-03 14:45:13'),
(0, 107, 0, 'Raver ', 'emailraver@gmail.com', '+639616940400', 'Cash', 'Lagundi Syrup (10) ', 1000, '', 98956, '○ Your request for product has been <b>Approved</b>', '2024-12-05 16:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `registration_type` varchar(50) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `fphoto` varchar(200) NOT NULL,
  `bphoto` varchar(200) NOT NULL,
  `control_number` varchar(200) NOT NULL,
  `user_otp` varchar(50) NOT NULL,
  `otp_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `middle_name`, `province`, `city`, `barangay`, `address`, `contact_no`, `gender`, `registration_type`, `birth_date`, `age`, `fphoto`, `bphoto`, `control_number`, `user_otp`, `otp_pass`) VALUES
(37, 'florendorixxa@gmail.com', 'fa01276efabaa58ac5a46588fcf0b883ba2f9b25', 'Rixxa Geleine', 'Florendo', 'NA', 'Laguna', 'San Pedro', '', 'San Pedro', '2147483647', 'Female', 'PWD', '2001-09-07', 23, 'card.jpg', 'w person.jpg', '0', '0', 0),
(44, 'rixxa.geleine.florendo@adamson.edu.ph', 'fa01276efabaa58ac5a46588fcf0b883ba2f9b25', 'Rixxa Geleine', 'Florendo', 'N/A', 'Laguna', 'San Pedro', 'Estrella', '123 San Pedro', '+639273660213', 'Female', 'PWD', '2001-09-07', 23, 'ID.jpg', 'ID selfie.jpg', '0', '292850', 0),
(59, 'rixxaflorendo@gmail.com', '8605b9f31634f19c60ef66dc57251291b74b699e', 'Raver', 'Bhambhani', 'Trinidad', 'Laguna', 'San Pedro', 'GSIS', 'blk 10 lot 5 sample street', '+639616940400', 'Male', 'PWD', '2001-06-10', 23, 'ID.jpg', 'ID selfie.jpg', '0', '501517', 0),
(64, 'fmanlosa28@gmail.com', 'ef529396219d24b2ef63b7861f1af4ac787480ad', 'Flordeluna', 'Manlosa', 'Carranza', 'Laguna', 'San Pedro', 'Cuyab', 'Cuyab, San Pedro Laguna', '+639985382885', 'Female', 'PWD', '1979-12-22', 44, 'inbound3931586507302529276.webp', 'inbound441525497255092753.jpg', '2147483647', '', 0),
(68, 'czarinalynvb@gmail.com', '8605b9f31634f19c60ef66dc57251291b74b699e', 'Czarina Lyn', 'Bunag', 'VERBA', 'Laguna', 'San Pedro', 'Pacita 2', 'Blk 8 Lot 16 Venus St.', '+63', 'Female', 'Senior Citizen', '1960-01-01', 64, 'sample pwd.jpg', 'sample id with selfie.jpeg', '43403', '0', 0),
(87, 'memoriesbunk@gmail.com', 'b381fe2d3e01a0ebad66789ddc227cf3d55b8f87', 'Aidan', 'Tucaling', '', 'Laguna', 'San Pedro', 'Pacita 2', 'blk 9 lot 2', '+639052430587', 'Female', 'Senior Citizen', '1954-12-19', 69, 'ID.jpg', 'ID selfie.jpg', '595959', '0', 804432),
(90, 'karamanlosa0@gmail.com', '8605b9f31634f19c60ef66dc57251291b74b699e', 'Kara Patrixia', 'Manlosa', '', 'Laguna', 'San Pedro', 'Pacita 1', 'Pacita, Laguna', '+63', 'Female', 'PWD', '2001-12-20', 22, 'DL-Philippines.webp', 'OIP.jpeg', '1564896523', '0', 0),
(100, 'mercury123@gmail.com', '8605b9f31634f19c60ef66dc57251291b74b699e', 'TSET', 'TSET', 'DSAF', 'Laguna', 'San Pedro', 'Sampaguita', 'RESRRA', '+639616940400', 'Female', 'PWD', '1142-12-12', 881, 'sample pwd card.png', 'sample id selfie.jpg', '1231312', '501517', 0),
(101, 'pinkpantherrrr1@gmail.com', '10b005980d6ee948b1a13b4eb03587eb5433e34d', 'Alpin', 'Aguillon', '', 'Laguna', 'San Pedro', 'Nueva', 'Blk 9 Lot 7 ', '+639457736924', 'Female', 'Senior Citizen', '1952-10-14', 72, 'cartoon-woman-with-name-id-card_530386-178.jpg', 'download.jfif', '2245', '0', 0),
(103, 'testemail@gmail.com', '8605b9f31634f19c60ef66dc57251291b74b699e', 'fname', 'lname', '', 'Laguna', 'San Pedro', 'Pacita 2', 'blk 1 lot 2', '+639616940400', 'Male', 'PWD', '2001-06-19', 23, 'sample pwd card.png', 'sample id selfie.jpg', '12345', '501517', 0),
(105, 'karylle@gmail.com', 'd738c36df93f9c3610839e7663cf7b17ab335aa1', 'sample', 'San Antonio', 'Nicole', 'Laguna', 'San Pedro', 'Pacita 1', 'Blk 11 Lot 24 ', '+639616940400', 'Female', 'PWD', '2001-11-09', 23, 'ID.jpg', 'ID selfie.jpg', '989898', '501517', 0),
(106, 'raverb23@gmail.com', '8605b9f31634f19c60ef66dc57251291b74b699e', 'Raver', 'Bhambhani', '', 'Laguna', 'San Pedro', 'Pacita 2', 'Blk 8 Lot 16', '+639616940400', 'Male', 'PWD', '2001-10-06', 23, 'sample pwd.jpg', 'sampleid card with selfie.jpg', '12345', '0', 0),
(107, 'emailraver@gmail.com', '8605b9f31634f19c60ef66dc57251291b74b699e', 'Raver ', 'Bhambhani', 'Trinidad', 'Laguna', 'San Pedro', 'Sampaguita', 'Blk 8 Lot 16 Venus St.', '+639616940400', 'Male', 'PWD', '2001-06-10', 23, 'sample pwd card.png', 'sample id selfie.jpg', '12324', '0', 0),
(108, 'ravemail@gmail.com', '8605b9f31634f19c60ef66dc57251291b74b699e', 'Raver ', 'Bhambhani', 'Trinidad', 'Laguna', 'San Pedro', 'Sampaguita', 'Blk 8 Lot 16 Venus St.', '+639616940400', 'Male', 'PWD', '2001-06-10', 23, 'sample pwd card.png', 'sample id selfie.jpg', '090909', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_validity`
--

CREATE TABLE `user_validity` (
  `user_validity_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `registration_type` varchar(50) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `fphoto` varchar(200) NOT NULL,
  `bphoto` varchar(200) NOT NULL,
  `control_number` varchar(100) NOT NULL,
  `user_otp` int(11) NOT NULL,
  `otp_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`ads_id`);

--
-- Indexes for table `authorization`
--
ALTER TABLE `authorization`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `establishment`
--
ALTER TABLE `establishment`
  ADD PRIMARY KEY (`establishment_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_refund`
--
ALTER TABLE `receipt_refund`
  ADD PRIMARY KEY (`refund_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_validity`
--
ALTER TABLE `user_validity`
  ADD PRIMARY KEY (`user_validity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `ads_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `authorization`
--
ALTER TABLE `authorization`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `establishment`
--
ALTER TABLE `establishment`
  MODIFY `establishment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `receipt_refund`
--
ALTER TABLE `receipt_refund`
  MODIFY `refund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `user_validity`
--
ALTER TABLE `user_validity`
  MODIFY `user_validity_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
