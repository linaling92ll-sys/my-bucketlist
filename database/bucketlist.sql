// Skapa databasen
CREATE DATABASE IF NOT EXISTS bucketlist_db;

//Välj databas
USE bucketlist_db;

//Kasta tabellen om den redan finns
DROP TABLE IF EXISTS bucketlist;

//Skapa bucketlist tabell
CREATE TABLE bucketlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    priority ENUM('Låg', 'Medel', 'Hög') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);