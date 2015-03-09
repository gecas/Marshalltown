<div class="container">
	<center>
		<h2><a href="index.php?page=insert_product">Pridėti naują produktą</a></h2>
		<h1>Produktai</h1>
		<?php 
		$cat = admin_get_all_category();
		$all_lang = get_all_lang();
		?>
		<table class="category_products_table" border="0" width="100%">
			<tr style="background-color: #4E8CD1">
				<th>Nr.</th>
				<?php 
					foreach ($all_lang as $key) {
						?>
						<th><?php echo $key["title"] ?></th>
						<?php
					}
				?>
				<th colspan="2">Redaguoti</th>
			</tr>
			<?php
			admin_show_menu2($cat,0);
			?>
		</table>
	</center>
</div>