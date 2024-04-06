<!--
Classes:
- Title="PageTitle"
- Bottom Table = "BottomTable"
-->
<?php
require("./navbar/navbar.php");
?>
<br>
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