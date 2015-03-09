<div class="container">
	<div class="new-product">
	<center>
		<h1>Naujas administratorius</h1>
		<form action="" method="POST" enctype="multipart/form-data">
			<table align="center" width="100%" border="0">
			<tr align="center">
				<td colspan="2"><h2>Prideti naują administratorių</h2></td>
			</tr>

			<tr>
				<td align="center">Administratoriaus slapyvardis</td>
				<td><input type="text" name="admin_username" size="60" required/></td>
			</tr>

			<tr>
				<td align="center">Administratoriaus slaptažodis</td>
				<td><input type="text" name="admin_password" size="60" required/></td>
			</tr>

			<tr>
				<td colspan="2"  style="background-color:none;"  align="right"><input type="submit" name="insert_admin" value="Pridėti" style="background-color:#ccc;color:#003583;" /></td>
			</tr>

			</table>
	</form>

<?php

 if(isset($_POST['insert_admin'])){

 	//form text data
 	$admin_username = $_POST['admin_username'];
 	$admin_password = $_POST['admin_password'];
 	
			$insert_admin = "INSERT INTO admins 
			(admin_username,admin_password) values ('$admin_username','$admin_password')";

			 $run_insert = mysqli_query($DB,$insert_admin);

			
			
			if($run_insert){
 			header("Location: index.php?page=admins");
 		}
}
?>
	</center>
	<a class="back" href="index.php?page=admins">Atgal</a>
	
   </div>
</div>