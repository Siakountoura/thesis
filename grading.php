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
    <link rel="stylesheet" href="css/style2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            if (isset($_SESSION["useruid"])) { //if this is true, the user is loggedin
                echo $_SESSION['useruid'];
            }
            ?>
        </strong></p>
    </div>
    <div class=" sidebar-content">
            <ul class="links">
                <li>
                    <a href="http://">ΑΡΧΙΚΗ</a>
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
                    <a href="http://">ΑΞΙΟΛΟΓΗΣΗ</a>
                </li>
            </ul>
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


    <div class="container">
        <div class="header">
            <p>Header</p>
        </div>

        <div class="content">

            <span>
                <div class="col1">
                    <h3>
                        Τι είναι οι Ρουμπρίκες Αξιολόγησης;
                    </h3>
                    <p>
                        Οι «Ρουμπρίκες Αξιολόγησης» αποτελούν ένα περιγραφικό οδηγό
                        βαθμολόγησης της επίδοσης των μαθητών ο οποίος αποτελείται από
                        ειδικά εκ των προτέρων καθορισμένα κριτήρια απόδοσης.
                        <br><br>
                        Αυτά τα εργαλεία επιτρέπουν στους εκπαιδευτικούς
                        να βαθμολογούν αποτελεσματικά, να κρίνουν την εργασία των μαθητών
                        βάση ενώς προτύπου και να γνωστοποιούν εύκολα σε κάθε μαθητή τις
                        απαιτήσεις του μαθήματος.
                    </p>

                </div>
                <div class="col2">
                    <h3>
                        Δημιουργία πίνακα αξιολόγησης
                    </h3>
                    <p id="studentinp">
                        Αξιολόγηση Μαθητή:
                        <input type=" text" name="" id="studname">
                    </p>
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
                        <tbody id="ans">
                            <tr>
                                <td>

                                    <select name="select_catg">
                                        <option value="" disabled selected hidden>-Please Choose-</option>
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
                                <td class="grade-4">
                                    row 1 [cell 2]
                                </td>
                                <td class="grade-3">row 1 [cell 3]</td>
                                <td class="grade-2">row 1 [cell 4]</td>
                                <td class="grade-1">row 1 [cell 5]</td>
                                <td>

                                    <input type="text" name="" id="">

                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <select name="select_catg">
                                        <option value="" disabled selected hidden>-Please Choose-</option>
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
                                <td class="grade-4">
                                    row 2 [cell 2]
                                </td>
                                <td class="grade-3">row 2 [cell 3]</td>
                                <td class="grade-2">row 2 [cell 4]</td>
                                <td class="grade-1">row 2 [cell 5]</td>
                                <td>

                                    <input type="text" name="" id="">

                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <select name="select_catg">
                                        <option value="" disabled selected hidden>-Please Choose-</option>
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

                                    <input type="text" name="" id="">

                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <select name="select_catg">
                                        <option value="" disabled selected hidden>-Please Choose-</option>
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

                                    <input type="text" name="" id="">

                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <select name="select_catg">
                                        <option value="" disabled selected hidden>-Please Choose-</option>
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

                                    <input type="text" name="" id="">

                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <select name="select_catg">
                                        <option value="" disabled selected hidden>-Please Choose-</option>
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

                                    <input type="text" name="" id="">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="select_catg">
                                        <option value="" disabled selected hidden>-Please Choose-</option>
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

                                    <input type="text" name="" id="">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="select_catg">
                                        <option value="" disabled selected hidden>-Please Choose-</option>
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

                                    <input type="text" name="" id="">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="select_catg">
                                        <option value="" disabled selected hidden>-Please Choose-</option>
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

                                    <input type="text" name="" id="">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="select_catg">
                                        <option value="" disabled selected hidden>-Please Choose-</option>
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

                                    <input type="text" name="" id="">

                                </td>
                            </tr>
                            <tr>
                                <td class="lastcell"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="finalgrade">Τελική <br> Βαθμολογία</td>
                                <td>

                                    <input type="text" name="" id="">

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button id="gradesubmit" type="submit" form="form1" value="Submit">ΥΠΟΒΟΛΗ</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </span>
        </div>
    </div>

</body>

</html>


<script>
$(document).ready(function() {
    $("select[name='select_catg']").change(function() {
        let currentselect = $(this);
        $.ajax({

            url: 'includes/getgrade.php',
            type: 'GET',
            data: {
                'getgrade': $(this).val()
            },
            success: function(data) {
                var grade = JSON.parse(data);


                currentselect.closest('tr').find('.grade-4').html(grade[0][2]);
                currentselect.closest('tr').find('.grade-3').html(grade[0][3]);
                currentselect.closest('tr').find('.grade-2').html(grade[0][4]);
                currentselect.closest('tr').find('.grade-1').html(grade[0][5]);
                console.log(grade1);
            },
            error: function(request, error) {

            }
        });
    });
});
</script>