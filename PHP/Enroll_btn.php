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
    // Redirect back to the course page with success message
    header("Location: courses.php?status=success");
    exit(); // It's a good practice to call exit after a redirect
} else {
    // Redirect back with an error message
    header("Location: courses.php?status=error");
    exit(); // It's a good practice to call exit after a redirect
}

// Close connection
mysqli_close($conn);
?>
