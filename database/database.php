<?php
$servername = "faure";

include '../../login.php';



$show = isset($_GET["table"]) ? strtolower($_GET["table"]) : "N/A";
//Setting variables for potential new colors
$newName = isset($_GET["newName"]) ? $_GET["newName"] : "N/A";
$newHex = isset($_GET["newHex"]) ? $_GET["newHex"] : "N/A";

$conn = new mysqli($servername,$username,$password, $db);

//ERROR MESSAGE
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if($newName != "N/A" && $newHex != "N/A"){
  $sql = "INSERT INTO colors(colorName,Hex) values('$newName', '$newHex')";

  $result;

  if($conn->query($sql)){
    $result = "SUCCESS: Data inserted into database.";
  }
  else{
    $result = "FAILED: Data was not inserted into database.";
  }

  echo json_encode($result);
  exit();
}

