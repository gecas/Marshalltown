<?php
	session_start();
	require_once "../../includes/connection.php";
	require_once "../../includes/function.php";

	if (isset( $_POST['user'],  $_POST['pass'])) {
		checkadm($_POST['user'],$_POST['pass']);
	}
	header("Location: ../index.php");

?>