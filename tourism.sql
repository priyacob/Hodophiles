-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 08:45 AM
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
-- Database: `tourism`
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
-- Table structure for table `booking_vehicle`
--

CREATE TABLE `booking_vehicle` (
  `id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `pickup_date` date NOT NULL,
  `return_date` date NOT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_vehicle`
--

INSERT INTO `booking_vehicle` (`id`, `v_id`, `u_id`, `full_name`, `email`, `phone`, `pickup_date`, `return_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'priya', 'priyamitra0606@gmail.com', '8597911631', '2025-03-14', '2025-03-10', 'pending', '2025-03-08 08:26:51', '2025-03-08 09:12:20'),
(2, 5, 1, 'priya', 'priyamitra0606@gmail.com', '8597911631', '2025-03-22', '2025-03-23', 'pending', '2025-03-08 08:29:50', '2025-03-08 09:12:24'),
(3, 8, 1, 'mistu', 'priya@gmail.com', '8597911111', '2025-03-15', '2025-03-16', 'pending', '2025-03-08 08:32:12', '2025-03-08 09:12:28'),
(4, 1, 1, 'afaf', 'a@gmail.com', '8597911631', '2025-04-06', '2025-04-06', 'pending', '2025-03-08 08:34:06', '2025-03-08 09:12:31'),
(5, 1, 1, 'priya', 'p@gmail.com', '8597911631', '2025-03-17', '2025-03-18', 'pending', '2025-03-08 08:38:53', '2025-03-08 09:12:34'),
(6, 2, 1, 'por', 'p@gmail.com', '85555555555', '2025-04-03', '2025-04-04', 'pending', '2025-03-08 09:21:11', '2025-03-08 09:21:11'),
(7, 2, 1, 'priya', 'priya@gmail.com', '8597911631', '2025-03-13', '2025-03-14', 'pending', '2025-03-17 04:58:12', '2025-03-17 04:58:12'),
(8, 2, 1, 'priya', 'priya@gmail.com', '8597911631', '2025-03-19', '2025-03-20', 'pending', '2025-03-18 16:55:16', '2025-03-18 16:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `places_to_visit` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `overview` text DEFAULT NULL,
  `itinerary` text DEFAULT NULL,
  `inclusions` text DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `best_time` varchar(255) DEFAULT NULL,
  `activities` text DEFAULT NULL,
  `tour_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `duration`, `old_price`, `price`, `places_to_visit`, `image_url`, `overview`, `itinerary`, `inclusions`, `additional_info`, `created_at`, `best_time`, `activities`, `tour_type`) VALUES
(1, 'Manali Tour', '3 Days', 14999.00, 12999.00, 'Solang Valley, Hadimba Temple', 'images/manali.jpeg', 'Experience the beauty of Manali.', 'Day 1: Arrival & Sightseeing...', 'Stay, Meals, Transport', 'Bring warm clothes.', '2025-03-18 10:24:26', 'Nov - Feb', 'Skiing, Trekking', 'Adventure'),
(2, 'Goa Beach Trip', '5 Days', 19999.00, 17999.00, 'Baga Beach, Fort Aguada', 'images/goa.jpeg', 'Relax on the beaches of Goa.', 'Day 1: Arrival...', 'Stay, Meals, Transport', 'Carry sunscreen.', '2025-03-18 10:24:26', 'Oct - Mar', 'Scuba Diving, Paragliding', 'Leisure'),
(3, 'Jaipur Heritage Tour', '2 Days', 9999.00, 7999.00, 'Amer Fort, Hawa Mahal', 'images/jaipur.jpeg', 'Explore the Pink City.', 'Day 1: Fort Visit...', 'Stay, Meals, Transport', 'Wear comfortable shoes.', '2025-03-18 10:24:26', 'Sep - Feb', 'Sightseeing, Shopping', 'Cultural'),
(4, 'Ladakh Adventure', '7 Days', 49999.00, 45999.00, 'Pangong Lake, Nubra Valley', 'images/ladakh.jpeg', 'Adventure in Ladakh.', 'Day 1: Acclimatization...', 'Stay, Meals, Transport', 'Check altitude sickness guide.', '2025-03-18 10:24:26', 'Jun - Sep', 'Biking, Trekking', 'Adventure'),
(5, 'Kerala Backwaters', '4 Days', 24999.00, 21999.00, 'Alleppey, Munnar', 'images/kerala.jpeg', 'Enjoy houseboats in Kerala.', 'Day 1: Houseboat Ride...', 'Stay, Meals, Transport', 'Mosquito repellent advised.', '2025-03-18 10:24:26', 'Aug - Mar', 'Boating, Tea Plantations', 'Nature');

-- --------------------------------------------------------

--
-- Table structure for table `destinationss`
--

CREATE TABLE `destinationss` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `places_to_visit` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `overview` text DEFAULT NULL,
  `itinerary` text DEFAULT NULL,
  `inclusions` text DEFAULT NULL,
  `exclusions` text DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `best_time` varchar(100) DEFAULT NULL,
  `activities` text DEFAULT NULL,
  `tour_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinationss`
--

INSERT INTO `destinationss` (`id`, `name`, `duration`, `old_price`, `price`, `places_to_visit`, `image_url`, `overview`, `itinerary`, `inclusions`, `exclusions`, `additional_info`, `created_at`, `best_time`, `activities`, `tour_type`) VALUES
(1, 'Goa Beach Tour', '5 Days', 50000.00, 45000.00, 'Goa, North Goa, South Goa', 'goa.jpg', 'Enjoy a beautiful vacation in Goa.', 'Day 1: Arrival in Goa... Day 2: Sightseeing...', '4 nights’ accommodation, Daily breakfast, Sightseeing, Cruise at Mandovi River', 'Airfare not included, Personal expenses, Travel insurance', 'Book early for discounts', '2025-03-16 04:55:07', 'November - March', 'Beach Sports, Water Activities', 'Holiday Package');

-- --------------------------------------------------------

--
-- Table structure for table `destination_images`
--

CREATE TABLE `destination_images` (
  `id` int(11) NOT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `r_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('Available','Unavailable') DEFAULT 'Available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `r_id`, `name`, `description`, `price`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Margherita Pizza', 'Classic Margherita pizza with fresh basil and mozzarella.', 12.99, 'margherita_pizza.jpg', 'Available', '2025-03-17 08:49:18', '2025-03-18 13:53:48'),
(2, 1, 'Pasta Alfredo', 'Creamy Alfredo pasta with Parmesan cheese.', 10.99, 'pasta_alfredo.jpeg', 'Available', '2025-03-17 08:49:18', '2025-03-17 08:56:27'),
(3, 2, 'Butter Chicken', 'Tender chicken cooked in a rich, creamy tomato sauce.', 14.99, 'butter_chicken.jpeg', 'Available', '2025-03-17 08:49:18', '2025-03-17 08:56:25'),
(4, 2, 'Vegetable Biryani', 'Fragrant rice with mixed vegetables and Indian spices.', 9.99, 'veg_biryani.jpeg', 'Available', '2025-03-17 08:49:18', '2025-03-17 08:56:22'),
(5, 3, 'Grilled Salmon', 'Freshly grilled salmon with lemon butter sauce.', 18.99, 'grilled_salmon.jpeg', 'Available', '2025-03-17 08:49:18', '2025-03-17 08:56:19'),
(6, 3, 'Lobster Bisque', 'Rich and creamy lobster soup.', 11.99, 'lobster_bisque.jpeg', 'Available', '2025-03-17 08:49:18', '2025-03-17 08:56:16'),
(7, 4, 'BBQ Ribs', 'Slow-cooked BBQ ribs with homemade sauce.', 19.99, 'bbq_ribs.jpeg', 'Available', '2025-03-17 08:49:18', '2025-03-17 08:56:14'),
(8, 4, 'Cheeseburger', 'Classic cheeseburger with fresh toppings.', 8.99, 'cheeseburger.jpeg', 'Available', '2025-03-17 08:49:18', '2025-03-17 08:56:11'),
(9, 5, 'Kung Pao Chicken', 'Spicy stir-fried chicken with peanuts.', 13.99, 'kung_pao_chicken.jpeg', 'Available', '2025-03-17 08:49:18', '2025-03-17 08:56:08'),
(10, 5, 'Dim Sum Platter', 'Assorted dumplings served with dipping sauces.', 15.99, 'dim_sum_platter.jpeg', 'Available', '2025-03-17 08:49:18', '2025-03-17 08:56:04');

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
-- Table structure for table `p_bookings`
--

CREATE TABLE `p_bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `travel_date` date NOT NULL,
  `guests` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`r_id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `contact_number`, `email`, `website`, `opening_hours`, `cuisine_type`, `average_cost`, `rating`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'The Food Lounge', '123 Main Street', 'New York', 'NY', 'USA', '10001', '123-456-7890', 'info@foodlounge.com', 'https://www.foodlounge.com', '10:00 AM - 11:00 PM', 'Italian, Continental', 50.00, 4.5, '', 'food_lounge.jpg', '2025-03-17 08:42:29', '2025-03-17 08:46:53'),
(2, 'Spicy Bites', '456 Market Avenue', 'Los Angeles', 'CA', 'USA', '90001', '987-654-3210', 'contact@spicybites.com', 'https://www.spicybites.com', '9:00 AM - 10:00 PM', 'Indian, Thai', 40.00, 4.2, '', 'spicy_bites.jpeg', '2025-03-17 08:42:29', '2025-03-17 08:46:38'),
(3, 'Ocean Breeze Diner', '789 Seaside Blvd', 'Miami', 'FL', 'USA', '33101', '567-890-1234', 'support@oceanbreeze.com', 'https://www.oceanbreezediner.com', '8:00 AM - 9:00 PM', 'Seafood, Mediterranean', 60.00, 4.7, '', 'ocean_breeze.jpeg', '2025-03-17 08:42:29', '2025-03-17 08:46:34'),
(4, 'Urban Grill', '321 Downtown Road', 'Chicago', 'IL', 'USA', '60601', '432-109-8765', 'hello@urbangrill.com', 'https://www.urbangrill.com', '11:00 AM - 12:00 AM', 'BBQ, American', 45.00, 4.3, '', 'urban_grill.jpeg', '2025-03-17 08:42:29', '2025-03-17 08:46:29'),
(5, 'Golden Dragon', '567 Chinatown', 'San Francisco', 'CA', 'USA', '94101', '345-678-9012', 'goldendragon@restaurant.com', 'https://www.goldendragon.com', '11:30 AM - 10:30 PM', 'Chinese, Asian', 55.00, 4.6, '', 'golden_dragon.jpeg', '2025-03-17 08:42:29', '2025-03-17 08:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `availability` enum('Available','Booked') DEFAULT 'Available',
  `room_type` varchar(100) DEFAULT NULL,
  `bed_type` varchar(100) DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `image_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `hotel_id`, `room_name`, `description`, `price`, `availability`, `room_type`, `bed_type`, `capacity`, `image_url`) VALUES
(1, 1, 'Deluxe Room', 'Spacious room with sea view.', 120.00, 'Available', 'Deluxe', 'King', 2, 'room-1.jpg'),
(2, 1, 'Standard Room', 'Cozy room with basic amenities.', 80.00, 'Available', 'Standard', 'Queen', 2, 'room-2.jpg'),
(3, 2, 'Family Suite', 'Large suite for family stay.', 200.00, 'Booked', 'Suite', 'Double', 4, 'room-3.jpg'),
(4, 3, 'Single Room', 'Budget-friendly room for solo travelers.', 60.00, 'Available', 'Single', 'Single', 1, 'room-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_booking`
--

CREATE TABLE `room_booking` (
  `booking_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `guests` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('Pending','Confirmed','Cancelled') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_booking`
--

INSERT INTO `room_booking` (`booking_id`, `u_id`, `room_id`, `hotel_id`, `check_in`, `check_out`, `guests`, `total_price`, `status`, `created_at`) VALUES
(2, 1, 1, 1, '2025-03-19', '2025-03-20', 2, 120.00, 'Pending', '2025-03-18 16:18:42'),
(3, 1, 1, 1, '2025-03-20', '2025-03-27', 2, 840.00, 'Pending', '2025-03-18 16:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `tour_additional_info`
--

CREATE TABLE `tour_additional_info` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `info_title` varchar(255) NOT NULL,
  `info_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_additional_info`
--

INSERT INTO `tour_additional_info` (`id`, `tour_id`, `info_title`, `info_details`) VALUES
(1, 1, 'Tour Duration', '5 Days and 4 Nights'),
(2, 1, 'Best Time to Visit', 'November to February'),
(3, 1, 'Departure City', 'Delhi, Mumbai, Bangalore'),
(4, 1, 'Accommodation Type', '3-Star and 5-Star Hotels Available'),
(5, 1, 'Meal Plan', 'Breakfast included, Lunch & Dinner on request'),
(6, 1, 'Transport', 'Private AC Car for all transfers and sightseeing'),
(7, 1, 'Tour Guide', 'Professional English-speaking guide available'),
(8, 1, 'Special Offers', 'Book before March and get 10% off'),
(9, 1, 'Cancellation Policy', 'Free cancellation up to 7 days before departure');

-- --------------------------------------------------------

--
-- Table structure for table `tour_details`
--

CREATE TABLE `tour_details` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `details` text NOT NULL
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
  `v_id` int(11) NOT NULL,
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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `package_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`v_id`, `name`, `type`, `model_year`, `registration_number`, `seating_capacity`, `fuel_type`, `price_per_day`, `availability_status`, `description`, `image`, `location`, `owner_id`, `created_at`, `updated_at`, `package_id`) VALUES
(1, 'Toyota Fortuner', 'SUV', 2022, 'MH12AB1234', 7, 'Diesel', 5500.00, 'available', 'Luxury SUV for long journeys.', 'images/fortuner.jpg', 'Mumbai', 1, '2025-03-08 07:27:38', '2025-03-08 08:07:22', 1),
(2, 'Honda City', '', 2021, 'DL05XY5678', 5, 'Petrol', 3500.00, 'available', 'Comfortable sedan for city rides.', 'images/honda_city.jpeg', 'Delhi', 2, '2025-03-08 07:27:38', '2025-03-08 08:07:24', 2),
(3, 'Maruti Swift', '', 2020, 'KA03CD7890', 5, 'Petrol', 2500.00, 'available', 'Compact car with great mileage.', 'images/swift.jpeg', 'Bangalore', 3, '2025-03-08 07:27:38', '2025-03-08 08:07:27', 3),
(4, 'Mahindra Thar', 'SUV', 2023, 'RJ15EF4567', 4, 'Diesel', 6000.00, 'available', 'Best for off-roading and adventures.', 'images/thar.jpeg', 'Jaipur', 4, '2025-03-08 07:27:38', '2025-03-08 08:07:30', 1),
(5, 'Hyundai Creta', 'SUV', 2021, 'TN22GH3456', 5, 'Petrol', 4000.00, 'available', 'Spacious and stylish urban SUV.', 'images/creta.jpg', 'Chennai', 5, '2025-03-08 07:27:38', '2025-03-08 08:07:32', 2),
(6, 'Tata Nexon EV', '', 2023, 'WB11IJ7890', 5, 'Electric', 4500.00, 'available', 'Eco-friendly electric vehicle.', 'images/nexon_ev.jpeg', 'Kolkata', 6, '2025-03-08 07:27:38', '2025-03-08 08:07:34', 3),
(7, 'Ford Endeavour', 'SUV', 2022, 'AP10KL2345', 7, 'Diesel', 7000.00, 'available', 'Premium SUV for long-distance travel.', 'images/endeavour.jpg', 'Hyderabad', 7, '2025-03-08 07:27:38', '2025-03-08 08:07:37', 1),
(8, 'Kia Seltos', 'SUV', 2020, 'GJ18MN5678', 5, 'Petrol', 3800.00, 'available', 'Stylish and powerful city SUV.', 'images/seltos.jpeg', 'Ahmedabad', 8, '2025-03-08 07:27:38', '2025-03-08 08:07:39', 2),
(9, 'Renault Kwid', '', 2019, 'UP20PQ1234', 5, 'Petrol', 2200.00, 'available', 'Affordable and fuel-efficient.', 'images/kwid.jpeg', 'Lucknow', 9, '2025-03-08 07:27:38', '2025-03-08 08:07:41', 3),
(10, 'Mercedes-Benz E-Class', '', 2023, 'HR29XY9876', 5, 'Petrol', 12000.00, 'available', 'Luxury sedan for premium rides.', 'images/e_class.jpeg', 'Gurgaon', 10, '2025-03-08 07:27:38', '2025-03-08 08:07:43', 1);

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
-- Indexes for table `booking_vehicle`
--
ALTER TABLE `booking_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinationss`
--
ALTER TABLE `destinationss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_images`
--
ALTER TABLE `destination_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

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
-- Indexes for table `p_bookings`
--
ALTER TABLE `p_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_booking`
--
ALTER TABLE `room_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tour_additional_info`
--
ALTER TABLE `tour_additional_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_details`
--
ALTER TABLE `tour_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_id` (`tour_id`);

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
  ADD PRIMARY KEY (`v_id`),
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
-- AUTO_INCREMENT for table `booking_vehicle`
--
ALTER TABLE `booking_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `destinationss`
--
ALTER TABLE `destinationss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `destination_images`
--
ALTER TABLE `destination_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `p_bookings`
--
ALTER TABLE `p_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_booking`
--
ALTER TABLE `room_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tour_additional_info`
--
ALTER TABLE `tour_additional_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tour_details`
--
ALTER TABLE `tour_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destination_images`
--
ALTER TABLE `destination_images`
  ADD CONSTRAINT `destination_images_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `p_bookings`
--
ALTER TABLE `p_bookings`
  ADD CONSTRAINT `p_bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `p_bookings_ibfk_2` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tour_details`
--
ALTER TABLE `tour_details`
  ADD CONSTRAINT `tour_details_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
