<?php
	session_start();
    include '../includes/dbconnection.php';

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: ../index.php');
	}

	$sql = "SELECT * FROM users WHERE id = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();

	function getCurrentPage() {
		return basename($_SERVER['PHP_SELF']);
	}
	
?>