
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="sidebar d-flex flex-column align-items-center">
        <div class="profile">
            <img src="./img/student_profile.png" alt="Profile" class="profile-pic">
            <h2>Student Name</h2>
            <h6 class="stu-name">STUDENT</h6>
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
                <a href="#" class="nav-link">Apply Course</a>
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
            <header class="d-flex justify-content-center align-content-center mb-4 search-bar">
                <input type="text" placeholder="Serach Courses...." class="form-control w-25">
            </header>       
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>