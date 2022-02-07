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


    <title>Βαθμίδες</title>

    <script>
    $(document).ready(function() {


        $(".vathmidessubmitbtn").click(function() {

            let vathmida = $('#vathmida').find(":selected").val();
            let taksi = $('#taksi').find(":selected").val();

            window.location.href = `./vathmides.php?vathmida=${vathmida}&taksi=${taksi}`;
        });

    });
    </script>

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

            <?php
            if(!isset($_GET["vathmida"]) || !isset ($_GET["taksi"])){

            
        ?>

            <div class="content">
                <div class="col1">

                    <div class="headercol1">
                        <h3> Στοιχεία Βαθμίδας <br> ή Τάξης </h3>
                    </div>

                    <div class="contentcol2">
                        <p>

                            <br /><br />

                            <select id="vathmida">
                                <option selected hidden>Επιλογή Βαθμίδας</option>
                                <option value="Γυμνάσιο">Γυμνάσιο</option>
                                <option value="Λύκειο">Λύκειο</option>
                            </select>

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

                            <br />
                            <button class="vathmidessubmitbtn" type="submit" form="vathmides" value="Submit">
                                Υποβολή
                            </button>

                        </p>

                    </div>
                    <div class="footercol1">
                        <p class="mo-vathmidas"><b>Μ.Ο Τμήματος/Βαθμίδας:</b></p>


                    </div>
                </div>


                <span class="col2">
                    <div class="table-info2">

                        <div class="tableinfoheader">
                            <h3>Αξιολόγησεις</h3>
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


                            </tbody>
                        </table>
                    </div>
                </span>
            </div>

            <?php

            }else{

            

            ?>

            <div class="content">
                <div class="col1">

                    <div class="headercol1">
                        <h3> Στοιχεία Βαθμίδας <br> ή Τάξης </h3>
                    </div>

                    <div class="contentcol2">
                        <p>

                            <br /><br />

                            <select id="vathmida">
                                <option selected hidden>Επιλογή Βαθμίδας</option>
                                <option value="Γυμνάσιο">Γυμνάσιο</option>
                                <option value="Λύκειο">Λύκειο</option>
                            </select>

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

                            <br />
                            <button class="vathmidessubmitbtn" type="submit" form="vathmides" value="Submit">
                                Υποβολή
                            </button>

                        </p>

                    </div>
                    <div class="footercol1">


                        <?php

                                $vathmida=$_GET['vathmida'];
                                $taksi=$_GET["taksi"];


                                $sql2="SELECT COUNT(*)*4 as countCriteria FROM criteria cr JOIN grading gr on cr.grading_id=gr.id join students s on s.id = gr.student_id where s.vathmida=? and s.taksi=?";

                                $sql3="SELECT SUM(gr.teliki_vathmologia) as sumVathmologia from grading gr join students s on s.id = gr.student_id where s.vathmida=? and s.taksi=?";

                                $sumTelikosVathmosResult = null;
                                $criteriaCountResult = null;

                                if($stmt=$conn->prepare($sql2)){ 

                                    $stmt->bind_param("ss" , $vathmida,$taksi); 
                                    $stmt->execute();
                                    $result = $stmt->get_result(); // get the mysqli result
                                    $criteriaCountResult= $result->fetch_assoc(); // fetch data
    
                                }

                                if($stmt=$conn->prepare($sql3)){ 

                                    $stmt->bind_param("ss" , $vathmida,$taksi); 
                                    $stmt->execute();
                                    $result = $stmt->get_result(); // get the mysqli result
                                    $sumTelikosVathmosResult= $result->fetch_assoc(); // fetch data

                                    //var_dump($sumTelikosVathmos);

                               }

                               if ($criteriaCountResult == NULL || $sumTelikosVathmosResult == NULL || $criteriaCountResult['countCriteria'] == 0){
                            
                                echo "<p class='mo-vathmidas'>Μ.Ο Τμήματος/Βαθμίδας: Δεν υπάρχουν καταχωρήσεις</p>";
                            
                            }else {

                                    $sumTelikosVathmos  = (float)$sumTelikosVathmosResult['sumVathmologia'];
                                    $criteriaCount  = (int)$criteriaCountResult['countCriteria'];

                                    $mesosOros = ($sumTelikosVathmos/$criteriaCount)*100;
                                    echo "<p class='mo-vathmidas'>Μ.Ο Τμήματος/Βαθμίδας: ".number_format($mesosOros,2)."%</p>";
                            }

                        ?>


                    </div>
                </div>


                <span class="col2">
                    <div class="table-info2">

                        <div class="tableinfoheader">
                            <h3>Αξιολόγησεις</h3>
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

                                <?php

                                
                                $sql="select g.id, g.titlos, g.teliki_vathmologia, g.creation_date, g.modification_date, u.usersName, s.am, s.vathmida, s.taksi from grading g join students s on g.student_id = s.id join users u on u.usersId = g.teacher_id where s.vathmida=? and s.taksi=?";

                                if($stmt=$conn->prepare($sql)){ 

                                    $stmt->bind_param("ss" , $vathmida,$taksi); 
                                    $stmt->execute();
                                    $result = $stmt->get_result(); // get the mysqli result
                                   

                                    while($gradingDetails = mysqli_fetch_assoc($result)){
                                        
                                        $creationDate=date_create($gradingDetails['creation_date']);
                                        $modificationDate=date_create($gradingDetails['modification_date']);

                                        echo"<tr>";
                                            echo "<td>".$gradingDetails['id']."</td>";
                                            echo "<td><a href='gradedpaper.php?gradingId=".$gradingDetails['id']."' class='gradedpaper'>" .$gradingDetails['titlos']. "</a></td>";
                                            echo "<td>".$gradingDetails['usersName']."</td>";
                                            echo "<td>".$gradingDetails['am']."</td>";
                                            echo "<td>".$gradingDetails['taksi']."</td>";
                                            echo "<td>".$gradingDetails['vathmida']."</td>";
                                            echo "<td>".$gradingDetails['teliki_vathmologia']."</td>";
                                            
                                            echo "<td>".date_format($creationDate,"d/m/Y")."</td>";
                                            echo "<td>".date_format($modificationDate,"d/m/Y")."</td>";
                                        echo"</tr>";

                                    }

                                    

                                }
                                
                            ?>


                            </tbody>
                        </table>
                    </div>
                </span>
            </div>

            <?php

            }
            
            ?>

        </section>
    </main>
</body>


</html>