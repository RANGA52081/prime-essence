-- create database and tables for Prime Essence
CREATE DATABASE IF NOT EXISTS prime_essence CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE prime_essence;

-- users table
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- orders table (shared for dosa & biryani)
CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NULL,
  item_name VARCHAR(100) NOT NULL,
  size VARCHAR(50),
  spice_level VARCHAR(50),
  extras TEXT,
  quantity INT DEFAULT 1,
  price DECIMAL(10,2) DEFAULT 0.00,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);
