<?php 
	function get_all_category($lang){
		global $DB;

		$category = mysqli_query($DB, "SELECT lang_category.title, category.cat_id, category.parent_id FROM category, lang_category where lang_category.lang_id='".(int)$lang."' and category.cat_id=lang_category.category_id ORDER BY category.cat_id");
		$cat = array();
		while ($row = mysqli_fetch_assoc($category)) {
			$cat[$row["parent_id"]][] = $row;
		}

		return $cat;
	}

	function get_cat_products($lang, $cat_id){
		global $DB;

		$products = mysqli_query($DB, "SELECT lang_entity.entity_id, lang_entity.title, lang_entity.text, entity.picture FROM entity, lang_entity WHERE entity.cat_id='".(int)$cat_id."' AND lang_entity.lang_id='".(int)$lang."' AND entity.id=lang_entity.entity_id");
		$prod = array();
		while ($row = mysqli_fetch_assoc($products)) {
			$prod[] = $row;
		}
		return $prod;
	}

	function get_all_lang(){
		global $DB;

		$query = mysqli_query($DB, "SELECT * FROM lang");
		$langs = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$langs[] = $row;
		}
		return $langs;
	}

	function get_all_main_menu($lang){
		global $DB;

		$main_menu = mysqli_query($DB, "SELECT main_menu.page, lang_main_pages.menu_id, lang_main_pages.title FROM main_menu, lang_main_pages WHERE main_menu.id=lang_main_pages.menu_id AND lang_main_pages.lang_id='".(int)$lang."'");
		$menu = array();
		while ($row = mysqli_fetch_assoc($main_menu)) {
			$menu[] = $row;
		}
		return $menu;
	}

	function checkadm($temp_adm_name,$temp_adm_password){
	global $DB;

	if (!empty($_POST['pass']) && !empty($_POST['user'])) {
		
		$get_adm = "SELECT admin_id from admins where admin_username ='$temp_adm_name' and admin_password = '$temp_adm_password'";
 		$run_adm = mysqli_query($DB,$get_adm);

 		$count_adm = mysqli_num_rows($run_adm);

 		if($count_adm==1){
 			$row_adm = mysqli_fetch_array($run_adm);
 			$_SESSION['admin'] = $row_adm['admin_id'];
 			return true;
 		} 

 	else{
 			$_SESSION["error"] = '<p style="color:red;">Neteisingas vartotojo vardas arba slaptažodis</p>';
 		} 

 	}
 	else{
 			$_SESSION["error"] = '<p style="color:red;">Neužpildyti visi laukai</p>';
 		}

	}

	function get_product_detail($lang, $prod_id){
		global $DB;

		$products = mysqli_query($DB, "SELECT lang_entity.entity_id, lang_entity.title, lang_entity.text, entity.picture FROM entity, lang_entity WHERE lang_entity.entity_id='".(int)$prod_id."' AND lang_entity.lang_id='".(int)$lang."' AND entity.id=lang_entity.entity_id");
		$info = array();
		while ($row = mysqli_fetch_assoc($products)) {
			$info = $row;
		}
		return $info;
	}

	function get_page($lang, $page){
		global $DB;

		$pages = mysqli_query($DB, "SELECT lang_main_pages.page_content FROM main_menu, lang_main_pages WHERE lang_main_pages.menu_id=main_menu.id AND main_menu.page='".trim(strip_tags($page))."' AND lang_main_pages.lang_id='".(int)$lang."'");
		$page = array();
		while ($row = mysqli_fetch_assoc($pages)) {
			$page = $row;
		}
		return $page;
	}

	function admin_get_all_category(){
		global $DB;

		$category = mysqli_query($DB, "SELECT lang_category.title, category.cat_id, category.parent_id, lang_category.lang_id FROM category, lang_category where category.cat_id=lang_category.category_id ORDER BY category.cat_id, lang_category.lang_id");
		$cat = array();
		while ($row = mysqli_fetch_assoc($category)) {
			$cat[$row["parent_id"]][$row["cat_id"]][] = $row;
		}

		return $cat;
	}
	function admin_get_all_menu(){
		global $DB;

		$menus = mysqli_query($DB, "SELECT lang_main_menu.title, main_menu.id, main_menu.page, lang_main_menu.lang_id,lang_main_menu.menu_id FROM main_menu, lang_main_menu where main_menu.id=lang_main_menu.menu_id ORDER BY main_menu.id, lang_main_menu.lang_id");
		while ($row = mysqli_fetch_assoc($menus)) {
			$menu_id = $row['id'];
			$menu_title = $row['title'];
			$menu_page =$row['page'];
			$menu_array  = array($menu_id,$menu_title,$menu_page );
		}

		return $menu_array;
	}

	function admin_get_category_data($cat_id){
		global $DB;

		$category = mysqli_query($DB, "SELECT lang_category.title, category.cat_id, category.parent_id, lang_category.id lang_cat_id, lang_category.lang_id, lang.title lang_title FROM category, lang_category, lang where lang.id=lang_category.lang_id and category.cat_id=lang_category.category_id AND category.cat_id='".(int)$cat_id."' ORDER BY category.cat_id, lang_category.lang_id");
		$cat = array();
		while ($row = mysqli_fetch_assoc($category)) {
			$cat[] = $row;
		}

		return $cat;
	}

	function admin_get_menu_data($meniu_id){
		global $DB;

		$menu = mysqli_query($DB, "SELECT lang_pages.page_content, main_menu.id, lang_pages.menu_id, lang_pages.lang_id  FROM main_menu, lang_pages where main_menu.id=lang_pages.menu_id and main_menu.id='$meniu_id' ORDER BY main_menu.id ");
		$menu_item = array();
		while ($row = mysqli_fetch_assoc($menu)) {
			$menu_item[] = $row;
		}

		return $menu_item;

		
	}

	function admin_edit_category($category){
		global $DB;

		foreach ($category as $key => $value) {
			mysqli_query($DB, 'UPDATE lang_category SET title="'.trim(strip_tags($value)).'" WHERE id="'.(int)$key.'"');
		}
	}

	function admin_get_category(){
		global $DB;

		$category = mysqli_query($DB, "SELECT lang_category.title, category.cat_id, category.parent_id FROM category, lang_category where category.cat_id=lang_category.category_id and category.parent_id=0");
		$cat = array();
		while ($row = mysqli_fetch_assoc($category)) {
			$cat[$row["cat_id"]][] = $row;
		}
		return $cat;
	}

	function admin_insert_category($parent_id, $title){
		global $DB;

		mysqli_query($DB, 'INSERT INTO category (parent_id) values('.$parent_id.')');

		$cat_id = mysqli_insert_id($DB);
		foreach ($title as $key => $value) {
			mysqli_query($DB, 'INSERT INTO lang_category (category_id, lang_id, title) values("'.(int)$cat_id.'","'.(int)$key.'","'.trim(strip_tags($value)).'")');
		}
	}

	function admin_delete_category($cat_id){
		global $DB;

		$category = mysqli_query($DB, "SELECT id FROM entity WHERE cat_id='".(int)$cat_id."'");
		$count = mysqli_num_rows($category);
		$category = mysqli_query($DB, "SELECT cat_id FROM category WHERE parent_id='".(int)$cat_id."'");
		$count2 = mysqli_num_rows($category);
		if ($count == 0 && $count2 == 0) {
			mysqli_query($DB, "DELETE FROM category WHERE cat_id='".(int)$cat_id."'");
			mysqli_query($DB, "DELETE FROM lang_category WHERE category_id='".(int)$cat_id."'");
			return true;
		}else{
			return false;
		}
	}

	function admin_delete_admin($admin_id){
		global $DB;

		$admin = mysqli_query($DB, "SELECT admin_id FROM admin WHERE admin_id='".(int)$admin_id."'");
		$count = mysqli_num_rows($admin);
		if ($count == 0) {
			mysqli_query($DB, "DELETE FROM admins WHERE admin_id='".(int)$admin_id."'");
			return true;
		}else{
			return false;
		}
	}

	function admin_show_menu($menu, $level){
		$i=0;
		foreach ($menu[$level] as $key => $value){
    		$i++;
		 	if ($level == 0) {
    			?>
    		 	<tr style="background-color: #C4CDF2">
            	<?php
    		}else{
            	?>
            	<tr>
            	<?php
            }
    		 	if ($level == 0) {
            			?>
		            	<td><?php echo $i ?></td>
		            	<?php
            		}else{
		            	?>
		            	<td></td>
		            	<?php
		            }
            	foreach ($value as $key2 => $value2){
	            	?>
	            	<td><?php echo $value2["title"] ?></td>
	            	<?php
		        }
            	?>
            	<td><a href="index.php?page=edit&cat_id=<?php echo $key ?>">Redaguoti</a></td>
				<td><a href="index.php?page=category&delete_cat_id=<?php echo $key ?>">Ištrinti</a></td>
			</tr>
	        <?php
	        if (isset($menu[$key])) {
	        	admin_show_menu($menu,$key);
	        }
        }

	}

	function admin_show_menu2($menu, $level){
		$i=0;
		foreach ($menu[$level] as $key => $value){
    		$i++;
		 	if ($level == 0) {
    			?>
    		 	<tr style="background-color: #C4CDF2">
            	<?php
    		}else{
            	?>
            	<tr>
            	<?php
            }
    		 	if ($level == 0) {
            			?>
		            	<td><?php echo $i ?></td>
		            	<?php
            		}else{
		            	?>
		            	<td></td>
		            	<?php
		            }
            	foreach ($value as $key2 => $value2){
	            	?>
	            	<td><?php echo $value2["title"] ?></td>
	            	<?php
		        }
            	?>
            	<td><a href="index.php?page=category_products&cat_id=<?php echo $key ?>">Daugiau...</a></td>
			</tr>
	        <?php
	        if (isset($menu[$key])) {
	        	admin_show_menu2($menu,$key);
	        }
        }
    }

    function admin_show_menu3($menu, $level){
		foreach ($menu[$level] as $key => $value){
			?>
			<option value="<?php echo $key; ?>">
			<?php
			if ($level != 0) {
				echo "--";
			}
        	foreach ($value as $key2 => $value2){
            	echo $value2["title"]." | ";
	        }
	        ?>
	        </option>
	        <?php
	        if (isset($menu[$key])) {
	        	admin_show_menu3($menu,$key);
	        }
        }

	}
	 function admin_show_menu4($menu, $level, $cat_id){
		foreach ($menu[$level] as $key => $value){
			if ($cat_id == $key) {
				?>
					<option selected value="<?php echo $key; ?>">
				<?php
			}else{
				?>
				<option value="<?php echo $key; ?>">
				<?php
			}
			if ($level != 0) {
				echo "--";
			}
        	foreach ($value as $key2 => $value2){
            	echo $value2["title"]." | ";
	        }
	        ?>
	        </option>
	        <?php
	        if (isset($menu[$key])) {
	        	admin_show_menu4($menu,$key, $cat_id);
	        }
        }

	}

	function admin_get_cat_products($cat_id){
		global $DB;

		$products = mysqli_query($DB, "SELECT lang_entity.entity_id, lang_entity.lang_id, lang_entity.title, entity.picture FROM entity, lang_entity WHERE entity.cat_id='".(int)$cat_id."' AND entity.id=lang_entity.entity_id ORDER BY  entity.id, lang_entity.lang_id");
		$prod = array();
		while ($row = mysqli_fetch_assoc($products)) {
			$prod[$row["entity_id"]][$row["lang_id"]] = $row;
		}
		return $prod;
	}


	function admin_insert_product($category_id, $title, $file){
		global $DB;
		$file_name = trim($file["name"]);
		if (!empty($file_name)) {
			move_uploaded_file($file["tmp_name"], "../../uploads/".date("Y_m_d_H_i_s_").$file["name"]);
			mysqli_query($DB, 'INSERT INTO entity (cat_id, picture) values("'.$category_id.'","'.date("Y_m_d_H_i_s_").$file["name"].'")');
			$product_id = mysqli_insert_id($DB);

			for ($i=1; $i <= 3; $i++) { 
				mysqli_query($DB, 'INSERT INTO lang_entity (lang_id, entity_id, title) values("'.$i.'","'.$product_id.'","'.$title[$i].'")');
			}
			return true;
		}else{
			return false;
		}
	}

	function admin_edit_product($product_id, $product_pic, $category_id, $title, $file){
		global $DB;
		$file_name = trim($file["name"]);
		if (!empty($file_name)) {
			move_uploaded_file($file["tmp_name"], "../../uploads/".date("Y_m_d_H_i_s_").$file["name"]);
			mysqli_query($DB, 'UPDATE entity SET picture="'.date("Y_m_d_H_i_s_").$file["name"].'", cat_id="'.$category_id.'" WHERE id="'.$product_id.'"');
			unlink("../../uploads/".$product_pic);
			for ($i=1; $i <= 3; $i++) { 
				mysqli_query($DB, 'UPDATE lang_entity SET title="'.$title[$i].'" WHERE entity_id="'.$product_id.'" AND lang_id="'.$i.'"');
			}
			return true;
		}else{
			mysqli_query($DB, 'UPDATE entity SET cat_id="'.$category_id.'" WHERE id="'.$product_id.'"');
			
			for ($i=1; $i <= 3; $i++) { 
				mysqli_query($DB, 'UPDATE lang_entity SET title="'.$title[$i].'" WHERE entity_id="'.$product_id.'" AND lang_id="'.$i.'"');
			}
			return true;
		}
	}

	function admin_delete_product($product_id){
		global $DB;

		$prd = mysqli_query($DB, "SELECT picture FROM entity WHERE id='".(int)$product_id."'");
		$prd = mysqli_fetch_assoc($prd);
		unlink("../../uploads/".$prd["picture"]);
		mysqli_query($DB, "DELETE FROM entity WHERE id='".(int)$product_id."'");
		mysqli_query($DB, "DELETE FROM lang_entity WHERE entity_id='".(int)$product_id."'");
		
		return true;
	}

	function admin_get_product_data($product_id){
		global $DB;

		$product = mysqli_query($DB, "SELECT cat_id, picture FROM entity WHERE entity.id='".$product_id."'");
		$product2 = mysqli_query($DB, "SELECT lang_id, title, text FROM lang_entity WHERE entity_id='".$product_id."' ORDER BY lang_id");
		$prod = array();
		$prod[0] = mysqli_fetch_assoc($product);
		while ($row = mysqli_fetch_assoc($product2)) {
			$prod[1][$row["lang_id"]] = $row;
		}
		return $prod;
	}

	function admin_get_post_data($post_id){
		global $DB;

		$post = mysqli_query($DB, "SELECT news_picture FROM news WHERE news_id='".$post_id."'");
		$post2 = mysqli_query($DB, "SELECT lang_id,lang_news_title, lang_news_text, lang_short_text FROM lang_news WHERE news_id='".$post_id."' ORDER BY lang_id");
		$posts = array();
		$posts[0] = mysqli_fetch_assoc($post);
		while ($row = mysqli_fetch_assoc($post2)) {
			$posts[1][$row["lang_id"]] = $row; 
		}
		return $posts;
	}

	function admin_get_admin_data($admin_id){
		global $DB;

		$admin = mysqli_query($DB, "SELECT admin_username,admin_password FROM admins WHERE admin_id='".$admin_id."'");
		$admins = array();
		
		while ($row = mysqli_fetch_assoc($admin)) {
			$admins[1] = $row; 
		}
		return $admins;
	}

	function admin_insert_post($title,$text,$short,$picture){
		global $DB;
		$file_name = trim($picture["name"]);
		if (!empty($file_name)) {
			move_uploaded_file($picture["tmp_name"], "../../uploads/".date("Y_m_d_H_i_s_").$picture["name"]);
			mysqli_query($DB, 'INSERT INTO news (news_picture) values("'.date("Y_m_d_H_i_s_").$picture["name"].'")');
			$post_id = mysqli_insert_id($DB);

			for ($i=1; $i <= 3; $i++) { 
				$run_query = mysqli_prepare($DB, 'INSERT INTO lang_news (lang_id, news_id, lang_news_title, lang_news_text,lang_short_text) values(?,?,?,?,?)');
				mysqli_stmt_bind_param($run_query, 'sssss', $i, $post_id, $title[$i], $text[$i],$short[$i]);
				mysqli_stmt_execute($run_query);
				//$run_query = mysqli_query($DB, 'INSERT INTO lang_news (lang_id, news_id, lang_news_title, lang_news_text) values("'.$i.'","'.$post_id.'","'.$title[$i].'","'.$text[$i].'")');
			}
			return true;
		}
		else{
			return false;
		}
	}

	function admin_edit_post($post_id, $post_pic, $title, $text, $short, $file){
		global $DB;
		$file_name = trim($file["name"]);
		if (!empty($file_name)) {
			move_uploaded_file($file["tmp_name"], "../../uploads/".date("Y_m_d_H_i_s_").$file["name"]);
			
			mysqli_query($DB, 'UPDATE news SET news_picture="'.date("Y_m_d_H_i_s_").$file["name"].'" WHERE news_id="'.$post_id.'"');
			unlink("../../uploads/".$post_pic);
		}
		for ($i=1; $i <= 3; $i++) { 
			//mysqli_query($DB, 'UPDATE lang_news SET lang_news_title="'.$title[$i].'", lang_news_text="'.$text[$i].'" WHERE news_id="'.$post_id.'" AND lang_id="'.$i.'"');
			$query = mysqli_prepare($DB, 'UPDATE lang_news SET lang_news_title=?, lang_news_text=? , lang_short_text=? WHERE news_id=? AND lang_id=?');
			mysqli_stmt_bind_param($query, 'sssii', $title[$i], $text[$i],$short[$i], $post_id, $i);
			mysqli_stmt_execute($query);
		}
		return true;
	}
	function admin_delete_post($post_id){
		global $DB;

		$post = mysqli_query($DB, "SELECT news_picture FROM news WHERE news_id='".(int)$post_id."'");
		$post = mysqli_fetch_assoc($post);
		unlink("../../uploads/".$post["news_picture"]);
		mysqli_query($DB, "DELETE FROM news WHERE news_id='".(int)$post_id."'");
		mysqli_query($DB, "DELETE FROM lang_news WHERE news_id='".(int)$post_id."'");
		
		return true;
	}

	function admin_get_main_menu(){
		global $DB;

		$main_menu = mysqli_query($DB, "SELECT lang_main_pages.id, lang_main_pages.title menu_title, lang_main_pages.page_content, lang.title lang_title FROM lang, lang_main_pages WHERE lang_main_pages.lang_id = lang.id ORDER BY lang_main_pages.menu_id, lang.id");
		$menu = array();
		while ($row = mysqli_fetch_assoc($main_menu)) {
			$menu[]=$row;
		}
		return $menu;
	}

	function admin_get_page_data($page_id){
		global $DB;

		$main_menu = mysqli_query($DB, "SELECT lang_main_pages.title menu_title, lang_main_pages.page_content FROM lang_main_pages WHERE lang_main_pages.id = '".$page_id."'");
		$page_data=mysqli_fetch_assoc($main_menu);

		return $page_data;
	}

	function admin_edit_page($id,$title,$content){
		global $DB;

		$query = mysqli_prepare($DB, 'UPDATE lang_main_pages SET page_content=?, title=?  WHERE id=?');
		mysqli_stmt_bind_param($query, 'ssi', $content, $title, $id);
		mysqli_stmt_execute($query);
		return true;
	}
?>