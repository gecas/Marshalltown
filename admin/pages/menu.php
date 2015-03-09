<div class="container">
	<?php 
		$main_menu = admin_get_main_menu();
		?>
		<h1 align="center">Visos meniu kategorijos</h1>
		<table class="category_products_table" border="0" width="100%">
				<tr style="background-color: #003583; color:#fff;">
					<th>Nr.</th>
					<th>Pavadinimas</th>
					<th>Kalba</th>
					<th>Redagavimas</th>
				</tr>
		<?php
		$i = 0;
		foreach ($main_menu as $key => $value) {
			$i++;
			?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $value["menu_title"] ?></td>
				<td><?php echo $value["lang_title"] ?></td>
				<td><a href="index.php?page=edit_menu_page&page_id=<?php echo $value["id"] ?>">Redaguoti</a></td>
			</tr>
			<?php
		}
		?>
		</table>
		<?php
	?>

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
			$meniu = admin_get_all_menu();
			$all_lang = get_all_lang();
			?>
			
		
	</center>
</div>