<div class="container">
	<?php 
		$get_lang  = $_SESSION["lang"];
		if ($get_lang==1) {
			echo "<h1>Pradinis</h1>";
		} 
		elseif ($get_lang==2) {
			echo "<h1>Home</h1>";
		}
		elseif ($get_lang==3) {
			echo "<h1>Главная</h1>";
		}
		else{
			echo "<h1>Pradinis</h1>";
		}
		

		global $DB;

		$pages = mysqli_query($DB, "SELECT news.news_id, news.news_picture,lang_news.lang_news_title,lang_news.lang_short_text,lang_news.lang_news_text FROM news, lang_news WHERE lang_news.news_id=news.news_id  AND lang_news.lang_id='".(int)$get_lang."' ORDER BY news.news_id desc " );
		$page = array();
		$check_pages = mysqli_num_rows($pages);
		if($check_pages>0){
		while ($row = mysqli_fetch_assoc($pages)) {
			$news_id = $row['news_id'];
			$news_title = $row['lang_news_title'];
			$news_picture = $row['news_picture'];
			$news_text = $row['lang_news_text'];
			$news_short = $row['lang_short_text'];

			if(!empty(trim($news_id))&&empty(trim($news_text))){

			}
			else{

		if(!empty(trim($news_picture))){
		echo "
		<div class='news'>
		<a href='post/$news_id'><h2>$news_title</h2></a>
		<figure>
		<a href='post/$news_id'><img src='uploads/$news_picture' align='left'/></figure></a>
		<p>$news_short</p>"; ?>
		<?php
		if ($get_lang==1) {
			echo "<a href='post/$news_id' class='more'>Daugiau...</a>";
		}
		elseif ($get_lang==2) {
			echo "<a href='post/$news_id' class='more'>More...</a>";
		}
		elseif($get_lang==3){
			echo "<a href='post/$news_id' class='more'> более...</a>";
		}
		echo "
		<hr/>
		</div>";
		  }

		  else {
		  	echo "
		<div class='news'>
		<a href='index.php/post/$news_id'><h2>$news_title</h2></a>
		<p>$news_short</p>";
		if ($get_lang==1) {
			echo "<a href='index.php/post/$news_id' class='more'>Daugiau...</a>";
		}
		elseif ($get_lang==2) {
			echo "<a href='index.php/post/$news_id' class='more'>More...</a>";
		}
		elseif($get_lang==3){
			echo "<a href='index.php/post/$news_id' class='more'> более...</a>";
		}
		echo "
		<hr/>
		</div>";
		
		  }
		}
	   }
	}

	else {
		if ($get_lang==1) {
			echo "<h1>Įrašų nėra</h1>";
		} 
		elseif ($get_lang==2) {
			echo "<h1>No records found</h1>";
		}
		elseif ($get_lang==3) {
			echo "<h1>Записов нет</h1>";
		}
		else{
			echo "<h1>Įrašų nėra</h1>";
		}
	}	
	?>
	
</div>