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
    
     $address = $data['address'];
     
     $sql="INSERT INTO `addresses` ( `email`,`address`) VALUES ('$email','$address')";
     $result = mysqli_query($conn, $sql);
     if($result){
        
            echo json_encode(['status' => 'success', 'message' => 'Address Added Sussessfully']);
           
   
     }
     else{
         echo json_encode(['status' => 'error', 'message' => 'Address Not Added']);
     }
       
    
}

?>