<?php
	session_start();
	require_once "../../includes/connection.php";
	require_once "../../includes/function.php";

	if (isset($_POST["product_id"], $_POST["product_pic"], $_POST["category_id"], $_POST["title"],  $_FILES["picture"])) {
		if (admin_edit_product($_POST["product_id"], $_POST["product_pic"], $_POST["category_id"], $_POST["title"],  $_FILES["picture"])) {
			$_SESSION["message"]= "Produktas pakeistas";
		}else{
			$_SESSION["error"]= "Klaida";
		}
	}else{
		$_SESSION["error"]= "Klaida";
	}
	header("Location: ../index.php?page=category_products&cat_id=".$_POST["category_id"]);

?>