<?php
	session_start();
    include '../includes/dbconnection.php';
	function getCurrentPage() {
		return basename($_SERVER['PHP_SELF']);
	}
	if(!isset($_SESSION['head']) || trim($_SESSION['head']) == ''){
		header('location: ../index.php');
	}

	$sql = "SELECT * FROM users WHERE id = '".$_SESSION['head']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>