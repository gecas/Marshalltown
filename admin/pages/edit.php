<div class="container">
	<center>
		<h1>Redaguoti kategoriją</h1>
		<?php 
			$cat_id = $_GET["cat_id"];
			$categ = admin_get_category_data($cat_id);
			?>
			<form action="actions/edit_cat.php" method="POST">
			<table width="100%" align="center">
			<th>Kalba</th>
			<th>Kategorija</th>
				<?php
				foreach ($categ as $key) {
					?>
					<tr>
						<td><?php echo $key["lang_title"] ?></td>
						<td><input type="text" size="180" style="height:30px;" value="<?php echo $key["title"] ?>" name="title[<?php echo $key["lang_cat_id"] ?>]"></td>
					</tr>
					<?php
				}
		?>	
			</table>
			<input type="submit" value="Redaguoti">
		</form>
	</center>
	<a class="back" href="index.php?page=category">Atgal</a>
</div>