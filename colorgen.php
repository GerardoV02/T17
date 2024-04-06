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
        <label id = \"labelcolor$i\" for=\"color$i\">Color$i</label>
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

    <button type="submit">Set Color Values</button>
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

            message+="color"+i+" was invalid. selecting instead color "+newColor+"\n";
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