<?php
$servername = "faure";

include '../../login.php';

//Table

$show = isset($_GET["show"]) ? $_GET["show"] : "N/A";
$name = isset($_GET["name"]) ? $_GET["name"] : "N/A";
$hex = isset($_GET["hex"]) ? $_GET["hex"] : "N/A";

$conn = new mysqli($servername,$username,$password, $db);

//ERROR MESSAGE
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Query variable
$sql;

//If the show variable is set to yes, then display the table
if($show == "yes"){
  $sql = "SELECT * FROM colors";
}
//INSERT INTO colors(colorName, Hex) values("red","FF0000");
if($name != "N/A" && $hex != "N/A"){
  $sql = "INSERT INTO colors(colorName,Hex) values($name,$hex)";
}

$result = $conn->query($sql);

$output = array();
while ($row = $result->fetch_assoc())
  array_push($output, $row);
echo json_encode($output);
exit();
