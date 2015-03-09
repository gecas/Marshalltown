<?php

	require_once "../../includes/connection.php";
	require_once "../../includes/function.php";

	if (isset($_POST["title"])) {
		admin_edit_category($_POST["title"]);
	}
	
	header("Location: ../index.php?page=category");

?>