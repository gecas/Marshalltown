<div class="container">
<div class="news">
	<?php 
		$page_content = get_page($_SESSION["lang"], $_GET["page"]);
		if (!empty($page_content)) {
			echo $page_content["page_content"];
		}else{
			echo "Informacijos nera";
		}
	?>
	<p>
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2308.8710378129567!2d25.209213!3d54.641489!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd935f39301e85%3A0xa2af70cc2a7fcd0b!2zxaptxJdkxb5pxbMgZy4gOTAsIFZpbG5pdXMgMDIzMDM!5e0!3m2!1slt!2slt!4v1425482047515" width="600" height="450" frameborder="0" style="border:0"></iframe>
	</p>
	</div>
</div>