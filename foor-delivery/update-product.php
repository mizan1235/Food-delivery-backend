<?php
// Allow from any origin
// update-product.php
header("Access-Control-Allow-Origin: *"); // Allow any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Allow the PUT method
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Allow specific headers
header("Access-Control-Allow-Credentials: true"); // Allow credentials

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // Handle preflight requests here
    header("HTTP/1.1 200 OK");
    exit();
}



// If you want to restrict the origin


header("Access-Control-Allow-Origin: http://localhost:3000");
 include '_dbconnect.php';
 


 if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);
    //echo $data;
    // Handle your login logic here
    $email=$data['email'];
    $sno=$data['sno'];
    $title=$data['title'];
    $description=$data['description'];
    $price=$data['price'];

    
     
     
     $sql="UPDATE `products` SET `title`='$title',`description`='$description',`price`='$price' WHERE `sno`='$sno' AND `email`='$email'";
     $result = mysqli_query($conn, $sql);
     if($result){
            //$row = mysqli_fetch_assoc($result);
        
           
        echo json_encode(['status' => 'success', 'message' => 'Product Updated']);
     }
     else{
         echo json_encode(['status' => 'error', 'data' => 'No products found']);
     }
       
    
}

?>