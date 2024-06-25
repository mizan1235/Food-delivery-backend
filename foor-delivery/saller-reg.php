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
     $name = $data['name'];
     $email = $data['email'];
     $shopname = $data['shopname'];
     $phone = $data['phone'];
     $address=$data['address'];
     $pin=$data['pin'];
     $password = $data['password'];
     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
     $sql="INSERT INTO `saller` (`name`, `email`,`shopname`, `phone`,`address`,`pin`,`password`) VALUES ('$name', '$email','$shopname', '$phone','$address','$pin','$hashedPassword')";
     $result = mysqli_query($conn, $sql);
     if($result){
         echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
     }
     else{
         echo json_encode(['status' => 'error', 'message' => 'Data not inserted']);
     }
       
    
}
?>