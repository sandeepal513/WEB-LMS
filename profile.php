<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "fot_lms";
$port = "3308";

$conn = new mysqli($hostname, $username, $password, $db_name, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stu_id = 1; // Set this to the specific student ID you want to display
$sql = "SELECT * FROM student WHERE stu_id = 's001'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No data found.";
    exit;
}

if (isset($_POST['save_changes'])) {
    $stu_username = $_POST['stu_username'];
    $stu_first_name = $_POST['stu_first_name'];
    $stu_last_name = $_POST['stu_last_name'];
    $stu_email = $_POST['stu_email'];
    $stu_password = $_POST['stu_password'];
    $stu_mb_no = $_POST['stu_mb_no'];
    $stu_dob = $_POST['stu_dob'];
    $stu_gender = $_POST['stu_gender'];

    $update_sql = "UPDATE student SET 
                   stu_username='$stu_username', 
                   stu_first_name='$stu_first_name', 
                   stu_last_name='$stu_last_name', 
                   stu_email='$stu_email', 
                   stu_password='$stu_password', 
                   stu_mb_no='$stu_mb_no', 
                   stu_dob='$stu_dob', 
                   stu_gender='$stu_gender' 
                   WHERE stu_id='$stu_id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<div class='alert alert-success text-center'>Record updated successfully!</div>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-color:#eae0cc">
    <div class="container mt-5">
        <h3 class="stuheading text-center mb-4 p-2" style="background-color: #C3E7B3">Student Profile</h3>

        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-5">
                <tr>
                    <th>Student ID</th>
                    <td><?php echo $row['stu_id']; ?></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><?php echo $row['stu_username']; ?></td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td><?php echo $row['stu_first_name']; ?></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><?php echo $row['stu_last_name']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $row['stu_email']; ?></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><?php echo $row['stu_password']; ?></td>
                </tr>
                <tr>
                    <th>Mobile No</th>
                    <td><?php echo $row['stu_mb_no']; ?></td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td><?php echo $row['stu_dob']; ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?php echo $row['stu_gender']; ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <button class="btn btn-primary btn-sm w-25" onclick="editRecord(<?php echo htmlspecialchars(json_encode($row)); ?>)">Edit Profile</button>
                    </td>
                </tr>
            </table>
        </div>

        <div id="editModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form method="post" action="">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Student Record</h5>
                            <button type="button" class="btn-close" onclick="closeModal()" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="stu_id" id="stu_id" value="<?php echo $row['stu_id']; ?>">
                            <div class="mb-3">
                                <label for="stu_username" class="form-label">Username</label>
                                <input type="text" name="stu_username" id="stu_username" class="form-control" value="<?php echo $row['stu_username']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="stu_first_name" class="form-label">First Name</label>
                                <input type="text" name="stu_first_name" id="stu_first_name" class="form-control" value="<?php echo $row['stu_first_name']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="stu_last_name" class="form-label">Last Name</label>
                                <input type="text" name="stu_last_name" id="stu_last_name" class="form-control" value="<?php echo $row['stu_last_name']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="stu_email" class="form-label">Email</label>
                                <input type="email" name="stu_email" id="stu_email" class="form-control" value="<?php echo $row['stu_email']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="stu_password" class="form-label">Password</label>
                                <input type="password" name="stu_password" id="stu_password" class="form-control" value="<?php echo $row['stu_password']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="stu_mb_no" class="form-label">Mobile No</label>
                                <input type="text" name="stu_mb_no" id="stu_mb_no" class="form-control" value="<?php echo $row['stu_mb_no']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="stu_dob" class="form-label">Date of Birth</label>
                                <input type="date" name="stu_dob" id="stu_dob" class="form-control" value="<?php echo $row['stu_dob']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="stu_gender" class="form-label">Gender</label>
                                <select name="stu_gender" id="stu_gender" class="form-select">
                                    <option value="male" <?php echo ($row['stu_gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                                    <option value="female" <?php echo ($row['stu_gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="save_changes" class="btn btn-success">Save Changes</button>
                            <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editRecord(data) {
            document.getElementById('editModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>
</body>
</html>


