<!DOCTYPE html>
<head>
    <title>About Us</title>
    <meta charset="UTF-8">
    <meta name = "author" content = "T17">
    <meta name = description content = "About Page for Group Project Website">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<html>
<?php
    $page = "home";
    if (isset($_POST["page"]))
    {
        $page = $_POST["page"];
    }
    readfile("navbar/navbar.php");
    echo("<br><br>");
    if ($page=="home")
    readfile("home.php");
    if ($page=="about")
    readfile("about.php");
    if ($page=="color+gen")
    readfile("colorgen.php")
?>
</html>
