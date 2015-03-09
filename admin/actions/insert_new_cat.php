<?php
	require_once "../../includes/connection.php";
	require_once "../../includes/function.php";

	if (isset($_POST["parent_id"], $_POST["lang_id"])) {
		admin_insert_category($_POST["parent_id"], $_POST["lang_id"]);
	}

	header("Location: ../index.php?page=category");

?>