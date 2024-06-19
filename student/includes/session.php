<?php
	session_start();
    include '../includes/dbconnection.php';
	function getCurrentPage() {
		return basename($_SERVER['PHP_SELF']);
	}
	if(!isset($_SESSION['student']) || trim($_SESSION['student']) == ''){
		header('location: ../index.php');
	}

	$sql = "SELECT * FROM students WHERE id = '".$_SESSION['student']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	$student_id = $_SESSION['student'];
?>