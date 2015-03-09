<div class="container">
	<?php 
	$detail_prod = get_product_detail($_SESSION["lang"],$_GET["prod_id"]);
	if (!empty($detail_prod)) {
		?>
		<center>
			<table border="1">
				<tr>
					<td><img src="uploads/<?php echo $detail_prod["picture"] ?>" width="150" height="150"></td>
				</tr>
				<tr>
					<td><?php echo $detail_prod["title"] ?></td>
				</tr>
				<tr>
					<td><?php echo nl2br($detail_prod["text"]) ?></td>
				</tr>
			</table>
		</center>
		<?php
	}else{
		echo "<h1>Produktas nerastas</h1>";
	}
	?>
</div>
