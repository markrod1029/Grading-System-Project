<?php
session_start();
include ('../../includes/dbconnection.php'); // Include mo ang database connection script mo dito

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kunin ang POST data mula sa form
    $action = $_POST['action'];

    if ($action === 'profile') {

        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $province = $_POST['province'];

        // Gumawa ng SQL query para i-update ang user profile
        $query = "UPDATE students SET fname='$fname', mname='$mname', lname='$lname', email='$email', contact='$contact', street='$street', city='$city', province='$province' WHERE id='$id'";
        // I-execute ang query
        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = 'Profile updated successfully';

            header("Location: ../updateProfile.php"); // Redirect sa dashboard o sa appropriate na page pagkatapos ng update
            exit();
        } else {
            $_SESSION['error'] = 'Error updating profile: ' . mysqli_error($conn);
            header("Location: ../updateProfile.php"); // Redirect sa dashboard o sa appropriate na page kung may error
            exit();
        }

    } else if ($action === 'password') {

        $id = $_POST['id'];
        $old_password = $_POST['old'];
        $new_password = $_POST['new'];
        $confirm_password = $_POST['confirm'];

        // Validate if old password matches with database
        $query_check_password = "SELECT password FROM users WHERE id = '$id'";
        $result_check_password = mysqli_query($conn, $query_check_password);
        $row = mysqli_fetch_assoc($result_check_password);
        $db_password = $row['password'];

        if (password_verify($old_password, $db_password)) {
            // Old password matches, proceed with updating password
            if ($new_password === $confirm_password) {
                // New passwords match, update password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $query_update_password = "UPDATE students SET password='$hashed_password' WHERE id='$id'";
                if (mysqli_query($conn, $query_update_password)) {
                    $_SESSION['success'] = 'Profile and password updated successfully';
                } else {
                    $_SESSION['error'] = 'Error updating password: ' . mysqli_error($conn);
                }
            } else {
                $_SESSION['error'] = 'New passwords do not match';
            }
        } else {
            $_SESSION['error'] = 'Old password does not match';
        }
        header("Location: ../updatePassword.php");

        exit();
    }


} else {
    // Redirect sa appropriate na page kung hindi POST request
    header("Location: ../dashboard.php");
    exit();
}


mysqli_close($conn); // Isara ang database connection
?>