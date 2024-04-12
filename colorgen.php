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
    <div class="DimensionsForm">
    <label for="dimensions">Dimension = </label>   
    <?php
        $dimensions = 1;
        if(isset($_GET["dimensions"]))
            $dimensions = $_GET["dimensions"];
        echo "<output name=\"out_d\" for=\"colors\">$dimensions</output>";
        echo "<br><input type=\"range\" id=\"dimensions\" name=\"dimensions\" min=\"1\" max=\"26\" value=\"$dimensions\" oninput=\"out_d.value=this.value\">";
    ?>

    <div class="ColorsForm">
    <label for="colors">Number of Colors = </label>   
    <?php
        $colors = 1;
        if(isset($_GET["colors"]))
            $colors = $_GET["colors"];
        echo "<output name=\"out_c\" for=\"colors\">$colors</output>";
        echo "<br><input type=\"range\" id=\"colors\" name=\"colors\" min=\"1\" max=\"10\" value=\"$colors\" oninput=\"out_c.value=this.value\">";
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
<form method="post" action="colorgen.php?dimensions=<?php echo($dimensions);?>&colors=<?php echo($colors);?>">

    <div class = "SelectColorsForm">
    <?php
        for ($i = 1; $i <= $colors; $i++)
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
            <label id = \"labelcolor$i\" for=\"color$i\">Color #$i</label>
            <select name=\"color$i\" id=\"selectcolor$i\"> 
                <option id = \"selected$i"."OPTION\" value=\"$thiscolor\">$selectedColor</option>
                <option id = \"redOPTION\" value=\"red\">RED</option>
                <option id = \"orangeOPTION\" value=\"orange\">ORANGE</option>
                <option id = \"yellowOPTION\" value=\"yellow\">YELLOW</option>
                <option id = \"greenOPTION\" value=\"green\">GREEN</option>
                <option id = \"blueOPTION\" value=\"blue\">BLUE</option>
                <option id = \"purpleOPTION\" value=\"purple\">PURPLE</option>
                <option id = \"greyOPTION\" value=\"grey\">GREY</option>
                <option id = \"brownOPTION\" value=\"brown\">BROWN</option>
                <option id = \"blackOPTION\" value=\"black\">BLACK</option>
                <option id = \"tealOPTION\" value=\"teal\">TEAL</option>
            </select>
    <br> ";
    }
    ?>
    
    <p id="valid">Valid</p>

    <button type="submit">Set Colors</button>
    <br>
    <br>
</form>
<!--- FORM VALIDATOR --->

<script language = "JavaScript">
    let unusedColors = ["red","orange","yellow","green","blue","purple","grey","brown","black","teal"];
    let message = "";
    for (var i = 1; i <= <?php echo($colors) ?>; i++) 
    {
        currentIndex = i;
        currentColor = document.getElementById("selected"+i+"OPTION").value;

        if (colorIsUnused(currentColor))
        {
            removeColorFromUsed(currentColor);
        }
        else 
        {
            newColor = getUnusedColor();
            removeColorFromUsed(newColor);
            setColorTo(currentIndex, newColor);
            message+="color #"+(i)+" was invalid. selecting instead color "+newColor+"\n";
        }
    displayError(message);
}



    function displayError(message)
    {
        document.getElementById("valid").innerHTML=message;
    }
    function setColorTo(index,color)
    {
        document.getElementById("selected"+index+"OPTION").value=color;
    }
    function colorIsUnused(color)
    {
        return (unusedColors.indexOf(color)!=-1);
    }
    function removeColorFromUsed(color)
    {
        index = unusedColors.indexOf(color);
        if (index!=-1)
        {
            unusedColors.splice(index,1);
            return true;
        }
        return false;
    }

    function getUnusedColor()
    {
        return ""+unusedColors[0];
    }


</script>




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

if(isset($_GET["colors"])){
    $colors = $_GET["colors"];
    for($i = 1; $i <= $colors; $i++){
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

echo("<br><button id = 'print' onclick = 'printScreen(\"$formatted_print\")'>Print</button>");
?>


<script>
    function printScreen(contents){
        document.getElementById('Container').innerHTML = contents;
    }
</script>
</div>
</html>