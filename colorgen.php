<!DOCTYPE html>
<html>
<!--
Classes:
- Title="PageTitle"
- Bottom Table = "BottomTable"
- printInfo = 'printPage'
-->

<link href="./style.css" rel="stylesheet">
<div id = "Container">
<?php
require("./navbar/navbar.php");
?>
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

<p id="displaycolor0"></p>
<select onchange="setColor(0,this.value)" name="color0" id="color0">
    <option id="color0red" value="red" selected>RED</option>
    <option id="color0orange" value="orange">ORANGE</option>
    <option id="color0yellow" value="yellow">YELLOW</option>
    <option id="color0green" value="green">GREEN</option>
    <option id="color0blue" value="blue">BLUE</option>
    <option id="color0purple" value="purple">PURPLE</option>
    <option id="color0grey" value="grey">GREY</option>
    <option id="color0brown" value="brown">BROWN</option>
    <option id="color0black" value="black">BLACK</option>
    <option id="color0teal" value="teal">TEAL</option>
</select>
<p id="displaycolor1"></p>
<select onchange="setColor(1,this.value)" name="color1" id="color1">
    <option id="color1red" value="red" selected>RED</option>
    <option id="color1orange" value="orange">ORANGE</option>
    <option id="color1yellow" value="yellow">YELLOW</option>
    <option id="color1green" value="green">GREEN</option>
    <option id="color1blue" value="blue">BLUE</option>
    <option id="color1purple" value="purple">PURPLE</option>
    <option id="color1grey" value="grey">GREY</option>
    <option id="color1brown" value="brown">BROWN</option>
    <option id="color1black" value="black">BLACK</option>
    <option id="color1teal" value="teal">TEAL</option>
</select>
<p id="displaycolor2"></p>
<select onchange="setColor(2,this.value)" name="color2" id="color2">
    <option id="color2red" value="red" selected>RED</option>
    <option id="color2orange" value="orange">ORANGE</option>
    <option id="color2yellow" value="yellow">YELLOW</option>
    <option id="color2green" value="green">GREEN</option>
    <option id="color2blue" value="blue">BLUE</option>
    <option id="color2purple" value="purple">PURPLE</option>
    <option id="color2grey" value="grey">GREY</option>
    <option id="color2brown" value="brown">BROWN</option>
    <option id="color2black" value="black">BLACK</option>
    <option id="color2teal" value="teal">TEAL</option>
</select>
<p id="displaycolor3"></p>
<select onchange="setColor(3,this.value)" name="color3" id="color3">
    <option id="color3red" value="red" selected>RED</option>
    <option id="color3orange" value="orange">ORANGE</option>
    <option id="color3yellow" value="yellow">YELLOW</option>
    <option id="color3green" value="green">GREEN</option>
    <option id="color3blue" value="blue">BLUE</option>
    <option id="color3purple" value="purple">PURPLE</option>
    <option id="color3grey" value="grey">GREY</option>
    <option id="color3brown" value="brown">BROWN</option>
    <option id="color3black" value="black">BLACK</option>
    <option id="color3teal" value="teal">TEAL</option>
</select>
<p id="displaycolor4"></p>
<select onchange="setColor(4,this.value)" name="color4" id="color4">
    <option id="color4red" value="red" selected>RED</option>
    <option id="color4orange" value="orange">ORANGE</option>
    <option id="color4yellow" value="yellow">YELLOW</option>
    <option id="color4green" value="green">GREEN</option>
    <option id="color4blue" value="blue">BLUE</option>
    <option id="color4purple" value="purple">PURPLE</option>
    <option id="color4grey" value="grey">GREY</option>
    <option id="color4brown" value="brown">BROWN</option>
    <option id="color4black" value="black">BLACK</option>
    <option id="color4teal" value="teal">TEAL</option>
</select>
<p id="displaycolor5"></p>
<select onchange="setColor(5,this.value)" name="color5" id="color5">
    <option id="color5red" value="red" selected>RED</option>
    <option id="color5orange" value="orange">ORANGE</option>
    <option id="color5yellow" value="yellow">YELLOW</option>
    <option id="color5green" value="green">GREEN</option>
    <option id="color5blue" value="blue">BLUE</option>
    <option id="color5purple" value="purple">PURPLE</option>
    <option id="color5grey" value="grey">GREY</option>
    <option id="color5brown" value="brown">BROWN</option>
    <option id="color5black" value="black">BLACK</option>
    <option id="color5teal" value="teal">TEAL</option>
</select>
<p id="displaycolor6"></p>
<select onchange="setColor(6,this.value)" name="color6" id="color6">
    <option id="color6red" value="red" selected>RED</option>
    <option id="color6orange" value="orange">ORANGE</option>
    <option id="color6yellow" value="yellow">YELLOW</option>
    <option id="color6green" value="green">GREEN</option>
    <option id="color6blue" value="blue">BLUE</option>
    <option id="color6purple" value="purple">PURPLE</option>
    <option id="color6grey" value="grey">GREY</option>
    <option id="color6brown" value="brown">BROWN</option>
    <option id="color6black" value="black">BLACK</option>
    <option id="color6teal" value="teal">TEAL</option>
</select>
<p id="displaycolor7"></p>
<select onchange="setColor(7,this.value)" name="color7" id="color7">
    <option id="color7red" value="red" selected>RED</option>
    <option id="color7orange" value="orange">ORANGE</option>
    <option id="color7yellow" value="yellow">YELLOW</option>
    <option id="color7green" value="green">GREEN</option>
    <option id="color7blue" value="blue">BLUE</option>
    <option id="color7purple" value="purple">PURPLE</option>
    <option id="color7grey" value="grey">GREY</option>
    <option id="color7brown" value="brown">BROWN</option>
    <option id="color7black" value="black">BLACK</option>
    <option id="color7teal" value="teal">TEAL</option>
</select>
<p id="displaycolor8"></p>
<select onchange="setColor(8,this.value)" name="color8" id="color8">
    <option id="color8red" value="red" selected>RED</option>
    <option id="color8orange" value="orange">ORANGE</option>
    <option id="color8yellow" value="yellow">YELLOW</option>
    <option id="color8green" value="green">GREEN</option>
    <option id="color8blue" value="blue">BLUE</option>
    <option id="color8purple" value="purple">PURPLE</option>
    <option id="color8grey" value="grey">GREY</option>
    <option id="color8brown" value="brown">BROWN</option>
    <option id="color8black" value="black">BLACK</option>
    <option id="color8teal" value="teal">TEAL</option>
</select>
<p id="displaycolor9"></p>
<select onchange="setColor(9,this.value)" name="color9" id="color9">
    <option id="color9red" value="red" selected>RED</option>
    <option id="color9orange" value="orange">ORANGE</option>
    <option id="color9yellow" value="yellow">YELLOW</option>
    <option id="color9green" value="green">GREEN</option>
    <option id="color9blue" value="blue">BLUE</option>
    <option id="color9purple" value="purple">PURPLE</option>
    <option id="color9grey" value="grey">GREY</option>
    <option id="color9brown" value="brown">BROWN</option>
    <option id="color9black" value="black">BLACK</option>
    <option id="color9teal" value="teal">TEAL</option>
</select>


<button type="submit">Set Colors</button>
</form>

<script>
    colors = <?php echo($_GET["colors"]);?>;
    let carBrands = ['red','orange','yellow','green','blue','purple','grey', 'brown','black','teal'];
    carBrands = carBrands.splice(10-colors,colors);
    print();
    function print()
    {
        for (index = 0; index<10; index++)
        {
            document.getElementById("displaycolor"+index).innerHTML=carBrands[index];
            document.getElementById("color"+index).value=carBrands[index];
        }
    }
    function setColor(index,brand)
    {
        currentBrand = carBrands[index];
        updatedBrand = brand;
        if (brandAlreadyUsed(brand))
        {
            carBrands[getAlreadyUsedIndex(brand)]=currentBrand;
        }
        carBrands[index]=brand;
        print();
    }
    function brandAlreadyUsed(brand)
    {
        return carBrands.indexOf(brand)!=-1;
    }
    function getAlreadyUsedIndex(brand)
    {
        return carBrands.indexOf(brand);
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

if(isset($_GET["colors"])){
    $colors = $_GET["colors"];
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