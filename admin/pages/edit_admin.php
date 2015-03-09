<div class="container">
	<center>

		<h1>Redaguoti administratorių</h1>
	<?php
	if(isset($_GET['admin_id'])){
		$admin_edit_id = (int)$_GET['admin_id'];
		$run_query = mysqli_query($DB,"SELECT * from admins where admin_id='$admin_edit_id'");

		$row_admin=mysqli_fetch_array($run_query);
		$admin_id=$row_admin['admin_id'];
		$admin_username=$row_admin['admin_username'];
		$admin_password =$row_admin['admin_password'];
	}
	?>
	
	<form action="" method="POST" enctype="multipart/form-data">
			<table align="center" width="1000" border="0">

			<tr>
				<th align="center">Slapyvardis</th>
				<td><input type="text" name="admin_username" size="60" value="<?php echo $admin_username; ?>" required/></td>
				<input type="hidden" name="admin_edit_id" size="60" value="<?php echo $admin_id; ?>" required/>
			</tr>

			<tr>
				<th align="center">Slaptažodis</th>
				<td><input type="text" name="admin_password" size="60" value="<?php echo $admin_password; ?>" required/></td>
				<td><input type="submit" name="edit_admin" align="right" /></td>
			</tr>
			</table>
	</form>

<?php

 if(isset($_POST['edit_admin'])){

 	//form text data
 	$admin_username = $_POST['admin_username'];
 	$admin_password = $_POST['admin_password'];
 	$admin_edit_id = $_POST['admin_edit_id'];
 	
			$update_admin = "UPDATE admins set
			admin_username='$admin_username', admin_password='$admin_password' where admin_id='$admin_edit_id'";

			 $edit_admins = mysqli_query($DB,$update_admin);

			
			
			if($edit_admins){
 			header("Location: index.php?page=admins");
 		}
}
?>
	</center>
	<a class="back" href="index.php?page=admins">Atgal</a>
</div>