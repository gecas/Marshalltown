<?php
	session_start();
	require_once "../../includes/connection.php";
	require_once "../../includes/function.php";

	if (isset( $_POST["title"], $_POST["text"],$_POST['short'], $_FILES["picture"])) {
		if (admin_insert_post($_POST["title"], $_POST["text"],$_POST['short'], $_FILES["picture"])) {
			$_SESSION["message"]= "Įrašas įkeltas";
		}else{
			$_SESSION["error"]= "Klaida, įrašas neįkeltas, nepasirinktas failas.";
		}
	}else{
		$_SESSION["error"]= "Klaida";
	}
	header("Location: ../index.php?page=new_post");

?>