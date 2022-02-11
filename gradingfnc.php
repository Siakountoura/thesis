<?php 
session_start();

include_once 'includes/dbh.inc.php';


$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
// var_dump($request);

switch ($method) {
  case 'PUT':
    handlePut();
    break;
  case 'POST':
    handlePost();
    break;
  case 'GET':

    // do_something_with_get($request);
    break;
  case 'DELETE':
      handleDelete();
      break;
  default:
      echo "default switch";
    // handle_error($request);
    break;
}

function handlePost()
{
    global $conn;
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if(strcasecmp($contentType, 'application/json') != 0){
        throw new Exception('Content type must be: application/json');
    }

    //Receive the RAW post data.
    $content = trim(file_get_contents("php://input"));

    //Attempt to decode the incoming RAW post data from JSON.
    $decoded = json_decode($content, true);

    //If json_decode failed, the JSON is invalid.
    if(!is_array($decoded)){
        throw new Exception('Received content contained invalid JSON!');
    }

    $student = $decoded["student"];
    // prepare and bind
    


    $id = null;

    if($student["id"]==null){

        $stmt = $conn->prepare("INSERT INTO students (name, last_name, am, vathmida, taksi) VALUES (?, ?, ?, ?, ?)");
    
        $stmt->bind_param("sssss", $firstName, $lastName, $am, $vathmida, $taksi);

        $firstName = $student["name"];
        $lastName = $student["lastname"];
        $am = $student["am"];
        $vathmida = $student["vathmida"];
        $taksi = $student["taksi"];

        $stmt->execute();

        $id = $stmt->insert_id;
        //$stmt->close();
        
    } else {

        $id = $student["id"];

    }

    $grading = $decoded["grading"];
   
    $stmt = $conn->prepare("INSERT INTO grading (titlos, student_id , teacher_id, teliki_vathmologia, creation_date, modification_date) VALUES (?, ?, ?, ?, now(), now())");
    
    $stmt->bind_param("siii", $titlos, $studentId, $teacherId, $telikiVathmologia);

    $titlos = $grading["title"];
    $studentId = $id;
    $teacherId = $_SESSION["userid"];
    $telikiVathmologia = $grading["telikiVathmologia"];

    $stmt->execute();
    $gradingId = $stmt->insert_id;

    //$stmt->close();

    $criterias = $decoded["criteria"];

    $stmt = $conn->prepare("INSERT INTO criteria ( grading_id, criteria_title, criteria1 , criteria2, criteria3, criteria4, vathmos) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("issssss", $gradingId, $criteriaTitle, $creteria1, $criteria2, $criteria3, $criteria4, $vathmos);


    foreach($criterias as $criteria) {
       
        $criteriaTitle = $criteria["criteriaTitle"];
        $creteria1 = $criteria["criteriaOne"];
        $criteria2 = $criteria["criteriaTwo"];
        $criteria3 = $criteria["criteriaThree"];
        $criteria4 = $criteria["criteriaFour"];
        $vathmos = $criteria["vathmos"];

        $stmt->execute();

    }

    $stmt->close();


}

    function handlePut(){
     
        global $conn;
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        
        if(strcasecmp($contentType, 'application/json') != 0){
            throw new Exception('Content type must be: application/json');
        }

        //Receive the RAW post data.
        $content = trim(file_get_contents("php://input"));

        //Attempt to decode the incoming RAW post data from JSON.
        $decoded = json_decode($content, true);

        //If json_decode failed, the JSON is invalid.
        if(!is_array($decoded)){
            throw new Exception('Received content contained invalid JSON!');
        }


        $grading = $decoded["grading"];

      
        $stmt = $conn->prepare("UPDATE grading g set g.teliki_vathmologia=?, g.modification_date=now() where g.id=?");
        
        $stmt->bind_param("ii", $telikiVathmologia, $gradingId);

        $telikiVathmologia = $grading["telikiVathmologia"];
        $gradingId = $grading['id'];

        $stmt->execute();

        $criterias = $decoded["criteria"];

        

        $stmt = $conn->prepare("UPDATE criteria cr set cr.criteria_title=?, cr.criteria1=? , cr.criteria2=?, cr.criteria3=?, cr.criteria4=?, cr.vathmos=? where cr.id=?");
        $stmt2 = $conn->prepare("INSERT INTO criteria ( grading_id, criteria_title, criteria1 , criteria2, criteria3, criteria4, vathmos) VALUES (?, ?, ?, ?, ?, ?, ?)");
    

        $stmt->bind_param("ssssssi", $criteriaTitle, $creteria1, $criteria2, $criteria3, $criteria4, $vathmos, $creteriaId);
        $stmt2->bind_param("issssss", $gradingId, $criteriaTitle, $creteria1, $criteria2, $criteria3, $criteria4, $vathmos);

        foreach($criterias as $criteria) {
          
            $creteriaId = $criteria["criteriaId"];
            $criteriaTitle = $criteria["criteriaTitle"];
            $creteria1 = $criteria["criteriaOne"];
            $criteria2 = $criteria["criteriaTwo"];
            $criteria3 = $criteria["criteriaThree"];
            $criteria4 = $criteria["criteriaFour"];
            $vathmos = $criteria["vathmos"];
           
            if ($creteriaId === NULL){
                
                $stmt2->execute();

            }else{

                $stmt->execute();

            }

        }

        $stmt->close();

    }

     function handleDelete(){

        global $conn;

        $gradingId = $_REQUEST['id'];
        $stmt2 = $conn->prepare("DELETE FROM grading where id=?");
        $stmt2->bind_param("i", $gradingId);
        $stmt2->execute();
     }
?>