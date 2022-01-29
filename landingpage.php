<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/landingpage.css" />
    <link rel="stylesheet" <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;200;300;400&display=swap"
        rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <main>
        <div class="dashboard">
            <div class="header">
                <h4>TEACHERS DATABASE</h4>
                <p>ΧΡΗΣΤΗΣ <strong>
                        <?php

            //$username = $_POST['usernametxt'];
            if (isset($_SESSION["useruid"])) { //if this is true, the user is loggedin
                echo $_SESSION['useruid'];
            }
            ?>
                    </strong></p>
            </div>

            <div class="nav">
                <div class="links">
                    <img src="icons/icons8-home-25 (1).png" />
                    <a href="landingpage.php"> ΑΡΧΙΚΗ</a>
                </div>
                <div class="links">
                    <img src="icons/icons8-conference-25 (1).png" />
                    <a href="users.php">ΧΡΗΣΤΕΣ</a>
                </div>
                <div class="links">
                    <img src="icons/icons8-building-25 (1).png" />
                    <a href="vathmides.php">ΒΑΘΜΙΔΑ</a>
                </div>
                <div class="links">
                    <img src="icons/icons8-students-25.png" />
                    <a href="studentinfo.php">ΜΑΘΗΤΕΣ</a>
                </div>
                <div class="links">
                    <img src="icons/icons8-documents-25.png" />
                    <a href="grading.php">ΑΞΙΟΛΟΓΗΣΗ</a>
                </div>
            </div>

            <div class="footer">
                <h5>
                    <?php
                        //$username = $_POST['usernametxt'];
                      if(isset($_SESSION["useruid"])) { //if this is true, the user is loggedin
                          echo "<a href='includes/logout.inc.php'>ΑΠΟΣΥΝΔΕΣΗ</a>";
                      }
                   ?>
                </h5>
            </div>
        </div>

        <section class="glass">
            <div class="content" id="content">
                <p> main content box</p>

                <a href="gradedpaper.php">Display test result page</a>
                <div class="column" style="background: red">
                    Column 1
                </div>

                <div class="column" style="background: green">
                    Column 2
                </div>

                <div class="column" style="background: blue">
                    Column 3
                </div>
            </div>
        </section>
    </main>
</body>

</html>