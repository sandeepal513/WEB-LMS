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
    <div class="sidebar d-flex flex-column align-items-center">
        <div class="profile">
            <img src="./img/lecturer_profile.png" alt="Profile" class="profile-pic">
            <h2>Lecturer</h2>
            <!-- <h6 class="stu-name">STUDENT</h6> -->
            <button class="btn btn-primary">View Profile</button>
        </div>
        <ul class="nav flex-column nav-links w-100 px-3">
            <li class="nav-item active">
                <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">View Courses</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Register Course</a>
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
    <div class="head-content">
        <!-- <header class="d-flex justify-content-center align-content-center mb-4">
            <input type="text" placeholder="Serach Courses...." class="form-control w-25">
        </header> -->
        <div class="head-content">
        <div id="lecturerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/HomeLogo2.png" class="d-block w-100" alt="Welcome Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Welcome to the Lecturer Dashboard</h5>
                        <p>Manage your courses and view student progress.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="teaching1.jpeg" class="d-block w-100" alt="Courses Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>View Available Courses</h5>
                        <p>Browse and manage courses easily.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/background.jpg" class="d-block w-100" alt="Contact Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Connect with Students</h5>
                        <p>Use the contact section to assist your students.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#lecturerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#lecturerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper for Bootstrap Carousel -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFY0EMlMAjlKKgCu9K/2c2e4l4puc6YH93RYC5KNmXCDKlG1Qk0jI4AB7p" crossorigin="anonymous"></script>
</body>
</html>
    </div>
</body>
</html>