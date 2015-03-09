<div class="menu">
	<?php 
		$category = get_all_category($_SESSION["lang"]);
		if (!empty($category)) {
			?>
			<ul>
			<?php
			foreach ($category[0] as $key) {
				if (isset($_GET["cat_id"]) AND $_GET["cat_id"] == $key["cat_id"]) {
					$active="menu-active";
				}else{
					$active="";
				}
				?>
			
				<li style='border-right: 2px solid white;'>
					<a class="<?php echo $active ?>" href="category/<?php echo $key["cat_id"] ?>"><?php echo $key["title"]; ?></a>
					<?php 
					if (isset($category[$key["cat_id"]])) {
						?>
						<ul>
							<?php 
							foreach ($category[$key["cat_id"]] as $key2) {
								
								?>
								<li><a href="category/<?php echo $key2["cat_id"] ?>"><?php echo $key2["title"] ?></a></li>
								<?php
							}
							?>
						</ul>
						<?php
					}
					?>
				</li>
				<?php
			}
			?>
			</ul>
			<?php
		}else{
			echo "Tuscia :/";
		}
	?>
</div>