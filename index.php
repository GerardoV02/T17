<!--
Classes:
- Title="PageTitle"
- Images="TeamLogo"
- MissionStatement="Mission Statement"
- Statement="statement"
- Description="description"
- Paragraph="description of colorgenerator"
-->
<!DOCTYPE html>
<html>
<?php 
    require("./navbar/navbar.php");
    echo("<br><br>");
?>
<link href="./style.css" rel="stylesheet">
<div id = "Container">
<img class="TeamLogo" src="Images/logo_transparent.png">

<h3 class="Mission Statement">Our Mission Statement</h3>
<p class="statement">To embower those through our web design, while also creating a meaningful website for those to interact with. We are building a unique way for those to generate colors that has rarely been seen before. Welcome to Chroma 17, we are glad to have you!</p>

<h3 class="description">Description Of Our Prototype</h3>
<p class="description of colorgenerator">Our color generator allows users to create a unique table based on there own inputs. First the user specifies the dimension and the number if unique colors they would like to include. Once this is set the user then selects the each color they would like to use.
This input is validated to make sure there are no repeats as each color must be unique. Once validated these colors are combined into a NxN table with N being the dimensions previously specified with all of the selected colors combined.</p>

<h3 class="PalletInfo">About The Colours</h3>
<p class="description of colorgenerator">The colour pallet for this website was created using a random generator, then furthur tweaked until it reached adequate contrast ratios.</p>
<p><strong>Colours used and their contrast against their main background:</strong></p>
<ul>
    <li><strong>Text & NavBar:</strong> <em>#FFFEFE</em> <a href="https://webaim.org/resources/contrastchecker/?fcolor=FFFEFE&bcolor=2E2C3D">[Against Background: 13.51]</a></li>
    <li><strong>Accent:</strong> <em>#D6493B</em> <a href="https://webaim.org/resources/contrastchecker/?fcolor=D6493B&bcolor=FFFEFE">[Against NavBar: 4.27]</a></li>
    <li><strong>Hover & Links:</strong> <em>#FEBB70</em> <a href="https://webaim.org/resources/contrastchecker/?fcolor=FEBB70&bcolor=2E2C3D">[Against Background: 8.13]</a></li>
    <li><strong>Background:</strong> <em>#2E2C3D</em></li>

</div>
</html>