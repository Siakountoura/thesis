<?php
session_start();
include_once 'includes/dbh.inc.php';

$id = isset($_GET['gradingId']) ? (int) $_GET['gradingId'] : null;


if (!isset($_SESSION["useruid"])) { 
    http_response_code(403);
    header("Location: ./index.php");
    die();
}

if ($id===NULL){
    header("Location: ./studentinfo.php");
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


    <title>Eπεξεργασία Αξιολόγησης</title>

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

        $("#editbtn").click(function() {


            $(".select_catg").prop("disabled", false);
            $(".gradeinp1").prop("disabled", false);
            $("#telikiVathmologia").prop("disabled", false);
            $(".lastrow").toggle();
            $("#gradesubmitbtn").toggle();
            $("#addbtn").toggle();


        });

        $("#gradesubmitbtn").click(function() {



            let criteriasList = [];

            $('.gradeinfotable tbody tr').each(function(index) {



                let criteriaTitle = $(this).find(`td:eq(0)`).children(":first")

                let criteriaFour = $(this).find(`td:eq(1)`).text();
                let criteriaThree = $(this).find(`td:eq(2)`).text();
                let criteriaTwo = $(this).find(`td:eq(3)`).text();
                let criteriaOne = $(this).find(`td:eq(4)`).text();
                let vathmos = $(this).find(`td:eq(5)`).find('input').val();



                if (criteriaTitle
                    .val()) { //if is selected, then push to array the options
                    criteriasList.push({
                        "criteriaId": $(this).closest('tr').data('criteria-id') ? $(
                            this).closest('tr').data('criteria-id') : null,
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


            let gradingDetails = {
                "id": $("#grading-id").data('grading-id'),
                "telikiVathmologia": $("#telikiVathmologia").val()

            }

            let postData = {

                "grading": gradingDetails,
                "criteria": criteriasList

            }

            //console.log("",postData);


            $.ajax({
                    type: "PUT",
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


                    $.notify(" Τα Στοιχεία Καταχωρήθηκαν Επιτυχώς!", "success");

                    setTimeout(function() {
                        window.location.reload()
                    }, 3000);


                })

        });


        $("body").on("change", "select[name='select_catg']", function() {
            let currentselect = $(this);
            $.ajax({

                url: 'includes/getgrade.php',
                type: 'GET',
                data: {
                    'getgrade': $(this).val()
                },
                success: function(data) {
                    var grade = JSON.parse(data);


                    currentselect.closest('tr').find('.grade-4').html(grade[
                        0][2]);
                    currentselect.closest('tr').find('.grade-3').html(grade[
                        0][3]);
                    currentselect.closest('tr').find('.grade-2').html(grade[
                        0][4]);
                    currentselect.closest('tr').find('.grade-1').html(grade[
                        0][5]);

                },
                error: function(request, error) {

                }
            });
        });


        $("#addbtn").click(function() {

            $('.gradeinfotable tbody').append(` 
            
                        <tr>
                                    <td>

                                        <select name="select_catg" id="select_catg">
                                            <option value="" disabled="" selected="" hidden="">Παρακαλώ Eπιλέξτε</option>
                                                                                        <option value="1">
                                                Μαθηματικές Έννοιες                                            </option>
                                                                                        <option value="2">
                                                Μαθηματικός Συλλογισμός                                            </option>
                                                                                        <option value="3">
                                                Μαθηματικά Σφάλματα                                            </option>
                                                                                        <option value="4">
                                                Χρήση Xειρισμών                                            </option>
                                                                                        <option value="5">
                                                Συνεργασιμότητα                                            </option>
                                                                                        <option value="6">
                                                Επεξηγηματικότητα                                            </option>
                                                                                        <option value="7">
                                                Διορθώσεις                                            </option>
                                                                                        <option value="8">
                                                Τακτικότητα και οργανωτικότητα                                            </option>
                                                                                        <option value="9">
                                                Διαγράμματα και σκίτσα                                            </option>
                                                                                        <option value="10">
                                                Ολοκλήρωση                                            </option>
                                                                                        <option value="11">
                                                Μαθηματική ορολογία και σημειογραφία                                            </option>
                                                                                        <option value="12">
                                                Στρατηγική / διαδικασίες                                            </option>
                                                                                        <option value="13">
                                                Μονάδες μέτρησης γραφήματος                                            </option>
                                                                                        <option value="14">
                                                Tακτοποίηση και ελκυστικότητα γραφήματος                                            </option>
                                                                                        <option value="15">
                                                Ακρίβεια σχεδιαγράμματος                                            </option>
                                                                                        <option value="16">
                                                Τύπος γραφήματος που έχει επιλεχθεί                                            </option>
                                                                                        <option value="17">
                                                Πίνακας δεδομένων                                            </option>
                                                                                        <option value="18">
                                                Τίτλος γραφήματος                                            </option>
                                                                                        <option value="19">
                                                Ετικέτα Χ άξονα                                            </option>
                                                                                        <option value="20">
                                                Ετικέτα Y άξονα                                            </option>
                                                                                    </select>

                                    </td>
                                    <td class="grade-4">row 1 [cell 2]</td>
                                    <td class="grade-3">row 1 [cell 3]</td>
                                    <td class="grade-2">row 1 [cell 4]</td>
                                    <td class="grade-1">row 1 [cell 5]</td>
                                    <td>
                                        <input type="number" min="1" max="4" class="gradeinp1">
                                    </td>
                                </tr>`);

        });



        $("#deleteBtn").click(function() {
            let currentselect = $(this);
            let gradingId = $("#grading-id").data('grading-id');
            $.ajax({
                url: `gradingfnc.php?id=${gradingId}`,
                type: 'DELETE',
                success: function(data) {
                    $.notify("Το Φύλλο Αξιολόγησης Διαγράφηκε Επιτυχώς!", "success");
                    setTimeout(function() {
                        window.location.href = "grading.php";
                    }, 2000);
                },
                error: function(request, error) {}
            });


        });


    });
    </script>


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
            <div class="content" id="content">
                <div class="col1">

                    <div class="headercol1">
                        <h3> Στοιχεία Αξιολόγησης </h3>
                    </div>

                    <div class="contentcol2">
                        <p>
                            <br>

                        <ul class="paper-info">

                            <?php

                                    $id = isset($_GET['gradingId']) ? (int) $_GET['gradingId'] : null;
                                    $sql ="select u.usersName, g.id, g.titlos, g.creation_date, s.name, s.last_name, s.vathmida, s.taksi, s.am from grading g join students s on g.student_id = s.id join users u on u.usersId = g.teacher_id where g.id=?";


                                    if($stmt=$conn->prepare($sql)){ 

                                        $stmt->bind_param("i" , $id); 
                                        $stmt->execute();
                                        $result = $stmt->get_result(); // get the mysqli result
                                        
                                        while($gradingDetails = mysqli_fetch_assoc($result)){
                                            
                                            $creationDate=date_create($gradingDetails['creation_date']);
                                            
                                            echo "<li id='grading-id' data-grading-id=".$gradingDetails['id']."><b>Τίτλος: </b><br>".$gradingDetails['titlos']."</li>";
                                            echo "<li><b>Ημερομηνία Αξιολόγησης: </b><br>".date_format($creationDate,"d/m/Y")."</li>";
                                            echo "<li><b>Όνομα Βαθμολογητή: </b><br>".$gradingDetails['usersName']."</li>";
                                            echo "<li><b>Επώνυμο Μαθητή: </b><br>".$gradingDetails['last_name']."</li>";
                                            echo "<li><b>Όνομα Μαθητή: </b><br>".$gradingDetails['name']."</li>";
                                            echo "<li><b>Βαθμίδα: </b><br>".$gradingDetails['vathmida']."</li>";
                                            echo "<li><b>Τάξη: </b><br>".$gradingDetails['taksi']."</li>";
                                            echo "<li><b>ΑΕΜ: </b><br>".$gradingDetails['am']."</li>";

                                        }
                                       
                                    }

                                 ?>

                        </ul>

                        </p>

                    </div>
                    <div class="footercol1">


                    </div>
                </div>


                <span class="col2">
                    <div class="table-info2">

                        <div class="tableinfoheader">
                            <h3>Φύλλο Αξιολόγησης Μαθητή</h3>
                        </div>
                    </div>
                    <div class="table" id="table">


                        <?php 

                            $id = isset($_GET['gradingId']) ? (int) $_GET['gradingId'] : null;
                            $teacherId=$_SESSION['userid'];

                            $sql ="select cr.id as criteriaId, cr.criteria_title, cr.criteria4, cr.criteria3, cr.criteria2, cr.criteria1, cr.vathmos from criteria cr join grading gr on cr.grading_id = gr.id where gr.id =? and gr.teacher_id=?";
                            
                            
                            if($stmt=$conn->prepare($sql)){ 

                                $stmt->bind_param("ii" , $id,$teacherId); 
                                $stmt->execute();
                                $result = $stmt->get_result(); // get the mysqli result

                            }
                                

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

                                <?php

                                    $category = "SELECT id,category FROM selections;";                                 

                                    $telikosVathmos = 0;

                                while($criteriaRows = mysqli_fetch_assoc($result)){

                                    $telikosVathmos+=(int)$criteriaRows['vathmos'];

                                    $res1 = mysqli_query($conn, $category);

                                    echo  "<tr data-criteria-id='".$criteriaRows['criteriaId']."'>";
                                    echo "<td>";
                                    echo "<select name='select_catg' id='select_catg' class='select_catg' disabled>";

                                    while ($rows = mysqli_fetch_array($res1)) {

                                        

                                        if($criteriaRows['criteria_title'] === $rows['category']){
                                            
                                            echo "<option selected value=\"".$rows['id']."\">";
                                            echo $rows['category']."</option>";
                                            

                                            }
                                            else{
                                                
                                             echo "<option value=\"".$rows['id']."\">";
                                             echo $rows['category']."</option>";
                                             
                                        }

                                    }

                                    echo "</select>";
                                    echo "</td>";
                                    echo "<td  class='grade-4'>";
                                    echo $criteriaRows['criteria4'];
                                    echo "</td>";
                                    echo "<td  class='grade-3'>";
                                    echo $criteriaRows['criteria3'];
                                    echo "</td>";
                                    echo "<td  class='grade-2'>";
                                    echo $criteriaRows['criteria2'];
                                    echo "</td>";
                                    echo "<td  class='grade-1'>";
                                    echo $criteriaRows['criteria1'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<input type='number' value='".$criteriaRows['vathmos']."' min='1' max='4' class='gradeinp1' disabled>";

                                    echo "</td>";
                                    echo "</tr>";

                                }

                                echo "<table class='lastTable'>";
                                    echo "<tr>";
                                        echo "<div class='allBtns'>";
                                                echo "<div class='additionalBtns'>";
                                                
                                                        echo "<div id='telikoText'>Τελική <br> Βαθμολογία</div>";
                                                        echo "<div id='telikosVathmos'><input id='telikiVathmologia' type='number' value='".$telikosVathmos."' min='1' max='4' class='gradeinp11' disabled></div>";
                    
                                                echo "</div>";            
                                                            
                                                            
                                                echo "<div class='lastBtns'>";

                                                    echo "<div id='addrowBtn'><input id='addbtn' type='button' value='+' hidden></div>";
                                                    echo "<div id='subOk'><input class='gradesubmitbtn' id='gradesubmitbtn' type='button' form='form1' value='Υποβολή Αλλαγών' hidden></div>";
                                                    

                                                echo "</div>";
                                        echo "</div>";
                                    echo "</tr>";
                                echo "</table>";

                                ?>


                            </tbody>
                        </table>

                        <div class="buttons">
                            <br /><br />

                            <ul class="btn-list">
                                <li>

                                    <button class="editbtn" id="editbtn" type="submit">
                                        Επεξεργασία
                                    </button>

                                </li>
                                <li>

                                    <button class="deletebtn" id="deleteBtn" type="submit">
                                        Διαγραφή
                                    </button>
                                <li>

                                    <button class="deletebtn" type="button" onclick="printDiv()">
                                        Εκτύπωση
                                    </button>

                                </li>
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
    a.document.write('<link rel="stylesheet" href="css/print.css" type="text/css" />');
    a.document.write('<html>');
    a.document.write('<body >');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}
</script>

</html>