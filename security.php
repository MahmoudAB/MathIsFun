<?php
	session_start();
	if(!isset($_SESSION['user'])) {
	    header('Location: login.php?request=' . basename($_SERVER["REQUEST_URI"]));
		die();
	}
?>
