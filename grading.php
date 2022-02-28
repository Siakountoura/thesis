<?php
session_start();
include_once 'includes/dbh.inc.php';

if (!isset($_SESSION["useruid"])) { 
    http_response_code(403);
    header("Location: ./index.php");
    die();
}

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






    <script>
    $(document).ready(function() {

        const $select = $('#student-select');
        $select.select2({
            placeholder: 'Αναζήτηση Μαθητή'
        });


        $("#student-select").on("select2:select", function() {

            var data = $('#student-select').select2('data')
            let studentName = data[0].text.trim().split("-")[0];
            let studentId = data[0].id;

            $('#taksi option:selected').removeProp('selected');
            $('#vathmida option:selected').removeProp('selected');


            $.ajax({
                    type: "GET",
                    url: `student.php?studentId=${studentId}`,
                    // cache: false,
                    statusCode: {
                        404: function(responseObject, textStatus, jqXHR) {
                            // No content found (404)
                            // This code will be executed if the server returns a 404 response
                        },
                        503: function(responseObject, textStatus, errorThrown) {
                            // Service Unavailable (503)
                            // This code will be executed if the server returns a 503 response
                        },
                        403: function(responseObject, textStatus, errorThrown) {

                        }
                    }
                })
                .done(function(data) {
                    console.log("student", data)

                    $("#studname").val(`${data.name}`)
                    $("#studlastname").val(`${data.last_name}`)
                    $("#studname").data("studentid", studentId)

                    $("#AM").val(data.am)
                    $(`#taksi option[value="${data.taksi}"]`).prop('selected', 'selected');

                    $(`#vathmida option[value="${data.vathmida}"]`).prop('selected', 'selected');


                })


        });



        $(".gradesubmitbtn").click(function() {

            let criteriasList = [];

            $('#criteriastable tbody tr').each(function(index) {
                let criteriaTitle = $(this).find(`td:eq(0)`).children(":first")

                let criteriaFour = $(this).find(`td:eq(1)`).text();
                let criteriaThree = $(this).find(`td:eq(2)`).text();
                let criteriaTwo = $(this).find(`td:eq(3)`).text();
                let criteriaOne = $(this).find(`td:eq(4)`).text();
                let vathmos = $(this).find(`td:eq(5)`).find('input').val();



                if (criteriaTitle
                    .val()) { //if is selected, then push to array the options
                    criteriasList.push({
                        "criteriaTitle": criteriaTitle.find(
                                'option:selected')
                            .text().trim(),
                        "criteriaFour": criteriaFour,
                        "criteriaThree": criteriaThree,
                        "criteriaTwo": criteriaTwo,
                        "criteriaOne": criteriaOne,
                        "vathmos": vathmos
                    })
                }


            });


            let studentDetails = {
                "id": $("#studname").data("studentid") == "" ? null : $("#studname").data(
                    "studentid"),
                "name": $("#studname").val(),
                "lastname": $("#studlastname").val(),
                "am": $("#AM").val(),
                "vathmida": $("#vathmida").val(),
                "taksi": $("#taksi").val()
            }

            let gradingDetails = {
                "title": $("#gradetitle").val(),
                "telikiVathmologia": $("#telikiVathmologia").val()
            }

            let postData = {
                "grading": gradingDetails,
                "criteria": criteriasList,
                "student": studentDetails
            }

            console.log("postData: ", postData)

            $.ajax({
                    type: "POST",
                    url: `gradingfnc.php`,
                    contentType: "application/json",
                    // cache: false,
                    data: JSON.stringify(postData),
                    statusCode: {
                        404: function(responseObject, textStatus, jqXHR) {
                            // No content found (404)
                            // This code will be executed if the server returns a 404 response
                        },
                        503: function(responseObject, textStatus, errorThrown) {
                            // Service Unavailable (503)
                            // This code will be executed if the server returns a 503 response
                        },
                        403: function(responseObject, textStatus, errorThrown) {

                        }
                    }
                })

                .done(function(data) {
                    console.log("student", data)

                    $.notify(" Τα Στοιχεία Καταχωρήθηκαν Επιτυχώς!", "success");

                    setTimeout(function() {
                        window.location.href = "grading.php";
                    }, 2000);

                })

        });

    })
    </script>

    <title>Δημιουργία Φύλλου Αξιολόγησης</title>
</head>

<body>
    <main>

        <div class="dashboard">
            <div class="header">
                <h4>ΣΥΣΤΗΜΑ ΑΞΙΟΛΟΓΗΣΗΣ</h4>
                <p>ΧΡΗΣΤΗΣ <strong>
                        <?php
            //$username = $_POST['usernametxt'];
            if (isset($_SESSION["useruid"])) { //if this is true, the user is loggedin
                echo $_SESSION['useruid'];
            }
            ?>
                    </strong>
                </p>
            </div>

            <div class="nav">
                <div class="links">
                    <img src="icons/icons8-documents-25.png" />
                    <a href="grading.php">ΑΞΙΟΛΟΓΗΣΗ</a>
                </div>

                <div class="links">
                    <img src="icons/icons8-students-25.png" />
                    <a href="studentinfo.php">ΜΑΘΗΤΕΣ</a>
                </div>
                <div class="links">
                    <img src="icons/icons8-building-25 (1).png" />
                    <a href="vathmides.php">ΤΜΗΜΑΤΑ</a>
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
            <div class="content">
                <div class="col1">

                    <div class="headercol1">
                        <div class="headertitle">Τι Είναι οι Ρουμπρίκες Αξιολόγησης</div>
                    </div>

                    <div class=" contentcol2">
                        <p>


                            Οι «Ρουμπρίκες Αξιολόγησης» αποτελούν ένα περιγραφικό οδηγό
                            βαθμολόγησης της επίδοσης των μαθητών ο οποίος αποτελείται από
                            ειδικά εκ των προτέρων καθορισμένα κριτήρια απόδοσης.
                            <br /><br />
                            Αυτά τα εργαλεία επιτρέπουν στους εκπαιδευτικούς να βαθμολογούν
                            αποτελεσματικά, να κρίνουν την εργασία των μαθητών βάση ενώς
                            προτύπου και να γνωστοποιούν εύκολα σε κάθε μαθητή τις απαιτήσεις
                            του μαθήματος.

                        </p>

                    </div>
                    <div class="footercol1">


                    </div>
                </div>
                <span class="col2">
                    <div class="tableinfo">

                        <div class="tableinfoheader">
                            <h3><b>Δημιουργία Φύλλου Αξιολόγησης</b></h3>
                        </div>


                        <div class="firstrowcontent">


                            <input type=" text" name="" id="gradetitle" placeholder="Τίτλος " />



                            <select id="student-select">
                                <option></option>
                                <?php
                                        $select_query="SELECT * FROM students";
                                        $select_result = mysqli_query($conn, $select_query);
                                        while($select_data=mysqli_fetch_assoc($select_result))
                                        {
                                        ?>
                                <option value="<?php echo $select_data['id']; ?>">
                                    <?php echo $select_data['name'] . " " . $select_data['last_name'] . " | " . $select_data['am']; ?>
                                </option>
                                <?php
                                        }
                                        ?>
                            </select>

                        </div>

                        <div class="secondrowcontent">
                            <input type=" text" name="" id="studname" data-studentid="" placeholder="Όνομα Μαθητή " />
                            <input type=" text" name="" id="studlastname" placeholder="Επωνυμο Μαθητή " />

                            <input type=" text" name="" id="AM" placeholder="AEM " />

                            <select id="vathmida">
                                <option selected hidden>Επιλογή Βαθμίδας</option>
                                <option value="Γυμνάσιο">Γυμνάσιο</option>
                                <option value="Λύκειο">Λύκειο</option>
                            </select>

                            <select id="taksi">
                                <option selected hidden>Επιλογή Τάξης</option>
                                <option value="Α1">Α1</option>
                                <option value="Α2">Α2</option>
                                <option value="Α3">Α3</option>
                                <option value="Α3">Α4</option>
                                <option value="Β1">Β1</option>
                                <option value="Β2">Β2</option>
                                <option value="Β3">Β3</option>
                                <option value="Β4">Β4</option>
                                <option value="Γ1">Γ1</option>
                                <option value="Γ2">Γ2</option>
                                <option value="Γ3">Γ3</option>
                                <option value="Γ4">Γ4</option>
                            </select>

                        </div>

                    </div>
                    <div class="table">

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


                        <table id="criteriastable">
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="6">
                                        <button class="gradesubmitbtn" type="submit" form="form1" value="Submit">
                                            ΥΠΟΒΟΛΗ
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </span>
            </div>
        </section>
    </main>
</body>

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

            },
            error: function(request, error) {

            }
        });
    });
});
</script>

</html>