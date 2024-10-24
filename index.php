<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
function galeria($rows, $cols)
{
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            echo("<img src='grafika/miniaturki/obraz". ($j + $i*$cols + 1) . ".JPG' alt='obraz " .($j + $i*$cols + 1) . "' >\n");
        }
        echo "<br>";
    }
}

//wywołanie funkcji:
galeria(2, 4);
?>
</body>
</html>