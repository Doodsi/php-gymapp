CREATE DATABASE IF NOT EXISTS gymtracker;
USE gymtracker;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE workouts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    workout_date DATE NOT NULL,
    duration_minutes INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- kreiraj basic usera:
INSERT INTO users (email, password, name) VALUES (
  'test@example.com',
  -- password_hash('test123', PASSWORD_DEFAULT)
  '$2y$10$Q.wKf0y5BzWK9ZP9pXcX6uG7pW4uNnXJwZso1rQKQ7M7i1Q0pQqe6',
  'Test User'
);