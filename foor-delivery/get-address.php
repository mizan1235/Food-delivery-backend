<?php
// Allow from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// If you want to restrict the origin


header("Access-Control-Allow-Origin: http://localhost:3000");
 include '_dbconnect.php';
 


 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    //echo $data;
    // Handle your login logic here
    
     $email = $data['email'];
    
    
     
     $sql="SELECT * FROM `addresses`  WHERE `email` = '$email' ";
     $result = mysqli_query($conn, $sql);
     if($result){
            
        $rows = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
            
        }
           
        echo json_encode(['status' => 'success', 'address' => $rows]);
           
   
     }
     else{
         echo json_encode(['status' => 'error', 'message' => 'No Address Found']);
     }
       
    
}

?>