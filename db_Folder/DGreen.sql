-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2024 at 11:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--

--
-- Create the database
-- CREATE DATABASE DGreen;

-- Use the database
-- USE RestaurantManagement; 

-- Table for storing information about people (customers and staff)
CREATE TABLE people (
    person_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone_number VARCHAR(20),
    address VARCHAR(255),
    gender VARCHAR(10) NOT NULL,
    password VARCHAR(50) NOT NULL

);

-- Table for orders
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    person_id INT,
    order_date DATETIME NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (person_id) REFERENCES people(person_id)
);

-- Table for reservations
CREATE TABLE reservations (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    person_id INT,
    reservation_date DATE NOT NULL,
    reservation_time TIME NOT NULL,
    num_guests INT NOT NULL,
    FOREIGN KEY (person_id) REFERENCES people(person_id)
);

-- Table for available food items
CREATE TABLE food_available (
    food_id INT AUTO_INCREMENT PRIMARY KEY,
    food_name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL
);

-- Table for rooms
CREATE TABLE rooms (
    room_id INT AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(100) NOT NULL,
    capacity INT NOT NULL,
    description TEXT
);

-- Queries
-- Inserting Data into the `people` Table:

INSERT INTO people (full_name, email, phone_number, address) 
VALUES ('John', 'Doe', 'john.doe@example.com', '123-456-7890', '123 Main St');

-- Selecting All Orders with Customer Information:

SELECT orders.order_id, orders.order_date, orders.total_price, 
       people.first_name, people.last_name, people.email
FROM orders
JOIN people ON orders.person_id = people.person_id;

-- Adding a New Reservation:
INSERT INTO reservations (person_id, reservation_date, reservation_time, num_guests) 
VALUES (1, '2024-04-10', '18:00:00', 4);

-- Selecting Available Food Items with Prices:
SELECT food_name, description, price
FROM food_available;

-- Updating Customer Information:

UPDATE people
SET phone_number = '987-654-3210'
WHERE person_id = 1;

-- Selecting Reservations for a Specific Date:**
SELECT reservation_id, reservation_date, reservation_time, num_guests
FROM reservations
WHERE reservation_date = '2024-04-10';

-- Deleting an Order by Order ID:
DELETE FROM orders
WHERE order_id = 1;

-- Counting the Number of Available Rooms:
SELECT COUNT(*) AS num_available_rooms
FROM rooms;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;