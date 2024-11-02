<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fot_lms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch courses from the database
$sql = "SELECT cour_code, cour_name, cour_content FROM course";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Course Catalog</title>
    <style>
        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
    </style>
</head>
<body>

<div class="main-content container mt-4">
    <div class="row">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/250x140" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <h5 class="course-title"><?php echo htmlspecialchars($row['cour_name']); ?></h5>
                            <p class="course-author">Course Code: <?php echo htmlspecialchars($row['cour_code']); ?></p>
                            <div class="star-rating">★★★★★</div>
                            <div>
                            <button class="btn btn-primary">
                                <span>Start Course</span>
                            </button>

                        </div>
                       
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No courses available.</p>
        <?php endif; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
