<?php

    $adm_conn = mysqli_connect('localhost','admin_user','admin123','fot_lms');

    if ($adm_conn ->connect_error) {
        die("Connection  failed: " . $adm_conn->connect_error);
        exit();
    }
    //echo "Connection established";

?>