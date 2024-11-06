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
    echo "Wybrane tutoriale:";
    foreach ($_REQUEST['jezyki'] as $jezyk) {
        echo " " . $jezyk, " ";
    }
} else {
    echo "<p>Nie wybrano żadnych tutoriali.</p>";
}
echo "<br>Wybrany sposób płatności: ";
if (isset($_REQUEST['payment'])) {
    $payment = $_REQUEST['payment'];
    echo $payment . "<br>";
}
$surname = $_POST['surname'];
$age = $_POST['age'];
$email = $_POST['email'];
$country = $_POST['country'];
if ($surname && $age && $email && $country) {
    print("<p><a href = 'http://localhost:63342/Lab_PHP_Project/klient.php?nazwisko=$surname&wiek=$age&email=$email&panstwo=$country'>");
    print("informaje konktaktowe</a>");
} else echo "dane zamawiającego nie są kompletne";
echo "<p><a href = 'http://localhost:63342/Lab_PHP_Project/formularz.php'>" . "Powrót do formularza" . "</a>"
?>

</body>
</html>
