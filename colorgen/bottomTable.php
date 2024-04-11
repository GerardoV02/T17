<link href="colorgen/tablestyle.css" rel="stylesheet" />
<?php
if(isset($_POST["dimension"])){
    $dim = $_POST["dimension"];
    $num = $_POST["num_colors"];

$table = '<table class = "BottomTable">';
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

        $table.='<td class = "Cell" id="' . sprintf('%02d%02d', $j - 1, $i - 1) . '>';

        //content here

        $table.='</td>';

    }
    $table.='</tr>';
}
}
echo('</table>');

$name = 'Hello World';

echo($table);

$formatted_table = addslashes($table);
echo("<button id = 'print' onclick = 'myFunction(\"$formatted_table\")'>Print</button>");
?>



<script>
    function myFunction(contents){
        document.getElementById('Container').innerHTML = contents;
    }
</script>
