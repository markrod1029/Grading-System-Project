<?php
include('../../includes/dbconnection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    
    if ($action == 'add_edit') {
        // Retrieve POST data
        $is_edit = $_POST['is_edit'];
        $student_id = $_POST['student_id'];
        $section_id = $_POST['section_id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $province = $_POST['province'];

        if ($is_edit) {
            // Update student
            $check_query = "SELECT * FROM students WHERE (contact = '$contact' OR email = '$email') AND id != '$student_id'";
            $result = mysqli_query($conn, $check_query);
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['error'] = 'Contact number or email already exists';
            } else {
                $update_query = "UPDATE students SET section_id = '$section_id', fname = '$fname', mname = '$mname', lname = '$lname', contact = '$contact', email = '$email', street = '$street', city = '$city', province = '$province' WHERE id = '$student_id'";
                if (mysqli_query($conn, $update_query)) {
                    $_SESSION['success'] = 'Student updated successfully';
                } else {
                    $_SESSION['error'] = 'Failed to update student: ' . mysqli_error($conn);
                }
            }
        } else {
            // Add new student
            $check_query = "SELECT * FROM students WHERE contact = '$contact' OR email = '$email'";
            $result = mysqli_query($conn, $check_query);
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['error'] = 'Contact number or email already exists';
            } else {
                $year = date("Y");
                $randomNum = mt_rand(1000, 9999);
                $student_id = $year . '-' . $randomNum;
                $password = password_hash($student_id, PASSWORD_DEFAULT);
                $insert_query = "INSERT INTO students (student_id, section_id, fname, mname, lname, contact, email, street, city, province, password, created_at) VALUES ('$student_id', '$section_id', '$fname', '$mname', '$lname', '$contact', '$email', '$street', '$city', '$province', '$password', NOW())";
                if (mysqli_query($conn, $insert_query)) {
                    $_SESSION['success'] = 'Student added successfully';
                } else {
                    $_SESSION['error'] = 'Failed to add student: ' . mysqli_error($conn);
                }
            }
        }
    } elseif ($action == 'delete') {
        // Delete student
        $student_id = $_POST['student_id'];
        $delete_query = "DELETE FROM students WHERE id = '$student_id'";
        if (mysqli_query($conn, $delete_query)) {
            $_SESSION['success'] = 'Student deleted successfully';
        } else {
            $_SESSION['error'] = 'Failed to delete student: ' . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
} else {
    $_SESSION['error'] = 'Invalid request method';
}

// Redirect to student.php regardless of success or failure
header("Location: ../student.php");
exit();
