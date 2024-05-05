<?php
$servername = "faure";

include '../../login.php';

//GET variables for newName and newHex values
$newName = isset($_GET["newName"]) ? $_GET["newName"] : "N/A";
$newHex = isset($_GET["newHex"]) ? $_GET["newHex"] : "N/A";

$conn = new mysqli($servername,$username,$password, $db);

//ERROR MESSAGE
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Insert statement
$sql = "INSERT INTO colors(colorName,Hex) values('$newName', '$newHex')";

$result;

//This message encoded in JSON will be sent back to the front end 
if($conn->query($sql)){
    $result = "SUCCESS: Data inserted into database.";
}
else{
    $result = "FAILED: Data was not inserted into database. Duplicate values cannot be added.";
}

echo json_encode($result);
exit();


