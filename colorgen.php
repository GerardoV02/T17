<!--
Classes:
- Title="PageTitle"
- Bottom Table = "BottomTable"
-->
<h1 class="PageTitle"><?php echo ucwords($page);?></h1>

<form method="post">
    <label for="dimension">Dimension = </label>
    <output>
        <?php
            if(isset($_POST["dimension"])) echo($_POST["dimension"]);
            else echo("1");
        ?>
    </output>
    <br>
    <input type="range" id="dimension" name="dimension" min="1" max="26" value="<?php if(isset($_POST["dimension"])) echo($_POST["dimension"]); else echo("1");?>" oninput="this.previousElementSibling.previousElementSibling.value = this.value">
    <br><br>
    <label for="num_colors">Number of Colors = </label>
    <output>
        <?php
            if(isset($_POST["num_colors"])) echo($_POST["num_colors"]);
            else echo("1");
        ?>
    </output>
    <br>
    <input type="range" id="num_colors" name="num_colors" min="1" max="10" value="<?php if(isset($_POST["num_colors"])) echo($_POST["num_colors"]); else echo("1");?>" oninput="this.previousElementSibling.previousElementSibling.value = this.value">
    <br><br>
    <input name="page" value="color generator" type="hidden">
    <button type="submit">Generate</button>
</form>

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
        echo ('<table class = "BottomTable">');
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

            echo("<output id=\"colour" . $i . "\" class=\"$colours[$i]\">this.className changes when colour selected</output>");

            echo("</td>");
    
            echo("</tr>");
        }
        echo("</table>");

        //BottomTable
        echo ('<table class = "BottomTable">');
        $letterNum = ord('a');

        for($i = 0; $i < $dim+1; $i++){
            echo("<tr>");
    
            for($j = 0; $j < $dim+1;$j++){

                //Left uppermost empty
                if($i == 0 && $j == 0){
                    echo("<td></td>");
                    continue;
                }

                //Echos out letter for top rows
                if($i == 0){
                    $letter = chr($letterNum);
                    echo("<td>$letter</td>");
                    $letterNum++;
                    continue;
                }

                if($j == 0){
                    echo("<td>$i</td>");
                    continue;
                }

                echo("<td>");

                //content here
                echo("[    ]");
    
                echo("</td>");
    
            }
            echo("</tr>");
        }
        echo("</table>");
    }
?>