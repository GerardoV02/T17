<!DOCTYPE html>
<html>
<!--
Classes:
- Title="PageTitle"
- Bottom Table = "BottomTable"
-->
<?php
require("./navbar/navbar.php");
?>
<link href="./style.css" rel="stylesheet">
<div id = "Container">
<br>

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
    
    <input type="submit">
</form>

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
    <input type="submit">
</form>

<!--- BOTTOM TABLE --->

<?php

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
echo('</table>');

echo($table);

$formatted_table = addslashes($table);
echo("<button id = 'print' onclick = 'myFunction(\"$formatted_table\")'>Print</button>");
?>



<script>
    function myFunction(contents){
        document.getElementById('Container').innerHTML = contents;
    }
</script>
</div>
</html>