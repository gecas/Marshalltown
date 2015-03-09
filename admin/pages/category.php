<div class="container">
	<center>
		<?php 
			if (isset($_GET["delete_cat_id"])) {
				?>
				<form action="actions/delete_cat.php" method="POST">
					Ar tikrai norite ištrinti kategoriją?
					<input type="hidden" name="cat_id" value="<?php echo $_GET["delete_cat_id"] ?>">
					<input type="submit" name="taip" value="Taip">
					<input type="submit" value="Ne">
				</form>
				<?php
			}
		?>
		<h1>Visos kategorijos</h1>
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
		
		<?php 
			$cat = admin_get_all_category();
			$all_lang = get_all_lang();
			?>
			<table class="category_products_table" border="0" width="100%">
				<tr style="background-color: #003583; color:#fff;">
					<th>Nr.</th>
					<?php 
						foreach ($all_lang as $key) {
							?>
							<th><?php echo $key["title"] ?></th>
							<?php
						}
					?>

					<th colspan="2">Redaguoti/Ištrinti</th>
				</tr>
			<?php
			admin_show_menu($cat,0);
			?>
			</table>
		<?php 
			$categ = admin_get_category();
		?>
		<h1>Nauja kategorija</h1>
		<form action="actions/insert_new_cat.php" method="POST">
			<table border="1" width="100%" class="new-cat">
				<h4>Pradinė kategorija</h4>
				<select name="parent_id" id="">
					<option value="0" selected>Pagrindinis</option>
					<?php 
						foreach ($categ as $key) {
							?>
							<option value="<?php echo $key[0]["cat_id"] ?>"><?php echo $key[0]["title"] ?></option>
							<?php
						}
					?>
				</select>
				<tr>
					<?php 
						foreach ($all_lang as $key) {
							?>
							<td><?php echo $key["title"] ?></td>
							<?php
						}
					?>
				</tr>
				<tr>
					<?php 
						foreach ($all_lang as $key) {
							?>
							<td><input type="text" size='60' name="lang_id[<?php echo $key["id"] ?>]"></td>
							<?php
						}
					?>
					
				</tr>
			</table>
			<input type="submit" value="Pridėti">
		</form>
	</center>
</div>