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
    <button type="submit">Update</button>
</form>
<br>
------------------------------------------------------------------------------------------------------------------------
<br>
<form method="post" action="colorgen.php?dimensions=<?php echo($dimensions);?>&colors=<?php echo($colors);?>">

    <div class = "SelectColorsForm">
    <?php
        for ($i = 0; $i < $colors; $i++)
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
    $j = $i + 1;
    echo "
        <label id = \"labelcolor$i\" for=\"color$i\">Color #$j</label>
        <select name=\"color$i\" id=\"color\"> 
            <option id = \"selectedcolor$i\" value=\"$thiscolor\">$selectedColor</option>
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
        </select> <p hidden = \"true\" id=\"color$i\">$thiscolor</p>
    <br> ";
    }
    ?>

    <p id="valid">Valid</p>

    <button type="submit">Set Colors</button>
</form>
<!--- FORM VALIDATOR --->
<p id="test"></p>

<script language = "JavaScript">
    let colors = ["red","orange","yellow","green","blue","purple","grey","brown","black","teal"];
    let valid = true;
    let message = "";
    for (var i = 0; i < <?php echo($colors) ?>; i++) 
    {
        if (removeColor(document.getElementById("color"+i).innerHTML)==true)
        {

        }
        else 
        {
            newColor = getUnusedColor();
            document.getElementById("color"+i).innerHTML=newColor;
            document.getElementById("selectedcolor"+i).innderHTMl=newColor;
            document.getElementById("selectedcolor"+i).value=newColor;
            document.getElementById("labelcolor"+i).innderHTML=newColor;
            message+="color #"+(i+1)+" was invalid. selecting instead color "+newColor+"\n";
        }
    }

    document.getElementById("valid").innerHTML=message;
    function removeColor(color)
    {
        index = colors.indexOf(color);
        if (index!=-1)
        {
            colors.splice(index,1);
            return true;
        }
        return false;
    }

    function getUnusedColor()
    {
        return ""+colors.pop();
    }

    document.getElementById("test").innerHTML=colors.toString();

    /*
    let colors = ("red","orange","yellow","green","blue","purple","grey","brown","black","teal");
    let valid = true;
    let message = "";
    for (var i = 0; i < <?php echo($colors) ?>; i++) 
    {

        if (removeColor(document.getElementById("color"+i).innerHTML)==false)
        {

        }
        else 
        {
            newColor = getUnusedColor();
            document.getElementById("color"+i).innerHTML=newColor;
            document.getElementById("selectedcolor"+i).innderHTMl=newColor;
            document.getElementById("selectedcolor"+i).value=newColor;
            message+="color"+i+" was invalid. selecting instead color "+newColor+"\n";
        }
    }
    if (!valid)
        document.getElementById("valid").innerHTML=message;
    function removeColor(color)
    {
        index = colors.indexOf(color);
        if (index!=-1)
        {
            splice(index,1);
            return true;
        }
        return false;
    }
    function getUnusedColor()
    {
        return ""+colors.get[0];
    }*/
</script>




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