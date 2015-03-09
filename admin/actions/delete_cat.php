<?php
	session_start();
	require_once "../../includes/connection.php";
	require_once "../../includes/function.php";

	if (isset($_POST["taip"], $_POST["cat_id"])) {
		if (!admin_delete_category($_POST["cat_id"])) {
			$_SESSION["error"]="Klaida!";
		}else{
			$_SESSION["message"]="Kategorija ištrinta";
		}
	}
	
	header("Location: ../index.php?page=category");

?>