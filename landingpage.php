<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;200;300;400&display=swap" rel="stylesheet">


    <title>Document</title>
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <p class="title">TEACHERS DATABASE</p>
            <p class="idname" ">ΧΡΗΣΤΗΣ <strong>
            <?php
                
                 //$username = $_POST['usernametxt'];
                if(isset($_SESSION["useruid"])){ //if this is true, the user is loggedin
                    echo $_SESSION['useruid'];
                }
            ?>
                </strong></p>
        </div>
        <div class=" sidebar-content">
            <ul class="links">
                <li>
                    <a href="landingpage.php"> ΑΡΧΙΚΗ</a>
                </li>
                <li>
                    <a href="http://">ΧΡΗΣΤΕΣ</a>
                </li>
                <li>
                    <a href="http://">ΒΑΘΜΙΔΑ</a>
                </li>
                <li>
                    <a href="studentinfo.php">ΜΑΘΗΤΕΣ</a>
                </li>
                <li>
                    <a href="grading.php">ΑΞΙΟΛΟΓΗΣΗ</a>
                </li>
            </ul>
        </div>
        <div class="footer">
            <?php
                
                //$username = $_POST['usernametxt'];
               if(isset($_SESSION["useruid"])) { //if this is true, the user is loggedin
                   echo "<a href='includes/logout.inc.php'>ΑΠΟΣΥΝΔΕΣΗ</a>";
               }
        ?>
        </div>
    </div>


    <div class="container">
        <div class="header">
            <p>Header</p>
        </div>

        <div class="content">
            <p> main content box</p>

            <a href="gradedpaper.php">Display test result page</a>
        </div>
    </div>

</body>

</html>