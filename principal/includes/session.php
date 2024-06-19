<?php
	session_start();
    include '../includes/dbconnection.php';

	function getCurrentPage() {
		return basename($_SERVER['PHP_SELF']);
	}
	
	if(!isset($_SESSION['principal']) || trim($_SESSION['principal']) == ''){
		header('location: ../index.php');
	}

	$sql = "SELECT * FROM users WHERE id = '".$_SESSION['principal']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>