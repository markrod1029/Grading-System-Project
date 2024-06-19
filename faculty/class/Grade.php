<?php
include '../../includes/dbconnection.php';
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $student_id = $_POST['student_id'];
    $user_id = $_POST['user_id'];
    $subject_id = $_POST['subject_id'];
    $first_quarter = $_POST['first'];
    $second_quarter = $_POST['second'];
    $third_quarter = $_POST['third'];
    $fourth_quarter = $_POST['fourth'];
    $final_grade = $_POST['final'];
    $result = $_POST['status'];
    $subject_name = $_POST['subject_name'];
    $batch = $_POST['batch'];
    $teacher_name = $_POST['teacher_name'];

    // Check if grades for the student already exist
    $checkQuery = "SELECT * FROM grade WHERE student_id = '$student_id' AND user_id = '$user_id' AND subject_id = '$subject_id' AND batch = '$batch' ";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Grades already exist, update the existing record
        $updateQuery = "UPDATE grade 
                        SET first_quarter = '$first_quarter', second_quarter = '$second_quarter', third_quarter = '$third_quarter', fourth_quarter = '$fourth_quarter', grade = '$final_grade', result = '$result', updated_at = NOW() 
                        WHERE student_id = '$student_id' AND user_id = '$user_id' AND subject_id = '$subject_id'";

        if (mysqli_query($conn, $updateQuery)) {
            $_SESSION['success'] = 'Grade updated successfully';
        } else {
            $_SESSION['error'] = 'Failed to update grade: ' . mysqli_error($conn);
        }
    } else {
        // Grades do not exist, insert a new record
        $insertQuery = "INSERT INTO grade (student_id, user_id, subject_id, first_quarter, second_quarter, third_quarter, fourth_quarter, grade, result, subject_name, batch, teacher_name, created_at, updated_at) 
                        VALUES ('$student_id', '$user_id', '$subject_id', '$first_quarter', '$second_quarter', '$third_quarter', '$fourth_quarter', '$final_grade', '$result', '$subject_name', '$batch', '$teacher_name', NOW(), NOW())";

        if (mysqli_query($conn, $insertQuery)) {
            $_SESSION['success'] = 'Grade added successfully';
        } else {
            $_SESSION['error'] = 'Failed to add grade: ' . mysqli_error($conn);
        }
    }

    mysqli_close($conn);

    // Redirect to the section page regardless of success or failure
    header("Location: ../gradeResult.php?subject_id=$subject_id&subject_name=$subject_name&class_batch=$batch");

    exit();
}
?>
