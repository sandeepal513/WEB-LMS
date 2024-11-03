<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fot_lms";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get data from the POST request and escape it to prevent SQL injection
$cour_code = mysqli_real_escape_string($conn, $_POST['cour_code']);
$lect_id = mysqli_real_escape_string($conn, $_POST['lect_id']);

// Insert into stu_course table
$sql = "INSERT INTO lect_course (cour_code, lect_id) VALUES ('c003','l001')";//VALUES ($cour_code, $lect_id)

if (mysqli_query($conn, $sql)) {
    header("Location: Lecturer _Register_course.php?status=success");
    exit();
} else {
    // Log error for debugging
    error_log("MySQL Error: " . mysqli_error($conn));
    header("Location: Lecturer _Register_course.php?status=error");
    exit();
}


// Close connection
mysqli_close($conn);
?>