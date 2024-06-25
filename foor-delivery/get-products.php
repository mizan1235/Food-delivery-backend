<?php
// Allow from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// If you want to restrict the origin


header("Access-Control-Allow-Origin: http://localhost:3000");
 include '_dbconnect.php';
 


 if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    //echo $data;
    // Handle your login logic here
    
     
     
     $sql="SELECT * FROM `products` LIMIT 20";
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
         echo json_encode(['status' => 'error', 'message' => 'User Not Found']);
     }
       
    
}

?>