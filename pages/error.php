<div class="container">
<?php
	$get_lang  = $_SESSION["lang"];
		if ($get_lang==1) {
			echo "
		<h1>Error 404:Puslapis nerastas</h1>
		<h3>Puslapis, kurio ieškote neegzistuoja</h3>
			";
		} 
		elseif ($get_lang==2) {
			echo "<h1>
		<h1>Error 404:Page not found</h1>
		<h3>Page you are looking for does not exist</h3>
			</h1>";
		}
		elseif ($get_lang==3) {
			echo "<h1>Error 404:Cтраница не найдена</h1>
			<h3>Страница, которую вы ищете, не существует</h3>
			";
		}
		else{
			echo "
			<h1>Error 404:Puslapis nerastas</h1>
			<h3>Puslapis, kurio ieškote neegzistuoja</h3>";
		}
	
	?>
</div>