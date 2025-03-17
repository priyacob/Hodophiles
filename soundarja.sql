-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 04:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soundarja`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'Admin',
  `status` tinyint(1) DEFAULT 1,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `email`, `password`, `phone`, `role`, `status`, `added_on`, `last_login`) VALUES
(1, 'John Doe', 'john@example.com', '482c811da5d5b4bc6d497ffa98491e38', '9876543210', 'Super Admin', 1, '2025-03-06 05:32:04', '2025-03-06 11:02:04'),
(2, 'Jane Smith', 'jane@example.com', '1a145a23d6e47aadfe2063f1f951e691', '9123456780', 'Admin', 1, '2025-03-06 05:32:04', '2025-03-06 11:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `arranged_bookings`
--

CREATE TABLE `arranged_bookings` (
  `booking_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `service_type` varchar(100) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `tour_package` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `num_people` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `places_to_visit` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `overview` text DEFAULT NULL,
  `itinerary` text DEFAULT NULL,
  `inclusions` text DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `duration`, `old_price`, `price`, `places_to_visit`, `image_url`, `overview`, `itinerary`, `inclusions`, `additional_info`, `created_at`) VALUES
(1, 'Paris Getaway', '5 Days', 1200.00, 999.99, 'Eiffel Tower, Louvre Museum, Notre Dame', 'images/destination-1.jpg', 'Experience the beauty of Paris.', 'Day 1: Arrival, Day 2: Sightseeing...', 'Hotel, Breakfast, Guide', 'Visa required', '2025-03-06 05:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `destination_images`
--

CREATE TABLE `destination_images` (
  `id` int(11) NOT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination_images`
--

INSERT INTO `destination_images` (`id`, `destination_id`, `image_url`) VALUES
(1, 1, 'images/destination-1.jpg'),
(2, 1, 'images/destination-2.jpg'),
(3, 1, 'images/destination-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `place` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `availablity` enum('Available','Not Available') NOT NULL,
  `departure_date` date NOT NULL,
  `return_date` date NOT NULL,
  `hotel_type` varchar(100) NOT NULL,
  `image_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `description`, `place`, `price`, `availablity`, `departure_date`, `return_date`, `hotel_type`, `image_url`) VALUES
(1, 'Grand Palace', 'A luxurious 5-star hotel', 'Miami, FL', 250.00, 'Available', '2025-03-10', '2025-03-15', 'Luxury', 'images/hotel-1.jpg'),
(2, 'Ocean View', 'A beachside resort with stunning views', 'Los Angeles, CA', 180.00, 'Available', '2025-04-01', '2025-04-07', 'Resort', 'images/hotel-2.jpg'),
(3, 'Mountain Retreat', 'A peaceful stay in the mountains', 'Denver, CO', 120.00, 'Not Available', '2025-05-05', '2025-05-12', 'Cabin', 'images/hotel-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `destination` varchar(100) NOT NULL,
  `day/night` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  `departure_date` date NOT NULL,
  `return_date` date NOT NULL,
  `transport_mode` varchar(200) NOT NULL,
  `accommodation` varchar(100) NOT NULL,
  `inclusions` text NOT NULL,
  `exclusions` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `seat_capacity` varchar(10) NOT NULL,
  `ride` varchar(10) NOT NULL,
  `package_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `description`, `destination`, `day/night`, `price`, `availability`, `departure_date`, `return_date`, `transport_mode`, `accommodation`, `inclusions`, `exclusions`, `created_at`, `seat_capacity`, `ride`, `package_type`) VALUES
(1, 'dooars', 'valo jayga', 'jaldapar, jaigaon', '2 days, 1 ', 200.00, 1, '2025-02-22', '2025-02-25', 'bus', 'jungalboook', 'afaf', 'afaff', '2025-02-22 10:26:10', '4', 'jeep', 'standar'),
(2, 'siliguri', 'valo jayga', 'jaldapar, jaigaon', '2 days 1 night', 200.00, 1, '0000-00-00', '0000-00-00', 'bus', 'jungalboook', 'afaf', 'afaff', '2025-02-22 10:45:59', '4', 'jeep', 'standar'),
(3, 'cob', 'valo jayga', 'jaldapar, jaigaon', '2 days 1 night', 200.00, 1, '0000-00-00', '0000-00-00', 'bus', 'jungalboook', 'afaf', 'afaff', '2025-02-22 10:46:14', '4', 'jeep', 'standar');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `r_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `contact_number` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `opening_hours` varchar(255) DEFAULT NULL,
  `cuisine_type` varchar(100) DEFAULT NULL,
  `average_cost` decimal(10,2) DEFAULT NULL,
  `rating` float DEFAULT 0,
  `status` enum('open','closed','temporarily closed') DEFAULT 'open',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_guides`
--

CREATE TABLE `tour_guides` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `experience` int(11) NOT NULL,
  `languages` varchar(20) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `availability` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `preferred_language` varchar(50) DEFAULT 'English',
  `user_type` enum('Customer','Admin','Agent') DEFAULT 'Customer',
  `travel_preferences` text DEFAULT NULL,
  `loyalty_points` int(11) DEFAULT 0,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `name`, `email`, `phone`, `password`, `address`, `city`, `country`, `date_of_birth`, `gender`, `preferred_language`, `user_type`, `travel_preferences`, `loyalty_points`, `image`) VALUES
(1, 'priya', 'priyamitra0606@gmail.com', '8597911631', '25d55ad283aa400af464c76d713c07ad', '', 'coochbehar', 'india', '2025-03-21', 'Male', 'English', 'Customer', '100', 0, 'images/1612937676455.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('Car','Bus','Bike','Van','SUV','Other') NOT NULL,
  `model_year` int(11) NOT NULL,
  `registration_number` varchar(50) NOT NULL,
  `seating_capacity` int(11) NOT NULL,
  `fuel_type` enum('Petrol','Diesel','Electric','Hybrid','CNG') NOT NULL,
  `price_per_day` decimal(10,2) NOT NULL,
  `availability_status` enum('available','booked','maintenance') DEFAULT 'available',
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `arranged_bookings`
--
ALTER TABLE `arranged_bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_images`
--
ALTER TABLE `destination_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tour_guides`
--
ALTER TABLE `tour_guides`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_number` (`registration_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `arranged_bookings`
--
ALTER TABLE `arranged_bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `destination_images`
--
ALTER TABLE `destination_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_guides`
--
ALTER TABLE `tour_guides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destination_images`
--
ALTER TABLE `destination_images`
  ADD CONSTRAINT `destination_images_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
