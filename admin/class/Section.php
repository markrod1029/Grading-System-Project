<?php
include('../../includes/dbconnection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'add_edit') {
        $section_id = $_POST['section_id'];
        $is_edit = $_POST['is_edit'];
        $section = $_POST['section'];
        $code = $_POST['code'];

        if ($is_edit) {
            // Update existing section
            $query = "UPDATE section SET section_name = '$section', room_code = '$code', updated_at = NOW() WHERE id = '$section_id'";
            if (mysqli_query($conn, $query)) {
                $_SESSION['success'] = 'Section updated successfully';
            } else {
                $_SESSION['error'] = 'Failed to update section: ' . mysqli_error($conn);
            }
        } else {
            // Add new section
            // Check if the section already exists
            $check_query = "SELECT * FROM section WHERE section_name = '$section'";
            $result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($result) > 0) {
                // Section already exists, set error message
                $_SESSION['error'] = 'Section already exists';
            } else {
                // Section does not exist, proceed with insertion
                $query = "INSERT INTO section (room_code, section_name, created_at) VALUES ('$code', '$section', NOW())";
                if (mysqli_query($conn, $query)) {
                    $_SESSION['success'] = 'Section added successfully';
                } else {
                    $_SESSION['error'] = 'Failed to add section: ' . mysqli_error($conn);
                }
            }
        }
    } elseif ($action == 'delete') {
        $section_id = $_POST['section_id'];
        $query = "DELETE FROM section WHERE id = '$section_id'";
        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = 'Section deleted successfully';
        } else {
            $_SESSION['error'] = 'Failed to delete section: ' . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = 'Invalid action';
    }

    mysqli_close($conn);
    header("Location: ../section.php");
    exit();
} else {
    $_SESSION['error'] = 'Invalid request method';
    header("Location: ../section.php");
    exit();
}
