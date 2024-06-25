<?php

//upload.php

header("Access-Control-Allow-Origin:* ");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
include('_dbconnect.php');
$upload_directory = './upload/';
$file_name_array = explode(".", $_FILES['logo']['name']);
$file_name = time() . '.' . end($file_name_array);
$upload_file = $upload_directory . $file_name;

$image_link = 'http://localhost/projects/upload/' . $file_name;

$email=$_POST['email'];
$title=$_POST['title'];
$category=$_POST['category'];
$shopname=$_POST['shopname'];
$city=$_POST['city'];
$pin=$_POST['pin'];
$description=$_POST['description'];
$price=$_POST['price'];

if(!file_exists($upload_directory))
{
	mkdir($upload_directory, 0777, true);
}

if(move_uploaded_file($_FILES['logo']['tmp_name'], $upload_file))
{
   
    $sql="INSERT INTO `products` ( `title`,`email`,`category`,`shopname`,`city`,`pin`,`description`,`price`,`logo`) VALUES ('$title','$email','$category','$shopname','$city','$pin','$description','$price','$file_name')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully',
        'message' => 'File uploaded successfully', 
		'image_link' => $image_link
        ]);
    }
    else{
        echo json_encode(['status' => 'error', 'message' => 'Data not inserted']);
    }

	// echo json_encode([
	// 	'message' => 'File uploaded successfully', 
	// 	'image_link' => $image_link,
    //     'name'=>$name
        
	// ]);
}



?>
