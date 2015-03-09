<div class="login-card">
    <h1> Administratoriaus prisijungimas</h1><br>
    <?php 
    	if (isset($_SESSION["error"])) {
    		echo $_SESSION["error"];
    		unset($_SESSION["error"]);
    	}
    ?>
  <form method="post" action="actions/login.php">
    <input type="text" name="user" placeholder="Vartotojo vardas">
    <input type="password" name="pass" placeholder="Slaptažodis">
    <input type="submit" name="login" class="login login-submit" value="Prisijungti">
  </form>
</div>
<div class="post-login"></div>