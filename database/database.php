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


if($show != "N/A"){
  $sql = "SELECT * FROM colors";

  $result = $conn->query($sql);
  
  $output = array();
  while ($row = $result->fetch_assoc())
    array_push($output, $row);
  echo json_encode($output);
  exit();
}

if($newName != "N/A" && $newHex != "N/A"){
  $sql = "INSERT INTO colors(colorName,Hex) values('$newName', '$newHex')";

  $searchSQL = "SELECT * FROM colors where colorName=$newName OR Hex=$newHex";

  //Running an SQL statement before to check if the data exists in the table

  $result;

  // if($resultSet = mysqli_query($conn,$searchSQL)){
  //   $rows = mysqli_num_rows($resultSet);

  //   if($rows > 0){
  //     $result = "FAILED: Data exists in database.";
  //     echo json_encode($result);
  //     exit();
  //   }
  // }

  if($conn->query($sql)){
    $result = "SUCCESS: Data inserted into database.";
  }
  else{
    $result = "FAILED: Data was not inserted into database. Duplicate values cannot be added.";
  }

  echo json_encode($result);
  exit();
}

