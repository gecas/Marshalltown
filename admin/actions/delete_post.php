<?php
	session_start();
	require_once "../../includes/connection.php";
	require_once "../../includes/function.php";

	if (isset($_POST["taip"], $_POST["news_id"])) {
		if (!admin_delete_post($_POST["news_id"])) {
			$_SESSION["error"]="Klaida!";
		}else{
			$_SESSION["message"]="Įrašas ištrintas";
		}
	}
	header("Location: ../index.php?page=home");

?>