<?php
	session_start();
	require_once "includes/constants.php";

	require_once INCLUDES_ROOT."connection.php";
	require_once INCLUDES_ROOT."function.php";

	if (!isset($_SESSION["lang"]) || empty($_SESSION["lang"])){
		$_SESSION["lang"] = 1;
	}
	
	require_once TEMPLATE_ROOT."header.php";
	require_once TEMPLATE_ROOT."menu.php";

	if (isset($_GET["page"])) {
		$page = trim(strip_tags($_GET["page"]));
		if (file_exists(PAGES_ROOT.$page.".php")) {
			require_once PAGES_ROOT.$page.".php";
		}else{
			require_once PAGES_ROOT."error.php";
		}
	}else{
		require_once PAGES_ROOT."home.php";
	}

	require_once TEMPLATE_ROOT."footer.php";
 ?>