<?php
// Database connection parameters
$servername = "localhost"; // necessary
$username = "root"; // Your database username
$password = ""; // Your database password

// Create connection
$conn = new mysqli($servername, $username, $password, "fot_lms");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch records from user table
$userQuery = "SELECT * FROM user";
$userResult = $conn->query($userQuery);

// Fetch records from student table
$studentQuery = "SELECT * FROM student";
$studentResult = $conn->query($studentQuery);

// Fetch records from lecturer table
$lecturerQuery = "SELECT * FROM lecturer";
$lecturerResult = $conn->query($lecturerQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>
</head>
<body>
    <h1>User Records</h1>
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Mobile No</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>User Status</th>
        </tr>
        <?php while($row = $userResult->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['mb_no']; ?></td>
            <td><?php echo $row['dob']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['user_status']; ?></td>

        </tr>
        <?php endwhile; ?>
    </table>

    <h1>Student Records</h1>
    <table border="1">
        <tr>
            <th>Student ID</th>
            <th>User ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>Date of Birth</th>
            <th>Gender</th>
        </tr>
        <?php while($row = $studentResult->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['stu_id']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['stu_username']; ?></td>
            <td><?php echo $row['stu_first_name']; ?></td>
            <td><?php echo $row['stu_last_name']; ?></td>
            <td><?php echo $row['stu_email']; ?></td>
            <td><?php echo $row['stu_mb_no']; ?></td>
            <td><?php echo $row['stu_dob']; ?></td>
            <td><?php echo $row['stu_gender']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h1>Lecturer Records</h1>
    <table border="1">
        <tr>
            <th>Lecturer ID</th>
            <th>User ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>Date of Birth</th>
            <th>Gender</th>
        </tr>
        <?php while($row = $lecturerResult->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['lect_id']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['lect_username']; ?></td>
            <td><?php echo $row['lect_first_name']; ?></td>
            <td><?php echo $row['lect_last_name']; ?></td>
            <td><?php echo $row['lect_email']; ?></td>
            <td><?php echo $row['lect_mb_no']; ?></td>
            <td><?php echo $row['lect_dob']; ?></td>
            <td><?php echo $row['lect_gender']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
