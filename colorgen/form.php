<!--
Classes:
- Dimension Form = "DimensionForm"
- Colors Form = "ColorsForm"
- Select Colors Form = "SelectColorsForm"
-->

<form method="post">

    <input name="page" value="color generator" type="hidden"> <!-- keep page on current page -->

    <div class = "DimensionFomr">
    <label for="dimension">Dimension = </label>
        <output class="DimensionForm">
        <?php
            if(isset($_POST["dimension"]))
                 echo($_POST["dimension"]);
            else 
            {
                echo("1");
                $_POST["dimension"]=1;
            }
        ?>
    </output>
    <br>
    <input type="range" id="dimension" name="dimension" min="1" max="26" value="<?php if(isset($_POST["dimension"])) echo($_POST["dimension"]); else echo("1");?>" oninput="this.previousElementSibling.previousElementSibling.value = this.value">
    <br><br>
    </div>


    <div class = "ColorsForm">
    <label for="num_colors">Number of Colors = </label>
    <output>
        <?php
            if(isset($_POST["num_colors"])) echo($_POST["num_colors"]);
            else 
            {
                echo("1");
                $_POST["num_colors"]=1;
            }
        ?>
    </output>
    <br>
    <input type="range" id="num_colors" name="num_colors" min="1" max="10" value="<?php if(isset($_POST["num_colors"])) echo($_POST["num_colors"]); else echo("1");?>" oninput="this.previousElementSibling.previousElementSibling.value = this.value">
    <br><br>
    <div>
    
    <div class = "SelectColorsForm">
    <?php
    for ($i = 0; $i <$_POST["num_colors"]; $i++)
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

        $valid = true;
        for ($i = 0; $i <$_POST["num_colors"]; $i++)
        {
            for ($j = 0; $j <$_POST["num_colors"]; $j++)
            {
                if (isset($_POST["color$i"])&&isset($_POST["color$j"]))
                {
                     if ($j!=$i&$_POST["color$i"]==$_POST["color$j"])
                     {
                        $valid = false;
                        $errorMessage = "please make sure all color feilds do not equal eachother";
                     }
                    if ($_POST["color$j"]=="")
                    {
                        $valid = false;
                        $errorMessage = "please make sure all color feilds have been inputted";
                    }
                }
                else 
                    $valid = false;
            }
        }
        echo ("<br>");
        if ($valid)
            echo("valid");
        else   
            echo($errorMessage);
    ?>
 </div>
    <br>
    <button type="submit">Generate</button>
</form>