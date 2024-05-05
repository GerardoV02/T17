<?php
$servername = "faure";

include '../../login.php';

//GET variables for oldName, newName and newHex values
$name = isset($_GET["deleteColor"]) ? $_GET["deleteColor"] : "N/A";

$conn = new mysqli($servername,$username,$password, $db);

//ERROR MESSAGE
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
//delete statement
$sql = "DELETE FROM colors WHERE colorName='$name'";

$result;

//This message encoded in JSON will be sent back to the front end 
if($conn->query($sql)){
    $result = "SUCCESS: Data was deleted from database.";
}
else{
    $result = "FAILED: Data was not deleted. Please double check your input values";
}

echo json_encode($result);
exit();


