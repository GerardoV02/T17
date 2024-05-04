<!DOCTYPE html>

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

    <div class="color Form">
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


<form id= "colorSelectForm" method="post" action="colorgen.php?dimension_num=<?php echo($dimension_num);?>&color_num=<?php echo($color_num);?>">
<table style="border: 3px solid black; border-collapse: collapse;">
<?php
    $colorsPossible = ["red", "orange", "yellow", "green", "blue", "purple", "grey", "brown", "black", "teal"];
    $colorsSelected = isset($_POST["colors"])?$_POST["colors"]:$colorsPossible;
    //echo("[".implode(",",$colorsSelected)."]"."<br>");
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
            <input type=\"radio\" id=\"selected_color\" name=\"selected_color\" onchange='displaySelectedColor()' value=\"$i\">
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
            echo("<td style=\"border: 3px solid black; border-collapse: collapse;\"id='cellcontainer$i'>");
        }
        echo("</tr>");
    }
?>
</table>
<br>
</form>
<p id="selectedcolorvalue">none</p>
<p id="selectedcolornumber">none</p>
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
        displaySelectedColor();
        updateAllCellContainer();
    }
    function updateValues()
    {
        for (index = 0; index<10; index++)
        {
            document.getElementById("color"+index).value=usedColors[index];
            //ddocument.getElementById("colorprint"+index).innerHTML=usedColors[index];
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
    function displaySelectedColor(colorNumber)
    {     
        colorNumber = document.querySelector('input[name="selected_color"]:checked').value
        document.getElementById("selectedcolornumber").innerHTML=(colorNumber);
        document.getElementById("selectedcolorvalue").innerHTML=(usedColors[colorNumber]);
    }
</script>

<!-- BOTTOM TABLE -->




<?php

//Creating a string that will be used to hold a new class for easy formatting
//This formatted_print variable will be what our print menu will be based on
$formatted_print = '<h1 id = "PrintMenu">Print Menu</h1>';

//This creates a Exit Button from the print Menu
$formatted_print.='<button onclick="printReturn()" id="Exit">Return to Color Generator</button>';
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
        $colorInfo.='<li id="colorprint'.$i.'"></li>';
    }
}

$colorInfo .= '</ul>';
//echo($colorInfo);


//adding color info to the print information
$formatted_print.=$colorInfo;

//Creating the n+1 x n+1 table
$table = '<table class = "BottomTable" id="bottomTable">';

$dim = isset($_GET["dimension_num"])?$_GET["dimension_num"]:1;

$letterNum = ord('A');

for($i = 0; $i < $dim+1; $i++){
    $table.="<tr>";

    //echo("<tr>");

    for($j = 0; $j < $dim+1;$j++){

        $cellLetter = chr($j+65-1);
        $cellNumber = $i;
        $cellId = $cellLetter.$cellNumber;

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

        $table.='<td onclick="addCell(this.id)", class = "Cell" id="'.$cellId.'" color="">';

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

echo("<br><button id = 'print' onclick = 'printScreen()'>Print Preview</button>");
?>


<script>
    let oldContainer = null;

    function addCell(cellid)
    {
        colorNumber = document.getElementById("selectedcolornumber").innerHTML;
        colorValue = document.getElementById("selectedcolorvalue").innerHTML;
        cellElement = document.getElementById(cellid);

        previousColor = cellElement.getAttribute("color");

        if (colorNumber!=previousColor)
        {
            cellElement.setAttribute("color",colorNumber);
            cellElement.style.backgroundColor=colorValue;
        }
        else 
        {
            cellElement.setAttribute("color","");
            cellElement.style.backgroundColor="white";
        }
        updateCellContainer(colorNumber);
        updateCellContainer(previousColor);
    }

    function updateCellContainer(colorNumber)
    {
        if (colorNumber=="")
            return;
        var cellElements = document.querySelectorAll(`[color="${colorNumber}"]`);
        var container =  document.getElementById("cellcontainer"+colorNumber);
        var ids ="";

            // Correct loop using for...of for iterating over NodeList
            for (let element of cellElements) {
                 element.style.backgroundColor = usedColors[colorNumber];
                 ids += element.id + " "; // Collect all IDs
            }
        container.innerHTML = ids;
    }

    function updateAllCellContainer()
    {
        for (i = 0; i< color_num; i++)
        {
            updateCellContainer(i);
        }
    }
    
    function printScreen(){

        contents ='<button onclick="printReturn()" id="Exit">Return to Color Generator</button>' 
        for (i = 0; i<color_num; i++)
        {
            contents+='<h1> color '+i+": "+usedColors[i]+'</h1>';
            contents+='<h2>'+document.getElementById("cellcontainer"+i).innerHTML+'</h2>';
        }
        contents += document.getElementById('bottomTable').outerHTML;
        oldContainer = document.getElementById('Container').innerHTML;
        document.getElementById('Container').innerHTML = contents;
        for (let cell of document.getElementsByClassName("Cell"))
        {
            cell.innerHTML=cell.getAttribute("color");
            cell.style.backgroundColor='white';
        }
    }

    function printReturn() {
        document.getElementById('Container').innerHTML = oldContainer;
        oldContainer = null;
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

    //quick methods
    {

    }
</script>
</div>
</html>