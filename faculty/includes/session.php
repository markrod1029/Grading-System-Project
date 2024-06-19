<?php
	session_start();
    include '../includes/dbconnection.php';


	function getCurrentPage() {
		return basename($_SERVER['PHP_SELF']);
	}
	
	
	if(!isset($_SESSION['faculty']) || trim($_SESSION['faculty']) == ''){
		header('location: ../index.php');
	}

	$sql = "SELECT * FROM users WHERE id = '".$_SESSION['faculty']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
	$teacher_id = $_SESSION['faculty'];
?>