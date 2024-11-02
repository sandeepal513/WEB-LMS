<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    
    <!--Sidebar-->
    <div class="sidebar d-flex flex-column align-items-center" style="width: 250px; position: fixed; height: 100%; background-color: #f8f9fa;">
        <div class="profile text-center">
            <img src="./img/lecturer_profile.png" alt="Profile" class="profile-pic">
            <h2>Lecturer Name</h2>
            <h6 class="stu-name">LECTURER</h6>
            <button class="btn btn-primary">View Profile</button>
        </div>
        <ul class="nav flex-column nav-links w-100 px-3">
            <li class="nav-item">
                <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">View Courses</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link active">Register Course</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Contact Us</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Logout</a>
            </li>
        </ul>
    </div>

    <!--Head Content-->
    <div class="head-content" style="margin-left: 250px;">
        <header class="d-flex justify-content-center align-content-center mb-4">
            <input type="text" placeholder="Search Courses...." class="form-control w-25">
        </header>

        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4" style="margin-left: 250px;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">All Courses</a>
            </div>
        </nav>

        <div class="main-content">
            <!--Your Content-->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
