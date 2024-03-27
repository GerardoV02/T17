<!--
Classes:
- Title="PageTitle"
-->
<h1 class="PageTitle"><?php echo ucwords($page);?></h1>

<form method="post">
    <div>
        <label for="dimension">Dimension (between 0 and 26):</label>
        <input type="range" id="dimension" name="dimension" min="0" max="26">
        <label for="color">Background Color:</label>
        <select name="color" id="color">
    </div>
    <div>
            <option value="">--- Choose a color ---</option>
            <option value="red">Red</option>
            <option value="orange">Orange</option>
            <option value="yellow">Yellow</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
            <option value="purple">Purple</option>
            <option value="grey">Grey</option>
            <option value="brown">Brown</option>
            <option value="black">Black</option>
            <option value="teal">Teal</option>
        </select>
    </div>
        <input name = "page" value="color generator" type = "hidden">
    <div>
        <button type="submit">Select</button>
    </div>
</form>

<?php
    echo($_POST["page"]."<br>");
    if(isset($_POST["color"])){
        echo($_POST["color"]."<br>");
    }
    if(isset($_POST["dimension"])){
        echo($_POST["dimension"]."<br>");
    }
?>

<?php

    if(isset($_POST["dimension"])){
        $num = $_POST["dimension"];

        echo ("<table>");


        $letterNum = ord('a');

        for($i = 0; $i < $num+1; $i++){
            echo("<tr>");
    
            for($j = 0; $j < $num+1;$j++){

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