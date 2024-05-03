<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="database/script.js"></script>

    <link href="./style.css" rel="stylesheet">
</head>

<?php 
    require("./navbar/navbar.php");
    // echo("<br><br>");
?>



<div id = "Container">
<h1 class = "PageTitle">Database Page</h1>
<body>
    <button id="select" onclick = "load()">Show Table</button>

    <!-- this div will be used to load content from database -->
    <div id = "content"></div>

    <h2>Add A Color</h2>
    <input type = "text" placeholder="Enter a new color name" id = "newColorName">
    <input type = "text" placeholder="Enter a new color hex" id = "newColorHex">
    <button id = "addColor">Add Color</button> 
    <div id = "addResult" onclick = "loadAdd()"></div>

    <h2>Update A Color</h2>
    <input type = "text" placeholder="Enter old color name" id = "oldColorName">
    <input type = "text" placeholder="Enter new color name" id = "updateColor">
    <input type = "text" placeholder="Optional: new color hex" id = "updateHex">
    <button id = "updateColor">Update Color</button>
    <div id = "updateResult"></div>

    <h2>Delete A Color</h2>
    <input type = "text" placeholder="Enter color to delete" id = "deleteName">
    <button id = "deleteColor">Delete Color</button>
    <div id = "deleteResult"></div>
</body>



</div>
</html>








