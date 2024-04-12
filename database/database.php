<?php
$servername = "faure";
$username;
$password;//password go here
$db;

$conn = new mysqli($servername,$username,$password, $db);

//ERROR MESSAGE
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Sample query
$sql = "SELECT * FROM COLORS";

$result = $conn->query($sql);

$output = array();
while ($row = $result->fetch_assoc())
  array_push($output, $row);
echo json_encode($output);
exit();
?>