

<div class="container">
<?php 
	if (isset($_GET["delete_post"])) {
		?>
		<form action="actions/delete_post.php" method="POST">
			Ar tikrai norite ištrinti naujieną?
			<input type="hidden" name="news_id" value="<?php echo $_GET["delete_post"] ?>">
			<input type="submit" name="taip" value="Taip">
			<input type="submit" value="Ne">
		</form>
		<?php
	}
	if (isset($_SESSION["error"])) {
		echo "<h4 style='color: red;'>".$_SESSION["error"]."</h4>";
		unset($_SESSION["error"]);
	}
	if (isset($_SESSION["message"])) {
		echo "<h4 style='color: green;'>".$_SESSION["message"]."</h4>";
		unset($_SESSION["message"]);
	}
?>
<div class="all_posts">
<table align="center" bgcolor="" width="100%" class="category_products_table">

<tr bgcolor="#ccc">
<td colspan="8" align="center">
<h2><a href="index.php?page=new_post">Naujas įrašas</a></h2>
<h1>Visi įrašai</h1>
</td>
</tr>

<tr>
	<th>Įrašo_id</th>
	<th>Pavadinimas</th>
	<th>Peržiūra</th>
	<th>Paveiksliukas</th>
	<th>Kalba</th>
	<th>Redaguoti</th>
	<th>Ištrinti</th>
</tr>

<?php


	

	$run_posts=mysqli_query($DB,"SELECT lang_news.lang_news_title, lang_news.lang_id, lang_news.lang_news_text, lang_news.lang_id, lang.id,lang.title, news.news_picture, news.news_id FROM news, lang_news,lang WHERE news.news_id=lang_news.news_id AND lang.id=lang_news.lang_id ORDER BY news.news_id DESC, lang.id ");
	$i=0;

	while($row_posts=mysqli_fetch_assoc($run_posts)){
		$i++;
		$post_id = $row_posts['news_id'];
		$post_title=$row_posts['lang_news_title'];
		$post_text=$row_posts['lang_news_text'].'...';
		$post_picture=$row_posts['news_picture'];
		$post_lang=$row_posts['title'];
		$post_lang_id=$row_posts['lang_id'];
?>
	<?php if (!empty($post_title)&&!empty($post_text)) {
	
	?>
		<tr align="center">
			<td ><?php echo $post_id ?></td>
			<td ><a href="index.php?page=detail&lang_id=<?php echo $post_lang_id ?>&news_id=<?php echo $post_id ?>"><?php echo $post_title?></a></td>
			<td ><?php //echo $post_text ?><a href="index.php?page=detail&lang_id=<?php echo $post_lang_id ?>&news_id=<?php echo $post_id ?>">Peržiūrėti</a></td>
			<td >
			<a href="../uploads/<?php echo $post_picture; ?>" rel="gallery-1" class="swipebox"><img width="120" height="120"src="../uploads/<?php echo $post_picture; ?>" style="max-width:100%;max-height:150%;"></a></td>
			<td ><?php echo $post_lang ?></td>
			<?php 
				if (($i+2) % 3 == 0) { 
					?>
					<td rowspan="3"><a href="index.php?page=edit_post&post_id=<?php echo $post_id ?>">Redaguoti</a></td>
					<td rowspan="3"><a href="index.php?page=home&delete_post=<?php echo $post_id ?>">Ištrinti įrašą</a></td>
				<?php
				}
			 } 

		?>

		</tr>
		<?php
		if ($i % 3 == 0) {
			?>
			<tr  >
				<td style="background-color: white; height: 5px"></td>
				<td style="background-color: white; height: 5px"></td>
				<td style="background-color: white; height: 5px"></td>
				<td style="background-color: white; height: 5px"></td>
				<td style="background-color: white; height: 5px"></td>
				<td style="background-color: white; height: 5px"></td>
				<td style="background-color: white; height: 5px"></td>
			</tr>
			<?php
		}

} ?>
</table>
</div>
</div>	