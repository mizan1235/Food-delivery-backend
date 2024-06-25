<?php
// Connecting to the Database
$servername = "sql208.infinityfree.com";
$username = "if0_36778512";
$password = "NvbPBV26wa";
$database = "if0_36778512_food_delivery";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    // echo "Connection was successful<br>";
}
?>