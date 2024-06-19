<?php
session_start();

include ('../../includes/dbconnection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $action = $_POST['action'];

    if ($action == 'add_edit') {


        $user_id = $_POST['user_id'];
        $is_edit = $_POST['is_edit'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $position = $_POST['position'];

        // Check if the contact number or email already exists
        $check_query = "SELECT * FROM users WHERE (contact = '$contact' OR email = '$email') AND user_id != '$user_id'";
        $result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($result) > 0) {
            // Contact number or email already exists, set error message
            $_SESSION['error'] = 'Contact number or email already exists';
        } else {
            if ($is_edit) {
                // Update existing faculty
                $query = "UPDATE users SET fname='$fname', mname='$mname', lname='$lname', contact='$contact', email='$email', street='$street', city='$city', province='$province', position='$position' WHERE user_id='$user_id'";
                if (mysqli_query($conn, $query)) {
                    $_SESSION['success'] = 'Department updated successfully';
                } else {
                    $_SESSION['error'] = 'Failed to update Faculty: ' . mysqli_error($conn);
                }
            } else {
                // Generate a user ID with the format: YYYY-UNIQUEID-RANDOM
                $year = date("Y");
                $randomNum = mt_rand(1000, 9999);
                $faculty_id = $year . '-' . $randomNum;

                // The password is set to the user ID by default
                $password = password_hash($faculty_id, PASSWORD_DEFAULT);

                // Insert new faculty
                $query = "INSERT INTO users (user_id, fname, mname, lname, contact, position, email, street, city, province, password, created_at) VALUES ('$faculty_id', '$fname', '$mname', '$lname', '$contact', '$position', '$email', '$street', '$city', '$province', '$password', NOW())";
                if (mysqli_query($conn, $query)) {
                    $_SESSION['success'] = 'Department added successfully';
                } else {
                    $_SESSION['error'] = 'Failed to add Faculty: ' . mysqli_error($conn);
                }
            }
        }

    } elseif ($action == 'delete') {
        // Delete student
        $user_id = $_POST['user_id'];
        $position = $_POST['position'];
        $delete_query = "DELETE FROM users WHERE id = '$user_id'";
        if (mysqli_query($conn, $delete_query)) {
            $_SESSION['success'] = 'Department User deleted successfully';
        } else {
            $_SESSION['error'] = 'Failed to delete student: ' . mysqli_error($conn);
        }
    }


    mysqli_close($conn);
}

// Redirect to the faculty list page

if ($position === 'Faculty') {
    header("Location: ../faculty.php");
} else if ($position === 'Principal') {
    header("Location: ../principal.php");
} else {
    header("Location: ../headTeacher.php");
}

exit();
?>