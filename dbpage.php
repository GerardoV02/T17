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
    <!-- Show table -->
    <div>
        <button id="show">Show Table</button>
    </div>

    <!-- Add a color-->
    <div>
        <h2>Add a Color</h2>
        <input type = "text" id = "newColorName" placeholder="Add a color name">
        <input type = "text" id = "newColorHex" placeholder="Add the color hex">
        <button id = "add">+</button> 
    </div>
    
    <br>

    <!-- this div will be used to load content from database -->
    <div id = "content"></div>
</body>

</div>
</html>








