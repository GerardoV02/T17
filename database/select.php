<?php
$servername = "faure";

include '../../login.php';

$table = isset($_GET["table"]) ? strtolower($_GET["table"]) : "colors";

$conn = new mysqli($servername,$username,$password, $db);

//ERROR MESSAGE
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Simple SQL statement to show the colors in the colors table
$sql = "SELECT * FROM $table";

$result = $conn->query($sql);

$output = array();
while ($row = $result->fetch_assoc())
    array_push($output, $row);
echo json_encode($output);
exit();


