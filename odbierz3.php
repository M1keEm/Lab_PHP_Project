<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wynik zamówienia</title>
</head>
<body>
<h2>Wybrane języki:</h2>
<?php
if (isset($_REQUEST['jezyki'])) {
    echo "Wybrane tutoriale foreach:";
    foreach ($_REQUEST['jezyki'] as $jezyk) {
        echo " " . $jezyk, " ";
    }
    echo "<br>Wybrane tutoriale join: " . join(", ", $_REQUEST['jezyki']);
} else {
    echo "<p>Nie wybrano żadnych tutoriali.</p>";
}

echo "<h2>Wszystkie parametry:</h2>";
foreach ($_REQUEST as $key => $value) {
    if (is_array($value)) {
        echo "$key: " . join(", ", $value) . "<br>";
    } else {
        echo "$key: $value<br>";
    }
}
?>
</body>
</html>