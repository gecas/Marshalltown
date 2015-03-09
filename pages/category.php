<div class="container">
	<div class="products">
	<?php 
		$cat_products = get_cat_products($_SESSION["lang"], $_GET["cat_id"]);
		if (!empty($cat_products)) {
			?>
			<ul>
				<?php 
				foreach ($cat_products as $key) {
					?>
					<li>
						<div class="product">
							<a href="uploads/<?php echo $key["picture"] ?>"  title="<?php echo $key["title"] ?>" rel="gallery-1" class="swipebox">
								<img  src="uploads/<?php echo $key["picture"] ?>" >
								</a>
								<p><?php echo $key["title"] ?></p>
						</div>
					</li>
					<?php
				}
				?>
			</ul>
			<?php
		}else{
			echo "<h1>Tuščia</h1>";
		}
	?>
		
	</div>
</div>