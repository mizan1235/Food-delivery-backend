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
    
     $password = $data['password'];
     
     $sql="SELECT * FROM `users` WHERE `email`='$email'";
     $result = mysqli_query($conn, $sql);
     if($result){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])){
                echo json_encode(['status' => 'success', 'message' => 'User Found']);
            }
            else{
                echo json_encode(['status' => 'notmatch', 'message' => 'User Not Found']);
            }
   
     }
     else{
         echo json_encode(['status' => 'error', 'message' => 'User Not Found']);
     }
       
    
}

?>