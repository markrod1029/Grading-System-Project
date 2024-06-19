<?php
session_start();

include ('../../includes/dbconnection.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'add') {

        $subject_id = $_POST['subject'];
        $faculty_id = $_POST['faculty'];
        $section_id = $_POST['section_id'];
        $batch_year = $_POST['batch_year'];

        // Query para i-check kung mayroon nang class na may parehong subject at faculty
        $check_query = "SELECT * FROM class WHERE subject_id = '$subject_id' AND user_id = '$faculty_id' AND batch = '$batch_year'";
        $result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($result) > 0) {
            // Kung may existing na class na parehong subject at faculty
            $_SESSION['error'] = 'Class with the same subject and faculty already exists';
        } else {
            // Kung wala pang existing na class na parehong subject at faculty, mag-insert ng bagong class
            $query = "INSERT INTO class (subject_id, user_id, section_id, batch, created_at) VALUES ('$subject_id', '$faculty_id', '$section_id', '$batch_year', NOW())";

            if (mysqli_query($conn, $query)) {
                // Kapag matagumpay na na-insert ang bagong class
                $_SESSION['success'] = 'New class added successfully';
            } else {
                // Kapag may error sa pag-insert ng class
                $_SESSION['error'] = 'Failed to add class: ' . mysqli_error($conn);
            }
        }

    } elseif ($action == 'delete') {
        $class_id = $_POST['class_id'];
        $query = "DELETE FROM class WHERE id = '$class_id'";
        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = 'Class deleted successfully';
        } else {
            $_SESSION['error'] = 'Failed to delete section: ' . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = 'Invalid action';
    }


    mysqli_close($conn);
}

// Redirect pabalik sa view ng subjects pagkatapos mag-insert ng Class
header("Location: ../class.php");
exit();
?>