<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html lang=pl>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
$int = 1234;
$float = 567.789;
$jeden = 1;
$zero = 0;
$bool = true;
$string0 = "0";
$typy = "Typy w PHP";
$tabint = [1, 2, 3, 4];
$tabpusty = [];
$tabstring = ["zielony", "czerwony", "niebiski"];
$tab3 = ["Agata", "Agatowska", 4.67, true];
$date = new DateTime();
$date->format('Y-m-d H:i:s'); //obecna data systemowa
//a)
echo "int = $int<br>
        float = $float<br>
        jeden = $jeden<br>
        zero = $zero<br>
        bool = $bool<br>
        string0 = $string0<br>
        typy = $typy<br>
        tabint = " . count($tabint) . "<br>
        tabpusty = " . count($tabpusty) . "<br>
        tabstring = " . count($tabstring) . "<br>
        tab3 = " . count($tab3) . "<br>
        date = " . $date->format('Y-m-d') . "<br><br>";
//b)
echo "is_bool: " . is_bool($bool) . " " . "is_int: " . is_int($string0) . " " . "is_numeric: " . is_numeric($string0) . " " . "is_string " . is_string($int) . " " . "is_array: " . is_array($tab3) . " " . "is_object: " . is_object($date) . "<br><br>";
//c)
echo "Porownanie 1 i true za pomoca == " . ($jeden == $bool) . "<br>";
echo "Porownanie 1 i true za pomoca === " . ($jeden === $bool) . "<br>";
echo "Porownanie 0 i '0' za pomoca == " . ($string0 == $zero) . "<br>";
echo "Porownanie 0 i '0' za pomoca === " . ($string0 === $zero) . "<br><br>";
//d)
echo "Użycie funkcji var_dump() i print_r() na tablicach <br>";
echo "var_dump() dla tablicy intów <br>";
var_dump($tabint);
echo "<br> var_dump() dla pustej tablicy <br>";
var_dump($tabpusty);
echo "<br> var_dump() dla tablicy stringów <br>";
var_dump($tabstring);
echo "<br> var_dump() dla tablicy o różnych typach"  . "<br>";
var_dump($tab3);
echo "<br>";
echo "<br> print_r() dla tablicy intów " . print_r($tabint) . "<br>";
echo "<br> print_r() dla pustej tablicy " . print_r($tabpusty) . "<br>";
echo "<br> print_r() dla tablicy strigów" . print_r($tabstring) . "<br>";
echo "<br> print_r() dla tablicy o różnych typach" . print_r($tab3) . "<br>";
?>
</body>
</html>