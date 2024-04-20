<?php
$servername = "faure";

include '../../login.php';

$count = isset($_GET["count"]) ? $_GET["count"] : "10";
$table = isset($_GET["table"]) ? strtolower($_GET["table"]) : "colors";
//Setting variables for potential new colors
$newName = isset($_GET["newName"]) ? $_GET["newName"] : "N/A";
$newHex = isset($_GET["newHex"]) ? $_GET["newHex"] : "N/A";

$conn = new mysqli($servername,$username,$password, $db);

//ERROR MESSAGE
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



//Sample query
$sql = "SELECT * FROM $table";

$result = $conn->query($sql);

$output = array();
while ($row = $result->fetch_assoc())
  array_push($output, $row);
echo json_encode($output);
exit();
