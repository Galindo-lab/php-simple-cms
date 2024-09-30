-- demo.sql 

-- Table for Users
CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Unique ID for each user
    username VARCHAR(50) NOT NULL UNIQUE, -- Username must be unique
    email VARCHAR(100) NOT NULL UNIQUE, -- Email must be unique
    password VARCHAR(255) NOT NULL, -- Hashed password
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Account creation timestamp
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Account update timestamp
);

-- Table for Blog Posts
CREATE TABLE Posts (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Unique ID for each post
    user_id INT, -- Foreign key from Users table (author of the post)
    title VARCHAR(255) NOT NULL, -- Title of the blog post
    content TEXT NOT NULL, -- Content of the blog post
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Post creation timestamp
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Post update timestamp
    FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE -- Ensures referential integrity
);

-- Datos de prueba
-- Insert two users into the Users table
INSERT INTO Users (username, email, password)
VALUES ('john_doe', 'john.doe@example.com', 'hashedpassword123'),
       ('jane_smith', 'jane.smith@example.com', 'hashedpassword456');

-- Insert two posts into the Posts table, one for each user
INSERT INTO Posts (user_id, title, content)
VALUES (1, 'My First Blog Post', 'This is the content of my first blog post. Welcome to my blog!'),
       (2, 'Jane’s Insights', 'Here are some thoughts and insights about technology and life.');
