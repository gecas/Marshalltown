
<div class="container">

<?php 
			if (isset($_GET["delete_admin_id"])) {
				?>
				<form action="actions/delete_admin.php" method="POST">
					Ar tikrai norite ištrinti administratorių?
					<input type="hidden" name="admin_id" value="<?php echo $_GET["delete_admin_id"] ?>">
					<input type="submit" name="taip" value="Taip">
					<input type="submit" value="Ne">
				</form>
				<?php
			}
		?>
<div class="all_posts">
<table align="center" bgcolor="" width="100%" class="category_products_table">

<tr bgcolor="#ccc">
<td colspan="8" align="center">
<h2><a href="index.php?page=new_admin">Naujas administratorius</a></h2>
<h1>Visi administratoriai</h1>
</td>
</tr>

<tr>
	<th>Admin_id</th>
	<th>Slapyvardis</th>
	<th>Slaptažodis</th>
	<th>Redaguoti</th>
	<th>Ištrinti</th>
</tr>

<?php


	

	$run_admins=mysqli_query($DB,"SELECT * FROM admins");
	$i=1;

	while($row_admin=mysqli_fetch_assoc($run_admins)){
		$admin_id = $row_admin['admin_id'];
		$admin_name=$row_admin['admin_username'];
		$admin_password=$row_admin['admin_password'];

		$count_adm = mysqli_num_rows($run_admins);
?>
	<?php if (!empty($admin_name)&&!empty($admin_password)) {
	
	?>
		<tr align="center">
		<td><?php echo $i++ ?></td>
		<td><?php echo $admin_name?></td>
		<td><?php echo $admin_password ?></td>

		<td><a href="index.php?page=edit_admin&admin_id=<?php echo $admin_id ?>">Redaguoti</a></td>
		<?php
		if ($count_adm==1) {
			echo "<td></td>";
		} elseif ($count_adm>1) {
			
		 ?>
		<td><a href="index.php?page=admins&delete_admin_id=<?php echo $admin_id ?>">Ištrinti administratorių</a></td>
		<?php } else { echo "<td></td>"; ?>
<?php } } }?>
</tr>
</table>
</div>
</div>	