<?php
session_start(); // Start the session 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column align-items-center">
        <div class="profile">
            <img src="./img/admin_profile.png" alt="Profile" class="profile-pic">
            <h2>Admin Name</h2>
            <h6 class="stu-name">ADMIN</h6>
            <button class="btn btn-primary">View Profile</button>
        </div>
        <ul class="nav flex-column nav-links w-100 px-3">
            <li class="nav-item"><a href="course_view.php" class="nav-link">Courses</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Lecturer</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Student</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Logout</a></li>
        </ul>
    </div>

    <!-- Head Content -->
    <div class="head-content">
        <header class="d-flex justify-content-center align-items-center mb-4">
            <form method="get" action="" class="d-flex w-50">
                <input type="text" name="search" placeholder="Search Courses..." class="form-control me-2" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </header>
        
        <div class="main-content">
            <div class="container my-5">
                <h2 class="text-center mb-4">View Courses</h2>

                <?php
                // Include the database connection
                include 'database.php';

                // Insert button for adding new courses
                echo "<a href='course_insert.php'>
                          <button type='button' class='btn btn-success btn-sm mb-3'>Insert New Course</button>
                      </a>";

                // Check if a delete request was made
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course_code'])) {
                    $courseCode = $conn->real_escape_string($_POST['course_code']);

                    // Prepare the delete statement
                    $sql = "DELETE FROM course WHERE cour_code = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $courseCode);

                    // Execute and provide feedback
                    if ($stmt->execute()) {
                        $_SESSION['success_message'] = "Course with code <strong>$courseCode</strong> was deleted successfully!"; // Store message in session
                    } else {
                        $_SESSION['error_message'] = "Error deleting course: " . $stmt->error; // Store error message in session
                    }
                    $stmt->close();

                    // Redirect to the same page to avoid resubmission
                    header("Location: course_view.php");
                    exit();
                }

                // Display success message
                if (isset($_SESSION['success_message'])) {
                    echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
                    unset($_SESSION['success_message']); // Clear message after displaying
                }

                // Display error message
                if (isset($_SESSION['error_message'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
                    unset($_SESSION['error_message']); // Clear message after displaying
                }

                // Search functionality: check if a search term is provided
                $searchQuery = '';
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $searchTerm = $conn->real_escape_string($_GET['search']);
                    $searchQuery = " WHERE cour_code LIKE '%$searchTerm%' OR cour_name LIKE '%$searchTerm%'";
                }

                // Fetch filtered courses 
                $sql = "SELECT cour_code, cour_name, cour_content FROM course" . $searchQuery;
                $result = $conn->query($sql);

                // Display the courses in a table if there are any results
                if ($result->num_rows > 0) {
                    echo "<table class='table table-bordered table-striped mt-4'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Course Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";

                    // Display each course with actions
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['cour_code']) . "</td>
                                <td>" . htmlspecialchars($row['cour_name']) . "</td>
                                <td><a href='" . htmlspecialchars($row['cour_content']) . "' target='_blank'>View Content</a></td>
                                <td>
                                    <form method='post' action='' class='d-inline'>
                                        <input type='hidden' name='course_code' value='" . htmlspecialchars($row['cour_code']) . "'>
                                        <button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this course?\");'>Delete</button>
                                    </form>
                                    <a href='course_edit.php?course_code=" . htmlspecialchars($row['cour_code']) . "'>
                                        <button type='button' class='btn btn-primary btn-sm'>Edit</button>
                                    </a>
                                </td>
                              </tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-info'>No courses found.</div>";
                }

                // Close the connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
