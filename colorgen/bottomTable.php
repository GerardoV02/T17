<?php

if(isset($_POST["dimension"])){
    $dim = $_POST["dimension"];
    $num = $_POST["num_colors"];

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