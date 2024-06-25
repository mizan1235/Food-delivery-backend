<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");



header("Access-Control-Allow-Origin: http://localhost:3000");
include '_dbconnect.php';



 if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    $data = json_decode(file_get_contents("php://input"), true);
   
    $email=$data['email'];
    $sno=$data['sno'];
     
     $sql="DELETE FROM `usercart`  WHERE `sno`='$sno'";
     $result = mysqli_query($conn, $sql);
     if($result){
           
           
        echo json_encode(['status' => 'success', 'message' => 'Product Removed from your cart']);
     }
     else{
         echo json_encode(['status' => 'error', 'message' => 'No products found']);
     }
       
    
}

?>