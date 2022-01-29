<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Grading System</title>
    <link rel="stylesheet" <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;200;300;400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <div class="center">

        <h1>Είσοδος</h1>

        <form action="includes/login.inc.php" method="post">

            <div class="txt_field">
                <input type="text" name="uid" required>
                <span></span>
                <label>Όνομα Χρήστη</label>
            </div>

            <div class="txt_field">
                <input type="password" name="pwd" required>
                <span></span>
                <label>Κωδικός</label>
            </div>

            <input type="submit" name="submit" value="Σύνδεση">

            <div class="signup_link">
                <a href="signup.php">Εγγραφή</a>
            </div>

            <?php
            if (isset($_GET["error"])){
              if ($_GET["error"] == "wronglogin") {
                  echo "<p>Τα στοιχεία που εισάγατε είναι λανθασμένα!</p>";
              }
            }
          ?>

        </form>
    </div>

</body>

</html>