<div class="container">
	<center>

		<h1>Redaguoti įrašą</h1>
		<?php 
			$post_id = $_GET['post_id'];
			$post = admin_get_post_data($post_id);
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
		<form action="actions/edit_post.php" method="POST" enctype="multipart/form-data">
			<h4>Paveiksliukas</h4>
			<div style="margin: 0 auto; width: 100px; height: 100px;">
				<img style="max-width: 100%; max-height: 100%;" src="../uploads/<?php echo $post[0]["news_picture"] ?>">
			</div>
			<input name="picture" type="file">

			

			<h4>Įrašas</h4>
			<table border="0" width="100%">
				<tr>
					
					<?php 
						foreach ($all_lang as $key) {
							?>
							<th><?php echo $key["title"] ?></th>
							<?php
						}
					?>
				</tr>
					
							<tr>
							<?php 
						foreach ($all_lang as $key) {
							?>
								<td><textarea name="title[<?php echo $key["id"]?>]" cols="60" rows="5"><?php echo $post[1][$key["id"]]["lang_news_title"] ?></textarea></td>
									<?php
						}
					?>
								
							</tr>

							

							<tr>
								
								<?php
								foreach ($all_lang as $key) {
							?>
							
							<td><textarea maxlength="250" name="short[<?php echo $key["id"]?>]" cols="60" rows="10"><?php echo $post[1][$key["id"]]["lang_short_text"] ?></textarea></td>
								<?php
						}
					?>
							</tr>
								<?php
								foreach ($all_lang as $key) {
							?>
							<td>
							<textarea name="text[<?php echo $key["id"]?>]" class="tinymce" cols="60" rows="15"><?php echo $post[1][$key["id"]]["lang_news_text"] ?></textarea></td>
										<?php
						}
					?>
							<tr/>
						
				
			</table>
			<br>
			<input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?>">
			<input type="hidden" name="post_pic" value="<?php echo $post[0]["news_picture"] ?>">
			<input type="submit" value="Redaguoti įrašą">
		</form>
	</center>
	<a class="back" href="index.php?page=home">Atgal</a>
</div>