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


    <title>Βαθμίδες</title>
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
                <div class="links">
                    <img src="icons/icons8-home-25 (1).png" />
                    <a href="landingpage.php"> ΑΡΧΙΚΗ</a>
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
                    <h3> Στοιχεία Βαθμίδας ή Τάξης </h3>
                    <p>
                        Επιλογή Βαθμίδας

                        <br /><br />

                        <select id="vathmida">
                            <option selected hidden>Επιλογή Βαθμίδας</option>
                            <option value="Γυμνάσιο">Γυμνάσιο</option>
                            <option value="Λύκειο">Λύκειο</option>
                        </select>

                        <br /><br />

                        Επιλογή Τάξης

                        <br /><br />

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

                        <br /><br />

                        <button class="vathmidessubmitbtn" type="submit" form="vathmides" value="Submit">
                            Υποβολή
                        </button>

                        <br /><br />

                    <p class="mo-vathmidas"><b>Μ.Ο Τμήματος/Βαθμίδας:</b></p>

                    </p>
                </div>


                <span class="col2-2">
                    <div class="table-info2">

                        <p class="title">Αξιολόγησεις</p>

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


                        <table class="gradeinfotable">
                            <thead>
                                <tr class="theader">
                                    <th>
                                        <p class="headerid">#ID</p>
                                    </th>
                                    <th>Τίτλος</th>
                                    <th>Καθηγητής</th>
                                    <th>ΑΕΜ Μαθητή</th>

                                    <th>Τάξη</th>
                                    <th>Βαθμίδα</th>
                                    <th>Βαθμός</th>
                                    <th>Ημ/νία Δημ/γίας</th>
                                    <th>Ημ/νία Επ/σίας</th>

                                </tr>
                            </thead>
                            <tbody id="ans" class="tbody">
                                <tr>
                                    <td>



                                    </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>

                                </tr>
                                <tr>
                                    <td>



                                    </td>
                                    <td class="grade-4"> </td>
                                    <td class="grade-3"> </td>
                                    <td class="grade-2"> </td>
                                    <td class="grade-1"> </td>
                                    <td> </td>
                                    <td>



                                    </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td>



                                    </td>
                                    <td class="grade-4"> </td>
                                    <td class="grade-3"> </td>
                                    <td class="grade-2"> </td>
                                    <td class="grade-1"> </td>
                                    <td>



                                    </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td>



                                    </td>
                                    <td class="grade-4"> </td>
                                    <td class="grade-3"> </td>
                                    <td class="grade-2"> </td>
                                    <td class="grade-1"> </td>
                                    <td> </td>
                                    <td>



                                    </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td>



                                    </td>
                                    <td class="grade-4"> </td>
                                    <td class="grade-3"> </td>
                                    <td class="grade-2"> </td>
                                    <td class="grade-1"> </td>
                                    <td> </td>
                                    <td>


                                    </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td>



                                    </td>
                                    <td class="grade-4"> </td>
                                    <td class="grade-3"> </td>
                                    <td class="grade-2"> </td>
                                    <td class="grade-1"> </td>
                                    <td> </td>
                                    <td>



                                    </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td>



                                    </td>
                                    <td class="grade-4"> </td>
                                    <td class="grade-3"> </td>
                                    <td class="grade-2"> </td>
                                    <td class="grade-1"> </td>
                                    <td> </td>
                                    <td>



                                    </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td>


                                    </td>
                                    <td class="grade-4"> </td>
                                    <td class="grade-3"> </td>
                                    <td class="grade-2"> </td>
                                    <td class="grade-1"> </td>
                                    <td> </td>
                                    <td>



                                    </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td>


                                    </td>
                                    <td class="grade-4"></td>
                                    <td class="grade-3"></td>
                                    <td class="grade-2"></td>
                                    <td class="grade-1"></td>
                                    <td>



                                    </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td>


                                    </td>
                                    <td class="grade-4"></td>
                                    <td class="grade-3"></td>
                                    <td class="grade-2"></td>
                                    <td class="grade-1"></td>
                                    <td>



                                    </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td>


                                    </td>
                                    <td class="grade-4"> </td>
                                    <td class="grade-3"> </td>
                                    <td class="grade-2"> </td>
                                    <td class="grade-1"> </td>
                                    <td> </td>
                                    <td>



                                    </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </span>
            </div>
        </section>
    </main>
</body>


</html>