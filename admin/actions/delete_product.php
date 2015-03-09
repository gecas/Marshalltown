<?php
	session_start();
	require_once "../../includes/connection.php";
	require_once "../../includes/function.php";

	if (isset($_POST["taip"], $_POST["prod_id"])) {
		if (!admin_delete_product($_POST["prod_id"])) {
			$_SESSION["error"]="Klaida!";
		}else{
			$_SESSION["message"]="Produktas ištrintas";
		}
	}
	header("Location: ../index.php?page=category_products&cat_id=".$_POST["cat_id"]);

?>