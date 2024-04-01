<form method="post">
    <label for="dimension">Dimension = </label>
    <output>
        <?php
            if(isset($_POST["dimension"])) echo($_POST["dimension"]);
            else echo("1");
        ?>
    </output>
    <br>
    <input type="range" id="dimension" name="dimension" min="1" max="26" value="<?php if(isset($_POST["dimension"])) echo($_POST["dimension"]); else echo("1");?>" oninput="this.previousElementSibling.previousElementSibling.value = this.value">
    <br><br>
    <label for="num_colors">Number of Colors = </label>
    <output>
        <?php
            if(isset($_POST["num_colors"])) echo($_POST["num_colors"]);
            else echo("1");
        ?>
    </output>
    <br>
    <input type="range" id="num_colors" name="num_colors" min="1" max="10" value="<?php if(isset($_POST["num_colors"])) echo($_POST["num_colors"]); else echo("1");?>" oninput="this.previousElementSibling.previousElementSibling.value = this.value">
    <br><br>
    <input name="page" value="color generator" type="hidden">
    <button type="submit">Generate</button>
</form>