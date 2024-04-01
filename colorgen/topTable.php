<?php
    if(isset($_POST["dimension"])){
        echo("<p>Dimension: " . $_POST["dimension"]."</p>");
    }
    if(isset($_POST["num_colors"])){
        echo("<p>Number of Colors: " . $_POST["num_colors"]."</p>");
    }

    //PHP script to generate tables
    if(isset($_POST["dimension"])){
        $dim = $_POST["dimension"];
        $num = $_POST["num_colors"];

        
        //TopTable
        echo ('<table class = "TopTable">');
        for($i = 0; $i < $num; $i++){
            echo("<tr>");
            echo("<td>");
            $colours = array("red", "orange", "yellow", "green", "blue", "purple", "grey", "brown", "black", "teal");

            echo("<select id=\"selector" . $i . "\" onchange=\"document.getElementById('colour" . $i . "').className = this.value\">");
            for ($k = 0; $k < 10; ++$k) {
                if ($k == $i) echo("<option value=\"" . $colours[$k] . "\" selected=\"selected\">" . ucwords($colours[$k]) . "</option>");
                else echo("<option value=\"" . $colours[$k] . "\">" . ucwords($colours[$k]) . "</option>");
            }
            echo("</select>");

            echo("</td>");

            echo("<td>");

            echo("<output id=\"colour" . $i . "\" class=\"$colours[$i]\">this.className changes for adding colour through styling when colour selected</output>");

            echo("</td>");
    
            echo("</tr>");
        }
        echo("</table>");

        
    }
?>