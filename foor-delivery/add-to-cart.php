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
    $logo = $data['logo'];
    $title=$data['title'];
    $description=$data['description'];
    $price=$data['price'];
    $product_id=$data['product_id'];
     
    $sql = "INSERT INTO `usercart` (`logo`, `title`, `description`, `price`, `email`,`product_id`) VALUES ('$logo', '$title', '$description', '$price', '$email','$product_id')";
     $result = mysqli_query($conn, $sql);
     if($result){
         echo json_encode(['status' => 'success', 'message' => 'Added To Cart successfully']);
     }
     else{
         echo json_encode(['status' => 'error', 'message' => 'Error while saving']);
     }
       
    
}
?>