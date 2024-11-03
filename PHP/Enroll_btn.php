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
$stu_id = mysqli_real_escape_string($conn, $_POST['stu_id']);

// Insert into stu_course table
$sql = "INSERT INTO stu_course (cour_code, stu_id) VALUES ('c003', 's001')";

if (mysqli_query($conn, $sql)) {
    header("Location: Student _Register_course.php?status=success");
    exit();
} else {
    // Log error for debugging
    error_log("MySQL Error: " . mysqli_error($conn));
    header("Location: Student _Register_course.php?status=error");
    exit();
}


// Close connection
mysqli_close($conn);
?>
