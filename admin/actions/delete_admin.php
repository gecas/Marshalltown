<?php
	session_start();
	require_once "../../includes/connection.php";
	require_once "../../includes/function.php";

	if (isset($_POST["taip"], $_POST["admin_id"])) {
		if (!admin_delete_admin($_POST["admin_id"])) {
			$_SESSION["error"]="Klaida!";
		}else{
			$_SESSION["message"]="Administratorius ištrintas";
		}
	}
	
	header("Location: ../index.php?page=admins");

?>