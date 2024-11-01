<?php

    $stu_conn = mysqli_connect('localhost','student_user','student123','fot_lms');

    if ($conn ->connect_error) {
        die("Connection  failed: " . $conn->connect_error);
        exit();
    }

?>