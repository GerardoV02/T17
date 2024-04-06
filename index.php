<!DOCTYPE html>
<html>
    <?php
        $page = "home";
        if (isset($_POST["page"])) {
            $page = $_POST["page"];
        }
    ?>
    <head>
        <title><?php echo ucwords($page);?></title>
        <meta charset="UTF-8">
        <meta name="author" content="T17">
        <meta name="description" content="<?php echo ucwords($page);?> Page for Group Project Website">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./style.css" rel="stylesheet">
    </head>
    <body>

        <?php 
            require("./navbar/navbar.php");
            echo("<br><br>");
        ?>
        <div id="Container">
            <?php
                if ($page == "home")
                require("./home.php");
                if ($page == "about")
                require("./about.php");
                if ($page == "color generator")
                require("./colorgen.php");
            ?>
        </div>
    </body>
    <footer></footer>
</html>
