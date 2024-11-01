<?php
// Database connection parameters
$servername = "localhost"; //  necessary
$username = "root"; //  database username
$password = ""; //  database password

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create the database
$sql = "CREATE DATABASE IF NOT EXISTS fot_lms";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Database 'fot_lms' created successfully.<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select the fot_lms database for subsequent operations
$conn->select_db('fot_lms');

// SQL to create user table
$sqlUser = "CREATE TABLE IF NOT EXISTS user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    first_name VARCHAR(20),
    last_name VARCHAR(20),
    email VARCHAR(50) UNIQUE,
    password VARCHAR(16), 
    mb_no VARCHAR(10) UNIQUE,
    dob DATE,
    gender CHAR(6),
    user_status VARCHAR(20),
    CHECK (gender IN ('male', 'female')),
    CHECK (LENGTH(password) >= 8 AND LENGTH(password) <= 16)
);";

if ($conn->query($sqlUser) === TRUE) {
    echo "Table user created successfully.<br>";
} else {
    echo "Error creating table user: " . $conn->error . "<br>";
}

// SQL to create student table
$sqlStudent = "CREATE TABLE IF NOT EXISTS student (
    stu_id CHAR(6) PRIMARY KEY,
    user_id INT,
    stu_username VARCHAR(255) NOT NULL,
    stu_first_name VARCHAR(20),
    stu_last_name VARCHAR(20),
    stu_email VARCHAR(50) UNIQUE,
    stu_password VARCHAR(16),
    stu_mb_no VARCHAR(10) UNIQUE,
    stu_dob DATE,
    stu_gender CHAR(6),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);";

if ($conn->query($sqlStudent) === TRUE) {
    echo "Table student created successfully.<br>";
} else {
    echo "Error creating table student: " . $conn->error . "<br>";
}

// SQL to create lecturer table
$sqlLecturer = "CREATE TABLE IF NOT EXISTS lecturer (
    lect_id CHAR(6) PRIMARY KEY,
    user_id INT,
    lect_username VARCHAR(255) NOT NULL,
    lect_first_name VARCHAR(20),
    lect_last_name VARCHAR(20),
    lect_email VARCHAR(50) UNIQUE,
    lect_password VARCHAR(16),
    lect_mb_no VARCHAR(10) UNIQUE,
    lect_dob DATE,
    lect_gender CHAR(6),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);";

if ($conn->query($sqlLecturer) === TRUE) {
    echo "Table lecturer created successfully.<br>";
} else {
    echo "Error creating table lecturer: " . $conn->error . "<br>";
}

// Handle form submission

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the role is set
    if (!isset($_POST['role']) || empty($_POST['role'])) {
        die("Please select a role (Student or Lecturer).");
    }

    // Retrieve form data
    $role = $_POST['role'];
    $username = $_POST['uname'];
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['pword'];
    $mobileNo = $_POST['mobileno'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

   

   

    // Check if user already exists
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? OR email = ? OR mb_no = ?");
    $stmt->bind_param("ssi", $username, $email, $mobileNo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Error: Username, email, or mobile number already exists.');</script>";
    } else {
         // Insert into user table

        $stmt = $conn->prepare("INSERT INTO user (username, first_name, last_name, email, password, mb_no, dob, gender, user_status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $username, $firstName, $lastName, $email, $password, $mobileNo, $dob, $gender, $role);







        if ($stmt->execute()) {
            $userId = $stmt->insert_id; // Get the last inserted user ID

            // Check user role based on selected button value
            if ($role === 'Student') {
                $stuId = 'S' . str_pad($userId, 3, '0', STR_PAD_LEFT);
                $stmt = $conn->prepare("INSERT INTO student (stu_id, user_id, stu_username, stu_first_name, stu_last_name, stu_email, stu_password, stu_mb_no, stu_dob, stu_gender) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssssss", $stuId, $userId, $username, $firstName, $lastName, $email, $password, $mobileNo, $dob, $gender);

            } elseif ($role === 'Lecturer') {
                $lecId = 'L' . str_pad($userId, 3, '0', STR_PAD_LEFT);
                $stmt = $conn->prepare("INSERT INTO lecturer (lect_id, user_id, lect_username, lect_first_name, lect_last_name, lect_email, lect_password, lect_mb_no, lect_dob, lect_gender) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssssss", $lecId, $userId, $username, $firstName, $lastName, $email, $password, $mobileNo, $dob, $gender);
            }

   // Execute the statement for student or lecturer

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!');</script>";
        echo "<script>window.location.href = 'display.php';</script>";
    } else {
        echo "<script>alert('Error inserting into the student/lecturer table: " . $stmt->error . "');</script>";
    }
} else {
    echo "<script>alert('Error inserting into user table: " . $stmt->error . "');</script>";
}
}
    // Close the statement
    $stmt->close();
    $conn->close();
}

// Close the connection

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration</h1>
    <form action="" method="POST">
        <label for="uname">Username:</label>
        <input type="text" name="uname" required><br>

        <label for="fname">First Name:</label>
        <input type="text" name="fname" required><br>

        <label for="lname">Last Name:</label>
        <input type="text" name="lname" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="pword">Password:</label>
        <input type="password" name="pword" required><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" required><br>

        <label for="mobileno">Mobile No:</label>
        <input type="text" name="mobileno" required><br>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br>

        <label for="roles">Role:</label>
        <select name="roles" required>
            <option value="Student">Student</option>
            <option value="Lecturer">Lecturer</option>
        </select><br>

        <button type="submit">Register</button>
    </form>
    <a href="display.php">Display table</a>
</body>
</html> -->
