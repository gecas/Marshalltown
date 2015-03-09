<div class="container">
	<div class="new-product">
	<center>
		<h1>Naujas įrašas</h1>
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
		<form action="actions/insert_new_post.php" method="POST" enctype="multipart/form-data">
			<h4>Paveiksliukas</h4>
			<input name="picture" type="file">

			

			<h4>Įrašas</h4>
			<table border="0" width="100%" class="category_products_table">
				<tr>
					
					<?php 
						foreach ($all_lang as $key) {
							?>
							<th><?php echo $key["title"] ?><br/></th>
							<?php
						}
					?>

				</tr>

				<tr>
				
					<?php 
						foreach ($all_lang as $key) {
							?>
						
							<td><textarea placeholder="Pavadinimas <?php echo $key["title"]?> " name="title[<?php echo $key["id"]?>]" cols="60" rows="5"></textarea></td>
								<?php
						}
					?>
				</tr>

				<tr>
					
				<?php 
						foreach ($all_lang as $key) {
							?>
							
							<td><textarea id="short" maxlength="250" placeholder="Trumpas aprašymas iki 250 simbolių <?php echo $key["title"]?> "  name="short[<?php echo $key["id"]?>]" cols="60" rows="10" ></textarea></td>
							<?php
						}
						?>
			</tr>
			<tr>
				
					<?php 
						foreach ($all_lang as $key) {
							?>
						
							<td><textarea class="tinymce"  name="text[<?php echo $key["id"]?>]" cols="30" rows="20" ></textarea></td>
							<?php
						}
					?>
				</tr>
			</table>
			<br>
			<input type="submit" value="Pridėti įrašą">
		</form>
	</center>
	<a class="back" href="index.php?page=home">Atgal</a>
	
   </div>
</div>