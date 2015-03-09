<div class="container">
	<div class="new-product">
	<center>
		<h1>Naujas produktas</h1>
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
		<form action="actions/insert_new_product.php" method="POST" enctype="multipart/form-data">
			<h4>Paveiksliukas</h4>
			<input name="picture" type="file">

			<h4>Kategorija</h4>
			<select name="category_id">
			<?php
				$cat = admin_get_all_category();
				admin_show_menu3($cat,0);
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
							<td><input name="title[<?php echo $key["id"]?>]" type="text" size='60' max-lenth='60' ></td>
							<?php
						}
					?>
				</tr>
			
			</table>
			<br>
			<input type="submit" value="Pridėti įrašą">
		</form>
	</center>
	<a class="back" href="index.php?page=entity">Atgal</a>
	
   </div>
</div>