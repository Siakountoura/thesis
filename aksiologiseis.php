<?php
session_start();

include_once 'includes/dbh.inc.php';

$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
// var_dump($request);

switch ($method) {
  case 'PUT':

    // do_something_with_put($request);
    break;
  case 'POST':
    // do_something_with_post($request);
    break;
  case 'GET':
    handleGet();
    break;
  case 'DELETE':
      # code...
      break;
  default:
      echo "default switch";
    // handle_error($request);
    break;
}

function handleGet() {
    global $conn;
    $id = isset($_GET['studentId']) ? (int) $_GET['studentId'] : null;
    
    if (isset($_SESSION["userid"] ) ){
        
        if(!$id){
            echo ("Δεν Βρέθηκε Μαθητής");
            die();
        }
    
        $id=$_GET['studentId'];
        $teacherId=$_SESSION['userid'];

        $sql="SELECT * FROM grading where student_id=? and teacher_id=?" ;
        
         if($stmt=$conn->prepare($sql)){ 
             $stmt->bind_param("ii" , $id,$teacherId); 
             $stmt->execute();
             $result = $stmt->get_result(); // get the mysqli result
             
             if(mysqli_num_rows($result) > 0){
               
                    
                while ($row = $result->fetch_assoc()) {

                  $creationDate=date_create($row['creation_date']);
                  $modificationDate=date_create($row['modification_date']);

                                 echo"<tr>";
                                    echo "<td>".$row['id']."</td>";
                                    echo "<td><a href='gradedpaper.php?gradingId=".$row['id']."' class='gradedpaper'>" .$row['titlos']. "</a></td>";
                                    echo "<td>".$row['teliki_vathmologia']."</td>";
                                    echo "<td>".date_format($creationDate,"d/m/Y")."</td>";
                                    echo "<td>".date_format($modificationDate,"d/m/Y")."</td>";
                                echo"</tr>";
                                 
                 }
           }

             else{
                echo ("Δεν Υπάρχουν Αξιολογήσεις για τον Μαθητή");
             }

 
             //var_dump($userGrading);
             return;
        }
      
        http_response_code(404);
        die();
     
    } else 
    {
        http_response_code(403);
    }
    
  }
   



?>