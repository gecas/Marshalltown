<div class="container">
	<center>

		<h1>Redaguoti produktą</h1>
		<?php 
			$product_id = $_GET['product_id'];
			$prod = admin_get_product_data($product_id);
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
		<form action="actions/edit_product.php" method="POST" enctype="multipart/form-data">
			<h4>Paveiksliukas</h4>
			<div style="margin: 0 auto; width: 100px; height: 100px;">
				<img style="max-width: 100%; max-height: 100%;" src="../uploads/<?php echo $prod[0]["picture"] ?>">
			</div>
			<input name="picture" type="file">

			<h4>Kategorija</h4>
			<select name="category_id">
			<?php
				$cat = admin_get_all_category();
				admin_show_menu4($cat,0, $prod[0]["cat_id"]);
			?>
			</select>

			<h4>Įrašas</h4>
			<table border="0" width="100%">
				<tr>
					<th>Kalba</th>
					<?php 
						foreach ($all_lang as $key) {
							?>
							<th><?php echo $key["title"] ?></th>
							<?php
						}
					?>
				</tr>
				<tr>
					<td>Pavadinimas</td>
					<?php 
						foreach ($all_lang as $key) {
							?>
							<td><input name="title[<?php echo $key["id"]?>]" type="text" size='60' value="<?php echo $prod[1][$key["id"]]["title"] ?>"></td>
							<?php
						}
					?>
				</tr>
				
			</table>
			<br>
			<input type="hidden" name="product_id" value="<?php echo $_GET['product_id'] ?>">
			<input type="hidden" name="product_pic" value="<?php echo $prod[0]["picture"] ?>">
			<input type="submit" value="Redaguoti įrašą">
		</form>
	</center>
	<a class="back" href="index.php?page=category_products&cat_id=<?php echo $prod[0]["cat_id"] ?>">Atgal</a>
</div>