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
<form id= "colorSelectForm" method="post" action="colorgen.php?dimension_num=<?php echo($dimension_num);?>&color_num=<?php echo($color_num);?>">


<?php

    $color_num = isset($_GET["color_num"])?$_GET["color_num"]:1;
    $colorsPossible = ["red", "orange", "yellow", "green", "blue", "purple", "grey", "brown", "black", "teal"];
    $colorsSelected = isset($_POST["colors"])?$_POST["colors"]:$colorsPossible;
    //echo("[".implode(",",$colorsSelected)."]"."<br>");
    echo("<table style=\"border: 3px solid black; border-collapse: collapse;\">");
    for ($i = 0; $i < 10; $i++) {
        echo("<tr>");
        $hidden = $i>$color_num-1;
        if ($hidden)
        {
            echo " <select style='display:none' name='colors[]' onchange='setColor($i,this.value)' id='color$i'> ";
        }
        else
        {
            //generate the radio forms beside the colors 
           echo("<td>
            <input type=\"radio\" name=\"selected_color\" onchange='displaySelectedColor(this.value)' value=\"$colorsSelected[$i]\">
            <label for=\"option1\"></label>
            </td>" );

            //generate the color selector 
            echo("<td style=\"border: 3px solid black; border-collapse: collapse;\">");
            echo "<select name='colors[]' onchange='setColor($i,this.value)' id='color$i'>";
            foreach ($colorsPossible as $color) 
            {
                $selected = $colorsSelected[$i]==$color?"selected":"";
                echo "<option id='color{$i}{$color}' value='$color'$selected>". strtoupper($color) . "</option>";
            }
            echo "</select>";
            echo("</td>");
            echo("<td style=\"border: 3px solid black; border-collapse: collapse;\"id='cell$colorsSelected[$i]'> CELLS: ");
        }
        echo("</tr>");
    }
    echo("</table>"); 
?>
<br>
</form>
<p id="selectedcolor">none</p>
<script>
    let color_num = <?php echo(isset($_GET["color_num"])?$_GET["color_num"]:1);?>;
    let usedColors = getUsedColors();
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
        document.getElementById('colorSelectForm').submit();
    }
    function updateValues()
    {
        for (index = 0; index<10; index++)
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
    function getUsedColors()
    {
        return <?php
        $colorsPossible = ["red", "orange", "yellow", "green", "blue", "purple", "grey", "brown", "black", "teal"];
        $colorsSelected = isset($_POST["colors"])?$_POST["colors"]:$colorsPossible;
        echo("[\"".implode("\",\"",$colorsSelected)."\"]");
        ?> ;
    }
    function displaySelectedColor(color)
    {
        document.getElementById("selectedcolor").innerHTML=(color);
    }
</script>

<!-- BOTTOM TABLE -->




<?php

//Creating a string that will be used to hold a new class for easy formatting
//This formatted_print variable will be what our print menu will be based on
$formatted_print = '<h1 id = "PrintMenu">Print Menu</h1>';

//This creates a Exit Button from the print Menu
$formatted_print.='<form method="POST" action="colorgen.php"><button type="submit" name="page" value="color generator" id="Exit">Return to Color Generator</button></form>';
$formatted_print.='<br><button onclick="printInner()">Print</button>';

//Throwing the table info into a div for easy printing
$formatted_print .= '<div id = "printPage">';
$formatted_print .= '<h2>Selected Colors:</h2>';

//Creating a string that is going to hold the colors picked for printing
$colorInfo = '<ul>';

if(isset($_GET["color_num"])){
    $color_num = $_GET["color_num"];
    $colors = isset($_POST["colors"])?$_POST["colors"]:["red", "orange", "yellow", "green", "blue", "purple", "grey", "brown", "black", "teal"];
    for ($i = 0; $i<$color_num; $i++)
    {
        $colorInfo.='<li>'.$colors[$i].'</li>';
    }
}
$colorInfo .= '</ul>';
//echo($colorInfo);


//adding color info to the print information
$formatted_print.=$colorInfo;

//Creating the n+1 x n+1 table
$table = '<table class = "BottomTable">';

$dim = isset($_GET["dimension_num"])?$_GET["dimension_num"]:1;

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
$table.='</table>';

echo($table);

//Adding escape characters to the table so that way it can be treated and passed as a string to the printScreen function
$formatted_print.=$table;
$formatted_print.='</div>';
$formatted_print = addslashes($formatted_print);

echo("<br><button id = 'print' onclick = 'printScreen(\"$formatted_print\")'>Print Preview</button>");
?>


<script>
    function printScreen(contents){
        document.getElementById('Container').innerHTML = contents;
    }

    function printInner() {
        var content = document.getElementById("printPage").innerHTML;
        var newWin = window.open("");
        newWin.document.write("<link href=\"./print_style.css\" rel=\"stylesheet\">");
        newWin.document.write(content);
        setTimeout(() => {
            newWin.print();
            newWin.close();
        }, 100);
    }
</script>
</div>
</html>