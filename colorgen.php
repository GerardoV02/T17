<!--
Classes:
- Title="PageTitle"
-->
<h1 class="PageTitle"><?php echo ucwords($page);?></h1>

<form method="post">
    <div>
        <label for="dimension">Dimension (between 0 and 26):</label>
        <input type="range" id="dimension" name="dimension" min="0" max="26">
        <label for="color">Background Color:</label>
        <select name="color" id="color">
    </div>
    <div>
            <option value="">--- Choose a color ---</option>
            <option value="red">Red</option>
            <option value="orange">Orange</option>
            <option value="yellow">Yellow</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
            <option value="purple">Purple</option>
            <option value="grey">Grey</option>
            <option value="brown">Brown</option>
            <option value="black">Black</option>
            <option value="teal">Teal</option>
        </select>
    </div>
        <input name = "page" value="color generator" type = "hidden">
    <div>
        <button type="submit">Select</button>
    </div>
</form>

<?php
    echo($_POST["page"]."<br>");
    echo($_POST["color"]."<br>");
    echo($_POST["dimension"]."<br>");
?>
