--Create user table
CREATE TABLE user (
    user_id INT PRIMARY KEY ,
    username VARCHAR (255) NOT NULL,
    first_name VARCHAR (20),
    last_name VARCHAR (20),
    email VARCHAR (50) UNIQUE,
    password VARCHAR (16),
    mb_no VARCHAR (10) UNIQUE,
    dob DATE ,
    gender CHAR (6),
    CHECK  (gender IN ('male', 'female')),
    CHECK   (LENGTH(password) >= 8 AND  LENGTH(password) <= 16)
);

--Add new column called user_status to user table
ALTER TABLE user ADD COLUMN user_status VARCHAR (20);

--Create admin table
CREATE TABLE admin (
    adm_id CHAR (6) primary KEY,
    user_id INT,
    adm_username VARCHAR(255) NOT NULL,
    adm_first_name VARCHAR (20),
    adm_last_name VARCHAR (20),
    adm_email VARCHAR (30),
    adm_password VARCHAR (20),
    adm_mb_no VARCHAR (20),
    adm_dob DATE,
    adm_gender CHAR (6),
    FOREIGN  KEY (user_id) REFERENCES user(user_id)
);

--Create student table
CREATE TABLE student (
    stu_id CHAR(6) PRIMARY KEY,
    user_id INT,
    stu_username  VARCHAR (255) NOT NULL,
    stu_first_name VARCHAR (20),
    stu_last_name VARCHAR (20),
    stu_email VARCHAR (50) UNIQUE,
    stu_password VARCHAR (16),
    stu_mb_no VARCHAR (10) UNIQUE,
    stu_dob DATE,
    stu_gender CHAR (6),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

--Create lecturer table
CREATE TABLE lecturer (
    lect_id CHAR(6) PRIMARY KEY,
    user_id INT,
    lect_username  VARCHAR (255) NOT NULL,
    lect_first_name VARCHAR (20),
    lect_last_name VARCHAR (20),
    lect_email  VARCHAR (50) UNIQUE,
    lect_password VARCHAR (16),
    lect_mb_no VARCHAR (10) UNIQUE,
    lect_dob DATE ,
    lect_gender CHAR (6),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

--Create course table
CREATE TABLE course (
    cour_code  CHAR (6) PRIMARY KEY,
    cour_name VARCHAR (50) NOT NULL
);

--Create stu_course table
CREATE TABLE stu_course (
    cour_code  CHAR (6),
    stu_id CHAR (6),
    FOREIGN KEY (cour_code) REFERENCES course(cour_code),
    FOREIGN KEY (stu_id) REFERENCES student(stu_id)
);

--Create lect_course table
CREATE TABLE lect_course (
    cour_code  CHAR (6),
    lect_id CHAR (6),
    FOREIGN KEY (cour_code) REFERENCES course(cour_code),
    FOREIGN KEY (lect_id) REFERENCES lecturer(lect_id)
);

--Insert data into  user table and admin table
INSERT INTO user
VALUES 
(1, 'admin', 'Sarath', 'Fernando', 'admin123@gmail.com', 'Admin200@', '0766816285', '1980-02-05', 'male');
(2, 'sandeepal', 'sandeepa', 'lakshan', 'lsandeepa13@gmail.com', 'Sandeepa@#2002', '0766816272', '2002-02-05', 'male'),
(3, 'nethmin', 'nethmi', 'nimasha', 'nethminimasha@gmail.com', 'Nethmi@200#', '0764245185', '2002-02-07', 'female'),
(4, 'kasuns', 'kasun', 'samarakoon', 'kasunsama@gmail.com', 'Kasun@1998$', '0712345678', '1998-05-12', 'male'),
(5, 'sachinir', 'sachini', 'rathnayake', 'sachirathna@gmail.com', 'Sachini#2020', '0719876543', '2000-11-25', 'female');

--Insert data to user_status column in  user table
UPDATE user
SET user_status = CASE user_id
    WHEN 1 THEN 'admin'
    WHEN 2 THEN 'student'
    WHEN 3 THEN 'student'
    WHEN 4 THEN 'lecturer'
    WHEN 5 THEN 'lecturer'
END
WHERE user_id IN (1, 2, 3, 4, 5);


INSERT INTO admin
VALUES
('a001',1,'admin','Sarath','Fernando','admin123@gmail.com','Admin200@','0766816285','1980-02-05','male');

--Insert student data into  student table
INSERT INTO student
VALUES
('s001',2,'sandeepal','sandeepa','lakshan','lsandeepa13@gmail.com','Sandeepa@#2002','0766816272','2002-02-05','male'),
('s002',3,'nethmin','nethmi','nimasha','nethminimasha@gmail.com','Nethmi@200#','0764245185','2002-02-07','female');

--Insert lecturer data into lecturer table
INSERT  INTO lecturer
VALUES
('l001', 4, 'kasuns', 'kasun', 'samarakoon', 'kasunsama@gmail.com', 'Kasun@1998$', '0712345678', '1998-05-12', 'male'),
('l002', 5, 'sachinir', 'sachini', 'rathnayake', 'sachirathna@gmail.com', 'Sachini#2020', '0719876543', '2000-11-25', 'female');


--Insert course data into course table
INSERT INTO course
VALUES
('c001', 'Data Structures'),
('c002', 'Computer Networks'),
('c003', 'Database Management'),
('c004', 'Programming Fundamentals'),
('c005', 'Thermodynamics'),
('c006', 'Fluid Mechanics');