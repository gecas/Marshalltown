<?php

	require_once "../../includes/connection.php";
	require_once "../../includes/function.php";

	if (isset($_POST["page_id"],$_POST['title'],$_POST['content'])) { 
		admin_edit_page($_POST["page_id"],$_POST['title'], $_POST["content"]);
	}
	
	header("Location: ../index.php?page=menu");

?>