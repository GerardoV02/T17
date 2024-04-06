<!DOCTYPE html>
<html>
<!--
Classes:
- Title="PageTitle"
- Bottom Table = "BottomTable"
- printInfo = 'printPage'
-->
<?php
require("./navbar/navbar.php");
?>
<link href="./style.css" rel="stylesheet">
<div id = "Container">
<br>

<!--- FORM --->
<h1 class="PageTitle">Color Generator</h1>

<form method="get">
    <div class="DimensionsForm">
    <label for="dimensions">Dimension = </label>   
    <?php
        $dimensions = 1;
        if(isset($_GET["dimensions"]))
            $dimensions = $_GET["dimensions"];
        echo "<input type=\"range\" id=\"dimensions\" name=\"dimensions\" min=\"1\" max=\"26\" value=\"$dimensions\">";
        echo "dimensions = $dimensions";
    ?>

    <div class="ColorsForm">
    <label for="colors">Colors = </label>   
    <?php
        $colors = 1;
        if(isset($_GET["colors"]))
            $colors = $_GET["colors"];
        echo "<input type=\"range\" id=\"colors\" name=\"colors\" min=\"1\" max=\"10\" value=\"$colors\">";
        echo "colors = $colors";
    ?>
    <br>
    <button type="submit">Set Colors and Dimensions values</button>
</form>
<br>
------------------------------------------------------------------------------------------------------------------------
<br>
<form method="post" action="colorgen.php?dimensions=<?php echo($dimensions);?>&colors=<?php echo($colors);?>">

    <div class = "SelectColorsForm">
    <?php
        for ($i = 0; $i <$colors; $i++)
        {
            $thiscolor= "";
            $selectedColor = "---choosecolor---";
            if (isset($_POST["color$i"]))
            {
                $thiscolor = $_POST["color$i"];
            }
            if ($thiscolor!="")
            {
            $selectedColor = strtoupper($thiscolor);
            }
    echo "
        <label for=\"color$i\">Color$i</label>
        <select name=\"color$i\" id=\"color\"> 
            <option value=\"$thiscolor\">$selectedColor</option>
            <option value=\"red\">RED</option>
            <option value=\"orange\">ORANGE</option>
            <option value=\"yellow\">YELLOW</option>
            <option value=\"green\">GREEN</option>
            <option value=\"blue\">BLUE</option>
            <option value=\"purple\">PURPLE</option>
            <option value=\"grey\">GREY</option>
            <option value=\"brown\">BROWN</option>
            <option value=\"black\">BLACK</option>
            <option value=\"teal\">TEAL</option>
        </select>
    <br> ";
    }
    ?>
    <button type="submit">Set Color Values</button>
</form>
<!--- FORM VALIDATOR --->






<!--- BOTTOM TABLE --->





<?php

//Creating a string that will be used to hold a new class for easy formatting
//This formatted_print variable will be what our print menu will be based on
$formatted_print = '<h1 id = "PrintMenu">Print Menu</h1>';
$formatted_print .= '<div id = "printPage">';
$formatted_print .= '<h2>Selected Colors:</h2>';

//Creating a string that is going to hold the colors picked for printing
$colorInfo = '<ul>';

if(isset($_GET["colors"])){
    $colors = $_GET["colors"];
    for($i = 0; $i < $colors; $i++){
        if(isset($_POST["color$i"])){
            $colorInfo.='<li>'.$_POST['color'.$i].'</li>';
        }
    }
}
$colorInfo .= '</ul>';
echo($colorInfo);


//adding color info to the print information
$formatted_print.=$colorInfo;

//Creating the n+1 x n+1 table
$table = '<table class = "BottomTable">';

if(isset($_GET["dimensions"])){
    $dim = $_GET["dimensions"];

$letterNum = ord('A');

for($i = 0; $i < $dim+1; $i++){
    $table.="<tr>";
    //echo("<tr>");

    for($j = 0; $j < $dim+1;$j++){

        //Left uppermost empty
        if($i == 0 && $j == 0){
            $table.='<td class = "Cell"></td>';
            continue;
        }

        //Echos out letter for top rows
        if($i == 0){
            $letter = chr($letterNum);
            $table.='<td class = "Cell">'.$letter.'</td>';
            $letterNum++;
            continue;
        }

        //Echos out numbers for leftmost columns
        if($j == 0){
            $table.='<td class = "Cell">'.$i.'</td>';
            continue;
        }

        $table.='<td class = "Cell">';

        //content here

        $table.='</td>';

    }
    $table.='</tr>';
}
}
$table.='</table>';

echo($table);

//Adding escape characters to the table so that way it can be treated and passed as a string to the printScreen function
$formatted_print.=$table;
$formatted_print.='</div>';
$formatted_print = addslashes($formatted_print);

echo("<button id = 'print' onclick = 'printScreen(\"$formatted_print\")'>Print</button>");
?>


<script>
    function printScreen(contents){
        document.getElementById('Container').innerHTML = contents;
    }
</script>
</div>
</html>