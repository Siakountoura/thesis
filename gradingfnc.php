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
    handlePost();
    break;
  case 'GET':
    // do_something_with_get($request);
    break;
  case 'DELETE':
      # code...
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

?>