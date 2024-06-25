<?php

//upload.php

header("Access-Control-Allow-Origin:* ");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
include('_dbconnect.php');
$upload_directory = '../upload/';
$file_name_array = explode(".", $_FILES['file']['name']);
$file_name = time() . '.' . end($file_name_array);
$upload_file = $upload_directory . $file_name;
$image_link = 'http://localhost/Project/upload/' . $file_name;
$name=$_POST['name'];

if(!file_exists($upload_directory))
{
	mkdir($upload_directory, 0777, true);
}

if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file))
{
   
    $sql="INSERT INTO `files` (`name`, `title`) VALUES ('$name', '$image_link')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully',
        'message' => 'File uploaded successfully', 
		'image_link' => $image_link,
        'name'=>$name]);
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
