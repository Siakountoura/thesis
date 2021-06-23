<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Grading System</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;200;300;400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

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

</body>

</html>