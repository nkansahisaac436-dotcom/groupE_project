CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('student', 'lecturer') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE programmes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    status VARCHAR(50)
);

CREATE TABLE levels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    level_name VARCHAR(50),
    programme_id INT,
    FOREIGN KEY (programme_id) REFERENCES programmes(id)
);

CREATE TABLE semesters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    semester_name VARCHAR(50),
    level_id INT,
    FOREIGN KEY (level_id) REFERENCES levels(id)
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100),
    semester_id INT,
    FOREIGN KEY (semester_id) REFERENCES semesters(id)
);

CREATE TABLE files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    file_name VARCHAR(255),
    course_id INT,
    uploaded_by INT,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id),
    FOREIGN KEY (uploaded_by) REFERENCES users(id)
);