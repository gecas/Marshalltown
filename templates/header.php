<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<title>Marshalltown statybiniai įrankiai</title>
	<base href="//localhost/marshall/" />
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/swipebox.css">
	<script type="text/javascript" src="assets/js/script.js"></script>
	<script type="text/javascript" src="assets/js/jquery.swipebox.js"></script>
	<link href="lightgallery/skins/snow/style.css" type="text/css" media="screen" rel="stylesheet" />
  <script src="lightgallery/lightgallery.min.js" type="text/javascript"></script>
  <script type="text/javascript">lightgallery.init({resizeSync: true});</script> 
  <script type="text/javascript">
  	$( document ).ready(function() {
		$( '.swipebox' ).swipebox();
	});
	</script> 
</head>
<body>
	<div class="wrapper">
		<header class="header">
		<a href="index.php"><div class="header-logo"></div></a>
		<div class="header-logo-title">
		<?php
			if (isset($_SESSION['lang'])) {
				$get_lang = (int)$_SESSION['lang'];

				if ($get_lang==1) {
					echo "<h1 align='center'>Marshalltown Statybiniai Įrankiai</h1>";
				}
				elseif ($get_lang==2) {
					echo "<h1 align='center'>Marshalltown Contruction Items</h1>";
				}
				elseif ($get_lang==3) {
					echo "<h1 align='center'>Marshalltown Cтроительные инструменты</h1>";
				}
			}
		 ?>
			
		</div>
			<div class="header-menu">
				<div class="header-left-menu"> 
					<?php
					$main_menu = get_all_main_menu($_SESSION["lang"]);
					if (!empty($main_menu)) {
						?>
						<ul>
							<?php 

							if (!isset($_GET["page"])) {
								$list_class="active";
							}elseif(isset($_GET["page"]) && $_GET["page"]=="home"){
								$list_class="active";
							}else{
								$list_class="";
							}
							?>
							<li>
								<a class="<?php echo $list_class ?>" href="home">
									<?php 
										switch ($_SESSION["lang"]) {
											case 1:
												echo "PRADINIS";
												break;
											case 2:
												echo "HOME";
												break;
											case 3:
												echo "ГЛАВНАЯ";
												break;
											default:
												echo "PRADINIS";
												break;
										}
									?>
								</a>
								<span>|</span>
							</li>
							<?php
							foreach ($main_menu as $key) {
								if (isset($_GET["page"]) && ($key["page"] == $_GET["page"])) {
									$list_class="active";
								}else{
									$list_class="";
								}
								?>
								<li>
									<a class="<?php echo $list_class ?>" href="<?php echo $key["page"] ?>"><?php echo $key["title"] ?></a>
									<span>|</span>
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
				<div class="header-right-menu">
					<?php 
					$all_lang = get_all_lang();
					if (!empty($all_lang)) {
						?>
						<ul>
							<?php 
							foreach ($all_lang as $key) {
								?>
								<li>
									<a href="actions/change_lang.php?lang=<?php echo $key["id"] ?>">
										<?php echo $key["title"] ?><br>
										<img src="assets/img/<?php echo $key["picture"] ?>" width="16px" height="16px">
									</a>
								</li>
								<?php
							}
							?>
						</ul>
						<?php
					}
					?>
				</div>
			</div>
		</header>