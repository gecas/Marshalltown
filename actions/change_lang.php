<?php 
	session_start();
	require_once "../includes/connection.php";

	if (isset($_GET["lang"])) {
		$check = mysqli_query($DB, "SELECT id FROM lang WHERE id='".(int)$_GET["lang"]."'");
		$count = mysqli_num_rows($check);
		if ($count > 0) {
			$_SESSION["lang"] = (int)$_GET["lang"];
		}
		header("Location: ".$_SERVER["HTTP_REFERER"]);
	}else{
		header("Location: ".$_SERVER["HTTP_REFERER"]);
	}
?>