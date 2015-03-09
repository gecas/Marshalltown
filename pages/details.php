<div class="container">
	<?php

	 $get_news = (int)$_GET["news_id"]; 
	$get_lang  = $_SESSION["lang"];


		global $DB;

		$pages = mysqli_query($DB, "SELECT news.news_id, news.news_picture,lang_news.lang_news_title,lang_news.lang_news_text FROM news, lang_news WHERE lang_news.news_id=news.news_id AND news.news_id='".$get_news."'  AND lang_news.lang_id='".(int)$get_lang."' ORDER BY news.news_id desc " );
		$page = array();
		$check_pages = mysqli_num_rows($pages);
		if($check_pages>0){
		while ($row = mysqli_fetch_assoc($pages)) {
			$news_id = $row['news_id'];
			$news_title = $row['lang_news_title'];
			$news_picture = $row['news_picture'];
			$news_text = $row['lang_news_text'];

		if(!empty(trim($news_picture))){
		echo "
		<div class='detail-news'>
		<h1>$news_title</h1>
		<figure>
		<img src='uploads/$news_picture' /></figure>
		<p>$news_text</p>";
		
		echo "
		</div>";
		  }

		  else {
		  	echo "
		<div class='news'>
		<h1>$news_title</h1>
		<p>$news_text</p>";
		
		echo "
		</div>";
		
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
			echo "<h1>RU nėr įrašų</h1>";
		}
		else{
			echo "<h1>Įrašų nėra</h1>";
		}
	}	
	?>
</div>