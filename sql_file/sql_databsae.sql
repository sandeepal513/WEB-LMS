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
    CHECK   (LENGTH(password) >= 8 AND  LENGTH(password) <= 16),
    CHECK (dob < DATE_SUB(CURDATE(), INTERVAL 16 YEAR))
);

--Create admin table
CREATE TABLE admin (
    adm_id CHAR (6) primary KEY
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

--Create department table
CREATE TABLE department (
    dep_id CHAR (6) PRIMARY KEY,
    dep_name VARCHAR (50) NOT NULL,
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
    stu_dep_id CHAR (6),
    FOREIGN KEY (stu_dep_id) REFERENCES department(dep_id),
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
    lect_dep_id CHAR (6),
    FOREIGN KEY (lect_dep_id) REFERENCES department(dep_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

--Create course table
CREATE TABLE course (
    cour_code  CHAR (6) PRIMARY KEY,
    cour_name VARCHAR (50) NOT NULL,
    dep_id  CHAR (6),
    FOREIGN KEY (dep_id) REFERENCES department(dep_id)
);

--Create stu_course table
CREATE TABLE stu_course (
    cour_code  CHAR (6),
    stu_id CHAR (6),
    FOREIGN KEY (cour_code) REFERENCES course(cour_code),
    FOREIGN KEY (stu_id) REFERENCES student(stu_id),
);

--Create lect_course table
CREATE TABLE lect_course (
    cour_code  CHAR (6),
    lect_id CHAR (6),
    FOREIGN KEY (cour_code) REFERENCES course(cour_code),
    FOREIGN KEY (lect_id) REFERENCES lecturer(lect_id)
);

--Insert admin data into  user table and admin table
INSERT INTO user
VALUES 
(1,'admin','Sarath','Fernando','admin123@gmail.com','Admin200@','0766816285','1980-02-05','M');

INSERT INTO admin
VALUES
('a001',1,'admin','Sarath','Fernando','admin123@gmail.com','Admin200@','0766816285','1980-02-05','M');

--Insert student data into  student table
INSERT INTO student
VALUES
('s001',2,'sandeepa','lakshan','lsandeepa13@gmail.com','Sandeepa@#2002','0766816272','2002-02-05','M'),
('s002',3,'nethmi','nimasha','nethminimasha@gmail.com','Nethmi@200#','0764245185','2002-02-07','F');

--Insert lecturer data into lecturer table
INSERT  INTO lecturer
VALUES
('l001', 4, 'kasun', 'samarakoon', 'kasunsama@gmail.com', 'Kasun@1998$', '0712345678', '1998-05-12', 'M'),
('l002', 5, 'sachini', 'rathnayake', 'sachirathna@gmail.com', 'Sachini#2020', '0719876543', '2000-11-25', 'F');

--Insert department data into  department table
INSERT INTO department
VALUES
('d001', 'ICT'),
('d002', 'ET'),
('d003', 'BST');

--Insert course data into course table
INSERT INTO course
VALUES
('c001', 'Data Structures', 'd001'),
('c002', 'Computer Networks', 'd001'),
('c003', 'Database Management', 'd001'),
('c004', 'Programming Fundamentals', 'd001'),

('c005', 'Thermodynamics', 'd002'),
('c006', 'Fluid Mechanics', 'd002'),
('c007', 'Electrical Circuits', 'd002'),
('c008', 'Engineering Mathematics', 'd002'),

('c009', 'Biochemistry', 'd003'),
('c010', 'Molecular Biology', 'd003'),
('c011', 'Environmental Science', 'd003'),
('c012', 'Agricultural Systems', 'd003');