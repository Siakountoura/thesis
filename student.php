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
            http_response_code(404);
            die();
        }
    
        header("Content-Type: application/json; charset=UTF-8");
    
        $id=$_GET['studentId']; 
        $teacherId=$_SESSION['userid'];

        $sql="SELECT * FROM students where id=?" ;
        
         if($stmt=$conn->prepare($sql)){ 
             $stmt->bind_param("i" , $id); 
             $stmt->execute();
             $result = $stmt->get_result(); // get the mysqli result
             $user = $result->fetch_assoc(); // fetch data
             
             if ($user == null){
                http_response_code(404);
                die();
             }
    
             $sql2="SELECT COUNT(*)*4 as countCriteria FROM criteria cr JOIN grading gr on cr.grading_id=gr.id WHERE gr.student_id=? and gr.teacher_id=?"; //criteria count
             $sql3="SELECT SUM(gr.teliki_vathmologia) as sumVathmologia from grading gr where gr.student_id=? and gr.teacher_id=?"; //grade count

             $sumTelikosVathmosResult = null;
             $criteriaCountResult = null;
             if($stmt=$conn->prepare($sql2)){ 

                $stmt->bind_param("ii" , $id,$teacherId); 
                $stmt->execute();
                $result = $stmt->get_result(); // get the mysqli result
                $criteriaCountResult= $result->fetch_assoc(); // fetch data
                

             }
            
             
             if($stmt=$conn->prepare($sql3)){ 

              $stmt->bind_param("ii" , $id,$teacherId); 
              $stmt->execute();
              $result = $stmt->get_result(); // get the mysqli result
              $sumTelikosVathmosResult= $result->fetch_assoc(); // fetch data
              
              //var_dump($sumTelikosVathmos);

           }



           if ($criteriaCountResult == NULL || $sumTelikosVathmosResult == NULL || $criteriaCountResult['countCriteria'] == 0){
              $user["mesosOros"] = "Δεν υπάρχουν Kαταχωρήσεις";

           }else {

               $sumTelikosVathmos  = (float)$sumTelikosVathmosResult['sumVathmologia'];
               $criteriaCount  = (int)$criteriaCountResult['countCriteria'];

               $user["mesosOros"] = number_format((($sumTelikosVathmos/$criteriaCount)*100),2);
               
            }



             echo json_encode($user);
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