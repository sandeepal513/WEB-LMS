<?php

    $adm_conn = mysqli_connect('localhost','admin_user','admin123','fot_lms');

    if ($conn ->connect_error) {
        die("Connection  failed: " . $conn->connect_error);
        exit();
    }

?>