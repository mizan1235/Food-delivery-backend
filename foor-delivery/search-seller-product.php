<?php
// Allow from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// If you want to restrict the origin


header("Access-Control-Allow-Origin: http://localhost:3000");
 include '_dbconnect.php';
 


 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //echo $data;
    // Handle your login logic here
    $data = json_decode(file_get_contents("php://input"), true);
    $search = $data['search'];
    $email=$data['email'];
    
     
     
    //  $sql="SELECT * FROM `products` WHERE `product_name` LIKE '%".$_POST['search']."%' LIMIT 20";
    $sql="SELECT * FROM `products` WHERE `email`='$email' AND `title` LIKE '%$search%' LIMIT 50";
     $result = mysqli_query($conn, $sql);
     if($result){
            //$row = mysqli_fetch_assoc($result);
        $rows = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
            
        }
           
            echo json_encode(['status' => 'success', 'data' => $rows]);
            
            
   
     }
     else{
         echo json_encode(['status' => 'error', 'data' => 'No product found']);
     }
       
    
}

?>