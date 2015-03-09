<div class="container">
	<center>

		<h1>Redaguoti meniu</h1>
		<?php 
			$meniu_id = $_GET['menu_id'];
			$lang_id = $_SESSION['lang'];
			$menu = admin_get_menu_data($meniu_id);
			?>
			
			<?php
			$all_lang = get_all_lang();
		?>
		<?php
	    	if (isset($_SESSION["error"])) {
				echo "<h4 style='color: red;'>".$_SESSION["error"]."</h4>";
				unset($_SESSION["error"]);
			}
			if (isset($_SESSION["message"])) {
				echo "<h4 style='color: green;'>".$_SESSION["message"]."</h4>";
				unset($_SESSION["message"]);
			}
		?>
		<form action="actions/edit_menu.php" method="POST" enctype="multipart/form-data">

			<h4>Įrašas</h4>
			<table border="0" width="100%">
				<tr>
					<th>Kalba</th>
					<th>Tekstas</th>
					<?php 
						/*foreach ($all_lang as $key) {
							?>
							<th><?php echo $key["title"] ?></th>
							<?php
						}*/
					?>
				</tr>
					<?php 
						foreach ($all_lang as $key) {
							?>
							<tr>
								<td><?php echo $key["title"] ?></td>
								<!--<td ><input name="title[<?php echo $key["id"]?>]" type="text" size='60' value="<?php echo $post[1][$key["id"]]["lang_news_title"] ?>"></td>
								-->
								
								<td><textarea name="text[<?php echo $key["id"]?>]" class="tinymce" cols="60" rows="15"><?php echo $menu["page_content"][$key["id"]] ?></textarea></td>
								
							</tr>
							<tr height="15"></tr>
							<?php
						}
					?>
				
			</table>
			<br>
			<input type="hidden" name="menu_id" value="<?php echo $_GET['menu_id'] ?>">
			<input type="submit" value="Redaguoti įrašą">
		</form>
	</center>
	<a class="back" href="index.php?page=home">Atgal</a>
</div>