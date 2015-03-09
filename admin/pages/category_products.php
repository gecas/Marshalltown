<div class="container">
	<center>
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
		if (isset($_GET["cat_id"])) {
			$cat_products = admin_get_cat_products($_GET["cat_id"]);
			if (!empty($cat_products)) {
				$all_lang = get_all_lang();
				?>
				<?php 
					if (isset($_GET["delete_prod_id"])) {
						?>
						<form action="actions/delete_product.php" method="POST">
							Ar tikrai norite ištrinti produktą?
							<input type="hidden" name="prod_id" value="<?php echo $_GET["delete_prod_id"] ?>">
							<input type="hidden" name="cat_id" value="<?php echo $_GET["cat_id"] ?>">
							<input type="submit" name="taip" value="Taip">
							<input type="submit" value="Ne">
						</form>
						<?php
					}
				?>
				
				<table class="category_products_table" border="0" width="100%">
					<th>Paveiksliukas</th>
					<?php 
						foreach ($all_lang as $key) {
							?>
							<th><?php echo $key["title"] ?></th>
							<?php
						}
					?>
					<th colspan="2">Redaguoti</th>
					<?php

					foreach ($cat_products as $key => $value) {
						?>
						<tr >
							<td width="150" height="100">
									<a href="../uploads/<?php echo $value[1]["picture"] ?>" rel="gallery-1" class="swipebox"  >
								<img style="max-width: 100%; max-height: 100%" src="../uploads/<?php echo $value[1]["picture"] ?>">
							</td></a>
							<?php 
								foreach ($value as $key2) {
									?>
									<td><?php echo $key2["title"] ?></td>
									<?php
								}
							?>
							<td>
								<a href="index.php?page=edit_product&product_id=<?php echo $key ?>">Redaguoti</a>
							</td>
							<td>
								<a href="index.php?page=category_products&cat_id=<?php echo $_GET["cat_id"] ?>&delete_prod_id=<?php echo $key ?>">Ištrinti</a>
							</td>
						</tr>
						<?php
					}
					?>
				</table>
				<?php
			}else{
				echo "<h1>Tuščia</h1>";
			}
		}else{
				echo "<h1>Tuščia</h1>";
			}
		?>
	</center>
	<a class="back" href="index.php?page=entity">Atgal</a>
</div>