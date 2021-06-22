<?php
  include_once 'header.php'
?>

    <div class="center">
      <h1>Signup</h1>
      <form method="post" action="includes/signup.inc.php">
       
        <div class="txt_field">
          <input type="text" name="name" >
          <span></span>
          <label>Full Name</label>
        </div>

        <div class="txt_field">
          <input type="email" name="email" >
          <span></span>
          <label>Email</label>
        </div>

        <div class="txt_field">
          <input type="text" name="uid" >
          <span></span>
          <label>Username</label>
        </div>

        <div class="txt_field">
          <input type="password" name="pwd" >
          <span></span>
          <label>Password</label>
        </div>

        <div class="txt_field">
          <input type="password" name="pwdrepeat" >
          <span></span>
          <label>Repeat Password</label>
        </div>

        <input type="submit" name="submit" value="Submit">
        <div class="signup_link">
            
        <?php
            if (isset($_GET["error"])){
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "passwordsdontmatch") {
                    echo "<p>Passwords don't match!</p>";
                }
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p>User already exists!</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong!</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<p>You're signed up!</p>";
                }
            }
        ?>

        </div>
      </form>
    </div>

    
<?php
  include_once 'footer.php'
?>
