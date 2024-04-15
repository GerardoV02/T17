<!DOCTYPE html>
<html>
<!--
Classes:
- Title="PageTitle"
- Bottom Table = "BottomTable"
- printInfo = 'printPage'
-->

<link href="./style.css" rel="stylesheet">

<?php
require("./navbar/navbar.php");
?>
<br>

<!--- FORM --->
<div id = "Container">
<h1 class="PageTitle">Color Generator</h1>

<form method="get">
    <div class="dimension Form">
    <label for="dimension_num">Dimension = </label>   
    <?php
        $dimension_num = 1;
        if(isset($_GET["dimension_num"]))
            $dimension_num = $_GET["dimension_num"];
        echo "<output name=\"out_d\" for=\"color_num\">$dimension_num</output>";
        echo "<br><input type=\"range\" id=\"dimension_num\" name=\"dimension_num\" min=\"1\" max=\"26\" value=\"$dimension_num\" oninput=\"out_d.value=this.value\">";
    ?>

    <div class="ColorsForm">
    <label for="color_num">Number of Colors = </label>   
    <?php
        $color_num = 1;
        if(isset($_GET["color_num"]))
            $color_num = $_GET["color_num"];
        echo "<output name=\"out_c\" for=\"color_num\">$color_num</output>";
        echo "<br><input type=\"range\" id=\"color_num\" name=\"color_num\" min=\"1\" max=\"10\" value=\"$color_num\" oninput=\"out_c.value=this.value\">";
    ?>
    <br>
    <br>
    <button type="submit">Update</button>
</form>
<br>
<br>
<br>
<hr>
<br>
<br>
<form method="post" action="colorgen.php?dimension_num=<?php echo($dimension_num);?>&color_num=<?php echo($color_num);?>">

<?php
    $color_num = isset($_GET["color_num"])?$_GET["color_num"]:1;
    $colors = ["red", "orange", "yellow", "green", "blue", "purple", "grey", "brown", "black", "teal"];
    for ($i = 0; $i < $color_num; $i++) {
        echo "<select onchange='setColor($i, this.value)' name='color$i' id='color$i'>";
        foreach ($colors as $color) 
        {
            echo "<option id='color{$i}{$color}' value='$color'$selected>" . strtoupper($color) . "</option>";
        }
        echo "</select>";
        echo "<br>";
    }
?>
<br>
<button type="submit">Set Colors</button>
</form>

<script>
    let color_num = <?php echo(isset($_GET["color_num"])?$_GET["color_num"]:1);?>;
    let usedColors = getUsedColors();
    updateValues();
    function getUsedColors()
    {
        colors = ['red','orange','yellow','green','blue','purple','grey', 'brown','black','teal'];
        return colors.splice(0,color_num);
    }
    function setColor(index,color)
    {
        currentColor = usedColors[index];
        updatedColor = color;
        if (colorAlreadyUsed(color))
        {
            usedColors[getAlreadyUsedIndex(color)]=currentColor;
        }
        usedColors[index]=color;
        updateValues();
    }
    function updateValues()
    {
        for (index = 0; index<color_num; index++)
        {
            document.getElementById("color"+index).value=usedColors[index];
        }
    }
    function colorAlreadyUsed(color)
    {
        return usedColors.indexOf(color)!=-1;
    }
    function getAlreadyUsedIndex(color)
    {
        return usedColors.indexOf(color);
    }

</script>

</form>


<!--- BOTTOM TABLE --->





<?php

//Creating a string that will be used to hold a new class for easy formatting
//This formatted_print variable will be what our print menu will be based on
$formatted_print = '<h1 id = "PrintMenu">Print Menu</h1>';

//This creates a Exit Button from the print Menu
$formatted_print.='<form method="POST" action="colorgen.php"><button type="submit" name="page" value="color generator" id="Exit">Return to Color Generator</button></form>';

//Throwing the table info into a div for easy printing
$formatted_print .= '<div id = "printPage">';
$formatted_print .= '<h2>Selected Colors:</h2>';

//Creating a string that is going to hold the colors picked for printing
$colorInfo = '<ul>';

if(isset($_GET["color_num"])){
    $colors = $_GET["color_num"];
    for($i = 0; $i <= $colors; $i++){
        if(isset($_POST["color$i"])){
            $colorInfo.='<li>'.$_POST['color'.$i].'</li>';
        }
    }
}
$colorInfo .= '</ul>';
//echo($colorInfo);


//adding color info to the print information
$formatted_print.=$colorInfo;

//Creating the n+1 x n+1 table
$table = '<table class = "BottomTable">';

if(isset($_GET["dimension_num"])){
    $dim = $_GET["dimension_num"];

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

echo("<br><button id = 'print' onclick = 'printScreen(\"$formatted_print\")'>Print</button>");
?>


<script>
    function printScreen(contents){
        document.getElementById('Container').innerHTML = contents;
    }
</script>
</div>
</html>