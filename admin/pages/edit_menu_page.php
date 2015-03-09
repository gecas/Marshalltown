<div class="container">
	<center>
		<?php 
			$page_id = (int)$_GET["page_id"];
			$page_data = admin_get_page_data($page_id);
		?>
		<form action="actions/edit_menu.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="page_id" value="<?php echo $page_id ?>">
			<table border="0" width="100%">
				<tr>
					<th colspan="2">Puslapio redagavimas</th>
				</tr>
				<tr>
					<td>Title</td>
					<td><textarea style="width: 100%; text-align: center" name="title" id="" rows="1"><?php echo $page_data["menu_title"] ?></textarea></td>
				</tr>
				<tr>
					<td>Content</td>
					<td><textarea name="content" class="tinymce" cols="30" rows="10"><?php echo $page_data["page_content"] ?></textarea></td>
				</tr>
				<tr bgcolor="#555">
					<td colspan="2" align="right" ><input type="submit" value="Išsaugoti"></td>
				</tr>
			</table>
		</form>
	</center>
</div>