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



    <script>
    $(document).ready(function() {

        const $select = $('#teacher-select');
        $select.select2({
            placeholder: 'Αναζήτηση Καθηγητή'
        });


        $("#teacher-select").on("select2:select", function() {

            var data = $('#teacher-select').select2('data')
            let studentName = data[0].text.trim().split("-")[0];
            let studentId = data[0].id;



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

                            $.notify("Error", "danger");
                        }
                    }
                })
                .done(function(data) {
                    console.log("student", data)


                    $("#teachersname").text(`${data.usersName}`)
                    $("#teachersLastname").text(`${data.last_name}`)
                    $("#teachersUsername").text("studentid", studentId)


                })

        });

    })
    </script>

    <title>Χρήστες</title>
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
            <div class="content">
                <div class="col1">

                    <div class="headercol1">
                        <h3> Αναζήτηση Καθηγητή </h3>
                    </div>

                    <div class="contentcol2">
                        <br>

                        <p>
                            Με όνομα ή username:

                            <br /><br />
                            <select id="teacher-select">
                                <option></option>
                                <?php
                                        $select_query="SELECT * FROM users";
                                        $select_result = mysqli_query($conn, $select_query);
                                        while($select_data=mysqli_fetch_assoc($select_result))
                                        {
                                        ?>
                                <option value="<?php echo $select_data['usersId']; ?>">
                                    <?php echo $select_data['usersName'] . " | " . $select_data['usersUid']; ?>
                                </option>
                                <?php
                                        }
                                        ?>
                            </select>

                            <br /><br />

                        <p>
                            Στοιχεία Καθηγητή
                        <ul class="student-info">
                            <li><b>Όνομα:</b></li>
                            <li><b>Επώνυμο:</b></li>
                            <li><b>Username:</b></li>
                        </ul>
                        <br /><br />


                    </div>
                    <div class="footercol1">
                        <p class="mo-vthmologisis"><b>Μ.Ο Βαθμολόγισης:</b></p>


                    </div>
                </div>


                <span class="col2">
                    <div class="table-info2">

                        <div class="tableinfoheader">
                            <h3>Φύλλα Βαθμολόγισης Μαθητών</h3>
                        </div>
                    </div>
                    <div class="table">



                        <table class="gradeinfotable">
                            <thead>
                                <tr class="theader">
                                    <th>
                                        <p class="headerid">#ID</p>
                                    </th>
                                    <th>Τίτλος</th>
                                    <th>ΑΕΜ Μαθητή</th>
                                    <th>Καθηγητής</th>
                                    <th>Τάξη</th>
                                    <th>Βαθμίδα</th>
                                    <th>Βαθμός</th>
                                    <th>Ημ/νία Δημ/γίας</th>
                                    <th>Ημ/νία Επ/σίας</th>
                                </tr>
                            </thead>
                            <tbody id="ans" class="tbody">

                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
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