<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $host = "localhost";
        $userName = "root";
        $password = "";

        $conn = new mysqli($host, $userName, $password);

        if(!$conn){
            die("Could not connect");
        }

        echo "Connected successfully";

        // create Database 

        $db_create = "CREATE DATABASE IF NOT EXISTS fot_lms";
        if($conn->query($db_create)=== TRUE){
            echo "Database created successfully";
        }else{
            echo "Error creating database: ". $conn->error;
        }

        //Use database
        $db_use = "USE fot_lms";
        if($conn->query($db_use)=== TRUE){
            echo "Database used successfully";
        }else{
            echo "Error using database: ". $conn->error;
        }

        // Create Table user
        $table_create = "CREATE TABLE IF NOT EXISTS user(
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
        );";

        if($conn->query($table_create)===TRUE){
            echo "Table created successfully";
        }else{
            echo "Error creating table: ". $conn->error;
        }
        
        //Create Table 
        $table_create = "CREATE TABLE IF NOT EXISTS admin(
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
            );";

            if($conn->query($table_create)===TRUE){
                echo "Table created successfully";
            }else{
                echo "Error creating table: ". $conn->error;
            }

        //Create Table
        $table_create = "CREATE TABLE IF NOT EXISTS student(
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
            );";

            if($conn->query($table_create)===TRUE){
                echo "Table created successfully";
            }else{
                echo "Error creating table: ". $conn->error;
            }

        //CREATE Table
        $table_create ="CREATE TABLE IF NOT EXISTS lecturer(
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
        );";

            if($conn->query($table_create)===TRUE){
                echo "Table created successfully";
            }else{
                echo "Error creating table: ". $conn->error;
            }

        
        //Create Table
        $table_create = "CREATE TABLE IF NOT EXISTS course(
            cour_code  CHAR (6) PRIMARY KEY,
            cour_name VARCHAR (50) NOT NULL
        );";

            if($conn->query($table_create)===TRUE){
                echo "Table created successfully";
            }else{
                echo "Error creating table: ". $conn->error;
            }


        //Create Table
        $table_create = "CREATE TABLE IF NOT EXISTS stu_course(
            cour_code  CHAR (6),
            stu_id CHAR (6),
            FOREIGN KEY (cour_code) REFERENCES course(cour_code),
            FOREIGN KEY (stu_id) REFERENCES student(stu_id)
        );";

            if($conn->query($table_create)===TRUE){
                echo "Table created successfully";
            }else{
                echo "Error creating table: ". $conn->error;
            }

        
        //Create Table
        $table_create = "CREATE TABLE IF NOT EXISTS lect_course(
            cour_code  CHAR (6),
            lect_id CHAR (6),
            FOREIGN KEY (cour_code) REFERENCES course(cour_code),
            FOREIGN KEY (lect_id) REFERENCES lecturer(lect_id)
        );";

            if($conn->query($table_create)===TRUE){
                echo "Table created successfully";
            }else{
                echo "Error creating table: ". $conn->error;
            }


        //DATA INSERT INTO User
            // $user_data = "INSERT INTO user
            //     (user_id, username, first_name,  last_name, email, password, mb_no, dob, gender)
            //     VALUES
            //       (3, 'kumudu123', 'kumudu', 'Sandeepani', 'kumudu123@gmail.com', 'kumudu200@', '0766816256', '1980-07-05', 'female'),
            //       (4, 'krishani123', 'krishani', 'lakshano', 'krishani13@gmail.com', 'krishani@#2002', '0766786272', '2002-03-05', 'female');";

            // if($conn->query($user_data)===TRUE){
            //     echo "Table created successfully";
            // }else{
            //     echo "Error creating table: ". $conn->error;
            // }
        

        //Update user
            // $alter_user = "ALTER TABLE user ADD COLUMN user_status VARCHAR (20);";
            // if($conn->query($alter_user)===TRUE){
            //     echo "Table Updated successfully";
            // }else{
            //     echo "Error creating table: ". $conn->error;
            // }

            //Update user
            // $update_user = "UPDATE user
            //     SET user_status = CASE user_id
            //         WHEN 1 THEN 'admin'
            //         WHEN 2 THEN 'student'
            //         WHEN 3 THEN 'student'
            //         WHEN 4 THEN 'lecturer'
            //         WHEN 5 THEN 'lecturer'
            //     END
            //     WHERE user_id IN (1, 2, 3, 4, 5);";

            // if($conn->query($update_user)===TRUE){
            //     echo "Table Updated successfully";
            // }else{
            //     echo "Error creating table: ". $conn->error;
            // }

       // DATA INSERT INTO admin
        // $admin_data = "INSERT INTO admin
        // VALUES
        // ('a001',1,'admin','Sarath','Fernando','admin123@gmail.com','Admin200@','0766816285','1980-02-05','male');";
        // if($conn->query($admin_data)===TRUE){
        //     echo "DATA INSERT successfully";
        // }else{
        //     echo "Error creating table: ". $conn->error;
        // }

        // $student_data = "INSERT INTO student (stu_id, user_id, stu_username, stu_first_name, stu_last_name, stu_email, stu_password, stu_mb_no, stu_dob, stu_gender) VALUES
        //             ('s003', 3, 'pawan', 'Pawan', 'Thathsara', 'pawanthathsara@gmail.com', 'sap@21798', '0789886767', '2002-08-08', 'male'),
        //             ('s004', 2, 'lisa_k', 'Lisa', 'Kumar', 'lisa.kumar@example.com', 'lisa@12345', '0771234567', '2001-05-16', 'female');";
                
        // mysqli_query($conn,$student_data);

        // $lecturer_data = "INSERT  INTO lecturer
        //     VALUES
        //     ('l001', 4, 'kasuns', 'kasun', 'samarakoon', 'kasunsama@gmail.com', 'Kasun@1998$', '0712345678', '1998-05-12', 'male'),
        //     ('l002', 5, 'sachinir', 'sachini', 'rathnayake', 'sachirathna@gmail.com', 'Sachini#2020', '0719876543', '2000-11-25', 'female');";
    
        //     if($conn->query($lecturer_data)===TRUE){
        //         echo "DATA INSERT successfully";
        //     }else{
        //         echo "Error creating table: ". $conn->error;
        //     }

            
        //DATA INSERT INTO course
        // $course_data = "INSERT INTO course
        //     VALUES
        //     ('c001', 'Data Structures'),
        //     ('c002', 'Computer Networks'),
        //     ('c003', 'Database Management'),
        //     ('c004', 'Programming Fundamentals'),
        //     ('c005', 'Thermodynamics'),
        //     ('c006', 'Fluid Mechanics');";

        //     if($conn->query($course_data)===TRUE){
        //         echo "DATA INSERT successfully";
        //     }else{
        //         echo "Error creating table: ". $conn->error;
        //     }

            $craete_user = "CREATE USER IF NOT EXISTS 'admin_user'@'localhost' IDENTIFIED BY 'admin123';";
            mysqli_query($conn,$craete_user);
            
            $grant_user = "GRANT ALL PRIVILEGES  ON fot_lms.* TO 'admin_user'@'localhost';";
            mysqli_query($conn,$grant_user);

            $create_student = "CREATE USER IF NOT EXISTS 'student_user'@'localhost' IDENTIFIED BY 'student123';";
            mysqli_query($conn, $create_student);

            $grant_student = "GRANT SELECT, UPDATE, DELETE ON fot_lms.student TO 'student_user'@'localhost';";
            mysqli_query($conn, $grant_student);

            $grant_course = "GRANT SELECT, DELETE ON fot_lms.course TO 'student_user'@'localhost';";
            mysqli_query($conn, $grant_course);

            $create_lecturer = "CREATE USER IF NOT EXISTS 'lecturer_user'@'localhost' IDENTIFIED BY 'lecturer123';";
            mysqli_query($conn, $create_lecturer);

               $grant_lecturer = "GRANT SELECT, UPDATE, DELETE ON fot_lms.lecturer TO 'lecturer_user'@'localhost';";
               mysqli_query($conn, $grant_lecturer);

               $grant_course = "GRANT SELECT, DELETE ON fot_lms.course TO 'lecturer_user'@'localhost';";
               mysqli_query($conn,  $grant_course);

               $grant_student = "GRANT SELECT ON fot_lms.student TO 'lecturer_user'@'localhost';";
               mysqli_query($conn, $grant_student);

               $flush = "FLUSH PRIVILEGES;";
               mysqli_query($conn, $flush);


    ?>
</body>
</html>