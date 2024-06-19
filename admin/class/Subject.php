<?php
include('../../includes/dbconnection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    
    if ($action == 'add_edit') {

    $subject_id = $_POST['subject_id'];
    $is_edit = $_POST['is_edit'];
    $subject = $_POST['subject'];

    if ($is_edit) {
        // Update existing subject
        $query = "UPDATE subjects SET name = '$subject', updated_at = NOW() WHERE id = '$subject_id'";
        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = 'Subject updated successfully';
        } else {
            $_SESSION['error'] = 'Failed to update subject: ' . mysqli_error($conn);
        }
    } else {
        // Add new subject
        // Check if the subject already exists
        $check_query = "SELECT * FROM subjects WHERE name = '$subject'";
        $result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($result) > 0) {
            // Subject already exists, set error message
            $_SESSION['error'] = 'Subject already exists';
        } else {
            // Subject does not exist, proceed with insertion
            // Generate a Subject ID with the format: RANDOM
            $randomNum = mt_rand(1000, 9999);
            $subject_code = $randomNum;

            $query = "INSERT INTO subjects (subject_code, name, created_at) VALUES ('$subject_code', '$subject', NOW())";
            if (mysqli_query($conn, $query)) {
                $_SESSION['success'] = 'Subject added successfully';
            } else {
                $_SESSION['error'] = 'Failed to add subject: ' . mysqli_error($conn);
            }
        }
    }


} elseif ($action == 'delete') {
    // Delete student
    $subject_id = $_POST['subject_id'];
    $delete_query = "DELETE FROM subjects WHERE id = '$subject_id'";
    if (mysqli_query($conn, $delete_query)) {
        $_SESSION['success'] = 'Subject deleted successfully';
    } else {
        $_SESSION['error'] = 'Failed to delete student: ' . mysqli_error($conn);
    }
}

    mysqli_close($conn);
}

// Redirect to subjects.php regardless of success or failure
header("Location: ../subject.php");
exit();
