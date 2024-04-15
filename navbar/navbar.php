<!-- to include using php: require "./navbar/navbar.php"; -->
<nav>
    <link href="./navbar/navstyle.css" rel="stylesheet" />
    <form method="POST" action="index.php">
        <button type="submit" name="page" value="index" class="button"><div class="HomeIco"></div>Home</button>
    </form>
    <form method="POST" action="colorgen.php">
        <button type="submit" name="page" value="color generator" class="button"><div class="ColorIco"></div>Color Generator</button>
    </form>
    <form method="POST" action="about.php">
        <button type="submit" name="page" value="about" class="button"><div class="AboutIco"></div>About</button>
    </form>
    <form method="POST" action="dbpage.php">
        <button type="submit" name="page" value="about" class="button"></div>Database</button>
    </form>
</nav>