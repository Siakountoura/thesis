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
    <link rel="stylesheet" href="css/gradedpaper.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;200;300;400&display=swap"
        rel="stylesheet">


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
                    <a href="landingpage.php">ΑΡΧΙΚΗ</a>
                </li>
                <li>
                    <a href="http://">ΧΡΗΣΤΕΣ</a>
                </li>
                <li>
                    <a href="http://">ΒΑΘΜΙΔΑ</a>
                </li>
                <li>
                    <a href="http://">ΜΑΘΗΤΕΣ</a>
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

            <div class="testheader">
                <p class="studentname">Όνομα Μαθητή:</p>
                <p class="teachersname">Όνομα Βαθμολογητή:</p>
                <p class="dateoftest">Ημερομηνία Αξιολόγησης:</p>
                <p class="vathmida">Βαθμίδα:</p>
                <p class="taksi">Τάξη:</p>
            </div>

            <span class="tablecontainer">
                <table>
                    <thead>
                        <tr class="theader">
                            <th>ΚΡΙΤΗΡΙΑ</th>
                            <th>4</th>
                            <th>3</th>
                            <th>2</th>
                            <th>1</th>
                            <th>ΒΑΘΜΟΙ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="gradepaperbuttons">
                    <button class="btndel">Επεξεργασία</button>

                    <button class="btnedit">Διαγραφή</button>
                    <button class="btnprint">Εκτύπωση</button>
                </div>
            </span>

        </div>

</body>

</html>