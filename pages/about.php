<div class="container">
<div class="news">
<?php 
		$page_content = get_page($_SESSION["lang"], $_GET["page"]);
		if (!empty($page_content)) {
			echo $page_content['page_content'];
		}else{
			echo "Informacijos šiame puslapyje nėra";
		}
	?>
	
	</div>

</div>