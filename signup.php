<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Σύστημα Αξιολόγησης | Εγγραφή</title>

    <script>
    function myFunction() {
        setTimeout(function() {

            window.location.href = "index.php";

        }, 3000);
    }
    </script>

    <link rel="stylesheet" <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;200;300;400&display=swap"
        rel="stylesheet" />
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
                    <h2>Φόρμα Εγγραφής</h2>
                    <form method="post" action="includes/signup.inc.php">

                        <div class="inputBox" class="txt_field">
                            <input type="text" name="name" placeholder="Ονοματεπώνυμο">
                        </div>

                        <div class="inputBox" class="txt_field">
                            <input type="email" name="email" placeholder="Email">
                        </div>

                        <div class="inputBox" class="txt_field">
                            <input type="text" name="uid" placeholder="Όνομα Χρήστη">
                        </div>

                        <div class="inputBox" class="txt_field">
                            <input type="password" name="pwd" placeholder="Κωδικός">
                        </div>

                        <div class="inputBox" class="txt_field">
                            <input type="password" name="pwdrepeat" placeholder="Επανάληψη Κωδικού">
                        </div>

                        <div class="inputBox">
                            <input onclick="myFunction()" type="submit" name="submit" value="Εγγραφή">
                        </div>

                        <p class="forget2" class="signup_link"><a href="index.php">Επιστροφή</a></p>

                        <?php
            if (isset($_GET["error"])){
                if ($_GET["error"] == "emptyinput") {
                    echo "<p class='errormsg'>Συμπλήρωσε όλα τα πεδία!</p>";
                }
                else if ($_GET["error"] == "passwordsdontmatch") {
                    echo "<p class='errormsg'>Δέν υπάρχει αντιστοιχία κωδικών!</p>";
                }
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p class='errormsg'>Το Όνομα Χρήστη υπάρχει ήδη!</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p class='errormsg'>Κάτι πήγε λάθος!</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<p class='errormsg'> Επιτυχής Εγγραφή! </p>";
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