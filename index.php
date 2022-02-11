<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1"></div>
            <div class="square" style="--i:2"></div>
            <div class="square" style="--i:3"></div>
            <div class="square" style="--i:4"></div>
            <div class="container">
                <div class="form">
                    <h2>Φόρμα Εισόδου</h2>
                    <form action="includes/login.inc.php" method="post">

                        <div class="inputBox" class="txt_field">
                            <input type="text" placeholder="Όνομα Χρήστη" name="uid" required>
                        </div>
                        <div class="inputBox" class="txt_field">
                            <input type="password" placeholder="Κωδικός" name="pwd" required>
                        </div>

                        <div class="inputBox">
                            <input type="submit" name="submit" value="Σύνδεση">
                        </div>

                        <p class="forget1" class="signup_link"><a href="signup.php">Εγγραφή</a></p>

                        <?php
            if (isset($_GET["error"])){
              if ($_GET["error"] == "wronglogin") {
                  echo "<p class='errormsg'>Τα στοιχεία που εισάγατε είναι λανθασμένα!</p>";
              }
            }
          ?>


                    </form>
                </div>
            </div>
        </div>
        <section>

</body>

</html>