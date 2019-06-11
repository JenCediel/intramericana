<?php
	session_start();
	if ( ! isset($_SESSION["PYS_session"])) {
		header("Location: login.php");
	}