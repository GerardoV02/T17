<?php
$servername = "faure";

include '../../login.php';

//GET variables for oldName, newName and newHex values
$oldName = isset($_GET["newName"]) ? $_GET["newName"] : "N/A";

$newName = isset($_GET["newName"]) ? $_GET["newName"] : "N/A";
$newHex = isset($_GET["newHex"]) ? $_GET["newHex"] : "N/A";

$conn = new mysqli($servername,$username,$password, $db);

//ERROR MESSAGE
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
//Update statement
$sql = "UPDATE colors SET colorName = '$newName' WHERE name = '$oldName'";
//$sql = "UPDATE colors SET colorName = '$newName',Hex = '$newHex' WHERE name = '$oldName'"

$result;

//This message encoded in JSON will be sent back to the front end 
if($conn->query($sql)){
    $result = "SUCCESS: Data was updated in database.";
}
else{
    $result = "FAILED: Data was not updated. Please double check your input values";
}

echo json_encode($result);
exit();


