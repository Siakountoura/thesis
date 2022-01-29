<?php
session_start();
include_once 'includes/dbh.inc.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/landingpage.css" />
    <link rel="stylesheet" href="css/grading.css" />
    <link rel="stylesheet" href="css/studentinfo.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;200;300;400&display=swap"
        rel="stylesheet">


    <!--chosen <select class="student_search"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"
        integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <title>Eπεξεργασία Αξιολόγησης</title>
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
                    <img src="icons/icons8-documents-25.png" />
                    <a href="grading.php">ΑΞΙΟΛΟΓΗΣΗ</a>
                </div>
                <div class="links">
                    <img src="icons/icons8-conference-25 (1).png" />
                    <a href="users.php">ΧΡΗΣΤΕΣ</a>
                </div>
                <div class="links">
                    <img src="icons/icons8-students-25.png" />
                    <a href="studentinfo.php">ΜΑΘΗΤΕΣ</a>
                </div>
                <div class="links">
                    <img src="icons/icons8-building-25 (1).png" />
                    <a href="vathmides.php">ΒΑΘΜΙΔΑ</a>
                </div>
            </div>

            <div class="footer">
                <?php
                    //$username = $_POST['usernametxt'];
                    if (isset($_SESSION["useruid"])) { //if this is true, the user is loggedin
                        echo "<a href='includes/logout.inc.php'>ΑΠΟΣΥΝΔΕΣΗ</a>";
                }
                ?>
            </div>
        </div>



        <section class="glass">
            <div class="content" id="content">
                <div class="col1">

                    <div class="headercol1">
                        <h3> Στοιχεία Αξιολόγησης </h3>
                    </div>

                    <div class="contentcol2">
                        <p>
                        <ul class="paper-info">
                            <li>Τίτλος:</li>
                            <li>Ημερομηνία Αξιολόγησης:</li>
                            <li>Όνομα Βαθμολογητή:</li>
                            <li>Όνομα Μαθητή:</li>
                            <li>Βαθμίδα:</li>
                            <li>Τάξη:</li>
                        </ul>

                        </p>

                    </div>
                    <div class="footercol1">


                    </div>
                </div>


                <span class="col2">
                    <div class="table-info2">

                        <div class="tableinfoheader">
                            <h3>Φύλλα Βαθμολόγισης Μαθητών</h3>
                        </div>
                    </div>
                    <div class="table" id="table">

                        <?php 

                                $category = "SELECT id,category FROM selections;";


                                $res1 = mysqli_query($conn, $category);

                                $res2 = mysqli_query($conn, $category);
                                $res3 = mysqli_query($conn, $category);
                                $res4 = mysqli_query($conn, $category);
                                $res5 = mysqli_query($conn, $category);
                                $res6 = mysqli_query($conn, $category);
                                $res7 = mysqli_query($conn, $category);
                                $res8 = mysqli_query($conn, $category);
                                $res9 = mysqli_query($conn, $category);
                                $res10 = mysqli_query($conn, $category);

                            ?>


                        <table class="gradeinfotable">
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
                            <tbody id="ans" class="tbody">
                                <tr>
                                    <td>

                                        <select name="select_catg" id="select_catg">
                                            <option value="" disabled selected hidden>Παρακαλώ Eπιλέξτε</option>
                                            <?php

                                                while ($rows = mysqli_fetch_array($res1)) {
                                                    ?>
                                            <option value="<?php echo $rows['id']; ?>">
                                                <?php echo $rows['category']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>

                                    </td>
                                    <td class="grade-4">row 1 [cell 2]</td>
                                    <td class="grade-3">row 1 [cell 3]</td>
                                    <td class="grade-2">row 1 [cell 4]</td>
                                    <td class="grade-1">row 1 [cell 5]</td>
                                    <td>
                                        <input type="number" min="1" max="4" class="gradeinp1" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <select name="select_catg" id="select_catg">
                                            <option value="" disabled selected hidden>Παρακαλώ Eπιλέξτε</option>
                                            <?php
                                                while ($rows = mysqli_fetch_array($res2)) {
                                                    ?>
                                            <option value="<?php echo $rows['id']; ?>">
                                                <?php echo $rows['category']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>

                                    </td>
                                    <td class="grade-4">row 2 [cell 2]</td>
                                    <td class="grade-3">row 2 [cell 3]</td>
                                    <td class="grade-2">row 2 [cell 4]</td>
                                    <td class="grade-1">row 2 [cell 5]</td>
                                    <td>

                                        <input type="number" min="1" max="4" class="gradeinp2" />

                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <select name="select_catg" id="select_catg">
                                            <option value="" disabled selected hidden>Παρακαλώ Eπιλέξτε</option>
                                            <?php
                                        while ($rows = mysqli_fetch_array($res3)) {
                                            ?>
                                            <option value="<?php echo $rows['id']; ?>">
                                                <?php echo $rows['category']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>

                                    </td>
                                    <td class="grade-4">row 3 [cell 2]</td>
                                    <td class="grade-3">row 3 [cell 3]</td>
                                    <td class="grade-2">row 3 [cell 4]</td>
                                    <td class="grade-1">row 3 [cell 5]</td>
                                    <td>

                                        <input type="number" min="1" max="4" class="gradeinp3" />

                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <select name="select_catg" id="select_catg">
                                            <option value="" disabled selected hidden>Παρακαλώ Eπιλέξτε</option>
                                            <?php
                                        while ($rows = mysqli_fetch_array($res4)) {
                                            ?>
                                            <option value="<?php echo $rows['id']; ?>">
                                                <?php echo $rows['category']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>

                                    </td>
                                    <td class="grade-4">row 4 [cell 2]</td>
                                    <td class="grade-3">row 4 [cell 3]</td>
                                    <td class="grade-2">row 4 [cell 4]</td>
                                    <td class="grade-1">row 4 [cell 5]</td>
                                    <td>

                                        <input type="number" min="1" max="4" class="gradeinp4" />

                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <select name="select_catg" id="select_catg">
                                            <option value="" disabled selected hidden>Παρακαλώ Eπιλέξτε</option>
                                            <?php
                                        while ($rows = mysqli_fetch_array($res5)) {
                                            ?>
                                            <option value="<?php echo $rows['id']; ?>">
                                                <?php echo $rows['category']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>

                                    </td>
                                    <td class="grade-4">row 5 [cell 2]</td>
                                    <td class="grade-3">row 5 [cell 3]</td>
                                    <td class="grade-2">row 5 [cell 4]</td>
                                    <td class="grade-1">row 5 [cell 5]</td>
                                    <td>

                                        <input type="number" min="1" max="4" class="gradeinp5" />

                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <select name="select_catg" id="select_catg">
                                            <option value="" disabled selected hidden>Παρακαλώ Eπιλέξτε</option>
                                            <?php
                                        while ($rows = mysqli_fetch_array($res6)) {
                                            ?>
                                            <option value="<?php echo $rows['id']; ?>">
                                                <?php echo $rows['category']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>

                                    </td>
                                    <td class="grade-4">row 6 [cell 2]</td>
                                    <td class="grade-3">row 6 [cell 3]</td>
                                    <td class="grade-2">row 6 [cell 4]</td>
                                    <td class="grade-1">row 6 [cell 5]</td>
                                    <td>

                                        <input type="number" min="1" max="4" class="gradeinp6" />

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="select_catg" id="select_catg">
                                            <option value="" disabled selected hidden>Παρακαλώ Eπιλέξτε</option>
                                            <?php
                                        while ($rows = mysqli_fetch_array($res7)) {
                                            ?>
                                            <option value="<?php echo $rows['id']; ?>">
                                                <?php echo $rows['category']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </td>
                                    <td class="grade-4">row 7 [cell 2]</td>
                                    <td class="grade-3">row 7 [cell 3]</td>
                                    <td class="grade-2">row 7 [cell 4]</td>
                                    <td class="grade-1">row 7 [cell 5]</td>
                                    <td>

                                        <input type="number" min="1" max="4" class="gradeinp7" />

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="select_catg" id="select_catg">
                                            <option value="" disabled selected hidden>Παρακαλώ Eπιλέξτε</option>
                                            <?php
                                        while ($rows = mysqli_fetch_array($res8)) {
                                            ?>
                                            <option value="<?php echo $rows['id']; ?>">
                                                <?php echo $rows['category']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </td>
                                    <td class="grade-4">row 8 [cell 2]</td>
                                    <td class="grade-3">row 8 [cell 3]</td>
                                    <td class="grade-2">row 8 [cell 4]</td>
                                    <td class="grade-1">row 8 [cell 5]</td>
                                    <td>

                                        <input type="number" min="1" max="4" class="gradeinp8" />

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="select_catg" id="select_catg">
                                            <option value="" disabled selected hidden>Παρακαλώ Eπιλέξτε</option>
                                            <?php
                                        while ($rows = mysqli_fetch_array($res9)) {
                                            ?>
                                            <option value="<?php echo $rows['id']; ?>">
                                                <?php echo $rows['category']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </td>
                                    <td class="grade-4">row 9 [cell 2]</td>
                                    <td class="grade-3">row 9 [cell 3]</td>
                                    <td class="grade-2">row 9 [cell 4]</td>
                                    <td class="grade-1">row 9 [cell 5]</td>
                                    <td>

                                        <input type="number" min="1" max="4" class="gradeinp9" />

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="select_catg" id="select_catg">
                                            <option value="" disabled selected hidden>Παρακαλώ Eπιλέξτε</option>
                                            <?php
                                        while ($rows = mysqli_fetch_array($res10)) {
                                            ?>
                                            <option value="<?php echo $rows['id']; ?>">
                                                <?php echo $rows['category']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </td>
                                    <td class="grade-4">row 10 [cell 2]</td>
                                    <td class="grade-3">row 10 [cell 3]</td>
                                    <td class="grade-2">row 10 [cell 4]</td>
                                    <td class="grade-1">row 10 [cell 5]</td>
                                    <td>

                                        <input type="number" min="1" max="4" class="gradeinp10" />

                                    </td>
                                </tr>

                                <tr>
                                    <td class="hide"></td>
                                    <td class="hide"></td>
                                    <td class="hide"></td>
                                    <td class="hide"></td>
                                    <td class="finalgrade">Τελική <br> Βαθμολογία</td>
                                    <td>

                                        <input type="number" min="1" max="4" class="gradeinp11"
                                            id="telikiVathmologia" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="buttons">
                            <ul class="btn-list">
                                <li>

                                    <button class="deletebtn" type="button" onclick="printDiv()">
                                        Εκτύπωση
                                    </button>

                                </li>
                                <li>

                                    <button class="editbtn" type="submit">
                                        Επεξεργασία
                                    </button>

                                </li>
                                <li>


                                    <button class="deletebtn" type="submit">
                                        Διαγραφή
                                    </button>

                                </li>
                            </ul>
                        </div>
                    </div>
                </span>
            </div>
        </section>
    </main>
</body>

<script>
function printDiv() {
    var divContents = document.getElementById("content").innerHTML;
    var a = window.open();
    a.document.write('<html>');
    a.document.write('<body > <h1>Div contents are <br>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}
</script>

</html>