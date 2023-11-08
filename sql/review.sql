CREATE DATABASE book_reviews;
USE book_reviews;

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT,
    user_name VARCHAR(255),
    rating DECIMAL(3,1),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
