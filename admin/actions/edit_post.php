<?php
	session_start();
	require_once "../../includes/connection.php";
	require_once "../../includes/function.php";

	if (isset($_POST["post_id"], $_POST["post_pic"], $_POST["title"], $_POST["text"],$_POST["short"], $_FILES["picture"])) {
		if (admin_edit_post($_POST["post_id"], $_POST["post_pic"], $_POST["title"], $_POST["text"], $_POST["short"],$_FILES["picture"])) {
			$_SESSION["message"]= "Naujiena pakeista";
		}else{
			$_SESSION["error"]= "Klaida";
		}
	}else{
		$_SESSION["error"]= "Klaida";
	}
	header("Location: ../index.php?page=home");

?>