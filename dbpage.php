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
    <button id="test">Show Table</button>

    <!-- this div will be used to load content from database -->
    <div id = "content"></div>
</body>

</div>
</html>








