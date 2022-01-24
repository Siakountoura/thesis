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