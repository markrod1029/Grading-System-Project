<?php
session_start();
include 'includes/dbconnection.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query for students table
    $sql_students = "SELECT * FROM students WHERE email = '$email' OR student_id = '$email' ";
    $query_students = $conn->query($sql_students);

    // Query for users table
    $sql_users = "SELECT * FROM users WHERE email = '$email' OR user_id = '$email' ";
    $query_users = $conn->query($sql_users);

    // Check students table
    if ($query_students->num_rows >= 1) {
        $row = $query_students->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['student'] = $row['id'];
            header('location: student/index.php');
            exit();
        } else {
            $_SESSION['error'] = 'Incorrect password';
        }
    }

    // Check users table
    else if ($query_users->num_rows >= 1) {
        $row = $query_users->fetch_assoc();
        $position = $row['position'];
        if (password_verify($password, $row['password'])) {

            if ($position === 'Faculty') {
                $_SESSION['faculty'] = $row['id'];
                header('location:faculty/index.php');

            } else if ($position === 'Principal') {
                $_SESSION['principal'] = $row['id'];
                header('location:principal/index.php');

            } else if ($position === 'Registrar') {
                $_SESSION['admin'] = $row['id'];
                header('location:admin/index.php');


            } else {
                $_SESSION['head'] = $row['id'];
                header('location:headteacher/index.php');

            }
            exit();
        } else {
            $_SESSION['error'] = 'Incorrect password';
        }
    } else {
        $_SESSION['error'] = 'Cannot find account with the email';
    }

    header('location: index.php');
    exit();
}
?>