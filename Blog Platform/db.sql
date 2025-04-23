CREATE TABLE users (
    id INT(255) PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_admin BOOLEAN DEFAULT FALSE
);

CREATE TABLE posts (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255), 
    category VARCHAR(100), 
    status ENUM('draft', 'published') DEFAULT 'draft', 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
ALTER TABLE users
ADD image varchar(255) DEFAULT 'images/image.png';
