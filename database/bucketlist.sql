-- Skapa bucketlist tabell --
CREATE TABLE bucketlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    priority ENUM('Låg', 'Medel', 'Hög') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);