<?php
  include_once 'header.php'
?>

    <div class="center">
      
      <h1>Login</h1>
     
      <form action="includes/login.inc.php" method="post">
        
        <div class="txt_field">
          <input type="text" name="uid" required>
          <span></span>
          <label>Username</label>
        </div>
        
        <div class="txt_field">
          <input type="password" name="pwd" required>
          <span></span>
          <label>Password</label>
        </div>
       
        <input type="submit" name="submit" value="Login">
       
        <div class="signup_link">
          Not a member? <a href="signup.php">Signup</a>
        </div>

          <?php
            if (isset($_GET["error"])){
              if ($_GET["error"] == "wronglogin") {
                  echo "<p>Incorrect login info!</p>";
              }
            }
          ?>

      </form>
    </div>
    
<?php
  include_once 'footer.php'
?>
