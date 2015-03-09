<?php
	session_start();
	require_once "../../includes/connection.php";
	require_once "../../includes/function.php";

	if (isset($_POST["category_id"], $_POST["title"], $_FILES["picture"])) {
		if (admin_insert_product($_POST["category_id"], $_POST["title"], $_FILES["picture"])) {
			$_SESSION["message"]= "Produktas įkeltas";
		}else{
			$_SESSION["error"]= "Klaida";
		}
	}else{
		$_SESSION["error"]= "Klaida";
	}
	header("Location: ../index.php?page=insert_product");

?>